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


>Note: All `public` endpoints  can be accessed without providing an access token [bearer] while `auth` endpoints requires the right access token [bearer].


## Admin Endpoint  

#### The admin can only login with the details below, admin can perform several operations such as:

- create teacher and assign them to a class
- creatd and delete grade
- get all student information including result
- get all teachers information


> URL -`[public]` http://127.0.0.1:8080/api/admin/login

>Method: POST

### login has admin
```
{
    "username": "Admin",
    "email": "admin1010",
}

```


### The below endpoints are auth and they are to be accessed by an authenticated user providing the admin bearer token.
***

###  create teacher and assign them to class

> URL - '[auth]` http://127.0.0.1:8000/api/admin/teacher/{class_id}

>Method: POST

{class_id} - This should be from the grade id of the available classes, therefore the teacher is assigned to that specific class.

```
{
    "first_name": "john", | string
    "last_name": "Doe", | string
    "email": "johndoe@gmail.com", | string | email
    "password": "doe12345678", | string, not less than 8 characters
    "password_confirmation": "doe12345678",
}

```

###  get all teachers 

> URL - http://127.0.0.1:8080/api/admin/teachers

>Method: GET

```
{
    "message": "Request was successfull",
    "data": [
        {
            "id": "1",
            "details": {
                "first_name": "Teacher1",
                "last_name": "beuour",
                "email": "teach@gmail.com",
                "class_to_teach": "grade 1"
            }
        },
        {
            "id": "2",
            "details": {
                "first_name": "Teacher2",
                "last_name": "honour",
                "email": "teach2@gmail.com",
                "class_to_teach": "grade 2"
            }
        },
        {
            "id": "3",
            "details": {
                "first_name": "Teacher3",
                "last_name": "denieala",
                "email": "teach3@gmail.com",
                "class_to_teach": "grade 3"
            }
        }
    ]
}
```

###  get a single teachers 

> URL - http://127.0.0.1:8080/api/admin/teachers/{id}

>Method: GET

{id} - teacher's id

```
{
    "message": "Request was successfull",
    "data": [
        {
            "id": "1",
            "details": {
                "first_name": "Teacher1",
                "last_name": "beuour",
                "email": "teach@gmail.com",
                "class_to_teach": "grade 1"
            }
        }
    ]
}
```

###  create grade/class 

> URL - http://127.0.0.1:8080/api/admin/grade

>Method: POST

```
{
    "grade": "grade 1" | string
}

```
###  delete grade/class 

> URL - http://127.0.0.1:8080/api/admin/grade{id}

>Method: DELETE

{id} - the id of the grade to delete

```
    it will return 204 No Content  
```

###  get all students 

> URL - http://127.0.0.1:8080/api/admin/students

>Method: GET

```
{
    "message": "Request was successfull",
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 3,
                "profile_image": null,
                "created_at": "2023-09-23T18:08:42.000000Z",
                "updated_at": "2023-09-23T18:08:42.000000Z"
            },
            {
                "id": 2,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student2@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 3,
                "profile_image": null,
                "created_at": "2023-09-23T18:09:10.000000Z",
                "updated_at": "2023-09-23T18:09:10.000000Z"
            },
            {
                "id": 3,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student3@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 5,
                "profile_image": null,
                "created_at": "2023-09-23T18:13:55.000000Z",
                "updated_at": "2023-09-23T18:13:55.000000Z"
            },
            {
                "id": 4,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student4@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 5,
                "profile_image": null,
                "created_at": "2023-09-24T16:18:09.000000Z",
                "updated_at": "2023-09-24T16:18:09.000000Z"
            },
            {
                "id": 5,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student5@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 5,
                "profile_image": null,
                "created_at": "2023-09-24T16:20:10.000000Z",
                "updated_at": "2023-09-24T16:20:10.000000Z"
            },
            {
                "id": 6,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student6@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 5,
                "profile_image": null,
                "created_at": "2023-09-24T16:20:27.000000Z",
                "updated_at": "2023-09-24T16:20:27.000000Z"
            },
            {
                "id": 7,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student7@gmail.co",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 5,
                "profile_image": null,
                "created_at": "2023-09-24T16:24:05.000000Z",
                "updated_at": "2023-09-24T16:24:05.000000Z"
            },
            {
                "id": 8,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student8@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 5,
                "profile_image": null,
                "created_at": "2023-09-24T16:32:24.000000Z",
                "updated_at": "2023-09-24T16:32:24.000000Z"
            },
            {
                "id": 9,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student9@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 5,
                "profile_image": null,
                "created_at": "2023-09-24T16:32:42.000000Z",
                "updated_at": "2023-09-24T16:32:42.000000Z"
            },
            {
                "id": 10,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student10@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 5,
                "profile_image": null,
                "created_at": "2023-09-24T16:33:01.000000Z",
                "updated_at": "2023-09-24T16:33:01.000000Z"
            },
            {
                "id": 11,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student11@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 5,
                "profile_image": null,
                "created_at": "2023-09-24T16:35:38.000000Z",
                "updated_at": "2023-09-24T16:35:38.000000Z"
            },
            {
                "id": 12,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student12@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 5,
                "profile_image": null,
                "created_at": "2023-09-24T16:45:32.000000Z",
                "updated_at": "2023-09-24T16:45:32.000000Z"
            },
            {
                "id": 13,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student13@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 5,
                "profile_image": null,
                "created_at": "2023-09-24T16:45:50.000000Z",
                "updated_at": "2023-09-24T16:45:50.000000Z"
            },
            {
                "id": 14,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student14@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 5,
                "profile_image": null,
                "created_at": "2023-09-24T16:47:06.000000Z",
                "updated_at": "2023-09-24T16:47:06.000000Z"
            },
            {
                "id": 15,
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student15@gmail.com",
                "address": "ibadan, Nigeria",
                "gender": "male",
                "student_class_id": 5,
                "profile_image": null,
                "created_at": "2023-09-24T18:59:01.000000Z",
                "updated_at": "2023-09-24T18:59:01.000000Z"
            }
        ],
        "first_page_url": "http://127.0.0.1:8080/api/admin/students?page=1",
        "from": 1,
        "last_page": 3,
        "last_page_url": "http://127.0.0.1:8080/api/admin/students?page=3",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8080/api/admin/students?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8080/api/admin/students?page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8080/api/admin/students?page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8080/api/admin/students?page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": "http://127.0.0.1:8080/api/admin/students?page=2",
        "path": "http://127.0.0.1:8080/api/admin/students",
        "per_page": 15,
        "prev_page_url": null,
        "to": 15,
        "total": 31
    }
}
```

###  get a single student 

> URL - http://127.0.0.1:8080/api/admin/students/{id}

>Method: GET

{id} - student's id

```
{
    "message": "  Request was successfull",
    "data": {
        "id": "1",
        "details": {
            "first_name": "bbb",
            "last_name": "aaaaa",
            "email": "student@gmail.com",
            "address": "ibadan, Nigeria",
            "class": "grade 1",
            "gender": "male"
        }
    }
}
```
