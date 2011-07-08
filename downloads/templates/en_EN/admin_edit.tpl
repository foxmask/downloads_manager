<h2><img src="{$j_themepath}img/get_download.png" alt="download"/> Downloads</h2>

{if $preview == 1}
<div id="previewbox">
	<h2>Preview</h2>
	<h3>>> {$name}</h3>
	<h4>URL : {$url}</h4>
	<h5>Filename : {$filename}</h5>
	Description: {$description|wiki:'wr3_to_xhtml'|stripslashes}<br/>
	.: Last update {$date|jdatetime:'db_date':'lang_datetime'} - {$filesize} - <em>Downloaded <strong>{$counter}</strong> times</em> :.
</div>
{/if}

{form $form, 'downloads~mgr:manage'}
	{ctrl_control 'id'}	
	{ctrl_control 'login'}
	
	<p class="field">{ctrl_label 'dl_name'}<br/> {ctrl_control 'dl_name'}</p>
	<p class="field">{ctrl_label 'dl_url'}<br/> {ctrl_control 'dl_url'}<br/>
	<span class="desc">Let this field empty if you want your <acronym title="Uniform Resource Locator">URL</acronym> being automatically generated from the name given above</p></span>
	</p>
	   
	<p class="field">{ctrl_label 'project'} {ctrl_control 'project'}</p>
    
    {if $filename != ''}
    <div id="trash"><a href="#" title="delete ?" >{$filename}</a></div>
    {/if}	
	<div class="field" id="newfilename">{ctrl_label 'file_type'} {ctrl_control 'file_type'}</div>
	
    <p class="field clearb">{ctrl_label 'dl_desc'}</p>
	<p class="area">{ctrl_control 'dl_desc'}</p>
    
	<div class="two-cols">
        <p class="field col">{ctrl_label 'dl_date'}<br/> {ctrl_control 'dl_date'}</p>
        <p class="field col">{ctrl_label 'dl_count'}<br/> {ctrl_control 'dl_count'}</p>
	</div>
		
	<div>
		<p class="col"><span class="fakelabel">{ctrl_label 'dl_enable'}</span><br/> {ctrl_control 'dl_enable'}</p>
	</div>
        
    <div> {formsubmit 'validate'}</div>
{/form}
