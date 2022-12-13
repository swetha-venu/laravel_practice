<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sale;

class product extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function sale(){
        return $this->hasMany(sale::class);
    }
    public function category(){
        return $this->belongsTo(category::class,'fk_cat_id','id');
    }
}
