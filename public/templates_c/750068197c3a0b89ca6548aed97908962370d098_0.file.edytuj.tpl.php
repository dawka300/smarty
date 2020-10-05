<?php
/* Smarty version 3.1.36, created on 2020-10-05 21:15:44
  from 'C:\xampp\htdocs\biblioteka\public\templates\autorzy\edytuj.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f7b70e0320cb7_10605613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '750068197c3a0b89ca6548aed97908962370d098' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biblioteka\\public\\templates\\autorzy\\edytuj.tpl',
      1 => 1601851788,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../inc/header.tpl' => 1,
    'file:../inc/footer.tpl' => 1,
  ),
),false)) {
function content_5f7b70e0320cb7_10605613 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../inc/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <form action="/autorzy/update" method="post" class="mt-3">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo '<?php ';?>
echo $data['autor']['id'];<?php echo '?>';?>
">
            <legend>Edycja autora</legend>
            <div class="form-group">
                <label for="name">Imię</label>
                <input value="<?php echo '<?php ';?>
echo $data['autor']['imie']; <?php echo '?>';?>
" class="form-control" type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="name">Nazwisko</label>
                <input value="<?php echo '<?php ';?>
echo $data['autor']['nazwisko']; <?php echo '?>';?>
" class="form-control" type="text" name="address" id="address">
            </div>
            <div class="form-group">
                <label for="name">Data urodzenia</label>
                <input value="<?php echo '<?php ';?>
echo $data['autor']['data_urodzenia']; <?php echo '?>';?>
" class="form-control" type="date" name="phone" id="phone">
            </div>
            <div class="form-group">
                <label for="name">Czy aktywny</label>
                <input value="<?php echo '<?php ';?>
echo $data['autor']['aktywny']; <?php echo '?>';?>
" class="form-control" type="email" name="email" id="email">
            </div>
            <div class="row justify-content-center p-2">
                <input type="submit" value="Modyfikuj" class="btn btn-primary btn-lg">
            </div>
        </fieldset>

    </form>

</div>
<?php $_smarty_tpl->_subTemplateRender("file:../inc/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
