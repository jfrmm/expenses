# Expenses

This project aims at providing a way to manage the domestic monetary transactions, somehow integrated with the online homebanking, and to give an overall view of the way money is being spent

# Table of contents

-   [Installation for development](#installation-for-development)
    -   [Docker](#docker)
    -   [.env](#.env)
    -   [Dependencies](#dependencies)
    -   [App key](#app-key)
    -   [Migrate and seed](#migrate-and-seed)

# Installation for development

## Docker

> You'll need to install Docker and Docker Compose in your machine

Pull the custom Laradock environment first, go the project root and run

```
git submodule update --init
```

Then `cd` into the folder `laradock` and copy the example `env-example` file to `.env`, and adapt if needed

Finally, start the app, with

```
docker-compose -p expenses up -d nginx mysql
```

> Add `127.0.0.1 expenses.test` to your OS hosts file, and use that URL to access your app

> To pull updates to the environment, run `git submodule update --remote --merge`

To enter the development container, run

```
docker-compose -p expenses exec workspace bash
```

> Alternatively, you can use the provided `docker` commands available in `package.json`

## .env

You'll have to create a `.env` file with your environment configurations. There's a `.env.dev.example` with default settings. Just don't forget to make the necessary adjustments to your environment (APP_URL, etc).

## Dependencies

Start with a package dependency check and installation

```
composer install
```

## App key

Generate your local secret key

```
php artisan key:generate
```

## Migrate and seed

Build and populate the database with some test data, just run

```
php artisan migrate --seed
```

---

Copyright 2019 jfrmm
