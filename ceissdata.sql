create schema if not exists CEIS400_PROJECT_V1 default character set utf8mb4; #create database if not already created
use CEIS400_PROJECT_V1; #use specified database

#need to create drop table if exist for mutiple script runs/changes to colums
drop table if exists Warehouse_has_Item;
drop table if exists Warehouse;
drop table if exists Ordered_has_Employee;
drop table if exists Employee_has_Item;
drop table if exists Ordered_has_item;
drop table if exists Item;
drop table if exists Ordered;
drop table if exists Employee; 
drop table if exists Sign_in;
drop table if exists Employee_Has_Sign_In;
set sql_mode='';

#may need to add hire and termination date to class - and any more employee info needed
create table if not exists Employee 
(
Employee_ID int not null auto_increment,
Employee_Name varchar(25) null,
Employee_Class varchar(25) null,

primary key (Employee_ID)
);

create table if not exists Ordered
(
Ordered_ID int not null auto_increment,
Ordered_Employee_ID int not null,
Date_Ordered datetime null,
Date_Received datetime null,

primary key (Ordered_ID),

constraint Ordered_fk_Employee
	foreign key (Ordered_Employee_ID) references employee (Employee_ID)
);

create table if not exists Item
(
Item_ID int not null auto_increment,
Item_Employee_ID int,
Item_Name varchar(25) null,
Item_Type tinyint null,

primary key (Item_ID),

constraint Item_fk_Employee
	foreign key (Item_Employee_ID) references employee (Employee_ID)	
);

create table if not exists Ordered_has_item
(
Ordered_Ordered_ID int not null,
Item_Item_ID int not null,

primary key (Ordered_Ordered_ID, Item_Item_ID),

constraint Ordered_has_item_fk_Ordered
	foreign key (Ordered_Ordered_ID) references Ordered (Ordered_ID),
constraint Ordered_has_item_fk_Item
	foreign key (Item_Item_ID) references Item (Item_ID)
);

insert into Employee (Employee_ID, Employee_Name, Employee_Class) values
(1, 'Warehouse Upper', 'warehouse'),
(2, 'Warehouse Lower', 'warehouse'),
(3, 'Jeff', 'Manager'),
(4, 'Angel', 'Employee'),
(5, 'Max', 'Manager'),
(6, 'Robert', 'Employee');


insert into Ordered (Ordered_ID, Date_Ordered, Date_Received) values
(12, 11/7/2018, 11/9/00),
(13, 10/30/2018, default);

insert into Item (Item_ID, Item_name, Item_Type) values
(121, 'hammer', 0),
(122, 'plywood', 1),
(123, 'level', 0),
(124, 'saw', 0),
(125, 'tape mesure', 0),
(126, 'box nails', 1);

insert into Ordered_has_Item (Ordered_Ordered_ID, Item_Item_ID) values
(12, 122),
(13, 126);









