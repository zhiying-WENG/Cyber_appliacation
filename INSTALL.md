## Installation

To install the project, you need to clone the repository and install the dependencies with composer.

```bash
git clone https://github.com/Bileloufkir/WCS-Cyber-Projet2.git
cd WCS-Cyber-Projet2
composer install
```

## Configuration

Once the project is installed, you need to configure the application and the database connection. To do so, you need
to copy the files `config/app.dist.php` and `config/database.dist.php` to `config/app.php` and `config/database.php`:

```bash
cp config/app.dist.php config/app.php
cp config/database.dist.php config/database.php
```

Then you need to edit the files `config/app.php` and `config/database.php` to set the correct values.

## Docker MySQL

If you need a MySQL database for the project development, you can use the following command to start a MySQL server
in a Docker:

```bash
docker run -d --name mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=db-password mysql
```

Then you need to create a database with the name of your choice, and a user with a password. Then, you can grant to
this user all privileges on the database.

```bash
mariadb -h 127.0.0.1 -u root -p
```

```sql
CREATE DATABASE database_name;
CREATE USER 'username'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON database_name.* TO 'username'@'%';
```

If you need to import a SQL file, you can use the following command:

```bash
mariadb -h 127.0.0.1 -D database -u root -p < setup/database.sql
```

## Dev server

To start the application, you can use the following command:

```bash
php -S localhost:8000 -t public
```

Then you can open the following URL in your browser: http://localhost:8000