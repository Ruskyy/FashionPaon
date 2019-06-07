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
		<link rel="stylesheet" type="text/css" href="css/main.css">
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

				$("#navactasub7").show();
				$("#change").html("Notificação");
				$("#navact7").addClass("active");
			});

			// 0.1
			$("#navact0").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact0").addClass("active");
				$tipo = 0;
				$.ajax({
						url:"menu_files/backoff_home.php",
						method:"POST",
						data: {tipo: $tipo},
						success:function(data){
							$('#menu_aqui').html(data);

						}
				});
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
				$tipo = 0;
				$.ajax({
						url:"menu_files/Configuracao/parallax.php",
						method:"POST",
						data: {tipo: $tipo},
						success:function(data){
							$('#menu_aqui').html(data);
						}
				});
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
				$tipo = 0;
				$.ajax({
						url:"menu_files/Sistema/list_tamanhos.php",
						method:"POST",
						data: {tipo: $tipo},
						success:function(data){
							$('#menu_aqui').html(data);
						}
				});
			});
			//5.2
			$("#navact52").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact52").addClass("active");
				$tipo = 0;
				$.ajax({
						url:"menu_files/Encomendas/list.php",
						method:"POST",
						data: {},
						success:function(data){
							$('#menu_aqui').html(data);
						}
				});
			});
			//5.3
			$("#navact53").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact53").addClass("active");
				$tipo = 0;
				$.ajax({
						url:"menu_files/Tabela/list.php",
						method:"POST",
						data: {},
						success:function(data){
							$('#menu_aqui').html(data);
						}
				});
			});
			//7.1
			$("#navact71").click(function(){
				$(".sidabarsubsubmenu").removeClass("active");
				$("#navact71").addClass("active");
				$tipo = 0;
				$.ajax({
						url:"menu_files/Notification/.php",
						method:"POST",
						data: {tipo: $tipo},
						success:function(data){
							$('#menu_aqui').html(data);
						}
				});
			});

			function convertSegMilSeg(i){
				i = i * 1000;
				return i;
			}

			function generateNotification(){
				$tipo = 1;
				$.ajax({
						url:"menu_files/Notification/AllNotification.php",
						method:"POST",
						data: {tipo: $tipo},
						success:function(data){
							$('#notification').html(data);
						}
				});
			}

			function IntervNotification(){
				$tipo = 0;
				$.ajax({
						url:"menu_files/Notification/AllNotification.php",
						method:"POST",
						data: {tipo: $tipo},
						success:function(data){
							if (data != 0) {
								generateNotification();
							}
						}
				});
			}
			setInterval(IntervNotification, convertSegMilSeg(5));
});
</script>
<script>

/*function ABRE(){
	var codigo = $('#file')[0].files[0];
	alert(codigo.name+"//"+codigo.size+"//-->"+codigo.tmp_name+"<--//"+codigo.type);
	console.log(codigo.name+"//"+codigo.size+"//-->"+codigo.tmp_name+"<--//"+codigo.type);
}*/
function myFunction_list(x){
	var tipo = x;
	$tipo = 0;
	if(tipo == 0){
		$.ajax({
				url:"menu_files/Clientes/list_cliente.php",
				method:"POST",
				data: {tipo: $tipo},
				success:function(data){
					$('#menu_aqui').html(data);
				}
		});
	}if(tipo == 1){
		$.ajax({
				url:"menu_files/Admins/list_admin.php",
				method:"POST",
				data: {tipo: $tipo},
				success:function(data){
					$('#menu_aqui').html(data);
				}
		});
	}
}

function Function_AddCliente(x){
	var formData = new FormData($('#form')[0]);
	formData.append('tipo',x);
	$.ajax({
		 url: 'menu_files/Share_files/add.php',
		 type: 'POST',
		 data: formData,
		 async: false,
		 success: function(data) {
				 alert(data);
				 if(data == 'sucesso'){
					 myFunction_list(x);
				 }
		 },
		 cache: false,
		 contentType: false,
		 processData: false
	});
}

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
function myFunction_edit(x){
		$id = x;
		$.ajax({
				url:"menu_files/Share_files/editar.php",
				method:"POST",
				data: {id: $id},
				success:function(data){
					$('#sub_menu_aqui').html(data);
				}
		});
}

function myFunction_delet(x){
		$id = x;
		$.ajax({
				url:"menu_files/Share_files/delete.php",
				method:"POST",
				data: {id: $id},
				success:function(data){
					myFunction_list(data);
				}
		});
}


