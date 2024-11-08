<?php
/* Smarty version 5.4.1, created on 2024-11-05 15:40:15
  from 'file:C:\xampp\htdocs\php_04_test/app/security/login.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_672a2e4fa4ec92_37582574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9dde45b1088a0ed4f7db68902af5033a55fad7b5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_test/app/security/login.html',
      1 => 1730817612,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_672a2e4fa4ec92_37582574 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_04_test\\app\\security';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1877322194672a2e4fa39c71_03377892', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1416025401672a2e4fa3dfa1_33763958', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../../templates/main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_1877322194672a2e4fa39c71_03377892 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_04_test\\app\\security';
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1416025401672a2e4fa3dfa1_33763958 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_04_test\\app\\security';
?>


<form action="<?php echo $_smarty_tpl->getValue('app_root');?>
/app/security/login.php" method="post" class="pure-form pure-form-stacked">
	<fieldset>
		<label for="id_login">login: </label>
		<input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->getValue('form')['login'];?>
" >
		<label for="id_pass">pass: </label>
		<input id="id_pass" type="password" name="pass" >
	</fieldset>
	<input type="submit" value="zaloguj" class="pure-button pure-button-primary">
</form>	

<?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null))) {?>
	<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
		<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}
}
}
/* {/block 'content'} */
}
