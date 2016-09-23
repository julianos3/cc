<?php

namespace CentralCondo\Entities\Portal;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Unit extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'unit';

    protected $fillable = [
        'name',
        'floor',
        'block_id',
        'unit_type_id',
        'condominium_id'
    ];


    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function unitType()
    {
        return $this->belongsTo(UnitType::class);
    }

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

}
