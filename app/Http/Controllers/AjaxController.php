<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function handle($action, Request $request)
    {
        if (method_exists($this, $action)) {
            return $this->{$action}($request);
        }

        abort(404, "Method {$action} not found in AjaxController");
    }
    public function getEmployeeImage()
    {
        $arrData = [];
        $total_images = 200;

        // Use placeholder images from picsum.photos (gives random real images)
        for ($i = 1; $i <= $total_images; $i++) {
            $arrData[$i] = "https://picsum.photos/200/200?random=" . $i;
        }

        return response()->json([
            "status" => 200,
            "images" => $arrData,
            "total_image" => $total_images
        ]);
    }
}
