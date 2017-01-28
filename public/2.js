webpackJsonp([2],{

/***/ 195:
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./+pages/create.vue": 196,
	"./+pages/index.vue": 197
};
function webpackContext(req) {
	return __webpack_require__(webpackContextResolve(req));
};
function webpackContextResolve(req) {
	var id = map[req];
	if(!(id + 1)) // check for number
		throw new Error("Cannot find module '" + req + "'.");
	return id;
};
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = 195;


/***/ }),

/***/ 196:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(13)(
  /* script */
  null,
  /* template */
  null,
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "/home/badi/Desktop/Zix_Development/zix-api.zixdev.com/modules/Core/Assets/admin/js/views/+pages/create.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}

module.exports = Component.exports


/***/ }),

/***/ 197:
/***/ (function(module, exports, __webpack_require__) {

var Component = __webpack_require__(13)(
  /* script */
  __webpack_require__(198),
  /* template */
  __webpack_require__(199),
  /* scopeId */
  null,
  /* cssModules */
  null
)
Component.options.__file = "/home/badi/Desktop/Zix_Development/zix-api.zixdev.com/modules/Core/Assets/admin/js/views/+pages/index.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key !== "__esModule"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] index.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-9fec7d60", Component.options)
  } else {
    hotAPI.reload("data-v-9fec7d60", Component.options)
  }
})()}

module.exports = Component.exports


/***/ }),

/***/ 198:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.default = {
    mounted: function mounted() {
        console.log('Component mounted.');
    }
};

/***/ }),

/***/ 199:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _vm._m(0)
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "container"
  }, [_c('div', {
    staticClass: "row"
  }, [_c('div', {
    staticClass: "col-md-8 col-md-offset-2"
  }, [_c('div', {
    staticClass: "panel panel-default"
  }, [_c('div', {
    staticClass: "panel-heading"
  }, [_vm._v("Example Component")]), _vm._v(" "), _c('div', {
    staticClass: "panel-body"
  }, [_vm._v("\n                    This The Main Pages\n                ")])])])])])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-9fec7d60", module.exports)
  }
}

/***/ })

});