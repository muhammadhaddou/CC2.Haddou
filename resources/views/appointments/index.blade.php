<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
            {{ __('messages.appointments') }}
            
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'quick-add-appointment')" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
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

            <div class="mt-6">
                <x-input-label for="patient_id" :value="__('messages.patients')" />
                <select id="patient_id" name="patient_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">-- Select --</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-input-label for="doctor_id" :value="__('messages.doctors')" />
                <select id="doctor_id" name="doctor_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">-- Select --</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-input-label for="service_id" :value="__('messages.services')" />
                <select id="service_id" name="service_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">-- Select --</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }} ({{ $service->duration }} min)</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4 grid grid-cols-2 gap-4">
                <div>
                    <x-input-label for="date" :value="__('messages.date')" />
                    <x-text-input id="date" name="date" type="date" class="mt-1 block w-full" required />
                </div>
                <div>
                    <x-input-label for="time" :value="__('messages.time')" />
                    <x-text-input id="time" name="time" type="time" class="mt-1 block w-full" required />
                </div>
            </div>

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
    </script>
</x-app-layout>
