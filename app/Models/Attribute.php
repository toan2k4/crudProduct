<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    // public function attributeItem(){
    //     return $this->hasOne(AttributeItem::class);
    // }
    public function attributeItems()
    {
        return $this->hasMany(AttributeItem::class);
    }
    protected $fillable = ['name'];
}
