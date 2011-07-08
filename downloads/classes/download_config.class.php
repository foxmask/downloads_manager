<?php
/**
* @package   downloads
* @subpackage downloads
* @author    FoxMaSk
* @copyright  2008 FoxMaSk
* @link      http://www.foxmask.info
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/

class downloadConfig
{
    const DL_INI_FILE = 'downloads.module.ini.php';
    public static function getConfig() {
        global $gJConfig;
        $file = realpath(JELIX_APP_CONFIG_PATH.self::DL_INI_FILE);
        $config =  parse_ini_file($file);
        return $config;
    }
    public static function editConfig() {
        $file = realpath(JELIX_APP_CONFIG_PATH.self::DL_INI_FILE);
        $config =  new jIniFileModifier($file);
        return $config;

    }
}
