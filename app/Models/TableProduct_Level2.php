<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableProduct_Level2 extends Model
{
    use HasFactory;
    protected $table='table_product_level1';
    protected $primaryKey='id';
    protected  $guarded=[];

    public function products_level1()
    {
        return $this->hasMany(related:TableProduct_Level1::class,foreignKey:'id_level1',localKey:'id');
    }
}
