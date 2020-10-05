{include file="../inc/header.tpl"}
<div class="container-fluid ml-auto">
    <div class="row justify-content-center p-2">
        <a href="/ksiazki/add" class="btn btn-primary btn-lg">Dodaj ksiazkę</a>
    </div>
    <table class="table table-hover text-center">
        <thead class="thead-dark">
        <th>Autor</th>
        <th>Tytuł</th>
        <th>Nr ISBN</th>
        <th>Liczba stron</th>
        <th>Opis</th>
        <th>Cena netto</th>
        <th>Cena brutto</th>
        <th>Aktywna</th>
        <th>Opcje</th>
        </thead>
        <tbody class="">
        {if (!empty($ksiazki) && count($ksiazki) > 0) }
            <tr>
                <td><input type="text" class="form-control" id="search_first_name"></td>
                <td><input type="text" class="form-control" id="search_last_name"></td>
                <td><input type="text" class="form-control" id="search_birthdate"></td>
                <td><select class="form-control">
                        <option selected>Wybierz</option>
                        <option value="1">Tak</option>
                        <option value="0">Nie</option>
                    </select></td>
                <td></td>
            </tr>
            {foreach $ksiazki as $ksiazka}
                <tr>
                    <td>{$ksiazka.imie}</td>
                    <td>{$ksiazka.nazwisko}</td>
                    <td>{$ksiazka.data_urodzenia}</td>
                    <td>{aktywny number=$ksiazka.aktywny}</td>
                    <td>
                        <form action="/autorzy/delete" method="post">
                            <div class="form-row">
                                <div class="col">
                                    <a href="/ksiazki/show/{$ksiazka.id}"
                                       class="btn btn-sm btn-primary">Pokaż książki</a>
                                </div>
                                <div class="col">
                                    <a href="/autorzy/edit/{$ksiazka.id}"
                                       class="btn btn-sm btn-info">Edytuj</a>
                                </div>
                                <div class="col">
                                    <input type="hidden" name="id" value="{$ksiazka.id}">
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
{literal}
    <script>
        $(function (){
            $('#search_birthdate').datepicker({dateFormat:"yy-mm-dd", yearRange: "1950:2022",
                changeMonth: true,
                changeYear: true});
        });
    </script>
{/literal}
{include file="../inc/footer.tpl"}