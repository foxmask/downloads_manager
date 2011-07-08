{meta_html css $j_themepath.'css/downloads.css'}
{meta_html css $j_jelixwww.'/design/records_list.css'}

{if $message != ''}
<div id="downloads-messagebox">
	{for $i=0;$i < $nb_msg ; $i++}
		{$message[$i]}
	{/for}
</div>
{/if}

{if $popular == 0 and $lastest == 0}
<div class="downloads">
	<h3><span><img src="{$j_themepath}img/download.png" alt="les téléchargements"/> Les Téléchargements du répertoire "{$path}"</span></h3>
</div>
<table class="records-list">
	<thead>
		<tr >
			<th>Nom</th>
			<th>Nb Téléchargements</th>
			<th>Date</th>        
		</tr>	
	</thead>
	{if $downloads->rowCount() > 0}
	<tbody>
	{foreach $downloads as $download}
	<tr class="{cycle array('even','odd')}">
		<td class="downloads-colleft"><a href="{jurl 'downloads~default:view',array('url'=>$download->dl_url,'dir'=>$download->dl_path)}" title="Détails de ce téléchargement">{$download->dl_name}</a></td>        
		<td class="downloads-colnum">{$download->dl_count}</td>
		<td class="downloads-colright">{$download->dl_date|jdatetime:'db_date':'lang_datetime'}</td>        
	</tr>
	{/foreach}
	</tbody>
	{else}
	<tbody>
		<tr class="even">
			<td> </td>
		</tr>
	</tbody>
	{/if}
</table>
{/if}

{pagelinks 'downloads~default:index', array('dir'=>$path),  $total, $offset, $nbPerPage, 'offset'}
{if $popular}
<div class="downloads">
	<h3><span><img src="{$j_themepath}img/pop_download.png" alt="téléchargements populaires"/> Téléchargements les plus populaires</span></h3>
</div>
<table class="records-list">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Nb Téléchargements</th>
			<th>Date</th>        
		</tr>
	</thead>
	{if $populars->rowCount() > 0}
	<tbody>			
	{foreach $populars as $popular}
	<tr class="{cycle array('even','odd')}">
		<td><a href="{jurl 'downloads~default:view',array('url'=>$popular->dl_url,'dir'=>$popular->dl_path)}" title="Détails de ce téléchargement">{$popular->dl_name}</a></td>        
		<td>{$popular->dl_count}</td>
		<td>{$popular->dl_date|jdatetime:'db_date':'lang_datetime'}</td>        
	</tr>
	{/foreach}
	</tbody>
	{else}
	<tbody>
		<tr class="even">
			<td> </td>
		</tr>
	</tbody>
	{/if}	
</table>
{/if}

{if $lastest}
<div class="downloads">
	<h3><span><img src="{$j_themepath}img/last_download.png" alt="derniers téléchargements"/> Derniers téléchargements ajoutés</span></h3>
</div>		
<table class="records-list">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Date</th>
		</tr>
	</thead>
	{if $populars->rowCount() > 0}
	<tbody>	
	{foreach $lastests as $lastest}
	<tr class="{cycle array('even','odd')}">
		<td><a href="{jurl 'downloads~default:view',array('url'=>$lastest->dl_url,'dir'=>$lastest->dl_path)}" title="Détails de ce téléchargement">{$lastest->dl_name}</a></td>
		<td>{$lastest->dl_date|jdatetime:'db_date':'lang_datetime'}</td>              
	</tr>
	{/foreach}
	</tbody>
	{else}
	<tbody>
		<tr class="even">
			<td> </td>
		</tr>
	</tbody>
	{/if}	
</table>
{/if}

