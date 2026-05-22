<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
    <h2>Hello {{ $appointment->patient->name }},</h2>
    <p>Your appointment has been successfully created.</p>
    <ul>
        <li><strong>Doctor:</strong> {{ $appointment->doctor->name }}</li>
        <li><strong>Service:</strong> {{ $appointment->service->name }}</li>
        <li><strong>Date:</strong> {{ $appointment->date }}</li>
        <li><strong>Time:</strong> {{ $appointment->time }}</li>
    </ul>
    <p>Thank you.</p>
</body>
</html>
