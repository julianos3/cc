<div class="form-group">
    {!! Form::label('Name', 'Nome:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Condominio', 'Condominio:') !!}
    {!! Form::select('condominium_id', $condominium, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Categoria', 'Categoria:') !!}
    {!! Form::select('provider_category_id', $providerCategory, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('descrição', 'Descrição:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Ativo', 'Ativo:') !!}
    {!! Form::select('active', ['y' => 'Sim','n' => 'Não'], null, ['class'=>'form-control']) !!}
</div>