<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Metamodels_sitemap
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'MetaModels',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// MetaModels
	'MetaModels\SiteMap\SiteMap' => 'system/modules/metamodels_sitemap/MetaModels/Sitemap/SiteMap.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'nav_metamodels' => 'system/modules/metamodels_sitemap/templates/navigation',
));
