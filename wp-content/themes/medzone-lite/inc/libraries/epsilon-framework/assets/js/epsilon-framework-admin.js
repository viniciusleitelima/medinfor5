!function(e){function t(r){if(n[r])return n[r].exports;var i=n[r]={i:r,l:!1,exports:{}};return e[r].call(i.exports,i,i.exports,t),i.l=!0,i.exports}var n={};t.m=e,t.c=n,t.i=function(e){return e},t.d=function(e,n,r){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:r})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="/assets/js/",t(t.s=33)}({0:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r=function(){function e(e){this.args=e}return e.prototype.request=function(){var e=this;jQuery.ajax({type:"POST",data:{action:"epsilon_framework_ajax_action",args:e.args},dataType:"json",url:EpsilonWPUrls.ajaxurl,success:function(t){e.result=t,jQuery(e).trigger("epsilon-received-success")},error:function(e,t,n){console.log(e+" :: "+t+" :: "+n)}})},e}();t.EpsilonAjaxRequest=r},10:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r=n(0),i=function(){function e(){}return e.prototype.init=function(){var e,t,n,i=jQuery(".epsilon-framework-notice");jQuery.each(i,function(){jQuery(this).on("click",".notice-dismiss",function(){e=jQuery(this).parent().attr("data-unique-id"),t={action:["Epsilon_Notifications","dismiss_notice"],nonce:EpsilonWPUrls.ajax_nonce,args:{notice_id:jQuery(this).parent().attr("data-unique-id"),user_id:userSettings.uid}},n=new r.EpsilonAjaxRequest(t),n.request()})})},e}();t.EpsilonNotices=i},33:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r=n(10);jQuery(document).ready(function(){(new r.EpsilonNotices).init()})}});
//# sourceMappingURL=epsilon-framework-admin.js.map