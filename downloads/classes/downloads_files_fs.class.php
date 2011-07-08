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
class downloads_files_fs implements jIFormsDatasource
{
  protected $formId = 0;

  protected $data = array();

  function __construct($id)
  {
    $this->formId = $id;
    jClasses::inc('download_config');
    $config = downloadConfig::getConfig();
    //get the file from the FS that are not yet in the database
    $dao = jDao::get('downloads~downloads');
    $dh = opendir($config->getValue('commons.hosting.path').DIRECTORY_SEPARATOR.$config->getValue('commons.upload.dir'));
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
