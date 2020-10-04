<?php
include dirname(dirname(__FILE__)) . '/inc/header.php';

?>
    <div class="container-fluid ml-auto">

        <table class="table table-hover text-center mt-5">
            <thead class="thead-dark">
            <th data-name="nazwa_producenta">Name of producer<i data-direct="desc" class="fa fa-arrow-down" aria-hidden="true"></i><i data-direct="asc" class="fa fa-arrow-up" aria-hidden="true"></i></th>
            <th data-name="zamowienia_netto">Net order value<i data-direct="desc" class="fa fa-arrow-down" aria-hidden="true"></i><i data-direct="asc" class="fa fa-arrow-up" aria-hidden="true"></i></th>
            <th data-name="zamowienia_brutto">Gross value of report<i data-direct="desc" class="fa fa-arrow-down" aria-hidden="true"></i><i data-direct="asc" class="fa fa-arrow-up" aria-hidden="true"></i></th>
            <th data-name="liczba_sztuk">Total number of ordered items<i data-direct="desc" data-direct="desc" class="fa fa-arrow-down" aria-hidden="true"></i><i data-direct="asc" class="fa fa-arrow-up" aria-hidden="true"></i></th>
            <th data-name="procent_netto">Percentage value of ordered items by net amount<i data-direct="desc" class="fa fa-arrow-down" aria-hidden="true"></i><i data-direct="asc" class="fa fa-arrow-up" aria-hidden="true"></i></th>
            <th data-name="procent_brutto">Percentage value of ordered items by gross amount<i data-direct="desc" class="fa fa-arrow-down" aria-hidden="true"></i><i data-direct="asc" class="fa fa-arrow-up" aria-hidden="true"></i></th>
            <th data-name="procent_zamowienia">Percentage value of ordered items<i data-direct="desc" class="fa fa-arrow-down" aria-hidden="true"></i><i data-direct="asc" class="fa fa-arrow-up" aria-hidden="true"></i></th>
            </thead>
            <tbody class="ajax">
            <?php if (!empty($data['report']) && count($data['report']) > 0):
                foreach ($data['report'] as $report):?>
                    <tr>
                        <td><?php echo $report['nazwa_producenta']; ?></td>
                        <td><?php echo number_format((float)$report['zamowienia_netto'], 2, ',', '.'); ?></td>
                        <td><?php echo number_format((float)$report['zamowienia_brutto'], 2, ',', '.'); ?></td>
                        <td><?php echo $report['liczba_sztuk']; ?></td>
                        <td><?php echo number_format((float)$report['procent_netto'], 2, ',', '.'); ?></td>
                        <td><?php echo number_format((float)$report['procent_brutto'], 2, ',', '.'); ?></td>
                        <td><?php echo number_format((float)$report['procent_zamowienia'], 2, ',', '.'); ?></td>

                    </tr>
                <?php endforeach;
            else:?>
                <tr>
                    <td class="text-center" colspan="7">No report yet.</td>
                </tr>
            <?php
            endif; ?>
            </tbody>
        </table>
    </div>
<?php
include dirname(dirname(__FILE__)) . '/inc/footer.php';
