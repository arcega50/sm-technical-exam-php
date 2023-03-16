<?php

namespace App\Http\Controllers;

use App\Models\Mall;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $malls = Mall::paginate(20);

        return view('dashboard', compact('malls'));
    }
}
