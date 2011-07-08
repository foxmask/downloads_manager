{if $message != ''}
<div id="messagebox">
    {for $i=0;$i < $nb_msg ; $i++}
        {$message[$i]}
    {/for}
</div>
{/if}
<h1><img src="{$j_themepath}img/downloads.png" alt="downloads"/> List of existing downloads</h1>
{assign $i = 0}
{assign $dir = ''}
{foreach $downloads as $download}
{assign $i++}
{if $dir != $download->dl_path}
{assign $dir = $download->dl_path}
{if $i > 1}
</table>
{/if}
<table class="records-list">
    <caption><a href="{jurl 'downloads~default:index',array('dir'=>$download->dl_path)}" title="see the content of this directory on the website"><img src="{$j_themepath}img/zoom.png" alt="see the content of this directory on the website"/>Directory Content</a> :{$download->dl_path}</td>see the content of this directory on the website"><img src="{$j_themepath}img/zoom.png" alt="see the content of this directory on the website"/> Directory Content</a> : </caption>
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Date</th>
            <th>Nb of Downloads</th>            
            <th>Status</th>
            <th>Action</th>
        </tr>   
    </thead>        
    {/if}    
    <tbody>
    <tr class="{cycle array('even','odd')}">
        <td class="name">{if $download->dl_filename == ''}<img src="{$j_themepath}img/warning.png" title="download without file, Think to add one file"/>{else}<img src="{$j_themepath}img/ico_file.png" alt="download with a file"/>{/if}</td>
        <td class="name"><a href="{jurl 'downloads~mgr:manage',array('id'=>$download->id)}" title="Edit this download">{$download->dl_name}</a></td>
        <td>{$download->dl_date|jdatetime:'db_date':'lang_datetime'}</td>              
        <td>{$download->dl_count}</td>
        <td>{if $download->dl_enable == 1}<a href="{jurl 'downloads~mgr:dl_disable',array('id'=>$download->id)}" title="disable"><img src="{$j_themepath}img/on.png" alt="enabled"/></a>{else}<a href="{jurl 'downloads~mgr:dl_enable',array('id'=>$download->id)}" title="enable"><img src="{$j_themepath}img/off.png" alt="disabled"/></a>{/if}</td>
        <td>
        <a href="{jurl 'downloads~mgr:delete',array('id'=>$download->id)}" title="Delet this download ?"><img src="{$j_themepath}img/delete.png" alt="supprimer" onclick="return confirm('Are you sure you want to delete this download ?')"/></a>
        {if $download->dl_filename != ''}<a href="{jurl 'downloads~mgr:trash',array('id'=>$download->id)}" title="Remove the file of this download ?"><img src="{$j_themepath}img/trash.png" alt="supprimer" onclick="return confirm('Are you sure you want to delete ths file of this download ?')"/>{else}<img src="{$j_themepath}img/warning.png" title="download without file"/>{/if}</a>
        </td>
    </tr>
    </tbody>
{/foreach}
</table>