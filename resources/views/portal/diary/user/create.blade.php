@extends('portal')

@section('content')
    <div class="container">
        <h3>Novo Integrante</h3>
        <a href="{{ route('portal.condominium.group.user.index',['id' => $groupId]) }}" class="btn btn-default">Voltar</a>
        <br />
        <br />
        <?php
        $idUser = 0;
        ?>

        @include('errors._check')

        {!! Form::open(['route'=>'portal.condominium.group.user.store']) !!}

        @include('portal.condominium.group.user._form')

        <div class="form-group">
            {!! Form::submit('Cadastrar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>


@endsection