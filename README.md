#  🛫 BK Airlines 🛬

## :bulb:Project proposal

The project aims to develop a management system for an airline. This system will allow the comprehensive management of users, flights, reservations and destinations, with advanced functionalities such as secure authentication through JWT, automatic management of flights without available seats or that have exceeded the deadline.

### Requirements:

- Min **70%** of **test coverage**. 
- **Jira** should be used for **epic, user stories and tasks**.
- **ALL** functionality must exist in **API REST** and verified by Postman.
- On the **flight list sheet** with the **date organized** from closest to furthest but only those available on another screen are the **past flights**, including the **total seats** on the plane and the **seats still free**.
- In blade the **reserve button** to reserve and **cancel** when it is reserved.
- The **administrator cannot** make **reservations**.
***
### ☁️ Flights table 🗺️

This is the table for **Flights**. It should:

- Display all **flights** *(Blade and Json)*.
- Allow to **insert, modify or delete** a flight only for the admin *(Endpoints and blade)*.
- Let user watch the **show** of a flight *(Endpoints and Blade)*.
- The flight has a **date, a place of departure, an arrival place, an assigned plane and reserved seats.
- **Automatically change the status** of the available flight to "false" when the flight *runs out* of available seats or is out of date.

***
### ✈️ Planes table 🛩️

This is the table for **Planes**. It should:

- Display all **planes** *(Blade and Json)*.
- Allow to **insert, modify or delete** a plane only for the admin *(Endpoints and blade)*.
- Let user watch the **show** of plane *(Endpoints and Blade)*.
- Planes have a **name, and the maximum number of seats**
  
***
### 💺 PIVOT table (Reserve) 🧳

- **Create flight reservations** only if the **selected route exists** and if there are **seats available** and the **date** has not passed.
- You can only make **one reservation per flight** if you have booked it, you can only cancel it.
- If there is **no reservation**, the option to **reserve must appear**.
- Only a **User can reserve**, the **Guest can only view**.
- **Availability check** before confirming a reservation.

***
### Project Diagrams (BBDD)

![BBDD Diagram](https://github.com/user-attachments/assets/30dbf302-6580-49d3-b69f-4d340caca3bb)

***
## :scroll: Installation

1.) **Clone** this repository:
```
https://github.com/rebecabernal/BK_Airlines.git
```

***
2.) Install **Composer** and **NPM**
```
composer install
```
```
npm install
```

***
3.) **Create** a *.env* file copying everything inside the existing file *.env.example* and **modify** the following **lines**:
* DB_CONNECTION=mysql
* DB_HOST=127.0.0.1
* DB_PORT=3306
* DB_DATABASE=airline
* DB_USERNAME=root
* DB_PASSWORD=

***
4.) Create a **database** in **MySQL**

***
5.) Now go to the **VSC terminal** and put the following commands:
```
php artisan migrate:fresh 
php artisan migrate:fresh --seed
```
This command will **generate** all the **tables**.

***
6.) Open another terminal in **VSC** and put the following command
```
npm run dev
```

***
7.) Open **another terminal** and **run** the **server** with this command:
```
php artisan serve
```
You'll see an **url** that is going to take you to a website.

>[!IMPORTANT]
>Be sure that your running npm and the server in **DIFFERENT** terminals, **DON'T** close these two terminals and **DON'T** use other commands in these two terminals.

***
### :floppy_disk: Installation requirements
Before you start to read how to install the project you'll need these requirements:
>[!NOTE]
>If you can't install xampp, look for any other local server that supports **MySQL** and **PHP**
***

:black_circle: **XAMPP**

:black_circle: Install **Composer**

:black_circle: Install **NPM** in **Node.js**

:black_circle: **Xdebug** (for the tests coverage)

:black_circle: **Postman**

***
## :mag_right:Documentation

### Endpoints
***
#### 🗺️ Flights table
✏️ Create (POST)
`http://127.0.0.1:8000/api/flights/store`

📖 Read (GET)
`http://127.0.0.1:8000/api/flights`

💱 Update (PUT)
`http://127.0.0.1:8000/api/flights/update/{id}`

❌ Destroy (DELETE)
`http://127.0.0.1:8000/api/flights/destroy/{id}`

