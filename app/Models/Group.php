<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Group extends Model
{
    protected $table ='groups';
    use HasFactory;
    use Notifiable;
    protected $fillable = ['name'];
    public function users()
    {
        return $this->hasMany(User::class, 'group_id', 'id');
    }
    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
    public function scopesearch($query)
    {
        if ($key = request()->search) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
