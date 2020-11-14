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