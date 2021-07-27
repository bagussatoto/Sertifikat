 

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title2">
                                    
                                    <p>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">Upload Photo </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input   class=" form-control" name="foto"  type="file">
											<input type="hidden" class="niaID" value="<?php $t=$this->db->query("SELECT MAX(SUBSTR(nomor_anggota,9,13)) as nia FROM data_kartu")->row();
		echo $idv=isset($t->nia)?($t->nia):'';
		//if($idv==NULL){$idv='1';}else{$idv;}
		?>">
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
						//	$korwil[""]="==== pilih ====";
					    	$opt="<option value=''>==== pilih ==== </option>";
							foreach($data as $val)
							{
							    $cek_masa_korwil=$this->mdl->cekMasaKoril($val->kode);
							    if(!$cek_masa_korwil){
							//	$korwil[$val->kode]="[ ".$val->kode." ] ".$val->nama;
								$opt.="<option value='".$val->kode."'  > [ ".$val->kode." ] ".$val->nama."</option>";
							    }else{
							       $opt.="<option value='' class='bg-grey col-yellow' disabled data-subtext='(exp:$cek_masa_korwil)'>[ ".$val->kode." ] ".$val->nama."</option>";
							    }
							}
							//echo form_dropdown("f[kode_korwil]",$korwil,"","required class='form-control' onchange='getKorwil(this.value)' data-live-search='true'");
							?>							
									<select name='f[kode_korwil]' required class='form-control' onchange='getKorwil(this.value)' data-live-search='true'>
									    <?php echo $opt; ?>
									</select>	
										
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
                                            <div class="form-line" id='dataKorwil' >
							<?php  
							$gardu[""]="==== pilih ===="; 
							echo form_dropdown("f[kode_gardu]",$gardu,"","required class='form-control' ");
							?>							
										
										
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                               
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">NIA </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7  " id="no_ta">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input     class=" form-control" name="f[nomor_anggota]"  type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>  
								
								<div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">Nama </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input    class=" form-control" name="f[nama]"  type="text">
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
											<input    class=" form-control" name="f[ktp]"  type="text">
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
											<input    class=" form-control" name="f[kk]"  type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">Tempa Lahir </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input    class=" form-control" name="f[tempat_lhr]"  type="text">
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
											<input class="tgl form-control" name="tgl_lhr"  type="text">
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
											<textarea     class=" form-control"  name="f[alamat]"  type="text"></textarea>
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
											<input class="tgl form-control" name="tgl_berlaku"  type="text" onchange="getExp(this.value)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-4  form-control-label">
                                        <label for="email_address_2" class="col-black">Tgl Habis Berlaku </label>
                                    </div>
                                    <div class="col-lg-7 col-md-7" id="tgl_exp">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input class="tgl form-control" name="tgl_kadaluarsa"  type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                    </p>
                                </div>
                                
                          </div>
<script>	
$('select').selectpicker();
	$("[name='f[nomor_anggota]']").inputmask("999.999.99999");  							
function getKorwil(val)
{
    var korwil = val;
    var nia = $(".niaID").val();
	$.post("<?php echo site_url("data_kartu/getKorwil"); ?>",{id:val},function(data){
		$("#dataKorwil").html(data);
	$("[name='kode_gardu']").val("");
	});
}
function getExp(val)
{
    loading("tgl_exp");
		$.post("<?php echo site_url("data_kartu/getExp"); ?>",{val:val},function(data_a){ 
		    $("[name='tgl_kadaluarsa").val(data_a);
		      unblock("tgl_exp");
	    });
}
function getGardu(val)
{ 
  loading("no_ta");
	  	var korwil =  $("[name='f[kode_korwil]']").val(); 
		$.post("<?php echo site_url("data_kartu/innia"); ?>",{id:val,korwil:korwil},function(data_a){
		    var newnia = data_a;
		    $("[name='f[nomor_anggota]").val(korwil+val+newnia);
		      unblock("no_ta");
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
            "Min",
            "Sen",
            "Sel",
            "Rab",
            "Kam",
            "Jum",
            "Sab"
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
    "startDate": "<?php echo date("d/m/Y")?>",
   
});
 
	</script>

						  