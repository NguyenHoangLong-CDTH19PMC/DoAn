<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableProduct_Level2 extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='table_product_level2';
    protected $primaryKey='id';
    protected  $guarded=[];

    public function foreignKey_products_level1()
    {
        return $this->hasMany(related:TableProduct_Level1::class,foreignKey:'id_level1',localKey:'id');
    }
}
