# COSC360 Assignment - Blog

Marc Betbeder - SID: 220263237\
https://github.com/MarcBM/mbetbede_cosc360_blog

## Run Instructions

-   Ensure that Laragon is up to date and running Apache
-   Ensure that the local .env file is pointing to an appropriate database
-   Ensure you are in the root directory of this project, where this README.md is located.
-   run `npm install` to ensure package dependencies are present and up to date
-   run `php artisan migrate --seed` to setup and seed the database with dummy data
-   run `npm run dev` to start the server
-   visit `localhost:8000/home` or replace 8000 with whichever port the website is running on to see the home page.

I am currently unsure as to whether or not the authorisation api key will work, which may result in incorrect returns for both the posts and post details pages.

## Report

### Approach

This part of the assignment was by far the shortest and simplest (purely referring to the backend portion), as I had already implemented api route handling in the last section, and had already used Postman to test routes.\
This time, I simply added the two routes that needed to be used, created a new controller for them, and implemented their functions, which were themselves very simple. I added a sort to the posts view to make sure the most recent posts were displayed first.\
I then created the Postman collection to test the api, ensuring that getting both a specific post and all posts worked, but only while authenticated (using a bearer token), and only with a valid URL.\
I briefly looked into stateful API, but could not understand how the Laravel Documentation wanted me to implement it.

### Challenges

The only real challenge I faced in this section was trying to find a way to authenticate the API calls without hard-coding an API key into the call. I could not find a good solution for this, and the current implementation I have seems fairly insecure, so I am slightly unsatisfied with this.
