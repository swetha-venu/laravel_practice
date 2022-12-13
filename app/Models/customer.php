<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sale;

class customer extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function sale(){
        return $this->hasMany(sale::class);
    }
}
