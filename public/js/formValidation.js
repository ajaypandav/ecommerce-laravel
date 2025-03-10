/*!
 * Codebase - v3.0.0
 * @author pixelcave - https://pixelcave.com
 * Copyright (c) 2018
 */
! function(e) {
    var r = {};

    function a(l) {
        if (r[l]) return r[l].exports;
        var t = r[l] = {
            i: l,
            l: !1,
            exports: {}
        };
        return e[l].call(t.exports, t, t.exports, a), t.l = !0, t.exports
    }
    a.m = e, a.c = r, a.d = function(e, r, l) {
        a.o(e, r) || Object.defineProperty(e, r, {
            enumerable: !0,
            get: l
        })
    }, a.r = function(e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, a.t = function(e, r) {
        if (1 & r && (e = a(e)), 8 & r) return e;
        if (4 & r && "object" == typeof e && e && e.__esModule) return e;
        var l = Object.create(null);
        if (a.r(l), Object.defineProperty(l, "default", {
                enumerable: !0,
                value: e
            }), 2 & r && "string" != typeof e)
            for (var t in e) a.d(l, t, function(r) {
                return e[r]
            }.bind(null, t));
        return l
    }, a.n = function(e) {
        var r = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return a.d(r, "a", r), r
    }, a.o = function(e, r) {
        return Object.prototype.hasOwnProperty.call(e, r)
    }, a.p = "", a(a.s = 18)
}({
    18: function(e, r, a) {
        e.exports = a(19)
    },
    19: function(e, r) {
        function a(e, r) {
            for (var a = 0; a < r.length; a++) {
                var l = r[a];
                l.enumerable = l.enumerable || !1, l.configurable = !0, "value" in l && (l.writable = !0), Object.defineProperty(e, l.key, l)
            }
        }
        var l = function() {
            function e() {
                ! function(e, r) {
                    if (!(e instanceof r)) throw new TypeError("Cannot call a class as a function")
                }(this, e)
            }
            var r, l, t;
            return r = e, t = [{
                key: "initValidationBootstrap",
                value: function() {
                    jQuery(".js-validation-bootstrap").validate({
                        ignore: [],
                        errorClass: "invalid-feedback animated fadeInDown",
                        errorElement: "div",
                        errorPlacement: function(e, r) {
                            jQuery(r).parents(".form-group").append(e)
                        },
                        highlight: function(e) {
                            jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
                        },
                        success: function(e) {
                            jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
                        },
                        rules: {
                            "val-username": {
                                required: !0,
                                minlength: 3
                            },
                            "val-email": {
                                required: !0,
                                email: !0
                            },
                            "val-password": {
                                required: !0,
                                minlength: 5
                            },
                            "val-confirm-password": {
                                required: !0,
                                equalTo: "#val-password"
                            },
                            "val-select2": {
                                required: !0
                            },
                            "val-select2-multiple": {
                                required: !0,
                                minlength: 2
                            },
                            "val-suggestions": {
                                required: !0,
                                minlength: 5
                            },
                            "val-skill": {
                                required: !0
                            },
                            "val-currency": {
                                required: !0,
                                currency: ["$", !0]
                            },
                            "val-website": {
                                required: !0,
                                url: !0
                            },
                            "val-phoneus": {
                                required: !0,
                                phoneUS: !0
                            },
                            "val-digits": {
                                required: !0,
                                digits: !0
                            },
                            "val-number": {
                                required: !0,
                                number: !0
                            },
                            "val-range": {
                                required: !0,
                                range: [1, 5]
                            },
                            "val-terms": {
                                required: !0
                            }
                        },
                        messages: {
                            "val-username": {
                                required: "Please enter a username",
                                minlength: "Your username must consist of at least 3 characters"
                            },
                            "val-email": "Please enter a valid email address",
                            "val-password": {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 5 characters long"
                            },
                            "val-confirm-password": {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 5 characters long",
                                equalTo: "Please enter the same password as above"
                            },
                            "val-select2": "Please select a value!",
                            "val-select2-multiple": "Please select at least 2 values!",
                            "val-suggestions": "What can we do to become better?",
                            "val-skill": "Please select a skill!",
                            "val-currency": "Please enter a price!",
                            "val-website": "Please enter your website!",
                            "val-phoneus": "Please enter a US phone!",
                            "val-digits": "Please enter only digits!",
                            "val-number": "Please enter a number!",
                            "val-range": "Please enter a number between 1 and 5!",
                            "val-terms": "You must agree to the service terms!"
                        }
                    })
                }
            }, {
                key: "initValidationMaterial",
                value: function() {
                    jQuery(".js-validation-material").validate({
                        ignore: [],
                        errorClass: "invalid-feedback animated fadeInDown",
                        errorElement: "div",
                        errorPlacement: function(e, r) {
                            jQuery(r).parents(".form-group").append(e)
                        },
                        highlight: function(e) {
                            jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
                        },
                        success: function(e) {
                            jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove()
                        },
                        rules: {
                            "val-username2": {
                                required: !0,
                                minlength: 3
                            },
                            "val-email2": {
                                required: !0,
                                email: !0
                            },
                            "val-password2": {
                                required: !0,
                                minlength: 5
                            },
                            "val-confirm-password2": {
                                required: !0,
                                equalTo: "#val-password2"
                            },
                            "val-select22": {
                                required: !0
                            },
                            "val-select2-multiple2": {
                                required: !0,
                                minlength: 2
                            },
                            "val-suggestions2": {
                                required: !0,
                                minlength: 5
                            },
                            "val-skill2": {
                                required: !0
                            },
                            "val-currency2": {
                                required: !0,
                                currency: ["$", !0]
                            },
                            "val-website2": {
                                required: !0,
                                url: !0
                            },
                            "val-phoneus2": {
                                required: !0,
                                phoneUS: !0
                            },
                            "val-digits2": {
                                required: !0,
                                digits: !0
                            },
                            "val-number2": {
                                required: !0,
                                number: !0
                            },
                            "val-range2": {
                                required: !0,
                                range: [1, 5]
                            },
                            "val-terms2": {
                                required: !0
                            }
                        },
                        messages: {
                            "val-username2": {
                                required: "Please enter a username",
                                minlength: "Your username must consist of at least 3 characters"
                            },
                            "val-email2": "Please enter a valid email address",
                            "val-password2": {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 5 characters long"
                            },
                            "val-confirm-password2": {
                                required: "Please provide a password",
                                minlength: "Your password must be at least 5 characters long",
                                equalTo: "Please enter the same password as above"
                            },
                            "val-select22": "Please select a value!",
                            "val-select2-multiple2": "Please select at least 2 values!",
                            "val-suggestions2": "What can we do to become better?",
                            "val-skill2": "Please select a skill!",
                            "val-currency2": "Please enter a price!",
                            "val-website2": "Please enter your website!",
                            "val-phoneus2": "Please enter a US phone!",
                            "val-digits2": "Please enter only digits!",
                            "val-number2": "Please enter a number!",
                            "val-range2": "Please enter a number between 1 and 5!",
                            "val-terms2": "You must agree to the service terms!"
                        }
                    })
                }
            }, {
                key: "init",
                value: function() {
                    this.initValidationBootstrap(), this.initValidationMaterial(), jQuery(".js-select2").on("change", function(e) {
                        jQuery(e.currentTarget).valid()
                    })
                }
            }], (l = null) && a(r.prototype, l), t && a(r, t), e
        }();
        jQuery(function() {
            l.init()
        })
    }
});