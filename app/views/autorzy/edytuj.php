<?php
include dirname(dirname(__FILE__)) . '/inc/header.php';

?>
<div class="container">
    <form action="<?php echo action('autorzy/update') ?>" method="post" class="mt-3">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $data['autor']['id'];?>">
            <legend>Edycja autora</legend>
            <div class="form-group">
                <label for="name">Imię</label>
                <input value="<?php echo $data['autor']['imie']; ?>" class="form-control" type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="name">Nazwisko</label>
                <input value="<?php echo $data['autor']['nazwisko']; ?>" class="form-control" type="text" name="address" id="address">
            </div>
            <div class="form-group">
                <label for="name">Data urodzenia</label>
                <input value="<?php echo $data['autor']['data_urodzenia']; ?>" class="form-control" type="date" name="phone" id="phone">
            </div>
            <div class="form-group">
                <label for="name">Czy aktywny</label>
                <input value="<?php echo $data['autor']['aktywny']; ?>" class="form-control" type="email" name="email" id="email">
            </div>
            <div class="row justify-content-center p-2">
                <input type="submit" value="Modyfikuj" class="btn btn-primary btn-lg">
            </div>
        </fieldset>

    </form>

</div>
<?php
include dirname(dirname(__FILE__)) . '/inc/footer.php';
