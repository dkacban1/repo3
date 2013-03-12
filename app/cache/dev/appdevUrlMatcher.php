<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        // dkacban1_examplemenu_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'dkacban1_examplemenu_default_index')), array (  '_controller' => 'dkacban1\\ExampleMenuBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/menu')) {
            // menu
            if (rtrim($pathinfo, '/') === '/menu') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_menu;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'menu');
                }

                return array (  '_controller' => 'dkacban1\\ExampleMenuBundle\\Controller\\MenuController::indexAction',  '_route' => 'menu',);
            }
            not_menu:

            // menu_create
            if ($pathinfo === '/menu/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_menu_create;
                }

                return array (  '_controller' => 'dkacban1\\ExampleMenuBundle\\Controller\\MenuController::createAction',  '_route' => 'menu_create',);
            }
            not_menu_create:

            // menu_new
            if ($pathinfo === '/menu/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_menu_new;
                }

                return array (  '_controller' => 'dkacban1\\ExampleMenuBundle\\Controller\\MenuController::newAction',  '_route' => 'menu_new',);
            }
            not_menu_new:

            // menu_show
            if (preg_match('#^/menu/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_menu_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'menu_show')), array (  '_controller' => 'dkacban1\\ExampleMenuBundle\\Controller\\MenuController::showAction',));
            }
            not_menu_show:

            // menu_edit
            if (preg_match('#^/menu/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_menu_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'menu_edit')), array (  '_controller' => 'dkacban1\\ExampleMenuBundle\\Controller\\MenuController::editAction',));
            }
            not_menu_edit:

            // menu_update
            if (preg_match('#^/menu/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_menu_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'menu_update')), array (  '_controller' => 'dkacban1\\ExampleMenuBundle\\Controller\\MenuController::updateAction',));
            }
            not_menu_update:

            // menu_delete
            if (preg_match('#^/menu/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_menu_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'menu_delete')), array (  '_controller' => 'dkacban1\\ExampleMenuBundle\\Controller\\MenuController::deleteAction',));
            }
            not_menu_delete:

        }

        // szkolenie_miasta_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'szkolenie_miasta_default_index')), array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/miasto')) {
            // miasto
            if (rtrim($pathinfo, '/') === '/miasto') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_miasto;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'miasto');
                }

                return array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\MiastoController::indexAction',  '_route' => 'miasto',);
            }
            not_miasto:

            // miasto_create
            if ($pathinfo === '/miasto/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_miasto_create;
                }

                return array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\MiastoController::createAction',  '_route' => 'miasto_create',);
            }
            not_miasto_create:

            // miasto_new
            if ($pathinfo === '/miasto/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_miasto_new;
                }

                return array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\MiastoController::newAction',  '_route' => 'miasto_new',);
            }
            not_miasto_new:

            // miasto_show
            if (preg_match('#^/miasto/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_miasto_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'miasto_show')), array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\MiastoController::showAction',));
            }
            not_miasto_show:

            // miasto_edit
            if (preg_match('#^/miasto/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_miasto_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'miasto_edit')), array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\MiastoController::editAction',));
            }
            not_miasto_edit:

            // miasto_update
            if (preg_match('#^/miasto/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_miasto_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'miasto_update')), array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\MiastoController::updateAction',));
            }
            not_miasto_update:

            // miasto_delete
            if (preg_match('#^/miasto/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_miasto_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'miasto_delete')), array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\MiastoController::deleteAction',));
            }
            not_miasto_delete:

        }

        if (0 === strpos($pathinfo, '/song')) {
            // song
            if (rtrim($pathinfo, '/') === '/song') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_song;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'song');
                }

                return array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\SongController::indexAction',  '_route' => 'song',);
            }
            not_song:

            // song_create
            if ($pathinfo === '/song/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_song_create;
                }

                return array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\SongController::createAction',  '_route' => 'song_create',);
            }
            not_song_create:

            // song_new
            if ($pathinfo === '/song/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_song_new;
                }

                return array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\SongController::newAction',  '_route' => 'song_new',);
            }
            not_song_new:

            // song_show
            if (preg_match('#^/song/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_song_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'song_show')), array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\SongController::showAction',));
            }
            not_song_show:

            // song_edit
            if (preg_match('#^/song/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_song_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'song_edit')), array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\SongController::editAction',));
            }
            not_song_edit:

            // song_update
            if (preg_match('#^/song/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_song_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'song_update')), array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\SongController::updateAction',));
            }
            not_song_update:

            // song_delete
            if (preg_match('#^/song/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_song_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'song_delete')), array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\SongController::deleteAction',));
            }
            not_song_delete:

            // szkolenie_miasta_songs_index
            if ($pathinfo === '/songs') {
                return array (  '_controller' => 'Szkolenie\\MiastaBundle\\Controller\\SongsController::indexAction',  '_route' => 'szkolenie_miasta_songs_index',);
            }

        }

        // my_colors_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'my_colors_default_index')), array (  '_controller' => 'My\\ColorsBundle\\Controller\\DefaultController::indexAction',));
        }

        // my_colors_default_colors
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'my_colors_default_colors');
            }

            return array (  '_controller' => 'My\\ColorsBundle\\Controller\\DefaultController::colorsAction',  '_route' => 'my_colors_default_colors',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
