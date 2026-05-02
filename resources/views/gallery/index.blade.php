<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🖼️ Gallery List
        </h2>
    </x-slot>

    <style>
        .table-scroll {
            overflow-x: auto;
            width: 100%;
        }

        .table-scroll table {
            min-width: 1100px;
        }

        .nowrap td,
        .nowrap th {
            white-space: nowrap;
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto">

            <!-- Add Button -->
            <a href="{{ route('gallery.create') }}"
                class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700"
                style="background:#24cdcd;">
                ➕ Add Gallery
            </a>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg">
                <div class="table-scroll">
                    <table class="min-w-full border text-sm nowrap">

                        <thead class="bg-gray-200">
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Heading</th>
                                <th>Media</th>
                                <th>Status</th>
                                <th>Actions</th>
                                <th>Approve</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($data as $key => $item)
                                <tr class="hover:bg-gray-50">

                                    <!-- Serial -->
                                    <td>{{ $key + 1 }}</td>

                                    <!-- Category -->
                                    <td>
                                        @if($item->category == 'teacher')
                                            <span class="text-blue-600 font-bold">Teacher</span>
                                        @else
                                            <span class="text-purple-600 font-bold">Event</span>
                                        @endif
                                    </td>

                                    <!-- Name -->
                                    <td>{{ $item->name ?? '-' }}</td>

                                    <!-- Age -->
                                    <td>{{ $item->age ?? '-' }}</td>

                                    <!-- Heading -->
                                    <td>{{ $item->heading ?? '-' }}</td>

                                    <!-- Media -->
                                    <td>
                                        @if($item->media)
                                            @if($item->media_type == 'image')
                                                <img src="{{ ROOT_URL }}/storage/app/public/gallery/{{$item->media}}"
                                                     class="w-16 h-16 object-cover rounded border">
                                            @else
                                                <video width="100" controls>
                                                    <source src="{{ ROOT_URL }}/storage/app/public/gallery/{{$item->media}} ">
                                                </video>
                                            @endif
                                        @else
                                            <span class="text-gray-400">No Media</span>
                                        @endif
                                    </td>

                                    <!-- Status -->
                                    <td>
                                        @if($item->status == 1)
                                            <span class="text-green-600 font-bold">Approved</span>
                                        @else
                                            <span class="text-red-600 font-bold">Pending</span>
                                        @endif
                                    </td>

                                    <!-- Actions -->
                                    <td>
                                        <a href="{{ route('gallery.edit', $item->id) }}"
                                           class="text-blue-600 hover:underline">✏ Edit</a>

                                        <span class="mx-1">|</span>

                                        <form action="{{ route('gallery.destroy', $item->id) }}"
                                              method="POST"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Delete this item?')"
                                                    class="text-red-600 hover:underline">
                                                🗑 Delete
                                            </button>
                                        </form>
                                    </td>

                                    <!-- Approve -->
                                    <td>
                                        <form action="{{ route('gallery.approve', $item->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('PATCH')

                                            @if($item->status == 0)
                                                <button class="text-green-600">
                                                    ✅ Approve
                                                </button>
                                            @else
                                                <button class="text-red-600">
                                                    ❌ Reject
                                                </button>
                                            @endif
                                        </form>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center p-4">
                                        No gallery data found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-4">
                    {{ $data->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>