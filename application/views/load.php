<table width="100%" class="table-bordered table-strip">
<tr class='bg-black sadow col-black' style="font-size:21px">
<th>NO</td>
<th>TIME</td>
<th>SIDE</td>
<th>SIDE</td>
<th>ROOM</td>
</tr>
<?php
 
$filter="";
$data=$this->db->query("select * from data_jadwal where sts='1' and hapus='0' and substr(tgl,1,10)='".date("Y-m-d")."' order by start_time asc")->result();
$no=1;
foreach($data as $val)
{
	$color=$this->m_reff->goField("tm_room","color","where id='".$val->id_room."' ");

                if(date("H:i:s")>$val->start_time and date("H:i:s")>$val->end_time)
				{
				
				 
				
				
				}elseif(date("H:i:s")<$val->start_time and date("H:i:s")<$val->end_time){
					 echo "<tr class='  col-black font-bold' style='font-size:19px;font-weight:bold'>
                	<td style='color:".$color."' >".$no++."</td>
                	<td style='color:".$color."'>".substr($val->start_time,0,5)." - ".substr($val->end_time,0,5)."</td>
                	<td style='color:".$color."'>".$this->m_reff->goField("tm_side","nama","where id='".$val->id_side1."'")."</td>
                	<td style='color:".$color."'>".$this->m_reff->goField("tm_side","nama","where id='".$val->id_side2."'")."</td>
                	<td style='color:".$color."'>".$this->m_reff->goField("tm_room","nama","where id='".$val->id_room."'")."</td>
                	</tr>";
				}else{
				echo "<tr class='blink col-black font-bold' style='font-size:19px;font-weight:bold'>
                	<td style='color:".$color."'>".$no++."</td>
                	<td style='color:".$color."'>".substr($val->start_time,0,5)." - ".substr($val->end_time,0,5)."</td>
                	<td style='color:".$color."'>".$this->m_reff->goField("tm_side","nama","where id='".$val->id_side1."'")."</td>
                	<td style='color:".$color."'>".$this->m_reff->goField("tm_side","nama","where id='".$val->id_side2."'")."</td>
                	<td style='color:".$color."'>".$this->m_reff->goField("tm_room","nama","where id='".$val->id_room."'")."</td>
                	</tr>";
				}


	
 
}
?>
</table>

  
 <script type="text/javascript">
//<![CDATA[
(function(e){e.fn.blink=function(t){var n={delay:700};var t=e.extend(n,t);return this.each(function(){var n=e(this);setInterval(function(){if(e(n).css("visibility")=="visible"){e(n).css("visibility","hidden")}else{e(n).css("visibility","visible")}},t.delay)})}})(jQuery);$(document).ready(function(){$(".blink").blink()})
//]]>
</script>