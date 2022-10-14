create database if not exists toyshop;
create user if not exists 'user'@'%' identified by 'password';
grant all privileges on toyshop.* to 'user'@'%';
flush privileges;

use toyshop;
create table if not exists auth (
    id int auto_increment primary key,
    login varchar(40) not null unique,
    password varchar(40) not null
);

create table if not exists products (
    id int auto_increment primary key,
    name varchar(255) not null,
    price int not null,
    description varchar(255) not null
);

insert into auth (login, password)
values ('login', '{SHA}W6ph5Mm5Pz8GgiULbPgzG37mj9g=');

insert into products (name, price, description)
values
    ('ball',   100, 'ball'),
    ('doll',   200, 'doll'),
    ('car',    300, 'car'),
    ('puzzle', 400, 'puzzle'),
    ('book',   500, 'book');