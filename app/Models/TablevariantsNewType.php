<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TablevariantsNewType extends Model
{
    use HasFactory;
    protected $table='table_variants_new_type';
    protected $primaryKey='id';
    protected  $guarded=[];
}
