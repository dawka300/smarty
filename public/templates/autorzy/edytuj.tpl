{include file="../inc/header.tpl"}
<div class="container">
    <form action="/autorzy/update" method="post" class="mt-3">
        <fieldset>
            <input type="hidden" name="id" value="{$autor.id}">
            <legend>Edycja autora</legend>
            <div class="form-group">
                <label for="first_name">Imię</label>
                <input value="{$autor.imie}" class="form-control" type="text" name="first_name" id="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nazwisko</label>
                <input value="{$autor.nazwisko}" class="form-control" type="text" name="last_name" id="last_name" required>
            </div>
            <div class="form-group">
                <label for="search_birthdate">Data urodzenia</label>
                <input value="{$autor.data_urodzenia}" class="form-control" type="text" name="birthday" id="search_birthdate">
            </div>
            <div class="form-group">
                <label for="is_active">Czy aktywny</label>
                <select name="is_active" id="is_active" class="form-control">
                    <option value="0" {if $autor.aktywny == 0}selected{/if}>Nie</option>
                    <option value="1" {if $autor.aktywny == 1}selected{/if}>Tak</option>
                </select>
            </div>
            <div class="row justify-content-center p-2">
                <input type="submit" value="Modyfikuj" class="btn btn-primary btn-lg">
            </div>
        </fieldset>

    </form>

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
