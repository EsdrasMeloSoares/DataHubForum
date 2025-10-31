<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.home')]
class Show extends Component
{
    public ?Post $post;

    public function render()
    {
        return view('livewire.posts.show');
    }
}
