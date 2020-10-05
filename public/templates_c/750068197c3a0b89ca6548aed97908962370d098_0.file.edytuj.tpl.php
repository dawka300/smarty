<?php
/* Smarty version 3.1.36, created on 2020-10-05 22:20:35
  from 'C:\xampp\htdocs\biblioteka\public\templates\autorzy\edytuj.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f7b8013106e46_71868257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '750068197c3a0b89ca6548aed97908962370d098' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biblioteka\\public\\templates\\autorzy\\edytuj.tpl',
      1 => 1601929177,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../inc/header.tpl' => 1,
    'file:../inc/footer.tpl' => 1,
  ),
),false)) {
function content_5f7b8013106e46_71868257 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../inc/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <form action="/autorzy/update" method="post" class="mt-3">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['autor']->value['id'];?>
">
            <legend>Edycja autora</legend>
            <div class="form-group">
                <label for="first_name">Imię</label>
                <input value="<?php echo $_smarty_tpl->tpl_vars['autor']->value['imie'];?>
" class="form-control" type="text" name="first_name" id="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nazwisko</label>
                <input value="<?php echo $_smarty_tpl->tpl_vars['autor']->value['nazwisko'];?>
" class="form-control" type="text" name="last_name" id="last_name" required>
            </div>
            <div class="form-group">
                <label for="search_birthdate">Data urodzenia</label>
                <input value="<?php echo $_smarty_tpl->tpl_vars['autor']->value['data_urodzenia'];?>
" class="form-control" type="text" name="birthday" id="search_birthdate">
            </div>
            <div class="form-group">
                <label for="is_active">Czy aktywny</label>
                <select name="is_active" id="is_active" class="form-control">
                    <option value="0" <?php if ($_smarty_tpl->tpl_vars['autor']->value['aktywny'] == 0) {?>selected<?php }?>>Nie</option>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['autor']->value['aktywny'] == 1) {?>selected<?php }?>>Tak</option>
                </select>
            </div>
            <div class="row justify-content-center p-2">
                <input type="submit" value="Modyfikuj" class="btn btn-primary btn-lg">
            </div>
        </fieldset>

    </form>

</div>

    <?php echo '<script'; ?>
>
        $(function (){
            $('#search_birthdate').datepicker({dateFormat:"yy-mm-dd", changeYear: true});
        });
    <?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:../inc/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
