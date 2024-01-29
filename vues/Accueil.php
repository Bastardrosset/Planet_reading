<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Desktop Browser Market Share in 2016"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
		dataPoints: <?php echo json_encode(Livre::livreParGenre(), JSON_NUMERIC_CHECK) ?>
	}]
});
chart.render();

}
</script>

<body>

<main>
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Bienvenue !</h1>
                <p class="col-md-8 fs-4">Bienvenue sur le site d'administration BiblioWeb.</p>
                <button class="btn btn-primary btn-lg" type="button">Learn more&raquo;</button>
            </div>
    </div>
    <div class="container">
        <div class="row align-items-md-stretch">
            <div class="col-md-8" style="height: 600px">
                <div class="p-5 bg-light border rounded-3">
                    <h2>Statistiques des livres</h2>
                    <div id="chartContainer">
                        
                    </div>
                    <button class="btn btn-outline-success" type="button">Example button</button>
                </div>
            </div>
            <div class="col-md-4" style="height: 600px">
                <div class="p-5 bg-light border rounded-3">
                    <h2>Statistiques générales</h2>
                    <div class="mt-3">
                        <h4>
                            <a class="text-decoration-none" href="index.php?uc=livres&action=list">
                                <span class="badge bg-success"><?php echo Livre::nombreLivres(); ?></span>
                                livres
                            </a>
                        </h4>
                        <hr/>
                        <h4>
                            <a class="text-decoration-none" href="index.php?uc=auteurs&action=list">
                                <span class="badge bg-success"><?php echo Auteur::nombreAuteurs(); ?></span>
                                auteurs
                            </a>
                        </h4>
                        <hr/>
                        <h4>
                            <a class="text-decoration-none" href="index.php?uc=genres&action=list">
                                <span class="badge bg-success"><?php echo Genre::nombreGenres(); ?></span>
                                genres
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>