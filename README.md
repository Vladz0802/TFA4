# Corner Shop POS — Phase 1

A four-page CodeIgniter 4 foundation for a small sari-sari store's point-of-sale
system. This phase covers routing, controllers, and views only — customer and
staff records are served from static PHP arrays, with no database involved yet.

## Pages

| Route        | Page               | Data source                          |
|--------------|--------------------|---------------------------------------|
| `/`          | Landing page       | —                                     |
| `/about`     | About              | —                                     |
| `/customers` | Customer Accounts  | Static array (full name, email, phone)|
| `/users`     | Staff Accounts     | Static array (username, full name, role) |

## Setup

1. Clone this repository.
2. Install dependencies:
   ```
   composer install
   ```
3. Copy `env` to `.env` (already provided pre-filled in this repo) and confirm
   `app.baseURL` matches how you're running the app locally, e.g.
   `http://localhost:8080/`.
4. Serve the app:
   ```
   php spark serve
   ```
5. Visit `http://localhost:8080/` and click through Home → About → Customers → Staff.

## Project structure

- `app/Controllers/Pages.php` — landing (`index`) and about (`about`) methods
- `app/Controllers/Customers.php` — static array of customer records, passed to the customers view
- `app/Controllers/Users.php` — static array of staff records, passed to the users view
- `app/Views/layouts/` — shared header/footer with the site navigation
- `app/Views/pages/`, `app/Views/customers/`, `app/Views/users/` — page templates
- `public/assets/style.css` — the site's visual styling

## Next phase

Static arrays will be replaced with real database-backed models once the data
layer is introduced.
