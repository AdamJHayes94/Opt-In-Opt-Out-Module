<?php

class Smart_Optinandout_Block_Adminhtml_Renderer_Multiselect extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $_opt = $row->getData("opt_in_out");
        if ($_opt > 0) {
            return "Yes";
        } else {
            return "No";
        }
    }
}