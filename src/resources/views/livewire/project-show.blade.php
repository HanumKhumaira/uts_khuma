<div>
    <section class="container section">
        <a href="{{ route('projects.index') }}" class="btn btn-outline" style="margin-bottom: 24px;">
            ← Kembali ke Projects
        </a>

        <div class="grid grid-2">
            <div class="card">
                <span class="{{ $project->status_class }}">
                    {{ $project->status_label }}
                </span>

                <h1 class="section-title">
                    {{ $project->title }}
                </h1>

                <p class="section-desc">
                    {{ $project->short_description }}
                </p>

                <div style="margin-top: 24px;">
                    <div class="progress">
                        <div class="progress-bar" style="--progress: {{ $project->progress }}%;"></div>
                    </div>

                    <p style="color: var(--muted); font-weight: 800; margin-top: 10px;">
                        Progress Project: {{ $project->progress }}%
                    </p>
                </div>

                @if (! empty($project->tech_stack))
                    <div class="skill-list">
                        @foreach ($project->tech_stack as $tech)
                            <span class="skill">{{ $tech }}</span>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="card">
                <h2 style="margin-top: 0; letter-spacing: -0.04em;">
                    Detail Project
                </h2>

                <p style="color: var(--muted); line-height: 1.8;">
                    {{ $project->description }}
                </p>

                <div class="button-group">
                    @if ($project->repository_url)
                        <a href="{{ $project->repository_url }}" target="_blank" class="btn btn-outline">
                            Repository
                        </a>
                    @endif

                    @if ($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-primary">
                            Demo Website
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>