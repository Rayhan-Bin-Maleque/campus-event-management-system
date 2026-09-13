# 🎓 Campus Event Management System (PHP + MySQL MVC)

A complete web-based **Campus Event Management System** developed using **Core PHP, MySQL, HTML, CSS, and JavaScript** following the **MVC (Model-View-Controller) architecture**.

This system helps universities manage campus events efficiently. Students can explore and register for events, organizers can create and manage events, staff can manage attendance, and administrators can control the complete system.

The project is developed using plain PHP with procedural MySQLi. No framework, Composer, or build tools are required.

---

# 1. Installation (XAMPP)

## Requirements

- XAMPP
- PHP 8+
- MySQL
- Web Browser


## Setup Instructions


### Step 1: Copy Project

Copy the project folder into:

```
C:\xampp\htdocs\
```

Example:

```
htdocs/campus-event-management-system/
```


### Step 2: Start XAMPP

Start:

```
Apache
MySQL
```

from XAMPP Control Panel.


### Step 3: Import Database

Open:

```
http://localhost/phpmyadmin
```

Create a database and import:

```
database.sql
```


### Step 4: Run Project

Open:

```
http://localhost/campus-event-management-system/
```

---

# 2. Project Folder Structure


```
campus-event-management-system/

│
├── index.php
│   Main router and application entry point
│
├── database.sql
│
├── README.md
│
│
├── config/
│
│   ├── config.php
│   │
│   ├── database.php
│   │
│   └── functions.php
│
├── controllers/
│
│   ├── auth_controller.php
│   ├── admin_controller.php
│   ├── organizer_controller.php
│   ├── student_controller.php
│   ├── staff_controller.php
│   └── ajax_controller.php
│
│
├── models/
│
│   ├── user_model.php
│   ├── event_model.php
│   ├── registration_model.php
│   ├── payment_model.php
│   ├── attendance_model.php
│   ├── ticket_model.php
│   └── log_model.php
│
│
├── views/
│
│   ├── partials/
│   │   ├── header.php
│   │   └── footer.php
│
│   ├── auth/
│   │
│   ├── admin/
│   │
│   ├── organizer/
│   │
│   ├── student/
│   │
│   └── staff/
│
│
└── assets/

    ├── css/
    │   └── style.css
    │
    └── js/
        └── app.js


---

# 3. MVC Architecture


The project follows MVC architecture.


## Model

The Model handles:

- Database connection
- SQL queries
- Data processing
- CRUD operations


Location:

```
models/
```


Examples:

```
event_model.php
attendance_model.php
payment_model.php
ticket_model.php
```

---

## View

The View handles:

- HTML pages
- User interface
- Data presentation


Location:

```
views/
```


---

## Controller

The Controller handles:

- User requests
- Validation
- Business logic
- Calling models
- Loading views


Location:

```
controllers/
```


MVC Flow:

```
User Request

        ↓

index.php Router

        ↓

Controller

        ↓

Model

        ↓

Database

        ↓

View

```

---

# 4. Router System


All pages follow this structure:


```
index.php?page=<role>&action=<function>
```


Examples:


| URL | Function |
|---|---|
| index.php?page=admin | Admin Dashboard |
| index.php?page=student | Student Dashboard |
| index.php?page=organizer&action=add_event | Create Event |
| index.php?page=staff&action=verify_ticket | QR Ticket Verification |
| index.php?page=ajax&action=search_events | AJAX Search |


The router loads the correct controller according to the user's role.

---

# 5. User Roles and Features


## 👨‍💼 Admin


Admin manages the complete system.


Features:

- User management
- View all users
- Event approval and rejection
- Activity monitoring
- Revenue reports
- System statistics
- Activity log search


---

## 👨‍🎓 Student


Students participate in campus events.


Features:

- View available events
- Search events
- Register for events
- Make payments
- Generate digital tickets
- View registered events
- View attendance history


Student Workflow:


```
Browse Event

        ↓

