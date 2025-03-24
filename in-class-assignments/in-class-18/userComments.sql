--create university database
CREATE DATABASE `in_class_17`;

-- create students table
CREATE TABLE `users`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `name`      varchar(80) NOT NULL,
    `age`       int(11) NOT NULL,
    `gaab`      varchar(80) NOT NULL,
    primary key (`id`)
);

-- create student addresses table, student has one
CREATE TABLE `userComments`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `comment`     varchar(80),
    `platform`     varchar(80),
--   foreign key
    `userName` varchar(80) NOT NULL,
    primary key (`id`)
);

insert into users (name, age, gaab) 
values ('cam', '22', 'female');
insert into users (name, age, gaab) 
values ('lucy', '23', 'female');
insert into users (name, age, gaab) 
values ('bob', '21', 'male');

insert into userComments (comment, platform, userName) 
values ('hello world', 'twitter', 'camcamgirl');
insert into userComments (comment, platform, userName) 
values ('wassup', 'twitter', 'bobsuruncle');

--Write a query to return all users and their comments if they have comments or not: 
SELECT *
FROM 
    users
LEFT JOIN userComments ON users.id = userComments.id;

--Write a query to return all users and their comments only if they have comments:
SELECT *
FROM 
    users
JOIN userComments ON users.id = userComments.id;



