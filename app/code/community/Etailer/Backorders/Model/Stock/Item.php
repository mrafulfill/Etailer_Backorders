<?php

class Etailer_Backorders_Model_Stock_Item extends Ebizmarts_BakerlooRestful_Model_Rewrite_CatalogInventory_Stock_Item
{
    /**
     * Check quantity
     *
     * @param   decimal $qty
     * @exception Mage_Core_Exception
     * @return  bool
     */
    public function checkQty($qty)
    {
        if (!$this->getManageStock() || Mage::app()->getStore()->isAdmin()) {
            return true;
        }

        if ($this->getQty() - $this->getMinQty() - $qty < 0) {
            return false;
        }
        return true;
    }

}
