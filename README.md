# Expenses

This project aims at providing a way to manage the domestic monetary transactions, somehow integrated with the online homebanking, and to give an overall view of the way money is being spent

# Table of contents

-   [Installation for development](#installation-for-development)
    -   [Docker](#docker)
    -   [.env](#.env)
    -   [App key](#app-key)
    -   [Dependencies](#dependencies)
    -   [Migrate and seed](#migrate-and-seed)

# Installation for development

## Docker

Pull the custom Laradock environment first, go the project root and run

```
git submodule init
git submodule update
```

Then `cd` into the folder `laradock` and start the app, with

```
docker-compose -p expenses up -d
```

> Make sure to install Docker and Docker Compose in your machine

## .env

You'll have to create a `.env` file with your environment configurations. There's a `.env.dev.example` with default settings. Just don't forget to make the necessary adjustments to your environment (APP_URL, etc).

## App key

Generate your local secret key

```
php artisan key:generate
```

## Dependencies

Start with a package dependency check and installation

```
composer install
```

## Migrate and seed

Build and populate the database with some test data, just run

```
php artisan migrate --seed
```

---

Copyright 2019 jfrmm
