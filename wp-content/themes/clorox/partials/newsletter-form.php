
<script type="text/javascript">
  //<![CDATA[
    if (typeof newsletter_check !== "function") {
      window.newsletter_check = function (f) {
        var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
        if (!re.test(f.elements["ne"].value)) {
          alert("The email is not correct");
          return false;
        }
        for (var i=1; i<20; i++) {
          if (f.elements["np" + i] && f.elements["np" + i].required && f.elements["np" + i].value == "") {
            alert("");
            return false;
          }
        }
        if (f.elements["ny"] && !f.elements["ny"].checked) {
          alert("You must accept the privacy statement");
          return false;
        }
        return true;
      }
    }
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
