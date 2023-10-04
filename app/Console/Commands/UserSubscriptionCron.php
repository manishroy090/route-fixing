<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Mail;

class UserSubscriptionCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "usersubscription:cron";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Notifies the merchant user if subscription is going to expire on 15 days, 7 days, 3 days and 1 day";

    /**
     * Create a new command instance.
     *
     * @return void
     */

    private $one_month_date, $fortnight_date, $weekdate, $threeday_date, $today;

    public function __construct()
    {
        parent::__construct();
        $this->one_month_date = Carbon::now()
            ->addMonth()
            ->format("Y-m-d");
        $this->fortnight_date = Carbon::now()
            ->addDays(14)
            ->format("Y-m-d");
        $this->weekdate = Carbon::now()
            ->addDays(7)
            ->format("Y-m-d");
        $this->threeday_date = Carbon::now()
            ->addDays(3)
            ->format("Y-m-d");
        $this->today = Carbon::now()->format("Y-m-d");
        $this->onedayago = Carbon::now()
            ->subDay()
            ->format("Y-m-d");
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info("User Subscription Cron is working fine!");

        $month_data = \App\Model\UserSubscriptions::
            whereDate(
                "user_subscription_end_date",
                "<=",
                $this->one_month_date
            )
            ->get();
        $onedayago_data = \App\Model\UserSubscriptions::whereDate(
            "user_subscription_end_date",
            "=",
            $this->onedayago
        )->get();

        if ($month_data->isNotEmpty()) {
            foreach ($month_data as $monthly_notification) {
                $email = $monthly_notification->user->email;
                $current_package_details = $monthly_notification
                    ->package()
                    ->orderBy("created_at", "DESC")
                    ->first()
                    ->toArray();
                
                $startDate = Carbon::parse($this->today);
                $endDate = Carbon::parse($monthly_notification->user_subscription_end_date);
  
                $days = $startDate->diffInDays($endDate);
                $name = $monthly_notification->user->name;

                if ($days == 30) {
                    $expiry_date = Carbon::parse($this->one_month_date)->format(
                        "M d, Y"
                    );
                    send_email(
                        $email,
                        "RENEWAL ALERT: Your Subscription package is expiring in a month ",
                        "mail.subscription_notifications.monthly_notifications",
                        [
                            "details" => [
                                "name" => $name,
                                "description" =>
                                    "Your subscription package will expire on <b>" .
                                    $expiry_date .
                                    "</b> so you'll need to renew by then to keep your service active. Don't worry if you're not ready to renew just yet, we'll remind you closer to the time, so you don't miss the deadline.",
                                "package" => !empty($current_package_details)
                                    ? $current_package_details
                                    : [],
                            ],
                        ],
                        "",
                        ""
                    );
                    \Log::info(
                        "User Subscription Monthly alert sent to email " .
                            $email
                    );
                }

                else if ($days == 14) {
                    $expiry_date = Carbon::parse($this->fortnight_date)->format(
                        "M d, Y"
                    );
                    send_email(
                        $email,
                        "RENEWAL ALERT: Your Subscription package is expiring in 2 weeks",
                        "mail.subscription_notifications.monthly_notifications",
                        [
                            "details" => [
                                "name" => $name,
                                "description" =>
                                    "Your subscription package will expire on <b>" .
                                    $expiry_date .
                                    "</b> so you'll need to renew by then to keep your service active. Don't worry if you're not ready to renew just yet, we'll remind you closer to the time, so you don't miss the deadline.",
                                "package" => !empty($current_package_details)
                                    ? $current_package_details
                                    : [],
                            ],
                        ],
                        "",
                        ""
                    );
                    \Log::info(
                        "User Subscription Fortnightly alert sent to email " .
                            $email
                    );
                }

                else if ($days == 7) {
                    $expiry_date = Carbon::parse($this->weekdate)->format(
                        "M d, Y"
                    );
                    send_email(
                        $email,
                        "RENEWAL ALERT: Your Subscription package is expiring in just a Week",
                        "mail.subscription_notifications.monthly_notifications",
                        [
                            "details" => [
                                "name" => $name,
                                "description" =>
                                    "Your subscription package will expire on <b>" .
                                    $expiry_date .
                                    "</b> so you'll need to renew by then to keep your service active. Don't worry if you're not ready to renew just yet, we'll remind you closer to the time, so you don't miss the deadline.",
                                "package" => !empty($current_package_details)
                                    ? $current_package_details
                                    : [],
                            ],
                        ],
                        "",
                        ""
                    );
                    \Log::info(
                        "User Subscription Weekly alert sent to email " . $email
                    );
                }

                else if ($days == 3) {
                    $expiry_date = Carbon::parse($this->threeday_date)->format(
                        "M d, Y"
                    );
                    send_email(
                        $email,
                        "RENEWAL ALERT: Your Subscription package is expiring in just 3 Days",
                        "mail.subscription_notifications.monthly_notifications",
                        [
                            "details" => [
                                "name" => $name,
                                "description" =>
                                    "Your subscription package will expire on <b>" .
                                    $expiry_date .
                                    "</b> so hurry up to renew and keep your service active.",
                                "package" => !empty($current_package_details)
                                    ? $current_package_details
                                    : [],
                            ],
                        ],
                        "",
                        ""
                    );
                    \Log::info(
                        "User Subscription 3 Days alert sent to email " . $email
                    );
                }

                else if ($days == 0) {
                    $expiry_date = Carbon::parse($this->today)->format(
                        "M d, Y"
                    );
                    send_email(
                        $email,
                        "RENEWAL ALERT: Your Subscription package is expiring in 24 Hours",
                        "mail.subscription_notifications.monthly_notifications",
                        [
                            "details" => [
                                "name" => $name,
                                "description" =>
                                    "Your subscription package will expire on <b>" .
                                    $expiry_date .
                                    "</b> you may experience an interruption to your service but if you'd like to keep your service active you'll need to renew today.",
                                "package" => !empty($current_package_details)
                                    ? $current_package_details
                                    : [],
                            ],
                        ],
                        "",
                        ""
                    );
                    \Log::info(
                        "User Subscription 24 hrs alert sent to email " . $email
                    );
                }
            }
        }

        if ($onedayago_data->isNotEmpty()) {
            foreach ($onedayago_data as $onedayago_alert) {
                $email = $onedayago_alert->user->email;
                $expiry_date = Carbon::parse($this->onedayago)->format(
                    "M d, Y"
                );
                send_email(
                    $onedayago_alert->user->email,
                    "Expired: Your Subscription package expired",
                    "mail.subscription_notifications.monthly_notifications",
                    [
                        "details" => [
                            "name" => $onedayago_alert->user->name,
                            "description" =>
                                "Your subscription package expired on <b>" .
                                $expiry_date .
                                "</b> to keep your service active you'll need to renew.",
                            "package" => [],
                        ],
                    ],
                    "",
                    ""
                );
                \Log::info(
                    "User Subscription expired alert sent to email " . $email
                );
            }
        }
    }
}
