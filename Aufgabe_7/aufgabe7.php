<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Datei einlesen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<title>Titel</title>
</head>
<body>

<div class="container">
<h1>Anmeldung</h1>
<?php 
if($_POST)  {
    $vorname = filter_var($_POST['vorname'], FILTER_SANITIZE_STRING);
    $nachname = filter_var($_POST['nachname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $studiengang = filter_var($_POST['studiengang'], FILTER_SANITIZE_STRING);
    
    $fehler = false;
    if(!$vorname || !$nachname || !$email || !$studiengang) $fehler=true;
    
    if (!$fehler)
    {
        echo "
    <p>
	Herzlichen Dank 
    " . $vorname . " " . $nachname . " 	
 	vom Studiengang "
    . $studiengang . " !<br/>
	Wir haben eine Bestätigung Ihrer Anmeldung an die E-Mail_Adresse " 
	. $email . "
	gesendet <br/>
	<a href=' ./aufgabe7.php'>Zurück</a>
    </p> 
    ";
    }
 } 
if(($_POST && $fehler) || empty($_POST)) :
?>
	
		<form action" ./aufgabe7.php" method="post" class="form-horizontal" autocomplete="off">
		   <div class="form group row"> 	
			<label for= "vorname"> class="col-3">Vorname : </label> 
			<?php 
			if(isset($vorname && "$vorname") {
            echo "
			    <input type='text' name='vorname' placeholder="Vorname" class='form-control col-9 is invalid'>
			    <div class='invalid feedback'>
			    Bitte Vorname eintragen!
			    </div>
			    ";
            }
        else {
<input type='text' name='vorname' placeholder="Vorname">
}
    echo "

			?>
			<input type= "text" name="vorname" placeholder="Vorname">
			</div>
			   
			<div class="form group">
				<label for="nachname">Nachname : </label>
				<input type="text" name="nachname" placeholder="Nachname">
				
			</div>
			<div class="form group">
			<label for="email">E-Mail : </label>
			<input type="email" name="email" placeholder="E-Mail">
			</div>
		
		    <div class="form group">
		    	<label for="studiengang">Studiengang : </label>
			<select name="studiengang">
				<option value="FIW">Informatik und Wirtschaft</option>
				<option value="AI">Angewandte Informatik</option>
				<option value="IMI">Internationae Medieninformatik</option>		
			</select>
		</div>
		
		<div class "form-group row">
			<label for= "pwd">Password : </label> 
			<input type= "password" name="pwd" placeholder="Password" autocomplete"new-password">
		</div>
		<div class "form-group row">
			<button type="submit" class="btn btn-primary">Anmeldung</button>
		</div>
	</form>
   <?php 
   endif;
   ?>
</div>
</body>
</html>