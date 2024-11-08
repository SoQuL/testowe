<?php
/* Smarty version 5.4.1, created on 2024-11-05 16:14:11
  from 'file:C:\xampp\htdocs\php_04_test/app/inna_chroniona.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_672a3643681d03_26900819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3216a8b0e1dc9eda79f0595e8242b042d35ba16' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_test/app/inna_chroniona.html',
      1 => 1730819650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_672a3643681d03_26900819 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_04_test\\app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_93410767672a364367d242_29471332', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1890289559672a3643681237_04523012', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "C:/xampp/htdocs/php_04_test/templates/main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_93410767672a364367d242_29471332 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_04_test\\app';
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1890289559672a3643681237_04523012 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_04_test\\app';
?>


<div>
	<a href="<?php echo $_smarty_tpl->getValue('app_root');?>
/app/calc.php" class="pure-button">Powrót do kalkulatora</a>
	<a href="<?php echo $_smarty_tpl->getValue('app_root');?>
/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div>
	<p>To jest inna chroniona strona aplikacji internetowej</p>
</div>	
<?php
}
}
/* {/block 'content'} */
}
