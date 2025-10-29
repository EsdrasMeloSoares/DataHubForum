<div>
    <x-modal :title="__('Update post', ['id' => $post?->id])" wire>
        <form id="post-update-{{ $post?->id }}" wire:submit="save" class="space-y-4">
            <div>
                <x-input label="{{ __('Title') }} *" wire:model="post.title" required />
            </div>

            <div>
                <x-input label="{{ __('Content') }} *" wire:model="post.body" required />
            </div>

        </form>
        <x-slot:footer>
            <x-button type="submit" form="post-update-{{ $post?->id }}" loading="save">
                @lang('Save')
            </x-button>
        </x-slot:footer>
    </x-modal>
</div>