drop table users;
drop table employee;
drop table shift;

CREATE TABLE USERS (user_id INT PRIMARY KEY, email VARCHAR(20) , password CHAR (32) , employee_id int);
CREATE TABLE EMPLOYEE (empid INT PRIMARY KEY, name TINYTEXT , address TINYTEXT , email VARCHAR(30) , phone INT (8));
CREATE TABLE SHIFT (dayid INT, type INT , userid INT , message TINYTEXT);

INSERT INTO USERS VALUES (1 , 'mgmano@gmail.com' , '80dd4a4b01787278316aa488de26dd38' , 1);
INSERT INTO USERS VALUES (2 , 'essif@hotmail.com' , '80dd4a4b01787278316aa488de26dd38' , 2);
INSERT INTO USERS VALUES (3 , 'thehallas@gmail.com' , '80dd4a4b01787278316aa488de26dd38' , 3);

INSERT INTO EMPLOYEE VALUES (1 , 'Marcus' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (2 , 'Andreas' , 'Fuglead' , 'essif@hotmail.com' , 12345678);
INSERT INTO EMPLOYEE VALUES (3 , 'Christoffer' , 'Fyrbøder' , 'thehallas@gmail.com' , 87654321);
INSERT INTO EMPLOYEE VALUES (4 , '4' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (5 , '5' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (6 , '6' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (7 , '7' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (8 , '8' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (9 , '9' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (10 , '10' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (11 , '11' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (12 , '12' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (13 , '13' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (14 , '14' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (15 , '15' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (16 , '16' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (17 , '17' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (18 , '18' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (19 , '19' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);
INSERT INTO EMPLOYEE VALUES (20 , '20' , 'Amagerbrogade' , 'mgmano@gmail.com' , 28589234);



