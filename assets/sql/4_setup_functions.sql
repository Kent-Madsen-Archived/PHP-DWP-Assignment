use dwp_assignment;

DELIMITER //

CREATE OR REPLACE FUNCTION exists_email( mail VARCHAR( 1024 ) ) RETURNS INT
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
END 

//

DELIMITER ;


DELIMITER //

CREATE OR REPLACE FUNCTION is_admin( value int ) RETURNS INT
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
END 

//

DELIMITER ;


DELIMITER //

create or replace function retrieve_invoice_vat( id int )
    returns double
    begin
        declare invoice_id int default id;
        declare invoice_vat double default 0.0;
        declare retVal double default null;

        declare is_finished int default 0;

        declare fetch_calculations cursor for
            select delta_invoice_soi_vat_and_final_price.product_invoice_id,
                   delta_invoice_soi_vat_and_final_price.vat
            from delta_invoice_soi_vat_and_final_price
            where delta_invoice_soi_vat_and_final_price.product_invoice_id = invoice_id;

        declare continue handler for not found set is_finished = 1;

        open fetch_calculations;

        getCalc: loop
            fetch fetch_calculations into invoice_id, invoice_vat;

            if(invoice_id = id) then
                set is_finished = 1;
                set retVal = invoice_vat;
            end if;

            if(is_finished = 1) then
                leave getCalc;
            end if;
        end loop;

        close fetch_calculations;
    return retVal;
end

//

DELIMITER ;

DELIMITER //
create or replace function retrieve_invoice_final_price( id int )
    returns double
    begin
        declare invoice_id int default id;
        declare invoice_final_price double default 0.0;
        declare retVal double default null;

        declare is_finished int default 0;

        declare fetch_calculations cursor for
            select delta_invoice_soi_vat_and_final_price.product_invoice_id,
                    delta_invoice_soi_vat_and_final_price.final_price
            from delta_invoice_soi_vat_and_final_price
            where delta_invoice_soi_vat_and_final_price.product_invoice_id = invoice_id;

        declare continue handler for not found set is_finished = 1;

        open fetch_calculations;

        getCalc: loop
            fetch fetch_calculations into invoice_id, invoice_final_price;

            if(invoice_id = id) then
                set is_finished = 1;
                set retVal = invoice_final_price;
            end if;

            if(is_finished = 1) then
                leave getCalc;
            end if;
        end loop;

        close fetch_calculations;
        return retVal;
    end
    //
DELIMITER ;

DELIMITER //
create or replace function retrieve_product_price( product_id_var int )
    returns double
begin
        declare product_id int default product_id_var;
        declare product_price double default null;
        declare retVal double default null;

        declare is_finished int default 0;

        declare fetch_products cursor for
select product.identity, product.price from product where product.identity = product_id_var;

declare continue handler for not found set is_finished = 1;

open fetch_products;

getCalc: loop
            fetch fetch_products into product_id, product_price;

            if(product_id = product_id_var) then
                set is_finished = 1;
                set retVal = product_price;
end if;

            if(is_finished = 1) then
                leave getCalc;
end if;
end loop;

close fetch_products;
return retVal;
end
//
DELIMITER ;

DELIMITER //
--
create or replace function retrieve_profile_name( profile_id_var int )
    returns int
begin
        declare prof_id int default profile_id_var;
        declare prof_name_id int default null;
        declare retVal double default null;

        declare is_finished int default 0;

        declare fetch_profile cursor for
select dv.profile_id, dv.person_name_id from delta_view_profile_information as dv where dv.profile_id = profile_id_var;

declare continue handler for not found set is_finished = 1;

open fetch_profile;

getName: loop
            fetch fetch_profile into prof_id, prof_name_id;

            if(prof_id=profile_id_var) then
                set retVal = prof_name_id;
                set is_finished=1;
end if;

            if(is_finished=1) then
                leave getName;
end if;
end loop;

close fetch_profile;
return retVal;
end
//
DELIMITER ;

