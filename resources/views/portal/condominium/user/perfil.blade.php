@extends('portal')

@section('content')
    <div class="container">
        <h3>Editando Usuário do Condominio {{$dados->name}}</h3>
        <a href="{{ route('portal.condominium.user.index') }}" class="btn btn-default">Voltar</a>
        <br />
        <br />

        @include('errors._check')

        {!! Form::model($dados, ['route'=>['portal.condominium.user.update', $dados->id]]) !!}

        @include('portal.condominium.user._form')

        <div class="form-group">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


@endsection