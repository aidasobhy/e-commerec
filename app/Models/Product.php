<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable, SoftDeletes;
    use HasFactory;

    protected $with = ['translations'];
    protected $fillable = [
        'brand_id',
        'slug',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'sku',
        'manage_stock',
        'qty',
        'in_stock',
        'is_active'
    ];

    protected $dates = [
        'special_price_start',
        'special_price_end',
        'deleted_at',
        'start_date',
        'end_date',
    ];

    protected $casts =
        [
            'manage_stock' => 'boolean',
            'in_stock' => 'boolean',
            'is_active' => 'boolean'
        ];

    protected $translatedAttributes = ['name','description','short_description'];


//    relations
    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'product_categories');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'product_tags');
    }


    public function options()
    {
        return $this->hasMany(Option::class,'product_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class,'product_id');
    }

    //Imatuator

    public function scopeActive()
    {
        return $this->where('is_active',1);
    }

    public function getActive()
    {
        return $this->is_active==0?__('Admin\products.no_active'):__('Admin\products.active');
    }

    public function hasStock($quantity)
    {
        return $this->qty >= $quantity;
    }

    public function outOfStock()
    {
        return $this->qty === 0;
    }

    public function inStock()
    {
        return $this->qty >= 1;
    }

    public function getTotal($converted = true)
    {
        return $total =  $this->special_price ?? $this -> price;

    }




}
