<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use DB;
use Auth;
use App\Models\myOrder;
use App\Models\myCart;
use Session;
use Notification;

class PaymentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function paymentPost(Request $request)
    {
	       
	Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount"=>$request->sub*100,
            "currency"=>"MYR",
            "source"=>$request->stripeToken,
            "description"=>"This payment is testing purpose of southern online",
        ]);
 
        $newOrder=myOrder::Create([
            'paymentStatus'=>'Done',
            'userID'=>Auth::id(), 
            'amount'=>$request->sub,
        ]);

        $orderID=DB::table('my_orders')->where('userID','=',Auth::id())->orderBy('created_at','desc')->first(); // get the order ID just now created

        $items=$request->input('cid');
        foreach($items as $item=>$value){
            $carts=myCart::find($value);   //get the cart item record
            $carts->orderID=$orderID->id;  //binding the orderID value with record
            $carts->save();
        }
        (new CartController)->cartItem();
        $email="weileong0217@gmail.com";
        Notification::route('mail',$email)->notify(new \App\Notifications\orderPaid($email));
        
        return back();
    }
}
