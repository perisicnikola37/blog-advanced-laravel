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
git clone https://github.com/dzonidevv/blog-advanced
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

## 🚀 Tech used

* PHP v.8
* Laravel v.9
* MySQL
* HTML v.5 / CSS v.3 / Tailwind v.3
* JavaScript 

## Laravel RESTful API for this project <img height="20" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png" />

Making a Request
----------------

All requests start with http://127.0.0.1:8000/api

## Available requests

`oauth`
- `POST /oauth/token` - Log In
- `GET /api/user` - Get Token

`posts`
- `GET /api/posts` - Get all posts. Pagination available. No authentication required.
- `GET /api/posts/show/{post}` - Get single post, no authentication required.
- `POST /api/posts/store` - Create a new post, authentication required.
- `PUT /api/posts/update/{post}` - Update only own post, authentication required.
- `DELETE /api/posts/delete/{post}` - Delete only own post, authentication required.

`quotes`
- `GET /api/quotes` - Get all quotes reviews, no authentication required.
- `GET /api/quotes/show/{quote}` - Get single quote, no authentication required.
- `POST /api/quotes/store` - Create a new quote, authentication required.
- `PUT /api/quotes/update/{quote}` - Update quote, authentication required.
- `DELETE /api/quote/delete/{quote}` - Delete a quote, no authentication required.

## Errors
The actions you can access in the API are dependent upon the permission levels assigned to your account. If you find yourself receiving "message": "Unauthenticated."" | Status: <i>401 Unauthorized</i>, please confirm your permission level.

If you find a typo or an error, please send a pull request. You can also submit an issue (which will require a GitHub account) and I will look into it.

If you have questions or trouble implementing the API, you can reach me at 5dzoni5@gmail.com and I will help you out. 

Status Code Explanations
-------

* 400: Bad Request – verify your URL address(route) is correct 
* 401: Invalid or unauthorized API user – verify your API user is valid and authorized to access the API. Contact me if you'd like assistance.
* 404: Model/Review not found - check if the requested product/review exists
* 5xx: Server error - please double-check your JSON payload for formatting errors, data integrity, etc.

Want to Chat?
-------------
Have you found a bug? Do you have an API feature request? [Submit an issue](https://github.com/dzonidevv/blog-advanced/issues) (requires a GitHub account)






