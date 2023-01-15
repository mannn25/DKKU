<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo isset($title) ? '' . $title : null; ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('manage') ?>"><i class="fa fa-th"></i> Home</a></li>
			<li class="active"><?php echo isset($title) ? '' . $title : null; ?></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<table class="table table-hover">
							<tr>
								<th>No</th>
								<th>Jenis Pembayaran</th>
								<th>Total Tagihan</th>
								<th>Status</th>
							</tr>
							<tbody>
								 
                                  <?php
                                  $i =1;
                                  foreach ($student as $row):
                                    $namePay = $row['pos_name'].' - T.A '.$row['period_start'].'/'.$row['period_end'];
                                    if (isset($f['n']) AND $f['r'] == $row['mahasiswa_nim']) {
                                      ?>
                                      <tr data-toggle="collapse" data-target="#demo" style="color:<?php echo ($total == $pay) ? '#00E640' : 'red' ?>">
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $namePay ?></td>
                                        <td><?php echo 'Rp. ' . number_format($total - $pay, 0, ',', '.') ?></td>
                                        
                                        <td><label class="label <?php echo ($total == $pay) ? 'label-success' : 'label-warning' ?>"><?php echo ($total == $pay) ? 'Lengkap' : 'Belum Lengkap' ?></label></td>
                                      </tr>
                                      <?php 
                                    }
                                    $i++;
                                  endforeach; 
                                  ?> 
						
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</section>
<!-- /.content -->
</div>