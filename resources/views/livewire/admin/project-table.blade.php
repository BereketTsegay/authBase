<div class="space-y-6">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-2xl font-semibold text-white">Project library</h2>
            <p class="mt-2 text-text-muted">Manage your portfolio entries, categories, and featured work.</p>
        </div>
        <button wire:click="create" class="btn-primary inline-flex items-center gap-2">New Project</button>
    </div>

    <div class="rounded-3xl border border-primary/10 bg-[#0d0d0d]/90 p-4 shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm text-text-muted">
                <thead>
                    <tr>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Featured</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr class="border-t border-white/5 hover:bg-white/5">
                            <td class="px-4 py-4 text-white">{{ $project->title }}</td>
                            <td class="px-4 py-4">{{ $project->category }}</td>
                            <td class="px-4 py-4">{{ $project->featured ? 'Yes' : 'No' }}</td>
                            <td class="px-4 py-4">{{ ucfirst($project->status) }}</td>
                            <td class="px-4 py-4 space-x-2">
                                <button wire:click="edit({{ $project->id }})" class="rounded-full border border-white/10 px-3 py-1 text-sm text-white transition hover:border-primary">Edit</button>
                                <button wire:click="delete({{ $project->id }})" class="rounded-full border border-red-500/20 px-3 py-1 text-sm text-red-300 transition hover:bg-red-500/10">Delete</button>
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
                    <h3 class="text-xl font-semibold text-white">{{ $editingProject ? 'Edit Project' : 'New Project' }}</h3>
                    <button wire:click="$set('modalVisible', false)" class="text-text-muted">Close</button>
                </div>

                <div class="mt-6 grid gap-4 lg:grid-cols-2">
                    <div>
                        <label class="block text-sm text-text-muted">Title</label>
                        <input wire:model.defer="form.title" class="input-primary mt-2 w-full" />
                        @error('form.title') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">Slug</label>
                        <input wire:model.defer="form.slug" class="input-primary mt-2 w-full" />
                        @error('form.slug') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="lg:col-span-2">
                        <label class="block text-sm text-text-muted">Description</label>
                        <textarea wire:model.defer="form.description" rows="4" class="input-primary mt-2 w-full"></textarea>
                        @error('form.description') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">Category</label>
                        <input wire:model.defer="form.category" class="input-primary mt-2 w-full" />
                        @error('form.category') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">Featured</label>
                        <select wire:model.defer="form.featured" class="input-primary mt-2 w-full">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">Status</label>
                        <select wire:model.defer="form.status" class="input-primary mt-2 w-full">
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">Thumbnail URL</label>
                        <input wire:model.defer="form.thumbnail" class="input-primary mt-2 w-full" />
                        @error('form.thumbnail') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-text-muted">Cover Image URL</label>
                        <input wire:model.defer="form.cover_image" class="input-primary mt-2 w-full" />
                        @error('form.cover_image') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div class="lg:col-span-2">
                        <label class="block text-sm text-text-muted">Tech Stack</label>
                        <input wire:model.defer="form.tech_stack.0" placeholder="e.g. Laravel" class="input-primary mt-2 w-full" />
                        <div class="mt-2 grid gap-2 sm:grid-cols-3">
                            @foreach(array_filter($form['tech_stack'] ?? []) as $index => $tech)
                                <span class="inline-flex items-center gap-2 rounded-full bg-white/5 px-3 py-2 text-sm text-text-muted">
                                    {{ $tech }}
                                    <button wire:click.prevent="form.tech_stack.splice({{ $index }}, 1)" class="text-primary">×</button>
                                </span>
                            @endforeach
                        </div>
                        @error('form.tech_stack') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-8 flex items-center justify-end gap-3">
                    <button wire:click="$set('modalVisible', false)" class="btn-secondary">Cancel</button>
                    <button wire:click="save" class="btn-primary">Save Project</button>
                </div>
            </div>
        </div>
    @endif
</div>
