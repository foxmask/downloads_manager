<?php
/**
* @package   downloads
* @subpackage admin-downloads
* @author    Olivier Demah
* @copyright  2008-2011 FoxMaSk
* @link      http://www.foxmask.info
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/

class downloadsadminListener extends jEventListener{

   function onmasteradminGetMenuContent ($event) {

        global $gJConfig;
        $chemin = $gJConfig->urlengine['basePath'].'themes/'.$gJConfig->theme.'/';
        if (jAcl2::check('downloads.index')) {
            $event->add(new masterAdminMenuItem('downloads', jLocale::get('admin_downloads~admin.downloads'), '', 29));
            $item = new masterAdminMenuItem('downloads_dls', jLocale::get('admin_downloads~admin.list.downloads'), jUrl::get('admin_downloads~mgr:dls'), 31, 'downloads');
            $item->icon = $chemin . 'img/downloads.png';
            $event->add($item);
        }
        if (jAcl2::check('downloads.config')) {
            $item = new masterAdminMenuItem('downloads_config', jLocale::get('admin_downloads~admin.configuration'), jUrl::get('admin_downloads~mgr:config'), 32, 'downloads');
            $item->icon = $chemin . 'img/download.png';
            $event->add($item);
        }
        if (jAcl2::check('downloads.edit')) {
            $item = new masterAdminMenuItem('downloads_manage', jLocale::get('admin_downloads~admin.add_a_download'), jUrl::get('admin_downloads~mgr:manage'), 33, 'downloads');
            $item->icon = $chemin . 'img/get_download.png';
            $event->add($item);
        }
        if (jAcl2::check('downloads.index')) {
            $item = new masterAdminMenuItem('downloads_infos', jLocale::get('admin_downloads~admin.about'), jUrl::get('admin_downloads~mgr:index'), 34, 'downloads');
            $item->icon = $chemin . 'img/download.png';
            $event->add($item);
        }

   }

    function onDownloadGetHostingDirectory ($event) {

        $dlConfig = jProfiles::get('downloads');

        $event->Add(
                    array('hostingFolder'=>$dlConfig['commons.upload.dir'],
                          'hostingPath'=>$dlConfig['commons.hosting.path'])
                    );
    }
}