DELIMITER //
--
create or replace function retrieve_profile_address( profile_id_var int )
    returns int
begin
        declare prof_id int default profile_id_var;
        declare prof_addr_id int default null;
        declare retVal double default null;

        declare is_finished int default 0;

        declare fetch_profile cursor for
select dv.profile_id, dv.person_address_id from delta_view_profile_information as dv where dv.profile_id = profile_id_var;

declare continue handler for not found set is_finished = 1;

open fetch_profile;

getName: loop
            fetch fetch_profile into prof_id, prof_addr_id;

            if(prof_id=profile_id_var) then
                set retVal = prof_addr_id;
                set is_finished=1;
end if;

            if(is_finished=1) then
                leave getName;
end if;
end loop;

close fetch_profile;
return retVal;
end
//
DELIMITER ;

DELIMITER //
--
create or replace function retrieve_profile_email( profile_id_var int )
    returns int
begin
        declare prof_id int default profile_id_var;
        declare prof_email_id int default null;
        declare retVal double default null;

        declare is_finished int default 0;

        declare fetch_profile cursor for
select dv.profile_id, dv.person_email_id from delta_view_profile_information as dv where dv.profile_id = profile_id_var;

declare continue handler for not found set is_finished = 1;

open fetch_profile;

getName: loop
            fetch fetch_profile into prof_id, prof_email_id;

            if(prof_id=profile_id_var) then
                set retVal = prof_email_id;
                set is_finished=1;
end if;

            if(is_finished=1) then
                leave getName;
end if;
end loop;

close fetch_profile;
return retVal;
end
//
DELIMITER ;

DELIMITER //
create or replace function is_product_on_discount_today( product_id_var int ) returns int
begin
    declare finished int default 0;
    declare retVal int default 0;

    declare discount_product_id int default 0;

    declare cursor_for_discount cursor for
        select product_id from delta_timed_discount_for_today;

    declare continue handler for not found set finished=1;

    open cursor_for_discount;

    discount_loop: loop
        fetch cursor_for_discount into discount_product_id;

        if(discount_product_id=product_id_var) then
            set retVal = 1;
        end if;

        if(finished=1) then
            leave discount_loop;
        end if;
    end loop;

    close cursor_for_discount;
    return retVal;
end
//
DELIMITER ;

DELIMITER //
create or replace function retrieve_todays_discount_size() returns int
begin

    declare finished int default 0;
    declare retVal int default 0;
    declare size int default 0;

    declare cursor_for_n_discount cursor for
        select count(*) as number_of_discounts from delta_timed_discount_for_today;
    declare continue handler for not found set finished=1;

    open cursor_for_n_discount;

    number_loop: loop
        fetch cursor_for_n_discount into size;

        set retVal = size;

        if(finished) then
            leave number_loop;
        end if;
    end loop;

    close cursor_for_n_discount;
    return retVal;
end
//
DELIMITER ;

DELIMITER //
create or replace procedure clear_old_discounts()
begin
    declare is_done int default 0;

    declare prod_id int default null;
    declare prod_dis_end date default null;

    declare discount_cursor cursor for select * from delta_discount;
    declare continue handler for not found set is_done = 1;

    open discount_cursor;

    product_loop: loop
        fetch discount_cursor into prod_id, prod_dis_end;

        if(curdate() > prod_dis_end) then
            update product set discount_tag = null where product.identity = prod_id;
        end if;

        if(is_done=1) then
            leave product_loop;
        end if;
    end loop;

    close discount_cursor;
end
//
DELIMITER ;


DELIMITER //
create or replace function retrieve_default_contact_email()
    returns int
begin
    declare is_done int default 0;
    declare retval int default 0;

    declare store_cursor cursor for select stored_value from store_view where stored_key = 'contact_email_id';
    declare continue handler for not found set is_done =1;

    open store_cursor;

    store_loop: loop
        fetch store_cursor into retval;

        if(is_done=1) then
            leave store_loop;
        end if;
    end loop;

    close store_cursor;
    return retval;
