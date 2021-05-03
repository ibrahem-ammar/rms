<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
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

    public function administration()
    {
        return $this->belongsTo(Administration::class,'administration_id','id');
    }


}
