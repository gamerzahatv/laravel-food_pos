<?php

namespace App\Http\Controllers\member;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\User;
use App\Models\shopping_session;
use App\Models\cart_item;
use DateTime;
use DateTimeZone;




use Illuminate\Support\Facades\DB;

class  indexcontrol extends Controller
{
    public function index()
    {
        // product top seller 
        $topsell = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('order_details', 'order_details.order_id', '=', 'order_items.order_id')
            ->select('products.id','products.product_image', 'products.product_name','products.product_price', 'products.product_type', DB::raw('SUM(order_items.quantity) as result'))
            ->where('products.product_type','=','กับข้าว')
            ->groupBy('products.id', 'products.product_name', 'products.product_type' ,'products.product_price','products.product_image')
            ->orderByDesc('result')
            ->limit(9)
            ->get();
        $data = products::all();
        return view('index', [
            'data' => $data ,
            'topsell' => $topsell
        ]);
    }

    //topseller:topsell="$topsell
    public function top_side_dish(Request $request){
        $topsell= DB::table('order_items')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->join('order_details', 'order_details.order_id', '=', 'order_items.order_id')
        ->select('products.id','products.product_image', 'products.product_name','products.product_price', 'products.product_type', DB::raw('SUM(order_items.quantity) as result'))
        ->where('products.product_type','=','กับข้าว')
        ->groupBy('products.id', 'products.product_name', 'products.product_type' ,'products.product_price','products.product_image')
        ->orderByDesc('result')
        ->limit(9)
        ->get();
        return view('components.indexcomponent.index_topsell', ['topsell' => $topsell]);
    }
    public function top_noodle(Request $request)
    {
        $topsell= DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('order_details', 'order_details.order_id', '=', 'order_items.order_id')
            ->select('products.id','products.product_image', 'products.product_name','products.product_price', 'products.product_type', DB::raw('SUM(order_items.quantity) as result'))
            ->where('products.product_type','=','เมนูเส้น')
            ->groupBy('products.id', 'products.product_name', 'products.product_type' ,'products.product_price','products.product_image')
            ->orderByDesc('result')
            ->limit(9)
            ->get();
        return view('components.indexcomponent.index_topsell', ['topsell' => $topsell]);
    }
    public function top_sweet(Request $request)
    {
        $topsell= DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('order_details', 'order_details.order_id', '=', 'order_items.order_id')
            ->select('products.id','products.product_image', 'products.product_name','products.product_price', 'products.product_type', DB::raw('SUM(order_items.quantity) as result'))
            ->where('products.product_type','=','ของหวาน')
            ->groupBy('products.id', 'products.product_name', 'products.product_type' ,'products.product_price','products.product_image')
            ->orderByDesc('result')
            ->limit(9)
            ->get();
        return view('components.indexcomponent.index_topsell', ['topsell' => $topsell]);
    }
    public function top_fried_rice(Request $request)
    {
        $topsell= DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('order_details', 'order_details.order_id', '=', 'order_items.order_id')
            ->select('products.id','products.product_image', 'products.product_name','products.product_price', 'products.product_type', DB::raw('SUM(order_items.quantity) as result'))
            ->where('products.product_type','=','ข้าวผัด')
            ->groupBy('products.id', 'products.product_name', 'products.product_type' ,'products.product_price','products.product_image')
            ->orderByDesc('result')
            ->limit(9)
            ->get();
        return view('components.indexcomponent.index_topsell', ['topsell' => $topsell]);
    }
    public function top_snackbox(Request $request)
    {
        $topsell= DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('order_details', 'order_details.order_id', '=', 'order_items.order_id')
            ->select('products.id','products.product_image', 'products.product_name','products.product_price', 'products.product_type', DB::raw('SUM(order_items.quantity) as result'))
            ->where('products.product_type','=','สเน็คบ๊อก')
            ->groupBy('products.id', 'products.product_name', 'products.product_type' ,'products.product_price','products.product_image')
            ->orderByDesc('result')
            ->limit(9)
            ->get();
        return view('components.indexcomponent.index_topsell', ['topsell' => $topsell]);
    }

    public function top_drink(Request $request)
    {
        $topsell= DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('order_details', 'order_details.order_id', '=', 'order_items.order_id')
            ->select('products.id','products.product_image', 'products.product_name','products.product_price', 'products.product_type', DB::raw('SUM(order_items.quantity) as result'))
            ->where('products.product_type','=','เครื่องดื่ม')
            ->groupBy('products.id', 'products.product_name', 'products.product_type' ,'products.product_price','products.product_image')
            ->orderByDesc('result')
            ->limit(9)
            ->get();
        return view('components.indexcomponent.index_topsell', ['topsell' => $topsell]);
    }



