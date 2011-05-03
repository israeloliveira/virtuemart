<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
/*
* Best selling Products module for VirtueMart
* @version $Id: mod_virtuemart_topten.php 1160 2008-01-14 20:35:19Z soeren_nb $
* @package VirtueMart
* @subpackage modules
*
* @copyright (C) John Syben (john@webme.co.nz)
* Conversion to Mambo and the rest:
* 	@copyright (C) 2004-2005 Soeren Eberhardt
*
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* VirtueMart is Free Software.
* VirtueMart comes with absolute no warranty.
*
* www.virtuemart.net
*----------------------------------------------------------------------
* This code creates a list of the bestselling products
* and displays it wherever you want
*----------------------------------------------------------------------
*/
/* Load  VM fonction */
require('helper.php');
$config->jQuery();
$config->cssSite();

/* Setting */
$categoryModel = new VirtueMartModelCategory();
$category_id = $params->get('Parent_Category_id', 0);
$class_sfx = $params->get('class_sfx', '');
$moduleclass_sfx = $params->get('moduleclass_sfx','');
$layout = $params->get('layout','default');
$active_category_id = JRequest::getInt('category_id', '0');
$vendorId = '1';

$categories = $categoryModel->getChildrenList($category_id) ;
/*		$q = "SELECT category_id, category_name
			FROM #__vm_category, #__vm_category_xref
			WHERE #__vm_category_xref.category_parent_id = ".$category_id."
			AND #__vm_category.category_id=#__vm_category_xref.category_child_id
			AND #__vm_category.vendor_id = 1
			AND #__vm_category.published = 1
			ORDER BY #__vm_category.ordering, #__vm_category.category_name ASC";
$db->setQuery($q);
$categories = $db->loadObjectList();*/
if(empty($categories)) return false;


foreach ($categories as $category) {
$category->childs = $categoryModel->getChildrenList($category->category_id) ;
}
$parentCategories = $categoryModel->getCategoryRecurse($active_category_id,0);


/* Laod tmpl default */
require(JModuleHelper::getLayoutPath('mod_virtuemart_category',$layout));
?>