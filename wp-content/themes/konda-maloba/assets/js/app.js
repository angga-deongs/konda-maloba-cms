(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

var _utilities = require("./utilities");
var _components = require("../../components");
var _templates = require("../../templates");
// --- utilities

// --- components

// --- templates

// --- App
var App = function () {
  // --- run transition
  var runTransition = function runTransition() {
    $("body").removeClass("hold-transition");
  };

  // --- show site content
  var showSiteContent = function showSiteContent() {
    $(".js-main-site").removeClass("main-site--hide");
    // --- disable scroll
    _utilities.Scrolllable.enable();
  };

  // --- ready
  var ready = function ready() {
    (function ($) {
      // --- disable scroll
      _utilities.Scrolllable.disable();

      // --- global
      runTransition();
      showSiteContent();
      _utilities.BrowserCheck.init();

      // --- components
      _components.Header.init();
      _components.Footer.init();
      _components.ExampleSection.init();
      _components.ExampleItem.init();

      // --- templates
      _templates.Default.init();
    })(jQuery);
  };

  // --- load
  var load = function load() {
    (function ($) {
      $(window).on("load", function () {});
    })(jQuery);
  };

  // --- init
  var init = function init() {
    load();
    ready();
  };

  // --- return
  return {
    init: init
  };
}();

// ---  run main js
App.init();

},{"../../components":14,"../../templates":16,"./utilities":6}],2:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
/* ------------------------------------------------------------------------------
@name: BrowserCheck
@description: BrowserCheck
--------------------------------------------------------------------------------- */

// --- BrowserCheck
var BrowserCheck = function () {
  // --- handleCheck
  var handleCheck = function handleCheck() {
    var _browser = 'dekstop-browser';
    var HTMLElement = document.getElementsByTagName('html')[0];
    if (navigator.userAgent.match(/Android/i)) {
      _browser = 'android-browser';
    } else if (navigator.userAgent.match(/BlackBerry/i)) {
      _browser = 'blackberry-browser';
    } else if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) {
      _browser = 'ios-browser';
    } else if (navigator.userAgent.match(/IEMobile/i)) {
      _browser = 'windows-phone-browser';
    }
    $('html').addClass(_browser);
  };

  // --- init
  var init = function init() {
    handleCheck();
  };

  // --- return
  return {
    init: init
  };
}();
var _default = exports["default"] = BrowserCheck;

},{}],3:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
/* ------------------------------------------------------------------------------
@name: Scrolllable
@description: Scrolllable
--------------------------------------------------------------------------------- */

// --- Scrolllable
var Scrolllable = function () {
  // --- handleEnable
  var handleEnable = function handleEnable() {
    $('body').removeClass('rm-scroll');
  };

  // --- handleDisable
  var handleDisable = function handleDisable() {
    $('body').addClass('rm-scroll');
  };

  // --- return
  return {
    enable: handleEnable,
    disable: handleDisable
  };
}();
var _default = exports["default"] = Scrolllable;

},{}],4:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
/* ------------------------------------------------------------------------------
@name: Session
@description: Session
--------------------------------------------------------------------------------- */

// --- Session
var Session = function () {
  var _timeoutSession;

  // --- handleSet
  var handleSet = function handleSet(key, value) {
    return localStorage.setItem(key, value);
  };

  // --- handleGet
  var handleGet = function handleGet(key, value) {
    return localStorage.getItem(key, value);
  };

  // --- handleRemove
  var handleRemove = function handleRemove(key) {
    return localStorage.removeItem(key);
  };

  // --- handleClear
  var handleClear = function handleClear(key) {
    return localStorage.clear();
  };

  // --- handleTimeout
  var handleTimeout = function handleTimeout(callbackFunction) {
    var timer = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 30;
    _timeoutSession = setTimeout(function () {
      callbackFunction();
    }, timer * 1000);
    document.addEventListener('mousemove', function (e) {
      clearTimeout(_timeoutSession);
      _timeoutSession = setTimeout(function () {
        callbackFunction();
      }, timer * 1000);
    }, true);
  };

  // --- return
  return {
    set: handleSet,
    get: handleGet,
    remove: handleRemove,
    clear: handleClear,
    timeout: handleTimeout
  };
}();
var _default = exports["default"] = Session;

},{}],5:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
var _variables = require("../variables");
/* ------------------------------------------------------------------------------
@name: Validation
@description: Validation
--------------------------------------------------------------------------------- */

// --- variables

