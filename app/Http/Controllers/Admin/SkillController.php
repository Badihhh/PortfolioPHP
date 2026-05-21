<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->paginate(10);
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:1024',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/tools'), $filename);
            $validated['image'] = $filename;
        }

        Skill::create($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil ditambahkan!');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:1024',
        ]);

        if ($request->hasFile('image')) {
            if ($skill->image) {
                $oldPath = public_path('images/tools/' . $skill->image);
                if (file_exists($oldPath)) unlink($oldPath);
            }
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/tools'), $filename);
            $validated['image'] = $filename;
        }

        $skill->update($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil diperbarui!');
    }

    public function destroy(Skill $skill)
    {
        if ($skill->image) {
            $path = public_path('images/tools/' . $skill->image);
            if (file_exists($path)) unlink($path);
        }

        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill berhasil dihapus!');
    }
}