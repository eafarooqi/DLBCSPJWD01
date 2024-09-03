# DLBCSPJWD01

Author: Ehsan Ahmed Farooqi\
Matriculation: 92121256\
GitHub Link: https://github.com/eafarooqi/DLBCSPJWD01


## Introduction
BMS is a very simple Books Management System designed to solve books management problem. The system offers a user-friendly interface to efficiently organize and manage diverse collection of books. System also offers books information from openlibrary.org using API.

### Built With

- [Laravel 11] (https://laravel.com)
- [Bootstrap 5] (https://getbootstrap.com)
- [Livewire 3] (https://livewire.laravel.com)
- [MySQL 8] (https://dev.mysql.com/doc/relnotes/mysql/8.0/en/)


### Prerequisites
- php: 8.2 or higher (https://windows.php.net/download/)
- MySQL: 8.x (https://dev.mysql.com/downloads/installer/)
- NodeJS >= 21.0 (https://nodejs.org/en)
- npm >= 10.0 (bundled with NodeJS)
- git (https://git-scm.com/downloads)
- composer (https://getcomposer.org/download/)
- MySQL Workbench (https://dev.mysql.com/downloads/workbench/)


### Installation
- Install all Prerequisites. For php and MySQL WAMP or XAMPP servers can also be used on windows which install php and MySQL automatically. For linux Ngnix or Apache server can be installed.
- for php custom installation just download the php thread safe from the above link and extract the content into one folder.
- On window make sure php is added to the path variable and following extensions are enabled in php.ini file. 
- On windows uncomment them in php.ini file or in Linux install them.
```
fileinfo
gd
intl
mysqli
pdo_mysql
pdo_sqlite
zip
sqlite3
```
- for MySQL Custom installation if WAMP or XAMPP are not used, please take the option custom during installation and select server and MySQL Workbench under applications only.
- Make sure all dependencies are installed correctly by running following commands in command line. 
```
php -v
composer -V
node -v
npm -v
git --version (optional --only requried for installation from github)
```
- Unzip the bms.zip file to any folder
- Login into the mysql Server. Create a database `bms` in MySQL server. Can be done using MySQL Workbench.
- import the sql dump present in the zip file `bms.sql`
- update .env file in project root directory for database username (DB_USERNAME) & password (DB_PASSWORD) if any, default is set to username root and no password.
- using command line navigate to the project folder which was extracted in the first step.
- Run following commands
```
composer install
npm install
npm run build
php artisan serve
```

- The application should be accessible in the browser with the following URL
```
http://127.0.0.1:8000
```
