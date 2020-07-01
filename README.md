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

One such challenge was in setting up the priorities of tasks. My first idea was to include an ENUM variable on the Task table. However, upon further inspection of the assignment's rules I noticed the priorities had to be on a separate table. This led to the creation of the TaskPriority table which the Task table would reference through a foreign key.
