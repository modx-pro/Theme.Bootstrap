<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="[[~[[++site_start]]]]">[[++site_name]]</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto d-flex align-items-center">
                [[pdoMenu?
                    &startId=`0`
                    &level=`2`
                    &tplOuter=`Menu.Outer`
                    &tpl=`Menu.Item`
                    &tplParentRow=`Menu.Parent`
                    &tplInnerRow=`Menu.Inner`
                ]]
            </ul>
        </div>
    </div>
</nav>
