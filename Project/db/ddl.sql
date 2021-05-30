drop table if exists users;
drop table if exists products;
drop table if exists order_product;
drop table if exists orders;
drop table if exists shipments;
drop table if exists payments;
drop table if exists reviews;

create table if not exists users
(
    id         int primary key auto_increment,
    username   varchar(20) unique not null,
    password   varchar(30)        not null,
    name       varchar(30),
    email      varchar(40),
    role       varchar(20) default 'user',
    address    varchar(50),
    phone      varchar(10),
    created_at datetime    default current_timestamp,
    updated_at datetime on update current_timestamp
);
insert into users(username, password, name, email, role, address, phone)
values ('dangvh', '1', 'Vu Hai Dang', 'dangvh@gmail.com', 'user', 'Bac Ninh Bac Ninh', '0911989755'),
       ('hoangtl', '1', 'Tran Le Hoang', 'hoangtl@gmail.com', 'user', 'Ha Noi Ha Noi', '0911989756'),
       ('van', '1', 'Van H', 'van@gmail.com', 'user', 'Ha Noi Ha Noi', '0911989757'),
       ('xon', '1', 'Xon T', 'xon@gmail.com', 'user', 'Ha Noi Ha Noi', '0911989758'),
       ('user1', '1', 'User U1', 'user1@gmail.com', 'user', 'BHa Noi Ha Noi', '0911989759'),
       ('user2', '1', 'User U2', 'user2@gmail.com', 'user', 'BHa Noi Ha Noi', '0911989751'),
       ('admin', '1', 'Admin admin', 'admin@gmail.com', 'admin', 'admin home', '01686868686');

create table if not exists categories
(
    id         int primary key auto_increment,
    brand      varchar(50),
    created_at datetime default current_timestamp,
    updated_at datetime on update current_timestamp
);

insert into categories(brand)
values ('IPhone'),
       ('Samsung'),
       ('Xiaomi'),
       ('Oppo');


create table if not exists products
(
    id          int primary key auto_increment,
    name        varchar(50) not null,
    quantity    int         not null,
    category_id int,
    OS          varchar(30),
    chipset     varchar(256),
    ram         varchar(20),
    display     varchar(30),
    resolution  varchar(30),
    camera      varchar(30),
    memory      varchar(30),
    pin         varchar(20),
    image       text,
    description text,
    price       double      not null,
    created_at  datetime default current_timestamp,
    updated_at  datetime on update current_timestamp
);

insert into products(name, category_id, description,price, quantity)
values ('Oppo 5x', '4', 'abcoppo', 1000, 10),
       ('Samsung Galaxy X', '2', 'abcoppo', 1500, 3),
       ('IPhone XS', '1', 'abcoppo', 2100, 5),
       ('IPhone XS Max', '1', 'abcoppo', 2500, 12),
       ('Xiaomi ABC', '3', 'abcoppo', 1000, 15);

create table if not exists reviews
(
    id         int primary key auto_increment,
    user_id    int not null,
    product_id int not null,
    content    text,
    rating     int,
    created_at datetime default current_timestamp
);

create table if not exists orders_products
(
    id          int primary key auto_increment,
    order_id    int not null,
    product_id  int not null,
    product_qty int not null
);
insert into orders_products(id, order_id, product_id, product_qty)
values (1, 1, 1, 1);

create table if not exists orders
(
    id          int primary key auto_increment,
    user_id     int         not null,
    phone       varchar(20) not null,
    address     text        not null,
    shipment_id int         not null,
    payment_id  int         not null,
    date        datetime default current_timestamp,
    total_bill  double
);
insert into orders(id, user_id, phone, address, shipment_id, payment_id, total_bill)
values (1, 1, '09', 'abc', 1, 1, 1100);

create table if not exists shipments
(
    id          int primary key auto_increment,
    method      text   not null,
    fee         double not null,
    description text,
    created_at  datetime default current_timestamp,
    updated_at  datetime on update current_timestamp
);
insert into shipments(method, fee, description)
values ('By bike', '5', 'Delivery by bike');

create table if not exists payments
(
    id          int primary key auto_increment,
    method      text not null,
    description text,
    created_at  datetime default current_timestamp,
    updated_at  datetime on update current_timestamp
);
insert into payments(method, description)
values ('COD', 'Cash on delivery');