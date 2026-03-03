<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

<x-app-layout>
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-xl font-bold mb-4">Create New Post</h1>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="bg-red-200 text-red-800 p-3 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" id="postForm">
            @csrf

            {{-- Title --}}
            <div class="mb-4">
                <label for="title" class="block font-medium">Title</label>
                <input type="text"
                       name="title"
                       id="title"
                       class="w-full border p-2 rounded"
                       required>
            </div>

            {{-- Content --}}
            <div class="mb-4">
                <label class="block font-medium mb-2">Content</label>
                <div id="editor" style="height: 300px;"></div>
                <input type="hidden" name="content" id="content">
            </div>

            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Create Post
            </button>
        </form>
    </div>

    {{-- Quill JS --}}
    <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            var quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ header: [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ list: 'ordered'}, { list: 'bullet' }],
                        ['link', 'image'],
                        ['clean']
                    ]
                }
            });

            document.getElementById('postForm').addEventListener('submit', function () {
                document.getElementById('content').value = quill.root.innerHTML;
            });

        });
    </script>

</x-app-layout>