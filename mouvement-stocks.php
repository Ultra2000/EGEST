<?php
	include('functions.php');
	session_start();
	$pdo = pdo_connect_mysql();
    $msg = '';


	//Récupération des différents mouvements d'entrée
	$stmt = $pdo->prepare('SELECT designation, stock_id, datecommande, nom, prixachat, s.quantite, montantttc, 
	idarticle, stock_id FROM articles a, stock s, unite u 
	WHERE a.id = s.idarticle AND a.unite = u.id AND etat =? ORDER BY stock_id');
	$stmt->execute([0]);
	$entrees = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//Récupération des différents mouvements de sortie
	$stmt = $pdo->prepare('SELECT vente_id, qtevendu, datevente, nom, designation, nomprenomscl, article_id, client_id, v.prixvente, 
	montantvente, refvente FROM unite u, vente v, articles a, clients c WHERE a.id =  v.article_id 
	AND c.id = v.client_id AND u.id = v.unite_id AND etat =? ORDER BY vente_id ASC');
	$stmt->execute([0]);
	$ventes = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//Récupération de la liste des ventes annulées
	$stmt = $pdo->prepare('SELECT vente_id, qtevendu, datevente, nom, designation, nomprenomscl, article_id, client_id, v.prixvente, 
	montantvente, refvente FROM unite u, vente v, articles a, clients c WHERE a.id =  v.article_id 
	AND c.id = v.client_id AND u.id = v.unite_id AND etat =? ORDER BY vente_id ASC');
	$stmt->execute([1]);
	$annulees = $stmt->fetchAll(PDO::FETCH_ASSOC);

	//Impression de multiples ventes sur une même facture

	if(isset($_POST['multiple_fact'])){
		$all_id = $_POST['vente'];
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Mouvements de stocks</title>

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
								<div class="">
									<a
										class="btn btn-primary"
										href="commande.php"
										role="button"
									>
										Effectuer une entrée
									</a>
									
								</div> 
							</div>
						</div>
					</div>
					
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Différents mouvments de stocks</h4>
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
                        <div class="tab">
									<ul class="nav nav-pills" role="tablist">
										<li class="nav-item">
											<a
												class="nav-link active text-blue"
												data-toggle="tab"
												href="#home5"
												role="tab"
												aria-selected="true"
												>Mouvements d'entrées</a
											>
										</li>
										<li class="nav-item">
											<a
												class="nav-link text-blue"
												data-toggle="tab"
												href="#profile5"
												role="tab"
												aria-selected="false"
												>Mouvements de sorties</a
											>
										</li>
										<?php 
										 if(($_SESSION['type'] === 'superviseur')): 
										?>
										<li class="nav-item">
											<a
												class="nav-link text-blue"
												data-toggle="tab"
												href="#annulees"
												role="tab"
												aria-selected="false"
												>Ventes annulées</a
											>
										</li>
										<?php endif; ?>
										
										
									</ul>
									<div class="tab-content">
										<div
											class="tab-pane fade show active"
											id="home5"
											role="tabpanel"
										>
                                        <div class="pd-20">
                                            <h4 class="text-blue h4">TOUS NOS ACHATS</h4>
                                        </div>
                                        <div class="pb-20">
                                            <table class="table hover multiple-select-row data-table-export nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            N°
                                                        </th>
                                                        <th>Désignation</th>
                                                        <th>Unité</th>
                                                        <th>Quantité</th>
                                                        <th>Montant TTC</th>
                                                        <th>Date Commande</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($entrees as $entrees):?>
                                                    <tr>
                                                    <td class="table-plus"><?= $entrees['stock_id'] ?></td>
                                                    <td><?= $entrees['designation'] ?></td>
                                                    <td><?= $entrees['nom'] ?></td>
                                                    <td><?= $entrees['quantite'] ?></td>
                                                    <td><?= number_format($entrees['montantttc'], 0, ",", " ") ?> XOF</td>
                                                    <td><?= $entrees['datecommande'] ?></td>
                                                    <td>
														<div class="table-actions">
															<!-- <a href="modifier-achat.php?id=<?=$entrees['stock_id']?>" data-color="#265ed7"
																><i class="icon-copy dw dw-edit2"></i
															></a> -->
															<a href="supprimer-achat.php?id=<?=$entrees['stock_id']?>&idarticle=<?=$entrees['idarticle']?>&quantite=<?=$entrees['quantite']?>" data-color="#e95959"
																><i class="icon-copy dw dw-delete-3"></i
															></a>
															<!-- <a href="imprimer-facture.php" data-color="black"
																	><i class="icon-copy ti-printer"></i
															></a> -->
														</div>
													</td>
                                                </tr> 
                                                <?php endforeach; ?>
                                                    
                                                </tbody>
                                            </table>
                                        
                                        </div>
										<!-- <div style="text-align:center">
										<a
											type="button"
											class="btn"
											data-bgcolor="#00b489"
											data-color="#ffffff"
											href="#"
										>
											<i class="bi bi-printer"></i> Imprimer liste des entrées
											</a>
										</div> -->
										</div>


										<div class="tab-pane fade" id="profile5" role="tabpanel">
											<div class="pd-20">
												<h4 class="text-blue h4">TOUTES NOS VENTES</h4>
											</div>
											<div class="pb-20">
												<form action="mouvement-stocks.php" method="post">
												<table class="table hover multiple-select-row data-table-export nowrap">
													<thead>
														<tr>
															<th>
																N°
															</th>
															<th>Désignation</th>
															<th>Unité</th>
															<th>Quantité</th>
															<th>Prix Vente</th>
															<th>Montant TTC</th>
															<th>Client</th>
															<th>Date Commande</th>
															<th>Actions</th>
														</tr>
													</thead>
													<tbody>
													<?php foreach($ventes as $ventes): ?>
														<tr>
														
														<td class="table-plus"> <?=$ventes['vente_id']?> </td>
														<td><?=$ventes['designation']?></td>
														<td><?=$ventes['nom']?></td>
														<td><?=$ventes['qtevendu']?></td>
														<td><?=number_format($ventes['prixvente'], 0, ",", " ")?> XOF</td>
														<td><?=number_format($ventes['montantvente'], 0, ",", " ")?> XOF</td>
														<td><?=$ventes['nomprenomscl']?></td>
														<td><?=$ventes['datevente']?></td>
														<td>
															<div class="table-actions">
																<!-- <a href="modifier-vente.php?id=" data-color="#265ed7"
																	><i class="icon-copy dw dw-edit2"></i
																></a> -->
																<a href="supprimer-vente.php?id=<?=$ventes['vente_id']?>&article_id=<?=$ventes['article_id']?>&qtevendu=<?=$ventes['qtevendu']?>" data-color="#e95959"
																	><i class="icon-copy dw dw-delete-3"></i
																></a>
																
																<a target="_blank" href="imprimer-facture.php?id=<?=$ventes['vente_id']?>" data-color="#00b489"
																	><i class="icon-copy ti-printer"></i
																></a>
															</div>
														</td>
													</tr>
													
												<?php endforeach; ?>
													</tbody>
												</table>
												<div style="text-align:center">
													<button
													type="submit"
													name="multiple_fact"
													class="btn"
													data-bgcolor="#00b489"
													data-color="#ffffff"
													
													>
														<i class="bi bi-printer"></i> Imprimer facture
													</button>
												</div>
												</form>
											</div>
											
										</div>

										<div class="tab-pane fade" id="annulees" role="tabpanel">
											<div class="pd-20">
												<h4 class="text-blue h4">TOUTES LES VENTES ANNULEES</h4>
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
																		value="2"
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
															<th>Client</th>
															<th>Date Commande</th>
														</tr>
													</thead>
													<tbody>
													<?php foreach($annulees as $annulees): ?>
														<tr>
														
														<td> <input type="checkbox" name="vente[]" value="<?=$ventes['vente_id']?>" class="table-plus" id=""> </td>
														<td><?=$annulees['designation']?></td>
														<td><?=$annulees['nom']?></td>
														<td><?=$annulees['qtevendu']?></td>
														<td><?=number_format($annulees['prixvente'], 0, ",", " ")?> XOF</td>
														<td><?=number_format($annulees['montantvente'], 0, ",", " ")?> XOF</td>
														<td><?=$annulees['nomprenomscl']?></td>
														<td><?=$annulees['datevente']?></td>
														<!-- <td>
															<div class="table-actions">
																<a href="modifier-vente.php?id=" data-color="#265ed7"
																	><i class="icon-copy dw dw-edit2"></i
																></a> -->
																<!-- <a href="supprimer-vente.php?id=" data-color="#e95959"
																	><i class="icon-copy dw dw-delete-3"></i
																></a>
																
																
															</div>
														</td> -->
													</tr>
													
												<?php endforeach; ?>
													</tbody>
												</table>
												<div style="text-align:center">
												<!-- <input type="submit" name="submit" class="btn" data-bgcolor="#00b489" data-color="#ffffff"  value="Imprimer"> -->
												</div>
												</form>
											</div>
											<!-- <div style="text-align:center">
											
											<a
												type="button"
												class="btn"
												data-bgcolor="#00b489"
												data-color="#ffffff"
												href="#"
											>
												<i class="bi bi-printer"></i> Imprimmer facture
												</a>
											</div> -->
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

		<script>
			function annuleVente(vente_id, article_id, qtevendu) {
				if (confirm["Voulez vous vraiment annuler cette vente ?"]){
					window.location.href = "annulevente.php?vente_id="+vente_id+"&article_id="+article_id+"&qtevendu="+qtevendu
				}
			}
		</script>
		
	</body>
</html>
