create table product_attribute
(
    identity int not null auto_increment,
    content varchar( 256 ) not null,
    primary key ( identity )
);

create table person_email
(
    identity int not null auto_increment,
    content varchar( 256 ) unique not null,
    primary key ( identity )
);

create table person_name
(
    identity int not null auto_increment,

    first_name varchar( 256 ) not null,
    last_name varchar( 256 ),
    middle_name varchar( 256 ) not null,

    primary key ( identity )
);

create table person_address
(
    identity int not null auto_increment,

    street_name varchar( 256 ),
    street_address_number int default 0,

    zip_code int,
    country varchar( 256 ),

    primary key ( identity )
);

create table product_category
(
    identity int not null auto_increment,
    
    content varchar( 256 ) not null,
    
    primary key ( identity )
);

create table image_type
(
    identity int not null auto_increment,
    
    content varchar( 256 ) not null,
    
    primary key ( identity )
);

create table profile_type
(
    identity int not null auto_increment,
    
    content varchar( 256 ) unique not null,

    primary key ( identity )
);

create table associated_category
(
    identity int not null auto_increment,

    product_attribute_id int not null,
    product_category_id int not null,
    
    product_id int not null,
    
    primary key ( identity )
);

create table profile_information
(
    identity int not null auto_increment,

    profile_id int not null,

    person_name_id int not null,
    person_address_id int not null,
    person_email_id int not null,

    person_phone varchar( 256 ),

    birthday date not null,
    registered datetime default now() not null,

    primary key ( identity )
);

create table article
(
    identity int not null auto_increment,
    
    title varchar( 256 ) not null,
    article_content text,
    
    created_on datetime default now(),
    last_update datetime default now(),
    
    primary key ( identity )
);

create table profile
(
    identity int not null auto_increment,
    
    username varchar( 256 ) not null unique,
    password varchar( 1024 ),

    profile_type int not null,
    
    primary key ( identity )
);

create table contact
(
    identity int not null auto_increment,

    subject_title varchar( 256 ) not null,
    message text not null,
    
    has_been_send int default 0,
    
    to_id int not null,
    from_id int not null,
    
    created_on datetime default now(),

    primary key( identity )
);

create table product
(
    identity int not null auto_increment,
    
    title varchar( 256 ) not null,

    product_description text not null,
    product_price double not null default 0.0,
    
    primary key ( identity )
);

create table page_element
(
    identity int not null auto_increment,

    area_key varchar( 256 ) not null unique,
    title varchar( 256 ) not null,
    content text not null,
    
    created_on datetime default now(),
    last_update datetime default now(),
    
    primary key ( identity )
);


create table product_invoice
(
    identity int not null auto_increment,

    total_price double not null default 0.0,
    invoice_registered datetime default now(),

    address_id int not null,
    mail_id int not null,
    owner_name_id int null,

    primary key ( identity )
);

create table brought_product
(
    identity int not null auto_increment,
    
    invoice_id int not null,
    number_of_products int not null default 0,
    price double not null default 0.0,
    product_id int not null,
    
    registered datetime not null default now(),

    primary key ( identity )
);

create table product_entity
(
    identity int not null auto_increment,
    arrived datetime default now() not null,
    
    entity_code varchar( 256 ) not null,

    product_id int not null,
    brought_id int default null,

    primary key ( identity )
);

create table image
(
    identity int not null auto_increment,

    image_src varchar( 512 ) not null,
    image_type_id int not null default 1,

    title varchar( 256 ) not null default 'no name',
    alt varchar( 256 ) not null default 'no alt text has been inserted',

    parent_id int not null,

    registered datetime default now() not null,
    last_updated datetime default now() not null,

    primary key ( identity )
);

create table product_used_images
(
    identity int not null auto_increment,
    
    image_preview_id int not null,
    image_full_id int not null,
    is_profil_image int not null,

    primary key ( identity )
);