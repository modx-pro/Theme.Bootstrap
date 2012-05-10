<div id="content" class="main">
	[[*id:gt=`1`:then=`<h1>[[*pagetitle]]</h1>`]]
	[[*content]]
	[[!getPage?
		&parents=`[[*id]]`
		&element=`getResources`
		&tpl=`tpl.getResources.row`
		&limit=`1`
		&pageActiveTpl=`<li[[+activeClasses:default=` class="active"`]]><a[[+activeClasses:default=` class="active"`]][[+title]] href="[[+href]]">[[+pageNo]]</a></li>`
	]]

	<div class="pagination">
		<ul>
			[[!+page.nav]]
		</ul>
	</div>

</div>
