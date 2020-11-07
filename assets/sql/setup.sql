-- 
Drop database if exists dwp_assignment_database;
create database dwp_assignment_database;

--
use dwp_assignment_database;

-- Tables
create table profile
(
    identity int not null auto_increment,
    username varchar(1024) not null unique,
    password varchar(1024),
    profile_type int not null,
    primary key (identity)
);

create table profile_type(
    identity int not null auto_increment,
    content varchar(1024),
    primary key (identity)
);

create table profile_information
(
    identity int not null auto_increment,
    profile_id int not null,

    person_name_id int not null,
    person_address_id int not null,
    person_email_id int not null,

    person_phone varchar(1024),

    birthday datetime not null,
    registered datetime default now() not null,

    primary key (identity)
);

create table person_email
(
    identity int not null auto_increment,
    content varchar(1024) not null,
    primary key (identity)
);

create table person_name
(
    identity int not null auto_increment,

    first_name varchar(1024),
    last_name varchar(1024),
    middle_name varchar(1024),

    primary key (identity)
);

create table person_address
(
    identity int not null auto_increment,

    street_name varchar(1024),
    street_address_number int default 0,

    zip_code int,
    country varchar(1024),

    primary key (identity)
);

create table contact(
    subject_title varchar(1024) not null,
    meesage text not null,
    has_been_send bool,
    createdOn datetime default now(),
    to_id int not null,
    from_id int not null
);


-- Setup references
alter table profile
	add constraint profile_profile_type_identity_fk
		foreign key (profile_type) references profile_type (identity);

alter table profile_information
	add constraint profile_information_profile_identity_fk
		foreign key (profile_id) references profile (identity);

alter table profile_information
	add constraint profile_information_person_name_identity_fk
		foreign key (person_name_id) references person_name (identity);

alter table profile_information
	add constraint profile_information_person_address_identity_fk
		foreign key (person_address_id) references person_address (identity);

alter table profile_information
	add constraint profile_information_person_email_identity_fk
		foreign key (person_email_id) references person_email (identity);

alter table contact
	add constraint contact_person_email_identity_fk
		foreign key (to_id) references person_email (identity);
        
alter table contact
	add constraint contact_person_email_identity_fk_2
		foreign key (from_id) references person_email (identity);

-- Set Default to's
alter table profile alter column profile_type set default 1;

-- Views
create view profile_model_view as
select profile.identity, profile.username, profile.password, profile_type.content as profile_type
from profile
left join profile_type on profile.profile_type = profile.profile_type;
