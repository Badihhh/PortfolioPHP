<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Message;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        $skills = Skill::all();
        $about  = About::first();

        return view('about', compact('skills', 'about'));
    }

    public function projects()
    {
        $projects = Project::latest()->get();

        return view('projects', compact('projects'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'message' => 'required|string|max:1000',
        ]);

        // Simpan pesan ke database
        Message::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->route('contact')->with('success', 'Pesan berhasil dikirim! Terima kasih.');
    }
}
