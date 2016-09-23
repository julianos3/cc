@extends('portal')

@section('content')
    <div class="container">
        <h3>Editando Unidade {{$dados->name}}</h3>
        <a href="{{ route('portal.unit.index') }}" class="btn btn-default">Voltar</a>
        <br />
        <br />

        @include('errors._check')

        {!! Form::model($dados, ['route'=>['portal.unit.update', $dados->id]]) !!}

        @include('portal.unit._form')

        <div class="form-group">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


@endsection