<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Portfolio' }} - {{ config('app.name') }}</title>

    @livewireStyles

    <style>
        :root {
            --bg: #f8fafc;
            --surface: #ffffff;
            --surface-soft: #f1f5f9;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --success: #16a34a;
            --warning: #d97706;
            --danger: #dc2626;
            --shadow: 0 20px 45px rgba(15, 23, 42, 0.08);
        }

        [data-theme="dark"] {
            --bg: #020617;
            --surface: #0f172a;
            --surface-soft: #111827;
            --text: #e5e7eb;
            --muted: #94a3b8;
            --border: #1e293b;
            --primary: #60a5fa;
            --primary-dark: #3b82f6;
            --success: #22c55e;
            --warning: #f59e0b;
            --danger: #f87171;
            --shadow: 0 20px 45px rgba(0, 0, 0, 0.35);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, 0.12), transparent 35%),
                var(--bg);
            color: var(--text);
            transition: background 0.25s ease, color 0.25s ease;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(1120px, calc(100% - 32px));
            margin: 0 auto;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(16px);
            background: color-mix(in srgb, var(--bg) 86%, transparent);
            border-bottom: 1px solid var(--border);
        }

        .nav-inner {
            min-height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .brand {
            font-size: 20px;
            font-weight: 900;
            letter-spacing: -0.04em;
        }

        .brand span {
            color: var(--primary);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .nav-link {
            padding: 10px 14px;
            border-radius: 999px;
            color: var(--muted);
            font-weight: 700;
            font-size: 14px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: var(--surface-soft);
            color: var(--text);
        }

        .theme-btn {
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--text);
            padding: 10px 14px;
            border-radius: 999px;
            cursor: pointer;
            font-weight: 800;
        }

        .hero {
            min-height: calc(100vh - 72px);
            display: grid;
            grid-template-columns: 1.25fr 0.75fr;
            align-items: center;
            gap: 40px;
            padding: 70px 0;
        }

        .eyebrow {
            display: inline-flex;
            padding: 8px 12px;
            border: 1px solid var(--border);
            border-radius: 999px;
            color: var(--primary);
            font-weight: 900;
            background: var(--surface);
            margin-bottom: 18px;
        }

        .title {
            font-size: clamp(42px, 7vw, 76px);
            line-height: 0.95;
            letter-spacing: -0.07em;
            margin: 0 0 20px;
        }

        .subtitle {
            color: var(--muted);
            font-size: 18px;
            line-height: 1.8;
            margin: 0 0 14px;
        }

        .button-group {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 26px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 12px 18px;
            font-weight: 900;
            border: 1px solid transparent;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-outline {
            background: var(--surface);
            color: var(--text);
            border-color: var(--border);
        }

        .section {
            padding: 55px 0;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 24px;
        }

        .section-title {
            font-size: 34px;
            letter-spacing: -0.05em;
            margin: 0 0 8px;
        }

        .section-desc {
            color: var(--muted);
            line-height: 1.7;
            margin: 0;
        }

        .grid {
            display: grid;
            gap: 18px;
        }

        .grid-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .grid-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 28px;
            padding: 24px;
            box-shadow: var(--shadow);
        }

        .profile-card {
            text-align: center;
        }

       .avatar {
    width: 118px;
    height: 118px;
    border-radius: 32px;
    display: grid;
    place-items: center;
    margin: 0 auto 18px;
    background: linear-gradient(135deg, var(--primary), #9333ea);
    color: white;
    font-size: 44px;
    font-weight: 900;
    letter-spacing: -0.06em;
}

.profile-photo {
    width: 118px;
    height: 118px;
    border-radius: 32px;
    object-fit: cover;
    display: block;
    margin: 0 auto 18px;
    border: 4px solid var(--surface-soft);
    box-shadow: var(--shadow);
}

        .skill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 18px;
        }

        .skill {
            padding: 8px 12px;
            border-radius: 999px;
            background: var(--surface-soft);
            border: 1px solid var(--border);
            color: var(--text);
            font-weight: 800;
            font-size: 13px;
        }

        .badge {
            display: inline-flex;
            border-radius: 999px;
            padding: 7px 10px;
            font-size: 12px;
            font-weight: 900;
            margin-bottom: 12px;
        }

        .badge-muted {
            background: var(--surface-soft);
            color: var(--muted);
        }

        .badge-warning {
            background: rgba(245, 158, 11, 0.14);
            color: var(--warning);
        }

        .badge-success {
            background: rgba(34, 197, 94, 0.14);
            color: var(--success);
        }

        .progress {
            height: 10px;
            background: var(--surface-soft);
            border-radius: 999px;
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .progress-bar {
            height: 100%;
            width: var(--progress);
            background: linear-gradient(90deg, var(--primary), #9333ea);
            border-radius: 999px;
        }

        .project-card h3 {
            margin: 0 0 10px;
            font-size: 22px;
            letter-spacing: -0.04em;
        }

        .project-card p {
            color: var(--muted);
            line-height: 1.7;
        }

        .project-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-top: 18px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .label {
            display: block;
            font-weight: 900;
            margin-bottom: 8px;
        }

        .input,
        .textarea,
        .select {
            width: 100%;
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--text);
            border-radius: 18px;
            padding: 13px 14px;
            outline: none;
            font: inherit;
        }

        .textarea {
            min-height: 150px;
            resize: vertical;
        }

        .input:focus,
        .textarea:focus,
        .select:focus {
            border-color: var(--primary);
        }

        .error {
            color: var(--danger);
            font-size: 13px;
            margin-top: 6px;
            font-weight: 700;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 18px;
            margin-bottom: 18px;
            font-weight: 800;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.14);
            color: var(--success);
            border: 1px solid rgba(34, 197, 94, 0.28);
        }

        .empty {
            text-align: center;
            color: var(--muted);
            font-weight: 800;
        }

        .footer {
            border-top: 1px solid var(--border);
            padding: 28px 0;
            color: var(--muted);
            text-align: center;
        }

        @media (max-width: 860px) {
            .hero,
            .grid-2,
            .grid-3 {
                grid-template-columns: 1fr;
            }

            .section-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .nav-inner {
                align-items: flex-start;
                flex-direction: column;
                padding: 16px 0;
            }

            .nav-menu {
                width: 100%;
            }
        }

        /* =========================================================
   Final Theme Override - Navy Brown Portfolio
   Hanya override warna + animasi halus.
   Tidak mengubah ukuran, bentuk, grid, spacing, atau struktur.
========================================================= */

:root {
    --primary: #1e3a5f;
    --primary-dark: #132c49;
    --primary-soft: rgba(30, 58, 95, 0.12);

    --accent: #8b5e34;
    --accent-dark: #5c3b20;
    --accent-soft: rgba(139, 94, 52, 0.14);

    --bg: #f6f2ec;
    --surface: #fffaf3;
    --surface-soft: #efe3d3;

    --text: #172033;
    --muted: #6f6257;
    --border: rgba(30, 58, 95, 0.14);

    --shadow: 0 20px 55px rgba(30, 58, 95, 0.12);
}

html[data-theme="dark"] {
    --primary: #9dbbe8;
    --primary-dark: #6d93c6;
    --primary-soft: rgba(157, 187, 232, 0.12);

    --accent: #c28b5c;
    --accent-dark: #9f6840;
    --accent-soft: rgba(194, 139, 92, 0.14);

    --bg: #0b111c;
    --surface: #121a27;
    --surface-soft: #1d2635;

    --text: #f5efe7;
    --muted: #b9aa9a;
    --border: rgba(194, 139, 92, 0.18);

    --shadow: 0 22px 60px rgba(0, 0, 0, 0.36);
}

body {
    background:
        radial-gradient(circle at top left, var(--primary-soft), transparent 34%),
        radial-gradient(circle at bottom right, var(--accent-soft), transparent 32%),
        var(--bg);
    color: var(--text);
}

.navbar,
.card,
.input,
.select,
.textarea {
    border-color: var(--border);
}

.navbar,
.card {
    background: color-mix(in srgb, var(--surface) 92%, transparent);
    box-shadow: var(--shadow);
}

.logo,
.section-title,
.title,
.card h2,
.card h3 {
    color: var(--text);
}

.eyebrow {
    color: var(--accent);
}

.subtitle,
.section-desc,
.card p {
    color: var(--muted);
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary), var(--accent));
    color: #ffffff;
    border-color: transparent;
}

