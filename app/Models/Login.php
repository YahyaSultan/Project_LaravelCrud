<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'login';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_name','user_password','phone_number','user_image_name','user_image_path'];
}
