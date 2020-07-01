# LaravelToDoList

A basic todo list built with PHP (Laravel Framework) and Vue.JS

## Installations Instructions

To begin, clone this repository onto your system.

### Mac

On a Mac, ensure php is installed: `brew install php`

To run the Laravel application locally, run `php artisan serve` and click on the provided link to view the app.

### Windows

## Challenges Faced

Throughout this rapid development I faced several challenges.

One such challenge was in setting up the priorities of tasks. My first idea was to include an ENUM variable on the Task table. However, upon further inspection of the assignment's rules I noticed the priorities had to be on a separate table. This led to the creation of the Priority table and a priority_task pivot table.

During this setup, I discovered the importance of a proper migration pipeline. In order to ensure that all tables would be generated before any relationships were made between tables, I setup an add foreign keys migration to run at the end of all other migrations. This way, all of the tables are created before they are referenced.
