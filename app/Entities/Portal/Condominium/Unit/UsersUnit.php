<?php

namespace CentralCondo\Entities\Portal;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UsersUnit extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'users_unit';

    protected $fillable = [
        'user_condominium_id',
        'unit_id',
    ];

    public function userCondominium()
    {
        return $this->belongsTo(UsersCondominium::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
