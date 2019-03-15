<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">[[++site_name]]</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                [[pdoMenu?
                    &startId=`0`
                    &level=`2`
                    &tplOuter=`@INLINE [[+wrapper]]`
                    &tpl=`@INLINE
                    <li class="nav-item [[+classnames]]">
                        <a class="nav-link" href="[[+link]]" [[+attributes]]>[[+menutitle]]</a>
                    </li>`
                    &tplParentRow=`@INLINE
                    <li class="nav-item dropdown [[+classnames]]">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" [[+attributes]]>[[+menutitle]]</a>
                        <ul class="dropdown-menu">[[+wrapper]]</ul>
                    </li>`
                ]]
            </ul>
        </div>
    </div>
</nav>