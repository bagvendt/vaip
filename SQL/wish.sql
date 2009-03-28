drop table wish;

CREATE TABLE wish
(  shift_id integer not null,
   emp_id integer not null,
   priority integer not null,
   linked boolean not null,
   PRIMARY KEY (shift_id, emp_id)
);

insert into wish values(1,1,3,false);
insert into wish values(2,1,1,false);
insert into wish values(3,1,2,false);
insert into wish values(4,1,3,false);
insert into wish values(5,1,3,false);
insert into wish values(6,1,1,true);
insert into wish values(7,1,3,false);
insert into wish values(8,1,3,false);
insert into wish values(9,1,1,true);
insert into wish values(10,1,2,false);
insert into wish values(11,1,2,false);
insert into wish values(12,1,1,false);

insert into wish values(1,2,2,false);
insert into wish values(2,2,3,false);
insert into wish values(3,2,1,true);
insert into wish values(4,2,3,false);
insert into wish values(5,2,1,false);
insert into wish values(6,2,1,false);
insert into wish values(7,2,2,false);
insert into wish values(8,2,2,false);
insert into wish values(9,2,2,false);
insert into wish values(10,2,3,false);
insert into wish values(11,2,2,false);
insert into wish values(12,2,1,false);

insert into wish values(1,3,3,false);
insert into wish values(2,3,1,false);
insert into wish values(3,3,3,false);
insert into wish values(4,3,1,false);
insert into wish values(5,3,3,false);
insert into wish values(6,3,2,false);
insert into wish values(7,3,1,false);
insert into wish values(8,3,3,false);
insert into wish values(9,3,3,false);
insert into wish values(10,3,1,false);
insert into wish values(11,3,2,false);
insert into wish values(12,3,3,false);