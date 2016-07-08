<?php

function factorial(int $x) {
	if($x === 0 || $x === 1) {
		return(1);
	} else {
		return($x * factorial($x - 1));
	}
}

$PAGE_TITLE = "Factorial Using Recursion";
require_once(dirname(__DIR__) . "/head-utils.php");
?>
	<body class="sfooter">
	<?php require_once(dirname(__DIR__) . "/partials/nav.php"); ?>
		<main class="container sfooter-content">
			<div ng-controller="FactorialController">
				<h1>Factorial Using Recursion</h1>
				<form class="form-horizontal well" ng-submit="getAnswer(factorialInput);">
					<h2>Test Factorial Function</h2>
					<div class="form-group">
						<label for="factorialInput">Input</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-hashtag" aria-hidden="true"></i>
							</div>
							<input class="form-control" type="number" name="factorialInput" min="0" step="1" ng-change="getAnswer(factorialInput);" ng-model="factorialInput" ng-required="true" />
						</div>
					</div>
					<button type="submit" class="btn btn-info btn-lg"><i class="fa fa-calculator"></i> Calculate</button>
					<button type="reset" class="btn btn-warning btn-lg"><i class="fa fa-ban"></i> Cancel</button>
				</form>
				<h3>{{ factorialInput }}! = {{ answer}}</h3>
			</div>
			<hr />
			<h2>Setting Up the Debugger in Atom</h2>
			<p>The purpose of this simple example is to get started with the debugger in Atom. First, the debugger will need to be installed. To install it:</p>
			<ol>
				<li>Install the <a href="https://atom.io/packages/php-debug">php-debug</a> plugin by going to Atom's preferences a selecting <em>Packages</em>.</li>
				<li>Type <em>php-debug</em> in the package filter and press <em>Install</em> to install the package.</li>
			</ol>
			<p>After installation, the debugger will need to be configured for the project. To configure it, you will need to pieces of information:</p>
			<ul>
				<li><em>Local Path:</em> the local path of the project. In this case, it should be the root of the repository you cloned or forked. This will vary from system to system, but typically takes the form of <samp>/Users/debugger/Desktop/git/abqwebgeeks-debug</samp> (<i class="fa fa-apple" aria-hidden="true"></i> Mac OS X) or <samp>c:\Users\debugger\Deskop\git\abqwebgeeks-debug</samp> (<i class="fa fa-windows" aria-hidden="true"></i> Windows)</li>
				<li><em>Remote Path:</em> the remote path of the project on the server. In this case, it will be <samp>/var/www/html</samp>.</li>
			</ul>
			<p>Armed with this information, map the project for the debugger. To map it:</p>
			<ol>
				<li>Access the PHP Debug's settings by going to Atom's preferences and clicking <em>Packages</em> and then clicking <em>Settings</em> next to <strong>php-debug</strong>.</li>
				<li>In the <em>Path Maps</em>, type the remote path and local path separated by a semi-colon. This will typically take the form similar to <samp>/var/www/html;c:\Users\debugger\Deskop\git\abqwebgeeks-debug</samp>. Be sure to use appropriate local path; don't blindly copy the local path without verifying the path exists first. <i class="fa fa-smile-o" aria-hidden="true"></i></li>
			</ol>
			<hr />
			<h2>Using the Debugger in Atom</h2>
			<p>Using the debugger is a two phase process: first, enable debugging of the errant page, and second, have the server connect to your local debugger.</p>
			<ol>
				<li>First, enable debugging.
					<ol>
						<li>To make things easier, create a bookmarklet. <a href="https://www.jetbrains.com/phpstorm/marklets/">JetBrains</a> has some bookmarklet generators for XDebug.</li>
						<li>In the XDebug section on the left, type <em>DEBUG-ABQWEBGEEKS</em> in ALL CAPS and click <em>Generate</em>.</li>
						<li>Save, at minimum, the first two bookmarklets (Start debugger and Stop debugger) to your bookmarks.</li>
					</ol>
				</li>
				<li>Second, have the server connect to your debugger.
					<ol>
						<li>Press the <em>PHP Debug</em> button in the lower left in Atom's window to enable the debugger.</li>
						<li>Create a <dfn>breakpoint</dfn> (a place where you want the debugger to pause) by selecting the line(s) of interest and pressing <kbd>ALT</kbd> - <kbd>F9</kbd>.</li>
						<li>Visit the errant page and click the <em>Start debugger</em> bookmarklet.</li>
					</ol>
				</li>
			</ol>
			<p>The page will seem to be "stuck" and loading indefinitely. This is not the case. Return to Atom. The debugger is paused at the first breakpoint it encounters. You may now use the debugger tools in Atom to step through the code slowly.</p>
			<hr />
			<h2>XDebug Configuration Concerns</h2>
			<p>Using XDebug in this remote debugging mode is incredibly convenient and informative. Multiple developers can debug code concurrently with minimal effort. However, this does present networking and security concerns. On the network end, XDebug works by making a direct connection from the server to the developer on port 9000. This works without any additional configuration if developers are on the same network as the server <strong>OR</strong> over an IPv6 connection. This has the awkward consequence of requiring remote developers to create a <a href="http://portforward.com/english/routers/port_forwarding/">port forwarding</a> rule on their home routers.</p>
			<p>This also presents a security concern in that the debug data is invaluable information to an attacker. <em>Having XDebug enabled on a live server is unsafe at any speed.</em> The better solution is to isolate the development server by setting up a <a href="https://openvpn.net/">Virtual Private Network (VPN)</a> or by using a local instance such as <a href="https://box.scotch.io/">ScotchBox</a>.</p>
		</main>
<?php require_once(dirname(__DIR__) . "/partials/footer.php"); ?>
	</body>
</html>
