<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Request Order
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('request_order') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-2" for="id_ro">ID RO</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('id_ro', $ro['id_ro']); ?>" name="id_ro" id="id_ro" readonly type="text" class="form-control" placeholder="ID RO...">
                        <?= form_error('id_ro', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="tanggal">Tanggal</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('tanggal', date('Y-m-d')); ?>" name="tanggal" type="text" class="form-control date" placeholder="Tanggal...">
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- penutu row 1 -->
                <div class="row form-group">
                    <label class="col-md-2" for="divisi_id">Nama Divisi</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="divisi_id" id="divisi_id" class="custom-select">
                                <option value="" selected disabled>Pilih Divisi</option>
                                <?php foreach ($divisi as $d) : ?>
                                    <option <?= $ro['divisi_id'] == $d['id_divisi'] ? 'selected' : ''; ?> <?= set_select('divisi_id', $d['id_divisi']) ?> value="<?= $d['id_divisi'] ?>"><?= $d['nama_divisi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('jenis/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('jenis_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="barang_id">Nama Barang</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="barang_id" id="barang_id" class="custom-select">
                                <option value="" selected disabled>Pilih Barang</option>
                                <?php foreach ($barang as $b) : ?>
                                    <option <?= $ro['barang_id'] == $b['id_barang'] ? 'selected' : ''; ?> <?= set_select('barang_id', $b['id_barang']) ?> value="<?= $b['id_barang'] ?>"><?= $b['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('jenis/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('jenis_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- penutup row 2 -->
                <div class="row form-group">
                    <label class="col-md-2" for="jenis_id">Quantity</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('quantity', $ro['quantity']); ?>" name="quantity" id="quantity" type="number" class="form-control" readonly>
                        <?= form_error('quantity', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="jenis_id">Jenis Barang</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="jenis_id" id="jenis_id" class="custom-select" readonly>
                                <option value="" selected disabled>Pilih Jenis Barang</option>
                                <?php foreach ($jenis as $j) : ?>
                                    <option <?= $ro['jenis_id'] == $j['id_jenis'] ? 'selected' : ''; ?> <?= set_select('jenis_id', $j['id_jenis']) ?> value="<?= $j['id_jenis'] ?>"><?= $j['nama_jenis'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('jenis/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('jenis_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- penutup row 3 -->
                <div class="row form-group">
                    <label class="col-md-2" for="satuan_id">Satuan Barang</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="satuan_id" id="satuan_id" class="custom-select">
                                <option value="" selected disabled>Pilih Satuan Barang</option>
                                <?php foreach ($satuan as $s) : ?>
                                    <option <?= $ro['satuan_id'] == $s['id_satuan'] ? 'selected' : ''; ?> <?= set_select('satuan_id', $s['id_satuan']) ?> value="<?= $s['id_satuan'] ?>"><?= $s['nama_satuan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('satuan/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('satuan_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="nama_barang">Keterangan</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('keterangan', $ro['keterangan']); ?>" name="keterangan" id="keterangan" type="text" class="form-control" readonly>
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="col-md-4">
                        <input value="1" name="status" id="status" type="hidden" class="form-control" readonly>
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 text-md-right">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>