<?php

namespace App\Http\Controllers\member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use App\Models\cart_item;
use App\Models\order_details;
use DateTime;
use DateTimeZone;

class cart_member extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $cartItems = DB::table('cart_item')
            ->join('products', 'cart_item.product_id', '=', 'products.id')
            ->join('shopping_session', 'cart_item.session_id', '=', 'shopping_session.id')
            ->where('shopping_session.status', 0)
            ->where('shopping_session.user_id', $user_id)
            ->select('cart_item.id', 'cart_item.session_id', 'products.product_image', 'products.product_name', 'products.product_price', 'cart_item.quantity', 'products.product_type', DB::raw('(products.product_price * cart_item.quantity) as unitmulitpy'))
            ->get();

        $result = DB::table('shopping_session')
            ->where('shopping_session.user_id', $user_id)
            ->where('shopping_session.status', 0)
            ->selectRaw('SUM(shopping_session.total) as resulttotal')
            ->first();
        return view('member.cart_member', [
            'cartItems' => $cartItems,
            'result' => $result->resulttotal,
        ]);
    }

    public function increase($id)
    {
        $user_id = Auth::id();
        $itemplus = cart_item::find($id);
        $itemplus->quantity += 1;
        $itemplus->save();
        $cal_total = DB::table('cart_item')
            ->select(DB::raw('products.product_price * cart_item.quantity as totalcal'))
            ->join('products', 'cart_item.product_id', '=', 'products.id')
            ->where('cart_item.id', '=', $id)
            ->first();
        if ($itemplus) {
            $result_plus = DB::table('cart_item')
                ->select('cart_item.quantity')
                ->join('shopping_session', 'cart_item.session_id', '=', 'shopping_session.id')
                ->where('cart_item.id', '=', $id)
                ->update(['total' => $cal_total->totalcal]);
            if ($result_plus) {
                $cal = DB::table('cart_item')
                    ->selectRaw('SUM(shopping_session.total) AS cal')
                    ->join('shopping_session', 'cart_item.session_id', '=', 'shopping_session.id')
                    ->where('shopping_session.status', '=', 0)
                    ->where('shopping_session.user_id', '=', $user_id)
                    ->first();
            } else {
                // The update failed, do something here
                $itemplus = false;
            }
        }
        $getqty = DB::table('cart_item')
            ->select(DB::raw('cart_item.quantity as getqty'))
            ->where('cart_item.id', '=', $id)
            ->first();
    }

    public function decrease($id)
    {
        $user_id = Auth::id();
        $itemplus = cart_item::find($id);
        if ($itemplus->quantity <= 1) {
            $itemplus->quantity = 1;
            $itemplus->save();
        } else {
            $itemplus->quantity -= 1;
            $itemplus->save();
        }
        $cal_total = DB::table('cart_item')
            ->select(DB::raw('products.product_price * cart_item.quantity as totalcal'))
            ->join('products', 'cart_item.product_id', '=', 'products.id')
            ->where('cart_item.id', '=', $id)
            ->first();
        if ($itemplus) {
            $result_minus = DB::table('cart_item')
                ->select('cart_item.quantity')
                ->join('shopping_session', 'cart_item.session_id', '=', 'shopping_session.id')
                ->where('cart_item.id', '=', $id)
                ->update(['total' => $cal_total->totalcal]);

            if ($result_minus) {
                $cal = DB::table('cart_item')
                    ->selectRaw('SUM(shopping_session.total) AS cal')
                    ->join('shopping_session', 'cart_item.session_id', '=', 'shopping_session.id')
                    ->where('shopping_session.status', '=', 0)
                    ->where('shopping_session.user_id', '=', $user_id)
                    ->first();
            } else {
                // The update failed, do something here
                $itemplus = false;
            }
        }
        $getqty = DB::table('cart_item')
            ->select(DB::raw('cart_item.quantity as getqty'))
            ->where('cart_item.id', '=', $id)
            ->first();
    }

    public function  delcart($id)
    {
        $user_id = Auth::id();
        DB::transaction(function () use ($id) {
            $session_id = DB::table('cart_item')->where('id', '=', $id)->value('session_id');
            DB::table('cart_item')->where('id', '=', $id)->delete();
            DB::table('shopping_session')->where('id', '=', $session_id)->delete();
        });
        return view('member.cart_member');
    }

    public function qtyinput($id, $quantity, $session_name)
    {
        $user_id = Auth::id();
        $change_qty = DB::table('cart_item')
            ->where('id', $id)
            ->update(['quantity' => $quantity]);
        $cal_total = DB::table('cart_item')
            ->select(DB::raw('products.product_price * cart_item.quantity as totalcal'))
            ->join('products', 'cart_item.product_id', '=', 'products.id')
            ->where('cart_item.id', '=', $id)
            ->first();
        if ($change_qty) {
            $change_total = DB::table('shopping_session')
                ->join('cart_item', 'shopping_session.id', '=', 'cart_item.session_id')
                ->where('shopping_session.user_id', '=', $user_id)
                ->where('shopping_session.status', '=', 0)
                ->where('shopping_session.id', '=', $session_name)
                ->update(['total' => $cal_total->totalcal]);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to update quantity']);
        }
    }

    public function checkoutbill()
    {   
        $bangkok_timezone = new DateTimeZone('Asia/Bangkok');
        $current_time = new DateTime('now', $bangkok_timezone);
        $current_time->modify('+543 years');

        $formatted_time = $current_time->format('j F, Y g:i A');


        $user_id = Auth::id();
        // Generate a random number between 1 and 1000
        $random_number = rand(1, 100);
        // Get the current date and time
        $date_now = date("YmdHis");
        // Combine the random number and date/time to generate an order ID
        $order_id = $random_number . $date_now;
        // Get the authenticated user's ID
        $user_id = Auth::id();


        $check_bill = DB::table('shopping_session')
            ->where('user_id', $user_id)
            ->where('status', 0)
            ->update(['status' => 1, 'billorderid' => $order_id]);

        if ($check_bill) {
            //get cart product


            $result_getproduct = DB::table('shopping_session')
                ->select('shopping_session.billorderid', 'cart_item.product_id', 'products.product_price', 'cart_item.quantity')
                ->join('cart_item', 'shopping_session.id', '=', 'cart_item.session_id')
                ->join('products', 'products.id', '=', 'cart_item.product_id')
                ->where('billorderid', '=', $order_id)
                ->where('shopping_session.status', '=', 1)
                ->get();



            if ($result_getproduct) {
                $data = [];
                    foreach ($result_getproduct as $product) {
                        $data[] = [
                            'billorderid' => $product->billorderid,
                            'product_id' => $product->product_id,
                            'product_price' => $product->product_price,
                            'quantity' => $product->quantity,
                        ];

                        $insert_order_items = DB::table('order_items')->insert([
                            'order_id' => $data[0]['billorderid'],
                            'product_id' => $product->product_id,
                            'quantity' => $product->quantity,
                        ]);
                    }


                    if($insert_order_items){
                        $insert_order_details = DB::table('order_details')->insert([
                            'order_id' => $data[0]['billorderid'],
                            'user_id' => $user_id,
                            
                        ]);
                        if($insert_order_details){
                            $resultTotal = DB::table('order_items')
                                ->join('order_details', 'order_items.order_id', '=', 'order_details.order_id')
                                ->join('products', 'order_items.product_id', '=', 'products.id')
                                ->where('order_items.order_id', '=', $order_id)
                                ->selectRaw('SUM(products.product_price * order_items.quantity) as gettotal')
                                ->first();
                            if($resultTotal){
                                $orderDetail = order_details::where('order_id','=',$order_id)->first();
                                if ($orderDetail) {
                                    $orderDetail->total = $resultTotal->gettotal;
                                    $orderDetail->date_created = $formatted_time ;
                                    $orderDetail->save();
                                }
                            }
                        }
                        return redirect('/cart');
                    }   

            }
        }
    }
}
