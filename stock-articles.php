<?php
	session_start();
	include('functions.php');
	$pdo = pdo_connect_mysql();
    $msg = '';
	

	$stmt = $pdo->prepare('SELECT stock_id, articles.designation, articles.quantite, nom, vente.prixvente, 
	(vente.prixvente * articles.quantite) AS mttc
	FROM stock, vente, articles, unite WHERE stock.idarticle = vente.article_id AND articles.id = stock.idarticle 
	AND articles.id = vente.article_id AND stock.quantite >0 AND articles.unite = unite.id 
	GROUP BY idarticle');
	$stmt->execute();
	$artvend = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$stmt = $pdo->prepare('SELECT designation, nom, articles.prixvente, stock.montantttc, stock.idarticle, 
	articles.quantite, vente.etat
	FROM stock 
	LEFT JOIN articles
	ON stock.idarticle = articles.id
	LEFT JOIN unite
	ON unite.id = articles.unite
	LEFT JOIN vente
	ON stock.idarticle = vente.article_id
	WHERE vente.qtevendu IS NULL
	GROUP BY idarticle');
	$stmt->execute();
	$jamaisvendu = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Stocks Articles</title>

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

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Stocks</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.html">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											mouvement-Stocks
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a
										class="btn btn-primary dropdown-toggle"
										href="#"
										role="button"
										data-toggle="dropdown"
									>
										January 2022
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
					
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">STOCKS ARTICLES</h4>
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
						<div class="pb-20">
                        <div class="tab">
									<ul class="nav nav-pills" role="tablist">
										<li class="nav-item">
											<a
												class="nav-link active text-blue"
												data-toggle="tab"
												href="#home5"
												role="tab"
												aria-selected="true"
												>STOCK ARTICLE JAMAIS VENDU</a
											>
										</li>
										<li class="nav-item">
											<a
												class="nav-link text-blue"
												data-toggle="tab"
												href="#profile5"
												role="tab"
												aria-selected="false"
												>STOCK ARTICLE UNE FOIS VENDU</a
											>
										</li>
										
									</ul>
									<div class="tab-content">
										<div
											class="tab-pane fade show active"
											id="home5"
											role="tabpanel"
										>
                                        <div class="pd-20">
                                            <h4 class="text-blue h4">ARTCICLES JAMAIS VENDU</h4>
                                        </div>
                                        <div class="pb-20">
                                            <table class="checkbox-datatable table nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <div class="dt-checkbox">
                                                                <input
                                                                    type="checkbox"
                                                                    name="select_all"
                                                                    value="1"
                                                                    id="example-select-all"
                                                                />
                                                                <span class="dt-checkbox-label"></span>
                                                            </div>
                                                        </th>
                                                        <th>Désignation</th>
														<th>Unité</th>
														<th>Quantité</th>
														<th>Prix Vente</th>
														<th>Montant TTC</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($jamaisvendu as $jamaisvendu):?>
                                                    <tr>
                                                    <td class="table-plus"></td>
                                                    <td><?= $jamaisvendu['designation'] ?></td>
                                                    <td><?= $jamaisvendu['nom'] ?></td>
                                                    <td><?= $jamaisvendu['quantite'] ?></td>
                                                    <td><?= number_format($jamaisvendu['prixvente'], 0, ",", " ") ?> XOF</td>
                                                    <td><?= number_format($jamaisvendu['montantttc'], 0, ",", " ") ?> XOF</td>
                                                    
                                                </tr>
                                                <?php endforeach; ?>
                                                    
                                                </tbody>
                                            </table>
                                        
                                        </div>
										<div style="text-align:center">
										<!-- <a
											type="button"
											class="btn"
											data-bgcolor="#00b489"
											data-color="#ffffff"
											href="#"
										>
											<i class="bi bi-printer"></i> Imprimer facture
											</a> -->
										</div>
										</div>


										<div class="tab-pane fade" id="profile5" role="tabpanel">
											<div class="pd-20">
												<h4 class="text-blue h4">ARTICLES UNE FOIS VENDU</h4>
											</div>
											<div class="pb-20">
												<table class="checkbox-datatable table nowrap">
													<thead>
														<tr>
															<th>
																<div class="dt-checkbox">
																	<input
																		type="checkbox"
																		name="select_all"
																		value="1"
																		id="example-select-all"
																	/>
																	<span class="dt-checkbox-label"></span>
																</div>
															</th>
															<th>Désignation</th>
															<th>Unité</th>
															<th>Quantité</th>
															<th>Prix Vente</th>
															<th>Montant TTC</th>
														</tr>
													</thead>
													<tbody>
													<?php foreach($artvend as $artvend): ?>
														<?php if($artvend['quantite']==0): ?>
														<tr data-bgcolor="red"
															data-color="#ffffff">
															<td class="table-plus"><?= $artvendu['stock_id'] ?></td>
															<td><?=$artvend['designation']?></td>
															<td><?=$artvend['nom']?></td>
															<td><?=$artvend['quantite']?></td>
															<td><?=$artvend['prixvente']?> XOF</td>
															<td><?=$artvend['mttc']?> XOF</td>
														</tr>

														<?php else: ?>
															<tr>
															<td class="table-plus"></td>
															<td><?=$artvend['designation']?></td>
															<td><?=$artvend['nom']?></td>
															<td><?=$artvend['quantite']?></td>
															<td><?=number_format($artvend['prixvente'], 0, ",", " ")?> XOF</td>
															<td><?=number_format($artvend['mttc'], 0, ",", " ")?> XOF</td>
														</tr>
														<?php endif; ?>
													
												<?php endforeach; ?>
													</tbody>
												</table>
											</div>
											<div style="text-align:center">
											<a
												type="button"
												class="btn"
												data-bgcolor="#00b489"
												data-color="#ffffff"
												href="#"
											>
												<i class="bi bi-printer"></i> Imprimmer
												</a>
											</div>
										</div>
										
									</div>
								</div>
						</div>
					</div>
					<!-- Export Datatable End -->
				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					APPLICATION DE GESTION DE STOCKS
					<a href="https://github.com/dropways" target="_blank"
						>FRECORP</a
					>
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
		<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<!-- buttons for Export datatable -->
		<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
		<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
		<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
		<!-- Datatable Setting js -->
		<script src="vendors/scripts/datatable-setting.js"></script>
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
