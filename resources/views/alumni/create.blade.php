<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Alumni') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <form method="POST" action="{{ route('alumni.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium">Full Name</label>
                        <input type="text" name="name" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Email</label>
                        <input type="email" name="email" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Phone</label>
                        <input type="text" name="phone" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Passout Year</label>
                        <input type="number" name="passout_year" class="w-full border rounded p-2" placeholder="e.g., 2018">
                    </div>


                    <div class="mb-4">
                        <label class="block font-medium">Profile Photo (Optional)</label>
                        <input type="file" name="photo" class="w-full border rounded p-2">
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700" style="background: #24cdcd;">
                        💾 Save Alumni
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
