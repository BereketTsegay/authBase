<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\SiteSetting;

class SettingsForm extends Component
{
    public $settings;
    public $form = [
        'site_name' => '',
        'tagline' => '',
        'hero_title' => '',
        'hero_subtitle' => '',
        'hero_cta_text' => '',
        'hero_cta_link' => '',
        'about_title' => '',
        'about_subtitle' => '',
        'footer_text' => '',
        'social_links' => [],
        'resume_url' => '',
        'current_focus' => '',
        'theme' => 'dark',
    ];

    protected function rules(): array
    {
        return [
            'form.site_name' => 'required|string|max:120',
            'form.tagline' => 'nullable|string|max:180',
            'form.hero_title' => 'nullable|string|max:180',
            'form.hero_subtitle' => 'nullable|string|max:600',
            'form.hero_cta_text' => 'nullable|string|max:40',
            'form.hero_cta_link' => 'nullable|string|max:180',
            'form.about_title' => 'nullable|string|max:120',
            'form.about_subtitle' => 'nullable|string|max:800',
            'form.footer_text' => 'nullable|string|max:280',
            'form.social_links' => 'nullable|array',
            'form.resume_url' => 'nullable|url|max:400',
            'form.current_focus' => 'nullable|string|max:180',
            'form.theme' => 'required|string|in:dark,light,auto',
        ];
    }

    public function mount(): void
    {
        $this->settings = SiteSetting::first();

        if ($this->settings) {
            $this->form = array_merge($this->form, $this->settings->toArray());
        }
    }

    public function save(): void
    {
        $this->validate();

        $data = array_merge($this->form, [
            'social_links' => $this->form['social_links'] ?? [],
        ]);

        SiteSetting::updateOrCreate(['id' => $this->settings->id ?? 1], $data);

        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Portfolio settings have been updated.',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.settings-form');
    }
}
