<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * xvolutionscmsDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class xvolutionscmsDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/css')) {
            if (0 === strpos($pathinfo, '/css/7c463a9')) {
                // _assetic_7c463a9
                if ($pathinfo === '/css/7c463a9.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '7c463a9',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_7c463a9',);
                }

                // _assetic_7c463a9_0
                if ($pathinfo === '/css/7c463a9_login_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '7c463a9',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_7c463a9_0',);
                }

            }

            if (0 === strpos($pathinfo, '/css/e62f3c5')) {
                // _assetic_e62f3c5
                if ($pathinfo === '/css/e62f3c5.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'e62f3c5',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_e62f3c5',);
                }

                // _assetic_e62f3c5_0
                if ($pathinfo === '/css/e62f3c5_backoffice_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'e62f3c5',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_e62f3c5_0',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/images')) {
            if (0 === strpos($pathinfo, '/images/4b709cd')) {
                // _assetic_4b709cd
                if ($pathinfo === '/images/4b709cd.ico') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '4b709cd',  'pos' => NULL,  '_format' => 'ico',  '_route' => '_assetic_4b709cd',);
                }

                // _assetic_4b709cd_0
                if ($pathinfo === '/images/4b709cd_favicon_1.ico') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '4b709cd',  'pos' => 0,  '_format' => 'ico',  '_route' => '_assetic_4b709cd_0',);
                }

            }

            if (0 === strpos($pathinfo, '/images/a804ca8')) {
                // _assetic_a804ca8
                if ($pathinfo === '/images/a804ca8.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'a804ca8',  'pos' => NULL,  '_format' => 'png',  '_route' => '_assetic_a804ca8',);
                }

                // _assetic_a804ca8_0
                if ($pathinfo === '/images/a804ca8_apple-touch-icon-144-precomposed_1.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'a804ca8',  'pos' => 0,  '_format' => 'png',  '_route' => '_assetic_a804ca8_0',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/css/4a033c5')) {
            // _assetic_4a033c5
            if ($pathinfo === '/css/4a033c5.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '4a033c5',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_4a033c5',);
            }

            // _assetic_4a033c5_0
            if ($pathinfo === '/css/4a033c5_bootstrap.min_1.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '4a033c5',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_4a033c5_0',);
            }

        }

        if (0 === strpos($pathinfo, '/js/a1d6081')) {
            // _assetic_a1d6081
            if ($pathinfo === '/js/a1d6081.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'a1d6081',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_a1d6081',);
            }

            if (0 === strpos($pathinfo, '/js/a1d6081_')) {
                // _assetic_a1d6081_0
                if ($pathinfo === '/js/a1d6081_jquery-1.11.0.min_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'a1d6081',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_a1d6081_0',);
                }

                // _assetic_a1d6081_1
                if ($pathinfo === '/js/a1d6081_bootstrap.min_2.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'a1d6081',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_a1d6081_1',);
                }

                // _assetic_a1d6081_2
                if ($pathinfo === '/js/a1d6081_selectforremoval.min_3.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'a1d6081',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_a1d6081_2',);
                }

                // _assetic_a1d6081_3
                if ($pathinfo === '/js/a1d6081_delete.min_4.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'a1d6081',  'pos' => 3,  '_format' => 'js',  '_route' => '_assetic_a1d6081_3',);
                }

                // _assetic_a1d6081_4
                if ($pathinfo === '/js/a1d6081_hide_alerts.min_5.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'a1d6081',  'pos' => 4,  '_format' => 'js',  '_route' => '_assetic_a1d6081_4',);
                }

                // _assetic_a1d6081_5
                if ($pathinfo === '/js/a1d6081_seturl.min_6.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'a1d6081',  'pos' => 5,  '_format' => 'js',  '_route' => '_assetic_a1d6081_5',);
                }

                // _assetic_a1d6081_6
                if ($pathinfo === '/js/a1d6081_dropzone.min_7.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'a1d6081',  'pos' => 6,  '_format' => 'js',  '_route' => '_assetic_a1d6081_6',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // login
            if (rtrim($pathinfo, '/') === '/admin') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_login;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'login');
                }

                return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
            }
            not_login:

            if (0 === strpos($pathinfo, '/admin/log')) {
                // login_check
                if ($pathinfo === '/admin/login_check') {
                    return array('_route' => 'login_check');
                }

                // logout
                if ($pathinfo === '/admin/logout') {
                    return array('_route' => 'logout');
                }

            }

            // recover
            if ($pathinfo === '/admin/recover') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_recover;
                }

                return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\SecurityController::recoverAction',  '_route' => 'recover',);
            }
            not_recover:

            // backoffice
            if ($pathinfo === '/admin/backoffice') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_backoffice;
                }

                return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\AdminController::backofficeAction',  '_route' => 'backoffice',);
            }
            not_backoffice:

            // setup
            if ($pathinfo === '/admin/setup') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_setup;
                }

                return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\AdminController::setupAction',  '_route' => 'setup',);
            }
            not_setup:

            // phpinfo
            if ($pathinfo === '/admin/backoffice/phpinfo') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_phpinfo;
                }

                return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\AdminController::phpinfoAction',  '_route' => 'phpinfo',);
            }
            not_phpinfo:

            if (0 === strpos($pathinfo, '/admin/pages')) {
                // editpages
                if (0 === strpos($pathinfo, '/admin/pages/edit') && preg_match('#^/admin/pages/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_editpages;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'editpages')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\PagesController::editpagesAction',));
                }
                not_editpages:

                // addpages
                if ($pathinfo === '/admin/pages/add') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_addpages;
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\PagesController::addpagesAction',  '_route' => 'addpages',);
                }
                not_addpages:

                // pagesoption
                if (preg_match('#^/admin/pages(?:/(?P<option>[^/]++)(?:/(?P<id>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_pagesoption;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pagesoption')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\PagesController::pagesAction',  'option' => 0,  'id' => 0,));
                }
                not_pagesoption:

                // pages
                if (rtrim($pathinfo, '/') === '/admin/pages') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_pages;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'pages');
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\PagesController::pagesAction',  'current_page' => 1,  '_route' => 'pages',);
                }
                not_pages:

                // pages_current
                if (preg_match('#^/admin/pages(?:/(?P<current_page>\\d+))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_pages_current;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'pages_current')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\PagesController::pagesAction',  'current_page' => 1,));
                }
                not_pages_current:

            }

            if (0 === strpos($pathinfo, '/admin/sections')) {
                // editsections
                if (0 === strpos($pathinfo, '/admin/sections/edit') && preg_match('#^/admin/sections/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_editsections;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'editsections')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\SectionsController::editsectionAction',));
                }
                not_editsections:

                // addsections
                if ($pathinfo === '/admin/sections/add') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_addsections;
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\SectionsController::addsectionAction',  '_route' => 'addsections',);
                }
                not_addsections:

                // optionsections
                if (preg_match('#^/admin/sections(?:/(?P<option>[^/]++)(?:/(?P<id>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_optionsections;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'optionsections')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\SectionsController::sectionsAction',  'option' => 0,  'id' => 0,));
                }
                not_optionsections:

                // sections
                if (rtrim($pathinfo, '/') === '/admin/sections') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sections;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'sections');
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\SectionsController::sectionsAction',  '_route' => 'sections',);
                }
                not_sections:

            }

            if (0 === strpos($pathinfo, '/admin/languages')) {
                // editlanguages
                if (0 === strpos($pathinfo, '/admin/languages/edit') && preg_match('#^/admin/languages/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_editlanguages;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'editlanguages')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\LanguagesController::editlanguagesAction',));
                }
                not_editlanguages:

                // addlanguages
                if ($pathinfo === '/admin/languages/add') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_addlanguages;
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\LanguagesController::addlanguagesAction',  '_route' => 'addlanguages',);
                }
                not_addlanguages:

                // optionlanguages
                if (preg_match('#^/admin/languages(?:/(?P<option>[^/]++)(?:/(?P<id>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_optionlanguages;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'optionlanguages')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\LanguagesController::languagesAction',  'option' => 0,  'id' => 0,));
                }
                not_optionlanguages:

                // languages
                if (rtrim($pathinfo, '/') === '/admin/languages') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_languages;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'languages');
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\LanguagesController::languagesAction',  '_route' => 'languages',);
                }
                not_languages:

            }

            if (0 === strpos($pathinfo, '/admin/users')) {
                // editusers
                if (0 === strpos($pathinfo, '/admin/users/edit') && preg_match('#^/admin/users/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_editusers;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'editusers')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\UsersController::editusersAction',));
                }
                not_editusers:

                // addusers
                if ($pathinfo === '/admin/users/add') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_addusers;
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\UsersController::addusersAction',  '_route' => 'addusers',);
                }
                not_addusers:

                // optionusers
                if (preg_match('#^/admin/users(?:/(?P<option>[^/]++)(?:/(?P<id>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_optionusers;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'optionusers')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\UsersController::usersAction',  'option' => 0,  'id' => 0,));
                }
                not_optionusers:

                // users
                if (rtrim($pathinfo, '/') === '/admin/users') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_users;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'users');
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\UsersController::usersAction',  '_route' => 'users',);
                }
                not_users:

            }

            if (0 === strpos($pathinfo, '/admin/roles')) {
                // editroles
                if (0 === strpos($pathinfo, '/admin/roles/edit') && preg_match('#^/admin/roles/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_editroles;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'editroles')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\RolesController::editrolesAction',));
                }
                not_editroles:

                // addroles
                if ($pathinfo === '/admin/roles/add') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_addroles;
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\RolesController::addrolesAction',  '_route' => 'addroles',);
                }
                not_addroles:

                // optionroles
                if (preg_match('#^/admin/roles(?:/(?P<option>[^/]++)(?:/(?P<id>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_optionroles;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'optionroles')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\RolesController::rolesAction',  'option' => 0,  'id' => 0,));
                }
                not_optionroles:

                // roles
                if (rtrim($pathinfo, '/') === '/admin/roles') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_roles;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'roles');
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\RolesController::rolesAction',  '_route' => 'roles',);
                }
                not_roles:

            }

            if (0 === strpos($pathinfo, '/admin/blog/posts')) {
                // editblogposts
                if (0 === strpos($pathinfo, '/admin/blog/posts/edit') && preg_match('#^/admin/blog/posts/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_editblogposts;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'editblogposts')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\BlogPostController::editBlogPostsAction',));
                }
                not_editblogposts:

                // addblogposts
                if ($pathinfo === '/admin/blog/posts/add') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_addblogposts;
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\BlogPostController::addBlogPostsAction',  '_route' => 'addblogposts',);
                }
                not_addblogposts:

                // optionblogposts
                if (preg_match('#^/admin/blog/posts(?:/(?P<option>[^/]++)(?:/(?P<id>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_optionblogposts;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'optionblogposts')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\BlogPostController::blogPostsAction',  'option' => 0,  'id' => 0,));
                }
                not_optionblogposts:

                // blogposts
                if (rtrim($pathinfo, '/') === '/admin/blog/posts') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_blogposts;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'blogposts');
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\BlogPostController::blogPostsAction',  'current_page' => 1,  '_route' => 'blogposts',);
                }
                not_blogposts:

                // blogposts_current
                if (preg_match('#^/admin/blog/posts(?:/(?P<current_page>\\d+))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_blogposts_current;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'blogposts_current')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\BlogPostController::blogPostsAction',  'current_page' => 1,));
                }
                not_blogposts_current:

            }

            if (0 === strpos($pathinfo, '/admin/files')) {
                // optionfiles
                if (preg_match('#^/admin/files(?:/(?P<option>[^/]++)(?:/(?P<id>[^/]++))?)?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_optionfiles;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'optionfiles')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\FileController::listAction',  'option' => 0,  'id' => 0,));
                }
                not_optionfiles:

                // files_current
                if (preg_match('#^/admin/files(?:/(?P<current_page>\\d+))?$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_files_current;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'files_current')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\FileController::listAction',  'current_page' => 1,));
                }
                not_files_current:

                // newfile
                if ($pathinfo === '/admin/files/add') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_newfile;
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\FileController::newFileAction',  '_route' => 'newfile',);
                }
                not_newfile:

                // files
                if (rtrim($pathinfo, '/') === '/admin/files') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_files;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'files');
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\FileController::listAction',  'current_page' => 1,  '_route' => 'files',);
                }
                not_files:

                // images_tinymce
                if ($pathinfo === '/admin/files/imagelist') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_images_tinymce;
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\FileController::imageListAction',  '_route' => 'images_tinymce',);
                }
                not_images_tinymce:

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
