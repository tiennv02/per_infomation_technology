<?php
/**
 * Created by PhpStorm.
 * User: forever-pc
 * Date: 31/07/2016
 * Time: 11:31 CH
 */

namespace App\Util;

use App\Http\Responses\Response;
use Image;

class UploadFile
{
    public function uploadFile($image, $path)
    {
        $data = new Response();
        try {
            if ($image) {
                Image::make($image->getRealPath())->resize(300, 300)->save($path);
                return $data;
            }
        } catch (Exception $e) {
            $data->setResultCode(Constants::$_resultCode["ERROR"]);
            $data->setResultMessage($e);
        }
        return $data;
    }
}