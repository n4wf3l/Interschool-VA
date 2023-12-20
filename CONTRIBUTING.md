# Contributing to Interschool Voetbal App

Welcome to Interschool Voetbal App (IVA)! We appreciate your interest in contributing to our academic project. By contributing, you help make our project better.

## Ways to Contribute

You can contribute to IVA in the following ways:

-   Bug Fixes: If you find any bugs, please submit a bug report or, even better, a pull request with a fix.

-   Feature Requests: Suggest new features or improvements that you think would enhance our project.

-   Documentation: Help improve our documentation by fixing errors, adding clarity, or contributing to missing sections.

-   Code Contributions: Contribute code to address open issues or to introduce new features.

## Getting Started

Before you start contributing, please ensure you have the following prerequisites:

-   [List any prerequisites or dependencies]

## Setting Up the Development Environment

To set up your development environment, follow these steps:

1. Clone the repository: git clone https://github.com/n4wf3l/Interschool-VA.git
2. Install dependencies - Open your terminal and typ these commands :

-   npm composer
-   php artisan key:generate
-   cp .env.example .env
-   php artisan migrate
-   npm install
-   npm run dev
-   php artisan serve

3. Configure the project: Laravel uses an .env file for environment-specific configurations. Make sure you have an .env file in the root of your project. You can copy the .env.example file and update it with your configurations. Update the .env file with your database credentials, application key, and other settings. Generate an application key to secure user sessions and other encrypted data(php artisan key:generate). Configure your database settings in the .env file. Set the DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD. Cache your configuration for better performance (php artisan config:cache). Also, you can clear the cache when you make changes to your configuration (php artisan config:clear). Run migrations to create database tables (php artisan migrate).
4. Run tests: Running tests in a Laravel project involves using PHPUnit, which is the default testing framework for Laravel. Laravel provides a convenient set of testing tools and helpers to make testing your applications easier. Here's how you can run tests in Laravel: Create Tests (php artisan make:test ExampleTest), Write Test Cases, Run Tests (php artisan test - php artisan test tests/Feature/ExampleTest.php - vendor/bin/phpunit), Testing Environment (cp .env .env.testing) and Database Migrations (php artisan migrate --env=testing).

## Code of Conduct

We expect contributors to adhere to our Code of Conduct. Please be respectful and inclusive in your interactions with the community.

## Bug Reports

If you find a bug, please submit a bug report by following our bug report template.

## Feature Requests

To suggest a new feature or improvement, please use our feature request template.

## Pull Requests

When submitting a pull request, please adhere to the following guidelines:

-   Maintain code quality and adhere to coding standards.
-   Provide test coverage for new features.
-   Follow our pull request template.

## Communication Channels

-   For general questions or discussions, use our mailing list.
-   To report issues or suggest features, use our issue tracker.

## Acknowledgments

We would like to express our gratitude to all contributors who have helped make Interschool Voetbal App better.

Thank you for contributing to our academic project!

Nawfel Ajari
Kristian Vasiaj
Jack Thyssens
Ismael Bouzrouti
Soufian Jaâtar
