After cloning, please follow these following steps in order to run the application
- change .env.example to .env
- config database entities within the file
Run
- composer update --no-scripts
- php artisan key:generate
- php artisan migrate:fresh (if first time)
To run the app
 php artisan serve and locate to http://127.0.0.1:8000/
