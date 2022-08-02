<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-info">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-info">
                            Create Request Order
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
                <?= form_open('request_order/add'); ?>

                <div class="row form-group">
                    <label class="col-md-2" for="id_ro">Kode RO</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('id_ro', $id_ro); ?>" type="text" readonly="readonly" class="form-control" name="id_ro">
                        <?= form_error('id_ro', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="tanggal">Tanggal</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('tanggal', date('Y-m-d')); ?>" name="tanggal" type="text" class="form-control date" placeholder="Tanggal...">
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <!-- Row 1 -->

                <div class="row form-group">
                    <label class="col-md-2" for="divisi_id">Nama Divisi</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="divisi_id" id="divisi_id" class="custom-select">
                                <option value="" selected disabled>Pilih Divisi</option>
                                <?php foreach ($divisi as $d) : ?>
                                    <option <?= $this->uri->segment(3) == $d['id_divisi'] ? 'selected' : '';  ?> <?= set_select('divisi_id', $d['id_divisi']) ?> value="<?= $d['id_divisi'] ?>"><?= $d['id_divisi'] . ' | ' . $d['nama_divisi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="barang_id">Nama Barang</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="barang_id" id="barang_id" class="custom-select">
                                <option value="" selected disabled>Pilih Barang</option>
                                <?php foreach ($barang as $b) : ?>
                                    <option <?= $this->uri->segment(3) == $b['id_barang'] ? 'selected' : '';  ?> <?= set_select('barang_id', $b['id_barang']) ?> value="<?= $b['id_barang'] ?>"><?= $b['id_barang'] . ' | ' . $b['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- row 2 -->

                <div class="row form-group">
                    <label class="col-md-2" for="quantity">Quantity</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input value="<?= set_value('quantity'); ?>" name="quantity" id="quantity" type="number" class="form-control" placeholder="Quantity...">
                        </div>
                        <?= form_error('quantity', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2" for="keterangan">Keterangan</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <textarea value="<?= set_value('keterangan'); ?>" name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Keterangan..."><?= set_value('keterangan'); ?></textarea>
                        </div>
                        <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4 text-md-right">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>