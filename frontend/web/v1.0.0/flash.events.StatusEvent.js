_$ES.Define("flash.events::StatusEvent",["flash.events::Event","Object"],function(n){"use strict";var t={},i=n.createScope({},t,"flash.events::Event");return t["flash.events::StatusEvent"]=function(i){function r(n,t,r,u,f){n=n==null?null:""+n;t===undefined&&(t=!1);r===undefined&&(r=!1);u===undefined&&(u="");u=u==null?null:""+u;f===undefined&&(f="");f=f==null?null:""+f;i.call(this,n,t,r);this.code=u;this.level=f}var u=n.createScope({},t,"flash.events::Event","Object");return u._$push(u.Object,u.Event),u._$push(r),r._$TypeInfo={so:n,isDynamic:!1,isFinal:!1,isInterface:!1,fullName:"flash.events::StatusEvent",theExtends:u.Event,theImplements:[]},_$ES.F._extends(r,i),n.defField(r.prototype,"_$code"),n.defProp(r.prototype,"code",function(){return this._$code},function(n){n=n==null?null:""+n;this._$code=n}),n.defField(r.prototype,"_$level"),n.defProp(r.prototype,"level",function(){return this._$level},function(n){n=n==null?null:""+n;this._$level=n}),function(){var t=arguments[0]._$clone();n.defConstField(r,"STATUS","status")}(u),function(){}.call(r),r},function(){t["flash.events::StatusEvent"]=t["flash.events::StatusEvent"](i.Event)}.call(t),t});