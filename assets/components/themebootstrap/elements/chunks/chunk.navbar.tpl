<!-- Static navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">[[++site_name]]</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				[[pdoMenu?
					&startId=`0`
					&level=`2`
					&tplParentRow=`@INLINE
					<li class="[[+classnames]] dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" [[+attributes]]>[[+menutitle]]<b class="caret"></b></a>
						<ul class="dropdown-menu">[[+wrapper]]</ul>
					</li>`
					&tplOuter=`@INLINE [[+wrapper]]`
				]]
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>