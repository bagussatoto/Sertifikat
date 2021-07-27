<?php
class tanggal
{
	
	function ind($id,$di)
	{
		$pecah=explode("-",$id);
		if(count($pecah)<3)
		{
		return false;
		}
		return $pecah[2]."/".$pecah[1]."/".$pecah[0];
	}
	function rangeindo($tgl,$ambil) //unuk database
	{
		//30/03/2016 - 23/05/2016
		$tglORI=explode(" - ",$tgl);
		$tglAwal=explode("/",$tglORI[$ambil]);
		$tgl1=$tglAwal[2]."-".$tglAwal[1]."-".$tglAwal[0];
		return $tgl1;
	}
	 
	function ind_bulan($id,$di)
	{
		$pecah=explode("-",$id);
		if(count($pecah)<3)
		{
		return false;
		}
		return $pecah[2].$di.$this->bulan($pecah[1]).$di.$pecah[0];
	}
	function indTempo($id,$di)
	{
	$pecah=explode("-",$id);
	return $pecah[2].$di.($pecah[1]+1).$di.$pecah[0];
	}
	
	function tanggalDatabase($tglAsli)
	{
	$tgl=str_replace("/","-",$tglAsli);
	$pecah=explode("-",$tgl);
	if(count($pecah)!=3) //jika tidak sesuai format
		{
		return false;
		}
		
	if(strlen($tglAsli)==8) //jika ada 8
	{
	return substr(date('Y'),0,2).$pecah[2]."-".$pecah[0]."-".$pecah[1];
	}
	 
	
	if(strlen($tglAsli)!=10) //jika tidak sesuai format tgl
	{
	return false;
	}
	
	
		if(strlen($pecah[0])==4) //jika pertama tahun
		{
		return $tglAsli;
		}
		
		if(strlen($pecah[0])==2) //jika pertama tahun
		{
		return $pecah[2]."-".$pecah[1]."-".$pecah[0];
		}
		return false;
	}
	
