<?php

use PhpParser\Node\Stmt\Else_;

if (!function_exists("parseVideos")) {
    function parseVideos($yt_url = null)
    {
        $parts = parse_url($yt_url);
        if (isset($parts["query"])) {
            parse_str($parts["query"], $qs);
            if (isset($qs["v"])) {
                return $qs["v"];
            } elseif (isset($qs["vi"])) {
                return $qs["vi"];
            }
        }
        if (isset($parts["path"])) {
            $path = explode("/", trim($parts["path"], "/"));
            return $path[count($path) - 1];
        }

        return "";
    }
}

if (!function_exists("getClickableLinks")) {
    function getClickableLinks($clickstring, $type, $classval=NULL, $index = 0)
    {
        $clickable_links = "";
        if ($clickstring != "") {
            $temp_arr = explode(",", $clickstring);
            $temp_arr = array_map("trim", $temp_arr);

            if (!empty($temp_arr)) {
                if($index){
                    $temp = trim($temp_arr[$index]);
                    if ($type == "phone") {
                        $clickable_links .=
                            "<a " .
                            $classval .
                            " href='tel:" .
                            $temp .
                            "'>" .
                            $temp .
                            "</a>";
                    } elseif ($type == "email") {
                        $clickable_links .=
                            "<a " .
                            $classval .
                            " href='mailto:" .
                            $temp .
                            "'>" .
                            $temp .
                            "</a>";
                    } else {
                        $clickable_links .= "<a>" . $temp . "</a>";
                    }
                }
                else{
                    foreach ($temp_arr as $key => $temp) {
                        $temp = trim($temp);
                        if ($type == "phone") {
                            $clickable_links .=
                                "<a " .
                                $classval .
                                " href='tel:" .
                                $temp .
                                "'>" .
                                $temp .
                                "</a>";
                        } elseif ($type == "email") {
                            $clickable_links .=
                                "<a " .
                                $classval .
                                " href='mailto:" .
                                $temp .
                                "'>" .
                                $temp .
                                "</a>";
                        } else {
                            $clickable_links .= "<a>" . $temp . "</a>";
                        }
                        if ($key !== array_key_last($temp_arr)) {
                            $clickable_links .= " , ";
                        }
                    }
                }
              
            }
        }

        return $clickable_links;
    }
}



if (!function_exists("updateGoogleMap")) {
    function updateGoogleMap($googlemap_iframe, $height, $width)
    {
        if ($height != "") {
            $googlemap_iframe = preg_replace(
                '/height="(.*?)"/i',
                'height="' . $height . '"',
                $googlemap_iframe
            );
        }
        if ($width != "") {
            $googlemap_iframe = preg_replace(
                '/width="(.*?)"/i',
                'width="' . $width . '"',
                $googlemap_iframe
            );
        }

        return $googlemap_iframe;
    }
}

if (!function_exists("splitBannerTitle")) {
    function splitBannerTitle($banner_title_text)
    {
        $banner_title = [];
        $text = strip_tags($banner_title_text);
        $splitstring1 = substr($text, 0, floor(strlen($text) / 2));
        $splitstring2 = substr($text, floor(strlen($text) / 2));
        if (
            substr($splitstring1, 0, -1) != " " and
            substr($splitstring2, 0, 1) != " "
        ) {
            $middle = strlen($splitstring1) + strpos($splitstring2, " ") + 1;
        } else {
            $middle =
                strrpos(substr($text, 0, floor(strlen($text) / 2)), " ") + 1;
        }
        $banner_title = [
            isset($middle) ? substr($text, 0, $middle) : "",
            isset($middle) ? substr($text, $middle) : "",
        ];

        return $banner_title;
    }
}




