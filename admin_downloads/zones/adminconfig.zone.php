<?php
/**
* @package   downloads
* @subpackage admin-downloads
* @author    FoxMaSk
* @copyright  2008 FoxMaSk
* @link      http://www.foxmask.info
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/

class adminconfigZone extends jZone {

    protected $_tplname='admin_config';

    protected function _prepareTpl(){

        $form = $this->getParam('form', false);
        if (!$form) return;

        $message = jMessage::get('admin_msg');
        $nb_msg = count($message);
        jMessage::clearAll();

        $this->_tpl->assign('form',$form);
        $this->_tpl->assign('message',$message);
        $this->_tpl->assign('nb_msg',$nb_msg);
    }
}