    // select menu 
    public function product_allmenu(Request $request)
    {
        $data = products::all();
        return view('components.indexcomponent.index_body_buy', ['data' => $data]);
    }
    public function product_sidedish(Request $request)
    {
        $data = products::all()->where('product_type', '=', 'กับข้าว');
        return view('components.indexcomponent.index_body_buy', ['data' => $data]);
    }
    public function product_drink(Request $request)
    {
        $data = products::all()->where('product_type', '=', 'เครื่องดื่ม');
        return view('components.indexcomponent.index_body_buy', ['data' => $data]);
    }
    public function product_friedrice(Request $request){
        $data = products::all()->where('product_type', '=', 'ข้าวผัด');
        return view('components.indexcomponent.index_body_buy', ['data' => $data]);
    }

    public function product_sweet(Request $request)
    {
        $data = products::all()->where('product_type', '=', 'ของหวาน');
        return view('components.indexcomponent.index_body_buy', ['data' => $data]);
    }
    public function product_snackbox(Request $request)
    {
        $data = products::all()->where('product_type', '=', 'สเน็คบ๊อก');
        return view('components.indexcomponent.index_body_buy', ['data' => $data]);
    }
    public function product_noodle(Request $request)
    {
        $data = products::all()->where('product_type', '=', 'เมนูเส้น');
        return view('components.indexcomponent.index_body_buy', ['data' => $data]);
    }



    public function cart_manage(Request $request){
        $id = $request->input('id');
        $user = auth()->user()->id;
        $bangkok_time = Carbon::now('Asia/Bangkok');
        $formatted_time = $bangkok_time->format('F j, Y g:i A');



                // Check if the item already exists in the cart
        $existing_cart_item = cart_item::where('product_id', $id)
            ->whereHas('session', function($query) use($user) {
                $query->where('user_id', $user)->where('status', 0);
            })
            ->first();



        if(!$existing_cart_item ){
            // Create new shopping session
            $add_to_shopping_session = new shopping_session();
            $add_to_shopping_session->user_id = $user;
            $add_to_shopping_session->created_at = $formatted_time;
            $add_to_shopping_session->status = 0;
            $add_to_shopping_session->total = 0;

            $add_to_shopping_session->save();

            if($add_to_shopping_session){
                            // Create new cart item
                $add_to_cart_item = new cart_item();
                $add_to_cart_item->session_id = $add_to_shopping_session->id;
                $add_to_cart_item->product_id = $id;
                $add_to_cart_item->quantity = 1;
                $add_to_cart_item->save();

                if($add_to_cart_item){
                    //cal all total
                    $resulttotal = DB::table('cart_item')
                        ->join('shopping_session', 'shopping_session.id', '=', 'cart_item.session_id')
                        ->join('products', 'products.id', '=', 'cart_item.product_id')
                        ->where('shopping_session.status', '=', 0)
                        ->where('shopping_session.user_id', '=', $user)
                        ->where('cart_item.product_id', '=', $id)
                        ->select(DB::raw('products.product_price * cart_item.quantity as resultplus'))
                        ->first();
                    $getresulttotal = $resulttotal->resultplus;
                    // Update the shopping session's total
                    //$add_to_shopping_session->total += $add_to_shopping_session->total;
                    $add_to_shopping_session->total = $getresulttotal;
                    $add_to_shopping_session->save();
                }
            }
        

            

        }
        else{
            if($existing_cart_item ){
                // Update the quantity of the existing cart item
                $existing_cart_item->quantity += 1;
                $existing_cart_item->save();
                if($existing_cart_item){
                //$get_product = $existing_cart_item->product_id 
                    if (DB::table('shopping_session')->where('user_id', $user)->where('status', 0)->exists()) {
                        $session = shopping_session::where('user_id', $user)->where('status', 0)->first();
                        $getproduct = DB::table('cart_item')
                            ->join('products', 'products.id', '=', 'cart_item.product_id')
                            ->select('products.product_price as totalresult')
                            ->where('cart_item.product_id', '=', $id)
                            ->first();
                        $getresultsumtotal = $getproduct->totalresult;
                        $session->total += $getresultsumtotal;
                        $session->save();
                    }
                }
            }

            
        }
        $get_allcount_cart = DB::table('cart_item')
            ->join('shopping_session', 'cart_item.session_id', '=', 'shopping_session.id')
            ->where('shopping_session.status', 0)
            ->where('shopping_session.user_id', $user)
            ->selectRaw('SUM(cart_item.quantity) as total')
            ->first();
        $gettotal = $get_allcount_cart->total;

        if(request()->ajax()){
            return response()->json([
                'total' => $gettotal,
            ]);
        }
        
    }



}