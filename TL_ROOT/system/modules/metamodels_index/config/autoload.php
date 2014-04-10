<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Metamodels_index
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
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
	// MetaModels
	'MetaModels\Index\Index'                                    => 'system/modules/metamodels_index/MetaModels/Index/Index.php',
	'MetamodelRendersettingsModel\MetamodelRendersettingsModel' => 'system/modules/metamodels_index/MetaModels/Index/Model/MetamodelRendersettingsModel.php',
));
