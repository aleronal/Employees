Display a page where User can send Emails Data with inputs in vue.

Inputs like date, message and Title to be sent,

Create Database table saving that users "Email" called 'emailtoSend' ✅

Send data from form to database and to be saved and Controller ✅

Create Relationship with userid ✅

Create php artisan make:mail SendMail

Create UserSendEmailController with data from emailToSend Table
and
Mail::to($userToSend)->send(new SendEmail($order));

Create Task Scheduling to send emailController every Monday.





