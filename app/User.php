<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "usuarios";

    protected $fillable = [
        'id_pessoa',
        'id_instituicao',
        'email',
        'password',
        'nivel_acesso',
        'estado',
    ];


    public function instituicao(){
        return $this->belongsTo(Instituicao::class, 'id_instituicao', 'id');
    }

    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }
}