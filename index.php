<?php
	session_start();
	include('functions.php');
	
	
	$pdo = pdo_connect_mysql();
    $msg = '';

	$stmt = $pdo->prepare('SELECT stock_id, articles.designation, stocksecu, articles.quantite, nom, vente.prixvente, 
	(vente.prixvente * articles.quantite) AS mttc
	FROM stock, vente, articles, unite WHERE stock.idarticle = vente.article_id AND articles.id = stock.idarticle 
	AND articles.id = vente.article_id AND articles.quantite <= stocksecu AND articles.unite = unite.id
	GROUP BY idarticle');
	$stmt->execute();
	$alerte = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$total = $pdo->query('SELECT * FROM articles')->rowCount();
	$nbrevente = $pdo->query('SELECT * FROM vente')->rowCount();
	$cl = $pdo->query('SELECT * FROM clients')->rowCount();

	$date = date('Y-m-d');
	$stmt = $pdo->prepare('SELECT SUM(montantvente), datevente FROM vente v WHERE datevente =?  AND etat =?');
	$stmt->execute([$date, 0]);
	$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>


<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>G-STOCK BY FRECORP</title>

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
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/datatables/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/datatables/css/responsive.bootstrap4.min.css"
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
			<div class="xs-pd-20-10 pd-ltr-20">
				<!-- <div class="title pb-20">
					<h2 class="h3 mb-0"></h2>
				</div> -->

				<div class="row pb-10">
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark"><?= $total; ?></div>
									<div class="font-14 text-secondary weight-500">
										Nombre d'articles
									</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#00eccf">
										<i class="icon-copy dw dw-calendar1"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark"><?= $nbrevente; ?></div>
									<div class="font-14 text-secondary weight-500">
										Nombre de ventes
									</div>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#ff5b5b">
										<span class="icon-copy ti-bag"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
									<div class="weight-700 font-24 text-dark"><?= $cl ?></div>
									<div class="font-14 text-secondary weight-500">
										Nombre de clients
									</div>
								</div>
								<div class="widget-icon">
									<div class="icon">
										<i
											class="micon bi bi-person"
											aria-hidden="true"
										></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<div class="card-box height-100-p widget-style3">
							<div class="d-flex flex-wrap">
								<div class="widget-data">
								<?php foreach($articles as $articles):?>
									<div class="weight-700 font-24 text-dark">
									<td><?= number_format($articles['SUM(montantvente)'], 0, ",", " ")?> XOF</td>										
									</div>
									<div class="font-14 text-secondary weight-500">Vente Journée</div>
									<?php endforeach; ?>
								</div>
								<div class="widget-icon">
									<div class="icon" data-color="#09cc06">
										<i class="icon-copy fa fa-money" aria-hidden="true"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				

				<div class="row">
					
					
				</div>

				<div class="card-box pb-10">
					<div class="h5 pd-20 mb-0">ARTICLE AYANT UN STOCK FAIBLE</div>
					<table class="data-table table nowrap">
						<thead>
							<tr>
								<th class="table-plus">Désignation</th>
								<th>Type Article</th>
								<th>Stock sécurité</th>
								<th>Quantité restante</th>
								<!-- <th class="datatable-nosort">Actions</th> -->
							</tr>
						</thead>
						<tbody>
							<?php foreach($alerte as $alertes): ?>
							<tr>
								<td class="table-plus">
									
										<div class="txt">
											<div class="weight-600"><?= $alertes['designation'] ?></div>
										</div>
								</td>
								<td><?= $alertes['nom'] ?></td>
								<td><?= $alertes['stocksecu'] ?></td>
								<td>
									<span
										
										><?= $alertes['quantite'] ?></span
									>
								</td>
								<!-- <td>
									<div class="table-actions">
										<a href="#" data-color="#265ed7"
											><i class="icon-copy dw dw-edit2"></i
										></a>
										<a href="#" data-color="#e95959"
											><i class="icon-copy dw dw-delete-3"></i
										></a>
									</div>
								</td> -->
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<div class="title pb-20 pt-20">
				</div>

				

				<div class="footer-wrap pd-20 mb-20 card-box">
					G-STOCK BY FRECORP
				</div>
			</div>
		</div>
		
		
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
		<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<script src="vendors/scripts/dashboard3.js"></script>
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
