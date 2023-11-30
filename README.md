# WCS-Cyber-Projet2

The objective of this project is the development and deployment of a secure file download application in Php MVC model (https://fr.wikipedia.org/wiki/Mod%C3%A8le-vue-contr% C3% B4their)

For installation instructions, navigate to the file [INSTALL.md]

## Table of contents
#### Contributors
#### The project 
#### Constraint
#### Functionality
#### Security

## Contributors
Bilel, Katia, Kelyan, Zhiying

### Roles
The project was under the supervision of Romain Garcia.

Katia, Zhiying, Kelyan and Bilel took on the role of developers. Kelyan also took on the role of lead developer during the project. 

Each project feature was assigned to a specific person. We set up a Trello board for better organization and held daily meetings to monitor everyone's progress.

## The project

This is the second pedagogical project in the cybersecurity developer course, with the aim of putting into practice the skills acquired in the second part of the course.

- Develop a secure file-sharing web application
- Deploy a web application with a database
- Carry out a project as part of a team
- Document all stages

### Pre-requisites

- [Apache](https://doc.ubuntu-fr.org/apache2#installation) Server version: Apache/2.4.52 (Ubuntu)
- [PHP](https://doc.ubuntu-fr.org/php#installation) Version 8.1.2-1
- [MySQL](https://doc.ubuntu-fr.org/mysql#installation) Version 8.0.33-0

See INSTALL.md for more.

### Application structure

The application is structured as follows:

- `config/`: Configuration files for the app and the database
- `public/`: Directory accessible from the web
- `src/`: Application files
    - `Controllers/`: Controllers
    - `Models/`: Interactions with the database
    - `Router/`: Routing of the application (what controller and method to call for a given URL)
    - `Services/`: Other classes used by the application
    - `Views/`: Views of the application (code that will be displayed to the user)
- `var/`: Logs of the application
- `vendor/`: Dependencies installed with composer

The application uses the following libraries:

- symfony/http-foundation: To manage HTTP requests and responses
- phroute/phroute: To manage the routing of the application

## Constraint

- Language is PHP (minimum 8.1)
- MVC architecture
- No framework, but certain libraries may be used after validation by the trainer 
- MariaDB or MySQL database
- Ubuntu 22.04 LTS Linux server
- Apache web server

## Functionality

**For users who are not logged in, you will need to offer the following functions:**

- Home page
- Registration (must be protected against mass user creation attacks)
- Access to shared files via a public share link
  - Links must be unique and non-guessable
- File download
- Option to enter a password to download the file (if the link is protected)
- Option to add a comment to the file

**For logged-in users, the following functions should be available:**

- Login / Logout
- Dashboard
  - Information on user status (storage space used, total storage space, storage quota, paid or free)
  - List of files shared by and with the user
    - File name (with download link)
    - File size
    - Date created
    - File management button

## Security

### File upload security

This application project must implement essential security measures to guarantee data protection and prevent vulnerabilities. Here is an overview of the main security measures implemented:

- **File type validation**: Uploaded files are checked for type to avoid code injections.
- **File size limitation**: File sizes are limited for security reasons.
- **Secure storage**: Files are stored outside the web root to prevent direct downloading.
- **Authentication and authorisation**: Implements an authentication and password system to control uploads and access to certain files.

### Login and Registration Security

 **Password strength check**: Requirement for strong passwords
- **Secure password storage** : User passwords are stored securely using hashes.
- **Validation of user data**: Validation of user data entered during registration and login.
- **Protection against SQL injection attacks**: Use of prepared queries to prevent SQL injections.
- **Protection of personal information**: Users' personal information is stored and managed in accordance with data protection regulations (RGPD, etc.).

### General security 

- **Security audits**: Regular audits are carried out to identify and correct vulnerabilities.
- **Protection against XSS**: Validation and escape of user data to prevent the injection of malicious code. 
- **Protection against CSRF attacks**: Use of CSRF tokens to prevent Cross-Site Request Forgery attacks.
- **Regular updates** : The dependencies and libraries used are regularly updated to correct vulnerabilities.
- **Secure error management**: error messages can be customised to prevent sensitive information from being disclosed.