<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function package()
    {
        $packages = Package::all();
        return view('admin/package', [
            'packages' => $packages
        ]);
    }

    public function create(Request $request)
    {



        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:packages'],
            'description1' => ['required',],
            'description2' => ['required',],
            'description3' => ['required',],
            'description4' => ['required',],
            'description5' => ['max:255',],
            'price' => 'required',
            'duration' => 'required',







        ]);




        Package::create($validated);

        return redirect('/package')->with('status', 'Package Baru Berhasil Ditambahkan');
    }

    public function update(Request $request, $slug)
    {
        $package = Package::where('slug', $slug)->first();

        $validated = $request->validate([
            'name'  => 'required|max:255|unique:packages,name,' . $package->id,


            'description1' => ['required'],
            'description2' => ['required'],
            'description3' => ['required'],
            'description4' => ['required'],
            'description5' => ['max:255'],
            'price'  => 'required',
            'duration' => 'required',
        ]);




        $package->slug = null;
        $package->update($validated);
        return redirect('package')->with('status', 'Package berhasil di edit');
    }

    public function delete($slug)
    {
        $package = Package::where('slug', $slug)->first();

        $package->delete();
        return redirect('package')->with('status', 'User Berhasil di hapus');
    }
}
