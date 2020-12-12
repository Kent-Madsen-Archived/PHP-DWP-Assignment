<?php
    $product_factory = GroupProduct::getProductFactory();
    $timed_discount_factory = GroupProduct::getProductTimedDiscountFactory();

    $ids = $product_factory->readAllIdentities();
    $size = $timed_discount_factory->readTodaysDiscountSize();

    // Technally 9
    $is_within_size = $size <= 3;

    $id_array_is_not_null = !is_null( $ids );
    $is_id_array_not_empty = $id_array_is_not_null && !( sizeof( $ids ) == 0 );

    if( $is_id_array_not_empty && $is_within_size )
    {
        $small_than_ids_array = array();
        $bigger_than_ids_array = array();

        $index_is_a_real_product = false;

        $states = $product_factory->readMaxAndMin();

        $r_idx = rand( $states['min'],
                       $states['max'] );

        for( $index = 0;
             $index < count( $ids );
             $index ++ )
        {
            $current_product_id = $ids[$index];

            if( $current_product_id == $r_idx )
            {
                $index_is_a_real_product = true;
                break;
            }

            if( $r_idx < $current_product_id )
            {
                array_push($bigger_than_ids_array, $current_product_id );
            }

            if( $r_idx > $current_product_id )
            {
                array_push($small_than_ids_array, $current_product_id );
            }
        }

        if( $index_is_a_real_product )
        {
            $random_chosen_product = $r_idx;
            require 'inc/crons/create_discount.php';
        }
        else
        {
            $calculated_closeness = $states['max'];
            $closest_index = 0;

            if(! ( count( $small_than_ids_array ) == 0 ) )
            {
                foreach ( $small_than_ids_array as $small_idx )
                {
                    $current_closeness = $r_idx - $small_idx;

                    if( $current_closeness <= $calculated_closeness )
                    {
                        $closest_index = $small_idx;
                        $calculated_closeness = $current_closeness;
                    }
                }
            }

            if(! ( count( $bigger_than_ids_array ) == 0 ) )
            {
                foreach ( $bigger_than_ids_array as $bigger_idx )
                {
                    $current_closeness = $bigger_idx - $r_idx;

                    if( $current_closeness <= $calculated_closeness )
                    {
                        $closest_index = $bigger_idx;
                        $calculated_closeness = $current_closeness;
                    }
                }
            }

            $random_chosen_product = $closest_index;

            require 'inc/crons/create_discount.php';
        }
    }
?>