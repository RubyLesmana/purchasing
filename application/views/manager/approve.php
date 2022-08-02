<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-info">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-info">
                            Create Purchase Order
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('purchase_order') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>

                <?= form_open(); ?>


                <div class="row form-group">
                    <label class="col-md-2" for="id_po">Kode PO</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('id_po', $po['id_po']); ?>" name="id_po" id="id_po" type="text" class="form-control" placeholder="ID PO..." readonly>
                        <?= form_error('id_po', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <label class="col-md-2" for="tanggal">Tanggal</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('tanggal', date('Y-m-d')); ?>" name="tanggal" id="tanggal" type="text" class="form-control date" placeholder="Tanggal...">
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <!-- Row 1 -->

                <div class="row form-group">
                    <label class="col-md-2" for="id_ro">ID RO</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('ro_id', $po['ro_id']); ?>" name="ro_id" id="id_ro" type="text" class="form-control" placeholder="Pilih ID RO ..." readonly>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pilihro">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <label class="col-md-2" for="requistion_id ">ID Supplier</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('requistion_id', $po['requistion_id']); ?>" name="requistion_id" id="requistion_id" type="text" class="form-control" placeholder="Pilih Supplier...">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pilihsup">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <?= form_error('requistion_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- row 2 -->

                <div class="row form-group">
                    <label class="col-md-2" for="ket">Nama Divisi</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-group">
                                <select name="divisi_id" id="divisi_id" class="custom-select">
                                    <option value="" selected disabled>Pilih Divisi</option>
                                    <?php foreach ($divisi as $d) : ?>
                                        <option <?= $po['divisi_id'] == $d['id_divisi'] ? 'selected' : ''; ?> <?= set_select('divisi_id', $d['id_divisi']) ?> value="<?= $d['id_divisi'] ?>"><?= $d['nama_divisi'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <label class="col-md-2" for="supplier_id">Nama Supplier</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="divisi_id" id="divisi_id" class="custom-select">
                                <option value="" selected disabled>Pilih Supplier</option>
                                <?php foreach ($supplier as $supp) : ?>
                                    <option <?= $po['supplier_id'] == $supp['id_supplier'] ? 'selected' : ''; ?> <?= set_select('supplier_id', $supp['id_supplier']) ?> value="<?= $supp['id_supplier'] ?>"><?= $supp['nama_supplier'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('supplier_id', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <!-- row 3 -->
                <div class="row form-group">
                    <label class="col-md-2" for="barang_id">Nama Barang</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="barang_id" id="barang_id" class="custom-select">
                                <option value="" selected disabled>Pilih Barang</option>
                                <?php foreach ($barang as $b) : ?>
                                    <option <?= $po['barang_id'] == $b['id_barang'] ? 'selected' : ''; ?> <?= set_select('barang_id', $b['id_barang']) ?> value="<?= $b['id_barang'] ?>"><?= $b['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="harga">Harga</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('harga', $po['harga']); ?>" name="harga" id="harga" type="text" class="form-control" placeholder="Harga...">
                        </div>
                        <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-md-2" for="quantity">Quantity</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('quantity', $po['quantity']); ?>" name="quantity" id="quantity" type="number" class="form-control" placeholder="Quantity...">
                    </div>

                    <label class="col-md-2" for="total">Total Harga</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('total', $po['total']); ?>" name="total" id="total" type="number" class="form-control" placeholder="Total Harga...">
                        </div>
                        <?= form_error('total_harga', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2" for="keterangan">Keterangan</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('keterangan', $po['keterangan']); ?>" name="keterangan" id="keterangan" class="form-control" rows="4" placeholder="Keterangan...">
                        </div>
                        <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <div class="col-md-2"></div>
                    <div class="col-md-4 text-md-right">
                        <input value="1" type="hidden" name="status" id="status" class="form-control" rows="4" placeholder="Status...">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2" for=""></label>
                    <div class="col-md-4">

                    </div>

                    <div class="col-md-2"></div>
                    <div class="col-md-4 text-md-right">
                        <button type="submit" class="btn btn-info">Approve</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal RO -->
<div class="modal fade" id="pilihro">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih RO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped text-center" id="table">
                    <thead>
                        <tr>
                            <th>ID RO</th>
                            <th>Nama Divisi</th>
                            <th>Nama Barang</th>
                            <th>Quantity</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $roin = $this->db->query(
                            "SELECT a.`id_ro`, a.`divisi_id`, a.`barang_id`, a.`quantity`, a.`keterangan`, b.nama_divisi,c.nama_barang 
                                FROM `request_order` a
                                INNER JOIN divisi b ON a.`divisi_id`=b.id_divisi
                                INNER JOIN barang c ON a.`barang_id`=c.id_barang"
                        );

                        foreach ($roin->result() as $r) : ?>
                            <tr>
                                <td><?= $r->id_ro; ?></td>
                                <td><?= $r->divisi_id . ' | ' . $r->nama_divisi; ?></td>
                                <td><?= $r->barang_id . ' | ' . $r->nama_barang; ?></td>
                                <td><?= $r->quantity; ?></td>
                                <td><?= $r->keterangan; ?></td>
                                <td class="text-right">
                                    <button class="btn btn-sm btn-info" id="select" data-id="<?= $r->id_ro; ?>" data-divisi="<?= $r->divisi_id; ?>" data-barang="<?= $r->barang_id; ?>" data-quantity="<?= $r->quantity; ?>" data-ket="<?= $r->keterangan; ?>">
                                        <i class="fa fa-check"></i>Select
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal pilih supplier -->
<div class="modal fade" id="pilihsup">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">

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
                                    <th>ID</th>
                                    <th>Nama Supplier</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlin = $this->db->query("SELECT a.`id_requistion`,a.`supplier_id`,a.`barang_id`,a.`harga`,b.nama_supplier,c.nama_barang 
                                    FROM `tb_requistion` a 
                                    INNER JOIN supplier b ON a.`supplier_id`=b.id_supplier
                                    INNER JOIN barang c ON a.`barang_id`=c.id_barang");
                                $no = 1;
                                if ($po) :
                                    foreach ($sqlin->result() as $req) :
                                ?>
                                        <tr>
                                            <td><?= $req->id_requistion; ?></td>
                                            <td><?= $req->supplier_id . ' | ' . $req->nama_supplier; ?></td>
                                            <td><?= $req->barang_id . ' | ' . $req->nama_barang; ?></td>
                                            <td><?= $req->harga; ?></td>
                                            <td class="text-right">
                                                <button class="btn btn-sm btn-info" id="selectsup" data-id="<?= $req->id_requistion; ?>" data-supplier_id="<?= $req->supplier_id; ?>" data-barang="<?= $req->barang_id; ?>" data-harga="<?= $req->harga; ?>">
                                                    <i class="fa fa-check"></i>Select
                                                </button>
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
            </div>
        </div>
    </div>
</div>