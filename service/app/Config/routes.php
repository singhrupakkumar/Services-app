<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

    
    //Router::connect('/users',array('controller' => 'users', 'action' => 'app_registration', 'customer' => true));
	Router::connect('/', array('controller' => 'dashboard', 'action' => 'index', 'admin' => true));
	//Router::connect('/', array('controller' => 'users', 'action' => 'login'));

	// Router::connect('/product/:slug', array('controller' => 'products', 'action' => 'view'), array('pass' => array('slug')));

	// Router::connect('/brand/:slug', array('controller' => 'brands', 'action' => 'view'), array('pass' => array('slug')));

	// Router::connect('/category/:slug', array('controller' => 'categories', 'action' => 'view'), array('pass' => array('slug')));

	// Router::connect('/sitemap.xml', array('controller' => 'products', 'action' => 'sitemap'));

	Router::connect('/admin', array('controller' => 'dashboard', 'action' => 'index', 'admin' => true));
	//Router::connect('/customer', array('controller' => 'users', 'action' => 'dashboard', 'customer' => true));
	// Router::connect('/customer', array('controller' => 'users', 'action' => 'app_registration', 'customer' => true));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	// Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
        // Router::connect('/manager/newsletter', array('controller' => 'newsletters', 'action' => 'dashboard','manager' => true, 'plugin' => 'newsletter'));

//Subscribe and Unsubcribe routes



/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
  */
        
// Router::mapResources('users');
//Router::parseExtensions();
	require CAKE . 'Config' . DS . 'routes.php';
?>
