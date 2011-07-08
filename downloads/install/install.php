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

        if ( $this->firstExec('copyfile')) {
            $this->copyFile('dir/downloads.module.ini.php.dist', 'config:downloads.module.ini.php');
            $this->copyDirectoryContent('dir/themes/', 'www:themes/');
        }
    }

    function postInstall() {
        if (!$this->firstDbExec())
            return;
        $cn = $this->dbConnection();

        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_rights')." (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.index', 1, '')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_rights')." (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.list', 1, '')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_rights')." (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.config', 1, '')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_rights')." (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.edit', 1, '')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_rights')." (id_aclsbj, id_aclgrp, id_aclres) VALUES ('downloads.delete', 1, '')");

        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_subject')." (id_aclsbj, label_key) VALUES ('downloads.index', 'downloads~acl2.downloads.index')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_subject')." (id_aclsbj, label_key) VALUES ('downloads.list', 'downloads~acl2.downloads.list')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_subject')." (id_aclsbj, label_key) VALUES ('downloads.config', 'downloads~acl2.downloads.config')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_subject')." (id_aclsbj, label_key) VALUES ('downloads.edit', 'downloads~acl2.downloads.edit')");
        $cn->exec("INSERT INTO ".$cn->prefixTable('jacl2_subject')." (id_aclsbj, label_key) VALUES ('downloads.delete', 'downloads~acl2.downloads.delete')");

    }
}
