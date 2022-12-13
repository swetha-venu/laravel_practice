<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relationship\belongsTo;
use App\Models\customer;
use App\Models\product;

class sale extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function customer(){
        return $this->belongsTo(customer::class,'fk_cus_id','id');
    }

    public function product(){
        return $this->belongsTo(product::class,'fk_pro_id','id');
    }
}
