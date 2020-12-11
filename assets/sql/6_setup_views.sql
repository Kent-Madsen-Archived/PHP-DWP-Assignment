use dwp_assignment;

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

CREATE or replace VIEW profile_information_model_view AS
SELECT profile_information.identity     AS profile_information_identity,
       profile_information.profile_id   AS profile_id,
       person_name.first_name           AS person_name_firstname,
       person_name.last_name            AS person_name_lastname,
       person_name.middle_name          AS person_name_middlename,

       person_address.country               AS person_address_country,
       person_address.street_name           AS person_address_street_name,
       person_address.street_address_number AS person_address_number,
       person_address.street_address_floor  AS person_address_floor,
       person_address.city                  as person_address_city,
       person_address.zip_code              AS person_address_zip_code,

       person_email.content                 AS person_email,
       profile_information.birthday as person_birthday,
       profile_information.person_phone as person_phone
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



-- views, which are used for internal purpose only. (ie. used by triggers or functions with a specific purpose in mind)
-- (not public usage).
-- like. calculating a tables total price, and etc.
create view delta_brought_product_view as
select identity,
        invoice_id,
        product_id,
        (price * number_of_products) as total_price_of_product_type,
        registered
        from brought_product;


create or replace view delta_invoice_current_sum_of_invoices as
select pi.identity as product_invoice_id,
       sum(delta_view.total_price_of_product_type) as total_price_of_all_wares
from delta_brought_product_view as delta_view
         left join product_invoice pi on delta_view.invoice_id = pi.identity
group by product_invoice_id;


create view delta_invoice_soi_and_vat as
select  dv.product_invoice_id,
        dv.total_price_of_all_wares,
        (dv.total_price_of_all_wares * 0.25) as vat
from delta_invoice_current_sum_of_invoices as dv;


create or replace view delta_invoice_soi_vat_and_final_price as
select  dv.product_invoice_id,
        dv.total_price_of_all_wares,
        dv.vat,
        (dv.total_price_of_all_wares + dv.vat) as final_price
from delta_invoice_soi_and_vat as dv;

create or replace view delta_view_profile_information as
select dv.profile_id as profile_id, dv.person_address_id, dv.person_email_id, dv.person_name_id
from profile_information as dv;


create view discount_view as
select p.identity as product_id,
       p.description,
       p.price,
       timed_discount.discount_percentage,
       (p.price/100)*timed_discount.discount_percentage as discount_amount,
       p.price - (p.price/100)*timed_discount.discount_percentage as actual_price
from timed_discount
    left join product p on timed_discount.product_id = p.identity;

create view discounts_today as
select *
from timed_discount
where ( discount_begin <= curdate() ) and ( discount_end >= curdate() );

create or replace view delta_timed_discount_for_today as
select *
from timed_discount
where discount_begin <= CURDATE() and discount_end >= CURDATE();

create or replace view delta_all_product_ids as
select identity, discount_tag from product order by identity;

create or replace view delta_product_max_and_min as
select max(identity) as maximum, min(identity) as minimum from product;

create or replace view delta_all_with_no_discount_product_ids as
select identity, discount_tag
from product
where discount_tag is null
order by identity;