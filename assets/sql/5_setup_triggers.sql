
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
        NEW.street_address_stage    = lower( NEW.street_address_stage );



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
        NEW.street_address_stage  = lower( NEW.street_address_stage );