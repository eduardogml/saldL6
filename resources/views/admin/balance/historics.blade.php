@extends('adminlte::page')

@section('title', 'Historic')

@section('content_header')
    <h1>Historic</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Historic</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
    	<div class="box-header">
            
    	</div>
    	<div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <th>#</th>
                    <th>Value</th>
                    <th>Type</th>
                    <th>Date</th>
                </thead>
                <tbody>
                    @forelse($historics as $historic)
                        <tr>
                            <td>{{ $historic->id }}</td>
                            <td>{{ number_format($historic->amount, 8, '.', '') }}</td>
                            <td>{{ $historic->type($historic->type) }}</td>
                            <td>{{ $historic->date }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>

            {!! $historics->links() !!}
    	</div>
    </div>
@stop
