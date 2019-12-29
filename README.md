# Expenses

This project aims at providing a way to manage the domestic monetary transactions, somehow integrated with the online homebanking, and to give an overall view of the way money is being spent

# Table of contents

-   [Installation for development](#installation-for-development)
    -   [Docker](#docker)
    -   [.env](#.env)
    -   [App key](#app-key)
    -   [Dependencies](#dependencies)
    -   [Migrate and seed](#migrate-and-seed)
-   [Development](#development)
    -   [Compiling assets](#compiling-assets)

# Installation for development

## Docker

> You'll need to install Docker and Docker Compose in your machine

Pull the custom Laradock environment first, go the project root and run

```
git submodule update --init
```

To continue the Laradock environment configuration, please refer to its [README](./laradock/README.md)

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

# Development

## Compiling assets

For the frontend, run `yarn install` in the first run.

Run `yarn run dev` to compile your assets, like CSS and Javascript.

---

Copyright 2019 jfrmm
