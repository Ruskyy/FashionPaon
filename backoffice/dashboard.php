<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Admin Panel</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

		<!--Css Pessoal-->
		<link rel="stylesheet" href="../css/styles-front.css">

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>
<script>
$(document).ready(function(){
	$("#4521").hide();
	$(".sidabarsubmenu").hide();
	$(".sidabarmenu").removeClass("active");
	$(".sidabarsubsubmenu").removeClass("active");
		// 0
		$("#navact0").click(function(){
			$(".sidabarsubmenu").hide();
			$(".sidabarsubsubmenu").removeClass("active");
			$(".sidabarmenu").removeClass("active");
			$("#change").html("FashionPaon");
	});
		// 1
		$("#navact1").click(function(){
			$(".sidabarsubmenu").hide();
			$(".sidabarsubsubmenu").removeClass("active");
			$(".sidabarmenu").removeClass("active");

				$("#navactasub1").show();
				$("#navact1").addClass("active");
				$("#change").html("Clientes");
	});

		// 2
		$("#navact2").click(function(){
			$(".sidabarsubmenu").hide();
			$(".sidabarsubsubmenu").removeClass("active");
			$(".sidabarmenu").removeClass("active");

			$("#navactasub2").show();
			$("#navact2").addClass("active");
			$("#change").html("Admins");
	});
		// 3
		$("#navact3").click(function(){
			$(".sidabarsubmenu").hide();
			$(".sidabarsubsubmenu").removeClass("active");
			$(".sidabarmenu").removeClass("active");

			$("#navactasub3").show();
			$("#navact3").addClass("active");
			$("#change").html("Produtos");
	});	// 4
		$("#navact4").click(function(){
			$(".sidabarsubmenu").hide();
			$(".sidabarsubsubmenu").removeClass("active");
			$(".sidabarmenu").removeClass("active");

			$("#navactasub4").show();
			$("#navact4").addClass("active");
			$("#change").html("Configuração");
	});	// 5
		$("#navact5").click(function(){
			$(".sidabarsubmenu").hide();
			$(".sidabarsubsubmenu").removeClass("active");
			$(".sidabarmenu").removeClass("active");

			$("#navactasub5").show();
			$("#change").html("Sistema");
			$("#navact5").addClass("active");
		});	// 6
		$("#navact6").click(function(){
			$(".sidabarsubmenu").hide();
			$(".sidabarsubsubmenu").removeClass("active");
			$(".sidabarmenu").removeClass("active");

			$("#navact6").addClass("active");
		});	// 7
			$("#navact7").click(function(){
				$(".sidabarsubmenu").hide();
				$(".sidabarsubsubmenu").removeClass("active");
				$(".sidabarmenu").removeClass("active");

				$("#navact7").addClass("active");
			});


			// 1.1
			$("#navact11").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact11").addClass("active");
				$tipo = 0;
				$.ajax({
						url:"menu_files/Clientes/add_cliente.php",
						method:"POST",
						data: {tipo: $tipo},
						success:function(data){
							$('#menu_aqui').html(data);

						}
				});
			});
			// 1.2
			$("#navact12").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact12").addClass("active");
						$tipo = 0;
						$.ajax({
								url:"menu_files/Clientes/list_cliente.php",
								method:"POST",
								data: {tipo: $tipo},
								success:function(data){
									$('#menu_aqui').html(data);

								}
						});
			});
			// 2.1
			$("#navact21").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact21").addClass("active");
				$tipo = 0;
				$.ajax({
						url:"menu_files/Admins/add_admin.php",
						method:"POST",
						data: {tipo: $tipo},
						success:function(data){
							$('#menu_aqui').html(data);

						}
				});

			});
			// 2.2
			$("#navact22").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact22").addClass("active");
				$tipo = 0;
				$.ajax({
						url:"menu_files/Admins/list_admin.php",
						method:"POST",
						data: {tipo: $tipo},
						success:function(data){
							$('#menu_aqui').html(data);

						}
				});
			});
			// 3.1
			$("#navact31").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact31").addClass("active");
				$tipo = 0;
				$.ajax({
						url:"menu_files/Produtos/add_produto.php",
						method:"POST",
						data: {tipo: $tipo},
						success:function(data){
							$('#menu_aqui').html(data);

						}
				});
			});
			// 3.2
			$("#navact32").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact32").addClass("active");
				$tipo = 0;
				$.ajax({
						url:"menu_files/Produtos/list_produto.php",
						method:"POST",
						data: {tipo: $tipo},
						success:function(data){
							$('#menu_aqui').html(data);

						}
				});
			});
			// 3.3
			$("#navact33").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact33").addClass("active");
			});
			// 4.1
			$("#navact41").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact41").addClass("active");
				$tipo = 0;
				$.ajax({
						url:"menu_files/Configuracao/SlideShow.php",
						method:"POST",
						data: {tipo: $tipo},
						success:function(data){
							$('#menu_aqui').html(data);
						}
				});
			});
			// 4.2
			$("#navact42").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact42").addClass("active");
			});
			//4.3
			$("#navact43").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact43").addClass("active");
			});
			//5.1
			$("#navact51").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact51").addClass("active");
			});

});

