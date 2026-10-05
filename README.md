# Tasks for Today Management System

Tasks for Today is a small CodeIgniter 4 and MySQL application for IT0049 Web System Technologies. It demonstrates MVC architecture, database-backed models, date filtering, shared layouts, and session-based authentication.

## Requirements

- PHP 8.2 or later with MySQLi
- Composer
- MySQL or MariaDB, such as XAMPP
- CodeIgniter 4.7 (installed through Composer)

## Setup

1. Install dependencies with `composer install`.
2. Start MySQL.
3. Use either the migration and seeder or the SQL export:

   ```bash
   php spark migrate
   php spark db:seed TasksSeeder
   ```

   The SQL alternative is [`database/tasks_for_today.sql`](database/tasks_for_today.sql). Import it through MySQL or phpMyAdmin.
4. Copy `env` to `.env` if needed and configure the local database:

   ```dotenv
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'
   database.default.hostname = localhost
   database.default.database = tasks_for_today
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

   Change the username or password for your local installation. Do not commit real credentials.

The migration adds the `password` column to existing `users` tables. Run the seeder after migrating so the demo account receives a password hash. Legacy users without a password are assigned the same demo password by the seeder; change those passwords through User Accounts after logging in.

## Run

```bash
php spark serve
```

Open <http://localhost:8080/>.

## Routes

| Page | URL | Purpose |
| --- | --- | --- |
| Welcome / Today's Tasks | `/` | Shows only tasks whose date is today |
| Task List | `/tasks` | Shows every task ordered by date |
| Profile | `/profile` | Shows the single demo user |
| About | `/about` | Static project and developer information |
| Login | `/login` | Starts a session after username/password verification |
| Logout | `/logout` | Clears the authenticated session and returns to login |
| Customers | `/customers` | Protected customer list and CRUD pages |
| User Accounts | `/users` | Protected user list and CRUD pages |

## Database and MVC structure

The `tasks` and `users` tables match the assessment schema. `TaskModel` and `UserModel` handle database records. `Pages` loads today's tasks and the static About page; `Tasks` loads the complete task list; `Profile` loads the demo user. Views only display controller data and provide friendly empty-result messages.

The migration and seeder are in `app/Database/Migrations` and `app/Database/Seeds`. The seeder creates eight tasks across yesterday, today, and tomorrow, plus the demo user.

## Authentication

Test credentials:

- Username: `student01`
- Password: `password123`

Passwords are stored with PHP `password_hash()` and checked with `password_verify()`. The authenticated session stores only login state and non-sensitive user identity fields. The authentication filter protects every Customer Accounts and User Accounts list, create, edit, and POST submission route; unauthenticated requests redirect to `/login`. Logging out clears the session and prevents access to previously protected URLs.