	function eng_($id,$di)
	{
	$di='-';
	$pecah=explode("/",$id);
	if(count($pecah)<3)
		{
		return false;
		}
	return $pecah[2].$di.$pecah[1].$di.$pecah[0];
	}
	
	
	 function selisih($awal,$akhir){ //Y-m-d
       $tglAwal = strtotime($awal);
       $tglAkhir = strtotime($akhir);
       $jeda = $tglAkhir - $tglAwal;
       return ($jeda/(60*60*24));
     }
	function nameHari($tanggal) //ymd
	{
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Sunday',
    	'Mon' => 'Monday',
    	'Tue' => 'Teusday',
    	'Wed' => 'Wednesday',
    	'Thu' => 'Thursday',
    	'Fri' => 'Friday',
    	'Sat' => 'Saturday'
		);
		return $dayList[$day];
	}
	
	function namaHari($tanggal) //ymd
	{
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
		);
		return $dayList[$day];
	}
	
	function kodeHari($hari) //nama hari
	{
		$dayList = array(
    	  'Senin'=>1,
    	  'Selasa'=>2,
    	  'Rabu'=>3,
    	  'Kamis'=>4,
    	  'Jumat'=>5,
    	  'Sabtu'=>6,
		  'Minggu'=>7
		);
		return $dayList[$hari];
	}
	
	function nama_hari($hari) //nama hari
	{
		$dayList = array(
    	  1=>'Senin',
    	  2=>'Selasa',
    	  3=>'Rabu',
    	  4=>'Kamis',
    	  5=>'Jumat',
    	  6=>'Sabtu',
		  7=>'Minggu'
		);
		return $dayList[$hari];
	}
	 
	function seperator($tanggal,$sep)
	{
		if($sep=="/")
		{	$septi="-";	}else{	 $septi="/";}
		$pecah=explode($septi,$tanggal);
		return $pecah[0].$sep.$pecah[1].$sep.$pecah[2];
	}
	function hariLengkap__($tanggal,$seperator)
	{
	$tgl=isset($tanggal)?($tanggal):"";
	if($tgl){ $tgl=$this->seperator($tanggal,$seperator);	}else { return 0; };
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
		);
		return $dayList[$day].", ".$tgl;
	}
	function hariLengkap_($tanggal,$seperator)
	{
	$tgl=isset($tanggal)?($tanggal):"";
	if($tgl){ $tanggal;	}else { return 0; };
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
		);
		return $dayList[$day].", ".$tgl;
	}
	function hariLengkap($tanggal,$seperator)
	{
	$tgl=isset($tanggal)?($tanggal):"";
	if($tgl){ $tanggal;	}else { return 0; };
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
		);
		return $dayList[$day].", ".$this->ind($tanggal,$seperator);
	}	
	
	 
	function namaBulan($bln)
	{
		$dayList = array(
    	'Jan' => '1',
    	'Feb' => '2',
    	'Mar' => '3',
    	'Apr' => '4',
    	'May' => '5',
    	'Jun' => '6',
    	'Jul' => '7',
    	'Aug' => '8',
    	'Sep' => '9',
    	'Oct' => '10',
    	'Nov' => '11',
    	'Des' => '12'
		);
		return $dayList[$bln];
	}
	function hariLengkap2($tanggal,$seperator)
	{
	$tgl=isset($tanggal)?($tanggal):"";
	if($tgl){ $tanggal;	}else { return 0; };
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Sunday',
    	'Mon' => 'Monday',
    	'Tue' => 'Teusday',
    	'Wed' => 'Wednesday',
    	'Thu' => 'Thursday',
    	'Fri' => 'Friday',
    	'Sat' => 'Saturday'
		);
		return $dayList[$day].", ".$this->ind($tanggal,$seperator);
	}
	
	function aturHari2($tgl1,$tgl2,$seperator,$pemisah) //yyyy/mm/dd
	{
	$hari1=$this->hariLengkap2($tgl1,$seperator);
	$hari2=$this->hariLengkap2($tgl2,$seperator);
	if($tgl1==$tgl2){
		return $hari1;
	}else{
		return $hari1." ".$pemisah." ".$hari2;
	}

	}
	
	function aturHari($tgl1,$tgl2,$seperator,$pemisah) //yyyy/mm/dd
	{
	$hari1=$this->hariLengkap($tgl1,$seperator);
	$hari2=$this->hariLengkap($tgl2,$seperator);
	if($tgl1==$tgl2){
		return $hari1;
	}else{
		return $hari1." ".$pemisah." ".$hari2;
	}

	}
	
	
	function jatuhTempo($tanggal,$seperator)
	{
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
		);
		return $dayList[$day].", ".$this->indTempo($tanggal,$seperator);
	}
	function bulan($bln)
	{
		if($bln==1){
		return "Januari";}
		elseif($bln==2){
		return "Februari";}
		elseif($bln==3){
		return "Maret";}
		elseif($bln==4){
		return "April";}
		elseif($bln==5){
		return "Mei";}
		elseif($bln==6){
		return "Juni";}
		elseif($bln==7){
		return "Juli";}
		elseif($bln==8){
		return "Agustus";}
		elseif($bln==9){
		return "September";}
		elseif($bln==10){
		return "Oktober";}
		elseif($bln==11){
		return "November";}
		elseif($bln==12){
		return "Desember";}
		
	}	
	function bulanThn($id) 
	{
	$data=explode("-",$id);
	$bln=$data[1];
	$thn=$data[0];
		if($bln==1){
		$dataBulan= "Januari";}
		elseif($bln==2){
		$dataBulan=  "Februari";}
		elseif($bln==3){
		$dataBulan=  "Maret";}
		elseif($bln==4){
		$dataBulan=  "April";}
		elseif($bln==5){
		$dataBulan=  "Mei";}
		elseif($bln==6){
		$dataBulan=  "Juni";}
		elseif($bln==7){
		$dataBulan=  "Juli";}
		elseif($bln==8){
		$dataBulan=  "Agustus";}
		elseif($bln==9){
		$dataBulan=  "September";}
		elseif($bln==10){
		$dataBulan=  "Oktober";}
		elseif($bln==11){
		$dataBulan=  "November";}
		elseif($bln==12){
		$dataBulan=  "Desember";}
		return $dataBulan."-".$thn;
		
	}
	function tglbulanThn($id) 
	{
	$data=explode("-",$id);
	$tgl=$data[2];
	$bln=$data[1];
	$thn=$data[0];

		if($bln==1){
		$dataBulan= "Januari";}
		elseif($bln==2){
		$dataBulan=  "Februari";}
		elseif($bln==3){
		$dataBulan=  "Maret";}
		elseif($bln==4){
		$dataBulan=  "April";}
		elseif($bln==5){
		$dataBulan=  "Mei";}
		elseif($bln==6){
		$dataBulan=  "Juni";}
		elseif($bln==7){
		$dataBulan=  "Juli";}
		elseif($bln==8){
		$dataBulan=  "Agustus";}
		elseif($bln==9){
		$dataBulan=  "September";}
		elseif($bln==10){
		$dataBulan=  "Oktober";}
		elseif($bln==11){
		$dataBulan=  "November";}
		elseif($bln==12){
		$dataBulan=  "Desember";}
		return $tgl."&nbsp;".$dataBulan."&nbsp;".$thn;
		
	}
	function dateTime($tgl,$seperator) // jadi tanggal indonesia meski ada jam
	{
		$tglORI=explode(" ",$tgl);
		$tglAwal=$tglORI[0]; 
		$tglORI=explode("-",$tglAwal);
		$tgl1=$tglORI[2]."-".$tglORI[1]."-".$tglORI[0];
		return $tgl1;
	}	
	
	function range_($tgl,$seperator)
	{
	//03/30/2016 - 03/31/2016
		$tglORI=explode(" - ",$tgl);
		$tgl1=$tglORI[0];//."-".$tglAwal[0]."-".$tglAwal[2];
		
		//$tglAkhir=explode("/",$tglORI[1]);
		$tgl2=$tglORI[1];//."-".$tglAkhir[0]."-".$tglAkhir[2];
	return $tgl1." ".$seperator." ".$tgl2;	
	}	
	
	function range($tgl,$seperator)
	{
	//03/30/2016 - 03/31/2016
		$tglORI=explode(" - ",$tgl);
		$tglAwal=explode("/",$tglORI[0]);
		$tgl1=$tglAwal[1]."-".$tglAwal[0]."-".$tglAwal[2];
		
		$tglAkhir=explode("/",$tglORI[1]);
		$tgl2=$tglAkhir[1]."-".$tglAkhir[0]."-".$tglAkhir[2];
	return $tgl1." ".$seperator." ".$tgl2;	
	}
	
	function minBulan($tgl,$min)
	{
	return date('Y-m-d', strtotime($min.' month', strtotime($tgl)));
	}
	
	function range1($tgl)
	{
	//03/30/2016 - 03/31/2016
		$tglORI=explode(" - ",$tgl);
		$tglAwal=explode("/",$tglORI[0]);
		$tgl1=$tglAwal[2]."-".$tglAwal[0]."-".$tglAwal[1];
		return $tgl1;
	}
	
	function range2($tgl)
	{
	//03/30/2016 - 03/31/2016
		$tglORI=explode(" - ",$tgl);
		$tglAwal=explode("/",$tglORI[1]);
		$tgl2=$tglAwal[2]."-".$tglAwal[0]."-".$tglAwal[1];
		return $tgl2;
	}
	
	function range_1($tgl)
	{
	//03/30/2016 - 03/31/2016
		$tglORI=explode(" - ",$tgl);
		$tglAwal=explode("/",$tglORI[0]);
		$tgl1=$tglAwal[2]."-".$tglAwal[1]."-".$tglAwal[0];
		return $tgl1;
	}
	
	function range_2($tgl)
	{
	//03/30/2016 - 03/31/2016
		$tglORI=explode(" - ",$tgl);
		$tglAwal=explode("/",$tglORI[1]);
		$tgl2=$tglAwal[2]."-".$tglAwal[1]."-".$tglAwal[0];
		return $tgl2;
	}
	
	function tomorrow($tgl)
	{
	$tglORI=explode("/",$tgl);
	$tanggal=$tglORI[0];
	return	$tgl-1;//=$tglORI[0]."/".$tglORI[1]."/".$tglORI[2];
	}
	
	function addTanggal($durasi,$tgl)
	{
	$durasi=($durasi-1);
	$now = strtotime($tgl);
	//Add one day to today
	$date = date('d-m-Y', strtotime('+'.$durasi.' day', $now));
	return $date;
	}
	
	function minTgl($durasi,$tgl)
	{
	$durasi=($durasi-1);
	$now = strtotime($tgl);
	//Add one day to today
	$date = date('d-m-Y', strtotime('-'.$durasi.' day', $now));
	return $date;
	}
	
	function minJam($jml,$jam) //jml=menit jam=h:i:s
	{
	$now = strtotime($jam);
	//Add one day to today
	$time = date('H:i:s', strtotime('-'.$jml.' minutes', $now));
	return $time;
	}
	function plusJam($jml,$jam) //jml=menit jam=h:i:s
	{
	$now = strtotime($jam);
	//Add one day to today
	$time = date('H:i:s', strtotime('+'.$jml.' minutes', $now));
	return $time;
	}
	
	function tambahTgl($tgl,$day)
	{
	$now = strtotime(date("Y-m-d"));
	//Add one day to today
	$date = date('Y-m-d', strtotime('+'.$day.' day', $now));
	return $date;
	}
	function kurangTgl($tgl,$day)
	{
	$now = strtotime(date("Y-m-d"));
	//Add one day to today
	$date = date('Y-m-d', strtotime('-'.$day.' day', $now));
	return $date;
	}
	
	function tambah_tgl($tgl,$day)
	{
	$now = strtotime($tgl);
	//Add one day to today
	$date = date('Y-m-d', strtotime('+'.$day.' day', $now));
	return $date;
	}
	
	function tambahBln($ym,$m) ///Y-m
	{
	$now = strtotime($ym);
	//Add one day to today
	$date = date('Y-m', strtotime('+'.$m.' months', $now));
	return $date;
	}
	
	function kemarin()
	{
	$day=0;
	$now = strtotime(date("Y-m-d"));
	$date = date('Y-m-d', strtotime('-'.$day.' day', $now));
	return $date;
	}
	
	function eng($id,$di)
	{
	$pecah=explode("-",$id);
	if(count($pecah)<3)
		{
		return false;
		}
	return $pecah[2].$di.$pecah[1].$di.$pecah[0];
	}
	
	function age_year($tanggal_lahir) {
		list($year,$month,$day) = explode("-",$tanggal_lahir);
		$year_diff  = date("Y") - $year;
		$month_diff = date("m") - $month;
		$day_diff   = date("d") - $day;
		if ($month_diff < 0) $year_diff--;
			elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
		return $year_diff;
	}
	
	    function hitungUsia($tgl_lahir)
        {
        $data=explode("-",$tgl_lahir);
		$tgl_lahir=$data[2];
		$bln_lahir=$data[1];
		$thn_lahir=$data[0];
		$tanggal_today = date('d');
		$bulan_today=date('m');
		$tahun_today = date('Y');
		$harilahir=gregoriantojd($bln_lahir,$tgl_lahir,$thn_lahir);
		//menghitung jumlah hari sejak tahun 0 masehi
		$hariini=gregoriantojd($bulan_today,$tanggal_today,$tahun_today);
		//menghitung jumlah hari sejak tahun 0 masehi
		$umur=$hariini-$harilahir;
		//menghitung selisih hari antara tanggal sekarang dengan tanggal lahir
		$tahun=$umur/365;//menghitung usia tahun
		$sisa=$umur%365;//sisa pembagian dari tahun untuk menghitung bulan
		$bulan=$sisa/30;//menghitung usia bulan
		$hari=$sisa%30;//menghitung sisa hari
		$lahir= "$tgl_lahir-$bln_lahir-$thn_lahir";
		$today= "$tanggal_today-$bulan_today-$tahun_today";
		echo floor($tahun)." tahun ".floor($bulan)." bulan";

        } 
		
		function usiaUltah($tgl_lahir)
        {
        $data=explode("-",$tgl_lahir);
		$tgl_lahir=$data[2];
		$bln_lahir=$data[1];
		$thn_lahir=$data[0];
		$tanggal_today = date('d');
		$bulan_today=date('m');
		$tahun_today = date('Y');
		$harilahir=gregoriantojd($bln_lahir,$tgl_lahir,$thn_lahir);
		//menghitung jumlah hari sejak tahun 0 masehi
		$hariini=gregoriantojd($bulan_today,$tanggal_today,$tahun_today);
		//menghitung jumlah hari sejak tahun 0 masehi
		$umur=$hariini-$harilahir;
		//menghitung selisih hari antara tanggal sekarang dengan tanggal lahir
		$tahun=$umur/365;//menghitung usia tahun
		$sisa=$umur%365;//sisa pembagian dari tahun untuk menghitung bulan
		$bulan=$sisa/30;//menghitung usia bulan
		$hari=$sisa%30;//menghitung sisa hari
		$lahir= "$tgl_lahir-$bln_lahir-$thn_lahir";
		$today= "$tanggal_today-$bulan_today-$tahun_today";
		return floor($tahun);

        }
		function addTime($now,$hour_to_add) // jam
		{  		
				// $now=date('Y-m-d H:i:s');
				 $time			 = new DateTime($now);
				 $time->add(new DateInterval('PT' . $hour_to_add . 'H'));
				return   $time->format('Y-m-d H:i:s');
		}
		function addDay($now,$day) // 
		{  		 
				 $hour_to_add =($day*24);
				 $time			 = new DateTime($now);
				 $time->add(new DateInterval('PT' . $hour_to_add . 'H'));
				return   $time->format('Y-m-d H:i:s');
		}


}
?>
