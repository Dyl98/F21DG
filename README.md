# F21DG

## Prerequisites
LAMP stack installed on development/live server. [Guide to install LAMP stack](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04)
- PHP Version >= 7.0
- MySQL Version >= 5.7
- Apache2 >= 2.4

## Installation
Place the [src](src/) folder into your public_html folder

### Setting up MySQL database

1.	Create empty database called ‘csm’.
```
mysql> CREATE DATABASE csm;
```
2.	Import [CreateDatabase.sql](sql/CreateDatabase.sql) to the new ‘csm’ database.
```
shell> mysql -u <username> -p csm < CreateDatabase.sql
```
3.	[src/php/core/mysql.php line 26](src/php/core/mysql.php#L26) update each of the parameters so they match the database you wish to connect to. **Note**: We plan to change this in the future as this way isn’t secure.\
4.	(Optional) Import [InsertData.sql](sql/InsertData.sql) to the ‘csm’ database to import test data.
```
shell> mysql -u <username> -p csm < InsertData.sql
```
5.	(Optional) If you loaded in the test data there is a test username and password provided.\
username: **test**\
password: **qwerty**
