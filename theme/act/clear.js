	
			function clearconsole() { 
			  console.log(window.console);
			  if(window.console || window.console.firebug) {
			   console.clear();
			  }
			}
