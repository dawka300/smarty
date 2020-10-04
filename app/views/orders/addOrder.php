<?php
include dirname(dirname(__FILE__)) . '/inc/header.php';

?>
    <div class="container">
        <form action="<?php echo action('orders/store') ?>" method="post" class="mt-3">
            <fieldset>
                <input type="hidden" name="product_id" value="">
                <input type="hidden" name="new_quantity" value="">
                <legend>Adding new order</legend>
                <div class="form-group">
                    <label for="name">Choose product</label>
                    <select name="name" id="name_producer" required class="form-control">
                        <option value="" selected disabled hidden>Choose here</option>
                        <?php foreach ($data['products'] as $product): ?>
                            <option value="<?php echo $product['producer_id'] ?>"><?php echo $product['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="producer">Producer</label>
                    <input type="text" id="producer" disabled class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input disabled class="form-control" type="number"  id="price" required>
                </div>
                <div class="form-group">
                    <label for="tax">Tax</label>
                    <input disabled min="0" class="form-control" type="number" id="tax" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input disabled class="form-control" type="number"  id="quantity" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="amount">Enter the quantity of product</label>
                        <input type="number" name="amount" id="amount" class="form-control" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="total">Total cost</label>
                        <input type="number" name="total" id="total" class="form-control" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="total_tax">Total cost with tax</label>
                        <input type="number" name="total_tax" id="total_tax" class="form-control" readonly>
                    </div>
                </div>
                <div class="row justify-content-center p-2">
                    <input type="submit" value="Add order" class="btn btn-primary btn-lg">
                </div>
            </fieldset>

        </form>

    </div>
<?php
include dirname(dirname(__FILE__)) . '/inc/footer.php';

