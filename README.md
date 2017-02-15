**#Requirement:**
* PHP >= 5.6.4
* mysql
* apache/nginx
* composer
* git

**# Installation:**

* Clone this repo
* run - composer install
* change permission to 755 to storage folder
* configure database and its credentials either in .env or config/database.php
* run - php artisan migrate( To create tables )
* run - php artisan db:seed( To insert sample data ) 
* run - php artisan serve ( to start server )

**# Credentials:**
http://127.0.0.1:8000/admin/
username - admin@gmail.com
password - password
