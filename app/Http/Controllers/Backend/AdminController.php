<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * @return View
     */
    public function index():View
    {
        return view('dashboard.dashboard');
    }
}
