<?php
if (isset($_SESSION['k_username'])) 
{
	echo (' Usuario: '.$_SESSION['k_username']);

	
}else{
	echo ' <form action="validar.php" name="" method="post">
        	<table align="right">
            <tr>
            	<td>
                	Usuario: <input type="text" name="usuario" size="15" maxlength="30"/>
                    Contrase&ntildea: <input type="password"  name="password" size="15" maxlength="30"/>
                    <input type="submit" value="Entrar" />
                </td>
            </tr>
            </table>
         </form>';
}
?>
