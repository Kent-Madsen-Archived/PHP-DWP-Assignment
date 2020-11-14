
-- Views
CREATE VIEW profile_model_view AS
SELECT profile.identity, 
       profile.username, 
       profile.password, 
       profile_type.content AS profile_type
FROM profile
LEFT JOIN profile_type ON profile.profile_type = profile_type.identity;


CREATE VIEW contact_model_view AS
SELECT contact.subject_title,
       contact.message,
       contact.has_been_send,
       contact.created_on,

       pe_from.content  AS from_email,
       pe_to.content    AS to_email
FROM contact
LEFT JOIN person_email pe_from  ON contact.from_id = pe_from.identity
LEFT JOIN person_email pe_to    ON contact.to_id = pe_to.identity;


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


CREATE VIEW contact_model_view AS
SELECT contact.identity,
       contact.subject_title,
       contact.message,
       contact.has_been_send,
       contact.created_on,
       pe_from.content AS from_mail,
       pe_to.content   AS to_mail
FROM contact
LEFT JOIN person_email pe_from ON pe_from.identity = contact.from_id
LEFT JOIN person_email pe_to   ON pe_to.identity = contact.to_id;


CREATE VIEW product_associated_category_view AS
SELECT associated_category.identity AS associated_category_identity, 
       pc.content AS product_category, 
       pa.content AS product_attribute, 
       associated_category.product_id
FROM associated_category
LEFT JOIN product_category pc   ON associated_category.product_category_id = pc.identity
LEFT JOIN product_attribute pa  ON associated_category.product_attribute_id = pa.identity;


CREATE VIEW product_invoice_view AS
SELECT product_invoice.identity AS invoice_identity,
       product_invoice.total_price AS invoice_total_price,
       product_invoice.invoice_registered AS invoice_registered,
       pa.country AS invoice_address_country,
       pa.street_name AS invoice_address_street_name,
       pa.street_address_number AS invoice_address_number,
       pa.zip_code AS invoice_address_zip_code,
       pe.content AS invoice_mail_to,
       pn.first_name AS invoice_owner_firstname,
       pn.last_name AS invoice_owner_lastname,
       pn.middle_name AS invoice_owner_middle_name
FROM product_invoice
LEFT JOIN person_address pa ON product_invoice.address_id = pa.identity
LEFT JOIN person_email pe ON product_invoice.mail_id = pe.identity
LEFT JOIN person_name pn ON product_invoice.owner_name_id = pn.identity;


CREATE VIEW product_invoice_view_short AS
SELECT product_invoice.identity AS invoice_id,
       product_invoice.total_price,
       product_invoice.invoice_registered,
       concat(pa.street_name, ' ' , pa.street_address_number, ', ', pa.zip_code, ', ' , pa.country) AS owner_address,
       pe.content AS owner_mail,
       concat(pn.first_name,' ' ,pn.last_name,', ', pn.middle_name) AS owner_name
FROM product_invoice
LEFT JOIN person_address pa ON product_invoice.address_id = pa.identity
LEFT JOIN person_email pe ON product_invoice.mail_id = pe.identity
LEFT JOIN person_name pn ON product_invoice.owner_name_id = pn.identity;


CREATE VIEW product_available_units AS
SELECT product.identity, 
       product.title, 
       product.product_description, 
       product.product_price, 
       count(pe.product_id) AS available_unit
FROM product
LEFT JOIN product_entity pe ON product.identity = pe.product_id
GROUP BY product_id;
