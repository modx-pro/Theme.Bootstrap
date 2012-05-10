Theme.Bootstrap.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+_('themebootstrap')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,activeItem: 0
            ,hideMode: 'offsets'
            ,items: [{
                title: _('themebootstrap.items')
                ,items: [{
                    html: '<p>'+_('themebootstrap.intro_msg')+'</p>'
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                },{
                    xtype: 'themebootstrap-grid-items'
                    ,preventRender: true
                    ,cls: 'main-wrapper'
                }]
            }]
        }]
    });
    Theme.Bootstrap.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(Theme.Bootstrap.panel.Home,MODx.Panel);
Ext.reg('themebootstrap-panel-home',Theme.Bootstrap.panel.Home);
