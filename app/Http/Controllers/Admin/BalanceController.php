<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use App\User;

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
    
    public function transfer(){
        return view('admin.balance.transfer');
    }

    public function confirmTransfer(Request $request, User $user){

        if (!$sender = $user->getSender($request->sender)){
            return redirect()
                    ->back()
                    ->with('error', 'Usuário informado não encontrado!');
        } else {
            if ($sender->id === auth()->user()->id) {
                return redirect()
                        ->back()
                        ->with('error', 'Impossivel transferir para o próprio usuário!');
            } else {       
                $balance = auth()->user()->balance;
                
                return view('admin.balance.transfer-confirm', compact('sender', 'balance'));
            }
        } 
    }

    public function transferStore(MoneyValidationFormRequest $request, User $user){

        if (!$sender = $user->find($request->sender_id))
            return redirect()
                    ->route('balance.transfer')
                    ->with('success', 'Recebedor não encontrado!');
        
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->transfer($request->value, $sender);

        if ($response['success']){
            return redirect()
                    ->route('admin.balance')
                    ->with('success', $response['message']);
        } else {
            return redirect()
                    ->route('balance.transfer')
                    ->with('error', $response['message']);
        }
    }

    public function historic(){
        $historics = auth()->user()->historics()->get();
        return view('admin.balance.historics', compact('historics'));
    }

}
