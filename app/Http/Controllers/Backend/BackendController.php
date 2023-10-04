<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB, Carbon\Carbon, File, Image;

class BackendController extends Controller
{
    private $default_pagination, $qrcode_path;
    public function __construct()
    {
        $this->default_pagination = 25;
        $this->middleware(["auth", "XssSanitizer"]);
    }

    public function index(Request $request)
    {

        // $title = "Dashboard";
        // $keyword = $request->input("keyword");
        return view("backend.index",);
    }

    public function user_index(Request $request)
    {
        $users = User::with("roles")
            ->whereNotIn("role", ["merchant"])
            ->paginate($this->default_pagination);
        return view("backend.user.index", compact("users"));
    }

    public function merchant_list(Request $request)
    {
        $query_params = $request->all();
        if (!empty($query_params)) {
            $users = User::with("roles")
                ->whereIn("role", ["merchant"])
                ->where("created_at", ">=", $query_params["from"])
                ->where(
                    "created_at",
                    "<=",
                    Carbon::parse($query_params["to"])
                        ->addDays(1)
                        ->format("Y-m-d")
                )
                ->orderBy("created_at", "DESC")
                ->paginate($this->default_pagination);
        } else {
            $users = User::with("roles")
                ->whereIn("role", ["merchant"])
                ->orderBy("created_at", "DESC")
                ->paginate($this->default_pagination);
        }

        return view("backend.merchant.index", compact("users", "query_params"));
    }

    public function user_create(Request $request)
    {
        $roles = Role::all();
        return view("backend.user.create", compact("roles"));
    }

    public function user_store(Request $request)
    {
        $this->validate(
            $request,
            [
                "name" => "required",
                "email" => "required|email|unique:users,email",
                "password" => "required|min:6|confirmed",
                "user_role" => "required",
            ],
            [
                "name.required" => "Name is required",
                "email.required" => "Email is required",
                "email.email" => "Email is must be valid email",
                "email.unique" => "Email already in use",
                "password.required" => "Password is required",
                "password.min" => "Password must be minimum 6",
                "password.confirmed" =>
                    "Password must match with confirm password",
                "user_role.required" => "User role is required",
            ]
        );

        $input = $request->all();
        $input["password"] = Hash::make($input["password"]);
        $input["status"] = "active";
        // $input["user_role"] = $input["user_role"];

        $user = User::create($input);
        $user->assignRole($input["user_role"]);

        $user->role = $input["user_role"];
        $user->update();

        return redirect()
            ->back()
            ->with("msg", "User Created Successfully.");
    }

