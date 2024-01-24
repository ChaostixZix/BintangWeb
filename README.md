## Description
This project is a "Pendaftaran Peserta Didik Baru" application for "SMP Thawalib" using Laravel as the backend.

### New Feature: User Registration
- Add a new route for user registration in `routes/web.php`
- Create a new method `daftar` in `Pengguna` controller in `app/Http/Controllers/Pengguna.php`
- Add a new view for user registration in `resources/views/Auth/register.blade.php`

### Controllers
- Add the following method to the `Pengguna` controller in `app/Http/Controllers/Pengguna.php`: `php
public function daftar()
{
// Add your code here
}`

### Models
- No new model functions were added for the user registration feature.