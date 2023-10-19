<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



# SchoolPortal API DOC  
***
###  This comprehensive guide will walk you through the various endpoints, functionalities, and how to integrate and utilize this API, feel free to use or contribute to this project. 🚀


## Admin Endpoint  

#### The admin can only login with the details below, admin can perform several operations such as:

- create teacher and assign them to a class
- creatd and delete grade
- get all student information including result
- get all teachers information

> URL - http://127.0.0.1:8080/api/admin/login

>Method: POST

### login has admin
```
{
    "username": "Admin",
    "email": "admin1010",
}

```

###  create teacher and assign them to class

> URL - http://127.0.0.1:8000/api/admin/teacher/{class_id}

```
{
    "first_name": "Admin", | string
    "last_name": "admin1010", | string
    "email": "admin1010", | string
    "password": "admin1010", | string, not less than 8 characters
    "password_confirmation": "admin1010",
}

```

###  get all teachers 

> URL - http://127.0.0.1:8080/api/admin/teachers

```
{
    "first_name": "Admin", | string
    "last_name": "admin1010", | string
    "email": "admin1010", | string
    "password": "admin1010", | string, not less than 8 characters
    "password_confirmation": "admin1010",
}

```
