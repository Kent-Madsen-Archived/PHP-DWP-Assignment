create database dwp_assignment;
use dwp_assignment;

-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    product_attribute CASCADE;

-- Creates a new Table
CREATE TABLE product_attribute
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,
    content VARCHAR( 256 ) UNIQUE NOT NULL,
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE product_attribute COMMENT 'An object that represents redundant attributes, that can be used on products, like color, weight, size';

-- Indicate to software it's done
SELECT 'product_attribute' AS table_name, now() AS time_of_day , 'Created' AS state ;



-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    person_email CASCADE;

-- Creates a new Table
CREATE TABLE person_email
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,
    content VARCHAR( 256 ) UNIQUE NOT NULL,
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE person_email COMMENT 'An object that represents redundant email addresses. as they can be used in multiple domains.';

-- Indicate to software it's done
SELECT 'person_email' AS table_name, now() AS time_of_day , 'Created' AS state ;


-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    person_name CASCADE;

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

-- Indicate to software it's done
SELECT 'person_name' AS table_name, now() AS time_of_day , 'Created' AS state ;



-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    person_address CASCADE;

-- Creates a new Table
CREATE TABLE person_address
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,

    street_name VARCHAR( 256 ) DEFAULT 'none' NOT NULL,
    street_address_number INT DEFAULT 0 NOT NULL,

    street_address_floor VARCHAR( 10 ) DEFAULT NULL,

    zip_code INT DEFAULT 0 NOT NULL,
    country VARCHAR( 256 ) DEFAULT 'none' NOT NULL,

    INDEX( street_name,
           street_address_number,
           street_address_floor,
           zip_code,
           country ),

    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE person_address COMMENT 'An object that represents an address for a given person. Are used for personal information and invoices, etc.';

-- Indicate to software it's done
SELECT 'person_address' AS table_name, now() AS time_of_day , 'Created' AS state ;



-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    product_category CASCADE;

-- Creates a new Table
CREATE TABLE product_category
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,

    content VARCHAR( 256 ) UNIQUE NOT NULL,

    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE product_category COMMENT 'An object that represents a specific category for a product, if attribute is color, the category can be blue, yellow, orange, etc.';

-- Indicate to software it's done
SELECT 'product_category' AS table_name, now() AS time_of_day , 'Created' AS state ;




-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    image_type CASCADE;

-- Creates a new Table
CREATE TABLE image_type
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,

    content VARCHAR( 256 ) UNIQUE NOT NULL,

    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE image_type COMMENT 'Represents different images types, that can be used on the site, small, preview, large, etc. used by the system to identity the proper size';

-- Indicate to software it's done
SELECT 'image_type' AS table_name, now() AS time_of_day , 'Created' AS state ;



-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    profile_type CASCADE;

CREATE TABLE profile_type
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,

    content VARCHAR( 256 ) UNIQUE NOT NULL,

    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE profile_type COMMENT 'Represents what a given users privileges are. Admin, store clerk, etc.';


-- Indicate to software it's done
SELECT 'profile_type' AS table_name, now() AS time_of_day , 'Created' AS state ;





-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    associated_category CASCADE;

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


----- Indicate to software it's done
SELECT 'associated_category' AS table_name, now() AS time_of_day , 'Created' AS state ;




-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    profile_information CASCADE;

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


-- Indicate to software it's done
SELECT 'profile_information' AS table_name, now() AS time_of_day , 'Created' AS state ;



-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    article CASCADE;

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


-- Indicate to software it's done
select 'article' AS table_name, now() AS time_of_day , 'Created' AS state ;




-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    profile CASCADE;

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

-- Indicate to software it's done
SELECT 'profile' AS table_name, now() AS time_of_day , 'Created' AS state;





-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    contact CASCADE;

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


-- Indicate to software it's done
SELECT 'contact'  AS table_name, now() AS time_of_day , 'Created' AS state ;





