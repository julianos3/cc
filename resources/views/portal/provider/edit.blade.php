@extends('portal')

@section('content')
    <div class="container">
        <h3>Editando Categoria de Fornecedor {{$dados->name}}</h3>
        <a href="{{ route('portal.provider.category.index') }}" class="btn btn-default">Voltar</a>
        <br />
        <br />

        @include('errors._check')

        {!! Form::model($dados, ['route'=>['portal.provider.category.update', $dados->id]]) !!}

        @include('portal.provider.category._form')

        <div class="form-group">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


@endsection