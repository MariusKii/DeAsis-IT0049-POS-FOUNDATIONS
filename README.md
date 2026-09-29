# Tasks for Today Management System

Tasks for Today is a small CodeIgniter 4 and MySQL application for IT0049 Web System Technologies. It demonstrates MVC architecture, database-backed models, date filtering, and four shared-layout pages.

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

## Database and MVC structure

The `tasks` and `users` tables match the assessment schema. `TaskModel` and `UserModel` handle database records. `Pages` loads today's tasks and the static About page; `Tasks` loads the complete task list; `Profile` loads the demo user. Views only display controller data and provide friendly empty-result messages.

The migration and seeder are in `app/Database/Migrations` and `app/Database/Seeds`. The seeder creates eight tasks across yesterday, today, and tomorrow, plus exactly one demo user.
