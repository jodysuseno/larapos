<p align="center"><a href=https://github.com/jodysuseno/larapos" target="_blank"><img src="public/images/logo.png" width="400"></a></p>

# Larapos
Larapos is a website-based point of sale application. This application can be used to process sales transactions such as product management, incoming goods stock processes, payments and transaction reports.

## Preview
<table>
    <tr align="center">
        <td>
        <img src="https://github.com/jodysuseno/larapos/assets/57146181/b90f533f-6d7a-4a32-8e7b-0cd8e2069ee4">
        <p>Dashboard</p>
        </td>
        <td>
        <img src="https://github.com/jodysuseno/larapos/assets/57146181/ace661c5-a29f-4315-b77d-e67cb2044d00">
        <p>Supplier Management</p>
        </td>
    </tr>
    <tr align="center">
        <td>
        <img src="https://github.com/jodysuseno/larapos/assets/57146181/32bfedc4-b496-4b9f-8e7d-d088abf49afd">
        <p>Customer Management</p>
        </td>
        <td>
        <img src="https://github.com/jodysuseno/larapos/assets/57146181/b28ae6bf-e3d1-495c-ae73-2926e23ffcff">
        <p>Item Product Management</p>
        </td>
    </tr>
    <tr align="center">
        <td>
        <img src="https://github.com/jodysuseno/larapos/assets/57146181/e888b3c6-8583-49d2-b8cf-b4ddf3bcc30a">
        <p>Sale</p>
        </td>
        <td>
        <img src="https://github.com/jodysuseno/larapos/assets/57146181/9e2ef58d-521e-4756-abd6-b1808fa1b6fa">
        <p>Stock</p>
        </td>
    </tr>
    <tr align="center">
        <td>
        <img src="https://github.com/jodysuseno/larapos/assets/57146181/d45d1dc3-b6e3-499c-be25-7be274df4602">
        <p>Sales Report</p>
        </td>
        <td>
        <img src="https://github.com/jodysuseno/larapos/assets/57146181/7eb960b0-8b8f-4f08-ba24-32171f74f61d">
        <p>Report of sale pdf</p>
        </td>
    </tr>
    <tr align="center">
        <td>
        <img src="https://github.com/jodysuseno/larapos/assets/57146181/640296fd-6f13-45dd-be50-0e301c7dce77">
        <p>Stock Report</p>
        </td>
        <td>
        <img src="https://github.com/jodysuseno/larapos/assets/57146181/df261451-7d94-4615-b999-b5dfd3fcf360">
        <p>Report of stock pdf</p>
        </td>
    </tr>
    <tr align="center">
        <td>
        <img src="https://github.com/jodysuseno/larapos/assets/57146181/c8d4da58-ecdc-49e7-93b2-cd472cce9717">
        <p>User Management</p>
        </td>
        <td>
        <img src="https://github.com/jodysuseno/larapos/assets/57146181/98c8d108-def4-4b5e-b1f9-2b5b7f3c36eb">
        <p>Configuration Setting</p>
        </td>
    </tr>
</table>
    
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
- Larapos installation requires [Composer](https://getcomposer.org/), [npm](https://www.npmjs.com/), and [Xampp](https://www.apachefriends.org/).
- Clone this repository.
    ```sh
    git clone https://github.com/jodysuseno/larapos.git
    cd larapos
    ```
- Install NPM Dependencies
    ```sh
    npm install
    ```
- Create a copy of your .env file
    ```sh
    cd .env.example .env
    ```
- Generate an app encryption key
    ```sh
    php artisan key:generate
    ```
- Open phpmyadmin in browser type "localhost/phpmyadmin" in url and create database with name "larapos"
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
