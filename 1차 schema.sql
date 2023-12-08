 #Order(order_num, price, order_time, count)
 #Employee(E_id, title, e_name, phone_number, password, #order_num)
 
 CREATE DATABASE company_cafe;
 
 use company_cafe;
 
 CREATE TABLE ORDERS(
	order_num int NOT NULL,
    price varchar(45) NOT NULL,
    order_time date,
    count int NOT NULL,
    CONSTRAINT PK_order PRIMARY KEY (order_num)
 );
 
 CREATE TABLE EMPLOYEE(
	e_id int NOT NULL,
    title varchar(45) NOT NULL,
    e_name varchar(45) NOT NULL,
    phone_number varchar(45),
    password varchar(45) NOT NULL,
    order_num INT NOT NULL,
    CONSTRAINT PK_employee PRIMARY KEY (e_id),
    CONSTRAINT FK_employee_orders
    FOREIGN KEY (order_num) REFERENCES ORDERS(order_num)
 );
    
CREATE TABLE MILEAGE(
	e_id int NOT NULL, 
    m_id int NOT NULL,
	total_amount varchar(45),
    CONSTRAINT PK_mileage PRIMARY KEY (m_id, e_id)
);

ALTER TABLE MILEAGE
ADD CONSTRAINT FK_mileage_employee 
FOREIGN KEY (e_id) REFERENCES EMPLOYEE(e_id);

CREATE TABLE CAFE(
	cafe_id int NOT NULL,
    cafe_name varchar(45), 
    phone_number varchar(45),
    operatingHours date,
    city varchar(45),
    ku varchar(45),
    dong varchar(45),
    zipcode varchar(45),
    CONSTRAINT PK_cafe PRIMARY KEY (cafe_id)
);

CREATE TABLE BARISTA(
	b_id int NOT NULL,
    b_name varchar(45),
    working_day varchar(45),
    certification char(2),
    cafe_id int NOT NULL,
    CONSTRAINT PK_barista PRIMARY KEY (b_id),
    CONSTRAINT FK_barista_cafe 
    FOREIGN KEY (cafe_id) REFERENCES CAFE(cafe_id)
);

CREATE TABLE MENU(
	menu_id int NOT NULL,
    price varchar(45) NOT NULL,
    menu_name varchar(45) NOT NULL,
    picture longblob,
    b_id int NOT NULL,
    cafe_id int NOT NULL,
    CONSTRAINT PK_menu PRIMARY KEY (menu_id),
    CONSTRAINT FK_menu_barista
    FOREIGN KEY (b_id) REFERENCES BARISTA(b_id),
    CONSTRAINT FK_menu_cafe
    FOREIGN KEY (cafe_id) REFERENCES CAFE(cafe_id)
);

#ALTER TABLE MENU DROP COLUMN b_id;

CREATE TABLE SATISFACTION(
	satis_id int NOT NULL,
    date date,
    CONSTRAINT PK_SAT PRIMARY KEY (satis_id)
);

CREATE TABLE EVALUATES(
	e_id int NOT NULL,
    satis_id int NOT NULL,
    CONSTRAINT PK_EVA PRIMARY KEY (e_id, satis_id)
);

ALTER TABLE EVALUATES
ADD CONSTRAINT FK_EVA_EMPLOYEE 
FOREIGN KEY (e_id) REFERENCES EMPLOYEE(e_id);

ALTER TABLE EVALUATES
ADD CONSTRAINT FK_EVA_SATIS 
FOREIGN KEY (satis_id) REFERENCES SATISFACTION(satis_id);

CREATE TABLE INCLUDES(
	order_num int NOT NULL,
    menu_id int NOT NULL,
    CONSTRAINT PK_INCLUD PRIMARY KEY (order_num, menu_id)
);

ALTER TABLE INCLUDES
ADD CONSTRAINT FK_INCLUD_ORDERS 
FOREIGN KEY (order_num) REFERENCES ORDERS(order_num);

ALTER TABLE INCLUDES
ADD CONSTRAINT FK_INCLUD_MENU
FOREIGN KEY (menu_id) REFERENCES MENU(menu_id);

CREATE TABLE COMM(
	satis_id int NOT NULL,
    comment varchar(45),
    CONSTRAINT PK_comm PRIMARY KEY (comment, satis_id)
);

ALTER TABLE COMM
ADD CONSTRAINT FK_COMM_SATIS 
FOREIGN KEY (satis_id) REFERENCES SATISFACTION(satis_id);