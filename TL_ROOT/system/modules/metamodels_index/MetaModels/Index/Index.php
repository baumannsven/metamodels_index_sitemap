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

namespace MetaModels\Index;

use Contao\Controller;
use Contao\Database;
use Contao\Environment;
use Contao\Model;

use MetaModels\Factory;

/**
 * Class Index
 *
 * @package MetaModels\Index
 */
class Index
{
	/**
	 * Includes the detail pages from MetaModel
	 *
	 * @param $arrData
	 *
	 * @return array
	 */
	public function getSearchablePagesModel($arrData)
	{
		$arrSettings = \MetamodelRendersettingsModel::getRenderSettings('search_index', 1);

		if ($arrSettings == false) return $arrData;

		$arrOldSettings = $arrSettings;

		$arrSettings = array();

		foreach ($arrOldSettings as $key => $value)
		{
			$arrSettings[$arrOldSettings[$key]['jumpTo']['value']] = $value;
		}

		unset($arrOldSettings);

		$newArrData = array();

		foreach ($arrData as $value)
		{
			$arrLink = $this->getAlias($value);

			$objPageCollection = \PageModel::findPublishedByIdOrAlias($arrLink['alias']);

			foreach ($objPageCollection as $objValue)
			{
				if ($objValue->alias == $arrLink['alias'] && isset($arrSettings[$objValue->id]))
				{
					foreach ($this->getSearchPage($arrSettings[$objValue->id], $arrLink['alias'], $arrLink['language']) as $sKey => $sValue)
					{
						$newArrData[] = $sValue;
					}
				} else
				{
					$newArrData[] = $value;
				}
			}

			unset($objValue, $objPageCollection);
		}

		return $newArrData;
	}

	/**
	 * Get the alias from hyberlink
	 *
	 * @param $strLink
	 *
	 * @return array
	 */
	protected function getAlias($strLink)
	{

		if ($GLOBALS['TL_CONFIG']['rewriteURL'] == false) $strLink = str_replace('index.php/', '', $strLink);

		if ($GLOBALS['TL_CONFIG']['urlSuffix']) $strLink = str_replace($GLOBALS['TL_CONFIG']['urlSuffix'], '', $strLink);

		$strLink = str_replace(\Environment::get('base'), '', $strLink);

		$strLang = '';

		if ($GLOBALS['TL_CONFIG']['addLanguageToUrl'])
		{
			$strLink = explode('/', $strLink);

			$strLang = $strLink[0];
			unset($strLink[0]);

			$strLink = implode('/', $strLink);
		}

		$arrLink = array('alias' => $strLink, 'language' => $strLang);

		return $arrLink;
	}

	/**
	 * Return the links from the MetaModel
	 *
	 * @param      $arrData
	 * @param      $strAlias
	 * @param null $strLang
	 * @param bool $strForceArr
	 *
	 * @return array
	 */
	public static function getSearchPage($arrData, $strAlias, $strLang = null, $strForceArr = false)
	{
		$objTable = Factory::byId($arrData['pid']);

		$result = Database::getInstance()->prepare('SELECT * FROM ' . $objTable->getTableName() . ' WHERE public=?')->execute(1);

		$arrReturn = array();

		if ($result->count())
		{
			$arrPages = $result->fetchAllAssoc();

			if ($strForceArr == true) return $arrPages;

			foreach ($arrPages as $key => $value)
			{
				$arrRow['alias'] = $strAlias . '/' . $value['alias'];

				$arrReturn[] = Environment::get('base') . Controller::generateFrontendUrl($arrRow, $strParams = null, $strLang);
			}
		}

		return $arrReturn;
	}
}
