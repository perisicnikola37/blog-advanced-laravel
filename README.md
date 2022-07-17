# Blog Project | Laravel 9  <img height="25" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" />

>This blog project has a homepage, dashboard, blog posts, quotes, and also liking/unliking for posts with getting mail for notification. Also, the user will only get one mail for each like. Spamming is solved. Also, this project is included a custom login/register system. More information is below...

![schooldash-dahboard-page](https://i.postimg.cc/pdzqSMmf/logged-in.png)
![schooldash-dahboard-page](https://i.postimg.cc/2SqH4ZmX/posts.png)
![schooldash-dahboard-page](https://i.postimg.cc/nh63ThhV/profile.png)
![schooldash-dahboard-page](https://i.postimg.cc/gktSXD9Z/mail.png)

## Requirements 
* PHP 8.0 and above
* Composer 
* Since this project is running Laravel 9, I suggest checking out the official requirements

## Installation
* Clone the repository by running the following command in your command line below (Or you can download the zip file from GitHub)
```shell
git clone https://github.com/dzonidevv/cortex.git
 ```
* Head to the projects directory
```shell
cd blog-advanced-master
 ```
* Install/Update Composer dependencies
```shell
composer install 
```

* Copy .env.example file into .env file and configure based on your environment
```shell
cp .env.example .env
```
* Generate an encryption key
```shell
php artisan key:generate
```
* Migrate the database
```shell
php artisan migrate 
```
* Seed database 

    - Use the following command
    
        ```shell
        php artisan db:seed
        ```
        
* For development or testing purposes, you can use the Laravel built-in server by running 
```shell
php artisan serve
```

After running the above commands, you should be able to access the application at http::/localhost or your designated domain name depending on the configuration.

## Setup
* Log in to the application with the following credentials
    * Email: test@gmail.com
    * Password: password
    

* There are two roles: 
- `administrator` and `subscriber`






