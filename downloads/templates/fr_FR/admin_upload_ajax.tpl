<label class="jforms-label jforms-required" for="jforms_downloads_edit_file_type">Choisissez un fichier</label> <ul class="jforms-choice jforms-ctl-file_type" >
<li><label><input type="radio" name="file_type" id="jforms_downloads_edit_file_type_0" value="file_upload" checked="checked" onclick="jFormsJQ.getForm('jforms_downloads_edit').getControl('file_type').activate('file_upload')"/>Depuis votre ordinateur</label>  <span class="jforms-item-controls"><label class="jforms-label" for="jforms_downloads_edit_dl_filename">:</label> <input type="hidden" name="MAX_FILE_SIZE" value="50000000"/><input type="file" name="dl_filename" id="jforms_downloads_edit_dl_filename" value=""/></span>
</li>
<li><label><input type="radio" name="file_type" id="jforms_downloads_edit_file_type_1" value="file_ftp" onclick="jFormsJQ.getForm('jforms_downloads_edit').getControl('file_type').activate('file_ftp')"/>Depuis le serveur FTP</label>  <span class="jforms-item-controls"><label class="jforms-label" for="jforms_downloads_edit_file_from_fs">:</label>
    <select name="file_from_fs" id="jforms_downloads_edit_file_from_fs" size="1">
        <option value="" selected="selected"></option>
        {foreach $datas as $data}
        <option value="{$data}">{$data}</option>
        {/foreach}
    </select>
    </span>
</li>

</ul>
