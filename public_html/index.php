<?php
$PAGE_TITLE = "Debugging de Deep Dive Dylan";
require_once("head-utils.php");
?>
	<body class="sfooter">
		<?php require_once("partials/nav.php"); ?>
		<main class="container sfooter-content">
			<h1>
				<span class="fa-stack">
					<i class="fa fa-bug fa-stack-1x"></i>
					<i class="fa fa-ban fa-stack-2x text-danger"></i>
				</span>
				Debugging de Deep Dive Dylan
			</h1>
			<p>Welcome to this morning's talk. All resources are freely available under the terms of the Apache License 2.0.</p>
			<p>All code for the site and all examples are available on GitHub <i class="fa fa-github" aria-hidden="true"></i> at <a href="https://github.com/dylan-mcdonald/abqwebgeeks-debug">https://github.com/dylan-mcdonald/abqwebgeeks-debug</a>.</p>
			<p>The deployment server is a virtual machine on my personal laptop. The hostname for the virtual machine is http://<?php echo $_SERVER["SERVER_NAME"]; ?>/. The virtual machine is available via flash drive upon request.</p>
			<h2>Sponsor</h2>
			<p>Lastly, special thanks to our sponsor, Robert Half Technology for making this talk possible. <i class="fa fa-smile-o" aria-hidden="true"></i></p>
		</main>
		<?php require_once("partials/footer.php"); ?>
	</body>
</html>
