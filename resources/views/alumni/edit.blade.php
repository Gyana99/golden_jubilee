<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Alumni') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <form method="POST" action="{{ route('alumni.update', $alumni->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium">Full Name</label>
                        <input type="text" name="name" value="{{ $alumni->name }}" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Email</label>
                        <input type="email" name="email" value="{{ $alumni->email }}" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Phone</label>
                        <input type="text" name="phone" value="{{ $alumni->phone }}" class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Passout Year</label>
                        <input type="number" name="passout_year" value="{{ $alumni->passout_year }}" class="w-full border rounded p-2">
                    </div>


                    <div class="mb-4">
                        <label class="block font-medium">Profile Photo (Optional)</label>
                        @if($alumni->photo)
                            <img src="{{ asset('storage/alumniphoto/'.$alumni->photo) }}" class="w-20 h-20 object-cover rounded-full mb-2">
                        @endif
                        <input type="file" name="photo" class="w-full border rounded p-2">
                    </div>

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700" style="background: #24cdcd;">
                        ✅ Update Alumni
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
