
 function loading(id=null) {
	if(id==null)
	{
		  $.blockUI({ message: '<h4><div class="preloader pl-size-xs"><div class="spinner-layer pl-red-grey"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div> Mohon Tunggu...</h4>',
			css: { 
            border: '2px solid  white', 
            padding: '10px', 
			top: '200px',
			width:'250px',
			backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
			} 
		}); 
	}else{
		blok(id);
	}
          
         
}

function blok(id)
{
	  $('#'+id).block({ 
	  message: '<h4><div class="preloader pl-size-xs"  ><div class="spinner-layer pl-yellow"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>  Mohon Tunggu... </h4>',
	   centerY: 0, 
		css: { 
            border: '1px solid  #483D8B', 
            padding: '10px', 
			top: '10px',
			left: '',
			right: '10px',
			width:'250px',
			backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } 
		}); 
}

function progress(id)
{
	  $('#'+id).block({ 
	  message: '<h4><img alt="&nbsp;" src="theme/images/loader/load.gif"/> Mohon Tunggu...</h4><span id="progressBar"></span>',
	   centerY: 0, 
		css: { 
            border: '1px solid  #483D8B', 
            padding: '10px', 
			top: '10px',
			left: '',
			right: '10px',
			width:'250px',
			backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } 
		}); 
}

function notif(msg)
{
	 alertify.set('notifier','position', 'top-right');
	 alertify.warning(msg);
}
function notif_error(msg)
{
	 alertify.set('notifier','position', 'top-right');
	 alertify.error(msg);
}

function notif_success(msg)
{
	 alertify.set('notifier','position', 'top-right');
	 alertify.success(msg);
}

function berhasil_disimpan()
{
	  notif_success("<span class='sadow white'><div class='demo-google-material-icon'> <i class='material-icons'>done_all</i> <span class='icon-name'>Berhasil disimpan</span> </div></span>");
}

function sukses()
{
	  notif_success("<span class='sadow white'><div class='demo-google-material-icon'> <i class='material-icons'>done_all</i> <span class='icon-name'>Success!</span> </div></span>");
}
 

function unblock(id=null)
{
	if(id==null)
	{
		 $.unblockUI();
	}else{
		$('#'+id).unblock(); 
	}
}

