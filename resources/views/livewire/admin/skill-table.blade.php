<div class="space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-2xl font-semibold text-white">Skill matrix</h2>
            <p class="mt-2 text-text-muted">Adjust skill categories, proficiency, and display order.</p>
        </div>
        <button wire:click="create" class="btn-primary inline-flex items-center gap-2">Add Skill</button>
    </div>

    <div class="rounded-3xl border border-primary/10 bg-[#0d0d0d]/90 p-4 shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm text-text-muted">
                <thead>
                    <tr>
                        <th class="px-4 py-3">Skill</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Proficiency</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skills as $skill)
                        <tr class="border-t border-white/5 hover:bg-white/5">
                            <td class="px-4 py-4 text-white">{{ $skill->name }}</td>
                            <td class="px-4 py-4">{{ $skill->category }}</td>
                            <td class="px-4 py-4">{{ $skill->proficiency }}%</td>
                            <td class="px-4 py-4">{{ ucfirst($skill->status) }}</td>
                            <td class="px-4 py-4 space-x-2">
                                <button wire:click="edit({{ $skill->id }})" class="rounded-full border border-white/10 px-3 py-1 text-sm text-white transition hover:border-primary">Edit</button>
                                <button wire:click="delete({{ $skill->id }})" class="rounded-full border border-red-500/20 px-3 py-1 text-sm text-red-300 transition hover:bg-red-500/10">Delete</button>
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
                    <h3 class="text-xl font-semibold text-white">{{ $editingSkill ? 'Edit Skill' : 'New Skill' }}</h3>
                    <button wire:click="$set('modalVisible', false)" class="text-text-muted">Close</button>
                </div>

                <div class="mt-6 grid gap-4 lg:grid-cols-2">
                    <div>
                        <label class="block text-sm text-text-muted">Skill name</label>
                        <input wire:model.defer="form.name" class="input-primary mt-2 w-full" />
                        @error('form.name') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">Category</label>
                        <input wire:model.defer="form.category" class="input-primary mt-2 w-full" />
                        @error('form.category') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">Proficiency</label>
                        <input wire:model.defer="form.proficiency" type="number" class="input-primary mt-2 w-full" />
                        @error('form.proficiency') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">Level</label>
                        <select wire:model.defer="form.level" class="input-primary mt-2 w-full">
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                            <option value="expert">Expert</option>
                        </select>
                        @error('form.level') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="lg:col-span-2">
                        <label class="block text-sm text-text-muted">Description</label>
                        <textarea wire:model.defer="form.description" rows="4" class="input-primary mt-2 w-full"></textarea>
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
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('form.status') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-8 flex items-center justify-end gap-3">
                    <button wire:click="$set('modalVisible', false)" class="btn-secondary">Cancel</button>
                    <button wire:click="save" class="btn-primary">Save Skill</button>
                </div>
            </div>
        </div>
    @endif
</div>
