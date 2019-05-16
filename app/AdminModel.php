<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;

class AdminModel extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'title'
    ];


    protected $hidden = [
        'password', 'remember_token' ];
    

    public function sendPasswordNotification($token)
    {
        $this->notify( new AdminResetPasswordNotification($token));
    }

}
