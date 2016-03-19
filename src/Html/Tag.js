
/*development mode*/

window.requestAnimFrame = (function () {
    return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        function (callback) {
            window.setTimeout(callback, 1000 / 60);
        };
})();

Function.prototype.inherit = function (parent, child) {
    function wrapper() {
    }
    wrapper.prototype = parent.prototype;
    this.prototype = new wrapper();
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
    getAttrAsBool: function (name, defVal) {
        defVal = (!defVal) ? false : true;
        return ((this.node.attr(name)) ? parseInt(this.node.attr(name)) : defVal) ? true : false;
    },
    getAttrAsInt: function (name, defVal) {
        var value = this.node.attr(name);
        if (value) {
            return parseInt(value);
        } else {
            return (defVal) ? defVal : null;
        }
    },
    normKeyEvent: function (event) {
        event = (!event) ? window.event : event;
        event.keyCode = (!event.keyCode) ? event.charCode : event.keyCode;
        event.keyCode = (!event.keyCode) ? event.which : event.keyCode;
        return event;
    }
};
