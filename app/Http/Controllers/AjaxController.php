<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function handle($action, Request $request)
    {
        if (method_exists($this, $action)) {
            return $this->{$action}($request);
        }

        abort(404, "Method {$action} not found in AjaxController");
    }
    // public function getEmployeeImage()
    // {
    //     $arrData = [];
    //     $total_images = 200;

    //     // Use placeholder images from picsum.photos (gives random real images)
    //     for ($i = 1; $i <= $total_images; $i++) {
    //         $arrData[$i] = "https://picsum.photos/200/200?random=" . $i;
    //     }

    //     return response()->json([
    //         "status" => 200,
    //         "images" => $arrData,
    //         "total_image" => $total_images
    //     ]);
    // }

    public function getEmployeeImage()
    {
        $getallphoto = DB::table('alumni')->where('status', 1)->get(['photo']);
        $arrData = [];

        $total_images = 200; // target total images
        $realCount = count($getallphoto);

        // Add real alumni photos
        foreach ($getallphoto as $photo) {
            $arrData[] = ROOT_URL . '/storage/app/public/alumniphoto/' . $photo->photo;
        }

        // Add placeholders to reach 200
        for ($i = $realCount; $i < $total_images; $i++) {
            $arrData[] = "https://picsum.photos/200/200?random=" . $i;
        }

        // 🔀 Randomize order on every call
        shuffle($arrData);

        return response()->json([
            "status" => 200,
            "images" => $arrData,
            "total_image" => $total_images
        ]);
    }
    public function countVisits(Request $res)
    {
        $input = $res->all();
        $id = $input['id'] ?? '';
        if ($id == '' || $id == null) {
            return response()->json([
                "status" => 400,
                'count' => 10000000000000000
            ]);
        }
        if ($id == 1) {
            DB::table('visits')->insert([
                'ip_address' => $res->ip() ?? '',
                'user_agent' => $res->header('User-Agent') ?? ''
            ]);
            $result = DB::table('visits')->count();
            return response()->json([
                "status" => 200,
                'count' => $result
            ]);
        } else if ($id == 2) {
            $result = DB::table('visits')->count();
            return response()->json([
                "status" => 200,
                'count' => $result
            ]);
        }
    }
}
