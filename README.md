# Corner Shop POS

A small CodeIgniter 4 point-of-sale app for a sari-sari store.

- **Phase 1 (TFA1):** pages and routing
- **Phase 2 (TFA2):** customers and users read from a MySQL database through Models
- **Phase 3 (TFA3):** validated create/edit forms and avatar upload for users
- **Phase 4 (TFA4):** sessions and authentication (login, logout, protected pages)

## Demo login

| Username | Password   |
|----------|------------|
| `jcruz`  | `Staff@123` |

All five seeded users (`jcruz`, `msantos`, `preyes`, `alim`, `cbautista`) share this demo password. Change it from **Staff → Edit** after logging in.

## How authentication works

1. **Passwords:** the `users.password` column stores a bcrypt hash made with `password_hash()`. Plain-text passwords are never saved.
2. **Login (`/login`):** `Auth::attempt()` looks up the username, checks the password with `password_verify()`, then regenerates the session id and stores `isLoggedIn`, `userId`, `username` and `full_name` in the session. A wrong username and a wrong password give the same error message.
3. **Filter:** `app/Filters/AuthFilter.php` (alias `auth` in `app/Config/Filters.php`) redirects anyone who is not logged in to `/login`. It is attached to a route group in `app/Config/Routes.php`, so every Customer and User route (list, new, create, edit, update) is protected. After logging in, the user is sent back to the page they originally asked for.
4. **Logout:** the "Log out" button posts to `/logout`, which runs `session()->destroy()` and redirects to `/login`.
5. **CSRF:** the `csrf` filter is switched on globally, and every form includes `csrf_field()`.
6. **User passwords:** the Add User form requires a password (8+ characters, confirmed). On Edit, leaving the password blank keeps the current one.

## Routes

| Route | Access | What it does |
|-------|--------|--------------|
| `/`, `/about` | public | Landing and About pages |
| `/login` (GET, POST) | public | Login form and login attempt |
| `/logout` (POST) | public | Destroys the session |
| `/customers`, `/customers/new`, `/customers/{id}/edit` | **login required** | Customer list, add, edit |
| `/users`, `/users/new`, `/users/{id}/edit` | **login required** | Staff list, add, edit, avatar upload |

## Access control tests

| Test | Expected | Result |
|------|----------|--------|
| Visit any customer or user page while logged out | Redirected to `/login` | Pass |
| POST to `/customers` while logged out | Redirected to `/login`, nothing saved | Pass |
| Log in with a wrong password or unknown user | Stays on `/login` with "Invalid username or password." | Pass |
| Log in with correct credentials | Redirected to the page requested, or `/customers` | Pass |
| Visit protected pages while logged in | Page loads normally | Pass |
| Visit `/login` while logged in | Redirected to `/customers` | Pass |
| Log out, then visit a protected page | Redirected to `/login` | Pass |
| Submit a form without a CSRF token | Request rejected (403) | Pass |

## Setup

1. Clone this repository.
2. Install dependencies: `composer install`
3. Create the folders Git does not store: `writable/cache`, `writable/logs`, `writable/session`, `writable/debugbar`, `writable/uploads`.
4. Enable the PHP **GD** extension (needed for avatar resizing). In XAMPP, enable `extension=gd` in `php.ini`.
5. Create a database named `ci4pos` and import `databse.sql` into it. It already contains the `password` and `avatar` columns and the hashed demo passwords.
   - Already have the TFA3 database? Run `ALTER TABLE users ADD COLUMN password VARCHAR(255) NULL;`, then `php spark db:seed UserPasswordSeeder`.
6. Copy `env` to `.env` and set `CI_ENVIRONMENT`, `app.baseURL` and the `database.default.*` values for your setup.
7. Make sure `public/uploads` is writable.
8. Run `php spark serve` and open `http://localhost:8080/`, then log in.

## Project structure

- `app/Controllers/Auth.php` - login, attempt, logout
- `app/Filters/AuthFilter.php` - blocks visitors who are not logged in
- `app/Controllers/Customers.php`, `Users.php` - list, new, create, edit, update
- `app/Models/CustomerModel.php`, `UserModel.php` - database access
- `app/Views/auth/login.php` - login page
- `app/Views/customers/`, `app/Views/users/` - list, new and edit templates
- `app/Views/layouts/` - shared header (with login/logout) and footer
- `app/Database/Seeds/UserPasswordSeeder.php` - hashes passwords for existing users
- `databse.sql` - database export
- `public/uploads/` - uploaded avatars; `public/images/placeholder.svg` - fallback avatar

## Live site

Hosted link: _add your link here_
