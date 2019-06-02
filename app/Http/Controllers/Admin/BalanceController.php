<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Balance;
use App\Http\Requests\MoneyValidationFormRequest;

class BalanceController extends Controller
{
    public function index(){

        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0; 
        return view('admin.balance.index', compact('amount'));
    }

    public function deposit(){
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request){
        
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $request = $balance->deposit($request->value);

        if ($request['success']){
            return redirect()
                    ->route('admin.balance')
                    ->with('success', $request['message']);
        } else {
            return redirect()
                    ->back('admin.balance')
                    ->with('error', $request['message']);
        }


    }

    public function withdraw(){
        return view('admin.balance.withdraw');
    }

    public function withdrawStore(MoneyValidationFormRequest $request){
        
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $request = $balance->withdraw($request->value);

        if ($request['success']){
            return redirect()
                    ->route('admin.balance')
                    ->with('success', $request['message']);
        } else {
            return redirect()
                    ->back('admin.balance')
                    ->with('error', $request['message']);
        }


    }
}
