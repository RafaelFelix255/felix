@extends('adminlte::page')

@section('title', 'Felix System')

@section('content_header')
    <h1>Saldo</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>    
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ route('balance.deposit')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Recarregar</a>
            @if ($amount > 0)            
                <a href="{{ route('balance.withdraw') }}" class="btn btn-danger"><i class="fa fa-minus-circle"></i> Sacar</a>
                <a href="{{ route('balance.transfer') }}" class="btn btn-info"><i class="fa fa-exchange"></i> Transferir</a>
            @endif

        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <div class="small-box bg-green">
                <div class="inner">
                    <h3 style="color:blue">R$ {{ number_format($amount, 2, ',', '.') }}</h3>
                    <p style="color:blue">Saldo Positivo</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a href="#" class="small-box-footer" style="color:black">Histórico <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop