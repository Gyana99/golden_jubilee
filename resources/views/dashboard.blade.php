<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🎉 {{ __('Golden Jubilee Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }} 👋</h1>
                    <p class="mb-2">This is your <strong>Golden Jubilee Admin Panel</strong>.</p>
                    <p class="mb-4">From here you can manage:</p>

                    <ul class="list-disc list-inside">
                        <li>🎭 <strong>Events</strong> — Create and update event details</li>
                        <li>🎓 <strong>Alumni</strong> — Register and approve alumni</li>
                        <li>💰 <strong>Contributions</strong> — Track donations and contributions</li>
                        <li>📖 <strong>Magazines</strong> — Upload and manage school magazines</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
