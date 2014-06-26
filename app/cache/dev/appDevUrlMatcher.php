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

        if (0 === strpos($pathinfo, '/css')) {
            if (0 === strpos($pathinfo, '/css/ef43e4c')) {
                // _assetic_ef43e4c
                if ($pathinfo === '/css/ef43e4c.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'ef43e4c',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_ef43e4c',);
                }

                // _assetic_ef43e4c_0
                if ($pathinfo === '/css/ef43e4c_login_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'ef43e4c',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_ef43e4c_0',);
                }

            }

            if (0 === strpos($pathinfo, '/css/06096bc')) {
                // _assetic_06096bc
                if ($pathinfo === '/css/06096bc.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '06096bc',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_06096bc',);
                }

                // _assetic_06096bc_0
                if ($pathinfo === '/css/06096bc_backoffice_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '06096bc',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_06096bc_0',);
                }

            }

        }

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

        if (0 === strpos($pathinfo, '/css/2eccf71')) {
            // _assetic_2eccf71
            if ($pathinfo === '/css/2eccf71.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '2eccf71',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_2eccf71',);
            }

            // _assetic_2eccf71_0
            if ($pathinfo === '/css/2eccf71_bootstrap_1.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '2eccf71',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_2eccf71_0',);
            }

        }

        if (0 === strpos($pathinfo, '/js/d3ecf4d')) {
            // _assetic_d3ecf4d
            if ($pathinfo === '/js/d3ecf4d.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'd3ecf4d',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_d3ecf4d',);
            }

            if (0 === strpos($pathinfo, '/js/d3ecf4d_')) {
                // _assetic_d3ecf4d_0
                if ($pathinfo === '/js/d3ecf4d_jquery-1.11.0.min_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd3ecf4d',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_d3ecf4d_0',);
                }

                // _assetic_d3ecf4d_1
                if ($pathinfo === '/js/d3ecf4d_bootstrap.min_2.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd3ecf4d',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_d3ecf4d_1',);
                }

                // _assetic_d3ecf4d_2
                if ($pathinfo === '/js/d3ecf4d_selectforremoval.min_3.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd3ecf4d',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_d3ecf4d_2',);
                }

                // _assetic_d3ecf4d_3
                if ($pathinfo === '/js/d3ecf4d_delete.min_4.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd3ecf4d',  'pos' => 3,  '_format' => 'js',  '_route' => '_assetic_d3ecf4d_3',);
                }

                // _assetic_d3ecf4d_4
                if ($pathinfo === '/js/d3ecf4d_hide_alerts.min_5.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'd3ecf4d',  'pos' => 4,  '_format' => 'js',  '_route' => '_assetic_d3ecf4d_4',);
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

        if (0 === strpos($pathinfo, '/admin')) {
            // login
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'login');
                }

                return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
            }

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
                return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\SecurityController::recoverAction',  '_route' => 'recover',);
            }

            // backoffice
            if ($pathinfo === '/admin/backoffice') {
                return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\AdminController::backofficeAction',  '_route' => 'backoffice',);
            }

            // setup
            if ($pathinfo === '/admin/setup') {
                return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\AdminController::setupAction',  '_route' => 'setup',);
            }

            if (0 === strpos($pathinfo, '/admin/pages')) {
                // editpages
                if (0 === strpos($pathinfo, '/admin/pages/edit') && preg_match('#^/admin/pages/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'editpages')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\PagesController::editpagesAction',));
                }

                // addpages
                if ($pathinfo === '/admin/pages/add') {
                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\PagesController::addpagesAction',  '_route' => 'addpages',);
                }

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
                if ($pathinfo === '/admin/pages') {
                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\PagesController::pagesAction',  '_route' => 'pages',);
                }

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
                if ($pathinfo === '/admin/sections') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_sections;
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
                if ($pathinfo === '/admin/languages') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_languages;
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
                if ($pathinfo === '/admin/users') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_users;
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
                if ($pathinfo === '/admin/roles') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_roles;
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\RolesController::rolesAction',  '_route' => 'roles',);
                }
                not_roles:

            }

            if (0 === strpos($pathinfo, '/admin/blog/posts')) {
                // blog_posts
                if (rtrim($pathinfo, '/') === '/admin/blog/posts') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'blog_posts');
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\BlogPostController::indexAction',  '_route' => 'blog_posts',);
                }

                // blog_posts_show
                if (preg_match('#^/admin/blog/posts/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_posts_show')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\BlogPostController::showAction',));
                }

                // blog_posts_new
                if ($pathinfo === '/admin/blog/posts/new') {
                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\BlogPostController::newAction',  '_route' => 'blog_posts_new',);
                }

                // blog_posts_create
                if ($pathinfo === '/admin/blog/posts/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_blog_posts_create;
                    }

                    return array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\BlogPostController::createAction',  '_route' => 'blog_posts_create',);
                }
                not_blog_posts_create:

                // blog_posts_edit
                if (preg_match('#^/admin/blog/posts/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_posts_edit')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\BlogPostController::editAction',));
                }

                // blog_posts_update
                if (preg_match('#^/admin/blog/posts/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_blog_posts_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_posts_update')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\BlogPostController::updateAction',));
                }
                not_blog_posts_update:

                // blog_posts_delete
                if (preg_match('#^/admin/blog/posts/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_blog_posts_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'blog_posts_delete')), array (  '_controller' => 'Xvolutions\\AdminBundle\\Controller\\BlogPostController::deleteAction',));
                }
                not_blog_posts_delete:

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
