<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigation extends BaseModel
{
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
    public function consultancy()
    {
        return $this->belongsTo(Consultancy::class);
    }
    public function result()
    {
        return $this->belongsTo(Result::class);
    }
}
