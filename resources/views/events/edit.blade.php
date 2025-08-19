<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700">Heading</label>
                        <input type="text" name="heading" value="{{ old('heading', $event->heading) }}"
                               class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                        @error('heading') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">About</label>
                        <textarea name="about" rows="4"
                                  class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">{{ old('about', $event->about) }}</textarea>
                        @error('about') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700">Start Date & Time</label>
                            <input type="datetime-local" name="start_datetime"
                                   value="{{ old('start_datetime', \Carbon\Carbon::parse($event->start_datetime)->format('Y-m-d\TH:i')) }}"
                                   class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                            @error('start_datetime') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700">End Date & Time</label>
                            <input type="datetime-local" name="end_datetime"
                                   value="{{ old('end_datetime', \Carbon\Carbon::parse($event->end_datetime)->format('Y-m-d\TH:i')) }}"
                                   class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                            @error('end_datetime') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Location</label>
                        <input type="text" name="location" value="{{ old('location', $event->location) }}"
                               class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-200">
                        @error('location') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('events.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 mr-2">Cancel</a>
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700" style="background: #24cdcd;">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
