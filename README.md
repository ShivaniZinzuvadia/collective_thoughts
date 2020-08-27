# collective_thoughts
Website developed to keep all thoughts and quotes noted, which are said by the ancestors

## Project steup steps for Windows
1) Composer install
2) npm install
3) copy .env.example .env
4) php artisan key:generate
5) Update database and email related details in .env file 
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=null
    MAIL_FROM_NAME="${APP_NAME}"
6) php artisan migrate
7) php artisan db:seed --class=ThoughtsData

