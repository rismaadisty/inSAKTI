
            <?php
              include "conf/koneksi.php";
            ?>

<div class="alert alert-info">
	<p>
		<ul>
	    <li>Cari nama calon siswa dengan teliti.</li>
    	<li>Catat No.Pendaftaran untuk login calon siswa.</li>
    	<li>Silahkan klik menu login lalu masuk sebagai calon siswa dan lengkapi data diri.</li>
        </ul>
    </p>
</div>

<div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>No. Pendaftaran</th>
                <th>Nama Siswa</th>
                <th>Asal Sekolah</th>
                <th>Verifikasi Dok.</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>No. Pendaftaran</th>
                <th>Nama Siswa</th>
                <th>Asal Sekolah</th>
                <th>Verifikasi Dok.</th>
            </tr>
        </tfoot>
        <tbody>

                        <?php
                          /* versi PDO */
                          $sql = $conn->prepare("SELECT * FROM psb ORDER BY no_reg DESC");
                          $sql->execute();
                          $no = 1;
                          while($r = $sql->fetch()){
                        ?>

            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r['no_reg']; ?></td>
                <td><?php echo $r['nm_siswa']; ?></td>
                <td><?php echo $r['asal_sekolah']; ?></td>
                <td><?php echo $r['status_verifikasi']; ?></td>
            </tr>

            <?php $no++; } ?>
           
        </tbody>
    </table>
  </div>




