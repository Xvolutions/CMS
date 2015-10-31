<?php

namespace Xvolutions\AdminBundle\Controller;

/**
 * Description of AdminControllerInterface
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
interface AdminControllerInterface
{
    /**
     * Controller responsible to show the backoffice main page
     * 
     * @return type the template
     */
    public function backofficeAction();

    /**
     * Controller responsible to show the setup main page
     * 
     * @return type the template
     */
    public function setupAction();

    /**
     * Controller responsible to show the username
     * 
     * @return type
     */
    public function usernameAction();

    /**
     * Controller responsible to show the gravatar
     * 
     * @return type
     */
    public function gravatarAction();

    /**
     * Displays the PHP info.
     *
     * @return Response A Response instance
     */
    public function phpinfoAction();
}
