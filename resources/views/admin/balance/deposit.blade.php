@extends('adminlte::page')

@section('title', 'Deposit')

@section('content_header')
    <h1>Deposit</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Balance</a></li>
        <li><a href="">Deposit</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
    		<h3>New Deposit</h3>
    	</div>
    	<div class="box-body">

            @include('admin.includes.alerts')

    		<form method="post" action="{{ route('deposit.store') }}">
    			{!! csrf_field() !!}

    			<div class="form-group">
    				<input type="text" name="value" placeholder="Deposit Value" class="form-control">
    			</div>
    			<div class="form-group">
    				<button type="submit" class="btn btn-success">Deposit</button>
    			</div>

    		</form>
    	</div>
    </div>
@stop
