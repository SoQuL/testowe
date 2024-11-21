{extends file="main.tpl"}

{block name=content}

<form id="content" action="{$conf->action_root}calcCompute" method="post">
	<fieldset class="form-fieldset">
        <label for="id_amount">Kwota kredytu</label>
        <input id="id_amount" type="text" name="amount" value="{$form->amount|default:''}">
        
        <label for="id_period">Na ile lat</label>
        <input id="id_period" type="text" name="period" value="{$form->period|default:''}">
        
        <label for="id_interest_rate">Oprocentowanie</label>
        <input id="id_interest_rate" type="text" name="interest_rate" value="{$form->interest_rate|default:''}">
        
        <input type="submit" value="Oblicz" class="button">
        </fieldset>
</form>


<div class="messages">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if $msgs->isError()}
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if isset($res->result)}
	<h4>Wynik</h4>
	<p class="res">
	{number_format($res->result, 2)}
	</p>
{/if}

</div>

{/block}