
<div class="container">
<?php if($this->session->flashdata('flash-data')):?>
<div class="row mt-4">
    <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mahasiswa <strong> berhasil </strong> <?= $this->session->flashdata('flash-data');?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
<?php endif; ?>
    <div class="row mt-2">
        <div class="col-md-10">
            <a href="<?= base_url();?>mahasiswa/tambah"class="btn btn-primary"> Tambah Data</a>
            </div>
        </div>
<br>
<div class="row mt-3">
    <div class="col-md-6">
        <form action="" method="post">
            <div class="input-group">
             <input type="text" class="form-control" placeholder="Cari Data Mahasiswa" name="keyword">
                <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
    </div>
        </form>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-9">
        <h2>Daftar Mahasiswa</h2>

        <?php if(empty($mahasiswa)):?>
        <div class="alert alert-danger" role="alert">
            Data Mahasiswa tidak ditemukan
        </div>
        <?php endif; ?>
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
        </thead>
            <tbody>

        <?php foreach($mahasiswa as $mhs):?>
            <tr>
                <td><?=$mhs['nama'];?></td>
                <td><?=$mhs['nim'];?></td>
                <td><?=$mhs['email'];?></td>
                <td><?=$mhs['jurusan'];?></td>
                <td> <a href="<?= base_url();?>mahasiswa/hapus/<?= $mhs['id'];?>" 
                class="badge badge-danger float-right" 
                onclick="return confirm ('Yakin Data ini akan dihapus');"> Hapus</a>
                <a href="<?= base_url();?>mahasiswa/edit/<?= $mhs['id'];?>" 
                class="badge badge-success float-right"> Edit</a>
                <a href="<?= base_url();?>mahasiswa/detail/<?= $mhs['id'];?>" 
                class="badge badge-primary float-right"> Detail</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
</div>
</div>
        