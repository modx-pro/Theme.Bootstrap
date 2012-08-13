<div id="content" class="main">
	[[*id:isnot=`[[++site_start]]`:then=`<h1>[[*longtitle:default=`[[*pagetitle]]`]]</h1>`]]
	[[*content]]
	[[!getPage?
		&parents=`[[*id]]`
		&element=`getResources`
		&tpl=`tpl.getResources.row`
		&limit=`5`
		&pageActiveTpl=`<li[[+activeClasses:default=` class="active"`]]><a[[+activeClasses:default=` class="active"`]][[+title]] href="[[+href]]">[[+pageNo]]</a></li>`
	]]

	<div class="pagination">
		<ul>
			[[!+page.nav]]
		</ul>
	</div>
</div>
