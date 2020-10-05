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
                            Number of products
                        </div>
                        <div class="card-body">
<!--                            <h5 class="card-title">--><?php //echo $data['products']?><!--</h5>-->
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Number of orders
                        </div>
                        <div class="card-body">
<!--                            <h5 class="card-title">--><?php //echo $data['orders']?><!--</h5>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


{include file="inc/footer.tpl"}
