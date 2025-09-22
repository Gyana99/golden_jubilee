<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            💬 {{ __('WhatsApp Bulk Message') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('whatsapp.send') }}" method="POST">
                    @csrf
                    <textarea name="message" rows="5"
                              class="w-full border rounded p-2"
                              placeholder="Type your WhatsApp message here..."></textarea>
                    <br><br>
                    <x-primary-button>Send Message</x-primary-button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
