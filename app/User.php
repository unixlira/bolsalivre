<?php

namespace App;

use Validator;
use App\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'telephone', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    

    public function roles()
    {
        return $this->belongsToMany('App\Role')
                ->withTimestamps();
    }

    //Controle de acesso (ACL)
    public function hasPermission(Permission $permission)
    {
        return $this->hasAnyRoles($permission->roles);
    }

    public function hasAnyRoles($roles)
    {
        if( is_array($roles) || is_object($roles) ) {
            return !! $roles->intersect($this->roles)->count();
        }

        return $this->roles->contains('name', $roles);
     
    }
    //Fim controle de acesso (ACL)

}
