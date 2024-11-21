<?php
/* Smarty version 5.4.1, created on 2024-11-18 15:26:41
  from 'file:LoginView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_673b4ea1199bd5_28425185',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31cdd33eb68513dd0fb16293a313a82b9ccb19a5' => 
    array (
      0 => 'LoginView.tpl',
      1 => 1731936522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_673b4ea1199bd5_28425185 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_05a_test\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1695111390673b4ea1186105_58326661', 'content');
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1695111390673b4ea1186105_58326661 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_05a_test\\app\\views';
?>


<form action="<?php echo $_smarty_tpl->getValue('conf')->action_root;?>
login" method="post" class="login-content pure-form pure-form-stacked">
    <fieldset class="login-fieldset">
        <label for="id_login">Login:</label>
        <input id="id_login" type="text" name="login" value="<?php echo (($tmp = $_smarty_tpl->getValue('form')->login ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
        
        <label for="id_pass">Hasło:</label>
        <input id="id_pass" type="password" name="pass">
    </fieldset>
    <input type="submit" value="Zaloguj" class="pure-button pure-button-primary">
</form>

<?php if ((null !== ($_smarty_tpl->getValue('msgs') ?? null)) && $_smarty_tpl->getValue('msgs')->isError()) {?>
    <div class="login-messages">
        <h4>Wystąpiły błędy:</h4>
        <ol class="err">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getErrors(), 'msg');
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
    </div>
<?php }
}
}
/* {/block 'content'} */
}
