<?php

namespace App\Http\Controllers\member;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class order_history extends Controller
{
    public function index() {
        $user_id = auth()->user()->id;
        $display_orderhistory = DB::table('order_details')
            ->select('order_id', 'total', 'date_created')
            ->where('user_id', $user_id)
            ->orderBy('date_created', 'Desc')
            ->get();
    
            return view('member.member_order_history', ['result' => $display_orderhistory]);
    }

    public function viewinfo_bill($idbill){
        $user_id = Auth::id();
       

        $orderDetails = DB::table('order_details')
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
            ->where('order_details.user_id','=', $user_id)
            ->where('order_details.order_id','=' , $idbill)
            ->get();
            return view('member.order_history_info', ['orderDetails' => $orderDetails]);


    }
}
