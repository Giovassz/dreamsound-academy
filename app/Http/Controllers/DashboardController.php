<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Instrumento;
use App\Models\Clase;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        
        if ($user->isAdmin()) {
            return $this->adminDashboard();
        } elseif ($user->isStaff()) {
            return $this->staffDashboard();
        } else {
            return $this->clientDashboard();
        }
    }

    private function adminDashboard()
    {
        $stats = [
            'users' => User::count(),
            'alumnos' => Alumno::count(),
            'instrumentos' => Instrumento::count(),
            'clases' => Clase::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    private function staffDashboard()
    {
        $stats = [
            'alumnos' => Alumno::count(),
            'instrumentos' => Instrumento::count(),
            'clases' => Clase::count(),
        ];

        return view('staff.dashboard', compact('stats'));
    }

    private function clientDashboard()
    {
        return view('client.dashboard');
    }
}

