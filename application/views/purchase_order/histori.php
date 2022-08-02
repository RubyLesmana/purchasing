<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-info">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-info">
                    Data Purcase Order
                </h4>
            </div>
            <?php if (is_purchasing()) : ?>
                <div class="col-auto">
                    <a href="<?= base_url('purchase_order/add') ?>" class="btn btn-sm btn-info btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Create Purchase Order
                        </span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID PO</th>
                    <th>ID RO</th>
                    <th>Divisi</th>
                    <th>Barang</th>
                    <th>Qty</th>
                    <th>Supplier</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlin = $this->db->query("SELECT b.`id_po`,b.`ro_id`,b.`divisi_id`,b.`barang_id`,b.`quantity`, b.`keterangan`,b.`requistion_id`,b.`supplier_id`,b.`harga`,b.`total`, b.`tanggal`,b.`status`,
                c.nama_divisi, d.nama_barang, f.nama_supplier
                FROM `purchase_order` b
                INNER JOIN divisi c ON b.`divisi_id`=c.id_divisi
                INNER JOIN barang d ON b.`barang_id`=d.id_barang  
                INNER JOIN supplier f ON b.`supplier_id`=f.id_supplier WHERE b.status=1");
                // $sqlin = $this->db->query("SELECT * FROM `purchase_order` ");
                $no = 1;
                if ($po) :
                    foreach ($sqlin->result() as $p) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $p->id_po; ?></td>
                            <td><?= $p->ro_id; ?></td>
                            <td><?= $p->nama_divisi; ?></td>
                            <td><?= $p->nama_barang; ?></td>
                            <td><?= $p->quantity; ?></td>
                            <td><?= $p->nama_supplier; ?></td>
                            <td>Rp. <?= number_format($p->harga); ?></td>
                            <td>Rp. <?= number_format($p->total); ?></td>
                            <td>
                                <?php
                                if ($p->status == 0) {
                                    echo "<span  class='badge bg-warning text-white'>Processing</span>";
                                } else {
                                    echo "<span  class='badge bg-success text-white'>Approved</span>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php if (is_purchasing()) : ?>
                                    <a href="<?= base_url('purchase_order/edit/') . $p->id_po ?>" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('purchase_order/delete/') . $p->id_po ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                    <a href="<?= base_url('purchase_order/cetak_po/') . $p->id_po ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-print"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>