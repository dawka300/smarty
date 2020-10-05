{include file="../inc/header.tpl"}
<div class="container">
    <form action="/ksiazki/store" method="post" class="mt-3">
        <fieldset>
            <legend>Dodawanie nowej książki</legend>
            <div class="form-group">
                <label for="author">Autor</label>
                <select class="form-control" name="author" id="author" required>
                <option selected disabled>Wybierz</option>
                {foreach $autorzy as $autor}
                    <option value="{$autor.id}">{$autor.imie} {$autor.nazwisko}</option>
                {/foreach}
                </select>
            </div>

                    {foreach $gatunki as $gatunek}
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gatunki[]" id="exampleRadios1" value="{$gatunek.id}">
                            <label class="form-check-label" for="exampleRadios1">
                                {var_dump($gatunek)}
                            </label>
                        </div>
                    {/foreach}


            <div class="form-group">
                <label for="title">Tutuł</label>
                <input class="form-control" type="text" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="isbn">Numer ISBN</label>
                <input class="form-control" type="text" name="isbn" id="isbn" required>
            </div>
            <div class="form-group">
                <label for="number">Liczba stron</label>
                <input class="form-control" type="number" name="number" id="number">
            </div>
            <div class="form-group">
                <label for="desc">Opis</label>
                <textarea class="form-control" type="text" name="desc" id="desc"></textarea>
            </div>
            <div class="form-group">
                <label for="name">Czy aktywny</label>
                <select class="form-control" id="is_active" name="is_active">
                    <option value="1" selected>Tak</option>
                    <option value="0">Nie</option>
                </select>
            </div>
            <div class="row justify-content-center p-2">

                <input type="submit" value="Dodaj książkę" class="btn btn-primary btn-lg">
            </div>
        </fieldset>

    </form>

</div>
{literal}
    <script>
        $(function (){
            $('#isbn').datepicker({dateFormat:"yy-mm-dd", yearRange: "1950:2022",
                changeMonth: true,
                changeYear: true});
        });
    </script>
{/literal}
{include file="../inc/footer.tpl"}