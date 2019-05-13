# Expenses

This project aims at providing a way to manage the domestic monetary transactions, somehow integrated with the online homebanking, and to give an overall view of the way money is being spent

# Installation for development

We'll assume you are using Homestead, so our suggestions we'll be acordingly

## Homestead

In your Homestead.yaml, name the database as `expenses`

```
databases:
    - expenses
```

## .env

You'll have to create a `.env` file with your environment configurations. There's a `.env.example` already set Homestead wise. Just don't forget to make the necessary adjustments to your environment (APP_URL, etc)

## App key

Generate your local secret key

```
php artisan key:generate
```

## Packages

Start with a package dependency check and installation

```
composer install
```

## Migrate and seed

Build and populate the database with some test data, just run

```
php artisan migrate --seed
```

# Troubleshooting

## App responses are very slow

If you are running Windows and are using Homestead, [enabling NFS support](http://backendtime.com/setup-laravel-homestead-windows/#speeding-up) may help. The instructions below were tested with VirtualBox 5.2.22, Vagrant 2.2.4 and laravel/homestead v7.18.0

Add these lines to your `folders` mapping in `c:\path\to\Homestead\Homestead.yaml`:

```
type: "nfs"
mount_options: ['nolock,vers=3,udp,noatime']
```

Then install this plugin in your box

```
vagrant plugin install vagrant-winnfsd
```

If your box was already up, you should restart and provision it (it will destroy your databases!)

```
vagrant reload --provision
```

## Can't debug with Homestead

Make sure you have Xdebug on Homestead correctly configured. Enter your box via SSH

```
vagrant ssh
```

then open your `20-xdebug.ini` file (in this scenario, we're using PHP 7.2)

```
sudo vim /etc/php/7.2/fpm/conf.d/20-xdebug.ini
```

check if it matches this configuration

```
zend_extension=xdebug.so
xdebug.remote_enable = 1
xdebug.remote_autostart = 1
xdebug.remote_connect_back = 1
xdebug.remote_port = 9000
xdebug.max_nesting_level = 512
```

and finally, restart the service

```
sudo service php7.2-fpm restart
```

Also, remember to check your firewall (eg.: connection is of type "Private" on Windows)
