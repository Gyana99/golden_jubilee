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

                    @php
                        $roleMenus = [
                            0 => [
                                '🎭 Events — Create and update event details',
                                '🎓 Alumni — Register and approve alumni',
                                '💰 Contributions — Track donations and contributions',
                            ],
                            1 => [
                                '💰 Contributions — Track donations and contributions',
                            ],
                            2 => [
                                '🎓 Alumni — Register and approve alumni',
                            ],
                        ];

                        $roleNames = [
                            0 => 'Super Admin',
                            1 => 'Finance Admin',
                            2 => 'Alumni Admin',
                        ];

                        $menus = $roleMenus[Auth::user()->userRoll] ?? [];
                        $roleName = $roleNames[Auth::user()->userRoll] ?? 'User';
                    @endphp

                    <h2 class="text-lg font-semibold mb-2">Role: {{ $roleName }}</h2>

                    <ul class="list-disc list-inside space-y-1">
                        @foreach($menus as $menu)
                            <li>{{ $menu }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
