{include file="inc/header.tpl"}
    <div class="container">
        <div class="jumbotron mt-5">
            <div class="row">
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Liczba autorów
                        </div>
                        <div class="card-body">
                            {array_shift($autorzy)}
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Liczba książek
                        </div>
                        <div class="card-body">
                            {array_shift($ksiazki)}
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Liczba gatunków literackich
                        </div>
                        <div class="card-body">
                            {array_shift($gatunki)}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


{include file="inc/footer.tpl"}
