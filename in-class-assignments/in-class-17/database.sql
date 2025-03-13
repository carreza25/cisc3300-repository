-- Create the database
CREATE DATABASE cisc3300;

-- Use the database
USE cisc3300;

-- Create a table
CREATE TABLE food (
    `quantity`	int(10) NOT NULL,
    `item`      varchar(80) NOT NULL,
    `dateSold`	date, 	
	primary key (`item`)
);

-- Insert sample data
insert into food (quantity, item, dateSold) 
values ('50', 'Pie', '2025-03-13');
insert into food (quantity, item, dateSold) 
values ('200', 'Cookie', '2025-03-12');
insert into food (quantity, item, dateSold) 
values ('25', 'Cake', '2025-03-13');

-- Query to view the data
SELECT * FROM food;