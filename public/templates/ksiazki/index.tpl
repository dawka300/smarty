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
            {foreach $ksiazki as $ksiazka}
                <tr>
                    <td>{$ksiazka.autor}</td>
                    <td>{$ksiazka.tytul}</td>
                    <td>{$ksiazka.isbn}</td>
                    <td>{$ksiazka.liczba_stron}</td>
                    <td>{$ksiazka.opis}</td>
                    <td>{$ksiazka.cena_netto}</td>
                    <td>{$ksiazka.cena_brutto}</td>
                    <td>{if $ksiazka.aktywna == 1}TAK{else}NIE{/if}</td>
                    <td>
                        <form action="/ksiazki/delete" method="post">
                            <div class="form-row">
                                <div class="col">
                                    <a href="/ksiazki/show/{$ksiazka.id}"
                                       class="btn btn-sm btn-primary">Pokaż książki</a>
                                </div>
                                <div class="col">
                                    <a href="/ksiazki/edit/{$ksiazka.id}"
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
                <td class="text-center" colspan="5">Brak książek</td>
            </tr>
        {/if}
        </tbody>
    </table>
</div>

{include file="../inc/footer.tpl"}