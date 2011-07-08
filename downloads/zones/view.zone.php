<?php
/**
* @package   downloads
* @subpackage downloads
* @author    FoxMaSk
* @copyright  2008 FoxMaSk
* @link      http://www.foxmask.info
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/

class viewZone extends jZone {

    protected $_tplname='public_view';

    protected function _prepareTpl(){

        $dir = $this->getParam('dir', false);
        if (!$dir) return;
        //get the config of the module from the profiles.ini.php config file
        $config = jProfiles::get('downloads');

        $filesize = $this->getParam('filesize', false);
        $data     = $this->getParam('data', false);
        
        $this->_tpl->assign('path',$dir);
        $this->_tpl->assign('filesize',$filesize);
        $this->_tpl->assign('download',$data);
        $this->_tpl->assign('allowGuest',$config['allow.guest']);
    }

}