var Validation = function () {
  // - handleInput
  var handleInput = function handleInput(eventsEl, selectorEl) {
    $.each(eventsEl, function (ie, ve) {
      $.each(selectorEl, function (i, v) {
        $("#" + v.id).on(ve, function (e) {
          var _this = $(e.currentTarget),
            _val = _this.val(),
            _target = _this.attr("data-target"),
            _alertEl = $("#" + _target);
          var _errorMessage;

          // Condition if validation does not error
          _alertEl.removeClass("error");
          _this.parent().removeClass("error");

          // Minimum Validation
          if (v.validation.minimum) {
            if (_val.length < v.validation.minimumChar) {
              _errorMessage = _alertEl.attr("data-invalid");
            }
          }

          // Maximum Validation
          if (v.validation.maximum) {
            if (_val.length < v.validation.maximumChar) {
              _errorMessage = _alertEl.attr("data-invalid");
            }
          }

          // Minimum Validation
          if (v.validation.name) {
            if (!_variables.PERSON_NAME.test(_val)) {
              _errorMessage = _alertEl.attr("data-invalid");
            }
          }

          // Email validation
          if (v.validation.email) {
            if (!_variables.EMAIL.test(_val)) {
              _errorMessage = _alertEl.attr("data-invalid");
            }
          }

          // Numeric validation
          if (v.validation.phone) {
            if (!_variables.PHONE_NUMBER.test(_val)) {
              _errorMessage = _alertEl.attr("data-invalid-phone");
            }
          }

          // Required validation
          if (_variables.WHITESPACE.test(_val)) {
            _errorMessage = _alertEl.attr("data-req");
          }

          // Error Message
          if (_errorMessage !== undefined) {
            _alertEl.text(_errorMessage);
            _alertEl.addClass("error");
            _this.parent().addClass("error");
          }
        });
      });
    });

    // Return Handle keypress
    handleKeypress();
  };

  // handleKeypress
  var handleKeypress = function handleKeypress() {
    $(".number-only").on("keypress", function (e) {
      var _this = $(e.currentTarget),
        _val = _this.val(),
        _target = _this.attr("data-target"),
        _alertEl = $("#" + _target);
      var _errorMessage;
      if (!_variables.NUMBERIC.test(e.key)) {
        _errorMessage = _alertEl.attr("data-invalid");
        _alertEl.text(_errorMessage);
        _alertEl.addClass("error");
        _this.parent().addClass("error");
        // remove error after few second
        setTimeout(function () {
          _alertEl.removeClass("error");
          _this.parent().removeClass("error");
        }, 2000);
        e.preventDefault();
      }
    });
  };
  return {
    config: handleInput
  };
}();
var _default = exports["default"] = Validation;

},{"../variables":9}],6:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
Object.defineProperty(exports, "BrowserCheck", {
  enumerable: true,
  get: function get() {
    return _BrowserCheck["default"];
  }
});
Object.defineProperty(exports, "Scrolllable", {
  enumerable: true,
  get: function get() {
    return _Scrolllable["default"];
  }
});
Object.defineProperty(exports, "Session", {
  enumerable: true,
  get: function get() {
    return _Session["default"];
  }
});
Object.defineProperty(exports, "Validation", {
  enumerable: true,
  get: function get() {
    return _Validation["default"];
  }
});
Object.defineProperty(exports, "isOS", {
  enumerable: true,
  get: function get() {
    return _isOS["default"];
  }
});
var _isOS = _interopRequireDefault(require("./isOS"));
var _BrowserCheck = _interopRequireDefault(require("./BrowserCheck"));
var _Scrolllable = _interopRequireDefault(require("./Scrolllable"));
var _Validation = _interopRequireDefault(require("./Validation"));
var _Session = _interopRequireDefault(require("./Session"));
function _interopRequireDefault(e) { return e && e.__esModule ? e : { "default": e }; }

},{"./BrowserCheck":2,"./Scrolllable":3,"./Session":4,"./Validation":5,"./isOS":7}],7:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
/* ------------------------------------------------------------------------------
@name: isOS
@description: isOS
--------------------------------------------------------------------------------- */

var isOS = {
  android: function android() {
    return navigator.userAgent.match(/Android/i);
  },
  blackberry: function blackberry() {
    return navigator.userAgent.match(/BlackBerry/i);
  },
  iOS: function iOS() {
    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
  },
  mac: function mac() {
    return navigator.platform.indexOf('Mac') > -1;
  },
  opera: function opera() {
    return navigator.userAgent.match(/Opera Mini/i);
  },
  win: function win() {
    return navigator.platform.indexOf('Win') > -1;
  },
  winMobile: function winMobile() {
    return navigator.userAgent.match(/IEMobile/i);
  },
  any: function any() {
    return isOS.android() || isOS.blackberry() || isOS.iOS() || isOS.mac() || isOS.opera() || isOS.win() || isOS.winMobile();
  }
};
var _default = exports["default"] = isOS;

},{}],8:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.WHITESPACE = exports.PHONE_NUMBER = exports.PERSON_NAME = exports.NUMBERIC = exports.FULL_NAME = exports.EMAIL = void 0;
/* ------------------------------------------------------------------------------
@name: Regex
@description: Regex
--------------------------------------------------------------------------------- */

