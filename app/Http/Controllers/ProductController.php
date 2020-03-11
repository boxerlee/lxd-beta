<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductBrand;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function getType()
    {
        $data = ProductType::all();
        return response()->json(['type' => $data], 200);
    }

    public function getBrand()
    {
        $data = ProductBrand::all();
        return response()->json(['brand' => $data], 200);
    }

    public function getProducts()
    {
        $data = DB::table('tbl_product')
            ->join('tbl_product_brand', 'tbl_product.product_brand', '=', 'tbl_product_brand.product_brand_id')
            ->join('tbl_product_type', 'tbl_product.product_type', '=', 'tbl_product_type.product_type_id')
            ->get();
        return response()->json(['products' => $data], 200);
    }

    public function getProductsByType(Request $request)
    {
        $type = $request->query('type');
        $data = DB::table('tbl_product')
            ->join('tbl_product_brand', 'tbl_product.product_brand', '=', 'tbl_product_brand.product_brand_id')
            ->join('tbl_product_type', 'tbl_product.product_type', '=', 'tbl_product_type.product_type_id')
            ->where('tbl_product_type.product_type_url', '=', $type)
            ->get();
        return $data ? response()->json(['products' => $data], 200) : response()->json(['message' => 'NOT FOUND'], 404);
    }

    public function getProduct(Request $request)
    {
        $id = $request->query('id');
        $data = Product::find($id);
        return $data ? response()->json(['product' => $data], 200) : response()->json(['message' => 'NOT FOUND'], 404);
    }
    public function addProduct(Request $request)
    {
        $product = new Product;

        $file = $request->file('file');
        $imageUrl = Storage::disk('public')->put('upload', $file);

        $product->product_name = $request->name;
        $product->product_description = $request->description;
        $product->product_price = $request->price;
        $product->product_image_name = $imageUrl;
        $product->product_brand = $request->brand;
        $product->product_type = $request->type;

        $result = $product->save();

        return $result ? response()->json(['message' => 'OK'], 201) : response()->json(['message' => 'ERROR'], 500);
    }
}
