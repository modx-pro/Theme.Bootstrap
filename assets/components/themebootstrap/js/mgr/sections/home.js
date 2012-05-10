Ext.onReady(function() {
    MODx.load({ xtype: 'themebootstrap-page-home'});
});

Theme.Bootstrap.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'themebootstrap-panel-home'
            ,renderTo: 'themebootstrap-panel-home-div'
        }]
    }); 
    Theme.Bootstrap.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(Theme.Bootstrap.page.Home,MODx.Component);
Ext.reg('themebootstrap-page-home',Theme.Bootstrap.page.Home);