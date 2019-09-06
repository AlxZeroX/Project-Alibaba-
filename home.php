<?php 
session_start();
if (!isset($_SESSION["usuario"]))
        header("Location: login.php");
$connect = mysqli_connect("localhost", "root", "", "tbl_product");

if(isset($_POST["AgregarCarrito"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Articulo ya agregado")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
            'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Articulo Removido")</script>';
				echo '<script>window.location="home.php"</script>';
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
    <title>Carrito Alibaba</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/Estilos.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="fonts.css">
    <link rel="stylesheet" href="css/Estilo-menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-------------------jquery------------------------>
    <script src="jquery/jquery-latest.js"></script>
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <!-------------------BootsTrap-------------------->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-------------------Icono------------------------>
    <link rel="shortcut icon" href="img/favicon.ico"/>
</head>
	
	<body>
	
<!--CREACION DE Menu Con lista Desplegable-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="row">
   <a class="navbar-brand" href="https://www.alibaba.com/?spm=a2700.8293689.scGlobalHomeHeader.6.2ce265aa6SSNTj">
       <img src="img/Alibaba_Logo.png" alt="logo">
   </a>

<navegacion >
    <div class="fixmenu">
        <ul>
            <li style="font-size: 25px;" class="align-items-center">
               <h1>Bienvenido <?php echo $_SESSION["usuario"];?></h1>                
            </li>  
        </ul>
    </div>
</navegacion>

<navegacion >
    <div class="fixmenu">
        <ul>
            <li style="font-size: 25px;" class="align-items-center">
               <a target="" href="logout.php" rel="nofollow">Logout</a>
                
            </li>  
        </ul>
    </div>
</navegacion>

</div>
</nav>
<!--FIN - CREACION DE Menu Con lista Desplegable-->
	
	
	
	
		<br />
		<div class="container">
			<br />
			<br />
			<br />

			<?php
				$query = "SELECT * FROM tbl_product ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
            
                if(!empty($result) AND mysqli_num_rows($result) > 0)


				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="home.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						<img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>
						
						<h4 class=""><?php echo $row["info"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="AgregarCarrito" style="margin-top:5px;" class="btn btn-success" value="Agregar al Carrito" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Detalles de la compra</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Nombre Del Producto</th>
						<th width="10%">Cantidad</th>
						<th width="20%">Precio</th>
						<th width="15%">SubTotal</th>
						<th width="5%">Accion</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="home.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remover</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<br />
	
	
<!-----------INICIO FOOTER-------------------------->
<footer class="footermargen container-fluid text-center" style="background-color: #445268; padding: 50px">	
		<div style="color: white">
            <img src="img/World.png" alt="global">
            Alibaba.com Site: 
            <a class="linkfooter" href="http://www.alibaba.com">International</a> - 
            <a class="linkfooter" href="http://spanish.alibaba.com">Español</a> - 
            <a class="linkfooter" href="http://portuguese.alibaba.com">Português</a> - 
            <a class="linkfooter" href="http://german.alibaba.com">Deutsch</a> - 
            <a class="linkfooter" href="http://french.alibaba.com">Français</a> - 
            <a class="linkfooter" href="http://italian.alibaba.com">Italiano</a> - 
            <a class="linkfooter" href="http://hindi.alibaba.com">हिंदी</a> - 
            <a class="linkfooter" href="http://russian.alibaba.com">Pусский</a> - 
            <a class="linkfooter" href="http://korean.alibaba.com">한국어</a> - 
            <a class="linkfooter" href="http://japanese.alibaba.com">日本語</a> - 
            <a class="linkfooter" href="http://arabic.alibaba.com">اللغة العربية</a> - 
            <a class="linkfooter" href="http://thai.alibaba.com">ภาษาไทย</a> - 
            <a class="linkfooter" href="http://turkish.alibaba.com">Türk</a> - 
            <a class="linkfooter" href="http://dutch.alibaba.com/">Nederlands</a> - 
            <a class="linkfooter" href="http://vietnamese.alibaba.com/">tiếng Việt</a> - 
            <a class="linkfooter" href="http://indonesian.alibaba.com/">Indonesian</a> - 
            <a class="linkfooter" href="http://hebrew.alibaba.com/">עברית</a>
            <br><br>
                
            <a class="linkfooter" target="_blank" href="http://www.alibabagroup.com/en/global/home">Alibaba Group</a>|
            <a class="linkfooter" target="_blank" href="http://www.taobao.com">Taobao Marketplace</a>|
            <a class="linkfooter" target="_blank" href="http://www.tmall.com/">Tmall.com</a>|
            <a class="linkfooter" target="_blank" href="http://ju.taobao.com/">Juhuasuan</a>|
            <a class="linkfooter" target="_blank" href="http://www.aliexpress.com/">AliExpress</a>|
            <a class="linkfooter" target="_blank" href="http://www.alibaba.com/">Alibaba.com</a>|
            <a class="linkfooter" target="_blank" href="http://www.1688.com">1688.com</a>|
            <a class="linkfooter" target="_blank" href="http://www.alimama.com/index.htm">Alimama</a>|
            <a class="linkfooter" target="_blank" href="https://www.fliggy.com/">Fliggy</a>|
            <a class="linkfooter" target="_blank" href="https://world.taobao.com/">Taobao Global</a>
		    <br>
		    <a class="linkfooter" target="_blank" href="https://www.alibabacloud.com/">Alibaba Cloud</a>|
		    <a class="linkfooter" target="_blank" href="http://www.alios.cn/">AliOS</a>|
		    <a class="linkfooter" target="_blank" href="http://www.aliqin.cn/">AliTelecom</a>|
		    <a class="linkfooter" target="_blank" href="http://www.autonavi.com/">Autonavi</a>|
		    <a class="linkfooter" target="_blank" href="http://www.ucweb.com/">UCWeb</a>|
		    <a class="linkfooter" target="_blank" href="http://www.umeng.com/">Umeng</a>|
		    <a class="linkfooter" target="_blank" href="http://www.xiami.com/">Xiami</a>|
		    <a class="linkfooter" target="_blank" href="http://www.dingtalk.com/en">DingTalk</a>|
		    <a class="linkfooter" target="_blank" href="https://global.alipay.com/">Alipay</a>|
		    <a class="linkfooter" target="_blank" href="http://taobao.lazada.sg/">Lazada</a>
		    <br><br>Browse Alphabetically:
            <a class="linkfooter" target="_blank" href="https://onetouch.alibaba.com/">Onetouch</a>|
            <a class="linkfooter" target="_blank" href="http://www.alibaba.com/showroom/showroom.html?spm=a2700.8293689.0.0.2ce265aapv4bhN">Showroom</a>| 
            <a class="linkfooter" target="_blank" href="http://www.alibaba.com/countrysearch/continent.html">Country Search</a>| 
            <a class="linkfooter" target="_blank" href="http://www.alibaba.com/suppliers/supplier.html">Suppliers</a>| 
            <a class="linkfooter" target="_blank" href="http://wholesaler.alibaba.com/sitemap/index.htm">Wholesaler</a>| 
            <a class="linkfooter" target="_blank" href="http://ads.alibaba.com/">Affiliate</a>
            <br><br>
            <a class="linkfooter" href="http://rule.alibaba.com/rule/detail/2047.htm" rel="nofollow">Product Listing Policy</a>- 
            <a class="linkfooter" href="https://ipp.alibabagroup.com/" rel="nofollow">Intellectual Property Protection</a>- 
            <a class="linkfooter" href="http://rule.alibaba.com/rule/detail/2034.htm">Privacy Policy</a>- 
            <a class="linkfooter" href="http://rule.alibaba.com/rule/detail/2041.htm" rel="nofollow">Terms of Use</a>- 
            <a class="linkfooter" href="https://rule.alibaba.com/rule/detail/5038.htm?tracelog=footer_rule_5038" rel="nofollow">Law Enforcement Compliance Guide</a><br>
            <a class="linkfooter" rel="nofollow" href="http://www.alibaba.com/trade/servlet/page/static/copyright_policy">©</a> 1999-2018 Alibaba.com. All rights reserved.
		</div>
		
		
		
		




</footer>
<!-------------FIN FOOTER--------------------------->

<!-----------INICIO BOTON SUBIR ARRIBA------------------------->
<!--ESTO PUEDE IR EN CUALQUIER LADO, LO PONDREMOS AL FINAL XD-->
<span class="ir-arriba icon-arrowup">
<div class="texto">TOP</div>    
</span>
<!-----------FIN BOTON SUBIR ARRIBA---------------------------->

<!----------------INICIO Controladores------------------------------>
<script src="js/arriba.js"></script>
<script src="js/controlador.js"></script>   
<!----------------FIN Controladores--------------------------------->
	
	
	</body>
</html>

<?php

?>