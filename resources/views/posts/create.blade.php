<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
<!-- Quill JS -->
<script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>
<x-app-layout>
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-xl font-bold mb-4">Create New Post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block font-medium">Title</label>
                <input type="text" name="title" id="title" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="content" class="block font-medium">Content</label>
                {{-- <textarea name="content" id="content" rows="10" class="w-full border p-2 rounded" required></textarea> --}}
                <div id="editor" style="height: 300px;"></div>
                <input type="hidden" name="content" id="content">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Create Post
            </button>
        </form>
    </div>
</x-app-layout>

<script>
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

  // Update hidden input on form submit
  var form = document.querySelector('form');
  form.onsubmit = function() {
      var contentInput = document.querySelector('#content');
      contentInput.value = quill.root.innerHTML;
  };
</script>

