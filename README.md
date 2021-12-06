# User_Authentication_App
## Purpose
The purpose of this application is to act as a library content management system. Included herein is CRUD for the database using a PDO connection, a random quote generator when you log on. It also includes a fully fledged login system that differentiates between members and librarians. Only librarians can make use of CRUD and see authors. Members can only see and search for books. 

## Components
I made use of a split between includes and classes for this application. The class system makes use of the protected class and extend, which is something I have not tried succesfully before this.

The login also makes use of hased passwords. The system just checks to see if the hashes match so that no-one can steal passwords. The recover password page also has built in security so that users can't bypass the system. There is a table log to see who has logged in and out of the system and the times that they have done so. 

Librarian accounts can only be created if the librarian passcode is known, otherwise users can only sign up for a member account. 

All in all Librarians can make use of crud to interact with the database, both users can view the database and sort it. I have also made extensive use of CSS. The pages are also protected unless a user is logged into the correct account. 
