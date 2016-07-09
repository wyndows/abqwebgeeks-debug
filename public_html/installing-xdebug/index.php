<?php
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");
$highlighter = new Highlight\Highlighter();
$highlighter->setAutodetectLanguages(["php"]);

$PAGE_TITLE = "Installing XDebug";
require_once(dirname(__DIR__) . "/head-utils.php");
?>
	<body class="sfooter">
	<?php require_once(dirname(__DIR__) . "/partials/nav.php"); ?>
		<main class="container sfooter-content">
			<h1>Installing XDebug/h1>
			<p>Write this later. :D</p>
		</main>
<?php require_once(dirname(__DIR__) . "/partials/footer.php"); ?>
	</body>
</html>
