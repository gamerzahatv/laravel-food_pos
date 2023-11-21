<?php

namespace App\Http\Controllers\admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;

class adminhome extends Controller
{
    
    function index(){

        
        $count_user = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->where('model_has_roles.role_id', '=', 2)
            ->count();
        //$date_now_order = DB::table('users')

        $current_year = date('Y');

        $sum_year = date('Y') + 543;
        $bangkok_timezone = new DateTimeZone('Asia/Bangkok');
        $current_time = new DateTime('now', $bangkok_timezone);
        $current_time->modify('+543 years');

        $formatted_month = $current_time->format('F');
        $formatted_date = $current_time->format('j');
        $date_now_order = DB::table('order_details')
            ->where('order_details.date_created', 'LIKE', "$formatted_date% $formatted_month% $sum_year%")
            ->count();

        $total_now = DB::table('order_details')
            ->where('order_details.date_created', 'LIKE', "$formatted_date% $formatted_month% $sum_year%")
            ->select(DB::raw('SUM(total) as result'))
            ->get();
        
        $top_products = DB::table('order_items')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select('products.product_image', 'products.product_name', 'products.product_price', 'products.product_type', DB::raw('SUM(order_items.quantity) as total_quantity'))
            ->groupBy('order_items.product_id', 'products.product_image', 'products.product_name', 'products.product_price', 'products.product_type')
            ->orderByDesc('total_quantity')
            ->limit(10)
            ->get();
            
        if(Auth::user()->hasRole("admin")) {
            return view('admin.welcome_admin', [
                'count_user' => $count_user,
                'date_now_order' => $date_now_order,
                'total_now' => $total_now,
                'top_products' => $top_products

            ]);
        }else{
            return abort(404);
        }
        
        
    }

}