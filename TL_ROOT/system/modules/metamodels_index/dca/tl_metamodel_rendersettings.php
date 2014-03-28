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

$GLOBALS['TL_DCA']['tl_metamodel_rendersettings']['fields']['search_index'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_metamodel_rendersettings']['search_index'],
    'exclude'       => true,
    'inputType'     => 'checkbox',
    'eval'          => array('tl_class' => 'w50'),
    'sql'           => "char(1) NOT NULL default ''"
);

array_push($GLOBALS['TL_DCA']['tl_metamodel_rendersettings']['metapalettes']['default']['expert'], 'search_index');
