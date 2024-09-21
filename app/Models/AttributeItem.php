<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeItem extends Model
{
    use HasFactory;
    // public function attribute(){
    //     return $this->belongsTo(Attribute::class);
    // }
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
    protected $fillable = ['value','attribute_id'];
}