<?php

namespace CentralCondo\Entities\Portal;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Condominium extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'condominium';

    protected $fillable = [
        'finality_id',
        'name',
        'zip_code',
        'address',
        'number',
        'district',
        'complement',
        'cnpj',
        'address_site',
        'active'
    ];

    public function finality()
    {
        return $this->belongsTo(Finality::class);
    }

    public function userCondominium()
    {
        return $this->hasMany(UsersCondominium::class);
    }

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function groupCondominium()
    {
        return $this->belongsTo(GroupCondominium::class);
    }

    public function reserveAreas()
    {
        return $this->belongsTo(ReserveAreas::class);
    }

    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }

    public function usefulPhones()
    {
        return $this->belongsTo(UsefulPhones::class);
    }

    public function securityCam()
    {
        return $this->belongsTo(SecurityCam::class);
    }

    public function providerCategory()
    {
        return $this->belongsTo(ProviderCategory::class);
    }

    public function providers()
    {
        return $this->belongsTo(Providers::class);
    }

    public function calledCategory()
    {
        return $this->belongsTo(CalledCategory::class);
    }

    public function calledStatus()
    {
        return $this->belongsTo(CalledStatus::class);
    }

    public function called()
    {
        return $this->belongsTo(Called::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function communication()
    {
        return $this->belongsTo(Communication::class);
    }

    public function lostAndFound()
    {
        return $this->belongsTo(LostAndFound::class);
    }

}