-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    product CASCADE;

-- Creates a new Table
CREATE TABLE product
(
    identity INT NOT NULL UNIQUE AUTO_INCREMENT,

    title VARCHAR( 256 ) NOT NULL ,

    description TEXT NOT NULL ,
    price DOUBLE NOT NULL DEFAULT 0.0,

    INDEX( title ),
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE product COMMENT 'represents a profuct, that the consumer can buy';

-- Indicate to software it's done
SELECT 'product' AS table_name, now() AS time_of_day , 'Created' AS state ;



-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    page_element CASCADE;

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


-- Indicate to software it's done
SELECT 'page_element' AS table_name, now() AS time_of_day , 'Created' AS state ;




-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    product_invoice CASCADE;

-- Creates a new Table
CREATE TABLE product_invoice
(
    identity    INT NOT NULL UNIQUE AUTO_INCREMENT,

    total_price DOUBLE DEFAULT 0.0 NOT NULL,
    profile_id int not null,

    registered  DATETIME DEFAULT now() NOT NULL,

    address_id    INT NOT NULL,
    mail_id       INT NOT NULL,
    owner_name_id INT NOT NULL,

    INDEX( address_id,
           mail_id,
           owner_name_id ),
    PRIMARY KEY( identity )
);

-- Adding commentary to the table
ALTER TABLE product_invoice COMMENT 'Invoice, for when you brought a product';

-- Indicate to software it's done
SELECT 'product_invoice' AS table_name, now() AS time_of_day , 'Created' AS state ;



-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    brought_product CASCADE;

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


-- Indicate to software it's done
SELECT 'brought_product' AS table_name, now() AS time_of_day , 'Created' AS state ;



-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    product_entity CASCADE;

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


-- Indicate to software it's done
SELECT 'product_entity' AS table_name, now() AS time_of_day , 'Created' AS state ;




-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    image CASCADE;

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


-- Indicate to software it's done
SELECT 'image' AS table_name, now() AS time_of_day , 'Created' AS state ;




-- incase a table with similar name already exist, drop it
DROP TABLE IF EXISTS
    product_used_images CASCADE;

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


-- Indicate to software it's done
SELECT 'product_used_images' AS table_name, now() AS time_of_day , 'Created' AS state ;

-- Setup references
alter table profile
	add constraint p_profiletype_id_fk
		foreign key ( profile_type ) references profile_type ( identity );

alter table profile_information
	add constraint pi_profile_id_fk
		foreign key ( profile_id ) references profile ( identity ),
    add constraint pi_personname_id_fk
		foreign key ( person_name_id ) references person_name ( identity ),
	add constraint pi_personaddress_id_fk
		foreign key ( person_address_id ) references person_address ( identity ),
    add constraint pi_personemail_id_fk
		foreign key ( person_email_id ) references person_email( identity );

alter table contact
	add constraint c_personemail_id_to_fk
		foreign key ( to_id ) references person_email ( identity ),
	add constraint c_personemail_id_from_fk
		foreign key ( from_id ) references person_email ( identity );

alter table associated_category
	add constraint ac_product_att_id_fk
		foreign key ( product_attribute_id ) references product_attribute ( identity ),
	add constraint ac_product_cat_id_fk
		foreign key ( product_category_id ) references product_category ( identity ),
	add constraint ac_product_id_fk
		foreign key ( product_id ) references product ( identity );

alter table brought_product
	add constraint bp_productinvoice_id_fk
		foreign key ( invoice_id ) references product_invoice ( identity ),
	add constraint bp_product_id_fk
		foreign key ( product_id ) references product ( identity );

alter table product_entity
	add constraint pe_brought_product_id_fk
		foreign key ( brought_id ) references brought_product ( identity ),
	add constraint pe_product_id_fk
		foreign key ( product_id ) references product ( identity );

alter table image
	add constraint img_image_id_fk
		foreign key ( parent_id ) references image ( identity ),
	add constraint img_imagetype_id_fk
		foreign key ( image_type_id ) references image_type ( identity );

alter table product_used_images
	add constraint pui_img_preview_id_fk
		foreign key ( image_preview_id ) references image ( identity ),
	add constraint pui_img_full_id
		foreign key ( image_full_id ) references image ( identity );

alter table product_invoice
	add constraint pi__personemail_id_fk
		foreign key ( mail_id ) references person_email ( identity ),
	add constraint pi__personaddress_id_fk
		foreign key ( address_id ) references person_address ( identity ),
    add constraint pi__personname_id_fk
		foreign key ( owner_name_id ) references person_name ( identity );
	add constraint product_invoice_profile_identity_fk
		foreign key (profile_id) references profile (identity);

alter table product_used_images
	add constraint product_used_images_product_identity_fk
		foreign key (product_id) references product (identity);


alter table security
	add constraint security_security_key_identity_fk
		foreign key (key_id) references security_key (identity);

insert into image_type( content )
    values ( 'ukendt' );

insert into person_email( content )
    values ( 'ukendt' );

insert into profile_type( content )
    values ('ukendt'),
           ('kunde'),
           ('medarbejder'),
           ('adminstrator');

insert into product_attribute( content )
    values  ( 'ukendt' ),
            ( 'farve' ),
            ( 'tema' ),
            ( 'form' );


insert into product_category( content )
    values  ( 'ukendt' ),
            ( 'rød' ),
            ( 'gul' ),
            ( 'orange' ),
            ( 'blå' ),
            ( 'halloween' ),
            ( 'jul' ),
            ( 'forår' ),
            ( 'sommer' );


-- functions
CREATE FUNCTION exists_email( mail VARCHAR( 1024 ) ) RETURNS INT
BEGIN
    DECLARE mail_content VARCHAR( 1024 ) DEFAULT NULL;
    DECLARE mail_id INT DEFAULT 0;

    DECLARE finished INT DEFAULT 0;
    DECLARE found INT DEFAULT 0;

    DECLARE cursor_for_person_emails
        CURSOR FOR
            SELECT *
            FROM person_email
            WHERE content = lower( mail );

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;

    OPEN cursor_for_person_emails;

    getMails: LOOP
        FETCH cursor_for_person_emails INTO mail_id,
                                            mail_content;

        IF finished = 1 THEN
            LEAVE getMails;
        END IF;

        IF mail_content = mail THEN
            SET found = 1;
        END IF;

    END LOOP;

    CLOSE cursor_for_person_emails;

    RETURN found;
END;


CREATE FUNCTION is_admin( value int ) RETURNS INT
BEGIN
    DECLARE profile_type_id INT DEFAULT 0;

    DECLARE finished INT DEFAULT 0;
    DECLARE found INT DEFAULT 0;

    DECLARE cursor_for_profile_type
        CURSOR FOR
            SELECT identity
            FROM profile_type
            WHERE content = lower( 'adminstrator' );

    DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;

    OPEN cursor_for_profile_type;

    getProfileType: LOOP
        FETCH cursor_for_profile_type INTO profile_type_id;

        IF finished = 1 THEN
            LEAVE getProfileType;
        END IF;

        IF profile_type_id = value THEN
            SET found = 1;
        END IF;

    END LOOP;

    CLOSE cursor_for_profile_type;

    RETURN found;
END;



-- Triggers
CREATE OR REPLACE TRIGGER person_name_insert_nomalise
BEFORE INSERT
ON person_name
    FOR EACH ROW
    SET NEW.middle_name = lower( NEW.middle_name ),
        NEW.last_name   = lower( NEW.last_name ),
        NEW.first_name  = lower( NEW.first_name );


CREATE OR REPLACE TRIGGER person_email_insert_nomalise
BEFORE INSERT
ON person_email
    FOR EACH ROW
    SET NEW.content = lower( NEW.content );


CREATE OR REPLACE TRIGGER profile_type_insert_nomalise
BEFORE INSERT
ON profile_type
    FOR EACH ROW
    SET NEW.content = lower( NEW.content );


CREATE OR REPLACE TRIGGER product_attribute_insert_nomalise
BEFORE INSERT
ON product_attribute
    FOR EACH ROW
    SET NEW.content = lower( NEW.content );


CREATE OR REPLACE TRIGGER profile_normalise_insert_username
BEFORE INSERT
ON profile
    FOR EACH ROW
    SET NEW.username = lower( NEW.username );


CREATE OR REPLACE TRIGGER person_address_insert_nomalise
BEFORE INSERT
ON person_address
    FOR EACH ROW
    SET NEW.zip_code                = lower( NEW.zip_code ),
        NEW.street_address_number   = lower( NEW.street_address_number ),
        NEW.street_name             = lower( NEW.street_name ),
        NEW.country                 = lower( NEW.country ),
        NEW.street_address_floor    = lower( NEW.street_address_floor );



CREATE OR REPLACE TRIGGER person_email_update_nomalise
BEFORE UPDATE
ON person_email
    FOR EACH ROW
    SET NEW.content = lower( NEW.content );


CREATE OR REPLACE TRIGGER person_name_update_nomalise
BEFORE UPDATE
ON person_name
    FOR EACH ROW
    SET NEW.middle_name = lower( NEW.middle_name ),
        NEW.last_name   = lower( NEW.last_name ),
        NEW.first_name  = lower( NEW.first_name );


CREATE OR REPLACE TRIGGER article_on_update__update_timestamp
BEFORE UPDATE
ON article
    FOR EACH ROW
    SET NEW.last_updated = now();


create OR REPLACE TRIGGER image_on_update__update_timestamp
BEFORE UPDATE
ON image
    FOR EACH ROW
    SET NEW.last_updated = now();


CREATE OR REPLACE TRIGGER page_element_on_update__update_timestamp
BEFORE UPDATE
ON page_element
    FOR EACH ROW
    SET NEW.last_updated = now();


CREATE OR REPLACE TRIGGER product_attribute_update_nomalise
BEFORE UPDATE
ON product_attribute
    FOR EACH ROW
    SET NEW.content = lower( NEW.content );



CREATE OR REPLACE TRIGGER product_category_insert_nomalise
BEFORE UPDATE
ON product_category
    FOR EACH ROW
    SET NEW.content = lower( NEW.content );


CREATE OR REPLACE TRIGGER product_category_update_nomalise
BEFORE UPDATE
ON product_category
    FOR EACH ROW
    SET NEW.content = lower( NEW.content );


CREATE OR REPLACE TRIGGER profile_normalise_update_username
BEFORE UPDATE
ON profile
    FOR EACH ROW
    SET NEW.username = lower( NEW.username );


CREATE OR REPLACE TRIGGER profile_type_update_nomalise
BEFORE UPDATE
ON profile_type
    FOR EACH ROW
    SET NEW.content = lower( NEW.content );


CREATE OR REPLACE TRIGGER person_address_update_nomalise
BEFORE UPDATE
ON person_address
    FOR EACH ROW
    SET NEW.zip_code              = lower( NEW.zip_code ),
        NEW.street_address_number = lower( NEW.street_address_number ),
        NEW.street_name           = lower( NEW.street_name ),
        NEW.country               = lower( NEW.country ),
        NEW.street_address_floor  = lower( NEW.street_address_floor );

-- Views
DROP VIEW IF EXISTS profile_model_view;

CREATE VIEW profile_model_view AS
SELECT profile.identity,
       profile.username,
       profile.password,
       profile_type.content AS profile_type
FROM profile
LEFT JOIN profile_type ON profile.profile_type = profile_type.identity;



DROP VIEW IF EXISTS contact_model_view;

CREATE VIEW contact_model_view AS
SELECT contact.identity,
       contact.title,
       contact.message,
       contact.has_been_send,
       contact.created_on,
       pe_from.content      AS from_mail,
       pe_to.content        AS to_mail
FROM contact
LEFT JOIN person_email pe_from ON pe_from.identity = contact.from_id
LEFT JOIN person_email pe_to   ON pe_to.identity = contact.to_id;



DROP VIEW IF EXISTS profile_information_model_view;

CREATE VIEW profile_information_model_view AS
SELECT profile_information.identity     AS profile_information_identity,

       profile_information.profile_id   AS profile_id,
       person_name.first_name           AS person_name_firstname,
       person_name.last_name            AS person_name_lastname,
       person_name.middle_name          AS person_name_middlename,

       person_address.country               AS person_address_country,
       person_address.street_name           AS person_address_street_name,
       person_address.street_address_number AS person_address_number,
       person_address.zip_code              AS person_address_zip_code,

       person_email.content                 AS person_email
FROM profile_information
LEFT JOIN person_name       ON profile_information.person_name_id = person_name.identity
LEFT JOIN person_address    ON person_address.identity = profile_information.person_address_id
LEFT JOIN person_email      ON person_email.identity = profile_information.person_email_id;



DROP VIEW IF EXISTS product_associated_category_view;

CREATE VIEW product_associated_category_view AS
SELECT associated_category.identity     AS associated_category_identity,
       pc.content                       AS product_category,
       pa.content                       AS product_attribute,
       associated_category.product_id
FROM associated_category
LEFT JOIN product_category pc   ON associated_category.product_category_id = pc.identity
LEFT JOIN product_attribute pa  ON associated_category.product_attribute_id = pa.identity;



DROP VIEW IF EXISTS product_invoice_view;

CREATE VIEW product_invoice_view AS
SELECT product_invoice.identity     AS invoice_identity,
       product_invoice.total_price  AS invoice_total_price,
       product_invoice.registered   AS invoice_registered,

       pa.country               AS invoice_address_country,
       pa.street_name           AS invoice_address_street_name,
       pa.street_address_number AS invoice_address_number,

       pa.zip_code  AS invoice_address_zip_code,
       pe.content   AS invoice_mail_to,

       pn.first_name    AS invoice_owner_firstname,
       pn.last_name     AS invoice_owner_lastname,
       pn.middle_name   AS invoice_owner_middle_name
FROM product_invoice
LEFT JOIN person_address pa ON product_invoice.address_id = pa.identity
LEFT JOIN person_email pe   ON product_invoice.mail_id = pe.identity
LEFT JOIN person_name pn    ON product_invoice.owner_name_id = pn.identity;



DROP VIEW IF EXISTS product_invoice_view_short;

CREATE VIEW product_invoice_view_short  AS
SELECT product_invoice.identity         AS invoice_id,
       product_invoice.total_price,
       product_invoice.registered,
       concat(pa.street_name, ' ' , pa.street_address_number, ', ', pa.zip_code, ', ' , pa.country) AS owner_address,
       pe.content                                                                                   AS owner_mail,
       concat(pn.first_name,' ' ,pn.last_name,', ', pn.middle_name)                                 AS owner_name
FROM product_invoice
LEFT JOIN person_address pa ON product_invoice.address_id = pa.identity
LEFT JOIN person_email pe   ON product_invoice.mail_id = pe.identity
LEFT JOIN person_name pn    ON product_invoice.owner_name_id = pn.identity;



DROP VIEW IF EXISTS product_available_units;

CREATE VIEW product_available_units AS
SELECT product.identity,
       product.title,
       product.description,
       product.price,
       count( pe.product_id ) AS available_unit
FROM product
LEFT JOIN product_entity pe ON product.identity = pe.product_id
GROUP BY product_id;








