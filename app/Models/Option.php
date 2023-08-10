<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    use Translatable;

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $fillable=['product_id','attribute_id','price'];

    //relations

    public function attribute()
    {
        return $this->belongsTo(Attribute::class,'attribute_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

}
