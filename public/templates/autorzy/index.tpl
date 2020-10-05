{include file="../inc/header.tpl"}
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
        {if (!empty($autorzy) && count($autorzy) > 0) }
            <tr>
                <td><input type="text" class="form-control" id="search_first_name"></td>
                <td><input type="text" class="form-control" id="search_last_name"></td>
                <td><input type="date" class="form-control" id="search_birthdate"></td>
                <td><select>
                        <option value="1">Tak</option>
                        <option value="0">Nie</option>
                    </select></td>
                <td></td>
            </tr>
        {foreach $autorzy as $autor}
        <tr>
            <td>{$autor.imie}</td>
            <td>{$autor.nazwisko}</td>
            <td>{$autor.data_urodzenia}</td>
            <td>{aktywny number=$autor.aktywny}</td>
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
        {/foreach}
        {else}
        <tr>
            <td class="text-center" colspan="5">Brak autorów</td>
        </tr>
        {/if}
        </tbody>
    </table>
</div>
<?php
{include file="../inc/footer.tpl"}