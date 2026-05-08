<section id="hero" class="relative overflow-hidden bg-[#050505] pb-28 pt-28">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(255,214,10,0.16),_transparent_24%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom_left,_rgba(255,214,10,0.08),_transparent_28%)]"></div>
    <div class="absolute inset-0 bg-[linear-gradient(180deg,rgba(10,10,10,0.72),rgba(10,10,10,0.94))]"></div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[1.2fr_0.8fr] items-center">
            <div class="space-y-8">
                <p class="text-sm uppercase tracking-[0.3em] text-primary/80 animation-fade-in">Premium portfolio experience</p>
                <h1 class="text-5xl font-semibold leading-tight tracking-tight text-white sm:text-6xl">{{ $settings->hero_title ?? 'Crafting bold digital products with premium polish and purpose.' }}</h1>
                <p class="max-w-2xl text-lg leading-8 text-text-muted">{{ $settings->hero_subtitle ?? 'I design, build, and launch high-end web platforms that marry strategy, performance, and cinematic interface design.' }}</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#contact" class="btn-primary inline-flex items-center gap-2 border border-primary/40 bg-primary px-6 py-3 text-sm font-semibold text-background shadow-[0_20px_80px_rgba(255,214,10,0.16)] transition hover:bg-primary/90">{{ $settings->hero_cta_text ?? 'Hire Me' }}</a>
                    <a href="#projects" class="btn-secondary inline-flex items-center gap-2 text-sm font-semibold">View Projects</a>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="glass-card p-6">
                        <p class="text-sm uppercase tracking-[0.3em] text-text-muted">Currently working on</p>
                        <p class="mt-3 text-xl font-semibold text-white">{{ $settings->current_focus ?? 'A cinematic enterprise SaaS launch flow.' }}</p>
                    </div>
                    <div class="glass-card p-6 flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm uppercase tracking-[0.3em] text-text-muted">Availability</p>
                            <p class="mt-3 text-xl font-semibold text-white">Open for selected projects</p>
                        </div>
                        <div class="h-14 w-14 rounded-full bg-primary/15 ring-1 ring-primary/20"></div>
                    </div>
                </div>
            </div>
            <div class="relative rounded-[2rem] bg-[#111111]/80 p-8 shadow-[0_40px_120px_rgba(0,0,0,0.45)] ring-1 ring-white/5 backdrop-blur-xl">
                <div class="absolute inset-0 rounded-[2rem] bg-[radial-gradient(circle_at_top_left,_rgba(255,214,10,0.12),_transparent_45%)]"></div>
                <div class="relative overflow-hidden rounded-[2rem] border border-white/5 bg-[#0d0d0d]/90 p-6">
                    <div class="mb-6 flex items-center gap-3">
                        <span class="inline-flex h-4 w-4 rounded-full bg-primary"></span>
                        <span class="text-sm uppercase tracking-[0.3em] text-text-muted">Featured work</span>
                    </div>
                    <div class="min-h-[360px] rounded-[1.5rem] bg-[#090909] p-6">
                        <div class="flex h-full flex-col justify-between gap-4">
                            <div class="space-y-3">
                                <div class="h-2.5 w-24 rounded-full bg-primary/20"></div>
                                <div class="h-3 w-16 rounded-full bg-primary/25"></div>
                                <div class="mt-6 space-y-3">
                                    <div class="h-3 w-40 rounded-full bg-white/10"></div>
                                    <div class="h-3 w-24 rounded-full bg-white/10"></div>
                                    <div class="h-3 w-28 rounded-full bg-white/10"></div>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-3">
                                <div class="h-20 rounded-3xl bg-white/5"></div>
                                <div class="h-20 rounded-3xl bg-white/5"></div>
                                <div class="h-20 rounded-3xl bg-white/5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="relative py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[0.75fr_1.25fr] items-center">
            <div class="space-y-6">
                <p class="text-sm uppercase tracking-[0.3em] text-primary/80">About</p>
                <h2 class="text-3xl font-semibold text-white">{{ $settings->about_title ?? 'Professional biography, shaped for modern brands.' }}</h2>
                <p class="text-lg leading-8 text-text-muted">{{ $settings->about_subtitle ?? 'I collaborate with ambitious companies to build immersive digital products and polished brand experiences, combining clean development with cinematic design systems.' }}</p>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="glass-card p-6">
                        <p class="text-sm uppercase tracking-[0.3em] text-text-muted">Experience</p>
                        <p class="mt-2 text-3xl font-semibold text-white">8+</p>
                    </div>
                    <div class="glass-card p-6">
                        <p class="text-sm uppercase tracking-[0.3em] text-text-muted">Projects</p>
                        <p class="mt-2 text-3xl font-semibold text-white">24</p>
                    </div>
                </div>
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <div class="glass-card p-6">
                    <p class="text-sm uppercase tracking-[0.3em] text-text-muted">Design systems</p>
                    <p class="mt-3 text-white">Built reusable component libraries for scalable brand consistency.</p>
                </div>
                <div class="glass-card p-6">
                    <p class="text-sm uppercase tracking-[0.3em] text-text-muted">Launch-ready</p>
                    <p class="mt-3 text-white">End-to-end execution from prototype to production delivery.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="skills" class="py-24 bg-[#070707]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-primary/80">Expertise</p>
                <h2 class="text-3xl font-semibold text-white">Technology and craft</h2>
            </div>
            <div class="rounded-full border border-primary/20 bg-white/5 px-5 py-3 text-sm text-text-muted">Interactive skill map</div>
        </div>
        <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($skills as $skill)
                <div class="glass-card p-6 hover:-translate-y-1 transition">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm uppercase tracking-[0.3em] text-text-muted">{{ $skill->category }}</p>
                            <h3 class="mt-2 text-xl font-semibold text-white">{{ $skill->name }}</h3>
                        </div>
                        <div class="rounded-full bg-primary/10 px-3 py-1 text-xs uppercase tracking-[0.3em] text-primary">{{ $skill->level }}</div>
                    </div>
                    <p class="mt-4 text-text-muted">{{ $skill->description }}</p>
                    <div class="mt-6 h-2 overflow-hidden rounded-full bg-white/10">
                        <div class="h-full rounded-full bg-gradient-to-r from-primary to-yellow-200" style="width: {{ $skill->proficiency }}%"></div>
                    </div>
                    <p class="mt-2 text-xs text-text-muted">Proficiency: {{ $skill->proficiency }}%</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="projects" class="py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.3em] text-primary/80">Featured work</p>
                <h2 class="text-3xl font-semibold text-white">A curated project showcase</h2>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <button wire:click.prevent="category = 'All'" class="rounded-full border px-4 py-2 text-sm transition {{ $category === 'All' ? 'border-primary bg-primary/10 text-white' : 'border-white/10 text-text-muted hover:border-primary hover:text-white' }}">All</button>
                @foreach ($projectCategories as $projectCategory)
                    <button wire:click.prevent="category = '{{ $projectCategory }}'" class="rounded-full border px-4 py-2 text-sm transition {{ $category === $projectCategory ? 'border-primary bg-primary/10 text-white' : 'border-white/10 text-text-muted hover:border-primary hover:text-white' }}">{{ $projectCategory }}</button>
                @endforeach
            </div>
        </div>
        <div class="mt-8 grid gap-6 xl:grid-cols-2">
            @forelse ($projects as $project)
                <article class="group relative overflow-hidden rounded-[2rem] border border-white/10 bg-[#101010]/90 p-6 shadow-[0_30px_80px_rgba(0,0,0,0.25)] transition hover:-translate-y-1">
                    <span class="absolute inset-x-0 top-0 h-0.5 bg-gradient-to-r from-primary to-yellow-200 opacity-0 transition group-hover:opacity-100"></span>
                    <div class="mb-5 flex items-center justify-between gap-3">
                        <span class="rounded-full bg-primary/10 px-3 py-1 text-xs uppercase tracking-[0.3em] text-primary">{{ $project->category }}</span>
                        @if ($project->featured)
                            <span class="rounded-full bg-white/10 px-3 py-1 text-xs uppercase tracking-[0.3em] text-text-muted">Featured</span>
                        @endif
                    </div>
                    <div class="space-y-4">
                        <h3 class="text-2xl font-semibold text-white">{{ $project->title }}</h3>
                        <p class="text-text-muted">{{ Str::limit($project->description, 160) }}</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($project->tech_stack ?? [] as $tech)
                                <span class="rounded-full bg-white/5 px-3 py-1 text-xs text-text-muted">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                </article>
            @empty
                <div class="glass-card p-8 text-center text-text-muted">No portfolio items have been published yet.</div>
            @endforelse
        </div>
    </div>
