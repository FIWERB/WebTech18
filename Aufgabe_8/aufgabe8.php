<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Formular</title>
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
<?php

require_once '../nichtinzip/passwd.inc.php';
require_once('DB.php');

$dbh = new DB('_s0540779__mockupdatadb', 'db.f4.htw-berlin.de:3306', 's0540779', $password);


function debug_to_console( $data ) {
    
    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
        else
            $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
            
            echo $output;
}
?>
</head>
<body>
	<?php
	   $form_header = 'Teilnehmerin hinzuf�gen';
	
	   if ($_GET) {
           
	   }
	
	   elseif ($_POST) {
            
	   }
	
	   //$teilnehmerinnen = $dbh->all();
	   // $dbh->add(array("Max", "Musterman", "max@musterman.de", "1234")); // Funktion add
	   //$dbh->delete(52);	// Funktion delete. Auch ge�ndert bei DB -> ohne array. $statement -> bindParam(parameter 1, &variable: $id);
	   
	   $dbh->edit(array("Jan", "Justerman", "jan@jan.de", "5678", "54"));
	   $teilnehmerinnen = $dbh->all(); // connection to datenbank: $dbh (s. oben)
	   
	?>
   <div class="container">
      <div class="panel panel-default">

         <div class="panel-heading">
            <h3 class="panel-title"><?= $form_header ?></h3>
         </div>

         <div class="panel-body">

            <?php if (isset($message)) : ?>
               <div class="alert alert-success">
                  <?= $message ?>
               </div>
            <?php endif; ?>

            <?php if (isset($command) && $command == 'edit') : ?>

            <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
             //Kopieren von aufgabe7
             
             <!--
                  dies ist das Formular für die Änderung eines Datensatzes
                  es beinhaltet 4 einzeilige Textfelder: für Vornmae, Name, E-Mail-Adresse und IP-Nummer
                  beachten Sie: das Formular soll auch die id weitergeben (hidden-Textfeld)
                  beachten Sie: die Textfelder sind mit dem Datensatz, der editiert werden soll, vorausgefüllt
             -->
            </form>

            <?php else : ?>
           	<div class="row">
           		<div class="col-xs-12">
            		<form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <!--
                             dies ist das Formular für das Anlegen eines neuen Datensatzes
                             es beinhaltet 4 einzeilige Textfelder: für Vornmae, Name, E-Mail-Adresse und IP-Nummer
                             keine id - diese wird von der Datenbank selbständig erzeugt (auto inkrement)
                        -->

            		</form>
               	 </div>
             </div>
         <?php endif; ?>

         </div> <!-- / .panel-body -->
      </div> <!-- / .panel -->

      <div class="row">

         <?php
            if (!sizeof($teilnehmerinnen)) {
               echo '<div class="alert alert-info">Es sind keine Studentinnen angemeldet!</div>';
            }
            else {
               foreach ($teilnehmerinnen as $teilnehmerin) { // $teilnehmerin = $dbh->get(6);
                  echo
                  '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                     <div class="thumbnail">
                        <p> '.$teilnehmerin["vorname"].' </p>
      					<h4> '.$teilnehmerin["nachname"].' </h4>
      		 			<p> '.$teilnehmerin["email"].' </p>
      					<p> '.$teilnehmerin["ipnr"].' </p>
                        <div class="buttons-edit">
                           <a class="btn btn-default btn-sm" href="<!-- hier muss eine passende URL angegeben werden (mit command und id-->">Edit</a> // aufgabe8.php? id= $teilnehmerin ["id"]
                           <a class="btn btn-default btn-sm" href="<!-- hier muss eine passende URL angegeben werden (mit command und id-->">Delete</a> 
                        </div>
                     </div>
                  </div>';
               }
            }
         ?>

      </div> <!-- / list-group -->
   </div> <!-- / .container -->
</body>
</html>
   </html>