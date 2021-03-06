<x-app-layout>
<x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Adicionar') }}
        </h2>
    </x-slot>

    @if(Session::has('flash_message'))
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div align="center" class="alert {{ Session::get('flash_message')['class'] }}">
                        {{ Session::get('flash_message')['msg'] }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <ol class="breadcrumb panel-heading">
                        <li><a href="{{ route('cliente.index') }}">Clientes</a> /  </li>
                        <li><a href="{{ route('cliente.detalhe', $cliente->id) }}">Detalhe</a> /  </li>
                        <li class="active">Adicionar</li>
                    </ol>

                    <div class="panel-body">
                        <p><b>Cliente: </b>{{ $cliente->nome }}</p>

                        <form action="{{ route('telefone.salvar', $cliente->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" class="form-control" placeholder="Título do Telefone">
                                @if($errors->has('titulo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('telefone') ? 'has-error' : '' }}">
                                <label for="numero">Número</label>
                                <input type="text" name="telefone" class="form-control" placeholder="Número do Telefone">
                                @if($errors->has('telefone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <button class="btn btn-info">Adicionar</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @show
</x-app-layout>