<?php

namespace App\Livewire\Posts;

use App\Livewire\Traits\Alert;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    use Alert;

    public Post $post;

    public bool $modal = false;

    public function mount(): void
    {
        $this->post = new Post();
    }

    public function render(): View
    {
        return view('livewire.posts.create');
    }

    public function rules(): array
    {
        return [
            'post.title' => [
                'required',
                'string',
                'min:10',
                'max:100'
            ],
            'post.body' => [
                'required',
                'string',
                'max:20000',
            ]
        ];
    }

    public function save(): void
    {
        $this->validate();

        $this->post->user_id = auth()->id();
        $this->post->save();

        $this->dispatch('created');

        $this->reset();
        $this->post = new Post();
    }
}
