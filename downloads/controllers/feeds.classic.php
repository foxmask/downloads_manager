<?php
/**
* @package   downloads
* @subpackage downloads
* @author    Olivier Demah
* @copyright  2008-2011 FoxMaSk
* @link      http://www.foxmask.info
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/

class feedsCtrl extends jController {
    private $dlDao = 'downloads~downloads';
    /**
    * display the lastest existing downloads
    */
    function lastest() {
        $from = (string) $this->param('dir');
        if (!$from) return;

        return $this->rss('lastest',$from);
    }
    /**
    * display the most popular existing downloads
    */
    function mostpopular() {
        $from = (string) $this->param('dir');
        if (!$from) return;

        return $this->rss('popular',$from);
    }
    /**
    * build the RSS !
    */
    private function rss($what,$from) {

        if ($what != 'popular' and $what != 'lastest') exit;


        jClasses::inc('download_config');
        $config = downloadConfig::getConfig();

        $rep = $this->getResponse('rss2.0');

        $rep->infos->title = jLocale::get('feeds.'.$what.'.downloads');
        $rep->infos->webSiteUrl= $config['website.url'];
        $rep->infos->copyright = $config['website.copyright'];
        $rep->infos->description = $config['website.description'];
        $rep->infos->updated = '2007-06-08 12:00:00';
        $rep->infos->published = '2007-06-08 12:00:00';
        $rep->infos->ttl=$config['website.ttl'];

        $feedsDao = jDao::get($this->dlDao);
        $first = true;

        $findThat = 'find'.ucfirst($what);
        $list = $feedsDao->$findThat($from);

        foreach($list as $feeds){

            if($first){
                $rep->infos->updated = $feeds->dl_date;
                $rep->infos->published = $feeds->dl_date;
                $first=false;
            }

            $url = jUrl::get('downloads~default:view', array('dir'=>$feeds->dl_path,'url'=>$feeds->dl_url));

            $item = $rep->createItem($feeds->dl_name, $url, $feeds->dl_date);

            $item->authorName = $config['website.author'];

            $wr = new jWiki('wr3_to_xhtml');
            $item->content = $wr->render($feeds->dl_desc);

            $item->contentType='html';

            $item->id =$feeds->id;

            $rep->addItem($item);
        }

        return $rep;
    }

}
