<?php
include dirname(dirname(__FILE__)) . '/inc/header.php';

?>
    <div class="container-fluid ml-auto">
        <div class="row justify-content-center p-2">
            <a href="<?php echo action('orders/add') ?>" class="btn btn-primary btn-lg">Add order</a>
        </div>
        <table class="table table-hover text-center">
            <thead class="thead-dark">
            <th>No. order</th>
            <th>Name of product</th>
            <th>Name of producer</th>
            <th>Amount</th>
            <th>Cost</th>
            <th>Costs with tax</th>
            <th>Actions</th>
            </thead>
            <tbody class="">
            <?php if (!empty($data['orders']) && count($data['orders']) > 0):
                foreach ($data['orders'] as $order):?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['n']; ?></td>
                        <td><?php echo $order['name']; ?></td>
                        <td><?php echo $order['amount']; ?></td>
                        <td><?php echo $order['total_cost']; ?></td>
                        <td><?php echo $order['total_cost_tax']; ?></td>
                        <td>
                            <form action="<?php echo action('orders/delete') ?>" method="post">
                                <div class="form-row">
                                   <!-- <div class="col">
                                        <a href="<?php /*echo action('orders/show/') . $order['id']; */?>"
                                           class="btn btn-sm btn-primary">Show products</a>
                                    </div>
                                    <div class="col">
                                        <a href="<?php /*echo action('orders/edit/') . $order['id']; */?>"
                                           class="btn btn-sm btn-info">Edit</a>
                                    </div>-->
                                    <div class="col">
                                        <input type="hidden" name="id" value="<?php echo $order['id'] ?>">
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
                    <td class="text-center" colspan="5">No orders yet</td>
                </tr>
            <?php
            endif; ?>
            </tbody>
        </table>
    </div>
<?php
include dirname(dirname(__FILE__)) . '/inc/footer.php';
