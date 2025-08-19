<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Contribution') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <form method="POST" action="{{ route('contributions.update', $contribution->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Alumni Dropdown -->
                    <div class="mb-4">
                        <label class="block font-medium">Select Alumni</label>
                        <select name="alumni_id" class="w-full border rounded p-2" required>
                            <option value="">-- Select Alumni --</option>
                            @foreach($alumni as $a)
                                <option value="{{ $a->id }}" {{ $a->id == $contribution->alumni_id ? 'selected' : '' }}>
                                    {{ $a->name }} (Batch: {{ $a->batch }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Amount -->
                    <div class="mb-4">
                        <label class="block font-medium">Amount</label>
                        <input type="number" name="amount" step="0.01" class="w-full border rounded p-2" value="{{ $contribution->amount }}" required>
                    </div>

                    <!-- Payment Date -->
                    <div class="mb-4">
                        <label class="block font-medium">Payment Date</label>
                        <input type="date" name="payment_date" class="w-full border rounded p-2" value="{{ $contribution->payment_date }}" required>
                    </div>

                    <!-- Payment Receipt -->
                    <div class="mb-4">
                        <label class="block font-medium">Payment Receipt (Optional)</label>
                        <input type="file" name="payment_photo" class="w-full border rounded p-2">

                        @if($contribution->payment_photo)
                            <p class="mt-2">Current File:
                                <a href="{{ asset('storage/'.$contribution->payment_photo) }}" target="_blank" class="text-blue-600 underline">
                                    View Receipt
                                </a>
                            </p>
                        @endif
                    </div>

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700 " style="background: #24cdcd;">
                        ✅ Update Contribution
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
