@extends('adminlte::page')

@section('title', 'Withdraw')

@section('content_header')
    <h1>Withdraw</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Balance</a></li>
        <li><a href="">Withdraw</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
    		<h3>New Withdraw</h3>
    	</div>
    	<div class="box-body">

            @include('admin.includes.alerts')

    		<form method="post" action="{{ route('withdraw.store') }}">
    			{!! csrf_field() !!}

    			<div class="form-group">
    				<input type="text" name="value" placeholder="Withdraw Value" class="form-control">
    			</div>
    			<div class="form-group">
    				<button type="submit" class="btn btn-success">Withdraw</button>
    			</div>

    		</form>
    	</div>
    </div>
@stop
