<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Bienvenue : Vous êtes connecté à votre maison</title>
    <link rel="stylesheet" type="text/css" href="stylesmaison.css">
    
  </head>
  <body>
    <header><h1>Etat de ma maison</h1></header>
    <div class="container">
      <section>
    <form>
      <h3>
        Choix des actions : <br />
      </h3>
    </form>
    <p>
      <?php
         $pinCapteur = 28;
         
         system("gpio mode $pinCapteur in");
         $ret = exec("gpio read $pinCapteur");
         ?>
      <script type='text/JavaScript'>
        function    Check()
        {
        var non = "porte déverrouillée";
        var res = '<?php echo $ret; ?>';
        var oui = "porte verrouillée";

        if (res == 0)
        {
		document.check2.output.value=oui; 
	}
        else
        {
        document.check2.output.value=non;
        }
        }        
      </script>      
    </p>
	<form name="check2">
    <button type="button" onclick= "Check()">Verifier le verrouillage des portes</button>
	<BR>
	<BR>
    <input type="text" name="output" value="" style="width: 150px; height:60px;"/>
	<BR>
	<BR>
	<button type="button" onclick='window.location.reload(false)'>Rafraichir la page</button><BR><BR>
	
	</form>
      </section>
    </div>
    <BR><BR><BR><BR><BR>
    <footer>
      <p>By Adrien QUESSOT<BR>Babacar MOREAU<BR>Jocelyn SEZNEC<BR>Thibault VINCENT</p>
    </footer>
  </body>
</html>
