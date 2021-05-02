<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicadministration extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function manager()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function users()
    {
        return $this->hasMany(User::class,'section_id')->where('working_at','public_administration');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function administrations()
    {
        return $this->hasMany(Administration::class);
    }
}
