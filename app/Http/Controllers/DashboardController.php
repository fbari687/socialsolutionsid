<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Package;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $countPackages = Package::all()->count();
        $countFaq = Faq::all()->count();
        $countUsers = User::all()->count();
        $users = User::all();

        $role = Role::all();

        return view('admin/dashboard', [
            'role' => $role,

            'users' => $users,
            'countUsers' => $countUsers,
            'countPackages' => $countPackages,
            'countFaq' =>   $countFaq
        ]);
    }

    public function create(Request $request)
    {



        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'role_id' => 'exists:roles,id',





        ]);


        $validated['role_id'] = $request->input('role_id');
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect('/dashboard')->with('status', 'User Berhasil Ditambahkan');
    }

    public function update(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        $validated = $request->validate([
            'username'  => 'required|max:255|unique:users,username,' . $user->id,
            'name' => ['required', 'string', 'max:255'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email'  => 'required|max:255|unique:users,email,' . $user->id,
            'role_id' => 'exists:roles,id',
        ]);


        $validated['password'] = Hash::make($validated['password']);

        $user->slug = null;
        $user->update($validated);
        return redirect('dashboard')->with('status', 'User berhasil di edit');
    }

    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();

        $user->delete();
        return redirect('dashboard')->with('status', 'User Berhasil di hapus');
    }
}
