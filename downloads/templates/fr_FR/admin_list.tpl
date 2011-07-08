{if $message != ''}
<div id="messagebox">
    {for $i=0;$i < $nb_msg ; $i++}
        {$message[$i]}
    {/for}
</div>
{/if}
<h1><img src="{$j_themepath}img/downloads.png" alt="téléchargements"/> Liste des téléchargements existants</h1>
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
    <caption><a href="{jurl 'downloads~default:index',array('dir'=>$download->dl_path)}" title="voir le contenu de ce répertoire sur le site"><img src="{$j_themepath}img/zoom.png" alt="voir le contenu du répertoire sur le site"/>Contenu du Répertoire</a>: {$download->dl_path}</caption>
    <thead>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Date</th>
            <th>Nb Téléchargements</th>            
            <th>Etat</th>        
            <th>Action</th>
        </tr>
    </thead>    
    {/if}
    <tbody>
    <tr class="{cycle array('even','odd')}">
        <td class="name">{if $download->dl_filename == ''}<img src="{$j_themepath}img/warning.png" alt="téléchargement sans fichier, penser à rajouter un fichier"/>{else}<img src="{$j_themepath}img/ico_file.png" alt="téléchargement avec fichier"/>{/if}</td>
        <td class="name"><a href="{jurl 'downloads~mgr:manage',array('id'=>$download->id)}" title="Editer ce téléchargement">{$download->dl_name}</a></td>
        <td>{$download->dl_date|jdatetime:'db_date':'lang_datetime'}</td>              
        <td>{$download->dl_count}</td>
        <td>{if $download->dl_enable == 1}<a href="{jurl 'downloads~mgr:dl_disable',array('id'=>$download->id)}" title="désactiver"><img src="{$j_themepath}img/on.png" alt="actif"/></a>{else}<a href="{jurl 'downloads~mgr:dl_enable',array('id'=>$download->id)}" title="activer"><img src="{$j_themepath}img/off.png" alt="inactif"/></a>{/if}</td>
        <td>
        <a href="{jurl 'downloads~mgr:delete',array('id'=>$download->id)}" title="Supprimer ce téléchargement ?"><img src="{$j_themepath}img/delete.png" alt="supprimer" onclick="return confirm('Etes vous sûr de vouloir supprimer ce téléchargement ?')"/></a>
        {if $download->dl_filename != ''}<a href="{jurl 'downloads~mgr:trash',array('id'=>$download->id)}" title="Supprimer le fichier de ce téléchargement ?"><img src="{$j_themepath}img/trash.png" alt="supprimer" onclick="return confirm('Etes vous sûr de vouloir supprimer le fichier de ce téléchargement ?')"/></a>{else}<img src="{$j_themepath}img/warning.png" alt="téléchargement sans fichier"/>{/if}
        </td>
    </tr>
    </tbody>
{/foreach}     
</table>
