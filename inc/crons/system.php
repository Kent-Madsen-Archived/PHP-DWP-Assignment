<?php

$is_new = false;
$behind_schedule = false;

    if(!file_exists('./last_updated'))
    {
        $my_files = fopen('./last_updated', "w");
        fwrite($my_files,  strval(time()));
        fclose($my_files);
        $is_new = true;
    }
    else
    {
        $my_files = fopen('./last_updated', "r");
        $val = fread($my_files, filesize('./last_updated'));
        fclose($my_files);

        $time = intval($val);
        $current = intval(time());

        $duration = $current - $time;

        if( $duration > 900 )
        {
            $behind_schedule = true;
            file_put_contents('./last_updated', strval(time()) );
        }
    }

    if($is_new || $behind_schedule)
    {
        session_start();
        session_gc();
        session_destroy();
    }
?>