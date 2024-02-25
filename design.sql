create database design;
use design;


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

create table categories(
	id INT auto_increment,
    name VARCHAR(100) NOT NULL unique,
    primary key(id)
);

insert into categories(name) values
('Shirts'),
('Pants'),
('Bags'),
('Coats'),
('Shoes');

DELETE FROM categories WHERE id = 5;

create table brands(
	id INT auto_increment,
    name VARCHAR(100) NOT NULL,
    primary key(id)
);

ALTER TABLE
    products
CHANGE
    producer_id
    brand_id INT;

insert into producers(name) values
('Vuong Vy'),
('Kiki'),
('GIR'),
('Jikarma'),
('Nhu Y');

create table products(
	id INT auto_increment,
    name VARCHAR(255),
    material VARCHAR(255),
    size VARCHAR(225),
    color VARCHAR(20),
    description TEXT,
    category_id INT,
    producer_id INT,
    image TEXT,
    quantity INT,
    price FLOAT,
    primary key (id),
    foreign key (category_id) references categories(id), 
    foreign key (producer_id) references producers(id)
);

create table payment_method (
	id INT auto_increment primary key,
    name VARCHAR(50) NOT NULL
);


SET SQL_SAFE_UPDATES = 0;


insert into products(name, material, size, color, description, brand_id, producer_id, image, quantity, price) values
('Áo phông tay lỡ', 'Cotton', 'S, M, L', 'White, Black, Pink', 'Thiết kế áo thun unisex oversize rộng rãi, thoáng mát.', 1, 1, 'abc', 1000, 17.8 ),
('Quần hộp Unisex', 'Kaki', 'S, M, L', 'White, Black, Green', 'Thiết kế unisex oversize rộng rãi, thoáng mát.', 3 , 2, 'abc', 1000, 16.9 ),
('Áo sweater thỏ rùa', 'Len', 'S, M, L', 'White, Black, Green, BabyPink, Grey', 'Thiết kế unisex oversize rộng rãi, ấm áp.', 2, 3, 'abc', 2000, 20.35 ),
('Áo khoác Unisex', 'Lông cừu, Chất gió xuất dư', 'M, L, XL', 'White, Black, Grey', 'Thiết kế unisex oversize rộng rãi, ấm áp.', 4, 4, 'abc', 900, 25 ),
('Kính Gentle Monster', 'Thép', 'None', 'Black, Grey', ' JENNIE - 1996 01 từ bộ sưu tập J Bentley Home có gọng hình chữ nhật màu đen thổ toán diêm. Gọng kính mắt mèo này bao gồm tròng kính đen, nổi bật bởi những gọng được trang trí bằng vòng kim loại vàng đặc trưng.', 5, 5, 'abc', 30, 100 );

ALTER TABLE
    products
CHANGE
    producer_id
    brand_id INT;

create table orders(
	id INT auto_increment,
    date_buy DATE,
    status INT,
    customer_id INT,
    admin_id INT NOT NULL,
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

update orders set date_buy = '2024-02-01' where id = 4;

select * from orders;

create table order_details(
	clothes_id INT,
    order_id INT,
    price FLOAT,
    quantity INT,
    primary key (clothes_id, order_id)
);
alter table order_details add foreign key (clothes_id) references clothes(id) on delete cascade;
alter table order_details add foreign key (order_id) references orders(id) on delete cascade;
select * from status;
    
use design;
SELECT * FROM order_details ORDER BY order_id;
SELECT * FROM customers;

insert into payment_method(name) values ('cash'), ('online');

SET SQL_SAFE_UPDATES = 0;

SELECT order_details.order_id,
		clothes.image, clothes.name, clothes.description,
		order_details.price, order_details.quantity,
        (order_details.price * order_details.quantity) AS total
FROM order_details
INNER JOIN products ON products.id = order_details.products_id
INNER JOIN orders  ON orders.id = order_details.order_id;

use design;

select * from customers;
select * from admins;
select * from products;
select * from brands;
select * from categories;
select * from orders;
select * from order_details;


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

