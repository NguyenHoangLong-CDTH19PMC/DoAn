<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableNew extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='table_new';
    protected $primaryKey='id';
    protected  $guarded=[];

    // public function foreignKey_news_type()
    // {
    //     return $this->hasMany(related:TableNewType::class,foreignKey:'id_type',localKey:'id');
    // }
}
