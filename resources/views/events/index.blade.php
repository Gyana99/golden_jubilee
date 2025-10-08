<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event List') }}
        </h2>
    </x-slot>

    <!-- ✅ Inline CSS to force horizontal scroll -->
    <style>
        .table-scroll {
            overflow-x: auto;
            width: 100%;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: thin;
        }

        .table-scroll table {
            min-width: 1000px;
            /* enough to trigger scroll */
        }

        .nowrap th,
        .nowrap td {
            white-space: nowrap;
        }

        .btn-cancel {
            background-color: #fff;
            color: #dc3545;
            /* red text */
            border: 2px solid #dc3545;
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-cancel:hover {
            background-color: #dc3545;
            /* red background on hover */
            color: #fff;
            /* white text */
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('events.create') }}"
                class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700"
                style="background:#24cdcd;">
                ➕ Add Event
            </a>

            @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="table-scroll">
                    <table class="min-w-full border text-sm nowrap">
                        <colgroup>
                            <col style="width: 60px;"> <!-- # -->
                            <col style="width: 200px;"> <!-- Heading -->
                            <col style="width: 300px;"> <!-- About -->
                            <col style="width: 180px;"> <!-- Start -->
                            <col style="width: 180px;"> <!-- End -->
                            <col style="width: 220px;"> <!-- Location -->
                            <col style="width: 180px;"> <!-- Actions -->
                        </colgroup>

                        <thead class="bg-gray-200 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 border text-left">#</th>
                                <th class="px-4 py-2 border text-left">Heading</th>
                                <th class="px-4 py-2 border text-left">About</th>
                                <th class="px-4 py-2 border text-left">Start</th>
                                <th class="px-4 py-2 border text-left">End</th>
                                <th class="px-4 py-2 border text-left">Location</th>
                                <th class="px-4 py-2 border text-left">Actions</th>
                                <th class="px-4 py-2 border text-left">cancelled</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($events as $event)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $event->id }}</td>
                                <td class="px-4 py-2 border font-medium">{{ $event->heading }}</td>
                                <td class="px-4 py-2 border">{{ Str::limit($event->about, 50) }}</td>
                                <td class="px-4 py-2 border">{{ $event->start_datetime }}</td>
                                <td class="px-4 py-2 border">{{ $event->end_datetime }}</td>
                                <td class="px-4 py-2 border">{{ $event->location }}</td>
                                <td class="px-4 py-2 border">
                                    <a href="{{ route('events.edit', $event->id) }}" class="text-blue-600 hover:underline">✏ Edit</a>
                                    <span class="mx-1 text-gray-400">|</span>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">🗑 Delete</button>
                                    </form>
                                </td>
                                <td>
                                    @if($event->cancelled == 0)
                                    <form action="{{ route('events.cancel', [$event->id,1]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button onclick="return confirm('Do you want to cancel this event?')"
                                            class="text-yellow-600 hover:underline">
                                            🚫 Cancel Event
                                        </button>
                                    </form>
                                    @endif
                                    @if($event->cancelled == 1)
                                    <form action="{{ route('events.cancel', [$event->id,2]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button onclick="return confirm('Do you want to cancel this event?')"
                                            class="text-yellow-600 hover:underline">
                                            ✅ Publish Event
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center p-4">No events found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
