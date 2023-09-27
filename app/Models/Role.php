<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
         'name','group_name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'roles';
    public $timestamps = true;


    public function groups()
    {
        return $this->belongsToMany(Role::class,'group_role','role_id','group_id');
    }
}
