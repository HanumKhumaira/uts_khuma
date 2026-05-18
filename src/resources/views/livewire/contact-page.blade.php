<div>
    <section class="container section">
        <div class="section-header">
            <div>
                <div class="eyebrow">Contact</div>

                <h1 class="section-title">
                    Hubungi Saya
                </h1>

                <p class="section-desc">
                    Silakan kirim pesan melalui form ini. Pesan akan tersimpan ke database
                    dan bisa dilihat melalui admin panel Filament.
                </p>
            </div>
        </div>

        <div class="grid grid-2">
            <div class="card">
                <h2 style="margin-top: 0; letter-spacing: -0.04em;">
                    Informasi Kontak
                </h2>

                <p style="color: var(--muted); line-height: 1.8;">
                    Hubungi saya melalui form di sebelah kanan atau melalui informasi kontak berikut. 
                </p>

                <div style="margin-top: 24px;">
                    <p style="margin-bottom: 10px;">
                        <strong>Nama:</strong><br>
                        <span style="color: var(--muted);">
                            {{ $profile?->full_name ?? 'Khuma' }}
                        </span>
                    </p>

                    <p style="margin-bottom: 10px;">
                        <strong>Email:</strong><br>
                        <span style="color: var(--muted);">
                            {{ $profile?->email ?? 'admin@admin.com' }}
                        </span>
                    </p>

                    <p style="margin-bottom: 10px;">
                        <strong>Lokasi:</strong><br>
                        <span style="color: var(--muted);">
                            {{ $profile?->location ?? 'Indonesia' }}
                        </span>
                    </p>

                    @if ($profile?->github_url)
                        <p style="margin-bottom: 10px;">
                            <strong>GitHub:</strong><br>
                            <a
                                href="{{ $profile->github_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                style="color: var(--primary); font-weight: 800;"
                            >
                                {{ $profile->github_url }}
                            </a>
                        </p>
                    @endif

                    @if ($profile?->linkedin_url)
                        <p style="margin-bottom: 10px;">
                            <strong>LinkedIn:</strong><br>
                            <a
                                href="{{ $profile->linkedin_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                style="color: var(--primary); font-weight: 800;"
                            >
                                {{ $profile->linkedin_url }}
                            </a>
                        </p>
                    @endif

                    @if ($profile?->instagram_url)
                        <p style="margin-bottom: 10px;">
                            <strong>Instagram:</strong><br>
                            <a
                                href="{{ $profile->instagram_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                style="color: var(--primary); font-weight: 800;"
                            >
                                {{ '@whosh4ra' }}
                            </a>
                        </p>
                    @endif
                </div>
            </div>

            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit="submit">
                    <div class="form-group">
                        <label for="name" class="label">Nama</label>
                        <input
                            id="name"
                            type="text"
                            class="input"
                            placeholder="Masukkan nama kamu"
                            wire:model="name"
                        >
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="label">Email</label>
                        <input
                            id="email"
                            type="email"
                            class="input"
                            placeholder="nama@email.com"
                            wire:model="email"
                        >
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="subject" class="label">Subject</label>
                        <input
                            id="subject"
                            type="text"
                            class="input"
                            placeholder="Judul pesan"
                            wire:model="subject"
                        >
                        @error('subject')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message" class="label">Pesan</label>
                        <textarea
                            id="message"
                            class="textarea"
                            placeholder="Tulis pesan kamu..."
                            wire:model="message"
                        ></textarea>
                        @error('message')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                        <span wire:loading.remove>Kirim Pesan</span>
                        <span wire:loading>Mengirim...</span>
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>