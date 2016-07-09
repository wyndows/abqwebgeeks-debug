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
			<div ng-controller="DifferenceController">
				<hr />
				<h3>Want a hint?</h3>
				<p><button class="btn btn-info" ng-click="toggleHint();"><i class="fa fa-question-circle" aria-hidden="true"></i> Show Hint</button></p>
				<p uib-collapse="hintCollapsed"><em>Hint:</em> Select all on both functions.</p>
				<h3>OK, give me the answer!</h3>
				<p><button class="btn btn-info" ng-click="toggleAnswer();"><i class="fa fa-check" aria-hidden="true"></i> Show Answer</button></p>
				<p uib-collapse="answerCollapsed"><em>Answer:</em> The blank line on the second function contains ASCII character <code>\x0F</code> (shift in). This is an invisible character so arcane that the JavaScript parser doesn't filter it out with the other more common invisible characters such as tabs and newlines. In JavaScript, this will result in a SyntaxError until the invisible character is eliminated. Even venerable text editors such as Atom cannot display this invisible character.</p>
			</div>
		</main>
<?php require_once(dirname(__DIR__) . "/partials/footer.php"); ?>
	</body>
</html>
