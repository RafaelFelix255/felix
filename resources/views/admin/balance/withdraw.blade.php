@extends('adminlte::page')

@section('title', 'Felix System')

@section('content_header')
    <h1>Fazer Retirada</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Sacar</li>     
    </ol>
@stop
@section('content')
    <div class="box">
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="post" action="{{ route('withdraw.Store') }}">
                {!! csrf_field() !!}
            
                <div class="form-gruop">
                    <input name="value" id="value" class="form-control" type="number" step="0.01" maxlength="6" placeholder="Valor da Retirada">                
                </div>
                <div class="form-gruop">
                    <button class="btn btn-success" type="submit">Sacar</button>         
                </div>

                <script>
                    $inputEllent = document.getElementById("value").focus();
                </script>
            </form>
        </div>
    </div>
@stop