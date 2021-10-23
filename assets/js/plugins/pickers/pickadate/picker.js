/*!
 * pickadate.js v3.5.6, 2015/04/20
 * By Amsul, http://amsul.ca
 * Hosted on http://amsul.github.io/pickadate.js
 * Licensed under MIT
 */
! function(a) {
    "function" == typeof define && define.amd ? define("picker", ["jquery"], a) : "object" == typeof exports ? module.exports = a(require("jquery")) : this.Picker = a(jQuery)
}(function(a) {
    function b(f, g, i, m) {
        function n() {
            return b._.node("div", b._.node("div", b._.node("div", b._.node("div", B.component.nodes(w.open), y.box), y.wrap), y.frame), y.holder, 'tabindex="-1"')
        }

        function o() {
            z.data(g, B).addClass(y.input).val(z.data("value") ? B.get("select", x.format) : f.value), x.editable || z.on("focus." + w.id + " click." + w.id, function(a) {
                a.preventDefault(), B.open()
            }).on("keydown." + w.id, u), e(f, {
                haspopup: !0,
                expanded: !1,
                readonly: !1,
                owns: f.id + "_root"
            })
        }

        function p() {
            e(B.$root[0], "hidden", !0)
        }

        function q() {
            B.$holder.on({
                keydown: u,
                "focus.toOpen": t,
                blur: function() {
                    z.removeClass(y.target)
                },
                focusin: function(a) {
                    B.$root.removeClass(y.focused), a.stopPropagation()
                },
                "mousedown click": function(b) {
                    var c = b.target;
                    c != B.$holder[0] && (b.stopPropagation(), "mousedown" != b.type || a(c).is("input, select, textarea, button, option") || (b.preventDefault(), B.$holder[0].focus()))
                }
            }).on("click", "[data-pick], [data-nav], [data-clear], [data-close]", function() {
                var b = a(this),
                    c = b.data(),
                    d = b.hasClass(y.navDisabled) || b.hasClass(y.disabled),
                    e = h();
                e = e && (e.type || e.href), (d || e && !a.contains(B.$root[0], e)) && B.$holder[0].focus(), !d && c.nav ? B.set("highlight", B.component.item.highlight, {
                    nav: c.nav
                }) : !d && "pick" in c ? (B.set("select", c.pick), x.closeOnSelect && B.close(!0)) : c.clear ? (B.clear(), x.closeOnClear && B.close(!0)) : c.close && B.close(!0)
            })
        }

        function r() {
            var b;
            x.hiddenName === !0 ? (b = f.name, f.name = "") : (b = ["string" == typeof x.hiddenPrefix ? x.hiddenPrefix : "", "string" == typeof x.hiddenSuffix ? x.hiddenSuffix : "_submit"], b = b[0] + f.name + b[1]), B._hidden = a('<input type=hidden name="' + b + '"' + (z.data("value") || f.value ? ' value="' + B.get("select", x.formatSubmit) + '"' : "") + ">")[0], z.on("change." + w.id, function() {
                B._hidden.value = f.value ? B.get("select", x.formatSubmit) : ""
            })
        }

        function s() {
            v && l ? B.$holder.find("." + y.frame).one("transitionend", function() {
                B.$holder[0].focus()
            }) : B.$holder[0].focus()
        }

        function t(a) {
            a.stopPropagation(), z.addClass(y.target), B.$root.addClass(y.focused), B.open()
        }

        function u(a) {
            var b = a.keyCode,
                c = /^(8|46)$/.test(b);
            return 27 == b ? (B.close(!0), !1) : void((32 == b || c || !w.open && B.component.key[b]) && (a.preventDefault(), a.stopPropagation(), c ? B.clear().close() : B.open()))
        }
        if (!f) return b;
        var v = !1,
            w = {
                id: f.id || "P" + Math.abs(~~(Math.random() * new Date))
            },
            x = i ? a.extend(!0, {}, i.defaults, m) : m || {},
            y = a.extend({}, b.klasses(), x.klass),
            z = a(f),
            A = function() {
                return this.start()
            },
            B = A.prototype = {
                constructor: A,
                $node: z,
                start: function() {
                    return w && w.start ? B : (w.methods = {}, w.start = !0, w.open = !1, w.type = f.type, f.autofocus = f == h(), f.readOnly = !x.editable, f.id = f.id || w.id, "text" != f.type && (f.type = "text"), B.component = new i(B, x), B.$root = a('<div class="' + y.picker + '" id="' + f.id + '_root" />'), p(), B.$holder = a(n()).appendTo(B.$root), q(), x.formatSubmit && r(), o(), x.containerHidden ? a(x.containerHidden).append(B._hidden) : z.after(B._hidden), x.container ? a(x.container).append(B.$root) : z.after(B.$root), B.on({
                        start: B.component.onStart,
                        render: B.component.onRender,
                        stop: B.component.onStop,
                        open: B.component.onOpen,
                        close: B.component.onClose,
                        set: B.component.onSet
                    }).on({
                        start: x.onStart,
                        render: x.onRender,
                        stop: x.onStop,
                        open: x.onOpen,
                        close: x.onClose,
                        set: x.onSet
                    }), v = c(B.$holder[0]), f.autofocus && B.open(), B.trigger("start").trigger("render"))
                },
                render: function(b) {
                    return b ? (B.$holder = a(n()), q(), B.$root.html(B.$holder)) : B.$root.find("." + y.box).html(B.component.nodes(w.open)), B.trigger("render")
                },
                stop: function() {
                    return w.start ? (B.close(), B._hidden && B._hidden.parentNode.removeChild(B._hidden), B.$root.remove(), z.removeClass(y.input).removeData(g), setTimeout(function() {
                        z.off("." + w.id)
                    }, 0), f.type = w.type, f.readOnly = !1, B.trigger("stop"), w.methods = {}, w.start = !1, B) : B
                },
                open: function(c) {
                    return w.open ? B : (z.addClass(y.active), e(f, "expanded", !0), setTimeout(function() {
                        B.$root.addClass(y.opened), e(B.$root[0], "hidden", !1)
                    }, 0), c !== !1 && (w.open = !0, v && k.css("overflow", "hidden").css("padding-right", "+=" + d()), s(), j.on("click." + w.id + " focusin." + w.id, function(a) {
                        var b = a.target;
                        b != f && b != document && 3 != a.which && B.close(b === B.$holder[0])
                    }).on("keydown." + w.id, function(c) {
                        var d = c.keyCode,
                            e = B.component.key[d],
                            f = c.target;
                        27 == d ? B.close(!0) : f != B.$holder[0] || !e && 13 != d ? a.contains(B.$root[0], f) && 13 == d && (c.preventDefault(), f.click()) : (c.preventDefault(), e ? b._.trigger(B.component.key.go, B, [b._.trigger(e)]) : B.$root.find("." + y.highlighted).hasClass(y.disabled) || (B.set("select", B.component.item.highlight), x.closeOnSelect && B.close(!0)))
                    })), B.trigger("open"))
                },
                close: function(a) {
                    return a && (x.editable ? f.focus() : (B.$holder.off("focus.toOpen").focus(), setTimeout(function() {
                        B.$holder.on("focus.toOpen", t)
                    }, 0))), z.removeClass(y.active), e(f, "expanded", !1), setTimeout(function() {
                        B.$root.removeClass(y.opened + " " + y.focused), e(B.$root[0], "hidden", !0)
                    }, 0), w.open ? (w.open = !1, v && k.css("overflow", "").css("padding-right", "-=" + d()), j.off("." + w.id), B.trigger("close")) : B
                },
                clear: function(a) {
                    return B.set("clear", null, a)
                },
                set: function(b, c, d) {
                    var e, f, g = a.isPlainObject(b),
                        h = g ? b : {};
                    if (d = g && a.isPlainObject(c) ? c : d || {}, b) {
                        g || (h[b] = c);
                        for (e in h) f = h[e], e in B.component.item && (void 0 === f && (f = null), B.component.set(e, f, d)), ("select" == e || "clear" == e) && z.val("clear" == e ? "" : B.get(e, x.format)).trigger("change");
                        B.render()
                    }
                    return d.muted ? B : B.trigger("set", h)
                },
                get: function(a, c) {
                    if (a = a || "value", null != w[a]) return w[a];
                    if ("valueSubmit" == a) {
                        if (B._hidden) return B._hidden.value;
                        a = "value"
                    }
                    if ("value" == a) return f.value;
                    if (a in B.component.item) {
                        if ("string" == typeof c) {
                            var d = B.component.get(a);
                            return d ? b._.trigger(B.component.formats.toString, B.component, [c, d]) : ""
                        }
                        return B.component.get(a)
                    }
                },
                on: function(b, c, d) {
                    var e, f, g = a.isPlainObject(b),
                        h = g ? b : {};
                    if (b) {
                        g || (h[b] = c);
                        for (e in h) f = h[e], d && (e = "_" + e), w.methods[e] = w.methods[e] || [], w.methods[e].push(f)
                    }
                    return B
                },
                off: function() {
                    var a, b, c = arguments;
                    for (a = 0, namesCount = c.length; a < namesCount; a += 1) b = c[a], b in w.methods && delete w.methods[b];
                    return B
                },
                trigger: function(a, c) {
                    var d = function(a) {
                        var d = w.methods[a];
                        d && d.map(function(a) {
                            b._.trigger(a, B, [c])
                        })
                    };
                    return d("_" + a), d(a), B
                }
            };
        return new A
    }

    function c(a) {
        var b, c = "position";
        return a.currentStyle ? b = a.currentStyle[c] : window.getComputedStyle && (b = getComputedStyle(a)[c]), "fixed" == b
    }

    function d() {
        if (k.height() <= i.height()) return 0;
        var b = a('<div style="visibility:hidden;width:100px" />').appendTo("body"),
            c = b[0].offsetWidth;
        b.css("overflow", "scroll");
        var d = a('<div style="width:100%" />').appendTo(b),
            e = d[0].offsetWidth;
        return b.remove(), c - e
    }

    function e(b, c, d) {
        if (a.isPlainObject(c))
            for (var e in c) f(b, e, c[e]);
        else f(b, c, d)
    }

    function f(a, b, c) {
        a.setAttribute(("role" == b ? "" : "aria-") + b, c)
    }

    function g(b, c) {
        a.isPlainObject(b) || (b = {
            attribute: c
        }), c = "";
        for (var d in b) {
            var e = ("role" == d ? "" : "aria-") + d,
                f = b[d];
            c += null == f ? "" : e + '="' + b[d] + '"'
        }
        return c
    }

    function h() {
        try {
            return document.activeElement
        } catch (a) {}
    }
    var i = a(window),
        j = a(document),
        k = a(document.documentElement),
        l = null != document.documentElement.style.transition;
    return b.klasses = function(a) {
        return a = a || "picker", {
            picker: a,
            opened: a + "--opened",
            focused: a + "--focused",
            input: a + "__input",
            active: a + "__input--active",
            target: a + "__input--target",
            holder: a + "__holder",
            frame: a + "__frame",
            wrap: a + "__wrap",
            box: a + "__box"
        }
    }, b._ = {
        group: function(a) {
            for (var c, d = "", e = b._.trigger(a.min, a); e <= b._.trigger(a.max, a, [e]); e += a.i) c = b._.trigger(a.item, a, [e]), d += b._.node(a.node, c[0], c[1], c[2]);
            return d
        },
        node: function(b, c, d, e) {
            return c ? (c = a.isArray(c) ? c.join("") : c, d = d ? ' class="' + d + '"' : "", e = e ? " " + e : "", "<" + b + d + e + ">" + c + "</" + b + ">") : ""
        },
        lead: function(a) {
            return (10 > a ? "0" : "") + a
        },
        trigger: function(a, b, c) {
            return "function" == typeof a ? a.apply(b, c || []) : a
        },
        digits: function(a) {
            return /\d/.test(a[1]) ? 2 : 1
        },
        isDate: function(a) {
            return {}.toString.call(a).indexOf("Date") > -1 && this.isInteger(a.getDate())
        },
        isInteger: function(a) {
            return {}.toString.call(a).indexOf("Number") > -1 && a % 1 === 0
        },
        ariaAttr: g
    }, b.extend = function(c, d) {
        a.fn[c] = function(e, f) {
            var g = this.data(c);
            return "picker" == e ? g : g && "string" == typeof e ? b._.trigger(g[e], g, [f]) : this.each(function() {
                var f = a(this);
                f.data(c) || new b(this, c, d, e)
            })
        }, a.fn[c].defaults = d.defaults
    }, b
});