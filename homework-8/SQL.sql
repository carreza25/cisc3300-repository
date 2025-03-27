--create new database
CREATE DATABASE `HW 8`;

--create table
CREATE TABLE `notes`
(
    `id`            int(11) NOT NULL AUTO_INCREMENT,
    `title`         varchar(80) NOT NULL,
    `description`   text NOT NULL,
    primary key (`id`)
);

--inserting data
insert into notes (title, description) 
values ('hello there', 'what up');

insert into notes (title, description) 
values ('hi', 'sup');

insert into notes (title, description) 
values ('hey', 'howdy');

insert into notes (title, description) 
values ('yo', 'tsktsk');

--updating data
update notes
set title = 'hi'
where id = 1;

update notes
set title = 'hallo'
where id = 3

--delete data
delete from notes
where id = 2;

--select all
select * from notes order by title desc

--select 2nd note
select * from notes limit 1 offset 1

--select all with vowel descriptions
select * from notes where
description LIKE '%a%' OR 
description LIKE '%e%' OR 
description LIKE '%i%' OR 
description LIKE '%o%' OR 
description LIKE '%u%'

