# LaravelToDoList

A basic todo list built with PHP (Laravel Framework)

## Installations Instructions

To begin, clone this repository onto your system.

### Mac

First, install the necessary dependencies using brew

* PHP: `brew install php`

* Node: `brew install node`

* Composer: see <https://getcomposer.org/download/> for instructions

* MySQL: `brew install mysql`

* Laravel: `composer global require laravel/installer`

With these installed, navigate to the project's root folder and run `composer install` to install the PHP dependencies.
Next, open up the `.env` file (dupplicate the `.env.example` file and remove the .example extension) and replace your DB_DATABASE and DB_PASSWORD to the correct value to connect to your MySQL database.

Before running the application we need to setup the database.
Run `php artisan migrate:fresh` followed by `php artisan db:seed` as seen below:

![Database Setup](https://media.giphy.com/media/Zb0rtZIUrxWgW6tab2/giphy.gif)

If one of these commands fails, try running `composer dump-autoload` and then rerun the command. 

To run the Laravel application locally, run `php artisan serve` and click on the provided link to view the app in your browser.

![Launch App](https://media.giphy.com/media/LPNVnzghjHNVlzf4sd/giphy.gif)

<!-- ### Windows -->

## Challenges Faced

Throughout this rapid development I faced a few challenges.

One such challenge was in setting up the priorities of tasks. My first idea was to include an ENUM variable on the Task table. However, upon further inspection of the assignment's rules I noticed the priorities had to be on a separate table. This led to the creation of the Priority table and a priority_task pivot table.

During this setup, I discovered the importance of a proper migration pipeline. In order to ensure that all tables would be generated before any relationships were made between tables, I setup an add foreign keys migration to run at the end of all other migrations. This way, all of the tables are created before they are referenced.
