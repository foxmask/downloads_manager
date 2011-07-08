<?php
/**
* @package   downloads
* @subpackage admin-downloads
* @author    FoxMaSk
* @copyright  2008 FoxMaSk
* @link      http://www.foxmask.info
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/

class adminZone extends jZone {

    protected $_tplname='admin_index';

    protected function _prepareTpl(){
        jClasses::inc('downloads~readmodule');
        $moduleInfo = readmodule::readModuleXml();
        $this->_tpl->assign('moduleInfo',$moduleInfo);
    }
}
