<?php

/**
 *
 * @package	VirtueMart
 * @subpackage Plugins  - Elements
 * @author Valérie Isaksen
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2011 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: $
 */
if (!class_exists('VmConfig'))
    require(JPATH_ROOT . DS . 'administrator' . DS . 'components' . DS . 'com_virtuemart' . DS . 'helpers' . DS . 'config.php');
if (!class_exists('ShopFunctions'))
    require(JPATH_VM_ADMINISTRATOR . DS . 'helpers' . DS . 'shopfunctions.php');
if (!class_exists('TableCategories'))
    require(JPATH_VM_ADMINISTRATOR . DS . 'tables' . DS . 'categories.php');

if (!class_exists('VmElements'))
    require(JPATH_VM_ADMINISTRATOR . DS . 'elements' . DS . 'vmelements.php');
/*
 * This element is used by the menu manager for J15
 * Should be that way
 */

class JElementVmproductsmenu extends JElement {

    var $_name = 'productsmenu';

    function fetchElement($name, $value, &$node, $control_name) {

        return JHTML::_('select.genericlist', $this->_getProducts(), $control_name . '[' . $name . ']', $class, 'value', 'text', $value, $control_name . $name);
    }

    private function _getProducts() {

        $db = JFactory::getDBO();
        $query = "SELECT `virtuemart_product_id`  AS value, `product_name`  AS text FROM `#__virtuemart_products` WHERE `published` = 1";
        $db->setQuery($query);
        $db->query();
        return $db->loadObjectList();
    }

}