
<script type="text/javascript">
  //<![CDATA[

  	function createMessage(type, message){

  		$('.alert-messages')
  		.append(
	  		$('<div />')	  			
	  			.addClass('alert')
	  			.addClass('alert-'+type)
	  			.addClass('alert-dismissible')
	  			.attr('role', 'alert')
	  			.text(message)
	  			.append(
		  			$('<button />').
		  				attr('type','button').
		  				attr('data-dismiss', 'alert').
		  				attr('aria-label', 'Close').
		  				addClass('close').
		  				append($('<span />').
		  					attr('aria-hidden','true').
		  					html('&times;')
		  					
		  				)
		  		)
  		);

  		setTimeout(function(){
  			$('.alert-messages div:first-child').remove();
  		},3000)
  	};

  	function getParameterByName(name, url) {
		    if (!url) url = window.location.href;
		    name = name.replace(/[\[\]]/g, "\\$&");
		    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
		        results = regex.exec(url);
		    if (!results) return null;
		    if (!results[2]) return '';
		    return decodeURIComponent(results[2].replace(/\+/g, " "));
		}


    if (typeof newsletter_check !== "function") {
      window.newsletter_check = function (f) {
        var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
        if (!re.test(f.elements["ne"].value)) {
          createMessage('warning','El email no es válido.');
          return false;
        }
        for (var i=1; i<20; i++) {
          if (f.elements["np" + i] && f.elements["np" + i].required && f.elements["np" + i].value == "") {
            alert("");
            return false;
          }
        }
        if (f.elements["ny"] && !f.elements["ny"].checked) {
          //alert("You must accept the privacy statement");
          return false;
        }
        return true;
      }
    }



    $(function(){
    	var na; 
    	na = getParameterByName('nk');
    	if(na) createMessage('success', 'Muchas gracias por suscribirte. Te estará llegando un email de confirmación a tu casilla de email.');

    });


  //]]>
</script>


<form method="post" action="http://clorox.com.ar/?na=s" onsubmit="return newsletter_check(this)">
  <div class="col-lg-5 col-md-6">
    <label for="email" class="blue">Quiero recibir novedades</label>
  </div>
  <div class="col-lg-7 col-md-6">
    <div class="input-group">
      <input class="newsletter-email form-control input-md primary" type="email" placeholder="Ingresar email" name="ne" size="30" required>
      <span class="input-group-btn">
        <button class="newsletter-submit btn btn-link btn-icon" type="submit"><i class="icon icon-send"></i></button>
      </span>
    </div>
  </div>
</form>
