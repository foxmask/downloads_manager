<?php
/**
* @package   downloads
* @subpackage downloads
* @author    Olivier Demah
* @copyright  2008-2011 FoxMaSk
* @link      http://www.foxmask.info
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/
/**
 * This class is a datasource which return the file of a given directory
 */
class downloads_files_fs implements jIFormsDatasource
{
    protected $formId = 0;

    protected $data = array();

    function __construct($id)
    {
        $this->formId = $id;
        //get the config of the module from the profiles.ini.php config file
        $config = jProfiles::get('downloads');
jLog::dump($config);        
        //get the file from the FS that are not yet in the database
        $dao = jDao::get('downloads~downloads');
        $downloadsDirectory = $config['commons.hosting.path'].DIRECTORY_SEPARATOR.$config['commons.upload.dir'];
        //$dh = opendir(realpath($config['commons.hosting.path']).DIRECTORY_SEPARATOR.$config['commons.upload.dir']);
        $dir = new DirectoryIterator($downloadsDirectory);
        foreach ($dir as $fileinfo) {
            if (! $fileinfo->isDot())
                $this->data[$fileinfo->getFilename()] = $fileinfo->getFilename();
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
