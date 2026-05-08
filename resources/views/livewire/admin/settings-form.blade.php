<div class="space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-2xl font-semibold text-white">Website settings</h2>
            <p class="mt-2 text-text-muted">Update your portfolio branding, social links, and contact details.</p>
        </div>
    </div>

    <div class="rounded-3xl border border-primary/10 bg-[#0d0d0d]/90 p-8 shadow-lg">
        <div class="grid gap-6 lg:grid-cols-2">
            <div>
                <label class="block text-sm text-text-muted">Site title</label>
                <input wire:model.defer="form.site_title" class="input-primary mt-2 w-full" />
                @error('form.site_title') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm text-text-muted">Hero headline</label>
                <input wire:model.defer="form.hero_headline" class="input-primary mt-2 w-full" />
                @error('form.hero_headline') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm text-text-muted">Hero subheading</label>
                <textarea wire:model.defer="form.hero_subheading" rows="3" class="input-primary mt-2 w-full"></textarea>
                @error('form.hero_subheading') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm text-text-muted">Hero background image</label>
                <input wire:model.defer="form.hero_background_image" class="input-primary mt-2 w-full" />
                @error('form.hero_background_image') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm text-text-muted">CTA button text</label>
                <input wire:model.defer="form.cta_text" class="input-primary mt-2 w-full" />
                @error('form.cta_text') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm text-text-muted">CTA button URL</label>
                <input wire:model.defer="form.cta_url" class="input-primary mt-2 w-full" />
                @error('form.cta_url') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="block text-sm text-text-muted">Intro title</label>
                <input wire:model.defer="form.intro_title" class="input-primary mt-2 w-full" />
                @error('form.intro_title') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>
            <div class="lg:col-span-2">
                <label class="block text-sm text-text-muted">Intro text</label>
                <textarea wire:model.defer="form.intro_text" rows="4" class="input-primary mt-2 w-full"></textarea>
                @error('form.intro_text') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>
            <div class="lg:col-span-2">
                <label class="block text-sm text-text-muted">About title</label>
                <input wire:model.defer="form.about_title" class="input-primary mt-2 w-full" />
                @error('form.about_title') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>
            <div class="lg:col-span-2">
                <label class="block text-sm text-text-muted">About text</label>
                <textarea wire:model.defer="form.about_text" rows="5" class="input-primary mt-2 w-full"></textarea>
                @error('form.about_text') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>
            <div class="grid gap-6 lg:grid-cols-3">
                <div>
                    <label class="block text-sm text-text-muted">Email</label>
                    <input wire:model.defer="form.contact_email" class="input-primary mt-2 w-full" />
                    @error('form.contact_email') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm text-text-muted">Phone</label>
                    <input wire:model.defer="form.contact_phone" class="input-primary mt-2 w-full" />
                    @error('form.contact_phone') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm text-text-muted">Location</label>
                    <input wire:model.defer="form.location" class="input-primary mt-2 w-full" />
                    @error('form.location') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="lg:col-span-2">
                <label class="block text-sm text-text-muted">Social links (JSON)</label>
                <textarea wire:model.defer="form.social_links" rows="4" class="input-primary mt-2 w-full"></textarea>
                @error('form.social_links') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <button wire:click="save" class="btn-primary">Save Settings</button>
        </div>
    </div>
</div>