function myFunction_editt(){
		var codigo = $('#codigo').val();
		var postal = $('#postal').val();
		var codpos = codigo+"-"+postal;
		$id = $('#id').val();
		$pass = $('#password').val();
		$fname = $('#fname').val();
		$lname = $('#lname').val();
		$data = $('#data').val();
		$morada = $('#morada').val();
		$codpos = codpos;
		$paises = $('#paises').val();
		$nif = $('#nif').val();
		$tele = $('#tele').val();
		$email =  $('#email').val();
		$.ajax({
				url:"menu_files/Share_files/editt.php",
				method:"POST",
				data: {id: $id, pass: $pass, fname: $fname, lname: $lname, data: $data, morada: $morada, codpos: $codpos, paises: $paises, nif: $nif, tele: $tele, email: $email},
				success:function(data){
					myFunction_list(data);
				}
		});
}

//----------------------Sistema Tamanho
function myFunction_addtamanho(){
		$nome = $('#tamanho').val();
		$categoria = $('#categoria_tamanho').val();
		$tipo = 0;
		alert($nome+" "+$categoria);
		$.ajax({
				url:"menu_files/Sistema/addT.php",
				method:"POST",
				data: {tipo: $tipo, nome: $nome, categoria: $categoria},
				success:function(data){}
		});
		$tipo = 0;
		$.ajax({
				url:"menu_files/Sistema/list_tamanhos.php",
				method:"POST",
				data: {tipo: $tipo},
				success:function(data){
					$('#menu_aqui').html(data);
				}
		});
}


function myFunction_tamanh_delet(x){
	$id = x;
	$.ajax({
		url:"menu_files/Sistema/tamanho_delet.php",
		method:"POST",
		data: {id: $id},
		success:function(data){
			$tipo = 0;
			$.ajax({
				url:"menu_files/Sistema/list_tamanhos.php",
				method:"POST",
				data: {tipo: $tipo},
				success:function(data){
					$('#menu_aqui').html(data);
				}
			});
		}
	});
}
//----------------------Produtos----------------------
//0-Delete, 1- add do produto, 2-Edit do produto, 3-add imagens, 4- add de stock, 5- add produto

function myFunction_AllAddProd(id,tipo){
	if(tipo != 0)
	{
		var formData = new FormData($('#form')[0]);
		formData.append('id',id);
		formData.append('tipo',tipo);
	}else{
		var formData = new FormData();
		formData.append('id',id);
		formData.append('tipo',tipo);
	}
	$.ajax({
		url: 'menu_files/Produtos/addAllProd.php',
		type: 'POST',
		data: formData,
		async: false,
		success: function(data) {
			//alert(data);
			if(data == 'sucesso'){
				$tipo = 0;
				$.ajax({
					url:"menu_files/Produtos/list_produto.php",
					method:"POST",
					data: {tipo: $tipo},
					success:function(data){
						$('#menu_aqui').html(data);
					}
				});
			}
		},
		cache: false,
		contentType: false,
		processData: false
	});
}


function myFunction_editProd(x){
	$id = x;
	$.ajax({
		url:"menu_files/Produtos/editar.php",
		method:"POST",
		data: {id: $id},
		success:function(data){
			$('#sub_menu_aqui').html(data);
		}
	});
}

function myFunction_addProdStock(x){
	$id = x;
	$.ajax({
		url:"menu_files/Produtos/add_stock.php",
		method:"POST",
		data: {id: $id},
		success:function(data){
		$('#sub_menu_aqui').html(data);}
	});
}

function myFunction_addProdImg(x){
	$id = x;
	$.ajax({
		url:"menu_files/Produtos/add_img.php",
		method:"POST",
		data: {id: $id},
		success:function(data){
		$('#sub_menu_aqui').html(data);}
	});
}

function myFunction_gerProdStock(x){
	$id = x;
	$.ajax({
		url:"menu_files/Produtos/info_stock.php",
		method:"POST",
		data: {id: $id},
		success:function(data){
		$('#sub_menu_aqui').html(data);}
	});
}

function myFunction_gerProdImg(x){
	$id = x;
	$.ajax({
		url:"menu_files/Produtos/info_img.php",
		method:"POST",
		data: {id: $id},
		success:function(data){
		$('#sub_menu_aqui').html(data);}
	});
}


function myFunction_SockEnc(x){
	$id = x;
	$.ajax({
		url:"menu_files/Produtos/stock_encomend.php",
		method:"POST",
		data: {id: $id},
		success:function(data){
		$('#sub_sub_menu_aqui').html(data);}
	});
}

