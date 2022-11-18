<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends BaseModel
{
    public function investigation()
    {
        return $this->hasMany(Investigation::class);
    }
}
