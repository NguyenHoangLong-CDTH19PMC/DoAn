<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table='products';
    protected $primaryKey='id';
    protected  $guarded=[];

    public function products_color()
    {
        return $this->hasMany(related:Color::class,foreignKey:'id_color',localKey:'id');
    }
    public function products_size()
    {
        return $this->hasMany(related:Size::class,foreignKey:'id_size',localKey:'id');
    }
    public function products_producttypes()
    {
        return $this->hasMany(related:ProductType::class,foreignKey:'id_product_type',localKey:'id');
    }
    public function products_brands()
    {
        return $this->hasMany(related:Brand::class,foreignKey:'id_brand',localKey:'id');
    }
    public function products_gender()
    {
        return $this->hasMany(related:Gender::class,foreignKey:'id_gender',localKey:'id');
    }
}
