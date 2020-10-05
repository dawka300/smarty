<?php
/* Smarty version 3.1.36, created on 2020-10-05 00:48:13
  from 'C:\xampp\htdocs\biblioteka\public\templates\autorzy\dodaj.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f7a512d4b37d2_45601800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '208814fbf74187b8092758c432e139874405e053' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biblioteka\\public\\templates\\autorzy\\dodaj.tpl',
      1 => 1601851676,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../inc/header.tpl' => 1,
    'file:../inc/footer.tpl' => 1,
  ),
),false)) {
function content_5f7a512d4b37d2_45601800 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../inc/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <form action="/autorzy/store" method="post" class="mt-3">
        <fieldset>
            <legend>Dodawanie nowego autora</legend>
            <div class="form-group">
                <label for="first_name">Imię</label>
                <input class="form-control" type="text" name="first_name" id="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nazwisko</label>
                <input class="form-control" type="text" name="last_name" id="last_name" required>
            </div>
            <div class="form-group">
                <label for="birthday">Data urodzenia</label>
                <input class="form-control" type="date" name="birthday" id="birthday">
            </div>
            <div class="form-group">
                <label for="name">Czy aktywny</label>
                <select class="form-control" id="is_active" name="is_active">
                    <option value="1" selected>Tak</option>
                    <option value="0">Nie</option>
                </select>
            </div>
            <div class="row justify-content-center p-2">

                <input type="submit" value="Dodaj autora" class="btn btn-primary btn-lg">
            </div>
        </fieldset>

    </form>

</div>
<?php $_smarty_tpl->_subTemplateRender("file:../inc/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
