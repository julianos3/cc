@extends('portal')

@section('content')
    <div class="container">
        <h3>Unidade</h3>
        <a href="{{ route('portal.unit.create') }}" class="btn btn-default">Cadastrar</a>
        <br />
        <br />

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Bloco</th>
                <th>Tipo</th>
                <th>Condominio</th>
                <th class="col-sm-2">Ação</th>
            </tr>
            </thead>
            <tbody>
                @foreach($dados as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->block->name }}</td>
                        <td>{{ $row->unitType->name }}</td>
                        <td>{{ $row->block->condominium->name }}</td>
                        <td>
                            <a href="{{route('portal.unit.edit',['id'=>$row->id])}}" title="" class="btn btn-default btn-sm">Editar</a>
                            <a href="{{route('portal.unit.destroy',['id'=>$row->id])}}" title="" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection