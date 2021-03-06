<?php
/**
* @package   downloads
* @subpackage downloads
* @author    Olivier Demah
* @copyright  2008-2011 FoxMaSk
* @link      http://www.foxmask.info
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/


class defaultCtrl extends jController {
    /**
     * list all the enabled Downloads for a given " path " !
     */
    function index() {

        $dir = (string) $this->param('dir');
        $prj = (string) $this->param('project');
        if (empty($dir)) $dir = 'files';

        $rep = $this->getResponse('html');

        $rep->addLink(jUrl::get('downloads~feeds:lastest',array('dir'=>$dir)),
                       'alternate',
                       'application/rss+xml',
                       jLocale::get('downloads~common.lastest.downloads')
                      );
        $rep->addLink(jUrl::get('downloads~feeds:mostpopular',array('dir'=>$dir)),
                       'alternate',
                       'application/rss+xml',
                       jLocale::get('downloads~common.most.popular.downloads')
                       );
        $rep->body->assign('selectedMenuItem','projects');
        $rep->body->assign('selectedSubMenuItem','downloads');
        $offset = 0;
        if ( $this->param('offset') > 0 )
            $offset = (int) $this->param('offset');


        $rep->title = $prj == '' ? jLocale::get('index.public.title.page') : jLocale::get('index.public.title.page') . ' - ' . $prj;
        $rep->body->assign("MAIN", jZone::get('downloads~list', array('dir'=>$dir,'offset'=>$offset) ) ) ;
        return $rep;
    }

    /**
     * view the selected Download (by its url) for a given " path " !
     */
    function view() {
        $url = (string) $this->param('url');
        $dir = (string) $this->param('dir');
        $prj = (string) $this->param('project');

        $dir = ($prj != '') ? $dir.'/'.$prj : $dir;

        if (empty($dir)) $dir = 'files';

        $rep = $this->getResponse('html');

        $dao = jDao::get('downloads~downloads');
        $theDownload = $dao->getByUrlAndPath($url,$dir);

        if ($theDownload === false ) {
            $rep = $this->getResponse('redirect');
            $rep->action='jelix~error:notfound';
            return $rep;
        }
        jClasses::inc('downloads~download_files');
        $filesize = downloadFiles::getFileSize($theDownload->dl_filename,$theDownload->dl_path);

        if ($filesize == '' ) {
            jMessage::add('Fichier vide ou inexistant','public_msg');
            $rep = $this->getResponse('redirect');
            $rep->action='jelix~error:notfound';
            return $rep;
        }
        $rep->body->assign('selectedMenuItem','projects');
        $rep->body->assign('selectedSubMenuItem','downloads');
        $rep->title = jLocale::get('common.to.download',array($theDownload->dl_name));
        $rep->body->assign("MAIN", jZone::get('downloads~view',array('dir'=>$dir,
                                                                     'filesize'=>$filesize,
                                                                     'data'=>$theDownload)));
        return $rep;
    }

    /**
     * let's dl the file
     */
    function dl() {

        //get the config of the module from the profiles.ini.php config file
        $config = jProfiles::get('downloads');
        // get the Antileech stuff
        jClasses::inc('downloads~download_files');
        //config says :
        if (
            // ... we dont allow leecher !
            $config['allow.external.links'] == 0 and
            // ... and we found one !

            downloadFiles::antileech() == true) {
            // so go away
            $rep = $this->getResponse('redirect');
            $rep->action='jelix~error:notfound';
            return $rep;
        }

        $id = (string) $this->param('id');
        $dao = jDao::get('downloads~downloads');
        $theDownload = $dao->get($id);

        $ev = jEvent::notify('DownloadGetHostingDirectory');
        $userDir = $ev->getResponse();

        if ( $userDir[0]['hostingFolder'] != '' and $userDir[0]['hostingPath'] != '' )
            $file = $userDir[0]['hostingPath'] .DIRECTORY_SEPARATOR. $theDownload->dl_path.DIRECTORY_SEPARATOR.$theDownload->dl_filename ;
        else
            $file = $config->getValue('commons.upload.dir').DIRECTORY_SEPARATOR.$theDownload->dl_path.DIRECTORY_SEPARATOR.$theDownload->dl_filename;


        if (file_exists($file)) {
            $rep = $this->getResponse('binary');
            $rep->outputFileName = $theDownload->dl_filename;
            $rep->fileName = $file;

            $theDownload->dl_count = $theDownload->dl_count +1;

            $dao->update($theDownload);
        } else {
            $rep = $this->getResponse('redirect');
            $rep->action='jelix~error:notfound';
        }
        return $rep;
    }
}
