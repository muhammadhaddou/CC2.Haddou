<!DOCTYPE html>
<html>
<head>
    <title>{{ __('messages.appointment_confirmation') }}</title>
</head>
<body>
    <h2>{{ __('messages.hello') }} {{ $appointment->patient->name }},</h2>
    <p>{{ __('messages.appointment_success_email') }}</p>
    <ul>
        <li><strong>{{ __('messages.doctors') }}:</strong> {{ $appointment->doctor->name }}</li>
        <li><strong>{{ __('messages.services') }}:</strong> {{ $appointment->service->name }}</li>
        <li><strong>{{ __('messages.date') }}:</strong> {{ $appointment->date }}</li>
        <li><strong>{{ __('messages.time') }}:</strong> {{ $appointment->time }}</li>
    </ul>
    <p>{{ __('messages.thank_you') }}</p>
</body>
</html>
