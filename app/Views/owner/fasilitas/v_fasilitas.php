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
                        <?php
                        $errors = session()->getFlashdata('errors');
                        if (!empty($errors)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    <?php foreach ($errors as $key => $value) { ?>
                                        <li><?= esc($value); ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php  } ?>
                        <div class="table-responsive">
                            <table id="datatable-1" class="table data-table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama_fasilitas'] ?></td>
                                            <td><?= $row['keterangan'] ?></td>
                                            <td><?= $row['harga'] ?> Per <?= $row['hargaper'] ?></td>
                                            <td><?= $row['nama_kategori'] ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#delete<?= $row['id_fasilitas'] ?>"><i class="bi bi-trash"></i></button>
                                                <a href="<?= base_url('owner/fasilitas/' . $row['id_fasilitas']) ?>/show" class="btn btn-success btn-sm m-1"><i class="bi bi-eye"></i></a>
                                                <a href="<?= base_url('owner/fasilitas/edit/' . $row['id_fasilitas']) ?>" class="btn btn-primary btn-sm m-1"><i class="bi bi-pencil-square"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('fasilitasTambah') ?>
                <p>Masukan Foto :</p>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="customFile" name="foto[]" multiple>
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Nama Fasilitas:</label>
                            <input type="text" name="nama_fasilitas" class="form-control" id="email" value="<?= old('nama_fasilitas') ?>">
                        </div>
                    </div>
                    <div class="col">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori">
                            <option value="">~ Pilih Kategori ~</option>
                            <?php foreach ($kategori as $row) { ?>
                                <option value="<?= $row['id_kategori'] ?>" <?= (old('kategori') == $row['id_kategori']) ? 'selected' : '' ?>><?= $row['nama_kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" name="keterangan" id="keterangan" rows="2"><?= old('keterangan') ?></textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="harga">Harga :</label>
                            <input type="number" name="harga" class="form-control" id="harga" value="<?= old('harga') ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="hargaper">Per :</label>
                            <select class="form-control" id="hargaper" name="hargaper">
                                <option value="">~ Pilih ~</option>
                                <option value="Jam" <?= (old('hargaper') == 'Jam') ? 'selected' : '' ?>>Jam</option>
                                <option value="Hari" <?= (old('hargaper') == 'Hari') ? 'selected' : '' ?>>Hari</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- modal delete -->
<?php foreach ($data as $row) { ?>
    <div class="modal fade" id="delete<?= $row['id_fasilitas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Fasilitas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin akan menghapus data fasilitas dan seluruh foto <b><?= $row['nama_fasilitas'] ?>?</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('owner/fasilitas/' . $row['id_fasilitas']) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>