<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-dentist-navy leading-tight flex justify-between items-center">
            {{ __('messages.appointments') }}
            
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'quick-add-appointment')" class="bg-dentist-blue hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-full text-sm shadow-md transition transform hover:-translate-y-0.5">
                {{ __('messages.quick_add') }}
            </button>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Search Bar -->
            <div class="mb-6">
                <input type="text" id="search-input" placeholder="{{ __('messages.search') }}" class="w-full md:w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <!-- Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" id="table-container">
                    @include('appointments.partials.table', ['appointments' => $appointments])
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Add Modal -->
    <x-modal name="quick-add-appointment" :show="false" focusable>
        <form method="post" action="{{ route('appointments.store') }}" class="p-6">
            @csrf
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('messages.quick_add') }}
            </h2>

            @if(auth()->user()->role !== 'patient')
                <div class="mt-6">
                    <x-input-label for="patient_id" :value="__('messages.patients')" />
                    <select id="patient_id" name="patient_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        <option value="">-- {{ __('messages.select') }} --</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>
            @else
                <input type="hidden" name="patient_id" value="{{ auth()->id() }}">
            @endif

            <div class="mt-4">
                <x-input-label for="doctor_id" :value="__('messages.doctors')" />
                <select id="doctor_id" name="doctor_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">-- {{ __('messages.select') }} --</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-input-label for="service_id" :value="__('messages.services')" />
                <select id="service_id" name="service_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">-- {{ __('messages.select') }} --</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ __($service->name) }} ({{ $service->duration }} min)</option>
                    @endforeach
                </select>
            </div>

            @if(auth()->user()->role !== 'patient')
                <div class="mt-4 grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="date" :value="__('messages.date')" />
                        <x-text-input id="date" name="date" type="date" class="mt-1 block w-full" />
                    </div>
                    <div>
                        <x-input-label for="time" :value="__('messages.time')" />
                        <x-text-input id="time" name="time" type="time" class="mt-1 block w-full" />
                    </div>
                </div>
            @endif

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('messages.cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('messages.save') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>

    <!-- Edit Appointment Modal -->
    <x-modal name="edit-appointment" :show="false" focusable>
        <form method="post" id="edit-form" action="" class="p-6">
            @csrf
            @method('put')
            <h2 class="text-lg font-medium text-gray-900 mb-4">
                {{ __('messages.edit') }}
            </h2>

            <div class="mt-4">
                <x-input-label for="edit_status" :value="__('messages.status')" />
                <select id="edit_status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="pending">{{ __('messages.pending') }}</option>
                    <option value="confirmed">{{ __('messages.confirmed') }}</option>
                    <option value="cancelled">{{ __('messages.cancelled') }}</option>
                </select>
            </div>

            <div class="mt-4 grid grid-cols-2 gap-4">
                <div>
                    <x-input-label for="edit_date" :value="__('messages.date')" />
                    <x-text-input id="edit_date" name="date" type="date" class="mt-1 block w-full" />
                </div>
                <div>
                    <x-input-label for="edit_time" :value="__('messages.time')" />
                    <x-text-input id="edit_time" name="time" type="time" class="mt-1 block w-full" />
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('messages.cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3 bg-dentist-blue hover:bg-blue-600">
                    {{ __('messages.save') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>

    <!-- Delete Confirmation Modal -->
    <x-modal name="confirm-delete-appointment" :show="false" focusable>
        <form method="post" id="delete-form" action="" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('messages.confirm_delete') }}
            </h2>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('messages.cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('messages.delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('search-input');
            const tableContainer = document.getElementById('table-container');

            searchInput.addEventListener('keyup', function () {
                let query = searchInput.value;

                axios.get('{{ route('appointments.index') }}', {
                    params: { search: query }
                })
                .then(function (response) {
                    tableContainer.innerHTML = response.data.html;
                })
                .catch(function (error) {
                    console.error(error);
                });
            });
        });

        function confirmDelete(url) {
            document.getElementById('delete-form').action = url;
            window.dispatchEvent(new CustomEvent('open-modal', { detail: 'confirm-delete-appointment' }));
        }

        function openEditModal(id, status, date, time, url) {
            document.getElementById('edit-form').action = url;
            document.getElementById('edit_status').value = status;
            document.getElementById('edit_date').value = date;
            document.getElementById('edit_time').value = time;
            window.dispatchEvent(new CustomEvent('open-modal', { detail: 'edit-appointment' }));
        }
    </script>
</x-app-layout>
