<?php

namespace CentralCondo\Entities\Portal;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Message extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'message';

    protected $fillable = [
        'condominium_id',
        'user_condominium_id',
        'subject',
        'message',
        'public',
        'type'
    ];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function usersCondominium()
    {
        return $this->belongsTo(UsersCondominium::class, 'user_condominium_id');
    }

}
