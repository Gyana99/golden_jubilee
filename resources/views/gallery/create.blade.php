<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ➕ Add Gallery
        </h2>
    </x-slot>
    <style>
        .h{
          height: 200px;
        }
    </style>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">

            <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Category -->
                <div class="mb-4">
                    <label class="block font-medium mb-1">Category</label>
                    <select name="category" id="category" class="w-full border p-2 rounded">
                        <option value="teacher">Teacher</option>
                        <option value="event">Event</option>
                    </select>
                    @error('category') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Teacher Fields -->
                <div id="teacherFields">
                    <div class="mb-4">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Enter Name"
                            class="w-full border p-2 rounded" value="{{ old('name') }}">
                        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label>Age</label>
                        <input type="number" name="age" placeholder="Enter Age"
                            class="w-full border p-2 rounded" value="{{ old('age') }}">
                        @error('age') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Event Fields -->
                <div id="eventFields" style="display:none;">
                    <div class="mb-4">
                        <label>Heading</label>
                        <input type="text" name="heading" placeholder="Enter Heading"
                            class="w-full border p-2 rounded" value="{{ old('heading') }}">
                        @error('heading') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Media Type -->
                <div class="mb-4" >
                    <label class="block font-medium mb-1">Media Type</label>
                    <select name="media_type" id="media_type" class="w-full border p-2 rounded">
                        <option value="image">Image</option>
                        <option value="video">Video</option>
                    </select>
                    @error('media_type') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Upload -->
                <div class="mb-4">
                    <label class="block font-medium mb-1">Upload Media</label>
                    <input type="file" name="media" id="mediaInput" class="w-full border p-2 rounded">
                    @error('media') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Preview -->
                <div class="mb-4">
                    <label class="block font-medium mb-1">Preview</label>
                    <div id="preview"></div>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
                    style="background:#24cdcd;">
                    💾 Save Gallery
                </button>

            </form>
        </div>
    </div>

    <!-- JS -->
    <script>
        const category = document.getElementById('category');
        const teacherFields = document.getElementById('teacherFields');
        const eventFields = document.getElementById('eventFields');

        function toggleFields() {
            if (category.value === 'teacher') {
                teacherFields.style.display = 'block';
                eventFields.style.display = 'none';
            } else {
                teacherFields.style.display = 'none';
                eventFields.style.display = 'block';
            }
        }

        category.addEventListener('change', toggleFields);
        window.onload = toggleFields;

        // Preview
        document.getElementById('mediaInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('preview');
            preview.innerHTML = '';

            if (!file) return;

            const url = URL.createObjectURL(file);

            if (file.type.startsWith('image')) {
                preview.innerHTML = `<img src="${url}"  class="w-32 h-32 object-cover rounded border h">`;
            } else if (file.type.startsWith('video')) {
                preview.innerHTML = `<video width="200" controls><source src="${url}"></video>`;
            }
        });
    </script>

</x-app-layout>