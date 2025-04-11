CREATE DATABASE `HW 9`;

CREATE TABLE `items`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `type`      varchar(80) NOT NULL,
    `name`      varchar(80) NOT NULL,
    primary key (`id`)
);

insert into items (type, name)
values ('bread', 'bagel');
insert into items (type, name)
values ('bread', 'ciabatta');
insert into items (type, name)
values ('bread', 'baguette');

insert into items (type, name)
values ('sweets', 'cookie');
insert into items (type, name)
values ('sweets', 'cupcake');
insert into items (type, name)
values ('sweets', 'donut');

insert into items (type, name)
values ('drink', 'coffee');
insert into items (type, name)
values ('drink', 'juice');
insert into items (type, name)
values ('drink', 'water');