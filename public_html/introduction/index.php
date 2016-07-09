<?php
$PAGE_TITLE = "Debugging: Introduction";
require_once(dirname(__DIR__) . "/head-utils.php");
?>
	<body class="sfooter">
	<?php require_once(dirname(__DIR__) . "/partials/nav.php"); ?>
		<main class="container sfooter-content">
			<h1>Debugging: Introduction</h1>
			<blockquote>
				<p>Logic is the beginning, not the end, of wisdom.</p>
				<footer>Captain Spock in <cite>Star Trek VI: The Undiscovered Country</cite></footer>
			</blockquote>
			<p>Debugging is more a human process than a tool process. Logic and being methodical will outrun any tool any day of the week. A true debugger is an individual who can sleuth out the causes of a problem and eliminate the cause. Tools are just that: tools. Tools assist the debugger in finding the causes of problems. They're not a magical solution and won't fix any bugs. Tools merely present the information for the human debugger to use in finding the true problem.</p>
			<h2>What Makes a Good Debugger?</h2>
			<p>The best debugger is not a tool. It's a person. Debugging is fundamentally a process of deductive reasoning and a process of elimination. Debugging is all about taking the realm of all possibilities, no matter how seemingly ludicrous, and narrowing the field until one arrives at the source of the problem. Consider the classical puzzle of knights and knaves. A <dfn>knight</dfn> is an individual who only tells the truth when asked a question. Conversely, a <dfn>knave</dfn> is one who only lies when asked a question. Here is the setup: you arrive at a fork in the road where each branch is guarded by either a knight or knave. You know one individual is a knight and one is a knave. You also know that one branch leads to danger and one leads home. <em>By only asking one question, can you determine the safe way home?</em></p>
			<h3>Strategy 0: Ask who They are</h3>
			<p>You ask one of the guards if they are a knight. If the guard is a knight, they will say they are a knight by telling the truth. However, a knave would also answer that they are a knight by lying. Both cases yield the same answer and don't help you in solving which path to take. So, this strategy is not a valid strategy.</p>
			<h3>Strategy 1: Ask if the Road is Safe</h3>
			<p>You ask one of the guards if the road is safe. If the guard is a knight, they will answer you yes or no by telling the truth. The same can be said for the knave, except the knave is lying. Just like strategy 0, this leads you nowhere as the answers are ambiguous and don't lead you to the correct path.</p>
			<h3>Strategy 2: Ask What the Other Would Say</h3>
			<p>You ask what one of the guards what the <em>other</em> guard would say. Wording this question carefully, you ask, "would the other guard tell me this path leads to home?" This now comes down to four possible cases:</p>
			<ol>
				<li><em>Knight Guarding Home:</em> The knight will say no, since the knave will lie about the correct path.</li>
				<li><em>Knight Guarding Danger:</em> The knight will say yes, since the knave will lie about the dangerous path.</li>
				<li><em>Knave Guarding Home:</em> The knave will say no, since the knight will tell the truth about the correct path, however, the knave will lie about it!</li>
				<li><em>Knave Guarding Danger:</em> The knave will say yes, since the knight will tell the truth about the dangerous path, however, the knave will lie about it!</li>
			</ol>
			<p>Note that all cases result in the same fact: <em>always taking the inverse action leads to home</em>. You now have an unambiguous course of action that will lead home.</p>
			<p>Now imagine you have an array of <var>k</var> paths, where <var>k</var> is an even, positive integer. You may ask <var>k</var> - 1 questions to find the one and only safe route home. How do you find your way home in an array of bad choices? Suppose the knights and knaves were dispatched on the paths in a regular pattern. Then, one could ask each guard as seen in strategy 2 and, when the pattern was broken, the one path to home has been found. Breaking this supposition, is it possible to find the one path home in a pure random distribution of knights and knaves? No. Not without additional tools or information. In essence, this is what debugging is: finding your way home in a random search space.</p>
			<h2>What am I Doing Wrong!?</h2>
			<p>One time, a student asked what he was doing wrong in his code. Acidicly and playfully, I told him "everything" and pointed out a problem he had in his code for him to work on. Unknowingly, I had set him on fire. He later used this incident as an example of what my teaching style was like. From that point on, he would never ask me a question until he had eliminated the most obvious possibilities. This is a great start for an effective debugger. Eliminate the usual possibilities before trying deeper methods. This includes:<p>
			<ul>
				<li><em>Spelling:</em> Did you spell that method or variable <del>rite</del> right? This is especially true of harder to spell words and using autocomplete on typical programming tools. For instance, <code>$inviocesRecieved</code> contains two English words, invoice and received, that are commonly misspelled. Many text editors will accept the misspelled variable name at face value and offer the incorrectly spelled word as an autocomplete suggestion. Then, when one writes <code>$invoicesReceived</code> later, the declaration of the brand new variable in type flexible languages (JavaScript, PHP, Ruby, &hellip;) is syntactically correct yet not what you want.</li>
				<li>
					<em>Capitalization:</em> Are you using a a consistent capitalization convention? The confusion comes from the fact that there are so many to choose from:
					<ul>
						<li><em>camelBackNotation:</em> combining words together by capitalizing the 2<sup>nd</sup>, 3<sup>rd</sup>, &hellip; <var>k</var><sup>th</sup> word in the variable</li>
						<li><em>PascalNotation:</em> combining words together by capitalizing the 1<sup>st</sup>, 2<sup>nd</sup>, 3<sup>rd</sup>, &hellip; <var>k</var><sup>th</sup> word in the variable</li>
						<li><em>kabob-notation:</em> combining words together using the -  (dash, tack) character</em></li>
						<li><em>underbar_notation:</em> combining words together using the _ (underbar) character</em></li>
					</ul>
					The most confusing part of this point is that different conventions call for different notations at different times. For instance, Angular calls for Pascal notation on classes, camel back notation on directives in JavaScript, and kabob notation on directives in HTML. Angular is not alone in this confusion. Different languages often want different notations for different use cases.
				</li>
			</ul>
		</main>
<?php require_once(dirname(__DIR__) . "/partials/footer.php"); ?>
	</body>
</html>
