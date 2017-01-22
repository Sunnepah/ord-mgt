#### Disclamer

** In carrying out this task, I'm using a mini PHP framework I created (for learning purpose). It can be found [Lustre Framework](https://github.com/Sunnepah/lustre).

# The project files structure

* /application
    *   /Config - It contains application configurations

    *   /Controllers

        * OrdersController.php - processes requests and returns responses.

    *   /Libraries (holds business logic)

        * /Database - The classes defined here extends the PDO object of the underlying framework for database interactions.

            * OrdersDAO.php

            * ProductsDAO.php

            * UsersDAO.php

        * /Utils

            * ConsoleLogger.php - A wrapper for monolog for logging

            * OrderUtils.php

        * Helper.php

    *   /Models (hold data objects & interact with storage where objects are stored)

        * Model.php - Base model class

        * Orders.php

        * Products.php

        * Users.php

    *   /Repositories

        * OrderRepositories - handles basic CRUD operations.

        * Repository Interface - defines contract to be implemented.

    *   routes.php (Defines routes to application resources).

* /tests

* /vendor (created after running `composer install` - contains dependencies)

* /web (App public folder)

    * /app (This is the angularjs app)

        * orderApp.js

    * /assets (hold css, js, template files)

    * /views (Contains app views)

        * /partials

            * _edit_form.html (form to update an order)

            * _header.html (view header)

            * _new_form.html (form to create new order)

            * _order_listing.html (table listing created orders)

            * _sidebar.html (side bar)

        * index.html

    * .htaccess

    * index.php - The entry point to the application
    
* composer.json - App dependencies are defined here.

* composer.lock

* Design Note.md - This file

* README.md - Contains App Setup Instructions

* seed.sql (SQL script to bootstrap the application database)


#### Improvements

* Write more tests

* More data validations

* Add pagination for orders listing to avoid listing like 1 thousand records

* Some security improvements

    * Prevent cross-site scripting

    * Prevent CSRF attack

    * Prevent SQL injection