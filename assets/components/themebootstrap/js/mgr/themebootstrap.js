var Theme.Bootstrap = function(config) {
    config = config || {};
    Theme.Bootstrap.superclass.constructor.call(this,config);
};
Ext.extend(Theme.Bootstrap,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {},view: {}
});
Ext.reg('themebootstrap',Theme.Bootstrap);

Theme.Bootstrap = new Theme.Bootstrap();