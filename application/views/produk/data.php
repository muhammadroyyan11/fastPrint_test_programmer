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
                                                <button class="btn btn-circle btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $data['id_produk']?>"><i class="fa fa-edit"></i></button>
                                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('kategori/delete/') . $data['id_produk'] ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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