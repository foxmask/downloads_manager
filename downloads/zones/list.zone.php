<?php
/**
* @package   downloads
* @subpackage downloads
* @author    FoxMaSk
* @copyright  2008 FoxMaSk
* @link      http://www.foxmask.info
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/

class listZone extends jZone {

    protected $_tplname='public_list';

    protected function _prepareTpl(){

        $lastest = '';
        $popular = '';
        $total = 0;
        $enableDownloads = '';

        $offset = $this->getParam('offset', false);
        $dir = $this->getParam('dir', false);
        if (!$dir) return;

        //get the config of the module from the profiles.ini.php config file
        $config = jProfiles::get('downloads');
        $limit = $config['number.downloads.on.home'];

        if ($limit <= 0 ) $limit = 10;

        $dao = jDao::get('downloads~downloads');
        // for RSS Feeds
        if ($config['most.popular.downloads.on.home'] == 1)
            $popular = $dao->findPopular($dir,$limit);

        if ($config['last.downloads.on.home'] == 1)
            $lastest = $dao->findLastest($dir,$limit);

        if ($config['most.popular.downloads.on.home'] == 0  and
            $config['last.downloads.on.home'] == 0) {
            $enableDownloads = $dao->findEnabled($dir,$limit,$offset);

        }
        $total = $dao->count($dir);

        $message = jMessage::get('public_msg');
        $nb_msg = count($message);
        jMessage::clearAll();

        $this->_tpl->assign('message',$message);
        $this->_tpl->assign('nb_msg',$nb_msg);

        $this->_tpl->assign('path',$dir);
        $this->_tpl->assign('populars',$popular);
        $this->_tpl->assign('popular',$config['most.popular.downloads.on.home']);
        $this->_tpl->assign('lastest',$config['last.downloads.on.home']);
        $this->_tpl->assign('lastests',$lastest);
        $this->_tpl->assign('downloads',$enableDownloads);

        $this->_tpl->assign('offset',$offset);
        $this->_tpl->assign('nbPerPage',$limit);
        $this->_tpl->assign('total',$total);
    }
}
