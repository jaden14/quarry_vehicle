# Module Checklist

- [x] Conveyance - Jquery (Create, Update, Validate, Delete) Included
- [x] Violation Type - Jquery (Create, Update, Validate, Delete) Included
- [x] Vehicle Violations

Jquery to be implement on the ff:
- [  ] Vehicle Violations
- [  ] Quarry and Sub-Quarry

# Installation
There is no font package included here, if you want to add icon/s go to https://icons.getbootstrap.com/ then copy the HTML SVG for performance.

To install:

1. composer update
2. npm install
3. copy .env.example .env <- setup your database and config the .env
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed <-this will add user admin@admin.com/12345678

# CRUD: Conveyance

To access the **Conveyance** page you may visit **/conveyance** url path.

e.g

```php
127.0.0.1:8000/conveyance
```

# CRUD: Violation Type

To access the **Violation Type** page you may visit **/violationtype** url path.

e.g

```php
127.0.0.1:8000/violationtype
```

# CRUD: Quarry

To access the **Quarry** page you may visit **/quarry** url path.

e.g

```php
127.0.0.1:8000/quarry
```


# Reference: 

1. [SweetAlert Docs](https://sweetalert2.github.io/#examples)
2. [Ajax Guide for Sweetalert](https://codingdriver.com/sweetalert-with-laravel-ajax.html)
