<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * xvolutionscmsDevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class xvolutionscmsDevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        '_assetic_7c463a9' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => '7c463a9',    'pos' => NULL,    '_format' => 'css',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/css/7c463a9.css',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_7c463a9_0' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => '7c463a9',    'pos' => 0,    '_format' => 'css',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/css/7c463a9_login_1.css',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_e62f3c5' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'e62f3c5',    'pos' => NULL,    '_format' => 'css',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/css/e62f3c5.css',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_e62f3c5_0' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'e62f3c5',    'pos' => 0,    '_format' => 'css',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/css/e62f3c5_backoffice_1.css',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_4b709cd' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => '4b709cd',    'pos' => NULL,    '_format' => 'ico',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/images/4b709cd.ico',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_4b709cd_0' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => '4b709cd',    'pos' => 0,    '_format' => 'ico',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/images/4b709cd_favicon_1.ico',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_a804ca8' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'a804ca8',    'pos' => NULL,    '_format' => 'png',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/images/a804ca8.png',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_a804ca8_0' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'a804ca8',    'pos' => 0,    '_format' => 'png',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/images/a804ca8_apple-touch-icon-144-precomposed_1.png',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_4a033c5' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => '4a033c5',    'pos' => NULL,    '_format' => 'css',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/css/4a033c5.css',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_4a033c5_0' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => '4a033c5',    'pos' => 0,    '_format' => 'css',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/css/4a033c5_bootstrap.min_1.css',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_a1d6081' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'a1d6081',    'pos' => NULL,    '_format' => 'js',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/js/a1d6081.js',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_a1d6081_0' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'a1d6081',    'pos' => 0,    '_format' => 'js',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/js/a1d6081_jquery-1.11.0.min_1.js',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_a1d6081_1' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'a1d6081',    'pos' => 1,    '_format' => 'js',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/js/a1d6081_bootstrap.min_2.js',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_a1d6081_2' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'a1d6081',    'pos' => 2,    '_format' => 'js',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/js/a1d6081_selectforremoval.min_3.js',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_a1d6081_3' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'a1d6081',    'pos' => 3,    '_format' => 'js',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/js/a1d6081_delete.min_4.js',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_a1d6081_4' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'a1d6081',    'pos' => 4,    '_format' => 'js',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/js/a1d6081_hide_alerts.min_5.js',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_a1d6081_5' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'a1d6081',    'pos' => 5,    '_format' => 'js',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/js/a1d6081_seturl.min_6.js',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_assetic_a1d6081_6' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'assetic.controller:render',    'name' => 'a1d6081',    'pos' => 6,    '_format' => 'js',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/js/a1d6081_dropzone.min_7.js',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_wdt' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:toolbarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_wdt',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_bar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchBarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search_bar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_purge' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:purgeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/purge',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_info' => array (  0 =>   array (    0 => 'about',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:infoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'about',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler/info',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/phpinfo',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_results' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchResultsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search/results',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_router' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.router:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/router',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception_css' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:cssAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception.css',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_configurator_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_configurator_step' => array (  0 =>   array (    0 => 'index',  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'index',    ),    1 =>     array (      0 => 'text',      1 => '/_configurator/step',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_configurator_final' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_configurator/final',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\SecurityController::loginAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'login_check' => array (  0 =>   array (  ),  1 =>   array (  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/login_check',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'logout' => array (  0 =>   array (  ),  1 =>   array (  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/logout',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'recover' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\SecurityController::recoverAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/recover',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'backoffice' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\AdminController::backofficeAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/backoffice',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'setup' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\AdminController::setupAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/setup',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\AdminController::phpinfoAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/backoffice/phpinfo',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'editpages' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\PagesController::editpagesAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin/pages/edit',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'addpages' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\PagesController::addpagesAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/pages/add',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'pagesoption' => array (  0 =>   array (    0 => 'option',    1 => 'id',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\PagesController::pagesAction',    'option' => 0,    'id' => 0,  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'option',    ),    2 =>     array (      0 => 'text',      1 => '/admin/pages',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'pages' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\PagesController::pagesAction',    'current_page' => 1,  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/pages/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'pages_current' => array (  0 =>   array (    0 => 'current_page',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\PagesController::pagesAction',    'current_page' => 1,  ),  2 =>   array (    'current_page' => '\\d+',    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'current_page',    ),    1 =>     array (      0 => 'text',      1 => '/admin/pages',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'editsections' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\SectionsController::editsectionAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin/sections/edit',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'addsections' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\SectionsController::addsectionAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/sections/add',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'optionsections' => array (  0 =>   array (    0 => 'option',    1 => 'id',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\SectionsController::sectionsAction',    'option' => 0,    'id' => 0,  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'option',    ),    2 =>     array (      0 => 'text',      1 => '/admin/sections',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sections' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\SectionsController::sectionsAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/sections/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'editlanguages' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\LanguagesController::editlanguagesAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin/languages/edit',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'addlanguages' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\LanguagesController::addlanguagesAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/languages/add',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'optionlanguages' => array (  0 =>   array (    0 => 'option',    1 => 'id',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\LanguagesController::languagesAction',    'option' => 0,    'id' => 0,  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'option',    ),    2 =>     array (      0 => 'text',      1 => '/admin/languages',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'languages' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\LanguagesController::languagesAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/languages/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'editusers' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\UsersController::editusersAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin/users/edit',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'addusers' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\UsersController::addusersAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/users/add',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'optionusers' => array (  0 =>   array (    0 => 'option',    1 => 'id',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\UsersController::usersAction',    'option' => 0,    'id' => 0,  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'option',    ),    2 =>     array (      0 => 'text',      1 => '/admin/users',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'users' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\UsersController::usersAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/users/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'editroles' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\RolesController::editrolesAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin/roles/edit',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'addroles' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\RolesController::addrolesAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/roles/add',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'optionroles' => array (  0 =>   array (    0 => 'option',    1 => 'id',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\RolesController::rolesAction',    'option' => 0,    'id' => 0,  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'option',    ),    2 =>     array (      0 => 'text',      1 => '/admin/roles',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'roles' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\RolesController::rolesAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/roles/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'editblogposts' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\BlogPostController::editBlogPostsAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/admin/blog/posts/edit',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'addblogposts' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\BlogPostController::addBlogPostsAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/blog/posts/add',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'optionblogposts' => array (  0 =>   array (    0 => 'option',    1 => 'id',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\BlogPostController::blogPostsAction',    'option' => 0,    'id' => 0,  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'option',    ),    2 =>     array (      0 => 'text',      1 => '/admin/blog/posts',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'blogposts' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\BlogPostController::blogPostsAction',    'current_page' => 1,  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/blog/posts/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'blogposts_current' => array (  0 =>   array (    0 => 'current_page',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\BlogPostController::blogPostsAction',    'current_page' => 1,  ),  2 =>   array (    'current_page' => '\\d+',    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'current_page',    ),    1 =>     array (      0 => 'text',      1 => '/admin/blog/posts',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'optionfiles' => array (  0 =>   array (    0 => 'option',    1 => 'id',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\FileController::listAction',    'option' => 0,    'id' => 0,  ),  2 =>   array (    '_method' => 'DELETE',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'option',    ),    2 =>     array (      0 => 'text',      1 => '/admin/files',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'files_current' => array (  0 =>   array (    0 => 'current_page',  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\FileController::listAction',    'current_page' => 1,  ),  2 =>   array (    'current_page' => '\\d+',    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'current_page',    ),    1 =>     array (      0 => 'text',      1 => '/admin/files',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'newfile' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\FileController::newFileAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/files/add',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'files' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\FileController::listAction',    'current_page' => 1,  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/files/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'images_tinymce' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Xvolutions\\AdminBundle\\Controller\\Admin\\FileController::imageListAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/files/imagelist',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
