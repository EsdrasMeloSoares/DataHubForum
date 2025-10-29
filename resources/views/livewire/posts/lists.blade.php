<div class="max-w-3xl flex flex-col space-y-4">
    @forelse ($this->posts as $post)
    <div class="border-b border-gray-200 pb-4 overflow-hidden">
        <a href="{{ route('posts.show', [$post->user, $post]) }}" wire:navigate class="block group w-full overflow-hidden" wire:navigate>
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800 group-hover:text-blue-500 
                       w-full overflow-hidden whitespace-nowrap text-ellipsis">
                {{ $post->title }}
            </h2>

            <p class="text-xs sm:text-sm text-gray-500 mt-1">
                <x-badge :text="$post->user->name" outline /> · {{ $post->created_at->diffForHumans() }}
            </p>
        </a>
    </div>
    @empty

    <div class="border-b border-gray-200 pb-4 overflow-hidden">
        <p class="block group w-full overflow-hidden">
        <h2 class="text-lg sm:text-xl font-semibold text-gray-800 group-hover:text-blue-500 
                       w-full overflow-hidden whitespace-nowrap text-ellipsis">
            Nenhum post encontrado. Faça sua primeira postagem agora!
        </h2>
        </p>
    </div>

    @endforelse

    <div class="flex justify-center">
        {{ $this->posts->links('pagination::simple-tailwind') }}
    </div>
</div>