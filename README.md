# Laravel Sail Docker Compose Project Setup
## Introduction

This README will guide you through setting up and running a Laravel project using Laravel Sail and Docker Compose. We'll cover the prerequisites and the steps to initialize your project, start the development server, and run essential Artisan commands.

## Prerequisites

Before getting started, make sure you have the following installed on your machine:

- Docker: [Download and install Docker](https://www.docker.com/get-started) for your operating system.
- Docker Compose: [Install Docker Compose](https://docs.docker.com/compose/install/) if it's not already installed.

## Setup

To set up the project, follow these steps:

1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Copy the `.env.example` file to `.env`.
4. Run `docker compose build` to build the docker image and install all necessary components
5. Run `docker compose up -d` to start it up
6. Run `docker compose exec laravel.test bash` to get into the container
7. Run `composer install` and `npm install` to install all needed components then `exit` to get out of there.
8. Run `./vendor/bin/sail artisan migrate:fresh` to migrate the database.
9. Run `./vendor/bin/sail artisan db:seed` to seed the database with initial data.
10. Run `npm run build` to build the frontend assets.
11. Open up a browser and go to localhost to navigate the app

## User

To access the application, use the following credentials:

- Username: `test@test`
- Password: `test123`

You can copy the credentials by selecting the text and using the copy function of your operating system.


That's it! You should now have the project set up and ready to use.

