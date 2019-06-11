@extends('adminlte::page')

@section('title', 'Felix System')

@section('content_header')
    <h1>Histórico de Movimentações</h1>
    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Histórico</a></li> 
    </ol>
@stop
@section('content')
    <div class="box">
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Data Emissão</th>
                        <th class="text-center">Valor</th>
                        <th class="text-center">Tipo</th>
                        <th class="text-center">Usuário</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($historics as $historic)
                        <tr>
                            <td class="text-center">{{ $historic->id }}</td>
                            <td class="text-center">{{ $historic->date }}</td>
                            <td class="text-left">R$ {{ number_format($historic->amount, 2, ',', '.') }}</td>
                            <td class="text-center">{{ $historic->type($historic->type) }}</td>
                            <td class="text-center">
                                @if ($historic->user_id_transaction)
                                    {{ $historic->userSender->name }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>                
            </table>   

            {!! $historics->links() !!}
        </div>
    </div>
@stop