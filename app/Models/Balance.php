<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Balance extends Model
{
	public $timestamps = false;

    public function withdraw(float $value) : Array
    {
        if($this->amount < $value)
            return [
                'success'   => false,
                'message'   => 'insufficient funds',
            ];

        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount -= number_format($value, 8, '.', '');
        $withdraw = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'                  => 'O',
            'amount'                => $value,
            'total_before'          => $totalBefore,
            'total_after'           => $this->amount,
            'date'                  => date('Ymd'),
        ]);

        if($withdraw && $historic){

            DB::commit();


            return [
                'success'   => true,
                'message'   => 'withdraw successfully',
            ];
        }else{

            DB::rollback();


            return [
                'success'   => false,
                'message'   => 'error when withdrawing',
            ];

        }
    }

    public function deposit(float $value) : Array
    {

        DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount : 0;
    	$this->amount += number_format($value, 8, '.', '');
    	$deposit = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'                  => 'I',
            'amount'                => $value,
            'total_before'          => $totalBefore,
            'total_after'           => $this->amount,
            'date'                  => date('Ymd'),
        ]);

    	if($deposit && $historic){

            DB::commit();


    		return [
    			'success'	=> true,
    			'message'	=> 'deposit successfully',
    		];
    	}else{

            DB::rollback();


            return [
                'success'   => false,
                'message'   => 'error when depositing',
            ];

        }

    }
}