.btn-outline,
.theme-btn {
    color: var(--primary);
    border-color: var(--border);
    background: var(--surface);
}

.btn-outline:hover,
.theme-btn:hover {
    background: var(--primary-soft);
    color: var(--primary-dark);
}

.skill {
    background: linear-gradient(135deg, var(--primary-soft), var(--accent-soft));
    color: var(--primary-dark);
    border-color: var(--border);
}

html[data-theme="dark"] .skill {
    color: var(--text);
}

.progress {
    background: var(--surface-soft);
}

.progress-bar {
    background: linear-gradient(90deg, var(--primary), var(--accent));
}

.badge-success {
    background: rgba(34, 197, 94, 0.12);
    color: #15803d;
}

.badge-warning {
    background: var(--accent-soft);
    color: var(--accent-dark);
}

.badge-muted {
    background: var(--primary-soft);
    color: var(--primary-dark);
}

html[data-theme="dark"] .badge-success {
    color: #86efac;
}

html[data-theme="dark"] .badge-warning {
    color: #f7c794;
}

html[data-theme="dark"] .badge-muted {
    color: #c7dcff;
}

/* Animasi halus tanpa mengubah ukuran/bentuk */
@keyframes softFadeUp {
    from {
        opacity: 0;
        transform: translateY(14px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes softGlow {
    0% {
        box-shadow: var(--shadow);
    }

    50% {
        box-shadow: 0 24px 70px rgba(139, 94, 52, 0.18);
    }

    100% {
        box-shadow: var(--shadow);
    }
}

.hero > *,
.section,
.card {
    animation: softFadeUp 0.55s ease both;
}

.hero > *:nth-child(2) {
    animation-delay: 0.08s;
}

.section:nth-of-type(2) {
    animation-delay: 0.08s;
}

.section:nth-of-type(3) {
    animation-delay: 0.12s;
}

.section:nth-of-type(4) {
    animation-delay: 0.16s;
}

.project-card,
.profile-card {
    transition:
        border-color 0.25s ease,
        box-shadow 0.25s ease,
        background-color 0.25s ease;
}

.project-card:hover,
.profile-card:hover {
    border-color: color-mix(in srgb, var(--accent) 42%, var(--border));
    animation: softGlow 1.8s ease infinite;
}

.btn,
.nav-link,
.theme-btn {
    transition:
        background-color 0.25s ease,
        color 0.25s ease,
        border-color 0.25s ease,
        opacity 0.25s ease;
}

.btn:hover,
.nav-link:hover,
.theme-btn:hover {
    opacity: 0.9;
}

@media (prefers-reduced-motion: reduce) {
    .hero > *,
    .section,
    .card,
    .project-card:hover,
    .profile-card:hover {
        animation: none;
    }

    .btn,
    .nav-link,
    .theme-btn,
    .project-card,
    .profile-card {
        transition: none;
    }
}
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container nav-inner">
            <a href="{{ route('home') }}" class="brand">
                Khuma<span>.</span>
            </a>

            <div class="nav-menu">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>

                <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                    Projects
                </a>

                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    Contact
                </a>

                <a href="/admin" class="nav-link">
                    Admin
                </a>

                <button type="button" class="theme-btn" onclick="toggleTheme()" id="themeToggle">
                    Dark Mode
                </button>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer class="footer">
        <div class="container">
            © {{ date('Y') }} Khuma. Built with Laravel, Livewire, Blade, Filament V3, MariaDB, and Docker.
        </div>
    </footer>

    @livewireScripts

<script>
    const savedTheme = localStorage.getItem('portfolio-theme') || 'light';
    const themeToggle = document.getElementById('themeToggle');

    function applyTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('portfolio-theme', theme);

        if (themeToggle) {
            themeToggle.textContent = theme === 'dark' ? 'Light Mode' : 'Dark Mode';
        }
    }

    function toggleTheme() {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const nextTheme = currentTheme === 'dark' ? 'light' : 'dark';

        applyTheme(nextTheme);
    }

    applyTheme(savedTheme);
</script>
</body>
</html>