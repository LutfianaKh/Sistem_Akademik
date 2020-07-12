<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mahasiswa2Controller extends Controller
{
    protected $request;
    
    public function __construct(Request $req)
    {
        $this->request = $req;
    }
}
