<?php 
	include('functions.php');
	$pdo = pdo_connect_mysql();
	$msg = '';
	if(isset($_GET['id'])){

	$stmt = $pdo->prepare('SELECT article_id, ville, quartier, tel, vente_id, vente.prixvente AS pv, montantvente, refvente, datevente, designation, nom, nomprenomscl, unite_id, qtevendu, client_id, montantvente 
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


?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Impression Facture</title>

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
		

		<div class="main-container">
			<div class="pd-ltr-15 xs-pd-20-10">
				<div class="min-height-200px">
					
					<div class="invoice-wrap">
						<div class="invoice-box">
							<div class="invoice-header">
								<div class="logo text-center">
									<img src="vendors/images/deskapp-logo.png" alt="" />
								</div>
							</div>
							<h4 class="text-center mb-30 weight-600">FACTURE D'ACHAT</h4>
							<div class="row pb-30">
								<div class="col-md-6">
									<h5 class="mb-15">Nom et prénoms client</h5>
									<p class="font-14 mb-5">
										Date d'achat: <strong class="weight-600"><?= $articles['datevente'] ?></strong>
									</p>
									<p class="font-14 mb-5">
										Facture d'achat n°: <strong class="weight-600"><?= $articles['vente_id'] ?></strong>
									</p>
								</div>
								<div class="col-md-6">
									<div class="text-right">
										<p class="font-14 mb-5"><?= $articles['nomprenomscl'] ?></p>
										<p class="font-14 mb-5"><?= $articles['ville'] ?></p>
										<p class="font-14 mb-5"><?= $articles['quartier'] ?></p>
										<p class="font-14 mb-5"><?= $articles['tel'] ?></p>
									</div>
								</div>
							</div>
							<div class="invoice-desc pb-30">
								<div class="invoice-desc-head clearfix">
									<div class="invoice-sub">Désignation</div>
									<div class="invoice-rate">Quantité</div>
									<div class="invoice-hours">Prix de vente</div>
									<div class="invoice-subtotal">Total Achat</div>
								</div>
								<div class="invoice-desc-body">
									<ul>
										<li class="clearfix">
											<div class="invoice-sub"><?= $articles['designation'] ?></div>
											<div class="invoice-rate"><?= $articles['qtevendu'] ?></div>
											<div class="invoice-hours"><?= $articles['pv'] ?></div>
											<div class="invoice-subtotal">
												<span class="weight-600"><?= $articles['montantvente'] ?></span>
											</div>
										</li>
									</ul>
								</div>
								<div class="invoice-desc-footer" style="margin-top: -20%;">
									<div class="invoice-desc-head clearfix">
										<div class="invoice-sub">Boutique Info</div>
										<div class="invoice-rate">Editéé le</div>
										<div class="invoice-subtotal">Total ACHAT</div>
									</div>
									<div class="invoice-desc-body">
										<ul>
											<li class="clearfix">
												<div class="invoice-sub">
													<p class="font-14 mb-5">
														Account No:
														<strong class="weight-600">123 456 789</strong>
													</p>
													<p class="font-14 mb-5">
														Code: <strong class="weight-600">4556</strong>
													</p>
												</div>
												<div class="invoice-rate font-20 weight-600">
                                                <?= $articles['datevente'] ?>
												</div>
												<div class="invoice-subtotal">
													<span class="weight-600 font-24 text-danger"
														><?= $articles['montantvente'] ?> XOF</span
													>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<h4 class="text-center pb-20"> <em> MERCI POUR LA CONFIANCE ! </em></h4>
						</div>
					</div>
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
