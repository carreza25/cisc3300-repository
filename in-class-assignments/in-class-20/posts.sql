CREATE DATABASE `in_class_20`;

CREATE TABLE `posts`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `title`     varchar(80) NOT NULL,
    `post`      varchar(80) NOT NULL,
    primary key (`id`)
);

insert into posts (title, post)
values ('reminder', 'doctor appt today');
insert into posts (title, post)
values ('to do', 'get groceries');
insert into posts (title, post)
values ('hello', 'i love you');
