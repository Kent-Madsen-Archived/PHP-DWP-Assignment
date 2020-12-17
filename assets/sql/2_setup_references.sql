use dwp_assignment;

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
		foreign key ( owner_name_id ) references person_name ( identity ),
	add constraint product_invoice_profile_identity_fk
		foreign key (profile_id) references profile (identity);

alter table product_used_images
	add constraint product_used_images_product_identity_fk
		foreign key (product_id) references product (identity);

alter table product
    add constraint product_timed_discount_identity_fk
        foreign key (discount_tag) references timed_discount (identity);


alter table related_person_address
    add constraint related_person_address_profile_identity_fk
        foreign key (profile_id) references profile (identity),
    add constraint related_person_address_person_address_identity_fk
        foreign key (person_addr_id) references person_address (identity);


alter table related_person_email
    add constraint related_person_email_profile_identity_fk
        foreign key (profile_id) references profile (identity),
    add constraint related_person_email_person_email_identity_fk
        foreign key (person_email_id) references person_email (identity);


alter table related_person_name
    add constraint related_person_name_profile_identity_fk
        foreign key (profile_id) references profile (identity),
    add constraint related_person_name_person_name_identity_fk
        foreign key (person_name_id) references person_name (identity);

alter table product_variation
    add constraint product_variation_product_identity_fk
        foreign key (product_main_id) references product (identity),
    add constraint product_variation_product_identity_fk_2
        foreign key (product_variant_of_id) references product (identity);

alter table timed_discount
    add constraint timed_discount_product_identity_fk
        foreign key (product_id) references product (identity);

alter table response_invoice_charged
    add constraint response_invoice_charged_product_invoice_identity_fk
        foreign key (invoice_id) references product_invoice (identity);


alter table product_invoice_relations
    add constraint product_relations_product_identity_fk
        foreign key (product_a_id) references product (identity),
    add constraint product_relations_product_identity_fk_2
        foreign key (product_b_id) references product (identity);


alter table invoice
    add constraint invoice_invoice_seller_name_identity_fk
        foreign key (contact_invoice_seller_name_id) references invoice_seller_name (identity),
    add constraint invoice_person_address_identity_fk_2
        foreign key (contact_address_id) references person_address (identity),
    add constraint invoice_person_email_identity_fk_2
        foreign key (contact_email_id) references person_email (identity),
    add constraint invoice_image_identity_fk
            foreign key (contact_company_logo_id) references image (identity),
    add constraint invoice_invoice_identity_fk
        foreign key (parent_invoice_id) references invoice (identity),
    add constraint invoice_invoice_status_identity_fk
        foreign key (invoice_status_id) references invoice_status (identity),
    add constraint invoice_invoice_charge_response_identity_fk
        foreign key (invoice_charge_response_id) references invoice_charge_response (identity),
    add constraint invoice_product_invoice_identity_fk
        foreign key (product_invoice_id) references product_invoice (identity),
    add constraint invoice_profile_identity_fk
        foreign key (customer_profile_id) references profile (identity),
    add constraint invoice_person_email_identity_fk
        foreign key (customer_email_id) references person_email (identity),
    add constraint invoice_person_address_identity_fk
        foreign key (customer_address_id) references person_address (identity);

alter table invoice
    add constraint invoice_invoice_cvr_identity_fk
        foreign key (contact_cvr_id) references invoice_cvr (identity);

alter table invoice_charge_response
    add constraint invoice_charge_response_invoice_charge_service_identity_fk
        foreign key (service_id) references invoice_charge_service (identity);

alter table store
    add constraint store_store_key_identity_fk
        foreign key (key_id) references store_key (identity);

alter table profile_remember
	add constraint profile_remember_profile_identity_fk
		foreign key (profile_id) references profile (identity);
