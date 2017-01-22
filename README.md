### Order Management App

NOTE: Requires [Composer](https://getcomposer.org/), uses [Lustre Framework](https://github.com/Sunnepah/lustre)

#### Set Up
$ `cd /path/order-management`

$ `composer install`

$ `Setup MySQL database 'orders_db' in your machine`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- mysql -u[your_mysql_user] -p < seed.sql

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Enter your MySQL password if prompt

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- This will create `orders_db` database, and db tables with sample `users` and `products` data.

$ `Change your database credentials in 'application/Config/DBConfig.php'`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- `'host'      => localhost`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- `'database'  => 'orders_db'`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- `'username'  => 'your_mysql_username'`

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- `'password'  => 'your_mysql_password'`

$ `php -S localhost:8080 -t web/`

$ Visit `http://localhost:8080` in your browser.

#### To run tests
$ `./vendor/bin/phpunit tests/units`

$ `./vendor/bin/phpunit tests/integrations`

