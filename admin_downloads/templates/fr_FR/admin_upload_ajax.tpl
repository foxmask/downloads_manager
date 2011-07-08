<div class="field" id="newfilename"><label class="jforms-label jforms-required" for="jforms_admin_downloads_edit_file_type" id="jforms_admin_downloads_edit_file_type_label">Choisissez un fichier<span class="jforms-required-star">*</span></label>
<ul class="jforms-choice jforms-ctl-file_type" >
    <li><label><input name="file_type" id="jforms_admin_downloads_edit_file_type_0" type="radio" value="file_upload" checked="checked" onclick="jFormsJQ.getForm('jforms_admin_downloads_edit').getControl('file_type').activate('file_upload')"/>Depuis votre ordinateur</label>
    <span class="jforms-item-controls"><label class="jforms-label" for="jforms_admin_downloads_edit_dl_filename" id="jforms_admin_downloads_edit_dl_filename_label">:</label>
    <input name="dl_filename" id="jforms_admin_downloads_edit_dl_filename" class="jforms-ctrl-upload" type="file" value=""/>
    </span>
    </li>
    <li><label><input name="file_type" id="jforms_admin_downloads_edit_file_type_1" type="radio" value="file_ftp" onclick="jFormsJQ.getForm('jforms_admin_downloads_edit').getControl('file_type').activate('file_ftp')"/>Depuis le serveur FTP</label>
    <span class="jforms-item-controls"><label class="jforms-label" for="jforms_admin_downloads_edit_file_from_fs" id="jforms_admin_downloads_edit_file_from_fs_label">:</label>
    <select name="file_from_fs" id="jforms_admin_downloads_edit_file_from_fs" class="jforms-ctrl-menulist" size="1">
        <option value="" selected="selected">Choose a file</option>
        {foreach $datas as $data}
        <option value="{$data}">{$data}</option>
        {/foreach}
    </select>
    </span>
    </li>
</ul>
