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

insert into wish_shift values(13,6 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(14,6 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(15,6 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(16,7 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(17,7 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(18,7 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(19,8 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(20,8 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(21,8 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(22,9 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(23,9 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(24,9 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(25,10 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(26,10 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(27,10 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(28,11 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(29,11 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(30,11 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(31,12 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(32,12 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(33,12 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(34,13 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(35,13 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(36,13 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(37,14 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(38,14 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(39,14 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(40,15 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(41,15 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(42,15 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(43,16 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(44,16 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(45,16 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(46,17 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(47,17 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(48,17 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(49,18 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(50,18 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(51,18 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(52,19 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(53,19 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(54,19 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(55,20 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(56,20 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(57,20 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(58,21 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(59,21 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(60,21 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(61,22 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(62,22 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(63,22 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(64,23 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(65,23 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(66,23 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(67,24 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(68,24 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(69,24 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(70,25 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(71,25 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(72,25 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(73,26 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(74,26 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(75,26 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(76,27 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(77,27 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(78,27 * 86400 + 1230768000 - 86400,2,0);

insert into wish_shift values(79,28 * 86400 + 1230768000 - 86400,0,0);
insert into wish_shift values(80,28 * 86400 + 1230768000 - 86400,1,0);
insert into wish_shift values(81,28 * 86400 + 1230768000 - 86400,2,0);

