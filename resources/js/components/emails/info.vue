Display a page where User can send Emails Data with inputs in vue.

Inputs like date, message and Title to be sent,

Create Database table saving that users "Email" called 'emailtoSend' ✅

Send data from form to database and to be saved and Controller ✅

Create Relationship with userid ✅

Create php artisan make:mail SendMail

Create UserSendEmailController with data from emailToSend Table
and
Mail::to($userToSend)->send(new SendEmail($order));

Create Task Scheduling to send emailController every Monday. ✅ 

TASK COMPLETED ✅----------------------------


Create link in user management permision for twitter,

create blade where we will display all tweets and create another link to be able to post tweets.

create Model and controller 

composer require guzzle.

in controller create function that will fetch through guzzle twitter api and return view blade 

show values for tweets fetch from api.