Register

        ↓

Payment

        ↓

Ticket Generated

        ↓

Attend Event

```

---

## 👨‍💻 Organizer


Organizer manages their own events.


Features:

- Create events
- Edit events
- Delete events
- View event statistics
- Manage expenses
- Track event performance


Organizer Workflow:


```
Create Event

        ↓

Admin Approval

        ↓

Students Register

        ↓

Event Management

```

---

## 👨‍🏫 Staff


Staff handles event attendance.


Features:

- View approved events
- Load student list
- Create attendance records
- Verify QR tickets
- Mark attendance
- Attendance history
- Export attendance CSV


Staff Workflow:


```
Student Ticket

        ↓

Ticket Verification

        ↓

Check Registration

        ↓

Mark Attendance

```

---

# 6. Database Relationship


Main Database Entities:


```
Users

 |

 |---- Events

 |

 |---- Registrations

 |

 |---- Payments

 |

 |---- Tickets

 |

 |---- Attendance

 |

 |---- Activity Logs

```


Relationships:


- One organizer can create many events
- One student can register for many events
- One registration has payment information
- One successful payment generates a ticket
- Staff manages attendance
- Admin monitors system activities


---

# 7. AJAX Features


The project uses AJAX for dynamic searching.


Implemented using:


Backend:

```
controllers/ajax_controller.php
```


Frontend:

```
assets/js/app.js
```


Available AJAX searches:


- User search
- Event search
- Student search
- Attendance search
- Activity log search


Benefits:

- No page reload
- Faster searching
- Dynamic table update

---

# 8. Security Implementation


| Security | Implementation |
|-|-|
| SQL Injection Protection | Prepared Statements |
| Password Security | password_hash() |
| XSS Protection | htmlspecialchars() |
| Session Security | Session authentication |
| Role Protection | require_role() |
| Input Cleaning | clean() function |


---

# 9. Ticket and QR Attendance System


The ticket system works as:


Student:


```
Register Event

        ↓

Complete Payment

        ↓

Ticket Created

        ↓

QR Code Generated

```


Staff:


```
Enter Ticket Code

        ↓

Verify Ticket

        ↓

Check Student Information

        ↓

Mark Attendance

```

---

# 10. Payment System


Students can:

- Select registered events
- Submit payment information
- Generate tickets after successful payment


Payment information includes:

- Student
- Event
- Amount
- Payment Method
- Transaction ID


---

# 11. Activity Logging System


The system records important activities:


Examples:


- User login
- User logout
- Event creation
- Event approval
- Registration
- Payment completion
- Attendance marking


Admin can search activity logs using AJAX.

---

# 12. Technologies Used


## Frontend

- HTML5
- CSS3
- JavaScript
- AJAX


## Backend

- PHP


## Database

- MySQL


## Architecture

- MVC Pattern


---

# 13. Team Contribution


| Member | Responsibility |
|-|-|
| Member 1 | Staff Module, index.php, Assets, Config |
| Member 2 | Student Module |
| Member 3 | Admin Module |
| Member 4 | Organizer Module |


---

# 14. Requirement Checklist


| Requirement | Implementation |
|-|-|
| MVC Architecture | Models, Controllers, Views |
| Database | MySQL with MySQLi |
| Authentication | Session based login |
| Authorization | Role based access |
| CRUD Operations | Event, User, Registration Management |
| AJAX | Dynamic Search System |
| Validation | PHP and JavaScript Validation |
| Security | Prepared Statements and XSS Protection |


---

# 15. Future Improvements


Possible future upgrades:


- Mobile application
- Real QR scanner integration
- Email notifications
- Online payment gateway
- Event recommendation system
- Cloud deployment
- Push notifications


---

# 16. Test Accounts


Example Accounts:


| Role | Username |
|-|-|
| Admin | admin |
| Organizer | organizer |
| Student | student |
| Staff | staff |


---

# Copyright


Campus Event Management System

Developed as an academic web application project.
