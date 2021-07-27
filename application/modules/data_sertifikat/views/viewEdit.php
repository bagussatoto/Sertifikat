 <?php $database=$this->db->get_where("data_kartu",array("id"=>$this->input->post("id")))->row();  
  
		 
 ?>		
<input type="hidden" name="id" value="<?php echo $database->id;?>"> 
							 
  

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                    
                                    <p>
                                         <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">Upload Photo </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input   class=" form-control" name="foto"  type="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>  
								
									 <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">Pilih Korwil </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
							<?php 
							$this->db->order_by("kode","asc");
							$data=$this->db->get("tr_korwil")->result();
							$korwil[""]="==== pilih ====";
							foreach($data as $val)
							{
								$korwil[$val->kode]="[ ".$val->kode." ] ".$val->nama;
							}
							echo form_dropdown("f[kode_korwil]",$korwil,$database->kode_korwil,"required class='form-control' onchange='getKorwil(this.value)'");
							?>							
										
										
                                            </div>
                                        </div>
                                    </div>
                                </div> 
								
								<div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">Pilih Gardu </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7  ">
                                        <div class="form-group">
                                            <div class="form-line" id='dataKorwil2' >
							<?php  
							$gardu[""]="==== pilih ===="; 
							echo form_dropdown("f[kode_gardu]",$gardu,$database->kode_gardu,"required class='form-control' onchange='reload_table()'");
							?>							
										
										
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                               
								
								
								
								
								
								
                                
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">NIA </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input    class=" form-control" name="f[nomor_anggota]" value="<?php echo $database->nomor_anggota?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                
                                 <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">Nama</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input    class=" form-control" name="f[nama]" value="<?php echo $database->nama?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                   <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">No.KTP </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input    class=" form-control" name="f[ktp]" value="<?php echo $database->ktp?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">No.KK </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input    class=" form-control" name="f[kk]"  value="<?php echo $database->kk?>"type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                 <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">Tempat Lahir </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input    class=" form-control" name="f[tempat_lhr]" value="<?php echo $database->tempat_lhr?>"  type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
								<div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">Tgl Lahir </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input    class="tgl form-control" name="tgl_lhr" value="<?php echo $this->tanggal->ind($database->tgl_lhr,"/");?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">Alamat </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<textarea    class=" form-control"  name="f[alamat]" telp type="text"><?php echo $database->alamat?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							 
								<div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">Tgl Mulai Berlaku </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input    class="tgl form-control" name="tgl_berlaku" value="<?php echo $this->tanggal->ind($database->tgl_berlaku,"/");?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">Tgl Habis Berlaku </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input    class="tgl form-control" name="tgl_kadaluarsa" value="<?php echo $this->tanggal->ind($database->tgl_kadaluarsa,"/");?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
 
								
                                    </p>
                                </div>
                                
                          </div>
								
						<script>	
$("[name='f[nomor_anggota]']").inputmask("999.999.99999");  						
setTimeout(function(){ getKorwil(`<?php echo $database->kode_korwil;?>`,`<?php echo $database->kode_gardu;?>`) }, 600);					
function getKorwil(val,value=null)
{	 
	 $.post("<?php echo site_url("data_kartu/getKorwil"); ?>",{id:val,value:value},function(data){
			 $("#dataKorwil2").html(data);
		      });
}
</script>		
								
								<script> 
$('.tgl').daterangepicker({
	//maxDate: new Date(),
    "singleDatePicker": true,
    "showDropdowns": true,
    "dateLimit": {
        "days": 7
    },
	  "autoApply": false,
	  "drops": "up",
    "locale": {
		    
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "daysOfWeek": [
            "M",
            "S",
            "S",
            "R",
            "K",
            "J",
            "S"
        ],
        "monthNames": [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Augustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ],
        "firstDay": 1
    },
    "showCustomRangeLabel": false,
   
   
});
/*
$('.tgldown').daterangepicker({
	//maxDate: new Date(),
    "singleDatePicker": true,
    "showDropdowns": true,
    "dateLimit": {
        "days": 7
    },
	  "autoApply": false,
	  "drops": "down",
    "locale": {
		    
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "daysOfWeek": [
            "M",
            "S",
            "S",
            "R",
            "K",
            "J",
            "S"
        ],
        "monthNames": [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Augustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ],
        "firstDay": 1
    },
    "showCustomRangeLabel": false,
     
   
});
*/

	</script>

						  