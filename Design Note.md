# The project files structure

* /application
    *   |--- /Config

    *   |--- /Controllers (handle requests and return responses)

    *   |--- /Libraries (holds business logic)

    *   |--- /Models (hold data objects & interact with storage where objects are stored)

    *   |--- /Repositories

    *   |--- /TemplateEngine

    *   |--- routes.php (Defines routes to application resources)

* /assets (hold application views & assets)

* /tests

* /vendor (created by composer)

* /web (The entry point to the application)

    &nbsp;&nbsp;&nbsp;&nbsp;|--- .htaccess

    &nbsp;&nbsp;&nbsp;&nbsp;|--- index.php
    
* composer.json

* composer.lock

* README.md

* seed.sql (SQL script to bootstrap the application database)