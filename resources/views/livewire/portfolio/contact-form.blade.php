<div class="glass-card rounded-[2rem] border border-primary/15 bg-[#0d0d0d]/95 p-8 shadow-[0_40px_80px_rgba(0,0,0,0.3)]">
    <h3 class="text-2xl font-semibold text-white">Message me</h3>
    <p class="mt-3 text-text-muted">Send a brief about your project, timeline, or collaboration.</p>

    <form wire:submit.prevent="submit" class="mt-8 space-y-5">
        <div>
            <label class="block text-sm font-medium text-text-muted">Name</label>
            <input wire:model.defer="name" type="text" class="input-primary mt-2" placeholder="Your full name" />
            @error('name') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-text-muted">Email</label>
            <input wire:model.defer="email" type="email" class="input-primary mt-2" placeholder="you@email.com" />
            @error('email') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-text-muted">Subject</label>
            <input wire:model.defer="subject" type="text" class="input-primary mt-2" placeholder="Project brief" />
            @error('subject') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-text-muted">Message</label>
            <textarea wire:model.defer="message" rows="6" class="input-primary mt-2 resize-none" placeholder="Tell me about your idea..."></textarea>
            @error('message') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn-primary w-full rounded-full py-3 text-sm font-semibold">Send Message</button>
    </form>
</div>
