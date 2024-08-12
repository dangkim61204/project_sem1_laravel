<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ErrorController extends Controller
{

    
    public function unauthorize() {

        return view('backend.errors.403');
    }
}
