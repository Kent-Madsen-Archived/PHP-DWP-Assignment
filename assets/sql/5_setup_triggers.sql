use dwp_assignment;


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

DELIMITER //
create or replace trigger insert_product_price_zero_not_allowed
    before insert
    on product
        for each row
        begin 
            if(NEW.price = 0) then
                    set NEW.price = null;
            end if;
        end
        //
DELIMITER ;

DELIMITER //
create or replace trigger update_product_price_zero_not_allowed
    before update
    on product
    for each row
begin
    if(NEW.price = 0) then
            set NEW.price = null;
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger standard_update_brought_product
    before update
    on brought_product
    for each row
begin
    if(NEW.price = 0) then
            set NEW.price = retrieve_product_price(NEW.product_id);
end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger standard_insert_brought_product
    before insert
    on brought_product
    for each row
begin
    if(NEW.price = 0) then
            set NEW.price = retrieve_product_price(NEW.product_id);
end if;
end
//
DELIMITER ;


DELIMITER //
create or replace trigger insert_brought_calculate_total_price
                    after insert
                    on
                    brought_product for each row
begin
update product_invoice set product_invoice.total_price=retrieve_invoice_final_price(NEW.invoice_id),
                           product_invoice.vat=retrieve_invoice_vat(NEW.invoice_id)
where
        product_invoice.identity = NEW.invoice_id;
end
//
DELIMITER ;


DELIMITER //
create or replace trigger update_brought_calculate_total_price
    after update
    on
        brought_product for each row
begin
    update product_invoice set product_invoice.total_price=retrieve_invoice_final_price(NEW.invoice_id),
                               product_invoice.vat=retrieve_invoice_vat(NEW.invoice_id)
    where
          product_invoice.identity = NEW.invoice_id;
end
//
DELIMITER ;


DELIMITER //
create or replace trigger standard_insert_product_invoice
    before insert
    on product_invoice
    for each row
begin
    if(NEW.address_id = 0) then
            set NEW.address_id = retrieve_profile_address(NEW.profile_id);
end if;

if(NEW.mail_id = 0) then
            set NEW.mail_id = retrieve_profile_email(NEW.profile_id);
end if;

        if(NEW.owner_name_id = 0) then
            set NEW.owner_name_id = retrieve_profile_name(NEW.profile_id);
end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger standard_update_product_invoice
    before update
    on product_invoice
    for each row
begin
    if(NEW.address_id = 0) then
            set NEW.address_id = retrieve_profile_address(NEW.profile_id);
end if;

if(NEW.mail_id = 0) then
            set NEW.mail_id = retrieve_profile_email(NEW.profile_id);
end if;

        if(NEW.owner_name_id = 0) then
            set NEW.owner_name_id = retrieve_profile_name(NEW.profile_id);
end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger relate_person_name_from_profile_info_on_insert
    after insert on profile_information
    for each row
begin
    insert into related_person_name(profile_id, person_name_id)
    values (NEW.profile_id, NEW.person_name_id);
end
//
DELIMITER ;

DELIMITER //
create or replace trigger relate_person_addr_from_profile_info_on_insert
    after insert on profile_information
    for each row
begin
    insert into related_person_address(profile_id, person_addr_id)
    values (NEW.profile_id, NEW.person_address_id);
end
//
DELIMITER ;

DELIMITER //
create or replace trigger relate_person_email_from_profile_info_on_insert
    after insert on profile_information
    for each row
begin
    insert into related_person_email(profile_id, person_email_id)
    values (NEW.profile_id, NEW.person_email_id);
end
//
DELIMITER ;


DELIMITER //
create or replace trigger relate_person_name_from_profile_info_on_update
    after update on profile_information
    for each row
begin
    if(not(NEW.person_name_id = OLD.person_name_id)) then
        insert into related_person_name(profile_id, person_name_id)
        values (NEW.profile_id, NEW.person_name_id);
    end if;
end
//
DELIMITER ;


DELIMITER //
create or replace trigger relate_person_addr_from_profile_info_on_update
    after update on profile_information
    for each row
begin
    if(not(NEW.person_address_id = OLD.person_address_id)) then
        insert into related_person_address(profile_id, person_addr_id)
        values (NEW.profile_id, NEW.person_address_id);
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger relate_person_email_from_profile_info_on_update
    after update on profile_information
    for each row
begin
    if(not(NEW.person_email_id = OLD.person_email_id)) then
        insert into related_person_email(profile_id, person_email_id)
        values (NEW.profile_id, NEW.person_email_id);
    end if;
end
//
DELIMITER ;


DELIMITER //
create or replace trigger insert_timed_discount_update_product_discount
    after insert
    on timed_discount
    for each row
    update product set discount_tag = NEW.identity where product.identity = NEW.product_id and NEW.discount_begin <= CURDATE() and NEW.discount_end >= CURDATE();
//
DELIMITER ;

DELIMITER //
create or replace trigger update_timed_discount_update_product_discount
    after update
    on timed_discount
    for each row
    update product set discount_tag = NEW.identity where product.identity = NEW.product_id and NEW.discount_begin <= CURDATE() and NEW.discount_end >= CURDATE();
//
DELIMITER ;

DELIMITER //
create or replace trigger on_insert_invoice_apply_identifier
    before insert
    on
        invoice for each row
