<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Hanya 1 data about, ambil atau buat baru
        $about = About::firstOrCreate(['id' => 1], [
            'bio'   => 'Tulis bio kamu di sini.',
            'photo' => null,
        ]);

        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'bio'   => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $about = About::firstOrCreate(['id' => 1]);

        if ($request->hasFile('photo')) {
            if ($about->photo) {
                $old = public_path('images/' . $about->photo);
                if (file_exists($old)) unlink($old);
            }
            $filename = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('images'), $filename);
            $validated['photo'] = $filename;
        }

        $about->update($validated);

        return redirect()->route('admin.about.index')
            ->with('success', 'Data About berhasil diperbarui!');
    }
}
