<?php
/* Smarty version 5.4.1, created on 2024-11-08 16:08:45
  from 'file:C:\xampp\htdocs\php_04_test2t/app/security/login.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_672e297de530a5_42626941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7c349c41286cf8ba18d87f11a8735e53f1a53ff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_test2t/app/security/login.html',
      1 => 1730996620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_672e297de530a5_42626941 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_04_test2t\\app\\security';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1142694426672e297de3d5d4_21504975', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../../templates/main.html", $_smarty_current_dir);
}
/* {block 'content'} */
class Block_1142694426672e297de3d5d4_21504975 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_04_test2t\\app\\security';
?>


<form action="<?php echo $_smarty_tpl->getValue('app_root');?>
/app/security/login.php" method="post" class="login-content pure-form pure-form-stacked">
    <fieldset class="login-fieldset">
        <label for="id_login">Login: </label>
        <input id="id_login" type="text" name="login" value="<?php echo $_smarty_tpl->getValue('form')['login'];?>
">
        
        <label for="id_pass">Hasło: </label>
        <input id="id_pass" type="password" name="pass">
    </fieldset>
    <input type="submit" value="Zaloguj" class="pure-button pure-button-primary">
</form>

<?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null))) {?>
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?> 
        <div class="login-messages">
            <h4>Wystąpiły błędy:</h4>
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
        </div>
    <?php }
}
}
}
/* {/block 'content'} */
}