    public function user_edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $user_role_array = $user->getRoleNames()->toArray();
        return view(
            "backend.user.edit",
            compact("user", "roles", "user_role_array")
        );
    }

    public function user_update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                "name" => "required",
                "email" => "required|unique:users,email," . $id,
                "password" => "nullable|min:6|confirmed",
                "user_role" => "required",
            ],
            [
                "name.required" => "Name is required",
                "email.required" => "Email is required",
                "email.email" => "Email is must be valid email",
                "email.unique" => "Email already in use",
                "password.min" => "Password must be minimum 6",
                "password.confirmed" =>
                    "Password must match with confirm password",
                "user_role.required" => "User role is required",
            ]
        );

        $input = $request->all();
        if (!empty($request["password"])) {
            $input["password"] = Hash::make($request->password);
        } else {
            unset($input["password"]);
        }
        $user = User::findOrFail($id);
        $user->update($input);

        DB::table("model_has_roles")
            ->where("model_id", $id)
            ->delete();
        $user->assignRole($request->user_role);

        $user->role = $input["user_role"];
        $user->update();

        return redirect()
            ->back()
            ->with("msg", "User Updated Successfully.");
    }

    public function user_destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()
            ->back()
            ->with("msg", "User deleted Successfully.");
    }

    public function merchant_search(Request $request)
    {
        $query_params = $request->all();
        $keyword = isset($query_params['keyword']) ? $query_params['keyword']  : "";

        if ($keyword) {
            $id_keyword =  ltrim(preg_replace('/\D+/', '', $keyword),"0");
            $users = User::with("roles")
                ->orWhere(function ($query) use ($keyword, $id_keyword) {
                    $query
                        ->where("id", "LIKE", "%" .floatval($id_keyword). "%")
                        ->orwhere("name", "LIKE", "%" . $keyword . "%")
                        ->orWhere("email", "LIKE", "%" . $keyword . "%")
                        ->orWhere("phone", "LIKE", "%" . $keyword . "%");
                })
                ->whereIn("role", ["merchant"])
                ->orderBy("created_at", "DESC")
                ->paginate($this->default_pagination);
        } else {
            $users = User::with("roles")
                ->whereIn("role", ["merchant"])
                ->orderBy("created_at", "DESC")
                ->paginate($this->default_pagination);
        }

        return view("backend.merchant.index", compact("users", "query_params"));
    }

    public function merchant_details(Request $request)
    {
        $merchant_id = $request->input("merchant");
        $user = User::with("roles")
            ->whereIn("role", ["merchant"])
            ->where(["id" => $merchant_id])
            ->firstOrFail();

        $restaurants = $user->resturant()->exists()
            ? $user->resturant->pluck("restaurant_id")->toArray()
            : [];

        $scans = QRScans::whereIn("qr_scan_resturant_id", $restaurants)
            ->orderBy("created_at", "DESC")
            ->paginate($this->default_pagination);

        return view("backend.merchant.details", compact("user", "scans"));
    }

    public function merchant_resturant(Request $request)
    {
        $merchant_id = $request->input("merchant");
        $user = User::with("roles")
            ->whereIn("role", ["merchant"])
            ->where(["id" => $merchant_id])
            ->firstOrFail();
        $restaurant = $user->resturant()->exists()
            ? $user->resturant[0]
            : new \App\Model\Restaurant();

        if ($restaurant) {
            $restaurant_link = route("frontend.resturant-menu", [
                $restaurant->restaurant_slug,
            ]);
            $qr_filename = md5($merchant_id) . ".png";
            $file_path = implode("", [$this->qrcode_path, $qr_filename]);
            if (!file_exists(public_path($file_path))) {
                QrCode::format("png")
                    ->size(1)
                    ->style("round")
                    ->size(350, 371)
                    ->errorCorrection("H")
                    ->encoding("UTF-8")
                    ->margin(3)
                    ->color(0, 0, 0)
                    ->generate($restaurant_link, $file_path);
            }

            $qr_image = asset("images/qrcodes/" . $qr_filename);
        } else {
            $qr_image = "";
        }

        return view(
            "backend.merchant.resturant_details",
            compact("restaurant", "qr_image", "merchant_id")
        );
    }

    public function merchant_subscriptions(Request $request)
    {
        $query_params = $request->all();

        if (isset($query_params["merchant"])) {
            $merchant_id = $query_params["merchant"];
            User::with("roles")
                ->whereIn("role", ["merchant"])
                ->where(["id" => $merchant_id])
                ->firstOrFail();

            if (isset($query_params["from"]) && isset($query_params["to"])) {
                $user_subscriptions = UserSubscriptions::where([
                    "user_subscription_user_id" => $merchant_id,
                ])
                    ->where("created_at", ">=", $query_params["from"])
                    ->where(
                        "created_at",
                        "<=",
                        Carbon::parse($query_params["to"])
                            ->addDays(1)
                            ->format("Y-m-d")
                    )
                    ->orderBy("created_at", "DESC")
                    ->paginate($this->default_pagination);
            } else {
                $user_subscriptions = UserSubscriptions::where([
                    "user_subscription_user_id" => $merchant_id,
                ])
                    ->orderBy("created_at", "DESC")
                    ->paginate($this->default_pagination);
            }

            $include_payment_by = false;
        } else {
            if (isset($query_params["from"]) && isset($query_params["to"])) {
                $user_subscriptions = UserSubscriptions::where(
                    "created_at",
                    ">=",
                    $query_params["from"]
                )
                    ->where(
                        "created_at",
                        "<=",
                        Carbon::parse($query_params["to"])
                            ->addDays(1)
                            ->format("Y-m-d")
                    )
                    ->orderBy("created_at", "DESC")
                    ->paginate($this->default_pagination);
            } else {
                $user_subscriptions = UserSubscriptions::orderBy(
                    "created_at",
                    "DESC"
                )->paginate($this->default_pagination);
            }
            $include_payment_by = true;
        }

        return view(
            "backend.merchant.subscriptions",
            compact("user_subscriptions", "include_payment_by", "query_params")
        );
    }

    public function merchant_order(Request $request)
    {
        $query_params = $request->all();

        $user = User::with("roles")
            ->whereIn("role", ["merchant"])
            ->where(["id" => $query_params["merchant"]])
            ->firstOrFail();
        if (isset($query_params["from"]) && isset($query_params["to"])) {
            $orders = Order::where("order_user_id", $query_params["merchant"])
                ->where("created_at", ">=", $query_params["from"])
                ->where(
                    "created_at",
                    "<=",
                    Carbon::parse($query_params["to"])
                        ->addDays(1)
                        ->format("Y-m-d")
                )
                ->orderBy("created_at", "DESC")
                ->paginate($this->default_pagination);
        } else {
            $orders = Order::where([
                "order_user_id" => $query_params["merchant"],
            ])
                ->orderBy("created_at", "DESC")
                ->paginate($this->default_pagination);
        }

        return view(
            "backend.merchant.orders",
            compact("orders", "query_params")
        );
    }

    public function merchant_scanlimit(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();

            UserTrail::create([
                "user_trail_user_id" => $input["merchant"],
                "user_trail_scan_limit" => $input["scan_number"],
            ]);

            return response()->json([
                "status" => "success",
                "message" => "Trail Scan Limit added successfully",
            ]);
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Error while processing",
            ]);
        }
    }

    public function check_merchant_scanlimit(Request $request)
    {
        if ($request->ajax()) {
            $max_trail_limits = env("MAX_TRIAL_LIMITS", 3);
            $merchant_id = $request->get("merchant");
            $number_of_trails_used = UserTrail::where([
                "user_trail_user_id" => $merchant_id,
            ])->count();
            $user_subscriptions = UserSubscriptions::where([
                "user_subscription_user_id" => $merchant_id,
            ])
                ->orderBy("created_at", "DESC")
                ->first();

            $trail_scan_count = 0;

            if ($user_subscriptions != null) {
                return response()->json([
                    "status" => "error",
                    "message" =>
                        "Tiral Scan limit cannot be added. Package subscribed alerady",
                ]);
            } elseif ($max_trail_limits == $number_of_trails_used) {
                return response()->json([
                    "status" => "error",
                    "message" =>
                        "Sorry, Trail for scan limit exceed more than " .
                        $max_trail_limits .
                        " times",
                ]);
            } else {
                return response()->json([
                    "status" => "success",
                    "message" =>
                        "Trail for scan limit is less " .
                        $max_trail_limits .
                        " times",
                ]);
            }
        } else {
            return response()->json([
                "status" => "error",
                "message" => "Error while processing",
            ]);
        }
    }

    public function merchant_update_status(Request $request)
    {
        $status = $request->get("status");
        $merchant_id = $request->get("merchant");
        $user = User::with("roles")
            ->whereIn("role", ["merchant"])
            ->where(["id" => $merchant_id])
            ->firstOrFail();
        $user->status = $status;
        $user->update();

        return redirect()
            ->back()
            ->with("success", "User Status updated successfully.");
    }

    public function merchant_export_scan_logs(Request $request)
    {
        $query_params = $request->all();
        $merchant_id = $query_params["merchant"];

        $user = User::with("roles")
            ->whereIn("role", ["merchant"])
            ->where(["id" => $merchant_id])
            ->firstOrFail();

        $restaurants = $user->resturant()->exists()
            ? $user->resturant->pluck("restaurant_id")->toArray()
            : [];

        $scans = QRScans::whereIn("qr_scan_resturant_id", $restaurants)
            ->where("created_at", ">=", $query_params["from"])
            ->where(
                "created_at",
                "<=",
                Carbon::parse($query_params["to"])
                    ->addDays(1)
                    ->format("Y-m-d")
            )
            ->orderBy("created_at", "DESC")
            ->get();

        $data_array[] = ["S.No", "Resturant", "Scan Details", "Scanned On"];

        if ($scans->isNotEmpty()) {
            $i = 1;
            foreach ($scans as $scan) {
                $data_array[] = [
                    "S.No" => $i,
                    "Resturant" => $scan->resturant()->exists()
                        ? $scan->resturant->restaurant_name
                        : "",
                    "Scan Details" => implode("|", [
                        $scan->qr_scan_ipaddress,
                        $scan->qr_scan_extra,
                    ]),
                    "Scanned On" => Carbon::parse($scan->created_at)->format(
                        "d F, Y"
                    ),
                ];
                $i++;
            }
            $filename = "qr_scan_logs_" . time() . ".xls";
            $from = "A1";
            $to = "D1";
            $this->ExportExcel($data_array, $filename, $from, $to);
        }
    }

    public function ExportExcel($customer_data, $filename, $from, $to)
    {
        ini_set("max_execution_time", 0);
        ini_set("memory_limit", "4000M");
        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet
                ->getActiveSheet()
                ->getStyle("$from:$to")
                ->getFont()
                ->setBold(true);
            $spreadSheet
                ->getActiveSheet()
                ->getDefaultColumnDimension()
                ->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($customer_data);
            $Excel_writer = new Xls($spreadSheet);

            header("Content-Type: application/vnd.ms-excel");
            header(
                'Content-Disposition: attachment;filename="' . $filename . '"'
            );
            header("Cache-Control: max-age=0");
            ob_end_clean();
            $Excel_writer->save("php://output");
            exit();
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with("error", "Sorry, cannot export to excel");
        }
    }

    public function merchant_scanlogs(Request $request)
    {
        $query_params = $request->all();
        if (!empty($query_params)) {
            $merchant_id = $query_params["merchant"];
            $user = User::with("roles")
                ->whereIn("role", ["merchant"])
                ->where(["id" => $merchant_id])
                ->firstOrFail();

            $restaurants = $user->resturant()->exists()
                ? $user->resturant->pluck("restaurant_id")->toArray()
                : [];
            $scans = QRScans::whereIn("qr_scan_resturant_id", $restaurants)
                ->orderBy("created_at", "DESC")
                ->paginate($this->default_pagination);
        } else {
            $scans = QRScans::orderBy("created_at", "DESC")->paginate(
                $this->default_pagination
            );
        }

        return view(
            "backend.merchant.scanlogs",
            compact("scans", "query_params")
        );
    }

    public function merchant_filter_scan_logs(Request $request)
    {
        $merchant_id = $request->input("merchant");
        $user = User::with("roles")
            ->whereIn("role", ["merchant"])
            ->where(["id" => $merchant_id])
            ->firstOrFail();

        $query_params = $request->all();

        $restaurants = $user->resturant()->exists()
            ? $user->resturant->pluck("restaurant_id")->toArray()
            : [];

        $scans = QRScans::whereIn("qr_scan_resturant_id", $restaurants)
            ->where("created_at", ">=", $query_params["from"])
            ->where(
                "created_at",
                "<=",
                Carbon::parse($query_params["to"])
                    ->addDays(1)
                    ->format("Y-m-d")
            )
            ->orderBy("created_at", "DESC")
            ->paginate($this->default_pagination);
        return view(
            "backend.merchant.scanlogs",
            compact("scans", "merchant_id", "query_params")
        );
    }

    public function merchant_paymentlogs(Request $request)
    {
        $query_params = $request->all();
        $merchant_id = $query_params["merchant"];
        $user = User::with("roles")
            ->whereIn("role", ["merchant"])
            ->where(["id" => $merchant_id])
            ->firstOrFail();

        $payment_logs = Payments::where(["payment_user_id" => $merchant_id])
            ->orderBy("created_at", "DESC")
            ->paginate($this->default_pagination);

        return view(
            "backend.merchant.paymentlogs",
            compact("payment_logs", "merchant_id", "query_params")
        );
    }

    public function merchant_filter_payment_logs(Request $request)
    {
        $query_params = $request->all();
        $merchant_id = $query_params["merchant"];
        $user = User::with("roles")
            ->whereIn("role", ["merchant"])
            ->where(["id" => $merchant_id])
            ->firstOrFail();

        $payment_logs = Payments::where("payment_user_id", $merchant_id)
            ->where("created_at", ">=", $query_params["from"])
            ->where(
                "created_at",
                "<=",
                Carbon::parse($query_params["to"])
                    ->addDays(1)
                    ->format("Y-m-d")
            )
            ->orderBy("created_at", "DESC")
            ->paginate($this->default_pagination);

        return view(
            "backend.merchant.paymentlogs",
            compact("payment_logs", "merchant_id", "query_params")
        );
    }

    public function merchant_update_payment_status(Request $request)
    {
        $status = $request->get("status");
        $payment_id = $request->get("payment");
        $merchant_id = $request->get("merchant");

        $payment_details = Payments::where([
            "payment_user_id" => $merchant_id,
            "payment_id" => $payment_id,
        ])->first();
        if ($payment_details != null) {
            $payment_date = $payment_details->created_at;
            $today = Carbon::now();

            $new_expiry_count = $payment_date->diffInDays($today);

            $new_expiry_date_start = $today->format("Y-m-d");

            $subscription = UserSubscriptions::where([
                "user_subscription_user_id" => $merchant_id,
                "user_subscription_payment_id" => $payment_id,
            ])->first();

            if ($subscription != null) {
                $new_expiry_date = Carbon::parse(
                    $subscription->user_subscription_end_date
                )
                    ->addDays($new_expiry_count)
                    ->format("Y-m-d");
                $update_arr = [
                    "user_subscription_start_date" => $new_expiry_date_start,
                    "user_subscription_end_date" => $new_expiry_date,
                ];
                $subscription->update($update_arr);
            }

            $payment_details->payment_status = $status;
            $payment_details->update();

            return redirect()
                ->back()
                ->with("success", "Payment status updated successfully.");
        } else {
            return redirect()
                ->back()
                ->with("error", "Payment status cannot be updated");
        }
    }

    public function merchant_create(Request $request)
    {
        return view("backend.merchant.create");
    }

    public function merchant_store(Request $request)
    {
        $this->validate(
            $request,
            [
                "name" => "required",
                "email" => "required|email|unique:users,email",
            ],
            [
                "name.required" => "Name is required",
                "email.required" => "Email is required",
                "email.email" => "Email is must be valid email",
                "email.unique" => "Email already in use",
            ]
        );

        try {
            $characters =
                "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $randomString = substr(str_shuffle($characters), 0, 10);

            $input = $request->all();
            $input["password"] = Hash::make($randomString);
            $input["status"] = "active";
            $input["user_role"] = "merchant";
            $input["email_verified_at"] = Carbon::now()->format("Y-m-d H:is");

            $user = User::create($input);
            $user->assignRole($input["user_role"]);

            send_email(
                $input["email"],
                "Congratulations, your account has been created on " .
                    env("DISPLAY_NAME", "HAMRO QR MENU"),
                "mail.merchant_new_account",
                [
                    "details" => [
                        "email" => $input["email"],
                        "name" => $input["name"],
                        "password" => $randomString,
                    ],
                ],
                "",
                ""
            );

            return redirect()
                ->route("backend.merchants.list")
                ->with("success", "Merchant Created Successfully.");
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with("success", "Merchant Cannot be created");
        }
    }

    public function downloadQrCode(Request $request)
    {
        $user_id = $request->input("merchant");
        $qr_filename = md5($user_id) . ".png";
        $file_path = implode("", [$this->qrcode_path, $qr_filename]);
        return response()->download($file_path);
    }
    public function dashbashborad(){
         return view('backend.index');
    }
}