<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableProduct_Level1 extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table='table_product_level1';
    protected $primaryKey='id';
    protected  $guarded=[];
}
