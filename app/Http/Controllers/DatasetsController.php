<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DatasetsController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        return view('databoksi.datasets');
    }
}
