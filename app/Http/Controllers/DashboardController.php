<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $breadcrumbs = [
        //     'Manajemen Data' => '#',
        //     'Dashboard' => route('admin.dashboard'),
        // ];
        return view('admin.dashboard');
    }
}
