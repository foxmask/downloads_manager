<?php
/**
* @package   downloads
* @subpackage downloads
* @author    FoxMaSk
* @copyright  2008 FoxMaSk
* @link      http://www.foxmask.info
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/

class downloads_files_fs implements jIFormsDatasource
{
    protected $formId = 0;

    protected $data = array();

    function __construct($id)
    {
        $this->formId = $id;
        jClasses::inc('downloads~download_config');
        $config = downloadConfig::getConfig();
        //get the file from the FS that are not yet in the database
        $dao = jDao::get('downloads~downloads');
        $dh = opendir(realpath($config['commons.hosting.path']).DIRECTORY_SEPARATOR.$config['commons.upload.dir']);
        while (($file = readdir($dh)) !== false) {
            if (! preg_match('/^\.(.*)/',$file) ) {
                if ( $dao->getFile($file) === false )
                    $this->data[$file] = $file;
            }
        }
    }

    public function getData($form)
    {
        return ($this->data);
    }

    public function getLabel($key)
    {
        if(isset($this->data[$key]))
            return $this->data[$key];
        else
            return null;
    }

}
