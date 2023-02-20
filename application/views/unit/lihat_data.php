<br>
<a href="<?= base_url('unit/mahasiswa') ?>" class="btn btn-sm btn-danger"><i class="fa-arrow-left fa"></i> Kembali</a>
<div class="widget-box">

	<div class="widget-header widget-header-blue widget-header-flat">
		<h4 class="widget-title lighter">Lihat data</h4>
	</div>

	<div class="widget-body">
		<div class="widget-main">

			<div class="container">
				<div class="col-md-4">
					<table class="table table-hover">
						<tr>
							<td>Nama : </td><td>  <?= $mahasiswa->nama ?></td>
						</tr>
						<tr>
							<td>Nim : </td><td>  <?= $mahasiswa->nim ?></td>
						</tr>
					</table>
				</div>
			</div>
			<hr>
			<div class="container">
				<div class="col-md-11 col-xs-12">
					
					<div class="tabbable">
						<ul class="nav nav-tabs" id="myTab">

							<li class="active">
								<a data-toggle="tab" href="#formulir">
									<i class="ace-icon fa fa-file bigger-120"></i>
									Formulir
								</a>
							</li>

							<li>
								<a data-toggle="tab" href="#bukti_bayar">
									<i class="ace-icon fa fa-money bigger-120"></i>
									Bukti Bayar
								</a>
							</li>

						</ul>

						<div class="tab-content">
							<div id="formulir" class="tab-pane fade in active">
								<iframe width="100%" height="700px" src="<?= base_url('assets/upload/plp_magang/'.$mahasiswa->formulir) ?>" ></iframe> 
							</div>

							<div id="bukti_bayar" class="tab-pane fade">
								<iframe width="100%" height="700px" src="<?= base_url('assets/upload/plp_magang/'.$mahasiswa->bukti_bayar) ?>" ></iframe> 
							</div>

							
						</div>
					</div>

				</div>
			</div>
			

		</div>
	</div>
</div>