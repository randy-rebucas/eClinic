<?php

if (! function_exists('populateLists')) {
    function populateLists(Array $lists, Array $allowedItems): Array
    {
        return array_flip(
            array_filter(
                array_flip($lists), function ($key) use ($allowedItems)
                {
                    return in_array($key, $allowedItems);
                }
            )
        );
    }
}

if (! function_exists('hoursRange')) {
    function hoursRange( $lower = 0, $upper = 86400, $step = 3600, $format = '' ) {
        $times = array();

        if ( empty( $format ) ) {
            $format = 'g:i a';
        }

        foreach ( range( $lower, $upper, $step ) as $increment ) {
            $increment = gmdate( 'H:i', $increment );

            list( $hour, $minutes ) = explode( ':', $increment );

            $date = new DateTime( $hour . ':' . $minutes );

            $times[(string) $increment] = $date->format( $format );
        }

        return $times;
    }
}
?>
