_$ES.Define("flash.utils::getTimer",["Date"],function(n){"use strict";var t={},i=n.createScope({},t,"Date");return t["flash.utils::getTimer"]=function(){return(new i.Date).time-n.appInfo.createDate.time>>0},function(){}.call(t),t});