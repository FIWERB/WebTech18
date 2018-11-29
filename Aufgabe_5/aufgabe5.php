<!DOCTYPE html> 
<html> 
<head> 
	<meta charset= "UTF-8" > 
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
	<link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />   
	<title>Aufgabe 5</title>   
	<?php
		function zufzahl($max, $anzahl)
		{
			
				echo "<table class='table table-striped'>";
				echo "<thead>
				
					<tr class='text-center'>
					<th>Zufallszahl</th>
					for($j=1; $j<=$stellen; $j++)
					{
						echo "<th>".$j .gerundet "<th>";
					}
					echo "</tr>
						</thead>
						</tbody>";					
					
				for($i=1; $i<=$anzahl; $i++)
			{
				$zzahl = rand(1,$max);
				//$gerundet1 = abschneiden($zzahl, stellen 1);
				//$gerundet2 = abschneiden($zzahl, stellen 2);
				//$gerundet3 = abschneiden($zzahl, stellen 3);
				//echo $zzahl . " " . $gerundet2 . " " . $gerundet3 . "<br/>";
				if($zzahl<10000) {
					echo "<tr class='text-right' style='background-color:#b1d471'>";
				}
				echo "<tr> class='text-right'>"</tr>;
				echo "<td>" .$zzahl. "</td>";
				for($j=1; $j<=$stellen; $j++)
				{
					echo "<td>".abschneiden($zzahl, $j). "</td>";
				}
				echo "</tr>";	
								
			}
			echo "</tbody>";
		}
		
		function abschneiden($zahl, $stellen=2)
		{
			$base = pow( base: 10, $stellen);
			return $zahl - ($zahl % $base);
		}
		
	?>
</head> 
<body>
		
		<div class="container-fluid">
		<h1>Zufallszahlen</h1>
			<div>
				<?php zufzahl(20000, 20); ?>
			</div>
		</div>
</body>
</html> 