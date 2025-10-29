<?php

namespace App\Livewire\Posts;

use App\Livewire\Traits\Alert;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class Delete extends Component
{
    use Alert;

    public Post $post;

    public function render()
    {
        return <<<'HTML'
        <div>
            <x-button.circle icon="trash" color="red" wire:click="confirm" />
        </div>
        HTML;
    }

    #[Renderless]
    public function confirm(): void
    {
        $this->question()
            ->confirm(method: 'delete')
            ->cancel()
            ->send();
    }

    public function delete(): void
    {
        try {
            $this->authorize('delete', $this->post);

            $this->post->delete();

            $this->dispatch('deleted');
        } catch (\Exception $e) {
            Log::error('Error deleting post', [
                'post_id' => $this->post->id,
                'error'   => $e->getMessage(),
            ]);
            $this->error('Error deleting post');
        }
    }
}
