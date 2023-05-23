<?php 
	include('functions.php');
	$pdo = pdo_connect_mysql();
	$msg = '';
	session_start();
	if(isset($_GET['id'])){
	if (!empty($_POST)) {
		// Post data not empty insert a new record
		// Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
		// Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
		
		$id = isset($_POST['id']) ? $_POST['id'] : '';
		$articleid = isset($_POST['article']) ? $_POST['article'] : '';
		$quantite = isset($_POST['quantite']) ? $_POST['quantite'] : '';
		$datevente = isset($_POST['datevente']) ? $_POST['datevente'] : '';
		$unite = isset($_POST['unite']) ? $_POST['unite'] : '';
		$refvente = isset($_POST['refvente']) ? $_POST['refvente'] : '';
		$client = isset($_POST['client']) ? $_POST['client'] : '';
		$prixvente = isset($_POST['prixvente']) ? $_POST['prixvente'] : '';
		$prixttc = isset($_POST['prixttc']) ? $_POST['prixttc'] : '';

		 
		// Insert new record into the contacts table
		$stmt = $pdo->prepare('UPDATE vente SET article_id = ?, unite_id = ?, qtevendu = ?, datevente = ?, refvente = ?,
         client_id = ?, prixvente = ?, montantvente = ? WHERE vente_id = ?');
		$stmt->execute([$articleid, $unite, $quantite, $datevente, $refvente, $client, $prixvente, $prixttc, $_GET['id']]);
		// Output message
		$msg = 'Vente '.$refvente. ' éffectuée avec succès !';
		header('Location: mouvement-stocks.php');
	}

	$stmt = $pdo->prepare('SELECT article_id, vente_id, vente.prixvente AS pv, montantvente, refvente, datevente, designation, nom, nomprenomscl, unite_id, qtevendu, client_id, montantvente 
	FROM vente, clients, articles, unite
	WHERE articles.id = vente.article_id AND vente.client_id = clients.id AND articles.unite = unite.id AND vente_id = ?');
    $stmt->execute([$_GET['id']]);
    $articles = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$articles) {
        exit('Cet article n\' existe pas!');
    }
}   else {
    exit('No ID specified !');
}

$stmt1 = $pdo->prepare('SELECT * FROM clients');
$stmt1->execute();
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Modifier une vente article</title>

		<!-- Site favicon --> 
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="vendors/images/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="vendors/images/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="vendors/images/favicon-16x16.png"
		/>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
	</head>
	<body>
        <?php include('entete.php'); ?>
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Articles</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											vendre-article
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a
										class="btn btn-secondary dropdown-toggle"
										href="#"
										role="button"
										data-toggle="dropdown"
									>
										January 2018
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Export List</a>
										<a class="dropdown-item" href="#">Policies</a>
										<a class="dropdown-item" href="#">View Assets</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">#Modifier vente <?= $articles['refvente'] ?></h4>
								<p class="mb-30"></p>
							</div>
							
						</div>
						<?php if($msg): ?>
						<div
							class="alert alert-success alert-dismissible fade show"
							role="alert"
						>
							<?php echo $msg; ?>
							<button
								type="button"
								class="close"
								data-dismiss="alert"
								aria-label="Close"
							>
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php endif; ?>
						<form action="modifier-vente.php?id=<?= $articles['vente_id'] ?>" method="POST" name="myform">
							
                            <div class="row">
								<div class="col-md-6 col-sm-12">
                                <div class="form-group">
									<div class="form-group">
										<label> <strong> Produit/Article *</strong></label>
                                        
										<select
											class="custom-select2 form-control"
											name="article"
											style="width: 100%; height: 38px;"
											id = "article"
											required
												
										>
                                        <option value = "<?= $articles['article_id'] ?>" ><?= $articles['designation'] ?></option>
										
										</select>
									</div>
									</div>
								</div>
								
                                <div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label><strong>Unité de gestion</strong></label>
										<select
											class="custom-select2 form-control"
											name="unite"
											id = "unite"
											style="width: 100%; height: 38px"
											required
											
										>
										
											<option value="<?= $articles['unite_id'] ?>"><?= $articles['nom']?></option>
											
										
										</select>
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label><strong>Prix de vente</strong></label>
										<input type="number" value="<?= $articles['pv'] ?>" name="prixvente" class="form-control" />
									</div>
								</div>

                               

							</div>

							<div class="row">
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label> <strong>Quantité *</strong></label>
										<input type="number" autofocus required name="quantite" value="<?= $articles['qtevendu'] ?>" onkeyup="calculate(this.value)" class="form-control" />
									</div>
								</div>
								<!-- <div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label><strong>TVA (%)</strong></label>
										<input type="number" value="18" name="tva" required class="form-control" />
									</div>
								</div> -->
								
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label><strong>Prix TTC</strong></label>
										<input type="number" value="<?= $articles['montantvente'] ?>" name="prixttc" class="form-control" />
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label><strong>Date vente</strong></label>
										<input type="date" required value="<?= $articles['datevente'] ?>" name="datevente" class="form-control" />
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label><strong>Référence</strong></label>
										<input type="text" placeholder="VTE1" value="<?= $articles['refvente'] ?>" name="refvente" required class="form-control" />
									</div>
								</div>

								
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										
											<label> <strong> Choisir client *</strong></label>
											
											<select
												class="custom-select2 form-control"
												name="client"
												style="width: 100%; height: 38px;"
												id = "client"
												required
													
											>
											<option value="<?= $articles['client_id'] ?>"><?= $articles['nomprenomscl'] ?></option>
										
											</select>
										
									</div>
								</div>
							

							</div>
							
							
							
							<input type="submit" class="btn" data-bgcolor="#00b489"
										data-color="#ffffff" value="Modifier">
							
						</form>
					
					</div>

				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					GESTION DE STOCK EMERGER AMOUR DE DIEU
					
					
				</div>
			</div>
		</div>
		
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		!-- start jQuery function -->
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"> </script>
        <script type="text/javascript">
            function calculate() {
                if (isNaN(document.forms["myform"]["quantite"].value) || document.forms["myform"]["quantite"].value == "") {
                    var text1 = 0;
                } else {
                    var text1 = parseInt(document.forms["myform"]["quantite"].value);
                }
                if (isNaN(document.forms["myform"]["prixvente"].value) || document.forms["myform"]["prixvente"].value == "") {
                    var text2 = 0;
                } else {
                    var text2 = parseFloat(document.forms["myform"]["prixvente"].value);
                }
				
                document.forms["myform"]["prixttc"].value = (text1 * text2);
            }  
        </script>
	</body>
</html>
