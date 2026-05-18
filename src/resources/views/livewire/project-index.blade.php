<div>
    <section class="container section">
        <div class="section-header">
            <div>
                <div class="eyebrow">Project Showcase</div>

                <h1 class="section-title">
                    Daftar Project
                </h1>

                <p class="section-desc">
                    Halaman ini menampilkan daftar project website yang pernah atau sedang dibuat.
                    Data project dikelola secara dinamis melalui admin panel Filament.
                </p>
            </div>
        </div>

        <div class="card" style="margin-bottom: 24px;">
            <div class="grid grid-2">
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="label" for="search">Cari Project</label>
                    <input
                        id="search"
                        type="text"
                        class="input"
                        placeholder="Cari berdasarkan judul atau deskripsi..."
                        wire:model.live.debounce.300ms="search"
                    >
                </div>

                <div class="form-group" style="margin-bottom: 0;">
                    <label class="label" for="status">Filter Status</label>
                    <select id="status" class="select" wire:model.live="status">
                        <option value="">Semua Status</option>
                        <option value="planned">Direncanakan</option>
                        <option value="in_progress">Sedang Dikerjakan</option>
                        <option value="completed">Selesai</option>
                    </select>
                </div>
            </div>
        </div>

        @if ($projects->isNotEmpty())
            <div class="grid grid-3">
                @foreach ($projects as $project)
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
                                    <a href="{{ $project->repository_url }}" target="_blank" class="btn btn-primary">
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
                Project tidak ditemukan.
            </div>
        @endif
    </section>
</div>