_$ES.Define("flash.events::UncaughtErrorEvent",["flash.events::ErrorEvent","Object","flash.events::Event","flash.events::TextEvent"],function(n){"use strict";var t={},i=n.createScope({},t,"flash.events::ErrorEvent");return t["flash.events::UncaughtErrorEvent"]=function(i){function u(n,t,r,u){n=n==null?null:""+n;t===undefined&&(t=!1);r===undefined&&(r=!1);u===undefined&&(u=null);i.call(this,n,t,r)}var r=n.createScope({},t,"flash.events::ErrorEvent","Object","flash.events::Event","flash.events::TextEvent");return r._$push(r.Object,r.Event,r.TextEvent,r.ErrorEvent),r._$push(u),u._$TypeInfo={so:n,isDynamic:!1,isFinal:!1,isInterface:!1,fullName:"flash.events::UncaughtErrorEvent",theExtends:r.ErrorEvent,theImplements:[]},_$ES.F._extends(u,i),n.defField(u.prototype,"__error__"),n.defProp(u.prototype,"error",function(){return this.__error__},!1),function(){var t=arguments[0]._$clone();n.defConstField(u,"UNCAUGHT_ERROR","uncaughtError")}(r),function(){}.call(u),u},function(){t["flash.events::UncaughtErrorEvent"]=t["flash.events::UncaughtErrorEvent"](i.ErrorEvent)}.call(t),t});