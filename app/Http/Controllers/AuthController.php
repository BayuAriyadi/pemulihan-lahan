<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
        ]);

        $user = User::where('Username', $request->username)->first();

        if (!$user) {
            return back()->withErrors(['username' => 'Pengguna tidak ditemukan']);
        }

        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function tambahUser() {
        return view('adduser');
    }

    public function showForm($id = null)
    {
        $user = null;
        if ($id) {
            $users = User::findOrFail($id);
        }
        return view('adduser', compact('users'));
    }

    public function save(Request $request, $id = null)
    {
        $request->validate([
            'username' => 'required|string|unique:users,Username',
            'full_name' => 'required|string',
            'nik' => 'required|string',
            'institution' => 'required|string',
            'role' => 'required|string',
        ]);

        $user = new User();
        $user->Username = $request->username;
        $user->FullName = $request->full_name;
        $user->NIK = $request->nik;
        $user->Institution = $request->institution;
        $user->Role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil disimpan');
    }

    public function index()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    public function dash()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang saat ini masuk
        return view('dashboard', ['user' => $user]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
