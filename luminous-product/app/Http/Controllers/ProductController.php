<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UserAccess;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function getProducts(Request $request)
    {

        $userid = $request->uid;
        //dd($userid);

        $title = $request->query("title");
        $catId = $request->query("category_id");
        $brand = $request->query("brand");
        $range_by = $request->query("range_by");
        $min = $request->query("min");
        $max = $request->query("max");
        $gender = $request->query("gender");
        $material = $request->query("material");
        $color = $request->query("color");
        $size = $request->query("size");
        $transferStatus = $request->query("transferStatus");
        //dd($catId);

        $page = $request->query('page', 1);
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $category_id = UserAccess::where('user_id',$userid)->pluck('accessable_categories')->first();

        // if($catId == null){
        //     $productlist = Product::whereIn('category_id',$category_id)->with('products_addition_info');
        // }

        $productlist = Product::whereIn('category_id',$category_id)
        ->leftJoin('mp_product_additional_info','marketplace_products.id','=','mp_product_additional_info.product_id');

        if($title){
            $productlist = $productlist->where('name','LIKE','%'.$title.'%');
        }
        if($catId){
            $productlist = $productlist->where('category_id',$catId);
         // $productlist = Product::where('category_id',$catId)->with('products_addition_info');
        }
        if($brand){
            $productlist = $productlist->where('brand',$brand)->with('product_brand');
        }
        if(in_array($range_by,['ek_price','vk_price']) && $max){
            $productlist = $productlist->where($range_by,'>',$min)->where($range_by,'<',$max);
        }
        if(in_array($gender,['m','f'])){
            $productlist = $productlist->where('gender',$gender);
        }
        if($material){
            $productlist = $productlist->where('material',$material);
        }
        if($color){
            $productlist = $productlist->where('item_color',$color);
        }
        if($size){
            $productlist = $productlist->where('item_size',$size);
        }
        if($transferStatus==1){
            $productlist = $productlist->join('mp_core_drm_transfer_products',
            'marketplace_products.id','=','mp_core_drm_transfer_products.marketplace_product_id')
            ->where('mp_core_drm_transfer_products.user_id',$userid);
        }


        // $productlist = $productlist->paginate(10, ['*'], 'page', $page);
        // return response()->json($productlist);

        return $productlist->offset($offset)->limit($limit)->get();

    }

}
