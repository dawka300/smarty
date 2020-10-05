<?php
/* Smarty version 3.1.36, created on 2020-10-05 20:55:11
  from 'C:\xampp\htdocs\biblioteka\public\templates\autorzy\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f7b6c0fb68bc8_62129443',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2848050e63f5f9d592b3c2a08051bb31e913efb2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biblioteka\\public\\templates\\autorzy\\index.tpl',
      1 => 1601924104,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../inc/header.tpl' => 1,
    'file:../inc/footer.tpl' => 1,
  ),
),false)) {
function content_5f7b6c0fb68bc8_62129443 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../inc/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container-fluid ml-auto">
    <div class="row justify-content-center p-2">
        <a href="/autorzy/add" class="btn btn-primary btn-lg">Dodaj autora</a>
    </div>
    <table class="table table-hover text-center">
        <thead class="thead-dark">
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Data urodzenia</th>
        <th>Czy aktywny</th>
        <th>Opcje</th>
        </thead>
        <tbody class="">
        <?php if ((!empty($_smarty_tpl->tpl_vars['autorzy']->value) && count($_smarty_tpl->tpl_vars['autorzy']->value) > 0)) {?>
            <tr>
                <td><input type="text" class="form-control" id="search_first_name"></td>
                <td><input type="text" class="form-control" id="search_last_name"></td>
                <td><input type="date" class="form-control" id="search_birthdate"></td>
                <td><select class="form-control">
                        <option selected>Wybierz</option>
                        <option value="1">Tak</option>
                        <option value="0">Nie</option>
                    </select></td>
                <td></td>
            </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autorzy']->value, 'autor');
$_smarty_tpl->tpl_vars['autor']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['autor']->value) {
$_smarty_tpl->tpl_vars['autor']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['autor']->value['imie'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['autor']->value['nazwisko'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['autor']->value['data_urodzenia'];?>
</td>
            <td><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['aktywny'][0], array( array('number'=>$_smarty_tpl->tpl_vars['autor']->value['aktywny']),$_smarty_tpl ) );?>
</td>
            <td>
                <form action="/autorzy/delete" method="post">
                    <div class="form-row">
                        <div class="col">
                            <a href="<?php echo '<?php ';?>
echo action('producers/show/') . $autor['id']; <?php echo '?>';?>
"
                               class="btn btn-sm btn-primary">Pokaż książki</a>
                        </div>
                        <div class="col">
                            <a href="/autorzy/edit/<?php echo $_smarty_tpl->tpl_vars['autor']->value['id'];?>
"
                               class="btn btn-sm btn-info">Edytuj</a>
                        </div>
                        <div class="col">
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['autor']->value['id'];?>
">
                            <input class="btn btn-danger btn-sm" type="submit" value="Kasuj"
                                   onclick="return confirm('Czy jesteś pewien, że chcesz usunąć tego autora?')">
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?>
        <tr>
            <td class="text-center" colspan="5">Brak autorów</td>
        </tr>
        <?php }?>
        </tbody>
    </table>
</div>
<?php echo '<?php
';
$_smarty_tpl->_subTemplateRender("file:../inc/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
