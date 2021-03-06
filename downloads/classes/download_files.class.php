<?php
/**
* @package   downloads
* @subpackage downloads
* @author    Olivier Demah
* @copyright  2008-2011 FoxMaSk
* @link      http://www.foxmask.info
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/

class downloadFiles {
    /*
     * getFileSize
     *
     * display the filesize on the preview page
     */
    public static function getFileSize($filename,$path) {

        $ev = jEvent::notify('DownloadGetHostingDirectory');
        $userDir = $ev->getResponse();

        if ( $userDir[0]['hostingPath'] != '' ) {

            $file = $userDir[0]['hostingPath'] .DIRECTORY_SEPARATOR. $path. DIRECTORY_SEPARATOR.$filename ;
        }
        else {
            //get the config of the module from the profiles.ini.php config file
            $config = jProfiles::get('downloads');

            $file = realpath($config['commons.hosting.path']).DIRECTORY_SEPARATOR.$path.DIRECTORY_SEPARATOR.$filename;
        }

        $filesize = '';

        if (! file_exists($file)) return $filesize;

        //on ne calcul pas la taille de fichiers "distants"

        // calculate the size of the file to download and display it
        $size = @filesize($file);
        $i=0;
        $iec = array("B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB");
        while (($size/1024)>1)
        {
            $size=$size/1024;
            $i++;
        }
        $filesize = substr($size,0,strpos($size,'.')+4).$iec[$i];

        return $filesize;
    }

    // AntiLeech : check the HTTP_REFERER vs HTTP_HOST
    public static function antileech() {
        $referer = getenv("HTTP_REFERER");
        $host = parse_url($referer);

        if (!isset($host['host'])) return false;

        $host_string='';

        if (array_key_exists('port',$host))
            if ( $host['port'] != '80' )
                $host_string = $host['host'].":".$host['port'];
            else
                $host_string = $host['host'];
        else $host_string = $host['host'];

        if ($host_string != '' && $host_string != $_SERVER['HTTP_HOST'])
            return true; // yes it's a leecher ; we bloc it
        else
            return false;
    }
}
