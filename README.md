# In Time Tec Take Home Assignment

## Migrating to Laravel 5.7
* Got the initial code base up and running, and clicked around for a while to see how everything was supposed to work.
* Familiarized myself with Laravel 5.7
* Identified necessary files
    * Models were prefixed with CM
    * Controllers were prefixed with CC
    * Views were .tpl.php files usually found alongside their controllers
* I then brought over necessary views and modified them to fit with Laravel's blade syntax.
    * app.blade.php in /resources/views/layouts is the main wrapper for all other content.
    * I brought over the css from the old codebase and ran it through the compiler using *npm run dev* to check for any errors (there was one unused missing image found).  I left the css mostly unchanged except for some added functionality for displaying messages.  If I were to continue this project I would break down the css further to be more managable.
* Next was setting up routes in web.php
* For user management I chose to use Laravel's built in Auth functionality as it already had all of the functionality from the old codebase (plus it doesn't store everything need to decrypt a password alongside the password like the old one does).
* I then brought over and modified controller logic to use Eloquent.
    * This meant very little needed to be done with models.  The only work I did in the models was to establish the relationship between users and contents (User has many contents, content belongs to one user).
* I did change acronym to username and idUser to user_id in order to better work with Laravel's built-in functionality.  In a real world environment this is something I would discuss with the client, and if they wanted it to remain the same I would work around it.
* I brought some of the functionality from the old functions.php file into a helper file which is autoloaded by composer (used in views mostly).
* To add a little polish, I made some items only show up if the user is logged in such as the content page, and the edit buttons on blog posts.

## Next Steps
If I were to continue this project, I would start by implementing something like bootstrap for the css and organization, as the original code base uses a lot of inline styles and could be a bit more organized.  

From there I would like to bring some in some javascript, as there is currently none.  I would like to get some asynchronous calls rather than redirecting or reloading for everything, as well as build out a nicer messaging system for error handling.  This would also allow for nice modals for confirming deletes and saves, etc. 


## Installation

First ensure the environment you are working in has all of the requirements found [here](https://laravel.com/docs/5.7/installation#server-requirements).  Alternatively using Laravel Homestead will ensure your environment is ready to go for Laravel 5.7.  

Once the requirements are met and you have cloned the project, create your MySQL database and update the required information in the .env file. 

Finally, run the following commands in the root directory of your project:
* composer install
* php artisan migrate
* php artisan db:seed

The site should now be up and running!  If all went according to plan a test username is "itt" with the password of "ittrocks" (you can also login with info@intimetec.com in place of the username).