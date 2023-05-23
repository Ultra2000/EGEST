<?php
	include('functions.php');
	$pdo = pdo_connect_mysql();
    $msg = '';
	session_start();

	$stmt = $pdo->prepare('SELECT nom, nomtype, quantite, reference, designation, stocksecu, prixachat, prixvente, 
	articles.id FROM `articles`, `unite`, `typearticle` 
	WHERE articles.typeart = typearticle.id AND articles.unite = unite.id AND quantite >= 0');
	$stmt->execute();
	$articles = $stmt->fetchAll(PDO::FETCH_ASSOC); 

?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Vente Client</title>

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
											<a href="index.html">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Effectuer une vente
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div>
									<a
										class="btn btn-primary"
										href="#"
										role="button"
										
									>
										January 2022
									</a>
									
								</div>
							</div>
						</div>
					</div>
					
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Choix article à vendre</h4>
						</div>
                        <?php if($msg): ?>
                            <div
                                class="alert alert-success alert-dismissible fade show"
                                role="alert"
                            >
                                <?= $msg ?>
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
							<table
								class="table hover multiple-select-row data-table-export nowrap"
							>
								<thead>
									<tr>
										<th class="table-plus datatable-nosort">N°</th>
										<th>Référence</th>
										<th>Désignation</th>
										<th>Quantité</th>
										<th>Type article</th>
									
										<th>Actions</th>
									</tr>
								</thead>
								
								<tbody>
								<?php foreach($articles as $articles):?>
									<tr>
										<td class="table-plus"><?= $articles['id'] ?></td>
										<td><?= $articles['reference'] ?></td>
										<td><?= $articles['designation'] ?></td>
										<td><?= $articles['quantite'] ?></td>
										<td><?= $articles['nomtype'] ?></td>
										<td>
										<?php if($articles['quantite']<=0): ?>
											<a
											type="button"
											class="btn"
											data-bgcolor="red"
											data-color="#ffffff"
											href="#"
										>
											Indisponible
										</a>
										<?php else: ?>

										<a
											type="button"
											class="btn"
											data-bgcolor="#00b489"
											data-color="#ffffff"
											href="vendre.php?id=<?=$articles['id']?>"
										>
											Vendre
										</a>
										<?php endif; ?>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
								
							</table>
						</div>
					</div>
					<!-- Export Datatable End -->
				</div> 
				<div class="footer-wrap pd-20 mb-20 card-box">
					G-STOCK BY <strong>FRECORP</strong>
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
