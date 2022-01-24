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
                        <li class="active">Adicionar</li>
                    </ol>

                    <div class="panel-body">
                        <form action="{{ route('cliente.salvar') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome do Cliente">
                                @if($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" class="form-control" placeholder="E-mail do Cliente">
                                @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('endereco') ? 'has-error' : '' }}">
                                <label for="endereco">Endereço</label>
                                <input type="text" name="endereco" class="form-control" placeholder="Endereço do Cliente">
                                @if($errors->has('endereco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('endereco') }}</strong>
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