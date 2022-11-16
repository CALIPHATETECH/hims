<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends BaseModel
{
    public function consutancies()
    {
        return $this->hasMany(COnsultancy::class);
    }
}
