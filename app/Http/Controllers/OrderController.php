<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\myOrder;
use App\Models\myCart;
use Auth;
use Session;
use PDF;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdfReport()
    {

        $data = DB::table('my_orders')
            ->select('my_orders.*')
            ->where('my_orders.userID', '=', Auth::id())
            ->get();

        $pdf = PDF::loadView('myPDF', compact('data'));

        return $pdf->download('Order_report.pdf');
    }

    public function view()
    {
        $orders = DB::table('my_orders')
            ->select('my_orders.*')
            ->where('my_orders.userID', '=', Auth::id())
            ->get();
        return view('myOrder')->with('orders', $orders);
    }
}