# _Hair-etics_

#### _A hair salon php app, February 24, 2017_

#### By _**Keith Evans**_

## Description

_This is a management app for the hair salon Hair-etics. Users can browse available stylists and their clients and add/remove/edit stylists or clients from the database._

## Setup/Installation Requirements

* _Clone GitHub repository to the desktop_
* _Run `composer install` to install all dependencies_
* _Unzip .sql databse files and import them into your local database management software_
* _Ensure that database paths in app/app.php and tests files match your local database server_
* _Initiate a php server and navigate to it in a browser_

_In the case of any issues importing the databses, SQL commands are included below to construct the databases required._

## Database Construction SQL

CREATE DATABASE hair_salon;
USE hair_salon;
CREATE TABLE stylists (id serial PRIMARY KEY, name VARCHAR (255), bio TEXT);
CREATE TABLE clients (id serial PRIMARY KEY, name VARCHAR (255), stylist_id INT);
CREATE DATABASE hair_salon_test;
USE hair_salon_test;
CREATE TABLE stylists (id serial PRIMARY KEY, name VARCHAR (255), bio TEXT);
CREATE TABLE clients (id serial PRIMARY KEY, name VARCHAR (255), stylist_id INT);

## Known Bugs

_There are currently no known bugs._

## Support and contact details

_Any questions, comments, or bug reports can be directed to the repository administrator._

## Technologies Used

_This app is built in PHP on the Silex framework. It uses Twig for templating and MySQL for database interface._

### License

*This application is under the MIT license.*

Copyright (c) 2017 **_Keith Evans_**
