<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="/">[[++site_name]]</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">

			[[pdoMenu?
			&startId=`0`
			&level=`2`
			&tplParentRow=`@INLINE
			<li class="[[+classnames]] dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					[[+menutitle]]
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					[[+wrapper]]
				</div>

			</li>`
			&tplOuter=`@INLINE [[+wrapper]]`
			]]
		</ul>
	</div>
</nav>
