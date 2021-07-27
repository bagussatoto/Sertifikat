	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <div class="float-sm-right">
             
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
	
	
	<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
			<div class="row">
			  <div class="col-sm-6">
				<div class="info-box">
				  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-table"></i></span>

				  <div class="info-box-content">
					<span class="info-box-text">Total Data Sertifikat</span>
					<span class="info-box-number">
					  <?php echo isset($ttl_dtser)?($ttl_dtser):0; ?>
					</span>
				  </div>
				  <!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			  </div>
			  <!-- /.col -->
			  <div class="col-sm-6">
				<div class="info-box mb-3">
				  <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-image"></i></span>

				  <div class="info-box-content">
					<span class="info-box-text">Total Template</span>
					<span class="info-box-number"><?php echo isset($ttl_temp)?($ttl_temp):0; ?></span>
				  </div>
				  <!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			  </div>
			  <!-- /.col -->
			</div>
			<div class="row">
			  <div class="col-sm-6">
				<div class="info-box mb-3">
				  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-clock"></i></span>

				  <div class="info-box-content">
					<span class="info-box-text">Total Cetak Hari ini</span>
					<span class="info-box-number"><?php echo isset($ttl_cetakhariini)?($ttl_cetakhariini):0; ?></span>
				  </div>
				  <!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			  </div>
			  <!-- /.col -->
			  <div class="col-sm-6">
				<div class="info-box mb-3">
				  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-copy"></i></span>

				  <div class="info-box-content">
					<span class="info-box-text">Total Sudah dicetak</span>
					<span class="info-box-number"><?php echo isset($ttl_cetaksemua)?($ttl_cetaksemua):0; ?></span>
				  </div>
				  <!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			  </div>
			  <!-- /.col -->
			</div>
			<br>
            <div class="progress-group">
			  Progress Pencetakan 
			  <span class="float-right"><b><?php echo isset($ttl_cetaksemua)?($ttl_cetaksemua):0; ?></b>/<?php echo isset($ttl_dtser)?($ttl_dtser):0; ?></span>
			  <?php $proses=$ttl_cetaksemua/$ttl_dtser*100;
				$persen=isset($proses)?($proses):0; ?>
				<b><?php echo round($persen) ?>%</b>
			  <div class="progress progress-bg">
				<div class="progress-bar bg-success" style="width: <?php echo round($persen) ?>%"></div>
			  </div>
			</div>
			<br>
          </div>
		  <div class="col-md-6">
			<div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  Information
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <b>Selamat Datang di Apliasi Cetak Sertifikat</b><hr>
                <div class="callout callout-info">
					
					<h5>Perhatian!</h5>
					<ul>
                  <li><p>Jika Preview tidak terbuka Mohon Uninstall Internet Download Manager.</p></li>
				 <li> <p>Jika Hasil Cetak tidak full Page artinya Printer tidak supoort untuk melakukan print full page document.</p></li>
				 </ul>
                </div>
                
              </div>
              <!-- /.card-body -->
            </div>
		  </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


      </div><!--/. container-fluid -->
    </section>