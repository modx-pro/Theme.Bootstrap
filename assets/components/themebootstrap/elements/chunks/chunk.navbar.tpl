<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="/">[[++site_name]]</a>
			<div class="nav-collapse">
				[[pdoMenu?
					&startId=`0`
					&level=`2`
					&outerClass=`nav`
					&tplParentRow=`@INLINE
						<li class="[[+classnames]] dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" [[+attributes]]>[[+menutitle]]<b class="caret"></b></a>
							<ul class="dropdown-menu">[[+wrapper]]</ul>
						</li>`
					&tplInner=`@INLINE [[+wrapper]]`
				]]
			</div>
		</div>
	</div>
</div>
