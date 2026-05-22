# CC2 Laravel Haddou - Medical Appointments Manager

Complete web application to manage appointments for a medical clinic.

## Installation Instructions

1. Clone the repository.
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Install Node.js dependencies and build assets:
   ```bash
   npm install && npm run build
   ```
4. Setup environment variables:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
6. Start the local server:
   ```bash
   php artisan serve
   ```

## Default Login Credentials

**Admin/Doctor:**
- Email: admin@example.com
- Password: password

**Test User:**
- Email: test@example.com
- Password: password

## API Documentation

The application exposes the following REST API endpoints:

### List Appointments
`GET /api/appointments`
Returns a JSON list of all appointments with their associated patient, doctor, and service details.

### Create an Appointment
`POST /api/appointments`
Allows creation of a new appointment.
**Payload Requirements:**
- `patient_id` (integer, required)
- `doctor_id` (integer, required)
- `service_id` (integer, required)
- `date` (date, YYYY-MM-DD, required)
- `time` (time, HH:MM, required)
- `notes` (string, optional)

Returns the created appointment as JSON with HTTP 201 status code.
