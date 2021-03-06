<?php

namespace CentralCondo\Entities\Portal;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class GroupCondominium extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'group_condominium';

    protected $fillable = [
        'name',
        'condominium_id'
    ];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function usersCondominiumGroup()
    {
        return $this->belongsTo(UsersGroupCondominium::class);
    }

    public function communicationGroup()
    {
        return $this->belongsTo(CommunicationGroup::class);
    }

}
