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

### login as admin
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

###  get all grades/classes

> URL - http://127.0.0.1:8080/api/admin/grades

>Method: GET

````
{
    "data": [
        {
            "id": 1,
            "grade": "grade 1"
        },
        {
            "id": 2,
            "grade": "grade 2"
        },
        {
            "id": 3,
            "grade": "grade 3"
        },
        {
            "id": 4,
            "grade": "grade 4"
        },
        {
            "id": 5,
            "grade": "grade 5"
        },
        {
            "id": 6,
            "grade": "grade 6"
        },
        {
            "id": 7,
            "grade": "grade 7"
        },
        {
            "id": 8,
            "grade": "grade 8"
        },
        {
            "id": 9,
            "grade": "grade 9"
        },
        {
            "id": 10,
            "grade": "grade 10"
        }
    ],
    "message": "Grade returned successfully"
}
````


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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
                "address": "lane 9, musoro new piece",
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
            "address": "lane 9, musoro new piece",
            "class": "grade 1",
            "gender": "male"
        }
    }
}
```


## Teacher Endpoint  

#### The teacher can only login with the details the admin as used in creating the teacher:

- teachers  as all access to only their class student
- upload their student result


> URL -`[public]` http://127.0.0.1:8080/api/teacher/login

>Method: POST

### login as admin
```
{
    "email": "teacherxyz@gmail.com", | email, string
    "password": "teach12345", | string
}
```


### The below endpoints are auth and they are to be accessed by an authenticated user providing the teacher bearer token.
***

### get the teacher students by the class they teach

> URL -`[auth]` http://127.0.0.1:8080/api/teacher/students/{student_class_id}

>Method: GET

{student_class_id} - here is the id of the grade/class

```
{
    "message": "Request was successfull",
    "teacher": {
        "id": "3",
        "details": {
            "first_name": "Teacher 3",
            "last_name": "yyy",
            "email": "teach3@gmail.com",
            "class_to_teach": "grade 3"
        }
    },
    "students": [
        {
            "id": "3",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student3@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "4",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student4@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "5",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student5@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "6",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student6@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "7",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student7@gmail.co",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "8",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student8@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "9",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student9@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "10",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student10@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "11",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student11@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "12",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student12@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "13",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student13@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "14",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student14@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "15",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student15@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "16",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student16@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "17",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "student17@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "18",
            "details": {
                "first_name": "updated name",
                "last_name": "latest",
                "email": "student18@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "23",
            "details": {
                "first_name": "updated name",
                "last_name": "latest",
                "email": "studentrrr@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "24",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "studentrdddd@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "25",
            "details": {
                "first_name": "bbb",
                "last_name": "aaaaa",
                "email": "studaaaadd@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "26",
            "details": {
                "first_name": "updated name",
                "last_name": "latest",
                "email": "studaaeeeeaadd@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "27",
            "details": {
                "first_name": "sdien",
                "last_name": "sheudhdhd",
                "email": "ajshdudhd@gmail.com",
                "address": "lane 9, musoro new piece",
                "class": "grade 3",
                "gender": "male"
            }
        },
        {
            "id": "28",
            "details": {
                "first_name": "sdien",
                "last_name": "sheudhdhd",
                "email": "ajsdhd@gmail.com",
                "address": "sgd lane 8 , california",
                "class": "grade 3",
                "gender": "female"
            }
        },
        {
            "id": "29",
            "details": {
                "first_name": "sdien",
                "last_name": "sheudhdhd",
                "email": "adeyyyy@gmail.com",
                "address": "sgd lane 8 , california",
                "class": "grade 3",
                "gender": "female"
            }
        },
        {
            "id": "30",
            "details": {
                "first_name": "adeyyyy",
                "last_name": "heydyy",
                "email": "swesssy@gmail.com",
                "address": "sgd lane 8 , california",
                "class": "grade 3",
                "gender": "female"
            }
        },
        {
            "id": "31",
            "details": {
                "first_name": "adeyyyy",
                "last_name": "wwethht",
                "email": "werhhd@gmail.com",
                "address": "sgd lane 8 , california",
                "class": "grade 3",
                "gender": "female"
            }
        }
    ]
}
```

### upload student result/score 

> URL -`[auth]` http://127.0.0.1:8080/api/teacher/results/student/{student_id}

- {student_id} this as to be the id of the student that belongs to the teacher class

>Method: PUT

```
{
    "mathematics": 70, | numeric
    "english": 70, | numeric
    "arabic": 70, | numeric
    "health_education": 70, | numeric
    "biology": 70, | numeric
    "civic": 70, | numeric
    "chemistry": 70, | numeric
    "physics": 70 | numeric
} 
```


## Student Endpoint  

### signup as student

> URL -`[public]` http://127.0.0.1:8080/api/portal/{grade_id}/register

{grade_id} - grade id 

>Method: POST

```
{
    "first_name": "zendo", | string
    "last_name": "arch", | string
    "email": "student@gmail.com", | string, valid email
    "address": "lane 9, tambobo california", | string
    "gender": "male", | string(male, female)
    "class": "grade 1", | string
    "password": "12345678", | string, not less than 8 characters
    "password_confirmation": "12345678" 
} 
```
### login as student

> URL -`[public]` http://127.0.0.1:8080/api/portal/login

>Method: POST

```
{
    "email": "studentemail@gmail.com", | email, string
    "password": "12345678", | string
}
```


### The below endpoints are auth and they are to be accessed by an authenticated user providing the student bearer token.
***

### student profile

> URL -`[auth]` http://127.0.0.1:8080/api/portal/student/{student_id}

>Method: GET

```
{
    "message": "Request was successfull",
    "data": {
        "id": "26",
        "details": {
            "first_name": "updated name",
            "last_name": "latest",
            "email": "studaaeeeeaadd@gmail.com",
            "address": "ibadan, Nigeria",
            "class": "grade 3",
            "gender": "male"
        }
    }
}
```

### update profile

> URL -`[auth]` http://127.0.0.1:8080/api/portal/student/{student_id}

>Method: PUT

```
{

    "first_name": "brendon", | string
    "last_name": "weeetee", | string
    "email": "studaaeeeeaadd@gmail.com", | string, valid email
    "address": "lane 9, tambobo california", | string
    "class": "grade 3", | string
    "gender": "male" | string(male, female)
}
```


### student result

> URL -`[auth]` http://127.0.0.1:8080/api/portal/student/result/{student_id}

>Method: GET

```
{
    "message": "Request was successfull",
    "data": {
        "student_id": "26",
        "student_name": "brendon weeetee",
        "grade": "grade 3",
        "subject_score": {
            "mathematics": 70,
            "english": 70,
            "biology": 70,
            "civic": 70,
            "physics": 70,
            "chemistry": 70,
            "health_education": 70
        }
    }
}
```


***
### general endpoint [Logout]

> URL -`[auth]` http://127.0.0.1:8080/api/{user_type}/logout

- {user_type} can either be `admin`, `teacher` or `student`

>Method: POST

```
    it will return 204 No Content  
```
