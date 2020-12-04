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