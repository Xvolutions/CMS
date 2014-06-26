<?php

namespace Xvolutions\AdminBundle\Helpers;

/**
 * Description of Misc
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class Misc
{

    /**
     * 
     * This funciton is responsible for fetching the gravatar of the given e-mail
     * 
     * @param type $email Email of the user
     * @param type $size The intended image size
     * @return url of the gravatar
     */
    public function fetchGravatar($email, $size = 20)
    {
        return "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?s=" . $size;
    }

    /**
     * This function is repsonsible for generating a 8 char password to be used on password recovery system
     * 
     * @return type string
     */
    public function randomPassword()
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++)
        {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

}
