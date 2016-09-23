@extends('portal')

@section('content')
    <div class="container">
        <h3>Editando Grupos de Integrantes {{$dados->name}}</h3>
        <a href="{{ route('portal.condominium.group.index') }}" class="btn btn-default">Voltar</a>
        <br />
        <br />

        @include('errors._check')

        {!! Form::model($dados, ['route'=>['portal.condominium.group.update', $dados->id]]) !!}

        @include('portal.condominium.group._form')

        <div class="form-group">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


@endsection