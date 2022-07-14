**Kortobaa Task**
****
<h4>MultiTenancy Products Task</h3>
 ****
Installation guide:
<br>
* install docker and docker compose
<br>
Then
<br>
Run the following commands

* git clone https://github.com/amigogobara/kortobaa-task.git
* composer install
* php artisan sail:install
* stop apache and mysql on your machine first
* ./vendor/bin/sail up -d
* ./vendor/bin/sail artisan migrate --seed

Then
<br>
open Postman from the following link to show endpoints of project:
https://documenter.getpostman.com/view/3446458/UzQuPR5V

****
<u>Packages Used</u>
* tymonJWT: https://github.com/tymondesigns/jwt-auth
* laravel sail for docker machine: https://github.com/laravel/sail
