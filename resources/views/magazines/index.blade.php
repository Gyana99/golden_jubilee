<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📖 {{ __('Magazines') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Magazines List</h1>

                    <a href="{{ route('magazines.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                        ➕ Add Magazine
                    </a>

                    <table class="min-w-full mt-6 border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">#</th>
                                <th class="px-4 py-2 border">Title</th>
                                <th class="px-4 py-2 border">Alumni</th>
                                <th class="px-4 py-2 border">Type</th>
                                <th class="px-4 py-2 border">Preview</th>
                                <th class="px-4 py-2 border">Publish</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($magazines as $magazine)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border">{{ $magazine->title }}</td>
                                    <td class="px-4 py-2 border">{{ $magazine->alumni?->name ?? 'N/A' }}</td>
                                    <td class="px-4 py-2 border">{{ ucfirst($magazine->type) }}</td>
                                    <td class="px-4 py-2 border">
                                        @if($magazine->type == 'image' && $magazine->image)
                                            <img src="{{ asset('storage/' . $magazine->image) }}" class="h-12">
                                        @else
                                            {{ Str::limit($magazine->details, 30) }}
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 border">
                                        {{ $magazine->publish ? '✅ Published' : '❌ Draft' }}
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <a href="{{ route('magazines.edit', $magazine->id) }}"
                                           class="bg-yellow-500 text-white px-3 py-1 rounded">✏️ Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-2 text-center">No Magazines Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
