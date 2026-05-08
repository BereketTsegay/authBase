<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\BlogPost;

class BlogPostTable extends Component
{
    public $posts = [];
    public $modalVisible = false;
    public $editingPost;
    public $form = [
        'title' => '',
        'slug' => '',
        'excerpt' => '',
        'content' => '',
        'cover_image' => '',
        'category' => '',
        'tags' => [],
        'status' => 'published',
    ];

    protected function rules(): array
    {
        return [
            'form.title' => 'required|string|max:180',
            'form.slug' => 'required|string|max:180|unique:blog_posts,slug,' . ($this->editingPost->id ?? 'NULL'),
            'form.excerpt' => 'nullable|string|max:280',
            'form.content' => 'nullable|string',
            'form.cover_image' => 'nullable|url|max:800',
            'form.category' => 'nullable|string|max:100',
            'form.tags' => 'nullable|array',
            'form.status' => 'required|string|in:published,draft',
        ];
    }

    public function mount(): void
    {
        $this->loadPosts();
    }

    public function updatedFormTitle(): void
    {
        if (! $this->editingPost) {
            $this->form['slug'] = Str::slug($this->form['title']);
        }
    }

    public function loadPosts(): void
    {
        $this->posts = BlogPost::orderByDesc('published_at')->get();
    }

    public function create(): void
    {
        $this->resetForm();
        $this->modalVisible = true;
    }

    public function edit(BlogPost $post): void
    {
        $this->editingPost = $post;
        $this->form = [
            'title' => $post->title,
            'slug' => $post->slug,
            'excerpt' => $post->excerpt,
            'content' => $post->content,
            'cover_image' => $post->cover_image,
            'category' => $post->category,
            'tags' => $post->tags ?? [],
            'status' => $post->status,
        ];
        $this->modalVisible = true;
    }

    public function save(): void
    {
        $this->validate();

        $payload = array_merge($this->form, [
            'tags' => array_filter($this->form['tags'] ?? []),
            'published_at' => now(),
        ]);

        if ($this->editingPost) {
            $this->editingPost->update($payload);
        } else {
            BlogPost::create($payload);
        }

        $this->resetForm();
        $this->modalVisible = false;
        $this->loadPosts();

        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Blog post saved successfully.',
        ]);
    }

    public function delete(BlogPost $post): void
    {
        $post->delete();
        $this->loadPosts();

        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Blog post deleted.',
        ]);
    }

    protected function resetForm(): void
    {
        $this->editingPost = null;
        $this->form = [
            'title' => '',
            'slug' => '',
            'excerpt' => '',
            'content' => '',
            'cover_image' => '',
            'category' => '',
            'tags' => [],
            'status' => 'published',
        ];
    }

    public function render()
    {
        return view('livewire.admin.blog-post-table');
    }
}
