<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @if(auth()->user()->role === 'patient')
                    <!-- Patient Stats -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="text-sm font-medium text-gray-500 truncate">{{ __('messages.appointments') }}</div>
                        <div class="mt-1 text-3xl font-semibold text-gray-900">{{ $stats['total_appointments'] }}</div>
                    </div>
                    <div class="bg-yellow-50 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-yellow-100">
                        <div class="text-sm font-medium text-yellow-600 truncate">{{ __('messages.pending') }}</div>
                        <div class="mt-1 text-3xl font-semibold text-yellow-900">{{ $stats['pending_appointments'] }}</div>
                    </div>
                    <div class="bg-green-50 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-green-100">
                        <div class="text-sm font-medium text-green-600 truncate">{{ __('messages.confirmed') }}</div>
                        <div class="mt-1 text-3xl font-semibold text-green-900">{{ $stats['confirmed_appointments'] }}</div>
                    </div>
                @else
                    <!-- Doctor/Admin Stats -->
                    <div class="bg-blue-50 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-blue-100">
                        <div class="text-sm font-medium text-blue-600 truncate">{{ __('messages.appointments') }}</div>
                        <div class="mt-1 text-3xl font-semibold text-blue-900">{{ $stats['total_appointments'] }}</div>
                    </div>
                    <div class="bg-yellow-50 overflow-hidden shadow-sm sm:rounded-lg p-6 border border-yellow-100">
                        <div class="text-sm font-medium text-yellow-600 truncate">{{ __('messages.pending') }}</div>
                        <div class="mt-1 text-3xl font-semibold text-yellow-900">{{ $stats['pending_appointments'] }}</div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border">
                        <div class="text-sm font-medium text-gray-500 truncate">{{ __('messages.patients') }}</div>
                        <div class="mt-1 text-3xl font-semibold text-gray-900">{{ $stats['total_patients'] }}</div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border">
                        <div class="text-sm font-medium text-gray-500 truncate">{{ __('messages.doctors') }}</div>
                        <div class="mt-1 text-3xl font-semibold text-gray-900">{{ $stats['total_doctors'] }}</div>
                    </div>
                @endif
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
