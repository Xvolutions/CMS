<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/js/596da04')) {
            // _assetic_596da04
            if ($pathinfo === '/js/596da04.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '596da04',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_596da04',);
            }

            if (0 === strpos($pathinfo, '/js/596da04_')) {
                // _assetic_596da04_0
                if ($pathinfo === '/js/596da04_jquery-1.11.0.min_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '596da04',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_596da04_0',);
                }

                // _assetic_596da04_1
                if ($pathinfo === '/js/596da04_bootstrap.min_2.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '596da04',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_596da04_1',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/css/d0e5d96')) {
            // _assetic_d0e5d96
            if ($pathinfo === '/css/d0e5d96.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'd0e5d96',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_d0e5d96',);
            }

            if (0 === strpos($pathinfo, '/css/d0e5d96_')) {
                // _assetic_d0e5d96_0
                if ($pathinfo === '/css/d0e5d96_css_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd0e5d96',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_d0e5d96_0',);
                }

                // _assetic_d0e5d96_1
                if ($pathinfo === '/css/d0e5d96_802d785ddb42ce4d12cf76900c553b40_all_2.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd0e5d96',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_d0e5d96_1',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/images')) {
            if (0 === strpos($pathinfo, '/images/e513b52')) {
                // _assetic_e513b52
                if ($pathinfo === '/images/e513b52.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'e513b52',  'pos' => NULL,  '_format' => 'png',  '_route' => '_assetic_e513b52',);
                }

                // _assetic_e513b52_0
                if ($pathinfo === '/images/e513b52_cleverti_logo_1.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'e513b52',  'pos' => 0,  '_format' => 'png',  '_route' => '_assetic_e513b52_0',);
                }

            }

            if (0 === strpos($pathinfo, '/images/0e6766e')) {
                // _assetic_0e6766e
                if ($pathinfo === '/images/0e6766e.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '0e6766e',  'pos' => NULL,  '_format' => 'png',  '_route' => '_assetic_0e6766e',);
                }

                // _assetic_0e6766e_0
                if ($pathinfo === '/images/0e6766e_phone_small_1.png') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '0e6766e',  'pos' => 0,  '_format' => 'png',  '_route' => '_assetic_0e6766e_0',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/js/f1eaf3b')) {
            // _assetic_f1eaf3b
            if ($pathinfo === '/js/f1eaf3b.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'f1eaf3b',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_f1eaf3b',);
            }

            // _assetic_f1eaf3b_0
            if ($pathinfo === '/js/f1eaf3b_ac4a5b4bd2f1245ca86c631313d42458_1.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'f1eaf3b',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_f1eaf3b_0',);
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

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
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

        // cleverti_cti_login_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'cleverti_cti_login_homepage');
            }

            return array (  '_controller' => 'Cleverti\\CTILoginBundle\\Controller\\LoginController::indexAction',  '_route' => 'cleverti_cti_login_homepage',);
        }

        // cleverti_cti_login_recover
        if ($pathinfo === '/recover') {
            return array (  '_controller' => 'Cleverti\\CTILoginBundle\\Controller\\LoginController::recoverAction',  '_route' => 'cleverti_cti_login_recover',);
        }

        // xvolutions_admin_homepage
        if (rtrim($pathinfo, '/') === '/admin') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'xvolutions_admin_homepage');
            }

            return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\AdminController::loginAction',  '_route' => 'xvolutions_admin_homepage',);
        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