begin
    set NEW.invoice_identifier = CONCAT(CONVERT(DAY(CURRENT_DATE()), CHAR), CONVERT(MONTH(CURRENT_DATE()), CHAR), CONVERT(YEAR(CURRENT_DATE()), CHAR), CONVERT('-', CHAR), CONVERT(LAST_INSERT_ID()+1, CHAR));
end
//
DELIMITER ;

DELIMITER //
create or replace trigger on_insert_invoice_apply_customer_details
    before insert
    on
        invoice for each row
begin
    if(NEW.customer_email_id is null) then
        set NEW.customer_email_id = retrieve_profile_email(NEW.customer_profile_id);
    end if;

    if(NEW.customer_address_id is null) then
        set NEW.customer_address_id = retrieve_profile_address(NEW.customer_profile_id);
    end if;

end
//
DELIMITER ;


DELIMITER //
create or replace trigger on_update_invoice_apply_customer_details
    before update
    on
        invoice for each row
begin
    if(NEW.customer_email_id is null) then
        set NEW.customer_email_id = retrieve_profile_email(NEW.customer_profile_id);
    end if;

    if(NEW.customer_address_id is null) then
        set NEW.customer_address_id = retrieve_profile_address(NEW.customer_profile_id);
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger on_insert_invoice_apply_price
    before insert
    on
        invoice for each row
begin
    if(NEW.charged_price = 0.0) then
        set NEW.charged_price = retrieve_invoice_final_price(NEW.product_invoice_id);
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger on_update_invoice_apply_price
    before update
    on
        invoice for each row
begin
    if(NEW.charged_price = 0.0) then
        set NEW.charged_price = retrieve_invoice_final_price(NEW.product_invoice_id);
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger on_insert_invoice_apply_default_contact_email
    before insert
    on
        invoice for each row
begin
    if(NEW.contact_email_id is null) then
        set NEW.contact_email_id = retrieve_default_contact_email();
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger on_update_invoice_apply_default_contact_seller_name
    before update
    on
        invoice for each row
begin
    if(NEW.contact_invoice_seller_name_id is null) then
        set NEW.contact_invoice_seller_name_id = retrieve_default_contact_seller_name();
    end if;
end
//
DELIMITER ;


DELIMITER //
create or replace trigger on_insert_invoice_apply_default_contact_cvr
    before insert
    on
        invoice for each row
begin
    if(NEW.contact_cvr_id is null) then
        set NEW.contact_cvr_id = retrieve_default_contact_cvr();
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger on_update_invoice_apply_default_contact_cvr
    before update
    on
        invoice for each row
begin
    if(NEW.contact_cvr_id is null) then
        set NEW.contact_cvr_id = retrieve_default_contact_cvr();
    end if;
end
//
DELIMITER ;


DELIMITER //
create or replace trigger on_insert_invoice_apply_default_contact_address
    before insert
    on
        invoice for each row
begin
    if(NEW.contact_address_id is null) then
        set NEW.contact_address_id = retrieve_default_contact_address();
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger on_update_invoice_apply_default_contact_address
    before update
    on
        invoice for each row
begin
    if(NEW.contact_address_id is null) then
        set NEW.contact_address_id = retrieve_default_contact_address();
    end if;
end
//
DELIMITER ;


DELIMITER //
create or replace trigger on_insert_invoice_apply_default_contact_seller_name
    before insert
    on
        invoice for each row
begin
    if(NEW.contact_invoice_seller_name_id is null) then
        set NEW.contact_invoice_seller_name_id = retrieve_default_contact_seller_name();
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger on_update_invoice_apply_default_contact_seller_name
    before update
    on
        invoice for each row
begin
    if(NEW.contact_invoice_seller_name_id is null) then
        set NEW.contact_invoice_seller_name_id = retrieve_default_contact_seller_name();
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger on_insert_invoice_apply_default_contact_email
    before insert
    on
        invoice for each row
begin
    if(NEW.contact_email_id is null) then
        set NEW.contact_email_id = retrieve_default_contact_email();
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger on_update_invoice_apply_default_contact_email
    before update
    on
        invoice for each row
begin
    if(NEW.contact_email_id is null) then
        set NEW.contact_email_id = retrieve_default_contact_email();
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger on_insert_invoice_apply_default_contact_cvr
    before insert
    on
        invoice for each row
begin
    if(NEW.contact_cvr_id is null) then
        set NEW.contact_cvr_id = retrieve_default_contact_cvr();
    end if;
end
//
DELIMITER ;


DELIMITER //
create or replace trigger on_update_invoice_apply_default_contact_cvr
    before update
    on
        invoice for each row
begin
    if(NEW.contact_cvr_id is null) then
        set NEW.contact_cvr_id = retrieve_default_contact_cvr();
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger on_insert_invoice_apply_default_contact_address
    before insert
    on
        invoice for each row
begin
    if(NEW.contact_address_id is null) then
        set NEW.contact_address_id = retrieve_default_contact_address();
    end if;
end
//
DELIMITER ;

DELIMITER //
create or replace trigger on_update_invoice_apply_default_contact_address
    before update
    on
        invoice for each row
begin
    if(NEW.contact_address_id is null) then
        set NEW.contact_address_id = retrieve_default_contact_address();
    end if;
end
//
DELIMITER ;

