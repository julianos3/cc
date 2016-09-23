@extends('portal')

@section('content')
    <div class="container">
        <h3>Novo Grupo de Integrantes</h3>
        <a href="{{ route('portal.condominium.group.index') }}" class="btn btn-default">Voltar</a>
        <br />
        <br />

        @include('errors._check')

        {!! Form::open(['route'=>'portal.condominium.group.store']) !!}

        @include('portal.condominium.group._form')

        <div class="form-group">
            {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


@endsection