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

namespace MetaModels\SiteMap;


use MetaModels\Index\Index;

/**
 * Class SiteMap
 *
 * @package MetaModels\SiteMap
 */
class SiteMap
{

	/**
	 * Get the subpage for MetaModels detail page
	 *
	 * @param $item
	 *
	 * @return array|bool
	 */
	public static function getSubPage($item)
	{
		$arrSettings = \MetamodelRendersettingsModel::getRenderSettings('sitemap', 1);

		if ($arrSettings == false)
		{
			return false;
		}

		$arrOldSettings = $arrSettings;

		$arrSettings = array();

		foreach ($arrOldSettings as $key => $value)
		{
			$arrSettings[$arrOldSettings[$key]['jumpTo']['value']] = $value;
		}

		unset($arrOldSettings);

		if (isset($arrSettings[$item['id']]))
		{
			$newArrData = array();

			foreach (Index::getSearchPage($arrSettings[$item['id']], $item['alias'], $GLOBALS['TL_LANGUAGE'], $strForceArr = true) as $sKey => $sValue)
			{
				$sValue['href'] = str_replace($GLOBALS['TL_CONFIG']['urlSuffix'], '/'.$sValue['alias'].$GLOBALS['TL_CONFIG']['urlSuffix'], $item['href']);
				$newArrData[] = $sValue;
			}

			return $newArrData;
		}

		return false;
	}
}
