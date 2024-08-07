# Rasulian Laravel Application

This is the README file for the Rasulian Laravel application. This guide will help you set up and run the application on your local machine.

## Overview

- **Laravel Version:** 11
- **Frontend:** Inertia.js including [PrimeVue UI Suite (Form Kit)](https://primevue.org/)
- **PHP Version:** 8.2

## Prerequisites

- Docker
- Composer
- Node.js and npm

## Installation

1. **Clone the repository:**

    ```sh
    git clone git@github.com:aboutnima/Rasulian.git
    cd Rasulian
    ```

2. **Install PHP dependencies:**

    ```sh
    composer install
    ```

3. **Install Node.js dependencies:**

    ```sh
    npm install
    ```

4. **Build the frontend assets:**

    ```sh
    npm run build
    ```

## Running the Application

This application uses Laravel Sail for Docker container management.

1. **Start Docker:**

   Ensure Docker is running on your machine.


2. **Start the application using Sail:**

    ```sh
    ./vendor/bin/sail up -d
    ```

3. **Run database migrations:**

    ```sh
    ./vendor/bin/sail artisan migrate:fresh
    ```

## Accessing the Application

The application will be accessible at [http://localhost](http://localhost).

## Additional Information

For more detailed information, please refer to the official Laravel Sail documentation: [Laravel Sail](https://laravel.com/docs/11.x/sail)
