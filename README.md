## About HomepadTest
It is a REST API I have prepared to show my skills using the framework Laravel 7.19.0 and PHP7.4.

## It is recommended you use the VM Homestead to develop your project with Laravel
1. Install Vagrant on your computer
2. Install Virtualbox on your computer
3. Clone the Homestead repository : git clone https://github.com/laravel/homestead.git ~/Homestead
4. Go inside the repository you have cloned (cd ~/Homestead) and launch "bash init.sh" to create the Homestead.yaml
5. Create a repository where you will store the application
6. Fill the Homestead.yaml file to configure your vagrant VM
7. Generate the SSH key by launching the command "ssh-keygen -t rsa" and fill the information
8. Go to the clone repository and launch to command : vagrant up

The necessary box will be downloaded and your VM vagrant will be set on.

* To acces the VM via SSH use the command vagrant ssh
* To stop the VM use the command vagrant halt
* To reload the VM use the command vagrant reload --provision

## Project installation
1. Clone this repository
2. rename the .env.example file et replace it by .env
3. fill the following variables in the .env file :
* DB_CONNECTION
* DB_HOST
* DB_PORT
* DB_DATABASE
* DB_USERNAME
* DB_PASSWORD
For the next step you will go to the project folder and launchou the following commands :
4. composer install to install all the necessary dependencies
5. php artisan migrate:fresh --seed to create all the necessary tables with their relations(primary and foreign keys). The packages table will be filled automatically thanks to the seeder.
6. php artisan key:generate to generate the secret key for your application
7. php artisan passport:install to generate the client ids and tokens for the Oauth authentications. Once this command executed to series of {client_id and token} will be shown on the terminal. The first one is for the Laravel Personal Access Client and the second is for the Laravel Password Grant Client. Take the Laravel Personal Access Client credentials to fill the variable PASSPORT_PERSONAL_ACCESS_CLIENT_ID and PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET in the .env file.

Everything is now set to run the API :
* You can testthe good functionning of the API by launching the command phpunit
* The API documentation is available at the base of the API (URL : "/")
