_$ES.Define("flash.utils::getDefinitionByName",["flash.system::ApplicationDomain"],function(n){"use strict";var t={},i=n.createScope({},t,"flash.system::ApplicationDomain");return t["flash.utils::getDefinitionByName"]=function(t,r){return t=t==null?null:""+t,r===undefined&&(r=null),r||(r=n.appInfo.mainSWFParse.so,_$ES.F.error(r.appInfo,'未能正常调用 getDefinitionByName 函数，请按一般方式对Loader进行调用：getDefinitionByName("name"); 程序可能无法正常运行')),i.ApplicationDomain._$getDomain(r)._$$getDefinition(t)},function(){}.call(t),t});