
-- Triggers
create trigger person_name_insert_nomalise
before insert on person_name
    for each row
    set NEW.middle_name = lower( NEW.middle_name ),
        NEW.last_name   = lower( NEW.last_name ),
        NEW.first_name  = lower( NEW.first_name );

create trigger person_name_update_nomalise
before update on person_name
    for each row
    set NEW.middle_name = lower( NEW.middle_name ),
        NEW.last_name   = lower( NEW.last_name ),
        NEW.first_name  = lower( NEW.first_name );

create trigger person_email_insert_nomalise
before insert on person_email
    for each row
    set NEW.content = lower( NEW.content );

create trigger person_email_update_nomalise
before update on person_email
    for each row
    set NEW.content = lower( NEW.content );

create trigger person_address_insert_nomalise
before insert on person_address
    for each row
    set NEW.zip_code                = lower( NEW.zip_code ),
        NEW.street_address_number   = lower( NEW.street_address_number ),
        NEW.street_name             = lower( NEW.street_name ),
        NEW.country                 = lower( NEW.country );

create trigger person_address_update_nomalise
before update on person_address
    for each row
    set NEW.zip_code              = lower( NEW.zip_code ),
        NEW.street_address_number = lower( NEW.street_address_number ),
        NEW.street_name           = lower( NEW.street_name ),
        NEW.country               = lower( NEW.country );

create trigger article_on_update__update_timestamp
before update on article
    for each row
    set NEW.last_update = now();

create trigger image_on_update__update_timestamp
before update on image
    for each row
    set NEW.last_updated = now();

create trigger page_element_on_update__update_timestamp
before update on page_element
    for each row
    set NEW.last_update = now();

create trigger profile_type_insert_nomalise
before insert on profile_type
    for each row
    set NEW.content = lower( NEW.content );

create trigger profile_type_update_nomalise
before update on profile_type
    for each row
    set NEW.content = lower( NEW.content );

create trigger product_attribute_insert_nomalise
before insert on product_attribute
    for each row
    set NEW.content = lower( NEW.content );

create trigger product_attribute_update_nomalise
before update on product_attribute
    for each row
    set NEW.content = lower( NEW.content );


create trigger product_category_insert_nomalise
before insert on product_category
    for each row
    set NEW.content = lower( NEW.content );

create trigger product_category_update_nomalise
before update on product_category
    for each row
    set NEW.content = lower( NEW.content );

create trigger profile_normalise_insert_username
before insert on profile
    for each row
    set NEW.username = lower( NEW.username );

create trigger profile_normalise_update_username
before update on profile
    for each row
    set NEW.username = lower( NEW.username );


