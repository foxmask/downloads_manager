{meta_html css $j_themepath.'css/downloads.css'}
<div class="downloads-headings">
	<h2><span><img src="{$j_themepath}img/download.png" alt="the downloads"/> The downloads of the directory "{$path}"</span></h2>
</div>
<div id="downloads-title">
	<h3><span>Download {$download->dl_name|escxml}</span></h3>
</div>	
<div id="downloads-downloadit">
	{$download->dl_desc|wiki:'wr3_to_xhtml'|stripslashes}<br/>        
	{if $allowGuest == 1}	
	<a href="{jurl 'downloads~default:dl' , array('id'=>$download->id)}" title="download this file"><img src="{$j_themepath}img/download.png" alt="to download"/> to download</a><br/>
	{else}
	{ifuserconnected}	
	<a href="{jurl 'downloads~default:dl' , array('id'=>$download->id)}" title="download this file"><img src="{$j_themepath}img/download.png" alt="to download"/> to download</a><br/>
	{else}
	<strong>You are not a member of the website or you are not connected to download this file</strong><br/><br/>
	{/ifuserconnected}
	{/if}
	.: Last update {$download->dl_date|jdatetime:'db_date':'lang_datetime'} - {$filesize} - <em>Downloaded <strong>{$download->dl_count}</strong> fois</em> :.
</div>
