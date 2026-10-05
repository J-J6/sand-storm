# Sandstorm Industries website

Marketing website for Sandstorm Industries (Mikindani, Mombasa) with a contact form that saves inquiries to a database, emails them to the team, and a private admin inbox for reviewing them.

Built with Laravel 13 (PHP 8.3+), SQLite, and Tailwind CSS 3.4 compiled with Vite.

## Pages

Home, About, Services, Standards, Contact, Privacy and Terms are public. The admin area lives at `/admin` and needs a login.

## Setup

Requirements: PHP 8.3+, Composer, Node.js and npm.

```bash
composer setup
```

This installs dependencies, creates `.env`, generates the app key, runs the migrations, and builds the CSS. Then start the site:

```bash
php artisan serve
```

## Admin area

Sign in at `/admin/login`. There is no public registration. Accounts live in the `users` table and have one of two roles:

| Role | Can do |
|---|---|
| Admin | View, search and reply to inquiries |
| Super admin | Everything an admin can, plus delete inquiries and manage admins (the Admins page) |

Create the first super admin yourself, because a new account is a plain admin by default:

```bash
php artisan tinker
```
```php
$user = App\Models\User::create([
    'name' => 'Owner',
    'email' => 'owner@example.com',
    'password' => 'use-a-long-unique-password',
]);
$user->role = 'super_admin';
$user->save();
```

After that, super admins add, remove and reset other admins from the **Admins** page in the console. Passwords must be at least 12 characters, and resetting a password or removing someone signs them out immediately. Nobody can change or remove their own account, and the last super admin can never be demoted or removed.

## Configuration

Set these in `.env` (see `.env.example`):

| Key | Purpose |
|---|---|
| `INQUIRY_MAIL_TO` | Where new inquiry emails are sent. Defaults to `compliance@sandstormindustries.co.ke`. |
| `MAIL_MAILER`, `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_FROM_ADDRESS` | Outgoing email. With `MAIL_MAILER=log`, emails are only written to `storage/logs/laravel.log`. |
| `APP_URL` | The site's public address. |

Times are shown in `Africa/Nairobi` (set in `config/app.php`).

## Spam protection

- The contact form allows 5 submissions per 10 minutes per IP address.
- A hidden honeypot field (`hp_check`) silently drops bot submissions.
- Admin login allows 5 attempts per minute per IP address.

## Styles

Tailwind is compiled with Vite. After adding or changing classes in a view, rebuild:

```bash
npm run build
```

The built files go to `public/build`, which is not committed, so run the build on every new machine or server.

## Tests

```bash
php artisan test
```

Tests run on an in-memory database and never touch real inquiries.

## Launch checklist

Before going live:

1. Set `APP_ENV=production` and `APP_DEBUG=false`.
2. Set `APP_URL` to the real address, and `SESSION_SECURE_COOKIE=true` once the site uses HTTPS.
3. Configure real SMTP in the `MAIL_*` settings and send a test inquiry.
4. Run `php artisan migrate --force`.
5. Create the production super admin (see Admin area) with a long random password.
6. Build the CSS (`npm run build`) or upload the `public/build` folder.
7. Run `php artisan config:cache`, `php artisan route:cache` and `php artisan view:cache`.
8. Make sure `storage` and `bootstrap/cache` are writable by the web server.
9. Back up the database regularly. It contains customer inquiries.
10. Do not run `php artisan db:seed` in production.
