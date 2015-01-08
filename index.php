<?php
include("admin/config.php");
	
	$query = sprintf("SELECT id, usuario, data, servico, status FROM timeline");
	$dados = mysql_query($query, $con) or die(mysql_error()); 
	$linha = mysql_fetch_assoc($dados); 
	$total = mysql_num_rows($dados);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>TorrentzBR Status</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js" ></script>
		<script src="js/jquery.uptimeRobotMonitor.js"></script>
        <link rel="stylesheet" type="text/css" href="css/body.css">
		<script type="text/javascript">			
			
			$( document ).ready(function() {
				
				var timerId2 = $("#status").uptimeRobotMonitor({monitorConfs: [
				{
					apiKey: "m776563787-1eda8bab1442befbe6c6a953",
					name: "Website",
					color: "#5cb85c"
				},
				{
					apiKey: "m776564873-f1404a38407d6de1fa1eed89",
					name: "Banco de Dados",
					color: "#5cb85c",
					customUptimeRatio: "1-7"
				}], width: "640", height: "240", containerId: "containerId2", refresh: false});
				
			});
		</script>
		<style type="text/css">
			.center{
				margin: 0 auto;
				width:640px;
			}
		</style>
	</head>
	<body id="body">
            <div id="logo"></div>
            <h1>Status do Serviço</h1>
            <div id="status" class="center"></div>
            <div id="log">
				<?php 
                
					$data = $linha['data'];
					
					if($total > 0) { 
						do{ ?> 
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="tabela_titulo">
                    <td width="33%" height="40px" align="center" valign="middle" bgcolor="#3579BC"><strong>Serviço:</strong> <?=$linha['servico']?></td>
					<td width="33%" height="40px" align="center" valign="middle" bgcolor="#3579BC"><strong>Usuário:</strong> <?=$linha['usuario']?></td>
					<td width="33%" height="40px" align="center" valign="middle" bgcolor="#3579BC"><strong>Data:</strong> <?php echo date('d/m/Y H:m:s', strtotime($data)); ?></td>
				  </tr>
				  <tr class="tabela_texto">
					<td colspan="3" bgcolor="#e2e2e2"><strong><?=$linha['status']?></strong></td>
				  </tr>
				</table>	
				</p> 	
					<?php }while($linha = mysql_fetch_assoc($dados));} 
				?>
            </div>
	</body>
</html>