</script>
<script>


function myFunction_inf(x){
		$id = x;
		$.ajax({
				url:"menu_files/Share_files/listar.php",
				method:"POST",
				data: {id: $id},
				success:function(data){
					$('#sub_menu_aqui').html(data);
				}
		});
}

function mySubFunction(x){
		$tipo = x;
		$.ajax({
				url:"ajax_files/sub_menu.php",
				method:"POST",
				data: {tipo: $tipo},
				success:function(data){
					$('#sub_menu_aqui').html(data);
				}
		});
}

function mySuubFunction(x){
		$tipo = x;
		$.ajax({
				url:"ajax_files/suub_menu.php",
				method:"POST",
				data: {tipo: $tipo},
				success:function(data){

				}
		});
}

</script>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-4.png">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo text-center">
							<a href="#">
								<img id="navact0" onclick="" src="../images/icons/logo.png" alt="" width="150px">
						 </a>
            </div>

            <ul class="nav">
                <li id="navact1" class="sidabarmenu active">
                    <a href="#">
                        <i class="pe-7s-graph"></i>
                        <p>Clientes</p>
                    </a>
                </li>
								<!-- submenu -->
										<ul style="list-style: none;" class="sidabarsubmenu" id="navactasub1">
											<li id="navact11" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-graph"></i>
															<p onclick="">Adicionar</p>
													</a>
											</li>
											<li id="navact12" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-graph"></i>
															<p onclick="">Listar</p>
													</a>
											</li>
										</ul>
                <li id="navact2" class="sidabarmenu">
                    <a href="#">
                        <i class="pe-7s-user"></i>
                        <p>Admins</p>
                    </a>
                </li>
								<!-- submenu -->
										<ul style="list-style: none;" class="sidabarsubmenu" id="navactasub2">
											<li id="navact21" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-user"></i>
															<p onclick="">Adicionar</p>
													</a>
											</li>
											<li id="navact22" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-user"></i>
															<p onclick="">Listar</p>
													</a>
											</li>
										</ul>
                <li id="navact3" class="sidabarmenu">
                    <a href="#">
                        <i class="pe-7s-note2"></i>
                        <p>Produtos</p>
                    </a>
                </li>
								<!-- submenu -->
										<ul style="list-style: none;" class="sidabarsubmenu" id="navactasub3">
											<li id="navact31" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-note2"></i>
															<p onclick="">Adicionar</p>
													</a>
											</li>
											<li id="navact32" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-note2"></i>
															<p onclick="">Listar</p>
													</a>
											</li>
											<li id="navact33" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-note2"></i>
															<p onclick="">Descontos</p>
													</a>
											</li>
										</ul>
                <li id="navact4" class="sidabarmenu">
                    <a href="#">
                        <i class="pe-7s-news-paper"></i>
                        <p>Configuração</p>
                    </a>
                </li>
								<!-- submenu -->
										<ul style="list-style: none;" class="sidabarsubmenu" id="navactasub4">
											<li id="navact41" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-news-paper"></i>
															<p onclick="">SlideShow</p>
													</a>
											</li>
											<li id="navact42" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-news-paper"></i>
															<p onclick="">Parallax</p>
													</a>
											</li>
											<li id="navact43" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-news-paper"></i>
															<p onclick="">Vídeo</p>
													</a>
											</li>
										</ul>
                <li id="navact5" class="sidabarmenu">
                    <a href="#">
                        <i class="pe-7s-science"></i>
                        <p>Sistema</p>
                    </a>
                </li>
								<!-- submenu -->
										<ul style="list-style: none;" class="sidabarsubmenu" id="navactasub5">
											<li id="navact51" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-science"></i>
															<p onclick="">Stock</p>
													</a>
											</li>
										</ul>

                <li id="navact6" class="sidabarmenu">
                    <a href="#">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li id="navact7" class="sidabarmenu">
                    <a href="#">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><p id="change">Dashboard</p></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-lg hidden-md"></b>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="menu_aqui" class="content">

        </div>
				<?php

				if(isset($_POST['submeter'])){
					require_once '../php/functions.php';
					include '../php/conn.php';
					$codpost = $_POST['codigo'].'-'.$_POST['postal'];
					$img_path="images/unknown.png";

					if(isset($_FILES['image'])){
						$file_name = $_FILES['image']['name'];
						$file_size = $_FILES['image']['size'];
						$file_tmp =$_FILES['image']['tmp_name'];
						$file_type=$_FILES['image']['type'];
						@$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

						$expensions= array("jpeg","jpg","png");

						echo $file_size;
						echo $file_name;
						if(in_array($file_ext,$expensions)== false){
							 echo "Extension not allowed, please choose a JPEG or PNG file.";
						}
						if($_FILES['image']['size'] > 2097152 ||$_FILES['image']['size'] == 0 ){
							 echo 'ERROR : File size error, it must be excately 2 MB';
						}else{
							$generatedname = generateRandomString(100).'.'.$file_ext;
							$img_path="images/uploads/".$generatedname;
							 move_uploaded_file($file_tmp,"../images/uploads/".$generatedname);
						}
					}

						$username=mysqli_fetch_array(mysqli_query($conn,"SELECT cliente_username FROM cliente WHERE cliente_username='$_POST[user]'"));
						$email=mysqli_fetch_array(mysqli_query($conn,"SELECT cliente_email FROM cliente WHERE cliente_email='$_POST[email]'"));

					if(!$username && !$email){
						$codpost = $_POST['codigo'].'-'.$_POST['postal'];

						//Encripta a password
						$encpassword =md5( $_POST['pass']);
						if ($_POST['tipo'] == 0) {
							mysqli_query($conn,"CALL usp_register_user('$_POST[user]','$encpassword','$_POST[fname]','$_POST[lname]','$_POST[data]','$_POST[morada]','$codpost','$_POST[paises]','$_POST[nif]','$_POST[tele]','$_POST[email]','$img_path')");
						}
						else{
							 mysqli_query($conn,"CALL usp_register_admin('$_POST[user]','$encpassword','$_POST[fname]','$_POST[lname]','$_POST[data]','$_POST[morada]','$codpost','$_POST[paises]','$_POST[nif]','$_POST[tele]','$_POST[email]','$img_path')");
						}


						echo 'sucesso';
					}else {
						if ($username) {
							echo 'O username é repetido';
						}if ($email) {
							echo 'O email é repetido';
						}
					}
					include '../php/deconn.php';
				}
				?>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>
    </div>
</div>
</body>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
</html>
