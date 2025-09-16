<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📖 {{ __('Add Magazine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('magazines.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-semibold">Title</label>
                        <input type="text" name="title" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Alumni</label>
                        <select name="alumni_id" class="w-full border rounded p-2">
                            <option value="">-- Select Alumni --</option>
                            @foreach($alumni as $alum)
                                <option value="{{ $alum->id }}">{{ $alum->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Type</label>
                        <select name="type" id="type" class="w-full border rounded p-2" onchange="toggleFields()">
                            <option value="text">Text</option>
                            <option value="image">Image</option>
                        </select>
                    </div>

                    <div id="imageField" class="mb-4 hidden">
                        <label class="block font-semibold">Upload Image</label>
                        <input type="file" name="image" accept="image/*" class="w-full border rounded p-2">
                    </div>

                    <div id="textField" class="mb-4">
                        <label class="block font-semibold">Details</label>
                        <textarea name="details" rows="4" class="w-full border rounded p-2"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Publish</label>
                        <input type="checkbox" name="publish" value="1" checked> Publish this magazine
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleFields() {
            const type = document.getElementById('type').value;
            document.getElementById('imageField').classList.toggle('hidden', type !== 'image');
            document.getElementById('textField').classList.toggle('hidden', type !== 'text');
        }
    </script>
</x-app-layout>
