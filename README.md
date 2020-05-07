For new comers:
- The system used laravel as the deevelopment tool
- Please make sure that composer is installed in your device. Please refer to https://getcomposer.org/ for more information
- After composer, please make sure that laravel have been installed into the device via the command `composer global require laravel/installer` 
- For more information, visit https://laravel.com/docs/7.x/installation

After cloning, please follow these following steps in order to run the application
- change .env.example to .env
- config database entities within the file
```DB_CONNECTION=[typeofdatabase](MySQL, Microsoft SQL)
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=[nameofdatabase]
DB_USERNAME=[username]
DB_PASSWORD=[password]
```
(In case of using sqlite)
`DB_CONNECTION=sqlite`
and then create a file `datebase.sqlite` inside `database` folder

- For mailing, please config the four row in the .env as below (google gmail)
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=[your google mail account]
MAIL_PASSWORD=[your google mail password]
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=[your google mail account]
MAIL_FROM_NAME="${APP_NAME}"
```
or if you use mailtrap
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=[username]
MAIL_PASSWORD=[password]
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=[email addrest]
MAIL_FROM_NAME="${APP_NAME}"
```
Run these command if this is your first time before run the website
- composer update --no-scripts
- php artisan key:generate
- php artisan migrate:fresh (if first time)
To run the website
 php artisan serve and locate to http://127.0.0.1:8000/
