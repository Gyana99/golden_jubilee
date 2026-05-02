<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ✏️ Edit Gallery
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">

            <form method="POST" action="{{ route('gallery.update', $gallery->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Category -->
                <div class="mb-4">
                    <label class="block font-medium">Category</label>
                    <select name="category" id="category" class="w-full border p-2 rounded">
                        <option value="teacher" {{ $gallery->category == 'teacher' ? 'selected' : '' }}>Teacher</option>
                        <option value="event" {{ $gallery->category == 'event' ? 'selected' : '' }}>Event</option>
                    </select>
                </div>

                <!-- Teacher Fields -->
                <div id="teacherFields">
                    <div class="mb-4">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $gallery->name }}" class="w-full border p-2 rounded">
                    </div>

                    <div class="mb-4">
                        <label>Age</label>
                        <input type="number" name="age" value="{{ $gallery->age }}" class="w-full border p-2 rounded">
                    </div>
                </div>

                <!-- Event Fields -->
                <div id="eventFields">
                    <div class="mb-4">
                        <label>Heading</label>
                        <input type="text" name="heading" value="{{ $gallery->heading }}" class="w-full border p-2 rounded">
                    </div>
                </div>

                <!-- Media Type -->
                <div class="mb-4">
                    <label>Media Type</label>
                    <select name="media_type" class="w-full border p-2 rounded">
                        <option value="image" {{ $gallery->media_type == 'image' ? 'selected' : '' }}>Image</option>
                        <option value="video" {{ $gallery->media_type == 'video' ? 'selected' : '' }}>Video</option>
                    </select>
                </div>

                <!-- Existing Media Preview -->
                <div class="mb-4">
                    <label class="block font-medium mb-2">Current Media</label>

                    @if($gallery->media)
                        @if($gallery->media_type == 'image')
                            <img src="{{ asset('storage/gallery/'.$gallery->media) }}" 
                                 class="w-32 h-32 object-cover rounded border">
                        @else
                            <video width="200" controls class="rounded border">
                                <source src="{{ asset('storage/gallery/'.$gallery->media) }}">
                            </video>
                        @endif
                    @else
                        <p class="text-gray-500">No media uploaded</p>
                    @endif
                </div>

                <!-- Upload New Media -->
                <div class="mb-4">
                    <label class="block font-medium">Change Media (Optional)</label>
                    <input type="file" name="media" class="w-full border p-2 rounded">
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
                    style="background:#24cdcd;">
                    ✅ Update Gallery
                </button>
            </form>
        </div>
    </div>

    <!-- JS for Dynamic Fields -->
    <script>
        function toggleFields() {
            let category = document.getElementById('category').value;

            if (category === 'teacher') {
                document.getElementById('teacherFields').style.display = 'block';
                document.getElementById('eventFields').style.display = 'none';
            } else {
                document.getElementById('teacherFields').style.display = 'none';
                document.getElementById('eventFields').style.display = 'block';
            }
        }

        document.getElementById('category').addEventListener('change', toggleFields);

        // Load on page
        window.onload = toggleFields;
    </script>

</x-app-layout>