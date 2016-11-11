_$ES.Define("XMLList",["Object","XML","TypeError","Number"],function(n){"use strict";var t={},i=n.createScope({},t,"Object","XML");return t.XMLList=function(i){function r(t){if(n.isConstructorCall(this,u.XMLList))if(t==null)throw new u.TypeError;else return n._is(t,u.XML)?t:new u.XML(u.XML._$loadNode(t));n.defField(this,"_$xmlList",[]);i.call(this)}var u=n.createScope({},t,"XMLList","TypeError","XML","Object","Number");return u._$push(u.Object,u.Object),u._$push(r),r._$TypeInfo={so:n,isDynamic:!1,isFinal:!1,isInterface:!1,fullName:"XMLList",theExtends:u.Object,theImplements:[]},_$ES.F._extends(r,i),n.defField(r.prototype,"_$xmlList"),n.defMethod(r.prototype,"_$appendXML",function(n){var t=this._$xmlList;this[t.length]=n;t.push(n)}),n.defMethod(r.prototype,"_$appendXMLList",function(n){var t=null;if(n&&n!=this)for(var r=this._$xmlList,u=n._$xmlList,i=0,f=u.length-0;i<f;)t=u[i],this[r.length]=t,r.push(t),i++}),n.defMethod(r.prototype,"_$appendComplete",function(){if(this._$xmlList.length!=1)return this;for(var i=this._$xmlList[0],f=i._$node.childNodes,r=0,e=f.length-0;r<e;)i._$createProp(this,i,f[r]),r++;return n._is(i,u.XML._$simpleContentXMLClass)?new t._$SingleSimpleContentXMLList(i):new t._$SingleContentXMLList(i)}),n.defMethod(r.prototype,"_$removeXML",function(){}),n.defMethod(r.prototype,"length",function(){return this._$xmlList.length>>0}),n.defMethod(r.prototype,"_$eachList",function(n){for(var i=this._$xmlList,r=new u.XMLList,t=0,f=i.length-0;t<f;)r._$appendXMLList(n(i[t])),t++;return r._$appendComplete()}),n.defMethod(r.prototype,"attribute",function(n){var t=this;return this._$eachList(function(t){return t.attribute(n)})}),n.defMethod(r.prototype,"_$getAttribute",function(n){return this.attribute(n)}),n.defMethod(r.prototype,"_$setAttribute",function(n,t){var i=this;this._$eachList(function(i){i._$setAttribute(n,t)})}),n.defMethod(r.prototype,"attributes",function(){var n=this;return this._$eachList(function(n){return n.attributes()})}),n.defMethod(r.prototype,"child",function(n){var t=this;return this._$eachList(function(t){return t.child(n)})}),n.defMethod(r.prototype,"children",function(){var n=this;return this._$eachList(function(n){return n.children()})}),n.defMethod(r.prototype,"comments",function(){var n=this;return this._$eachList(function(n){return n.comments()})}),n.defMethod(r.prototype,"contains",function(n){for(var i=this._$xmlList,t=0,r=i.length-0;t<r;){if(i[t].contains(n))return!0;t++}return!1}),n.defMethod(r.prototype,"copy",function(){for(var t=this._$xmlList,i=new u.XMLList,n=0,r=t.length-0;n<r;)i._$appendXML(t[n].copy()),n++;return i._$appendComplete()}),n.defMethod(r.prototype,"descendants",function(n){n===undefined&&(n="*");var t=this;return this._$eachList(function(t){return t.descendants(n)})}),n.defMethod(r.prototype,"elements",function(n){n===undefined&&(n="*");var t=this;return this._$eachList(function(t){return t.elements(n)})}),n.defMethod(r.prototype,"hasComplexContent",function(){var n=NaN,i=NaN,t=this._$xmlList;if(t.length>0)for(n=0,i=t.length-0;n<i;){if(t[n].hasComplexContent())return!0;n++}return!1}),n.defMethod(r.prototype,"hasOwnProperty",function(n){n=n==null?null:""+n;var t=NaN,r=NaN,i=this._$xmlList;if(i.length>0)for(t=0,r=i.length-0;t<r;){if(i[t].hasOwnProperty(n))return!0;t++}return!1}),n.defMethod(r.prototype,"hasSimpleContent",function(){var n=NaN,i=NaN,t=this._$xmlList;if(t.length>0){for(n=0,i=t.length-0;n<i;){if(t[n].hasSimpleContent())return!0;n++}return!1}return!0}),n.defMethod(r.prototype,"normalize",function(){var n=NaN,i=NaN,t=this._$xmlList;if(t.length>0)for(n=0,i=t.length-0;n<i;)t[n].normalize(),n++;return this}),n.defMethod(r.prototype,"parent",function(){var n=NaN,r=NaN,i=null,t=this._$xmlList;if(t.length>0){for(i=t[0].parent(),n=0,r=t.length-0;n<r;){if(i!==t[n].parent())return undefined;n++}return i||undefined}return undefined}),n.defMethod(r.prototype,"processingInstructions",function(n){n===undefined&&(n="*");n=n==null?null:""+n;var t=this;return this._$eachList(function(t){return t.processingInstructions(n)})}),n.defMethod(r.prototype,"propertyIsEnumerable",function(n){n=n==null?null:""+n;var t=u.Number(n)-0;return t>=0&&t<this._$xmlList.length?!0:!1}),n.defMethod(r.prototype,"text",function(){var n=this;return this._$eachList(function(n){return n.text()})}),n.defMethod(r.prototype,"toString",function(){for(var i=this._$xmlList,n="",t=0,r=i.length-0;t<r;)n=n+i[t].toString(),t++;return n}),n.defMethod(r.prototype,"toXMLString",function(){for(var i=this._$xmlList,n="",t=0,r=i.length-0;t<r;)n=n+i[t].toXMLString(),t++;return n}),n.defMethod(r.prototype,"valueOf",function(){return this}),n.defFunc(r.prototype,"_$get",function(n){var t=this._$xmlList,i;return t.length==1?t[0]._$get(n):(i=this[n],n>>0==+n)?i:new u.XMLList}),n.defFunc(r.prototype,"_$set",function(t,i){if(n._is(i,u.XML))this._$appendXML(i);else if(n._is(i,u.XMLList))this._$appendXMLList(i);else return this[t]=i}),n.defFunc(r.prototype,"_$delete",function(n){return delete this[n]}),n.defFunc(r.prototype,"_$in",function(n){return n in this}),function(){}.call(r),r},t._$SingleContentXMLList=function(i){function u(n){i.call(this);this._$$_$appendXML(n)}var r=n.createScope({},t,"XMLList","Object");return r._$push(r.Object,r.Object,r.XMLList),r._$push(u),u._$TypeInfo={so:n,isDynamic:!1,isFinal:!1,isInterface:!1,fullName:"ASXMLList.as$406::_$SingleContentXMLList",theExtends:r.XMLList,theImplements:[]},_$ES.F._extends(u,i),function(){}.call(u),u},t._$SingleSimpleContentXMLList=function(i){function u(n){i.call(this);this._$$_$appendXML(n)}var r=n.createScope({},t,"XMLList","Object");return r._$push(r.Object,r.Object,r.XMLList),r._$push(u),u._$TypeInfo={so:n,isDynamic:!1,isFinal:!1,isInterface:!1,fullName:"ASXMLList.as$406::_$SingleSimpleContentXMLList",theExtends:r.XMLList,theImplements:[]},_$ES.F._extends(u,i),function(){}.call(u),u},function(){var r=this;return t.XMLList=t.XMLList(i.Object),t._$SingleContentXMLList=t._$SingleContentXMLList(t.XMLList),t._$SingleSimpleContentXMLList=t._$SingleSimpleContentXMLList(t.XMLList),function(){for(var r,f,e=n.js.Object.getOwnPropertyNames(i.XML.prototype),o=t._$SingleContentXMLList.prototype,u=0,s=e.length;u<s;)r=e[u],f=i.XML.prototype[r],typeof f!="function"||r=="constructor"||o[r]||n.defMethod(o,r,function(n){return n=n==null?null:""+n,function(){return i.XML.prototype[n].apply(this,arguments)}}(r)),u++}(),function(){var u,r,e;u=i.XML._$simpleContentXMLClass;for(var o=n.js.Object.getOwnPropertyNames(u.prototype),s=t._$SingleSimpleContentXMLList.prototype,f=0,h=o.length;f<h;)r=o[f],e=u.prototype[r],typeof e!="function"||r=="constructor"||s[r]||n.defMethod(s,r,function(n){return n=n==null?null:""+n,function(){return u.prototype[n].apply(this,arguments)}}(r)),f++}()}.call(t),t});