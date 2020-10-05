<?php
/* Smarty version 3.1.36, created on 2020-10-05 21:12:13
  from 'C:\xampp\htdocs\biblioteka\public\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5f7b700d002223_51798710',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d0f44d8f11f8cb355c1c1c47c66321b60150a5f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biblioteka\\public\\templates\\index.tpl',
      1 => 1601925130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:inc/header.tpl' => 1,
    'file:inc/footer.tpl' => 1,
  ),
),false)) {
function content_5f7b700d002223_51798710 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:inc/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container">
        <div class="jumbotron mt-5">
            <div class="row">
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Liczba autorów
                        </div>
                        <div class="card-body">
                            <?php echo array_shift($_smarty_tpl->tpl_vars['autorzy']->value);?>

                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Number of products
                        </div>
                        <div class="card-body">
<!--                            <h5 class="card-title">--><?php echo '<?php ';?>
//echo $data['products']<?php echo '?>';?>
<!--</h5>-->
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Number of orders
                        </div>
                        <div class="card-body">
<!--                            <h5 class="card-title">--><?php echo '<?php ';?>
//echo $data['orders']<?php echo '?>';?>
<!--</h5>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php $_smarty_tpl->_subTemplateRender("file:inc/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
