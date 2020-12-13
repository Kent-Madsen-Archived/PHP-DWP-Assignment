SET GLOBAL event_scheduler=ON;

DELIMITER //
create event update_product_discount
    on schedule every 1 hour
        starts current_timestamp
    do
    begin
        call clear_old_discounts();
    end
    //
DELIMITER ;