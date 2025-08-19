<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contributions List') }}
        </h2>
    </x-slot>

    <style>
        /* Grid for cards */
        .contribution-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        /* Card style */
        .contribution-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .contribution-card:hover {
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
            transform: translateY(-3px);
        }

        .contribution-card h3 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
        }

        .contribution-card p {
            font-size: 14px;
            margin: 3px 0;
            color: #555;
        }

        .contribution-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 6px;
            transition: transform 0.2s;
        }

        .contribution-card img:hover {
            transform: scale(1.1);
        }

        /* Action buttons area */
        .card-actions {
            background: #f9fafb;
            border-top: 1px solid #eee;
            padding: 8px 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-actions a,
        .card-actions button {
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: color 0.2s;
        }

        .card-actions a {
            color: #2563eb;
            text-decoration: none;
        }

        .card-actions a:hover {
            text-decoration: underline;
        }

        .card-actions button {
            background: none;
            border: none;
            color: #dc2626;
        }

        .card-actions button:hover {
            text-decoration: underline;
        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Add Button -->
            <a href="{{ route('contributions.create') }}"
               class="mb-6 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700"
               style="background:#24cdcd;">
                ➕ Add Contribution
            </a>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Cards Grid -->
            <div class="contribution-grid">
                @forelse($contributions as $contribution)
                    <div class="contribution-card">
                        <div class="p-4">
                            <h3>
                                {{ $contribution->alumni->name }}
                                <span style="color:#777; font-size:13px;">
                                    ({{ $contribution->alumni->passout_year }})
                                </span>
                            </h3>
                            <p><strong>Amount:</strong> ₹{{ number_format($contribution->amount, 2) }}</p>
                            <p><strong>Date:</strong> {{ $contribution->payment_date }}</p>

                            <div>
                                <strong>Receipt:</strong><br>
                                @if($contribution->payment_photo)
                                    <img src="{{ asset('storage/'.$contribution->payment_photo) }}" alt="Receipt">
                                @else
                                    <span style="color:#aaa;">—</span>
                                @endif
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="card-actions">
                            <a href="{{ route('contributions.edit', $contribution->id) }}">✏ Edit</a>
                            <form action="{{ route('contributions.destroy', $contribution->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')">🗑 Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center p-6 bg-gray-50 border rounded">
                        No contributions found.
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $contributions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
