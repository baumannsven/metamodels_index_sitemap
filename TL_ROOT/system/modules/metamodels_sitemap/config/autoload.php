<?php

/**
 * This is a subpackage for Contao MetaModels.
 * This package include the detail sides to searchindex
 * and to sitemap.
 *
 * PHP version 5
 *
 * @package    MetaModelsIndexSitmap
 * @subpackage Core, MetaModels
 * @author     Sven Baumann <baumann.sv@googlemail.com>
 * @copyright  Sven Baumann.
 * @license    LGPL.
 * @filesource https://github.com/baumanndotsv/metamodels_index_sitemap
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
	'MetaModels\SiteMap\SiteMap' => 'system/modules/metamodels_sitemap/MetaModels/SiteMap/SiteMap.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'nav_metamodels' => 'system/modules/metamodels_sitemap/templates/navigation',
));
