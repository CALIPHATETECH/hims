<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends BaseModel
{
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function consultancies()
    {
        return $this->hasMany(Consultancy::class);
    }

    public function doctoreServices()
    {
        return $this->hasMany(DoctorService::class);
    }
}
