<?php
include dirname(dirname(__FILE__)) . '/inc/header.php';

?>
    <div class="container">
        <form action="<?php echo action('products/store') ?>" method="post" class="mt-3">
            <fieldset>
                <legend>Adding new product</legend>
                <div class="form-group">
                    <label for="name">Name of product</label>
                    <input class="form-control" type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="producer">Select producer</label>
                    <select class="form-control" type="text" name="producer_id" id="producer">
                        <?php foreach ($data['producers'] as $producer): ?>
                            <option value="<?php echo $producer['id'] ?>"><?php echo $producer['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input min="0" class="form-control" type="number" name="price" id="price" required value="0.00" step="0.10">
                </div>
                <div class="form-group">
                    <label for="tax">Tax (%)</label>
                    <input min="0" class="form-control" type="number" name="tax" id="tax" required value="0.00" step="0.10">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input min="0" class="form-control" type="number" name="quantity" id="quantity" required>
                </div>
                <div class="row justify-content-center p-2">
                    <input type="submit" value="Add product" class="btn btn-primary btn-lg">
                </div>
            </fieldset>

        </form>

    </div>
<?php
include dirname(dirname(__FILE__)) . '/inc/footer.php';
