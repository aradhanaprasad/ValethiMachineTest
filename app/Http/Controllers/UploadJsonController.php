<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;

class UploadJsonController extends Controller
{
    public function index(Request $request)
    {
        try {
            $filename = $request->uploadJson;
            $data = file_get_contents($filename);
            $fileData = json_decode($data);

            foreach ($fileData->products as $item) {
                $product = Product::updateOrCreate([
                    'Product_Code' => $item->Product_Code,
                ], [
                    'Product_Name' => $item->Product_Name,
                    'UPC' => $item->UPC,
                    'Category_Name' => $item->Category_Name,
                    'Manufacture' => $item->Manufacture,
                    'Description' => $item->Description,
                ]);
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function data()
    {
        try {
            $product = Product::get();
            return DataTables::of($product)
            ->make(true);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
