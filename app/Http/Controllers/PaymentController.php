<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(){
        $payments = Payment::where('user_id', auth()->id())->with('income', 'expense')->latest()->get();

        return view('Payment.create-payment', [
            'payments' => $payments
        ]);
    }

    public function store(PaymentRequest $request){
        Payment::create($request->validated() + [
            'user_id' => auth()->id()
        ]);

        return redirect()->back();
    }

    public function delete(Payment $payment){
        $payment->delete();

        return redirect()->back();
    }
}
