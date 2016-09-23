<div class="form-group">
    {!! Form::label('Name', 'Nome:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Block', 'Block:') !!}
    {!! Form::select('block_id', $block, null, ['class'=>'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('Tipo', 'Tipo:') !!}
    {!! Form::select('unit_type_id', $type, null, ['class'=>'form-control']) !!}
</div>



