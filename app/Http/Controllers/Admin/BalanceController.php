<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;

class BalanceController extends Controller
{
    public function index()
    {
    	$balance = auth()->user()->balance;
    	$amount = $balance ? $balance->amount : 0;

        return view('admin.balance.index', compact('amount'));
    }

    public function withdraw()
    {
        return view('admin.balance.withdraw');
    }

    public function deposit()
    {
    	return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request)
    {
    	$balance = auth()->user()->balance()->firstOrCreate([]);
    	$response = $balance->deposit($request->value);

        if($response['success'])
            return redirect()->route('admin.balance')->with('success', $response['message']);

        return redirect()->back()->with('error', $response['message']);
    }

    public function withdrawStore(MoneyValidationFormRequest $request)
    {
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdraw($request->value);

        if($response['success'])
            return redirect()->route('admin.balance')->with('success', $response['message']);

        return redirect()->back()->with('error', $response['message']);
    }

    public function historic()
    {
        $historics = auth()->user()->historics()->with(['user'])->paginate(2);

        return view('admin.balance.historics', compact('historics'));
    }
}
