drop table wish_shift;

CREATE TABLE wish_shift
(  shift_id integer not null,
   day_id integer not null,
   type integer not null,
   emp_id integer not null,
   PRIMARY KEY (shift_id),
   UNIQUE(day_id,type)
);

insert into wish_shift values(1,1 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(2,1 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(3,1 * 86400 + 1230768000 - 86400,2,0);


insert into wish_shift values(4,2 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(5,2 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(6,2 * 86400 + 1230768000 - 86400,2,0);


insert into wish_shift values(7,3 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(8,3 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(9,3 * 86400 + 1230768000 - 86400,2,0);


insert into wish_shift values(10,4 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(11,4 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(12,4 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(13,5 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(14,5 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(15,5 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(16,6 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(17,6 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(18,6 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(19,7 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(20,7 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(21,7 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(22,8 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(23,8 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(24,8 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(25,9 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(26,9 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(27,9 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(28,10 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(29,10 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(30,10 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(31,11 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(32,11 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(33,11 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(34,12 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(35,12 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(36,12 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(37,13 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(38,13 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(39,13 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(40,14 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(41,14 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(42,14 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(43,15 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(44,15 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(45,15 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(46,16 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(47,16 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(48,16 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(49,17 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(50,17 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(51,17 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(52,18 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(53,18 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(54,18 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(55,19 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(56,19 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(57,19 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(58,20 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(59,20 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(60,20 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(61,21 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(62,21 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(63,21 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(64,22 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(65,22 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(66,22 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(67,23 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(68,23 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(69,23 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(70,24 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(71,24 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(72,24 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(73,25 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(74,25 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(75,25 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(76,26 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(77,26 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(78,26 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(79,27 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(80,27 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(81,27 * 86400 + 1230768000 - 86400,2,0);





