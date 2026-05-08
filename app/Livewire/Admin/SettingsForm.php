<?php

namespace App\Livewire\Admin;

use App\Models\SiteSetting;
use Livewire\Component;
use Livewire\Attributes\Validate;

class SettingsForm extends Component
{
    #[Validate('required|string|max:255')]
    public $site_title = '';

    #[Validate('required|string')]
    public $hero_headline = '';

    #[Validate('required|string')]
    public $hero_subheading = '';

    #[Validate('nullable|url')]
    public $hero_background_image = '';

    #[Validate('required|string|max:100')]
    public $cta_text = '';

    #[Validate('required|url')]
    public $cta_url = '';

    #[Validate('required|string|max:255')]
    public $intro_title = '';

    #[Validate('required|string')]
    public $intro_text = '';

    #[Validate('required|string|max:255')]
    public $about_title = '';

    #[Validate('required|string')]
    public $about_text = '';

    #[Validate('required|email')]
    public $contact_email = '';

    #[Validate('nullable|string|max:20')]
    public $contact_phone = '';

    #[Validate('required|string|max:255')]
    public $location = '';

    #[Validate('nullable|json')]
    public $social_links = '';

    public function mount()
    {
        $settings = SiteSetting::first();
        if ($settings) {
            $this->site_title = $settings->site_title;
            $this->hero_headline = $settings->hero_headline;
            $this->hero_subheading = $settings->hero_subheading;
            $this->hero_background_image = $settings->hero_background_image;
            $this->cta_text = $settings->cta_text;
            $this->cta_url = $settings->cta_url;
            $this->intro_title = $settings->intro_title;
            $this->intro_text = $settings->intro_text;
            $this->about_title = $settings->about_title;
            $this->about_text = $settings->about_text;
            $this->contact_email = $settings->contact_email;
            $this->contact_phone = $settings->contact_phone;
            $this->location = $settings->location;
            $this->social_links = $settings->social_links;
        }
    }

    public function save()
    {
        $this->validate();

        $settings = SiteSetting::firstOrCreate([]);
        $settings->update([
            'site_title' => $this->site_title,
            'hero_headline' => $this->hero_headline,
            'hero_subheading' => $this->hero_subheading,
            'hero_background_image' => $this->hero_background_image,
            'cta_text' => $this->cta_text,
            'cta_url' => $this->cta_url,
            'intro_title' => $this->intro_title,
            'intro_text' => $this->intro_text,
            'about_title' => $this->about_title,
            'about_text' => $this->about_text,
            'contact_email' => $this->contact_email,
            'contact_phone' => $this->contact_phone,
            'location' => $this->location,
            'social_links' => $this->social_links,
        ]);

        $this->dispatch('notify', message: 'Settings saved successfully');
    }

    public function render()
    {
        return view('livewire.admin.settings-form');
    }
}
