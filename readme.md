Slam Quiz
=========

[![Deploy on Heroku](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

![Software interface](assets/screenshot_home.jpg)

Install
=======
Get files
---------
*For getting files :*

`git clone https://github.com/TotoLec/slamquiz.git`

`cd slamquizz`

`composer install`

**If you don't have composer you can download here : https://getcomposer.org/download/**

Configuration
-------------

**Database configuration :**

Locate the file : .env

> Find : DATABASE_URL=
>
> Put : DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name

Copy the .env file, paste it and rename .env.local

> Find : DATABASE_URL=
>
> Put : DATABASE_URL=mysql://**db_user**:**db_password**@127.0.0.1:3306/**db_name**
>
> **db_user :** Set the user who have access to the database
>
> **db_password :** Set the password of the user who have access to the database
>
> **db_name :** Set the database name


**Accounts configuration :**

Locate the file : src/Controller/DataFixtures/UserFixtures.php

Change as you want there accounts

Run
---
*When you got the files, you have to run the server by the command :*

`php bin/console server:run`

Index pages
============
*The index page of the software is:* [localhost:8000](http://localhost:8000)

Accounts
========
*In this project you have already accounds with permissions, there are these accounts with an explication of the privileges*
> Accounts :
> 
>>   - User : He just have permission to see all mCQ and nothing else
>>   - Password : Admin!
>   
>>   - Admin : He can View, Edit and Create a new mCQ
>>   - Password : Admin!
>
>>   - Superadmin : He can View, Edit, Create and Delete an MCQ
>>   - Password : Admin!
>
>   - (Password is the same for everyone because it's for make the test more easy)