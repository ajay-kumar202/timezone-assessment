running this command, you create a new .env file or overwrite an existing one with the contents of .env.example. This allows you to set up your environment-specific configurations, such as database credentials and API keys, without modifying the example file directly.
cp .env.example .env

Install Composer:

Install Composer on your server, as it's used for managing Laravel dependencies.
Run composer install in your project's root directory on the server to install PHP dependencies.
Generate Key and Optimize:

Generate a new application key by running php artisan key:generate on the server.
Optimize your Laravel application for production with php artisan optimize.

Replace this  
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
