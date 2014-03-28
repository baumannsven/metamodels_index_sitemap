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
	'MetamodelRendersettingsModel',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'MetaModels\Index\Index'                                    => 'system/modules/metamodels_index/MetaModels/Index/Index.php',
	'MetamodelRendersettingsModel\MetamodelRendersettingsModel' => 'system/modules/metamodels_index/MetaModels/Index/Model/MetamodelRendersettingsModel.php',
));
