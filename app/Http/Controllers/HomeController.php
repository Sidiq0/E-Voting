<?php

namespace App\Http\Controllers;
use App\Models\Vote;
use App\Models\User;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
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
            $candidates = Candidate::withCount('votes')->get();
            return view('user.dashboard',compact('candidates'));
        }
    }
}