👁️ Show (GET)
`http://127.0.0.1:8000/api/flights/show/{id}`
***
#### ✈️ Planes table
✏️ Create (POST)
`http://127.0.0.1:8000/api/planes/store`

📖 Read (GET)
`http://127.0.0.1:8000/api/planes`

💱 Update (PUT)
`http://127.0.0.1:8000/api/planes/update/{id}`

❌ Destroy (DELETE)
`http://127.0.0.1:8000/api/planes/destroy/{id}`

👁️ Show (GET)
`http://127.0.0.1:8000/api/planes/show{id}`

***
#### 🧳Uses Table
📝 User Register (POST)
`http://127.0.0.1:8000/api/auth/register`

✅ User Login (POST)
`http://127.0.0.1:8000/api/auth/login`

❌ User Logout (POST)
`http://127.0.0.1:8000/api/auth/logout`

🔄 User Refresh (POST)
`http://127.0.0.1:8000/api/auth/refresh`

🧑 User Me (POST)
`http://127.0.0.1:8000/api/auth/me`

***
## :white_check_mark: Tests

> [!IMPORTANT]
> It's important to test the project so we can check if it works correctly and to do that use this command in the **VSC** terminal:

```
php artisan test --coverage
```
![Feature test](https://github.com/user-attachments/assets/06121d77-fe04-4aac-bb44-a269bb1d4ba1)


***
### Coverage

To see the **coverage** you can use this command at the **VSC** terminal:
```
php artisan test --coverage-html=coverage-report
```
> [!IMPORTANT]
> Everytime that you do **new tests** you need to put the command above in the **VSC** terminal, so it can **update** your coverage.
This will add a **folder** called *coverage-report*, go to the folder, go to the *index.html*, and then **open with live server**. After that you should see this page:

![coverage-report](https://github.com/user-attachments/assets/ef2fedc1-9d14-47d4-8905-95a5e9363d37)


***
## Languages and tools
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='PHP' src='https://img.shields.io/badge/PHP-100000?style=for-the-badge&logo=PHP&logoColor=white&labelColor=896696&color=896696'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='html5' src='https://img.shields.io/badge/html-100000?style=for-the-badge&logo=html5&logoColor=white&labelColor=FF8400&color=FF8400'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='css3' src='https://img.shields.io/badge/css-100000?style=for-the-badge&logo=css3&logoColor=white&labelColor=079FB0&color=079FB0'/></a>
<a href='https://laravel.com' target="_blank"><img alt='Laravel' src='https://camo.githubusercontent.com/e410fca6849c63adce18d5744836c71a5772b86384130c28c9369df68921e7c0/68747470733a2f2f696d672e736869656c64732e696f2f62616467652f6c61726176656c2d3130303030303f7374796c653d666f722d7468652d6261646765266c6f676f3d6c61726176656c266c6f676f436f6c6f723d464646464646266c6162656c436f6c6f723d36363041304126636f6c6f723d363630413041'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='mysql' src='https://img.shields.io/badge/mysql-100000?style=for-the-badge&logo=mysql&logoColor=white&labelColor=1C662F&color=1C662F'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='git' src='https://img.shields.io/badge/git-100000?style=for-the-badge&logo=git&logoColor=white&labelColor=FF0000&color=FF0000'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='github' src='https://img.shields.io/badge/github-100000?style=for-the-badge&logo=github&logoColor=white&labelColor=000000&color=000000'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='canva' src='https://img.shields.io/badge/canva-100000?style=for-the-badge&logo=canva&logoColor=white&labelColor=A700FB&color=A700FB'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='xampp' src='https://img.shields.io/badge/xampp-100000?style=for-the-badge&logo=xampp&logoColor=white&labelColor=FF8800&color=FF8800'/></a>
<a href='https://github.com/shivamkapasia0' target="_blank"><img alt='postman' src='https://img.shields.io/badge/postman-100000?style=for-the-badge&logo=postman&logoColor=white&labelColor=FF0000&color=FF0000'/></a>

***
## 👩‍💻  My contact

📧rebecabernalmesa@gmail.com
  
<a href='https://www.linkedin.com/in/rebeca-bernal/'><img alt='linkedin' src='https://res.cloudinary.com/dg28513f0/image/upload/v1743495969/1e95f00c-a656-4083-a5df-1a2d9f6f86ec.png'/></a>

