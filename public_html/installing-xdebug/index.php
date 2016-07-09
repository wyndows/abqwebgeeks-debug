<?php
$PAGE_TITLE = "Installing XDebug";
require_once(dirname(__DIR__) . "/head-utils.php");
?>
	<body class="sfooter">
	<?php require_once(dirname(__DIR__) . "/partials/nav.php"); ?>
		<main class="container sfooter-content">
			<h1>Installing XDebug</h1>
			<blockquote>
				<p>Unix has, I think for many years, had a reputation as being difficult to learn and incomplete. Difficult to learn means that the set of shared conventions, and things that are assumed about the way it works, and the basic mechanisms, are just different from what they are in other systems.</p>
				<footer>Brian Kernighan</footer>
			</blockquote>
			<p>XDebug is a remote PHP debugging plugin. It allows developers to debug code on a remote server without the need for the developer to run a server and become a systems administrator. This great advantage to this approach is liberating developers from configuring servers, which is often not their forte. This disadvantage to this approach is that it opens a lot of data up to an attacker to harvest. To mitigate this, restrict XDebug to a development server on a local network and/or a network <strong>ONLY</strong> accessible via a Virtual Private Network (VPN).</p>
			<h2><i class="fa fa-linux" aria-hidden="true"></i> Installing XDebug on Ubuntu 16.04 (Xenial)</h2>
			<p>
				XDebug is installed via a package using the <kbd>apt-get</kbd> package manager:<br />
				<kbd># apt-get install php-xdebug</kbd>
			</p>
			<p>After installing the package, edit the <samp>/etc/php/7.0/apache2/conf.d/20-xdebug.ini</samp> file to contain the following parameters:</p>
			<pre>zend_extension=xdebug.so
xdebug.idekey=INVENT-AN-IDEKEY
xdebug.remote_connect_back=1
xdebug.remote_enable=1
xdebug.var_display_max_depth=16</pre>
			<p>The <em>IDE Key</em> is a special key sent by the developer's local machine to the server for authentication. This is of critical security concerns. Make sure to share the IDE Key with your developers in a secure fashion. Once this is configured, the configuration can be activated by executing:</p>
			<p><kbd># service apache2 restart</kbd></p>
			<h2><i class="fa fa-windows" aria-hidden="true"></i> Installing XDebug on WAMP</h2>
			<p>Installing on WAMP is similar to the Linux instructions, except the extension needs to be downloaded from the <a href="https://xdebug.org/download.php">XDebug download page</a> and copied into the extension directory for WAMP. After the file is copied, the configuration can be used as above.</p>
		</main>
<?php require_once(dirname(__DIR__) . "/partials/footer.php"); ?>
	</body>
</html>
