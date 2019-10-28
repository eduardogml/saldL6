@extends('adminlte::page')

@section('title', 'Balance')

@section('content_header')
    <h1>Balance</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Balance</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
    		<a href="{{ route('balance.deposit') }}" class="btn btn-primary">Deposit</a>
    		
            @if($amount > 0)
                <a href="{{ route('balance.withdraw') }}" class="btn btn-danger">Withdraw</a>
            @endif
            
    	</div>
    	<div class="box-body">

            @include('admin.includes.alerts')

    		<div class="small-box bg-green">
		        <div class="inner">
			        <h3>{{ number_format($amount, 8, '.', '') }}<sup style="font-size: 20px"> $</sup></h3>
		        </div>
		        <div class="icon">
		        	<i class="fab fa-bitcoin"></i>
		        </div>
	        	<a href="{{ route('admin.historic') }}" class="small-box-footer">Historic <i class="fa fa-arrow-circle-right"></i></a>
	        </div>
    	</div>
    </div>
@stop
