<div>
    @php
        $skillItems = $skills ?? collect();

        $profilePhotoFile = collect([
            'uts_khuma_pict.jpg',
            'uts_khuma_pict.jpeg',
            'uts_khuma_pict.png',
            'uts_khuma_pict.webp',
        ])->first(fn (string $file): bool => file_exists(public_path('images/' . $file)));
    @endphp

    <section class="container hero">
        <div>
            <div class="eyebrow">Personal Portfolio</div>

            <h1 class="title">
                Halo, saya {{ $profile?->full_name ?? 'Khuma' }}.
            </h1>

            <p class="subtitle">
                {{ $profile?->headline ?? 'Junior Web Developer' }}
            </p>

            <p class="subtitle">
                {{ $profile?->bio ?? 'Website ini dibuat sebagai project UTS untuk menampilkan profil, project, dan form kontak dinamis.' }}
            </p>

            <div class="button-group">
                <a href="{{ route('projects.index') }}" class="btn btn-primary">
                    Lihat Project
                </a>

                <a href="{{ route('contact') }}" class="btn btn-outline">
                    Hubungi Saya
                </a>
            </div>
        </div>

        <div class="card profile-card">
            @if ($profilePhotoFile)
                <img
                    src="{{ asset('images/' . $profilePhotoFile) }}"
                    alt="{{ $profile?->full_name ?? 'Foto Profile' }}"
                    class="profile-photo"
                >
            @else
                <div class="avatar">
                    {{ $profile?->avatar_initials ?? 'K' }}
                </div>
            @endif

            <h2 style="margin: 0 0 10px; letter-spacing: -0.03em;">
                {{ $profile?->full_name ?? 'Khuma' }}
            </h2>

            <p style="color: var(--muted); margin: 0;">
                {{ $profile?->headline ?? 'Junior Web Developer' }}
            </p>

            @if ($skillItems->isNotEmpty())
                <div class="skill-list">
                    @foreach ($skillItems as $skill)
                        <span class="skill">
                            {{ $skill->name }}
                        </span>
                    @endforeach
                </div>
            @else
                <p style="color: var(--muted); margin-top: 18px;">
                    Belum ada skill yang ditampilkan.
                </p>
            @endif
        </div>
    </section>

    <section class="container section">
        <div class="section-header">
            <div>
                <h2 class="section-title">About Me</h2>
                <p class="section-desc">
                    Saya terbiasa membangun website menggunakan konsep MVC, mengelola database,
                    membuat fitur CRUD, dan menggunakan admin panel untuk memperbarui data secara dinamis.
                </p>
            </div>
        </div>

        <div class="grid grid-3">
            <div class="card">
                <h3>Backend Development</h3>
                <p style="color: var(--muted); line-height: 1.7;">
                    Menggunakan Laravel untuk routing, model, migration, validation, dan pengolahan data.
                </p>
            </div>

            <div class="card">
                <h3>Frontend Development</h3>
                <p style="color: var(--muted); line-height: 1.7;">
                    Menggunakan Livewire dan Blade untuk membuat tampilan website interaktif tanpa menggunakan npm.
                </p>
            </div>

            <div class="card">
                <h3>Admin Panel</h3>
                <p style="color: var(--muted); line-height: 1.7;">
                    Menggunakan Filament V3 untuk mengelola project, contact message, profile, dan skills.
                </p>
            </div>
        </div>
    </section>

    <section class="container section">
        <div class="section-header">
            <div>
                <h2 class="section-title">Skill & Tech Stack</h2>
                <p class="section-desc">
                    Stack keahlian ini dikelola dari menu Skills di admin panel Filament dan ditampilkan dari database.
                </p>
            </div>
        </div>

        <div class="card">
            @if ($skillItems->isNotEmpty())
                <div class="skill-list">
                    @foreach ($skillItems as $skill)
                        <span class="skill">
                            {{ $skill->name }}
                        </span>
                    @endforeach
                </div>
            @else
                <div class="empty">
                    Belum ada skill. Tambahkan dari admin panel Filament.
                </div>
            @endif
        </div>
    </section>

    <section class="container section">
        <div class="section-header">
            <div>
                <h2 class="section-title">Featured Project</h2>
                <p class="section-desc">
                    Beberapa project website yang sedang atau pernah dibuat.
                </p>
            </div>

            <a href="{{ route('projects.index') }}" class="btn btn-outline">
                Semua Project
            </a>
        </div>

        @if ($featuredProjects->isNotEmpty())
            <div class="grid grid-3">
                @foreach ($featuredProjects as $project)
                    <article class="card project-card">
                        <span class="{{ $project->status_class }}">
                            {{ $project->status_label }}
                        </span>

                        <h3>{{ $project->title }}</h3>

                        <p>{{ $project->short_description }}</p>

                        @if (! empty($project->tech_stack_list))
                            <div class="skill-list">
                                @foreach ($project->tech_stack_list as $tech)
                                    <span class="skill">{{ $tech }}</span>
                                @endforeach
                            </div>
                        @endif

                        <div style="margin-top: 18px;">
                            <div class="progress">
                                <div class="progress-bar" style="--progress: {{ $project->progress }}%;"></div>
                            </div>
                        </div>

                        <div class="project-footer">
                            <strong>{{ $project->progress }}%</strong>

                            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                                <a href="{{ route('projects.show', $project) }}" class="btn btn-outline">
                                    Detail
                                </a>

                                @if ($project->repository_url)
                                    <a
                                        href="{{ $project->repository_url }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="btn btn-primary"
                                    >
                                        GitHub
                                    </a>
                                @endif
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="card empty">
                Belum ada featured project. Tambahkan dari admin panel Filament.
            </div>
        @endif
    </section>
</div>