-- functions
create function exists_email( mail varchar( 1024 ) ) returns int
begin
    declare mail_content varchar(1024) default null;
    declare mail_id int default 0;

    declare finished int default 0;
    declare found int default 0;

    declare cursor_for_person_emails cursor for select * from person_email where content = lower(mail);
    declare continue handler for not found set finished=1;

    open cursor_for_person_emails;

    getMails: LOOP
        fetch cursor_for_person_emails into mail_id, mail_content;

        if finished = 1 then
            leave getMails;
        end if;

        if mail_content = mail then
            set found = 1;
        end if;

    end loop;

    close cursor_for_person_emails;

    return found;
end;


create function is_admin(value int) returns int
begin
    declare profile_type_id int default 0;

    declare finished int default 0;
    declare found int default 0;

    declare cursor_for_profile_type cursor for select identity from profile_type where content = lower('adminstrator');
    declare continue handler for not found set finished=1;

    open cursor_for_profile_type;

    getProfileType: LOOP
        fetch cursor_for_profile_type into profile_type_id;

        if finished = 1 then
            leave getProfileType;
        end if;

        if profile_type_id = value then
            set found = 1;
        end if;

    end loop;

    close cursor_for_profile_type;

    return found;
end;