if (!function_exists("send_email")) {
    function send_email(
        $to,
        $subject,
        $view,
        $data = [],
        $attachmentPath,
        $attachmentName
    ) {
        if ($attachmentPath == "" && $attachmentName == "") {
            Mail::send($view, $data, function ($message) use ($to, $subject) {
                $message->to($to)->subject($subject);
            });
        } else {
            Mail::send($view, $data, function ($message) use ($to,$subject,$attachmentPath,$attachmentName) {
                $message->to($to)->subject($subject)->attach($attachmentPath, ["as" => $attachmentName]);
            });
        }
    }
}

if(!function_exists("makeViberCall")){
    function makeViberCall($phoneNumber)
    {
        $viberURI = "viber://call?number=" . urlencode($phoneNumber);
        return $viberURI;
    }
}

if(!function_exists("makeWhatsAppCall")){
    function makeWhatsAppCall($phoneNumber)
    {
        $whatsAppURI = "https://api.whatsapp.com/send?phone=" . urlencode($phoneNumber);
        return $whatsAppURI;
    }
}

if (!function_exists("generateFallback")) {
    function getFallBackImage($width, $height, $type)
    {
        $fallbackpath = public_path("images/fallback/");
        $fallback_imagepath = asset("images/fallback/");
        $imageName = "fallback-" . $width . "x" . $height . ".png";

        if (!\File::isDirectory($fallbackpath)) {
            \File::makeDirectory($fallbackpath, 0777, true, true);
        }

        if (!file_exists($fallbackpath . "/" . $imageName)) {
            if($type == 'default'){
                $img = \Image::make(public_path("images/fallback-logo.png"));    
            } else if($type == 'menu'){
                $img = \Image::make(public_path("images/fallback-menu.png"));    
            } else {
                $img = \Image::make(public_path("images/user-avatar.png"));
            }
            
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->resizeCanvas($width, $height, "center", false, "#ffffff")->save($fallbackpath . $imageName);
        }
        return implode("/",[$fallback_imagepath,$imageName]);
    }
}

if (!function_exists("getResized")) {
    function getResized($image_name, $width, $height, $include_height_width=FALSE)
    {
        $resized_path = public_path("images/resized/");
        $resized_imagepath = asset("images/resized/");

        $image_name_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_name);
        $extension = pathinfo($image_name, PATHINFO_EXTENSION);

        if($include_height_width == TRUE){
            $imageName = $image_name_without_ext."-resized-" . $width . "x" . $height . ".".$extension;    
        } else {
           $imageName = $image_name_without_ext. ".".$extension;     
        }
        

        if (!\File::isDirectory($resized_path)) {
            \File::makeDirectory($resized_path, 0777, true, true);
        }

        if (!file_exists($resized_path . "/" . $imageName)) {
            $img = \Image::make(public_path("images/".$image_name));    
            
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->resizeCanvas($width, $height, "center", false, "#ffffff")->save($resized_path . $imageName);
        }
        return implode("/",[$resized_imagepath,$imageName]);
    }
}

if (!function_exists("getResizedWithFolder")) {
    function getResizedWithFolder($image_name, $width, $height, $folder)
    {
        $resized_path = public_path("images/resized/");
        $resized_imagepath = asset("images/resized/");

        $image_name_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', $image_name);
        $extension = pathinfo($image_name, PATHINFO_EXTENSION);

        $imageName = $image_name_without_ext."-resized-" . $width . "x" . $height . ".".$extension;

        if (!\File::isDirectory($resized_path)) {
            \File::makeDirectory($resized_path, 0777, true, true);
        }

        if (!file_exists($resized_path . "/" . $imageName)) {

            $folder_path = public_path("images/".$folder."/");
            $img = \Image::make($folder_path.$image_name);    
            
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->resizeCanvas($width, $height, "center", false, "#ffffff")->save($resized_path . $imageName);
        }
        return implode("/",[$resized_imagepath,$imageName]);
    }
}


if (!function_exists("getSectionHeadings")) {
    function getSectionHeadings($select_field)
    {
        $result = \DB::table("section_page_headings")
            ->select($select_field)
            ->value($select_field);
        return $result;
    }
}



