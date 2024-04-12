create database lego_store;
use lego_store;

create table admins(
	id INT auto_increment,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL unique,
    password VARCHAR(255) NOT NULL,
    primary key(id)
);


insert into admins(name, email, password) values 
('Tu Nguyen', 'trantranchian@gmail.com', '123456'),
('Chi An', 'chiantrannguyen@gmail.com', '654321'),
('Hoang Vy', 'phanhoangvy@gmail.com', '654321'),
('Duong Minh', 'luuduongminh@gmail.com', '132654'),
('Thanh Hoang', 'lethanhhoang@gmail.com', '132654');

create table customers(
	id INT auto_increment,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL unique,
    password VARCHAR(255),
    phone VARCHAR(255),
    gender INT,
    address TEXT,
    primary key(id)
);

insert into customers(name, email, password, phone, gender, address) values 
('Bao Chau', 'nguyenbaochau@gmail.com', 'guess?', '0123456789', 0, 'TP.HCM'),
('Hoang Dung', 'phanhoangdung@gmail.com', 'clgtbaochau?', '0123456789', 1, 'TP.HCM'),
('Thanh Tu', 'caothanhtu@gmail.com', 'nghiemtuchotao', '0987654321', 0, 'TP.HCM'),
('Le Tien', 'tranletien@gmail.com', 'datpasskieugiday', '01679460283', 1, 'HN'),
('Tong Tran', 'tongtrankhonkho@gmail.com', 'conanancut', '0868888666', 1, 'HN');

select * from customers;

update customers set email='chiantrannguyen@gmail.com' where id =1;

create table categories(
	id INT auto_increment primary key,
    name VARCHAR(100) NOT NULL unique
);

insert into categories(name) values
('Animal'),
('Architecture'),
('City'),
('Creator Expert'),
('Star War');

create table ages(
	id INT auto_increment,
    name VARCHAR(100) NOT NULL,
    primary key(id)
);

delete from ages where  id > 6;
select * from ages;

insert into ages (name) values (2), (4), (6), (9), (13), (18);

select * from age;

create table products(
	id INT auto_increment,
    name VARCHAR(255) NOT NULL,
    size VARCHAR(225) NOT NULL,
    pieces INT(255) NOT NULL,
	insiders_points INT (255) NOT NULL,
    items INT(255) NOT NULL,
    description TEXT NOT NULL,
    category_id INT NOT NULL,
    age_id INT NOT NULL,
    image TEXT,
    quantity INT NOT NULL,
    price FLOAT NOT NULL,
    primary key (id),
    foreign key (category_id) references categories(id), 
    foreign key (age_id) references ages(id)
);


create table payment_method (
	id INT auto_increment primary key,
    name VARCHAR(50) NOT NULL
);
insert into payment_method (name) values ('COD'),('Banking'), ('Momo'), ('VNPAY');

SET SQL_SAFE_UPDATES = 0;

create table orders(
	id INT auto_increment,
    date_buy DATE,
    status INT,
    customer_id INT,
    admin_id INT,
    payment_method INT NOT NULL,
    receiver_name VARCHAR(255) NOT NULL,
    receiver_phone VARCHAR(20) NOT NULL,
    receiver_address TEXT NOT NULL,
    primary key (id)
);

alter table orders add foreign key (customer_id) references customers(id) on delete cascade;
alter table orders add foreign key (admin_id) references admins(id) on delete cascade;
alter table orders add foreign key (payment_method) references payment_method(id) on delete cascade;

insert into orders(date_buy, customer_id, admin_id, status, payment_method) values ('03-09-2024', 2, 1, 1, 1);

alter table orders change payment_method payment_method INT;
select * from orders;

create table order_details(
	product_id INT,
    order_id INT,
    price FLOAT,
    quantity INT,
    primary key (product_id, order_id)
);
alter table order_details add foreign key (product_id) references products(id) on delete cascade;
alter table order_details add foreign key (order_id) references orders(id) on delete cascade;
    
use design;
SELECT * FROM order_details;
SELECT * FROM orders;
SELECT * FROM products;

insert into payment_method(name) values ('cash'), ('online');

SET SQL_SAFE_UPDATES = 0;
update orders set payment_method = 3 where id = 31;

SELECT order_details.order_id,
		clothes.image, clothes.name, clothes.description,
		order_details.price, order_details.quantity,
        (order_details.price * order_details.quantity) AS total
FROM order_details
INNER JOIN products ON products.id = order_details.products_id
INNER JOIN orders  ON orders.id = order_details.order_id;

select * from customers;
select * from admins;
select * from products;
select * from brands;
select * from categories;
select * from orders;
select * from order_details;

delete from orders where id = 49;
select * from payment_method;

update orders set payment_method = 2 where id > 51;


SELECT sum(order_details.quantity) as quantity, orders.date_buy
FROM order_details
INNER JOIN orders ON order_details.order_id = orders.id 
WHERE (MONTH(CURDATE()) - MONTH(date_buy)) = 1 OR (MONTH(CURDATE()) - MONTH(date_buy)) = 0;

SELECT sum(order_details.quantity) as quantity, MONTH(orders.date_buy) as month 
FROM order_details
INNER JOIN orders ON order_details.order_id = orders.id
group by MONTH(orders.date_buy);

SELECT sum(order_details.quantity) as quantity, MONTH(orders.date_buy) as month,
		clothes.name as clothes_name, order_details.clothes_id
FROM order_details
INNER JOIN orders ON order_details.order_id = orders.id
INNER JOIN clothes ON clothes.id = order_details.clothes_id
WHERE orders.status = 2 AND MONTH(orders.date_buy) = 5
GROUP BY order_details.clothes_id
ORDER BY quantity DESC;

        
SELECT order_details.*, clothes.name, sum(order_details.quantity), orders.date_buy 
FROM order_details 
INNER JOIN clothes ON order_details.clothes_id = clothes.id
INNER JOIN orders ON order_details.order_id = orders.id
WHERE MONTH(orders.date_buy) = 9
GROUP BY order_details.clothes_id
ORDER BY SUM(order_details.quantity) DESC;

