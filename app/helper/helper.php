<?php

use Intervention\Image\Facades\Image;



    function responseJson($status, $message, $data = null)
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    
        return response()->json($response);
    }

    function uploadImage($upload, $resize_width = 495, $resize_height = 750){
        $filename = rand().time().'.'.$upload->getClientOriginalExtension();
        $filePath = public_path('uploads/').$filename;
        $thumbPath = public_path('uploads/thumbs/').$filename;
        $image = Image::make($upload);
        $thumb = Image::make($upload)->resize($resize_width, $resize_height)->encode($upload->getClientOriginalExtension(), 75);
        $image->save($filePath);
        $thumb->save($thumbPath);
        return $filename;
}