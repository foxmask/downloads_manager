<h2><img src="{$j_themepath}img/download.png" alt="configuration"/> Downloads : Configuration</h2>
{if $message != ''}
<div id="messagebox">
    {for $i=0;$i < $nb_msg ; $i++}
        {$message[$i]}
    {/for}
</div>
{/if}
{form $form, 'admin_downloads~mgr:config'}
    <fieldset>
        <legend>To Allow ...</legend>

        <p><span class="fakelabel">The guest to download ?</span></p>
        <p>{ctrl_label 'guest'}<br/> {ctrl_control 'guest'}</p>
        <p><span class="desc">If yes, everyone could download. If no, only the members of your website could</span></p>

        <p><span class="fakelabel">Externals links (from your website) ?</span></p>
        <p>{ctrl_label 'external_links'}<br/> {ctrl_control 'external_links'}</p>
        <p><span class="desc">Permits to allow or not direct links on files without accessing your file from your website.</span></p>
    </fieldset>
    <fieldset>
        <legend>Display of the module :</legend>

        <p class="field">{ctrl_label 'number_downloads_on_home'} {ctrl_control 'number_downloads_on_home'}</p>
        <p><span class="desc">Put the number of downloads to be display on the module.</span></p>

        <p><span class="fakelabel">{ctrl_label 'last_downloads_on_home'}<br/>{ctrl_control 'last_downloads_on_home'}</span></p>
        <p><span class="desc">Permits to display the lastest added downloads on the home of module.</span></p>

        <p><span class="fakelabel">{ctrl_label 'most_popular_downloads_on_home'}<br/> {ctrl_control 'most_popular_downloads_on_home'}</span></p>
        <p><span class="desc">Permits to display the most popular downloads on the home of module.</span></p>
    </fieldset>
    <p>{formsubmit '_submit'}</p>
{/form}
