## How to run this `Registration for Covid Vaccination` simple project
* Clone or Download the project.
* Create .env file & connect mysql database.
* .env file updates `QUEUE_CONNECTION=database`, `APP_TIMEZONE=Asia/Dhaka`,
* Email credentials for sending email add-in .env
  ` MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=emaildefaultemail@gmail.com
    MAIL_PASSWORD=xcwhzagiibbbhypu
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS="emaildefaultemail@gmail.com"
    MAIL_FROM_NAME="${APP_NAME}"`
* composer install
* npm install
* npm run dev
* php artisan key:generate
* php artisan queue:table 
* php artisan migrate --seed
* php artisan shedule:work
* php artisan queue:work
* php artisan serve

## Project Description 
This project is for covid vaccination registration form, anyone can register here but the phone number & email should be unique. After registration, we will distribute the vaccination date based on weekends (Sunday or Thursday). before the vaccine date at 9 pm we will send a notification over email to remind the user. after the vaccination date user can check their vaccine progress by their NID no. The vaccination status will be shown there. User can check any time their vaccination status by NID card no.

## SMS send for user notification along with email
We can also send SMS along with an email to remind users. We have to integrate third part API for sending sms like `reve or elitbuzz` etc. We need to define a service class for implement this API & other configurations. We can set our important credentials in the env or config file. after setup all the things just need to call the service class in the `ReminderForVaccination` file while i am sending an email.


