<?php

namespace CentralCondo\Entities\Portal;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UsersCondominium extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'users_condominium';

    protected $fillable = [
        'user_id',
        'user_role_condominium',
        'condominium_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userRoleCondominium()
    {
        return $this->belongsTo(UsersRoleCondominium::class, 'user_role_condominium');
    }

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function usersCondominiumGroup()
    {
        return $this->belongsTo(UsersGroupCondominium::class);
    }

    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }

    public function usersDiary()
    {
        return $this->belongsTo(UsersDiary::class);
    }

    public function called()
    {
        return $this->belongsTo(Called::class);
    }

    public function calledHistoric()
    {
        return $this->belongsTo(CalledHistoric::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }

    public function forumResponse()
    {
        return $this->belongsTo(ForumResponse::class);
    }

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    public function usersMessage()
    {
        return $this->belongsTo(UsersMessage::class);
    }

    public function reply()
    {
        return $this->belongsTo(MessageReply::class);
    }

    public function communication()
    {
        return $this->belongsTo(Communication::class);
    }

    public function lostAndFound()
    {
        return $this->belongsTo(LostAndFound::class);
    }

    public function lostAndFoundCompleted()
    {
        return $this->belongsTo(LostAndFoundCompleted::class);
    }

}
