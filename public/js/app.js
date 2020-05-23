/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./pages/categories */ "./resources/js/pages/categories.js");

__webpack_require__(/*! ./pages/plans */ "./resources/js/pages/plans.js");

/***/ }),

/***/ "./resources/js/pages/categories.js":
/*!******************************************!*\
  !*** ./resources/js/pages/categories.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var URLS = __webpack_require__(/*! ../urls */ "./resources/js/urls.js"); // Categories List


if ($('#categories-list').length > 0) {
  // Categories data table
  $('#list').DataTable({
    'processing': true,
    'serverSide': true,
    'ajax': {
      'url': '/categorias/paginado',
      'type': 'GET'
    },
    'columns': [{
      'data': 'id'
    }, {
      'data': 'name'
    }, {
      'data': 'type'
    }, {
      'data': 'options',
      'render': function render(data, type, row, meta) {
        return "<div class=\"btn-group\">\n                            <a href=\"".concat(URLS.CATEGORY, "/editar/").concat(row.id, "\" class=\"btn btn-info\"><i class=\"right fas fa-edit\"></i></a>\n                            <a class=\"btn-delete btn btn-danger\" data-toggle=\"modal\" data-target=\"#myModal\" data-id=\"").concat(row.id, "\" data-name=\"").concat(row.name, "\"><i class=\"right fas fa-trash\"></i></a>\n                        </div>");
      }
    }],
    'language': {
      'lengthMenu': 'Display _MENU_ records per page',
      'zeroRecords': 'Nothing found - sorry',
      'info': 'Showing page _PAGE_ of _PAGES_',
      'infoEmpty': 'No records available',
      'infoFiltered': '(filtered from _MAX_ total records)'
    }
  }); // Button delete

  $('#list').on('click', '.btn-delete', function (evt) {
    var id = evt.currentTarget.getAttribute('data-id');
    var name = evt.currentTarget.getAttribute('data-name');
    var urlForm = "/".concat(URLS.CATEGORY, "/eliminado/").concat(id);
    $('#cateName').html(name);
    $('#delete-form').attr('action', urlForm);
    $('#btn-submit-delete').click(function (e) {
      $('#delete-form').submit();
    });
  });
}

/***/ }),

/***/ "./resources/js/pages/plans.js":
/*!*************************************!*\
  !*** ./resources/js/pages/plans.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var URLS = __webpack_require__(/*! ../urls */ "./resources/js/urls.js"); // Plans List


if ($('#plans-list').length > 0) {
  // Plans data table
  $('#list').DataTable({
    'processing': true,
    'serverSide': true,
    'ajax': {
      'url': '/planes/paginado',
      'type': 'GET'
    },
    'columns': [{
      'data': 'id'
    }, {
      'data': 'name'
    }, {
      'data': 'price'
    }, {
      'data': 'description'
    }, {
      'data': 'options',
      'render': function render(data, type, row, meta) {
        return "<div class=\"btn-group\">\n                            <a href=\"".concat(URLS.PLANS, "/editar/").concat(row.id, "\" class=\"btn btn-info\"><i class=\"right fas fa-edit\"></i></a>\n                            <a class=\"btn-delete btn btn-danger\" data-toggle=\"modal\" data-target=\"#myModal\" data-id=\"").concat(row.id, "\" data-name=\"").concat(row.name, "\"><i class=\"right fas fa-trash\"></i></a>\n                        </div>");
      }
    }],
    'language': {
      'lengthMenu': 'Display _MENU_ records per page',
      'zeroRecords': 'Nothing found - sorry',
      'info': 'Showing page _PAGE_ of _PAGES_',
      'infoEmpty': 'No records available',
      'infoFiltered': '(filtered from _MAX_ total records)'
    }
  }); // Button delete

  $('#list').on('click', '.btn-delete', function (evt) {
    var id = evt.currentTarget.getAttribute('data-id');
    var name = evt.currentTarget.getAttribute('data-name');
    var urlForm = "/".concat(URLS.PLANS, "/eliminado/").concat(id);
    $('#planName').html(name);
    $('#delete-form').attr('action', urlForm);
    $('#btn-submit-delete').click(function (e) {
      $('#delete-form').submit();
    });
  });
}

/***/ }),

/***/ "./resources/js/urls.js":
/*!******************************!*\
  !*** ./resources/js/urls.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

var URLS = {
  CATEGORY: 'categorias',
  PLANS: 'planes'
};
module.exports = URLS;

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/santiagosalazar/Documents/projects/dingdong/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /Users/santiagosalazar/Documents/projects/dingdong/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });