-- 
Drop database if exists dwp_assignment_database;
create database dwp_assignment_database;

--
use dwp_assignment_database;

-- Tables
create table article
(
    identity int not null auto_increment,
    title varchar(256) not null,
    article_content text,
    created_on datetime default now(),
    last_update datetime default now(),
    primary key (identity)
);

create table product_attribute(
    identity int not null auto_increment,
    content varchar(256) not null,
    primary key (identity)
);

create table product_category(
    identity int not null auto_increment,
    content varchar(256) not null,
    primary key (identity)
);

create table associated_category(
    identity int not null auto_increment,
    product_attribute_id int not null,
    product_category_id int not null,
    product_id int not null,
    primary key (identity)
);

create table product(
    identity int not null auto_increment,
    title varchar(256) not null,
    product_description text not null,
    product_price double not null default 0.0,
    primary key (identity)
);

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

    birthday date not null,
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
    identity int not null auto_increment,
    subject_title varchar(1024) not null,
    message text not null,
    has_been_send int default 0,
    created_on datetime default now(),
    to_id int not null,
    from_id int not null,
    primary key(identity)
);

create table product_invoice(
    identity int not null auto_increment,
    total_price double not null default 0.0,
    invoice_registered datetime default now(),
    primary key (identity)
);

create table brought_product(
    identity int not null auto_increment,
    invoice_id int not null,
    number_of_products int not null default 0,
    price double not null default 0.0,
    product_id int not null,
    registered datetime not null default now(),
    primary key (identity)
);

create table product_entity(
    identity int not null auto_increment primary key,
    arrived datetime default now() not null,
    entity_code varchar(1024) not null,
    product_id int not null,
    brought_id int default null
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

alter table associated_category
	add constraint associated_category_product_attribute_identity_fk
		foreign key (product_attribute_id) references product_attribute (identity);

alter table associated_category
	add constraint associated_category_product_category_identity_fk
		foreign key (product_category_id) references product_category (identity);

alter table associated_category
	add constraint associated_category_product_identity_fk
		foreign key (product_id) references product (identity);

alter table brought_product
	add constraint brought_product_product_invoice_identity_fk
		foreign key (invoice_id) references product_invoice (identity);

alter table brought_product
	add constraint brought_product_product_identity_fk
		foreign key (product_id) references product (identity);

alter table product_entity
	add constraint product_entity_brought_product_identity_fk
		foreign key (brought_id) references brought_product (identity);

alter table product_entity
	add constraint product_entity_product_identity_fk
		foreign key (product_id) references product (identity);




-- Set Default to's
alter table profile alter column profile_type set default 1;

-- Views
create or replace view profile_model_view as
select profile.identity, profile.username, profile.password, profile_type.content as profile_type
from profile
left join profile_type on profile.profile_type = profile_type.identity;


create or replace view contact_model_view as
select contact.subject_title,
       contact.meesage,
       contact.has_been_send,
       contact.created_on,
       pe.content as from_email,
       p2.content as to_email
from contact
left join person_email pe on contact.from_id = pe.identity
left join person_email p2 on contact.to_id = p2.identity;

create view profile_information_model_view as
select profile_information.identity as profile_information_identity,
       profile_information.profile_id as profile_id,
       person_name.first_name as person_name_firstname,
       person_name.last_name as person_name_lastname,
       person_name.middle_name as person_name_middlename,

       person_address.country as person_address_country,
       person_address.street_name as person_address_street_name,
       person_address.street_address_number as person_address_number,
       person_address.zip_code as person_address_zip_code,

       person_email.content as person_email
from profile_information
left join person_name on profile_information.person_name_id = person_name.identity
left join person_address on person_address.identity = profile_information.person_address_id
left join person_email on person_email.identity = profile_information.person_email_id;

create or replace view  contact_model_view as
select contact.identity,
       contact.subject_title,
       contact.message,
       contact.has_been_send,
       contact.created_on,
       p1.content as from_mail,
       p2.content as to_mail
from contact
left join person_email p1 on p1.identity = contact.from_id
left join person_email p2 on p2.identity = contact.to_id;

-- Triggers
create trigger person_name_insert_nomalise
before insert on person_name
    for each row
    set NEW.middle_name = lower(NEW.middle_name),
        NEW.last_name = lower(NEW.last_name),
        NEW.first_name = lower(NEW.first_name);

create trigger person_name_update_nomalise
before update on person_name
    for each row
    set NEW.middle_name = lower(NEW.middle_name),
        NEW.last_name = lower(NEW.last_name),
        NEW.first_name = lower(NEW.first_name);

create trigger person_email_insert_nomalise
before insert on person_email
    for each row
    set NEW.content = lower(NEW.content);

create trigger person_email_update_nomalise
before update on person_email
    for each row
    set NEW.content = lower(NEW.content);

create trigger person_address_insert_nomalise
before insert on person_address
    for each row
    set NEW.zip_code = lower(NEW.zip_code),
        NEW.street_address_number = lower(NEW.street_address_number),
        NEW.street_name = lower(NEW.street_name),
        NEW.country = lower(NEW.country);

create trigger person_address_update_nomalise
before update on person_address
    for each row
    set NEW.zip_code = lower(NEW.zip_code),
        NEW.street_address_number = lower(NEW.street_address_number),
        NEW.street_name = lower(NEW.street_name),
        NEW.country = lower(NEW.country);


create trigger profile_type_insert_nomalise
before insert on profile_type
    for each row
    set NEW.content = lower(NEW.content);

create trigger profile_type_update_nomalise
before update on profile_type
    for each row
    set NEW.content = lower(NEW.content);


create trigger product_attribute_insert_nomalise
before insert on product_attribute
    for each row
    set NEW.content = lower(NEW.content);

create trigger product_attribute_update_nomalise
before update on product_attribute
    for each row
    set NEW.content = lower(NEW.content);


create trigger product_category_insert_nomalise
before insert on product_category
    for each row
    set NEW.content = lower(NEW.content);

create trigger product_category_update_nomalise
before update on product_category
    for each row
    set NEW.content = lower(NEW.content);



-- Insert Values
insert into product_attribute(content)
values('ukendt'),
      ('farve'),
      ('tema'),
      ('form');

insert into product_category(content)
values('ukendt'),
      ('rød'),
      ('gul'),
      ('orange'),
      ('blå'),
      ('halloween'),
      ('jul'),
      ('forår'),
      ('sommer');