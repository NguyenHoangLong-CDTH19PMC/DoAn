<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    //
    public function albums(){
        $albums=DB::table('albums')->get();
        return view('.admin.product.list',compact('albums'));
    }
}
