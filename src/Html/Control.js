function Html_Control(node, params) {
    Html_Tag.apply(this, arguments);
    var self = this;
    this.name = this.getAttr('name', null);
}

Html_Control.inherit(Html_Tag, {
    disabled: function () {
        this.node.attr('disabled', 'disabled');
    },
    enabled: function () {
        this.node.attr('disabled', null);
    }
});
