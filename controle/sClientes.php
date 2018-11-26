<?php
	if (isset($_SESSION['username'])) {
		$nomUser = ($_SESSION['username']);
		$valSes = '1';
		}
		else{
		$valSes = '2';
		}
		
	if($valSes == 2)
	{
		$style = 'style="display:none";';
		//echo ("<a href='index.php' style='font-weight:bold; color:orange;'>Debe iniciar la session</a>");
        //	echo ("<a href='index.php' style='font-weight:bold; color:orange;'>Debe iniciar la session</a>");?>
            	<SCRIPT LANGUAGE="javascript">
                alert("Debe iniciar sesion");
				location.href = "index.php";
				</SCRIPT>
            
            <?php
	}  
	else if ($valSes == 1)
	{
		$style = 'style="display:block";';	
		}
		//else{
		//	$style = 'style="display:none";';
	    //	echo ("<a href='index.php' style='font-weight:bold; color:orange;'>Debe iniciar la session</a>");
        else{
			$style = 'style="display:none";';
	    	?>
            	<SCRIPT LANGUAGE="javascript">
				location.href = "index.php";
				</SCRIPT>
            
            <?php
        
			}

?>