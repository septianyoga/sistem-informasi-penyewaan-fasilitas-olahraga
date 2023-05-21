<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title"><?= $title ?></h4>
                        </div>
                        <div class="header-action">
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="bi bi-plus-circle"></i> Tambah</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('owner/fasilitas/edit') ?>
                        <input type="hidden" name="id_fasilitas" name="id_fasilitas" value="<?= $fasilitas['id_fasilitas'] ?>">
                        <p>Masukan Foto Baru:</p>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="foto[]" multiple>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Nama Fasilitas:</label>
                                    <input type="text" name="nama_fasilitas" class="form-control" id="email" value="<?= $fasilitas['nama_fasilitas'] ?>">
                                </div>
                            </div>
                            <div class="col">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" id="kategori" name="kategori">
                                    <option value="">~ Pilih Kategori ~</option>
                                    <?php foreach ($kategori as $row) { ?>
                                        <option value="<?= $row['id_kategori'] ?>" <?= ($fasilitas['id_kategori'] == $row['id_kategori']) ? 'selected' : '' ?>><?= $row['nama_kategori'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="2"><?= $fasilitas['keterangan'] ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="harga">Harga :</label>
                                    <input type="number" name="harga" class="form-control" id="harga" value="<?= $fasilitas['harga'] ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="hargaper">Per :</label>
                                    <select class="form-control" id="hargaper" name="hargaper">
                                        <option value="">~ Pilih ~</option>
                                        <option value="Jam" <?= ($fasilitas['hargaper'] == 'Jam') ? 'selected' : '' ?>>Jam</option>
                                        <option value="Hari" <?= ($fasilitas['hargaper'] == 'Hari') ? 'selected' : '' ?>>Hari</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('owner/fasilitas') ?>" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>