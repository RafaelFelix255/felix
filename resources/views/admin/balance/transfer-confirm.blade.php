@extends('adminlte::page')

@section('title', 'Felix System')

@section('content_header')
    <h1>Confirmar Transferência</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Saldo</a></li>
        <li><a href="">Transferir</li>
        <li><a href="">Confirmar</li>     
    </ol>
@stop
@section('content')
    <div class="box">
        <div class="box-body">
            @include('admin.includes.alerts')

            <h4 style="color:black"><strong>Nome Recebedor: </strong> {{ $sender->name }}</h4>
            <h4 style="color:black"><strong>E-mail Recebedor: </strong> {{ $sender->email }}</h4>
            <h4 style="color:black"><strong>Seu Saldo Atual: </strong>R$ {{ number_format($balance->amount, 2, ',', '.') }}</h4>
            <br/>
            <form method="post" action="{{ route('transfer.store') }}">
                {!! csrf_field() !!}
                <input name="sender_id" id="sender_id" type="hidden" value="{{ $sender->id }}">

                <div class="form-gruop">
                    <input name="value" id="value" class="form-control" type="number" step="0.01" maxlength="6" placeholder="Digite o valor que deseja transferir">                
                </div>
                <br/>
                <div class="form-gruop">
                    <button class="btn btn-success" type="submit">Transferir</button>         
                </div>

                <script>
                    $inputEllent = document.getElementById("value").focus();
                </script>
            </form>
        </div>
    </div>
@stop