end
//
DELIMITER ;

DELIMITER //
create or replace function retrieve_default_contact_cvr()
    returns int
begin
    declare is_done int default 0;
    declare retval int default 0;

    declare store_cursor cursor for select stored_value from store_view where stored_key = 'contact_cvr_id';
    declare continue handler for not found set is_done =1;

    open store_cursor;

    store_loop: loop
        fetch store_cursor into retval;

        if(is_done=1) then
            leave store_loop;
        end if;
    end loop;

    close store_cursor;
    return retval;
end
//
DELIMITER ;

DELIMITER //
create or replace function retrieve_default_contact_address()
    returns int
begin
    declare is_done int default 0;
    declare retval int default 0;

    declare store_cursor cursor for select stored_value from store_view where stored_key = 'contact_address_id';
    declare continue handler for not found set is_done =1;

    open store_cursor;

    store_loop: loop
        fetch store_cursor into retval;

        if(is_done=1) then
            leave store_loop;
        end if;
    end loop;

    close store_cursor;
    return retval;
end
//
DELIMITER ;

DELIMITER //
create or replace function retrieve_default_contact_seller_name()
    returns int
begin
    declare is_done int default 0;
    declare retval int default 0;

    declare store_cursor cursor for select stored_value from store_view where stored_key = 'contact_invoice_seller_name_id';
    declare continue handler for not found set is_done =1;

    open store_cursor;

    store_loop: loop
        fetch store_cursor into retval;

        if(is_done=1) then
            leave store_loop;
        end if;
    end loop;

    close store_cursor;
    return retval;
end
//
DELIMITER ;

DELIMITER //
create or replace procedure insert_charge_stripe_response(in response text)
begin
    insert into invoice_charge_response(service_id, response)
    values (retrieve_charge_service('stripe'), response);
end
//
DELIMITER ;

DELIMITER //
create or replace function retrieve_charge_service( service_name varchar(256) )
    returns int
begin
    declare retVal int default null;

    declare is_finished int default 0;

    declare fetch_invoice_charge_service cursor for
        select identity from invoice_charge_service where lower(content) = lower(service_name);

    declare continue handler for not found set is_finished = 1;

    open fetch_invoice_charge_service;

    getService: loop
        fetch fetch_invoice_charge_service into retVal;

        if(is_finished=1) then
            leave getService;
        end if;
    end loop;

    close fetch_invoice_charge_service;
    return retVal;
end
//
DELIMITER ;

DELIMITER //
create or replace function retrieve_product_is_on_discount( product_id int )
    returns int
begin
    declare retVal int default null;
    declare discount_tag_var int default null;

    declare is_finished int default 0;

    declare fetch_product cursor for
        select discount_tag from product where product.identity=product_id;

    declare continue handler for not found set is_finished = 1;

    open fetch_product;

    getService: loop
        fetch fetch_product into discount_tag_var;

        set retVal = discount_tag_var;

        if(is_finished=1) then
            leave getService;
        end if;
    end loop;

    close fetch_product;
    return retVal;
end;
//
DELIMITER ;

DELIMITER //
create or replace function retrieve_product_discount_price( product_id_var int )
    returns double
begin
    declare product_price double default null;

    declare retVal double default null;

    declare is_finished int default 0;

    declare fetch_products cursor for
        select discount_view.actual_price from discount_view where discount_view.product_id = product_id_var;

    declare continue handler for not found set is_finished = 1;

    open fetch_products;

    getCalc: loop
        fetch fetch_products into product_price;

        set retVal = product_price;

        if(is_finished = 1) then
            leave getCalc;
        end if;
    end loop;

    close fetch_products;
    return retVal;
end;
//
DELIMITER ;

DELIMITER //
create procedure insert_product_variation(in product_a_id int, in product_b_id int )
begin
    insert into product_variation(product_main_id, product_variant_of_id)
    values (product_a_id, product_b_id),
           (product_b_id, product_a_id);
end

//
DELIMITER ;