<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YayasanController extends Controller
{
    public function index()
    {
        return view('master.yayasan');
    }
}
