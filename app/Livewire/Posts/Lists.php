<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Lists extends Component
{
    use WithPagination;

    #[On('created')]
    public function refreshPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.posts.lists');
    }

    #[Computed]
    public function posts(): LengthAwarePaginator
    {
        return Post::query()
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }
}
