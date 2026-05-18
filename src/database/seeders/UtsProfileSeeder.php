<?php

namespace Database\Seeders;

use App\Models\UtsProfile;
use Illuminate\Database\Seeder;

class UtsProfileSeeder extends Seeder
{
    public function run(): void
    {
        UtsProfile::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'full_name' => 'Khumaira',
                'headline' => 'Junior Web Developer',
                'avatar_initials' => 'K',
                'bio' => 'Saya adalah mahasiswa yang sedang fokus mempelajari pengembangan website menggunakan Laravel, Livewire, Blade, Filament V3, MariaDB, dan Docker. Website ini dibuat sebagai project UTS untuk menampilkan profil profesional, daftar project, dan form kontak dinamis.',
                'skills' => [
                    'Laravel',
                    'Livewire',
                    'Blade',
                    'Filament V3',
                    'MariaDB',
                    'Docker',
                ],
                'phone' => '6289636389650',
                'location' => 'Jakarta, Indonesia',
                'github_url' => 'https://github.com/HanumKhumaira',
                'linkedin_url' => null,
                'instagram_url' => 'https://www.instagram.com/khumaira_/',
                'is_active' => true,
            ]
        );
    }
}