<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MainController extends Controller
{

    public function index()
    {
        // TODO: add unique to slug fields
        return view('admin.index');
    }

}
