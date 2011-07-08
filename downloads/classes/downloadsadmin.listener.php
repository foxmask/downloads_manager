<?php
/**
* @package      downloads
* @subpackage
* @author       foxmask
* @contributor foxmask
* @copyright    2008 foxmask
* @link
* @licence  http://www.gnu.org/licenses/gpl.html GNU General Public Licence, see LICENCE file
*/
class downloadsadminListener extends jEventListener{

   function onmasteradminGetMenuContent ($event) {

        global $gJConfig;
        $chemin = $gJConfig->urlengine['basePath'].'themes/'.$gJConfig->theme.'/';
        if (jAcl2::check('downloads.index')) {
            $event->add(new masterAdminMenuItem('downloads', jLocale::get('downloads~common.downloads'), '', 29));
            $item = new masterAdminMenuItem('downloads_dls', jLocale::get('downloads~common.list.downloads'), jUrl::get('downloads~mgr:dls'), 31, 'downloads');
            $item->icon = $chemin . 'img/downloads.png';
            $event->add($item);
        }
        if (jAcl2::check('downloads.config')) {
            $item = new masterAdminMenuItem('downloads_config', jLocale::get('downloads~common.configuration'), jUrl::get('downloads~mgr:config'), 32, 'downloads');
            $item->icon = $chemin . 'img/download.png';
            $event->add($item);
        }
        if (jAcl2::check('downloads.edit')) {
            $item = new masterAdminMenuItem('downloads_manage', jLocale::get('downloads~common.add_a_download'), jUrl::get('downloads~mgr:manage'), 33, 'downloads');
            $item->icon = $chemin . 'img/get_download.png';
            $event->add($item);
        }
        if (jAcl2::check('downloads.index')) {
            $item = new masterAdminMenuItem('downloads_infos', jLocale::get('downloads~common.about'), jUrl::get('downloads~mgr:index'), 34, 'downloads');
            $item->icon = $chemin . 'img/download.png';
            $event->add($item);
        }

   }

    function onDownloadGetHostingDirectory ($event) {

        jClasses::inc('download_config');
        $dlConfig = downloadConfig::getConfig();

        $event->Add(
                    array('hostingFolder'=>$dlConfig->getValue('commons.upload.dir'),
                          'hostingPath'=>$dlConfig->getValue('commons.hosting.path'))
                    );
    }
}
