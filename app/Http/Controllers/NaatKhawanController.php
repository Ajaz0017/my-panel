<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NaatKhawan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NaatKhawanController extends Controller
{
    public function index()
    {
        $naatKhawans = NaatKhawan::latest()->paginate(10);
        return view('admin.naatKhawan', ['title' => 'Naat Khawans', 'naatKhawans' => $naatKhawans]);
    }
    public function create()
    {
        return view('admin.createNaatKhawan', ['title' => 'Create Naat Khawan']);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')
                                ->store('naat-khawans', 'public');
        }

        NaatKhawan::create([
            'name' => $request->name,
            'profile_image' => $imagePath,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect('/admin/naat-khawans')
            ->with('success', 'Naat Khawan created successfully!');
    }
    public function edit(NaatKhawan $naatKhawan)
    {
        return view('admin.editNaatKhawan', [
            'title' => 'Edit Naata Khawan',
            'naatKhawan'  => $naatKhawan,
        ]);
    }

    public function update(Request $request, NaatKhawan $naatKhawan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        // If new image uploaded
        if ($request->hasFile('profile_image')) {

            // Delete old image
            if ($naatKhawan->profile_image &&
                Storage::disk('public')->exists($naatKhawan->profile_image)) {

                Storage::disk('public')->delete($naatKhawan->profile_image);
            }

            $imagePath = $request->file('profile_image')
                                ->store('naat-khawans', 'public');

            $naatKhawan->profile_image = $imagePath;
        }

        $naatKhawan->name = $request->name;
        $naatKhawan->is_active = $request->has('is_active');
        $naatKhawan->save();

        return redirect('/admin/naat-khawans')
            ->with('success', 'Naat Khawan updated successfully!');
    }
    public function destroy(NaatKhawan $naatKhawan)
    {
        // Delete profile image if exists
        if ($naatKhawan->profile_image &&
            Storage::disk('public')->exists($naatKhawan->profile_image)) {

            Storage::disk('public')->delete($naatKhawan->profile_image);
        }

        // Delete record
        $naatKhawan->delete();

        return redirect('/admin/naat-khawans')
            ->with('success', 'Naat Khawan deleted successfully!');
    }
}
