<?php
/**
* @package   downloads
* @subpackage downloads
* @author    FoxMaSk
* @link      http://www.foxmask.info
* @licence  http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public Licence, see LICENCE file
*/
/**
 * Class that handles the installation of the database
 */
class downloadsModuleInstaller extends jInstallerModule {

    function install() {
        if ($this->firstDbExec()) 
            $this->execSQLScript('sql/install');
            
        $file = jApp::configPath('profiles.ini.php');
        if (file_exists($file)) {        
            $profile = new jIniFileModifier($file);
            $profile->setValue('default','myapp','downloads');
            $profile->setValue('commons.upload.dir','files','downloads:myapp');
            $profile->setValue('commons.hosting.path','/path/to/the/hosting/dir/','downloads:myapp');
            $profile->setValue('allow.guest','1','downloads:myapp');
            $profile->setValue('allow.external.links','0','downloads:myapp');
            $profile->setValue('number.downloads.on.home','5','downloads:myapp');
            $profile->setValue('last.downloads.on.home','0','downloads:myapp');
            $profile->setValue('most.popular.downloads.on.home','0','downloads:myapp');
            $profile->setValue('website.url','http://localhost.downloads/','downloads:myapp');
            $profile->setValue('website.copyright','FoxMaSk 2008-2011','downloads:myapp');
            $profile->setValue('website.description','FoxMaSk 0wnZ','downloads:myapp');
            $profile->setValue('website.author','FoxMaSk','downloads:myapp');
            $profile->setValue('website.ttl','60','downloads:myapp');
            $profile->save();            
        }

        if ( $this->firstExec('copyfile')) {
            $this->copyDirectoryContent('dir/themes/', 'www:themes/');
        }
    }

    function postInstall() {
        if (!$this->firstDbExec())
            return;
        $cn = $this->dbConnection();

        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_rights')." (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.index', 'admins', '')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_rights')." (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.list', 'admins', '')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_rights')." (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.config', 'admins', '')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_rights')." (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.edit', 'admins', '')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_rights')." (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.delete', 'admins', '')");

        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_subject')." (id_aclsbj, label_key, id_aclsbjgrp) VALUES ('downloads.index', 'downloads~acl2.downloads.index','downloads.grp.management')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_subject')." (id_aclsbj, label_key, id_aclsbjgrp) VALUES ('downloads.list', 'downloads~acl2.downloads.list','downloads.grp.management')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_subject')." (id_aclsbj, label_key, id_aclsbjgrp) VALUES ('downloads.config', 'downloads~acl2.downloads.config','downloads.grp.management')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_subject')." (id_aclsbj, label_key, id_aclsbjgrp) VALUES ('downloads.edit', 'downloads~acl2.downloads.edit','downloads.grp.management')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_subject')." (id_aclsbj, label_key, id_aclsbjgrp) VALUES ('downloads.delete', 'downloads~acl2.downloads.delete','downloads.grp.management')");

        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_subject_group')." (id_aclsbjgrp, label_key) VALUES ('downloads.grp.management','downloads~acl2.downloads.management')");

    }
}
