drop table wish_employee;

CREATE TABLE wish_employee
(  emp_id integer not null,
   assigned integer not null,
   max integer not null,
   PRIMARY KEY (emp_id)
);

insert into wish_employee values(1,0,5);
insert into wish_employee values(2,0,5);
insert into wish_employee values(3,0,5);