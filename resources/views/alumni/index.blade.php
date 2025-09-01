<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alumni List') }}
        </h2>
    </x-slot>

    <!-- ✅ Inline CSS: guaranteed horizontal scroll -->
    <style>
        .table-scroll {
            overflow-x: auto;
            width: 100%;
            -webkit-overflow-scrolling: touch;
            /* smooth on iOS */
            scrollbar-width: thin;
            /* Firefox */
        }

        /* Force the table to be wider than small screens */
        .table-scroll table {
            min-width: 1100px;
            /* adjust if you add/remove columns */
        }

        /* Keep cells on one line so columns don't shrink */
        .nowrap td,
        .nowrap th {
            white-space: nowrap;
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('alumni.create') }}"
                class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700"
                style="background:#24cdcd;">
                ➕ Add Alumni
            </a>

            @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white shadow-xl sm:rounded-lg">
                <!-- ✅ Real horizontal scroll wrapper -->
                <div class="table-scroll">
                    <table class="min-w-full border text-sm nowrap">
                        <!-- ✅ Column widths to ensure scroll appears -->
                        <colgroup>
                            <col style="width: 70px;"> <!-- # -->
                            <col style="width: 110px;"> <!-- Photo -->
                            <col style="width: 220px;"> <!-- Name -->
                            <col style="width: 300px;"> <!-- Email -->
                            <col style="width: 180px;"> <!-- Phone -->
                            <col style="width: 160px;"> <!-- Passout Year -->
                            <col style="width: 200px;"> <!-- Actions -->
                        </colgroup>

                        <thead class="bg-gray-200 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 border text-left">#</th>
                                <th class="px-4 py-2 border text-left">Photo</th>
                                <th class="px-4 py-2 border text-left">Name</th>
                                <th class="px-4 py-2 border text-left">Email</th>
                                <th class="px-4 py-2 border text-left">Phone</th>
                                <th class="px-4 py-2 border text-left">Passout Year</th>
                                <th class="px-4 py-2 border text-left">Actions</th>
                                <th class="px-4 py-2 border text-left">Approve</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($alumni as $key => $alumnus)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border text-center">
                                    @if($alumnus->status == 0)
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-500 text-white font-bold">
                                        {{ $key+1 }}
                                    </span>
                                    @else
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-green-500 text-white font-bold">
                                        {{ $key+1 }}
                                    </span>
                                    @endif
                                </td>

                                <td class="px-4 py-2 border text-center align-middle">
                                    @if($alumnus->photo)
                                    <div class="w-16 h-16 mx-auto rounded-full overflow-hidden border-2 border-gray-300 shadow">
                                        <img
                                            src="{{ asset('storage/alumniphoto/'.$alumnus->photo) }}"
                                            alt="{{ $alumnus->name }}"
                                            class="w-16 h-16 object-cover object-center">
                                    </div>
                                    @else
                                    <div class="w-16 h-16 flex items-center justify-center bg-gray-200 text-gray-500 rounded-full mx-auto shadow border-2 border-gray-300">
                                        <span class="text-[10px] font-medium">No Photo</span>
                                    </div>
                                    @endif
                                </td>

                                <td class="px-4 py-2 border font-medium">{{ $alumnus->name }}</td>
                                <td class="px-4 py-2 border">{{ $alumnus->email }}</td>
                                <td class="px-4 py-2 border">{{ $alumnus->phone }}</td>
                                <td class="px-4 py-2 border">{{ $alumnus->passout_year }}</td>

                                <td class="px-4 py-2 border">
                                    <a href="{{ route('alumni.edit', $alumnus->id) }}" class="text-blue-600 hover:underline">✏ Edit</a>
                                    <span class="mx-1 text-gray-400">|</span>
                                    <form action="{{ route('alumni.destroy', $alumnus->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">🗑 Delete</button>
                                    </form>
                                </td>
                                <td class="px-4 py-2 border">
                                    @if($alumnus->status == 0)
                                    <!-- Approve Button -->
                                    <form action="{{ route('alumni.approve', $alumnus->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" onclick="return confirm('Are you sure you want to approve this alumni?')"
                                            class="text-green-600 hover:underline">
                                            ✅ Approve
                                        </button>
                                    </form>
                                    @else
                                    <!-- Reject / Not Approve Button -->
                                    <form action="{{ route('alumni.approve', $alumnus->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" onclick="return confirm('Are you sure you want to mark this alumni as not approved?')"
                                            class="text-red-600 hover:underline">
                                            ❌ Not Approve
                                        </button>
                                    </form>
                                    @endif
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center p-4">No alumni found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4">
                    {{ $alumni->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>