<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Historic extends Model
{
    protected $fillable = ['type', 'amount', 'total_before', 'total_after', 'user_id_transaction', 'date'];

    public function type($type = null)
    {
    	$types = [
    		'I'	=> 'Deposit',
    		'O'	=> 'Withdraw',
    		'T'	=> 'Transfer',
    	];

    	if(!$type)
    		return $types;

    	return $types[$type];
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
