# Laravel - Blog Exercice #

<p align="center">
   <strong>An exercice in objective to learn Laravel with a blog</strong><br />
   <strong>It's just a simple laravel blog</strong>
</p>

### Features 🚀

- 🌐 **Create an article**

- 🔄 **Edit an article**

- ⭐ **Delete articles with an admin panel**

## Prerequisites for use 🛠️

- NONE

## Prerequisites for installation 🛠️

- PHP 8.0.X
- MariaDB 10.10.X
- Laravel 11.X
- Composer

## How to Run the Project ▶️

1. Clone this repository to your local machine.
2. Make a `composer i` to install all dependencies and init project.
3. Modify your database connection information. (`./.env -> DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME,
   DB_PASSWORD).
4. Launch the command to migrate the database ```php artisan migrate```.
5. Do a ```php artisan db:seed --class=ArticleSeeder``` to seed the database.
6. Start Laravel server with ```php artisan serve```.

## Authors ✨

[@Nikoolaii](https://github.com/Nikoolaii)

## License 📄

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
