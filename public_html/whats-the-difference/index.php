<?php
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");
$highlighter = new Highlight\Highlighter();
$highlighter->setAutodetectLanguages(["javascript"]);

$PAGE_TITLE = "What's the difference?";
require_once(dirname(__DIR__) . "/head-utils.php");
?>
	<body class="sfooter">
	<?php require_once(dirname(__DIR__) . "/partials/nav.php"); ?>
		<main class="container sfooter-content">
			<h1>What's the Difference?</h1>
			<p>What is the difference between these two functions?</p>
			<div class="row">
				<div class="col-md-6">
					<?php
						$highlighted = $highlighter->highlightAuto(file_get_contents("roll-dice.js"));
						$output = "<pre class=\"hljs " . $highlighted->language . "\">" . $highlighted->value . "</pre>";
						echo $output;
					?>
				</div>
				<div class="col-md-6">
					<?php
						$highlighted = $highlighter->highlightAuto(file_get_contents("roll-dice-error.js"));
						$output = "<pre class=\"hljs " . $highlighted->language . "\">" . $highlighted->value . "</pre>";
						echo $output;
					?>
				</div>
			</div>
		</main>
<?php require_once(dirname(__DIR__) . "/partials/footer.php"); ?>
	</body>
</html>
