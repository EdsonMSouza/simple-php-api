# Simple PHP API v.1.0 
<code><img height="20" src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/mysql/mysql.png"></code>
<code><img height="20" src="https://raw.githubusercontent.com/github/explore/80688e429a7d4ef2fca1e82350fe8e3517d3494d/topics/php/php.png"></code>

This API aims to present a brief to consume a API resources, mainly for students in the early years of Computer Science courses and the like. For this reason, it has only three EndPoints (resources) to use, and can be expanded according to the need.

As it is an instructional project, **it is not recommended** that it be applied in a production environment, as safety routines and tests have not been implemented. These resources must be researched and implemented, following the current rules, in addition to good practices. Built in **PHP 7** (see below), it allows the beginner to understand the mechanisms of access to the resources of an API.

```html
PHP 7.3.26 (cli) (built: Jan  5 2021 15:10:35) ( ZTS MSVC15 (Visual C++ 2017) x64 )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.3.26, Copyright (c) 1998-2018 Zend Technologies
```

## How to use this content?
This content has *free license for use* (CC BY-SA 4.0).
If you want, collaborate in this repository any improvements that have been made.

## Composer
Changes should be updated via <code>composer dump-autoload -o</code> on your local machine.

# Documentation
Below are shown the resources available for using the API.
After installation on the server, you can use the [examples](https://github.com/EdsonMSouza/simple-php-api/tree/main/example) on how to use API data with: Node.js, PHP and Python.

## Structure
```
+---api
|   \---new
|   \---search
|   \---update
+---src
|   \---Database
|   \---Helpers
|   \---User
\---vendor
    \---composer
```

## *Database*
The development uses the MySQL 5 database, which can be changed at any time according to the need for use.
The database should be configured in <code>Database\Database.php</code>

### Scripts SQL
```sql
CREATE DATABASE <name>;
```

```sql
CREATE TABLE users (
    id          INT(3) 		NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name        VARCHAR(50) NOT NULL,
    email       VARCHAR(50) NOT NULL,
    username    VARCHAR(20) NOT NULL,
    password    VARCHAR(20) NOT NULL
)
```
## Token
To use the API, include the access Token in <code>src\User\UserModel.php</code> method <code>auth()</code>.
A suggestion for improvement this API is a Token distribution system.

# *Resources*
### **POST:** <code>api/new/</code>
------

```json
url = 'http://URI/api/new/';

payload = {
    "name": "name", 
    "email": "email", 
    "username": "username", 
    "password": "password"
}

header = {
    "content-type": "application/json", 
    "Authorization": "YOUR_TOKEN"
}
```

###### Success

```json
[
    {
        "status": "101",
        "info": "User Successfully Added"
    }
]
```

###### Warnings

```json
[
    {
        "status": "102",
        "info": "Invalid Arguments Number (Expected Four)"
    }
]
```

```json
[
    {
        "status": "103",
        "info": "Could Not Add User"
    }
]
```

```json
[
    {
        "status": "104",
        "info": "User Already Exists"
    }
]
```

------



#### **POST:**  <code>api/search/</code>

```json
url = 'http://URI/api/search/';

payload = {
    "username": "username", 
    "password": "password"
}

header = {
    "content-type": "application/json", 
    "Authorization": "YOUR_TOKEN"
}
```

###### Success

```json
[
    {
        "status": "201", 
        "id": 1,
        "name": "John Doe",
        "email": "john.doe@domain.com"
    }
]
```

###### Warnings

```json
[
    {
        "status": "202", 
        "info": "Invalid Arguments Number (Expected Two)"
    }
]
```

```json
[ 
    {
        "status": "203", 
        "info": "User Not Found or Incorrect username and/or password"
    }
]
```

------

#### **PUT:** <code>api/update/</code>

```json
url = 'http://URI/api/update/';

payload = {
    "name": "name", 
    "email": "email", 
    "username": "username", 
    "password": "password"
}

header = {
    "content-type": "application/json", 
    "Authorization": "YOUR_TOKEN"
}
```

###### Success

```json
[
    {
        "status": "301", 
        "info": "User Successfully Updated'
    }
]
```

###### Warnings

```json
[
    {
        "status": "302", 
        "info": "Invalid Arguments Number (Expected Four)"
    }
]
```

```json
[ 
    {
        "status":"303",
        "info": "User Not Found or Incorrect username and/or password"
    } 
]
```

```json
[
    {
        "status": "304",
        "info": "Could Not Update User"
    }
]
```

------

###### Other Warnings

```json
[
    {
        "status": "400", 
        "info": "Bad Request (Invalid Syntax)"
    }
]
```

```json
[
    {
        "status": "401",
        "info": "Token Refused"
    }
]
```

```json
[
    {
        "status": "402",
        "info": "Invalid or Missing Token"
    }
]
```

```json
[
    {
        "status": "403",
        "info": "Payload Precondition Failed"
    }
]
```

```json
[
    {"status": "404",
     "info": "Method Not Allowed"
    }
]
```

```json
[
    {"status": "405",
     "info": "<SQL Code>"
    }
]
```

```json
[
    {"status": "406",
     "info": "<Unknow>"
    }
]
```

------

## Try Online
To test this API online, use: 

+ URI: [http://emsapi.esy.es/rest](http://emsapi.esy.es/rest) (see [examples](https://github.com/EdsonMSouza/simple-php-api/tree/main/example))
+ Authorization: <code>123</code> or <code>567</code>
+ username: john
+ password: doe

### How to cite this content

```
De Souza, Edson Melo (2021, March 13). Simple PHP API v.1.0.
Available in: https://github.com/EdsonMSouza/simple-php-api
```

Or BibTeX for LaTeX:

```latex
@misc{desouza2020phpapi,
  author = {De Souza, Edson Melo},
  title = {Simple PHP API v.1.0},
  url = {https://github.com/EdsonMSouza/simple-php-api},
  year = {2020},
  month = {March}
}
```

## License
[![CC BY-SA 4.0][cc-by-sa-shield]][cc-by-sa]

This work is licensed under a
[Creative Commons Attribution-ShareAlike 4.0 International License][cc-by-sa].

[![CC BY-SA 4.0][cc-by-sa-image]][cc-by-sa]

[cc-by-sa]: http://creativecommons.org/licenses/by-sa/4.0/
[cc-by-sa-image]: https://licensebuttons.net/l/by-sa/4.0/88x31.png
[cc-by-sa-shield]: https://img.shields.io/badge/License-CC%20BY--SA%204.0-lightgrey.svg
