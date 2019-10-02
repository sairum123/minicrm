# minicrm
#### A test Project given by pnc ####

All the tasks i completed successfully
 
* Basic Laravel Auth: ability to log in as administrator<br />
* Use database seeds to create first user with email admin@admin.com and password “password”<br />
* CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.<br />
* Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website<br />
* Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone<br />
* Use database migrations to create those schemas above<br />
* Store companies logos in storage/app/public folder and make them accessible from public<br />
* Use basic Laravel resource controllers with default methods – index, create, store etc.<br />
* Use Laravel’s validation function, using Request classes<br />
* Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page<br />
* Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register company-crud<br />
* Email notification: send email whenever new company is entered (use Mailgun or Mailtrap)<br />
* Make the project multi-language (using resources/lang folder)<br />

# How to use

* Clone the repository with git clone<br />
* Copy .env.example file to .env and edit database/Stripe credentials there<br />
* Run composer install<br />
* Run php artisan key:generate<br />
* create database.sqlite in database directory<br />
* Run php artisan migrate --seed (this seed create new user email:admin@admin.com , pass:password)<br />
