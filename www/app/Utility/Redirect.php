<?php

namespace App\Utility;

/**
 * Description of Redirect
 *
 * @author John Alex Ladra <heyitsme@johnalexladra.com>
 * @since 1.0.1
 */
class Redirect {

    /**
     * To: Redirects to a specific path.
     * @access public
     * @param string $location [optional]
     * @return void
     * @since 1.0.1
     */
    public static function to($location = "") {
        if ($location) {
            header("Location: " . $location);
            exit();
        }
    }

}
