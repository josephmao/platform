_$ES.Define("flash.events::GeolocationEvent",["flash.events::Event","Object"],function(n){"use strict";var t={},i=n.createScope({},t,"flash.events::Event");return t["flash.events::GeolocationEvent"]=function(i){function r(n,t,r,u,f,e,o,s,h,c,l){n=n==null?null:""+n;t===undefined&&(t=!1);r===undefined&&(r=!1);u===undefined&&(u=0);u=+u;f===undefined&&(f=0);f=+f;e===undefined&&(e=0);e=+e;o===undefined&&(o=0);o=+o;s===undefined&&(s=0);s=+s;h===undefined&&(h=0);h=+h;c===undefined&&(c=0);c=+c;l===undefined&&(l=0);l=+l;i.call(this,n,t,r);this.latitude=u;this.longitude=f;this.altitude=e;this.horizontalAccuracy=o;this.verticalAccuracy=s;this.speed=h;this.heading=c;this.timestamp=l}var u=n.createScope({},t,"flash.events::Event","Object");return u._$push(u.Object,u.Event),u._$push(r),r._$TypeInfo={so:n,isDynamic:!1,isFinal:!1,isInterface:!1,fullName:"flash.events::GeolocationEvent",theExtends:u.Event,theImplements:[]},_$ES.F._extends(r,i),n.defProp(r.prototype,"altitude",function(){return this._$altitude},function(n){n=+n;this._$altitude=n}),n.defField(r.prototype,"_$altitude"),n.defProp(r.prototype,"heading",function(){return this._$heading},function(n){n=+n;this._$heading=n}),n.defField(r.prototype,"_$heading"),n.defProp(r.prototype,"horizontalAccuracy",function(){return this._$horizontalAccuracy},function(n){n=+n;this._$horizontalAccuracy=n}),n.defField(r.prototype,"_$horizontalAccuracy"),n.defProp(r.prototype,"latitude",function(){return this._$latitude},function(n){n=+n;this._$latitude=n}),n.defField(r.prototype,"_$latitude"),n.defProp(r.prototype,"longitude",function(){return this._$longitude},function(n){n=+n;this._$longitude=n}),n.defField(r.prototype,"_$longitude"),n.defProp(r.prototype,"speed",function(){return this._$speed},function(n){n=+n;this._$speed=n}),n.defField(r.prototype,"_$speed"),n.defProp(r.prototype,"timestamp",function(){return this._$timestamp},function(n){n=+n;this._$timestamp=n}),n.defField(r.prototype,"_$timestamp"),n.defProp(r.prototype,"verticalAccuracy",function(){return this._$verticalAccuracy},function(n){n=+n;this._$verticalAccuracy=n}),n.defField(r.prototype,"_$verticalAccuracy"),function(){var t=arguments[0]._$clone();n.defConstField(r,"UPDATE","update")}(u),function(){}.call(r),r},function(){t["flash.events::GeolocationEvent"]=t["flash.events::GeolocationEvent"](i.Event)}.call(t),t});