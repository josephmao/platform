_$ES.Define("flash.events::AsyncErrorEvent",["flash.events::ErrorEvent","Object","flash.events::Event","flash.events::TextEvent"],function(n){"use strict";var t={},i=n.createScope({},t,"flash.events::ErrorEvent");return t["flash.events::AsyncErrorEvent"]=function(i){function u(n,t,r,u,f){n=n==null?null:""+n;t===undefined&&(t=!1);r===undefined&&(r=!1);u===undefined&&(u="");u=u==null?null:""+u;f===undefined&&(f=null);this.error=f;i.call(this,n,t,r,u,f?f.errorID:0)}var r=n.createScope({},t,"flash.events::ErrorEvent","Object","flash.events::Event","flash.events::TextEvent");return r._$push(r.Object,r.Event,r.TextEvent,r.ErrorEvent),r._$push(u),u._$TypeInfo={so:n,isDynamic:!1,isFinal:!1,isInterface:!1,fullName:"flash.events::AsyncErrorEvent",theExtends:r.ErrorEvent,theImplements:[]},_$ES.F._extends(u,i),n.defField(u.prototype,"error"),function(){var t=arguments[0]._$clone();n.defConstField(u,"ASYNC_ERROR","asyncError")}(r),function(){}.call(u),u},function(){t["flash.events::AsyncErrorEvent"]=t["flash.events::AsyncErrorEvent"](i.ErrorEvent)}.call(t),t});