@extends('portal')

@section('content')
    <div class="container">
        <h3>Nova Categoria de Fornecedor</h3>
        <a href="{{ route('portal.provider.category.index') }}" class="btn btn-default">Voltar</a>
        <br />
        <br />

        @include('errors._check')

        {!! Form::open(['route'=>'portal.provider.category.store']) !!}

        @include('portal.provider.category._form')

        <div class="form-group">
            {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


@endsection