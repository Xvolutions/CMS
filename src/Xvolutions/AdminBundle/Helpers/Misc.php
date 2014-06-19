<?php

namespace Xvolutions\AdminBundle\Helpers;

/**
 * Description of Misc
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class Misc {

    /**
     * 
     * This funciton is responsible for fetching the gravatar of the given e-mail
     * 
     * @param type $email Email of the user
     * @param type $default The default image
     * @param type $size The intended image size
     * @return url of the gravatar
     */
    public function fetchGravatar($email, $default = 'http://www.gravatar.com/avatar/', $size = 20) {
        return "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    }

}
