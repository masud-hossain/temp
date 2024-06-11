<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rakibhstu\Banglanumber\NumberToBangla;

class DashboadController extends Controller
{
    function index() {
        $numto = new NumberToBangla();
        return view('pages.dashboard.index',['numto' => $numto]);
    }
}
