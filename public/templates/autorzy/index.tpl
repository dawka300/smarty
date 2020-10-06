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
                <td><input type="text" class="form-control search" id="search_first_name"></td>
                <td><input type="text" class="form-control search" id="search_last_name"></td>
                <td><input type="text" class="form-control seacrh" id="search_birthdate"></td>
                <td><select class="form-control search" id="search_active">
                        <option selected disabled>Wybierz</option>
                        <option value="1">Tak</option>
                        <option value="0">Nie</option>
                    </select></td>
                <td></td>
            </tr>
        {foreach $autorzy as $autor}
        <tr class="ajax">
            <td>{$autor.imie}</td>
            <td>{$autor.nazwisko}</td>
            <td>{$autor.data_urodzenia}</td>
            <td>{aktywny number=$autor.aktywny}</td>
            <td>
                <form action="/autorzy/delete" method="post">
                    <div class="form-row">
                        <div class="col">
                            <a href="/autorzy/edit/{$autor.id}"
                               class="btn btn-sm btn-info">Edytuj</a>
                        </div>
                        <div class="col">
                            <input type="hidden" name="id" value="{$autor.id}">
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
            $('.search').on('keyup change', function (){
                let imie = $('#search_first_name').val();
                let nazwisko = $('#search_last_name').val();
                let urodziny = $('#search_birthdate').val();
                let aktywny = $('#search_active').val();
                $.ajax({
                    method: "post",
                    url: "/autorzy/ajax_filter",
                    data: {ajax:{imie: imie, nazwisko: nazwisko, data_urodzenia: urodziny, aktywny: aktywny}},
                    success: function ($data) {
                        let wynik = JSON.parse($data);
                        wynik = wynik.odp
                        let html = '';
                        for (let prop in wynik){
                            if(prop != 'id') {
                                html += '<td>' + wynik[prop] + '</td>';
                                if (prop == 'aktywny') {
                                    html +=`<td><form action="/autorzy/delete" method="post">
                                        <div class="form-row">
                                                                <div class="col">
                                                                    <a href="/autorzy/edit/${wynik.id}"
                                                                       class="btn btn-sm btn-info">Edytuj</a>
                                                                </div>
                                                                <div class="col">
                                                                    <input type="hidden" name="id" value="${wynik.id}">
                                                                    <input class="btn btn-danger btn-sm" type="submit" value="Kasuj"
                                                                           onclick="return confirm(\'Czy jesteś pewien, że chcesz usunąć tego autora?\')">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>`;
                                }
                            }
                        }
                        $('.ajax').empty().first().html(html);
                    }
                });
            });
        });
    </script>
{/literal}
{include file="../inc/footer.tpl"}