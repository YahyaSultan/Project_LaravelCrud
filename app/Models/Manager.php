<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'manager';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'manager_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['manager_id','role_id','manager_name','manager_designation','manager_passowrd'];
}
