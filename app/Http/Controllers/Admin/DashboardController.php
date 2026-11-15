<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Kritik;
use App\Models\Peran;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $totalFilms = Film::count();
        $totalCasts = Cast::count();
        $totalGenres = Genre::count();
        $totalPerans = Peran::count();
        $totalKritiks = Kritik::count();
        $totalUsers = User::count();

        return view('admin.dashboard', compact(
            'totalFilms',
            'totalCasts',
            'totalGenres',
            'totalPerans',
            'totalKritiks',
            'totalUsers'
        ));
    }
}
