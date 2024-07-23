<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return view('admin.dashboard',compact('user'));
        } elseif ($user->role === 'user') {
            return view('user.dashboard',compact('user'));
        }
    }

    public function candidates()
    {
            return view('admin.candidates');

    }

    public function students()
    {
            return view('admin.students');

    }
    public function riwayat_votes()
    {
            return view('admin.votes');

    }
}
