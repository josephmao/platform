_$ES.Define("flash.events::TimerEvent",["flash.events::Event","Object"],function(n){"use strict";var t={},i=n.createScope({},t,"flash.events::Event");return t["flash.events::TimerEvent"]=function(i){function r(n,t,r){n=n==null?null:""+n;t===undefined&&(t=!1);r===undefined&&(r=!1);i.call(this,n,t,r)}var u=n.createScope({},t,"flash.events::Event","Object");return u._$push(u.Object,u.Event),u._$push(r),r._$TypeInfo={so:n,isDynamic:!1,isFinal:!1,isInterface:!1,fullName:"flash.events::TimerEvent",theExtends:u.Event,theImplements:[]},_$ES.F._extends(r,i),n.defMethod(r.prototype,"updateAfterEvent",function(){this._$isUpdateAfterEvent=!0}),n.defField(r.prototype,"_$isUpdateAfterEvent",!1),function(){var t=arguments[0]._$clone();n.defConstField(r,"TIMER","timer");n.defConstField(r,"TIMER_COMPLETE","timerComplete")}(u),function(){}.call(r),r},function(){t["flash.events::TimerEvent"]=t["flash.events::TimerEvent"](i.Event)}.call(t),t});