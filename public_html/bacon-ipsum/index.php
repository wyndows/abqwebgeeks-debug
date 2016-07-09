<?php
$PAGE_TITLE = "Installing XDebug";
require_once(dirname(__DIR__) . "/head-utils.php");
?>
	<body class="sfooter">
	<?php require_once(dirname(__DIR__) . "/partials/nav.php"); ?>
		<main class="container sfooter-content" ng-controller="BaconController">
			<h1><img class="inlineLogo" src="/images/angular.svg" alt=""> Bacon Ipsum</h1>
			<blockquote>
				<p>Software testing is a sport like hunting, it's bughunting.</p>
				<footer>Amit Kalantri</footer>
			</blockquote>
			<p>This Angular example isn't reacting to the user's selections. Can you figure out why?</p>
			<form class="form-horizontal well" ng-submit="getData(filler, paragraphs);">
				<h2>Customize Bacon Ipsum</h2>
				<hr />
				<div class="form-group">
					Filler?
					<label class="radio-inline">
						<input type="radio" name="filler" ng-model="filler" ng-value="false" ng-change="getData(filler, paragraphs);"> Yes
					</label>
					<label class="radio-inline">
						<input type="radio" name="filler" ng-model="filler" ng-value="false" ng-change="getData(filler, paragraphs);"> No
					</label>
				</div>
				<div class="form-group">
					<label for="paragraphs">Number of Paragraphs</label>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-hashtag" aria-hidden="true"></i>
						</div>
						<input class="form-control" type="number" name="paragraphs" min="1" max="8" step="1" ng-change="getData(filler, paragraphs);" ng-model="paragraphs" ng-required="true" />
					</div>
				</div>
				<button type="submit" class="btn btn-info btn-lg"><i class="fa fa-cutlery"></i> Get Bacon</button>
				<button type="reset" class="btn btn-warning btn-lg"><i class="fa fa-ban"></i> Cancel</button>
			</form>
			<p ng-repeat="bacon in baconData">{{ bacon }}</p>
		</main>
<?php require_once(dirname(__DIR__) . "/partials/footer.php"); ?>
	</body>
</html>
