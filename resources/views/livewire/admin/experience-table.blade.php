<div class="space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-2xl font-semibold text-white">Experience log</h2>
            <p class="mt-2 text-text-muted">Control work history entries shown on the portfolio timeline.</p>
        </div>
        <button wire:click="create" class="btn-primary inline-flex items-center gap-2">Add Experience</button>
    </div>

    <div class="rounded-3xl border border-primary/10 bg-[#0d0d0d]/90 p-4 shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm text-text-muted">
                <thead>
                    <tr>
                        <th class="px-4 py-3">Company</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Dates</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($experiences as $experience)
                        <tr class="border-t border-white/5 hover:bg-white/5">
                            <td class="px-4 py-4 text-white">{{ $experience->company }}</td>
                            <td class="px-4 py-4">{{ $experience->role }}</td>
                            <td class="px-4 py-4">{{ $experience->start_date->format('M Y') }} — {{ $experience->end_date?->format('M Y') ?? 'Present' }}</td>
                            <td class="px-4 py-4">{{ ucfirst($experience->status) }}</td>
                            <td class="px-4 py-4 space-x-2">
                                <button wire:click="edit({{ $experience->id }})" class="rounded-full border border-white/10 px-3 py-1 text-sm text-white transition hover:border-primary">Edit</button>
                                <button wire:click="delete({{ $experience->id }})" class="rounded-full border border-red-500/20 px-3 py-1 text-sm text-red-300 transition hover:bg-red-500/10">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if ($modalVisible)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 p-4">
            <div class="w-full max-w-3xl rounded-[2rem] border border-white/10 bg-[#090909]/95 p-8 shadow-2xl">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-white">{{ $editingExperience ? 'Edit Experience' : 'New Experience' }}</h3>
                    <button wire:click="$set('modalVisible', false)" class="text-text-muted">Close</button>
                </div>

                <div class="mt-6 grid gap-4 lg:grid-cols-2">
                    <div>
                        <label class="block text-sm text-text-muted">Company</label>
                        <input wire:model.defer="form.company" class="input-primary mt-2 w-full" />
                        @error('form.company') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">Role</label>
                        <input wire:model.defer="form.role" class="input-primary mt-2 w-full" />
                        @error('form.role') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">Start date</label>
                        <input wire:model.defer="form.start_date" type="month" class="input-primary mt-2 w-full" />
                        @error('form.start_date') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">End date</label>
                        <input wire:model.defer="form.end_date" type="month" class="input-primary mt-2 w-full" />
                        @error('form.end_date') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="lg:col-span-2">
                        <label class="block text-sm text-text-muted">Description</label>
                        <textarea wire:model.defer="form.description" rows="5" class="input-primary mt-2 w-full"></textarea>
                        @error('form.description') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">Display order</label>
                        <input wire:model.defer="form.display_order" type="number" class="input-primary mt-2 w-full" />
                        @error('form.display_order') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">Status</label>
                        <select wire:model.defer="form.status" class="input-primary mt-2 w-full">
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                        @error('form.status') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-8 flex items-center justify-end gap-3">
                    <button wire:click="$set('modalVisible', false)" class="btn-secondary">Cancel</button>
                    <button wire:click="save" class="btn-primary">Save Experience</button>
                </div>
            </div>
        </div>
    @endif
</div>
