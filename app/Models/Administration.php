<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function manager()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function publicadministration()
    {
        return $this->belongsTo(Publicadministration::class,'publicadministration_id','id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

}
