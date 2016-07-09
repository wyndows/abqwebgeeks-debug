<?php
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");
$highlighter = new Highlight\Highlighter();
$highlighter->setAutodetectLanguages(["php"]);

$PAGE_TITLE = "Worst Tool for the Job";
require_once(dirname(__DIR__) . "/head-utils.php");
?>
	<body class="sfooter">
	<?php require_once(dirname(__DIR__) . "/partials/nav.php"); ?>
		<main class="container sfooter-content">
			<h1>Worst Tool for the Job</h1>
			<p>Write this later. :D</p>
			<h2>How can we Best Debug?</h2>
			<blockquote>
				<p>It's 2014, yet we debug like it's 1984.</p>
				<footer>Darin Kelkhoff</footer>
			</blockquote>
			<p>The preceding quote is from my software architect from my previous job. What was referring to was the fact that developers will use/overuse commands that print stuff the console/stdout in order to see the state of a variable as a program runs.</p>
			<table class="table table-bordered table-responsive table-striped table-word-wrap">
				<tr>
					<th>C</th>
					<th>Java</th>
					<th>JavaScript</th>
					<th>PHP</th>
				</tr>
				<tr>
					<td><code>int x = 42;<br />printf("%d\n", x);</code></td>
					<td><code>Integer x = 42;<br />System.out.println(x);</code></td>
					<td><code>var x = 42;<br />console.log(x);</code></td>
					<td><code>$x = 42;<br />var_dump($x);</code></td>
				</tr>
				<caption>Table 1: Printing a Variable to the Console in Different Languages</caption>
			</table>
			<p>This is not to say that printing variables to the console is a futile activity. Indeed, printing variables to the console can be an easy way to have a look at a variable at a critical juncture in the code. However, many developers rely solely on this tactic for their only method of debugging. This is an anti-pattern known as <a href="https://en.wikipedia.org/wiki/Law_of_the_instrument"><em>Law of the instrument</em></a>, also known as the <em>golden hammer</em>. That is, the overuse of this one tactic can many times lead the developer down the wrong path. The best strategy is to <em>moderate</em> (not eliminate) this practice and combine it with other tools and methods that debuggers can use.</p>
			<h2>When is Enough <em>Enough</em>!?</h2>
			<p>There are two major factors that one should avoid when printing variables to the console:</p>
			<ul>
				<li><em>Overuse:</em> As just discussed, overuse of this tactic not only avoids the use of more appropriate debugging techniques, but also has the additional problem of repetitively printing the same variable multiple times. This can lead to confusion as to where in the code this variable was output.</li>
				<li><em>Concurrency:</em> With the multi-threaded, vastly parallel nature of the web (especially on the MEAN stack), different results from different threads can influence the results of printing to the console. This is known as a <a href="https://en.wikipedia.org/wiki/Race_condition"><em>race condition</em></a> and is a debugging nightmare. Better tools must be used.</li>
			</ul>
			<h2>A Smarter Way: Use Exceptions</h2>
			<p>To solve both problems mentioned above, use exceptions to your advantage. Exceptions can provide the exact same data with additional context that is resistant to race conditions since exceptions can also provide exact context as to how the problem occurred.</p>
			<div>
				<?php
					$highlighted = $highlighter->highlightAuto(file_get_contents("car.php"));
					$output = "<pre class=\"hljs " . $highlighted->language . "\">" . $highlighted->value . "</pre>";
					echo $output;
				?>
			</div>
			<p>The preceding code will unconditionally throw an exception. This is useful in debugging complicated errors because it gives you the <em>stack trace</em> of how the error, which is the lines of code and methods PHP encountered when the exception occurred. This gives you the enhanced view of not only a custom message and printing a variable to the console, as above, but also the trace of how the code arrived at this exception.</p>
		</main>
<?php require_once(dirname(__DIR__) . "/partials/footer.php"); ?>
	</body>
</html>
