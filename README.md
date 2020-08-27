# collective_thoughts
- The website is developed to maintain the various thoughts and quotes which are said by the ancestors.
- After the successful Registration and Login, the user will be able to maintain the records of the thoughts or inspirational quotes. 
- To share the thoughts with other users, the registred user will also get the unique URL of the page which will display all the thoughts. 

## Project setup steps for Windows
1) Composer install
2) npm install
3) npm run dev
4) copy .env.example .env
5) php artisan key:generate
6) Update database and email related details in .env file 
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
7) php artisan migrate
8) php artisan db:seed --class=ThoughtsData

