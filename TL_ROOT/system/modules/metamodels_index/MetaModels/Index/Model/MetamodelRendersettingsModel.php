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

namespace MetamodelRendersettingsModel;


/**
 * Class MetamodelRendersettingsModel
 *
 * @package MetamodelRendersettingsModel
 */
class MetamodelRendersettingsModel extends \Model
{

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_metamodel_rendersettings';

	/**
	 * Model to get the RenderSettings from MetaModels
	 *
	 * @param $strColumn
	 * @param $value
	 *
	 * @return array|bool
	 */
	public static function getRenderSettings($strColumn, $value)
	{

		$result = parent::findBy($strColumn, $value);

		if ($result->count())
		{
			$arrData= $result->fetchAll();

			foreach ($arrData as $key => $value)
			{
				$arrJumpTo = unserialize($value['jumpTo']);
				$arrData[$key]['jumpTo'] = $arrJumpTo[0];
			}

			return $arrData;
		}

		return false;
	}
} 