# COSC360 Assignment - Blog

Marc Betbeder - SID: 220263237
https://github.com/MarcBM/mbetbede_cosc360_blog

## Report

### Approach

I began similarly to the last assignment, by following the lectures as Ibrahim explained the further features of Laravel and how we could use them. It was especially helpful seeing him import the bootstrap example.\
As the assignment progressed, it was obvious that there was more work to be done on my own this time, which I enjoyed, as it was easy then to grow into the challenge and design according to the spec, instead of simply following the code in the lectures.\
I used the Laravel documentation to help me with areas I was finding difficult, which included the custom admin middleware, user roles, and blade syntax. None of these issues were particularly challenging, but Laravel has particular syntax that makes solving these problems much easier, so I found it beneficial to find the answers before trying it for myself.\
Beyond importing and ensuring everything conformed to the Bootstrap dashboard example, I did not spend much time beautifying the website, as it already looked quite visually appealing and professional. I did enjoy designing each page, but front-end UI development is not something I particularly enjoy, so I didn't spend too much time there.

### Challenges

My two main challenges were regarding retrieving specific items from the database, and adhering to roles on users.\
With regards to retrieving items from the database, I initially tried implementing such functions as deleting, updating, and editing the same way as last assignment, but for some reason they were not allowing me to simple use the model class. Instead I had to find the object using the id, which did work, though I still do not understand why my first attempt did not work.\
With regards to user roles, I spent a long time searching and attempting to implement various solutions from Laravel's documentation or other internet sources, attempting to find some Laravel-specific solution to user roles. I believe this is possible, but in the end I decided to simply add an attribute to the User model and retrieve it when I want to check what role someone has. This is not very robust, but it does work.

### Bonus Features

I implemented quite a few extra features beyond what the assignment spec requires.\
Firstly, I implemented a nicer landing screen for non-logged-in users. If you are not logged in, you see a list of all blog posts, though you cannot click on them to read them, and there is a prompt saying you must log in to do so.\
In a similar vein, I also made the user roles very robust in what they had access to. A basic User can read posts, but cannot create them or delete them, and they do not see a link to find their own posts. Authors do have this link, and they can create new posts, as well as editing or deleting their own. Admins can edit or delete any post, as well as functioning as an author.\
I also wrote a fairly simple "My Profile" page, allowing logged in users to see their recorded name, email address, and role. Any user can edit their own profile, aside from their role, and there is even a separate page to change your password, with proper navigation and handling. Admins can see a list of all users, as stated by the assignment spec, and they can edit everything about a user besides their password. An admin also cannot edit their own role, another admin must do that for them.\
Finally, I used dynamic views all throughout the web app, displaying content and links to the user depending on their role. This is how the nav-bar works, with different roles seeing different buttons, allowing me to have a clean design in one format for all roles.
