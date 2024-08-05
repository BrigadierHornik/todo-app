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
4. Run `./vendor/bin/sail up -d` to start the development server using Laravel Sail and Docker Compose.
5. Run `./vendor/bin/sail artisan migrate:fresh` to migrate the database.
6. Run `./vendor/bin/sail artisan db:seed` to seed the database with initial data.
7. Run `npm install` to install the JavaScript dependencies.
8. Run `npm run build` to build the frontend assets.
9. Open up browser and go to localhost now you can navigate the app

## User

To access the application, use the following credentials:

- Username: `user@test`
- Password: `test123`

You can copy the credentials by selecting the text and using the copy function of your operating system.


That's it! You should now have the project set up and ready to use.