function myFunction_AllAddStock(x, y){
	var formData = new FormData($('#form2')[0]);
	formData.append('id',x);
	formData.append('tipo',y);
	$.ajax({
		 url: 'menu_files/Produtos/addAllStock.php',
		 type: 'POST',
		 data: formData,
		 success: function(data) {
			 if( y == 0 || y == 1 ){
				 var numero = data.split(':')[0];
				 var estado = data.split(':')[1];
				 var preco = data.split('/')[1];
				 var estado = estado.split('/')[0];
				 if( estado == "sucesso" ){
					 $("#StockEncQuant").attr("value", numero);
					 $("#StockEncTotal").attr("value", preco+"€");
				 }
			 }
		 },
		 cache: false,
 		contentType: false,
 		processData: false
	});
}

//-----------------Encomendas-----------------
function myFunction_EncDelete(x){
	$id = x;
	$tipo = 4;
	$.ajax({
		 url:"menu_files/Encomendas/All_AdEncomenda.php",
		 type: 'POST',
		 data: {id: $id, tipo: $tipo},
		 success: function(data) {
		 }
	});
}

//------------------Configuração-----SlideShow
function Function_AddSlideshow(){
	var formData = new FormData($('#form1')[0]);
	$.ajax({
		 url: 'menu_files/Configuracao/addSlideshow.php',
		 type: 'POST',
		 data: formData,
		 async: false,
		 success: function(data) {
				 alert(data);
				 if(data == 'sucesso'){
					 $tipo = 0;
					 $.ajax({
							 url:"menu_files/Configuracao/Slideshow.php",
							 method:"POST",
							 data: {tipo: $tipo},
							 success:function(data){
								 $('#menu_aqui').html(data);
							 }
					 });
				 }
		 },
		 cache: false,
		 contentType: false,
		 processData: false
	});
}


function myFunction_updateSlideshow(x,y){
	$id = x;
	$tipo = y;
	$.ajax({
			url:"menu_files/Configuracao/upstateslideShow.php",
			method:"POST",
			data: {id: $id, tipo: $tipo},
			success:function(data){
				$tipo = 0;
        $.ajax({
            url:"menu_files/Configuracao/list_slideshow.php",
            method:"POST",
            data: {tipo: $tipo},
            success:function(data){
              $('#sub_menu_aqui').html(data);
            }
        });
			}
	});
}

function myFunction_deletSlideshow(x){
	$id = x;
	$.ajax({
			url:"menu_files/Configuracao/delet_slideshow.php",
			method:"POST",
			data: {id: $id},
			success:function(data){
				$tipo = 0;
        $.ajax({
            url:"menu_files/Configuracao/list_slideshow.php",
            method:"POST",
            data: {tipo: $tipo},
            success:function(data){
              $('#sub_menu_aqui').html(data);
            }
        });
			}
	});
}
//--------------------------------------------------------------------------------------
function mySubFunction(x){
		$tipo = x;
		$.ajax({
				url:"ajax_files/menu.php",
				method:"POST",
				data: {tipo: $tipo},
				success:function(data){
					$('#sub_menu_aqui').html(data);
				}
		});
}


function mySbFunction(x){
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
				success:function(data){}
		});
}

</script>
<div class="wrapper">
     <div class="sidebar" data-color="blue"><!-- data-image="assets/img/sidebar-4.png"> -->

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
											<!-- <li id="navact43" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-news-paper"></i>
															<p onclick="">Vídeo</p>
													</a>
											</li> -->
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
															<p onclick="">Tamanhos</p>
													</a>
											</li>
											<li id="navact52" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-science"></i>
															<p onclick="">Encomendas</p>
													</a>
											</li>
											<li id="navact53" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-science"></i>
															<p onclick="">Tabelas</p>
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
                        <p>Notificações</p>
                    </a>
                </li>
								<!-- submenu -->
										<ul style="list-style: none;" class="sidabarsubmenu" id="navactasub7">
											<li id="navact71" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-science"></i>
															<p onclick="">Conteúdo</p>
													</a>
											</li>
											<li id="navact72" class="sidabarsubsubmenu">
													<a href="#">
															<i class="pe-7s-science"></i>
															<p onclick="">Listar</p>
													</a>
											</li>
										</ul>
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
                           <a href="#">
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
        <div id="menu_aqui" class="content" >

        </div>
				<div id="notification">

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
 						$var = (string)$file_ext;
 						echo "name".$file_name."<br>";
 						echo "size".$file_size."<br>";
 						echo "tmp".$file_tmp."<br>";
 						echo "type".$file_type."<br>";
 						echo "ext->".$var."<br>";
 						echo "Post->".$_FILES['image']."<br>";

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
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Me</a>, made with JS and love for a better web
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
