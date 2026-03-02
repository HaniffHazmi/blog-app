<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Create Post
                </a>
            @endif
        @endauth

        <div class="mt-6">
            @foreach($posts as $post)
                <div class="mb-6 p-4 border rounded">
                    <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                    <p class="mt-2">{{ $post->content }}</p>

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <div class="mt-3">
                                <a href="{{ route('posts.edit', $post) }}" class="text-blue-600">Edit</a>

                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 ml-2">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>