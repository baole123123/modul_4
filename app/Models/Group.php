<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
         'name','delete_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'groups';
    public $timestamps = true;

    public function roles()
    {
        return $this->belongsToMany(Role::class,'group_role','group_id','role_id');
    }
}
