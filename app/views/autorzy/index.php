<?php
include dirname(dirname(__FILE__)) . '/inc/header.php';

?>
    <div class="container-fluid ml-auto">
        <div class="row justify-content-center p-2">
            <a href="<?php echo action('autorzy/add') ?>" class="btn btn-primary btn-lg">Dodaj autora</a>
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
            <?php if (!empty($data['autorzy']) && count($data['autorzy']) > 0):
                foreach ($data['autorzy'] as $autor):?>
                    <tr>
                        <td><?php echo $autor['imie']; ?></td>
                        <td><?php echo $autor['nazwisko']; ?></td>
                        <td><?php echo $autor['data_urodzenia']; ?></td>
                        <td><?php echo $autor['aktywny']; ?></td>
                        <td>
                            <form action="<?php echo action('autorzy/delete') ?>" method="post">
                                <div class="form-row">
                                    <div class="col">
                                        <a href="<?php echo action('producers/show/') . $autor['id']; ?>"
                                           class="btn btn-sm btn-primary">Pokaż książki</a>
                                    </div>
                                    <div class="col">
                                        <a href="<?php echo action('autorzy/edit/') . $autor['id']; ?>"
                                           class="btn btn-sm btn-info">Edytuj</a>
                                    </div>
                                    <div class="col">
                                    <input type="hidden" name="id" value="<?php echo $autor['id'] ?>">
                                    <input class="btn btn-danger btn-sm" type="submit" value="Kasuj"
                                           onclick="return confirm('Czy jesteś pewien, że chcesz usunąć tego autora?')">
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;
            else:?>
                <tr>
                    <td class="text-center" colspan="5">Brak autorów</td>
                </tr>
            <?php
            endif; ?>
            </tbody>
        </table>
    </div>
<?php
include dirname(dirname(__FILE__)) . '/inc/footer.php';
