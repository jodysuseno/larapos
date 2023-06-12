<p align="center"><a href=https://github.com/jodysuseno/larapos" target="_blank"><img src="public/images/logo.png" width="400"></a></p>

# Larapos
Larapos is a website-based point of sale application. This application can be used to process sales transactions such as product management, incoming goods stock processes, payments and transaction reports.

## Features
- Login with role admin and cashier.
- Customer Management.
- Supplier Management.
- Product Managenet such as Category, Unit, and Item.
- Transaction such as Sales, Stock In/Purchases, and Stock Out.
- Report for sales and stock can print document to PDF.
- Setting App Configuration and User Management. 

## Tech
LaraPOS uses a number of open source projects to work properly:
- [Vali Admin Template](https://pratikborsadiya.in/vali-admin/) - Bootstrap 4 admin template for UI app.
- [jQuery](http://jquery.com) - a fast, small, and feature-rich JavaScript library.
- [Laravel](https://laravel.com/) - a web application framework with expressive, elegant syntax.
- [Mysql](https://www.mysql.com/) - Most popular open source database.
- [DomPDF](https://dompdf.github.io/) - HTML to PDF converter.

## Installation
- LaraPOS installation requires [Composer](https://getcomposer.org/) to run and install [Xampp](https://www.apachefriends.org/).
- Clone this repository.
    ```sh
    git clone https://github.com/jodysuseno/larapos.git
    cd larapos
    ```
- Open phpmyadmin in browser type "localhost/phpmyadmin" in url and create database with name "laravel-pos"
- Run migration and seeder to create database structure and dummy data.
    ```sh
    php artisan migrate --seed
    ```
- Run server
    ```sh
    php artisan serve
    ```

## License

MIT

**Software for portfolio by jodysuseno**
