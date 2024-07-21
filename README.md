# COSC360 Assignment - Blog

Marc Betbeder - SID: 220263237
https://github.com/MarcBM/mbetbede_cosc360_blog

## Report

### Approach

Once it became clear to me that the assignment was as simple as following the lectures for the most part, I began coding along with Ibrahim as he was explaining the various features and syntax of Laravel.
I adjusted the code as I went to fit with my style, and refered to the Laravel documentation to fill any gaps that were left from the lectures, especially with regards to the creation of Factories, Seeders, and ensuring that the Update and Deletion functionality was working correctly. I found the Laravel documentation quite easy to read, though there were some strange omissions from it, particularly how to apply the fillable property to attributes, though this was covered by Ibrahim in a lecture.
Once I had written the Factory and Seeder for my Post Model, testing the application became much easier, and I was able to use large quantities of random data, as well as my own, to test the application.
I did not spend much time, if any, making sure that the website was visually appealing, but I intend to do some of this in future steps of the assignment.

### Challenges

My main challenge was achieving a functional edit feature for my posts. As I came to it, I used the Laravel documentation to implement a very simple update query on the Post object I was passed by my form. I copied the create view and placed in pre-filled data to build the edit view. The view worked well, and I was able to see my pre-filled data, though when I went to submit the form, I was first confronted with an error since I had used a 'POST' method for the form action. I reviewed which routes were available to me, and found that I needed to use a 'PUT' method, so I changed the form action to suit, and it seemed like the edit functionality was working as intended, but when I tried to actually change the data, I found that nothing was being edited. I spent quite a while trying to see if there was something wrong with my update query syntax, and I searched on forums and through the Laravel documentation to try and find any hint as to where I went wrong. Finally, I realised that it could in fact be my view causing the problem, as I was redirecting to the 'show' route at the end of my 'update' function. This meant that there was no difference to me as to whether I was actually posting my data, or was simply following the same URL with a GET request instead. After some quick testing I found that this was indeed the case, and my update method was never being run at all. I searched for another long while to see why this could be until I stumbled upon a forum post that explained my mistake. I was not aware that HTTP forms could not handle 'PUT' methods, and there was instead a blade workaround to do this instead. Once I placed that line in my form, and reapplied my initial update implementation, it worked immediately.
I don't really know what the take away is from this challenge. I perhaps should have debugged more of my update method to find out faster that it was my view causing the issue, but the fact that nothing errors at all when attemptint to use a 'PUT' method in a form is surprising to me.

### Bonus Features

I ran out of time to implement my intended bonus feature, which would have been a simple navigation bar to replace the basic "Back" button implemented by Ibrahim. As it stands, I did change that button to always point back to the index view, and placed it in the master layout, but that is not how I intended to leave the navigation bar.
I planned to attempt making a second container in the master layout and instering a navigation bar into each of the views that way.
The only thing I did implement that was slightly extra was making sure that the titles of each page were dynamic depending on which Post you were viewing or editing, though I do not think this deserves an extra mark.
