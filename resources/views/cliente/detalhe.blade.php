<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Detalhe') }}
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
                        <li class="active">Detalhe</li>
                    </ol>

                    <div class="panel-body">
                        <p><b>Cliente: </b>{{ $cliente->nome }}</p>
                        <p><b>E-mail: </b>{{ $cliente->email }}</p>
                        <p><b>Endereço: </b>{{ $cliente->endereco }}</p>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Título</th>
                                    <th>Número</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cliente->telefones as $telefone)
                                <tr>
                                    <th scope="row">{{ $telefone->id }}</th>
                                    <td>{{ $telefone->titulo }}</td>
                                    <td>{{ $telefone->telefone }}</td>
                                    <td>
                                        <a class="btn btn-default" href="{{ route('telefone.editar', $telefone->id) }}">Editar</a>
                                        <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('telefone.deletar', $telefone->id) }}' : false)">Deletar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <p>
                            <a class="btn btn-info" href="{{ route('telefone.adicionar', $cliente->id) }}">Adicionar Telefone</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @show
</x-app-layout>