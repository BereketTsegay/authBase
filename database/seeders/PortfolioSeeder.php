<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Testimonial;
use App\Models\BlogPost;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Noir Studio',
                'tagline' => 'Cinematic digital experiences for future-focused brands.',
                'hero_title' => 'Crafting bold digital products with premium polish and purpose.',
                'hero_subtitle' => 'I design, build, and launch high-end web platforms that marry strategy, performance, and cinematic interface design.',
                'hero_cta_text' => 'Hire Me',
                'hero_cta_link' => '#contact',
                'about_title' => 'Strategic design. Code with precision.',
                'about_subtitle' => 'I bring enterprise-grade engineering to polished brand experiences — from startup launches to mission-critical SaaS products.',
                'footer_text' => 'Designed and developed with a premium black & yellow aesthetic for high-impact digital storytelling.',
                'social_links' => [
                    'github' => 'https://github.com/username',
                    'linkedin' => 'https://linkedin.com/in/username',
                    'twitter' => 'https://twitter.com/username',
                ],
                'resume_url' => '/storage/resume.pdf',
                'current_focus' => 'Building a new enterprise SaaS launch experience.',
                'theme' => 'dark',
            ]
        );

        $projects = [
            [
                'title' => 'Aurora Finance',
                'slug' => 'aurora-finance',
                'description' => 'A premium dashboard for modern finance teams, blending real-time trading metrics, analytics, and a cinematic dark UI.',
                'thumbnail' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=900&q=80',
                'cover_image' => 'https://images.unsplash.com/photo-1509395176047-4a66953fd231?auto=format&fit=crop&w=1200&q=80',
                'tech_stack' => ['Laravel', 'Livewire', 'Tailwind CSS', 'MySQL'],
                'category' => 'Web App',
                'featured' => true,
            ],
            [
                'title' => 'Noir Creative Studio',
                'slug' => 'noir-creative-studio',
                'description' => 'A showcase site for a creative agency with motion-led hero sections, polished case studies, and a bold brand system.',
                'thumbnail' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=900&q=80',
                'cover_image' => 'https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&fit=crop&w=1200&q=80',
                'tech_stack' => ['Alpine.js', 'Tailwind CSS', 'Figma'],
                'category' => 'Branding',
                'featured' => false,
            ],
            [
                'title' => 'Vertex SaaS Launch',
                'slug' => 'vertex-saas-launch',
                'description' => 'A launch platform engineered for rapid conversion, rich storytelling, and performance at scale.',
                'thumbnail' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=900&q=80',
                'cover_image' => 'https://images.unsplash.com/photo-1511497584788-876760111969?auto=format&fit=crop&w=1200&q=80',
                'tech_stack' => ['Laravel', 'Alpine.js', 'Vite', 'Heroicons'],
                'category' => 'Launch Site',
                'featured' => true,
            ],
            [
                'title' => 'Pulse Analytics',
                'slug' => 'pulse-analytics',
                'description' => 'An analytics platform with a UI designed for fast decision-making, KPI tracking, and executive reporting.',
                'thumbnail' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=900&q=80',
                'cover_image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80',
                'tech_stack' => ['MySQL', 'Laravel', 'Livewire', 'Tailwind CSS'],
                'category' => 'Dashboard',
                'featured' => false,
            ],
        ];
        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], array_merge($project, ['status' => 'published', 'priority' => 1]));
        }

        $skills = [
            ['name' => 'Laravel', 'category' => 'Backend', 'proficiency' => 98, 'description' => 'Enterprise application architecture and API development.'],
            ['name' => 'Livewire 3', 'category' => 'Frontend', 'proficiency' => 94, 'description' => 'Reactive interface design without heavy JS frameworks.'],
            ['name' => 'Tailwind CSS', 'category' => 'UI/UX', 'proficiency' => 96, 'description' => 'High-fidelity interfaces with a premium visual system.'],
            ['name' => 'Alpine.js', 'category' => 'Frontend', 'proficiency' => 90, 'description' => 'Micro-interactions and motion-rich experiences.'],
            ['name' => 'MySQL', 'category' => 'Database', 'proficiency' => 92, 'description' => 'Relational modeling, performance tuning, and analytics queries.'],
            ['name' => 'DevOps', 'category' => 'DevOps', 'proficiency' => 86, 'description' => 'Deployment automation, CI/CD, and cloud-ready infrastructure.'],
        ];
        foreach ($skills as $index => $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name']],
                array_merge($skill, ['display_order' => $index + 1, 'status' => 'active'])
            );
        }

        $experiences = [
            [
                'title' => 'Lead Product Engineer',
                'company' => 'Obsidian Labs',
                'location' => 'Remote',
                'start_date' => '2022-08-01',
                'end_date' => null,
                'is_current' => true,
                'summary' => 'Leading the delivery of high-end SaaS platforms and enterprise marketing tools.',
                'responsibilities' => [
                    'Own end-to-end product engineering for enterprise grade builds.',
                    'Partner with design teams to deliver visually rich dashboards.',
                    'Scale backend architecture for multi-tenant SaaS workflows.',
                ],
                'company_logo' => 'https://ui-avatars.com/api/?background=FFD60A&color=0A0A0A&name=OL',
            ],
            [
                'title' => 'Senior Full Stack Developer',
                'company' => 'Neon Systems',
                'location' => 'San Francisco, CA',
                'start_date' => '2020-04-01',
                'end_date' => '2022-07-01',
                'is_current' => false,
                'summary' => 'Built modular web experiences for technology and media companies.',
                'responsibilities' => [
                    'Designed reusable UI systems for rapid product releases.',
                    'Created backend APIs to support real-time dashboards.',
                    'Managed cross-functional delivery cycles with agile teams.',
                ],
                'company_logo' => 'https://ui-avatars.com/api/?background=FFD60A&color=0A0A0A&name=NS',
            ],
            [
                'title' => 'UX Engineer',
                'company' => 'Spectra Collective',
                'location' => 'London, UK',
                'start_date' => '2018-01-01',
                'end_date' => '2020-03-01',
                'is_current' => false,
                'summary' => 'Created immersive product experiences and motion-led brand platforms.',
                'responsibilities' => [
                    'Transformed creative direction into interactive UI code.',
                    'Delivered responsive designs with elegant micro-animations.',
                    'Collaborated on storytelling-driven product launches.',
                ],
                'company_logo' => 'https://ui-avatars.com/api/?background=FFD60A&color=0A0A0A&name=SC',
            ],
        ];
        foreach ($experiences as $index => $experience) {
            Experience::updateOrCreate(
                ['title' => $experience['title'], 'company' => $experience['company']],
                array_merge($experience, ['display_order' => $index + 1, 'status' => 'active'])
            );
        }

        $testimonials = [
            [
                'name' => 'Maya Chen',
                'role' => 'Head of Growth',
                'company' => 'Pulse Venture',
                'quote' => 'A flawless blend of strategy and craft. Delivered a web experience that felt premium, fast, and deeply polished.',
                'avatar' => 'https://ui-avatars.com/api/?background=FFD60A&color=0A0A0A&name=MC',
            ],
            [
                'name' => 'Noah Reed',
                'role' => 'Founder',
                'company' => 'Vertex Studio',
                'quote' => 'Their attention to detail and ability to translate business goals into a cinematic interface was exceptional.',
                'avatar' => 'https://ui-avatars.com/api/?background=FFD60A&color=0A0A0A&name=NR',
            ],
            [
                'name' => 'Alia Morgan',
                'role' => 'Product Director',
                'company' => 'Aurora Labs',
                'quote' => 'Everything moved faster than expected and the end product looked like a top-tier digital studio release.',
                'avatar' => 'https://ui-avatars.com/api/?background=FFD60A&color=0A0A0A&name=AM',
            ],
        ];
        foreach ($testimonials as $index => $testimonial) {
            Testimonial::updateOrCreate(
                ['name' => $testimonial['name'], 'company' => $testimonial['company']],
                array_merge($testimonial, ['display_order' => $index + 1, 'status' => 'published'])
            );
        }

        $blogPosts = [
            [
                'title' => 'Designing with Contrast for Impact',
                'slug' => 'designing-with-contrast-for-impact',
                'excerpt' => 'How premium dark interfaces use contrast, motion, and hierarchy to create memorable brand experiences.',
                'content' => 'A tactical guide to color, typography, and motion in modern web platforms.',
                'cover_image' => 'https://images.unsplash.com/photo-1514970721712-76e3ba5c8b78?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Design',
                'tags' => ['UI', 'Branding', 'Motion'],
            ],
            [
                'title' => 'Building Real-Time Dashboards with Livewire',
                'slug' => 'building-real-time-dashboards-with-livewire',
                'excerpt' => 'A practical walkthrough for creating responsive, data-driven analytics panels with Livewire 3.',
                'content' => 'Step-by-step implementation patterns, best practices, and performance tips.',
                'cover_image' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Development',
                'tags' => ['Laravel', 'Livewire', 'Performance'],
            ],
            [
                'title' => 'Launch System Architecture for High-Traffic Sites',
                'slug' => 'launch-system-architecture-for-high-traffic-sites',
                'excerpt' => 'How to design launch-ready websites with reliable load times, scalable workflows, and premium user moments.',
                'content' => 'A deep dive into caching, asset delivery, and front-end motion design.',
                'cover_image' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Productivity',
                'tags' => ['Performance', 'Launch', 'SaaS'],
            ],
        ];
        foreach ($blogPosts as $post) {
            BlogPost::updateOrCreate(
                ['slug' => $post['slug']],
                array_merge($post, ['status' => 'published', 'published_at' => now()->subDays(rand(4, 28))])
            );
        }
    }
}
