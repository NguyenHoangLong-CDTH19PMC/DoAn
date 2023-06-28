<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableUser extends Model
{
    use HasFactory;
    
    protected $table='table_user';
    protected $primaryKey='id';
    protected  $guarded=[];
}
