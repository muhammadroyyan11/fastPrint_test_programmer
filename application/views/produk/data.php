<!-- Zero configuration table -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $title ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($produk as $key => $data) { ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['nama_produk'] ?></td>
                                            <td><?= $data['nama_kategori'] ?></td>
                                            <td><?= $data['harga'] ?></td>
                                            <td><?= $data['nama_status'] ?></td>
                                            <th>
                                                <button class="btn btn-circle btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $data['id_produk'] ?>"><i class="fa fa-edit"></i></button>
                                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('produk/delete/') . $data['id_produk'] ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </th>
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
</section>



<?php
foreach ($produk as $key => $data) { ?>
    <!-- Modal -->
    <div class="modal fade text-left" id="edit<?= $data['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white">
                    <h4 class="modal-title" id="myModalLabel1">Edit <?= strtolower($title) ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form form-horizontal" action="<?php echo base_url('produk/proses_update/') . $data['id_produk'] ?>" method="post">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Nama produk</span>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" required id="nama" class="form-control" name="nama_produk" value="<?= $data['nama_produk'] ?>" placeholder="Masukkan Nama produk">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Nama Kategori</span>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="kategori" required class="form-control" id="">
                                                <?php
                                                foreach ($kategori as $key => $kt) { ?>
                                                    <option value="<?= $kt['id_kategori']?>" <?= $data['kategori_id'] == $kt['id_kategori'] ? 'selected' : '' ?>><?= $kt['nama_kategori']?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Harga</span>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="Number" required id="nama" class="form-control" name="harga" value="<?= $data['harga'] ?>" placeholder="Masukkan Nama produk">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <span>Status</span>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="status" required class="form-control" id="">
                                                <?php
                                                foreach ($status as $key => $st) { ?>
                                                    <option value="<?= $st['id_status']?>" <?= $data['status_id'] == $st['id_status'] ? 'selected' : '' ?>><?= $st['nama_status']?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }
?>