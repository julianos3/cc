@extends('portal')

@section('content')
    <div class="container">
        <h3>Novo Nível</h3>
        <a href="{{ route('portal.user.role.index') }}" class="btn btn-default">Voltar</a>
        <br />
        <br />

        @include('errors._check')

        {!! Form::open(['route'=>'portal.user.role.store']) !!}

        @include('portal.user.role._form')

        <div class="form-group">
            {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


@endsection