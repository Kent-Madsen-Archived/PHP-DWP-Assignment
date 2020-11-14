
-- Views
create view profile_model_view as
select profile.identity, profile.username, profile.password, profile_type.content as profile_type
from profile
left join profile_type on profile.profile_type = profile_type.identity;


create view contact_model_view as
select contact.subject_title,
       contact.meesage,
       contact.has_been_send,
       contact.created_on,
       pe.content as from_email,
       p2.content as to_email
from contact
left join person_email pe on contact.from_id = pe.identity
left join person_email p2 on contact.to_id = p2.identity;


create view profile_information_model_view as
select profile_information.identity as profile_information_identity,
       profile_information.profile_id as profile_id,
       person_name.first_name as person_name_firstname,
       person_name.last_name as person_name_lastname,
       person_name.middle_name as person_name_middlename,

       person_address.country as person_address_country,
       person_address.street_name as person_address_street_name,
       person_address.street_address_number as person_address_number,
       person_address.zip_code as person_address_zip_code,

       person_email.content as person_email
from profile_information
left join person_name on profile_information.person_name_id = person_name.identity
left join person_address on person_address.identity = profile_information.person_address_id
left join person_email on person_email.identity = profile_information.person_email_id;

create view contact_model_view as
select contact.identity,
       contact.subject_title,
       contact.message,
       contact.has_been_send,
       contact.created_on,
       p1.content as from_mail,
       p2.content as to_mail
from contact
left join person_email p1 on p1.identity = contact.from_id
left join person_email p2 on p2.identity = contact.to_id;

create view product_associated_category_view as
select associated_category.identity as associated_category_identity, pc.content as category, pa.content as attribute, associated_category.product_id
from associated_category
left join product_category pc on associated_category.product_category_id = pc.identity
left join product_attribute pa on associated_category.product_attribute_id = pa.identity;

create view product_invoice_view as
select product_invoice.identity as invoice_identity,
       product_invoice.total_price as invoice_total_price,
       product_invoice.invoice_registered as invoice_registered,
       pa.country as invoice_address_country,
       pa.street_name as invoice_address_street_name,
       pa.street_address_number as invoice_address_number,
       pa.zip_code as invoice_address_zip_code,
       pe.content as invoice_mail_to,
       pn.first_name as invoice_owner_firstname,
       pn.last_name as invoice_owner_lastname,
       pn.middle_name as invoice_owner_middle_name
from product_invoice
left join person_address pa on product_invoice.address_id = pa.identity
left join person_email pe on product_invoice.mail_id = pe.identity
left join person_name pn on product_invoice.owner_name_id = pn.identity;


create view product_invoice_view_short as
select product_invoice.identity as invoice_id,
       product_invoice.total_price,
       product_invoice.invoice_registered,
       concat(pa.street_name, ' ' , pa.street_address_number, ', ', pa.zip_code, ', ' , pa.country) as owner_address,
       pe.content as owner_mail,
       concat(pn.first_name,' ' ,pn.last_name,', ', pn.middle_name) as owner_name
from product_invoice
left join person_address pa on product_invoice.address_id = pa.identity
left join person_email pe on product_invoice.mail_id = pe.identity
left join person_name pn on product_invoice.owner_name_id = pn.identity;

create view product_available_units as
select product.identity, product.title, product.product_description, product.product_price, count(pe.product_id) as available_unit
from product
left join product_entity pe on product.identity = pe.product_id
group by product_id;
