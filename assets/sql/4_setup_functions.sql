use dwp_assignment;

DROP FUNCTION IF EXISTS exists_email;
DROP FUNCTION IF EXISTS is_admin;

DELIMITER //

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
END 

//

DELIMITER ;


DELIMITER //

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
END 

//

DELIMITER ;



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
end;


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
    end;


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
end;


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
end;


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
end;


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
end;
