<?php
include dirname(dirname(__FILE__)) . '/inc/header.php';

?>
<div class="container">
    <form action="<?php echo action('autorzy/store') ?>" method="post" class="mt-3">
        <fieldset>
            <legend>Dodawanie nowego autora</legend>
            <div class="form-group">
                <label for="first_name">Imię</label>
                <input class="form-control" type="text" name="first_name" id="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nazwisko</label>
                <input class="form-control" type="text" name="last_name" id="last_name">
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
<?php
include dirname(dirname(__FILE__)) . '/inc/footer.php';
