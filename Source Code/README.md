<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://res.cloudinary.com/dcptkluic/image/upload/v1619727879/TADREEB/logo_qa70zq.png" width="400"></a></p>

<h2 align="center">
 Qorrah For specialized training
</h2>

## About Qorrah

Qorrah is a website that serves as a platform dedicated to provide a
link between students who are looking for specialized training in their
field of expertise or their studies with companies and institutions that
have training vacancies

The website will be the first reference for anyone who is about to
graduate from the university, because Qorrah contains all the university
training that is compatible with the conditions of university training in
each major and students can apply for them on the website.

Also, any person who wants a Specialized training in his major.
Because it contains all training from institutions that have vacancies as
full-time, part-time, paid or not-paid training, where the job description
and the required qualifications are displayed in each vacancy and
whoever sees himself suitable for it can submit an application directly on
the site.


###  Start 

#### Install dependencies

```bash
# clone the repo
$ git clone https://github.com/mhmdbdour/masterpiece-mohammad_bdour.git Qorrah

# go into app's directory
$ cd Qorrah/Source%20Code

# install app's dependencies
$ composer install

# install app's dependencies
$ npm i
```

#### Setup MySQL DataBase

1. Install MySQL
2. Create database (this way or another)
``` bash
$ mysql -uroot -p
mysql> create database laravel;
```
Create a user with privileges to the laravel database (root user may not work while it requires a sudo)

3. Update .env file
Copy file ".env.example", and change its name to ".env".
Then in file ".env" complete database configuration:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=qorrah
DB_USERNAME=root
DB_PASSWORD=
```

### Next step

``` bash
# in your app directory
# generate laravel APP_KEY
$ php artisan key:generate

# run database migration 
$ php artisan migrate:refresh 

```

## Usage

``` bash
# start local server
$ php artisan serve

```

Open your browser with address: [localhost:8000](localhost:8000)  