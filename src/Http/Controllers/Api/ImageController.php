<?php

namespace Davidaprilio\LaravelStarter\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Intervention\Image\ImageManager;


class ImageController extends Controller
{
    /**
     * Api Image Resize
     * 
     * @return Json
     */
    public function resize()
    {
        $image = new ImageManager();
        $image = $image->make(public_path('/pinguin.png'));
        $ext = $image->extension;

        $image->resize(50, 50);
        // getOriginalContent
        return $image->response($ext);
    }
}
