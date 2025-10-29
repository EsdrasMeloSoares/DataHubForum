<?php

namespace App\Livewire\Posts;

use App\Livewire\Traits\Alert;
use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    use Alert;

    public ?Post $post;

    public bool $modal = false;

    public function render()
    {
        return view('livewire.posts.update');
    }

    #[On('load::post')]
    public function load(Post $post): void
    {
        $this->post = $post;

        $this->modal = true;
    }

    public function rules(): array
    {
        return [
            'post.title' => [
                'required',
                'string',
                'max:255'
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

        $this->authorize('update', $this->post);

        $this->post->save();

        $this->dispatch('updated');

        $this->resetExcept('post');
    }
}
