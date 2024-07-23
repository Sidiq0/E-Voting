<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            // Add other validation rules as needed
        ]);
        \Log::info('User before update:', ['user' => $user->toArray()]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // Update other fields as needed
        ]);
        \Log::info('User after update:', ['user' => $user->fresh()->toArray()]);
        return redirect()->route('profile.index')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

}
