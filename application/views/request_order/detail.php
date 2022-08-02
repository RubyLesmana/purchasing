<?= $this->session->flashdata('pesan'); ?>
<div class="card text-center">
    <div class="card-body">
        <h3 class="card-title font-bold">REQUEST ORDER</h3>
        <p class="card-text">No: <?= set_value('id_ro', $ro['id_ro']); ?></p>
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
                    $sqlin = $this->db->query("SELECT a.`id_ro`, a.`tanggal`,a.`divisi_id`,a.`barang_id`,a.`keterangan`,a.`quantity`,a.`status`, b.nama_divisi, c.nama_barang 
                    FROM `request_order` a 
                    INNER JOIN divisi b ON a.`divisi_id`=b.id_divisi
                    INNER JOIN barang c ON a.`barang_id`=c.id_barang where id_ro ='$ro[id_ro]' ");
                    $no = 1;

                    foreach ($sqlin->result() as $ro) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= set_value('divisi_id', $ro->nama_divisi); ?></td>
                            <td><?= set_value('barang_id', $ro->barang_id); ?></td>
                            <td><?= set_value('barang_id', $ro->nama_barang); ?></td>
                            <td><?= set_value('quantity', $ro->quantity); ?></td>
                            <td></td>
                            <td><?= set_value('keterangan', $ro->keterangan); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="<?= base_url('request_order/cetak_ro/') . $ro->id_ro ?>" class="btn btn-primary btn-sm"><i class="fa fa-print mr-2"></i>Cetak Request Order</a>
        </div>
    </div>

</div>