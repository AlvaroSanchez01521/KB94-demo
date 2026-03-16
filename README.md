# Technical Service Management System

A lightweight web-based management system designed to optimize the daily operations of a mobile phone repair and technical service business.

This project was originally developed for the repair shop **K-byte 94**, with the goal of providing a fast, intuitive and efficient way to register and manage repair orders, clients and technicians without adding unnecessary administrative complexity.

---

# Overview

The system centralizes the operational workflow of a technical repair service by organizing client information, repair orders and technician assignments in a simple and structured interface.

It focuses on:

- Fast data entry
- Clear repair status tracking
- Automated work order documentation
- Simple internal management

The interface was designed to work on both desktop and mobile devices thanks to a responsive layout.

---

# Demo Version

This repository contains a **limited demo version** of the system.

Some modules were intentionally disabled to keep the project simple and focused on demonstrating the core workflow.

### Features available in the demo

- Client management (create / edit)
- Technician management (create / edit)
- Work order creation
- Work order editing
- Work order printing

### Disabled modules in the demo

The following modules are part of the full system but are disabled in this version:

- Dashboard
- Cash management
- Daily financial movements
- Cash register history
- Brands management
- Models management
- Locations
- Payment methods
- Payment registration
- Payment history

These features were removed from the demo in order to simplify the project structure while still demonstrating the main architecture and workflow.

---

# Main Features

### Client Database
Efficient client management including:

- Name
- Last name
- Identification number
- Location
- Two contact numbers

### Work Order System

Each repair order centralizes technical information such as:

- Device brand
- Device model
- Reported issue
- Technical observations
- Repair budget
- Assigned technician

### Repair Status Tracking

Repair orders follow a date-based lifecycle:

INGRESO  → When the device is received by the workshop.
CIERRE   → When the repair process is completed.
ENTREGA  → When the device is returned to the client.

The system determines the current status based on the presence of these dates.

### Work Order Documentation

The system automatically generates a **duplicate work order document**:

- Client copy
- Workshop copy

---

# Technologies Used

The system was developed as a **web-based application**.

### Backend
- PHP

### Frontend
- HTML
- CSS
- JavaScript

### Architecture
- MVC (Model-View-Controller)

### Data Management
- MySQL database

### Additional Technologies
- AJAX for asynchronous communication
- DOM manipulation for dynamic UI updates
- Responsive layout for mobile compatibility

---

# Architecture

The application follows a **Model-View-Controller (MVC)** structure to maintain clear separation between:

- Business logic
- Data access
- User interface

This improves maintainability and scalability of the project.

---

# Screenshots
![Dashboard](docs/screenshots/dashboard.png)
/docs/screenshots/dashboard.png
/docs/screenshots/work_orders.png
/docs/screenshots/clients.png

---

# Installation

### Requirements

- PHP
- MySQL
- Web server (Apache recommended)
- Local environment such as XAMPP

### Steps

1. Clone the repository
git clone https://github.com/AlvaroSanchez01521/KB94-v3Git/

2. Import the database structure into MySQL.

3. Place the project inside your web server directory (for example `/htdocs` if using XAMPP).

4. Configure the database connection.

5. Open the system in your browser. 
http://localhost/KB94-v3Git

---

# Project Purpose

This project is shared as part of a **software development portfolio** to demonstrate:

- Web application architecture
- Backend development using PHP
- Database modeling
- MVC design patterns
- Dynamic frontend interaction using AJAX

---

# Author

Developed by **Alvaro Sanchez**

GitHub Profile:  
https://github.com/AlvaroSanchez01521
