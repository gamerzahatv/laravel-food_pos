<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class admin_order extends Controller
{
    public function index(){
        $get_user = DB::table('order_details')
            ->join('users', 'users.id', '=', 'order_details.user_id')
            ->select('order_details.order_id', 'users.name', 'order_details.total', 'order_details.date_created')
            ->get();
        return view('admin.admin_order', ['get_user' => $get_user]);

    }

    public function info($id){
        $orderDetailsadmin = DB::table('order_details')
            ->select('products.product_image' 
            , 'users.name'
            , 'order_details.order_id'
            , 'products.id'
            , 'products.product_name'
            , 'products.product_price'
            , 'order_items.quantity'
            ,  'order_details.total'
            , 'order_details.date_created'
            ,DB::raw('products.product_price * order_items.quantity AS result_amount'))
            ->join('order_items', 'order_items.order_id', '=', 'order_details.order_id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->join('users', 'order_details.user_id','=', 'users.id')
            ->where('order_details.order_id','=' , $id)
            ->get();
            return view('admin.admin_order_info', ['orderDetailsadmin' => $orderDetailsadmin]);
    }
}
