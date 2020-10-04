$(document).ready(function () {
    $('select#name_producer').change(function () {

        $.ajax({
            type: 'post',
            url: '/task/orders/ajax',

            data: {producer_id: $(this).val(), product_name: $(this).children('option:selected').text()},
            success: function (data) {
                let receive = JSON.parse(data);

                $('input#producer[disabled]').val(receive.result.name);
                $('input#price[disabled]').val(receive.result.price);
                $('input#tax[disabled]').val(receive.result.tax);
                $('input#quantity[disabled]').val(receive.result.quantity);
                $('input[name=product_id]').val(receive.result.id);
            },
            complete: function () {
                $('input#amount').prop('disabled', false)
                    .on('keyup change', function () {

                        $a = count($('input#price[disabled]').val(), $('input#tax[disabled]').val(), $(this).val(), $('input#quantity[disabled]').val());
                        // console.log($a);
                        $('input#total').val(parseFloat($a.total).toFixed(2));
                        $('input#total_tax').val(parseFloat($a.total_tax).toFixed(2));
                        $('input[name=new_quantity]').val($a.new_quantity);

                    });

            }

        })
    });
    $('input#tax[required], input#price[required]').keyup(function () {
        parseFloat($(this).val()).toFixed(2);
    });
    $('i.fa').click(function () {

        $.ajax({
            type: 'post',
            url: 'reports/index',
            data: {direction: $(this).data(), orderBy: $(this).parent().data()},
            success: function (data) {
                $result = JSON.parse(data);
                $html = '';
                for (let data in $result) {
                    for (let value in $result[data])
                        // console.log($result[data][value]);
                        $html += `<tr><td>${$result[data][value].nazwa_producenta}</td><td>${localNumber($result[data][value].zamowienia_netto)}</td>
                     <td>${localNumber($result[data][value].zamowienia_brutto)}</td><td>${$result[data][value].liczba_sztuk}</td>
                    <td>${localNumber($result[data][value].procent_netto)}</td><td>${localNumber($result[data][value].procent_brutto)}</td>
                     <td>${localNumber($result[data][value].procent_zamowienia)}</td></tr>`;

                }
                $('table tbody.ajax').html($html);
            }
        });
    });
});

function count(price, tax, amount, quantity) {
    $new_quantity = parseInt(quantity) - parseInt(amount);
    if (parseInt(amount) > parseInt(quantity)) {
        alert('You\'ve ordered too many products. There is only ' + quantity + ' available.');

        return $result = {total: 0, total_tax: 0, new_quantity: 0};
    }


    $sum_netto = amount * price;
    $sum_brutto = ($sum_netto * tax / 100 + $sum_netto).toFixed(2);

    return $result = {
        total: $sum_netto,
        total_tax: $sum_brutto,
        new_quantity: $new_quantity
    }


}

function localNumber($number) {
    return (parseFloat($number).toFixed(2)).toString().replace(".",",");

}
