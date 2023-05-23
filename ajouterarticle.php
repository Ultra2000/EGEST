<?php 
	include('functions.php');
	$pdo = pdo_connect_mysql();
	$msg = '';
	session_start();
	if (!empty($_POST)) {
		// Post data not empty insert a new record
		// Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
		$id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
		// Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
		$reference = isset($_POST['reference']) ? $_POST['reference'] : '';
		$designation = isset($_POST['designation']) ? $_POST['designation'] : '';
		$typearticle = isset($_POST['typearticle']) ? $_POST['typearticle'] : '';
		$securite = isset($_POST['securite']) ? $_POST['securite'] : '';
		$typeunite = isset($_POST['typeunite']) ? $_POST['typeunite'] : '';
		$prixachat = isset($_POST['prixachat']) ? $_POST['prixachat'] : '';
		$prixvente = isset($_POST['prixvente']) ? $_POST['prixvente'] : '';
		$qte = isset($_POST['qte']) ? $_POST['qte'] : '';
		 
		// Insert new record into the contacts table
	
		$stmt = $pdo->prepare('INSERT INTO articles VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
		$stmt->execute([$id,  $reference, $designation, $qte, $typearticle, $securite, $typeunite, $prixachat, $prixvente]);
		// Output message
		$msg = 'article '.$designation. ' créée avec succès !';
		// header('Location: liste-articles.php');
	}


	$stmt = $pdo->prepare('SELECT * FROM unite');
	$stmt->execute();
	$unite = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$stmt1 = $pdo->prepare('SELECT MAX(id) AS dern FROM articles');
	$stmt1->execute();
	$ref = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$stmt = $pdo->prepare('SELECT * FROM typearticle');
	$stmt->execute();
	$typeart = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

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
											Ajouter des articles
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
								<h4 class="text-blue h4">Article</h4>
								<p class="mb-30">Ajout d'un nouvel article dans la base de données</p>
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


						<form action="ajouterarticle.php" method="POST">
							
							<div class="row">
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Référence</label>
										<input type="text" name="reference" class="form-control" />
									</div>
								</div>
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Désignation *</label>
										<input type="text" name="designation" required class="form-control" />
									</div>
								</div>
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
									<div class="form-group">
										<label>Type d'article *</label>
										<select
											class="custom-select2 form-control"
											name="typearticle"
											style="width: 100%; height: 38px"
											required
										>
										<?php foreach($typeart as $typeart):?>	
											<option value="<?= $typeart['id'] ?>"><?= $typeart['nomtype'] ?></option>
										<?php endforeach; ?>
										</select>
									</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Stock de sécurité *</label>
										<input type="number" required name="securite" class="form-control" />
									</div>
								</div>	
								
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
									<div class="form-group">
											<label>Type Unité *</label>
											<select
												required
												class="custom-select2 form-control"
												name="typeunite"
												style="width: 100%; height: 38px"
											>	
											<?php foreach($unite as $unite):?>
												<option value="<?= $unite['id'] ?>"><?= $unite['nom'] ?></option>
											<?php endforeach; ?>
											</select>
									</div>
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Prix d'achat *</label>
										<input type="number" required name="prixachat" class="form-control" />
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Prix de vente *</label>
										<input type="number" required name="prixvente" class="form-control" />
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Quantité *</label>
										<input type="number" required name="qte" class="form-control" />
									</div>
								</div>

							</div>
							
							
							<input type="submit" class="btn" data-bgcolor="#3b5998"
										data-color="#ffffff" value="Enregistrer">
							
						</form>
					
					</div>

				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					G-STOCK BY FRECORP
				</div>
			</div>
		</div>
		<!-- welcome modal start -->
		
		<!-- welcome modal end -->
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
	</body>
</html>
