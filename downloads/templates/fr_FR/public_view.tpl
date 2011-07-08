{meta_html css $j_themepath.'css/downloads.css'}
<div class="block">
    <h2><span><img src="{$j_themepath}img/download.png" alt="les téléchargements"/> Les Téléchargements du répertoire "{$path}"</span></h2>
    <div class="blockcontent">
        <div id="downloads-title">
            <h3><span>Télécharger {$download->dl_name|escxml}</span></h3>
        </div>
        <div id="downloads-downloadit">
            {$download->dl_desc|wiki:'wr3_to_xhtml'|stripslashes}<br/>
            {if $allowGuest == 1}
            <a href="{jurl 'downloads~default:dl' , array('id'=>$download->id)}" title="télécharger le fichier"><img src="{$j_themepath}img/download.png" alt="télécharger"/> Télécharger</a><br/>
            {else}
            {ifuserconnected}
            <a href="{jurl 'downloads~default:dl' , array('id'=>$download->id)}" title="télécharger le fichier"><img src="{$j_themepath}img/download.png" alt="télécharger"/> Télécharger</a><br/>
            {else}
            <strong>Vous devez être membre du site ou être connecté, pour télécharger ce fichier</strong><br/><br/>
            {/ifuserconnected}
            {/if}
            .: Dernière mise à jour {$download->dl_date|jdatetime:'db_date':'lang_datetime'} - {$filesize} - <em>Téléchargé <strong>{$download->dl_count}</strong> fois</em> :.
        </div>
    </div>
</div>
