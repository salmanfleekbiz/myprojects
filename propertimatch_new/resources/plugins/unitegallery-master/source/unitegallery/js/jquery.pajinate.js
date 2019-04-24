! function(a) {
    a.fn.pajinate = function(b) {
        function o(d) {
            new_page = parseInt(e.data(c)) - 1, 1 == a(d).siblings(".active_page").prev(".page_link").length ? (s(d, new_page), q(new_page)) : b.wrap_around && q(k - 1)
        }

        function p(d) {
            new_page = parseInt(e.data(c)) + 1, 1 == a(d).siblings(".active_page").next(".page_link").length ? (r(d, new_page), q(new_page)) : b.wrap_around && q(0)
        }

        function q(a) {
            a = parseInt(a, 10);
            var f = parseInt(e.data(d));
            start_from = a * f, end_on = start_from + f;
            var j = i.hide().slice(start_from, end_on);
            j.show(), h.find(b.nav_panel_id).children(".page_link[longdesc=" + a + "]").addClass("active_page " + m).siblings(".active_page").removeClass("active_page " + m), e.data(c, a);
            var k = parseInt(e.data(c) + 1),
                l = g.children().size(),
                n = Math.ceil(l / b.items_per_page);
            h.find(b.nav_info_id).html(b.nav_label_info.replace("{0}", start_from + 1).replace("{1}", start_from + j.length).replace("{2}", i.length).replace("{3}", k).replace("{4}", n)), t(), u(), "undefined" !== typeof b.onPageDisplayed && b.onPageDisplayed.call(this, a + 1)
        }

        function r(c, d) {
            var e = d,
                f = a(c).siblings(".active_page");
            "none" == f.siblings(".page_link[longdesc=" + e + "]").css("display") && j.each(function() {
                a(this).children(".page_link").hide().slice(parseInt(e - b.num_page_links_to_display + 1), e + 1).show()
            })
        }

        function s(c, d) {
            var e = d,
                f = a(c).siblings(".active_page");
            "none" == f.siblings(".page_link[longdesc=" + e + "]").css("display") && j.each(function() {
                a(this).children(".page_link").hide().slice(e, e + parseInt(b.num_page_links_to_display)).show()
            })
        }

        function t() {
            j.children(".page_link:visible").hasClass("last") ? j.children(".more").hide() : j.children(".more").show(), j.children(".page_link:visible").hasClass("first") ? j.children(".less").hide() : j.children(".less").show()
        }

        function u() {
            j.children(".last").hasClass("active_page") ? j.children(".next_link").add(".last_link").addClass("no_more " + n) : j.children(".next_link").add(".last_link").removeClass("no_more " + n), j.children(".first").hasClass("active_page") ? j.children(".previous_link").add(".first_link").addClass("no_more " + n) : j.children(".previous_link").add(".first_link").removeClass("no_more " + n)
        }
        var e, g, h, i, j, k, c = "current_page",
            d = "items_per_page",
            f = {
                item_container_id: ".content",
                items_per_page: 10,
                nav_panel_id: ".page_navigation",
                nav_info_id: ".info_text",
                num_page_links_to_display: 20,
                start_page: 0,
                wrap_around: !1,
                nav_label_first: "<<",
                nav_label_prev: "<",
                nav_label_next: ">",
                nav_label_last: ">>",
                nav_order: ["first", "prev", "num", "next", "last"],
                nav_label_info: "Showing {0}-{1} of {2} results",
                show_first_last: !0,
                abort_on_small_lists: !1,
                jquery_ui: !1,
                jquery_ui_active: "ui-state-highlight",
                jquery_ui_default: "ui-state-default",
                jquery_ui_disabled: "ui-state-disabled"
            },
            b = a.extend(f, b),
            l = b.jquery_ui ? b.jquery_ui_default : "",
            m = b.jquery_ui ? b.jquery_ui_active : "",
            n = b.jquery_ui ? b.jquery_ui_disabled : "";
        return this.each(function() {
            if (h = a(this), g = a(this).find(b.item_container_id), i = h.find(b.item_container_id).children(), b.abort_on_small_lists && b.items_per_page >= i.size()) return h;
            e = h, e.data(c, 0), e.data(d, b.items_per_page);
            for (var f = g.children().size(), n = Math.ceil(f / b.items_per_page), v = '<span class="ellipse more"> ...  </span>', w = '<span class="ellipse less"> ...  </span>', x = b.show_first_last ? '<a class="first_link ' + l + '" href="">' + b.nav_label_first + "</a>" : "", y = b.show_first_last ? '<a class="last_link ' + l + '" href="">' + b.nav_label_last + "</a>" : "", z = "", A = 0; A < b.nav_order.length; A++) switch (b.nav_order[A]) {
                case "first":
                    z += x;
                    break;
                case "last":
                    z += y;
                    break;
                case "next":
                    z += '<a class="next_link ' + l + '" href="">' + b.nav_label_next + "</a>";
                    break;
                case "prev":
                    z += '<a class="previous_link ' + l + '" href="">' + b.nav_label_prev + "</a>";
                    break;
                case "num":
                    z += w;
                    for (var B = 0; n > B;) z += '<a class="page_link ' + l + '" href="" longdesc="' + B + '">' + (B + 1) + "</a>", B++;
                    z += v
            }
            j = h.find(b.nav_panel_id), j.html(z).each(function() {
                a(this).find(".page_link:first").addClass("first"), a(this).find(".page_link:last").addClass("last")
            }), j.children(".ellipse").hide(), j.find(".previous_link").next().next().addClass("active_page " + m), i.hide(), i.slice(0, e.data(d)).show(), k = h.find(b.nav_panel_id + ":first").children(".page_link").size(), b.num_page_links_to_display = Math.min(b.num_page_links_to_display, k), j.children(".page_link").hide(), j.each(function() {
                a(this).children(".page_link").slice(0, b.num_page_links_to_display).show()
            }), h.find(".first_link").click(function(b) {
                b.preventDefault(), s(a(this), 0), q(0)
            }), h.find(".last_link").click(function(b) {
                b.preventDefault();
                var c = k - 1;
                r(a(this), c), q(c)
            }), h.find(".previous_link").click(function(b) {
                b.preventDefault(), o(a(this))
            }), h.find(".next_link").click(function(b) {
                b.preventDefault(), p(a(this))
            }), h.find(".page_link").click(function(b) {
                b.preventDefault(), q(a(this).attr("longdesc"))
            }), q(parseInt(b.start_page)), t(), b.wrap_around || u()
        })
    }
}(jQuery);