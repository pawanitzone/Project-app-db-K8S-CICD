create database crudwebdb;
GRANT ALL PRIVILEGES ON crudwebdb.* TO 'pawank'@'%' IDENTIFIED BY '@pawan';
GRANT ALL PRIVILEGES ON crudwebdb.* TO 'pawank'@'localhost' IDENTIFIED BY '@pawan';
use crudwebdb;
CREATE TABLE `users` (`id` int(11) NOT NULL auto_increment, `name` varchar(100) NOT NULL, `age` int(3) NOT NULL,`email` varchar(100) NOT NULL,PRIMARY KEY  (`id`));

