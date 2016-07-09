<header ng-controller="NavController">
	<bootstrap-breakpoint></bootstrap-breakpoint>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" aria-expanded="false" ng-click="toggleCollapse();">
					<span class="sr-only">Toggle navigation</span>
					<i class="fa fa-bars" aria-hidden="true"></i>
				</button>
				<a class="navbar-brand" href="/">
					<span class="fa-stack">
						<i class="fa fa-bug fa-stack-1x"></i>
						<i class="fa fa-ban fa-stack-2x text-danger"></i>
					</span>
					Debugging de Deep Dive Dylan
				</a>
			</div>

			<div class="navbar-collapse" uib-collapse="navCollapsed">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/">Home</a></li>
					<li class="dropdown" uib-dropdown>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" uib-dropdown-toggle>Debugging Concepts <span class="caret"></span></a>
						<ul class="dropdown-menu" uib-dropdown-menu>
							<li><a href="/introduction/">Introduction</a></li>
							<li><a href="/worst-tool/">Worst Tool for the Job</a></li>
							<li><a href="/installing-xdebug/">Installing XDebug</a></li>
							<li><a href="/installing-batarang/">Installing Batarang</a></li>
						</ul>
					</li>
					<li class="dropdown" uib-dropdown>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" uib-dropdown-toggle>Code Examples <span class="caret"></span></a>
						<ul class="dropdown-menu" uib-dropdown-menu>
							<li><a href="/recursion/">Recursion</a></li>
							<li><a href="/whats-the-difference/">What's the Difference?</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</header>