</section>

<section id="experience" class="py-24 bg-[#070707]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-4">
            <p class="text-sm uppercase tracking-[0.3em] text-primary/80">Timeline</p>
            <h2 class="text-3xl font-semibold text-white">Career highlights</h2>
        </div>
        <div class="mt-12 space-y-6">
            @foreach ($experiences as $experience)
                <div class="glass-card p-6">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <div>
                            <p class="text-lg font-semibold text-white">{{ $experience->title }}</p>
                            <p class="text-sm text-text-muted">{{ $experience->company }} — {{ $experience->location }}</p>
                        </div>
                        <span class="rounded-full bg-primary/10 px-4 py-2 text-sm text-primary">{{ $experience->is_current ? 'Present' : $experience->end_date?->format('M Y') }}</span>
                    </div>
                    <p class="mt-3 text-text-muted">{{ $experience->summary }}</p>
                    <ul class="mt-4 grid gap-2 text-text-muted sm:grid-cols-2">
                        @foreach ($experience->responsibilities ?? [] as $item)
                            <li class="flex items-start gap-3">• <span>{{ $item }}</span></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="testimonials" class="py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-4">
            <p class="text-sm uppercase tracking-[0.3em] text-primary/80">Testimonials</p>
            <h2 class="text-3xl font-semibold text-white">What partners say</h2>
        </div>
        <div class="mt-10 grid gap-6 lg:grid-cols-3">
            @foreach ($testimonials as $testimonial)
                <div class="glass-card p-6 hover:-translate-y-1 transition">
                    <p class="text-text-muted">“{{ $testimonial->quote }}”</p>
                    <div class="mt-6 flex items-center gap-4">
                        <img src="{{ $testimonial->avatar }}" alt="{{ $testimonial->name }}" class="h-12 w-12 rounded-full object-cover">
                        <div>
                            <p class="font-semibold text-white">{{ $testimonial->name }}</p>
                            <p class="text-sm text-text-muted">{{ $testimonial->role }} · {{ $testimonial->company }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section id="blog" class="py-24 bg-[#070707]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="space-y-4">
            <p class="text-sm uppercase tracking-[0.3em] text-primary/80">Insights</p>
            <h2 class="text-3xl font-semibold text-white">Latest blog posts</h2>
        </div>
        <div class="mt-10 grid gap-6 lg:grid-cols-3">
            @foreach ($blogPosts as $post)
                <a href="#" class="group block overflow-hidden rounded-[1.75rem] border border-white/10 bg-[#111111]/90 p-6 transition hover:-translate-y-1 hover:border-primary/25">
                    <div class="mb-4 h-44 rounded-[1.5rem] bg-cover bg-center" style="background-image:url('{{ $post->cover_image }}')"></div>
                    <p class="text-xs uppercase tracking-[0.3em] text-primary/90">{{ $post->category }}</p>
                    <h3 class="mt-4 text-xl font-semibold text-white">{{ $post->title }}</h3>
                    <p class="mt-3 text-text-muted">{{ Str::limit($post->excerpt, 120) }}</p>
                    <div class="mt-6 flex flex-wrap gap-2">
                        @foreach ($post->tags ?? [] as $tag)
                            <span class="rounded-full bg-white/5 px-3 py-1 text-xs text-text-muted">{{ $tag }}</span>
                        @endforeach
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section id="contact" class="py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-[0.9fr_0.85fr]">
            <div class="space-y-6">
                <p class="text-sm uppercase tracking-[0.3em] text-primary/80">Contact</p>
                <h2 class="text-3xl font-semibold text-white">Let&apos;s talk about your next project.</h2>
                <p class="max-w-xl text-lg leading-8 text-text-muted">Share the details of your requirements, timeline, or brand vision, and I’ll follow up with an enterprise-ready plan.</p>
                <div class="space-y-4 rounded-[2rem] border border-white/10 bg-[#111111]/90 p-8 shadow-[0_30px_80px_rgba(0,0,0,0.25)]">
                    <p class="text-sm uppercase tracking-[0.3em] text-text-muted">Reach out</p>
                    <p class="text-white">Email: <a href="mailto:hello@noirstudio.com" class="text-primary">hello@noirstudio.com</a></p>
                    <p class="text-white">LinkedIn: <a href="https://linkedin.com" class="text-primary">linkedin.com/in/username</a></p>
                </div>
            </div>
            <div>
                @livewire('portfolio.contact-form')
            </div>
        </div>
    </div>
</section>
