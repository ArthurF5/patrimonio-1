@extends('adminlte::page')


@section('content_header')
    <h1><strong>{{ $responsavel->nome }}</strong></h1>
    <br>
    <ol class="breadcrumb">
    	<li>
    		<i class="fa fa-home"></i>
    		<a href="{{ route('home') }}">Home</a>
    	</li>
    	<li>
            <i class="fa fa-users"></i>
            <a href="{{ route('responsaveis.index') }}"> Servidores
            </a>
    	</li>
        <li class="active">
            <i class="fa fa-list"></i> Lista de materiais
        </li>
    </ol>
    <br>
    <button class="btn btn-default btn-detail" title="Adicionar" data-toggle='modal' data-target='#cadastrar-materiais-modal'>
        <i class="fa fa-plus"></i> Adicionar item
    </button>

    @component('components.form-cadastrar.cadastrar_materiais')
        @slot('responsavel', $responsavel)
    @endcomponent
@stop

@section('content')
    <div class="row">

        <div class="col-lg-12">

            @if($responsavel->materiais->isNotEmpty())
                <div class="box box-success">
                    <div class="box-header">
                        <h1 class="box-title">
                            <i class="fa fa-list"></i> Lista de Materias
                        </h1>

                        <div class="box-tools pull-right">
                            <span class="label label-default">{{ $responsavel->materiais->count() }} itens cadastrados</span>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed" id="tabela-materiais">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nome</th>
                                        <th>Tombamento</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <form action="{{ route('materiais.exchange') }}" method="POST" id="alterar-materiais">

                                    @csrf
                                    
                                    <tbody>
                                        @foreach($responsavel->materiais as $material)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" value="{{ $material->id }}" name="materiais[]" id="materiais">
                                                </td>
                                                <td>{{ $material->nome }}</td>
                                                <td>{{ $material->tombamento }}</td>
                                                <td>R$ {{ $material->valor }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </form>
                            </table>
                        </div>
                    </div>

                    <div class="box-footer">
                        <h4>
                            <div class="pull-left">
                                <strong>Total:</strong> 
                                R$ {{ number_format($responsavel->materiais->sum('valor'), 2, ',','.') }}
                            </div>
                        </h4>
                        
                    </div>
                    
                </div>
            @else
                <div class="well ">
                    <i class="fa fa-info-circle"></i> Nenhum material encontrado.
                </div>
            @endif

        </div>

        <div class="col-lg-12">
            <button type="submit" form="alterar-materiais" class="btn btn-default">
                <i class="fa fa-exchange"></i> Transferir
            </button>
            <a href={{ route('responsaveis.index') }}  class="btn btn-default pull-left">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>

@stop

@section('js')

    @if($errors->isNotEmpty())
        <script>
            $(document).ready(() => {
                $('#cadastrar-materiais-modal').modal('show')

                $('#cadastrar-materiais-modal').on('shown.bs.modal', function () {
                    $('#cadastrar-materiais-nome').focus()
                });
            })

        </script>
    @endif

    <script>
        $("#tabela-materiais tr").click(function() {
            var checkbox = $(this).find("input[type='checkbox']");
            checkbox.attr('checked', !checkbox.attr('checked'));
            if (checkbox.attr('checked')) {
                checkbox.closest('tr').addClass('active')
            } else {
                checkbox.closest('tr').removeClass('active')
            }
        });

        $('#cadastrar-materiais-modal').on('shown.bs.modal', function () {
            $('#cadastrar-materiais-nome').focus()
        });
    </script>
@stop