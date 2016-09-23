@extends('portal')

@section('content')
    <div class="container">
        <h3>Novo Fornecedor</h3>
        <a href="{{ route('portal.provider.index') }}" class="btn btn-default">Voltar</a>
        <br />
        <br />

        @include('errors._check')

        {!! Form::open(['route'=>'portal.provider.store']) !!}

        @include('portal.provider._form')

        <div class="form-group">
            {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


@endsection