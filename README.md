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

CREATE DATABASE hair_salon_test;
USE hair_salon_test;
CREATE TABLE stylists (id serial PRIMARY KEY, name VARCHAR (255), bio TEXT);
CREATE TABLE clients (id serial PRIMARY KEY, name VARCHAR (255), stylist_id INT);
CREATE DATABASE hair_salon;
USE hair_salon;
CREATE TABLE stylists (id serial PRIMARY KEY, name VARCHAR (255), bio TEXT);
CREATE TABLE clients (id serial PRIMARY KEY, name VARCHAR (255), stylist_id INT);
INSERT INTO stylists (name, bio) VALUES ('Tatsuya Uchihara', 'Straight from Blast Salon in Tokyo, the newest Hair-etic Tatsuya \'Uchi\' Uchihara brings a unique flair and dazzling smile to Portland\'s most radical salon.');
INSERT INTO stylists (name, bio) VALUES ('Hackjob Harrison', 'One of the founders of the Hair-etics, Hackjob has pioneered a rough-cut psycho-chic esthetic which is taking Portland by storm. Inspired by the ingenuity and unbridled creativity of kindergarteners with scissors, Hackjob originals are the hottest new trend.');
INSERT INTO stylists (name, bio) VALUES ('Herr Hair', 'WUNDERBAR! Herr Hair got his start hacking dos on the mean streets of Berlin in the early 90s. Since then, he has become known for his dangerous styles, combining traditional punk cuts with actual weaponry to fulfill the dreams of even the most hardcore metalheads.');
INSERT INTO clients (name, stylist_id) VALUES ('Minori Nakada', 1);
INSERT INTO clients (name, stylist_id) VALUES ('Makoto Hasegawa', 1);
INSERT INTO clients (name, stylist_id) VALUES ('Mizuki Shida', 1);
INSERT INTO clients (name, stylist_id) VALUES ('Danny Goodblatt', 2);
INSERT INTO clients (name, stylist_id) VALUES ('Britney Spears', 2);
INSERT INTO clients (name, stylist_id) VALUES ('Gary Busey', 2);
INSERT INTO clients (name, stylist_id) VALUES ('Slasher Dave', 3);
INSERT INTO clients (name, stylist_id) VALUES ('Death Pile', 3);
INSERT INTO clients (name, stylist_id) VALUES ('Gladys Stephenson', 3);

## Known Bugs

_There are currently no known bugs._

## Support and contact details

_Any questions, comments, or bug reports can be directed to the repository administrator._

## Technologies Used

_This app is built in PHP on the Silex framework. It uses Twig for templating and MySQL for database interface._

### License

*This application is under the MIT license.*

Copyright (c) 2017 **_Keith Evans_**
