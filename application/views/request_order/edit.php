<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-info">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-info">
                            Form Edit Request Order
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('purchasing') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                        <input value="<?= set_value('id_ro', $ro['id_ro']); ?>" name="id_ro" id="id_ro" readonly="readonly" type="text" class="form-control" placeholder="ID RO...">
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
                                <a class="btn btn-info" href="<?= base_url('jenis/add'); ?>"><i class="fa fa-plus"></i></a>
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
                                <a class="btn btn-info" href="<?= base_url('jenis/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('jenis_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- penutup row 2 -->
                <div class="row form-group">
                    <label class="col-md-2" for="jenis_id">Quantity</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('quantity', $ro['quantity']); ?>" name="quantity" id="quantity" type="number" class="form-control" placeholder="Nama Barang...">
                        <?= form_error('quantity', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="nama_barang">Keterangan</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('keterangan', $ro['keterangan']); ?>" name="keterangan" id="keterangan" type="text" class="form-control" placeholder="Nama Barang...">
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- penutup row 3 -->
                <div class="row form-group">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 text-md-right">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>