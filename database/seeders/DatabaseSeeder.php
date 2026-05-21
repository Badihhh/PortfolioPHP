<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\About;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =====================
        // Admin User
        // =====================
        User::firstOrCreate(
            ['email' => 'user@admin.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('syncronizer'),
            ]
        );

        // =====================
        // About
        // =====================
        About::firstOrCreate(
            ['id' => 1],
            [
                'bio'   => 'Saya adalah seorang Web Developer yang passionate dalam membangun aplikasi web modern. Saya memiliki pengalaman dalam frontend dan backend development.',
                'photo' => null,
            ]
        );

        // =====================
        // Projects
        // =====================
        $projects = [
            ['title' => 'Website Sekolah',       'description' => 'Website profil sekolah lengkap dengan sistem informasi akademik.', 'image' => 'proyek1.webp', 'demo_url' => null, 'github_url' => 'https://github.com'],
            ['title' => 'Toko Online',            'description' => 'Platform e-commerce dengan fitur keranjang belanja dan pembayaran.',    'image' => 'proyek2.webp', 'demo_url' => null, 'github_url' => 'https://github.com'],
            ['title' => 'Sistem Inventori',       'description' => 'Aplikasi manajemen stok dan inventori untuk usaha kecil menengah.',    'image' => 'proyek3.webp', 'demo_url' => null, 'github_url' => 'https://github.com'],
            ['title' => 'Portfolio Website',      'description' => 'Website portfolio personal dibangun menggunakan Laravel.',             'image' => 'proyek4.webp', 'demo_url' => null, 'github_url' => 'https://github.com'],
        ];
        foreach ($projects as $p) {
            Project::firstOrCreate(['title' => $p['title']], $p);
        }

        // =====================
        // Skills
        // =====================
        $skills = [
            ['name' => 'Visual Studio Code', 'category' => 'Code Editor',          'image' => 'vscode.png'],
            ['name' => 'TailwindCSS',         'category' => 'CSS Framework',        'image' => 'tailwind.png'],
            ['name' => 'React JS',            'category' => 'Framework Javascript', 'image' => 'reactjs.png'],
            ['name' => 'Next JS',             'category' => 'Framework Javascript', 'image' => 'nextjs.png'],
            ['name' => 'Javascript',          'category' => 'Language',             'image' => 'js.png'],
            ['name' => 'GitHub',              'category' => 'Repository',           'image' => 'github.png'],
            ['name' => 'Figma',               'category' => 'Design App',           'image' => 'figma.png'],
            ['name' => 'Canva',               'category' => 'Design App',           'image' => 'canva.png'],
            ['name' => 'Bootstrap',           'category' => 'CSS Framework',        'image' => 'bootstrap.png'],
            ['name' => 'Laravel',             'category' => 'Framework PHP',        'image' => null],
        ];
        foreach ($skills as $s) {
            Skill::firstOrCreate(['name' => $s['name']], $s);
        }

        $this->command->info('✅ Admin: user@admin.com / syncronizer');
    }
}
