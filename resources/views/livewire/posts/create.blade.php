<div>
    <x-button :text="__('Create New Post')" icon="plus" wire:click="$toggle('modal')" sm />

    <x-modal :title="__('Create New Post')" wire x-on:open="setTimeout(() => $refs.name.focus(), 250)">
        <form id="user-create" wire:submit="save" class="space-y-4">
            <div>
                <x-input label="{{ __('Title') }} *" x-ref="name" wire:model="post.title" required />
            </div>

            <div>
                <x-input label="{{ __('Body') }} *" wire:model="post.body" required />
            </div>
        </form>
        <x-slot:footer>
            <x-button type="submit" form="user-create">
                @lang('Save')
            </x-button>
        </x-slot:footer>
    </x-modal>
</div>