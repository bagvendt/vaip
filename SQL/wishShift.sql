drop table wish_shift;

CREATE TABLE wish_shift
(  shift_id integer not null,
   day_id integer not null,
   type integer not null,
   emp_id integer not null,
   PRIMARY KEY (shift_id),
   UNIQUE(day_id,type)
);

insert into wish_shift values(1,1,0,0);
insert into wish_shift values(2,1,1,0);
insert into wish_shift values(3,1,2,0);


insert into wish_shift values(4,2,0,0);
insert into wish_shift values(5,2,1,0);
insert into wish_shift values(6,2,2,0);


insert into wish_shift values(7,3,0,0);
insert into wish_shift values(8,3,1,0);
insert into wish_shift values(9,3,2,0);


insert into wish_shift values(10,4,0,0);
insert into wish_shift values(11,4,1,0);
insert into wish_shift values(12,4,2,0);

