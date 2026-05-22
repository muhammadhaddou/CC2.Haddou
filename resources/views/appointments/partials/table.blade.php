<table class="w-full text-sm text-left text-gray-500">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3">{{ __('messages.patients') }}</th>
            <th scope="col" class="px-6 py-3">{{ __('messages.doctors') }}</th>
            <th scope="col" class="px-6 py-3">{{ __('messages.services') }}</th>
            <th scope="col" class="px-6 py-3">{{ __('messages.date') }} & {{ __('messages.time') }}</th>
            <th scope="col" class="px-6 py-3">{{ __('messages.status') }}</th>
            <th scope="col" class="px-6 py-3 text-right">{{ __('messages.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($appointments as $appointment)
            <tr class="bg-white border-b">
                <td class="px-6 py-4 font-medium text-gray-900">{{ $appointment->patient->name }}</td>
                <td class="px-6 py-4">{{ $appointment->doctor->name }}</td>
                <td class="px-6 py-4">{{ $appointment->service->name }}</td>
                <td class="px-6 py-4">{{ $appointment->date }} <br> <span class="text-xs text-gray-400">{{ $appointment->time }}</span></td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 text-xs rounded-full 
                        @if($appointment->status == 'confirmed') bg-green-100 text-green-800 
                        @elseif($appointment->status == 'cancelled') bg-red-100 text-red-800 
                        @else bg-yellow-100 text-yellow-800 @endif">
                        {{ __('messages.' . $appointment->status) }}
                    </span>
                </td>
                <td class="px-6 py-4 text-right">
                    <button onclick="confirmDelete('{{ route('appointments.destroy', $appointment) }}')" class="font-medium text-red-600 hover:underline ms-3">{{ __('messages.delete') }}</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="px-6 py-4 text-center text-gray-500">{{ __('messages.no_appointments') }}</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="mt-4">
    {{ $appointments->links() }}
</div>
