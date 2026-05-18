<?php

namespace Database\Seeders;

use App\Models\UtsProject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UtsProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Website Portofolio UTS',
                'short_description' => 'Website portofolio personal berbasis Laravel, Livewire, Blade, Filament V3, MariaDB, dan Docker.',
                'description' => 'Website ini dibuat untuk memenuhi tugas UTS Pemrograman Web. Website memiliki halaman profil profesional, daftar project, contact form dinamis, dan backend admin untuk mengelola progress project secara langsung.',
                'tech_stack' => ['Laravel', 'Livewire', 'Blade', 'Filament V3', 'MariaDB', 'Docker'],
                'repository_url' => null,
                'demo_url' => null,
                'image_url' => null,
                'status' => 'in_progress',
                'progress' => 85,
                'is_featured' => true,
                'sort_order' => 1,
                'published_at' => now(),
            ],
            [
                'title' => 'Sistem Lost and Found Kampus',
                'short_description' => 'Website pelaporan barang hilang dan ditemukan di lingkungan kampus.',
                'description' => 'Website ini dibuat untuk membantu mahasiswa melaporkan barang hilang, mencatat barang ditemukan, dan mempermudah pencarian data barang melalui panel admin. Project ini masih dalam tahap pengembangan.',
                'tech_stack' => ['Laravel', 'Livewire', 'Blade', 'Filament V3', 'MariaDB'],
                'repository_url' => null,
                'demo_url' => null,
                'image_url' => null,
                'status' => 'in_progress',
                'progress' => 70,
                'is_featured' => true,
                'sort_order' => 2,
                'published_at' => now(),
            ],
            [
                'title' => 'Travel Log',
                'short_description' => 'Website diary liburan untuk mencatat pengalaman perjalanan dan destinasi yang pernah dikunjungi.',
                'description' => 'Travel Log adalah website diary liburan yang dibuat sebagai project pembelajaran semester 3. Website ini digunakan untuk mencatat cerita perjalanan, destinasi, tanggal liburan, dan pengalaman pribadi selama melakukan perjalanan.',
                'tech_stack' => ['Laravel', 'Blade', 'MariaDB'],
                'repository_url' => null,
                'demo_url' => null,
                'image_url' => null,
                'status' => 'completed',
                'progress' => 100,
                'is_featured' => true,
                'sort_order' => 3,
                'published_at' => now(),
            ],
        ];

        $slugs = collect($projects)
            ->pluck('title')
            ->map(fn (string $title): string => Str::slug($title))
            ->toArray();

        UtsProject::query()
            ->whereNotIn('slug', $slugs)
            ->delete();

        foreach ($projects as $project) {
            UtsProject::updateOrCreate(
                ['slug' => Str::slug($project['title'])],
                array_merge($project, [
                    'slug' => Str::slug($project['title']),
                ])
            );
        }
    }
}