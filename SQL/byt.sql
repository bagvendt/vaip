drop table switch;
drop table switchdata;

CREATE TABLE switch
(  switch_id integer not null,
   sender integer not null,
   receiver integer not null,
   status boolean not null, --true er gennemført byt
   PRIMARY KEY (switch_id)
);

CREATE TABLE switchdata
(  switch_id integer not null,
   day integer not null,
   type integer not null,
   new_emp integer not null,
   PRIMARY KEY (switch_id, day, type)
);