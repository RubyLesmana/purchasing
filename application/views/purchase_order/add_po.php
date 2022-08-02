<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-info">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-info">
                            Form Tambah PO
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

                    <label class="col-md-3 text-md-right" for="id_po">ID PO</label>
                    <div class="col-md-9">
                        <input readonly value="<?= set_value('id_po', $id_po); ?>" name="id_po" id="id_po" type="text" class="form-control" placeholder="ID PO...">
                        <?= form_error('id_po', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="tgl">Tanggal</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('tanggal', date('Y-m-d')); ?>" name="tanggal" id="tgl" type="text" class="form-control date" placeholder="Tanggal...">
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="ro_id">ID RO</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="ro_id" id="ro_id" class="custom-select">
                                <option value="<?= set_value('ro_id'); ?>" selected disabled>Pilih RO Barang</option>
                                <?php foreach ($request as $j) : ?>
                                    <option <?= set_select('ro_id', $j['id_ro']) ?> value="<?= $j['id_ro'] ?>"><?= $j['id_ro'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('ro_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="requistion_id">Supplier</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <select name="requistion_id" id="requistion_id" class="custom-select">
                                <option value="<?= set_value('requistion_id'); ?>" selected disabled>Pilih Supplier</option>
                                <?php foreach ($requistion as $s) : ?>
                                    <option <?= set_select('requistion_id', $s['id_requistion']) ?> value="<?= $s['id_requistion'] ?>"><?= $s['id_requistion'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('requistion_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="total">Total harga</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('total'); ?>" name="total" id="total" type="number" class="form-control" placeholder="total_harga Barang...">
                        <?= form_error('total', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <!-- <label class="col-md-3 text-md-right" for="status">Status</label> -->
                    <div class="col-md-9">
                        <input value="0" name="status" id="status" type="hidden" class="form-control" placeholder="total_harga Barang...">
                        <?= form_error('total_harga', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</bu>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>