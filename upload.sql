/* Clear database */
Drop database if exists dwp_assignment;
create database dwp_assignment;
use dwp_assignment;

/** **/
/* ----------------------------------------------------------------------------------------------------------- */
create table profile_type(
    identity int not null unique auto_increment,
    content varchar(256),
    primary key (identity)
);

insert into profile_type(content) VALUES ('unknown'), ('customer'), ('intern'), ('owner');

create table profile(
    identity int not null unique auto_increment,
    username varchar(256) not null,
    password varchar(1024) not null,
    email varchar(1024) not null,
    profile_type_id int not null,
    unique index(username),
    primary key (identity)
);

create view profile_view as
select profile.identity, profile.username, password, email, pt.content as profile_type
from profile
left join profile_type pt on profile.profile_type_id = pt.identity;


create table profile_information(
    profile_id int not null unique,
    birthday date,
    phone_number varchar(256),
    address varchar(256),
    firstname varchar(256),
    middlename varchar(256),
    lastname varchar(256)
);

/* -------------------------------------------------------------------------------------------------------------- */
create table article(
    identity int unique auto_increment,
    title varchar(256) not null,
    content text not null,
    registered datetime default now(),
    profile_owner_id int not null,
    primary key (identity)
);


/* -------------------------------------------------------------------------------------------------------------- */
create table product_category(
    identity int unique auto_increment,
    content varchar(256),
    primary key (identity)
);


create table product(
    identity int unique auto_increment,
    title varchar(256) not null,
    description text not null,
    category_id int not null,
    primary key (identity)
);

create table invoice(
    identity int not null auto_increment,
    registered datetime not null default now(),
    total double precision not null default 0.0,
    profile_id int not null,
    primary key (identity)
);

create table brought_product_order(
    identity int not null auto_increment,
    invoice_id int,
    product_id int,
    quantity int not null default 0,
    primary key (identity)
);

drop view product_view;

create view product_view as
select product.identity, product.title, product.description, pc.content as product_category, product.prices, product.registered
from product
left join product_category pc on product.category_id = pc.identity;

alter table product
	add registered datetime default now() not null;

    create view articles_use_of_images as
select article_id, image_id, is_primary, i.src
from article_use_image
left join image i on article_use_image.identity = i.identity;

create table product_use_image(
    identity int not null auto_increment,
    product_id int not null,
    image_id int not null,
    is_primary boolean default false not null,
    primary key (identity)
);