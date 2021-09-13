<?php

namespace App\Http\Controllers;

use App\Rules\CurrentPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ValidationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('validation');
    }


    public function store(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'coupon' => ['required', new ValidCoupon()]
        ]);

        return back()->withStatus('Coupon applicato con Successo!');
    }
}
