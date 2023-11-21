<?php

namespace App\Http\Controllers\admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class admin_product extends Controller
{
    public function index()
    {

        if (!Auth::check() || !Auth::user()->hasAnyRole(['admin', 'User'])) {
            return abort(404);
        }
        $fetch_product = products::paginate(10); // number page 
        return view('admin.admin_product', compact('fetch_product'));
    }

    public function add_product(Request $request)
    {

        $request->validate([
            'id_product' => 'required',
            'name_product' => 'required',
            'price_product' => 'required',
            'desc_product' => 'required',
            'typelist_product' => 'required'
        ]);

        $add_product = new products;
        $add_product->product_id = $request->id_product;
        $add_product->product_name = $request->name_product;
        $add_product->product_desc = $request->desc_product;
        $add_product->product_price = $request->price_product;
        $add_product->product_type = $request->typelist_product;


        //end image upload

        $file = $request->file('image_product');
      

        if ($file) {
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path("product_image"), $filename);
            $add_product['product_image'] = $filename;
            $upload_loc = '/product_image/';
            $full_path = $upload_loc . $filename;
            $real = "product_image" . $filename;
            $add_product->product_image = $full_path;

            $add_product->save();
            return redirect()->route('indexproduct');
        } else {
            $defaultimage = "/default_image/default_food.png";
            $add_product->product_image = $defaultimage;
            $add_product->save();
            return redirect()->route('indexproduct');
        }
    }

    public function product_info($id)
    {
        $fetch_product_info = products::find($id);

        return view('admin.admin_product_info', compact('fetch_product_info'));
    }


    public function product_del($id)
    {
        //$fetch_product_del=products::find($id)->delete();
        $fetch_product_del = products::find($id);
        if (!$fetch_product_del) {
            // If the product record doesn't exist, return an error
            return response()->json(['error' => 'Product not found.'], 404);
        }
        $fetch_product_del->delete();
        $imagePath = public_path($fetch_product_del->product_image);
        $defaultImagePath = public_path('/product_image/default_food.png');
        if ($imagePath !== $defaultImagePath &&file_exists($imagePath) && is_writable($imagePath)) {
            if (!unlink($imagePath)) {
                // If the file deletion fails, return an error
                return response()->json(['error' => 'Unable to delete product image.'], 500);
            }
        } else {
            // If the file doesn't exist or is not writable, log a warning
            Log::warning('Product image file not found or is not writable: ' . $imagePath);
        }


        return redirect()->route('indexproduct');
    }

    public function product_edit(Request $request)
    {
        $file = $request->file('imageedit_product');
        $trueidproduct = $request->input('get_id_product');
        $idproduct = $request->input('id_product');
        $name_product = $request->input('name_product');
        $price_product = $request->input('price_product');
        $select_type  = $request->input('typelist_product');
        if ($file == null) {
            $update_product_noimg  = DB::table('products')
            ->where('id', '=', $trueidproduct )
            ->update(['product_id' =>$idproduct , 
            'product_name' =>$name_product,
            'product_type' =>$select_type,
            'product_price' =>$price_product]);
            return redirect()->route('indexproduct');
        }else{
            //delete old image
            $getoldimage = DB::table('products')
            ->where('id', '=', $trueidproduct)
            ->select('product_image')
            ->value('product_image');
            $path = public_path($getoldimage); //old image path delete                
            if ($getoldimage) {
                if (file_exists($path)) {
                    unlink($path);
                }
                
            }
            //upload new  image to db
            $resultfilename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path("product_image"), $resultfilename);
            $upload_loc = '/product_image/';
            $full_path = $upload_loc . $resultfilename;
            $update_image_product  = DB::table('products')
            ->where('id', '=', $trueidproduct )
            ->update(['product_id' =>$idproduct , 
            'product_name' =>$name_product,
            'product_type' =>$select_type,
            'product_image' => $full_path,
            'product_price' =>$price_product]);
            return redirect()->route('indexproduct');
        }
    }

    public function getproduct_id(Request $request)
    {
        $getproductid = $request->input('id');
        $fetchproductid = products::find($getproductid);
        return response()->json($fetchproductid);
    }
}
