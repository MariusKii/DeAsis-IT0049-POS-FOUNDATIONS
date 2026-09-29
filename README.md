# From Zero to Four Pages: POS Foundations

A beginner-friendly four-page Point-of-Sale foundation built with CodeIgniter 4 for IT0049 Web System Technologies Technical Formative Assessment 1.

## Features

- Landing page at `/`
- About page at `/about`
- Customer Accounts page at `/customers`
- User Accounts page at `/users`
- Shared navigation and responsive styling
- Static PHP-array data displayed with `foreach` loops

## Requirements

- PHP 8.2 or later
- Composer
- CodeIgniter 4.7.4 (installed through Composer)

## Installation

1. Clone or download this project.
2. Open a terminal in the project directory.
3. Install dependencies: `composer install`
4. Copy `env` to `.env` if `.env` does not exist.
5. Set the local base URL in `.env`:

   ```dotenv
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'
   ```

## Routes

| Page | URL |
| --- | --- |
| Home | `/` |
| About | `/about` |
| Customer Accounts | `/customers` |
| User Accounts | `/users` |

## Data Source

The Customer Accounts and User Accounts pages intentionally use static PHP arrays defined in their controllers. The arrays are passed to the views, where `foreach` renders each record. This assessment does not use a database; database integration belongs to a later module.

## Running Locally

From the project directory, start CodeIgniter's development server:

```bash
php spark serve
```

Then open [http://localhost:8080/](http://localhost:8080/) in a browser.

For a production-style local server, point the document root to the `public/` directory. Do not use the project root as the public document root.

## Assessment note

The activity brief includes a submission line mentioning a database export, but the laboratory requirements explicitly specify static arrays and no database for this version. No fabricated database export is included.
