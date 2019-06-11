@extends('adminlte::page')

@section('title', 'Felix System')

@section('content_header')
    <h1>Fazer Transferência</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Transferir</li>     
    </ol>
@stop
@section('content')
    <div class="box">
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="post" action="{{ route('confirm.transfer') }}">
                {!! csrf_field() !!}
            
                <div class="form-gruop">
                    <input name="sender" id="sender" class="form-control" type="text"  maxlength="150" placeholder="Email para transferência (Nome ou E-mail)">                
                </div>
                <br/>
                <div class="form-gruop">
                    <button class="btn btn-success" type="submit">Localizar</button>         
                </div>

                <script>
                    $inputEllent = document.getElementById("sender").focus();
                </script>
            </form>
        </div>
    </div>
@stop