<?php

namespace App\Utilities;

use File, Image;

class ImageUploadUtilities
{
    public static $upload_path;
    public static $upload_thumb_path;

    public static function setData($upload_path, $upload_thumb_path)
    {
        self::$upload_path = public_path($upload_path);
        self::$upload_thumb_path = public_path($upload_thumb_path);
        if (!File::isDirectory(self::$upload_path)) {
            File::makeDirectory(self::$upload_path, 0777, true, true);
        }

        if (!File::isDirectory(self::$upload_thumb_path)) {
            File::makeDirectory(self::$upload_thumb_path, 0777, true, true);
        }
    }
    public static function uploadWithouThumb($request,$imgindex,$upload_path, $variable){
        if($request->hasFile($imgindex)){
        $img_tmp =$request->file($imgindex);
        $extension = $img_tmp->getClientOriginalExtension();
        $filename = time() . "." . $extension;
        $image = Image::make($img_tmp)->save($upload_path. $filename);
        return $filename;
        }
        else{
            return $filename = '';
        }

    }
    public static function updateWithoutThumb($request,$imgindex, $upload_path, $oldimg){
        if ($request->hasFile($imgindex)) {
            File::delete($upload_path . $oldimg);
            $img_tmp = $request->file($imgindex);
            $extension = $img_tmp->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $image = Image::make($img_tmp)->save($upload_path . $filename);
            $bannerDataToUpdate["banner_image"] = $filename;
            return $filename;
        }

    }

    public static function ImgUploadWithThumb($upload_path, $thumb_path,$imgIndex,$request, $thumb_width,$thumb_height){
        if(!File::isDirectory($upload_path)) {
            File::makeDirectory($upload_path, 0777, true, true);
        }

        if (!File::isDirectory($thumb_path)) {
            File::makeDirectory($thumb_path, 0777, true, true);
        }


        if (gettype($imgIndex) == 'array') {
            $filenamelist = [];
            for ($i=0; $i < count($imgIndex) ; $i++) {
                $img_tmp = $request->file($imgIndex[$i]);
                $extension = $img_tmp->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                Image::make($img_tmp->getRealPath())->save($upload_path . $filename);
                Image::make($img_tmp->getRealPath())->resize($thumb_width, $thumb_height)->save($thumb_path . $filename);
                array_push($filenamelist,$filename);
            }

        }

        if ($request->hasFile($imgIndex)) {
            $img_tmp = $request->file($imgIndex);
            $extension = $img_tmp->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            Image::make($img_tmp->getRealPath())->save($upload_path . $filename);
            Image::make($img_tmp->getRealPath())->resize($thumb_width, $thumb_height)->save($thumb_path . $filename);
                 return $filename;
        }

    }
    public static function ImgUpdateWithThumb($upload_path, $thumb_path,$imgIndex,$request,$thumb_width,$thumb_height,$oldimg){
        if (!File::isDirectory($upload_path)) {
            File::makeDirectory($upload_path, 0777, true, true);
        }

        if (!File::isDirectory($thumb_path)) {
            File::makeDirectory($thumb_path, 0777, true, true);
        }

        if ($request->hasFile($imgIndex)) {

            File::delete($upload_path . $oldimg);
            File::delete($thumb_path . $oldimg);

            $img_tmp = $request->file($imgIndex);
            $extension = $img_tmp->getClientOriginalExtension();
            $filename = time() . "." . $extension;


            Image::make($img_tmp->getRealPath())
                // ->resize($this->width, $this->height)
                ->save($upload_path . $filename);

            Image::make($img_tmp->getRealPath())
                ->resize($thumb_width, $thumb_height)
                ->save($thumb_path  . $filename);

             return  $filename;
        }


    }

        // public static function ImgUploadWithThumb($tempSource, $thumbSource,         , $upload_thumb_path, $imgData, $oldImgData)
        // {
        //     self::setData($upload_path, $upload_thumb_path);
        //     if (gettype($imgData) == "array") {
        //         for ($i = 0; $i < count($imgData); $i++) {
        //             File::move(public_path($tempSource . $imgData[$i]), $upload_path . $imgData[$i]);
        //             File::move(public_path($thumbSource . $imgData[$i]), $upload_thumb_path . $imgData[$i]);
        //             File::delete(public_path($tempSource . $imgData[$i]));
        //             File::delete(public_path($thumbSource . $imgData[$i]));
        //             File::delete($upload_path . $oldImgData[$i]);
        //             File::delete($upload_thumb_path . $oldImgData[$i]);
        //         }
        //     } else {
        //         dd("working");
        //         File::move(public_path($tempSource . $imgData), $upload_path . $imgData);
        //         File::move(public_path($thumbSource . $imgData), $upload_thumb_path . $imgData);
        //         File::delete(public_path($tempSource . $imgData));
        //         File::delete(public_path($thumbSource . $imgData));
        //         File::delete($upload_path . $oldImgData);
        //         File::delete($upload_thumb_path . $oldImgData);
        //     }
        // }
}

/* name :- @Manish_Ray, github:manishroy090
 This Utilite Class is usefull for Image Store(temp and thumb)
   Note: command_param tempsouce,thumbsource,upload_path,upload_thumb_path,imgData,oldImgData
   You Can Also used for single and multiple image .But for Multiple Image You have to pass two array one is For imgData(coming From Request)
  and another Array(For old Image Fetch through query)