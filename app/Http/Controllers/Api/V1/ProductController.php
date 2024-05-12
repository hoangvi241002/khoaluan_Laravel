<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicalDevice;

class ProductController extends Controller
{

    public function get_popular_products(Request $request)
    {

        $list = MedicalDevice::where('type_id', 2)->take(10)->orderBy('created_at', 'DESC')->get();

        foreach ($list as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] = $Content = preg_replace("/&#?[a-z0-9]+;/i", " ", $item['description']);
            unset($item['selected_people']);
            unset($item['people']);
        }

        $data =  [
            'total_size' => $list->count(),
            'type_id' => 2,
            'offset' => 0,
            'products' => $list
        ];

        return response()->json($data, 200);
    }
    public function get_recommended_products(Request $request)
    {
        $list = MedicalDevice::where('type_id', 3)->take(10)->orderBy('created_at', 'DESC')->get();

        foreach ($list as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] = $Content = preg_replace("/&#?[a-z0-9]+;/i", " ", $item['description']);
            unset($item['selected_people']);
            unset($item['people']);
        }

        $data =  [
            'total_size' => $list->count(),
            'type_id' => 3,
            'offset' => 0,
            'products' => $list
        ];

        return response()->json($data, 200);
    }

    public function search_products(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request
        $keyword = $request->input('keyword');

        // Truy vấn các sản phẩm từ cơ sở dữ liệu
        $result = MedicalDevice::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('description', 'like', '%' . $keyword . '%')
            ->orderBy('created_at', 'DESC')
            ->take(3)
            ->get();

        foreach ($result as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] = preg_replace("/&#?[a-z0-9]+;/i", " ", $item['description']);
            unset($item['selected_people']);
            unset($item['people']);
        }

        // Trả về kết quả dưới dạng JSON
        $data = [
            'total_size' => $result->count(),
            'keyword' => $keyword,
            'offset' => 0,
            'products' => $result
        ];

        return response()->json($data, 200);
    }







    public function test_get_recommended_products(Request $request)
    {

        $list = MedicalDevice::skip(5)->take(2)->get();

        foreach ($list as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] = $Content = preg_replace("/&#?[a-z0-9]+;/i", " ", $item['description']);
        }

        $data =  [
            'total_size' => $list->count(),
            'limit' => 5,
            'offset' => 0,
            'products' => $list
        ];
        return response()->json($data, 200);
        // return json_decode($list);
    }
}
