@extends('portal')

@section('content')
    <div class="container">
        <h3>Novo Usuário</h3>

        @include('errors._check')

        {!! Form::open(['route'=>'portal.user.store']) !!}

        @include('portal.user._form')

        <div class="form-group">
            {!! Form::submit('Criar Cliente', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


@endsection