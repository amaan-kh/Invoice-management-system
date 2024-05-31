
## INVOICE MANAGEMENT SYSTEM
An Invoice Management System built to learn Laravel.

### Features
* Only Admin can create, read, update, delete Users and Invoices
* Admin shares invoices with users created
* Users can log in to view only the invoices shared with them

### Instructions for use
* Ensure you have php 8.2.19, composer and mysql installed
* clone the repo
```
composer install
cp .env.example .env
php artisan key:generate
```
* set up the database config in .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=imsdb
DB_USERNAME=root
DB_PASSWORD=
```

```
php artisan migrate:fresh --seed
npm install
npm run dev
```
* run using
```
php artisan serve
```
* login using username:admin and password:password

##### NOTE: I built this to learn how to use laravel, all routes are protected but  very minimal error handling is done. 