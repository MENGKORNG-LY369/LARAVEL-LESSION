<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        return view('client');
    }

    public function isClient() {
        return ["client" => "Hey, I'm a client"];
    }
}
