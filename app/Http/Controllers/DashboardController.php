<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Jadwal;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}
