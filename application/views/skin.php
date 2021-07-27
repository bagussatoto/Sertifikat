 <?php $mobile=$this->m_reff->mobile(); ?>
 <script>
				   $( document ).ready(function() {
					   function setCookie(cname,cvalue) {
						document.cookie = cname + "=" + cvalue + ";";
					}

					function getCookie(cname) {
						var name = cname + "=";
						var decodedCookie = decodeURIComponent(document.cookie);
						var ca = decodedCookie.split(';');
						for(var i = 0; i < ca.length; i++) {
							var c = ca[i];
							while (c.charAt(0) == ' ') {
								c = c.substring(1);
							}
							if (c.indexOf(name) == 0) {
								return c.substring(name.length, c.length);
							}
						}
						return "";
					}

					   var set=getCookie("sound");
					   if(set=="on")
					   {	
						$("#sound_effect").val("on");
						$("#set_sound").prop( "checked", true );
					   }else{
						$("#sound_effect").val("off");   
						$("#set_sound").prop( "checked", false );
					   }
					   set_theme();
					   function set_theme()
					   {
							var set_theme=getCookie("thema");
						   if(set_theme)
						   {	 
							  $("body").removeAttr('class');
							  $("body").attr('class', '');
							  $("body").addClass("theme-"+set_theme);
							
							  setTimeout(function(){ tombol_icon(set_theme) },50);
							  
							 setTimeout(function(){
							 $("thead").removeAttr('class');
							 $("thead").attr('class', '');
							 $("thead").addClass("sadow bg-"+set_theme);  
							  }, 100);
							     classLS();
						   }else{
						   };
						    classLS();
					   }
					   function tombol_icon(set_theme)
					   {	 
						      $("table button i").removeAttr('class');
							  $("table button i").attr('class', '');
							  $("table button i").addClass("material-icons col-"+set_theme);
					   };
					   
					   
					   $(document).on("keypress","#tabel_filter input,.dataTables_length select",function()
					   {
						    var set_theme=getCookie("thema");
						  	setTimeout(function(){ tombol_icon(set_theme); }, 150);
						  
					   });
					   
					   $(document).on("change","select",function()
					   {
						    var set_theme=getCookie("thema");
						  	setTimeout(function(){ tombol_icon(set_theme); }, 150);
						  
					   });

					   $(document).on("click","#tabel_paginate",function()
					   {	 
						    var set_theme=getCookie("thema");
						  	setTimeout(function(){ tombol_icon(set_theme); }, 150);
						  
					   });
					   
						$(".clickthem").click(function(event, messages){
							event.preventDefault();
							var skin=$(this).attr("thema");
							document.cookie ="thema="+skin;
							 set_theme();
						});
						$(".menuclick").click(function(){
							setTimeout(function(){ set_theme(); }, 150);
						});
						
						function classLS()
						{	
							<?php if($mobile){ ?>
							 $("body").addClass("ls-closed");
							 $("body").removeClass("overlay-open");
							<?php } ?>
						}
					   
				   });
				   </script>
     
	 
	 <aside id="rightsidebar" class="right-sidebar">
          
            <div class="tab-content">
                <div   class="tab-pane fade in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red"  thema="red" class="clickthem ">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink" thema="pink" class="clickthem">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
						<li data-theme="purple" thema="purple" class="clickthem">
                            <div class="purple"></div>
                            <span>purple</span>
                        </li>
						<li data-theme="deep-orange" thema="deep-orange" class="clickthem">
                            <div class="deep-orange"></div>
                            <span>deep-orange</span>
                        </li>
						<li data-theme="indigo" thema="indigo" class="clickthem">
                            <div class="indigo"></div>
                            <span>indigo</span>
                        </li>
						
						 
                        <li data-theme="blue"  thema="blue" class="clickthem">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue"  thema="light-blue" class="clickthem">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan"  thema="cyan" class="clickthem">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal" thema="teal" class="clickthem">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green"  thema="green" class="clickthem">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green" thema="light-green" class="clickthem">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime" thema="llime" class="clickthem">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow" thema="yellow" class="clickthem">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber"  thema="amber" class="clickthem">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange"  thema="orange" class="clickthem">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange"   thema="deep-orange" class="clickthem">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown"   thema="brown" class="clickthem">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey"  thema="grey" class="clickthem">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey"  thema="blue-grey" class="clickthem">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black"  thema="black" class="clickthem">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
              
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
		
	 