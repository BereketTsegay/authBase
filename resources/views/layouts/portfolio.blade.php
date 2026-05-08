<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name', 'Noir Studio') }}</title>
    <meta name="description" content="Premium portfolio built with Laravel, Livewire, Tailwind and Alpine.js.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-background text-white selection:bg-primary selection:text-black overflow-x-hidden">
    <div class="min-h-screen">
        <header class="fixed inset-x-0 top-0 z-50 backdrop-blur-lg bg-black/40 border-b border-primary/10">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                <a href="#hero" class="text-base font-semibold tracking-wide text-primary">Noir Studio</a>
                <nav class="hidden md:flex items-center gap-6 text-sm text-text-muted">
                    <a href="#about" class="hover:text-white transition">About</a>
                    <a href="#skills" class="hover:text-white transition">Skills</a>
                    <a href="#projects" class="hover:text-white transition">Projects</a>
                    <a href="#experience" class="hover:text-white transition">Experience</a>
                    <a href="#testimonials" class="hover:text-white transition">Testimonials</a>
                    <a href="#blog" class="hover:text-white transition">Blog</a>
                    <a href="#contact" class="rounded-full border border-primary/40 bg-primary/5 px-4 py-2 text-primary transition hover:bg-primary/15">Contact</a>
                </nav>
                <div class="flex items-center gap-2">
                    <button x-data @click="document.documentElement.classList.toggle('dark')" class="rounded-full border border-primary/20 px-3 py-2 text-sm text-white/80 hover:bg-primary/10 transition">Theme</button>
                </div>
            </div>
        </header>

        <main class="relative pt-24">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>
</html>
