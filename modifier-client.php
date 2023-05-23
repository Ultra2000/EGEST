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
		$npcli = isset($_POST['nomprenomscli']) ? $_POST['nomprenomscli'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$code = isset($_POST['codecli']) ? $_POST['codecli'] : '';
		$num = isset($_POST['numcli']) ? $_POST['numcli'] : '';
		$ville = isset($_POST['villecli']) ? $_POST['villecli'] : '';
		$quartier = isset($_POST['quartiercli']) ? $_POST['quartiercli'] : '';
		 
		// Insert new record into the contacts table
		$stmt = $pdo->prepare('UPDATE clients SET codeclient = ?, nomprenomscl = ?, tel = ?, email = ?, ville = ?, quartier = ? WHERE id = ?');
		$stmt->execute([$code, $npcli, $num, $email, $ville, $quartier, $_GET['id']]);
		// Output message
		$msg = 'Client '.$np. ' modifié avec succès !';
	}
	$stmt = $pdo->prepare('SELECT * FROM clients WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $clients = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$clients) {
        exit('Cet client n\' existe pas!');
    }
} else {
    exit('No ID specified !');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Modifier Clients</title>

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
									<h4>Clients</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Modifier Clients
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
								<h4 class="text-blue h4">Client</h4>
								<p class="mb-30">Modifier les informations du client <strong>#<?= $clients['nomprenomscl'] ?></strong></p>
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
						<form action="modifier-client.php?id=<?= $clients['id'] ?>" method="POST">
							<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label>Nom et Prénoms</label>
									<input type="text" value="<?= $clients['nomprenomscl'] ?>" name="nomprenomscli" required class="form-control" />
								</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="form-group">
										<label>Email</label>
										<input type="email" value="<?= $clients['email'] ?>" name="email" required class="form-control" />
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Code client</label>
										<input type="text" name="codecli" value="<?= $clients['codeclient'] ?>" required class="form-control" />
									</div>
								</div>
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Téléphone (WhatsApp)*</label>
										<input type="number" value="<?= $clients['tel'] ?>" name="numcli" required class="form-control" />
									</div>
								</div>
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Ville</label>
										<input type="text" name="villecli" value="<?= $clients['ville'] ?>" required class="form-control" />
									</div>
								</div>
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label>Quartier</label>
										<input type="text" name="quartiercli" value="<?= $clients['quartier'] ?>" required class="form-control" />
									</div>
								</div>	
							</div>
							
							<input type="submit" class="btn" data-bgcolor="#3b5998"
										data-color="#ffffff" value="Modifier">
							
						</form>
					
					</div>

				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					E-Gest Application de gestion de stocks
					<a href="https://github.com/dropways" target="_blank"
						>FRECORP</a
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
 