<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Income;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PaymentController extends Controller
{
    public function create(Request $request){

        if($request->ajax()){
            $payments = Payment::query();
            return DataTables::of($payments)
            ->editColumn('updated_at', function($each){
                return Carbon::parse($each->updated_at)->format('Y-m-d H-i-s');
            })
            ->addColumn('actions', function($each){
                $delete_icon = '<a href="#" class="text-danger delete-btn" data-id="'.$each->id.'"><i class="fas fa-trash-alt"></i></a>';

                return '<div class="action-icon">'. $delete_icon .'</div>';

            })
            ->rawColumns(['actions'])
            ->make(true);
        }

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

        return 'return';
    }
}
