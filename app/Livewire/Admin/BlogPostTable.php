<?php

namespace App\Livewire\Admin;

use App\Models\BlogPost;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Carbon\Carbon;

class BlogPostTable extends Component
{
    public $blogPosts = [];
    public $modalVisible = false;
    public $editingBlogPost = null;

    #[Validate('required|string|max:255')]
    public $title = '';

    #[Validate('required|string|max:255|unique:blog_posts,slug')]
    public $slug = '';

    #[Validate('required|string|max:100')]
    public $category = '';

    #[Validate('required|string')]
    public $excerpt = '';

    #[Validate('required|string')]
    public $content = '';

    #[Validate('nullable|url')]
    public $thumbnail = '';

    #[Validate('nullable|date')]
    public $published_at = '';

    #[Validate('required|in:published,draft')]
    public $status = 'draft';

    public function mount()
    {
        $this->loadBlogPosts();
    }

    public function loadBlogPosts()
    {
        $this->blogPosts = BlogPost::orderByDesc('published_at')->get()->toArray();
    }

    public function create()
    {
        $this->resetForm();
        $this->modalVisible = true;
    }

    public function edit($id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $this->editingBlogPost = $blogPost->id;
        $this->title = $blogPost->title;
        $this->slug = $blogPost->slug;
        $this->category = $blogPost->category;
        $this->excerpt = $blogPost->excerpt;
        $this->content = $blogPost->content;
        $this->thumbnail = $blogPost->thumbnail;
        $this->published_at = $blogPost->published_at?->format('Y-m-d') ?? '';
        $this->status = $blogPost->status;
        $this->modalVisible = true;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'slug' => $this->editingBlogPost ? 'required|string|max:255' : 'required|string|max:255|unique:blog_posts,slug',
            'category' => 'required|string|max:100',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'thumbnail' => 'nullable|url',
            'published_at' => 'nullable|date',
            'status' => 'required|in:published,draft',
        ]);

        if ($this->editingBlogPost) {
            $blogPost = BlogPost::findOrFail($this->editingBlogPost);
            $blogPost->update([
                'title' => $this->title,
                'slug' => $this->slug,
                'category' => $this->category,
                'excerpt' => $this->excerpt,
                'content' => $this->content,
                'thumbnail' => $this->thumbnail,
                'published_at' => $this->published_at ? Carbon::parse($this->published_at) : null,
                'status' => $this->status,
            ]);
        } else {
            BlogPost::create([
                'title' => $this->title,
                'slug' => $this->slug,
                'category' => $this->category,
                'excerpt' => $this->excerpt,
                'content' => $this->content,
                'thumbnail' => $this->thumbnail,
                'published_at' => $this->published_at ? Carbon::parse($this->published_at) : null,
                'status' => $this->status,
            ]);
        }

        $this->resetForm();
        $this->loadBlogPosts();
        $this->dispatch('notify', message: 'Blog post saved successfully');
    }

    public function delete($id)
    {
        BlogPost::findOrFail($id)->delete();
        $this->loadBlogPosts();
        $this->dispatch('notify', message: 'Blog post deleted successfully');
    }

    private function resetForm()
    {
        $this->reset(['title', 'slug', 'category', 'excerpt', 'content', 'thumbnail', 'published_at', 'status', 'editingBlogPost']);
        $this->modalVisible = false;
    }

    public function render()
    {
        return view('livewire.admin.blog-post-table');
    }
}
