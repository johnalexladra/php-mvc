<?php

namespace App\Controller;

use App\Core;
use App\Model;
use App\Utility;

/**
 * Index Controller:
 *
 * @author John Alex Ladra <heyitsme@johnalexladra.com>
 * @since 1.0
 */
class Index extends Core\Controller {

    /**
     * Index:
     * @access public
     * @example index/index
     * @return void
     * @since 1.0
     */
    public function index() {
        

        Utility\Redirect::to(404);

        // Check that the user is authenticated.
        Utility\Auth::checkAuthenticated();

        // Get an instance of the user model using the ID stored in the session.
        $userID = Utility\Session::get(Utility\Config::get("SESSION_USER"));
        if (!$User = Model\User::getInstance($userID)) {
            Utility\Redirect::to(APP_URL);
        }

        // Set any dependencies, data and render the view.
        $this->View->addCSS("css/index.css");
        $this->View->addJS("js/index.jquery.js");
        $this->View->render("index/index", [
            "title" => "Index",
            "user" => $User->data()
        ]);
    }

}
