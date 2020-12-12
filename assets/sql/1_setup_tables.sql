use dwp_assignment;


-- Creates a new Table
CREATE TABLE product_attribute
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,
    content VARCHAR( 256 ) UNIQUE NOT NULL,
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE product_attribute COMMENT 'An object that represents redundant attributes, that can be used on products, like color, weight, size';


-- Creates a new Table
CREATE TABLE person_email
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,
    content VARCHAR( 256 ) UNIQUE NOT NULL,
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE person_email COMMENT 'An object that represents redundant email addresses. as they can be used in multiple domains.';


-- Creates a new Table
CREATE TABLE person_name
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,

    first_name VARCHAR( 100 ) NOT NULL,
    last_name VARCHAR( 100 ),
    middle_name VARCHAR( 100 ) NOT NULL,

    INDEX( first_name, 
           last_name, 
           middle_name ),

    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE person_name COMMENT 'An object that represents a list of different person names. that are often used';



-- Creates a new Table
CREATE TABLE person_address
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,

    street_name VARCHAR( 256 ) DEFAULT 'none' NOT NULL,
    street_address_number INT DEFAULT 0 NOT NULL,

    street_address_floor VARCHAR( 10 ) DEFAULT NULL,

    zip_code INT DEFAULT 0 NOT NULL,
    
    country VARCHAR( 256 ) DEFAULT 'none' NOT NULL,
    city varchar(256) default 'none' not null,

    INDEX( street_name, 
           street_address_number, 
           street_address_floor, 
           zip_code, 
           country,
           city ),

    PRIMARY KEY( identity )
);


-- Adding commentary to the table
ALTER TABLE person_address COMMENT 'An object that represents an address for a given person. Are used for personal information and invoices, etc.';




-- Creates a new Table
CREATE TABLE product_category
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,
    
    content VARCHAR( 256 ) UNIQUE NOT NULL,

    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE product_category COMMENT 'An object that represents a specific category for a product, if attribute is color, the category can be blue, yellow, orange, etc.';




-- Creates a new Table
CREATE TABLE image_type
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,
    
    content VARCHAR( 256 ) UNIQUE NOT NULL,

    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE image_type COMMENT 'Represents different images types, that can be used on the site, small, preview, large, etc. used by the system to identity the proper size';


CREATE TABLE profile_type
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,
    
    content VARCHAR( 256 ) UNIQUE NOT NULL,
    
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE profile_type COMMENT 'Represents what a given users privileges are. Admin, store clerk, etc.';


-- Creates a new Table
CREATE TABLE associated_category
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,

    product_attribute_id INT NOT NULL,
    product_category_id INT NOT NULL,
    
    product_id INT NOT NULL,

    INDEX( product_attribute_id, 
           product_category_id ),
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE associated_category COMMENT 'represents an Given category given to a product. with an chosen attribute. indicating what type of category its in. ie attribute is color and category is red';


-- Creates a new Table
CREATE TABLE profile_information
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,

    profile_id INT NOT NULL,

    person_name_id      INT NOT NULL,
    person_address_id   INT NOT NULL,
    person_email_id     INT NOT NULL,

    person_phone VARCHAR( 256 ),

    birthday   DATE NOT NULL,

    registered DATETIME DEFAULT now() NOT NULL,

    INDEX( profile_id,
           person_name_id, 
           person_email_id, 
           person_address_id ),
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE profile_information COMMENT 'stores user information for a given user.';




-- Creates a new Table
CREATE TABLE article
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,
    
    title VARCHAR( 256 ) NOT NULL,
    content TEXT DEFAULT '' NOT NULL,
    
    created_on DATETIME DEFAULT now() NOT NULL,
    last_updated DATETIME DEFAULT now() NOT NULL,
    
    INDEX( title, 
           created_on ),
    PRIMARY KEY( identity )
);


-- Adding commentary to the table
ALTER TABLE article COMMENT 'represents article news for the webshop';





-- Creates a new Table
CREATE TABLE profile
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,
    
    username VARCHAR( 256 ) NOT NULL UNIQUE,
    password VARCHAR( 1024 ),

    profile_type INT NOT NULL DEFAULT 1,
    
    INDEX( username, profile_type ),
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE profile COMMENT 'represents an official user in the system. it contains only the users username, password and their privileges';



-- Creates a new Table
CREATE TABLE contact
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,

    title VARCHAR( 256 ) NOT NULL,
    message TEXT NOT NULL,
    
    has_been_send INT DEFAULT 0 NOT NULL,
    
    to_id INT NOT NULL,
    from_id INT NOT NULL,
    
    created_on DATETIME DEFAULT now() NOT NULL,

    INDEX( to_id, 
           from_id, 
           title ),
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE contact COMMENT 'temperary storage, for sending messages to the owner';





