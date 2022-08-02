<?= $this->session->flashdata('pesan'); ?>
<div class="card text-center">
    <div class="card-body">
        <h3 class="card-title font-bold">PURCHASE ORDER</h3>
        <p class="card-text">No: <?= set_value('id_po', $po['id_po']); ?></p>
        <p class="card-text">Date : <?= set_value('tanggal', date('Y-m-d')); ?></p>
        <div class="table-responsive">
            <table class="table table-striped w-100 dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Divisi</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Quantity</th>
                        <th>Satuan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlin = $this->db->query("SELECT b.`id_po`,b.`ro_id`,b.`divisi_id`,b.`barang_id`,b.`quantity`, b.`keterangan`,b.`requistion_id`,b.`supplier_id`,b.`harga`,b.`total`, b.`tanggal`,b.`status`,
                    c.nama_divisi, d.nama_barang, f.nama_supplier
                    FROM `purchase_order` b
                    INNER JOIN divisi c ON b.`divisi_id`=c.id_divisi
                    INNER JOIN barang d ON b.`barang_id`=d.id_barang  
                    INNER JOIN supplier f ON b.`supplier_id`=f.id_supplier where id_po ='$po[id_po]' ");
                    $no = 1;

                    foreach ($sqlin->result() as $po) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= set_value('divisi_id', $po->nama_divisi); ?></td>
                            <td><?= set_value('barang_id', $po->barang_id); ?></td>
                            <td><?= set_value('barang_id', $po->nama_barang); ?></td>
                            <td><?= set_value('quantity', $po->quantity); ?></td>
                            <td><?= set_value('keterangan', $po->keterangan); ?></td>
                            <td><?= set_value('supplier_id', $po->nama_supplier); ?></td>
                            <td><?= set_value('harga', $po->harga); ?></td>
                            <td><?= set_value('total', $po->total); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= base_url('request_order/cetak_po/') . $po->id_po ?>" class="btn btn-info btn-sm"><i class="fa fa-print mr-2"></i>Cetak Request Order</a>
        </div>
    </div>

</div>