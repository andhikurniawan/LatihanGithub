<!-- Begin Page Content -->
<div class="container-fluid" style="margin-left:20px">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-md-6">
            <form style="margin-top:20px; width:50%" action="<?= base_url('user/search_divisi'); ?>" method="POST">
                <div class="input-group mb-3">
                    <select class="form-control" name="divisi" id="divisi" required>
                        <option value="">No Selected</option>
                        <option value="1">SDM01</option>
                        <option value="2">PRC02</option>
                        <option value="3">WRH03</option>
                        <option value="4">LOG04</option>

                       
                    </select>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit" id="button-addon2" value="search">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <a href="<?= base_url(); ?>user/sinkron/" class="btn btn-primary" style="margin-top:20px; margin-left:310px"> Sinkron Transaksi <i class="fas fa-redo"></i></a>
        </div>
        <div class="col-md-2">
            <a href="<?= base_url('user/tambah_u') ?> " class="btn btn-primary" style="margin-top:20px; margin-left:0px"> Tambah Transaksi <i class="fas fa-plus"></i></a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

   
    <div class="card" style="margin-left;-50px; width:98%">
  <div class="card-body">
    <div class="row">
        <div class="col-lg">

        <?php if (empty($transaksi)) : ?>
                <div class="alert alert-danger" role="alert">
                data mahasiswa tidak ditemukan.
                </div>
            <?php endif; ?>
        
        <table class="table table-striped" id="table_id" style="text-align: center;">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Jenis_Transaksi</th>
                        <th scope="col">Biaya</th>
                        <th scope="col">Divisi</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col"><i class="fas fa-info-circle"> Opsi</i></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $angka=0;
                    foreach ($transaksi as $mhs) : ?>
                        <tr>
                        <th scope="row"><?= ++$angka; ?></th>
                        <td> <?= $mhs['keterangan']; ?></td>
                        <td> <?= $mhs['jenis_transaksi']; ?></td>
                        <td>Rp. <?= number_format($mhs['biaya']); ?></td>
                        <td><?= $mhs['kode']; ?></td>
                        <td><?= $mhs['tanggal']; ?></td>
                        <td>
                        <a href="<?= base_url(); ?>user/hapus/<?= $mhs['id']; ?>"
                        class="badge badge-danger">hapus</a>
                        
                         <a href="<?= base_url(); ?>user/update_f/<?= $mhs['id']; ?>"
                        class="badge badge-success">ubah</a>
                        </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  
        </table>

            <?php echo $this->pagination->create_links(); ?>

        </div>
    </div>
    </div>
    </div>
    
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script type="text/javascript">

$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
