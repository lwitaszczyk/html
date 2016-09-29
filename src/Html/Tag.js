var $ = jQuery;

window.requestAnimFrame = (function () {
    return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        function (callback) {
            window.setTimeout(callback, 1000 / 60);
        };
})();

Function.prototype.inherit = function (parent, child) {
    function Wrapper() {
    }

    Wrapper.prototype = parent.prototype;
    this.prototype = new Wrapper();
    $.extend(this.prototype, child);
};

function Html_Tag(node, params) {
    this.params = (!params) ? {} : params;
    this.node = $(node);
    this.node[0].itemInstance = this;

    $.fn.getItem = function () {
        if (($(this)[0]) && $(this)[0].itemInstance) {
            return $(this)[0].itemInstance;
        } else {
            return null;
        }
    };
}

Html_Tag.prototype = {
    getAttr: function (name, defVal) {
        defVal = (!defVal) ? null : defVal;
        return (this.node.attr(name)) ? this.node.attr(name) : defVal;
    },
    /**
     * @returns {jQuery}
     */
    getNode: function () {
        return this.node;
    }
};