var WHITESPACE = exports.WHITESPACE = /^ *$/;
var EMAIL = exports.EMAIL = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
var NUMBERIC = exports.NUMBERIC = /[0-9]+$/i;
var PHONE_NUMBER = exports.PHONE_NUMBER = /^(0|\+62)+([0-9]){4,16}/i;
var FULL_NAME = exports.FULL_NAME = /^(?:[\u00c0-\u01ffa-zA-Z-\s\.']){3,}(?:[\u00c0-\u01ffa-zA-Z-\s\.']{3,})+$/i;
var PERSON_NAME = exports.PERSON_NAME = /^[a-zA-Z][a-zA-Z\-' ]*[a-zA-Z ]$/i;

},{}],9:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
var _Regex = require("./Regex");
Object.keys(_Regex).forEach(function (key) {
  if (key === "default" || key === "__esModule") return;
  if (key in exports && exports[key] === _Regex[key]) return;
  Object.defineProperty(exports, key, {
    enumerable: true,
    get: function get() {
      return _Regex[key];
    }
  });
});

},{"./Regex":8}],10:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
/* ------------------------------------------------------------------------------
@name: ExampleItem
@description: ExampleItem
--------------------------------------------------------------------------------- */

var ExampleItem = function () {
  // - handleSayHello
  var handleSayHello = function handleSayHello() {
    console.log("hello world example item");
  };

  // - init
  var init = function init() {
    handleSayHello();
  };
  return {
    init: init
  };
}();
var _default = exports["default"] = ExampleItem;

},{}],11:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
/* ------------------------------------------------------------------------------
@name: Example Section
@description: Example Section
--------------------------------------------------------------------------------- */

var ExampleSection = function () {
  // - handleSayHello
  var handleSayHello = function handleSayHello() {
    console.log("hello world example section");
  };

  // - init
  var init = function init() {
    handleSayHello();
  };
  return {
    init: init
  };
}();
var _default = exports["default"] = ExampleSection;

},{}],12:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
/* ------------------------------------------------------------------------------
@name: Footer
@description: Footer
--------------------------------------------------------------------------------- */

var Footer = function () {
  // - handleSayHello
  var handleSayHello = function handleSayHello() {
    console.log("hello world example footer");
  };

  // - init
  var init = function init() {
    handleSayHello();
  };
  return {
    init: init
  };
}();
var _default = exports["default"] = Footer;

},{}],13:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
/* ------------------------------------------------------------------------------
@name: Header
@description: Header
--------------------------------------------------------------------------------- */

var Header = function () {
  // - handleSayHello
  var handleSayHello = function handleSayHello() {
    console.log("hello world example header");
  };

  // - init
  var init = function init() {
    handleSayHello();
  };
  return {
    init: init
  };
}();
var _default = exports["default"] = Header;

},{}],14:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
Object.defineProperty(exports, "ExampleItem", {
  enumerable: true,
  get: function get() {
    return _ExampleItem["default"];
  }
});
Object.defineProperty(exports, "ExampleSection", {
  enumerable: true,
  get: function get() {
    return _ExampleSection["default"];
  }
});
Object.defineProperty(exports, "Footer", {
  enumerable: true,
  get: function get() {
    return _Footer["default"];
  }
});
Object.defineProperty(exports, "Header", {
  enumerable: true,
  get: function get() {
    return _Header["default"];
  }
});
var _Header = _interopRequireDefault(require("./Header"));
var _Footer = _interopRequireDefault(require("./Footer"));
var _ExampleSection = _interopRequireDefault(require("./Example/ExampleSection"));
var _ExampleItem = _interopRequireDefault(require("./Example/ExampleItem"));
function _interopRequireDefault(e) { return e && e.__esModule ? e : { "default": e }; }

},{"./Example/ExampleItem":10,"./Example/ExampleSection":11,"./Footer":12,"./Header":13}],15:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
/* ------------------------------------------------------------------------------
@name: Default
@description: Default
--------------------------------------------------------------------------------- */

var Default = function () {
  // - handleSayHello
  var handleSayHello = function handleSayHello() {
    console.log("hello world example template");
  };

  // - init
  var init = function init() {
    handleSayHello();
  };
  return {
    init: init
  };
}();
var _default = exports["default"] = Default;

},{}],16:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
Object.defineProperty(exports, "Default", {
  enumerable: true,
  get: function get() {
    return _Default["default"];
  }
});
var _Default = _interopRequireDefault(require("./Default"));
function _interopRequireDefault(e) { return e && e.__esModule ? e : { "default": e }; }

},{"./Default":15}]},{},[1])

//# sourceMappingURL=maps/app.js.map