-- Creates a new Table
CREATE TABLE product
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,
    
    title VARCHAR( 256 ) NOT NULL,

    description TEXT NOT NULL ,
    price DOUBLE NOT NULL DEFAULT 0.0,
    is_discounted bool not null default false,

    INDEX( title ),
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE product COMMENT 'represents a product, that the consumer can buy';



-- Creates a new Table
CREATE TABLE page_element
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,

    area_key VARCHAR( 256 ) NOT NULL UNIQUE,

    title VARCHAR( 256 ) NOT NULL,
    content TEXT NOT NULL,
    
    created_on      DATETIME DEFAULT now() NOT NULL,
    last_updated    DATETIME DEFAULT now() NOT NULL,
    
    INDEX( title, 
           area_key,
           created_on ),
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE page_element COMMENT 'represents page elements that can be downloaded and shown when needed. used for footer, and information that needs to be shown in specific places';



-- Creates a new Table
CREATE TABLE product_invoice
(
    identity    INT NOT NULL UNIQUE AUTO_INCREMENT,

    total_price DOUBLE DEFAULT 0.0 NOT NULL,
    profile_id int not null,

    registered  DATETIME DEFAULT now() NOT NULL,

    address_id    INT NOT NULL default 0,
    mail_id       INT NOT NULL default 0,
    owner_name_id INT NOT NULL default 0,

    vat double default 0.0 not null,
    status_id int default 1 not null,

    INDEX( address_id, 
           mail_id, 
           owner_name_id ),

    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE product_invoice COMMENT 'Invoice, for when you brought a product';


-- Creates a new Table
CREATE TABLE brought_product
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,
    
    invoice_id INT NOT NULL,

    number_of_products INT NOT NULL DEFAULT 0,
    price DOUBLE NOT NULL DEFAULT 0.0,

    product_id INT NOT NULL,
    
    registered DATETIME NOT NULL DEFAULT now(),

    INDEX( product_id, 
           invoice_id ),
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE brought_product COMMENT 'associatian for product and invoice. telling what a user brought';


-- Creates a new Table
CREATE TABLE product_entity
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,
    arrived DATETIME default now() NOT NULL,
    
    entity_code VARCHAR( 256 ) NOT NULL,

    product_id INT NOT NULL,
    brought_id INT default NULL,
    
    INDEX( product_id, 
           brought_id ),
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE product_entity COMMENT 'represents an physical product in the house';


-- Creates a new Table
CREATE TABLE image
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,

    image_src VARCHAR( 512 ) NOT NULL,
    image_type_id INT NOT NULL default 1,

    title VARCHAR( 256 ) NOT NULL DEFAULT 'no name',
    alt VARCHAR( 256 ) NOT NULL DEFAULT 'no alt text has been inserted',

    parent_id INT NOT NULL,

    registered DATETIME DEFAULT now() NOT NULL,
    last_updated DATETIME DEFAULT now() NOT NULL,

    INDEX( image_src, 
           image_type_id, 
           parent_id ),
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE image COMMENT 'represents an image, that can be shown. it will have a link to its src. it can have children incase it have been edited or made smaller';



-- Creates a new Table
CREATE TABLE product_used_images
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,

    product_id INT NOT NULL,

    image_full_id INT NOT NULL,
    image_preview_id INT NOT NULL,

    is_profile_image INT DEFAULT 0 NOT NULL,

    PRIMARY KEY( identity )
);


-- Adding commentary to the table
ALTER TABLE product_used_images COMMENT 'represents an instance of a image, used for a given product';


create table related_person_address(
                                       profile_id int not null,
                                       person_addr_id int not null,
                                       registered datetime default now() not null
);


create table related_person_email(
                                     profile_id int not null,
                                     person_email_id int not null,
                                     registered datetime default now() not null
);


create table related_person_name(
                                    profile_id int not null,
                                    person_name_id int not null,
                                    registered datetime default now() not null
);

create table product_variation(
                                  product_main_id int not null,
                                  product_variant_of_id int not null
);

create table timed_discount(
                               identity int not null auto_increment,
                               product_id int not null,
                               discount_begin date default now(),
                               discount_end date default now(),
                               discount_percentage int default 10 not null,
                               primary key (identity)
);


create table response_invoice_charged(
                                         identity int not null auto_increment,
                                         invoice_id int not null,
                                         response text not null,
                                         processing_fee double not null,
                                         primary key (identity)
);

create table product_invoice_status(
                                       identity int not null auto_increment,
                                       content varchar(256) not null,
                                       index(content),
                                       primary key (identity)
);