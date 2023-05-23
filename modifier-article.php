<?php 
	include('functions.php');
	$pdo = pdo_connect_mysql();
	$msg = '';
	session_start();
    if (isset($_GET['id'])) {
	if (!empty($_POST)) {
		// Post data not empty insert a new record
		// Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
		// Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
		$id = isset($_POST['id']) ? $_POST['id'] : '';
		$reference = isset($_POST['reference']) ? $_POST['reference'] : '';
		$designation = isset($_POST['designation']) ? $_POST['designation'] : '';
		$typearticle = isset($_POST['typearticle']) ? $_POST['typearticle'] : '';
		$securite = isset($_POST['securite']) ? $_POST['securite'] : '';
		$typeunite = isset($_POST['typeunite']) ? $_POST['typeunite'] : '';
		$prixachat = isset($_POST['prixachat']) ? $_POST['prixachat'] : '';
		$prixvente = isset($_POST['prixvente']) ? $_POST['prixvente'] : '';
		 
		// Insert new record into the contacts table
		$stmt = $pdo->prepare('UPDATE articles SET reference = ?, designation = ?, typeart = ?, stocksecu = ?, unite = ?, prixachat = ?, prixvente = ? WHERE id = ?');
		$stmt->execute([$reference, $designation, $typearticle, $securite, $typeunite, $prixachat, $prixvente, $_GET['id']]);
		// Output message
		$msg = 'Article '.$designation. ' modifié avec succès !';
        // header('Location: liste-articles.php');
	}
    $stmt = $pdo->prepare('SELECT nom, nomtype, reference, typeart, unite, designation, stocksecu, prixachat, prixvente, articles.id FROM `articles`, `unite`, `typearticle` WHERE articles.typeart = typearticle.id AND articles.unite = unite.id AND articles.id = ?');
    $stmt->execute([$_GET['id']]);
    $articles = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$articles) {
        exit('Cet article n\' existe pas!');
    }
}   else {
    exit('No ID specified !');
}

$stmt = $pdo->prepare('SELECT * FROM unite');
$stmt->execute();
$unite = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare('SELECT * FROM typearticle');
$stmt->execute();
$typearticle = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Modifier article ♠</title>

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
											Modifier un article
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
								<p class="mb-30">Modifier article #<?= $articles['designation'] ?></p>
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

						<form action="modifier-article.php?id=<?= $articles['id'] ?>" method="POST">
							
							<div class="row">
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Référence</label>
										<input type="text" value="<?= $articles['reference'] ?>" name="reference" class="form-control" />
									</div>
								</div>
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Désignation *</label>
										<input type="text" value="<?= $articles['designation'] ?>" name="designation" required class="form-control" />
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
											
											<option value="<?= $articles['typeart'] ?>"><?= $articles['nomtype'] ?></option>
                                            <?php foreach($typearticle as $typearticle):?>
												<option value="<?= $typearticle['id'] ?>"><?= $typearticle['nomtype'] ?></option>
											<?php endforeach; ?>
										
										</select>
									</div>
									</div>
								</div>
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Stock de sécurité *</label>
										<input type="number" value="<?= $articles['stocksecu'] ?>" required name="securite" class="form-control" />
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
                                            <option value="<?= $articles['unite'] ?>"><?= $articles['nom'] ?></option>
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
										<input type="number" value="<?= $articles['prixachat'] ?>" required name="prixachat" class="form-control" />
									</div>
								</div>

								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Prix de vente *</label>
										<input type="number" value="<?= $articles['prixvente'] ?>" required name="prixvente" class="form-control" />
									</div>
								</div>

							</div>
							
							
							<input type="submit" class="btn" data-bgcolor="#3b5998"
										data-color="#ffffff" value="Enregistrer">
							
						</form>
					
					</div>

				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					DeskApp - Bootstrap 4 Admin Template By
					<a href="https://github.com/dropways" target="_blank"
						>Ankit Hingarajiya</a
					>
				</div>
			</div>
		</div>
		<!-- welcome modal start -->
		<div class="welcome-modal">
			<button class="welcome-modal-close">
				<i class="bi bi-x-lg"></i>
			</button>
			<iframe
				class="w-100 border-0"
				src="https://embed.lottiefiles.com/animation/31548"
			></iframe>
			<div class="text-center">
				<h3 class="h5 weight-500 text-center mb-2">
					Open source
					<span role="img" aria-label="gratitude">❤️</span>
				</h3>
				<div class="pb-2">
					<a
						class="github-button"
						href="https://github.com/dropways/deskapp"
						data-color-scheme="no-preference: dark; light: light; dark: light;"
						data-icon="octicon-star"
						data-size="large"
						data-show-count="true"
						aria-label="Star dropways/deskapp dashboard on GitHub"
						>Star</a
					>
					<a
						class="github-button"
						href="https://github.com/dropways/deskapp/fork"
						data-color-scheme="no-preference: dark; light: light; dark: light;"
						data-icon="octicon-repo-forked"
						data-size="large"
						data-show-count="true"
						aria-label="Fork dropways/deskapp dashboard on GitHub"
						>Fork</a
					>
				</div>
			</div>
			<div class="text-center mb-1">
				<div>
					<a
						href="https://github.com/dropways/deskapp"
						target="_blank"
						class="btn btn-light btn-block btn-sm"
					>
						<span class="text-danger weight-600">STAR US</span>
						<span class="weight-600">ON GITHUB</span>
						<i class="fa fa-github"></i>
					</a>
				</div>
				<script
					async
					defer="defer"
					src="https://buttons.github.io/buttons.js"
				></script>
			</div>
			<a
				href="https://github.com/dropways/deskapp"
				target="_blank"
				class="btn btn-success btn-sm mb-0 mb-md-3 w-100"
			>
				DOWNLOAD
				<i class="fa fa-download"></i>
			</a>
			<p class="font-14 text-center mb-1 d-none d-md-block">
				Available in the following technologies:
			</p>
			<div class="d-none d-md-flex justify-content-center h1 mb-0 text-danger">
				<i class="fa fa-html5"></i>
			</div>
		</div>
		<button class="welcome-modal-btn">
			<i class="fa fa-download"></i> Download
		</button>
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
