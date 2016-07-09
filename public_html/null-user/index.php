<?php
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");
$highlighter = new Highlight\Highlighter();
$highlighter->setAutodetectLanguages(["php"]);
$classUrl = "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . "/user.php";

$PAGE_TITLE = "Installing Batarang";
require_once(dirname(__DIR__) . "/head-utils.php");
?>
	<body class="sfooter">
	<?php require_once(dirname(__DIR__) . "/partials/nav.php"); ?>
		<main class="container sfooter-content">
			<h1><img class="inlineLogo" src="/images/php.svg" alt=""> NULL User</h1>
			<blockquote>
				<p>Object-oriented programming is an exceptionally bad idea which could only have originated in California.</p>
				<footer>Edsger Dijkstra</footer>
			</blockquote>
			<p>This user class is constructing a user with all its state variables as NULL Can you figure out why? Point your XDebug session to <em><?php echo $classUrl; ?></em> and have a look. Here is the full source code:</p>
			<p>
				<?php
					$highlighted = $highlighter->highlightAuto(file_get_contents("user.php"));
					$output = "<pre class=\"hljs " . $highlighted->language . "\">" . $highlighted->value . "</pre>";
					echo $output;
				?>
			</p>
		</main>
<?php require_once(dirname(__DIR__) . "/partials/footer.php"); ?>
	</body>
</html>
