<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Rules\ValidCoupon;
use Illuminate\Http\Request;
use App\Rules\CurrentPassword;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreCouponRequest;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('coupon');
    }


    public function store(StoreCouponRequest $request)
    {
        $coupon = $request->getCouponModel();

        return back()->withStatus('Coupon:' . $coupon->code . 'applicato con Successo!');
    }
}
