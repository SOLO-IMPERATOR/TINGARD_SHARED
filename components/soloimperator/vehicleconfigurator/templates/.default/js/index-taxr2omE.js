(function () {
    const i = document.createElement("link").relList;
    if (i && i.supports && i.supports("modulepreload")) return;
    for (const o of document.querySelectorAll('link[rel="modulepreload"]')) u(o);
    new MutationObserver(o => {
        for (const f of o)
            if (f.type === "childList")
                for (const m of f.addedNodes) m.tagName === "LINK" && m.rel === "modulepreload" && u(m)
    }).observe(document, {
        childList: !0,
        subtree: !0
    });

    function r(o) {
        const f = {};
        return o.integrity && (f.integrity = o.integrity), o.referrerPolicy && (f.referrerPolicy = o.referrerPolicy), o.crossOrigin === "use-credentials" ? f.credentials = "include" : o.crossOrigin === "anonymous" ? f.credentials = "omit" : f.credentials = "same-origin", f
    }

    function u(o) {
        if (o.ep) return;
        o.ep = !0;
        const f = r(o);
        fetch(o.href, f)
    }
})();

function ep(s) {
    return s && s.__esModule && Object.prototype.hasOwnProperty.call(s, "default") ? s.default : s
}
var Er = {
    exports: {}
},
    Ln = {};
/**
 * @license React
 * react-jsx-runtime.production.js
 *
 * Copyright (c) Meta Platforms, Inc. and affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */
var Dd;

function qm() {
    if (Dd) return Ln;
    Dd = 1;
    var s = Symbol.for("react.transitional.element"),
        i = Symbol.for("react.fragment");

    function r(u, o, f) {
        var m = null;
        if (f !== void 0 && (m = "" + f), o.key !== void 0 && (m = "" + o.key), "key" in o) {
            f = {};
            for (var h in o) h !== "key" && (f[h] = o[h])
        } else f = o;
        return o = f.ref, {
            $$typeof: s,
            type: u,
            key: m,
            ref: o !== void 0 ? o : null,
            props: f
        }
    }
    return Ln.Fragment = i, Ln.jsx = r, Ln.jsxs = r, Ln
}
var zd;

function Ym() {
    return zd || (zd = 1, Er.exports = qm()), Er.exports
}
var x = Ym(),
    Sr = {
        exports: {}
    },
    de = {};
/**
 * @license React
 * react.production.js
 *
 * Copyright (c) Meta Platforms, Inc. and affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */
var Rd;

function Im() {
    if (Rd) return de;
    Rd = 1;
    var s = Symbol.for("react.transitional.element"),
        i = Symbol.for("react.portal"),
        r = Symbol.for("react.fragment"),
        u = Symbol.for("react.strict_mode"),
        o = Symbol.for("react.profiler"),
        f = Symbol.for("react.consumer"),
        m = Symbol.for("react.context"),
        h = Symbol.for("react.forward_ref"),
        v = Symbol.for("react.suspense"),
        p = Symbol.for("react.memo"),
        y = Symbol.for("react.lazy"),
        E = Symbol.iterator;

    function S(_) {
        return _ === null || typeof _ != "object" ? null : (_ = E && _[E] || _["@@iterator"], typeof _ == "function" ? _ : null)
    }
    var A = {
        isMounted: function () {
            return !1
        },
        enqueueForceUpdate: function () { },
        enqueueReplaceState: function () { },
        enqueueSetState: function () { }
    },
        O = Object.assign,
        V = {};

    function K(_, X, $) {
        this.props = _, this.context = X, this.refs = V, this.updater = $ || A
    }
    K.prototype.isReactComponent = {}, K.prototype.setState = function (_, X) {
        if (typeof _ != "object" && typeof _ != "function" && _ != null) throw Error("takes an object of state variables to update or a function which returns an object of state variables.");
        this.updater.enqueueSetState(this, _, X, "setState")
    }, K.prototype.forceUpdate = function (_) {
        this.updater.enqueueForceUpdate(this, _, "forceUpdate")
    };

    function R() { }
    R.prototype = K.prototype;

    function Y(_, X, $) {
        this.props = _, this.context = X, this.refs = V, this.updater = $ || A
    }
    var Q = Y.prototype = new R;
    Q.constructor = Y, O(Q, K.prototype), Q.isPureReactComponent = !0;
    var F = Array.isArray,
        G = {
            H: null,
            A: null,
            T: null,
            S: null,
            V: null
        },
        ee = Object.prototype.hasOwnProperty;

    function ae(_, X, $, J, te, pe) {
        return $ = pe.ref, {
            $$typeof: s,
            type: _,
            key: X,
            ref: $ !== void 0 ? $ : null,
            props: pe
        }
    }

    function H(_, X) {
        return ae(_.type, X, void 0, void 0, void 0, _.props)
    }

    function M(_) {
        return typeof _ == "object" && _ !== null && _.$$typeof === s
    }

    function z(_) {
        var X = {
            "=": "=0",
            ":": "=2"
        };
        return "$" + _.replace(/[=:]/g, function ($) {
            return X[$]
        })
    }
    var j = /\/+/g;

    function P(_, X) {
        return typeof _ == "object" && _ !== null && _.key != null ? z("" + _.key) : X.toString(36)
    }

    function re() { }

    function _e(_) {
        switch (_.status) {
            case "fulfilled":
                return _.value;
            case "rejected":
                throw _.reason;
            default:
                switch (typeof _.status == "string" ? _.then(re, re) : (_.status = "pending", _.then(function (X) {
                    _.status === "pending" && (_.status = "fulfilled", _.value = X)
                }, function (X) {
                    _.status === "pending" && (_.status = "rejected", _.reason = X)
                })), _.status) {
                    case "fulfilled":
                        return _.value;
                    case "rejected":
                        throw _.reason
                }
        }
        throw _
    }

    function oe(_, X, $, J, te) {
        var pe = typeof _;
        (pe === "undefined" || pe === "boolean") && (_ = null);
        var ie = !1;
        if (_ === null) ie = !0;
        else switch (pe) {
            case "bigint":
            case "string":
            case "number":
                ie = !0;
                break;
            case "object":
                switch (_.$$typeof) {
                    case s:
                    case i:
                        ie = !0;
                        break;
                    case y:
                        return ie = _._init, oe(ie(_._payload), X, $, J, te)
                }
        }
        if (ie) return te = te(_), ie = J === "" ? "." + P(_, 0) : J, F(te) ? ($ = "", ie != null && ($ = ie.replace(j, "$&/") + "/"), oe(te, X, $, "", function (Ye) {
            return Ye
        })) : te != null && (M(te) && (te = H(te, $ + (te.key == null || _ && _.key === te.key ? "" : ("" + te.key).replace(j, "$&/") + "/") + ie)), X.push(te)), 1;
        ie = 0;
        var He = J === "" ? "." : J + ":";
        if (F(_))
            for (var ye = 0; ye < _.length; ye++) J = _[ye], pe = He + P(J, ye), ie += oe(J, X, $, pe, te);
        else if (ye = S(_), typeof ye == "function")
            for (_ = ye.call(_), ye = 0; !(J = _.next()).done;) J = J.value, pe = He + P(J, ye++), ie += oe(J, X, $, pe, te);
        else if (pe === "object") {
            if (typeof _.then == "function") return oe(_e(_), X, $, J, te);
            throw X = String(_), Error("Objects are not valid as a React child (found: " + (X === "[object Object]" ? "object with keys {" + Object.keys(_).join(", ") + "}" : X) + "). If you meant to render a collection of children, use an array instead.")
        }
        return ie
    }

    function C(_, X, $) {
        if (_ == null) return _;
        var J = [],
            te = 0;
        return oe(_, J, "", "", function (pe) {
            return X.call($, pe, te++)
        }), J
    }

    function Z(_) {
        if (_._status === -1) {
            var X = _._result;
            X = X(), X.then(function ($) {
                (_._status === 0 || _._status === -1) && (_._status = 1, _._result = $)
            }, function ($) {
                (_._status === 0 || _._status === -1) && (_._status = 2, _._result = $)
            }), _._status === -1 && (_._status = 0, _._result = X)
        }
        if (_._status === 1) return _._result.default;
        throw _._result
    }
    var k = typeof reportError == "function" ? reportError : function (_) {
        if (typeof window == "object" && typeof window.ErrorEvent == "function") {
            var X = new window.ErrorEvent("error", {
                bubbles: !0,
                cancelable: !0,
                message: typeof _ == "object" && _ !== null && typeof _.message == "string" ? String(_.message) : String(_),
                error: _
            });
            if (!window.dispatchEvent(X)) return
        } else if (typeof process == "object" && typeof process.emit == "function") {
            process.emit("uncaughtException", _);
            return
        }
        console.error(_)
    };

    function le() { }
    return de.Children = {
        map: C,
        forEach: function (_, X, $) {
            C(_, function () {
                X.apply(this, arguments)
            }, $)
        },
        count: function (_) {
            var X = 0;
            return C(_, function () {
                X++
            }), X
        },
        toArray: function (_) {
            return C(_, function (X) {
                return X
            }) || []
        },
        only: function (_) {
            if (!M(_)) throw Error("React.Children.only expected to receive a single React element child.");
            return _
        }
    }, de.Component = K, de.Fragment = r, de.Profiler = o, de.PureComponent = Y, de.StrictMode = u, de.Suspense = v, de.__CLIENT_INTERNALS_DO_NOT_USE_OR_WARN_USERS_THEY_CANNOT_UPGRADE = G, de.__COMPILER_RUNTIME = {
        __proto__: null,
        c: function (_) {
            return G.H.useMemoCache(_)
        }
    }, de.cache = function (_) {
        return function () {
            return _.apply(null, arguments)
        }
    }, de.cloneElement = function (_, X, $) {
        if (_ == null) throw Error("The argument must be a React element, but you passed " + _ + ".");
        var J = O({}, _.props),
            te = _.key,
            pe = void 0;
        if (X != null)
            for (ie in X.ref !== void 0 && (pe = void 0), X.key !== void 0 && (te = "" + X.key), X) !ee.call(X, ie) || ie === "key" || ie === "__self" || ie === "__source" || ie === "ref" && X.ref === void 0 || (J[ie] = X[ie]);
        var ie = arguments.length - 2;
        if (ie === 1) J.children = $;
        else if (1 < ie) {
            for (var He = Array(ie), ye = 0; ye < ie; ye++) He[ye] = arguments[ye + 2];
            J.children = He
        }
        return ae(_.type, te, void 0, void 0, pe, J)
    }, de.createContext = function (_) {
        return _ = {
            $$typeof: m,
            _currentValue: _,
            _currentValue2: _,
            _threadCount: 0,
            Provider: null,
            Consumer: null
        }, _.Provider = _, _.Consumer = {
            $$typeof: f,
            _context: _
        }, _
    }, de.createElement = function (_, X, $) {
        var J, te = {},
            pe = null;
        if (X != null)
            for (J in X.key !== void 0 && (pe = "" + X.key), X) ee.call(X, J) && J !== "key" && J !== "__self" && J !== "__source" && (te[J] = X[J]);
        var ie = arguments.length - 2;
        if (ie === 1) te.children = $;
        else if (1 < ie) {
            for (var He = Array(ie), ye = 0; ye < ie; ye++) He[ye] = arguments[ye + 2];
            te.children = He
        }
        if (_ && _.defaultProps)
            for (J in ie = _.defaultProps, ie) te[J] === void 0 && (te[J] = ie[J]);
        return ae(_, pe, void 0, void 0, null, te)
    }, de.createRef = function () {
        return {
            current: null
        }
    }, de.forwardRef = function (_) {
        return {
            $$typeof: h,
            render: _
        }
    }, de.isValidElement = M, de.lazy = function (_) {
        return {
            $$typeof: y,
            _payload: {
                _status: -1,
                _result: _
            },
            _init: Z
        }
    }, de.memo = function (_, X) {
        return {
            $$typeof: p,
            type: _,
            compare: X === void 0 ? null : X
        }
    }, de.startTransition = function (_) {
        var X = G.T,
            $ = {};
        G.T = $;
        try {
            var J = _(),
                te = G.S;
            te !== null && te($, J), typeof J == "object" && J !== null && typeof J.then == "function" && J.then(le, k)
        } catch (pe) {
            k(pe)
        } finally {
            G.T = X
        }
    }, de.unstable_useCacheRefresh = function () {
        return G.H.useCacheRefresh()
    }, de.use = function (_) {
        return G.H.use(_)
    }, de.useActionState = function (_, X, $) {
        return G.H.useActionState(_, X, $)
    }, de.useCallback = function (_, X) {
        return G.H.useCallback(_, X)
    }, de.useContext = function (_) {
        return G.H.useContext(_)
    }, de.useDebugValue = function () { }, de.useDeferredValue = function (_, X) {
        return G.H.useDeferredValue(_, X)
    }, de.useEffect = function (_, X, $) {
        var J = G.H;
        if (typeof $ == "function") throw Error("useEffect CRUD overload is not enabled in this build of React.");
        return J.useEffect(_, X)
    }, de.useId = function () {
        return G.H.useId()
    }, de.useImperativeHandle = function (_, X, $) {
        return G.H.useImperativeHandle(_, X, $)
    }, de.useInsertionEffect = function (_, X) {
        return G.H.useInsertionEffect(_, X)
    }, de.useLayoutEffect = function (_, X) {
        return G.H.useLayoutEffect(_, X)
    }, de.useMemo = function (_, X) {
        return G.H.useMemo(_, X)
    }, de.useOptimistic = function (_, X) {
        return G.H.useOptimistic(_, X)
    }, de.useReducer = function (_, X, $) {
        return G.H.useReducer(_, X, $)
    }, de.useRef = function (_) {
        return G.H.useRef(_)
    }, de.useState = function (_) {
        return G.H.useState(_)
    }, de.useSyncExternalStore = function (_, X, $) {
        return G.H.useSyncExternalStore(_, X, $)
    }, de.useTransition = function () {
        return G.H.useTransition()
    }, de.version = "19.1.1", de
}
var Ud;

function us() {
    return Ud || (Ud = 1, Sr.exports = Im()), Sr.exports
}
var fe = us();
const qe = ep(fe);
var br = {
    exports: {}
},
    Hn = {},
    _r = {
        exports: {}
    },
    Tr = {};
/**
 * @license React
 * scheduler.production.js
 *
 * Copyright (c) Meta Platforms, Inc. and affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */
var Ld;

function Xm() {
    return Ld || (Ld = 1, (function (s) {
        function i(C, Z) {
            var k = C.length;
            C.push(Z);
            e: for (; 0 < k;) {
                var le = k - 1 >>> 1,
                    _ = C[le];
                if (0 < o(_, Z)) C[le] = Z, C[k] = _, k = le;
                else break e
            }
        }

        function r(C) {
            return C.length === 0 ? null : C[0]
        }

        function u(C) {
            if (C.length === 0) return null;
            var Z = C[0],
                k = C.pop();
            if (k !== Z) {
                C[0] = k;
                e: for (var le = 0, _ = C.length, X = _ >>> 1; le < X;) {
                    var $ = 2 * (le + 1) - 1,
                        J = C[$],
                        te = $ + 1,
                        pe = C[te];
                    if (0 > o(J, k)) te < _ && 0 > o(pe, J) ? (C[le] = pe, C[te] = k, le = te) : (C[le] = J, C[$] = k, le = $);
                    else if (te < _ && 0 > o(pe, k)) C[le] = pe, C[te] = k, le = te;
                    else break e
                }
            }
            return Z
        }

        function o(C, Z) {
            var k = C.sortIndex - Z.sortIndex;
            return k !== 0 ? k : C.id - Z.id
        }
        if (s.unstable_now = void 0, typeof performance == "object" && typeof performance.now == "function") {
            var f = performance;
            s.unstable_now = function () {
                return f.now()
            }
        } else {
            var m = Date,
                h = m.now();
            s.unstable_now = function () {
                return m.now() - h
            }
        }
        var v = [],
            p = [],
            y = 1,
            E = null,
            S = 3,
            A = !1,
            O = !1,
            V = !1,
            K = !1,
            R = typeof setTimeout == "function" ? setTimeout : null,
            Y = typeof clearTimeout == "function" ? clearTimeout : null,
            Q = typeof setImmediate < "u" ? setImmediate : null;

        function F(C) {
            for (var Z = r(p); Z !== null;) {
                if (Z.callback === null) u(p);
                else if (Z.startTime <= C) u(p), Z.sortIndex = Z.expirationTime, i(v, Z);
                else break;
                Z = r(p)
            }
        }

        function G(C) {
            if (V = !1, F(C), !O)
                if (r(v) !== null) O = !0, ee || (ee = !0, P());
                else {
                    var Z = r(p);
                    Z !== null && oe(G, Z.startTime - C)
                }
        }
        var ee = !1,
            ae = -1,
            H = 5,
            M = -1;

        function z() {
            return K ? !0 : !(s.unstable_now() - M < H)
        }

        function j() {
            if (K = !1, ee) {
                var C = s.unstable_now();
                M = C;
                var Z = !0;
                try {
                    e: {
                        O = !1,
                            V && (V = !1, Y(ae), ae = -1),
                            A = !0;
                        var k = S;
                        try {
                            t: {
                                for (F(C), E = r(v); E !== null && !(E.expirationTime > C && z());) {
                                    var le = E.callback;
                                    if (typeof le == "function") {
                                        E.callback = null, S = E.priorityLevel;
                                        var _ = le(E.expirationTime <= C);
                                        if (C = s.unstable_now(), typeof _ == "function") {
                                            E.callback = _, F(C), Z = !0;
                                            break t
                                        }
                                        E === r(v) && u(v), F(C)
                                    } else u(v);
                                    E = r(v)
                                }
                                if (E !== null) Z = !0;
                                else {
                                    var X = r(p);
                                    X !== null && oe(G, X.startTime - C), Z = !1
                                }
                            }
                            break e
                        }
                        finally {
                            E = null, S = k, A = !1
                        }
                        Z = void 0
                    }
                }
                finally {
                    Z ? P() : ee = !1
                }
            }
        }
        var P;
        if (typeof Q == "function") P = function () {
            Q(j)
        };
        else if (typeof MessageChannel < "u") {
            var re = new MessageChannel,
                _e = re.port2;
            re.port1.onmessage = j, P = function () {
                _e.postMessage(null)
            }
        } else P = function () {
            R(j, 0)
        };

        function oe(C, Z) {
            ae = R(function () {
                C(s.unstable_now())
            }, Z)
        }
        s.unstable_IdlePriority = 5, s.unstable_ImmediatePriority = 1, s.unstable_LowPriority = 4, s.unstable_NormalPriority = 3, s.unstable_Profiling = null, s.unstable_UserBlockingPriority = 2, s.unstable_cancelCallback = function (C) {
            C.callback = null
        }, s.unstable_forceFrameRate = function (C) {
            0 > C || 125 < C ? console.error("forceFrameRate takes a positive int between 0 and 125, forcing frame rates higher than 125 fps is not supported") : H = 0 < C ? Math.floor(1e3 / C) : 5
        }, s.unstable_getCurrentPriorityLevel = function () {
            return S
        }, s.unstable_next = function (C) {
            switch (S) {
                case 1:
                case 2:
                case 3:
                    var Z = 3;
                    break;
                default:
                    Z = S
            }
            var k = S;
            S = Z;
            try {
                return C()
            } finally {
                S = k
            }
        }, s.unstable_requestPaint = function () {
            K = !0
        }, s.unstable_runWithPriority = function (C, Z) {
            switch (C) {
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                    break;
                default:
                    C = 3
            }
            var k = S;
            S = C;
            try {
                return Z()
            } finally {
                S = k
            }
        }, s.unstable_scheduleCallback = function (C, Z, k) {
            var le = s.unstable_now();
            switch (typeof k == "object" && k !== null ? (k = k.delay, k = typeof k == "number" && 0 < k ? le + k : le) : k = le, C) {
                case 1:
                    var _ = -1;
                    break;
                case 2:
                    _ = 250;
                    break;
                case 5:
                    _ = 1073741823;
                    break;
                case 4:
                    _ = 1e4;
                    break;
                default:
                    _ = 5e3
            }
            return _ = k + _, C = {
                id: y++,
                callback: Z,
                priorityLevel: C,
                startTime: k,
                expirationTime: _,
                sortIndex: -1
            }, k > le ? (C.sortIndex = k, i(p, C), r(v) === null && C === r(p) && (V ? (Y(ae), ae = -1) : V = !0, oe(G, k - le))) : (C.sortIndex = _, i(v, C), O || A || (O = !0, ee || (ee = !0, P()))), C
        }, s.unstable_shouldYield = z, s.unstable_wrapCallback = function (C) {
            var Z = S;
            return function () {
                var k = S;
                S = Z;
                try {
                    return C.apply(this, arguments)
                } finally {
                    S = k
                }
            }
        }
    })(Tr)), Tr
}
var Hd;

function Qm() {
    return Hd || (Hd = 1, _r.exports = Xm()), _r.exports
}
var Or = {
    exports: {}
},
    $e = {};
/**
 * @license React
 * react-dom.production.js
 *
 * Copyright (c) Meta Platforms, Inc. and affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */
var Vd;

function Zm() {
    if (Vd) return $e;
    Vd = 1;
    var s = us();

    function i(v) {
        var p = "https://react.dev/errors/" + v;
        if (1 < arguments.length) {
            p += "?args[]=" + encodeURIComponent(arguments[1]);
            for (var y = 2; y < arguments.length; y++) p += "&args[]=" + encodeURIComponent(arguments[y])
        }
        return "Minified React error #" + v + "; visit " + p + " for the full message or use the non-minified dev environment for full errors and additional helpful warnings."
    }

    function r() { }
    var u = {
        d: {
            f: r,
            r: function () {
                throw Error(i(522))
            },
            D: r,
            C: r,
            L: r,
            m: r,
            X: r,
            S: r,
            M: r
        },
        p: 0,
        findDOMNode: null
    },
        o = Symbol.for("react.portal");

    function f(v, p, y) {
        var E = 3 < arguments.length && arguments[3] !== void 0 ? arguments[3] : null;
        return {
            $$typeof: o,
            key: E == null ? null : "" + E,
            children: v,
            containerInfo: p,
            implementation: y
        }
    }
    var m = s.__CLIENT_INTERNALS_DO_NOT_USE_OR_WARN_USERS_THEY_CANNOT_UPGRADE;

    function h(v, p) {
        if (v === "font") return "";
        if (typeof p == "string") return p === "use-credentials" ? p : ""
    }
    return $e.__DOM_INTERNALS_DO_NOT_USE_OR_WARN_USERS_THEY_CANNOT_UPGRADE = u, $e.createPortal = function (v, p) {
        var y = 2 < arguments.length && arguments[2] !== void 0 ? arguments[2] : null;
        if (!p || p.nodeType !== 1 && p.nodeType !== 9 && p.nodeType !== 11) throw Error(i(299));
        return f(v, p, null, y)
    }, $e.flushSync = function (v) {
        var p = m.T,
            y = u.p;
        try {
            if (m.T = null, u.p = 2, v) return v()
        } finally {
            m.T = p, u.p = y, u.d.f()
        }
    }, $e.preconnect = function (v, p) {
        typeof v == "string" && (p ? (p = p.crossOrigin, p = typeof p == "string" ? p === "use-credentials" ? p : "" : void 0) : p = null, u.d.C(v, p))
    }, $e.prefetchDNS = function (v) {
        typeof v == "string" && u.d.D(v)
    }, $e.preinit = function (v, p) {
        if (typeof v == "string" && p && typeof p.as == "string") {
            var y = p.as,
                E = h(y, p.crossOrigin),
                S = typeof p.integrity == "string" ? p.integrity : void 0,
                A = typeof p.fetchPriority == "string" ? p.fetchPriority : void 0;
            y === "style" ? u.d.S(v, typeof p.precedence == "string" ? p.precedence : void 0, {
                crossOrigin: E,
                integrity: S,
                fetchPriority: A
            }) : y === "script" && u.d.X(v, {
                crossOrigin: E,
                integrity: S,
                fetchPriority: A,
                nonce: typeof p.nonce == "string" ? p.nonce : void 0
            })
        }
    }, $e.preinitModule = function (v, p) {
        if (typeof v == "string")
            if (typeof p == "object" && p !== null) {
                if (p.as == null || p.as === "script") {
                    var y = h(p.as, p.crossOrigin);
                    u.d.M(v, {
                        crossOrigin: y,
                        integrity: typeof p.integrity == "string" ? p.integrity : void 0,
                        nonce: typeof p.nonce == "string" ? p.nonce : void 0
                    })
                }
            } else p == null && u.d.M(v)
    }, $e.preload = function (v, p) {
        if (typeof v == "string" && typeof p == "object" && p !== null && typeof p.as == "string") {
            var y = p.as,
                E = h(y, p.crossOrigin);
            u.d.L(v, y, {
                crossOrigin: E,
                integrity: typeof p.integrity == "string" ? p.integrity : void 0,
                nonce: typeof p.nonce == "string" ? p.nonce : void 0,
                type: typeof p.type == "string" ? p.type : void 0,
                fetchPriority: typeof p.fetchPriority == "string" ? p.fetchPriority : void 0,
                referrerPolicy: typeof p.referrerPolicy == "string" ? p.referrerPolicy : void 0,
                imageSrcSet: typeof p.imageSrcSet == "string" ? p.imageSrcSet : void 0,
                imageSizes: typeof p.imageSizes == "string" ? p.imageSizes : void 0,
                media: typeof p.media == "string" ? p.media : void 0
            })
        }
    }, $e.preloadModule = function (v, p) {
        if (typeof v == "string")
            if (p) {
                var y = h(p.as, p.crossOrigin);
                u.d.m(v, {
                    as: typeof p.as == "string" && p.as !== "script" ? p.as : void 0,
                    crossOrigin: y,
                    integrity: typeof p.integrity == "string" ? p.integrity : void 0
                })
            } else u.d.m(v)
    }, $e.requestFormReset = function (v) {
        u.d.r(v)
    }, $e.unstable_batchedUpdates = function (v, p) {
        return v(p)
    }, $e.useFormState = function (v, p, y) {
        return m.H.useFormState(v, p, y)
    }, $e.useFormStatus = function () {
        return m.H.useHostTransitionStatus()
    }, $e.version = "19.1.1", $e
}
var jd;

function Km() {
    if (jd) return Or.exports;
    jd = 1;

    function s() {
        if (!(typeof __REACT_DEVTOOLS_GLOBAL_HOOK__ > "u" || typeof __REACT_DEVTOOLS_GLOBAL_HOOK__.checkDCE != "function")) try {
            __REACT_DEVTOOLS_GLOBAL_HOOK__.checkDCE(s)
        } catch (i) {
            console.error(i)
        }
    }
    return s(), Or.exports = Zm(), Or.exports
}
/**
 * @license React
 * react-dom-client.production.js
 *
 * Copyright (c) Meta Platforms, Inc. and affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */
var Gd;

function Fm() {
    if (Gd) return Hn;
    Gd = 1;
    var s = Qm(),
        i = us(),
        r = Km();

    function u(e) {
        var t = "https://react.dev/errors/" + e;
        if (1 < arguments.length) {
            t += "?args[]=" + encodeURIComponent(arguments[1]);
            for (var l = 2; l < arguments.length; l++) t += "&args[]=" + encodeURIComponent(arguments[l])
        }
        return "Minified React error #" + e + "; visit " + t + " for the full message or use the non-minified dev environment for full errors and additional helpful warnings."
    }

    function o(e) {
        return !(!e || e.nodeType !== 1 && e.nodeType !== 9 && e.nodeType !== 11)
    }

    function f(e) {
        var t = e,
            l = e;
        if (e.alternate)
            for (; t.return;) t = t.return;
        else {
            e = t;
            do t = e, (t.flags & 4098) !== 0 && (l = t.return), e = t.return; while (e)
        }
        return t.tag === 3 ? l : null
    }

    function m(e) {
        if (e.tag === 13) {
            var t = e.memoizedState;
            if (t === null && (e = e.alternate, e !== null && (t = e.memoizedState)), t !== null) return t.dehydrated
        }
        return null
    }

    function h(e) {
        if (f(e) !== e) throw Error(u(188))
    }

    function v(e) {
        var t = e.alternate;
        if (!t) {
            if (t = f(e), t === null) throw Error(u(188));
            return t !== e ? null : e
        }
        for (var l = e, a = t; ;) {
            var n = l.return;
            if (n === null) break;
            var c = n.alternate;
            if (c === null) {
                if (a = n.return, a !== null) {
                    l = a;
                    continue
                }
                break
            }
            if (n.child === c.child) {
                for (c = n.child; c;) {
                    if (c === l) return h(n), e;
                    if (c === a) return h(n), t;
                    c = c.sibling
                }
                throw Error(u(188))
            }
            if (l.return !== a.return) l = n, a = c;
            else {
                for (var d = !1, g = n.child; g;) {
                    if (g === l) {
                        d = !0, l = n, a = c;
                        break
                    }
                    if (g === a) {
                        d = !0, a = n, l = c;
                        break
                    }
                    g = g.sibling
                }
                if (!d) {
                    for (g = c.child; g;) {
                        if (g === l) {
                            d = !0, l = c, a = n;
                            break
                        }
                        if (g === a) {
                            d = !0, a = c, l = n;
                            break
                        }
                        g = g.sibling
                    }
                    if (!d) throw Error(u(189))
                }
            }
            if (l.alternate !== a) throw Error(u(190))
        }
        if (l.tag !== 3) throw Error(u(188));
        return l.stateNode.current === l ? e : t
    }

    function p(e) {
        var t = e.tag;
        if (t === 5 || t === 26 || t === 27 || t === 6) return e;
        for (e = e.child; e !== null;) {
            if (t = p(e), t !== null) return t;
            e = e.sibling
        }
        return null
    }
    var y = Object.assign,
        E = Symbol.for("react.element"),
        S = Symbol.for("react.transitional.element"),
        A = Symbol.for("react.portal"),
        O = Symbol.for("react.fragment"),
        V = Symbol.for("react.strict_mode"),
        K = Symbol.for("react.profiler"),
        R = Symbol.for("react.provider"),
        Y = Symbol.for("react.consumer"),
        Q = Symbol.for("react.context"),
        F = Symbol.for("react.forward_ref"),
        G = Symbol.for("react.suspense"),
        ee = Symbol.for("react.suspense_list"),
        ae = Symbol.for("react.memo"),
        H = Symbol.for("react.lazy"),
        M = Symbol.for("react.activity"),
        z = Symbol.for("react.memo_cache_sentinel"),
        j = Symbol.iterator;

    function P(e) {
        return e === null || typeof e != "object" ? null : (e = j && e[j] || e["@@iterator"], typeof e == "function" ? e : null)
    }
    var re = Symbol.for("react.client.reference");

    function _e(e) {
        if (e == null) return null;
        if (typeof e == "function") return e.$$typeof === re ? null : e.displayName || e.name || null;
        if (typeof e == "string") return e;
        switch (e) {
            case O:
                return "Fragment";
            case K:
                return "Profiler";
            case V:
                return "StrictMode";
            case G:
                return "Suspense";
            case ee:
                return "SuspenseList";
            case M:
                return "Activity"
        }
        if (typeof e == "object") switch (e.$$typeof) {
            case A:
                return "Portal";
            case Q:
                return (e.displayName || "Context") + ".Provider";
            case Y:
                return (e._context.displayName || "Context") + ".Consumer";
            case F:
                var t = e.render;
                return e = e.displayName, e || (e = t.displayName || t.name || "", e = e !== "" ? "ForwardRef(" + e + ")" : "ForwardRef"), e;
            case ae:
                return t = e.displayName || null, t !== null ? t : _e(e.type) || "Memo";
            case H:
                t = e._payload, e = e._init;
                try {
                    return _e(e(t))
                } catch { }
        }
        return null
    }
    var oe = Array.isArray,
        C = i.__CLIENT_INTERNALS_DO_NOT_USE_OR_WARN_USERS_THEY_CANNOT_UPGRADE,
        Z = r.__DOM_INTERNALS_DO_NOT_USE_OR_WARN_USERS_THEY_CANNOT_UPGRADE,
        k = {
            pending: !1,
            data: null,
            method: null,
            action: null
        },
        le = [],
        _ = -1;

    function X(e) {
        return {
            current: e
        }
    }

    function $(e) {
        0 > _ || (e.current = le[_], le[_] = null, _--)
    }

    function J(e, t) {
        _++, le[_] = e.current, e.current = t
    }
    var te = X(null),
        pe = X(null),
        ie = X(null),
        He = X(null);

    function ye(e, t) {
        switch (J(ie, t), J(pe, e), J(te, null), t.nodeType) {
            case 9:
            case 11:
                e = (e = t.documentElement) && (e = e.namespaceURI) ? id(e) : 0;
                break;
            default:
                if (e = t.tagName, t = t.namespaceURI) t = id(t), e = sd(t, e);
                else switch (e) {
                    case "svg":
                        e = 1;
                        break;
                    case "math":
                        e = 2;
                        break;
                    default:
                        e = 0
                }
        }
        $(te), J(te, e)
    }

    function Ye() {
        $(te), $(pe), $(ie)
    }

    function Vt(e) {
        e.memoizedState !== null && J(He, e);
        var t = te.current,
            l = sd(t, e.type);
        t !== l && (J(pe, e), J(te, l))
    }

    function Nt(e) {
        pe.current === e && ($(te), $(pe)), He.current === e && ($(He), Mn._currentValue = k)
    }
    var Al = Object.prototype.hasOwnProperty,
        tt = s.unstable_scheduleCallback,
        jt = s.unstable_cancelCallback,
        Fl = s.unstable_shouldYield,
        Sp = s.unstable_requestPaint,
        Mt = s.unstable_now,
        bp = s.unstable_getCurrentPriorityLevel,
        Vr = s.unstable_ImmediatePriority,
        jr = s.unstable_UserBlockingPriority,
        Bn = s.unstable_NormalPriority,
        _p = s.unstable_LowPriority,
        Gr = s.unstable_IdlePriority,
        Tp = s.log,
        Op = s.unstable_setDisableYieldValue,
        Va = null,
        ut = null;

    function ll(e) {
        if (typeof Tp == "function" && Op(e), ut && typeof ut.setStrictMode == "function") try {
            ut.setStrictMode(Va, e)
        } catch { }
    }
    var rt = Math.clz32 ? Math.clz32 : Ap,
        xp = Math.log,
        wp = Math.LN2;

    function Ap(e) {
        return e >>>= 0, e === 0 ? 32 : 31 - (xp(e) / wp | 0) | 0
    }
    var qn = 256,
        Yn = 4194304;

    function Cl(e) {
        var t = e & 42;
        if (t !== 0) return t;
        switch (e & -e) {
            case 1:
                return 1;
            case 2:
                return 2;
            case 4:
                return 4;
            case 8:
                return 8;
            case 16:
                return 16;
            case 32:
                return 32;
            case 64:
                return 64;
            case 128:
                return 128;
            case 256:
            case 512:
            case 1024:
            case 2048:
            case 4096:
            case 8192:
            case 16384:
            case 32768:
            case 65536:
            case 131072:
            case 262144:
            case 524288:
            case 1048576:
            case 2097152:
                return e & 4194048;
            case 4194304:
            case 8388608:
            case 16777216:
            case 33554432:
                return e & 62914560;
            case 67108864:
                return 67108864;
            case 134217728:
                return 134217728;
            case 268435456:
                return 268435456;
            case 536870912:
                return 536870912;
            case 1073741824:
                return 0;
            default:
                return e
        }
    }

    function In(e, t, l) {
        var a = e.pendingLanes;
        if (a === 0) return 0;
        var n = 0,
            c = e.suspendedLanes,
            d = e.pingedLanes;
        e = e.warmLanes;
        var g = a & 134217727;
        return g !== 0 ? (a = g & ~c, a !== 0 ? n = Cl(a) : (d &= g, d !== 0 ? n = Cl(d) : l || (l = g & ~e, l !== 0 && (n = Cl(l))))) : (g = a & ~c, g !== 0 ? n = Cl(g) : d !== 0 ? n = Cl(d) : l || (l = a & ~e, l !== 0 && (n = Cl(l)))), n === 0 ? 0 : t !== 0 && t !== n && (t & c) === 0 && (c = n & -n, l = t & -t, c >= l || c === 32 && (l & 4194048) !== 0) ? t : n
    }

    function ja(e, t) {
        return (e.pendingLanes & ~(e.suspendedLanes & ~e.pingedLanes) & t) === 0
    }

    function Cp(e, t) {
        switch (e) {
            case 1:
            case 2:
            case 4:
            case 8:
            case 64:
                return t + 250;
            case 16:
            case 32:
            case 128:
            case 256:
            case 512:
            case 1024:
            case 2048:
            case 4096:
            case 8192:
            case 16384:
            case 32768:
            case 65536:
            case 131072:
            case 262144:
            case 524288:
            case 1048576:
            case 2097152:
                return t + 5e3;
            case 4194304:
            case 8388608:
            case 16777216:
            case 33554432:
                return -1;
            case 67108864:
            case 134217728:
            case 268435456:
            case 536870912:
            case 1073741824:
                return -1;
            default:
                return -1
        }
    }

    function Br() {
        var e = qn;
        return qn <<= 1, (qn & 4194048) === 0 && (qn = 256), e
    }

    function qr() {
        var e = Yn;
        return Yn <<= 1, (Yn & 62914560) === 0 && (Yn = 4194304), e
    }

    function rs(e) {
        for (var t = [], l = 0; 31 > l; l++) t.push(e);
        return t
    }

    function Ga(e, t) {
        e.pendingLanes |= t, t !== 268435456 && (e.suspendedLanes = 0, e.pingedLanes = 0, e.warmLanes = 0)
    }

    function Np(e, t, l, a, n, c) {
        var d = e.pendingLanes;
        e.pendingLanes = l, e.suspendedLanes = 0, e.pingedLanes = 0, e.warmLanes = 0, e.expiredLanes &= l, e.entangledLanes &= l, e.errorRecoveryDisabledLanes &= l, e.shellSuspendCounter = 0;
        var g = e.entanglements,
            b = e.expirationTimes,
            D = e.hiddenUpdates;
        for (l = d & ~l; 0 < l;) {
            var B = 31 - rt(l),
                I = 1 << B;
            g[B] = 0, b[B] = -1;
            var U = D[B];
            if (U !== null)
                for (D[B] = null, B = 0; B < U.length; B++) {
                    var L = U[B];
                    L !== null && (L.lane &= -536870913)
                }
            l &= ~I
        }
        a !== 0 && Yr(e, a, 0), c !== 0 && n === 0 && e.tag !== 0 && (e.suspendedLanes |= c & ~(d & ~t))
    }

    function Yr(e, t, l) {
        e.pendingLanes |= t, e.suspendedLanes &= ~t;
        var a = 31 - rt(t);
        e.entangledLanes |= t, e.entanglements[a] = e.entanglements[a] | 1073741824 | l & 4194090
    }

    function Ir(e, t) {
        var l = e.entangledLanes |= t;
        for (e = e.entanglements; l;) {
            var a = 31 - rt(l),
                n = 1 << a;
            n & t | e[a] & t && (e[a] |= t), l &= ~n
        }
    }

    function cs(e) {
        switch (e) {
            case 2:
                e = 1;
                break;
            case 8:
                e = 4;
                break;
            case 32:
                e = 16;
                break;
            case 256:
            case 512:
            case 1024:
            case 2048:
            case 4096:
            case 8192:
            case 16384:
            case 32768:
            case 65536:
            case 131072:
            case 262144:
            case 524288:
            case 1048576:
            case 2097152:
            case 4194304:
            case 8388608:
            case 16777216:
            case 33554432:
                e = 128;
                break;
            case 268435456:
                e = 134217728;
                break;
            default:
                e = 0
        }
        return e
    }

    function fs(e) {
        return e &= -e, 2 < e ? 8 < e ? (e & 134217727) !== 0 ? 32 : 268435456 : 8 : 2
    }

    function Xr() {
        var e = Z.p;
        return e !== 0 ? e : (e = window.event, e === void 0 ? 32 : xd(e.type))
    }

    function Mp(e, t) {
        var l = Z.p;
        try {
            return Z.p = e, t()
        } finally {
            Z.p = l
        }
    }
    var al = Math.random().toString(36).slice(2),
        Je = "__reactFiber$" + al,
        lt = "__reactProps$" + al,
        Pl = "__reactContainer$" + al,
        os = "__reactEvents$" + al,
        Dp = "__reactListeners$" + al,
        zp = "__reactHandles$" + al,
        Qr = "__reactResources$" + al,
        Ba = "__reactMarker$" + al;

    function ds(e) {
        delete e[Je], delete e[lt], delete e[os], delete e[Dp], delete e[zp]
    }

    function Jl(e) {
        var t = e[Je];
        if (t) return t;
        for (var l = e.parentNode; l;) {
            if (t = l[Pl] || l[Je]) {
                if (l = t.alternate, t.child !== null || l !== null && l.child !== null)
                    for (e = fd(e); e !== null;) {
                        if (l = e[Je]) return l;
                        e = fd(e)
                    }
                return t
            }
            e = l, l = e.parentNode
        }
        return null
    }

    function kl(e) {
        if (e = e[Je] || e[Pl]) {
            var t = e.tag;
            if (t === 5 || t === 6 || t === 13 || t === 26 || t === 27 || t === 3) return e
        }
        return null
    }

    function qa(e) {
        var t = e.tag;
        if (t === 5 || t === 26 || t === 27 || t === 6) return e.stateNode;
        throw Error(u(33))
    }

    function $l(e) {
        var t = e[Qr];
        return t || (t = e[Qr] = {
            hoistableStyles: new Map,
            hoistableScripts: new Map
        }), t
    }

    function Ie(e) {
        e[Ba] = !0
    }
    var Zr = new Set,
        Kr = {};

    function Nl(e, t) {
        Wl(e, t), Wl(e + "Capture", t)
    }

    function Wl(e, t) {
        for (Kr[e] = t, e = 0; e < t.length; e++) Zr.add(t[e])
    }
    var Rp = RegExp("^[:A-Z_a-z\\u00C0-\\u00D6\\u00D8-\\u00F6\\u00F8-\\u02FF\\u0370-\\u037D\\u037F-\\u1FFF\\u200C-\\u200D\\u2070-\\u218F\\u2C00-\\u2FEF\\u3001-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFFD][:A-Z_a-z\\u00C0-\\u00D6\\u00D8-\\u00F6\\u00F8-\\u02FF\\u0370-\\u037D\\u037F-\\u1FFF\\u200C-\\u200D\\u2070-\\u218F\\u2C00-\\u2FEF\\u3001-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFFD\\-.0-9\\u00B7\\u0300-\\u036F\\u203F-\\u2040]*$"),
        Fr = {},
        Pr = {};

    function Up(e) {
        return Al.call(Pr, e) ? !0 : Al.call(Fr, e) ? !1 : Rp.test(e) ? Pr[e] = !0 : (Fr[e] = !0, !1)
    }

    function Xn(e, t, l) {
        if (Up(t))
            if (l === null) e.removeAttribute(t);
            else {
                switch (typeof l) {
                    case "undefined":
                    case "function":
                    case "symbol":
                        e.removeAttribute(t);
                        return;
                    case "boolean":
                        var a = t.toLowerCase().slice(0, 5);
                        if (a !== "data-" && a !== "aria-") {
                            e.removeAttribute(t);
                            return
                        }
                }
                e.setAttribute(t, "" + l)
            }
    }

    function Qn(e, t, l) {
        if (l === null) e.removeAttribute(t);
        else {
            switch (typeof l) {
                case "undefined":
                case "function":
                case "symbol":
                case "boolean":
                    e.removeAttribute(t);
                    return
            }
            e.setAttribute(t, "" + l)
        }
    }

    function Gt(e, t, l, a) {
        if (a === null) e.removeAttribute(l);
        else {
            switch (typeof a) {
                case "undefined":
                case "function":
                case "symbol":
                case "boolean":
                    e.removeAttribute(l);
                    return
            }
            e.setAttributeNS(t, l, "" + a)
        }
    }
    var ps, Jr;

    function ea(e) {
        if (ps === void 0) try {
            throw Error()
        } catch (l) {
            var t = l.stack.trim().match(/\n( *(at )?)/);
            ps = t && t[1] || "", Jr = -1 < l.stack.indexOf(`
    at`) ? " (<anonymous>)" : -1 < l.stack.indexOf("@") ? "@unknown:0:0" : ""
        }
        return `
` + ps + e + Jr
    }
    var hs = !1;

    function ms(e, t) {
        if (!e || hs) return "";
        hs = !0;
        var l = Error.prepareStackTrace;
        Error.prepareStackTrace = void 0;
        try {
            var a = {
                DetermineComponentFrameRoot: function () {
                    try {
                        if (t) {
                            var I = function () {
                                throw Error()
                            };
                            if (Object.defineProperty(I.prototype, "props", {
                                set: function () {
                                    throw Error()
                                }
                            }), typeof Reflect == "object" && Reflect.construct) {
                                try {
                                    Reflect.construct(I, [])
                                } catch (L) {
                                    var U = L
                                }
                                Reflect.construct(e, [], I)
                            } else {
                                try {
                                    I.call()
                                } catch (L) {
                                    U = L
                                }
                                e.call(I.prototype)
                            }
                        } else {
                            try {
                                throw Error()
                            } catch (L) {
                                U = L
                            } (I = e()) && typeof I.catch == "function" && I.catch(function () { })
                        }
                    } catch (L) {
                        if (L && U && typeof L.stack == "string") return [L.stack, U.stack]
                    }
                    return [null, null]
                }
            };
            a.DetermineComponentFrameRoot.displayName = "DetermineComponentFrameRoot";
            var n = Object.getOwnPropertyDescriptor(a.DetermineComponentFrameRoot, "name");
            n && n.configurable && Object.defineProperty(a.DetermineComponentFrameRoot, "name", {
                value: "DetermineComponentFrameRoot"
            });
            var c = a.DetermineComponentFrameRoot(),
                d = c[0],
                g = c[1];
            if (d && g) {
                var b = d.split(`
`),
                    D = g.split(`
`);
                for (n = a = 0; a < b.length && !b[a].includes("DetermineComponentFrameRoot");) a++;
                for (; n < D.length && !D[n].includes("DetermineComponentFrameRoot");) n++;
                if (a === b.length || n === D.length)
                    for (a = b.length - 1, n = D.length - 1; 1 <= a && 0 <= n && b[a] !== D[n];) n--;
                for (; 1 <= a && 0 <= n; a--, n--)
                    if (b[a] !== D[n]) {
                        if (a !== 1 || n !== 1)
                            do
                                if (a--, n--, 0 > n || b[a] !== D[n]) {
                                    var B = `
` + b[a].replace(" at new ", " at ");
                                    return e.displayName && B.includes("<anonymous>") && (B = B.replace("<anonymous>", e.displayName)), B
                                } while (1 <= a && 0 <= n);
                        break
                    }
            }
        } finally {
            hs = !1, Error.prepareStackTrace = l
        }
        return (l = e ? e.displayName || e.name : "") ? ea(l) : ""
    }

    function Lp(e) {
        switch (e.tag) {
            case 26:
            case 27:
            case 5:
                return ea(e.type);
            case 16:
                return ea("Lazy");
            case 13:
                return ea("Suspense");
            case 19:
                return ea("SuspenseList");
            case 0:
            case 15:
                return ms(e.type, !1);
            case 11:
                return ms(e.type.render, !1);
            case 1:
                return ms(e.type, !0);
            case 31:
                return ea("Activity");
            default:
                return ""
        }
    }

    function kr(e) {
        try {
            var t = "";
            do t += Lp(e), e = e.return; while (e);
            return t
        } catch (l) {
            return `
Error generating stack: ` + l.message + `
` + l.stack
        }
    }

    function gt(e) {
        switch (typeof e) {
            case "bigint":
            case "boolean":
            case "number":
            case "string":
            case "undefined":
                return e;
            case "object":
                return e;
            default:
                return ""
        }
    }

    function $r(e) {
        var t = e.type;
        return (e = e.nodeName) && e.toLowerCase() === "input" && (t === "checkbox" || t === "radio")
    }

    function Hp(e) {
        var t = $r(e) ? "checked" : "value",
            l = Object.getOwnPropertyDescriptor(e.constructor.prototype, t),
            a = "" + e[t];
        if (!e.hasOwnProperty(t) && typeof l < "u" && typeof l.get == "function" && typeof l.set == "function") {
            var n = l.get,
                c = l.set;
            return Object.defineProperty(e, t, {
                configurable: !0,
                get: function () {
                    return n.call(this)
                },
                set: function (d) {
                    a = "" + d, c.call(this, d)
                }
            }), Object.defineProperty(e, t, {
                enumerable: l.enumerable
            }), {
                getValue: function () {
                    return a
                },
                setValue: function (d) {
                    a = "" + d
                },
                stopTracking: function () {
                    e._valueTracker = null, delete e[t]
                }
            }
        }
    }

    function Zn(e) {
        e._valueTracker || (e._valueTracker = Hp(e))
    }

    function Wr(e) {
        if (!e) return !1;
        var t = e._valueTracker;
        if (!t) return !0;
        var l = t.getValue(),
            a = "";
        return e && (a = $r(e) ? e.checked ? "true" : "false" : e.value), e = a, e !== l ? (t.setValue(e), !0) : !1
    }

    function Kn(e) {
        if (e = e || (typeof document < "u" ? document : void 0), typeof e > "u") return null;
        try {
            return e.activeElement || e.body
        } catch {
            return e.body
        }
    }
    var Vp = /[\n"\\]/g;

    function yt(e) {
        return e.replace(Vp, function (t) {
            return "\\" + t.charCodeAt(0).toString(16) + " "
        })
    }

    function vs(e, t, l, a, n, c, d, g) {
        e.name = "", d != null && typeof d != "function" && typeof d != "symbol" && typeof d != "boolean" ? e.type = d : e.removeAttribute("type"), t != null ? d === "number" ? (t === 0 && e.value === "" || e.value != t) && (e.value = "" + gt(t)) : e.value !== "" + gt(t) && (e.value = "" + gt(t)) : d !== "submit" && d !== "reset" || e.removeAttribute("value"), t != null ? gs(e, d, gt(t)) : l != null ? gs(e, d, gt(l)) : a != null && e.removeAttribute("value"), n == null && c != null && (e.defaultChecked = !!c), n != null && (e.checked = n && typeof n != "function" && typeof n != "symbol"), g != null && typeof g != "function" && typeof g != "symbol" && typeof g != "boolean" ? e.name = "" + gt(g) : e.removeAttribute("name")
    }

    function ec(e, t, l, a, n, c, d, g) {
        if (c != null && typeof c != "function" && typeof c != "symbol" && typeof c != "boolean" && (e.type = c), t != null || l != null) {
            if (!(c !== "submit" && c !== "reset" || t != null)) return;
            l = l != null ? "" + gt(l) : "", t = t != null ? "" + gt(t) : l, g || t === e.value || (e.value = t), e.defaultValue = t
        }
        a = a ?? n, a = typeof a != "function" && typeof a != "symbol" && !!a, e.checked = g ? e.checked : !!a, e.defaultChecked = !!a, d != null && typeof d != "function" && typeof d != "symbol" && typeof d != "boolean" && (e.name = d)
    }

    function gs(e, t, l) {
        t === "number" && Kn(e.ownerDocument) === e || e.defaultValue === "" + l || (e.defaultValue = "" + l)
    }

    function ta(e, t, l, a) {
        if (e = e.options, t) {
            t = {};
            for (var n = 0; n < l.length; n++) t["$" + l[n]] = !0;
            for (l = 0; l < e.length; l++) n = t.hasOwnProperty("$" + e[l].value), e[l].selected !== n && (e[l].selected = n), n && a && (e[l].defaultSelected = !0)
        } else {
            for (l = "" + gt(l), t = null, n = 0; n < e.length; n++) {
                if (e[n].value === l) {
                    e[n].selected = !0, a && (e[n].defaultSelected = !0);
                    return
                }
                t !== null || e[n].disabled || (t = e[n])
            }
            t !== null && (t.selected = !0)
        }
    }

    function tc(e, t, l) {
        if (t != null && (t = "" + gt(t), t !== e.value && (e.value = t), l == null)) {
            e.defaultValue !== t && (e.defaultValue = t);
            return
        }
        e.defaultValue = l != null ? "" + gt(l) : ""
    }

    function lc(e, t, l, a) {
        if (t == null) {
            if (a != null) {
                if (l != null) throw Error(u(92));
                if (oe(a)) {
                    if (1 < a.length) throw Error(u(93));
                    a = a[0]
                }
                l = a
            }
            l == null && (l = ""), t = l
        }
        l = gt(t), e.defaultValue = l, a = e.textContent, a === l && a !== "" && a !== null && (e.value = a)
    }

    function la(e, t) {
        if (t) {
            var l = e.firstChild;
            if (l && l === e.lastChild && l.nodeType === 3) {
                l.nodeValue = t;
                return
            }
        }
        e.textContent = t
    }
    var jp = new Set("animationIterationCount aspectRatio borderImageOutset borderImageSlice borderImageWidth boxFlex boxFlexGroup boxOrdinalGroup columnCount columns flex flexGrow flexPositive flexShrink flexNegative flexOrder gridArea gridRow gridRowEnd gridRowSpan gridRowStart gridColumn gridColumnEnd gridColumnSpan gridColumnStart fontWeight lineClamp lineHeight opacity order orphans scale tabSize widows zIndex zoom fillOpacity floodOpacity stopOpacity strokeDasharray strokeDashoffset strokeMiterlimit strokeOpacity strokeWidth MozAnimationIterationCount MozBoxFlex MozBoxFlexGroup MozLineClamp msAnimationIterationCount msFlex msZoom msFlexGrow msFlexNegative msFlexOrder msFlexPositive msFlexShrink msGridColumn msGridColumnSpan msGridRow msGridRowSpan WebkitAnimationIterationCount WebkitBoxFlex WebKitBoxFlexGroup WebkitBoxOrdinalGroup WebkitColumnCount WebkitColumns WebkitFlex WebkitFlexGrow WebkitFlexPositive WebkitFlexShrink WebkitLineClamp".split(" "));

    function ac(e, t, l) {
        var a = t.indexOf("--") === 0;
        l == null || typeof l == "boolean" || l === "" ? a ? e.setProperty(t, "") : t === "float" ? e.cssFloat = "" : e[t] = "" : a ? e.setProperty(t, l) : typeof l != "number" || l === 0 || jp.has(t) ? t === "float" ? e.cssFloat = l : e[t] = ("" + l).trim() : e[t] = l + "px"
    }

    function nc(e, t, l) {
        if (t != null && typeof t != "object") throw Error(u(62));
        if (e = e.style, l != null) {
            for (var a in l) !l.hasOwnProperty(a) || t != null && t.hasOwnProperty(a) || (a.indexOf("--") === 0 ? e.setProperty(a, "") : a === "float" ? e.cssFloat = "" : e[a] = "");
            for (var n in t) a = t[n], t.hasOwnProperty(n) && l[n] !== a && ac(e, n, a)
        } else
            for (var c in t) t.hasOwnProperty(c) && ac(e, c, t[c])
    }

    function ys(e) {
        if (e.indexOf("-") === -1) return !1;
        switch (e) {
            case "annotation-xml":
            case "color-profile":
            case "font-face":
            case "font-face-src":
            case "font-face-uri":
            case "font-face-format":
            case "font-face-name":
            case "missing-glyph":
                return !1;
            default:
                return !0
        }
    }
    var Gp = new Map([
        ["acceptCharset", "accept-charset"],
        ["htmlFor", "for"],
        ["httpEquiv", "http-equiv"],
        ["crossOrigin", "crossorigin"],
        ["accentHeight", "accent-height"],
        ["alignmentBaseline", "alignment-baseline"],
        ["arabicForm", "arabic-form"],
        ["baselineShift", "baseline-shift"],
        ["capHeight", "cap-height"],
        ["clipPath", "clip-path"],
        ["clipRule", "clip-rule"],
        ["colorInterpolation", "color-interpolation"],
        ["colorInterpolationFilters", "color-interpolation-filters"],
        ["colorProfile", "color-profile"],
        ["colorRendering", "color-rendering"],
        ["dominantBaseline", "dominant-baseline"],
        ["enableBackground", "enable-background"],
        ["fillOpacity", "fill-opacity"],
        ["fillRule", "fill-rule"],
        ["floodColor", "flood-color"],
        ["floodOpacity", "flood-opacity"],
        ["fontFamily", "font-family"],
        ["fontSize", "font-size"],
        ["fontSizeAdjust", "font-size-adjust"],
        ["fontStretch", "font-stretch"],
        ["fontStyle", "font-style"],
        ["fontVariant", "font-variant"],
        ["fontWeight", "font-weight"],
        ["glyphName", "glyph-name"],
        ["glyphOrientationHorizontal", "glyph-orientation-horizontal"],
        ["glyphOrientationVertical", "glyph-orientation-vertical"],
        ["horizAdvX", "horiz-adv-x"],
        ["horizOriginX", "horiz-origin-x"],
        ["imageRendering", "image-rendering"],
        ["letterSpacing", "letter-spacing"],
        ["lightingColor", "lighting-color"],
        ["markerEnd", "marker-end"],
        ["markerMid", "marker-mid"],
        ["markerStart", "marker-start"],
        ["overlinePosition", "overline-position"],
        ["overlineThickness", "overline-thickness"],
        ["paintOrder", "paint-order"],
        ["panose-1", "panose-1"],
        ["pointerEvents", "pointer-events"],
        ["renderingIntent", "rendering-intent"],
        ["shapeRendering", "shape-rendering"],
        ["stopColor", "stop-color"],
        ["stopOpacity", "stop-opacity"],
        ["strikethroughPosition", "strikethrough-position"],
        ["strikethroughThickness", "strikethrough-thickness"],
        ["strokeDasharray", "stroke-dasharray"],
        ["strokeDashoffset", "stroke-dashoffset"],
        ["strokeLinecap", "stroke-linecap"],
        ["strokeLinejoin", "stroke-linejoin"],
        ["strokeMiterlimit", "stroke-miterlimit"],
        ["strokeOpacity", "stroke-opacity"],
        ["strokeWidth", "stroke-width"],
        ["textAnchor", "text-anchor"],
        ["textDecoration", "text-decoration"],
        ["textRendering", "text-rendering"],
        ["transformOrigin", "transform-origin"],
        ["underlinePosition", "underline-position"],
        ["underlineThickness", "underline-thickness"],
        ["unicodeBidi", "unicode-bidi"],
        ["unicodeRange", "unicode-range"],
        ["unitsPerEm", "units-per-em"],
        ["vAlphabetic", "v-alphabetic"],
        ["vHanging", "v-hanging"],
        ["vIdeographic", "v-ideographic"],
        ["vMathematical", "v-mathematical"],
        ["vectorEffect", "vector-effect"],
        ["vertAdvY", "vert-adv-y"],
        ["vertOriginX", "vert-origin-x"],
        ["vertOriginY", "vert-origin-y"],
        ["wordSpacing", "word-spacing"],
        ["writingMode", "writing-mode"],
        ["xmlnsXlink", "xmlns:xlink"],
        ["xHeight", "x-height"]
    ]),
        Bp = /^[\u0000-\u001F ]*j[\r\n\t]*a[\r\n\t]*v[\r\n\t]*a[\r\n\t]*s[\r\n\t]*c[\r\n\t]*r[\r\n\t]*i[\r\n\t]*p[\r\n\t]*t[\r\n\t]*:/i;

    function Fn(e) {
        return Bp.test("" + e) ? "javascript:throw new Error('React has blocked a javascript: URL as a security precaution.')" : e
    }
    var Es = null;

    function Ss(e) {
        return e = e.target || e.srcElement || window, e.correspondingUseElement && (e = e.correspondingUseElement), e.nodeType === 3 ? e.parentNode : e
    }
    var aa = null,
        na = null;

    function ic(e) {
        var t = kl(e);
        if (t && (e = t.stateNode)) {
            var l = e[lt] || null;
            e: switch (e = t.stateNode, t.type) {
                case "input":
                    if (vs(e, l.value, l.defaultValue, l.defaultValue, l.checked, l.defaultChecked, l.type, l.name), t = l.name, l.type === "radio" && t != null) {
                        for (l = e; l.parentNode;) l = l.parentNode;
                        for (l = l.querySelectorAll('input[name="' + yt("" + t) + '"][type="radio"]'), t = 0; t < l.length; t++) {
                            var a = l[t];
                            if (a !== e && a.form === e.form) {
                                var n = a[lt] || null;
                                if (!n) throw Error(u(90));
                                vs(a, n.value, n.defaultValue, n.defaultValue, n.checked, n.defaultChecked, n.type, n.name)
                            }
                        }
                        for (t = 0; t < l.length; t++) a = l[t], a.form === e.form && Wr(a)
                    }
                    break e;
                case "textarea":
                    tc(e, l.value, l.defaultValue);
                    break e;
                case "select":
                    t = l.value, t != null && ta(e, !!l.multiple, t, !1)
            }
        }
    }
    var bs = !1;

    function sc(e, t, l) {
        if (bs) return e(t, l);
        bs = !0;
        try {
            var a = e(t);
            return a
        } finally {
            if (bs = !1, (aa !== null || na !== null) && (Ri(), aa && (t = aa, e = na, na = aa = null, ic(t), e)))
                for (t = 0; t < e.length; t++) ic(e[t])
        }
    }

    function Ya(e, t) {
        var l = e.stateNode;
        if (l === null) return null;
        var a = l[lt] || null;
        if (a === null) return null;
        l = a[t];
        e: switch (t) {
            case "onClick":
            case "onClickCapture":
            case "onDoubleClick":
            case "onDoubleClickCapture":
            case "onMouseDown":
            case "onMouseDownCapture":
            case "onMouseMove":
            case "onMouseMoveCapture":
            case "onMouseUp":
            case "onMouseUpCapture":
            case "onMouseEnter":
                (a = !a.disabled) || (e = e.type, a = !(e === "button" || e === "input" || e === "select" || e === "textarea")), e = !a;
                break e;
            default:
                e = !1
        }
        if (e) return null;
        if (l && typeof l != "function") throw Error(u(231, t, typeof l));
        return l
    }
    var Bt = !(typeof window > "u" || typeof window.document > "u" || typeof window.document.createElement > "u"),
        _s = !1;
    if (Bt) try {
        var Ia = {};
        Object.defineProperty(Ia, "passive", {
            get: function () {
                _s = !0
            }
        }), window.addEventListener("test", Ia, Ia), window.removeEventListener("test", Ia, Ia)
    } catch {
        _s = !1
    }
    var nl = null,
        Ts = null,
        Pn = null;

    function uc() {
        if (Pn) return Pn;
        var e, t = Ts,
            l = t.length,
            a, n = "value" in nl ? nl.value : nl.textContent,
            c = n.length;
        for (e = 0; e < l && t[e] === n[e]; e++);
        var d = l - e;
        for (a = 1; a <= d && t[l - a] === n[c - a]; a++);
        return Pn = n.slice(e, 1 < a ? 1 - a : void 0)
    }

    function Jn(e) {
        var t = e.keyCode;
        return "charCode" in e ? (e = e.charCode, e === 0 && t === 13 && (e = 13)) : e = t, e === 10 && (e = 13), 32 <= e || e === 13 ? e : 0
    }

    function kn() {
        return !0
    }

    function rc() {
        return !1
    }

    function at(e) {
        function t(l, a, n, c, d) {
            this._reactName = l, this._targetInst = n, this.type = a, this.nativeEvent = c, this.target = d, this.currentTarget = null;
            for (var g in e) e.hasOwnProperty(g) && (l = e[g], this[g] = l ? l(c) : c[g]);
            return this.isDefaultPrevented = (c.defaultPrevented != null ? c.defaultPrevented : c.returnValue === !1) ? kn : rc, this.isPropagationStopped = rc, this
        }
        return y(t.prototype, {
            preventDefault: function () {
                this.defaultPrevented = !0;
                var l = this.nativeEvent;
                l && (l.preventDefault ? l.preventDefault() : typeof l.returnValue != "unknown" && (l.returnValue = !1), this.isDefaultPrevented = kn)
            },
            stopPropagation: function () {
                var l = this.nativeEvent;
                l && (l.stopPropagation ? l.stopPropagation() : typeof l.cancelBubble != "unknown" && (l.cancelBubble = !0), this.isPropagationStopped = kn)
            },
            persist: function () { },
            isPersistent: kn
        }), t
    }
    var Ml = {
        eventPhase: 0,
        bubbles: 0,
        cancelable: 0,
        timeStamp: function (e) {
            return e.timeStamp || Date.now()
        },
        defaultPrevented: 0,
        isTrusted: 0
    },
        $n = at(Ml),
        Xa = y({}, Ml, {
            view: 0,
            detail: 0
        }),
        qp = at(Xa),
        Os, xs, Qa, Wn = y({}, Xa, {
            screenX: 0,
            screenY: 0,
            clientX: 0,
            clientY: 0,
            pageX: 0,
            pageY: 0,
            ctrlKey: 0,
            shiftKey: 0,
            altKey: 0,
            metaKey: 0,
            getModifierState: As,
            button: 0,
            buttons: 0,
            relatedTarget: function (e) {
                return e.relatedTarget === void 0 ? e.fromElement === e.srcElement ? e.toElement : e.fromElement : e.relatedTarget
            },
            movementX: function (e) {
                return "movementX" in e ? e.movementX : (e !== Qa && (Qa && e.type === "mousemove" ? (Os = e.screenX - Qa.screenX, xs = e.screenY - Qa.screenY) : xs = Os = 0, Qa = e), Os)
            },
            movementY: function (e) {
                return "movementY" in e ? e.movementY : xs
            }
        }),
        cc = at(Wn),
        Yp = y({}, Wn, {
            dataTransfer: 0
        }),
        Ip = at(Yp),
        Xp = y({}, Xa, {
            relatedTarget: 0
        }),
        ws = at(Xp),
        Qp = y({}, Ml, {
            animationName: 0,
            elapsedTime: 0,
            pseudoElement: 0
        }),
        Zp = at(Qp),
        Kp = y({}, Ml, {
            clipboardData: function (e) {
                return "clipboardData" in e ? e.clipboardData : window.clipboardData
            }
        }),
        Fp = at(Kp),
        Pp = y({}, Ml, {
            data: 0
        }),
        fc = at(Pp),
        Jp = {
            Esc: "Escape",
            Spacebar: " ",
            Left: "ArrowLeft",
            Up: "ArrowUp",
            Right: "ArrowRight",
            Down: "ArrowDown",
            Del: "Delete",
            Win: "OS",
            Menu: "ContextMenu",
            Apps: "ContextMenu",
            Scroll: "ScrollLock",
            MozPrintableKey: "Unidentified"
        },
        kp = {
            8: "Backspace",
            9: "Tab",
            12: "Clear",
            13: "Enter",
            16: "Shift",
            17: "Control",
            18: "Alt",
            19: "Pause",
            20: "CapsLock",
            27: "Escape",
            32: " ",
            33: "PageUp",
            34: "PageDown",
            35: "End",
            36: "Home",
            37: "ArrowLeft",
            38: "ArrowUp",
            39: "ArrowRight",
            40: "ArrowDown",
            45: "Insert",
            46: "Delete",
            112: "F1",
            113: "F2",
            114: "F3",
            115: "F4",
            116: "F5",
            117: "F6",
            118: "F7",
            119: "F8",
            120: "F9",
            121: "F10",
            122: "F11",
            123: "F12",
            144: "NumLock",
            145: "ScrollLock",
            224: "Meta"
        },
        $p = {
            Alt: "altKey",
            Control: "ctrlKey",
            Meta: "metaKey",
            Shift: "shiftKey"
        };

    function Wp(e) {
        var t = this.nativeEvent;
        return t.getModifierState ? t.getModifierState(e) : (e = $p[e]) ? !!t[e] : !1
    }

    function As() {
        return Wp
    }
    var eh = y({}, Xa, {
        key: function (e) {
            if (e.key) {
                var t = Jp[e.key] || e.key;
                if (t !== "Unidentified") return t
            }
            return e.type === "keypress" ? (e = Jn(e), e === 13 ? "Enter" : String.fromCharCode(e)) : e.type === "keydown" || e.type === "keyup" ? kp[e.keyCode] || "Unidentified" : ""
        },
        code: 0,
        location: 0,
        ctrlKey: 0,
        shiftKey: 0,
        altKey: 0,
        metaKey: 0,
        repeat: 0,
        locale: 0,
        getModifierState: As,
        charCode: function (e) {
            return e.type === "keypress" ? Jn(e) : 0
        },
        keyCode: function (e) {
            return e.type === "keydown" || e.type === "keyup" ? e.keyCode : 0
        },
        which: function (e) {
            return e.type === "keypress" ? Jn(e) : e.type === "keydown" || e.type === "keyup" ? e.keyCode : 0
        }
    }),
        th = at(eh),
        lh = y({}, Wn, {
            pointerId: 0,
            width: 0,
            height: 0,
            pressure: 0,
            tangentialPressure: 0,
            tiltX: 0,
            tiltY: 0,
            twist: 0,
            pointerType: 0,
            isPrimary: 0
        }),
        oc = at(lh),
        ah = y({}, Xa, {
            touches: 0,
            targetTouches: 0,
            changedTouches: 0,
            altKey: 0,
            metaKey: 0,
            ctrlKey: 0,
            shiftKey: 0,
            getModifierState: As
        }),
        nh = at(ah),
        ih = y({}, Ml, {
            propertyName: 0,
            elapsedTime: 0,
            pseudoElement: 0
        }),
        sh = at(ih),
        uh = y({}, Wn, {
            deltaX: function (e) {
                return "deltaX" in e ? e.deltaX : "wheelDeltaX" in e ? -e.wheelDeltaX : 0
            },
            deltaY: function (e) {
                return "deltaY" in e ? e.deltaY : "wheelDeltaY" in e ? -e.wheelDeltaY : "wheelDelta" in e ? -e.wheelDelta : 0
            },
            deltaZ: 0,
            deltaMode: 0
        }),
        rh = at(uh),
        ch = y({}, Ml, {
            newState: 0,
            oldState: 0
        }),
        fh = at(ch),
        oh = [9, 13, 27, 32],
        Cs = Bt && "CompositionEvent" in window,
        Za = null;
    Bt && "documentMode" in document && (Za = document.documentMode);
    var dh = Bt && "TextEvent" in window && !Za,
        dc = Bt && (!Cs || Za && 8 < Za && 11 >= Za),
        pc = " ",
        hc = !1;

    function mc(e, t) {
        switch (e) {
            case "keyup":
                return oh.indexOf(t.keyCode) !== -1;
            case "keydown":
                return t.keyCode !== 229;
            case "keypress":
            case "mousedown":
            case "focusout":
                return !0;
            default:
                return !1
        }
    }

    function vc(e) {
        return e = e.detail, typeof e == "object" && "data" in e ? e.data : null
    }
    var ia = !1;

    function ph(e, t) {
        switch (e) {
            case "compositionend":
                return vc(t);
            case "keypress":
                return t.which !== 32 ? null : (hc = !0, pc);
            case "textInput":
                return e = t.data, e === pc && hc ? null : e;
            default:
                return null
        }
    }

    function hh(e, t) {
        if (ia) return e === "compositionend" || !Cs && mc(e, t) ? (e = uc(), Pn = Ts = nl = null, ia = !1, e) : null;
        switch (e) {
            case "paste":
                return null;
            case "keypress":
                if (!(t.ctrlKey || t.altKey || t.metaKey) || t.ctrlKey && t.altKey) {
                    if (t.char && 1 < t.char.length) return t.char;
                    if (t.which) return String.fromCharCode(t.which)
                }
                return null;
            case "compositionend":
                return dc && t.locale !== "ko" ? null : t.data;
            default:
                return null
        }
    }
    var mh = {
        color: !0,
        date: !0,
        datetime: !0,
        "datetime-local": !0,
        email: !0,
        month: !0,
        number: !0,
        password: !0,
        range: !0,
        search: !0,
        tel: !0,
        text: !0,
        time: !0,
        url: !0,
        week: !0
    };

    function gc(e) {
        var t = e && e.nodeName && e.nodeName.toLowerCase();
        return t === "input" ? !!mh[e.type] : t === "textarea"
    }

    function yc(e, t, l, a) {
        aa ? na ? na.push(a) : na = [a] : aa = a, t = Gi(t, "onChange"), 0 < t.length && (l = new $n("onChange", "change", null, l, a), e.push({
            event: l,
            listeners: t
        }))
    }
    var Ka = null,
        Fa = null;

    function vh(e) {
        ed(e, 0)
    }

    function ei(e) {
        var t = qa(e);
        if (Wr(t)) return e
    }

    function Ec(e, t) {
        if (e === "change") return t
    }
    var Sc = !1;
    if (Bt) {
        var Ns;
        if (Bt) {
            var Ms = "oninput" in document;
            if (!Ms) {
                var bc = document.createElement("div");
                bc.setAttribute("oninput", "return;"), Ms = typeof bc.oninput == "function"
            }
            Ns = Ms
        } else Ns = !1;
        Sc = Ns && (!document.documentMode || 9 < document.documentMode)
    }

    function _c() {
        Ka && (Ka.detachEvent("onpropertychange", Tc), Fa = Ka = null)
    }

    function Tc(e) {
        if (e.propertyName === "value" && ei(Fa)) {
            var t = [];
            yc(t, Fa, e, Ss(e)), sc(vh, t)
        }
    }

    function gh(e, t, l) {
        e === "focusin" ? (_c(), Ka = t, Fa = l, Ka.attachEvent("onpropertychange", Tc)) : e === "focusout" && _c()
    }

    function yh(e) {
        if (e === "selectionchange" || e === "keyup" || e === "keydown") return ei(Fa)
    }

    function Eh(e, t) {
        if (e === "click") return ei(t)
    }

    function Sh(e, t) {
        if (e === "input" || e === "change") return ei(t)
    }

    function bh(e, t) {
        return e === t && (e !== 0 || 1 / e === 1 / t) || e !== e && t !== t
    }
    var ct = typeof Object.is == "function" ? Object.is : bh;

    function Pa(e, t) {
        if (ct(e, t)) return !0;
        if (typeof e != "object" || e === null || typeof t != "object" || t === null) return !1;
        var l = Object.keys(e),
            a = Object.keys(t);
        if (l.length !== a.length) return !1;
        for (a = 0; a < l.length; a++) {
            var n = l[a];
            if (!Al.call(t, n) || !ct(e[n], t[n])) return !1
        }
        return !0
    }

    function Oc(e) {
        for (; e && e.firstChild;) e = e.firstChild;
        return e
    }

    function xc(e, t) {
        var l = Oc(e);
        e = 0;
        for (var a; l;) {
            if (l.nodeType === 3) {
                if (a = e + l.textContent.length, e <= t && a >= t) return {
                    node: l,
                    offset: t - e
                };
                e = a
            }
            e: {
                for (; l;) {
                    if (l.nextSibling) {
                        l = l.nextSibling;
                        break e
                    }
                    l = l.parentNode
                }
                l = void 0
            }
            l = Oc(l)
        }
    }

    function wc(e, t) {
        return e && t ? e === t ? !0 : e && e.nodeType === 3 ? !1 : t && t.nodeType === 3 ? wc(e, t.parentNode) : "contains" in e ? e.contains(t) : e.compareDocumentPosition ? !!(e.compareDocumentPosition(t) & 16) : !1 : !1
    }

    function Ac(e) {
        e = e != null && e.ownerDocument != null && e.ownerDocument.defaultView != null ? e.ownerDocument.defaultView : window;
        for (var t = Kn(e.document); t instanceof e.HTMLIFrameElement;) {
            try {
                var l = typeof t.contentWindow.location.href == "string"
            } catch {
                l = !1
            }
            if (l) e = t.contentWindow;
            else break;
            t = Kn(e.document)
        }
        return t
    }

    function Ds(e) {
        var t = e && e.nodeName && e.nodeName.toLowerCase();
        return t && (t === "input" && (e.type === "text" || e.type === "search" || e.type === "tel" || e.type === "url" || e.type === "password") || t === "textarea" || e.contentEditable === "true")
    }
    var _h = Bt && "documentMode" in document && 11 >= document.documentMode,
        sa = null,
        zs = null,
        Ja = null,
        Rs = !1;

    function Cc(e, t, l) {
        var a = l.window === l ? l.document : l.nodeType === 9 ? l : l.ownerDocument;
        Rs || sa == null || sa !== Kn(a) || (a = sa, "selectionStart" in a && Ds(a) ? a = {
            start: a.selectionStart,
            end: a.selectionEnd
        } : (a = (a.ownerDocument && a.ownerDocument.defaultView || window).getSelection(), a = {
            anchorNode: a.anchorNode,
            anchorOffset: a.anchorOffset,
            focusNode: a.focusNode,
            focusOffset: a.focusOffset
        }), Ja && Pa(Ja, a) || (Ja = a, a = Gi(zs, "onSelect"), 0 < a.length && (t = new $n("onSelect", "select", null, t, l), e.push({
            event: t,
            listeners: a
        }), t.target = sa)))
    }

    function Dl(e, t) {
        var l = {};
        return l[e.toLowerCase()] = t.toLowerCase(), l["Webkit" + e] = "webkit" + t, l["Moz" + e] = "moz" + t, l
    }
    var ua = {
        animationend: Dl("Animation", "AnimationEnd"),
        animationiteration: Dl("Animation", "AnimationIteration"),
        animationstart: Dl("Animation", "AnimationStart"),
        transitionrun: Dl("Transition", "TransitionRun"),
        transitionstart: Dl("Transition", "TransitionStart"),
        transitioncancel: Dl("Transition", "TransitionCancel"),
        transitionend: Dl("Transition", "TransitionEnd")
    },
        Us = {},
        Nc = {};
    Bt && (Nc = document.createElement("div").style, "AnimationEvent" in window || (delete ua.animationend.animation, delete ua.animationiteration.animation, delete ua.animationstart.animation), "TransitionEvent" in window || delete ua.transitionend.transition);

    function zl(e) {
        if (Us[e]) return Us[e];
        if (!ua[e]) return e;
        var t = ua[e],
            l;
        for (l in t)
            if (t.hasOwnProperty(l) && l in Nc) return Us[e] = t[l];
        return e
    }
    var Mc = zl("animationend"),
        Dc = zl("animationiteration"),
        zc = zl("animationstart"),
        Th = zl("transitionrun"),
        Oh = zl("transitionstart"),
        xh = zl("transitioncancel"),
        Rc = zl("transitionend"),
        Uc = new Map,
        Ls = "abort auxClick beforeToggle cancel canPlay canPlayThrough click close contextMenu copy cut drag dragEnd dragEnter dragExit dragLeave dragOver dragStart drop durationChange emptied encrypted ended error gotPointerCapture input invalid keyDown keyPress keyUp load loadedData loadedMetadata loadStart lostPointerCapture mouseDown mouseMove mouseOut mouseOver mouseUp paste pause play playing pointerCancel pointerDown pointerMove pointerOut pointerOver pointerUp progress rateChange reset resize seeked seeking stalled submit suspend timeUpdate touchCancel touchEnd touchStart volumeChange scroll toggle touchMove waiting wheel".split(" ");
    Ls.push("scrollEnd");

    function wt(e, t) {
        Uc.set(e, t), Nl(t, [e])
    }
    var Lc = new WeakMap;

    function Et(e, t) {
        if (typeof e == "object" && e !== null) {
            var l = Lc.get(e);
            return l !== void 0 ? l : (t = {
                value: e,
                source: t,
                stack: kr(t)
            }, Lc.set(e, t), t)
        }
        return {
            value: e,
            source: t,
            stack: kr(t)
        }
    }
    var St = [],
        ra = 0,
        Hs = 0;

    function ti() {
        for (var e = ra, t = Hs = ra = 0; t < e;) {
            var l = St[t];
            St[t++] = null;
            var a = St[t];
            St[t++] = null;
            var n = St[t];
            St[t++] = null;
            var c = St[t];
            if (St[t++] = null, a !== null && n !== null) {
                var d = a.pending;
                d === null ? n.next = n : (n.next = d.next, d.next = n), a.pending = n
            }
            c !== 0 && Hc(l, n, c)
        }
    }

    function li(e, t, l, a) {
        St[ra++] = e, St[ra++] = t, St[ra++] = l, St[ra++] = a, Hs |= a, e.lanes |= a, e = e.alternate, e !== null && (e.lanes |= a)
    }

    function Vs(e, t, l, a) {
        return li(e, t, l, a), ai(e)
    }

    function ca(e, t) {
        return li(e, null, null, t), ai(e)
    }

    function Hc(e, t, l) {
        e.lanes |= l;
        var a = e.alternate;
        a !== null && (a.lanes |= l);
        for (var n = !1, c = e.return; c !== null;) c.childLanes |= l, a = c.alternate, a !== null && (a.childLanes |= l), c.tag === 22 && (e = c.stateNode, e === null || e._visibility & 1 || (n = !0)), e = c, c = c.return;
        return e.tag === 3 ? (c = e.stateNode, n && t !== null && (n = 31 - rt(l), e = c.hiddenUpdates, a = e[n], a === null ? e[n] = [t] : a.push(t), t.lane = l | 536870912), c) : null
    }

    function ai(e) {
        if (50 < _n) throw _n = 0, Iu = null, Error(u(185));
        for (var t = e.return; t !== null;) e = t, t = e.return;
        return e.tag === 3 ? e.stateNode : null
    }
    var fa = {};

    function wh(e, t, l, a) {
        this.tag = e, this.key = l, this.sibling = this.child = this.return = this.stateNode = this.type = this.elementType = null, this.index = 0, this.refCleanup = this.ref = null, this.pendingProps = t, this.dependencies = this.memoizedState = this.updateQueue = this.memoizedProps = null, this.mode = a, this.subtreeFlags = this.flags = 0, this.deletions = null, this.childLanes = this.lanes = 0, this.alternate = null
    }

    function ft(e, t, l, a) {
        return new wh(e, t, l, a)
    }

    function js(e) {
        return e = e.prototype, !(!e || !e.isReactComponent)
    }

    function qt(e, t) {
        var l = e.alternate;
        return l === null ? (l = ft(e.tag, t, e.key, e.mode), l.elementType = e.elementType, l.type = e.type, l.stateNode = e.stateNode, l.alternate = e, e.alternate = l) : (l.pendingProps = t, l.type = e.type, l.flags = 0, l.subtreeFlags = 0, l.deletions = null), l.flags = e.flags & 65011712, l.childLanes = e.childLanes, l.lanes = e.lanes, l.child = e.child, l.memoizedProps = e.memoizedProps, l.memoizedState = e.memoizedState, l.updateQueue = e.updateQueue, t = e.dependencies, l.dependencies = t === null ? null : {
            lanes: t.lanes,
            firstContext: t.firstContext
        }, l.sibling = e.sibling, l.index = e.index, l.ref = e.ref, l.refCleanup = e.refCleanup, l
    }

    function Vc(e, t) {
        e.flags &= 65011714;
        var l = e.alternate;
        return l === null ? (e.childLanes = 0, e.lanes = t, e.child = null, e.subtreeFlags = 0, e.memoizedProps = null, e.memoizedState = null, e.updateQueue = null, e.dependencies = null, e.stateNode = null) : (e.childLanes = l.childLanes, e.lanes = l.lanes, e.child = l.child, e.subtreeFlags = 0, e.deletions = null, e.memoizedProps = l.memoizedProps, e.memoizedState = l.memoizedState, e.updateQueue = l.updateQueue, e.type = l.type, t = l.dependencies, e.dependencies = t === null ? null : {
            lanes: t.lanes,
            firstContext: t.firstContext
        }), e
    }

    function ni(e, t, l, a, n, c) {
        var d = 0;
        if (a = e, typeof e == "function") js(e) && (d = 1);
        else if (typeof e == "string") d = Cm(e, l, te.current) ? 26 : e === "html" || e === "head" || e === "body" ? 27 : 5;
        else e: switch (e) {
            case M:
                return e = ft(31, l, t, n), e.elementType = M, e.lanes = c, e;
            case O:
                return Rl(l.children, n, c, t);
            case V:
                d = 8, n |= 24;
                break;
            case K:
                return e = ft(12, l, t, n | 2), e.elementType = K, e.lanes = c, e;
            case G:
                return e = ft(13, l, t, n), e.elementType = G, e.lanes = c, e;
            case ee:
                return e = ft(19, l, t, n), e.elementType = ee, e.lanes = c, e;
            default:
                if (typeof e == "object" && e !== null) switch (e.$$typeof) {
                    case R:
                    case Q:
                        d = 10;
                        break e;
                    case Y:
                        d = 9;
                        break e;
                    case F:
                        d = 11;
                        break e;
                    case ae:
                        d = 14;
                        break e;
                    case H:
                        d = 16, a = null;
                        break e
                }
                d = 29, l = Error(u(130, e === null ? "null" : typeof e, "")), a = null
        }
        return t = ft(d, l, t, n), t.elementType = e, t.type = a, t.lanes = c, t
    }

    function Rl(e, t, l, a) {
        return e = ft(7, e, a, t), e.lanes = l, e
    }

    function Gs(e, t, l) {
        return e = ft(6, e, null, t), e.lanes = l, e
    }

    function Bs(e, t, l) {
        return t = ft(4, e.children !== null ? e.children : [], e.key, t), t.lanes = l, t.stateNode = {
            containerInfo: e.containerInfo,
            pendingChildren: null,
            implementation: e.implementation
        }, t
    }
    var oa = [],
        da = 0,
        ii = null,
        si = 0,
        bt = [],
        _t = 0,
        Ul = null,
        Yt = 1,
        It = "";

    function Ll(e, t) {
        oa[da++] = si, oa[da++] = ii, ii = e, si = t
    }

    function jc(e, t, l) {
        bt[_t++] = Yt, bt[_t++] = It, bt[_t++] = Ul, Ul = e;
        var a = Yt;
        e = It;
        var n = 32 - rt(a) - 1;
        a &= ~(1 << n), l += 1;
        var c = 32 - rt(t) + n;
        if (30 < c) {
            var d = n - n % 5;
            c = (a & (1 << d) - 1).toString(32), a >>= d, n -= d, Yt = 1 << 32 - rt(t) + n | l << n | a, It = c + e
        } else Yt = 1 << c | l << n | a, It = e
    }

    function qs(e) {
        e.return !== null && (Ll(e, 1), jc(e, 1, 0))
    }

    function Ys(e) {
        for (; e === ii;) ii = oa[--da], oa[da] = null, si = oa[--da], oa[da] = null;
        for (; e === Ul;) Ul = bt[--_t], bt[_t] = null, It = bt[--_t], bt[_t] = null, Yt = bt[--_t], bt[_t] = null
    }
    var We = null,
        ze = null,
        be = !1,
        Hl = null,
        Dt = !1,
        Is = Error(u(519));

    function Vl(e) {
        var t = Error(u(418, ""));
        throw Wa(Et(t, e)), Is
    }

    function Gc(e) {
        var t = e.stateNode,
            l = e.type,
            a = e.memoizedProps;
        switch (t[Je] = e, t[lt] = a, l) {
            case "dialog":
                ge("cancel", t), ge("close", t);
                break;
            case "iframe":
            case "object":
            case "embed":
                ge("load", t);
                break;
            case "video":
            case "audio":
                for (l = 0; l < On.length; l++) ge(On[l], t);
                break;
            case "source":
                ge("error", t);
                break;
            case "img":
            case "image":
            case "link":
                ge("error", t), ge("load", t);
                break;
            case "details":
                ge("toggle", t);
                break;
            case "input":
                ge("invalid", t), ec(t, a.value, a.defaultValue, a.checked, a.defaultChecked, a.type, a.name, !0), Zn(t);
                break;
            case "select":
                ge("invalid", t);
                break;
            case "textarea":
                ge("invalid", t), lc(t, a.value, a.defaultValue, a.children), Zn(t)
        }
        l = a.children, typeof l != "string" && typeof l != "number" && typeof l != "bigint" || t.textContent === "" + l || a.suppressHydrationWarning === !0 || nd(t.textContent, l) ? (a.popover != null && (ge("beforetoggle", t), ge("toggle", t)), a.onScroll != null && ge("scroll", t), a.onScrollEnd != null && ge("scrollend", t), a.onClick != null && (t.onclick = Bi), t = !0) : t = !1, t || Vl(e)
    }

    function Bc(e) {
        for (We = e.return; We;) switch (We.tag) {
            case 5:
            case 13:
                Dt = !1;
                return;
            case 27:
            case 3:
                Dt = !0;
                return;
            default:
                We = We.return
        }
    }

    function ka(e) {
        if (e !== We) return !1;
        if (!be) return Bc(e), be = !0, !1;
        var t = e.tag,
            l;
        if ((l = t !== 3 && t !== 27) && ((l = t === 5) && (l = e.type, l = !(l !== "form" && l !== "button") || ir(e.type, e.memoizedProps)), l = !l), l && ze && Vl(e), Bc(e), t === 13) {
            if (e = e.memoizedState, e = e !== null ? e.dehydrated : null, !e) throw Error(u(317));
            e: {
                for (e = e.nextSibling, t = 0; e;) {
                    if (e.nodeType === 8)
                        if (l = e.data, l === "/$") {
                            if (t === 0) {
                                ze = Ct(e.nextSibling);
                                break e
                            }
                            t--
                        } else l !== "$" && l !== "$!" && l !== "$?" || t++;
                    e = e.nextSibling
                }
                ze = null
            }
        } else t === 27 ? (t = ze, Sl(e.type) ? (e = cr, cr = null, ze = e) : ze = t) : ze = We ? Ct(e.stateNode.nextSibling) : null;
        return !0
    }

    function $a() {
        ze = We = null, be = !1
    }

    function qc() {
        var e = Hl;
        return e !== null && (st === null ? st = e : st.push.apply(st, e), Hl = null), e
    }

    function Wa(e) {
        Hl === null ? Hl = [e] : Hl.push(e)
    }
    var Xs = X(null),
        jl = null,
        Xt = null;

    function il(e, t, l) {
        J(Xs, t._currentValue), t._currentValue = l
    }

    function Qt(e) {
        e._currentValue = Xs.current, $(Xs)
    }

    function Qs(e, t, l) {
        for (; e !== null;) {
            var a = e.alternate;
            if ((e.childLanes & t) !== t ? (e.childLanes |= t, a !== null && (a.childLanes |= t)) : a !== null && (a.childLanes & t) !== t && (a.childLanes |= t), e === l) break;
            e = e.return
        }
    }

    function Zs(e, t, l, a) {
        var n = e.child;
        for (n !== null && (n.return = e); n !== null;) {
            var c = n.dependencies;
            if (c !== null) {
                var d = n.child;
                c = c.firstContext;
                e: for (; c !== null;) {
                    var g = c;
                    c = n;
                    for (var b = 0; b < t.length; b++)
                        if (g.context === t[b]) {
                            c.lanes |= l, g = c.alternate, g !== null && (g.lanes |= l), Qs(c.return, l, e), a || (d = null);
                            break e
                        } c = g.next
                }
            } else if (n.tag === 18) {
                if (d = n.return, d === null) throw Error(u(341));
                d.lanes |= l, c = d.alternate, c !== null && (c.lanes |= l), Qs(d, l, e), d = null
            } else d = n.child;
            if (d !== null) d.return = n;
            else
                for (d = n; d !== null;) {
                    if (d === e) {
                        d = null;
                        break
                    }
                    if (n = d.sibling, n !== null) {
                        n.return = d.return, d = n;
                        break
                    }
                    d = d.return
                }
            n = d
        }
    }

    function en(e, t, l, a) {
        e = null;
        for (var n = t, c = !1; n !== null;) {
            if (!c) {
                if ((n.flags & 524288) !== 0) c = !0;
                else if ((n.flags & 262144) !== 0) break
            }
            if (n.tag === 10) {
                var d = n.alternate;
                if (d === null) throw Error(u(387));
                if (d = d.memoizedProps, d !== null) {
                    var g = n.type;
                    ct(n.pendingProps.value, d.value) || (e !== null ? e.push(g) : e = [g])
                }
            } else if (n === He.current) {
                if (d = n.alternate, d === null) throw Error(u(387));
                d.memoizedState.memoizedState !== n.memoizedState.memoizedState && (e !== null ? e.push(Mn) : e = [Mn])
            }
            n = n.return
        }
        e !== null && Zs(t, e, l, a), t.flags |= 262144
    }

    function ui(e) {
        for (e = e.firstContext; e !== null;) {
            if (!ct(e.context._currentValue, e.memoizedValue)) return !0;
            e = e.next
        }
        return !1
    }

    function Gl(e) {
        jl = e, Xt = null, e = e.dependencies, e !== null && (e.firstContext = null)
    }

    function ke(e) {
        return Yc(jl, e)
    }

    function ri(e, t) {
        return jl === null && Gl(e), Yc(e, t)
    }

    function Yc(e, t) {
        var l = t._currentValue;
        if (t = {
            context: t,
            memoizedValue: l,
            next: null
        }, Xt === null) {
            if (e === null) throw Error(u(308));
            Xt = t, e.dependencies = {
                lanes: 0,
                firstContext: t
            }, e.flags |= 524288
        } else Xt = Xt.next = t;
        return l
    }
    var Ah = typeof AbortController < "u" ? AbortController : function () {
        var e = [],
            t = this.signal = {
                aborted: !1,
                addEventListener: function (l, a) {
                    e.push(a)
                }
            };
        this.abort = function () {
            t.aborted = !0, e.forEach(function (l) {
                return l()
            })
        }
    },
        Ch = s.unstable_scheduleCallback,
        Nh = s.unstable_NormalPriority,
        Ge = {
            $$typeof: Q,
            Consumer: null,
            Provider: null,
            _currentValue: null,
            _currentValue2: null,
            _threadCount: 0
        };

    function Ks() {
        return {
            controller: new Ah,
            data: new Map,
            refCount: 0
        }
    }

    function tn(e) {
        e.refCount--, e.refCount === 0 && Ch(Nh, function () {
            e.controller.abort()
        })
    }
    var ln = null,
        Fs = 0,
        pa = 0,
        ha = null;

    function Mh(e, t) {
        if (ln === null) {
            var l = ln = [];
            Fs = 0, pa = Ju(), ha = {
                status: "pending",
                value: void 0,
                then: function (a) {
                    l.push(a)
                }
            }
        }
        return Fs++, t.then(Ic, Ic), t
    }

    function Ic() {
        if (--Fs === 0 && ln !== null) {
            ha !== null && (ha.status = "fulfilled");
            var e = ln;
            ln = null, pa = 0, ha = null;
            for (var t = 0; t < e.length; t++)(0, e[t])()
        }
    }

    function Dh(e, t) {
        var l = [],
            a = {
                status: "pending",
                value: null,
                reason: null,
                then: function (n) {
                    l.push(n)
                }
            };
        return e.then(function () {
            a.status = "fulfilled", a.value = t;
            for (var n = 0; n < l.length; n++)(0, l[n])(t)
        }, function (n) {
            for (a.status = "rejected", a.reason = n, n = 0; n < l.length; n++)(0, l[n])(void 0)
        }), a
    }
    var Xc = C.S;
    C.S = function (e, t) {
        typeof t == "object" && t !== null && typeof t.then == "function" && Mh(e, t), Xc !== null && Xc(e, t)
    };
    var Bl = X(null);

    function Ps() {
        var e = Bl.current;
        return e !== null ? e : Ne.pooledCache
    }

    function ci(e, t) {
        t === null ? J(Bl, Bl.current) : J(Bl, t.pool)
    }

    function Qc() {
        var e = Ps();
        return e === null ? null : {
            parent: Ge._currentValue,
            pool: e
        }
    }
    var an = Error(u(460)),
        Zc = Error(u(474)),
        fi = Error(u(542)),
        Js = {
            then: function () { }
        };

    function Kc(e) {
        return e = e.status, e === "fulfilled" || e === "rejected"
    }

    function oi() { }

    function Fc(e, t, l) {
        switch (l = e[l], l === void 0 ? e.push(t) : l !== t && (t.then(oi, oi), t = l), t.status) {
            case "fulfilled":
                return t.value;
            case "rejected":
                throw e = t.reason, Jc(e), e;
            default:
                if (typeof t.status == "string") t.then(oi, oi);
                else {
                    if (e = Ne, e !== null && 100 < e.shellSuspendCounter) throw Error(u(482));
                    e = t, e.status = "pending", e.then(function (a) {
                        if (t.status === "pending") {
                            var n = t;
                            n.status = "fulfilled", n.value = a
                        }
                    }, function (a) {
                        if (t.status === "pending") {
                            var n = t;
                            n.status = "rejected", n.reason = a
                        }
                    })
                }
                switch (t.status) {
                    case "fulfilled":
                        return t.value;
                    case "rejected":
                        throw e = t.reason, Jc(e), e
                }
                throw nn = t, an
        }
    }
    var nn = null;

    function Pc() {
        if (nn === null) throw Error(u(459));
        var e = nn;
        return nn = null, e
    }

    function Jc(e) {
        if (e === an || e === fi) throw Error(u(483))
    }
    var sl = !1;

    function ks(e) {
        e.updateQueue = {
            baseState: e.memoizedState,
            firstBaseUpdate: null,
            lastBaseUpdate: null,
            shared: {
                pending: null,
                lanes: 0,
                hiddenCallbacks: null
            },
            callbacks: null
        }
    }

    function $s(e, t) {
        e = e.updateQueue, t.updateQueue === e && (t.updateQueue = {
            baseState: e.baseState,
            firstBaseUpdate: e.firstBaseUpdate,
            lastBaseUpdate: e.lastBaseUpdate,
            shared: e.shared,
            callbacks: null
        })
    }

    function ul(e) {
        return {
            lane: e,
            tag: 0,
            payload: null,
            callback: null,
            next: null
        }
    }

    function rl(e, t, l) {
        var a = e.updateQueue;
        if (a === null) return null;
        if (a = a.shared, (Te & 2) !== 0) {
            var n = a.pending;
            return n === null ? t.next = t : (t.next = n.next, n.next = t), a.pending = t, t = ai(e), Hc(e, null, l), t
        }
        return li(e, a, t, l), ai(e)
    }

    function sn(e, t, l) {
        if (t = t.updateQueue, t !== null && (t = t.shared, (l & 4194048) !== 0)) {
            var a = t.lanes;
            a &= e.pendingLanes, l |= a, t.lanes = l, Ir(e, l)
        }
    }

    function Ws(e, t) {
        var l = e.updateQueue,
            a = e.alternate;
        if (a !== null && (a = a.updateQueue, l === a)) {
            var n = null,
                c = null;
            if (l = l.firstBaseUpdate, l !== null) {
                do {
                    var d = {
                        lane: l.lane,
                        tag: l.tag,
                        payload: l.payload,
                        callback: null,
                        next: null
                    };
                    c === null ? n = c = d : c = c.next = d, l = l.next
                } while (l !== null);
                c === null ? n = c = t : c = c.next = t
            } else n = c = t;
            l = {
                baseState: a.baseState,
                firstBaseUpdate: n,
                lastBaseUpdate: c,
                shared: a.shared,
                callbacks: a.callbacks
            }, e.updateQueue = l;
            return
        }
        e = l.lastBaseUpdate, e === null ? l.firstBaseUpdate = t : e.next = t, l.lastBaseUpdate = t
    }
    var eu = !1;

    function un() {
        if (eu) {
            var e = ha;
            if (e !== null) throw e
        }
    }

    function rn(e, t, l, a) {
        eu = !1;
        var n = e.updateQueue;
        sl = !1;
        var c = n.firstBaseUpdate,
            d = n.lastBaseUpdate,
            g = n.shared.pending;
        if (g !== null) {
            n.shared.pending = null;
            var b = g,
                D = b.next;
            b.next = null, d === null ? c = D : d.next = D, d = b;
            var B = e.alternate;
            B !== null && (B = B.updateQueue, g = B.lastBaseUpdate, g !== d && (g === null ? B.firstBaseUpdate = D : g.next = D, B.lastBaseUpdate = b))
        }
        if (c !== null) {
            var I = n.baseState;
            d = 0, B = D = b = null, g = c;
            do {
                var U = g.lane & -536870913,
                    L = U !== g.lane;
                if (L ? (Ee & U) === U : (a & U) === U) {
                    U !== 0 && U === pa && (eu = !0), B !== null && (B = B.next = {
                        lane: 0,
                        tag: g.tag,
                        payload: g.payload,
                        callback: null,
                        next: null
                    });
                    e: {
                        var ce = e,
                            se = g; U = t;
                        var Ae = l;
                        switch (se.tag) {
                            case 1:
                                if (ce = se.payload, typeof ce == "function") {
                                    I = ce.call(Ae, I, U);
                                    break e
                                }
                                I = ce;
                                break e;
                            case 3:
                                ce.flags = ce.flags & -65537 | 128;
                            case 0:
                                if (ce = se.payload, U = typeof ce == "function" ? ce.call(Ae, I, U) : ce, U == null) break e;
                                I = y({}, I, U);
                                break e;
                            case 2:
                                sl = !0
                        }
                    }
                    U = g.callback, U !== null && (e.flags |= 64, L && (e.flags |= 8192), L = n.callbacks, L === null ? n.callbacks = [U] : L.push(U))
                } else L = {
                    lane: U,
                    tag: g.tag,
                    payload: g.payload,
                    callback: g.callback,
                    next: null
                }, B === null ? (D = B = L, b = I) : B = B.next = L, d |= U;
                if (g = g.next, g === null) {
                    if (g = n.shared.pending, g === null) break;
                    L = g, g = L.next, L.next = null, n.lastBaseUpdate = L, n.shared.pending = null
                }
            } while (!0);
            B === null && (b = I), n.baseState = b, n.firstBaseUpdate = D, n.lastBaseUpdate = B, c === null && (n.shared.lanes = 0), vl |= d, e.lanes = d, e.memoizedState = I
        }
    }

    function kc(e, t) {
        if (typeof e != "function") throw Error(u(191, e));
        e.call(t)
    }

    function $c(e, t) {
        var l = e.callbacks;
        if (l !== null)
            for (e.callbacks = null, e = 0; e < l.length; e++) kc(l[e], t)
    }
    var ma = X(null),
        di = X(0);

    function Wc(e, t) {
        e = $t, J(di, e), J(ma, t), $t = e | t.baseLanes
    }

    function tu() {
        J(di, $t), J(ma, ma.current)
    }

    function lu() {
        $t = di.current, $(ma), $(di)
    }
    var cl = 0,
        he = null,
        xe = null,
        Ve = null,
        pi = !1,
        va = !1,
        ql = !1,
        hi = 0,
        cn = 0,
        ga = null,
        zh = 0;

    function Ue() {
        throw Error(u(321))
    }

    function au(e, t) {
        if (t === null) return !1;
        for (var l = 0; l < t.length && l < e.length; l++)
            if (!ct(e[l], t[l])) return !1;
        return !0
    }

    function nu(e, t, l, a, n, c) {
        return cl = c, he = t, t.memoizedState = null, t.updateQueue = null, t.lanes = 0, C.H = e === null || e.memoizedState === null ? Vf : jf, ql = !1, c = l(a, n), ql = !1, va && (c = tf(t, l, a, n)), ef(e), c
    }

    function ef(e) {
        C.H = Si;
        var t = xe !== null && xe.next !== null;
        if (cl = 0, Ve = xe = he = null, pi = !1, cn = 0, ga = null, t) throw Error(u(300));
        e === null || Xe || (e = e.dependencies, e !== null && ui(e) && (Xe = !0))
    }

    function tf(e, t, l, a) {
        he = e;
        var n = 0;
        do {
            if (va && (ga = null), cn = 0, va = !1, 25 <= n) throw Error(u(301));
            if (n += 1, Ve = xe = null, e.updateQueue != null) {
                var c = e.updateQueue;
                c.lastEffect = null, c.events = null, c.stores = null, c.memoCache != null && (c.memoCache.index = 0)
            }
            C.H = Gh, c = t(l, a)
        } while (va);
        return c
    }

    function Rh() {
        var e = C.H,
            t = e.useState()[0];
        return t = typeof t.then == "function" ? fn(t) : t, e = e.useState()[0], (xe !== null ? xe.memoizedState : null) !== e && (he.flags |= 1024), t
    }

    function iu() {
        var e = hi !== 0;
        return hi = 0, e
    }

    function su(e, t, l) {
        t.updateQueue = e.updateQueue, t.flags &= -2053, e.lanes &= ~l
    }

    function uu(e) {
        if (pi) {
            for (e = e.memoizedState; e !== null;) {
                var t = e.queue;
                t !== null && (t.pending = null), e = e.next
            }
            pi = !1
        }
        cl = 0, Ve = xe = he = null, va = !1, cn = hi = 0, ga = null
    }

    function nt() {
        var e = {
            memoizedState: null,
            baseState: null,
            baseQueue: null,
            queue: null,
            next: null
        };
        return Ve === null ? he.memoizedState = Ve = e : Ve = Ve.next = e, Ve
    }

    function je() {
        if (xe === null) {
            var e = he.alternate;
            e = e !== null ? e.memoizedState : null
        } else e = xe.next;
        var t = Ve === null ? he.memoizedState : Ve.next;
        if (t !== null) Ve = t, xe = e;
        else {
            if (e === null) throw he.alternate === null ? Error(u(467)) : Error(u(310));
            xe = e, e = {
                memoizedState: xe.memoizedState,
                baseState: xe.baseState,
                baseQueue: xe.baseQueue,
                queue: xe.queue,
                next: null
            }, Ve === null ? he.memoizedState = Ve = e : Ve = Ve.next = e
        }
        return Ve
    }

    function ru() {
        return {
            lastEffect: null,
            events: null,
            stores: null,
            memoCache: null
        }
    }

    function fn(e) {
        var t = cn;
        return cn += 1, ga === null && (ga = []), e = Fc(ga, e, t), t = he, (Ve === null ? t.memoizedState : Ve.next) === null && (t = t.alternate, C.H = t === null || t.memoizedState === null ? Vf : jf), e
    }

    function mi(e) {
        if (e !== null && typeof e == "object") {
            if (typeof e.then == "function") return fn(e);
            if (e.$$typeof === Q) return ke(e)
        }
        throw Error(u(438, String(e)))
    }

    function cu(e) {
        var t = null,
            l = he.updateQueue;
        if (l !== null && (t = l.memoCache), t == null) {
            var a = he.alternate;
            a !== null && (a = a.updateQueue, a !== null && (a = a.memoCache, a != null && (t = {
                data: a.data.map(function (n) {
                    return n.slice()
                }),
                index: 0
            })))
        }
        if (t == null && (t = {
            data: [],
            index: 0
        }), l === null && (l = ru(), he.updateQueue = l), l.memoCache = t, l = t.data[t.index], l === void 0)
            for (l = t.data[t.index] = Array(e), a = 0; a < e; a++) l[a] = z;
        return t.index++, l
    }

    function Zt(e, t) {
        return typeof t == "function" ? t(e) : t
    }

    function vi(e) {
        var t = je();
        return fu(t, xe, e)
    }

    function fu(e, t, l) {
        var a = e.queue;
        if (a === null) throw Error(u(311));
        a.lastRenderedReducer = l;
        var n = e.baseQueue,
            c = a.pending;
        if (c !== null) {
            if (n !== null) {
                var d = n.next;
                n.next = c.next, c.next = d
            }
            t.baseQueue = n = c, a.pending = null
        }
        if (c = e.baseState, n === null) e.memoizedState = c;
        else {
            t = n.next;
            var g = d = null,
                b = null,
                D = t,
                B = !1;
            do {
                var I = D.lane & -536870913;
                if (I !== D.lane ? (Ee & I) === I : (cl & I) === I) {
                    var U = D.revertLane;
                    if (U === 0) b !== null && (b = b.next = {
                        lane: 0,
                        revertLane: 0,
                        action: D.action,
                        hasEagerState: D.hasEagerState,
                        eagerState: D.eagerState,
                        next: null
                    }), I === pa && (B = !0);
                    else if ((cl & U) === U) {
                        D = D.next, U === pa && (B = !0);
                        continue
                    } else I = {
                        lane: 0,
                        revertLane: D.revertLane,
                        action: D.action,
                        hasEagerState: D.hasEagerState,
                        eagerState: D.eagerState,
                        next: null
                    }, b === null ? (g = b = I, d = c) : b = b.next = I, he.lanes |= U, vl |= U;
                    I = D.action, ql && l(c, I), c = D.hasEagerState ? D.eagerState : l(c, I)
                } else U = {
                    lane: I,
                    revertLane: D.revertLane,
                    action: D.action,
                    hasEagerState: D.hasEagerState,
                    eagerState: D.eagerState,
                    next: null
                }, b === null ? (g = b = U, d = c) : b = b.next = U, he.lanes |= I, vl |= I;
                D = D.next
            } while (D !== null && D !== t);
            if (b === null ? d = c : b.next = g, !ct(c, e.memoizedState) && (Xe = !0, B && (l = ha, l !== null))) throw l;
            e.memoizedState = c, e.baseState = d, e.baseQueue = b, a.lastRenderedState = c
        }
        return n === null && (a.lanes = 0), [e.memoizedState, a.dispatch]
    }

    function ou(e) {
        var t = je(),
            l = t.queue;
        if (l === null) throw Error(u(311));
        l.lastRenderedReducer = e;
        var a = l.dispatch,
            n = l.pending,
            c = t.memoizedState;
        if (n !== null) {
            l.pending = null;
            var d = n = n.next;
            do c = e(c, d.action), d = d.next; while (d !== n);
            ct(c, t.memoizedState) || (Xe = !0), t.memoizedState = c, t.baseQueue === null && (t.baseState = c), l.lastRenderedState = c
        }
        return [c, a]
    }

    function lf(e, t, l) {
        var a = he,
            n = je(),
            c = be;
        if (c) {
            if (l === void 0) throw Error(u(407));
            l = l()
        } else l = t();
        var d = !ct((xe || n).memoizedState, l);
        d && (n.memoizedState = l, Xe = !0), n = n.queue;
        var g = sf.bind(null, a, n, e);
        if (on(2048, 8, g, [e]), n.getSnapshot !== t || d || Ve !== null && Ve.memoizedState.tag & 1) {
            if (a.flags |= 2048, ya(9, gi(), nf.bind(null, a, n, l, t), null), Ne === null) throw Error(u(349));
            c || (cl & 124) !== 0 || af(a, t, l)
        }
        return l
    }

    function af(e, t, l) {
        e.flags |= 16384, e = {
            getSnapshot: t,
            value: l
        }, t = he.updateQueue, t === null ? (t = ru(), he.updateQueue = t, t.stores = [e]) : (l = t.stores, l === null ? t.stores = [e] : l.push(e))
    }

    function nf(e, t, l, a) {
        t.value = l, t.getSnapshot = a, uf(t) && rf(e)
    }

    function sf(e, t, l) {
        return l(function () {
            uf(t) && rf(e)
        })
    }

    function uf(e) {
        var t = e.getSnapshot;
        e = e.value;
        try {
            var l = t();
            return !ct(e, l)
        } catch {
            return !0
        }
    }

    function rf(e) {
        var t = ca(e, 2);
        t !== null && mt(t, e, 2)
    }

    function du(e) {
        var t = nt();
        if (typeof e == "function") {
            var l = e;
            if (e = l(), ql) {
                ll(!0);
                try {
                    l()
                } finally {
                    ll(!1)
                }
            }
        }
        return t.memoizedState = t.baseState = e, t.queue = {
            pending: null,
            lanes: 0,
            dispatch: null,
            lastRenderedReducer: Zt,
            lastRenderedState: e
        }, t
    }

    function cf(e, t, l, a) {
        return e.baseState = l, fu(e, xe, typeof a == "function" ? a : Zt)
    }

    function Uh(e, t, l, a, n) {
        if (Ei(e)) throw Error(u(485));
        if (e = t.action, e !== null) {
            var c = {
                payload: n,
                action: e,
                next: null,
                isTransition: !0,
                status: "pending",
                value: null,
                reason: null,
                listeners: [],
                then: function (d) {
                    c.listeners.push(d)
                }
            };
            C.T !== null ? l(!0) : c.isTransition = !1, a(c), l = t.pending, l === null ? (c.next = t.pending = c, ff(t, c)) : (c.next = l.next, t.pending = l.next = c)
        }
    }

    function ff(e, t) {
        var l = t.action,
            a = t.payload,
            n = e.state;
        if (t.isTransition) {
            var c = C.T,
                d = {};
            C.T = d;
            try {
                var g = l(n, a),
                    b = C.S;
                b !== null && b(d, g), of(e, t, g)
            } catch (D) {
                pu(e, t, D)
            } finally {
                C.T = c
            }
        } else try {
            c = l(n, a), of(e, t, c)
        } catch (D) {
            pu(e, t, D)
        }
    }

    function of(e, t, l) {
        l !== null && typeof l == "object" && typeof l.then == "function" ? l.then(function (a) {
            df(e, t, a)
        }, function (a) {
            return pu(e, t, a)
        }) : df(e, t, l)
    }

    function df(e, t, l) {
        t.status = "fulfilled", t.value = l, pf(t), e.state = l, t = e.pending, t !== null && (l = t.next, l === t ? e.pending = null : (l = l.next, t.next = l, ff(e, l)))
    }

    function pu(e, t, l) {
        var a = e.pending;
        if (e.pending = null, a !== null) {
            a = a.next;
            do t.status = "rejected", t.reason = l, pf(t), t = t.next; while (t !== a)
        }
        e.action = null
    }

    function pf(e) {
        e = e.listeners;
        for (var t = 0; t < e.length; t++)(0, e[t])()
    }

    function hf(e, t) {
        return t
    }

    function mf(e, t) {
        if (be) {
            var l = Ne.formState;
            if (l !== null) {
                e: {
                    var a = he;
                    if (be) {
                        if (ze) {
                            t: {
                                for (var n = ze, c = Dt; n.nodeType !== 8;) {
                                    if (!c) {
                                        n = null;
                                        break t
                                    }
                                    if (n = Ct(n.nextSibling), n === null) {
                                        n = null;
                                        break t
                                    }
                                }
                                c = n.data,
                                    n = c === "F!" || c === "F" ? n : null
                            }
                            if (n) {
                                ze = Ct(n.nextSibling), a = n.data === "F!";
                                break e
                            }
                        }
                        Vl(a)
                    }
                    a = !1
                }
                a && (t = l[0])
            }
        }
        return l = nt(), l.memoizedState = l.baseState = t, a = {
            pending: null,
            lanes: 0,
            dispatch: null,
            lastRenderedReducer: hf,
            lastRenderedState: t
        }, l.queue = a, l = Uf.bind(null, he, a), a.dispatch = l, a = du(!1), c = yu.bind(null, he, !1, a.queue), a = nt(), n = {
            state: t,
            dispatch: null,
            action: e,
            pending: null
        }, a.queue = n, l = Uh.bind(null, he, n, c, l), n.dispatch = l, a.memoizedState = e, [t, l, !1]
    }

    function vf(e) {
        var t = je();
        return gf(t, xe, e)
    }

    function gf(e, t, l) {
        if (t = fu(e, t, hf)[0], e = vi(Zt)[0], typeof t == "object" && t !== null && typeof t.then == "function") try {
            var a = fn(t)
        } catch (d) {
            throw d === an ? fi : d
        } else a = t;
        t = je();
        var n = t.queue,
            c = n.dispatch;
        return l !== t.memoizedState && (he.flags |= 2048, ya(9, gi(), Lh.bind(null, n, l), null)), [a, c, e]
    }

    function Lh(e, t) {
        e.action = t
    }

    function yf(e) {
        var t = je(),
            l = xe;
        if (l !== null) return gf(t, l, e);
        je(), t = t.memoizedState, l = je();
        var a = l.queue.dispatch;
        return l.memoizedState = e, [t, a, !1]
    }

    function ya(e, t, l, a) {
        return e = {
            tag: e,
            create: l,
            deps: a,
            inst: t,
            next: null
        }, t = he.updateQueue, t === null && (t = ru(), he.updateQueue = t), l = t.lastEffect, l === null ? t.lastEffect = e.next = e : (a = l.next, l.next = e, e.next = a, t.lastEffect = e), e
    }

    function gi() {
        return {
            destroy: void 0,
            resource: void 0
        }
    }

    function Ef() {
        return je().memoizedState
    }

    function yi(e, t, l, a) {
        var n = nt();
        a = a === void 0 ? null : a, he.flags |= e, n.memoizedState = ya(1 | t, gi(), l, a)
    }

    function on(e, t, l, a) {
        var n = je();
        a = a === void 0 ? null : a;
        var c = n.memoizedState.inst;
        xe !== null && a !== null && au(a, xe.memoizedState.deps) ? n.memoizedState = ya(t, c, l, a) : (he.flags |= e, n.memoizedState = ya(1 | t, c, l, a))
    }

    function Sf(e, t) {
        yi(8390656, 8, e, t)
    }

    function bf(e, t) {
        on(2048, 8, e, t)
    }

    function _f(e, t) {
        return on(4, 2, e, t)
    }

    function Tf(e, t) {
        return on(4, 4, e, t)
    }

    function Of(e, t) {
        if (typeof t == "function") {
            e = e();
            var l = t(e);
            return function () {
                typeof l == "function" ? l() : t(null)
            }
        }
        if (t != null) return e = e(), t.current = e,
            function () {
                t.current = null
            }
    }

    function xf(e, t, l) {
        l = l != null ? l.concat([e]) : null, on(4, 4, Of.bind(null, t, e), l)
    }

    function hu() { }

    function wf(e, t) {
        var l = je();
        t = t === void 0 ? null : t;
        var a = l.memoizedState;
        return t !== null && au(t, a[1]) ? a[0] : (l.memoizedState = [e, t], e)
    }

    function Af(e, t) {
        var l = je();
        t = t === void 0 ? null : t;
        var a = l.memoizedState;
        if (t !== null && au(t, a[1])) return a[0];
        if (a = e(), ql) {
            ll(!0);
            try {
                e()
            } finally {
                ll(!1)
            }
        }
        return l.memoizedState = [a, t], a
    }

    function mu(e, t, l) {
        return l === void 0 || (cl & 1073741824) !== 0 ? e.memoizedState = t : (e.memoizedState = l, e = Do(), he.lanes |= e, vl |= e, l)
    }

    function Cf(e, t, l, a) {
        return ct(l, t) ? l : ma.current !== null ? (e = mu(e, l, a), ct(e, t) || (Xe = !0), e) : (cl & 42) === 0 ? (Xe = !0, e.memoizedState = l) : (e = Do(), he.lanes |= e, vl |= e, t)
    }

    function Nf(e, t, l, a, n) {
        var c = Z.p;
        Z.p = c !== 0 && 8 > c ? c : 8;
        var d = C.T,
            g = {};
        C.T = g, yu(e, !1, t, l);
        try {
            var b = n(),
                D = C.S;
            if (D !== null && D(g, b), b !== null && typeof b == "object" && typeof b.then == "function") {
                var B = Dh(b, a);
                dn(e, t, B, ht(e))
            } else dn(e, t, a, ht(e))
        } catch (I) {
            dn(e, t, {
                then: function () { },
                status: "rejected",
                reason: I
            }, ht())
        } finally {
            Z.p = c, C.T = d
        }
    }

    function Hh() { }

    function vu(e, t, l, a) {
        if (e.tag !== 5) throw Error(u(476));
        var n = Mf(e).queue;
        Nf(e, n, t, k, l === null ? Hh : function () {
            return Df(e), l(a)
        })
    }

    function Mf(e) {
        var t = e.memoizedState;
        if (t !== null) return t;
        t = {
            memoizedState: k,
            baseState: k,
            baseQueue: null,
            queue: {
                pending: null,
                lanes: 0,
                dispatch: null,
                lastRenderedReducer: Zt,
                lastRenderedState: k
            },
            next: null
        };
        var l = {};
        return t.next = {
            memoizedState: l,
            baseState: l,
            baseQueue: null,
            queue: {
                pending: null,
                lanes: 0,
                dispatch: null,
                lastRenderedReducer: Zt,
                lastRenderedState: l
            },
            next: null
        }, e.memoizedState = t, e = e.alternate, e !== null && (e.memoizedState = t), t
    }

    function Df(e) {
        var t = Mf(e).next.queue;
        dn(e, t, {}, ht())
    }

    function gu() {
        return ke(Mn)
    }

    function zf() {
        return je().memoizedState
    }

    function Rf() {
        return je().memoizedState
    }

    function Vh(e) {
        for (var t = e.return; t !== null;) {
            switch (t.tag) {
                case 24:
                case 3:
                    var l = ht();
                    e = ul(l);
                    var a = rl(t, e, l);
                    a !== null && (mt(a, t, l), sn(a, t, l)), t = {
                        cache: Ks()
                    }, e.payload = t;
                    return
            }
            t = t.return
        }
    }

    function jh(e, t, l) {
        var a = ht();
        l = {
            lane: a,
            revertLane: 0,
            action: l,
            hasEagerState: !1,
            eagerState: null,
            next: null
        }, Ei(e) ? Lf(t, l) : (l = Vs(e, t, l, a), l !== null && (mt(l, e, a), Hf(l, t, a)))
    }

    function Uf(e, t, l) {
        var a = ht();
        dn(e, t, l, a)
    }

    function dn(e, t, l, a) {
        var n = {
            lane: a,
            revertLane: 0,
            action: l,
            hasEagerState: !1,
            eagerState: null,
            next: null
        };
        if (Ei(e)) Lf(t, n);
        else {
            var c = e.alternate;
            if (e.lanes === 0 && (c === null || c.lanes === 0) && (c = t.lastRenderedReducer, c !== null)) try {
                var d = t.lastRenderedState,
                    g = c(d, l);
                if (n.hasEagerState = !0, n.eagerState = g, ct(g, d)) return li(e, t, n, 0), Ne === null && ti(), !1
            } catch { } finally { }
            if (l = Vs(e, t, n, a), l !== null) return mt(l, e, a), Hf(l, t, a), !0
        }
        return !1
    }

    function yu(e, t, l, a) {
        if (a = {
            lane: 2,
            revertLane: Ju(),
            action: a,
            hasEagerState: !1,
            eagerState: null,
            next: null
        }, Ei(e)) {
            if (t) throw Error(u(479))
        } else t = Vs(e, l, a, 2), t !== null && mt(t, e, 2)
    }

    function Ei(e) {
        var t = e.alternate;
        return e === he || t !== null && t === he
    }

    function Lf(e, t) {
        va = pi = !0;
        var l = e.pending;
        l === null ? t.next = t : (t.next = l.next, l.next = t), e.pending = t
    }

    function Hf(e, t, l) {
        if ((l & 4194048) !== 0) {
            var a = t.lanes;
            a &= e.pendingLanes, l |= a, t.lanes = l, Ir(e, l)
        }
    }
    var Si = {
        readContext: ke,
        use: mi,
        useCallback: Ue,
        useContext: Ue,
        useEffect: Ue,
        useImperativeHandle: Ue,
        useLayoutEffect: Ue,
        useInsertionEffect: Ue,
        useMemo: Ue,
        useReducer: Ue,
        useRef: Ue,
        useState: Ue,
        useDebugValue: Ue,
        useDeferredValue: Ue,
        useTransition: Ue,
        useSyncExternalStore: Ue,
        useId: Ue,
        useHostTransitionStatus: Ue,
        useFormState: Ue,
        useActionState: Ue,
        useOptimistic: Ue,
        useMemoCache: Ue,
        useCacheRefresh: Ue
    },
        Vf = {
            readContext: ke,
            use: mi,
            useCallback: function (e, t) {
                return nt().memoizedState = [e, t === void 0 ? null : t], e
            },
            useContext: ke,
            useEffect: Sf,
            useImperativeHandle: function (e, t, l) {
                l = l != null ? l.concat([e]) : null, yi(4194308, 4, Of.bind(null, t, e), l)
            },
            useLayoutEffect: function (e, t) {
                return yi(4194308, 4, e, t)
            },
            useInsertionEffect: function (e, t) {
                yi(4, 2, e, t)
            },
            useMemo: function (e, t) {
                var l = nt();
                t = t === void 0 ? null : t;
                var a = e();
                if (ql) {
                    ll(!0);
                    try {
                        e()
                    } finally {
                        ll(!1)
                    }
                }
                return l.memoizedState = [a, t], a
            },
            useReducer: function (e, t, l) {
                var a = nt();
                if (l !== void 0) {
                    var n = l(t);
                    if (ql) {
                        ll(!0);
                        try {
                            l(t)
                        } finally {
                            ll(!1)
                        }
                    }
                } else n = t;
                return a.memoizedState = a.baseState = n, e = {
                    pending: null,
                    lanes: 0,
                    dispatch: null,
                    lastRenderedReducer: e,
                    lastRenderedState: n
                }, a.queue = e, e = e.dispatch = jh.bind(null, he, e), [a.memoizedState, e]
            },
            useRef: function (e) {
                var t = nt();
                return e = {
                    current: e
                }, t.memoizedState = e
            },
            useState: function (e) {
                e = du(e);
                var t = e.queue,
                    l = Uf.bind(null, he, t);
                return t.dispatch = l, [e.memoizedState, l]
            },
            useDebugValue: hu,
            useDeferredValue: function (e, t) {
                var l = nt();
                return mu(l, e, t)
            },
            useTransition: function () {
                var e = du(!1);
                return e = Nf.bind(null, he, e.queue, !0, !1), nt().memoizedState = e, [!1, e]
            },
            useSyncExternalStore: function (e, t, l) {
                var a = he,
                    n = nt();
                if (be) {
                    if (l === void 0) throw Error(u(407));
                    l = l()
                } else {
                    if (l = t(), Ne === null) throw Error(u(349));
                    (Ee & 124) !== 0 || af(a, t, l)
                }
                n.memoizedState = l;
                var c = {
                    value: l,
                    getSnapshot: t
                };
                return n.queue = c, Sf(sf.bind(null, a, c, e), [e]), a.flags |= 2048, ya(9, gi(), nf.bind(null, a, c, l, t), null), l
            },
            useId: function () {
                var e = nt(),
                    t = Ne.identifierPrefix;
                if (be) {
                    var l = It,
                        a = Yt;
                    l = (a & ~(1 << 32 - rt(a) - 1)).toString(32) + l, t = "«" + t + "R" + l, l = hi++, 0 < l && (t += "H" + l.toString(32)), t += "»"
                } else l = zh++, t = "«" + t + "r" + l.toString(32) + "»";
                return e.memoizedState = t
            },
            useHostTransitionStatus: gu,
            useFormState: mf,
            useActionState: mf,
            useOptimistic: function (e) {
                var t = nt();
                t.memoizedState = t.baseState = e;
                var l = {
                    pending: null,
                    lanes: 0,
                    dispatch: null,
                    lastRenderedReducer: null,
                    lastRenderedState: null
                };
                return t.queue = l, t = yu.bind(null, he, !0, l), l.dispatch = t, [e, t]
            },
            useMemoCache: cu,
            useCacheRefresh: function () {
                return nt().memoizedState = Vh.bind(null, he)
            }
        },
        jf = {
            readContext: ke,
            use: mi,
            useCallback: wf,
            useContext: ke,
            useEffect: bf,
            useImperativeHandle: xf,
            useInsertionEffect: _f,
            useLayoutEffect: Tf,
            useMemo: Af,
            useReducer: vi,
            useRef: Ef,
            useState: function () {
                return vi(Zt)
            },
            useDebugValue: hu,
            useDeferredValue: function (e, t) {
                var l = je();
                return Cf(l, xe.memoizedState, e, t)
            },
            useTransition: function () {
                var e = vi(Zt)[0],
                    t = je().memoizedState;
                return [typeof e == "boolean" ? e : fn(e), t]
            },
            useSyncExternalStore: lf,
            useId: zf,
            useHostTransitionStatus: gu,
            useFormState: vf,
            useActionState: vf,
            useOptimistic: function (e, t) {
                var l = je();
                return cf(l, xe, e, t)
            },
            useMemoCache: cu,
            useCacheRefresh: Rf
        },
        Gh = {
            readContext: ke,
            use: mi,
            useCallback: wf,
            useContext: ke,
            useEffect: bf,
            useImperativeHandle: xf,
            useInsertionEffect: _f,
            useLayoutEffect: Tf,
            useMemo: Af,
            useReducer: ou,
            useRef: Ef,
            useState: function () {
                return ou(Zt)
            },
            useDebugValue: hu,
            useDeferredValue: function (e, t) {
                var l = je();
                return xe === null ? mu(l, e, t) : Cf(l, xe.memoizedState, e, t)
            },
            useTransition: function () {
                var e = ou(Zt)[0],
                    t = je().memoizedState;
                return [typeof e == "boolean" ? e : fn(e), t]
            },
            useSyncExternalStore: lf,
            useId: zf,
            useHostTransitionStatus: gu,
            useFormState: yf,
            useActionState: yf,
            useOptimistic: function (e, t) {
                var l = je();
                return xe !== null ? cf(l, xe, e, t) : (l.baseState = e, [e, l.queue.dispatch])
            },
            useMemoCache: cu,
            useCacheRefresh: Rf
        },
        Ea = null,
        pn = 0;

    function bi(e) {
        var t = pn;
        return pn += 1, Ea === null && (Ea = []), Fc(Ea, e, t)
    }

    function hn(e, t) {
        t = t.props.ref, e.ref = t !== void 0 ? t : null
    }

    function _i(e, t) {
        throw t.$$typeof === E ? Error(u(525)) : (e = Object.prototype.toString.call(t), Error(u(31, e === "[object Object]" ? "object with keys {" + Object.keys(t).join(", ") + "}" : e)))
    }

    function Gf(e) {
        var t = e._init;
        return t(e._payload)
    }

    function Bf(e) {
        function t(w, T) {
            if (e) {
                var N = w.deletions;
                N === null ? (w.deletions = [T], w.flags |= 16) : N.push(T)
            }
        }

        function l(w, T) {
            if (!e) return null;
            for (; T !== null;) t(w, T), T = T.sibling;
            return null
        }

        function a(w) {
            for (var T = new Map; w !== null;) w.key !== null ? T.set(w.key, w) : T.set(w.index, w), w = w.sibling;
            return T
        }

        function n(w, T) {
            return w = qt(w, T), w.index = 0, w.sibling = null, w
        }

        function c(w, T, N) {
            return w.index = N, e ? (N = w.alternate, N !== null ? (N = N.index, N < T ? (w.flags |= 67108866, T) : N) : (w.flags |= 67108866, T)) : (w.flags |= 1048576, T)
        }

        function d(w) {
            return e && w.alternate === null && (w.flags |= 67108866), w
        }

        function g(w, T, N, q) {
            return T === null || T.tag !== 6 ? (T = Gs(N, w.mode, q), T.return = w, T) : (T = n(T, N), T.return = w, T)
        }

        function b(w, T, N, q) {
            var W = N.type;
            return W === O ? B(w, T, N.props.children, q, N.key) : T !== null && (T.elementType === W || typeof W == "object" && W !== null && W.$$typeof === H && Gf(W) === T.type) ? (T = n(T, N.props), hn(T, N), T.return = w, T) : (T = ni(N.type, N.key, N.props, null, w.mode, q), hn(T, N), T.return = w, T)
        }

        function D(w, T, N, q) {
            return T === null || T.tag !== 4 || T.stateNode.containerInfo !== N.containerInfo || T.stateNode.implementation !== N.implementation ? (T = Bs(N, w.mode, q), T.return = w, T) : (T = n(T, N.children || []), T.return = w, T)
        }

        function B(w, T, N, q, W) {
            return T === null || T.tag !== 7 ? (T = Rl(N, w.mode, q, W), T.return = w, T) : (T = n(T, N), T.return = w, T)
        }

        function I(w, T, N) {
            if (typeof T == "string" && T !== "" || typeof T == "number" || typeof T == "bigint") return T = Gs("" + T, w.mode, N), T.return = w, T;
            if (typeof T == "object" && T !== null) {
                switch (T.$$typeof) {
                    case S:
                        return N = ni(T.type, T.key, T.props, null, w.mode, N), hn(N, T), N.return = w, N;
                    case A:
                        return T = Bs(T, w.mode, N), T.return = w, T;
                    case H:
                        var q = T._init;
                        return T = q(T._payload), I(w, T, N)
                }
                if (oe(T) || P(T)) return T = Rl(T, w.mode, N, null), T.return = w, T;
                if (typeof T.then == "function") return I(w, bi(T), N);
                if (T.$$typeof === Q) return I(w, ri(w, T), N);
                _i(w, T)
            }
            return null
        }

        function U(w, T, N, q) {
            var W = T !== null ? T.key : null;
            if (typeof N == "string" && N !== "" || typeof N == "number" || typeof N == "bigint") return W !== null ? null : g(w, T, "" + N, q);
            if (typeof N == "object" && N !== null) {
                switch (N.$$typeof) {
                    case S:
                        return N.key === W ? b(w, T, N, q) : null;
                    case A:
                        return N.key === W ? D(w, T, N, q) : null;
                    case H:
                        return W = N._init, N = W(N._payload), U(w, T, N, q)
                }
                if (oe(N) || P(N)) return W !== null ? null : B(w, T, N, q, null);
                if (typeof N.then == "function") return U(w, T, bi(N), q);
                if (N.$$typeof === Q) return U(w, T, ri(w, N), q);
                _i(w, N)
            }
            return null
        }

        function L(w, T, N, q, W) {
            if (typeof q == "string" && q !== "" || typeof q == "number" || typeof q == "bigint") return w = w.get(N) || null, g(T, w, "" + q, W);
            if (typeof q == "object" && q !== null) {
                switch (q.$$typeof) {
                    case S:
                        return w = w.get(q.key === null ? N : q.key) || null, b(T, w, q, W);
                    case A:
                        return w = w.get(q.key === null ? N : q.key) || null, D(T, w, q, W);
                    case H:
                        var me = q._init;
                        return q = me(q._payload), L(w, T, N, q, W)
                }
                if (oe(q) || P(q)) return w = w.get(N) || null, B(T, w, q, W, null);
                if (typeof q.then == "function") return L(w, T, N, bi(q), W);
                if (q.$$typeof === Q) return L(w, T, N, ri(T, q), W);
                _i(T, q)
            }
            return null
        }

        function ce(w, T, N, q) {
            for (var W = null, me = null, ne = T, ue = T = 0, Ze = null; ne !== null && ue < N.length; ue++) {
                ne.index > ue ? (Ze = ne, ne = null) : Ze = ne.sibling;
                var Se = U(w, ne, N[ue], q);
                if (Se === null) {
                    ne === null && (ne = Ze);
                    break
                }
                e && ne && Se.alternate === null && t(w, ne), T = c(Se, T, ue), me === null ? W = Se : me.sibling = Se, me = Se, ne = Ze
            }
            if (ue === N.length) return l(w, ne), be && Ll(w, ue), W;
            if (ne === null) {
                for (; ue < N.length; ue++) ne = I(w, N[ue], q), ne !== null && (T = c(ne, T, ue), me === null ? W = ne : me.sibling = ne, me = ne);
                return be && Ll(w, ue), W
            }
            for (ne = a(ne); ue < N.length; ue++) Ze = L(ne, w, ue, N[ue], q), Ze !== null && (e && Ze.alternate !== null && ne.delete(Ze.key === null ? ue : Ze.key), T = c(Ze, T, ue), me === null ? W = Ze : me.sibling = Ze, me = Ze);
            return e && ne.forEach(function (xl) {
                return t(w, xl)
            }), be && Ll(w, ue), W
        }

        function se(w, T, N, q) {
            if (N == null) throw Error(u(151));
            for (var W = null, me = null, ne = T, ue = T = 0, Ze = null, Se = N.next(); ne !== null && !Se.done; ue++, Se = N.next()) {
                ne.index > ue ? (Ze = ne, ne = null) : Ze = ne.sibling;
                var xl = U(w, ne, Se.value, q);
                if (xl === null) {
                    ne === null && (ne = Ze);
                    break
                }
                e && ne && xl.alternate === null && t(w, ne), T = c(xl, T, ue), me === null ? W = xl : me.sibling = xl, me = xl, ne = Ze
            }
            if (Se.done) return l(w, ne), be && Ll(w, ue), W;
            if (ne === null) {
                for (; !Se.done; ue++, Se = N.next()) Se = I(w, Se.value, q), Se !== null && (T = c(Se, T, ue), me === null ? W = Se : me.sibling = Se, me = Se);
                return be && Ll(w, ue), W
            }
            for (ne = a(ne); !Se.done; ue++, Se = N.next()) Se = L(ne, w, ue, Se.value, q), Se !== null && (e && Se.alternate !== null && ne.delete(Se.key === null ? ue : Se.key), T = c(Se, T, ue), me === null ? W = Se : me.sibling = Se, me = Se);
            return e && ne.forEach(function (Bm) {
                return t(w, Bm)
            }), be && Ll(w, ue), W
        }

        function Ae(w, T, N, q) {
            if (typeof N == "object" && N !== null && N.type === O && N.key === null && (N = N.props.children), typeof N == "object" && N !== null) {
                switch (N.$$typeof) {
                    case S:
                        e: {
                            for (var W = N.key; T !== null;) {
                                if (T.key === W) {
                                    if (W = N.type, W === O) {
                                        if (T.tag === 7) {
                                            l(w, T.sibling), q = n(T, N.props.children), q.return = w, w = q;
                                            break e
                                        }
                                    } else if (T.elementType === W || typeof W == "object" && W !== null && W.$$typeof === H && Gf(W) === T.type) {
                                        l(w, T.sibling), q = n(T, N.props), hn(q, N), q.return = w, w = q;
                                        break e
                                    }
                                    l(w, T);
                                    break
                                } else t(w, T);
                                T = T.sibling
                            }
                            N.type === O ? (q = Rl(N.props.children, w.mode, q, N.key), q.return = w, w = q) : (q = ni(N.type, N.key, N.props, null, w.mode, q), hn(q, N), q.return = w, w = q)
                        }
                        return d(w);
                    case A:
                        e: {
                            for (W = N.key; T !== null;) {
                                if (T.key === W)
                                    if (T.tag === 4 && T.stateNode.containerInfo === N.containerInfo && T.stateNode.implementation === N.implementation) {
                                        l(w, T.sibling), q = n(T, N.children || []), q.return = w, w = q;
                                        break e
                                    } else {
                                        l(w, T);
                                        break
                                    }
                                else t(w, T);
                                T = T.sibling
                            }
                            q = Bs(N, w.mode, q),
                                q.return = w,
                                w = q
                        }
                        return d(w);
                    case H:
                        return W = N._init, N = W(N._payload), Ae(w, T, N, q)
                }
                if (oe(N)) return ce(w, T, N, q);
                if (P(N)) {
                    if (W = P(N), typeof W != "function") throw Error(u(150));
                    return N = W.call(N), se(w, T, N, q)
                }
                if (typeof N.then == "function") return Ae(w, T, bi(N), q);
                if (N.$$typeof === Q) return Ae(w, T, ri(w, N), q);
                _i(w, N)
            }
            return typeof N == "string" && N !== "" || typeof N == "number" || typeof N == "bigint" ? (N = "" + N, T !== null && T.tag === 6 ? (l(w, T.sibling), q = n(T, N), q.return = w, w = q) : (l(w, T), q = Gs(N, w.mode, q), q.return = w, w = q), d(w)) : l(w, T)
        }
        return function (w, T, N, q) {
            try {
                pn = 0;
                var W = Ae(w, T, N, q);
                return Ea = null, W
            } catch (ne) {
                if (ne === an || ne === fi) throw ne;
                var me = ft(29, ne, null, w.mode);
                return me.lanes = q, me.return = w, me
            } finally { }
        }
    }
    var Sa = Bf(!0),
        qf = Bf(!1),
        Tt = X(null),
        zt = null;

    function fl(e) {
        var t = e.alternate;
        J(Be, Be.current & 1), J(Tt, e), zt === null && (t === null || ma.current !== null || t.memoizedState !== null) && (zt = e)
    }

    function Yf(e) {
        if (e.tag === 22) {
            if (J(Be, Be.current), J(Tt, e), zt === null) {
                var t = e.alternate;
                t !== null && t.memoizedState !== null && (zt = e)
            }
        } else ol()
    }

    function ol() {
        J(Be, Be.current), J(Tt, Tt.current)
    }

    function Kt(e) {
        $(Tt), zt === e && (zt = null), $(Be)
    }
    var Be = X(0);

    function Ti(e) {
        for (var t = e; t !== null;) {
            if (t.tag === 13) {
                var l = t.memoizedState;
                if (l !== null && (l = l.dehydrated, l === null || l.data === "$?" || rr(l))) return t
            } else if (t.tag === 19 && t.memoizedProps.revealOrder !== void 0) {
                if ((t.flags & 128) !== 0) return t
            } else if (t.child !== null) {
                t.child.return = t, t = t.child;
                continue
            }
            if (t === e) break;
            for (; t.sibling === null;) {
                if (t.return === null || t.return === e) return null;
                t = t.return
            }
            t.sibling.return = t.return, t = t.sibling
        }
        return null
    }

    function Eu(e, t, l, a) {
        t = e.memoizedState, l = l(a, t), l = l == null ? t : y({}, t, l), e.memoizedState = l, e.lanes === 0 && (e.updateQueue.baseState = l)
    }
    var Su = {
        enqueueSetState: function (e, t, l) {
            e = e._reactInternals;
            var a = ht(),
                n = ul(a);
            n.payload = t, l != null && (n.callback = l), t = rl(e, n, a), t !== null && (mt(t, e, a), sn(t, e, a))
        },
        enqueueReplaceState: function (e, t, l) {
            e = e._reactInternals;
            var a = ht(),
                n = ul(a);
            n.tag = 1, n.payload = t, l != null && (n.callback = l), t = rl(e, n, a), t !== null && (mt(t, e, a), sn(t, e, a))
        },
        enqueueForceUpdate: function (e, t) {
            e = e._reactInternals;
            var l = ht(),
                a = ul(l);
            a.tag = 2, t != null && (a.callback = t), t = rl(e, a, l), t !== null && (mt(t, e, l), sn(t, e, l))
        }
    };

    function If(e, t, l, a, n, c, d) {
        return e = e.stateNode, typeof e.shouldComponentUpdate == "function" ? e.shouldComponentUpdate(a, c, d) : t.prototype && t.prototype.isPureReactComponent ? !Pa(l, a) || !Pa(n, c) : !0
    }

    function Xf(e, t, l, a) {
        e = t.state, typeof t.componentWillReceiveProps == "function" && t.componentWillReceiveProps(l, a), typeof t.UNSAFE_componentWillReceiveProps == "function" && t.UNSAFE_componentWillReceiveProps(l, a), t.state !== e && Su.enqueueReplaceState(t, t.state, null)
    }

    function Yl(e, t) {
        var l = t;
        if ("ref" in t) {
            l = {};
            for (var a in t) a !== "ref" && (l[a] = t[a])
        }
        if (e = e.defaultProps) {
            l === t && (l = y({}, l));
            for (var n in e) l[n] === void 0 && (l[n] = e[n])
        }
        return l
    }
    var Oi = typeof reportError == "function" ? reportError : function (e) {
        if (typeof window == "object" && typeof window.ErrorEvent == "function") {
            var t = new window.ErrorEvent("error", {
                bubbles: !0,
                cancelable: !0,
                message: typeof e == "object" && e !== null && typeof e.message == "string" ? String(e.message) : String(e),
                error: e
            });
            if (!window.dispatchEvent(t)) return
        } else if (typeof process == "object" && typeof process.emit == "function") {
            process.emit("uncaughtException", e);
            return
        }
        console.error(e)
    };

    function Qf(e) {
        Oi(e)
    }

    function Zf(e) {
        console.error(e)
    }

    function Kf(e) {
        Oi(e)
    }

    function xi(e, t) {
        try {
            var l = e.onUncaughtError;
            l(t.value, {
                componentStack: t.stack
            })
        } catch (a) {
            setTimeout(function () {
                throw a
            })
        }
    }

    function Ff(e, t, l) {
        try {
            var a = e.onCaughtError;
            a(l.value, {
                componentStack: l.stack,
                errorBoundary: t.tag === 1 ? t.stateNode : null
            })
        } catch (n) {
            setTimeout(function () {
                throw n
            })
        }
    }

    function bu(e, t, l) {
        return l = ul(l), l.tag = 3, l.payload = {
            element: null
        }, l.callback = function () {
            xi(e, t)
        }, l
    }

    function Pf(e) {
        return e = ul(e), e.tag = 3, e
    }

    function Jf(e, t, l, a) {
        var n = l.type.getDerivedStateFromError;
        if (typeof n == "function") {
            var c = a.value;
            e.payload = function () {
                return n(c)
            }, e.callback = function () {
                Ff(t, l, a)
            }
        }
        var d = l.stateNode;
        d !== null && typeof d.componentDidCatch == "function" && (e.callback = function () {
            Ff(t, l, a), typeof n != "function" && (gl === null ? gl = new Set([this]) : gl.add(this));
            var g = a.stack;
            this.componentDidCatch(a.value, {
                componentStack: g !== null ? g : ""
            })
        })
    }

    function Bh(e, t, l, a, n) {
        if (l.flags |= 32768, a !== null && typeof a == "object" && typeof a.then == "function") {
            if (t = l.alternate, t !== null && en(t, l, n, !0), l = Tt.current, l !== null) {
                switch (l.tag) {
                    case 13:
                        return zt === null ? Qu() : l.alternate === null && Re === 0 && (Re = 3), l.flags &= -257, l.flags |= 65536, l.lanes = n, a === Js ? l.flags |= 16384 : (t = l.updateQueue, t === null ? l.updateQueue = new Set([a]) : t.add(a), Ku(e, a, n)), !1;
                    case 22:
                        return l.flags |= 65536, a === Js ? l.flags |= 16384 : (t = l.updateQueue, t === null ? (t = {
                            transitions: null,
                            markerInstances: null,
                            retryQueue: new Set([a])
                        }, l.updateQueue = t) : (l = t.retryQueue, l === null ? t.retryQueue = new Set([a]) : l.add(a)), Ku(e, a, n)), !1
                }
                throw Error(u(435, l.tag))
            }
            return Ku(e, a, n), Qu(), !1
        }
        if (be) return t = Tt.current, t !== null ? ((t.flags & 65536) === 0 && (t.flags |= 256), t.flags |= 65536, t.lanes = n, a !== Is && (e = Error(u(422), {
            cause: a
        }), Wa(Et(e, l)))) : (a !== Is && (t = Error(u(423), {
            cause: a
        }), Wa(Et(t, l))), e = e.current.alternate, e.flags |= 65536, n &= -n, e.lanes |= n, a = Et(a, l), n = bu(e.stateNode, a, n), Ws(e, n), Re !== 4 && (Re = 2)), !1;
        var c = Error(u(520), {
            cause: a
        });
        if (c = Et(c, l), bn === null ? bn = [c] : bn.push(c), Re !== 4 && (Re = 2), t === null) return !0;
        a = Et(a, l), l = t;
        do {
            switch (l.tag) {
                case 3:
                    return l.flags |= 65536, e = n & -n, l.lanes |= e, e = bu(l.stateNode, a, e), Ws(l, e), !1;
                case 1:
                    if (t = l.type, c = l.stateNode, (l.flags & 128) === 0 && (typeof t.getDerivedStateFromError == "function" || c !== null && typeof c.componentDidCatch == "function" && (gl === null || !gl.has(c)))) return l.flags |= 65536, n &= -n, l.lanes |= n, n = Pf(n), Jf(n, e, l, a), Ws(l, n), !1
            }
            l = l.return
        } while (l !== null);
        return !1
    }
    var kf = Error(u(461)),
        Xe = !1;

    function Ke(e, t, l, a) {
        t.child = e === null ? qf(t, null, l, a) : Sa(t, e.child, l, a)
    }

    function $f(e, t, l, a, n) {
        l = l.render;
        var c = t.ref;
        if ("ref" in a) {
            var d = {};
            for (var g in a) g !== "ref" && (d[g] = a[g])
        } else d = a;
        return Gl(t), a = nu(e, t, l, d, c, n), g = iu(), e !== null && !Xe ? (su(e, t, n), Ft(e, t, n)) : (be && g && qs(t), t.flags |= 1, Ke(e, t, a, n), t.child)
    }

    function Wf(e, t, l, a, n) {
        if (e === null) {
            var c = l.type;
            return typeof c == "function" && !js(c) && c.defaultProps === void 0 && l.compare === null ? (t.tag = 15, t.type = c, eo(e, t, c, a, n)) : (e = ni(l.type, null, a, t, t.mode, n), e.ref = t.ref, e.return = t, t.child = e)
        }
        if (c = e.child, !Nu(e, n)) {
            var d = c.memoizedProps;
            if (l = l.compare, l = l !== null ? l : Pa, l(d, a) && e.ref === t.ref) return Ft(e, t, n)
        }
        return t.flags |= 1, e = qt(c, a), e.ref = t.ref, e.return = t, t.child = e
    }

    function eo(e, t, l, a, n) {
        if (e !== null) {
            var c = e.memoizedProps;
            if (Pa(c, a) && e.ref === t.ref)
                if (Xe = !1, t.pendingProps = a = c, Nu(e, n)) (e.flags & 131072) !== 0 && (Xe = !0);
                else return t.lanes = e.lanes, Ft(e, t, n)
        }
        return _u(e, t, l, a, n)
    }

    function to(e, t, l) {
        var a = t.pendingProps,
            n = a.children,
            c = e !== null ? e.memoizedState : null;
        if (a.mode === "hidden") {
            if ((t.flags & 128) !== 0) {
                if (a = c !== null ? c.baseLanes | l : l, e !== null) {
                    for (n = t.child = e.child, c = 0; n !== null;) c = c | n.lanes | n.childLanes, n = n.sibling;
                    t.childLanes = c & ~a
                } else t.childLanes = 0, t.child = null;
                return lo(e, t, a, l)
            }
            if ((l & 536870912) !== 0) t.memoizedState = {
                baseLanes: 0,
                cachePool: null
            }, e !== null && ci(t, c !== null ? c.cachePool : null), c !== null ? Wc(t, c) : tu(), Yf(t);
            else return t.lanes = t.childLanes = 536870912, lo(e, t, c !== null ? c.baseLanes | l : l, l)
        } else c !== null ? (ci(t, c.cachePool), Wc(t, c), ol(), t.memoizedState = null) : (e !== null && ci(t, null), tu(), ol());
        return Ke(e, t, n, l), t.child
    }

    function lo(e, t, l, a) {
        var n = Ps();
        return n = n === null ? null : {
            parent: Ge._currentValue,
            pool: n
        }, t.memoizedState = {
            baseLanes: l,
            cachePool: n
        }, e !== null && ci(t, null), tu(), Yf(t), e !== null && en(e, t, a, !0), null
    }

    function wi(e, t) {
        var l = t.ref;
        if (l === null) e !== null && e.ref !== null && (t.flags |= 4194816);
        else {
            if (typeof l != "function" && typeof l != "object") throw Error(u(284));
            (e === null || e.ref !== l) && (t.flags |= 4194816)
        }
    }

    function _u(e, t, l, a, n) {
        return Gl(t), l = nu(e, t, l, a, void 0, n), a = iu(), e !== null && !Xe ? (su(e, t, n), Ft(e, t, n)) : (be && a && qs(t), t.flags |= 1, Ke(e, t, l, n), t.child)
    }

    function ao(e, t, l, a, n, c) {
        return Gl(t), t.updateQueue = null, l = tf(t, a, l, n), ef(e), a = iu(), e !== null && !Xe ? (su(e, t, c), Ft(e, t, c)) : (be && a && qs(t), t.flags |= 1, Ke(e, t, l, c), t.child)
    }

    function no(e, t, l, a, n) {
        if (Gl(t), t.stateNode === null) {
            var c = fa,
                d = l.contextType;
            typeof d == "object" && d !== null && (c = ke(d)), c = new l(a, c), t.memoizedState = c.state !== null && c.state !== void 0 ? c.state : null, c.updater = Su, t.stateNode = c, c._reactInternals = t, c = t.stateNode, c.props = a, c.state = t.memoizedState, c.refs = {}, ks(t), d = l.contextType, c.context = typeof d == "object" && d !== null ? ke(d) : fa, c.state = t.memoizedState, d = l.getDerivedStateFromProps, typeof d == "function" && (Eu(t, l, d, a), c.state = t.memoizedState), typeof l.getDerivedStateFromProps == "function" || typeof c.getSnapshotBeforeUpdate == "function" || typeof c.UNSAFE_componentWillMount != "function" && typeof c.componentWillMount != "function" || (d = c.state, typeof c.componentWillMount == "function" && c.componentWillMount(), typeof c.UNSAFE_componentWillMount == "function" && c.UNSAFE_componentWillMount(), d !== c.state && Su.enqueueReplaceState(c, c.state, null), rn(t, a, c, n), un(), c.state = t.memoizedState), typeof c.componentDidMount == "function" && (t.flags |= 4194308), a = !0
        } else if (e === null) {
            c = t.stateNode;
            var g = t.memoizedProps,
                b = Yl(l, g);
            c.props = b;
            var D = c.context,
                B = l.contextType;
            d = fa, typeof B == "object" && B !== null && (d = ke(B));
            var I = l.getDerivedStateFromProps;
            B = typeof I == "function" || typeof c.getSnapshotBeforeUpdate == "function", g = t.pendingProps !== g, B || typeof c.UNSAFE_componentWillReceiveProps != "function" && typeof c.componentWillReceiveProps != "function" || (g || D !== d) && Xf(t, c, a, d), sl = !1;
            var U = t.memoizedState;
            c.state = U, rn(t, a, c, n), un(), D = t.memoizedState, g || U !== D || sl ? (typeof I == "function" && (Eu(t, l, I, a), D = t.memoizedState), (b = sl || If(t, l, b, a, U, D, d)) ? (B || typeof c.UNSAFE_componentWillMount != "function" && typeof c.componentWillMount != "function" || (typeof c.componentWillMount == "function" && c.componentWillMount(), typeof c.UNSAFE_componentWillMount == "function" && c.UNSAFE_componentWillMount()), typeof c.componentDidMount == "function" && (t.flags |= 4194308)) : (typeof c.componentDidMount == "function" && (t.flags |= 4194308), t.memoizedProps = a, t.memoizedState = D), c.props = a, c.state = D, c.context = d, a = b) : (typeof c.componentDidMount == "function" && (t.flags |= 4194308), a = !1)
        } else {
            c = t.stateNode, $s(e, t), d = t.memoizedProps, B = Yl(l, d), c.props = B, I = t.pendingProps, U = c.context, D = l.contextType, b = fa, typeof D == "object" && D !== null && (b = ke(D)), g = l.getDerivedStateFromProps, (D = typeof g == "function" || typeof c.getSnapshotBeforeUpdate == "function") || typeof c.UNSAFE_componentWillReceiveProps != "function" && typeof c.componentWillReceiveProps != "function" || (d !== I || U !== b) && Xf(t, c, a, b), sl = !1, U = t.memoizedState, c.state = U, rn(t, a, c, n), un();
            var L = t.memoizedState;
            d !== I || U !== L || sl || e !== null && e.dependencies !== null && ui(e.dependencies) ? (typeof g == "function" && (Eu(t, l, g, a), L = t.memoizedState), (B = sl || If(t, l, B, a, U, L, b) || e !== null && e.dependencies !== null && ui(e.dependencies)) ? (D || typeof c.UNSAFE_componentWillUpdate != "function" && typeof c.componentWillUpdate != "function" || (typeof c.componentWillUpdate == "function" && c.componentWillUpdate(a, L, b), typeof c.UNSAFE_componentWillUpdate == "function" && c.UNSAFE_componentWillUpdate(a, L, b)), typeof c.componentDidUpdate == "function" && (t.flags |= 4), typeof c.getSnapshotBeforeUpdate == "function" && (t.flags |= 1024)) : (typeof c.componentDidUpdate != "function" || d === e.memoizedProps && U === e.memoizedState || (t.flags |= 4), typeof c.getSnapshotBeforeUpdate != "function" || d === e.memoizedProps && U === e.memoizedState || (t.flags |= 1024), t.memoizedProps = a, t.memoizedState = L), c.props = a, c.state = L, c.context = b, a = B) : (typeof c.componentDidUpdate != "function" || d === e.memoizedProps && U === e.memoizedState || (t.flags |= 4), typeof c.getSnapshotBeforeUpdate != "function" || d === e.memoizedProps && U === e.memoizedState || (t.flags |= 1024), a = !1)
        }
        return c = a, wi(e, t), a = (t.flags & 128) !== 0, c || a ? (c = t.stateNode, l = a && typeof l.getDerivedStateFromError != "function" ? null : c.render(), t.flags |= 1, e !== null && a ? (t.child = Sa(t, e.child, null, n), t.child = Sa(t, null, l, n)) : Ke(e, t, l, n), t.memoizedState = c.state, e = t.child) : e = Ft(e, t, n), e
    }

    function io(e, t, l, a) {
        return $a(), t.flags |= 256, Ke(e, t, l, a), t.child
    }
    var Tu = {
        dehydrated: null,
        treeContext: null,
        retryLane: 0,
        hydrationErrors: null
    };

    function Ou(e) {
        return {
            baseLanes: e,
            cachePool: Qc()
        }
    }

    function xu(e, t, l) {
        return e = e !== null ? e.childLanes & ~l : 0, t && (e |= Ot), e
    }

    function so(e, t, l) {
        var a = t.pendingProps,
            n = !1,
            c = (t.flags & 128) !== 0,
            d;
        if ((d = c) || (d = e !== null && e.memoizedState === null ? !1 : (Be.current & 2) !== 0), d && (n = !0, t.flags &= -129), d = (t.flags & 32) !== 0, t.flags &= -33, e === null) {
            if (be) {
                if (n ? fl(t) : ol(), be) {
                    var g = ze,
                        b;
                    if (b = g) {
                        e: {
                            for (b = g, g = Dt; b.nodeType !== 8;) {
                                if (!g) {
                                    g = null;
                                    break e
                                }
                                if (b = Ct(b.nextSibling), b === null) {
                                    g = null;
                                    break e
                                }
                            }
                            g = b
                        }
                        g !== null ? (t.memoizedState = {
                            dehydrated: g,
                            treeContext: Ul !== null ? {
                                id: Yt,
                                overflow: It
                            } : null,
                            retryLane: 536870912,
                            hydrationErrors: null
                        }, b = ft(18, null, null, 0), b.stateNode = g, b.return = t, t.child = b, We = t, ze = null, b = !0) : b = !1
                    }
                    b || Vl(t)
                }
                if (g = t.memoizedState, g !== null && (g = g.dehydrated, g !== null)) return rr(g) ? t.lanes = 32 : t.lanes = 536870912, null;
                Kt(t)
            }
            return g = a.children, a = a.fallback, n ? (ol(), n = t.mode, g = Ai({
                mode: "hidden",
                children: g
            }, n), a = Rl(a, n, l, null), g.return = t, a.return = t, g.sibling = a, t.child = g, n = t.child, n.memoizedState = Ou(l), n.childLanes = xu(e, d, l), t.memoizedState = Tu, a) : (fl(t), wu(t, g))
        }
        if (b = e.memoizedState, b !== null && (g = b.dehydrated, g !== null)) {
            if (c) t.flags & 256 ? (fl(t), t.flags &= -257, t = Au(e, t, l)) : t.memoizedState !== null ? (ol(), t.child = e.child, t.flags |= 128, t = null) : (ol(), n = a.fallback, g = t.mode, a = Ai({
                mode: "visible",
                children: a.children
            }, g), n = Rl(n, g, l, null), n.flags |= 2, a.return = t, n.return = t, a.sibling = n, t.child = a, Sa(t, e.child, null, l), a = t.child, a.memoizedState = Ou(l), a.childLanes = xu(e, d, l), t.memoizedState = Tu, t = n);
            else if (fl(t), rr(g)) {
                if (d = g.nextSibling && g.nextSibling.dataset, d) var D = d.dgst;
                d = D, a = Error(u(419)), a.stack = "", a.digest = d, Wa({
                    value: a,
                    source: null,
                    stack: null
                }), t = Au(e, t, l)
            } else if (Xe || en(e, t, l, !1), d = (l & e.childLanes) !== 0, Xe || d) {
                if (d = Ne, d !== null && (a = l & -l, a = (a & 42) !== 0 ? 1 : cs(a), a = (a & (d.suspendedLanes | l)) !== 0 ? 0 : a, a !== 0 && a !== b.retryLane)) throw b.retryLane = a, ca(e, a), mt(d, e, a), kf;
                g.data === "$?" || Qu(), t = Au(e, t, l)
            } else g.data === "$?" ? (t.flags |= 192, t.child = e.child, t = null) : (e = b.treeContext, ze = Ct(g.nextSibling), We = t, be = !0, Hl = null, Dt = !1, e !== null && (bt[_t++] = Yt, bt[_t++] = It, bt[_t++] = Ul, Yt = e.id, It = e.overflow, Ul = t), t = wu(t, a.children), t.flags |= 4096);
            return t
        }
        return n ? (ol(), n = a.fallback, g = t.mode, b = e.child, D = b.sibling, a = qt(b, {
            mode: "hidden",
            children: a.children
        }), a.subtreeFlags = b.subtreeFlags & 65011712, D !== null ? n = qt(D, n) : (n = Rl(n, g, l, null), n.flags |= 2), n.return = t, a.return = t, a.sibling = n, t.child = a, a = n, n = t.child, g = e.child.memoizedState, g === null ? g = Ou(l) : (b = g.cachePool, b !== null ? (D = Ge._currentValue, b = b.parent !== D ? {
            parent: D,
            pool: D
        } : b) : b = Qc(), g = {
            baseLanes: g.baseLanes | l,
            cachePool: b
        }), n.memoizedState = g, n.childLanes = xu(e, d, l), t.memoizedState = Tu, a) : (fl(t), l = e.child, e = l.sibling, l = qt(l, {
            mode: "visible",
            children: a.children
        }), l.return = t, l.sibling = null, e !== null && (d = t.deletions, d === null ? (t.deletions = [e], t.flags |= 16) : d.push(e)), t.child = l, t.memoizedState = null, l)
    }

    function wu(e, t) {
        return t = Ai({
            mode: "visible",
            children: t
        }, e.mode), t.return = e, e.child = t
    }

    function Ai(e, t) {
        return e = ft(22, e, null, t), e.lanes = 0, e.stateNode = {
            _visibility: 1,
            _pendingMarkers: null,
            _retryCache: null,
            _transitions: null
        }, e
    }

    function Au(e, t, l) {
        return Sa(t, e.child, null, l), e = wu(t, t.pendingProps.children), e.flags |= 2, t.memoizedState = null, e
    }

    function uo(e, t, l) {
        e.lanes |= t;
        var a = e.alternate;
        a !== null && (a.lanes |= t), Qs(e.return, t, l)
    }

    function Cu(e, t, l, a, n) {
        var c = e.memoizedState;
        c === null ? e.memoizedState = {
            isBackwards: t,
            rendering: null,
            renderingStartTime: 0,
            last: a,
            tail: l,
            tailMode: n
        } : (c.isBackwards = t, c.rendering = null, c.renderingStartTime = 0, c.last = a, c.tail = l, c.tailMode = n)
    }

    function ro(e, t, l) {
        var a = t.pendingProps,
            n = a.revealOrder,
            c = a.tail;
        if (Ke(e, t, a.children, l), a = Be.current, (a & 2) !== 0) a = a & 1 | 2, t.flags |= 128;
        else {
            if (e !== null && (e.flags & 128) !== 0) e: for (e = t.child; e !== null;) {
                if (e.tag === 13) e.memoizedState !== null && uo(e, l, t);
                else if (e.tag === 19) uo(e, l, t);
                else if (e.child !== null) {
                    e.child.return = e, e = e.child;
                    continue
                }
                if (e === t) break e;
                for (; e.sibling === null;) {
                    if (e.return === null || e.return === t) break e;
                    e = e.return
                }
                e.sibling.return = e.return, e = e.sibling
            }
            a &= 1
        }
        switch (J(Be, a), n) {
            case "forwards":
                for (l = t.child, n = null; l !== null;) e = l.alternate, e !== null && Ti(e) === null && (n = l), l = l.sibling;
                l = n, l === null ? (n = t.child, t.child = null) : (n = l.sibling, l.sibling = null), Cu(t, !1, n, l, c);
                break;
            case "backwards":
                for (l = null, n = t.child, t.child = null; n !== null;) {
                    if (e = n.alternate, e !== null && Ti(e) === null) {
                        t.child = n;
                        break
                    }
                    e = n.sibling, n.sibling = l, l = n, n = e
                }
                Cu(t, !0, l, null, c);
                break;
            case "together":
                Cu(t, !1, null, null, void 0);
                break;
            default:
                t.memoizedState = null
        }
        return t.child
    }

    function Ft(e, t, l) {
        if (e !== null && (t.dependencies = e.dependencies), vl |= t.lanes, (l & t.childLanes) === 0)
            if (e !== null) {
                if (en(e, t, l, !1), (l & t.childLanes) === 0) return null
            } else return null;
        if (e !== null && t.child !== e.child) throw Error(u(153));
        if (t.child !== null) {
            for (e = t.child, l = qt(e, e.pendingProps), t.child = l, l.return = t; e.sibling !== null;) e = e.sibling, l = l.sibling = qt(e, e.pendingProps), l.return = t;
            l.sibling = null
        }
        return t.child
    }

    function Nu(e, t) {
        return (e.lanes & t) !== 0 ? !0 : (e = e.dependencies, !!(e !== null && ui(e)))
    }

    function qh(e, t, l) {
        switch (t.tag) {
            case 3:
                ye(t, t.stateNode.containerInfo), il(t, Ge, e.memoizedState.cache), $a();
                break;
            case 27:
            case 5:
                Vt(t);
                break;
            case 4:
                ye(t, t.stateNode.containerInfo);
                break;
            case 10:
                il(t, t.type, t.memoizedProps.value);
                break;
            case 13:
                var a = t.memoizedState;
                if (a !== null) return a.dehydrated !== null ? (fl(t), t.flags |= 128, null) : (l & t.child.childLanes) !== 0 ? so(e, t, l) : (fl(t), e = Ft(e, t, l), e !== null ? e.sibling : null);
                fl(t);
                break;
            case 19:
                var n = (e.flags & 128) !== 0;
                if (a = (l & t.childLanes) !== 0, a || (en(e, t, l, !1), a = (l & t.childLanes) !== 0), n) {
                    if (a) return ro(e, t, l);
                    t.flags |= 128
                }
                if (n = t.memoizedState, n !== null && (n.rendering = null, n.tail = null, n.lastEffect = null), J(Be, Be.current), a) break;
                return null;
            case 22:
            case 23:
                return t.lanes = 0, to(e, t, l);
            case 24:
                il(t, Ge, e.memoizedState.cache)
        }
        return Ft(e, t, l)
    }

    function co(e, t, l) {
        if (e !== null)
            if (e.memoizedProps !== t.pendingProps) Xe = !0;
            else {
                if (!Nu(e, l) && (t.flags & 128) === 0) return Xe = !1, qh(e, t, l);
                Xe = (e.flags & 131072) !== 0
            }
        else Xe = !1, be && (t.flags & 1048576) !== 0 && jc(t, si, t.index);
        switch (t.lanes = 0, t.tag) {
            case 16:
                e: {
                    e = t.pendingProps;
                    var a = t.elementType,
                        n = a._init;
                    if (a = n(a._payload), t.type = a, typeof a == "function") js(a) ? (e = Yl(a, e), t.tag = 1, t = no(null, t, a, e, l)) : (t.tag = 0, t = _u(null, t, a, e, l));
                    else {
                        if (a != null) {
                            if (n = a.$$typeof, n === F) {
                                t.tag = 11, t = $f(null, t, a, e, l);
                                break e
                            } else if (n === ae) {
                                t.tag = 14, t = Wf(null, t, a, e, l);
                                break e
                            }
                        }
                        throw t = _e(a) || a, Error(u(306, t, ""))
                    }
                }
                return t;
            case 0:
                return _u(e, t, t.type, t.pendingProps, l);
            case 1:
                return a = t.type, n = Yl(a, t.pendingProps), no(e, t, a, n, l);
            case 3:
                e: {
                    if (ye(t, t.stateNode.containerInfo), e === null) throw Error(u(387)); a = t.pendingProps;
                    var c = t.memoizedState; n = c.element,
                        $s(e, t),
                        rn(t, a, null, l);
                    var d = t.memoizedState;
                    if (a = d.cache, il(t, Ge, a), a !== c.cache && Zs(t, [Ge], l, !0), un(), a = d.element, c.isDehydrated)
                        if (c = {
                            element: a,
                            isDehydrated: !1,
                            cache: d.cache
                        }, t.updateQueue.baseState = c, t.memoizedState = c, t.flags & 256) {
                            t = io(e, t, a, l);
                            break e
                        } else if (a !== n) {
                            n = Et(Error(u(424)), t), Wa(n), t = io(e, t, a, l);
                            break e
                        } else {
                            switch (e = t.stateNode.containerInfo, e.nodeType) {
                                case 9:
                                    e = e.body;
                                    break;
                                default:
                                    e = e.nodeName === "HTML" ? e.ownerDocument.body : e
                            }
                            for (ze = Ct(e.firstChild), We = t, be = !0, Hl = null, Dt = !0, l = qf(t, null, a, l), t.child = l; l;) l.flags = l.flags & -3 | 4096, l = l.sibling
                        } else {
                        if ($a(), a === n) {
                            t = Ft(e, t, l);
                            break e
                        }
                        Ke(e, t, a, l)
                    }
                    t = t.child
                }
                return t;
            case 26:
                return wi(e, t), e === null ? (l = hd(t.type, null, t.pendingProps, null)) ? t.memoizedState = l : be || (l = t.type, e = t.pendingProps, a = qi(ie.current).createElement(l), a[Je] = t, a[lt] = e, Pe(a, l, e), Ie(a), t.stateNode = a) : t.memoizedState = hd(t.type, e.memoizedProps, t.pendingProps, e.memoizedState), null;
            case 27:
                return Vt(t), e === null && be && (a = t.stateNode = od(t.type, t.pendingProps, ie.current), We = t, Dt = !0, n = ze, Sl(t.type) ? (cr = n, ze = Ct(a.firstChild)) : ze = n), Ke(e, t, t.pendingProps.children, l), wi(e, t), e === null && (t.flags |= 4194304), t.child;
            case 5:
                return e === null && be && ((n = a = ze) && (a = mm(a, t.type, t.pendingProps, Dt), a !== null ? (t.stateNode = a, We = t, ze = Ct(a.firstChild), Dt = !1, n = !0) : n = !1), n || Vl(t)), Vt(t), n = t.type, c = t.pendingProps, d = e !== null ? e.memoizedProps : null, a = c.children, ir(n, c) ? a = null : d !== null && ir(n, d) && (t.flags |= 32), t.memoizedState !== null && (n = nu(e, t, Rh, null, null, l), Mn._currentValue = n), wi(e, t), Ke(e, t, a, l), t.child;
            case 6:
                return e === null && be && ((e = l = ze) && (l = vm(l, t.pendingProps, Dt), l !== null ? (t.stateNode = l, We = t, ze = null, e = !0) : e = !1), e || Vl(t)), null;
            case 13:
                return so(e, t, l);
            case 4:
                return ye(t, t.stateNode.containerInfo), a = t.pendingProps, e === null ? t.child = Sa(t, null, a, l) : Ke(e, t, a, l), t.child;
            case 11:
                return $f(e, t, t.type, t.pendingProps, l);
            case 7:
                return Ke(e, t, t.pendingProps, l), t.child;
            case 8:
                return Ke(e, t, t.pendingProps.children, l), t.child;
            case 12:
                return Ke(e, t, t.pendingProps.children, l), t.child;
            case 10:
                return a = t.pendingProps, il(t, t.type, a.value), Ke(e, t, a.children, l), t.child;
            case 9:
                return n = t.type._context, a = t.pendingProps.children, Gl(t), n = ke(n), a = a(n), t.flags |= 1, Ke(e, t, a, l), t.child;
            case 14:
                return Wf(e, t, t.type, t.pendingProps, l);
            case 15:
                return eo(e, t, t.type, t.pendingProps, l);
            case 19:
                return ro(e, t, l);
            case 31:
                return a = t.pendingProps, l = t.mode, a = {
                    mode: a.mode,
                    children: a.children
                }, e === null ? (l = Ai(a, l), l.ref = t.ref, t.child = l, l.return = t, t = l) : (l = qt(e.child, a), l.ref = t.ref, t.child = l, l.return = t, t = l), t;
            case 22:
                return to(e, t, l);
            case 24:
                return Gl(t), a = ke(Ge), e === null ? (n = Ps(), n === null && (n = Ne, c = Ks(), n.pooledCache = c, c.refCount++, c !== null && (n.pooledCacheLanes |= l), n = c), t.memoizedState = {
                    parent: a,
                    cache: n
                }, ks(t), il(t, Ge, n)) : ((e.lanes & l) !== 0 && ($s(e, t), rn(t, null, null, l), un()), n = e.memoizedState, c = t.memoizedState, n.parent !== a ? (n = {
                    parent: a,
                    cache: a
                }, t.memoizedState = n, t.lanes === 0 && (t.memoizedState = t.updateQueue.baseState = n), il(t, Ge, a)) : (a = c.cache, il(t, Ge, a), a !== n.cache && Zs(t, [Ge], l, !0))), Ke(e, t, t.pendingProps.children, l), t.child;
            case 29:
                throw t.pendingProps
        }
        throw Error(u(156, t.tag))
    }

    function Pt(e) {
        e.flags |= 4
    }

    function fo(e, t) {
        if (t.type !== "stylesheet" || (t.state.loading & 4) !== 0) e.flags &= -16777217;
        else if (e.flags |= 16777216, !Ed(t)) {
            if (t = Tt.current, t !== null && ((Ee & 4194048) === Ee ? zt !== null : (Ee & 62914560) !== Ee && (Ee & 536870912) === 0 || t !== zt)) throw nn = Js, Zc;
            e.flags |= 8192
        }
    }

    function Ci(e, t) {
        t !== null && (e.flags |= 4), e.flags & 16384 && (t = e.tag !== 22 ? qr() : 536870912, e.lanes |= t, Oa |= t)
    }

    function mn(e, t) {
        if (!be) switch (e.tailMode) {
            case "hidden":
                t = e.tail;
                for (var l = null; t !== null;) t.alternate !== null && (l = t), t = t.sibling;
                l === null ? e.tail = null : l.sibling = null;
                break;
            case "collapsed":
                l = e.tail;
                for (var a = null; l !== null;) l.alternate !== null && (a = l), l = l.sibling;
                a === null ? t || e.tail === null ? e.tail = null : e.tail.sibling = null : a.sibling = null
        }
    }

    function De(e) {
        var t = e.alternate !== null && e.alternate.child === e.child,
            l = 0,
            a = 0;
        if (t)
            for (var n = e.child; n !== null;) l |= n.lanes | n.childLanes, a |= n.subtreeFlags & 65011712, a |= n.flags & 65011712, n.return = e, n = n.sibling;
        else
            for (n = e.child; n !== null;) l |= n.lanes | n.childLanes, a |= n.subtreeFlags, a |= n.flags, n.return = e, n = n.sibling;
        return e.subtreeFlags |= a, e.childLanes = l, t
    }

    function Yh(e, t, l) {
        var a = t.pendingProps;
        switch (Ys(t), t.tag) {
            case 31:
            case 16:
            case 15:
            case 0:
            case 11:
            case 7:
            case 8:
            case 12:
            case 9:
            case 14:
                return De(t), null;
            case 1:
                return De(t), null;
            case 3:
                return l = t.stateNode, a = null, e !== null && (a = e.memoizedState.cache), t.memoizedState.cache !== a && (t.flags |= 2048), Qt(Ge), Ye(), l.pendingContext && (l.context = l.pendingContext, l.pendingContext = null), (e === null || e.child === null) && (ka(t) ? Pt(t) : e === null || e.memoizedState.isDehydrated && (t.flags & 256) === 0 || (t.flags |= 1024, qc())), De(t), null;
            case 26:
                return l = t.memoizedState, e === null ? (Pt(t), l !== null ? (De(t), fo(t, l)) : (De(t), t.flags &= -16777217)) : l ? l !== e.memoizedState ? (Pt(t), De(t), fo(t, l)) : (De(t), t.flags &= -16777217) : (e.memoizedProps !== a && Pt(t), De(t), t.flags &= -16777217), null;
            case 27:
                Nt(t), l = ie.current;
                var n = t.type;
                if (e !== null && t.stateNode != null) e.memoizedProps !== a && Pt(t);
                else {
                    if (!a) {
                        if (t.stateNode === null) throw Error(u(166));
                        return De(t), null
                    }
                    e = te.current, ka(t) ? Gc(t) : (e = od(n, a, l), t.stateNode = e, Pt(t))
                }
                return De(t), null;
            case 5:
                if (Nt(t), l = t.type, e !== null && t.stateNode != null) e.memoizedProps !== a && Pt(t);
                else {
                    if (!a) {
                        if (t.stateNode === null) throw Error(u(166));
                        return De(t), null
                    }
                    if (e = te.current, ka(t)) Gc(t);
                    else {
                        switch (n = qi(ie.current), e) {
                            case 1:
                                e = n.createElementNS("http://www.w3.org/2000/svg", l);
                                break;
                            case 2:
                                e = n.createElementNS("http://www.w3.org/1998/Math/MathML", l);
                                break;
                            default:
                                switch (l) {
                                    case "svg":
                                        e = n.createElementNS("http://www.w3.org/2000/svg", l);
                                        break;
                                    case "math":
                                        e = n.createElementNS("http://www.w3.org/1998/Math/MathML", l);
                                        break;
                                    case "script":
                                        e = n.createElement("div"), e.innerHTML = "<script><\/script>", e = e.removeChild(e.firstChild);
                                        break;
                                    case "select":
                                        e = typeof a.is == "string" ? n.createElement("select", {
                                            is: a.is
                                        }) : n.createElement("select"), a.multiple ? e.multiple = !0 : a.size && (e.size = a.size);
                                        break;
                                    default:
                                        e = typeof a.is == "string" ? n.createElement(l, {
                                            is: a.is
                                        }) : n.createElement(l)
                                }
                        }
                        e[Je] = t, e[lt] = a;
                        e: for (n = t.child; n !== null;) {
                            if (n.tag === 5 || n.tag === 6) e.appendChild(n.stateNode);
                            else if (n.tag !== 4 && n.tag !== 27 && n.child !== null) {
                                n.child.return = n, n = n.child;
                                continue
                            }
                            if (n === t) break e;
                            for (; n.sibling === null;) {
                                if (n.return === null || n.return === t) break e;
                                n = n.return
                            }
                            n.sibling.return = n.return, n = n.sibling
                        }
                        t.stateNode = e;
                        e: switch (Pe(e, l, a), l) {
                            case "button":
                            case "input":
                            case "select":
                            case "textarea":
                                e = !!a.autoFocus;
                                break e;
                            case "img":
                                e = !0;
                                break e;
                            default:
                                e = !1
                        }
                        e && Pt(t)
                    }
                }
                return De(t), t.flags &= -16777217, null;
            case 6:
                if (e && t.stateNode != null) e.memoizedProps !== a && Pt(t);
                else {
                    if (typeof a != "string" && t.stateNode === null) throw Error(u(166));
                    if (e = ie.current, ka(t)) {
                        if (e = t.stateNode, l = t.memoizedProps, a = null, n = We, n !== null) switch (n.tag) {
                            case 27:
                            case 5:
                                a = n.memoizedProps
                        }
                        e[Je] = t, e = !!(e.nodeValue === l || a !== null && a.suppressHydrationWarning === !0 || nd(e.nodeValue, l)), e || Vl(t)
                    } else e = qi(e).createTextNode(a), e[Je] = t, t.stateNode = e
                }
                return De(t), null;
            case 13:
                if (a = t.memoizedState, e === null || e.memoizedState !== null && e.memoizedState.dehydrated !== null) {
                    if (n = ka(t), a !== null && a.dehydrated !== null) {
                        if (e === null) {
                            if (!n) throw Error(u(318));
                            if (n = t.memoizedState, n = n !== null ? n.dehydrated : null, !n) throw Error(u(317));
                            n[Je] = t
                        } else $a(), (t.flags & 128) === 0 && (t.memoizedState = null), t.flags |= 4;
                        De(t), n = !1
                    } else n = qc(), e !== null && e.memoizedState !== null && (e.memoizedState.hydrationErrors = n), n = !0;
                    if (!n) return t.flags & 256 ? (Kt(t), t) : (Kt(t), null)
                }
                if (Kt(t), (t.flags & 128) !== 0) return t.lanes = l, t;
                if (l = a !== null, e = e !== null && e.memoizedState !== null, l) {
                    a = t.child, n = null, a.alternate !== null && a.alternate.memoizedState !== null && a.alternate.memoizedState.cachePool !== null && (n = a.alternate.memoizedState.cachePool.pool);
                    var c = null;
                    a.memoizedState !== null && a.memoizedState.cachePool !== null && (c = a.memoizedState.cachePool.pool), c !== n && (a.flags |= 2048)
                }
                return l !== e && l && (t.child.flags |= 8192), Ci(t, t.updateQueue), De(t), null;
            case 4:
                return Ye(), e === null && er(t.stateNode.containerInfo), De(t), null;
            case 10:
                return Qt(t.type), De(t), null;
            case 19:
                if ($(Be), n = t.memoizedState, n === null) return De(t), null;
                if (a = (t.flags & 128) !== 0, c = n.rendering, c === null)
                    if (a) mn(n, !1);
                    else {
                        if (Re !== 0 || e !== null && (e.flags & 128) !== 0)
                            for (e = t.child; e !== null;) {
                                if (c = Ti(e), c !== null) {
                                    for (t.flags |= 128, mn(n, !1), e = c.updateQueue, t.updateQueue = e, Ci(t, e), t.subtreeFlags = 0, e = l, l = t.child; l !== null;) Vc(l, e), l = l.sibling;
                                    return J(Be, Be.current & 1 | 2), t.child
                                }
                                e = e.sibling
                            }
                        n.tail !== null && Mt() > Di && (t.flags |= 128, a = !0, mn(n, !1), t.lanes = 4194304)
                    }
                else {
                    if (!a)
                        if (e = Ti(c), e !== null) {
                            if (t.flags |= 128, a = !0, e = e.updateQueue, t.updateQueue = e, Ci(t, e), mn(n, !0), n.tail === null && n.tailMode === "hidden" && !c.alternate && !be) return De(t), null
                        } else 2 * Mt() - n.renderingStartTime > Di && l !== 536870912 && (t.flags |= 128, a = !0, mn(n, !1), t.lanes = 4194304);
                    n.isBackwards ? (c.sibling = t.child, t.child = c) : (e = n.last, e !== null ? e.sibling = c : t.child = c, n.last = c)
                }
                return n.tail !== null ? (t = n.tail, n.rendering = t, n.tail = t.sibling, n.renderingStartTime = Mt(), t.sibling = null, e = Be.current, J(Be, a ? e & 1 | 2 : e & 1), t) : (De(t), null);
            case 22:
            case 23:
                return Kt(t), lu(), a = t.memoizedState !== null, e !== null ? e.memoizedState !== null !== a && (t.flags |= 8192) : a && (t.flags |= 8192), a ? (l & 536870912) !== 0 && (t.flags & 128) === 0 && (De(t), t.subtreeFlags & 6 && (t.flags |= 8192)) : De(t), l = t.updateQueue, l !== null && Ci(t, l.retryQueue), l = null, e !== null && e.memoizedState !== null && e.memoizedState.cachePool !== null && (l = e.memoizedState.cachePool.pool), a = null, t.memoizedState !== null && t.memoizedState.cachePool !== null && (a = t.memoizedState.cachePool.pool), a !== l && (t.flags |= 2048), e !== null && $(Bl), null;
            case 24:
                return l = null, e !== null && (l = e.memoizedState.cache), t.memoizedState.cache !== l && (t.flags |= 2048), Qt(Ge), De(t), null;
            case 25:
                return null;
            case 30:
                return null
        }
        throw Error(u(156, t.tag))
    }

    function Ih(e, t) {
        switch (Ys(t), t.tag) {
            case 1:
                return e = t.flags, e & 65536 ? (t.flags = e & -65537 | 128, t) : null;
            case 3:
                return Qt(Ge), Ye(), e = t.flags, (e & 65536) !== 0 && (e & 128) === 0 ? (t.flags = e & -65537 | 128, t) : null;
            case 26:
            case 27:
            case 5:
                return Nt(t), null;
            case 13:
                if (Kt(t), e = t.memoizedState, e !== null && e.dehydrated !== null) {
                    if (t.alternate === null) throw Error(u(340));
                    $a()
                }
                return e = t.flags, e & 65536 ? (t.flags = e & -65537 | 128, t) : null;
            case 19:
                return $(Be), null;
            case 4:
                return Ye(), null;
            case 10:
                return Qt(t.type), null;
            case 22:
            case 23:
                return Kt(t), lu(), e !== null && $(Bl), e = t.flags, e & 65536 ? (t.flags = e & -65537 | 128, t) : null;
            case 24:
                return Qt(Ge), null;
            case 25:
                return null;
            default:
                return null
        }
    }

    function oo(e, t) {
        switch (Ys(t), t.tag) {
            case 3:
                Qt(Ge), Ye();
                break;
            case 26:
            case 27:
            case 5:
                Nt(t);
                break;
            case 4:
                Ye();
                break;
            case 13:
                Kt(t);
                break;
            case 19:
                $(Be);
                break;
            case 10:
                Qt(t.type);
                break;
            case 22:
            case 23:
                Kt(t), lu(), e !== null && $(Bl);
                break;
            case 24:
                Qt(Ge)
        }
    }

    function vn(e, t) {
        try {
            var l = t.updateQueue,
                a = l !== null ? l.lastEffect : null;
            if (a !== null) {
                var n = a.next;
                l = n;
                do {
                    if ((l.tag & e) === e) {
                        a = void 0;
                        var c = l.create,
                            d = l.inst;
                        a = c(), d.destroy = a
                    }
                    l = l.next
                } while (l !== n)
            }
        } catch (g) {
            Ce(t, t.return, g)
        }
    }

    function dl(e, t, l) {
        try {
            var a = t.updateQueue,
                n = a !== null ? a.lastEffect : null;
            if (n !== null) {
                var c = n.next;
                a = c;
                do {
                    if ((a.tag & e) === e) {
                        var d = a.inst,
                            g = d.destroy;
                        if (g !== void 0) {
                            d.destroy = void 0, n = t;
                            var b = l,
                                D = g;
                            try {
                                D()
                            } catch (B) {
                                Ce(n, b, B)
                            }
                        }
                    }
                    a = a.next
                } while (a !== c)
            }
        } catch (B) {
            Ce(t, t.return, B)
        }
    }

    function po(e) {
        var t = e.updateQueue;
        if (t !== null) {
            var l = e.stateNode;
            try {
                $c(t, l)
            } catch (a) {
                Ce(e, e.return, a)
            }
        }
    }

    function ho(e, t, l) {
        l.props = Yl(e.type, e.memoizedProps), l.state = e.memoizedState;
        try {
            l.componentWillUnmount()
        } catch (a) {
            Ce(e, t, a)
        }
    }

    function gn(e, t) {
        try {
            var l = e.ref;
            if (l !== null) {
                switch (e.tag) {
                    case 26:
                    case 27:
                    case 5:
                        var a = e.stateNode;
                        break;
                    case 30:
                        a = e.stateNode;
                        break;
                    default:
                        a = e.stateNode
                }
                typeof l == "function" ? e.refCleanup = l(a) : l.current = a
            }
        } catch (n) {
            Ce(e, t, n)
        }
    }

    function Rt(e, t) {
        var l = e.ref,
            a = e.refCleanup;
        if (l !== null)
            if (typeof a == "function") try {
                a()
            } catch (n) {
                Ce(e, t, n)
            } finally {
                e.refCleanup = null, e = e.alternate, e != null && (e.refCleanup = null)
            } else if (typeof l == "function") try {
                l(null)
            } catch (n) {
                Ce(e, t, n)
            } else l.current = null
    }

    function mo(e) {
        var t = e.type,
            l = e.memoizedProps,
            a = e.stateNode;
        try {
            e: switch (t) {
                case "button":
                case "input":
                case "select":
                case "textarea":
                    l.autoFocus && a.focus();
                    break e;
                case "img":
                    l.src ? a.src = l.src : l.srcSet && (a.srcset = l.srcSet)
            }
        }
        catch (n) {
            Ce(e, e.return, n)
        }
    }

    function Mu(e, t, l) {
        try {
            var a = e.stateNode;
            fm(a, e.type, l, t), a[lt] = t
        } catch (n) {
            Ce(e, e.return, n)
        }
    }

    function vo(e) {
        return e.tag === 5 || e.tag === 3 || e.tag === 26 || e.tag === 27 && Sl(e.type) || e.tag === 4
    }

    function Du(e) {
        e: for (; ;) {
            for (; e.sibling === null;) {
                if (e.return === null || vo(e.return)) return null;
                e = e.return
            }
            for (e.sibling.return = e.return, e = e.sibling; e.tag !== 5 && e.tag !== 6 && e.tag !== 18;) {
                if (e.tag === 27 && Sl(e.type) || e.flags & 2 || e.child === null || e.tag === 4) continue e;
                e.child.return = e, e = e.child
            }
            if (!(e.flags & 2)) return e.stateNode
        }
    }

    function zu(e, t, l) {
        var a = e.tag;
        if (a === 5 || a === 6) e = e.stateNode, t ? (l.nodeType === 9 ? l.body : l.nodeName === "HTML" ? l.ownerDocument.body : l).insertBefore(e, t) : (t = l.nodeType === 9 ? l.body : l.nodeName === "HTML" ? l.ownerDocument.body : l, t.appendChild(e), l = l._reactRootContainer, l != null || t.onclick !== null || (t.onclick = Bi));
        else if (a !== 4 && (a === 27 && Sl(e.type) && (l = e.stateNode, t = null), e = e.child, e !== null))
            for (zu(e, t, l), e = e.sibling; e !== null;) zu(e, t, l), e = e.sibling
    }

    function Ni(e, t, l) {
        var a = e.tag;
        if (a === 5 || a === 6) e = e.stateNode, t ? l.insertBefore(e, t) : l.appendChild(e);
        else if (a !== 4 && (a === 27 && Sl(e.type) && (l = e.stateNode), e = e.child, e !== null))
            for (Ni(e, t, l), e = e.sibling; e !== null;) Ni(e, t, l), e = e.sibling
    }

    function go(e) {
        var t = e.stateNode,
            l = e.memoizedProps;
        try {
            for (var a = e.type, n = t.attributes; n.length;) t.removeAttributeNode(n[0]);
            Pe(t, a, l), t[Je] = e, t[lt] = l
        } catch (c) {
            Ce(e, e.return, c)
        }
    }
    var Jt = !1,
        Le = !1,
        Ru = !1,
        yo = typeof WeakSet == "function" ? WeakSet : Set,
        Qe = null;

    function Xh(e, t) {
        if (e = e.containerInfo, ar = Ki, e = Ac(e), Ds(e)) {
            if ("selectionStart" in e) var l = {
                start: e.selectionStart,
                end: e.selectionEnd
            };
            else e: {
                l = (l = e.ownerDocument) && l.defaultView || window;
                var a = l.getSelection && l.getSelection();
                if (a && a.rangeCount !== 0) {
                    l = a.anchorNode;
                    var n = a.anchorOffset,
                        c = a.focusNode;
                    a = a.focusOffset;
                    try {
                        l.nodeType, c.nodeType
                    } catch {
                        l = null;
                        break e
                    }
                    var d = 0,
                        g = -1,
                        b = -1,
                        D = 0,
                        B = 0,
                        I = e,
                        U = null;
                    t: for (; ;) {
                        for (var L; I !== l || n !== 0 && I.nodeType !== 3 || (g = d + n), I !== c || a !== 0 && I.nodeType !== 3 || (b = d + a), I.nodeType === 3 && (d += I.nodeValue.length), (L = I.firstChild) !== null;) U = I, I = L;
                        for (; ;) {
                            if (I === e) break t;
                            if (U === l && ++D === n && (g = d), U === c && ++B === a && (b = d), (L = I.nextSibling) !== null) break;
                            I = U, U = I.parentNode
                        }
                        I = L
                    }
                    l = g === -1 || b === -1 ? null : {
                        start: g,
                        end: b
                    }
                } else l = null
            }
            l = l || {
                start: 0,
                end: 0
            }
        } else l = null;
        for (nr = {
            focusedElem: e,
            selectionRange: l
        }, Ki = !1, Qe = t; Qe !== null;)
            if (t = Qe, e = t.child, (t.subtreeFlags & 1024) !== 0 && e !== null) e.return = t, Qe = e;
            else
                for (; Qe !== null;) {
                    switch (t = Qe, c = t.alternate, e = t.flags, t.tag) {
                        case 0:
                            break;
                        case 11:
                        case 15:
                            break;
                        case 1:
                            if ((e & 1024) !== 0 && c !== null) {
                                e = void 0, l = t, n = c.memoizedProps, c = c.memoizedState, a = l.stateNode;
                                try {
                                    var ce = Yl(l.type, n, l.elementType === l.type);
                                    e = a.getSnapshotBeforeUpdate(ce, c), a.__reactInternalSnapshotBeforeUpdate = e
                                } catch (se) {
                                    Ce(l, l.return, se)
                                }
                            }
                            break;
                        case 3:
                            if ((e & 1024) !== 0) {
                                if (e = t.stateNode.containerInfo, l = e.nodeType, l === 9) ur(e);
                                else if (l === 1) switch (e.nodeName) {
                                    case "HEAD":
                                    case "HTML":
                                    case "BODY":
                                        ur(e);
                                        break;
                                    default:
                                        e.textContent = ""
                                }
                            }
                            break;
                        case 5:
                        case 26:
                        case 27:
                        case 6:
                        case 4:
                        case 17:
                            break;
                        default:
                            if ((e & 1024) !== 0) throw Error(u(163))
                    }
                    if (e = t.sibling, e !== null) {
                        e.return = t.return, Qe = e;
                        break
                    }
                    Qe = t.return
                }
    }

    function Eo(e, t, l) {
        var a = l.flags;
        switch (l.tag) {
            case 0:
            case 11:
            case 15:
                pl(e, l), a & 4 && vn(5, l);
                break;
            case 1:
                if (pl(e, l), a & 4)
                    if (e = l.stateNode, t === null) try {
                        e.componentDidMount()
                    } catch (d) {
                        Ce(l, l.return, d)
                    } else {
                        var n = Yl(l.type, t.memoizedProps);
                        t = t.memoizedState;
                        try {
                            e.componentDidUpdate(n, t, e.__reactInternalSnapshotBeforeUpdate)
                        } catch (d) {
                            Ce(l, l.return, d)
                        }
                    }
                a & 64 && po(l), a & 512 && gn(l, l.return);
                break;
            case 3:
                if (pl(e, l), a & 64 && (e = l.updateQueue, e !== null)) {
                    if (t = null, l.child !== null) switch (l.child.tag) {
                        case 27:
                        case 5:
                            t = l.child.stateNode;
                            break;
                        case 1:
                            t = l.child.stateNode
                    }
                    try {
                        $c(e, t)
                    } catch (d) {
                        Ce(l, l.return, d)
                    }
                }
                break;
            case 27:
                t === null && a & 4 && go(l);
            case 26:
            case 5:
                pl(e, l), t === null && a & 4 && mo(l), a & 512 && gn(l, l.return);
                break;
            case 12:
                pl(e, l);
                break;
            case 13:
                pl(e, l), a & 4 && _o(e, l), a & 64 && (e = l.memoizedState, e !== null && (e = e.dehydrated, e !== null && (l = Wh.bind(null, l), gm(e, l))));
                break;
            case 22:
                if (a = l.memoizedState !== null || Jt, !a) {
                    t = t !== null && t.memoizedState !== null || Le, n = Jt;
                    var c = Le;
                    Jt = a, (Le = t) && !c ? hl(e, l, (l.subtreeFlags & 8772) !== 0) : pl(e, l), Jt = n, Le = c
                }
                break;
            case 30:
                break;
            default:
                pl(e, l)
        }
    }

    function So(e) {
        var t = e.alternate;
        t !== null && (e.alternate = null, So(t)), e.child = null, e.deletions = null, e.sibling = null, e.tag === 5 && (t = e.stateNode, t !== null && ds(t)), e.stateNode = null, e.return = null, e.dependencies = null, e.memoizedProps = null, e.memoizedState = null, e.pendingProps = null, e.stateNode = null, e.updateQueue = null
    }
    var Me = null,
        it = !1;

    function kt(e, t, l) {
        for (l = l.child; l !== null;) bo(e, t, l), l = l.sibling
    }

    function bo(e, t, l) {
        if (ut && typeof ut.onCommitFiberUnmount == "function") try {
            ut.onCommitFiberUnmount(Va, l)
        } catch { }
        switch (l.tag) {
            case 26:
                Le || Rt(l, t), kt(e, t, l), l.memoizedState ? l.memoizedState.count-- : l.stateNode && (l = l.stateNode, l.parentNode.removeChild(l));
                break;
            case 27:
                Le || Rt(l, t);
                var a = Me,
                    n = it;
                Sl(l.type) && (Me = l.stateNode, it = !1), kt(e, t, l), wn(l.stateNode), Me = a, it = n;
                break;
            case 5:
                Le || Rt(l, t);
            case 6:
                if (a = Me, n = it, Me = null, kt(e, t, l), Me = a, it = n, Me !== null)
                    if (it) try {
                        (Me.nodeType === 9 ? Me.body : Me.nodeName === "HTML" ? Me.ownerDocument.body : Me).removeChild(l.stateNode)
                    } catch (c) {
                        Ce(l, t, c)
                    } else try {
                        Me.removeChild(l.stateNode)
                    } catch (c) {
                        Ce(l, t, c)
                    }
                break;
            case 18:
                Me !== null && (it ? (e = Me, cd(e.nodeType === 9 ? e.body : e.nodeName === "HTML" ? e.ownerDocument.body : e, l.stateNode), Un(e)) : cd(Me, l.stateNode));
                break;
            case 4:
                a = Me, n = it, Me = l.stateNode.containerInfo, it = !0, kt(e, t, l), Me = a, it = n;
                break;
            case 0:
            case 11:
            case 14:
            case 15:
                Le || dl(2, l, t), Le || dl(4, l, t), kt(e, t, l);
                break;
            case 1:
                Le || (Rt(l, t), a = l.stateNode, typeof a.componentWillUnmount == "function" && ho(l, t, a)), kt(e, t, l);
                break;
            case 21:
                kt(e, t, l);
                break;
            case 22:
                Le = (a = Le) || l.memoizedState !== null, kt(e, t, l), Le = a;
                break;
            default:
                kt(e, t, l)
        }
    }

    function _o(e, t) {
        if (t.memoizedState === null && (e = t.alternate, e !== null && (e = e.memoizedState, e !== null && (e = e.dehydrated, e !== null)))) try {
            Un(e)
        } catch (l) {
            Ce(t, t.return, l)
        }
    }

    function Qh(e) {
        switch (e.tag) {
            case 13:
            case 19:
                var t = e.stateNode;
                return t === null && (t = e.stateNode = new yo), t;
            case 22:
                return e = e.stateNode, t = e._retryCache, t === null && (t = e._retryCache = new yo), t;
            default:
                throw Error(u(435, e.tag))
        }
    }

    function Uu(e, t) {
        var l = Qh(e);
        t.forEach(function (a) {
            var n = em.bind(null, e, a);
            l.has(a) || (l.add(a), a.then(n, n))
        })
    }

    function ot(e, t) {
        var l = t.deletions;
        if (l !== null)
            for (var a = 0; a < l.length; a++) {
                var n = l[a],
                    c = e,
                    d = t,
                    g = d;
                e: for (; g !== null;) {
                    switch (g.tag) {
                        case 27:
                            if (Sl(g.type)) {
                                Me = g.stateNode, it = !1;
                                break e
                            }
                            break;
                        case 5:
                            Me = g.stateNode, it = !1;
                            break e;
                        case 3:
                        case 4:
                            Me = g.stateNode.containerInfo, it = !0;
                            break e
                    }
                    g = g.return
                }
                if (Me === null) throw Error(u(160));
                bo(c, d, n), Me = null, it = !1, c = n.alternate, c !== null && (c.return = null), n.return = null
            }
        if (t.subtreeFlags & 13878)
            for (t = t.child; t !== null;) To(t, e), t = t.sibling
    }
    var At = null;

    function To(e, t) {
        var l = e.alternate,
            a = e.flags;
        switch (e.tag) {
            case 0:
            case 11:
            case 14:
            case 15:
                ot(t, e), dt(e), a & 4 && (dl(3, e, e.return), vn(3, e), dl(5, e, e.return));
                break;
            case 1:
                ot(t, e), dt(e), a & 512 && (Le || l === null || Rt(l, l.return)), a & 64 && Jt && (e = e.updateQueue, e !== null && (a = e.callbacks, a !== null && (l = e.shared.hiddenCallbacks, e.shared.hiddenCallbacks = l === null ? a : l.concat(a))));
                break;
            case 26:
                var n = At;
                if (ot(t, e), dt(e), a & 512 && (Le || l === null || Rt(l, l.return)), a & 4) {
                    var c = l !== null ? l.memoizedState : null;
                    if (a = e.memoizedState, l === null)
                        if (a === null)
                            if (e.stateNode === null) {
                                e: {
                                    a = e.type,
                                        l = e.memoizedProps,
                                        n = n.ownerDocument || n; t: switch (a) {
                                            case "title":
                                                c = n.getElementsByTagName("title")[0], (!c || c[Ba] || c[Je] || c.namespaceURI === "http://www.w3.org/2000/svg" || c.hasAttribute("itemprop")) && (c = n.createElement(a), n.head.insertBefore(c, n.querySelector("head > title"))), Pe(c, a, l), c[Je] = e, Ie(c), a = c;
                                                break e;
                                            case "link":
                                                var d = gd("link", "href", n).get(a + (l.href || ""));
                                                if (d) {
                                                    for (var g = 0; g < d.length; g++)
                                                        if (c = d[g], c.getAttribute("href") === (l.href == null || l.href === "" ? null : l.href) && c.getAttribute("rel") === (l.rel == null ? null : l.rel) && c.getAttribute("title") === (l.title == null ? null : l.title) && c.getAttribute("crossorigin") === (l.crossOrigin == null ? null : l.crossOrigin)) {
                                                            d.splice(g, 1);
                                                            break t
                                                        }
                                                }
                                                c = n.createElement(a), Pe(c, a, l), n.head.appendChild(c);
                                                break;
                                            case "meta":
                                                if (d = gd("meta", "content", n).get(a + (l.content || ""))) {
                                                    for (g = 0; g < d.length; g++)
                                                        if (c = d[g], c.getAttribute("content") === (l.content == null ? null : "" + l.content) && c.getAttribute("name") === (l.name == null ? null : l.name) && c.getAttribute("property") === (l.property == null ? null : l.property) && c.getAttribute("http-equiv") === (l.httpEquiv == null ? null : l.httpEquiv) && c.getAttribute("charset") === (l.charSet == null ? null : l.charSet)) {
                                                            d.splice(g, 1);
                                                            break t
                                                        }
                                                }
                                                c = n.createElement(a), Pe(c, a, l), n.head.appendChild(c);
                                                break;
                                            default:
                                                throw Error(u(468, a))
                                        }
                                    c[Je] = e,
                                        Ie(c),
                                        a = c
                                }
                                e.stateNode = a
                            }
                            else yd(n, e.type, e.stateNode);
                        else e.stateNode = vd(n, a, e.memoizedProps);
                    else c !== a ? (c === null ? l.stateNode !== null && (l = l.stateNode, l.parentNode.removeChild(l)) : c.count--, a === null ? yd(n, e.type, e.stateNode) : vd(n, a, e.memoizedProps)) : a === null && e.stateNode !== null && Mu(e, e.memoizedProps, l.memoizedProps)
                }
                break;
            case 27:
                ot(t, e), dt(e), a & 512 && (Le || l === null || Rt(l, l.return)), l !== null && a & 4 && Mu(e, e.memoizedProps, l.memoizedProps);
                break;
            case 5:
                if (ot(t, e), dt(e), a & 512 && (Le || l === null || Rt(l, l.return)), e.flags & 32) {
                    n = e.stateNode;
                    try {
                        la(n, "")
                    } catch (L) {
                        Ce(e, e.return, L)
                    }
                }
                a & 4 && e.stateNode != null && (n = e.memoizedProps, Mu(e, n, l !== null ? l.memoizedProps : n)), a & 1024 && (Ru = !0);
                break;
            case 6:
                if (ot(t, e), dt(e), a & 4) {
                    if (e.stateNode === null) throw Error(u(162));
                    a = e.memoizedProps, l = e.stateNode;
                    try {
                        l.nodeValue = a
                    } catch (L) {
                        Ce(e, e.return, L)
                    }
                }
                break;
            case 3:
                if (Xi = null, n = At, At = Yi(t.containerInfo), ot(t, e), At = n, dt(e), a & 4 && l !== null && l.memoizedState.isDehydrated) try {
                    Un(t.containerInfo)
                } catch (L) {
                    Ce(e, e.return, L)
                }
                Ru && (Ru = !1, Oo(e));
                break;
            case 4:
                a = At, At = Yi(e.stateNode.containerInfo), ot(t, e), dt(e), At = a;
                break;
            case 12:
                ot(t, e), dt(e);
                break;
            case 13:
                ot(t, e), dt(e), e.child.flags & 8192 && e.memoizedState !== null != (l !== null && l.memoizedState !== null) && (Bu = Mt()), a & 4 && (a = e.updateQueue, a !== null && (e.updateQueue = null, Uu(e, a)));
                break;
            case 22:
                n = e.memoizedState !== null;
                var b = l !== null && l.memoizedState !== null,
                    D = Jt,
                    B = Le;
                if (Jt = D || n, Le = B || b, ot(t, e), Le = B, Jt = D, dt(e), a & 8192) e: for (t = e.stateNode, t._visibility = n ? t._visibility & -2 : t._visibility | 1, n && (l === null || b || Jt || Le || Il(e)), l = null, t = e; ;) {
                    if (t.tag === 5 || t.tag === 26) {
                        if (l === null) {
                            b = l = t;
                            try {
                                if (c = b.stateNode, n) d = c.style, typeof d.setProperty == "function" ? d.setProperty("display", "none", "important") : d.display = "none";
                                else {
                                    g = b.stateNode;
                                    var I = b.memoizedProps.style,
                                        U = I != null && I.hasOwnProperty("display") ? I.display : null;
                                    g.style.display = U == null || typeof U == "boolean" ? "" : ("" + U).trim()
                                }
                            } catch (L) {
                                Ce(b, b.return, L)
                            }
                        }
                    } else if (t.tag === 6) {
                        if (l === null) {
                            b = t;
                            try {
                                b.stateNode.nodeValue = n ? "" : b.memoizedProps
                            } catch (L) {
                                Ce(b, b.return, L)
                            }
                        }
                    } else if ((t.tag !== 22 && t.tag !== 23 || t.memoizedState === null || t === e) && t.child !== null) {
                        t.child.return = t, t = t.child;
                        continue
                    }
                    if (t === e) break e;
                    for (; t.sibling === null;) {
                        if (t.return === null || t.return === e) break e;
                        l === t && (l = null), t = t.return
                    }
                    l === t && (l = null), t.sibling.return = t.return, t = t.sibling
                }
                a & 4 && (a = e.updateQueue, a !== null && (l = a.retryQueue, l !== null && (a.retryQueue = null, Uu(e, l))));
                break;
            case 19:
                ot(t, e), dt(e), a & 4 && (a = e.updateQueue, a !== null && (e.updateQueue = null, Uu(e, a)));
                break;
            case 30:
                break;
            case 21:
                break;
            default:
                ot(t, e), dt(e)
        }
    }

    function dt(e) {
        var t = e.flags;
        if (t & 2) {
            try {
                for (var l, a = e.return; a !== null;) {
                    if (vo(a)) {
                        l = a;
                        break
                    }
                    a = a.return
                }
                if (l == null) throw Error(u(160));
                switch (l.tag) {
                    case 27:
                        var n = l.stateNode,
                            c = Du(e);
                        Ni(e, c, n);
                        break;
                    case 5:
                        var d = l.stateNode;
                        l.flags & 32 && (la(d, ""), l.flags &= -33);
                        var g = Du(e);
                        Ni(e, g, d);
                        break;
                    case 3:
                    case 4:
                        var b = l.stateNode.containerInfo,
                            D = Du(e);
                        zu(e, D, b);
                        break;
                    default:
                        throw Error(u(161))
                }
            } catch (B) {
                Ce(e, e.return, B)
            }
            e.flags &= -3
        }
        t & 4096 && (e.flags &= -4097)
    }

    function Oo(e) {
        if (e.subtreeFlags & 1024)
            for (e = e.child; e !== null;) {
                var t = e;
                Oo(t), t.tag === 5 && t.flags & 1024 && t.stateNode.reset(), e = e.sibling
            }
    }

    function pl(e, t) {
        if (t.subtreeFlags & 8772)
            for (t = t.child; t !== null;) Eo(e, t.alternate, t), t = t.sibling
    }

    function Il(e) {
        for (e = e.child; e !== null;) {
            var t = e;
            switch (t.tag) {
                case 0:
                case 11:
                case 14:
                case 15:
                    dl(4, t, t.return), Il(t);
                    break;
                case 1:
                    Rt(t, t.return);
                    var l = t.stateNode;
                    typeof l.componentWillUnmount == "function" && ho(t, t.return, l), Il(t);
                    break;
                case 27:
                    wn(t.stateNode);
                case 26:
                case 5:
                    Rt(t, t.return), Il(t);
                    break;
                case 22:
                    t.memoizedState === null && Il(t);
                    break;
                case 30:
                    Il(t);
                    break;
                default:
                    Il(t)
            }
            e = e.sibling
        }
    }

    function hl(e, t, l) {
        for (l = l && (t.subtreeFlags & 8772) !== 0, t = t.child; t !== null;) {
            var a = t.alternate,
                n = e,
                c = t,
                d = c.flags;
            switch (c.tag) {
                case 0:
                case 11:
                case 15:
                    hl(n, c, l), vn(4, c);
                    break;
                case 1:
                    if (hl(n, c, l), a = c, n = a.stateNode, typeof n.componentDidMount == "function") try {
                        n.componentDidMount()
                    } catch (D) {
                        Ce(a, a.return, D)
                    }
                    if (a = c, n = a.updateQueue, n !== null) {
                        var g = a.stateNode;
                        try {
                            var b = n.shared.hiddenCallbacks;
                            if (b !== null)
                                for (n.shared.hiddenCallbacks = null, n = 0; n < b.length; n++) kc(b[n], g)
                        } catch (D) {
                            Ce(a, a.return, D)
                        }
                    }
                    l && d & 64 && po(c), gn(c, c.return);
                    break;
                case 27:
                    go(c);
                case 26:
                case 5:
                    hl(n, c, l), l && a === null && d & 4 && mo(c), gn(c, c.return);
                    break;
                case 12:
                    hl(n, c, l);
                    break;
                case 13:
                    hl(n, c, l), l && d & 4 && _o(n, c);
                    break;
                case 22:
                    c.memoizedState === null && hl(n, c, l), gn(c, c.return);
                    break;
                case 30:
                    break;
                default:
                    hl(n, c, l)
            }
            t = t.sibling
        }
    }

    function Lu(e, t) {
        var l = null;
        e !== null && e.memoizedState !== null && e.memoizedState.cachePool !== null && (l = e.memoizedState.cachePool.pool), e = null, t.memoizedState !== null && t.memoizedState.cachePool !== null && (e = t.memoizedState.cachePool.pool), e !== l && (e != null && e.refCount++, l != null && tn(l))
    }

    function Hu(e, t) {
        e = null, t.alternate !== null && (e = t.alternate.memoizedState.cache), t = t.memoizedState.cache, t !== e && (t.refCount++, e != null && tn(e))
    }

    function Ut(e, t, l, a) {
        if (t.subtreeFlags & 10256)
            for (t = t.child; t !== null;) xo(e, t, l, a), t = t.sibling
    }

    function xo(e, t, l, a) {
        var n = t.flags;
        switch (t.tag) {
            case 0:
            case 11:
            case 15:
                Ut(e, t, l, a), n & 2048 && vn(9, t);
                break;
            case 1:
                Ut(e, t, l, a);
                break;
            case 3:
                Ut(e, t, l, a), n & 2048 && (e = null, t.alternate !== null && (e = t.alternate.memoizedState.cache), t = t.memoizedState.cache, t !== e && (t.refCount++, e != null && tn(e)));
                break;
            case 12:
                if (n & 2048) {
                    Ut(e, t, l, a), e = t.stateNode;
                    try {
                        var c = t.memoizedProps,
                            d = c.id,
                            g = c.onPostCommit;
                        typeof g == "function" && g(d, t.alternate === null ? "mount" : "update", e.passiveEffectDuration, -0)
                    } catch (b) {
                        Ce(t, t.return, b)
                    }
                } else Ut(e, t, l, a);
                break;
            case 13:
                Ut(e, t, l, a);
                break;
            case 23:
                break;
            case 22:
                c = t.stateNode, d = t.alternate, t.memoizedState !== null ? c._visibility & 2 ? Ut(e, t, l, a) : yn(e, t) : c._visibility & 2 ? Ut(e, t, l, a) : (c._visibility |= 2, ba(e, t, l, a, (t.subtreeFlags & 10256) !== 0)), n & 2048 && Lu(d, t);
                break;
            case 24:
                Ut(e, t, l, a), n & 2048 && Hu(t.alternate, t);
                break;
            default:
                Ut(e, t, l, a)
        }
    }

    function ba(e, t, l, a, n) {
        for (n = n && (t.subtreeFlags & 10256) !== 0, t = t.child; t !== null;) {
            var c = e,
                d = t,
                g = l,
                b = a,
                D = d.flags;
            switch (d.tag) {
                case 0:
                case 11:
                case 15:
                    ba(c, d, g, b, n), vn(8, d);
                    break;
                case 23:
                    break;
                case 22:
                    var B = d.stateNode;
                    d.memoizedState !== null ? B._visibility & 2 ? ba(c, d, g, b, n) : yn(c, d) : (B._visibility |= 2, ba(c, d, g, b, n)), n && D & 2048 && Lu(d.alternate, d);
                    break;
                case 24:
                    ba(c, d, g, b, n), n && D & 2048 && Hu(d.alternate, d);
                    break;
                default:
                    ba(c, d, g, b, n)
            }
            t = t.sibling
        }
    }

    function yn(e, t) {
        if (t.subtreeFlags & 10256)
            for (t = t.child; t !== null;) {
                var l = e,
                    a = t,
                    n = a.flags;
                switch (a.tag) {
                    case 22:
                        yn(l, a), n & 2048 && Lu(a.alternate, a);
                        break;
                    case 24:
                        yn(l, a), n & 2048 && Hu(a.alternate, a);
                        break;
                    default:
                        yn(l, a)
                }
                t = t.sibling
            }
    }
    var En = 8192;

    function _a(e) {
        if (e.subtreeFlags & En)
            for (e = e.child; e !== null;) wo(e), e = e.sibling
    }

    function wo(e) {
        switch (e.tag) {
            case 26:
                _a(e), e.flags & En && e.memoizedState !== null && Mm(At, e.memoizedState, e.memoizedProps);
                break;
            case 5:
                _a(e);
                break;
            case 3:
            case 4:
                var t = At;
                At = Yi(e.stateNode.containerInfo), _a(e), At = t;
                break;
            case 22:
                e.memoizedState === null && (t = e.alternate, t !== null && t.memoizedState !== null ? (t = En, En = 16777216, _a(e), En = t) : _a(e));
                break;
            default:
                _a(e)
        }
    }

    function Ao(e) {
        var t = e.alternate;
        if (t !== null && (e = t.child, e !== null)) {
            t.child = null;
            do t = e.sibling, e.sibling = null, e = t; while (e !== null)
        }
    }

    function Sn(e) {
        var t = e.deletions;
        if ((e.flags & 16) !== 0) {
            if (t !== null)
                for (var l = 0; l < t.length; l++) {
                    var a = t[l];
                    Qe = a, No(a, e)
                }
            Ao(e)
        }
        if (e.subtreeFlags & 10256)
            for (e = e.child; e !== null;) Co(e), e = e.sibling
    }

    function Co(e) {
        switch (e.tag) {
            case 0:
            case 11:
            case 15:
                Sn(e), e.flags & 2048 && dl(9, e, e.return);
                break;
            case 3:
                Sn(e);
                break;
            case 12:
                Sn(e);
                break;
            case 22:
                var t = e.stateNode;
                e.memoizedState !== null && t._visibility & 2 && (e.return === null || e.return.tag !== 13) ? (t._visibility &= -3, Mi(e)) : Sn(e);
                break;
            default:
                Sn(e)
        }
    }

    function Mi(e) {
        var t = e.deletions;
        if ((e.flags & 16) !== 0) {
            if (t !== null)
                for (var l = 0; l < t.length; l++) {
                    var a = t[l];
                    Qe = a, No(a, e)
                }
            Ao(e)
        }
        for (e = e.child; e !== null;) {
            switch (t = e, t.tag) {
                case 0:
                case 11:
                case 15:
                    dl(8, t, t.return), Mi(t);
                    break;
                case 22:
                    l = t.stateNode, l._visibility & 2 && (l._visibility &= -3, Mi(t));
                    break;
                default:
                    Mi(t)
            }
            e = e.sibling
        }
    }

    function No(e, t) {
        for (; Qe !== null;) {
            var l = Qe;
            switch (l.tag) {
                case 0:
                case 11:
                case 15:
                    dl(8, l, t);
                    break;
                case 23:
                case 22:
                    if (l.memoizedState !== null && l.memoizedState.cachePool !== null) {
                        var a = l.memoizedState.cachePool.pool;
                        a != null && a.refCount++
                    }
                    break;
                case 24:
                    tn(l.memoizedState.cache)
            }
            if (a = l.child, a !== null) a.return = l, Qe = a;
            else e: for (l = e; Qe !== null;) {
                a = Qe;
                var n = a.sibling,
                    c = a.return;
                if (So(a), a === l) {
                    Qe = null;
                    break e
                }
                if (n !== null) {
                    n.return = c, Qe = n;
                    break e
                }
                Qe = c
            }
        }
    }
    var Zh = {
        getCacheForType: function (e) {
            var t = ke(Ge),
                l = t.data.get(e);
            return l === void 0 && (l = e(), t.data.set(e, l)), l
        }
    },
        Kh = typeof WeakMap == "function" ? WeakMap : Map,
        Te = 0,
        Ne = null,
        ve = null,
        Ee = 0,
        Oe = 0,
        pt = null,
        ml = !1,
        Ta = !1,
        Vu = !1,
        $t = 0,
        Re = 0,
        vl = 0,
        Xl = 0,
        ju = 0,
        Ot = 0,
        Oa = 0,
        bn = null,
        st = null,
        Gu = !1,
        Bu = 0,
        Di = 1 / 0,
        zi = null,
        gl = null,
        Fe = 0,
        yl = null,
        xa = null,
        wa = 0,
        qu = 0,
        Yu = null,
        Mo = null,
        _n = 0,
        Iu = null;

    function ht() {
        if ((Te & 2) !== 0 && Ee !== 0) return Ee & -Ee;
        if (C.T !== null) {
            var e = pa;
            return e !== 0 ? e : Ju()
        }
        return Xr()
    }

    function Do() {
        Ot === 0 && (Ot = (Ee & 536870912) === 0 || be ? Br() : 536870912);
        var e = Tt.current;
        return e !== null && (e.flags |= 32), Ot
    }

    function mt(e, t, l) {
        (e === Ne && (Oe === 2 || Oe === 9) || e.cancelPendingCommit !== null) && (Aa(e, 0), El(e, Ee, Ot, !1)), Ga(e, l), ((Te & 2) === 0 || e !== Ne) && (e === Ne && ((Te & 2) === 0 && (Xl |= l), Re === 4 && El(e, Ee, Ot, !1)), Lt(e))
    }

    function zo(e, t, l) {
        if ((Te & 6) !== 0) throw Error(u(327));
        var a = !l && (t & 124) === 0 && (t & e.expiredLanes) === 0 || ja(e, t),
            n = a ? Jh(e, t) : Zu(e, t, !0),
            c = a;
        do {
            if (n === 0) {
                Ta && !a && El(e, t, 0, !1);
                break
            } else {
                if (l = e.current.alternate, c && !Fh(l)) {
                    n = Zu(e, t, !1), c = !1;
                    continue
                }
                if (n === 2) {
                    if (c = t, e.errorRecoveryDisabledLanes & c) var d = 0;
                    else d = e.pendingLanes & -536870913, d = d !== 0 ? d : d & 536870912 ? 536870912 : 0;
                    if (d !== 0) {
                        t = d;
                        e: {
                            var g = e; n = bn;
                            var b = g.current.memoizedState.isDehydrated;
                            if (b && (Aa(g, d).flags |= 256), d = Zu(g, d, !1), d !== 2) {
                                if (Vu && !b) {
                                    g.errorRecoveryDisabledLanes |= c, Xl |= c, n = 4;
                                    break e
                                }
                                c = st, st = n, c !== null && (st === null ? st = c : st.push.apply(st, c))
                            }
                            n = d
                        }
                        if (c = !1, n !== 2) continue
                    }
                }
                if (n === 1) {
                    Aa(e, 0), El(e, t, 0, !0);
                    break
                }
                e: {
                    switch (a = e, c = n, c) {
                        case 0:
                        case 1:
                            throw Error(u(345));
                        case 4:
                            if ((t & 4194048) !== t) break;
                        case 6:
                            El(a, t, Ot, !ml);
                            break e;
                        case 2:
                            st = null;
                            break;
                        case 3:
                        case 5:
                            break;
                        default:
                            throw Error(u(329))
                    }
                    if ((t & 62914560) === t && (n = Bu + 300 - Mt(), 10 < n)) {
                        if (El(a, t, Ot, !ml), In(a, 0, !0) !== 0) break e;
                        a.timeoutHandle = ud(Ro.bind(null, a, l, st, zi, Gu, t, Ot, Xl, Oa, ml, c, 2, -0, 0), n);
                        break e
                    }
                    Ro(a, l, st, zi, Gu, t, Ot, Xl, Oa, ml, c, 0, -0, 0)
                }
            }
            break
        } while (!0);
        Lt(e)
    }

    function Ro(e, t, l, a, n, c, d, g, b, D, B, I, U, L) {
        if (e.timeoutHandle = -1, I = t.subtreeFlags, (I & 8192 || (I & 16785408) === 16785408) && (Nn = {
            stylesheets: null,
            count: 0,
            unsuspend: Nm
        }, wo(t), I = Dm(), I !== null)) {
            e.cancelPendingCommit = I(Bo.bind(null, e, t, c, l, a, n, d, g, b, B, 1, U, L)), El(e, c, d, !D);
            return
        }
        Bo(e, t, c, l, a, n, d, g, b)
    }

    function Fh(e) {
        for (var t = e; ;) {
            var l = t.tag;
            if ((l === 0 || l === 11 || l === 15) && t.flags & 16384 && (l = t.updateQueue, l !== null && (l = l.stores, l !== null)))
                for (var a = 0; a < l.length; a++) {
                    var n = l[a],
                        c = n.getSnapshot;
                    n = n.value;
                    try {
                        if (!ct(c(), n)) return !1
                    } catch {
                        return !1
                    }
                }
            if (l = t.child, t.subtreeFlags & 16384 && l !== null) l.return = t, t = l;
            else {
                if (t === e) break;
                for (; t.sibling === null;) {
                    if (t.return === null || t.return === e) return !0;
                    t = t.return
                }
                t.sibling.return = t.return, t = t.sibling
            }
        }
        return !0
    }

    function El(e, t, l, a) {
        t &= ~ju, t &= ~Xl, e.suspendedLanes |= t, e.pingedLanes &= ~t, a && (e.warmLanes |= t), a = e.expirationTimes;
        for (var n = t; 0 < n;) {
            var c = 31 - rt(n),
                d = 1 << c;
            a[c] = -1, n &= ~d
        }
        l !== 0 && Yr(e, l, t)
    }

    function Ri() {
        return (Te & 6) === 0 ? (Tn(0), !1) : !0
    }

    function Xu() {
        if (ve !== null) {
            if (Oe === 0) var e = ve.return;
            else e = ve, Xt = jl = null, uu(e), Ea = null, pn = 0, e = ve;
            for (; e !== null;) oo(e.alternate, e), e = e.return;
            ve = null
        }
    }

    function Aa(e, t) {
        var l = e.timeoutHandle;
        l !== -1 && (e.timeoutHandle = -1, dm(l)), l = e.cancelPendingCommit, l !== null && (e.cancelPendingCommit = null, l()), Xu(), Ne = e, ve = l = qt(e.current, null), Ee = t, Oe = 0, pt = null, ml = !1, Ta = ja(e, t), Vu = !1, Oa = Ot = ju = Xl = vl = Re = 0, st = bn = null, Gu = !1, (t & 8) !== 0 && (t |= t & 32);
        var a = e.entangledLanes;
        if (a !== 0)
            for (e = e.entanglements, a &= t; 0 < a;) {
                var n = 31 - rt(a),
                    c = 1 << n;
                t |= e[n], a &= ~c
            }
        return $t = t, ti(), l
    }

    function Uo(e, t) {
        he = null, C.H = Si, t === an || t === fi ? (t = Pc(), Oe = 3) : t === Zc ? (t = Pc(), Oe = 4) : Oe = t === kf ? 8 : t !== null && typeof t == "object" && typeof t.then == "function" ? 6 : 1, pt = t, ve === null && (Re = 1, xi(e, Et(t, e.current)))
    }

    function Lo() {
        var e = C.H;
        return C.H = Si, e === null ? Si : e
    }

    function Ho() {
        var e = C.A;
        return C.A = Zh, e
    }

    function Qu() {
        Re = 4, ml || (Ee & 4194048) !== Ee && Tt.current !== null || (Ta = !0), (vl & 134217727) === 0 && (Xl & 134217727) === 0 || Ne === null || El(Ne, Ee, Ot, !1)
    }

    function Zu(e, t, l) {
        var a = Te;
        Te |= 2;
        var n = Lo(),
            c = Ho();
        (Ne !== e || Ee !== t) && (zi = null, Aa(e, t)), t = !1;
        var d = Re;
        e: do try {
            if (Oe !== 0 && ve !== null) {
                var g = ve,
                    b = pt;
                switch (Oe) {
                    case 8:
                        Xu(), d = 6;
                        break e;
                    case 3:
                    case 2:
                    case 9:
                    case 6:
                        Tt.current === null && (t = !0);
                        var D = Oe;
                        if (Oe = 0, pt = null, Ca(e, g, b, D), l && Ta) {
                            d = 0;
                            break e
                        }
                        break;
                    default:
                        D = Oe, Oe = 0, pt = null, Ca(e, g, b, D)
                }
            }
            Ph(), d = Re;
            break
        } catch (B) {
            Uo(e, B)
        }
        while (!0);
        return t && e.shellSuspendCounter++, Xt = jl = null, Te = a, C.H = n, C.A = c, ve === null && (Ne = null, Ee = 0, ti()), d
    }

    function Ph() {
        for (; ve !== null;) Vo(ve)
    }

    function Jh(e, t) {
        var l = Te;
        Te |= 2;
        var a = Lo(),
            n = Ho();
        Ne !== e || Ee !== t ? (zi = null, Di = Mt() + 500, Aa(e, t)) : Ta = ja(e, t);
        e: do try {
            if (Oe !== 0 && ve !== null) {
                t = ve;
                var c = pt;
                t: switch (Oe) {
                    case 1:
                        Oe = 0, pt = null, Ca(e, t, c, 1);
                        break;
                    case 2:
                    case 9:
                        if (Kc(c)) {
                            Oe = 0, pt = null, jo(t);
                            break
                        }
                        t = function () {
                            Oe !== 2 && Oe !== 9 || Ne !== e || (Oe = 7), Lt(e)
                        }, c.then(t, t);
                        break e;
                    case 3:
                        Oe = 7;
                        break e;
                    case 4:
                        Oe = 5;
                        break e;
                    case 7:
                        Kc(c) ? (Oe = 0, pt = null, jo(t)) : (Oe = 0, pt = null, Ca(e, t, c, 7));
                        break;
                    case 5:
                        var d = null;
                        switch (ve.tag) {
                            case 26:
                                d = ve.memoizedState;
                            case 5:
                            case 27:
                                var g = ve;
                                if (!d || Ed(d)) {
                                    Oe = 0, pt = null;
                                    var b = g.sibling;
                                    if (b !== null) ve = b;
                                    else {
                                        var D = g.return;
                                        D !== null ? (ve = D, Ui(D)) : ve = null
                                    }
                                    break t
                                }
                        }
                        Oe = 0, pt = null, Ca(e, t, c, 5);
                        break;
                    case 6:
                        Oe = 0, pt = null, Ca(e, t, c, 6);
                        break;
                    case 8:
                        Xu(), Re = 6;
                        break e;
                    default:
                        throw Error(u(462))
                }
            }
            kh();
            break
        } catch (B) {
            Uo(e, B)
        }
        while (!0);
        return Xt = jl = null, C.H = a, C.A = n, Te = l, ve !== null ? 0 : (Ne = null, Ee = 0, ti(), Re)
    }

    function kh() {
        for (; ve !== null && !Fl();) Vo(ve)
    }

    function Vo(e) {
        var t = co(e.alternate, e, $t);
        e.memoizedProps = e.pendingProps, t === null ? Ui(e) : ve = t
    }

    function jo(e) {
        var t = e,
            l = t.alternate;
        switch (t.tag) {
            case 15:
            case 0:
                t = ao(l, t, t.pendingProps, t.type, void 0, Ee);
                break;
            case 11:
                t = ao(l, t, t.pendingProps, t.type.render, t.ref, Ee);
                break;
            case 5:
                uu(t);
            default:
                oo(l, t), t = ve = Vc(t, $t), t = co(l, t, $t)
        }
        e.memoizedProps = e.pendingProps, t === null ? Ui(e) : ve = t
    }

    function Ca(e, t, l, a) {
        Xt = jl = null, uu(t), Ea = null, pn = 0;
        var n = t.return;
        try {
            if (Bh(e, n, t, l, Ee)) {
                Re = 1, xi(e, Et(l, e.current)), ve = null;
                return
            }
        } catch (c) {
            if (n !== null) throw ve = n, c;
            Re = 1, xi(e, Et(l, e.current)), ve = null;
            return
        }
        t.flags & 32768 ? (be || a === 1 ? e = !0 : Ta || (Ee & 536870912) !== 0 ? e = !1 : (ml = e = !0, (a === 2 || a === 9 || a === 3 || a === 6) && (a = Tt.current, a !== null && a.tag === 13 && (a.flags |= 16384))), Go(t, e)) : Ui(t)
    }

    function Ui(e) {
        var t = e;
        do {
            if ((t.flags & 32768) !== 0) {
                Go(t, ml);
                return
            }
            e = t.return;
            var l = Yh(t.alternate, t, $t);
            if (l !== null) {
                ve = l;
                return
            }
            if (t = t.sibling, t !== null) {
                ve = t;
                return
            }
            ve = t = e
        } while (t !== null);
        Re === 0 && (Re = 5)
    }

    function Go(e, t) {
        do {
            var l = Ih(e.alternate, e);
            if (l !== null) {
                l.flags &= 32767, ve = l;
                return
            }
            if (l = e.return, l !== null && (l.flags |= 32768, l.subtreeFlags = 0, l.deletions = null), !t && (e = e.sibling, e !== null)) {
                ve = e;
                return
            }
            ve = e = l
        } while (e !== null);
        Re = 6, ve = null
    }

    function Bo(e, t, l, a, n, c, d, g, b) {
        e.cancelPendingCommit = null;
        do Li(); while (Fe !== 0);
        if ((Te & 6) !== 0) throw Error(u(327));
        if (t !== null) {
            if (t === e.current) throw Error(u(177));
            if (c = t.lanes | t.childLanes, c |= Hs, Np(e, l, c, d, g, b), e === Ne && (ve = Ne = null, Ee = 0), xa = t, yl = e, wa = l, qu = c, Yu = n, Mo = a, (t.subtreeFlags & 10256) !== 0 || (t.flags & 10256) !== 0 ? (e.callbackNode = null, e.callbackPriority = 0, tm(Bn, function () {
                return Qo(), null
            })) : (e.callbackNode = null, e.callbackPriority = 0), a = (t.flags & 13878) !== 0, (t.subtreeFlags & 13878) !== 0 || a) {
                a = C.T, C.T = null, n = Z.p, Z.p = 2, d = Te, Te |= 4;
                try {
                    Xh(e, t, l)
                } finally {
                    Te = d, Z.p = n, C.T = a
                }
            }
            Fe = 1, qo(), Yo(), Io()
        }
    }

    function qo() {
        if (Fe === 1) {
            Fe = 0;
            var e = yl,
                t = xa,
                l = (t.flags & 13878) !== 0;
            if ((t.subtreeFlags & 13878) !== 0 || l) {
                l = C.T, C.T = null;
                var a = Z.p;
                Z.p = 2;
                var n = Te;
                Te |= 4;
                try {
                    To(t, e);
                    var c = nr,
                        d = Ac(e.containerInfo),
                        g = c.focusedElem,
                        b = c.selectionRange;
                    if (d !== g && g && g.ownerDocument && wc(g.ownerDocument.documentElement, g)) {
                        if (b !== null && Ds(g)) {
                            var D = b.start,
                                B = b.end;
                            if (B === void 0 && (B = D), "selectionStart" in g) g.selectionStart = D, g.selectionEnd = Math.min(B, g.value.length);
                            else {
                                var I = g.ownerDocument || document,
                                    U = I && I.defaultView || window;
                                if (U.getSelection) {
                                    var L = U.getSelection(),
                                        ce = g.textContent.length,
                                        se = Math.min(b.start, ce),
                                        Ae = b.end === void 0 ? se : Math.min(b.end, ce);
                                    !L.extend && se > Ae && (d = Ae, Ae = se, se = d);
                                    var w = xc(g, se),
                                        T = xc(g, Ae);
                                    if (w && T && (L.rangeCount !== 1 || L.anchorNode !== w.node || L.anchorOffset !== w.offset || L.focusNode !== T.node || L.focusOffset !== T.offset)) {
                                        var N = I.createRange();
                                        N.setStart(w.node, w.offset), L.removeAllRanges(), se > Ae ? (L.addRange(N), L.extend(T.node, T.offset)) : (N.setEnd(T.node, T.offset), L.addRange(N))
                                    }
                                }
                            }
                        }
                        for (I = [], L = g; L = L.parentNode;) L.nodeType === 1 && I.push({
                            element: L,
                            left: L.scrollLeft,
                            top: L.scrollTop
                        });
                        for (typeof g.focus == "function" && g.focus(), g = 0; g < I.length; g++) {
                            var q = I[g];
                            q.element.scrollLeft = q.left, q.element.scrollTop = q.top
                        }
                    }
                    Ki = !!ar, nr = ar = null
                } finally {
                    Te = n, Z.p = a, C.T = l
                }
            }
            e.current = t, Fe = 2
        }
    }

    function Yo() {
        if (Fe === 2) {
            Fe = 0;
            var e = yl,
                t = xa,
                l = (t.flags & 8772) !== 0;
            if ((t.subtreeFlags & 8772) !== 0 || l) {
                l = C.T, C.T = null;
                var a = Z.p;
                Z.p = 2;
                var n = Te;
                Te |= 4;
                try {
                    Eo(e, t.alternate, t)
                } finally {
                    Te = n, Z.p = a, C.T = l
                }
            }
            Fe = 3
        }
    }

    function Io() {
        if (Fe === 4 || Fe === 3) {
            Fe = 0, Sp();
            var e = yl,
                t = xa,
                l = wa,
                a = Mo;
            (t.subtreeFlags & 10256) !== 0 || (t.flags & 10256) !== 0 ? Fe = 5 : (Fe = 0, xa = yl = null, Xo(e, e.pendingLanes));
            var n = e.pendingLanes;
            if (n === 0 && (gl = null), fs(l), t = t.stateNode, ut && typeof ut.onCommitFiberRoot == "function") try {
                ut.onCommitFiberRoot(Va, t, void 0, (t.current.flags & 128) === 128)
            } catch { }
            if (a !== null) {
                t = C.T, n = Z.p, Z.p = 2, C.T = null;
                try {
                    for (var c = e.onRecoverableError, d = 0; d < a.length; d++) {
                        var g = a[d];
                        c(g.value, {
                            componentStack: g.stack
                        })
                    }
                } finally {
                    C.T = t, Z.p = n
                }
            } (wa & 3) !== 0 && Li(), Lt(e), n = e.pendingLanes, (l & 4194090) !== 0 && (n & 42) !== 0 ? e === Iu ? _n++ : (_n = 0, Iu = e) : _n = 0, Tn(0)
        }
    }

    function Xo(e, t) {
        (e.pooledCacheLanes &= t) === 0 && (t = e.pooledCache, t != null && (e.pooledCache = null, tn(t)))
    }

    function Li(e) {
        return qo(), Yo(), Io(), Qo()
    }

    function Qo() {
        if (Fe !== 5) return !1;
        var e = yl,
            t = qu;
        qu = 0;
        var l = fs(wa),
            a = C.T,
            n = Z.p;
        try {
            Z.p = 32 > l ? 32 : l, C.T = null, l = Yu, Yu = null;
            var c = yl,
                d = wa;
            if (Fe = 0, xa = yl = null, wa = 0, (Te & 6) !== 0) throw Error(u(331));
            var g = Te;
            if (Te |= 4, Co(c.current), xo(c, c.current, d, l), Te = g, Tn(0, !1), ut && typeof ut.onPostCommitFiberRoot == "function") try {
                ut.onPostCommitFiberRoot(Va, c)
            } catch { }
            return !0
        } finally {
            Z.p = n, C.T = a, Xo(e, t)
        }
    }

    function Zo(e, t, l) {
        t = Et(l, t), t = bu(e.stateNode, t, 2), e = rl(e, t, 2), e !== null && (Ga(e, 2), Lt(e))
    }

    function Ce(e, t, l) {
        if (e.tag === 3) Zo(e, e, l);
        else
            for (; t !== null;) {
                if (t.tag === 3) {
                    Zo(t, e, l);
                    break
                } else if (t.tag === 1) {
                    var a = t.stateNode;
                    if (typeof t.type.getDerivedStateFromError == "function" || typeof a.componentDidCatch == "function" && (gl === null || !gl.has(a))) {
                        e = Et(l, e), l = Pf(2), a = rl(t, l, 2), a !== null && (Jf(l, a, t, e), Ga(a, 2), Lt(a));
                        break
                    }
                }
                t = t.return
            }
    }

    function Ku(e, t, l) {
        var a = e.pingCache;
        if (a === null) {
            a = e.pingCache = new Kh;
            var n = new Set;
            a.set(t, n)
        } else n = a.get(t), n === void 0 && (n = new Set, a.set(t, n));
        n.has(l) || (Vu = !0, n.add(l), e = $h.bind(null, e, t, l), t.then(e, e))
    }

    function $h(e, t, l) {
        var a = e.pingCache;
        a !== null && a.delete(t), e.pingedLanes |= e.suspendedLanes & l, e.warmLanes &= ~l, Ne === e && (Ee & l) === l && (Re === 4 || Re === 3 && (Ee & 62914560) === Ee && 300 > Mt() - Bu ? (Te & 2) === 0 && Aa(e, 0) : ju |= l, Oa === Ee && (Oa = 0)), Lt(e)
    }

    function Ko(e, t) {
        t === 0 && (t = qr()), e = ca(e, t), e !== null && (Ga(e, t), Lt(e))
    }

    function Wh(e) {
        var t = e.memoizedState,
            l = 0;
        t !== null && (l = t.retryLane), Ko(e, l)
    }

    function em(e, t) {
        var l = 0;
        switch (e.tag) {
            case 13:
                var a = e.stateNode,
                    n = e.memoizedState;
                n !== null && (l = n.retryLane);
                break;
            case 19:
                a = e.stateNode;
                break;
            case 22:
                a = e.stateNode._retryCache;
                break;
            default:
                throw Error(u(314))
        }
        a !== null && a.delete(t), Ko(e, l)
    }

    function tm(e, t) {
        return tt(e, t)
    }
    var Hi = null,
        Na = null,
        Fu = !1,
        Vi = !1,
        Pu = !1,
        Ql = 0;

    function Lt(e) {
        e !== Na && e.next === null && (Na === null ? Hi = Na = e : Na = Na.next = e), Vi = !0, Fu || (Fu = !0, am())
    }

    function Tn(e, t) {
        if (!Pu && Vi) {
            Pu = !0;
            do
                for (var l = !1, a = Hi; a !== null;) {
                    if (e !== 0) {
                        var n = a.pendingLanes;
                        if (n === 0) var c = 0;
                        else {
                            var d = a.suspendedLanes,
                                g = a.pingedLanes;
                            c = (1 << 31 - rt(42 | e) + 1) - 1, c &= n & ~(d & ~g), c = c & 201326741 ? c & 201326741 | 1 : c ? c | 2 : 0
                        }
                        c !== 0 && (l = !0, ko(a, c))
                    } else c = Ee, c = In(a, a === Ne ? c : 0, a.cancelPendingCommit !== null || a.timeoutHandle !== -1), (c & 3) === 0 || ja(a, c) || (l = !0, ko(a, c));
                    a = a.next
                }
            while (l);
            Pu = !1
        }
    }

    function lm() {
        Fo()
    }

    function Fo() {
        Vi = Fu = !1;
        var e = 0;
        Ql !== 0 && (om() && (e = Ql), Ql = 0);
        for (var t = Mt(), l = null, a = Hi; a !== null;) {
            var n = a.next,
                c = Po(a, t);
            c === 0 ? (a.next = null, l === null ? Hi = n : l.next = n, n === null && (Na = l)) : (l = a, (e !== 0 || (c & 3) !== 0) && (Vi = !0)), a = n
        }
        Tn(e)
    }

    function Po(e, t) {
        for (var l = e.suspendedLanes, a = e.pingedLanes, n = e.expirationTimes, c = e.pendingLanes & -62914561; 0 < c;) {
            var d = 31 - rt(c),
                g = 1 << d,
                b = n[d];
            b === -1 ? ((g & l) === 0 || (g & a) !== 0) && (n[d] = Cp(g, t)) : b <= t && (e.expiredLanes |= g), c &= ~g
        }
        if (t = Ne, l = Ee, l = In(e, e === t ? l : 0, e.cancelPendingCommit !== null || e.timeoutHandle !== -1), a = e.callbackNode, l === 0 || e === t && (Oe === 2 || Oe === 9) || e.cancelPendingCommit !== null) return a !== null && a !== null && jt(a), e.callbackNode = null, e.callbackPriority = 0;
        if ((l & 3) === 0 || ja(e, l)) {
            if (t = l & -l, t === e.callbackPriority) return t;
            switch (a !== null && jt(a), fs(l)) {
                case 2:
                case 8:
                    l = jr;
                    break;
                case 32:
                    l = Bn;
                    break;
                case 268435456:
                    l = Gr;
                    break;
                default:
                    l = Bn
            }
            return a = Jo.bind(null, e), l = tt(l, a), e.callbackPriority = t, e.callbackNode = l, t
        }
        return a !== null && a !== null && jt(a), e.callbackPriority = 2, e.callbackNode = null, 2
    }

    function Jo(e, t) {
        if (Fe !== 0 && Fe !== 5) return e.callbackNode = null, e.callbackPriority = 0, null;
        var l = e.callbackNode;
        if (Li() && e.callbackNode !== l) return null;
        var a = Ee;
        return a = In(e, e === Ne ? a : 0, e.cancelPendingCommit !== null || e.timeoutHandle !== -1), a === 0 ? null : (zo(e, a, t), Po(e, Mt()), e.callbackNode != null && e.callbackNode === l ? Jo.bind(null, e) : null)
    }

    function ko(e, t) {
        if (Li()) return null;
        zo(e, t, !0)
    }

    function am() {
        pm(function () {
            (Te & 6) !== 0 ? tt(Vr, lm) : Fo()
        })
    }

    function Ju() {
        return Ql === 0 && (Ql = Br()), Ql
    }

    function $o(e) {
        return e == null || typeof e == "symbol" || typeof e == "boolean" ? null : typeof e == "function" ? e : Fn("" + e)
    }

    function Wo(e, t) {
        var l = t.ownerDocument.createElement("input");
        return l.name = t.name, l.value = t.value, e.id && l.setAttribute("form", e.id), t.parentNode.insertBefore(l, t), e = new FormData(e), l.parentNode.removeChild(l), e
    }

    function nm(e, t, l, a, n) {
        if (t === "submit" && l && l.stateNode === n) {
            var c = $o((n[lt] || null).action),
                d = a.submitter;
            d && (t = (t = d[lt] || null) ? $o(t.formAction) : d.getAttribute("formAction"), t !== null && (c = t, d = null));
            var g = new $n("action", "action", null, a, n);
            e.push({
                event: g,
                listeners: [{
                    instance: null,
                    listener: function () {
                        if (a.defaultPrevented) {
                            if (Ql !== 0) {
                                var b = d ? Wo(n, d) : new FormData(n);
                                vu(l, {
                                    pending: !0,
                                    data: b,
                                    method: n.method,
                                    action: c
                                }, null, b)
                            }
                        } else typeof c == "function" && (g.preventDefault(), b = d ? Wo(n, d) : new FormData(n), vu(l, {
                            pending: !0,
                            data: b,
                            method: n.method,
                            action: c
                        }, c, b))
                    },
                    currentTarget: n
                }]
            })
        }
    }
    for (var ku = 0; ku < Ls.length; ku++) {
        var $u = Ls[ku],
            im = $u.toLowerCase(),
            sm = $u[0].toUpperCase() + $u.slice(1);
        wt(im, "on" + sm)
    }
    wt(Mc, "onAnimationEnd"), wt(Dc, "onAnimationIteration"), wt(zc, "onAnimationStart"), wt("dblclick", "onDoubleClick"), wt("focusin", "onFocus"), wt("focusout", "onBlur"), wt(Th, "onTransitionRun"), wt(Oh, "onTransitionStart"), wt(xh, "onTransitionCancel"), wt(Rc, "onTransitionEnd"), Wl("onMouseEnter", ["mouseout", "mouseover"]), Wl("onMouseLeave", ["mouseout", "mouseover"]), Wl("onPointerEnter", ["pointerout", "pointerover"]), Wl("onPointerLeave", ["pointerout", "pointerover"]), Nl("onChange", "change click focusin focusout input keydown keyup selectionchange".split(" ")), Nl("onSelect", "focusout contextmenu dragend focusin keydown keyup mousedown mouseup selectionchange".split(" ")), Nl("onBeforeInput", ["compositionend", "keypress", "textInput", "paste"]), Nl("onCompositionEnd", "compositionend focusout keydown keypress keyup mousedown".split(" ")), Nl("onCompositionStart", "compositionstart focusout keydown keypress keyup mousedown".split(" ")), Nl("onCompositionUpdate", "compositionupdate focusout keydown keypress keyup mousedown".split(" "));
    var On = "abort canplay canplaythrough durationchange emptied encrypted ended error loadeddata loadedmetadata loadstart pause play playing progress ratechange resize seeked seeking stalled suspend timeupdate volumechange waiting".split(" "),
        um = new Set("beforetoggle cancel close invalid load scroll scrollend toggle".split(" ").concat(On));

    function ed(e, t) {
        t = (t & 4) !== 0;
        for (var l = 0; l < e.length; l++) {
            var a = e[l],
                n = a.event;
            a = a.listeners;
            e: {
                var c = void 0;
                if (t)
                    for (var d = a.length - 1; 0 <= d; d--) {
                        var g = a[d],
                            b = g.instance,
                            D = g.currentTarget;
                        if (g = g.listener, b !== c && n.isPropagationStopped()) break e;
                        c = g, n.currentTarget = D;
                        try {
                            c(n)
                        } catch (B) {
                            Oi(B)
                        }
                        n.currentTarget = null, c = b
                    } else
                    for (d = 0; d < a.length; d++) {
                        if (g = a[d], b = g.instance, D = g.currentTarget, g = g.listener, b !== c && n.isPropagationStopped()) break e;
                        c = g, n.currentTarget = D;
                        try {
                            c(n)
                        } catch (B) {
                            Oi(B)
                        }
                        n.currentTarget = null, c = b
                    }
            }
        }
    }

    function ge(e, t) {
        var l = t[os];
        l === void 0 && (l = t[os] = new Set);
        var a = e + "__bubble";
        l.has(a) || (td(t, e, 2, !1), l.add(a))
    }

    function Wu(e, t, l) {
        var a = 0;
        t && (a |= 4), td(l, e, a, t)
    }
    var ji = "_reactListening" + Math.random().toString(36).slice(2);

    function er(e) {
        if (!e[ji]) {
            e[ji] = !0, Zr.forEach(function (l) {
                l !== "selectionchange" && (um.has(l) || Wu(l, !1, e), Wu(l, !0, e))
            });
            var t = e.nodeType === 9 ? e : e.ownerDocument;
            t === null || t[ji] || (t[ji] = !0, Wu("selectionchange", !1, t))
        }
    }

    function td(e, t, l, a) {
        switch (xd(t)) {
            case 2:
                var n = Um;
                break;
            case 8:
                n = Lm;
                break;
            default:
                n = hr
        }
        l = n.bind(null, t, l, e), n = void 0, !_s || t !== "touchstart" && t !== "touchmove" && t !== "wheel" || (n = !0), a ? n !== void 0 ? e.addEventListener(t, l, {
            capture: !0,
            passive: n
        }) : e.addEventListener(t, l, !0) : n !== void 0 ? e.addEventListener(t, l, {
            passive: n
        }) : e.addEventListener(t, l, !1)
    }

    function tr(e, t, l, a, n) {
        var c = a;
        if ((t & 1) === 0 && (t & 2) === 0 && a !== null) e: for (; ;) {
            if (a === null) return;
            var d = a.tag;
            if (d === 3 || d === 4) {
                var g = a.stateNode.containerInfo;
                if (g === n) break;
                if (d === 4)
                    for (d = a.return; d !== null;) {
                        var b = d.tag;
                        if ((b === 3 || b === 4) && d.stateNode.containerInfo === n) return;
                        d = d.return
                    }
                for (; g !== null;) {
                    if (d = Jl(g), d === null) return;
                    if (b = d.tag, b === 5 || b === 6 || b === 26 || b === 27) {
                        a = c = d;
                        continue e
                    }
                    g = g.parentNode
                }
            }
            a = a.return
        }
        sc(function () {
            var D = c,
                B = Ss(l),
                I = [];
            e: {
                var U = Uc.get(e);
                if (U !== void 0) {
                    var L = $n,
                        ce = e;
                    switch (e) {
                        case "keypress":
                            if (Jn(l) === 0) break e;
                        case "keydown":
                        case "keyup":
                            L = th;
                            break;
                        case "focusin":
                            ce = "focus", L = ws;
                            break;
                        case "focusout":
                            ce = "blur", L = ws;
                            break;
                        case "beforeblur":
                        case "afterblur":
                            L = ws;
                            break;
                        case "click":
                            if (l.button === 2) break e;
                        case "auxclick":
                        case "dblclick":
                        case "mousedown":
                        case "mousemove":
                        case "mouseup":
                        case "mouseout":
                        case "mouseover":
                        case "contextmenu":
                            L = cc;
                            break;
                        case "drag":
                        case "dragend":
                        case "dragenter":
                        case "dragexit":
                        case "dragleave":
                        case "dragover":
                        case "dragstart":
                        case "drop":
                            L = Ip;
                            break;
                        case "touchcancel":
                        case "touchend":
                        case "touchmove":
                        case "touchstart":
                            L = nh;
                            break;
                        case Mc:
                        case Dc:
                        case zc:
                            L = Zp;
                            break;
                        case Rc:
                            L = sh;
                            break;
                        case "scroll":
                        case "scrollend":
                            L = qp;
                            break;
                        case "wheel":
                            L = rh;
                            break;
                        case "copy":
                        case "cut":
                        case "paste":
                            L = Fp;
                            break;
                        case "gotpointercapture":
                        case "lostpointercapture":
                        case "pointercancel":
                        case "pointerdown":
                        case "pointermove":
                        case "pointerout":
                        case "pointerover":
                        case "pointerup":
                            L = oc;
                            break;
                        case "toggle":
                        case "beforetoggle":
                            L = fh
                    }
                    var se = (t & 4) !== 0,
                        Ae = !se && (e === "scroll" || e === "scrollend"),
                        w = se ? U !== null ? U + "Capture" : null : U;
                    se = [];
                    for (var T = D, N; T !== null;) {
                        var q = T;
                        if (N = q.stateNode, q = q.tag, q !== 5 && q !== 26 && q !== 27 || N === null || w === null || (q = Ya(T, w), q != null && se.push(xn(T, q, N))), Ae) break;
                        T = T.return
                    }
                    0 < se.length && (U = new L(U, ce, null, l, B), I.push({
                        event: U,
                        listeners: se
                    }))
                }
            }
            if ((t & 7) === 0) {
                e: {
                    if (U = e === "mouseover" || e === "pointerover", L = e === "mouseout" || e === "pointerout", U && l !== Es && (ce = l.relatedTarget || l.fromElement) && (Jl(ce) || ce[Pl])) break e;
                    if ((L || U) && (U = B.window === B ? B : (U = B.ownerDocument) ? U.defaultView || U.parentWindow : window, L ? (ce = l.relatedTarget || l.toElement, L = D, ce = ce ? Jl(ce) : null, ce !== null && (Ae = f(ce), se = ce.tag, ce !== Ae || se !== 5 && se !== 27 && se !== 6) && (ce = null)) : (L = null, ce = D), L !== ce)) {
                        if (se = cc, q = "onMouseLeave", w = "onMouseEnter", T = "mouse", (e === "pointerout" || e === "pointerover") && (se = oc, q = "onPointerLeave", w = "onPointerEnter", T = "pointer"), Ae = L == null ? U : qa(L), N = ce == null ? U : qa(ce), U = new se(q, T + "leave", L, l, B), U.target = Ae, U.relatedTarget = N, q = null, Jl(B) === D && (se = new se(w, T + "enter", ce, l, B), se.target = N, se.relatedTarget = Ae, q = se), Ae = q, L && ce) t: {
                            for (se = L, w = ce, T = 0, N = se; N; N = Ma(N)) T++;
                            for (N = 0, q = w; q; q = Ma(q)) N++;
                            for (; 0 < T - N;) se = Ma(se),
                                T--;
                            for (; 0 < N - T;) w = Ma(w),
                                N--;
                            for (; T--;) {
                                if (se === w || w !== null && se === w.alternate) break t;
                                se = Ma(se), w = Ma(w)
                            }
                            se = null
                        }
                        else se = null;
                        L !== null && ld(I, U, L, se, !1), ce !== null && Ae !== null && ld(I, Ae, ce, se, !0)
                    }
                }
                e: {
                    if (U = D ? qa(D) : window, L = U.nodeName && U.nodeName.toLowerCase(), L === "select" || L === "input" && U.type === "file") var W = Ec;
                    else if (gc(U))
                        if (Sc) W = Sh;
                        else {
                            W = yh;
                            var me = gh
                        }
                    else L = U.nodeName,
                        !L || L.toLowerCase() !== "input" || U.type !== "checkbox" && U.type !== "radio" ? D && ys(D.elementType) && (W = Ec) : W = Eh;
                    if (W && (W = W(e, D))) {
                        yc(I, W, l, B);
                        break e
                    }
                    me && me(e, U, D),
                        e === "focusout" && D && U.type === "number" && D.memoizedProps.value != null && gs(U, "number", U.value)
                }
                switch (me = D ? qa(D) : window, e) {
                    case "focusin":
                        (gc(me) || me.contentEditable === "true") && (sa = me, zs = D, Ja = null);
                        break;
                    case "focusout":
                        Ja = zs = sa = null;
                        break;
                    case "mousedown":
                        Rs = !0;
                        break;
                    case "contextmenu":
                    case "mouseup":
                    case "dragend":
                        Rs = !1, Cc(I, l, B);
                        break;
                    case "selectionchange":
                        if (_h) break;
                    case "keydown":
                    case "keyup":
                        Cc(I, l, B)
                }
                var ne;
                if (Cs) e: {
                    switch (e) {
                        case "compositionstart":
                            var ue = "onCompositionStart";
                            break e;
                        case "compositionend":
                            ue = "onCompositionEnd";
                            break e;
                        case "compositionupdate":
                            ue = "onCompositionUpdate";
                            break e
                    }
                    ue = void 0
                }
                else ia ? mc(e, l) && (ue = "onCompositionEnd") : e === "keydown" && l.keyCode === 229 && (ue = "onCompositionStart"); ue && (dc && l.locale !== "ko" && (ia || ue !== "onCompositionStart" ? ue === "onCompositionEnd" && ia && (ne = uc()) : (nl = B, Ts = "value" in nl ? nl.value : nl.textContent, ia = !0)), me = Gi(D, ue), 0 < me.length && (ue = new fc(ue, e, null, l, B), I.push({
                    event: ue,
                    listeners: me
                }), ne ? ue.data = ne : (ne = vc(l), ne !== null && (ue.data = ne)))),
                    (ne = dh ? ph(e, l) : hh(e, l)) && (ue = Gi(D, "onBeforeInput"), 0 < ue.length && (me = new fc("onBeforeInput", "beforeinput", null, l, B), I.push({
                        event: me,
                        listeners: ue
                    }), me.data = ne)),
                    nm(I, e, D, l, B)
            }
            ed(I, t)
        })
    }

    function xn(e, t, l) {
        return {
            instance: e,
            listener: t,
            currentTarget: l
        }
    }

    function Gi(e, t) {
        for (var l = t + "Capture", a = []; e !== null;) {
            var n = e,
                c = n.stateNode;
            if (n = n.tag, n !== 5 && n !== 26 && n !== 27 || c === null || (n = Ya(e, l), n != null && a.unshift(xn(e, n, c)), n = Ya(e, t), n != null && a.push(xn(e, n, c))), e.tag === 3) return a;
            e = e.return
        }
        return []
    }

    function Ma(e) {
        if (e === null) return null;
        do e = e.return; while (e && e.tag !== 5 && e.tag !== 27);
        return e || null
    }

    function ld(e, t, l, a, n) {
        for (var c = t._reactName, d = []; l !== null && l !== a;) {
            var g = l,
                b = g.alternate,
                D = g.stateNode;
            if (g = g.tag, b !== null && b === a) break;
            g !== 5 && g !== 26 && g !== 27 || D === null || (b = D, n ? (D = Ya(l, c), D != null && d.unshift(xn(l, D, b))) : n || (D = Ya(l, c), D != null && d.push(xn(l, D, b)))), l = l.return
        }
        d.length !== 0 && e.push({
            event: t,
            listeners: d
        })
    }
    var rm = /\r\n?/g,
        cm = /\u0000|\uFFFD/g;

    function ad(e) {
        return (typeof e == "string" ? e : "" + e).replace(rm, `
`).replace(cm, "")
    }

    function nd(e, t) {
        return t = ad(t), ad(e) === t
    }

    function Bi() { }

    function we(e, t, l, a, n, c) {
        switch (l) {
            case "children":
                typeof a == "string" ? t === "body" || t === "textarea" && a === "" || la(e, a) : (typeof a == "number" || typeof a == "bigint") && t !== "body" && la(e, "" + a);
                break;
            case "className":
                Qn(e, "class", a);
                break;
            case "tabIndex":
                Qn(e, "tabindex", a);
                break;
            case "dir":
            case "role":
            case "viewBox":
            case "width":
            case "height":
                Qn(e, l, a);
                break;
            case "style":
                nc(e, a, c);
                break;
            case "data":
                if (t !== "object") {
                    Qn(e, "data", a);
                    break
                }
            case "src":
            case "href":
                if (a === "" && (t !== "a" || l !== "href")) {
                    e.removeAttribute(l);
                    break
                }
                if (a == null || typeof a == "function" || typeof a == "symbol" || typeof a == "boolean") {
                    e.removeAttribute(l);
                    break
                }
                a = Fn("" + a), e.setAttribute(l, a);
                break;
            case "action":
            case "formAction":
                if (typeof a == "function") {
                    e.setAttribute(l, "javascript:throw new Error('A React form was unexpectedly submitted. If you called form.submit() manually, consider using form.requestSubmit() instead. If you\\'re trying to use event.stopPropagation() in a submit event handler, consider also calling event.preventDefault().')");
                    break
                } else typeof c == "function" && (l === "formAction" ? (t !== "input" && we(e, t, "name", n.name, n, null), we(e, t, "formEncType", n.formEncType, n, null), we(e, t, "formMethod", n.formMethod, n, null), we(e, t, "formTarget", n.formTarget, n, null)) : (we(e, t, "encType", n.encType, n, null), we(e, t, "method", n.method, n, null), we(e, t, "target", n.target, n, null)));
                if (a == null || typeof a == "symbol" || typeof a == "boolean") {
                    e.removeAttribute(l);
                    break
                }
                a = Fn("" + a), e.setAttribute(l, a);
                break;
            case "onClick":
                a != null && (e.onclick = Bi);
                break;
            case "onScroll":
                a != null && ge("scroll", e);
                break;
            case "onScrollEnd":
                a != null && ge("scrollend", e);
                break;
            case "dangerouslySetInnerHTML":
                if (a != null) {
                    if (typeof a != "object" || !("__html" in a)) throw Error(u(61));
                    if (l = a.__html, l != null) {
                        if (n.children != null) throw Error(u(60));
                        e.innerHTML = l
                    }
                }
                break;
            case "multiple":
                e.multiple = a && typeof a != "function" && typeof a != "symbol";
                break;
            case "muted":
                e.muted = a && typeof a != "function" && typeof a != "symbol";
                break;
            case "suppressContentEditableWarning":
            case "suppressHydrationWarning":
            case "defaultValue":
            case "defaultChecked":
            case "innerHTML":
            case "ref":
                break;
            case "autoFocus":
                break;
            case "xlinkHref":
                if (a == null || typeof a == "function" || typeof a == "boolean" || typeof a == "symbol") {
                    e.removeAttribute("xlink:href");
                    break
                }
                l = Fn("" + a), e.setAttributeNS("http://www.w3.org/1999/xlink", "xlink:href", l);
                break;
            case "contentEditable":
            case "spellCheck":
            case "draggable":
            case "value":
            case "autoReverse":
            case "externalResourcesRequired":
            case "focusable":
            case "preserveAlpha":
                a != null && typeof a != "function" && typeof a != "symbol" ? e.setAttribute(l, "" + a) : e.removeAttribute(l);
                break;
            case "inert":
            case "allowFullScreen":
            case "async":
            case "autoPlay":
            case "controls":
            case "default":
            case "defer":
            case "disabled":
            case "disablePictureInPicture":
            case "disableRemotePlayback":
            case "formNoValidate":
            case "hidden":
            case "loop":
            case "noModule":
            case "noValidate":
            case "open":
            case "playsInline":
            case "readOnly":
            case "required":
            case "reversed":
            case "scoped":
            case "seamless":
            case "itemScope":
                a && typeof a != "function" && typeof a != "symbol" ? e.setAttribute(l, "") : e.removeAttribute(l);
                break;
            case "capture":
            case "download":
                a === !0 ? e.setAttribute(l, "") : a !== !1 && a != null && typeof a != "function" && typeof a != "symbol" ? e.setAttribute(l, a) : e.removeAttribute(l);
                break;
            case "cols":
            case "rows":
            case "size":
            case "span":
                a != null && typeof a != "function" && typeof a != "symbol" && !isNaN(a) && 1 <= a ? e.setAttribute(l, a) : e.removeAttribute(l);
                break;
            case "rowSpan":
            case "start":
                a == null || typeof a == "function" || typeof a == "symbol" || isNaN(a) ? e.removeAttribute(l) : e.setAttribute(l, a);
                break;
            case "popover":
                ge("beforetoggle", e), ge("toggle", e), Xn(e, "popover", a);
                break;
            case "xlinkActuate":
                Gt(e, "http://www.w3.org/1999/xlink", "xlink:actuate", a);
                break;
            case "xlinkArcrole":
                Gt(e, "http://www.w3.org/1999/xlink", "xlink:arcrole", a);
                break;
            case "xlinkRole":
                Gt(e, "http://www.w3.org/1999/xlink", "xlink:role", a);
                break;
            case "xlinkShow":
                Gt(e, "http://www.w3.org/1999/xlink", "xlink:show", a);
                break;
            case "xlinkTitle":
                Gt(e, "http://www.w3.org/1999/xlink", "xlink:title", a);
                break;
            case "xlinkType":
                Gt(e, "http://www.w3.org/1999/xlink", "xlink:type", a);
                break;
            case "xmlBase":
                Gt(e, "http://www.w3.org/XML/1998/namespace", "xml:base", a);
                break;
            case "xmlLang":
                Gt(e, "http://www.w3.org/XML/1998/namespace", "xml:lang", a);
                break;
            case "xmlSpace":
                Gt(e, "http://www.w3.org/XML/1998/namespace", "xml:space", a);
                break;
            case "is":
                Xn(e, "is", a);
                break;
            case "innerText":
            case "textContent":
                break;
            default:
                (!(2 < l.length) || l[0] !== "o" && l[0] !== "O" || l[1] !== "n" && l[1] !== "N") && (l = Gp.get(l) || l, Xn(e, l, a))
        }
    }

    function lr(e, t, l, a, n, c) {
        switch (l) {
            case "style":
                nc(e, a, c);
                break;
            case "dangerouslySetInnerHTML":
                if (a != null) {
                    if (typeof a != "object" || !("__html" in a)) throw Error(u(61));
                    if (l = a.__html, l != null) {
                        if (n.children != null) throw Error(u(60));
                        e.innerHTML = l
                    }
                }
                break;
            case "children":
                typeof a == "string" ? la(e, a) : (typeof a == "number" || typeof a == "bigint") && la(e, "" + a);
                break;
            case "onScroll":
                a != null && ge("scroll", e);
                break;
            case "onScrollEnd":
                a != null && ge("scrollend", e);
                break;
            case "onClick":
                a != null && (e.onclick = Bi);
                break;
            case "suppressContentEditableWarning":
            case "suppressHydrationWarning":
            case "innerHTML":
            case "ref":
                break;
            case "innerText":
            case "textContent":
                break;
            default:
                if (!Kr.hasOwnProperty(l)) e: {
                    if (l[0] === "o" && l[1] === "n" && (n = l.endsWith("Capture"), t = l.slice(2, n ? l.length - 7 : void 0), c = e[lt] || null, c = c != null ? c[l] : null, typeof c == "function" && e.removeEventListener(t, c, n), typeof a == "function")) {
                        typeof c != "function" && c !== null && (l in e ? e[l] = null : e.hasAttribute(l) && e.removeAttribute(l)), e.addEventListener(t, a, n);
                        break e
                    }
                    l in e ? e[l] = a : a === !0 ? e.setAttribute(l, "") : Xn(e, l, a)
                }
        }
    }

    function Pe(e, t, l) {
        switch (t) {
            case "div":
            case "span":
            case "svg":
            case "path":
            case "a":
            case "g":
            case "p":
            case "li":
                break;
            case "img":
                ge("error", e), ge("load", e);
                var a = !1,
                    n = !1,
                    c;
                for (c in l)
                    if (l.hasOwnProperty(c)) {
                        var d = l[c];
                        if (d != null) switch (c) {
                            case "src":
                                a = !0;
                                break;
                            case "srcSet":
                                n = !0;
                                break;
                            case "children":
                            case "dangerouslySetInnerHTML":
                                throw Error(u(137, t));
                            default:
                                we(e, t, c, d, l, null)
                        }
                    } n && we(e, t, "srcSet", l.srcSet, l, null), a && we(e, t, "src", l.src, l, null);
                return;
            case "input":
                ge("invalid", e);
                var g = c = d = n = null,
                    b = null,
                    D = null;
                for (a in l)
                    if (l.hasOwnProperty(a)) {
                        var B = l[a];
                        if (B != null) switch (a) {
                            case "name":
                                n = B;
                                break;
                            case "type":
                                d = B;
                                break;
                            case "checked":
                                b = B;
                                break;
                            case "defaultChecked":
                                D = B;
                                break;
                            case "value":
                                c = B;
                                break;
                            case "defaultValue":
                                g = B;
                                break;
                            case "children":
                            case "dangerouslySetInnerHTML":
                                if (B != null) throw Error(u(137, t));
                                break;
                            default:
                                we(e, t, a, B, l, null)
                        }
                    } ec(e, c, g, b, D, d, n, !1), Zn(e);
                return;
            case "select":
                ge("invalid", e), a = d = c = null;
                for (n in l)
                    if (l.hasOwnProperty(n) && (g = l[n], g != null)) switch (n) {
                        case "value":
                            c = g;
                            break;
                        case "defaultValue":
                            d = g;
                            break;
                        case "multiple":
                            a = g;
                        default:
                            we(e, t, n, g, l, null)
                    }
                t = c, l = d, e.multiple = !!a, t != null ? ta(e, !!a, t, !1) : l != null && ta(e, !!a, l, !0);
                return;
            case "textarea":
                ge("invalid", e), c = n = a = null;
                for (d in l)
                    if (l.hasOwnProperty(d) && (g = l[d], g != null)) switch (d) {
                        case "value":
                            a = g;
                            break;
                        case "defaultValue":
                            n = g;
                            break;
                        case "children":
                            c = g;
                            break;
                        case "dangerouslySetInnerHTML":
                            if (g != null) throw Error(u(91));
                            break;
                        default:
                            we(e, t, d, g, l, null)
                    }
                lc(e, a, n, c), Zn(e);
                return;
            case "option":
                for (b in l)
                    if (l.hasOwnProperty(b) && (a = l[b], a != null)) switch (b) {
                        case "selected":
                            e.selected = a && typeof a != "function" && typeof a != "symbol";
                            break;
                        default:
                            we(e, t, b, a, l, null)
                    }
                return;
            case "dialog":
                ge("beforetoggle", e), ge("toggle", e), ge("cancel", e), ge("close", e);
                break;
            case "iframe":
            case "object":
                ge("load", e);
                break;
            case "video":
            case "audio":
                for (a = 0; a < On.length; a++) ge(On[a], e);
                break;
            case "image":
                ge("error", e), ge("load", e);
                break;
            case "details":
                ge("toggle", e);
                break;
            case "embed":
            case "source":
            case "link":
                ge("error", e), ge("load", e);
            case "area":
            case "base":
            case "br":
            case "col":
            case "hr":
            case "keygen":
            case "meta":
            case "param":
            case "track":
            case "wbr":
            case "menuitem":
                for (D in l)
                    if (l.hasOwnProperty(D) && (a = l[D], a != null)) switch (D) {
                        case "children":
                        case "dangerouslySetInnerHTML":
                            throw Error(u(137, t));
                        default:
                            we(e, t, D, a, l, null)
                    }
                return;
            default:
                if (ys(t)) {
                    for (B in l) l.hasOwnProperty(B) && (a = l[B], a !== void 0 && lr(e, t, B, a, l, void 0));
                    return
                }
        }
        for (g in l) l.hasOwnProperty(g) && (a = l[g], a != null && we(e, t, g, a, l, null))
    }

    function fm(e, t, l, a) {
        switch (t) {
            case "div":
            case "span":
            case "svg":
            case "path":
            case "a":
            case "g":
            case "p":
            case "li":
                break;
            case "input":
                var n = null,
                    c = null,
                    d = null,
                    g = null,
                    b = null,
                    D = null,
                    B = null;
                for (L in l) {
                    var I = l[L];
                    if (l.hasOwnProperty(L) && I != null) switch (L) {
                        case "checked":
                            break;
                        case "value":
                            break;
                        case "defaultValue":
                            b = I;
                        default:
                            a.hasOwnProperty(L) || we(e, t, L, null, a, I)
                    }
                }
                for (var U in a) {
                    var L = a[U];
                    if (I = l[U], a.hasOwnProperty(U) && (L != null || I != null)) switch (U) {
                        case "type":
                            c = L;
                            break;
                        case "name":
                            n = L;
                            break;
                        case "checked":
                            D = L;
                            break;
                        case "defaultChecked":
                            B = L;
                            break;
                        case "value":
                            d = L;
                            break;
                        case "defaultValue":
                            g = L;
                            break;
                        case "children":
                        case "dangerouslySetInnerHTML":
                            if (L != null) throw Error(u(137, t));
                            break;
                        default:
                            L !== I && we(e, t, U, L, a, I)
                    }
                }
                vs(e, d, g, b, D, B, c, n);
                return;
            case "select":
                L = d = g = U = null;
                for (c in l)
                    if (b = l[c], l.hasOwnProperty(c) && b != null) switch (c) {
                        case "value":
                            break;
                        case "multiple":
                            L = b;
                        default:
                            a.hasOwnProperty(c) || we(e, t, c, null, a, b)
                    }
                for (n in a)
                    if (c = a[n], b = l[n], a.hasOwnProperty(n) && (c != null || b != null)) switch (n) {
                        case "value":
                            U = c;
                            break;
                        case "defaultValue":
                            g = c;
                            break;
                        case "multiple":
                            d = c;
                        default:
                            c !== b && we(e, t, n, c, a, b)
                    }
                t = g, l = d, a = L, U != null ? ta(e, !!l, U, !1) : !!a != !!l && (t != null ? ta(e, !!l, t, !0) : ta(e, !!l, l ? [] : "", !1));
                return;
            case "textarea":
                L = U = null;
                for (g in l)
                    if (n = l[g], l.hasOwnProperty(g) && n != null && !a.hasOwnProperty(g)) switch (g) {
                        case "value":
                            break;
                        case "children":
                            break;
                        default:
                            we(e, t, g, null, a, n)
                    }
                for (d in a)
                    if (n = a[d], c = l[d], a.hasOwnProperty(d) && (n != null || c != null)) switch (d) {
                        case "value":
                            U = n;
                            break;
                        case "defaultValue":
                            L = n;
                            break;
                        case "children":
                            break;
                        case "dangerouslySetInnerHTML":
                            if (n != null) throw Error(u(91));
                            break;
                        default:
                            n !== c && we(e, t, d, n, a, c)
                    }
                tc(e, U, L);
                return;
            case "option":
                for (var ce in l)
                    if (U = l[ce], l.hasOwnProperty(ce) && U != null && !a.hasOwnProperty(ce)) switch (ce) {
                        case "selected":
                            e.selected = !1;
                            break;
                        default:
                            we(e, t, ce, null, a, U)
                    }
                for (b in a)
                    if (U = a[b], L = l[b], a.hasOwnProperty(b) && U !== L && (U != null || L != null)) switch (b) {
                        case "selected":
                            e.selected = U && typeof U != "function" && typeof U != "symbol";
                            break;
                        default:
                            we(e, t, b, U, a, L)
                    }
                return;
            case "img":
            case "link":
            case "area":
            case "base":
            case "br":
            case "col":
            case "embed":
            case "hr":
            case "keygen":
            case "meta":
            case "param":
            case "source":
            case "track":
            case "wbr":
            case "menuitem":
                for (var se in l) U = l[se], l.hasOwnProperty(se) && U != null && !a.hasOwnProperty(se) && we(e, t, se, null, a, U);
                for (D in a)
                    if (U = a[D], L = l[D], a.hasOwnProperty(D) && U !== L && (U != null || L != null)) switch (D) {
                        case "children":
                        case "dangerouslySetInnerHTML":
                            if (U != null) throw Error(u(137, t));
                            break;
                        default:
                            we(e, t, D, U, a, L)
                    }
                return;
            default:
                if (ys(t)) {
                    for (var Ae in l) U = l[Ae], l.hasOwnProperty(Ae) && U !== void 0 && !a.hasOwnProperty(Ae) && lr(e, t, Ae, void 0, a, U);
                    for (B in a) U = a[B], L = l[B], !a.hasOwnProperty(B) || U === L || U === void 0 && L === void 0 || lr(e, t, B, U, a, L);
                    return
                }
        }
        for (var w in l) U = l[w], l.hasOwnProperty(w) && U != null && !a.hasOwnProperty(w) && we(e, t, w, null, a, U);
        for (I in a) U = a[I], L = l[I], !a.hasOwnProperty(I) || U === L || U == null && L == null || we(e, t, I, U, a, L)
    }
    var ar = null,
        nr = null;

    function qi(e) {
        return e.nodeType === 9 ? e : e.ownerDocument
    }

    function id(e) {
        switch (e) {
            case "http://www.w3.org/2000/svg":
                return 1;
            case "http://www.w3.org/1998/Math/MathML":
                return 2;
            default:
                return 0
        }
    }

    function sd(e, t) {
        if (e === 0) switch (t) {
            case "svg":
                return 1;
            case "math":
                return 2;
            default:
                return 0
        }
        return e === 1 && t === "foreignObject" ? 0 : e
    }

    function ir(e, t) {
        return e === "textarea" || e === "noscript" || typeof t.children == "string" || typeof t.children == "number" || typeof t.children == "bigint" || typeof t.dangerouslySetInnerHTML == "object" && t.dangerouslySetInnerHTML !== null && t.dangerouslySetInnerHTML.__html != null
    }
    var sr = null;

    function om() {
        var e = window.event;
        return e && e.type === "popstate" ? e === sr ? !1 : (sr = e, !0) : (sr = null, !1)
    }
    var ud = typeof setTimeout == "function" ? setTimeout : void 0,
        dm = typeof clearTimeout == "function" ? clearTimeout : void 0,
        rd = typeof Promise == "function" ? Promise : void 0,
        pm = typeof queueMicrotask == "function" ? queueMicrotask : typeof rd < "u" ? function (e) {
            return rd.resolve(null).then(e).catch(hm)
        } : ud;

    function hm(e) {
        setTimeout(function () {
            throw e
        })
    }

    function Sl(e) {
        return e === "head"
    }

    function cd(e, t) {
        var l = t,
            a = 0,
            n = 0;
        do {
            var c = l.nextSibling;
            if (e.removeChild(l), c && c.nodeType === 8)
                if (l = c.data, l === "/$") {
                    if (0 < a && 8 > a) {
                        l = a;
                        var d = e.ownerDocument;
                        if (l & 1 && wn(d.documentElement), l & 2 && wn(d.body), l & 4)
                            for (l = d.head, wn(l), d = l.firstChild; d;) {
                                var g = d.nextSibling,
                                    b = d.nodeName;
                                d[Ba] || b === "SCRIPT" || b === "STYLE" || b === "LINK" && d.rel.toLowerCase() === "stylesheet" || l.removeChild(d), d = g
                            }
                    }
                    if (n === 0) {
                        e.removeChild(c), Un(t);
                        return
                    }
                    n--
                } else l === "$" || l === "$?" || l === "$!" ? n++ : a = l.charCodeAt(0) - 48;
            else a = 0;
            l = c
        } while (l);
        Un(t)
    }

    function ur(e) {
        var t = e.firstChild;
        for (t && t.nodeType === 10 && (t = t.nextSibling); t;) {
            var l = t;
            switch (t = t.nextSibling, l.nodeName) {
                case "HTML":
                case "HEAD":
                case "BODY":
                    ur(l), ds(l);
                    continue;
                case "SCRIPT":
                case "STYLE":
                    continue;
                case "LINK":
                    if (l.rel.toLowerCase() === "stylesheet") continue
            }
            e.removeChild(l)
        }
    }

    function mm(e, t, l, a) {
        for (; e.nodeType === 1;) {
            var n = l;
            if (e.nodeName.toLowerCase() !== t.toLowerCase()) {
                if (!a && (e.nodeName !== "INPUT" || e.type !== "hidden")) break
            } else if (a) {
                if (!e[Ba]) switch (t) {
                    case "meta":
                        if (!e.hasAttribute("itemprop")) break;
                        return e;
                    case "link":
                        if (c = e.getAttribute("rel"), c === "stylesheet" && e.hasAttribute("data-precedence")) break;
                        if (c !== n.rel || e.getAttribute("href") !== (n.href == null || n.href === "" ? null : n.href) || e.getAttribute("crossorigin") !== (n.crossOrigin == null ? null : n.crossOrigin) || e.getAttribute("title") !== (n.title == null ? null : n.title)) break;
                        return e;
                    case "style":
                        if (e.hasAttribute("data-precedence")) break;
                        return e;
                    case "script":
                        if (c = e.getAttribute("src"), (c !== (n.src == null ? null : n.src) || e.getAttribute("type") !== (n.type == null ? null : n.type) || e.getAttribute("crossorigin") !== (n.crossOrigin == null ? null : n.crossOrigin)) && c && e.hasAttribute("async") && !e.hasAttribute("itemprop")) break;
                        return e;
                    default:
                        return e
                }
            } else if (t === "input" && e.type === "hidden") {
                var c = n.name == null ? null : "" + n.name;
                if (n.type === "hidden" && e.getAttribute("name") === c) return e
            } else return e;
            if (e = Ct(e.nextSibling), e === null) break
        }
        return null
    }

    function vm(e, t, l) {
        if (t === "") return null;
        for (; e.nodeType !== 3;)
            if ((e.nodeType !== 1 || e.nodeName !== "INPUT" || e.type !== "hidden") && !l || (e = Ct(e.nextSibling), e === null)) return null;
        return e
    }

    function rr(e) {
        return e.data === "$!" || e.data === "$?" && e.ownerDocument.readyState === "complete"
    }

    function gm(e, t) {
        var l = e.ownerDocument;
        if (e.data !== "$?" || l.readyState === "complete") t();
        else {
            var a = function () {
                t(), l.removeEventListener("DOMContentLoaded", a)
            };
            l.addEventListener("DOMContentLoaded", a), e._reactRetry = a
        }
    }

    function Ct(e) {
        for (; e != null; e = e.nextSibling) {
            var t = e.nodeType;
            if (t === 1 || t === 3) break;
            if (t === 8) {
                if (t = e.data, t === "$" || t === "$!" || t === "$?" || t === "F!" || t === "F") break;
                if (t === "/$") return null
            }
        }
        return e
    }
    var cr = null;

    function fd(e) {
        e = e.previousSibling;
        for (var t = 0; e;) {
            if (e.nodeType === 8) {
                var l = e.data;
                if (l === "$" || l === "$!" || l === "$?") {
                    if (t === 0) return e;
                    t--
                } else l === "/$" && t++
            }
            e = e.previousSibling
        }
        return null
    }

    function od(e, t, l) {
        switch (t = qi(l), e) {
            case "html":
                if (e = t.documentElement, !e) throw Error(u(452));
                return e;
            case "head":
                if (e = t.head, !e) throw Error(u(453));
                return e;
            case "body":
                if (e = t.body, !e) throw Error(u(454));
                return e;
            default:
                throw Error(u(451))
        }
    }

    function wn(e) {
        for (var t = e.attributes; t.length;) e.removeAttributeNode(t[0]);
        ds(e)
    }
    var xt = new Map,
        dd = new Set;

    function Yi(e) {
        return typeof e.getRootNode == "function" ? e.getRootNode() : e.nodeType === 9 ? e : e.ownerDocument
    }
    var Wt = Z.d;
    Z.d = {
        f: ym,
        r: Em,
        D: Sm,
        C: bm,
        L: _m,
        m: Tm,
        X: xm,
        S: Om,
        M: wm
    };

    function ym() {
        var e = Wt.f(),
            t = Ri();
        return e || t
    }

    function Em(e) {
        var t = kl(e);
        t !== null && t.tag === 5 && t.type === "form" ? Df(t) : Wt.r(e)
    }
    var Da = typeof document > "u" ? null : document;

    function pd(e, t, l) {
        var a = Da;
        if (a && typeof t == "string" && t) {
            var n = yt(t);
            n = 'link[rel="' + e + '"][href="' + n + '"]', typeof l == "string" && (n += '[crossorigin="' + l + '"]'), dd.has(n) || (dd.add(n), e = {
                rel: e,
                crossOrigin: l,
                href: t
            }, a.querySelector(n) === null && (t = a.createElement("link"), Pe(t, "link", e), Ie(t), a.head.appendChild(t)))
        }
    }

    function Sm(e) {
        Wt.D(e), pd("dns-prefetch", e, null)
    }

    function bm(e, t) {
        Wt.C(e, t), pd("preconnect", e, t)
    }

    function _m(e, t, l) {
        Wt.L(e, t, l);
        var a = Da;
        if (a && e && t) {
            var n = 'link[rel="preload"][as="' + yt(t) + '"]';
            t === "image" && l && l.imageSrcSet ? (n += '[imagesrcset="' + yt(l.imageSrcSet) + '"]', typeof l.imageSizes == "string" && (n += '[imagesizes="' + yt(l.imageSizes) + '"]')) : n += '[href="' + yt(e) + '"]';
            var c = n;
            switch (t) {
                case "style":
                    c = za(e);
                    break;
                case "script":
                    c = Ra(e)
            }
            xt.has(c) || (e = y({
                rel: "preload",
                href: t === "image" && l && l.imageSrcSet ? void 0 : e,
                as: t
            }, l), xt.set(c, e), a.querySelector(n) !== null || t === "style" && a.querySelector(An(c)) || t === "script" && a.querySelector(Cn(c)) || (t = a.createElement("link"), Pe(t, "link", e), Ie(t), a.head.appendChild(t)))
        }
    }

    function Tm(e, t) {
        Wt.m(e, t);
        var l = Da;
        if (l && e) {
            var a = t && typeof t.as == "string" ? t.as : "script",
                n = 'link[rel="modulepreload"][as="' + yt(a) + '"][href="' + yt(e) + '"]',
                c = n;
            switch (a) {
                case "audioworklet":
                case "paintworklet":
                case "serviceworker":
                case "sharedworker":
                case "worker":
                case "script":
                    c = Ra(e)
            }
            if (!xt.has(c) && (e = y({
                rel: "modulepreload",
                href: e
            }, t), xt.set(c, e), l.querySelector(n) === null)) {
                switch (a) {
                    case "audioworklet":
                    case "paintworklet":
                    case "serviceworker":
                    case "sharedworker":
                    case "worker":
                    case "script":
                        if (l.querySelector(Cn(c))) return
                }
                a = l.createElement("link"), Pe(a, "link", e), Ie(a), l.head.appendChild(a)
            }
        }
    }

    function Om(e, t, l) {
        Wt.S(e, t, l);
        var a = Da;
        if (a && e) {
            var n = $l(a).hoistableStyles,
                c = za(e);
            t = t || "default";
            var d = n.get(c);
            if (!d) {
                var g = {
                    loading: 0,
                    preload: null
                };
                if (d = a.querySelector(An(c))) g.loading = 5;
                else {
                    e = y({
                        rel: "stylesheet",
                        href: e,
                        "data-precedence": t
                    }, l), (l = xt.get(c)) && fr(e, l);
                    var b = d = a.createElement("link");
                    Ie(b), Pe(b, "link", e), b._p = new Promise(function (D, B) {
                        b.onload = D, b.onerror = B
                    }), b.addEventListener("load", function () {
                        g.loading |= 1
                    }), b.addEventListener("error", function () {
                        g.loading |= 2
                    }), g.loading |= 4, Ii(d, t, a)
                }
                d = {
                    type: "stylesheet",
                    instance: d,
                    count: 1,
                    state: g
                }, n.set(c, d)
            }
        }
    }

    function xm(e, t) {
        Wt.X(e, t);
        var l = Da;
        if (l && e) {
            var a = $l(l).hoistableScripts,
                n = Ra(e),
                c = a.get(n);
            c || (c = l.querySelector(Cn(n)), c || (e = y({
                src: e,
                async: !0
            }, t), (t = xt.get(n)) && or(e, t), c = l.createElement("script"), Ie(c), Pe(c, "link", e), l.head.appendChild(c)), c = {
                type: "script",
                instance: c,
                count: 1,
                state: null
            }, a.set(n, c))
        }
    }

    function wm(e, t) {
        Wt.M(e, t);
        var l = Da;
        if (l && e) {
            var a = $l(l).hoistableScripts,
                n = Ra(e),
                c = a.get(n);
            c || (c = l.querySelector(Cn(n)), c || (e = y({
                src: e,
                async: !0,
                type: "module"
            }, t), (t = xt.get(n)) && or(e, t), c = l.createElement("script"), Ie(c), Pe(c, "link", e), l.head.appendChild(c)), c = {
                type: "script",
                instance: c,
                count: 1,
                state: null
            }, a.set(n, c))
        }
    }

    function hd(e, t, l, a) {
        var n = (n = ie.current) ? Yi(n) : null;
        if (!n) throw Error(u(446));
        switch (e) {
            case "meta":
            case "title":
                return null;
            case "style":
                return typeof l.precedence == "string" && typeof l.href == "string" ? (t = za(l.href), l = $l(n).hoistableStyles, a = l.get(t), a || (a = {
                    type: "style",
                    instance: null,
                    count: 0,
                    state: null
                }, l.set(t, a)), a) : {
                    type: "void",
                    instance: null,
                    count: 0,
                    state: null
                };
            case "link":
                if (l.rel === "stylesheet" && typeof l.href == "string" && typeof l.precedence == "string") {
                    e = za(l.href);
                    var c = $l(n).hoistableStyles,
                        d = c.get(e);
                    if (d || (n = n.ownerDocument || n, d = {
                        type: "stylesheet",
                        instance: null,
                        count: 0,
                        state: {
                            loading: 0,
                            preload: null
                        }
                    }, c.set(e, d), (c = n.querySelector(An(e))) && !c._p && (d.instance = c, d.state.loading = 5), xt.has(e) || (l = {
                        rel: "preload",
                        as: "style",
                        href: l.href,
                        crossOrigin: l.crossOrigin,
                        integrity: l.integrity,
                        media: l.media,
                        hrefLang: l.hrefLang,
                        referrerPolicy: l.referrerPolicy
                    }, xt.set(e, l), c || Am(n, e, l, d.state))), t && a === null) throw Error(u(528, ""));
                    return d
                }
                if (t && a !== null) throw Error(u(529, ""));
                return null;
            case "script":
                return t = l.async, l = l.src, typeof l == "string" && t && typeof t != "function" && typeof t != "symbol" ? (t = Ra(l), l = $l(n).hoistableScripts, a = l.get(t), a || (a = {
                    type: "script",
                    instance: null,
                    count: 0,
                    state: null
                }, l.set(t, a)), a) : {
                    type: "void",
                    instance: null,
                    count: 0,
                    state: null
                };
            default:
                throw Error(u(444, e))
        }
    }

    function za(e) {
        return 'href="' + yt(e) + '"'
    }

    function An(e) {
        return 'link[rel="stylesheet"][' + e + "]"
    }

    function md(e) {
        return y({}, e, {
            "data-precedence": e.precedence,
            precedence: null
        })
    }

    function Am(e, t, l, a) {
        e.querySelector('link[rel="preload"][as="style"][' + t + "]") ? a.loading = 1 : (t = e.createElement("link"), a.preload = t, t.addEventListener("load", function () {
            return a.loading |= 1
        }), t.addEventListener("error", function () {
            return a.loading |= 2
        }), Pe(t, "link", l), Ie(t), e.head.appendChild(t))
    }

    function Ra(e) {
        return '[src="' + yt(e) + '"]'
    }

    function Cn(e) {
        return "script[async]" + e
    }

    function vd(e, t, l) {
        if (t.count++, t.instance === null) switch (t.type) {
            case "style":
                var a = e.querySelector('style[data-href~="' + yt(l.href) + '"]');
                if (a) return t.instance = a, Ie(a), a;
                var n = y({}, l, {
                    "data-href": l.href,
                    "data-precedence": l.precedence,
                    href: null,
                    precedence: null
                });
                return a = (e.ownerDocument || e).createElement("style"), Ie(a), Pe(a, "style", n), Ii(a, l.precedence, e), t.instance = a;
            case "stylesheet":
                n = za(l.href);
                var c = e.querySelector(An(n));
                if (c) return t.state.loading |= 4, t.instance = c, Ie(c), c;
                a = md(l), (n = xt.get(n)) && fr(a, n), c = (e.ownerDocument || e).createElement("link"), Ie(c);
                var d = c;
                return d._p = new Promise(function (g, b) {
                    d.onload = g, d.onerror = b
                }), Pe(c, "link", a), t.state.loading |= 4, Ii(c, l.precedence, e), t.instance = c;
            case "script":
                return c = Ra(l.src), (n = e.querySelector(Cn(c))) ? (t.instance = n, Ie(n), n) : (a = l, (n = xt.get(c)) && (a = y({}, l), or(a, n)), e = e.ownerDocument || e, n = e.createElement("script"), Ie(n), Pe(n, "link", a), e.head.appendChild(n), t.instance = n);
            case "void":
                return null;
            default:
                throw Error(u(443, t.type))
        } else t.type === "stylesheet" && (t.state.loading & 4) === 0 && (a = t.instance, t.state.loading |= 4, Ii(a, l.precedence, e));
        return t.instance
    }

    function Ii(e, t, l) {
        for (var a = l.querySelectorAll('link[rel="stylesheet"][data-precedence],style[data-precedence]'), n = a.length ? a[a.length - 1] : null, c = n, d = 0; d < a.length; d++) {
            var g = a[d];
            if (g.dataset.precedence === t) c = g;
            else if (c !== n) break
        }
        c ? c.parentNode.insertBefore(e, c.nextSibling) : (t = l.nodeType === 9 ? l.head : l, t.insertBefore(e, t.firstChild))
    }

    function fr(e, t) {
        e.crossOrigin == null && (e.crossOrigin = t.crossOrigin), e.referrerPolicy == null && (e.referrerPolicy = t.referrerPolicy), e.title == null && (e.title = t.title)
    }

    function or(e, t) {
        e.crossOrigin == null && (e.crossOrigin = t.crossOrigin), e.referrerPolicy == null && (e.referrerPolicy = t.referrerPolicy), e.integrity == null && (e.integrity = t.integrity)
    }
    var Xi = null;

    function gd(e, t, l) {
        if (Xi === null) {
            var a = new Map,
                n = Xi = new Map;
            n.set(l, a)
        } else n = Xi, a = n.get(l), a || (a = new Map, n.set(l, a));
        if (a.has(e)) return a;
        for (a.set(e, null), l = l.getElementsByTagName(e), n = 0; n < l.length; n++) {
            var c = l[n];
            if (!(c[Ba] || c[Je] || e === "link" && c.getAttribute("rel") === "stylesheet") && c.namespaceURI !== "http://www.w3.org/2000/svg") {
                var d = c.getAttribute(t) || "";
                d = e + d;
                var g = a.get(d);
                g ? g.push(c) : a.set(d, [c])
            }
        }
        return a
    }

    function yd(e, t, l) {
        e = e.ownerDocument || e, e.head.insertBefore(l, t === "title" ? e.querySelector("head > title") : null)
    }

    function Cm(e, t, l) {
        if (l === 1 || t.itemProp != null) return !1;
        switch (e) {
            case "meta":
            case "title":
                return !0;
            case "style":
                if (typeof t.precedence != "string" || typeof t.href != "string" || t.href === "") break;
                return !0;
            case "link":
                if (typeof t.rel != "string" || typeof t.href != "string" || t.href === "" || t.onLoad || t.onError) break;
                switch (t.rel) {
                    case "stylesheet":
                        return e = t.disabled, typeof t.precedence == "string" && e == null;
                    default:
                        return !0
                }
            case "script":
                if (t.async && typeof t.async != "function" && typeof t.async != "symbol" && !t.onLoad && !t.onError && t.src && typeof t.src == "string") return !0
        }
        return !1
    }

    function Ed(e) {
        return !(e.type === "stylesheet" && (e.state.loading & 3) === 0)
    }
    var Nn = null;

    function Nm() { }

    function Mm(e, t, l) {
        if (Nn === null) throw Error(u(475));
        var a = Nn;
        if (t.type === "stylesheet" && (typeof l.media != "string" || matchMedia(l.media).matches !== !1) && (t.state.loading & 4) === 0) {
            if (t.instance === null) {
                var n = za(l.href),
                    c = e.querySelector(An(n));
                if (c) {
                    e = c._p, e !== null && typeof e == "object" && typeof e.then == "function" && (a.count++, a = Qi.bind(a), e.then(a, a)), t.state.loading |= 4, t.instance = c, Ie(c);
                    return
                }
                c = e.ownerDocument || e, l = md(l), (n = xt.get(n)) && fr(l, n), c = c.createElement("link"), Ie(c);
                var d = c;
                d._p = new Promise(function (g, b) {
                    d.onload = g, d.onerror = b
                }), Pe(c, "link", l), t.instance = c
            }
            a.stylesheets === null && (a.stylesheets = new Map), a.stylesheets.set(t, e), (e = t.state.preload) && (t.state.loading & 3) === 0 && (a.count++, t = Qi.bind(a), e.addEventListener("load", t), e.addEventListener("error", t))
        }
    }

    function Dm() {
        if (Nn === null) throw Error(u(475));
        var e = Nn;
        return e.stylesheets && e.count === 0 && dr(e, e.stylesheets), 0 < e.count ? function (t) {
            var l = setTimeout(function () {
                if (e.stylesheets && dr(e, e.stylesheets), e.unsuspend) {
                    var a = e.unsuspend;
                    e.unsuspend = null, a()
                }
            }, 6e4);
            return e.unsuspend = t,
                function () {
                    e.unsuspend = null, clearTimeout(l)
                }
        } : null
    }

    function Qi() {
        if (this.count--, this.count === 0) {
            if (this.stylesheets) dr(this, this.stylesheets);
            else if (this.unsuspend) {
                var e = this.unsuspend;
                this.unsuspend = null, e()
            }
        }
    }
    var Zi = null;

    function dr(e, t) {
        e.stylesheets = null, e.unsuspend !== null && (e.count++, Zi = new Map, t.forEach(zm, e), Zi = null, Qi.call(e))
    }

    function zm(e, t) {
        if (!(t.state.loading & 4)) {
            var l = Zi.get(e);
            if (l) var a = l.get(null);
            else {
                l = new Map, Zi.set(e, l);
                for (var n = e.querySelectorAll("link[data-precedence],style[data-precedence]"), c = 0; c < n.length; c++) {
                    var d = n[c];
                    (d.nodeName === "LINK" || d.getAttribute("media") !== "not all") && (l.set(d.dataset.precedence, d), a = d)
                }
                a && l.set(null, a)
            }
            n = t.instance, d = n.getAttribute("data-precedence"), c = l.get(d) || a, c === a && l.set(null, n), l.set(d, n), this.count++, a = Qi.bind(this), n.addEventListener("load", a), n.addEventListener("error", a), c ? c.parentNode.insertBefore(n, c.nextSibling) : (e = e.nodeType === 9 ? e.head : e, e.insertBefore(n, e.firstChild)), t.state.loading |= 4
        }
    }
    var Mn = {
        $$typeof: Q,
        Provider: null,
        Consumer: null,
        _currentValue: k,
        _currentValue2: k,
        _threadCount: 0
    };

    function Rm(e, t, l, a, n, c, d, g) {
        this.tag = 1, this.containerInfo = e, this.pingCache = this.current = this.pendingChildren = null, this.timeoutHandle = -1, this.callbackNode = this.next = this.pendingContext = this.context = this.cancelPendingCommit = null, this.callbackPriority = 0, this.expirationTimes = rs(-1), this.entangledLanes = this.shellSuspendCounter = this.errorRecoveryDisabledLanes = this.expiredLanes = this.warmLanes = this.pingedLanes = this.suspendedLanes = this.pendingLanes = 0, this.entanglements = rs(0), this.hiddenUpdates = rs(null), this.identifierPrefix = a, this.onUncaughtError = n, this.onCaughtError = c, this.onRecoverableError = d, this.pooledCache = null, this.pooledCacheLanes = 0, this.formState = g, this.incompleteTransitions = new Map
    }

    function Sd(e, t, l, a, n, c, d, g, b, D, B, I) {
        return e = new Rm(e, t, l, d, g, b, D, I), t = 1, c === !0 && (t |= 24), c = ft(3, null, null, t), e.current = c, c.stateNode = e, t = Ks(), t.refCount++, e.pooledCache = t, t.refCount++, c.memoizedState = {
            element: a,
            isDehydrated: l,
            cache: t
        }, ks(c), e
    }

    function bd(e) {
        return e ? (e = fa, e) : fa
    }

    function _d(e, t, l, a, n, c) {
        n = bd(n), a.context === null ? a.context = n : a.pendingContext = n, a = ul(t), a.payload = {
            element: l
        }, c = c === void 0 ? null : c, c !== null && (a.callback = c), l = rl(e, a, t), l !== null && (mt(l, e, t), sn(l, e, t))
    }

    function Td(e, t) {
        if (e = e.memoizedState, e !== null && e.dehydrated !== null) {
            var l = e.retryLane;
            e.retryLane = l !== 0 && l < t ? l : t
        }
    }

    function pr(e, t) {
        Td(e, t), (e = e.alternate) && Td(e, t)
    }

    function Od(e) {
        if (e.tag === 13) {
            var t = ca(e, 67108864);
            t !== null && mt(t, e, 67108864), pr(e, 67108864)
        }
    }
    var Ki = !0;

    function Um(e, t, l, a) {
        var n = C.T;
        C.T = null;
        var c = Z.p;
        try {
            Z.p = 2, hr(e, t, l, a)
        } finally {
            Z.p = c, C.T = n
        }
    }

    function Lm(e, t, l, a) {
        var n = C.T;
        C.T = null;
        var c = Z.p;
        try {
            Z.p = 8, hr(e, t, l, a)
        } finally {
            Z.p = c, C.T = n
        }
    }

    function hr(e, t, l, a) {
        if (Ki) {
            var n = mr(a);
            if (n === null) tr(e, t, a, Fi, l), wd(e, a);
            else if (Vm(n, e, t, l, a)) a.stopPropagation();
            else if (wd(e, a), t & 4 && -1 < Hm.indexOf(e)) {
                for (; n !== null;) {
                    var c = kl(n);
                    if (c !== null) switch (c.tag) {
                        case 3:
                            if (c = c.stateNode, c.current.memoizedState.isDehydrated) {
                                var d = Cl(c.pendingLanes);
                                if (d !== 0) {
                                    var g = c;
                                    for (g.pendingLanes |= 2, g.entangledLanes |= 2; d;) {
                                        var b = 1 << 31 - rt(d);
                                        g.entanglements[1] |= b, d &= ~b
                                    }
                                    Lt(c), (Te & 6) === 0 && (Di = Mt() + 500, Tn(0))
                                }
                            }
                            break;
                        case 13:
                            g = ca(c, 2), g !== null && mt(g, c, 2), Ri(), pr(c, 2)
                    }
                    if (c = mr(a), c === null && tr(e, t, a, Fi, l), c === n) break;
                    n = c
                }
                n !== null && a.stopPropagation()
            } else tr(e, t, a, null, l)
        }
    }

    function mr(e) {
        return e = Ss(e), vr(e)
    }
    var Fi = null;

    function vr(e) {
        if (Fi = null, e = Jl(e), e !== null) {
            var t = f(e);
            if (t === null) e = null;
            else {
                var l = t.tag;
                if (l === 13) {
                    if (e = m(t), e !== null) return e;
                    e = null
                } else if (l === 3) {
                    if (t.stateNode.current.memoizedState.isDehydrated) return t.tag === 3 ? t.stateNode.containerInfo : null;
                    e = null
                } else t !== e && (e = null)
            }
        }
        return Fi = e, null
    }

    function xd(e) {
        switch (e) {
            case "beforetoggle":
            case "cancel":
            case "click":
            case "close":
            case "contextmenu":
            case "copy":
            case "cut":
            case "auxclick":
            case "dblclick":
            case "dragend":
            case "dragstart":
            case "drop":
            case "focusin":
            case "focusout":
            case "input":
            case "invalid":
            case "keydown":
            case "keypress":
            case "keyup":
            case "mousedown":
            case "mouseup":
            case "paste":
            case "pause":
            case "play":
            case "pointercancel":
            case "pointerdown":
            case "pointerup":
            case "ratechange":
            case "reset":
            case "resize":
            case "seeked":
            case "submit":
            case "toggle":
            case "touchcancel":
            case "touchend":
            case "touchstart":
            case "volumechange":
            case "change":
            case "selectionchange":
            case "textInput":
            case "compositionstart":
            case "compositionend":
            case "compositionupdate":
            case "beforeblur":
            case "afterblur":
            case "beforeinput":
            case "blur":
            case "fullscreenchange":
            case "focus":
            case "hashchange":
            case "popstate":
            case "select":
            case "selectstart":
                return 2;
            case "drag":
            case "dragenter":
            case "dragexit":
            case "dragleave":
            case "dragover":
            case "mousemove":
            case "mouseout":
            case "mouseover":
            case "pointermove":
            case "pointerout":
            case "pointerover":
            case "scroll":
            case "touchmove":
            case "wheel":
            case "mouseenter":
            case "mouseleave":
            case "pointerenter":
            case "pointerleave":
                return 8;
            case "message":
                switch (bp()) {
                    case Vr:
                        return 2;
                    case jr:
                        return 8;
                    case Bn:
                    case _p:
                        return 32;
                    case Gr:
                        return 268435456;
                    default:
                        return 32
                }
            default:
                return 32
        }
    }
    var gr = !1,
        bl = null,
        _l = null,
        Tl = null,
        Dn = new Map,
        zn = new Map,
        Ol = [],
        Hm = "mousedown mouseup touchcancel touchend touchstart auxclick dblclick pointercancel pointerdown pointerup dragend dragstart drop compositionend compositionstart keydown keypress keyup input textInput copy cut paste click change contextmenu reset".split(" ");

    function wd(e, t) {
        switch (e) {
            case "focusin":
            case "focusout":
                bl = null;
                break;
            case "dragenter":
            case "dragleave":
                _l = null;
                break;
            case "mouseover":
            case "mouseout":
                Tl = null;
                break;
            case "pointerover":
            case "pointerout":
                Dn.delete(t.pointerId);
                break;
            case "gotpointercapture":
            case "lostpointercapture":
                zn.delete(t.pointerId)
        }
    }

    function Rn(e, t, l, a, n, c) {
        return e === null || e.nativeEvent !== c ? (e = {
            blockedOn: t,
            domEventName: l,
            eventSystemFlags: a,
            nativeEvent: c,
            targetContainers: [n]
        }, t !== null && (t = kl(t), t !== null && Od(t)), e) : (e.eventSystemFlags |= a, t = e.targetContainers, n !== null && t.indexOf(n) === -1 && t.push(n), e)
    }

    function Vm(e, t, l, a, n) {
        switch (t) {
            case "focusin":
                return bl = Rn(bl, e, t, l, a, n), !0;
            case "dragenter":
                return _l = Rn(_l, e, t, l, a, n), !0;
            case "mouseover":
                return Tl = Rn(Tl, e, t, l, a, n), !0;
            case "pointerover":
                var c = n.pointerId;
                return Dn.set(c, Rn(Dn.get(c) || null, e, t, l, a, n)), !0;
            case "gotpointercapture":
                return c = n.pointerId, zn.set(c, Rn(zn.get(c) || null, e, t, l, a, n)), !0
        }
        return !1
    }

    function Ad(e) {
        var t = Jl(e.target);
        if (t !== null) {
            var l = f(t);
            if (l !== null) {
                if (t = l.tag, t === 13) {
                    if (t = m(l), t !== null) {
                        e.blockedOn = t, Mp(e.priority, function () {
                            if (l.tag === 13) {
                                var a = ht();
                                a = cs(a);
                                var n = ca(l, a);
                                n !== null && mt(n, l, a), pr(l, a)
                            }
                        });
                        return
                    }
                } else if (t === 3 && l.stateNode.current.memoizedState.isDehydrated) {
                    e.blockedOn = l.tag === 3 ? l.stateNode.containerInfo : null;
                    return
                }
            }
        }
        e.blockedOn = null
    }

    function Pi(e) {
        if (e.blockedOn !== null) return !1;
        for (var t = e.targetContainers; 0 < t.length;) {
            var l = mr(e.nativeEvent);
            if (l === null) {
                l = e.nativeEvent;
                var a = new l.constructor(l.type, l);
                Es = a, l.target.dispatchEvent(a), Es = null
            } else return t = kl(l), t !== null && Od(t), e.blockedOn = l, !1;
            t.shift()
        }
        return !0
    }

    function Cd(e, t, l) {
        Pi(e) && l.delete(t)
    }

    function jm() {
        gr = !1, bl !== null && Pi(bl) && (bl = null), _l !== null && Pi(_l) && (_l = null), Tl !== null && Pi(Tl) && (Tl = null), Dn.forEach(Cd), zn.forEach(Cd)
    }

    function Ji(e, t) {
        e.blockedOn === t && (e.blockedOn = null, gr || (gr = !0, s.unstable_scheduleCallback(s.unstable_NormalPriority, jm)))
    }
    var ki = null;

    function Nd(e) {
        ki !== e && (ki = e, s.unstable_scheduleCallback(s.unstable_NormalPriority, function () {
            ki === e && (ki = null);
            for (var t = 0; t < e.length; t += 3) {
                var l = e[t],
                    a = e[t + 1],
                    n = e[t + 2];
                if (typeof a != "function") {
                    if (vr(a || l) === null) continue;
                    break
                }
                var c = kl(l);
                c !== null && (e.splice(t, 3), t -= 3, vu(c, {
                    pending: !0,
                    data: n,
                    method: l.method,
                    action: a
                }, a, n))
            }
        }))
    }

    function Un(e) {
        function t(b) {
            return Ji(b, e)
        }
        bl !== null && Ji(bl, e), _l !== null && Ji(_l, e), Tl !== null && Ji(Tl, e), Dn.forEach(t), zn.forEach(t);
        for (var l = 0; l < Ol.length; l++) {
            var a = Ol[l];
            a.blockedOn === e && (a.blockedOn = null)
        }
        for (; 0 < Ol.length && (l = Ol[0], l.blockedOn === null);) Ad(l), l.blockedOn === null && Ol.shift();
        if (l = (e.ownerDocument || e).$$reactFormReplay, l != null)
            for (a = 0; a < l.length; a += 3) {
                var n = l[a],
                    c = l[a + 1],
                    d = n[lt] || null;
                if (typeof c == "function") d || Nd(l);
                else if (d) {
                    var g = null;
                    if (c && c.hasAttribute("formAction")) {
                        if (n = c, d = c[lt] || null) g = d.formAction;
                        else if (vr(n) !== null) continue
                    } else g = d.action;
                    typeof g == "function" ? l[a + 1] = g : (l.splice(a, 3), a -= 3), Nd(l)
                }
            }
    }

    function yr(e) {
        this._internalRoot = e
    }
    $i.prototype.render = yr.prototype.render = function (e) {
        var t = this._internalRoot;
        if (t === null) throw Error(u(409));
        var l = t.current,
            a = ht();
        _d(l, a, e, t, null, null)
    }, $i.prototype.unmount = yr.prototype.unmount = function () {
        var e = this._internalRoot;
        if (e !== null) {
            this._internalRoot = null;
            var t = e.containerInfo;
            _d(e.current, 2, null, e, null, null), Ri(), t[Pl] = null
        }
    };

    function $i(e) {
        this._internalRoot = e
    }
    $i.prototype.unstable_scheduleHydration = function (e) {
        if (e) {
            var t = Xr();
            e = {
                blockedOn: null,
                target: e,
                priority: t
            };
            for (var l = 0; l < Ol.length && t !== 0 && t < Ol[l].priority; l++);
            Ol.splice(l, 0, e), l === 0 && Ad(e)
        }
    };
    var Md = i.version;
    if (Md !== "19.1.1") throw Error(u(527, Md, "19.1.1"));
    Z.findDOMNode = function (e) {
        var t = e._reactInternals;
        if (t === void 0) throw typeof e.render == "function" ? Error(u(188)) : (e = Object.keys(e).join(","), Error(u(268, e)));
        return e = v(t), e = e !== null ? p(e) : null, e = e === null ? null : e.stateNode, e
    };
    var Gm = {
        bundleType: 0,
        version: "19.1.1",
        rendererPackageName: "react-dom",
        currentDispatcherRef: C,
        reconcilerVersion: "19.1.1"
    };
    if (typeof __REACT_DEVTOOLS_GLOBAL_HOOK__ < "u") {
        var Wi = __REACT_DEVTOOLS_GLOBAL_HOOK__;
        if (!Wi.isDisabled && Wi.supportsFiber) try {
            Va = Wi.inject(Gm), ut = Wi
        } catch { }
    }
    return Hn.createRoot = function (e, t) {
        if (!o(e)) throw Error(u(299));
        var l = !1,
            a = "",
            n = Qf,
            c = Zf,
            d = Kf,
            g = null;
        return t != null && (t.unstable_strictMode === !0 && (l = !0), t.identifierPrefix !== void 0 && (a = t.identifierPrefix), t.onUncaughtError !== void 0 && (n = t.onUncaughtError), t.onCaughtError !== void 0 && (c = t.onCaughtError), t.onRecoverableError !== void 0 && (d = t.onRecoverableError), t.unstable_transitionCallbacks !== void 0 && (g = t.unstable_transitionCallbacks)), t = Sd(e, 1, !1, null, null, l, a, n, c, d, g, null), e[Pl] = t.current, er(e), new yr(t)
    }, Hn.hydrateRoot = function (e, t, l) {
        if (!o(e)) throw Error(u(299));
        var a = !1,
            n = "",
            c = Qf,
            d = Zf,
            g = Kf,
            b = null,
            D = null;
        return l != null && (l.unstable_strictMode === !0 && (a = !0), l.identifierPrefix !== void 0 && (n = l.identifierPrefix), l.onUncaughtError !== void 0 && (c = l.onUncaughtError), l.onCaughtError !== void 0 && (d = l.onCaughtError), l.onRecoverableError !== void 0 && (g = l.onRecoverableError), l.unstable_transitionCallbacks !== void 0 && (b = l.unstable_transitionCallbacks), l.formState !== void 0 && (D = l.formState)), t = Sd(e, 1, !0, t, l ?? null, a, n, c, d, g, b, D), t.context = bd(null), l = t.current, a = ht(), a = cs(a), n = ul(a), n.callback = null, rl(l, n, a), l = a, t.current.lanes = l, Ga(t, l), Lt(t), e[Pl] = t.current, er(e), new $i(t)
    }, Hn.version = "19.1.1", Hn
}
var Bd;

function Pm() {
    if (Bd) return br.exports;
    Bd = 1;

    function s() {
        if (!(typeof __REACT_DEVTOOLS_GLOBAL_HOOK__ > "u" || typeof __REACT_DEVTOOLS_GLOBAL_HOOK__.checkDCE != "function")) try {
            __REACT_DEVTOOLS_GLOBAL_HOOK__.checkDCE(s)
        } catch (i) {
            console.error(i)
        }
    }
    return s(), br.exports = Fm(), br.exports
}
var Jm = Pm();

function km({
    confData: s,
    setSelectMachine: i,
    setActiveTab: r,
    setSelectModel: u,
    selectModel: o,
    setSelectOption: f,
    setSelectColor: m,
    setSelectPacket: h
}) {
    const v = p => {
        const y = p;
        i(s.find(S => S.ID == y)), o?.options?.forEach(S => {
            S.disabled = !1, S.hidden = 0
        });
        let E = s.find(S => S.ID == y).models[0];
        u(E), h(null), m(E.colors.find(S => S.UF_VEHICLE_COLOR_DEFAULT == 1)), f([])
    };
    return x.jsxs(x.Fragment, {
        children: [x.jsx("h2", {
            className: "section-title margin_b_m",
            children: "Выберите модель"
        }), x.jsx("div", {
            className: "conf-models margin_b_m",
            children: x.jsx("ul", {
                className: "conf-models__list",
                children: s.map(p => x.jsx("li", {
                    className: "conf-models__item",
                    children: x.jsxs("label", {
                        className: "model-card conf-models__radio",
                        children: [x.jsx("input", {
                            className: "radio__input",
                            type: "radio",
                            name: "selectModel",
                            onChange: () => {
                                v(p.ID)
                            }
                        }), x.jsxs("span", {
                            className: "radiobox__container",
                            children: [x.jsx("span", {
                                className: "radiobox"
                            }), x.jsx("span", {
                                className: "radiobox__text",
                                children: "Выбрать"
                            })]
                        }), x.jsx("img", {
                            className: "model-card__img",
                            src: p.PREVIEW_PICTURE,
                            alt: p.NAME
                        }), x.jsx("span", {
                            className: "model-card__name",
                            children: p.NAME
                        }), x.jsxs("span", {
                            className: "model-card__price",
                            children: [x.jsx("span", {
                                className: "model-card__price-tagline",
                                children: "Цена от"
                            }), " ", p.PROPERTY_C_PRICE_VALUE, " руб."]
                        })]
                    })
                }, p.ID))
            })
        }), x.jsx("button", {
            className: "btn btn--green--fill w--100",
            onClick: () => {
                o && r("second")
            },
            children: "Продолжить"
        })]
    })
}

function $m({
    activeTab: s,
    setActiveTab: i,
    selectMachine: r,
    selectModel: u
}) {
    return x.jsx("nav", {
        className: "conf-nav margin_b_l",
        children: x.jsxs("ul", {
            className: "conf-nav__list",
            children: [x.jsx("li", {
                className: s === "first" ? "conf-nav__item conf-nav__item_status_active" : "conf-nav__item ",
                onClick: () => i("first"),
                children: x.jsxs("a", {
                    className: "conf-nav__link",
                    href: "#",
                    children: [x.jsx("span", {
                        className: "conf-nav__step",
                        children: "1"
                    }), " ", x.jsx("span", {
                        className: "conf-nav__text",
                        children: "Выбор модели"
                    })]
                })
            }), x.jsx("li", {
                className: s === "second" ? "conf-nav__item conf-nav__item_status_active" : "conf-nav__item ",
                onClick: () => r && i("second"),
                children: x.jsxs("a", {
                    className: "conf-nav__link",
                    href: "#",
                    children: [x.jsx("span", {
                        className: "conf-nav__step",
                        children: "2"
                    }), " ", x.jsx("span", {
                        className: "conf-nav__text",
                        children: "Выбор комплектации"
                    })]
                })
            }), x.jsx("li", {
                className: s === "third" ? "conf-nav__item conf-nav__item_status_active" : "conf-nav__item ",
                onClick: () => r && u && i("third"),
                children: x.jsxs("a", {
                    className: "conf-nav__link",
                    href: "#",
                    children: [x.jsx("span", {
                        className: "conf-nav__step",
                        children: "3"
                    }), " ", x.jsx("span", {
                        className: "conf-nav__text",
                        children: "Выбор оборудования"
                    })]
                })
            }), x.jsx("li", {
                className: s === "fourth" ? "conf-nav__item conf-nav__item_status_active" : "conf-nav__item ",
                onClick: () => r && u && i("fourth"),
                children: x.jsxs("a", {
                    className: "conf-nav__link",
                    href: "#",
                    children: [x.jsx("span", {
                        className: "conf-nav__step",
                        children: "4"
                    }), " ", x.jsx("span", {
                        className: "conf-nav__text",
                        children: "Условия приобретения"
                    })]
                })
            })]
        })
    })
}

function tp({
    selectModel: s
}) {
    return x.jsx("tbody", {
        children: s.UF_VEHICLE_MODEL_CHAR_NAME.map((i, r) => x.jsxs("tr", {
            className: "table__row",
            children: [x.jsx("td", {
                className: "table__name",
                children: i
            }), x.jsx("td", {
                className: "table__text",
                children: s.UF_VEHICLE_MODEL_CHAR_VALUE[r]
            })]
        }, r))
    })
}
function Wm({
    selectMachine: s,
    selectModel: i,
    setSelectModel: r,
    setActiveTab: u,
    setSelectColor: o,
    setSelectOption: f,
    setSelectPacket: m,
    urlGetMachineState: h
}) {
    const v = p => {
        const y = p.target.value;

        i?.options?.forEach(E => {
            E.disabled = !1;
            E.hidden = 0;
        });

        const model = s.models.find(E => E.ID == y);

        r(model);
        m(null);
        o(model.colors.find(E => E.UF_VEHICLE_COLOR_DEFAULT == 1));
        f([]);
    };

    fe.useEffect(() => {
        if (i?.colors) {
            o(i.colors.find(p => p.UF_VEHICLE_COLOR_DEFAULT == 1));
        }
    }, [s]);

    return i && x.jsxs(x.Fragment, {
        children: [

            // Заголовок показываем ТОЛЬКО если есть выбор
            s.models.length > 1 && x.jsx("h2", {
                className: "section-title margin_b_m",
                children: "Выберите модификацию"
            }),

            x.jsxs("div", {
                className: "conf-modification margin_b_m",
                children: [

                    x.jsxs("div", {
                        className: "conf-modification__visual",
                        children: [

                            x.jsx("div", {
                                className: "conf-modification__choice",
                                children: s.models.length > 1
                                    ? x.jsxs("label", {
                                        className: "conf-modification__choice-item",
                                        children: [
                                            x.jsx("span", {
                                                className: "section-subtitle margin_b_s",
                                                children: "Модификация и двигатель"
                                            }),
                                            x.jsx("select", {
                                                className: "select",
                                                value: i.ID,
                                                name: "modification",
                                                onChange: v,
                                                children: s.models.map(p =>
                                                    x.jsx("option", {
                                                        value: p.ID,
                                                        children: p.UF_VEHICLE_MODEL_NAME
                                                    }, p.ID)
                                                )
                                            })
                                        ]
                                    })
                                    : x.jsx("h2", {
                                        className: "section-subtitle margin_b_s",
                                        children: s.models[0]?.UF_VEHICLE_MODEL_NAME
                                    })
                            }),

                            // ⚠️ КАРТИНКА ВСЕГДА ОСТАЁТСЯ
                            x.jsxs("div", {
                                className: "conf-modification__layers conf-layers",
                                children: [
                                    x.jsx("img", {
                                        className: "conf-layers__img-bg",
                                        src: s.PROPERTY_IMG_BG
                                    }),
                                    x.jsx("img", {
                                        className: "conf-layers__img conf-layers__img--base",
                                        src: i.UF_VEHICLE_MODEL_PREVIEW_IMAGE,
                                        alt: i.UF_VEHICLE_MODEL_NAME
                                    })
                                ]
                            })
                        ]
                    }),

                    // Характеристики — без изменений
                    x.jsxs("div", {
                        className: "conf-modification__chars",
                        children: [
                            x.jsx("span", {
                                className: "section-subtitle margin_b_s",
                                children: "Характеристики"
                            }),
                            x.jsx("table", {
                                className: "table margin_b_s",
                                children: x.jsx(tp, {
                                    selectModel: i
                                })
                            }),
                            x.jsxs("span", {
                                className: "important",
                                children: ["* - необходимы дополнительные опции"]
                            }),
                            x.jsxs("span", {
                                className: "important",
                                children: ["** - при наличии дополнительных опций"]
                            }),
                            x.jsxs("p", {
                                className: "section-subtitle conf-total",
                                children: [
                                    "Базовая цена модели: ",
                                    parseFloat(i.UF_VEHICLE_MODEL_BASEPRICE)
                                        .toLocaleString("ru-RU"),
                                    " руб."
                                ]
                            })
                        ]
                    })
                ]
            }),

            // Кнопки
            x.jsxs("div", {
                className: "btn__group",
                children: [
                    x.jsx("button", {
                        style: { visibility: h ? "hidden" : "visible" },
                        className: "btn btn--green--fill",
                        onClick: () => u("first"),
                        children: "Назад"
                    }),
                    x.jsx("button", {
                        className: "btn btn--green--fill",
                        onClick: () => u("third"),
                        children: "Продолжить"
                    })
                ]
            })
        ]
    });
}


function ev() {
    return new Promise((s, i) => {
        fetch("https://tinger.ru/local/api/vehicles/").then(r => {
            if (!r.ok) throw new Error(`HTTP error! status: ${r.status}`);
            return r.json()
        }).then(r => {
            s(r)
        }).catch(r => {
            console.error("Failed to fetch data:", r), i(r)
        })
    })
}

function qd(s) {
    return s !== null && typeof s == "object" && "constructor" in s && s.constructor === Object
}

function Lr(s, i) {
    s === void 0 && (s = {}), i === void 0 && (i = {});
    const r = ["__proto__", "constructor", "prototype"];
    Object.keys(i).filter(u => r.indexOf(u) < 0).forEach(u => {
        typeof s[u] > "u" ? s[u] = i[u] : qd(i[u]) && qd(s[u]) && Object.keys(i[u]).length > 0 && Lr(s[u], i[u])
    })
}
const lp = {
    body: {},
    addEventListener() { },
    removeEventListener() { },
    activeElement: {
        blur() { },
        nodeName: ""
    },
    querySelector() {
        return null
    },
    querySelectorAll() {
        return []
    },
    getElementById() {
        return null
    },
    createEvent() {
        return {
            initEvent() { }
        }
    },
    createElement() {
        return {
            children: [],
            childNodes: [],
            style: {},
            setAttribute() { },
            getElementsByTagName() {
                return []
            }
        }
    },
    createElementNS() {
        return {}
    },
    importNode() {
        return null
    },
    location: {
        hash: "",
        host: "",
        hostname: "",
        href: "",
        origin: "",
        pathname: "",
        protocol: "",
        search: ""
    }
};

function Kl() {
    const s = typeof document < "u" ? document : {};
    return Lr(s, lp), s
}
const tv = {
    document: lp,
    navigator: {
        userAgent: ""
    },
    location: {
        hash: "",
        host: "",
        hostname: "",
        href: "",
        origin: "",
        pathname: "",
        protocol: "",
        search: ""
    },
    history: {
        replaceState() { },
        pushState() { },
        go() { },
        back() { }
    },
    CustomEvent: function () {
        return this
    },
    addEventListener() { },
    removeEventListener() { },
    getComputedStyle() {
        return {
            getPropertyValue() {
                return ""
            }
        }
    },
    Image() { },
    Date() { },
    screen: {},
    setTimeout() { },
    clearTimeout() { },
    matchMedia() {
        return {}
    },
    requestAnimationFrame(s) {
        return typeof setTimeout > "u" ? (s(), null) : setTimeout(s, 0)
    },
    cancelAnimationFrame(s) {
        typeof setTimeout > "u" || clearTimeout(s)
    }
};

function et() {
    const s = typeof window < "u" ? window : {};
    return Lr(s, tv), s
}

function lv(s) {
    return s === void 0 && (s = ""), s.trim().split(" ").filter(i => !!i.trim())
}

function av(s) {
    const i = s;
    Object.keys(i).forEach(r => {
        try {
            i[r] = null
        } catch { }
        try {
            delete i[r]
        } catch { }
    })
}

function ap(s, i) {
    return i === void 0 && (i = 0), setTimeout(s, i)
}

function as() {
    return Date.now()
}

function nv(s) {
    const i = et();
    let r;
    return i.getComputedStyle && (r = i.getComputedStyle(s, null)), !r && s.currentStyle && (r = s.currentStyle), r || (r = s.style), r
}

function iv(s, i) {
    i === void 0 && (i = "x");
    const r = et();
    let u, o, f;
    const m = nv(s);
    return r.WebKitCSSMatrix ? (o = m.transform || m.webkitTransform, o.split(",").length > 6 && (o = o.split(", ").map(h => h.replace(",", ".")).join(", ")), f = new r.WebKitCSSMatrix(o === "none" ? "" : o)) : (f = m.MozTransform || m.OTransform || m.MsTransform || m.msTransform || m.transform || m.getPropertyValue("transform").replace("translate(", "matrix(1, 0, 0, 1,"), u = f.toString().split(",")), i === "x" && (r.WebKitCSSMatrix ? o = f.m41 : u.length === 16 ? o = parseFloat(u[12]) : o = parseFloat(u[4])), i === "y" && (r.WebKitCSSMatrix ? o = f.m42 : u.length === 16 ? o = parseFloat(u[13]) : o = parseFloat(u[5])), o || 0
}

function es(s) {
    return typeof s == "object" && s !== null && s.constructor && Object.prototype.toString.call(s).slice(8, -1) === "Object"
}

function sv(s) {
    return typeof window < "u" && typeof window.HTMLElement < "u" ? s instanceof HTMLElement : s && (s.nodeType === 1 || s.nodeType === 11)
}

function vt() {
    const s = Object(arguments.length <= 0 ? void 0 : arguments[0]),
        i = ["__proto__", "constructor", "prototype"];
    for (let r = 1; r < arguments.length; r += 1) {
        const u = r < 0 || arguments.length <= r ? void 0 : arguments[r];
        if (u != null && !sv(u)) {
            const o = Object.keys(Object(u)).filter(f => i.indexOf(f) < 0);
            for (let f = 0, m = o.length; f < m; f += 1) {
                const h = o[f],
                    v = Object.getOwnPropertyDescriptor(u, h);
                v !== void 0 && v.enumerable && (es(s[h]) && es(u[h]) ? u[h].__swiper__ ? s[h] = u[h] : vt(s[h], u[h]) : !es(s[h]) && es(u[h]) ? (s[h] = {}, u[h].__swiper__ ? s[h] = u[h] : vt(s[h], u[h])) : s[h] = u[h])
            }
        }
    }
    return s
}

function ts(s, i, r) {
    s.style.setProperty(i, r)
}

function np(s) {
    let {
        swiper: i,
        targetPosition: r,
        side: u
    } = s;
    const o = et(),
        f = -i.translate;
    let m = null,
        h;
    const v = i.params.speed;
    i.wrapperEl.style.scrollSnapType = "none", o.cancelAnimationFrame(i.cssModeFrameID);
    const p = r > f ? "next" : "prev",
        y = (S, A) => p === "next" && S >= A || p === "prev" && S <= A,
        E = () => {
            h = new Date().getTime(), m === null && (m = h);
            const S = Math.max(Math.min((h - m) / v, 1), 0),
                A = .5 - Math.cos(S * Math.PI) / 2;
            let O = f + A * (r - f);
            if (y(O, r) && (O = r), i.wrapperEl.scrollTo({
                [u]: O
            }), y(O, r)) {
                i.wrapperEl.style.overflow = "hidden", i.wrapperEl.style.scrollSnapType = "", setTimeout(() => {
                    i.wrapperEl.style.overflow = "", i.wrapperEl.scrollTo({
                        [u]: O
                    })
                }), o.cancelAnimationFrame(i.cssModeFrameID);
                return
            }
            i.cssModeFrameID = o.requestAnimationFrame(E)
        };
    E()
}

function ip(s) {
    return s.querySelector(".swiper-slide-transform") || s.shadowRoot && s.shadowRoot.querySelector(".swiper-slide-transform") || s
}

function Ht(s, i) {
    i === void 0 && (i = "");
    const r = et(),
        u = [...s.children];
    return r.HTMLSlotElement && s instanceof HTMLSlotElement && u.push(...s.assignedElements()), i ? u.filter(o => o.matches(i)) : u
}

function uv(s, i) {
    const r = [i];
    for (; r.length > 0;) {
        const u = r.shift();
        if (s === u) return !0;
        r.push(...u.children, ...u.shadowRoot ? u.shadowRoot.children : [], ...u.assignedElements ? u.assignedElements() : [])
    }
}

function rv(s, i) {
    const r = et();
    let u = i.contains(s);
    return !u && r.HTMLSlotElement && i instanceof HTMLSlotElement && (u = [...i.assignedElements()].includes(s), u || (u = uv(s, i))), u
}

function ns(s) {
    try {
        console.warn(s);
        return
    } catch { }
}

function is(s, i) {
    i === void 0 && (i = []);
    const r = document.createElement(s);
    return r.classList.add(...Array.isArray(i) ? i : lv(i)), r
}

function cv(s, i) {
    const r = [];
    for (; s.previousElementSibling;) {
        const u = s.previousElementSibling;
        i ? u.matches(i) && r.push(u) : r.push(u), s = u
    }
    return r
}

function fv(s, i) {
    const r = [];
    for (; s.nextElementSibling;) {
        const u = s.nextElementSibling;
        i ? u.matches(i) && r.push(u) : r.push(u), s = u
    }
    return r
}

function wl(s, i) {
    return et().getComputedStyle(s, null).getPropertyValue(i)
}

function Yd(s) {
    let i = s,
        r;
    if (i) {
        for (r = 0;
            (i = i.previousSibling) !== null;) i.nodeType === 1 && (r += 1);
        return r
    }
}

function ov(s, i) {
    const r = [];
    let u = s.parentElement;
    for (; u;) r.push(u), u = u.parentElement;
    return r
}

function dv(s, i) {
    function r(u) {
        u.target === s && (i.call(s, u), s.removeEventListener("transitionend", r))
    }
    i && s.addEventListener("transitionend", r)
}

function Id(s, i, r) {
    const u = et();
    return s[i === "width" ? "offsetWidth" : "offsetHeight"] + parseFloat(u.getComputedStyle(s, null).getPropertyValue(i === "width" ? "margin-right" : "margin-top")) + parseFloat(u.getComputedStyle(s, null).getPropertyValue(i === "width" ? "margin-left" : "margin-bottom"))
}

function el(s) {
    return (Array.isArray(s) ? s : [s]).filter(i => !!i)
}

function Xd(s, i) {
    i === void 0 && (i = ""), typeof trustedTypes < "u" ? s.innerHTML = trustedTypes.createPolicy("html", {
        createHTML: r => r
    }).createHTML(i) : s.innerHTML = i
}
let xr;

function pv() {
    const s = et(),
        i = Kl();
    return {
        smoothScroll: i.documentElement && i.documentElement.style && "scrollBehavior" in i.documentElement.style,
        touch: !!("ontouchstart" in s || s.DocumentTouch && i instanceof s.DocumentTouch)
    }
}

function sp() {
    return xr || (xr = pv()), xr
}
let wr;

function hv(s) {
    let {
        userAgent: i
    } = s === void 0 ? {} : s;
    const r = sp(),
        u = et(),
        o = u.navigator.platform,
        f = i || u.navigator.userAgent,
        m = {
            ios: !1,
            android: !1
        },
        h = u.screen.width,
        v = u.screen.height,
        p = f.match(/(Android);?[\s\/]+([\d.]+)?/);
    let y = f.match(/(iPad).*OS\s([\d_]+)/);
    const E = f.match(/(iPod)(.*OS\s([\d_]+))?/),
        S = !y && f.match(/(iPhone\sOS|iOS)\s([\d_]+)/),
        A = o === "Win32";
    let O = o === "MacIntel";
    const V = ["1024x1366", "1366x1024", "834x1194", "1194x834", "834x1112", "1112x834", "768x1024", "1024x768", "820x1180", "1180x820", "810x1080", "1080x810"];
    return !y && O && r.touch && V.indexOf(`${h}x${v}`) >= 0 && (y = f.match(/(Version)\/([\d.]+)/), y || (y = [0, 1, "13_0_0"]), O = !1), p && !A && (m.os = "android", m.android = !0), (y || S || E) && (m.os = "ios", m.ios = !0), m
}

function up(s) {
    return s === void 0 && (s = {}), wr || (wr = hv(s)), wr
}
let Ar;

function mv() {
    const s = et(),
        i = up();
    let r = !1;

    function u() {
        const h = s.navigator.userAgent.toLowerCase();
        return h.indexOf("safari") >= 0 && h.indexOf("chrome") < 0 && h.indexOf("android") < 0
    }
    if (u()) {
        const h = String(s.navigator.userAgent);
        if (h.includes("Version/")) {
            const [v, p] = h.split("Version/")[1].split(" ")[0].split(".").map(y => Number(y));
            r = v < 16 || v === 16 && p < 2
        }
    }
    const o = /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(s.navigator.userAgent),
        f = u(),
        m = f || o && i.ios;
    return {
        isSafari: r || f,
        needPerspectiveFix: r,
        need3dFix: m,
        isWebView: o
    }
}

function rp() {
    return Ar || (Ar = mv()), Ar
}

function vv(s) {
    let {
        swiper: i,
        on: r,
        emit: u
    } = s;
    const o = et();
    let f = null,
        m = null;
    const h = () => {
        !i || i.destroyed || !i.initialized || (u("beforeResize"), u("resize"))
    },
        v = () => {
            !i || i.destroyed || !i.initialized || (f = new ResizeObserver(E => {
                m = o.requestAnimationFrame(() => {
                    const {
                        width: S,
                        height: A
                    } = i;
                    let O = S,
                        V = A;
                    E.forEach(K => {
                        let {
                            contentBoxSize: R,
                            contentRect: Y,
                            target: Q
                        } = K;
                        Q && Q !== i.el || (O = Y ? Y.width : (R[0] || R).inlineSize, V = Y ? Y.height : (R[0] || R).blockSize)
                    }), (O !== S || V !== A) && h()
                })
            }), f.observe(i.el))
        },
        p = () => {
            m && o.cancelAnimationFrame(m), f && f.unobserve && i.el && (f.unobserve(i.el), f = null)
        },
        y = () => {
            !i || i.destroyed || !i.initialized || u("orientationchange")
        };
    r("init", () => {
        if (i.params.resizeObserver && typeof o.ResizeObserver < "u") {
            v();
            return
        }
        o.addEventListener("resize", h), o.addEventListener("orientationchange", y)
    }), r("destroy", () => {
        p(), o.removeEventListener("resize", h), o.removeEventListener("orientationchange", y)
    })
}

function gv(s) {
    let {
        swiper: i,
        extendParams: r,
        on: u,
        emit: o
    } = s;
    const f = [],
        m = et(),
        h = function (y, E) {
            E === void 0 && (E = {});
            const S = m.MutationObserver || m.WebkitMutationObserver,
                A = new S(O => {
                    if (i.__preventObserver__) return;
                    if (O.length === 1) {
                        o("observerUpdate", O[0]);
                        return
                    }
                    const V = function () {
                        o("observerUpdate", O[0])
                    };
                    m.requestAnimationFrame ? m.requestAnimationFrame(V) : m.setTimeout(V, 0)
                });
            A.observe(y, {
                attributes: typeof E.attributes > "u" ? !0 : E.attributes,
                childList: i.isElement || (typeof E.childList > "u" ? !0 : E).childList,
                characterData: typeof E.characterData > "u" ? !0 : E.characterData
            }), f.push(A)
        },
        v = () => {
            if (i.params.observer) {
                if (i.params.observeParents) {
                    const y = ov(i.hostEl);
                    for (let E = 0; E < y.length; E += 1) h(y[E])
                }
                h(i.hostEl, {
                    childList: i.params.observeSlideChildren
                }), h(i.wrapperEl, {
                    attributes: !1
                })
            }
        },
        p = () => {
            f.forEach(y => {
                y.disconnect()
            }), f.splice(0, f.length)
        };
    r({
        observer: !1,
        observeParents: !1,
        observeSlideChildren: !1
    }), u("init", v), u("destroy", p)
}
var yv = {
    on(s, i, r) {
        const u = this;
        if (!u.eventsListeners || u.destroyed || typeof i != "function") return u;
        const o = r ? "unshift" : "push";
        return s.split(" ").forEach(f => {
            u.eventsListeners[f] || (u.eventsListeners[f] = []), u.eventsListeners[f][o](i)
        }), u
    },
    once(s, i, r) {
        const u = this;
        if (!u.eventsListeners || u.destroyed || typeof i != "function") return u;

        function o() {
            u.off(s, o), o.__emitterProxy && delete o.__emitterProxy;
            for (var f = arguments.length, m = new Array(f), h = 0; h < f; h++) m[h] = arguments[h];
            i.apply(u, m)
        }
        return o.__emitterProxy = i, u.on(s, o, r)
    },
    onAny(s, i) {
        const r = this;
        if (!r.eventsListeners || r.destroyed || typeof s != "function") return r;
        const u = i ? "unshift" : "push";
        return r.eventsAnyListeners.indexOf(s) < 0 && r.eventsAnyListeners[u](s), r
    },
    offAny(s) {
        const i = this;
        if (!i.eventsListeners || i.destroyed || !i.eventsAnyListeners) return i;
        const r = i.eventsAnyListeners.indexOf(s);
        return r >= 0 && i.eventsAnyListeners.splice(r, 1), i
    },
    off(s, i) {
        const r = this;
        return !r.eventsListeners || r.destroyed || !r.eventsListeners || s.split(" ").forEach(u => {
            typeof i > "u" ? r.eventsListeners[u] = [] : r.eventsListeners[u] && r.eventsListeners[u].forEach((o, f) => {
                (o === i || o.__emitterProxy && o.__emitterProxy === i) && r.eventsListeners[u].splice(f, 1)
            })
        }), r
    },
    emit() {
        const s = this;
        if (!s.eventsListeners || s.destroyed || !s.eventsListeners) return s;
        let i, r, u;
        for (var o = arguments.length, f = new Array(o), m = 0; m < o; m++) f[m] = arguments[m];
        return typeof f[0] == "string" || Array.isArray(f[0]) ? (i = f[0], r = f.slice(1, f.length), u = s) : (i = f[0].events, r = f[0].data, u = f[0].context || s), r.unshift(u), (Array.isArray(i) ? i : i.split(" ")).forEach(v => {
            s.eventsAnyListeners && s.eventsAnyListeners.length && s.eventsAnyListeners.forEach(p => {
                p.apply(u, [v, ...r])
            }), s.eventsListeners && s.eventsListeners[v] && s.eventsListeners[v].forEach(p => {
                p.apply(u, r)
            })
        }), s
    }
};

function Ev() {
    const s = this;
    let i, r;
    const u = s.el;
    typeof s.params.width < "u" && s.params.width !== null ? i = s.params.width : i = u.clientWidth, typeof s.params.height < "u" && s.params.height !== null ? r = s.params.height : r = u.clientHeight, !(i === 0 && s.isHorizontal() || r === 0 && s.isVertical()) && (i = i - parseInt(wl(u, "padding-left") || 0, 10) - parseInt(wl(u, "padding-right") || 0, 10), r = r - parseInt(wl(u, "padding-top") || 0, 10) - parseInt(wl(u, "padding-bottom") || 0, 10), Number.isNaN(i) && (i = 0), Number.isNaN(r) && (r = 0), Object.assign(s, {
        width: i,
        height: r,
        size: s.isHorizontal() ? i : r
    }))
}

function Sv() {
    const s = this;

    function i(z, j) {
        return parseFloat(z.getPropertyValue(s.getDirectionLabel(j)) || 0)
    }
    const r = s.params,
        {
            wrapperEl: u,
            slidesEl: o,
            size: f,
            rtlTranslate: m,
            wrongRTL: h
        } = s,
        v = s.virtual && r.virtual.enabled,
        p = v ? s.virtual.slides.length : s.slides.length,
        y = Ht(o, `.${s.params.slideClass}, swiper-slide`),
        E = v ? s.virtual.slides.length : y.length;
    let S = [];
    const A = [],
        O = [];
    let V = r.slidesOffsetBefore;
    typeof V == "function" && (V = r.slidesOffsetBefore.call(s));
    let K = r.slidesOffsetAfter;
    typeof K == "function" && (K = r.slidesOffsetAfter.call(s));
    const R = s.snapGrid.length,
        Y = s.slidesGrid.length;
    let Q = r.spaceBetween,
        F = -V,
        G = 0,
        ee = 0;
    if (typeof f > "u") return;
    typeof Q == "string" && Q.indexOf("%") >= 0 ? Q = parseFloat(Q.replace("%", "")) / 100 * f : typeof Q == "string" && (Q = parseFloat(Q)), s.virtualSize = -Q, y.forEach(z => {
        m ? z.style.marginLeft = "" : z.style.marginRight = "", z.style.marginBottom = "", z.style.marginTop = ""
    }), r.centeredSlides && r.cssMode && (ts(u, "--swiper-centered-offset-before", ""), ts(u, "--swiper-centered-offset-after", ""));
    const ae = r.grid && r.grid.rows > 1 && s.grid;
    ae ? s.grid.initSlides(y) : s.grid && s.grid.unsetSlides();
    let H;
    const M = r.slidesPerView === "auto" && r.breakpoints && Object.keys(r.breakpoints).filter(z => typeof r.breakpoints[z].slidesPerView < "u").length > 0;
    for (let z = 0; z < E; z += 1) {
        H = 0;
        let j;
        if (y[z] && (j = y[z]), ae && s.grid.updateSlide(z, j, y), !(y[z] && wl(j, "display") === "none")) {
            if (r.slidesPerView === "auto") {
                M && (y[z].style[s.getDirectionLabel("width")] = "");
                const P = getComputedStyle(j),
                    re = j.style.transform,
                    _e = j.style.webkitTransform;
                if (re && (j.style.transform = "none"), _e && (j.style.webkitTransform = "none"), r.roundLengths) H = s.isHorizontal() ? Id(j, "width") : Id(j, "height");
                else {
                    const oe = i(P, "width"),
                        C = i(P, "padding-left"),
                        Z = i(P, "padding-right"),
                        k = i(P, "margin-left"),
                        le = i(P, "margin-right"),
                        _ = P.getPropertyValue("box-sizing");
                    if (_ && _ === "border-box") H = oe + k + le;
                    else {
                        const {
                            clientWidth: X,
                            offsetWidth: $
                        } = j;
                        H = oe + C + Z + k + le + ($ - X)
                    }
                }
                re && (j.style.transform = re), _e && (j.style.webkitTransform = _e), r.roundLengths && (H = Math.floor(H))
            } else H = (f - (r.slidesPerView - 1) * Q) / r.slidesPerView, r.roundLengths && (H = Math.floor(H)), y[z] && (y[z].style[s.getDirectionLabel("width")] = `${H}px`);
            y[z] && (y[z].swiperSlideSize = H), O.push(H), r.centeredSlides ? (F = F + H / 2 + G / 2 + Q, G === 0 && z !== 0 && (F = F - f / 2 - Q), z === 0 && (F = F - f / 2 - Q), Math.abs(F) < 1 / 1e3 && (F = 0), r.roundLengths && (F = Math.floor(F)), ee % r.slidesPerGroup === 0 && S.push(F), A.push(F)) : (r.roundLengths && (F = Math.floor(F)), (ee - Math.min(s.params.slidesPerGroupSkip, ee)) % s.params.slidesPerGroup === 0 && S.push(F), A.push(F), F = F + H + Q), s.virtualSize += H + Q, G = H, ee += 1
        }
    }
    if (s.virtualSize = Math.max(s.virtualSize, f) + K, m && h && (r.effect === "slide" || r.effect === "coverflow") && (u.style.width = `${s.virtualSize + Q}px`), r.setWrapperSize && (u.style[s.getDirectionLabel("width")] = `${s.virtualSize + Q}px`), ae && s.grid.updateWrapperSize(H, S), !r.centeredSlides) {
        const z = [];
        for (let j = 0; j < S.length; j += 1) {
            let P = S[j];
            r.roundLengths && (P = Math.floor(P)), S[j] <= s.virtualSize - f && z.push(P)
        }
        S = z, Math.floor(s.virtualSize - f) - Math.floor(S[S.length - 1]) > 1 && S.push(s.virtualSize - f)
    }
    if (v && r.loop) {
        const z = O[0] + Q;
        if (r.slidesPerGroup > 1) {
            const j = Math.ceil((s.virtual.slidesBefore + s.virtual.slidesAfter) / r.slidesPerGroup),
                P = z * r.slidesPerGroup;
            for (let re = 0; re < j; re += 1) S.push(S[S.length - 1] + P)
        }
        for (let j = 0; j < s.virtual.slidesBefore + s.virtual.slidesAfter; j += 1) r.slidesPerGroup === 1 && S.push(S[S.length - 1] + z), A.push(A[A.length - 1] + z), s.virtualSize += z
    }
    if (S.length === 0 && (S = [0]), Q !== 0) {
        const z = s.isHorizontal() && m ? "marginLeft" : s.getDirectionLabel("marginRight");
        y.filter((j, P) => !r.cssMode || r.loop ? !0 : P !== y.length - 1).forEach(j => {
            j.style[z] = `${Q}px`
        })
    }
    if (r.centeredSlides && r.centeredSlidesBounds) {
        let z = 0;
        O.forEach(P => {
            z += P + (Q || 0)
        }), z -= Q;
        const j = z > f ? z - f : 0;
        S = S.map(P => P <= 0 ? -V : P > j ? j + K : P)
    }
    if (r.centerInsufficientSlides) {
        let z = 0;
        O.forEach(P => {
            z += P + (Q || 0)
        }), z -= Q;
        const j = (r.slidesOffsetBefore || 0) + (r.slidesOffsetAfter || 0);
        if (z + j < f) {
            const P = (f - z - j) / 2;
            S.forEach((re, _e) => {
                S[_e] = re - P
            }), A.forEach((re, _e) => {
                A[_e] = re + P
            })
        }
    }
    if (Object.assign(s, {
        slides: y,
        snapGrid: S,
        slidesGrid: A,
        slidesSizesGrid: O
    }), r.centeredSlides && r.cssMode && !r.centeredSlidesBounds) {
        ts(u, "--swiper-centered-offset-before", `${-S[0]}px`), ts(u, "--swiper-centered-offset-after", `${s.size / 2 - O[O.length - 1] / 2}px`);
        const z = -s.snapGrid[0],
            j = -s.slidesGrid[0];
        s.snapGrid = s.snapGrid.map(P => P + z), s.slidesGrid = s.slidesGrid.map(P => P + j)
    }
    if (E !== p && s.emit("slidesLengthChange"), S.length !== R && (s.params.watchOverflow && s.checkOverflow(), s.emit("snapGridLengthChange")), A.length !== Y && s.emit("slidesGridLengthChange"), r.watchSlidesProgress && s.updateSlidesOffset(), s.emit("slidesUpdated"), !v && !r.cssMode && (r.effect === "slide" || r.effect === "fade")) {
        const z = `${r.containerModifierClass}backface-hidden`,
            j = s.el.classList.contains(z);
        E <= r.maxBackfaceHiddenSlides ? j || s.el.classList.add(z) : j && s.el.classList.remove(z)
    }
}

function bv(s) {
    const i = this,
        r = [],
        u = i.virtual && i.params.virtual.enabled;
    let o = 0,
        f;
    typeof s == "number" ? i.setTransition(s) : s === !0 && i.setTransition(i.params.speed);
    const m = h => u ? i.slides[i.getSlideIndexByData(h)] : i.slides[h];
    if (i.params.slidesPerView !== "auto" && i.params.slidesPerView > 1)
        if (i.params.centeredSlides) (i.visibleSlides || []).forEach(h => {
            r.push(h)
        });
        else
            for (f = 0; f < Math.ceil(i.params.slidesPerView); f += 1) {
                const h = i.activeIndex + f;
                if (h > i.slides.length && !u) break;
                r.push(m(h))
            } else r.push(m(i.activeIndex));
    for (f = 0; f < r.length; f += 1)
        if (typeof r[f] < "u") {
            const h = r[f].offsetHeight;
            o = h > o ? h : o
        } (o || o === 0) && (i.wrapperEl.style.height = `${o}px`)
}

function _v() {
    const s = this,
        i = s.slides,
        r = s.isElement ? s.isHorizontal() ? s.wrapperEl.offsetLeft : s.wrapperEl.offsetTop : 0;
    for (let u = 0; u < i.length; u += 1) i[u].swiperSlideOffset = (s.isHorizontal() ? i[u].offsetLeft : i[u].offsetTop) - r - s.cssOverflowAdjustment()
}
const Qd = (s, i, r) => {
    i && !s.classList.contains(r) ? s.classList.add(r) : !i && s.classList.contains(r) && s.classList.remove(r)
};

function Tv(s) {
    s === void 0 && (s = this && this.translate || 0);
    const i = this,
        r = i.params,
        {
            slides: u,
            rtlTranslate: o,
            snapGrid: f
        } = i;
    if (u.length === 0) return;
    typeof u[0].swiperSlideOffset > "u" && i.updateSlidesOffset();
    let m = -s;
    o && (m = s), i.visibleSlidesIndexes = [], i.visibleSlides = [];
    let h = r.spaceBetween;
    typeof h == "string" && h.indexOf("%") >= 0 ? h = parseFloat(h.replace("%", "")) / 100 * i.size : typeof h == "string" && (h = parseFloat(h));
    for (let v = 0; v < u.length; v += 1) {
        const p = u[v];
        let y = p.swiperSlideOffset;
        r.cssMode && r.centeredSlides && (y -= u[0].swiperSlideOffset);
        const E = (m + (r.centeredSlides ? i.minTranslate() : 0) - y) / (p.swiperSlideSize + h),
            S = (m - f[0] + (r.centeredSlides ? i.minTranslate() : 0) - y) / (p.swiperSlideSize + h),
            A = -(m - y),
            O = A + i.slidesSizesGrid[v],
            V = A >= 0 && A <= i.size - i.slidesSizesGrid[v],
            K = A >= 0 && A < i.size - 1 || O > 1 && O <= i.size || A <= 0 && O >= i.size;
        K && (i.visibleSlides.push(p), i.visibleSlidesIndexes.push(v)), Qd(p, K, r.slideVisibleClass), Qd(p, V, r.slideFullyVisibleClass), p.progress = o ? -E : E, p.originalProgress = o ? -S : S
    }
}

function Ov(s) {
    const i = this;
    if (typeof s > "u") {
        const y = i.rtlTranslate ? -1 : 1;
        s = i && i.translate && i.translate * y || 0
    }
    const r = i.params,
        u = i.maxTranslate() - i.minTranslate();
    let {
        progress: o,
        isBeginning: f,
        isEnd: m,
        progressLoop: h
    } = i;
    const v = f,
        p = m;
    if (u === 0) o = 0, f = !0, m = !0;
    else {
        o = (s - i.minTranslate()) / u;
        const y = Math.abs(s - i.minTranslate()) < 1,
            E = Math.abs(s - i.maxTranslate()) < 1;
        f = y || o <= 0, m = E || o >= 1, y && (o = 0), E && (o = 1)
    }
    if (r.loop) {
        const y = i.getSlideIndexByData(0),
            E = i.getSlideIndexByData(i.slides.length - 1),
            S = i.slidesGrid[y],
            A = i.slidesGrid[E],
            O = i.slidesGrid[i.slidesGrid.length - 1],
            V = Math.abs(s);
        V >= S ? h = (V - S) / O : h = (V + O - A) / O, h > 1 && (h -= 1)
    }
    Object.assign(i, {
        progress: o,
        progressLoop: h,
        isBeginning: f,
        isEnd: m
    }), (r.watchSlidesProgress || r.centeredSlides && r.autoHeight) && i.updateSlidesProgress(s), f && !v && i.emit("reachBeginning toEdge"), m && !p && i.emit("reachEnd toEdge"), (v && !f || p && !m) && i.emit("fromEdge"), i.emit("progress", o)
}
const Cr = (s, i, r) => {
    i && !s.classList.contains(r) ? s.classList.add(r) : !i && s.classList.contains(r) && s.classList.remove(r)
};

function xv() {
    const s = this,
        {
            slides: i,
            params: r,
            slidesEl: u,
            activeIndex: o
        } = s,
        f = s.virtual && r.virtual.enabled,
        m = s.grid && r.grid && r.grid.rows > 1,
        h = E => Ht(u, `.${r.slideClass}${E}, swiper-slide${E}`)[0];
    let v, p, y;
    if (f)
        if (r.loop) {
            let E = o - s.virtual.slidesBefore;
            E < 0 && (E = s.virtual.slides.length + E), E >= s.virtual.slides.length && (E -= s.virtual.slides.length), v = h(`[data-swiper-slide-index="${E}"]`)
        } else v = h(`[data-swiper-slide-index="${o}"]`);
    else m ? (v = i.find(E => E.column === o), y = i.find(E => E.column === o + 1), p = i.find(E => E.column === o - 1)) : v = i[o];
    v && (m || (y = fv(v, `.${r.slideClass}, swiper-slide`)[0], r.loop && !y && (y = i[0]), p = cv(v, `.${r.slideClass}, swiper-slide`)[0], r.loop && !p === 0 && (p = i[i.length - 1]))), i.forEach(E => {
        Cr(E, E === v, r.slideActiveClass), Cr(E, E === y, r.slideNextClass), Cr(E, E === p, r.slidePrevClass)
    }), s.emitSlidesClasses()
}
const ls = (s, i) => {
    if (!s || s.destroyed || !s.params) return;
    const r = () => s.isElement ? "swiper-slide" : `.${s.params.slideClass}`,
        u = i.closest(r());
    if (u) {
        let o = u.querySelector(`.${s.params.lazyPreloaderClass}`);
        !o && s.isElement && (u.shadowRoot ? o = u.shadowRoot.querySelector(`.${s.params.lazyPreloaderClass}`) : requestAnimationFrame(() => {
            u.shadowRoot && (o = u.shadowRoot.querySelector(`.${s.params.lazyPreloaderClass}`), o && o.remove())
        })), o && o.remove()
    }
},
    Nr = (s, i) => {
        if (!s.slides[i]) return;
        const r = s.slides[i].querySelector('[loading="lazy"]');
        r && r.removeAttribute("loading")
    },
    zr = s => {
        if (!s || s.destroyed || !s.params) return;
        let i = s.params.lazyPreloadPrevNext;
        const r = s.slides.length;
        if (!r || !i || i < 0) return;
        i = Math.min(i, r);
        const u = s.params.slidesPerView === "auto" ? s.slidesPerViewDynamic() : Math.ceil(s.params.slidesPerView),
            o = s.activeIndex;
        if (s.params.grid && s.params.grid.rows > 1) {
            const m = o,
                h = [m - i];
            h.push(...Array.from({
                length: i
            }).map((v, p) => m + u + p)), s.slides.forEach((v, p) => {
                h.includes(v.column) && Nr(s, p)
            });
            return
        }
        const f = o + u - 1;
        if (s.params.rewind || s.params.loop)
            for (let m = o - i; m <= f + i; m += 1) {
                const h = (m % r + r) % r;
                (h < o || h > f) && Nr(s, h)
            } else
            for (let m = Math.max(o - i, 0); m <= Math.min(f + i, r - 1); m += 1) m !== o && (m > f || m < o) && Nr(s, m)
    };

function wv(s) {
    const {
        slidesGrid: i,
        params: r
    } = s, u = s.rtlTranslate ? s.translate : -s.translate;
    let o;
    for (let f = 0; f < i.length; f += 1) typeof i[f + 1] < "u" ? u >= i[f] && u < i[f + 1] - (i[f + 1] - i[f]) / 2 ? o = f : u >= i[f] && u < i[f + 1] && (o = f + 1) : u >= i[f] && (o = f);
    return r.normalizeSlideIndex && (o < 0 || typeof o > "u") && (o = 0), o
}

function Av(s) {
    const i = this,
        r = i.rtlTranslate ? i.translate : -i.translate,
        {
            snapGrid: u,
            params: o,
            activeIndex: f,
            realIndex: m,
            snapIndex: h
        } = i;
    let v = s,
        p;
    const y = A => {
        let O = A - i.virtual.slidesBefore;
        return O < 0 && (O = i.virtual.slides.length + O), O >= i.virtual.slides.length && (O -= i.virtual.slides.length), O
    };
    if (typeof v > "u" && (v = wv(i)), u.indexOf(r) >= 0) p = u.indexOf(r);
    else {
        const A = Math.min(o.slidesPerGroupSkip, v);
        p = A + Math.floor((v - A) / o.slidesPerGroup)
    }
    if (p >= u.length && (p = u.length - 1), v === f && !i.params.loop) {
        p !== h && (i.snapIndex = p, i.emit("snapIndexChange"));
        return
    }
    if (v === f && i.params.loop && i.virtual && i.params.virtual.enabled) {
        i.realIndex = y(v);
        return
    }
    const E = i.grid && o.grid && o.grid.rows > 1;
    let S;
    if (i.virtual && o.virtual.enabled && o.loop) S = y(v);
    else if (E) {
        const A = i.slides.find(V => V.column === v);
        let O = parseInt(A.getAttribute("data-swiper-slide-index"), 10);
        Number.isNaN(O) && (O = Math.max(i.slides.indexOf(A), 0)), S = Math.floor(O / o.grid.rows)
    } else if (i.slides[v]) {
        const A = i.slides[v].getAttribute("data-swiper-slide-index");
        A ? S = parseInt(A, 10) : S = v
    } else S = v;
    Object.assign(i, {
        previousSnapIndex: h,
        snapIndex: p,
        previousRealIndex: m,
        realIndex: S,
        previousIndex: f,
        activeIndex: v
    }), i.initialized && zr(i), i.emit("activeIndexChange"), i.emit("snapIndexChange"), (i.initialized || i.params.runCallbacksOnInit) && (m !== S && i.emit("realIndexChange"), i.emit("slideChange"))
}

function Cv(s, i) {
    const r = this,
        u = r.params;
    let o = s.closest(`.${u.slideClass}, swiper-slide`);
    !o && r.isElement && i && i.length > 1 && i.includes(s) && [...i.slice(i.indexOf(s) + 1, i.length)].forEach(h => {
        !o && h.matches && h.matches(`.${u.slideClass}, swiper-slide`) && (o = h)
    });
    let f = !1,
        m;
    if (o) {
        for (let h = 0; h < r.slides.length; h += 1)
            if (r.slides[h] === o) {
                f = !0, m = h;
                break
            }
    }
    if (o && f) r.clickedSlide = o, r.virtual && r.params.virtual.enabled ? r.clickedIndex = parseInt(o.getAttribute("data-swiper-slide-index"), 10) : r.clickedIndex = m;
    else {
        r.clickedSlide = void 0, r.clickedIndex = void 0;
        return
    }
    u.slideToClickedSlide && r.clickedIndex !== void 0 && r.clickedIndex !== r.activeIndex && r.slideToClickedSlide()
}
var Nv = {
    updateSize: Ev,
    updateSlides: Sv,
    updateAutoHeight: bv,
    updateSlidesOffset: _v,
    updateSlidesProgress: Tv,
    updateProgress: Ov,
    updateSlidesClasses: xv,
    updateActiveIndex: Av,
    updateClickedSlide: Cv
};

function Mv(s) {
    s === void 0 && (s = this.isHorizontal() ? "x" : "y");
    const i = this,
        {
            params: r,
            rtlTranslate: u,
            translate: o,
            wrapperEl: f
        } = i;
    if (r.virtualTranslate) return u ? -o : o;
    if (r.cssMode) return o;
    let m = iv(f, s);
    return m += i.cssOverflowAdjustment(), u && (m = -m), m || 0
}

function Dv(s, i) {
    const r = this,
        {
            rtlTranslate: u,
            params: o,
            wrapperEl: f,
            progress: m
        } = r;
    let h = 0,
        v = 0;
    const p = 0;
    r.isHorizontal() ? h = u ? -s : s : v = s, o.roundLengths && (h = Math.floor(h), v = Math.floor(v)), r.previousTranslate = r.translate, r.translate = r.isHorizontal() ? h : v, o.cssMode ? f[r.isHorizontal() ? "scrollLeft" : "scrollTop"] = r.isHorizontal() ? -h : -v : o.virtualTranslate || (r.isHorizontal() ? h -= r.cssOverflowAdjustment() : v -= r.cssOverflowAdjustment(), f.style.transform = `translate3d(${h}px, ${v}px, ${p}px)`);
    let y;
    const E = r.maxTranslate() - r.minTranslate();
    E === 0 ? y = 0 : y = (s - r.minTranslate()) / E, y !== m && r.updateProgress(s), r.emit("setTranslate", r.translate, i)
}

function zv() {
    return -this.snapGrid[0]
}

function Rv() {
    return -this.snapGrid[this.snapGrid.length - 1]
}

function Uv(s, i, r, u, o) {
    s === void 0 && (s = 0), i === void 0 && (i = this.params.speed), r === void 0 && (r = !0), u === void 0 && (u = !0);
    const f = this,
        {
            params: m,
            wrapperEl: h
        } = f;
    if (f.animating && m.preventInteractionOnTransition) return !1;
    const v = f.minTranslate(),
        p = f.maxTranslate();
    let y;
    if (u && s > v ? y = v : u && s < p ? y = p : y = s, f.updateProgress(y), m.cssMode) {
        const E = f.isHorizontal();
        if (i === 0) h[E ? "scrollLeft" : "scrollTop"] = -y;
        else {
            if (!f.support.smoothScroll) return np({
                swiper: f,
                targetPosition: -y,
                side: E ? "left" : "top"
            }), !0;
            h.scrollTo({
                [E ? "left" : "top"]: -y,
                behavior: "smooth"
            })
        }
        return !0
    }
    return i === 0 ? (f.setTransition(0), f.setTranslate(y), r && (f.emit("beforeTransitionStart", i, o), f.emit("transitionEnd"))) : (f.setTransition(i), f.setTranslate(y), r && (f.emit("beforeTransitionStart", i, o), f.emit("transitionStart")), f.animating || (f.animating = !0, f.onTranslateToWrapperTransitionEnd || (f.onTranslateToWrapperTransitionEnd = function (S) {
        !f || f.destroyed || S.target === this && (f.wrapperEl.removeEventListener("transitionend", f.onTranslateToWrapperTransitionEnd), f.onTranslateToWrapperTransitionEnd = null, delete f.onTranslateToWrapperTransitionEnd, f.animating = !1, r && f.emit("transitionEnd"))
    }), f.wrapperEl.addEventListener("transitionend", f.onTranslateToWrapperTransitionEnd))), !0
}
var Lv = {
    getTranslate: Mv,
    setTranslate: Dv,
    minTranslate: zv,
    maxTranslate: Rv,
    translateTo: Uv
};

function Hv(s, i) {
    const r = this;
    r.params.cssMode || (r.wrapperEl.style.transitionDuration = `${s}ms`, r.wrapperEl.style.transitionDelay = s === 0 ? "0ms" : ""), r.emit("setTransition", s, i)
}

function cp(s) {
    let {
        swiper: i,
        runCallbacks: r,
        direction: u,
        step: o
    } = s;
    const {
        activeIndex: f,
        previousIndex: m
    } = i;
    let h = u;
    h || (f > m ? h = "next" : f < m ? h = "prev" : h = "reset"), i.emit(`transition${o}`), r && h === "reset" ? i.emit(`slideResetTransition${o}`) : r && f !== m && (i.emit(`slideChangeTransition${o}`), h === "next" ? i.emit(`slideNextTransition${o}`) : i.emit(`slidePrevTransition${o}`))
}

function Vv(s, i) {
    s === void 0 && (s = !0);
    const r = this,
        {
            params: u
        } = r;
    u.cssMode || (u.autoHeight && r.updateAutoHeight(), cp({
        swiper: r,
        runCallbacks: s,
        direction: i,
        step: "Start"
    }))
}

function jv(s, i) {
    s === void 0 && (s = !0);
    const r = this,
        {
            params: u
        } = r;
    r.animating = !1, !u.cssMode && (r.setTransition(0), cp({
        swiper: r,
        runCallbacks: s,
        direction: i,
        step: "End"
    }))
}
var Gv = {
    setTransition: Hv,
    transitionStart: Vv,
    transitionEnd: jv
};

function Bv(s, i, r, u, o) {
    s === void 0 && (s = 0), r === void 0 && (r = !0), typeof s == "string" && (s = parseInt(s, 10));
    const f = this;
    let m = s;
    m < 0 && (m = 0);
    const {
        params: h,
        snapGrid: v,
        slidesGrid: p,
        previousIndex: y,
        activeIndex: E,
        rtlTranslate: S,
        wrapperEl: A,
        enabled: O
    } = f;
    if (!O && !u && !o || f.destroyed || f.animating && h.preventInteractionOnTransition) return !1;
    typeof i > "u" && (i = f.params.speed);
    const V = Math.min(f.params.slidesPerGroupSkip, m);
    let K = V + Math.floor((m - V) / f.params.slidesPerGroup);
    K >= v.length && (K = v.length - 1);
    const R = -v[K];
    if (h.normalizeSlideIndex)
        for (let ae = 0; ae < p.length; ae += 1) {
            const H = -Math.floor(R * 100),
                M = Math.floor(p[ae] * 100),
                z = Math.floor(p[ae + 1] * 100);
            typeof p[ae + 1] < "u" ? H >= M && H < z - (z - M) / 2 ? m = ae : H >= M && H < z && (m = ae + 1) : H >= M && (m = ae)
        }
    if (f.initialized && m !== E && (!f.allowSlideNext && (S ? R > f.translate && R > f.minTranslate() : R < f.translate && R < f.minTranslate()) || !f.allowSlidePrev && R > f.translate && R > f.maxTranslate() && (E || 0) !== m)) return !1;
    m !== (y || 0) && r && f.emit("beforeSlideChangeStart"), f.updateProgress(R);
    let Y;
    m > E ? Y = "next" : m < E ? Y = "prev" : Y = "reset";
    const Q = f.virtual && f.params.virtual.enabled;
    if (!(Q && o) && (S && -R === f.translate || !S && R === f.translate)) return f.updateActiveIndex(m), h.autoHeight && f.updateAutoHeight(), f.updateSlidesClasses(), h.effect !== "slide" && f.setTranslate(R), Y !== "reset" && (f.transitionStart(r, Y), f.transitionEnd(r, Y)), !1;
    if (h.cssMode) {
        const ae = f.isHorizontal(),
            H = S ? R : -R;
        if (i === 0) Q && (f.wrapperEl.style.scrollSnapType = "none", f._immediateVirtual = !0), Q && !f._cssModeVirtualInitialSet && f.params.initialSlide > 0 ? (f._cssModeVirtualInitialSet = !0, requestAnimationFrame(() => {
            A[ae ? "scrollLeft" : "scrollTop"] = H
        })) : A[ae ? "scrollLeft" : "scrollTop"] = H, Q && requestAnimationFrame(() => {
            f.wrapperEl.style.scrollSnapType = "", f._immediateVirtual = !1
        });
        else {
            if (!f.support.smoothScroll) return np({
                swiper: f,
                targetPosition: H,
                side: ae ? "left" : "top"
            }), !0;
            A.scrollTo({
                [ae ? "left" : "top"]: H,
                behavior: "smooth"
            })
        }
        return !0
    }
    const ee = rp().isSafari;
    return Q && !o && ee && f.isElement && f.virtual.update(!1, !1, m), f.setTransition(i), f.setTranslate(R), f.updateActiveIndex(m), f.updateSlidesClasses(), f.emit("beforeTransitionStart", i, u), f.transitionStart(r, Y), i === 0 ? f.transitionEnd(r, Y) : f.animating || (f.animating = !0, f.onSlideToWrapperTransitionEnd || (f.onSlideToWrapperTransitionEnd = function (H) {
        !f || f.destroyed || H.target === this && (f.wrapperEl.removeEventListener("transitionend", f.onSlideToWrapperTransitionEnd), f.onSlideToWrapperTransitionEnd = null, delete f.onSlideToWrapperTransitionEnd, f.transitionEnd(r, Y))
    }), f.wrapperEl.addEventListener("transitionend", f.onSlideToWrapperTransitionEnd)), !0
}

function qv(s, i, r, u) {
    s === void 0 && (s = 0), r === void 0 && (r = !0), typeof s == "string" && (s = parseInt(s, 10));
    const o = this;
    if (o.destroyed) return;
    typeof i > "u" && (i = o.params.speed);
    const f = o.grid && o.params.grid && o.params.grid.rows > 1;
    let m = s;
    if (o.params.loop)
        if (o.virtual && o.params.virtual.enabled) m = m + o.virtual.slidesBefore;
        else {
            let h;
            if (f) {
                const S = m * o.params.grid.rows;
                h = o.slides.find(A => A.getAttribute("data-swiper-slide-index") * 1 === S).column
            } else h = o.getSlideIndexByData(m);
            const v = f ? Math.ceil(o.slides.length / o.params.grid.rows) : o.slides.length,
                {
                    centeredSlides: p
                } = o.params;
            let y = o.params.slidesPerView;
            y === "auto" ? y = o.slidesPerViewDynamic() : (y = Math.ceil(parseFloat(o.params.slidesPerView, 10)), p && y % 2 === 0 && (y = y + 1));
            let E = v - h < y;
            if (p && (E = E || h < Math.ceil(y / 2)), u && p && o.params.slidesPerView !== "auto" && !f && (E = !1), E) {
                const S = p ? h < o.activeIndex ? "prev" : "next" : h - o.activeIndex - 1 < o.params.slidesPerView ? "next" : "prev";
                o.loopFix({
                    direction: S,
                    slideTo: !0,
                    activeSlideIndex: S === "next" ? h + 1 : h - v + 1,
                    slideRealIndex: S === "next" ? o.realIndex : void 0
                })
            }
            if (f) {
                const S = m * o.params.grid.rows;
                m = o.slides.find(A => A.getAttribute("data-swiper-slide-index") * 1 === S).column
            } else m = o.getSlideIndexByData(m)
        } return requestAnimationFrame(() => {
            o.slideTo(m, i, r, u)
        }), o
}

function Yv(s, i, r) {
    i === void 0 && (i = !0);
    const u = this,
        {
            enabled: o,
            params: f,
            animating: m
        } = u;
    if (!o || u.destroyed) return u;
    typeof s > "u" && (s = u.params.speed);
    let h = f.slidesPerGroup;
    f.slidesPerView === "auto" && f.slidesPerGroup === 1 && f.slidesPerGroupAuto && (h = Math.max(u.slidesPerViewDynamic("current", !0), 1));
    const v = u.activeIndex < f.slidesPerGroupSkip ? 1 : h,
        p = u.virtual && f.virtual.enabled;
    if (f.loop) {
        if (m && !p && f.loopPreventsSliding) return !1;
        if (u.loopFix({
            direction: "next"
        }), u._clientLeft = u.wrapperEl.clientLeft, u.activeIndex === u.slides.length - 1 && f.cssMode) return requestAnimationFrame(() => {
            u.slideTo(u.activeIndex + v, s, i, r)
        }), !0
    }
    return f.rewind && u.isEnd ? u.slideTo(0, s, i, r) : u.slideTo(u.activeIndex + v, s, i, r)
}

function Iv(s, i, r) {
    i === void 0 && (i = !0);
    const u = this,
        {
            params: o,
            snapGrid: f,
            slidesGrid: m,
            rtlTranslate: h,
            enabled: v,
            animating: p
        } = u;
    if (!v || u.destroyed) return u;
    typeof s > "u" && (s = u.params.speed);
    const y = u.virtual && o.virtual.enabled;
    if (o.loop) {
        if (p && !y && o.loopPreventsSliding) return !1;
        u.loopFix({
            direction: "prev"
        }), u._clientLeft = u.wrapperEl.clientLeft
    }
    const E = h ? u.translate : -u.translate;

    function S(Y) {
        return Y < 0 ? -Math.floor(Math.abs(Y)) : Math.floor(Y)
    }
    const A = S(E),
        O = f.map(Y => S(Y)),
        V = o.freeMode && o.freeMode.enabled;
    let K = f[O.indexOf(A) - 1];
    if (typeof K > "u" && (o.cssMode || V)) {
        let Y;
        f.forEach((Q, F) => {
            A >= Q && (Y = F)
        }), typeof Y < "u" && (K = V ? f[Y] : f[Y > 0 ? Y - 1 : Y])
    }
    let R = 0;
    if (typeof K < "u" && (R = m.indexOf(K), R < 0 && (R = u.activeIndex - 1), o.slidesPerView === "auto" && o.slidesPerGroup === 1 && o.slidesPerGroupAuto && (R = R - u.slidesPerViewDynamic("previous", !0) + 1, R = Math.max(R, 0))), o.rewind && u.isBeginning) {
        const Y = u.params.virtual && u.params.virtual.enabled && u.virtual ? u.virtual.slides.length - 1 : u.slides.length - 1;
        return u.slideTo(Y, s, i, r)
    } else if (o.loop && u.activeIndex === 0 && o.cssMode) return requestAnimationFrame(() => {
        u.slideTo(R, s, i, r)
    }), !0;
    return u.slideTo(R, s, i, r)
}

function Xv(s, i, r) {
    i === void 0 && (i = !0);
    const u = this;
    if (!u.destroyed) return typeof s > "u" && (s = u.params.speed), u.slideTo(u.activeIndex, s, i, r)
}

function Qv(s, i, r, u) {
    i === void 0 && (i = !0), u === void 0 && (u = .5);
    const o = this;
    if (o.destroyed) return;
    typeof s > "u" && (s = o.params.speed);
    let f = o.activeIndex;
    const m = Math.min(o.params.slidesPerGroupSkip, f),
        h = m + Math.floor((f - m) / o.params.slidesPerGroup),
        v = o.rtlTranslate ? o.translate : -o.translate;
    if (v >= o.snapGrid[h]) {
        const p = o.snapGrid[h],
            y = o.snapGrid[h + 1];
        v - p > (y - p) * u && (f += o.params.slidesPerGroup)
    } else {
        const p = o.snapGrid[h - 1],
            y = o.snapGrid[h];
        v - p <= (y - p) * u && (f -= o.params.slidesPerGroup)
    }
    return f = Math.max(f, 0), f = Math.min(f, o.slidesGrid.length - 1), o.slideTo(f, s, i, r)
}

function Zv() {
    const s = this;
    if (s.destroyed) return;
    const {
        params: i,
        slidesEl: r
    } = s, u = i.slidesPerView === "auto" ? s.slidesPerViewDynamic() : i.slidesPerView;
    let o = s.getSlideIndexWhenGrid(s.clickedIndex),
        f;
    const m = s.isElement ? "swiper-slide" : `.${i.slideClass}`,
        h = s.grid && s.params.grid && s.params.grid.rows > 1;
    if (i.loop) {
        if (s.animating) return;
        f = parseInt(s.clickedSlide.getAttribute("data-swiper-slide-index"), 10), i.centeredSlides ? s.slideToLoop(f) : o > (h ? (s.slides.length - u) / 2 - (s.params.grid.rows - 1) : s.slides.length - u) ? (s.loopFix(), o = s.getSlideIndex(Ht(r, `${m}[data-swiper-slide-index="${f}"]`)[0]), ap(() => {
            s.slideTo(o)
        })) : s.slideTo(o)
    } else s.slideTo(o)
}
var Kv = {
    slideTo: Bv,
    slideToLoop: qv,
    slideNext: Yv,
    slidePrev: Iv,
    slideReset: Xv,
    slideToClosest: Qv,
    slideToClickedSlide: Zv
};

function Fv(s, i) {
    const r = this,
        {
            params: u,
            slidesEl: o
        } = r;
    if (!u.loop || r.virtual && r.params.virtual.enabled) return;
    const f = () => {
        Ht(o, `.${u.slideClass}, swiper-slide`).forEach((A, O) => {
            A.setAttribute("data-swiper-slide-index", O)
        })
    },
        m = () => {
            const S = Ht(o, `.${u.slideBlankClass}`);
            S.forEach(A => {
                A.remove()
            }), S.length > 0 && (r.recalcSlides(), r.updateSlides())
        },
        h = r.grid && u.grid && u.grid.rows > 1;
    u.loopAddBlankSlides && (u.slidesPerGroup > 1 || h) && m();
    const v = u.slidesPerGroup * (h ? u.grid.rows : 1),
        p = r.slides.length % v !== 0,
        y = h && r.slides.length % u.grid.rows !== 0,
        E = S => {
            for (let A = 0; A < S; A += 1) {
                const O = r.isElement ? is("swiper-slide", [u.slideBlankClass]) : is("div", [u.slideClass, u.slideBlankClass]);
                r.slidesEl.append(O)
            }
        };
    if (p) {
        if (u.loopAddBlankSlides) {
            const S = v - r.slides.length % v;
            E(S), r.recalcSlides(), r.updateSlides()
        } else ns("Swiper Loop Warning: The number of slides is not even to slidesPerGroup, loop mode may not function properly. You need to add more slides (or make duplicates, or empty slides)");
        f()
    } else if (y) {
        if (u.loopAddBlankSlides) {
            const S = u.grid.rows - r.slides.length % u.grid.rows;
            E(S), r.recalcSlides(), r.updateSlides()
        } else ns("Swiper Loop Warning: The number of slides is not even to grid.rows, loop mode may not function properly. You need to add more slides (or make duplicates, or empty slides)");
        f()
    } else f();
    r.loopFix({
        slideRealIndex: s,
        direction: u.centeredSlides ? void 0 : "next",
        initial: i
    })
}

function Pv(s) {
    let {
        slideRealIndex: i,
        slideTo: r = !0,
        direction: u,
        setTranslate: o,
        activeSlideIndex: f,
        initial: m,
        byController: h,
        byMousewheel: v
    } = s === void 0 ? {} : s;
    const p = this;
    if (!p.params.loop) return;
    p.emit("beforeLoopFix");
    const {
        slides: y,
        allowSlidePrev: E,
        allowSlideNext: S,
        slidesEl: A,
        params: O
    } = p, {
        centeredSlides: V,
        initialSlide: K
    } = O;
    if (p.allowSlidePrev = !0, p.allowSlideNext = !0, p.virtual && O.virtual.enabled) {
        r && (!O.centeredSlides && p.snapIndex === 0 ? p.slideTo(p.virtual.slides.length, 0, !1, !0) : O.centeredSlides && p.snapIndex < O.slidesPerView ? p.slideTo(p.virtual.slides.length + p.snapIndex, 0, !1, !0) : p.snapIndex === p.snapGrid.length - 1 && p.slideTo(p.virtual.slidesBefore, 0, !1, !0)), p.allowSlidePrev = E, p.allowSlideNext = S, p.emit("loopFix");
        return
    }
    let R = O.slidesPerView;
    R === "auto" ? R = p.slidesPerViewDynamic() : (R = Math.ceil(parseFloat(O.slidesPerView, 10)), V && R % 2 === 0 && (R = R + 1));
    const Y = O.slidesPerGroupAuto ? R : O.slidesPerGroup;
    let Q = V ? Math.max(Y, Math.ceil(R / 2)) : Y;
    Q % Y !== 0 && (Q += Y - Q % Y), Q += O.loopAdditionalSlides, p.loopedSlides = Q;
    const F = p.grid && O.grid && O.grid.rows > 1;
    y.length < R + Q || p.params.effect === "cards" && y.length < R + Q * 2 ? ns("Swiper Loop Warning: The number of slides is not enough for loop mode, it will be disabled or not function properly. You need to add more slides (or make duplicates) or lower the values of slidesPerView and slidesPerGroup parameters") : F && O.grid.fill === "row" && ns("Swiper Loop Warning: Loop mode is not compatible with grid.fill = `row`");
    const G = [],
        ee = [],
        ae = F ? Math.ceil(y.length / O.grid.rows) : y.length,
        H = m && ae - K < R && !V;
    let M = H ? K : p.activeIndex;
    typeof f > "u" ? f = p.getSlideIndex(y.find(C => C.classList.contains(O.slideActiveClass))) : M = f;
    const z = u === "next" || !u,
        j = u === "prev" || !u;
    let P = 0,
        re = 0;
    const oe = (F ? y[f].column : f) + (V && typeof o > "u" ? -R / 2 + .5 : 0);
    if (oe < Q) {
        P = Math.max(Q - oe, Y);
        for (let C = 0; C < Q - oe; C += 1) {
            const Z = C - Math.floor(C / ae) * ae;
            if (F) {
                const k = ae - Z - 1;
                for (let le = y.length - 1; le >= 0; le -= 1) y[le].column === k && G.push(le)
            } else G.push(ae - Z - 1)
        }
    } else if (oe + R > ae - Q) {
        re = Math.max(oe - (ae - Q * 2), Y), H && (re = Math.max(re, R - ae + K + 1));
        for (let C = 0; C < re; C += 1) {
            const Z = C - Math.floor(C / ae) * ae;
            F ? y.forEach((k, le) => {
                k.column === Z && ee.push(le)
            }) : ee.push(Z)
        }
    }
    if (p.__preventObserver__ = !0, requestAnimationFrame(() => {
        p.__preventObserver__ = !1
    }), p.params.effect === "cards" && y.length < R + Q * 2 && (ee.includes(f) && ee.splice(ee.indexOf(f), 1), G.includes(f) && G.splice(G.indexOf(f), 1)), j && G.forEach(C => {
        y[C].swiperLoopMoveDOM = !0, A.prepend(y[C]), y[C].swiperLoopMoveDOM = !1
    }), z && ee.forEach(C => {
        y[C].swiperLoopMoveDOM = !0, A.append(y[C]), y[C].swiperLoopMoveDOM = !1
    }), p.recalcSlides(), O.slidesPerView === "auto" ? p.updateSlides() : F && (G.length > 0 && j || ee.length > 0 && z) && p.slides.forEach((C, Z) => {
        p.grid.updateSlide(Z, C, p.slides)
    }), O.watchSlidesProgress && p.updateSlidesOffset(), r) {
        if (G.length > 0 && j) {
            if (typeof i > "u") {
                const C = p.slidesGrid[M],
                    k = p.slidesGrid[M + P] - C;
                v ? p.setTranslate(p.translate - k) : (p.slideTo(M + Math.ceil(P), 0, !1, !0), o && (p.touchEventsData.startTranslate = p.touchEventsData.startTranslate - k, p.touchEventsData.currentTranslate = p.touchEventsData.currentTranslate - k))
            } else if (o) {
                const C = F ? G.length / O.grid.rows : G.length;
                p.slideTo(p.activeIndex + C, 0, !1, !0), p.touchEventsData.currentTranslate = p.translate
            }
        } else if (ee.length > 0 && z)
            if (typeof i > "u") {
                const C = p.slidesGrid[M],
                    k = p.slidesGrid[M - re] - C;
                v ? p.setTranslate(p.translate - k) : (p.slideTo(M - re, 0, !1, !0), o && (p.touchEventsData.startTranslate = p.touchEventsData.startTranslate - k, p.touchEventsData.currentTranslate = p.touchEventsData.currentTranslate - k))
            } else {
                const C = F ? ee.length / O.grid.rows : ee.length;
                p.slideTo(p.activeIndex - C, 0, !1, !0)
            }
    }
    if (p.allowSlidePrev = E, p.allowSlideNext = S, p.controller && p.controller.control && !h) {
        const C = {
            slideRealIndex: i,
            direction: u,
            setTranslate: o,
            activeSlideIndex: f,
            byController: !0
        };
        Array.isArray(p.controller.control) ? p.controller.control.forEach(Z => {
            !Z.destroyed && Z.params.loop && Z.loopFix({
                ...C,
                slideTo: Z.params.slidesPerView === O.slidesPerView ? r : !1
            })
        }) : p.controller.control instanceof p.constructor && p.controller.control.params.loop && p.controller.control.loopFix({
            ...C,
            slideTo: p.controller.control.params.slidesPerView === O.slidesPerView ? r : !1
        })
    }
    p.emit("loopFix")
}

function Jv() {
    const s = this,
        {
            params: i,
            slidesEl: r
        } = s;
    if (!i.loop || !r || s.virtual && s.params.virtual.enabled) return;
    s.recalcSlides();
    const u = [];
    s.slides.forEach(o => {
        const f = typeof o.swiperSlideIndex > "u" ? o.getAttribute("data-swiper-slide-index") * 1 : o.swiperSlideIndex;
        u[f] = o
    }), s.slides.forEach(o => {
        o.removeAttribute("data-swiper-slide-index")
    }), u.forEach(o => {
        r.append(o)
    }), s.recalcSlides(), s.slideTo(s.realIndex, 0)
}
var kv = {
    loopCreate: Fv,
    loopFix: Pv,
    loopDestroy: Jv
};

function $v(s) {
    const i = this;
    if (!i.params.simulateTouch || i.params.watchOverflow && i.isLocked || i.params.cssMode) return;
    const r = i.params.touchEventsTarget === "container" ? i.el : i.wrapperEl;
    i.isElement && (i.__preventObserver__ = !0), r.style.cursor = "move", r.style.cursor = s ? "grabbing" : "grab", i.isElement && requestAnimationFrame(() => {
        i.__preventObserver__ = !1
    })
}

function Wv() {
    const s = this;
    s.params.watchOverflow && s.isLocked || s.params.cssMode || (s.isElement && (s.__preventObserver__ = !0), s[s.params.touchEventsTarget === "container" ? "el" : "wrapperEl"].style.cursor = "", s.isElement && requestAnimationFrame(() => {
        s.__preventObserver__ = !1
    }))
}
var eg = {
    setGrabCursor: $v,
    unsetGrabCursor: Wv
};

function tg(s, i) {
    i === void 0 && (i = this);

    function r(u) {
        if (!u || u === Kl() || u === et()) return null;
        u.assignedSlot && (u = u.assignedSlot);
        const o = u.closest(s);
        return !o && !u.getRootNode ? null : o || r(u.getRootNode().host)
    }
    return r(i)
}

function Zd(s, i, r) {
    const u = et(),
        {
            params: o
        } = s,
        f = o.edgeSwipeDetection,
        m = o.edgeSwipeThreshold;
    return f && (r <= m || r >= u.innerWidth - m) ? f === "prevent" ? (i.preventDefault(), !0) : !1 : !0
}

function lg(s) {
    const i = this,
        r = Kl();
    let u = s;
    u.originalEvent && (u = u.originalEvent);
    const o = i.touchEventsData;
    if (u.type === "pointerdown") {
        if (o.pointerId !== null && o.pointerId !== u.pointerId) return;
        o.pointerId = u.pointerId
    } else u.type === "touchstart" && u.targetTouches.length === 1 && (o.touchId = u.targetTouches[0].identifier);
    if (u.type === "touchstart") {
        Zd(i, u, u.targetTouches[0].pageX);
        return
    }
    const {
        params: f,
        touches: m,
        enabled: h
    } = i;
    if (!h || !f.simulateTouch && u.pointerType === "mouse" || i.animating && f.preventInteractionOnTransition) return;
    !i.animating && f.cssMode && f.loop && i.loopFix();
    let v = u.target;
    if (f.touchEventsTarget === "wrapper" && !rv(v, i.wrapperEl) || "which" in u && u.which === 3 || "button" in u && u.button > 0 || o.isTouched && o.isMoved) return;
    const p = !!f.noSwipingClass && f.noSwipingClass !== "",
        y = u.composedPath ? u.composedPath() : u.path;
    p && u.target && u.target.shadowRoot && y && (v = y[0]);
    const E = f.noSwipingSelector ? f.noSwipingSelector : `.${f.noSwipingClass}`,
        S = !!(u.target && u.target.shadowRoot);
    if (f.noSwiping && (S ? tg(E, v) : v.closest(E))) {
        i.allowClick = !0;
        return
    }
    if (f.swipeHandler && !v.closest(f.swipeHandler)) return;
    m.currentX = u.pageX, m.currentY = u.pageY;
    const A = m.currentX,
        O = m.currentY;
    if (!Zd(i, u, A)) return;
    Object.assign(o, {
        isTouched: !0,
        isMoved: !1,
        allowTouchCallbacks: !0,
        isScrolling: void 0,
        startMoving: void 0
    }), m.startX = A, m.startY = O, o.touchStartTime = as(), i.allowClick = !0, i.updateSize(), i.swipeDirection = void 0, f.threshold > 0 && (o.allowThresholdMove = !1);
    let V = !0;
    v.matches(o.focusableElements) && (V = !1, v.nodeName === "SELECT" && (o.isTouched = !1)), r.activeElement && r.activeElement.matches(o.focusableElements) && r.activeElement !== v && (u.pointerType === "mouse" || u.pointerType !== "mouse" && !v.matches(o.focusableElements)) && r.activeElement.blur();
    const K = V && i.allowTouchMove && f.touchStartPreventDefault;
    (f.touchStartForcePreventDefault || K) && !v.isContentEditable && u.preventDefault(), f.freeMode && f.freeMode.enabled && i.freeMode && i.animating && !f.cssMode && i.freeMode.onTouchStart(), i.emit("touchStart", u)
}

function ag(s) {
    const i = Kl(),
        r = this,
        u = r.touchEventsData,
        {
            params: o,
            touches: f,
            rtlTranslate: m,
            enabled: h
        } = r;
    if (!h || !o.simulateTouch && s.pointerType === "mouse") return;
    let v = s;
    if (v.originalEvent && (v = v.originalEvent), v.type === "pointermove" && (u.touchId !== null || v.pointerId !== u.pointerId)) return;
    let p;
    if (v.type === "touchmove") {
        if (p = [...v.changedTouches].find(G => G.identifier === u.touchId), !p || p.identifier !== u.touchId) return
    } else p = v;
    if (!u.isTouched) {
        u.startMoving && u.isScrolling && r.emit("touchMoveOpposite", v);
        return
    }
    const y = p.pageX,
        E = p.pageY;
    if (v.preventedByNestedSwiper) {
        f.startX = y, f.startY = E;
        return
    }
    if (!r.allowTouchMove) {
        v.target.matches(u.focusableElements) || (r.allowClick = !1), u.isTouched && (Object.assign(f, {
            startX: y,
            startY: E,
            currentX: y,
            currentY: E
        }), u.touchStartTime = as());
        return
    }
    if (o.touchReleaseOnEdges && !o.loop)
        if (r.isVertical()) {
            if (E < f.startY && r.translate <= r.maxTranslate() || E > f.startY && r.translate >= r.minTranslate()) {
                u.isTouched = !1, u.isMoved = !1;
                return
            }
        } else {
            if (m && (y > f.startX && -r.translate <= r.maxTranslate() || y < f.startX && -r.translate >= r.minTranslate())) return;
            if (!m && (y < f.startX && r.translate <= r.maxTranslate() || y > f.startX && r.translate >= r.minTranslate())) return
        } if (i.activeElement && i.activeElement.matches(u.focusableElements) && i.activeElement !== v.target && v.pointerType !== "mouse" && i.activeElement.blur(), i.activeElement && v.target === i.activeElement && v.target.matches(u.focusableElements)) {
            u.isMoved = !0, r.allowClick = !1;
            return
        }
    u.allowTouchCallbacks && r.emit("touchMove", v), f.previousX = f.currentX, f.previousY = f.currentY, f.currentX = y, f.currentY = E;
    const S = f.currentX - f.startX,
        A = f.currentY - f.startY;
    if (r.params.threshold && Math.sqrt(S ** 2 + A ** 2) < r.params.threshold) return;
    if (typeof u.isScrolling > "u") {
        let G;
        r.isHorizontal() && f.currentY === f.startY || r.isVertical() && f.currentX === f.startX ? u.isScrolling = !1 : S * S + A * A >= 25 && (G = Math.atan2(Math.abs(A), Math.abs(S)) * 180 / Math.PI, u.isScrolling = r.isHorizontal() ? G > o.touchAngle : 90 - G > o.touchAngle)
    }
    if (u.isScrolling && r.emit("touchMoveOpposite", v), typeof u.startMoving > "u" && (f.currentX !== f.startX || f.currentY !== f.startY) && (u.startMoving = !0), u.isScrolling || v.type === "touchmove" && u.preventTouchMoveFromPointerMove) {
        u.isTouched = !1;
        return
    }
    if (!u.startMoving) return;
    r.allowClick = !1, !o.cssMode && v.cancelable && v.preventDefault(), o.touchMoveStopPropagation && !o.nested && v.stopPropagation();
    let O = r.isHorizontal() ? S : A,
        V = r.isHorizontal() ? f.currentX - f.previousX : f.currentY - f.previousY;
    o.oneWayMovement && (O = Math.abs(O) * (m ? 1 : -1), V = Math.abs(V) * (m ? 1 : -1)), f.diff = O, O *= o.touchRatio, m && (O = -O, V = -V);
    const K = r.touchesDirection;
    r.swipeDirection = O > 0 ? "prev" : "next", r.touchesDirection = V > 0 ? "prev" : "next";
    const R = r.params.loop && !o.cssMode,
        Y = r.touchesDirection === "next" && r.allowSlideNext || r.touchesDirection === "prev" && r.allowSlidePrev;
    if (!u.isMoved) {
        if (R && Y && r.loopFix({
            direction: r.swipeDirection
        }), u.startTranslate = r.getTranslate(), r.setTransition(0), r.animating) {
            const G = new window.CustomEvent("transitionend", {
                bubbles: !0,
                cancelable: !0,
                detail: {
                    bySwiperTouchMove: !0
                }
            });
            r.wrapperEl.dispatchEvent(G)
        }
        u.allowMomentumBounce = !1, o.grabCursor && (r.allowSlideNext === !0 || r.allowSlidePrev === !0) && r.setGrabCursor(!0), r.emit("sliderFirstMove", v)
    }
    if (new Date().getTime(), o._loopSwapReset !== !1 && u.isMoved && u.allowThresholdMove && K !== r.touchesDirection && R && Y && Math.abs(O) >= 1) {
        Object.assign(f, {
            startX: y,
            startY: E,
            currentX: y,
            currentY: E,
            startTranslate: u.currentTranslate
        }), u.loopSwapReset = !0, u.startTranslate = u.currentTranslate;
        return
    }
    r.emit("sliderMove", v), u.isMoved = !0, u.currentTranslate = O + u.startTranslate;
    let Q = !0,
        F = o.resistanceRatio;
    if (o.touchReleaseOnEdges && (F = 0), O > 0 ? (R && Y && u.allowThresholdMove && u.currentTranslate > (o.centeredSlides ? r.minTranslate() - r.slidesSizesGrid[r.activeIndex + 1] - (o.slidesPerView !== "auto" && r.slides.length - o.slidesPerView >= 2 ? r.slidesSizesGrid[r.activeIndex + 1] + r.params.spaceBetween : 0) - r.params.spaceBetween : r.minTranslate()) && r.loopFix({
        direction: "prev",
        setTranslate: !0,
        activeSlideIndex: 0
    }), u.currentTranslate > r.minTranslate() && (Q = !1, o.resistance && (u.currentTranslate = r.minTranslate() - 1 + (-r.minTranslate() + u.startTranslate + O) ** F))) : O < 0 && (R && Y && u.allowThresholdMove && u.currentTranslate < (o.centeredSlides ? r.maxTranslate() + r.slidesSizesGrid[r.slidesSizesGrid.length - 1] + r.params.spaceBetween + (o.slidesPerView !== "auto" && r.slides.length - o.slidesPerView >= 2 ? r.slidesSizesGrid[r.slidesSizesGrid.length - 1] + r.params.spaceBetween : 0) : r.maxTranslate()) && r.loopFix({
        direction: "next",
        setTranslate: !0,
        activeSlideIndex: r.slides.length - (o.slidesPerView === "auto" ? r.slidesPerViewDynamic() : Math.ceil(parseFloat(o.slidesPerView, 10)))
    }), u.currentTranslate < r.maxTranslate() && (Q = !1, o.resistance && (u.currentTranslate = r.maxTranslate() + 1 - (r.maxTranslate() - u.startTranslate - O) ** F))), Q && (v.preventedByNestedSwiper = !0), !r.allowSlideNext && r.swipeDirection === "next" && u.currentTranslate < u.startTranslate && (u.currentTranslate = u.startTranslate), !r.allowSlidePrev && r.swipeDirection === "prev" && u.currentTranslate > u.startTranslate && (u.currentTranslate = u.startTranslate), !r.allowSlidePrev && !r.allowSlideNext && (u.currentTranslate = u.startTranslate), o.threshold > 0)
        if (Math.abs(O) > o.threshold || u.allowThresholdMove) {
            if (!u.allowThresholdMove) {
                u.allowThresholdMove = !0, f.startX = f.currentX, f.startY = f.currentY, u.currentTranslate = u.startTranslate, f.diff = r.isHorizontal() ? f.currentX - f.startX : f.currentY - f.startY;
                return
            }
        } else {
            u.currentTranslate = u.startTranslate;
            return
        } !o.followFinger || o.cssMode || ((o.freeMode && o.freeMode.enabled && r.freeMode || o.watchSlidesProgress) && (r.updateActiveIndex(), r.updateSlidesClasses()), o.freeMode && o.freeMode.enabled && r.freeMode && r.freeMode.onTouchMove(), r.updateProgress(u.currentTranslate), r.setTranslate(u.currentTranslate))
}

function ng(s) {
    const i = this,
        r = i.touchEventsData;
    let u = s;
    u.originalEvent && (u = u.originalEvent);
    let o;
    if (u.type === "touchend" || u.type === "touchcancel") {
        if (o = [...u.changedTouches].find(G => G.identifier === r.touchId), !o || o.identifier !== r.touchId) return
    } else {
        if (r.touchId !== null || u.pointerId !== r.pointerId) return;
        o = u
    }
    if (["pointercancel", "pointerout", "pointerleave", "contextmenu"].includes(u.type) && !(["pointercancel", "contextmenu"].includes(u.type) && (i.browser.isSafari || i.browser.isWebView))) return;
    r.pointerId = null, r.touchId = null;
    const {
        params: m,
        touches: h,
        rtlTranslate: v,
        slidesGrid: p,
        enabled: y
    } = i;
    if (!y || !m.simulateTouch && u.pointerType === "mouse") return;
    if (r.allowTouchCallbacks && i.emit("touchEnd", u), r.allowTouchCallbacks = !1, !r.isTouched) {
        r.isMoved && m.grabCursor && i.setGrabCursor(!1), r.isMoved = !1, r.startMoving = !1;
        return
    }
    m.grabCursor && r.isMoved && r.isTouched && (i.allowSlideNext === !0 || i.allowSlidePrev === !0) && i.setGrabCursor(!1);
    const E = as(),
        S = E - r.touchStartTime;
    if (i.allowClick) {
        const G = u.path || u.composedPath && u.composedPath();
        i.updateClickedSlide(G && G[0] || u.target, G), i.emit("tap click", u), S < 300 && E - r.lastClickTime < 300 && i.emit("doubleTap doubleClick", u)
    }
    if (r.lastClickTime = as(), ap(() => {
        i.destroyed || (i.allowClick = !0)
    }), !r.isTouched || !r.isMoved || !i.swipeDirection || h.diff === 0 && !r.loopSwapReset || r.currentTranslate === r.startTranslate && !r.loopSwapReset) {
        r.isTouched = !1, r.isMoved = !1, r.startMoving = !1;
        return
    }
    r.isTouched = !1, r.isMoved = !1, r.startMoving = !1;
    let A;
    if (m.followFinger ? A = v ? i.translate : -i.translate : A = -r.currentTranslate, m.cssMode) return;
    if (m.freeMode && m.freeMode.enabled) {
        i.freeMode.onTouchEnd({
            currentPos: A
        });
        return
    }
    const O = A >= -i.maxTranslate() && !i.params.loop;
    let V = 0,
        K = i.slidesSizesGrid[0];
    for (let G = 0; G < p.length; G += G < m.slidesPerGroupSkip ? 1 : m.slidesPerGroup) {
        const ee = G < m.slidesPerGroupSkip - 1 ? 1 : m.slidesPerGroup;
        typeof p[G + ee] < "u" ? (O || A >= p[G] && A < p[G + ee]) && (V = G, K = p[G + ee] - p[G]) : (O || A >= p[G]) && (V = G, K = p[p.length - 1] - p[p.length - 2])
    }
    let R = null,
        Y = null;
    m.rewind && (i.isBeginning ? Y = m.virtual && m.virtual.enabled && i.virtual ? i.virtual.slides.length - 1 : i.slides.length - 1 : i.isEnd && (R = 0));
    const Q = (A - p[V]) / K,
        F = V < m.slidesPerGroupSkip - 1 ? 1 : m.slidesPerGroup;
    if (S > m.longSwipesMs) {
        if (!m.longSwipes) {
            i.slideTo(i.activeIndex);
            return
        }
        i.swipeDirection === "next" && (Q >= m.longSwipesRatio ? i.slideTo(m.rewind && i.isEnd ? R : V + F) : i.slideTo(V)), i.swipeDirection === "prev" && (Q > 1 - m.longSwipesRatio ? i.slideTo(V + F) : Y !== null && Q < 0 && Math.abs(Q) > m.longSwipesRatio ? i.slideTo(Y) : i.slideTo(V))
    } else {
        if (!m.shortSwipes) {
            i.slideTo(i.activeIndex);
            return
        }
        i.navigation && (u.target === i.navigation.nextEl || u.target === i.navigation.prevEl) ? u.target === i.navigation.nextEl ? i.slideTo(V + F) : i.slideTo(V) : (i.swipeDirection === "next" && i.slideTo(R !== null ? R : V + F), i.swipeDirection === "prev" && i.slideTo(Y !== null ? Y : V))
    }
}

function Kd() {
    const s = this,
        {
            params: i,
            el: r
        } = s;
    if (r && r.offsetWidth === 0) return;
    i.breakpoints && s.setBreakpoint();
    const {
        allowSlideNext: u,
        allowSlidePrev: o,
        snapGrid: f
    } = s, m = s.virtual && s.params.virtual.enabled;
    s.allowSlideNext = !0, s.allowSlidePrev = !0, s.updateSize(), s.updateSlides(), s.updateSlidesClasses();
    const h = m && i.loop;
    (i.slidesPerView === "auto" || i.slidesPerView > 1) && s.isEnd && !s.isBeginning && !s.params.centeredSlides && !h ? s.slideTo(s.slides.length - 1, 0, !1, !0) : s.params.loop && !m ? s.slideToLoop(s.realIndex, 0, !1, !0) : s.slideTo(s.activeIndex, 0, !1, !0), s.autoplay && s.autoplay.running && s.autoplay.paused && (clearTimeout(s.autoplay.resizeTimeout), s.autoplay.resizeTimeout = setTimeout(() => {
        s.autoplay && s.autoplay.running && s.autoplay.paused && s.autoplay.resume()
    }, 500)), s.allowSlidePrev = o, s.allowSlideNext = u, s.params.watchOverflow && f !== s.snapGrid && s.checkOverflow()
}

function ig(s) {
    const i = this;
    i.enabled && (i.allowClick || (i.params.preventClicks && s.preventDefault(), i.params.preventClicksPropagation && i.animating && (s.stopPropagation(), s.stopImmediatePropagation())))
}

function sg() {
    const s = this,
        {
            wrapperEl: i,
            rtlTranslate: r,
            enabled: u
        } = s;
    if (!u) return;
    s.previousTranslate = s.translate, s.isHorizontal() ? s.translate = -i.scrollLeft : s.translate = -i.scrollTop, s.translate === 0 && (s.translate = 0), s.updateActiveIndex(), s.updateSlidesClasses();
    let o;
    const f = s.maxTranslate() - s.minTranslate();
    f === 0 ? o = 0 : o = (s.translate - s.minTranslate()) / f, o !== s.progress && s.updateProgress(r ? -s.translate : s.translate), s.emit("setTranslate", s.translate, !1)
}

function ug(s) {
    const i = this;
    ls(i, s.target), !(i.params.cssMode || i.params.slidesPerView !== "auto" && !i.params.autoHeight) && i.update()
}

function rg() {
    const s = this;
    s.documentTouchHandlerProceeded || (s.documentTouchHandlerProceeded = !0, s.params.touchReleaseOnEdges && (s.el.style.touchAction = "auto"))
}
const fp = (s, i) => {
    const r = Kl(),
        {
            params: u,
            el: o,
            wrapperEl: f,
            device: m
        } = s,
        h = !!u.nested,
        v = i === "on" ? "addEventListener" : "removeEventListener",
        p = i;
    !o || typeof o == "string" || (r[v]("touchstart", s.onDocumentTouchStart, {
        passive: !1,
        capture: h
    }), o[v]("touchstart", s.onTouchStart, {
        passive: !1
    }), o[v]("pointerdown", s.onTouchStart, {
        passive: !1
    }), r[v]("touchmove", s.onTouchMove, {
        passive: !1,
        capture: h
    }), r[v]("pointermove", s.onTouchMove, {
        passive: !1,
        capture: h
    }), r[v]("touchend", s.onTouchEnd, {
        passive: !0
    }), r[v]("pointerup", s.onTouchEnd, {
        passive: !0
    }), r[v]("pointercancel", s.onTouchEnd, {
        passive: !0
    }), r[v]("touchcancel", s.onTouchEnd, {
        passive: !0
    }), r[v]("pointerout", s.onTouchEnd, {
        passive: !0
    }), r[v]("pointerleave", s.onTouchEnd, {
        passive: !0
    }), r[v]("contextmenu", s.onTouchEnd, {
        passive: !0
    }), (u.preventClicks || u.preventClicksPropagation) && o[v]("click", s.onClick, !0), u.cssMode && f[v]("scroll", s.onScroll), u.updateOnWindowResize ? s[p](m.ios || m.android ? "resize orientationchange observerUpdate" : "resize observerUpdate", Kd, !0) : s[p]("observerUpdate", Kd, !0), o[v]("load", s.onLoad, {
        capture: !0
    }))
};

function cg() {
    const s = this,
        {
            params: i
        } = s;
    s.onTouchStart = lg.bind(s), s.onTouchMove = ag.bind(s), s.onTouchEnd = ng.bind(s), s.onDocumentTouchStart = rg.bind(s), i.cssMode && (s.onScroll = sg.bind(s)), s.onClick = ig.bind(s), s.onLoad = ug.bind(s), fp(s, "on")
}

function fg() {
    fp(this, "off")
}
var og = {
    attachEvents: cg,
    detachEvents: fg
};
const Fd = (s, i) => s.grid && i.grid && i.grid.rows > 1;

function dg() {
    const s = this,
        {
            realIndex: i,
            initialized: r,
            params: u,
            el: o
        } = s,
        f = u.breakpoints;
    if (!f || f && Object.keys(f).length === 0) return;
    const m = Kl(),
        h = u.breakpointsBase === "window" || !u.breakpointsBase ? u.breakpointsBase : "container",
        v = ["window", "container"].includes(u.breakpointsBase) || !u.breakpointsBase ? s.el : m.querySelector(u.breakpointsBase),
        p = s.getBreakpoint(f, h, v);
    if (!p || s.currentBreakpoint === p) return;
    const E = (p in f ? f[p] : void 0) || s.originalParams,
        S = Fd(s, u),
        A = Fd(s, E),
        O = s.params.grabCursor,
        V = E.grabCursor,
        K = u.enabled;
    S && !A ? (o.classList.remove(`${u.containerModifierClass}grid`, `${u.containerModifierClass}grid-column`), s.emitContainerClasses()) : !S && A && (o.classList.add(`${u.containerModifierClass}grid`), (E.grid.fill && E.grid.fill === "column" || !E.grid.fill && u.grid.fill === "column") && o.classList.add(`${u.containerModifierClass}grid-column`), s.emitContainerClasses()), O && !V ? s.unsetGrabCursor() : !O && V && s.setGrabCursor(), ["navigation", "pagination", "scrollbar"].forEach(ee => {
        if (typeof E[ee] > "u") return;
        const ae = u[ee] && u[ee].enabled,
            H = E[ee] && E[ee].enabled;
        ae && !H && s[ee].disable(), !ae && H && s[ee].enable()
    });
    const R = E.direction && E.direction !== u.direction,
        Y = u.loop && (E.slidesPerView !== u.slidesPerView || R),
        Q = u.loop;
    R && r && s.changeDirection(), vt(s.params, E);
    const F = s.params.enabled,
        G = s.params.loop;
    Object.assign(s, {
        allowTouchMove: s.params.allowTouchMove,
        allowSlideNext: s.params.allowSlideNext,
        allowSlidePrev: s.params.allowSlidePrev
    }), K && !F ? s.disable() : !K && F && s.enable(), s.currentBreakpoint = p, s.emit("_beforeBreakpoint", E), r && (Y ? (s.loopDestroy(), s.loopCreate(i), s.updateSlides()) : !Q && G ? (s.loopCreate(i), s.updateSlides()) : Q && !G && s.loopDestroy()), s.emit("breakpoint", E)
}

function pg(s, i, r) {
    if (i === void 0 && (i = "window"), !s || i === "container" && !r) return;
    let u = !1;
    const o = et(),
        f = i === "window" ? o.innerHeight : r.clientHeight,
        m = Object.keys(s).map(h => {
            if (typeof h == "string" && h.indexOf("@") === 0) {
                const v = parseFloat(h.substr(1));
                return {
                    value: f * v,
                    point: h
                }
            }
            return {
                value: h,
                point: h
            }
        });
    m.sort((h, v) => parseInt(h.value, 10) - parseInt(v.value, 10));
    for (let h = 0; h < m.length; h += 1) {
        const {
            point: v,
            value: p
        } = m[h];
        i === "window" ? o.matchMedia(`(min-width: ${p}px)`).matches && (u = v) : p <= r.clientWidth && (u = v)
    }
    return u || "max"
}
var hg = {
    setBreakpoint: dg,
    getBreakpoint: pg
};

function mg(s, i) {
    const r = [];
    return s.forEach(u => {
        typeof u == "object" ? Object.keys(u).forEach(o => {
            u[o] && r.push(i + o)
        }) : typeof u == "string" && r.push(i + u)
    }), r
}

function vg() {
    const s = this,
        {
            classNames: i,
            params: r,
            rtl: u,
            el: o,
            device: f
        } = s,
        m = mg(["initialized", r.direction, {
            "free-mode": s.params.freeMode && r.freeMode.enabled
        }, {
                autoheight: r.autoHeight
            }, {
                rtl: u
            }, {
                grid: r.grid && r.grid.rows > 1
            }, {
                "grid-column": r.grid && r.grid.rows > 1 && r.grid.fill === "column"
            }, {
                android: f.android
            }, {
                ios: f.ios
            }, {
                "css-mode": r.cssMode
            }, {
                centered: r.cssMode && r.centeredSlides
            }, {
                "watch-progress": r.watchSlidesProgress
            }], r.containerModifierClass);
    i.push(...m), o.classList.add(...i), s.emitContainerClasses()
}

function gg() {
    const s = this,
        {
            el: i,
            classNames: r
        } = s;
    !i || typeof i == "string" || (i.classList.remove(...r), s.emitContainerClasses())
}
var yg = {
    addClasses: vg,
    removeClasses: gg
};

function Eg() {
    const s = this,
        {
            isLocked: i,
            params: r
        } = s,
        {
            slidesOffsetBefore: u
        } = r;
    if (u) {
        const o = s.slides.length - 1,
            f = s.slidesGrid[o] + s.slidesSizesGrid[o] + u * 2;
        s.isLocked = s.size > f
    } else s.isLocked = s.snapGrid.length === 1;
    r.allowSlideNext === !0 && (s.allowSlideNext = !s.isLocked), r.allowSlidePrev === !0 && (s.allowSlidePrev = !s.isLocked), i && i !== s.isLocked && (s.isEnd = !1), i !== s.isLocked && s.emit(s.isLocked ? "lock" : "unlock")
}
var Sg = {
    checkOverflow: Eg
},
    Rr = {
        init: !0,
        direction: "horizontal",
        oneWayMovement: !1,
        swiperElementNodeName: "SWIPER-CONTAINER",
        touchEventsTarget: "wrapper",
        initialSlide: 0,
        speed: 300,
        cssMode: !1,
        updateOnWindowResize: !0,
        resizeObserver: !0,
        nested: !1,
        createElements: !1,
        eventsPrefix: "swiper",
        enabled: !0,
        focusableElements: "input, select, option, textarea, button, video, label",
        width: null,
        height: null,
        preventInteractionOnTransition: !1,
        userAgent: null,
        url: null,
        edgeSwipeDetection: !1,
        edgeSwipeThreshold: 20,
        autoHeight: !1,
        setWrapperSize: !1,
        virtualTranslate: !1,
        effect: "slide",
        breakpoints: void 0,
        breakpointsBase: "window",
        spaceBetween: 0,
        slidesPerView: 1,
        slidesPerGroup: 1,
        slidesPerGroupSkip: 0,
        slidesPerGroupAuto: !1,
        centeredSlides: !1,
        centeredSlidesBounds: !1,
        slidesOffsetBefore: 0,
        slidesOffsetAfter: 0,
        normalizeSlideIndex: !0,
        centerInsufficientSlides: !1,
        watchOverflow: !0,
        roundLengths: !1,
        touchRatio: 1,
        touchAngle: 45,
        simulateTouch: !0,
        shortSwipes: !0,
        longSwipes: !0,
        longSwipesRatio: .5,
        longSwipesMs: 300,
        followFinger: !0,
        allowTouchMove: !0,
        threshold: 5,
        touchMoveStopPropagation: !1,
        touchStartPreventDefault: !0,
        touchStartForcePreventDefault: !1,
        touchReleaseOnEdges: !1,
        uniqueNavElements: !0,
        resistance: !0,
        resistanceRatio: .85,
        watchSlidesProgress: !1,
        grabCursor: !1,
        preventClicks: !0,
        preventClicksPropagation: !0,
        slideToClickedSlide: !1,
        loop: !1,
        loopAddBlankSlides: !0,
        loopAdditionalSlides: 0,
        loopPreventsSliding: !0,
        rewind: !1,
        allowSlidePrev: !0,
        allowSlideNext: !0,
        swipeHandler: null,
        noSwiping: !0,
        noSwipingClass: "swiper-no-swiping",
        noSwipingSelector: null,
        passiveListeners: !0,
        maxBackfaceHiddenSlides: 10,
        containerModifierClass: "swiper-",
        slideClass: "swiper-slide",
        slideBlankClass: "swiper-slide-blank",
        slideActiveClass: "swiper-slide-active",
        slideVisibleClass: "swiper-slide-visible",
        slideFullyVisibleClass: "swiper-slide-fully-visible",
        slideNextClass: "swiper-slide-next",
        slidePrevClass: "swiper-slide-prev",
        wrapperClass: "swiper-wrapper",
        lazyPreloaderClass: "swiper-lazy-preloader",
        lazyPreloadPrevNext: 0,
        runCallbacksOnInit: !0,
        _emitClasses: !1
    };

function bg(s, i) {
    return function (u) {
        u === void 0 && (u = {});
        const o = Object.keys(u)[0],
            f = u[o];
        if (typeof f != "object" || f === null) {
            vt(i, u);
            return
        }
        if (s[o] === !0 && (s[o] = {
            enabled: !0
        }), o === "navigation" && s[o] && s[o].enabled && !s[o].prevEl && !s[o].nextEl && (s[o].auto = !0), ["pagination", "scrollbar"].indexOf(o) >= 0 && s[o] && s[o].enabled && !s[o].el && (s[o].auto = !0), !(o in s && "enabled" in f)) {
            vt(i, u);
            return
        }
        typeof s[o] == "object" && !("enabled" in s[o]) && (s[o].enabled = !0), s[o] || (s[o] = {
            enabled: !1
        }), vt(i, u)
    }
}
const Mr = {
    eventsEmitter: yv,
    update: Nv,
    translate: Lv,
    transition: Gv,
    slide: Kv,
    loop: kv,
    grabCursor: eg,
    events: og,
    breakpoints: hg,
    checkOverflow: Sg,
    classes: yg
},
    Dr = {};
let Hr = class tl {
    constructor() {
        let i, r;
        for (var u = arguments.length, o = new Array(u), f = 0; f < u; f++) o[f] = arguments[f];
        o.length === 1 && o[0].constructor && Object.prototype.toString.call(o[0]).slice(8, -1) === "Object" ? r = o[0] : [i, r] = o, r || (r = {}), r = vt({}, r), i && !r.el && (r.el = i);
        const m = Kl();
        if (r.el && typeof r.el == "string" && m.querySelectorAll(r.el).length > 1) {
            const y = [];
            return m.querySelectorAll(r.el).forEach(E => {
                const S = vt({}, r, {
                    el: E
                });
                y.push(new tl(S))
            }), y
        }
        const h = this;
        h.__swiper__ = !0, h.support = sp(), h.device = up({
            userAgent: r.userAgent
        }), h.browser = rp(), h.eventsListeners = {}, h.eventsAnyListeners = [], h.modules = [...h.__modules__], r.modules && Array.isArray(r.modules) && h.modules.push(...r.modules);
        const v = {};
        h.modules.forEach(y => {
            y({
                params: r,
                swiper: h,
                extendParams: bg(r, v),
                on: h.on.bind(h),
                once: h.once.bind(h),
                off: h.off.bind(h),
                emit: h.emit.bind(h)
            })
        });
        const p = vt({}, Rr, v);
        return h.params = vt({}, p, Dr, r), h.originalParams = vt({}, h.params), h.passedParams = vt({}, r), h.params && h.params.on && Object.keys(h.params.on).forEach(y => {
            h.on(y, h.params.on[y])
        }), h.params && h.params.onAny && h.onAny(h.params.onAny), Object.assign(h, {
            enabled: h.params.enabled,
            el: i,
            classNames: [],
            slides: [],
            slidesGrid: [],
            snapGrid: [],
            slidesSizesGrid: [],
            isHorizontal() {
                return h.params.direction === "horizontal"
            },
            isVertical() {
                return h.params.direction === "vertical"
            },
            activeIndex: 0,
            realIndex: 0,
            isBeginning: !0,
            isEnd: !1,
            translate: 0,
            previousTranslate: 0,
            progress: 0,
            velocity: 0,
            animating: !1,
            cssOverflowAdjustment() {
                return Math.trunc(this.translate / 2 ** 23) * 2 ** 23
            },
            allowSlideNext: h.params.allowSlideNext,
            allowSlidePrev: h.params.allowSlidePrev,
            touchEventsData: {
                isTouched: void 0,
                isMoved: void 0,
                allowTouchCallbacks: void 0,
                touchStartTime: void 0,
                isScrolling: void 0,
                currentTranslate: void 0,
                startTranslate: void 0,
                allowThresholdMove: void 0,
                focusableElements: h.params.focusableElements,
                lastClickTime: 0,
                clickTimeout: void 0,
                velocities: [],
                allowMomentumBounce: void 0,
                startMoving: void 0,
                pointerId: null,
                touchId: null
            },
            allowClick: !0,
            allowTouchMove: h.params.allowTouchMove,
            touches: {
                startX: 0,
                startY: 0,
                currentX: 0,
                currentY: 0,
                diff: 0
            },
            imagesToLoad: [],
            imagesLoaded: 0
        }), h.emit("_swiper"), h.params.init && h.init(), h
    }
    getDirectionLabel(i) {
        return this.isHorizontal() ? i : {
            width: "height",
            "margin-top": "margin-left",
            "margin-bottom ": "margin-right",
            "margin-left": "margin-top",
            "margin-right": "margin-bottom",
            "padding-left": "padding-top",
            "padding-right": "padding-bottom",
            marginRight: "marginBottom"
        }[i]
    }
    getSlideIndex(i) {
        const {
            slidesEl: r,
            params: u
        } = this, o = Ht(r, `.${u.slideClass}, swiper-slide`), f = Yd(o[0]);
        return Yd(i) - f
    }
    getSlideIndexByData(i) {
        return this.getSlideIndex(this.slides.find(r => r.getAttribute("data-swiper-slide-index") * 1 === i))
    }
    getSlideIndexWhenGrid(i) {
        return this.grid && this.params.grid && this.params.grid.rows > 1 && (this.params.grid.fill === "column" ? i = Math.floor(i / this.params.grid.rows) : this.params.grid.fill === "row" && (i = i % Math.ceil(this.slides.length / this.params.grid.rows))), i
    }
    recalcSlides() {
        const i = this,
            {
                slidesEl: r,
                params: u
            } = i;
        i.slides = Ht(r, `.${u.slideClass}, swiper-slide`)
    }
    enable() {
        const i = this;
        i.enabled || (i.enabled = !0, i.params.grabCursor && i.setGrabCursor(), i.emit("enable"))
    }
    disable() {
        const i = this;
        i.enabled && (i.enabled = !1, i.params.grabCursor && i.unsetGrabCursor(), i.emit("disable"))
    }
    setProgress(i, r) {
        const u = this;
        i = Math.min(Math.max(i, 0), 1);
        const o = u.minTranslate(),
            m = (u.maxTranslate() - o) * i + o;
        u.translateTo(m, typeof r > "u" ? 0 : r), u.updateActiveIndex(), u.updateSlidesClasses()
    }
    emitContainerClasses() {
        const i = this;
        if (!i.params._emitClasses || !i.el) return;
        const r = i.el.className.split(" ").filter(u => u.indexOf("swiper") === 0 || u.indexOf(i.params.containerModifierClass) === 0);
        i.emit("_containerClasses", r.join(" "))
    }
    getSlideClasses(i) {
        const r = this;
        return r.destroyed ? "" : i.className.split(" ").filter(u => u.indexOf("swiper-slide") === 0 || u.indexOf(r.params.slideClass) === 0).join(" ")
    }
    emitSlidesClasses() {
        const i = this;
        if (!i.params._emitClasses || !i.el) return;
        const r = [];
        i.slides.forEach(u => {
            const o = i.getSlideClasses(u);
            r.push({
                slideEl: u,
                classNames: o
            }), i.emit("_slideClass", u, o)
        }), i.emit("_slideClasses", r)
    }
    slidesPerViewDynamic(i, r) {
        i === void 0 && (i = "current"), r === void 0 && (r = !1);
        const u = this,
            {
                params: o,
                slides: f,
                slidesGrid: m,
                slidesSizesGrid: h,
                size: v,
                activeIndex: p
            } = u;
        let y = 1;
        if (typeof o.slidesPerView == "number") return o.slidesPerView;
        if (o.centeredSlides) {
            let E = f[p] ? Math.ceil(f[p].swiperSlideSize) : 0,
                S;
            for (let A = p + 1; A < f.length; A += 1) f[A] && !S && (E += Math.ceil(f[A].swiperSlideSize), y += 1, E > v && (S = !0));
            for (let A = p - 1; A >= 0; A -= 1) f[A] && !S && (E += f[A].swiperSlideSize, y += 1, E > v && (S = !0))
        } else if (i === "current")
            for (let E = p + 1; E < f.length; E += 1)(r ? m[E] + h[E] - m[p] < v : m[E] - m[p] < v) && (y += 1);
        else
            for (let E = p - 1; E >= 0; E -= 1) m[p] - m[E] < v && (y += 1);
        return y
    }
    update() {
        const i = this;
        if (!i || i.destroyed) return;
        const {
            snapGrid: r,
            params: u
        } = i;
        u.breakpoints && i.setBreakpoint(), [...i.el.querySelectorAll('[loading="lazy"]')].forEach(m => {
            m.complete && ls(i, m)
        }), i.updateSize(), i.updateSlides(), i.updateProgress(), i.updateSlidesClasses();

        function o() {
            const m = i.rtlTranslate ? i.translate * -1 : i.translate,
                h = Math.min(Math.max(m, i.maxTranslate()), i.minTranslate());
            i.setTranslate(h), i.updateActiveIndex(), i.updateSlidesClasses()
        }
        let f;
        if (u.freeMode && u.freeMode.enabled && !u.cssMode) o(), u.autoHeight && i.updateAutoHeight();
        else {
            if ((u.slidesPerView === "auto" || u.slidesPerView > 1) && i.isEnd && !u.centeredSlides) {
                const m = i.virtual && u.virtual.enabled ? i.virtual.slides : i.slides;
                f = i.slideTo(m.length - 1, 0, !1, !0)
            } else f = i.slideTo(i.activeIndex, 0, !1, !0);
            f || o()
        }
        u.watchOverflow && r !== i.snapGrid && i.checkOverflow(), i.emit("update")
    }
    changeDirection(i, r) {
        r === void 0 && (r = !0);
        const u = this,
            o = u.params.direction;
        return i || (i = o === "horizontal" ? "vertical" : "horizontal"), i === o || i !== "horizontal" && i !== "vertical" || (u.el.classList.remove(`${u.params.containerModifierClass}${o}`), u.el.classList.add(`${u.params.containerModifierClass}${i}`), u.emitContainerClasses(), u.params.direction = i, u.slides.forEach(f => {
            i === "vertical" ? f.style.width = "" : f.style.height = ""
        }), u.emit("changeDirection"), r && u.update()), u
    }
    changeLanguageDirection(i) {
        const r = this;
        r.rtl && i === "rtl" || !r.rtl && i === "ltr" || (r.rtl = i === "rtl", r.rtlTranslate = r.params.direction === "horizontal" && r.rtl, r.rtl ? (r.el.classList.add(`${r.params.containerModifierClass}rtl`), r.el.dir = "rtl") : (r.el.classList.remove(`${r.params.containerModifierClass}rtl`), r.el.dir = "ltr"), r.update())
    }
    mount(i) {
        const r = this;
        if (r.mounted) return !0;
        let u = i || r.params.el;
        if (typeof u == "string" && (u = document.querySelector(u)), !u) return !1;
        u.swiper = r, u.parentNode && u.parentNode.host && u.parentNode.host.nodeName === r.params.swiperElementNodeName.toUpperCase() && (r.isElement = !0);
        const o = () => `.${(r.params.wrapperClass || "").trim().split(" ").join(".")}`;
        let m = u && u.shadowRoot && u.shadowRoot.querySelector ? u.shadowRoot.querySelector(o()) : Ht(u, o())[0];
        return !m && r.params.createElements && (m = is("div", r.params.wrapperClass), u.append(m), Ht(u, `.${r.params.slideClass}`).forEach(h => {
            m.append(h)
        })), Object.assign(r, {
            el: u,
            wrapperEl: m,
            slidesEl: r.isElement && !u.parentNode.host.slideSlots ? u.parentNode.host : m,
            hostEl: r.isElement ? u.parentNode.host : u,
            mounted: !0,
            rtl: u.dir.toLowerCase() === "rtl" || wl(u, "direction") === "rtl",
            rtlTranslate: r.params.direction === "horizontal" && (u.dir.toLowerCase() === "rtl" || wl(u, "direction") === "rtl"),
            wrongRTL: wl(m, "display") === "-webkit-box"
        }), !0
    }
    init(i) {
        const r = this;
        if (r.initialized || r.mount(i) === !1) return r;
        r.emit("beforeInit"), r.params.breakpoints && r.setBreakpoint(), r.addClasses(), r.updateSize(), r.updateSlides(), r.params.watchOverflow && r.checkOverflow(), r.params.grabCursor && r.enabled && r.setGrabCursor(), r.params.loop && r.virtual && r.params.virtual.enabled ? r.slideTo(r.params.initialSlide + r.virtual.slidesBefore, 0, r.params.runCallbacksOnInit, !1, !0) : r.slideTo(r.params.initialSlide, 0, r.params.runCallbacksOnInit, !1, !0), r.params.loop && r.loopCreate(void 0, !0), r.attachEvents();
        const o = [...r.el.querySelectorAll('[loading="lazy"]')];
        return r.isElement && o.push(...r.hostEl.querySelectorAll('[loading="lazy"]')), o.forEach(f => {
            f.complete ? ls(r, f) : f.addEventListener("load", m => {
                ls(r, m.target)
            })
        }), zr(r), r.initialized = !0, zr(r), r.emit("init"), r.emit("afterInit"), r
    }
    destroy(i, r) {
        i === void 0 && (i = !0), r === void 0 && (r = !0);
        const u = this,
            {
                params: o,
                el: f,
                wrapperEl: m,
                slides: h
            } = u;
        return typeof u.params > "u" || u.destroyed || (u.emit("beforeDestroy"), u.initialized = !1, u.detachEvents(), o.loop && u.loopDestroy(), r && (u.removeClasses(), f && typeof f != "string" && f.removeAttribute("style"), m && m.removeAttribute("style"), h && h.length && h.forEach(v => {
            v.classList.remove(o.slideVisibleClass, o.slideFullyVisibleClass, o.slideActiveClass, o.slideNextClass, o.slidePrevClass), v.removeAttribute("style"), v.removeAttribute("data-swiper-slide-index")
        })), u.emit("destroy"), Object.keys(u.eventsListeners).forEach(v => {
            u.off(v)
        }), i !== !1 && (u.el && typeof u.el != "string" && (u.el.swiper = null), av(u)), u.destroyed = !0), null
    }
    static extendDefaults(i) {
        vt(Dr, i)
    }
    static get extendedDefaults() {
        return Dr
    }
    static get defaults() {
        return Rr
    }
    static installModule(i) {
        tl.prototype.__modules__ || (tl.prototype.__modules__ = []);
        const r = tl.prototype.__modules__;
        typeof i == "function" && r.indexOf(i) < 0 && r.push(i)
    }
    static use(i) {
        return Array.isArray(i) ? (i.forEach(r => tl.installModule(r)), tl) : (tl.installModule(i), tl)
    }
};
Object.keys(Mr).forEach(s => {
    Object.keys(Mr[s]).forEach(i => {
        Hr.prototype[i] = Mr[s][i]
    })
});
Hr.use([vv, gv]);
const op = ["eventsPrefix", "injectStyles", "injectStylesUrls", "modules", "init", "_direction", "oneWayMovement", "swiperElementNodeName", "touchEventsTarget", "initialSlide", "_speed", "cssMode", "updateOnWindowResize", "resizeObserver", "nested", "focusableElements", "_enabled", "_width", "_height", "preventInteractionOnTransition", "userAgent", "url", "_edgeSwipeDetection", "_edgeSwipeThreshold", "_freeMode", "_autoHeight", "setWrapperSize", "virtualTranslate", "_effect", "breakpoints", "breakpointsBase", "_spaceBetween", "_slidesPerView", "maxBackfaceHiddenSlides", "_grid", "_slidesPerGroup", "_slidesPerGroupSkip", "_slidesPerGroupAuto", "_centeredSlides", "_centeredSlidesBounds", "_slidesOffsetBefore", "_slidesOffsetAfter", "normalizeSlideIndex", "_centerInsufficientSlides", "_watchOverflow", "roundLengths", "touchRatio", "touchAngle", "simulateTouch", "_shortSwipes", "_longSwipes", "longSwipesRatio", "longSwipesMs", "_followFinger", "allowTouchMove", "_threshold", "touchMoveStopPropagation", "touchStartPreventDefault", "touchStartForcePreventDefault", "touchReleaseOnEdges", "uniqueNavElements", "_resistance", "_resistanceRatio", "_watchSlidesProgress", "_grabCursor", "preventClicks", "preventClicksPropagation", "_slideToClickedSlide", "_loop", "loopAdditionalSlides", "loopAddBlankSlides", "loopPreventsSliding", "_rewind", "_allowSlidePrev", "_allowSlideNext", "_swipeHandler", "_noSwiping", "noSwipingClass", "noSwipingSelector", "passiveListeners", "containerModifierClass", "slideClass", "slideActiveClass", "slideVisibleClass", "slideFullyVisibleClass", "slideNextClass", "slidePrevClass", "slideBlankClass", "wrapperClass", "lazyPreloaderClass", "lazyPreloadPrevNext", "runCallbacksOnInit", "observer", "observeParents", "observeSlideChildren", "a11y", "_autoplay", "_controller", "coverflowEffect", "cubeEffect", "fadeEffect", "flipEffect", "creativeEffect", "cardsEffect", "hashNavigation", "history", "keyboard", "mousewheel", "_navigation", "_pagination", "parallax", "_scrollbar", "_thumbs", "virtual", "zoom", "control"];

function Zl(s) {
    return typeof s == "object" && s !== null && s.constructor && Object.prototype.toString.call(s).slice(8, -1) === "Object" && !s.__swiper__
}

function Ha(s, i) {
    const r = ["__proto__", "constructor", "prototype"];
    Object.keys(i).filter(u => r.indexOf(u) < 0).forEach(u => {
        typeof s[u] > "u" ? s[u] = i[u] : Zl(i[u]) && Zl(s[u]) && Object.keys(i[u]).length > 0 ? i[u].__swiper__ ? s[u] = i[u] : Ha(s[u], i[u]) : s[u] = i[u]
    })
}

function dp(s) {
    return s === void 0 && (s = {}), s.navigation && typeof s.navigation.nextEl > "u" && typeof s.navigation.prevEl > "u"
}

function pp(s) {
    return s === void 0 && (s = {}), s.pagination && typeof s.pagination.el > "u"
}

function hp(s) {
    return s === void 0 && (s = {}), s.scrollbar && typeof s.scrollbar.el > "u"
}

function mp(s) {
    s === void 0 && (s = "");
    const i = s.split(" ").map(u => u.trim()).filter(u => !!u),
        r = [];
    return i.forEach(u => {
        r.indexOf(u) < 0 && r.push(u)
    }), r.join(" ")
}

function _g(s) {
    return s === void 0 && (s = ""), s ? s.includes("swiper-wrapper") ? s : `swiper-wrapper ${s}` : "swiper-wrapper"
}

function Tg(s) {
    let {
        swiper: i,
        slides: r,
        passedParams: u,
        changedParams: o,
        nextEl: f,
        prevEl: m,
        scrollbarEl: h,
        paginationEl: v
    } = s;
    const p = o.filter(M => M !== "children" && M !== "direction" && M !== "wrapperClass"),
        {
            params: y,
            pagination: E,
            navigation: S,
            scrollbar: A,
            virtual: O,
            thumbs: V
        } = i;
    let K, R, Y, Q, F, G, ee, ae;
    o.includes("thumbs") && u.thumbs && u.thumbs.swiper && !u.thumbs.swiper.destroyed && y.thumbs && (!y.thumbs.swiper || y.thumbs.swiper.destroyed) && (K = !0), o.includes("controller") && u.controller && u.controller.control && y.controller && !y.controller.control && (R = !0), o.includes("pagination") && u.pagination && (u.pagination.el || v) && (y.pagination || y.pagination === !1) && E && !E.el && (Y = !0), o.includes("scrollbar") && u.scrollbar && (u.scrollbar.el || h) && (y.scrollbar || y.scrollbar === !1) && A && !A.el && (Q = !0), o.includes("navigation") && u.navigation && (u.navigation.prevEl || m) && (u.navigation.nextEl || f) && (y.navigation || y.navigation === !1) && S && !S.prevEl && !S.nextEl && (F = !0);
    const H = M => {
        i[M] && (i[M].destroy(), M === "navigation" ? (i.isElement && (i[M].prevEl.remove(), i[M].nextEl.remove()), y[M].prevEl = void 0, y[M].nextEl = void 0, i[M].prevEl = void 0, i[M].nextEl = void 0) : (i.isElement && i[M].el.remove(), y[M].el = void 0, i[M].el = void 0))
    };
    o.includes("loop") && i.isElement && (y.loop && !u.loop ? G = !0 : !y.loop && u.loop ? ee = !0 : ae = !0), p.forEach(M => {
        if (Zl(y[M]) && Zl(u[M])) Object.assign(y[M], u[M]), (M === "navigation" || M === "pagination" || M === "scrollbar") && "enabled" in u[M] && !u[M].enabled && H(M);
        else {
            const z = u[M];
            (z === !0 || z === !1) && (M === "navigation" || M === "pagination" || M === "scrollbar") ? z === !1 && H(M) : y[M] = u[M]
        }
    }), p.includes("controller") && !R && i.controller && i.controller.control && y.controller && y.controller.control && (i.controller.control = y.controller.control), o.includes("children") && r && O && y.virtual.enabled ? (O.slides = r, O.update(!0)) : o.includes("virtual") && O && y.virtual.enabled && (r && (O.slides = r), O.update(!0)), o.includes("children") && r && y.loop && (ae = !0), K && V.init() && V.update(!0), R && (i.controller.control = y.controller.control), Y && (i.isElement && (!v || typeof v == "string") && (v = document.createElement("div"), v.classList.add("swiper-pagination"), v.part.add("pagination"), i.el.appendChild(v)), v && (y.pagination.el = v), E.init(), E.render(), E.update()), Q && (i.isElement && (!h || typeof h == "string") && (h = document.createElement("div"), h.classList.add("swiper-scrollbar"), h.part.add("scrollbar"), i.el.appendChild(h)), h && (y.scrollbar.el = h), A.init(), A.updateSize(), A.setTranslate()), F && (i.isElement && ((!f || typeof f == "string") && (f = document.createElement("div"), f.classList.add("swiper-button-next"), Xd(f, i.hostEl.constructor.nextButtonSvg), f.part.add("button-next"), i.el.appendChild(f)), (!m || typeof m == "string") && (m = document.createElement("div"), m.classList.add("swiper-button-prev"), Xd(m, i.hostEl.constructor.prevButtonSvg), m.part.add("button-prev"), i.el.appendChild(m))), f && (y.navigation.nextEl = f), m && (y.navigation.prevEl = m), S.init(), S.update()), o.includes("allowSlideNext") && (i.allowSlideNext = u.allowSlideNext), o.includes("allowSlidePrev") && (i.allowSlidePrev = u.allowSlidePrev), o.includes("direction") && i.changeDirection(u.direction, !1), (G || ae) && i.loopDestroy(), (ee || ae) && i.loopCreate(), i.update()
}

function Og(s, i) {
    s === void 0 && (s = {}), i === void 0 && (i = !0);
    const r = {
        on: {}
    },
        u = {},
        o = {};
    Ha(r, Rr), r._emitClasses = !0, r.init = !1;
    const f = {},
        m = op.map(v => v.replace(/_/, "")),
        h = Object.assign({}, s);
    return Object.keys(h).forEach(v => {
        typeof s[v] > "u" || (m.indexOf(v) >= 0 ? Zl(s[v]) ? (r[v] = {}, o[v] = {}, Ha(r[v], s[v]), Ha(o[v], s[v])) : (r[v] = s[v], o[v] = s[v]) : v.search(/on[A-Z]/) === 0 && typeof s[v] == "function" ? i ? u[`${v[2].toLowerCase()}${v.substr(3)}`] = s[v] : r.on[`${v[2].toLowerCase()}${v.substr(3)}`] = s[v] : f[v] = s[v])
    }), ["navigation", "pagination", "scrollbar"].forEach(v => {
        r[v] === !0 && (r[v] = {}), r[v] === !1 && delete r[v]
    }), {
        params: r,
        passedParams: o,
        rest: f,
        events: u
    }
}

function xg(s, i) {
    let {
        el: r,
        nextEl: u,
        prevEl: o,
        paginationEl: f,
        scrollbarEl: m,
        swiper: h
    } = s;
    dp(i) && u && o && (h.params.navigation.nextEl = u, h.originalParams.navigation.nextEl = u, h.params.navigation.prevEl = o, h.originalParams.navigation.prevEl = o), pp(i) && f && (h.params.pagination.el = f, h.originalParams.pagination.el = f), hp(i) && m && (h.params.scrollbar.el = m, h.originalParams.scrollbar.el = m), h.init(r)
}

function wg(s, i, r, u, o) {
    const f = [];
    if (!i) return f;
    const m = v => {
        f.indexOf(v) < 0 && f.push(v)
    };
    if (r && u) {
        const v = u.map(o),
            p = r.map(o);
        v.join("") !== p.join("") && m("children"), u.length !== r.length && m("children")
    }
    return op.filter(v => v[0] === "_").map(v => v.replace(/_/, "")).forEach(v => {
        if (v in s && v in i)
            if (Zl(s[v]) && Zl(i[v])) {
                const p = Object.keys(s[v]),
                    y = Object.keys(i[v]);
                p.length !== y.length ? m(v) : (p.forEach(E => {
                    s[v][E] !== i[v][E] && m(v)
                }), y.forEach(E => {
                    s[v][E] !== i[v][E] && m(v)
                }))
            } else s[v] !== i[v] && m(v)
    }), f
}
const Ag = s => {
    !s || s.destroyed || !s.params.virtual || s.params.virtual && !s.params.virtual.enabled || (s.updateSlides(), s.updateProgress(), s.updateSlidesClasses(), s.emit("_virtualUpdated"), s.parallax && s.params.parallax && s.params.parallax.enabled && s.parallax.setTranslate())
};

function ss() {
    return ss = Object.assign ? Object.assign.bind() : function (s) {
        for (var i = 1; i < arguments.length; i++) {
            var r = arguments[i];
            for (var u in r) Object.prototype.hasOwnProperty.call(r, u) && (s[u] = r[u])
        }
        return s
    }, ss.apply(this, arguments)
}

function vp(s) {
    return s.type && s.type.displayName && s.type.displayName.includes("SwiperSlide")
}

function gp(s) {
    const i = [];
    return qe.Children.toArray(s).forEach(r => {
        vp(r) ? i.push(r) : r.props && r.props.children && gp(r.props.children).forEach(u => i.push(u))
    }), i
}

function Cg(s) {
    const i = [],
        r = {
            "container-start": [],
            "container-end": [],
            "wrapper-start": [],
            "wrapper-end": []
        };
    return qe.Children.toArray(s).forEach(u => {
        if (vp(u)) i.push(u);
        else if (u.props && u.props.slot && r[u.props.slot]) r[u.props.slot].push(u);
        else if (u.props && u.props.children) {
            const o = gp(u.props.children);
            o.length > 0 ? o.forEach(f => i.push(f)) : r["container-end"].push(u)
        } else r["container-end"].push(u)
    }), {
        slides: i,
        slots: r
    }
}

function Ng(s, i, r) {
    if (!r) return null;
    const u = y => {
        let E = y;
        return y < 0 ? E = i.length + y : E >= i.length && (E = E - i.length), E
    },
        o = s.isHorizontal() ? {
            [s.rtlTranslate ? "right" : "left"]: `${r.offset}px`
        } : {
            top: `${r.offset}px`
        },
        {
            from: f,
            to: m
        } = r,
        h = s.params.loop ? -i.length : 0,
        v = s.params.loop ? i.length * 2 : i.length,
        p = [];
    for (let y = h; y < v; y += 1) y >= f && y <= m && p.push(i[u(y)]);
    return p.map((y, E) => qe.cloneElement(y, {
        swiper: s,
        style: o,
        key: y.props.virtualIndex || y.key || `slide-${E}`
    }))
}

function Gn(s, i) {
    return typeof window > "u" ? fe.useEffect(s, i) : fe.useLayoutEffect(s, i)
}
const Pd = fe.createContext(null),
    Mg = fe.createContext(null),
    yp = fe.forwardRef(function (s, i) {
        let {
            className: r,
            tag: u = "div",
            wrapperTag: o = "div",
            children: f,
            onSwiper: m,
            ...h
        } = s === void 0 ? {} : s, v = !1;
        const [p, y] = fe.useState("swiper"), [E, S] = fe.useState(null), [A, O] = fe.useState(!1), V = fe.useRef(!1), K = fe.useRef(null), R = fe.useRef(null), Y = fe.useRef(null), Q = fe.useRef(null), F = fe.useRef(null), G = fe.useRef(null), ee = fe.useRef(null), ae = fe.useRef(null), {
            params: H,
            passedParams: M,
            rest: z,
            events: j
        } = Og(h), {
            slides: P,
            slots: re
        } = Cg(f), _e = () => {
            O(!A)
        };
        Object.assign(H.on, {
            _containerClasses(le, _) {
                y(_)
            }
        });
        const oe = () => {
            Object.assign(H.on, j), v = !0;
            const le = {
                ...H
            };
            if (delete le.wrapperClass, R.current = new Hr(le), R.current.virtual && R.current.params.virtual.enabled) {
                R.current.virtual.slides = P;
                const _ = {
                    cache: !1,
                    slides: P,
                    renderExternal: S,
                    renderExternalUpdate: !1
                };
                Ha(R.current.params.virtual, _), Ha(R.current.originalParams.virtual, _)
            }
        };
        K.current || oe(), R.current && R.current.on("_beforeBreakpoint", _e);
        const C = () => {
            v || !j || !R.current || Object.keys(j).forEach(le => {
                R.current.on(le, j[le])
            })
        },
            Z = () => {
                !j || !R.current || Object.keys(j).forEach(le => {
                    R.current.off(le, j[le])
                })
            };
        fe.useEffect(() => () => {
            R.current && R.current.off("_beforeBreakpoint", _e)
        }), fe.useEffect(() => {
            !V.current && R.current && (R.current.emitSlidesClasses(), V.current = !0)
        }), Gn(() => {
            if (i && (i.current = K.current), !!K.current) return R.current.destroyed && oe(), xg({
                el: K.current,
                nextEl: F.current,
                prevEl: G.current,
                paginationEl: ee.current,
                scrollbarEl: ae.current,
                swiper: R.current
            }, H), m && !R.current.destroyed && m(R.current), () => {
                R.current && !R.current.destroyed && R.current.destroy(!0, !1)
            }
        }, []), Gn(() => {
            C();
            const le = wg(M, Y.current, P, Q.current, _ => _.key);
            return Y.current = M, Q.current = P, le.length && R.current && !R.current.destroyed && Tg({
                swiper: R.current,
                slides: P,
                passedParams: M,
                changedParams: le,
                nextEl: F.current,
                prevEl: G.current,
                scrollbarEl: ae.current,
                paginationEl: ee.current
            }), () => {
                Z()
            }
        }), Gn(() => {
            Ag(R.current)
        }, [E]);

        function k() {
            return H.virtual ? Ng(R.current, P, E) : P.map((le, _) => qe.cloneElement(le, {
                swiper: R.current,
                swiperSlideIndex: _
            }))
        }
        return qe.createElement(u, ss({
            ref: K,
            className: mp(`${p}${r ? ` ${r}` : ""}`)
        }, z), qe.createElement(Mg.Provider, {
            value: R.current
        }, re["container-start"], qe.createElement(o, {
            className: _g(H.wrapperClass)
        }, re["wrapper-start"], k(), re["wrapper-end"]), dp(H) && qe.createElement(qe.Fragment, null, qe.createElement("div", {
            ref: G,
            className: "swiper-button-prev"
        }), qe.createElement("div", {
            ref: F,
            className: "swiper-button-next"
        })), hp(H) && qe.createElement("div", {
            ref: ae,
            className: "swiper-scrollbar"
        }), pp(H) && qe.createElement("div", {
            ref: ee,
            className: "swiper-pagination"
        }), re["container-end"]))
    });
yp.displayName = "Swiper";
const Ur = fe.forwardRef(function (s, i) {
    let {
        tag: r = "div",
        children: u,
        className: o = "",
        swiper: f,
        zoom: m,
        lazy: h,
        virtualIndex: v,
        swiperSlideIndex: p,
        ...y
    } = s === void 0 ? {} : s;
    const E = fe.useRef(null),
        [S, A] = fe.useState("swiper-slide"),
        [O, V] = fe.useState(!1);

    function K(F, G, ee) {
        G === E.current && A(ee)
    }
    Gn(() => {
        if (typeof p < "u" && (E.current.swiperSlideIndex = p), i && (i.current = E.current), !(!E.current || !f)) {
            if (f.destroyed) {
                S !== "swiper-slide" && A("swiper-slide");
                return
            }
            return f.on("_slideClass", K), () => {
                f && f.off("_slideClass", K)
            }
        }
    }), Gn(() => {
        f && E.current && !f.destroyed && A(f.getSlideClasses(E.current))
    }, [f]);
    const R = {
        isActive: S.indexOf("swiper-slide-active") >= 0,
        isVisible: S.indexOf("swiper-slide-visible") >= 0,
        isPrev: S.indexOf("swiper-slide-prev") >= 0,
        isNext: S.indexOf("swiper-slide-next") >= 0
    },
        Y = () => typeof u == "function" ? u(R) : u,
        Q = () => {
            V(!0)
        };
    return qe.createElement(r, ss({
        ref: E,
        className: mp(`${S}${o ? ` ${o}` : ""}`),
        "data-swiper-slide-index": v,
        onLoad: Q
    }, y), m && qe.createElement(Pd.Provider, {
        value: R
    }, qe.createElement("div", {
        className: "swiper-zoom-container",
        "data-swiper-zoom": typeof m == "number" ? m : void 0
    }, Y(), h && !O && qe.createElement("div", {
        className: "swiper-lazy-preloader"
    }))), !m && qe.createElement(Pd.Provider, {
        value: R
    }, Y(), h && !O && qe.createElement("div", {
        className: "swiper-lazy-preloader"
    })))
});
Ur.displayName = "SwiperSlide";

function Dg(s, i, r, u) {
    return s.params.createElements && Object.keys(u).forEach(o => {
        if (!r[o] && r.auto === !0) {
            let f = Ht(s.el, `.${u[o]}`)[0];
            f || (f = is("div", u[o]), f.className = u[o], s.el.append(f)), r[o] = f, i[o] = f
        }
    }), r
}

function zg(s) {
    let {
        swiper: i,
        extendParams: r,
        on: u,
        emit: o
    } = s;
    r({
        navigation: {
            nextEl: null,
            prevEl: null,
            hideOnClick: !1,
            disabledClass: "swiper-button-disabled",
            hiddenClass: "swiper-button-hidden",
            lockClass: "swiper-button-lock",
            navigationDisabledClass: "swiper-navigation-disabled"
        }
    }), i.navigation = {
        nextEl: null,
        prevEl: null
    };

    function f(O) {
        let V;
        return O && typeof O == "string" && i.isElement && (V = i.el.querySelector(O) || i.hostEl.querySelector(O), V) ? V : (O && (typeof O == "string" && (V = [...document.querySelectorAll(O)]), i.params.uniqueNavElements && typeof O == "string" && V && V.length > 1 && i.el.querySelectorAll(O).length === 1 ? V = i.el.querySelector(O) : V && V.length === 1 && (V = V[0])), O && !V ? O : V)
    }

    function m(O, V) {
        const K = i.params.navigation;
        O = el(O), O.forEach(R => {
            R && (R.classList[V ? "add" : "remove"](...K.disabledClass.split(" ")), R.tagName === "BUTTON" && (R.disabled = V), i.params.watchOverflow && i.enabled && R.classList[i.isLocked ? "add" : "remove"](K.lockClass))
        })
    }

    function h() {
        const {
            nextEl: O,
            prevEl: V
        } = i.navigation;
        if (i.params.loop) {
            m(V, !1), m(O, !1);
            return
        }
        m(V, i.isBeginning && !i.params.rewind), m(O, i.isEnd && !i.params.rewind)
    }

    function v(O) {
        O.preventDefault(), !(i.isBeginning && !i.params.loop && !i.params.rewind) && (i.slidePrev(), o("navigationPrev"))
    }

    function p(O) {
        O.preventDefault(), !(i.isEnd && !i.params.loop && !i.params.rewind) && (i.slideNext(), o("navigationNext"))
    }

    function y() {
        const O = i.params.navigation;
        if (i.params.navigation = Dg(i, i.originalParams.navigation, i.params.navigation, {
            nextEl: "swiper-button-next",
            prevEl: "swiper-button-prev"
        }), !(O.nextEl || O.prevEl)) return;
        let V = f(O.nextEl),
            K = f(O.prevEl);
        Object.assign(i.navigation, {
            nextEl: V,
            prevEl: K
        }), V = el(V), K = el(K);
        const R = (Y, Q) => {
            Y && Y.addEventListener("click", Q === "next" ? p : v), !i.enabled && Y && Y.classList.add(...O.lockClass.split(" "))
        };
        V.forEach(Y => R(Y, "next")), K.forEach(Y => R(Y, "prev"))
    }

    function E() {
        let {
            nextEl: O,
            prevEl: V
        } = i.navigation;
        O = el(O), V = el(V);
        const K = (R, Y) => {
            R.removeEventListener("click", Y === "next" ? p : v), R.classList.remove(...i.params.navigation.disabledClass.split(" "))
        };
        O.forEach(R => K(R, "next")), V.forEach(R => K(R, "prev"))
    }
    u("init", () => {
        i.params.navigation.enabled === !1 ? A() : (y(), h())
    }), u("toEdge fromEdge lock unlock", () => {
        h()
    }), u("destroy", () => {
        E()
    }), u("enable disable", () => {
        let {
            nextEl: O,
            prevEl: V
        } = i.navigation;
        if (O = el(O), V = el(V), i.enabled) {
            h();
            return
        } [...O, ...V].filter(K => !!K).forEach(K => K.classList.add(i.params.navigation.lockClass))
    }), u("click", (O, V) => {
        let {
            nextEl: K,
            prevEl: R
        } = i.navigation;
        K = el(K), R = el(R);
        const Y = V.target;
        let Q = R.includes(Y) || K.includes(Y);
        if (i.isElement && !Q) {
            const F = V.path || V.composedPath && V.composedPath();
            F && (Q = F.find(G => K.includes(G) || R.includes(G)))
        }
        if (i.params.navigation.hideOnClick && !Q) {
            if (i.pagination && i.params.pagination && i.params.pagination.clickable && (i.pagination.el === Y || i.pagination.el.contains(Y))) return;
            let F;
            K.length ? F = K[0].classList.contains(i.params.navigation.hiddenClass) : R.length && (F = R[0].classList.contains(i.params.navigation.hiddenClass)), o(F === !0 ? "navigationShow" : "navigationHide"), [...K, ...R].filter(G => !!G).forEach(G => G.classList.toggle(i.params.navigation.hiddenClass))
        }
    });
    const S = () => {
        i.el.classList.remove(...i.params.navigation.navigationDisabledClass.split(" ")), y(), h()
    },
        A = () => {
            i.el.classList.add(...i.params.navigation.navigationDisabledClass.split(" ")), E()
        };
    Object.assign(i.navigation, {
        enable: S,
        disable: A,
        update: h,
        init: y,
        destroy: E
    })
}

function Rg(s) {
    const {
        effect: i,
        swiper: r,
        on: u,
        setTranslate: o,
        setTransition: f,
        overwriteParams: m,
        perspective: h,
        recreateShadows: v,
        getEffectParams: p
    } = s;
    u("beforeInit", () => {
        if (r.params.effect !== i) return;
        r.classNames.push(`${r.params.containerModifierClass}${i}`), h && h() && r.classNames.push(`${r.params.containerModifierClass}3d`);
        const E = m ? m() : {};
        Object.assign(r.params, E), Object.assign(r.originalParams, E)
    }), u("setTranslate _virtualUpdated", () => {
        r.params.effect === i && o()
    }), u("setTransition", (E, S) => {
        r.params.effect === i && f(S)
    }), u("transitionEnd", () => {
        if (r.params.effect === i && v) {
            if (!p || !p().slideShadows) return;
            r.slides.forEach(E => {
                E.querySelectorAll(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").forEach(S => S.remove())
            }), v()
        }
    });
    let y;
    u("virtualUpdate", () => {
        r.params.effect === i && (r.slides.length || (y = !0), requestAnimationFrame(() => {
            y && r.slides && r.slides.length && (o(), y = !1)
        }))
    })
}

function Ug(s, i) {
    const r = ip(i);
    return r !== i && (r.style.backfaceVisibility = "hidden", r.style["-webkit-backface-visibility"] = "hidden"), r
}

function Lg(s) {
    let {
        swiper: i,
        duration: r,
        transformElements: u
    } = s;
    const {
        activeIndex: o
    } = i;
    if (i.params.virtualTranslate && r !== 0) {
        let f = !1,
            m;
        m = u, m.forEach(h => {
            dv(h, () => {
                if (f || !i || i.destroyed) return;
                f = !0, i.animating = !1;
                const v = new window.CustomEvent("transitionend", {
                    bubbles: !0,
                    cancelable: !0
                });
                i.wrapperEl.dispatchEvent(v)
            })
        })
    }
}

function Hg(s) {
    let {
        swiper: i,
        extendParams: r,
        on: u
    } = s;
    r({
        fadeEffect: {
            crossFade: !1
        }
    }), Rg({
        effect: "fade",
        swiper: i,
        on: u,
        setTranslate: () => {
            const {
                slides: m
            } = i, h = i.params.fadeEffect;
            for (let v = 0; v < m.length; v += 1) {
                const p = i.slides[v];
                let E = -p.swiperSlideOffset;
                i.params.virtualTranslate || (E -= i.translate);
                let S = 0;
                i.isHorizontal() || (S = E, E = 0);
                const A = i.params.fadeEffect.crossFade ? Math.max(1 - Math.abs(p.progress), 0) : 1 + Math.min(Math.max(p.progress, -1), 0),
                    O = Ug(h, p);
                O.style.opacity = A, O.style.transform = `translate3d(${E}px, ${S}px, 0px)`
            }
        },
        setTransition: m => {
            const h = i.slides.map(v => ip(v));
            h.forEach(v => {
                v.style.transitionDuration = `${m}ms`
            }), Lg({
                swiper: i,
                duration: m,
                transformElements: h
            })
        },
        overwriteParams: () => ({
            slidesPerView: 1,
            slidesPerGroup: 1,
            watchSlidesProgress: !0,
            spaceBetween: 0,
            virtualTranslate: !i.params.cssMode
        })
    })
}

function Vg({
    selectModel: s,
    selectOption: i,
    selectColor: r,
    setSelectColor: u,
    selectMachine: o
}) {
    const f = h => {
        const v = h;
        u(s.colors.find(p => p.ID == v))
    },
        m = h => !h || Object.keys(h).length === 0;
    return x.jsxs("div", {
        className: "conf-widget__slider margin_b_m",
        children: [s.colors?.length > 1 && x.jsxs(x.Fragment, {
            children: [x.jsxs("div", {
                className: "conf-widget__color-selected",
                children: [x.jsx("span", {
                    className: "conf-widget__color-tagline",
                    children: "Выбранный цвет: "
                }), x.jsx("span", {
                    className: "conf-widget__color",
                    style: {
                        color: r.UF_VEHICLE_COLOR_CODE
                    },
                    children: r.UF_VEHICLE_COLOR_NAME
                })]
            }), x.jsx("div", {
                className: "conf-widget__color-list margin_b_s",
                children: s.colors.sort((h, v) => h.UF_VEHICLE_COLOR_SORT - v.UF_VEHICLE_COLOR_SORT).map(h => x.jsxs("label", {
                    className: "conf-widget__color-item",
                    children: [x.jsx("input", {
                        className: "radio__input",
                        type: "radio",
                        name: "confColor",
                        checked: h.UF_VEHICLE_COLOR_CODE == r.UF_VEHICLE_COLOR_CODE,
                        onChange: () => f(h.ID)
                    }), x.jsx("span", {
                        className: "conf-widget__color-radiobox",
                        children: x.jsx("span", {
                            style: {
                                background: h.UF_VEHICLE_COLOR_CODE
                            }
                        })
                    })]
                }, h.ID))
            })]
        }), x.jsxs(yp, {
            className: "swiper conf-widget__swiper margin_b_s",
            navigation: {
                nextEl: ".conf-widget__arrows-next",
                prevEl: ".conf-widget__arrows-prev"
            },
            modules: [zg, Hg],
            effect: "fade",
            loop: "true",
            fadeEffect: {
                crossFade: !0
            },
            allowTouchMove: !1,
            children: [x.jsxs(Ur, {
                className: "conf-widget__slide",
                children: [x.jsx("img", {
                    className: "conf-layers__img-bg",
                    src: o.PROPERTY_IMG_BG
                }), x.jsx("img", {
                    className: "conf-layers__img",
                    src: r.UF_VEHICLE_COLOR_FRONT
                }), !m(i) && i.map((h, v) => {
                    if (h.UF_VEHICLE_OPTION_IS_CUNG == 1) return x.jsx("img", {
                        className: "conf-layers__img kung",
                        style: {
                            zIndex: h.UF_VEHICLE_OPTION_IMG_ZINDEX
                        },
                        src: r.UF_VEHICLE_COLOR_KUNG_FRONT
                    }, `${v}_front_${h.ID}`);
                    if (h.UF_VEHICLE_OPTION_IMG_FRONT != "https://tinger.ru") return x.jsx("img", {
                        className: "conf-layers__img",
                        style: {
                            zIndex: h.UF_VEHICLE_OPTION_IMG_ZINDEX
                        },
                        src: h.UF_VEHICLE_OPTION_IMG_FRONT
                    }, `${v}_front_${h.ID}`)
                })]
            }), r.UF_VEHICLE_COLOR_BACK != "https://tinger.ru" && x.jsxs(Ur, {
                className: "conf-widget__slide",
                children: [x.jsx("img", {
                    className: "conf-layers__img-bg",
                    src: "https://tinger.ru/local/templates/tinger/img/conf/transparent-bg.png"
                }), x.jsx("img", {
                    className: "conf-layers__img",
                    src: r.UF_VEHICLE_COLOR_BACK
                }), !m(i) && i.map((h, v) => {
                    if (h.UF_VEHICLE_OPTION_IS_CUNG == 1) return x.jsx("img", {
                        className: "conf-layers__img",
                        style: {
                            zIndex: h.UF_VEHICLE_OPTION_IMG_ZINDEX
                        },
                        src: r.UF_VEHICLE_COLOR_KUNG_BACK
                    }, `${v}_front_${h.ID}`);
                    if (h.UF_VEHICLE_OPTION_IMG_BACK != "https://tinger.ru") {
                        const p = h.UF_VEHICLE_OPTION_IMG_ZINDEX_BACK ? h.UF_VEHICLE_OPTION_IMG_ZINDEX_BACK : h.UF_VEHICLE_OPTION_IMG_ZINDEX;
                        return x.jsx("img", {
                            className: "conf-layers__img",
                            style: {
                                zIndex: p
                            },
                            src: h.UF_VEHICLE_OPTION_IMG_BACK
                        }, `${v}_back_${h.ID}`)
                    }
                })]
            })]
        }), r.UF_VEHICLE_COLOR_BACK != "https://tinger.ru" && x.jsxs("div", {
            className: "arrows conf-widget__arrows",
            children: [x.jsx("button", {
                className: "conf-widget__arrows-prev arrows__btn",
                children: x.jsx("img", {
                    className: "arrows__img",
                    src: "/local/templates/tinger/img/arrow-prev.svg",
                    alt: "Стрелка назад"
                })
            }), x.jsx("button", {
                className: "conf-widget__arrows-next arrows__btn",
                children: x.jsx("img", {
                    className: "arrows__img",
                    src: "/local/templates/tinger/img/arrow-next.svg",
                    alt: "Стрелка вперёд"
                })
            })]
        })]
    })
}

function La(s, i, r, u, o) {
    let f = [...r];
    const m = parseInt(s.ID),
        h = Ua(s.UF_VEHICLE_OPTION_BUNDELS),
        v = Ua(s.UF_VEHICLE_DELETE_OPTIONS),
        p = Ua(s.UF_VEHICLE_OPTION_BUNDELS_EXCLUDE_MULTI),
        y = Ua(s.UF_VEHICLE_OPTION_BLOCKED);
    return i ? (f.some(E => parseInt(E.ID) === m) || f.push({
        ...s,
        setautomatic: o
    }), y.forEach(E => {
        const S = u.options.find(A => parseInt(A.ID) === E);
        S && (S.disabled = !0)
    }), h.forEach(E => {
        const S = u.options.find(A => parseInt(A.ID) === E);
        S && (f.some(A => parseInt(A.ID) === parseInt(S.ID)) ? S.disabled = !0 : (S.disabled = !0, f.push({
            ...S
        }), f = La(S, !0, f, u, !0)))
    }), p.forEach(E => {
        const S = u.options.find(A => parseInt(A.ID) === E);
        S && (f = La(S, !1, f, u, !0))
    }), Jd(v, "off", u), v.forEach(E => {
        f = f.filter(S => parseInt(S.ID) != E)
    })) : (f = f.filter(E => parseInt(E.ID) !== m), y.forEach(E => {
        const S = u.options.find(A => parseInt(A.ID) === E);
        S && (S.disabled = !1)
    }), h.forEach(E => {
        const S = u.options.find(A => parseInt(A.ID) === E);
        if (S && !f.some(O => Ua(O.UF_VEHICLE_OPTION_BUNDELS).includes(parseInt(E)))) {
            S.disabled = !1;
            let O = f.find(V => parseInt(V.ID) === E);
            O && O.setautomatic !== !1 && (f = La(O, !1, f, u, !1))
        }
    }), o || p.forEach(E => {
        const S = u.options.find(A => parseInt(A.ID) === E);
        S && s.UF_VEHICLE_OPTION_IS_SHINI == 1 && (f = La(S, !0, f, u, !0))
    }), Jd(v, "on", u)), f
}
const Jd = (s, i, r) => {
    const u = Ua(s);
    u.length && u.forEach(o => {
        if (i === "off") {
            const f = r.options.find(m => parseInt(m.ID) === o);
            f && (f.hidden = 1)
        } else {
            const f = r.options.find(m => parseInt(m.ID) === o);
            f && (f.hidden = 0)
        }
    })
},
    Ua = s => s ? Array.isArray(s) ? s.map(i => parseInt(i)) : typeof s == "string" ? s.split(",").map(i => parseInt(i)) : [parseInt(s)] : [];

function jg({
    selectModel: s,
    selectOption: i,
    selectColor: r,
    setSelectOption: u
}) {
    const o = f => m => {
        const {
            checked: h
        } = m.target, v = s.options.find(p => parseInt(p.ID) === parseInt(f));
        v && u(p => La(v, h, p, s, !1))
    };
    return x.jsx("div", {
        className: "conf-widget__options",
        children: s.options.filter(f => f.hidden !== 1).map(f => {
            const m = i.some(v => parseInt(v.ID) === parseInt(f.ID)),
                h = f.UF_VEHICLE_OPTION_BASE == 1 || f.disabled == !0;
            return x.jsxs("label", {
                className: "conf-widget__options-item conf-widget__options-item_type_with-img",
                children: [x.jsx("input", {
                    type: "checkbox",
                    name: f.UF_VEHICLE_OPTION_NAME,
                    className: "checkbox__input",
                    disabled: h,
                    checked: m,
                    onChange: o(f.ID)
                }), x.jsxs("span", {
                    className: "checkbox__container",
                    children: [x.jsx("span", {
                        className: "checkbox__img-container",
                        children: f.UF_VEHICLE_OPTION_IMG !== "https://tinger.ru" ? x.jsx("img", {
                            className: "checkbox__img",
                            src: f.UF_VEHICLE_OPTION_IMG,
                            alt: f.UF_VEHICLE_OPTION_NAME
                        }) : x.jsx("svg", {
                            version: "1.1",
                            id: "Layer_1",
                            xmlns: "http://www.w3.org/2000/svg",
                            "xmlns:xlink": "http://www.w3.org/1999/xlink",
                            width: "40px",
                            height: "40px",
                            viewBox: "0 0 120 120",
                            "enable-background": "new 0 0 120 120",
                            "xml:space": "preserve",
                            children: x.jsx("path", {
                                fill: "#00994e",
                                d: `M114.251,70.731c2.211,0,4.271-1.793,4.572-3.985c0,0,0.422-3.081,0.422-6.745s-0.422-6.745-0.422-6.745
                    c-0.304-2.193-2.361-3.986-4.572-3.986h-11.433c-2.214,0-4.512-1.411-5.106-3.135s-1.414-7.255,0.151-8.819l8.08-8.081
                    c1.564-1.565,1.686-4.236,0.269-5.937l-9.507-9.51c-1.701-1.418-4.371-1.298-5.938,0.268l-8.08,8.081
                    c-1.564,1.566-4.173,2.196-5.793,1.402c-1.62-0.794-6.163-4.143-6.163-6.356V5.75c0-2.213-1.794-4.271-3.985-4.572
                    c0,0-3.081-0.424-6.745-0.424s-6.745,0.424-6.745,0.424c-2.193,0.301-3.988,2.359-3.988,4.572v11.433
                    c0,2.213-1.41,4.511-3.135,5.106c-1.725,0.595-7.255,1.414-8.82-0.151l-8.081-8.081c-1.565-1.565-4.236-1.686-5.936-0.269
                    l-9.509,9.509c-1.418,1.701-1.298,4.371,0.268,5.937l8.08,8.081c1.565,1.565,2.197,4.172,1.402,5.792
                    c-0.795,1.62-4.143,6.163-6.356,6.163H5.75c-2.213,0-4.271,1.794-4.573,3.986c0,0-0.424,3.081-0.424,6.744
                    c0,3.665,0.424,6.744,0.424,6.744c0.301,2.194,2.359,3.987,4.573,3.987h11.433c2.213,0,4.511,1.409,5.105,3.135
                    c0.595,1.725,1.414,7.254-0.152,8.818l-8.08,8.081c-1.565,1.565-1.686,4.236-0.268,5.938l9.508,9.509
                    c1.701,1.417,4.37,1.299,5.936-0.269l8.081-8.08c1.565-1.564,4.172-2.195,5.793-1.401c1.621,0.794,6.162,4.143,6.162,6.355v11.433
                    c0,2.212,1.794,4.27,3.988,4.57c0,0,3.08,0.424,6.745,0.424c3.665,0,6.745-0.424,6.745-0.424c2.193-0.301,3.985-2.358,3.985-4.57
                    v-11.433c0-2.213,1.411-4.512,3.136-5.106c1.726-0.595,7.256-1.413,8.82,0.151l8.08,8.081c1.565,1.563,4.236,1.686,5.938,0.268
                    l9.507-9.506c1.417-1.701,1.299-4.37-0.269-5.938l-8.08-8.08c-1.565-1.564-2.197-4.172-1.401-5.793
                    c0.794-1.62,4.143-6.163,6.355-6.163H114.251z M60,81.687c-11.977,0-21.686-9.707-21.686-21.687
                    c0-11.976,9.709-21.686,21.686-21.686c11.977,0,21.687,9.709,21.687,21.686C81.687,71.977,71.977,81.687,60,81.687z`
                            })
                        })
                    }), x.jsx("span", {
                        className: "checkbox"
                    }), x.jsxs("span", {
                        className: "checkbox__text",
                        children: [x.jsx("span", {
                            children: f.UF_VEHICLE_OPTION_NAME
                        }), x.jsx("span", {
                            className: "checkbox__text-clarification",
                            children: f.UF_VEHICLE_OPTION_DESC
                        })]
                    }), x.jsx("span", {
                        className: "checkbox__price",
                        children: f.UF_VEHICLE_OPTION_PRICE !== "—" ? f.UF_VEHICLE_OPTION_ISCOLOR == 1 && r?.UF_VEHICLE_COLOR_DEFAULT == 1 ? "0 руб." : `${Number(f.UF_VEHICLE_OPTION_PRICE).toLocaleString("ru-RU")} руб.` : "—"
                    })]
                })]
            }, parseInt(f.ID))
        })
    })
}
var Vn = {},
    jn = {
        exports: {}
    },
    Gg = jn.exports,
    kd;

function Bg() {
    return kd || (kd = 1, (function (s, i) {
        (function (r, u) {
            u(i)
        })(Gg, (function (r) {
            var u = function () {
                return u = Object.assign || function (f) {
                    for (var m, h = 1, v = arguments.length; h < v; h++)
                        for (var p in m = arguments[h]) Object.prototype.hasOwnProperty.call(m, p) && (f[p] = m[p]);
                    return f
                }, u.apply(this, arguments)
            },
                o = (function () {
                    function f(m, h, v) {
                        var p = this;
                        this.endVal = h, this.options = v, this.version = "2.9.0", this.defaults = {
                            startVal: 0,
                            decimalPlaces: 0,
                            duration: 2,
                            useEasing: !0,
                            useGrouping: !0,
                            useIndianSeparators: !1,
                            smartEasingThreshold: 999,
                            smartEasingAmount: 333,
                            separator: ",",
                            decimal: ".",
                            prefix: "",
                            suffix: "",
                            enableScrollSpy: !1,
                            scrollSpyDelay: 200,
                            scrollSpyOnce: !1
                        }, this.finalEndVal = null, this.useEasing = !0, this.countDown = !1, this.error = "", this.startVal = 0, this.paused = !0, this.once = !1, this.count = function (y) {
                            p.startTime || (p.startTime = y);
                            var E = y - p.startTime;
                            p.remaining = p.duration - E, p.useEasing ? p.countDown ? p.frameVal = p.startVal - p.easingFn(E, 0, p.startVal - p.endVal, p.duration) : p.frameVal = p.easingFn(E, p.startVal, p.endVal - p.startVal, p.duration) : p.frameVal = p.startVal + (p.endVal - p.startVal) * (E / p.duration);
                            var S = p.countDown ? p.frameVal < p.endVal : p.frameVal > p.endVal;
                            p.frameVal = S ? p.endVal : p.frameVal, p.frameVal = Number(p.frameVal.toFixed(p.options.decimalPlaces)), p.printValue(p.frameVal), E < p.duration ? p.rAF = requestAnimationFrame(p.count) : p.finalEndVal !== null ? p.update(p.finalEndVal) : p.options.onCompleteCallback && p.options.onCompleteCallback()
                        }, this.formatNumber = function (y) {
                            var E, S, A, O, V = y < 0 ? "-" : "";
                            E = Math.abs(y).toFixed(p.options.decimalPlaces);
                            var K = (E += "").split(".");
                            if (S = K[0], A = K.length > 1 ? p.options.decimal + K[1] : "", p.options.useGrouping) {
                                O = "";
                                for (var R = 3, Y = 0, Q = 0, F = S.length; Q < F; ++Q) p.options.useIndianSeparators && Q === 4 && (R = 2, Y = 1), Q !== 0 && Y % R == 0 && (O = p.options.separator + O), Y++, O = S[F - Q - 1] + O;
                                S = O
                            }
                            return p.options.numerals && p.options.numerals.length && (S = S.replace(/[0-9]/g, (function (G) {
                                return p.options.numerals[+G]
                            })), A = A.replace(/[0-9]/g, (function (G) {
                                return p.options.numerals[+G]
                            }))), V + p.options.prefix + S + A + p.options.suffix
                        }, this.easeOutExpo = function (y, E, S, A) {
                            return S * (1 - Math.pow(2, -10 * y / A)) * 1024 / 1023 + E
                        }, this.options = u(u({}, this.defaults), v), this.formattingFn = this.options.formattingFn ? this.options.formattingFn : this.formatNumber, this.easingFn = this.options.easingFn ? this.options.easingFn : this.easeOutExpo, this.el = typeof m == "string" ? document.getElementById(m) : m, h = h ?? this.parse(this.el.innerHTML), this.startVal = this.validateValue(this.options.startVal), this.frameVal = this.startVal, this.endVal = this.validateValue(h), this.options.decimalPlaces = Math.max(this.options.decimalPlaces), this.resetDuration(), this.options.separator = String(this.options.separator), this.useEasing = this.options.useEasing, this.options.separator === "" && (this.options.useGrouping = !1), this.el ? this.printValue(this.startVal) : this.error = "[CountUp] target is null or undefined", typeof window < "u" && this.options.enableScrollSpy && (this.error ? console.error(this.error, m) : (window.onScrollFns = window.onScrollFns || [], window.onScrollFns.push((function () {
                            return p.handleScroll(p)
                        })), window.onscroll = function () {
                            window.onScrollFns.forEach((function (y) {
                                return y()
                            }))
                        }, this.handleScroll(this)))
                    }
                    return f.prototype.handleScroll = function (m) {
                        if (m && window && !m.once) {
                            var h = window.innerHeight + window.scrollY,
                                v = m.el.getBoundingClientRect(),
                                p = v.top + window.pageYOffset,
                                y = v.top + v.height + window.pageYOffset;
                            y < h && y > window.scrollY && m.paused ? (m.paused = !1, setTimeout((function () {
                                return m.start()
                            }), m.options.scrollSpyDelay), m.options.scrollSpyOnce && (m.once = !0)) : (window.scrollY > y || p > h) && !m.paused && m.reset()
                        }
                    }, f.prototype.determineDirectionAndSmartEasing = function () {
                        var m = this.finalEndVal ? this.finalEndVal : this.endVal;
                        this.countDown = this.startVal > m;
                        var h = m - this.startVal;
                        if (Math.abs(h) > this.options.smartEasingThreshold && this.options.useEasing) {
                            this.finalEndVal = m;
                            var v = this.countDown ? 1 : -1;
                            this.endVal = m + v * this.options.smartEasingAmount, this.duration = this.duration / 2
                        } else this.endVal = m, this.finalEndVal = null;
                        this.finalEndVal !== null ? this.useEasing = !1 : this.useEasing = this.options.useEasing
                    }, f.prototype.start = function (m) {
                        this.error || (this.options.onStartCallback && this.options.onStartCallback(), m && (this.options.onCompleteCallback = m), this.duration > 0 ? (this.determineDirectionAndSmartEasing(), this.paused = !1, this.rAF = requestAnimationFrame(this.count)) : this.printValue(this.endVal))
                    }, f.prototype.pauseResume = function () {
                        this.paused ? (this.startTime = null, this.duration = this.remaining, this.startVal = this.frameVal, this.determineDirectionAndSmartEasing(), this.rAF = requestAnimationFrame(this.count)) : cancelAnimationFrame(this.rAF), this.paused = !this.paused
                    }, f.prototype.reset = function () {
                        cancelAnimationFrame(this.rAF), this.paused = !0, this.resetDuration(), this.startVal = this.validateValue(this.options.startVal), this.frameVal = this.startVal, this.printValue(this.startVal)
                    }, f.prototype.update = function (m) {
                        cancelAnimationFrame(this.rAF), this.startTime = null, this.endVal = this.validateValue(m), this.endVal !== this.frameVal && (this.startVal = this.frameVal, this.finalEndVal == null && this.resetDuration(), this.finalEndVal = null, this.determineDirectionAndSmartEasing(), this.rAF = requestAnimationFrame(this.count))
                    }, f.prototype.printValue = function (m) {
                        var h;
                        if (this.el) {
                            var v = this.formattingFn(m);
                            !((h = this.options.plugin) === null || h === void 0) && h.render ? this.options.plugin.render(this.el, v) : this.el.tagName === "INPUT" ? this.el.value = v : this.el.tagName === "text" || this.el.tagName === "tspan" ? this.el.textContent = v : this.el.innerHTML = v
                        }
                    }, f.prototype.ensureNumber = function (m) {
                        return typeof m == "number" && !isNaN(m)
                    }, f.prototype.validateValue = function (m) {
                        var h = Number(m);
                        return this.ensureNumber(h) ? h : (this.error = "[CountUp] invalid start or end value: ".concat(m), null)
                    }, f.prototype.resetDuration = function () {
                        this.startTime = null, this.duration = 1e3 * Number(this.options.duration), this.remaining = this.duration
                    }, f.prototype.parse = function (m) {
                        var h = function (E) {
                            return E.replace(/([.,'  ])/g, "\\$1")
                        },
                            v = h(this.options.separator),
                            p = h(this.options.decimal),
                            y = m.replace(new RegExp(v, "g"), "").replace(new RegExp(p, "g"), ".");
                        return parseFloat(y)
                    }, f
                })();
            r.CountUp = o
        }))
    })(jn, jn.exports)), jn.exports
}
var $d;

function qg() {
    if ($d) return Vn;
    $d = 1, Object.defineProperty(Vn, "__esModule", {
        value: !0
    });
    var s = us(),
        i = Bg();

    function r(H, M) {
        var z = H == null ? null : typeof Symbol < "u" && H[Symbol.iterator] || H["@@iterator"];
        if (z != null) {
            var j, P, re, _e, oe = [],
                C = !0,
                Z = !1;
            try {
                if (re = (z = z.call(H)).next, M !== 0)
                    for (; !(C = (j = re.call(z)).done) && (oe.push(j.value), oe.length !== M); C = !0);
            } catch (k) {
                Z = !0, P = k
            } finally {
                try {
                    if (!C && z.return != null && (_e = z.return(), Object(_e) !== _e)) return
                } finally {
                    if (Z) throw P
                }
            }
            return oe
        }
    }

    function u(H, M) {
        var z = Object.keys(H);
        if (Object.getOwnPropertySymbols) {
            var j = Object.getOwnPropertySymbols(H);
            M && (j = j.filter(function (P) {
                return Object.getOwnPropertyDescriptor(H, P).enumerable
            })), z.push.apply(z, j)
        }
        return z
    }

    function o(H) {
        for (var M = 1; M < arguments.length; M++) {
            var z = arguments[M] != null ? arguments[M] : {};
            M % 2 ? u(Object(z), !0).forEach(function (j) {
                h(H, j, z[j])
            }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(H, Object.getOwnPropertyDescriptors(z)) : u(Object(z)).forEach(function (j) {
                Object.defineProperty(H, j, Object.getOwnPropertyDescriptor(z, j))
            })
        }
        return H
    }

    function f(H, M) {
        if (typeof H != "object" || !H) return H;
        var z = H[Symbol.toPrimitive];
        if (z !== void 0) {
            var j = z.call(H, M);
            if (typeof j != "object") return j;
            throw new TypeError("@@toPrimitive must return a primitive value.")
        }
        return (M === "string" ? String : Number)(H)
    }

    function m(H) {
        var M = f(H, "string");
        return typeof M == "symbol" ? M : String(M)
    }

    function h(H, M, z) {
        return M = m(M), M in H ? Object.defineProperty(H, M, {
            value: z,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : H[M] = z, H
    }

    function v() {
        return v = Object.assign ? Object.assign.bind() : function (H) {
            for (var M = 1; M < arguments.length; M++) {
                var z = arguments[M];
                for (var j in z) Object.prototype.hasOwnProperty.call(z, j) && (H[j] = z[j])
            }
            return H
        }, v.apply(this, arguments)
    }

    function p(H, M) {
        if (H == null) return {};
        var z = {},
            j = Object.keys(H),
            P, re;
        for (re = 0; re < j.length; re++) P = j[re], !(M.indexOf(P) >= 0) && (z[P] = H[P]);
        return z
    }

    function y(H, M) {
        if (H == null) return {};
        var z = p(H, M),
            j, P;
        if (Object.getOwnPropertySymbols) {
            var re = Object.getOwnPropertySymbols(H);
            for (P = 0; P < re.length; P++) j = re[P], !(M.indexOf(j) >= 0) && Object.prototype.propertyIsEnumerable.call(H, j) && (z[j] = H[j])
        }
        return z
    }

    function E(H, M) {
        return S(H) || r(H, M) || A(H, M) || V()
    }

    function S(H) {
        if (Array.isArray(H)) return H
    }

    function A(H, M) {
        if (H) {
            if (typeof H == "string") return O(H, M);
            var z = Object.prototype.toString.call(H).slice(8, -1);
            if (z === "Object" && H.constructor && (z = H.constructor.name), z === "Map" || z === "Set") return Array.from(H);
            if (z === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(z)) return O(H, M)
        }
    }

    function O(H, M) {
        (M == null || M > H.length) && (M = H.length);
        for (var z = 0, j = new Array(M); z < M; z++) j[z] = H[z];
        return j
    }

    function V() {
        throw new TypeError(`Invalid attempt to destructure non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`)
    }
    var K = typeof window < "u" && typeof window.document < "u" && typeof window.document.createElement < "u" ? s.useLayoutEffect : s.useEffect;

    function R(H) {
        var M = s.useRef(H);
        return K(function () {
            M.current = H
        }), s.useCallback(function () {
            for (var z = arguments.length, j = new Array(z), P = 0; P < z; P++) j[P] = arguments[P];
            return M.current.apply(void 0, j)
        }, [])
    }
    var Y = function (M, z) {
        var j = z.decimal,
            P = z.decimals,
            re = z.duration,
            _e = z.easingFn,
            oe = z.end,
            C = z.formattingFn,
            Z = z.numerals,
            k = z.prefix,
            le = z.separator,
            _ = z.start,
            X = z.suffix,
            $ = z.useEasing,
            J = z.useGrouping,
            te = z.useIndianSeparators,
            pe = z.enableScrollSpy,
            ie = z.scrollSpyDelay,
            He = z.scrollSpyOnce,
            ye = z.plugin;
        return new i.CountUp(M, oe, {
            startVal: _,
            duration: re,
            decimal: j,
            decimalPlaces: P,
            easingFn: _e,
            formattingFn: C,
            numerals: Z,
            separator: le,
            prefix: k,
            suffix: X,
            plugin: ye,
            useEasing: $,
            useIndianSeparators: te,
            useGrouping: J,
            enableScrollSpy: pe,
            scrollSpyDelay: ie,
            scrollSpyOnce: He
        })
    },
        Q = ["ref", "startOnMount", "enableReinitialize", "delay", "onEnd", "onStart", "onPauseResume", "onReset", "onUpdate"],
        F = {
            decimal: ".",
            separator: ",",
            delay: null,
            prefix: "",
            suffix: "",
            duration: 2,
            start: 0,
            decimals: 0,
            startOnMount: !0,
            enableReinitialize: !0,
            useEasing: !0,
            useGrouping: !0,
            useIndianSeparators: !1
        },
        G = function (M) {
            var z = Object.fromEntries(Object.entries(M).filter(function (tt) {
                var jt = E(tt, 2),
                    Fl = jt[1];
                return Fl !== void 0
            })),
                j = s.useMemo(function () {
                    return o(o({}, F), z)
                }, [M]),
                P = j.ref,
                re = j.startOnMount,
                _e = j.enableReinitialize,
                oe = j.delay,
                C = j.onEnd,
                Z = j.onStart,
                k = j.onPauseResume,
                le = j.onReset,
                _ = j.onUpdate,
                X = y(j, Q),
                $ = s.useRef(),
                J = s.useRef(),
                te = s.useRef(!1),
                pe = R(function () {
                    return Y(typeof P == "string" ? P : P.current, X)
                }),
                ie = R(function (tt) {
                    var jt = $.current;
                    if (jt && !tt) return jt;
                    var Fl = pe();
                    return $.current = Fl, Fl
                }),
                He = R(function () {
                    var tt = function () {
                        return ie(!0).start(function () {
                            C?.({
                                pauseResume: ye,
                                reset: Ye,
                                start: Nt,
                                update: Vt
                            })
                        })
                    };
                    oe && oe > 0 ? J.current = setTimeout(tt, oe * 1e3) : tt(), Z?.({
                        pauseResume: ye,
                        reset: Ye,
                        update: Vt
                    })
                }),
                ye = R(function () {
                    ie().pauseResume(), k?.({
                        reset: Ye,
                        start: Nt,
                        update: Vt
                    })
                }),
                Ye = R(function () {
                    ie().el && (J.current && clearTimeout(J.current), ie().reset(), le?.({
                        pauseResume: ye,
                        start: Nt,
                        update: Vt
                    }))
                }),
                Vt = R(function (tt) {
                    ie().update(tt), _?.({
                        pauseResume: ye,
                        reset: Ye,
                        start: Nt
                    })
                }),
                Nt = R(function () {
                    Ye(), He()
                }),
                Al = R(function (tt) {
                    re && (tt && Ye(), He())
                });
            return s.useEffect(function () {
                te.current ? _e && Al(!0) : (te.current = !0, Al())
            }, [_e, te, Al, oe, M.start, M.suffix, M.prefix, M.duration, M.separator, M.decimals, M.decimal, M.formattingFn]), s.useEffect(function () {
                return function () {
                    Ye()
                }
            }, [Ye]), {
                start: Nt,
                pauseResume: ye,
                reset: Ye,
                update: Vt,
                getCountUp: ie
            }
        },
        ee = ["className", "redraw", "containerProps", "children", "style"],
        ae = function (M) {
            var z = M.className,
                j = M.redraw,
                P = M.containerProps,
                re = M.children,
                _e = M.style,
                oe = y(M, ee),
                C = s.useRef(null),
                Z = s.useRef(!1),
                k = G(o(o({}, oe), {}, {
                    ref: C,
                    startOnMount: typeof re != "function" || M.delay === 0,
                    enableReinitialize: !1
                })),
                le = k.start,
                _ = k.reset,
                X = k.update,
                $ = k.pauseResume,
                J = k.getCountUp,
                te = R(function () {
                    le()
                }),
                pe = R(function (ye) {
                    M.preserveValue || _(), X(ye)
                }),
                ie = R(function () {
                    if (typeof M.children == "function" && !(C.current instanceof Element)) {
                        console.error(`Couldn't find attached element to hook the CountUp instance into! Try to attach "containerRef" from the render prop to a an Element, eg. <span ref={containerRef} />.`);
                        return
                    }
                    J()
                });
            s.useEffect(function () {
                ie()
            }, [ie]), s.useEffect(function () {
                Z.current && pe(M.end)
            }, [M.end, pe]);
            var He = j && M;
            return s.useEffect(function () {
                j && Z.current && te()
            }, [te, j, He]), s.useEffect(function () {
                !j && Z.current && te()
            }, [te, j, M.start, M.suffix, M.prefix, M.duration, M.separator, M.decimals, M.decimal, M.className, M.formattingFn]), s.useEffect(function () {
                Z.current = !0
            }, []), typeof re == "function" ? re({
                countUpRef: C,
                start: le,
                reset: _,
                update: X,
                pauseResume: $,
                getCountUp: J
            }) : s.createElement("span", v({
                className: z,
                ref: C,
                style: _e
            }, P), typeof M.start < "u" ? J().formattingFn(M.start) : "")
        };
    return Vn.default = ae, Vn.useCountUp = G, Vn
}
var Yg = qg();
const Wd = ep(Yg);

function Ig({
    packets: s,
    selectPacket: i,
    setSelectPacket: r,
    setSelectOption: u,
    selectOption: o,
    selectModel: f
}) {
    const m = h => v => {
        const {
            checked: p
        } = v.target, y = f.options.filter(E => E.UF_VEHICLE_OPTION_BASE == 1 || E.UF_VEHICLE_OPTION_CHECKED == 1);
        if (f.options.forEach(E => {
            E.disabled = !1, E.hidden = 0
        }), u(y), p) {
            const E = s.find(S => S.ID == h);
            r(E), E && f.options.forEach(S => {
                Object.values(E.UF_VEHICLE_PACKET_OPTIONS).includes(S.ID) && (S.disabled = !0, u(A => La(S, !0, A, f, !0)))
            })
        } else r(null)
    };
    return x.jsx(x.Fragment, {
        children: x.jsx("div", {
            className: "conf-widget__packages-container",
            children: x.jsx("div", {
                className: "conf-widget__packages margin_b_s",
                children: s.map(h => {
                    const v = i?.ID == h.ID;
                    return x.jsxs("label", {
                        className: "conf-widget__package",
                        children: [x.jsx("input", {
                            className: "conf-widget__package-input",
                            name: "packet",
                            checked: v,
                            onChange: m(h.ID),
                            type: "checkbox"
                        }), x.jsxs("span", {
                            className: "conf-widget__package-radiobox",
                            children: [x.jsx("span", {
                                className: "section-subtitle conf-widget__package-name",
                                children: h.UF_VEHICLE_OPTION_PACKET_NAME
                            }), x.jsxs("span", {
                                className: "conf-widget__package-benefit",
                                children: ["Выгода ", parseFloat(h.UF_VEHICLE_OPTION_PACKET_SALE).toLocaleString("ru-RU"), " руб."]
                            })]
                        })]
                    }, h.ID)
                })
            })
        })
    })
}

function Ep(s, i, r, u, o, f) {
    let m = "",
        h = "";

    i.colors && i.colors.length > 1 && (h = '<div class="doc-machine-data-image-color">', h += `<span>Цвет корпуса — <b>${u.UF_VEHICLE_COLOR_NAME}</b></span><div class="list-color">`, i.colors.forEach(S => {
        let A = "";
        u.ID == S.ID && (A = "class='selected'"), h += `<span ${A} style="background-color:${S.UF_VEHICLE_COLOR_CODE}"></span>`
    }), h += "</div></div>");
    const v = i.options.filter(S => S.UF_VEHICLE_OPTION_IS_SHINI == 1);
    v && s.ID == 1756 && v.forEach(S => {
        r.some(O => O.ID === S.ID) && (S.UF_VEHICLE_OPTION_NAME == "Шины средней проходимости Salamandra (4 шт.)" ? m = `
                    <div class="doc-machine-data-image-shini">
                        <h2>Шины</h2>
                        <table>
                            <tbody>
                                <tr class="grayLine">
                                    <td>
                                        Шины средней проходимости Salamandra (4 шт)

                                    </td>
                                    <td><input type="checkbox" checked><div class="pseudochekbox"></div></td>
                                </tr>
                                <tr>
                                    <td>
                                        Шины сверхвысокой проходимости TINGER (4 шт)

                                    </td>
                                    <td><input type="checkbox"><div class="pseudochekbox"></div></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    ` : m = `
                    <div class="doc-machine-data-image-shini">
                        <h2>Шины</h2>
                        <table>
                            <tbody>
                                <tr class="grayLine">
                                    <td>
                                        Шины средней проходимости Salamandra (4 шт)

                                    </td>
                                    <td><input type="checkbox" ><div class="pseudochekbox"></div></td>
                                </tr>
                                <tr>
                                    <td>
                                        Шины сверхвысокой проходимости TINGER (4 шт)

                                    </td>
                                    <td><input type="checkbox" checked><div class="pseudochekbox"></div></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    `)
    });
    let p = "";
    u.UF_VEHICLE_COLOR_FRONT && r.some(S => S.UF_VEHICLE_OPTION_IS_CUNG == 1) && (p = u.UF_VEHICLE_COLOR_KUNG_FRONT);
    const y = [u.UF_VEHICLE_COLOR_FRONT, p, ...r.filter(S => S.UF_VEHICLE_OPTION_IMG_FRONT !== "https://tinger.ru").sort((S, A) => S.UF_VEHICLE_OPTION_IMG_ZINDEX - A.UF_VEHICLE_OPTION_IMG_ZINDEX).map(S => S.UF_VEHICLE_OPTION_IMG_FRONT)].map((S, A) => {
        if (S != "https://tinger.ru") return `<img src="${S}" style="position:absolute; z-index:${A + 1};" />`
    }).join("");
    let E = `
  <body>
<div class="doc">
        <div class="doc-header">
            <img src="https://tingard.ru/upload/vehicleconf/tingerlogo.png" alt="" class="doc-header-logo">
            <div class="doc-header-company">
                <span>
                    ООО "Механика"<br>
                    162611, РФ, Вологодская область, г. Череповец<br>
                    ул. Окружная, д. 18, строение 6, офис 1
                </span>
            </div>
            <div class="doc-header-contact">
                <a href="tel:+78003502505">
                    <img src="https://tingard.ru/upload/vehicleconf/phone.svg"
                        alt="i">
                    <span>8 (800) 350-25-05</span>
                </a>
                <a href="mailto:help@tinger.ru">
                    <img src="https://tingard.ru/upload/vehicleconf/email.svg"
                        alt="i">
                    <span>help@tinger.ru</span>
                </a>
                <a href="https://www.tinger.ru/">
                    <img src="https://tingard.ru/upload/vehicleconf/website.svg"
                        alt="i">
                    <span>www.tinger.ru</span>
                </a>
            </div>
        </div>
        <div class="doc-line">
            <h1 class="doc-line-title">
                <span>Вездеход TINGER ${i.UF_VEHICLE_MODEL_NAME.split(",")[0]}</span>
            </h1>
        </div>
        <div class="doc-machine-data">
            <div class="doc-machine-data-char">
                <h2>Характеристики</h2>
                <table>
                    <tbody>
                       ${i.UF_VEHICLE_MODEL_CHAR_NAME.map((S, A) => {
        let O = ""; return A % 2 == 0 && (O = "class='grayLine'"), `
                            <tr ${O} >
                              <td>${S}</td>
                              <td>${i.UF_VEHICLE_MODEL_CHAR_VALUE[A]}</td>
                            </tr>
                          `}).join("")}
                    </tbody>
                </table>
                <span class="primechanie">* Требуется дополнительное оборудование</span>
                <br>
                <span class="primechanie">** Конструкционная масса</span>
            </div>
            <div class="doc-machine-data-image">
                <div class="conf_images">
                ${y}
                </div>
                ${m}
                ${h}
            </div>
        </div>
        <div class="doc-priem">
            <h2>Преимущества</h2>
            <table>
                <tbody>
                    <tr class="grayLine">
                        <td>Электронный паспорт самоходной машины (эПСМ)</td>
                    </tr>
                    <tr>
                        <td>Серийное производство</td>
                    </tr>
                    <tr class="grayLine">
                        <td>Заводское качество</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <span class="base-price">Базовая цена модели: <b>${o.toLocaleString("ru-RU")}</b> ₽ (в том числе НДС 22%)</span>
        <br>
        <span class="base-price">Цена дополнительного оборудования: <b>${f.toLocaleString("ru-RU")}</b> ₽</span>
        <div class="page-break"></div>
        <table class="dop-table">
            <thead> 
                <tr>
                    <td colspan="4">Основное оборудование</td>
                </tr>
            </thead>
            <tbody>
            ${r.filter(S => (S.UF_VEHICLE_OPTION_BASE == 1 || S.UF_VEHICLE_OPTION_CHECKED == 1) && S.UF_VEHICLE_OPTION_IS_SHINI != 1).map((S, A) => {
            if (S.UF_VEHICLE_OPTION_ISCOLOR == 1 && u.UF_VEHICLE_COLOR_DEFAULT == 1) {
                return "";
            }
            let O = ""; return A % 2 == 0 && (O = 'class="grayLine"'), `
                        <tr ${O}>
                            <td><img src="${S.UF_VEHICLE_OPTION_IMG}"/></td>
                            <td>${S.UF_VEHICLE_OPTION_NAME}</td>
                            <td>${isNaN(parseInt(S.UF_VEHICLE_OPTION_PRICE)) ? "—" : parseInt(S.UF_VEHICLE_OPTION_PRICE).toLocaleString("ru-RU")} ₽</td>
                            <td><input type="checkbox" checked/><div class="pseudochekbox"></div></td>
                        </tr>   
                    `}).join("")}
                ${i.options.filter(S => S.UF_VEHICLE_OPTION_IS_SHINI == 1).map((S, A) => r.some(V => V.ID === S.ID) ? `
                        <tr >
                            <td><img src="${S.UF_VEHICLE_OPTION_IMG}"/></td>
                            <td>${S.UF_VEHICLE_OPTION_NAME}</td>
                            <td>${isNaN(parseInt(S.UF_VEHICLE_OPTION_PRICE)) ? "—" : parseInt(S.UF_VEHICLE_OPTION_PRICE).toLocaleString("ru-RU")} ₽</td>
                            <td><input type="checkbox" checked/><div class="pseudochekbox"></div></td>
                        </tr>   
                    `: "").join("")}
               
            </tbody>
        </table>
        <span class="base-price">Базовая цена модели: <b>${o.toLocaleString("ru-RU")}</b> ₽ (в том числе НДС 22%)</span>
        <div class="page-break"></div>
        <table class="dop-table">
            <thead>
                <tr>
                    <td colspan="4">Дополнительное оборудование</td>
                </tr>
            </thead>
            <tbody>
             ${r.filter(S => S.UF_VEHICLE_OPTION_BASE == 0 && S.UF_VEHICLE_OPTION_IS_SHINI != 1).map((S, A) => {
                let O = ""; return A % 2 == 0 && (O = 'class="grayLine"'), `
                        <tr ${O} >
                            <td><img src="${S.UF_VEHICLE_OPTION_IMG}"/></td>
                            <td>${S.UF_VEHICLE_OPTION_NAME}</td>
                            <td>${parseInt(S.UF_VEHICLE_OPTION_PRICE).toLocaleString("ru-RU")} ₽</td>
                            <td><input type="checkbox" checked /> <div class="pseudochekbox"></div></td>
                        </tr>   
                    `}).join("")}
               
            </tbody>
        </table>
        <span class="base-price">Цена дополнительного оборудования: <b>${f.toLocaleString("ru-RU")}</b> ₽</span>
        <div class="doc-footer">
            <span class="doc-footer-garanty"><b>Гарантия производителя 24 месяца или 200 моточасов <br>
                    (в зависимости от того, что наступит раньше)</b>
            </span>
            <hr>
            <div class="doc-footer-bottom">
                <span>
                    Будем рады подробно обсудить с Вами все детали <br>
                    данного предложения в удобное для Вас время.
                </span>
                <img src="https://tingard.ru/upload/vehicleconf/tingerlogo.svg" alt="logo">
                <div class="doc-header-contact">
                    <a href="tel:+78003502505">
                        <img src="https://tingard.ru/upload/vehicleconf/phone.svg"
                            alt="i">
                        <span>8 (800) 350-25-05</span>
                    </a>
                    <a href="mailto:help@tinger.ru">
                        <img src="https://tingard.ru/upload/vehicleconf/email.svg"
                            alt="i">
                        <span>help@tinger.ru</span>
                    </a>
                    <a href="https://www.tinger.ru/">
                        <img src="https://tingard.ru/upload/vehicleconf/website.svg"
                            alt="i">
                        <span>www.tinger.ru</span>
                    </a>
                </div>
            </div>
        </div>
    </body>
    </html>
    `;
    if (window.vehicleModelName = `TINGER ${i.UF_VEHICLE_MODEL_NAME.split(',')[0]}`, window.vehicleModelName)
        if (window.vehiclePDf = E, window.vehiclePDf) return !0
}

function Xg({
    selectColor: s,
    setSelectColor: i,
    setActiveTab: r,
    selectModel: u,
    selectOption: o,
    setSelectOption: f,
    finalBasePrice: m,
    dopPrice: h,
    setFinalBasePrice: v,
    setDopPrice: p,
    selectPackets: y,
    setSelectPackets: E,
    selectMachine: S,
    urlGetMachineState: A,
    isGet: isGet,
}) {
    const O = fe.useRef(h),
        V = fe.useRef(m),
        K = fe.useMemo(() => parseInt(u.UF_VEHICLE_MODEL_BASEPRICE), [u]);
    return fe.useEffect(() => {
        if (!u?.options) return;
        const R = u.options.filter(Y => Y.UF_VEHICLE_OPTION_BASE == 1 || Y.UF_VEHICLE_OPTION_CHECKED == 1);
        R.forEach(Y => {
            if (!Y.UF_VEHICLE_DELETE_OPTIONS) return;
            const Q = Array.isArray(Y.UF_VEHICLE_DELETE_OPTIONS) ? Y.UF_VEHICLE_DELETE_OPTIONS : Y.UF_VEHICLE_DELETE_OPTIONS.split(",").map(F => parseInt(F));
            u.options.forEach(F => {
                const G = parseInt(F.ID);
                Q.includes(G) && (F.hidden = 1)
            })
        }), f(Y => {
            if (Y.length > 0) return Y;
            const Q = R.filter(F => !F.hidden);
            return [...Y, ...Q.filter(F => !Y.some(G => G.ID === F.ID))]
        })
    }, [u, f]), fe.useEffect(() => {
        if (!o) return;
        const R = o.reduce((F, G) => G.UF_VEHICLE_OPTION_CHANGE_BASE_PRICE == 1 ? F + parseInt(G.UF_VEHICLE_OPTION_CHANGE_BASE_PRICE_VALUE || 0) : G.UF_VEHICLE_OPTION_ISCOLOR == 1 && s?.UF_VEHICLE_COLOR_DEFAULT != 1 ? F + parseInt(G.UF_VEHICLE_OPTION_PRICE) : F, K);
        V.current = m, v(R);
        const Y = o.reduce((F, G) => {
            if (G.UF_VEHICLE_OPTION_BASE != 1 && G.UF_VEHICLE_OPTION_CHANGE_BASE_PRICE != 1) {
                const ee = parseInt(G.UF_VEHICLE_OPTION_PRICE || 0);
                if (!isNaN(ee) && isFinite(ee)) return F + ee
            }
            return F
        }, 0);
        O.current = h;
        const Q = y ? Y - y?.UF_VEHICLE_OPTION_PACKET_SALE : Y;
        p(Q)
    }, [o, K, s, v, p]), x.jsxs(x.Fragment, {
        children: [x.jsx("h2", {
            className: "section-title margin_b_m",
            children: "Выберите оборудование"
        }), x.jsxs("div", {
            className: "conf-widget margin_b_m",
            children: [u.packets && u.packets.length > 0 && x.jsx(Ig, {
                packets: u.packets,
                selectPacket: y,
                setSelectPacket: E,
                selectOption: o,
                setSelectOption: f,
                selectModel: u
            }), x.jsx("div", {
                className: "conf-widget__visual margin_b_s",
                children: s && x.jsxs(x.Fragment, {
                    children: [x.jsx(Vg, {
                        selectModel: u,
                        selectOption: o,
                        selectColor: s,
                        setSelectColor: i,
                        selectMachine: S,
                        setSelectOption: f
                    }), x.jsx(jg, {
                        selectModel: u,
                        selectOption: o,
                        selectColor: s,
                        setSelectOption: f
                    })]
                })
            }), x.jsx("div", {
                className: "conf-widget__total",
                children: x.jsxs("div", {
                    className: "conf-numbers conf-numbers_place_conf-widget",
                    children: [x.jsxs("p", {
                        className: "section-subtitle total-price-m",
                        children: ["Базовая цена модели: ", x.jsx(Wd, {
                            start: V.current,
                            end: m,
                            duration: .5,
                            separator: " ",
                            suffix: " руб."
                        })]
                    }), x.jsxs("p", {
                        className: "conf-numbers__item margin_b_s",
                        children: [x.jsx("span", {
                            className: "conf-numbers__tagline",
                            children: "Дополнительное оборудование: "
                        }), x.jsx("span", {
                            className: "conf-numbers__price",
                            children: x.jsx(Wd, {
                                start: O.current,
                                end: h,
                                duration: .5,
                                separator: " ",
                                suffix: " руб."
                            })
                        })]
                    })]
                })
            })]
        }), x.jsxs("div", {
            className: "btn__group btn__group--configurator",
            children: [!isGet && A && x.jsxs(x.Fragment, {
                children: [x.jsx("div", {}), x.jsx("button", {
                    className: "btn btn_color_green",
                    type: "button",
                    onClick: () => Ep(S, u, o, s, m, h) && openModal("default-email", {
                        "crm-entity": "lead",
                        "crm-title": "купить TINGER TF4 (сконфигурированный)",
                        action: "get-conf-data"
                    }),
                    children: "Купить"
                })]
            }), (!A || isGet) && x.jsxs(x.Fragment, {
                children: [x.jsx("button", {
                    className: "btn btn--green--fill",
                    onClick: () => r("second"),
                    children: "Назад"
                }), x.jsx("button", {
                    className: "btn btn--green--fill",
                    onClick: () => r("fourth"),
                    children: "Продолжить"
                })]
            })]
        })]
    })
}

function Qg({
    selectOption: s,
    selectMachine: i,
    selectModel: r,
    selectColor: u,
    finalBasePrice: o,
    dopPrice: f
}) {
    const [m, h] = fe.useState("first");
    return fe.useEffect(() => {
        Ep(i, r, s, u, o, f)
    }, []), x.jsxs("div", {
        className: "conf-total__modification margin_b_xl",
        children: [x.jsxs("div", {
            className: "conf-total__btn-container margin_b_l",
            children: [x.jsx("p", {
                className: "section-subtitle margin_b_m",
                children: "Ваша модификация"
            }), x.jsx("button", {
                className: "btn btn_color_green",
                type: "button",
                onClick: () => openModal("default-email", {
                    "crm-entity": "lead",
                    "crm-title": "Сконфигурированный вездеход (найти дилера)",
                    action: "get-conf-data"
                }),
                children: "Найти дилера"
            }), x.jsx("button", {
                className: "btn btn_color_green get_pdf",
                type: "button",
                onClick: () => getPdf(),
                children: "Скачать PDF"
            }), x.jsx("button", {
                className: "btn btn_color_green",
                type: "button",
                onClick: () => openModal("default-email", {
                    "crm-entity": "lead",
                    "crm-title": "Сконфигурированный вездеход (клиент отправил комплектацию себе на электронную почту)",
                    action: "get-conf-data"
                }, "Укажите данные для отправки собранной комплектации"),
                children: "Отправить комплектацию на электронную почту"
            })]
        }), x.jsxs("div", {
            className: "conf-total__tabs",
            children: [x.jsxs("ul", {
                className: "tab-head",
                children: [x.jsx("li", {
                    className: `tab-title section-subtitle margin_b_m  ${m === "first" ? "tab-title_active" : ""}`,
                    onClick: () => h("first"),
                    children: "Характеристики"
                }), x.jsx("li", {
                    className: `tab-title section-subtitle margin_b_m  ${m === "second" ? "tab-title_active" : ""}`,
                    onClick: () => h("second"),
                    children: "Комплектация"
                })]
            }), x.jsxs("div", {
                className: "tab-body",
                children: [x.jsx("div", {
                    className: `tab-content ${m === "first" ? "tab-content_active" : ""}`,
                    children: x.jsx("table", {
                        className: "table",
                        children: x.jsx(tp, {
                            selectModel: r
                        })
                    })
                }), x.jsx("div", {
                    className: `tab-content ${m === "second" ? "tab-content_active" : ""}`,
                    children: x.jsx("ul", {
                        className: "conf-total__list",
                        children: s.map((v, p) => x.jsx("li", {
                            className: "conf-total__list-item",
                            children: v.UF_VEHICLE_OPTION_NAME
                        }, p))
                    })
                })]
            })]
        })]
    })
}

function Zg({
    selectModel: s,
    selectMachine: i,
    selectColor: r,
    selectOption: u,
    finalBasePrice: o,
    dopPrice: f,
    selectPacket: m
}) {
    return x.jsxs(x.Fragment, {
        children: [x.jsx("h2", {
            className: "section-title margin_b_m",
            children: "TINGER " + s.UF_VEHICLE_MODEL_NAME
        }), x.jsxs("div", {
            className: "conf-total__visual margin_b_l",
            children: [x.jsxs("div", {
                className: "conf-layers",
                children: [x.jsx("img", {
                    className: "conf-layers__img-bg",
                    src: i.PROPERTY_IMG_BG
                }), x.jsx("img", {
                    className: "conf-layers__img",
                    src: r.UF_VEHICLE_COLOR_FRONT
                }), u.map((h, v) => {
                    if (h.UF_VEHICLE_OPTION_IS_CUNG == 1) return x.jsx("img", {
                        className: "conf-layers__img kung",
                        style: {
                            zIndex: h.UF_VEHICLE_OPTION_IMG_ZINDEX
                        },
                        src: r.UF_VEHICLE_COLOR_KUNG_FRONT
                    }, `${v}_front_${h.ID}`);
                    if (h.UF_VEHICLE_OPTION_IMG_FRONT != "https://tinger.ru") return x.jsx("img", {
                        className: "conf-layers__img",
                        style: {
                            zIndex: h.UF_VEHICLE_OPTION_IMG_ZINDEX
                        },
                        src: h.UF_VEHICLE_OPTION_IMG_FRONT
                    }, `${v}_front_${h.ID}`)
                })]
            }), x.jsxs("div", {
                className: "conf-numbers",
                children: [x.jsxs("p", {
                    className: "conf-numbers__item",
                    children: [x.jsx("span", {
                        className: "conf-numbers__tagline",
                        children: "Базовая цена модели: "
                    }), x.jsxs("span", {
                        className: "conf-numbers__price",
                        children: [x.jsx("span", {
                            children: o.toLocaleString("ru-RU")
                        }), " руб."]
                    })]
                }), x.jsxs("p", {
                    className: "conf-numbers__item",
                    children: [x.jsx("span", {
                        className: "conf-numbers__tagline",
                        children: "Ваша выгода: "
                    }), x.jsxs("span", {
                        className: "conf-numbers__price",
                        children: [x.jsx("span", {
                            children: m ? parseInt(m.UF_VEHICLE_OPTION_PACKET_SALE).toLocaleString("ru-RU") : 0
                        }), " руб."]
                    })]
                }), x.jsxs("p", {
                    className: "conf-numbers__item margin_b_s",
                    children: [x.jsx("span", {
                        className: "conf-numbers__tagline",
                        children: "Дополнительное оборудование: "
                    }), x.jsxs("span", {
                        className: "conf-numbers__price",
                        children: [x.jsx("span", {
                            children: f.toLocaleString("ru-RU")
                        }), " руб."]
                    })]
                }), x.jsx("button", {
                    className: "btn btn_color_green",
                    type: "button",
                    onClick: () => openModal("default-email", {
                        "crm-entity": "lead",
                        "crm-title": "Сконфигурированный вездеход (заявка)",
                        action: "get-conf-data"
                    }),
                    children: "Отправить заявку"
                })]
            })]
        })]
    })
}

function Kg({
    selectColor: s,
    selectMachine: i,
    selectModel: r,
    selectOption: u,
    finalBasePrice: o,
    dopPrice: f,
    selectPacket: m
}) {
    return x.jsxs(x.Fragment, {
        children: [x.jsx(Zg, {
            selectColor: s,
            selectMachine: i,
            selectModel: r,
            selectOption: u,
            finalBasePrice: o,
            dopPrice: f,
            selectPacket: m
        }), x.jsx(Qg, {
            selectOption: u,
            selectMachine: i,
            selectModel: r,
            selectColor: s,
            finalBasePrice: o,
            dopPrice: f
        })]
    })
}

function Fg() {

    const [s, i] = fe.useState("first"), [r, u] = fe.useState(null), [o, f] = fe.useState(null), [m, h] = fe.useState(null), [v, p] = fe.useState([]), [y, E] = fe.useState(null), [S, A] = fe.useState(null);
    let [O, V] = fe.useState(0), [K, R] = fe.useState(0), [Y, Q] = fe.useState(null), [isGet, setIsGet] = fe.useState("false");
    return fe.useEffect(() => {
        const F = document.getElementById("vehicle-configurator-script");
        let G = null,
            ee = null,
            get = null;
        F && (G = F.dataset.machine, ee = F.dataset.type, get = F.dataset.isget), Q(G), (async () => {

            const H = Object.values(await ev()).sort((M, z) => M.SORT - z.SORT);
            if (H.forEach(M => {
                M.models.forEach(z => {
                    z.options = z.options.sort((j, P) => j.UF_VEHICLE_OPTION_SORT - P.UF_VEHICLE_OPTION_SORT)
                })
            }), h(H), G) {
                const M = H.find(z => z.ID == G);
                if (M)
                    if (u(M), ee) {
                        setIsGet(get);
                        const z = M.models.find(j => j.ID == ee);
                        if (z) f(z), E(z.colors.find(j => j.UF_VEHICLE_COLOR_DEFAULT == 1)), i("third");
                        else {
                            const j = M.models[0];
                            f(j), E(j.colors.find(P => P.UF_VEHICLE_COLOR_DEFAULT == 1)), i("second")
                        }
                    } else {
                        setIsGet(get);
                        const z = M.models[0];
                        f(z), E(z.colors.find(j => j.UF_VEHICLE_COLOR_DEFAULT == 1)), i("second")
                    }

            }
        })()
    }, []), x.jsx(x.Fragment, {
        children: m && x.jsxs("section", {
            className: "container margin_b_xl conf-preloader conf-preloader_slow",
            children: [!Y && x.jsx($m, {
                activeTab: s,
                setActiveTab: i,
                selectMachine: r,
                selectmModel: o
            }), s === "first" && x.jsx(km, {
                confData: m,
                selectMachine: r,
                setSelectMachine: u,
                setActiveTab: i,
                setSelectModel: f,
                selectModel: o,
                setSelectOption: p,
                setSelectColor: E,
                setSelectPacket: A
            }), s === "second" && r && x.jsx(Wm, {
                setActiveTab: i,
                selectModel: o,
                setSelectModel: f,
                selectMachine: r,
                setSelectColor: E,
                setSelectOption: p,
                setSelectPacket: A,
                urlGetMachineState: Y
            }), s === "third" && r && o && x.jsx(Xg, {
                finalBasePrice: O,
                dopPrice: K,
                selectColor: y,
                setSelectColor: E,
                setActiveTab: i,
                selectModel: o,
                selectOption: v,
                setSelectOption: p,
                setFinalBasePrice: V,
                setDopPrice: R,
                selectPackets: S,
                setSelectPackets: A,
                selectMachine: r,
                urlGetMachineState: Y,
                isGet: isGet
            }), s === "fourth" && r && o && y && x.jsx(Kg, {
                finalBasePrice: O,
                dopPrice: K,
                selectColor: y,
                selectMachine: r,
                setActiveTab: i,
                selectModel: o,
                selectOption: v,
                selectPacket: S
            })]
        })
    })
}
Jm.createRoot(document.getElementById("root")).render(x.jsx(fe.StrictMode, {
    children: x.jsx(Fg, {})
}));