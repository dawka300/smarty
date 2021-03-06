<?php
include dirname(dirname(__FILE__)) . '/inc/header.php';

?>
    <div class="container-fluid ml-auto">

            <div class="row justify-content-center p-2">
                <a href="<?php echo action('products/add') ?>" class="btn btn-primary btn-lg">Add product</a>
            </div>
        <div class="jumbotron text-center text-dark"><h3>Products of <?php echo $data['producer']['name'];?></h3></div>
        <table class="table table-hover text-center">
            <thead class="thead-dark">
            <th>Name</th>
            <th>Price</th>
            <th>Tax</th>
            <th>Quantity</th>
            <th>Actions</th>
            </thead>
            <tbody class="table-hover">
            <?php if (!empty($data['products']) && count($data['products']) > 0):
                foreach ($data['products'] as $product):?>
                    <tr>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['tax']; ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td>
                            <form action="<?php echo action('products/delete') ?>" method="post">
                                <div class="form-row">
                                    <!--<div class="col">
                                    <a href="<?php /*echo action('products/show/') . $product['id']; */?>"
                                       class="btn btn-sm btn-primary">Show products</a>
                                </div>-->
                                    <div class="col">
                                        <a href="<?php echo action('products/edit/') . $product['id']; ?>"
                                           class="btn btn-sm btn-info">Edit</a>
                                    </div>
                                    <div class="col">
                                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete"
                                               onclick="return confirm('Are you sure?')">
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;
            else:?>
                <tr>
                    <td class="text-center" colspan="5">No products yet.</td>
                </tr>
            <?php
            endif; ?>
            </tbody>
        </table>
    </div>
<?php
include dirname(dirname(__FILE__)) . '/inc/footer.php';
