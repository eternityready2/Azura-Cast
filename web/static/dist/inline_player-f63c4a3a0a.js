"use strict";function _typeof(e){return(_typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}var InlinePlayer=function(n){var r={};function i(e){if(r[e])return r[e].exports;var t=r[e]={i:e,l:!1,exports:{}};return n[e].call(t.exports,t,t.exports,i),t.l=!0,t.exports}return i.m=n,i.c=r,i.d=function(e,t,n){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},i.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"==_typeof(t)&&t&&t.__esModule)return t;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)i.d(n,r,function(e){return t[e]}.bind(null,r));return n},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="/static/dist",i(i.s=5)}([function(n,r,e){(function(c){var e,t;void 0===(t="function"==typeof(e=function(){var r,o={},e="undefined"!=typeof window?window:c,t=e.document;if(o.disabled=!1,o.version="1.3.20",o.set=function(e,t){},o.get=function(e,t){},o.has=function(e){return void 0!==o.get(e)},o.remove=function(e){},o.clear=function(){},o.transact=function(e,t,n){null==n&&(n=t,t=null),null==t&&(t={});var r=o.get(e,t);n(r),o.set(e,r)},o.getAll=function(){},o.forEach=function(){},o.serialize=function(e){return JSON.stringify(e)},o.deserialize=function(t){if("string"==typeof t)try{return JSON.parse(t)}catch(e){return t||void 0}},function(){try{return"localStorage"in e&&e.localStorage}catch(e){return 0}}())r=e.localStorage,o.set=function(e,t){return void 0===t?o.remove(e):(r.setItem(e,o.serialize(t)),t)},o.get=function(e,t){var n=o.deserialize(r.getItem(e));return void 0===n?t:n},o.remove=function(e){r.removeItem(e)},o.clear=function(){r.clear()},o.getAll=function(){var n={};return o.forEach(function(e,t){n[e]=t}),n},o.forEach=function(e){for(var t=0;t<r.length;t++){var n=r.key(t);e(n,o.get(n))}};else if(t&&t.documentElement.addBehavior){var i,n;try{(n=new ActiveXObject("htmlfile")).open(),n.write('<script>document.w=window<\/script><iframe src="/favicon.ico"></iframe>'),n.close(),i=n.w.frames[0].document,r=i.createElement("div")}catch(o){r=t.createElement("div"),i=t.body}var a=function(n){return function(){var e=Array.prototype.slice.call(arguments,0);e.unshift(r),i.appendChild(r),r.addBehavior("#default#userData"),r.load("localStorage");var t=n.apply(o,e);return i.removeChild(r),t}},s=new RegExp("[!\"#$%&'()*+,/\\\\:;<=>?@[\\]^`{|}~]","g"),u=function(e){return e.replace(/^d/,"___$&").replace(s,"___")};o.set=a(function(e,t,n){return t=u(t),void 0===n?o.remove(t):(e.setAttribute(t,o.serialize(n)),e.save("localStorage"),n)}),o.get=a(function(e,t,n){t=u(t);var r=o.deserialize(e.getAttribute(t));return void 0===r?n:r}),o.remove=a(function(e,t){t=u(t),e.removeAttribute(t),e.save("localStorage")}),o.clear=a(function(e){var t=e.XMLDocument.documentElement.attributes;e.load("localStorage");for(var n=t.length-1;0<=n;n--)e.removeAttribute(t[n].name);e.save("localStorage")}),o.getAll=function(e){var n={};return o.forEach(function(e,t){n[e]=t}),n},o.forEach=a(function(e,t){for(var n,r=e.XMLDocument.documentElement.attributes,i=0;n=r[i];++i)t(n.name,o.deserialize(e.getAttribute(n.name)))})}try{var l="__storejs__";o.set(l,l),o.get(l)!=l&&(o.disabled=!0),o.remove(l)}catch(r){o.disabled=!0}return o.enabled=!o.disabled,o})?e.apply(r,[]):e)||(n.exports=t)}).call(this,e(4))},function(e,t,n){var r=n(2);"string"==typeof r&&(r=[[e.i,r,""]]),r.locals&&(e.exports=r.locals),(0,n(6).default)("82b230ec",r,!1,{})},function(e,t,n){(e.exports=n(3)(!1)).push([e.i,"\n.player-inline .inline-seek{width:300px\n}\n.player-inline .inline-seek div.time-display{font-size:90%\n}\n.player-inline .inline-volume-controls{width:175px\n}\n.player-inline input.player-volume-range,.player-inline input.player-seek-range{width:100%;height:10px\n}\n",""])},function(e,t,n){e.exports=function(t){var a=[];return a.toString=function(){return this.map(function(o){var e=function(e){var t=o[1]||"",n=o[3];if(!n)return t;if(e&&"function"==typeof btoa){var r="/*# sourceMappingURL=data:application/json;charset=utf-8;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(n))))+" */",i=n.sources.map(function(e){return"/*# sourceURL="+n.sourceRoot+e+" */"});return[t].concat(i).concat([r]).join("\n")}return[t].join("\n")}(t);return o[2]?"@media "+o[2]+"{"+e+"}":e}).join("")},a.i=function(e,t){"string"==typeof e&&(e=[[null,e,""]]);for(var n={},r=0;r<this.length;r++){var i=this[r][0];null!=i&&(n[i]=!0)}for(r=0;r<e.length;r++){var o=e[r];null!=o[0]&&n[o[0]]||(t&&!o[2]?o[2]=t:t&&(o[2]="("+o[2]+") and ("+t+")"),a.push(o))}},a}},function(e,t){var n;n=function(){return this}();try{n=n||new Function("return this")()}catch(e){"object"==("undefined"==typeof window?"undefined":_typeof(window))&&(n=window)}e.exports=n},function(e,t,n){n.r(t);var r=n(0),i=n.n(r);function o(e){return Math.min((Math.exp(e/100)-1)/(Math.E-1),1)}function a(){var e=this.$createElement,t=this._self._c||e;return this.is_playing?t("audio",{ref:"audio",attrs:{title:this.title}}):this._e()}var s={props:{title:String},data:function(){return{is_playing:!1,audio:null,volume:55,duration:0,currentTime:0}},mounted:function(){var t=this;if("mediaSession"in navigator&&navigator.mediaSession.setActionHandler("pause",function(){t.stop()}),i.a.enabled&&void 0!==i.a.get("player_volume")&&(this.volume=i.a.get("player_volume",this.volume)),"undefined"!=typeof URLSearchParams){var e=new URLSearchParams(window.location.search);e.has("volume")&&(this.volume=parseInt(e.get("volume")))}this.$eventHub.$on("player_toggle",function(e){t.is_playing&&t.audio.src===e?t.stop():(t.stop(),Vue.nextTick(function(){t.play(e)}))})},watch:{volume:function(e){null!==this.audio&&(this.audio.volume=o(e)),i.a.enabled&&i.a.set("player_volume",e)}},methods:{stop:function(){null!==this.audio&&(this.$eventHub.$emit("player_stopped",this.audio.src),this.audio.pause(),this.audio.src=""),this.duration=0,this.currentTime=0,this.is_playing=!1},play:function(t){var n=this;this.is_playing&&(this.stop(),Vue.nextTick(function(){n.play(t)})),this.is_playing=!0,Vue.nextTick(function(){n.audio=n.$refs.audio,n.audio.onerror=function(e){e.target.error.code===e.target.error.MEDIA_ERR_NETWORK&&""!==n.audio.src&&(console.log("Network interrupted stream. Automatically reconnecting shortly..."),setTimeout(function(){n.play(t)},5e3))},n.audio.onended=function(){n.stop()},n.audio.ontimeupdate=function(){n.duration=n.audio.duration===1/0||isNaN(n.audio.duration)?0:n.audio.duration,n.currentTime=n.audio.currentTime},n.audio.volume=o(n.volume),n.audio.src=t,n.audio.load(),n.audio.play()}),this.$eventHub.$emit("player_playing",t)},toggle:function(e){this.is_playing?this.stop():this.play(e)},isPlaying:function(){return this.is_playing},getVolume:function(){return this.volume},setVolume:function(e){this.volume=e},getCurrentTime:function(){return this.currentTime},getDuration:function(){return this.duration},getProgress:function(){return 0!==this.duration?Math.round(this.currentTime/this.duration*100,2):0},setProgress:function(e){null!==this.audio&&(this.audio.currentTime=e/100*this.duration)}}};function u(e,t,n,r,i,o,a,s){var u=_typeof((e=e||{}).default);"object"!==u&&"function"!==u||(e=e.default);var l,c="function"==typeof e?e.options:e;if(t&&(c.render=t,c.staticRenderFns=n,c._compiled=!0),r&&(c.functional=!0),o&&(c._scopeId=o),a?(l=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),i&&i.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(a)},c._ssrRegister=l):i&&(l=s?function(){i.call(this,this.$root.$options.shadowRoot)}:i),l)if(c.functional){c._injectStyles=l;var d=c.render;c.render=function(e,t){return l.call(t),d(e,t)}}else{var f=c.beforeCreate;c.beforeCreate=f?[].concat(f,l):[l]}return{exports:e,options:c}}a._withStripped=!0;var l=u(s,a,[],!1,null,null,null);l.options.__file="vue/components/AudioPlayer.vue";function c(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("audio-player",{ref:"player"}),t._v(" "),t.is_playing?n("div",{staticClass:"ml-3 player-inline"},[0!==t.duration?n("div",{staticClass:"inline-seek d-inline-flex align-items-center ml-1"},[n("div",{staticClass:"flex-shrink-0 mx-1 text-muted time-display"},[t._v("\n                "+t._s(t.currentTimeText)+"\n            ")]),t._v(" "),n("div",{staticClass:"flex-fill mx-2"},[n("input",{directives:[{name:"model",rawName:"v-model",value:t.progress,expression:"progress"}],staticClass:"player-seek-range custom-range",attrs:{type:"range",title:t.langSeek,min:"0",max:"100",step:"1"},domProps:{value:t.progress},on:{__r:function(e){t.progress=e.target.value}}})]),t._v(" "),n("div",{staticClass:"flex-shrink-0 mx-1 text-muted time-display"},[t._v("\n                "+t._s(t.durationText)+"\n            ")])]):t._e(),t._v(" "),n("a",{staticClass:"btn btn-sm btn-outline-light px-2 ml-1",attrs:{href:"#"},on:{click:function(e){return e.preventDefault(),t.stop()}}},[n("i",{staticClass:"material-icons",attrs:{"aria-hidden":"true"}},[t._v("pause")]),t._v(" "),n("span",{directives:[{name:"translate",rawName:"v-translate"}],staticClass:"sr-only"},[t._v("Pause")])]),t._v(" "),n("div",{staticClass:"inline-volume-controls d-inline-flex align-items-center ml-1"},[n("div",{staticClass:"flex-shrink-0"},[n("a",{staticClass:"btn btn-sm btn-outline-light px-2",attrs:{href:"#"},on:{click:function(e){e.preventDefault(),t.volume=0}}},[n("i",{staticClass:"material-icons",attrs:{"aria-hidden":"true"}},[t._v("volume_mute")]),t._v(" "),n("span",{directives:[{name:"translate",rawName:"v-translate"}],staticClass:"sr-only"},[t._v("Mute")])])]),t._v(" "),n("div",{staticClass:"flex-fill mx-1"},[n("input",{directives:[{name:"model",rawName:"v-model",value:t.volume,expression:"volume"}],staticClass:"player-volume-range custom-range",attrs:{type:"range",title:t.langVolume,min:"0",max:"100",step:"1"},domProps:{value:t.volume},on:{__r:function(e){t.volume=e.target.value}}})]),t._v(" "),n("div",{staticClass:"flex-shrink-0"},[n("a",{staticClass:"btn btn-sm btn-outline-light px-2",attrs:{href:"#"},on:{click:function(e){e.preventDefault(),t.volume=100}}},[n("i",{staticClass:"material-icons",attrs:{"aria-hidden":"true"}},[t._v("volume_up")]),t._v(" "),n("span",{directives:[{name:"translate",rawName:"v-translate"}],staticClass:"sr-only"},[t._v("Full Volume")])])])])]):t._e()],1)}var d={components:{AudioPlayer:l.exports},data:function(){return{is_mounted:!1}},mounted:function(){this.is_mounted=!0},computed:{langSeek:function(){return this.$gettext("Seek")},langVolume:function(){return this.$gettext("Volume")},durationText:function(){var e=Math.floor(this.duration/60);return e+":"+(this.duration-60*e).toString().substr(0,2)},currentTimeText:function(){var e=parseInt(this.currentTime/60)%60,t=(this.currentTime%60).toFixed();return(e<10?"0"+e:e)+":"+(t<10?"0"+t:t)},duration:function(){if(this.is_mounted)return this.$refs.player.getDuration()},currentTime:function(){if(this.is_mounted)return this.$refs.player.getCurrentTime()},is_playing:function(){if(this.is_mounted)return this.$refs.player.isPlaying()},volume:{get:function(){if(this.is_mounted)return this.$refs.player.getVolume()},set:function(e){this.$refs.player.setVolume(e)}},progress:{get:function(){if(this.is_mounted)return this.$refs.player.getProgress()},set:function(e){this.$refs.player.setProgress(e)}}},methods:{play:function(e){this.$refs.player.play(e)},stop:function(){this.$refs.player.stop()}}};c._withStripped=!0;var f=u(d,c,[],!1,function(e){n(1)},null,null);f.options.__file="vue/InlinePlayer.vue",t.default=f.exports},function(e,t,n){function u(e,t){for(var n=[],r={},i=0;i<t.length;i++){var o=t[i],a=o[0],s={id:e+":"+i,css:o[1],media:o[2],sourceMap:o[3]};r[a]?r[a].parts.push(s):n.push(r[a]={id:a,parts:[s]})}return n}n.r(t),n.d(t,"default",function(){return p});var r="undefined"!=typeof document;if("undefined"!=typeof DEBUG&&DEBUG&&!r)throw new Error("vue-style-loader cannot be used in a non-browser environment. Use { target: 'node' } in your Webpack config to indicate a server-rendering environment.");var l={},i=r&&(document.head||document.getElementsByTagName("head")[0]),o=null,a=0,c=!1,s=function(){},d=null,f="undefined"!=typeof navigator&&/msie [6-9]\b/.test(navigator.userAgent.toLowerCase());function p(a,e,t,n){c=t,d=n||{};var s=u(a,e);return v(s),function(e){for(var t=[],n=0;n<s.length;n++){var r=s[n];(i=l[r.id]).refs--,t.push(i)}for(e?v(s=u(a,e)):s=[],n=0;n<t.length;n++){var i;if(0===(i=t[n]).refs){for(var o=0;o<i.parts.length;o++)i.parts[o]();delete l[i.id]}}}}function v(e){for(var t=0;t<e.length;t++){var n=e[t],r=l[n.id];if(r){r.refs++;for(var i=0;i<r.parts.length;i++)r.parts[i](n.parts[i]);for(;i<n.parts.length;i++)r.parts.push(h(n.parts[i]));r.parts.length>n.parts.length&&(r.parts.length=n.parts.length)}else{var o=[];for(i=0;i<n.parts.length;i++)o.push(h(n.parts[i]));l[n.id]={id:n.id,refs:1,parts:o}}}}function m(){var e=document.createElement("style");return e.type="text/css",i.appendChild(e),e}function h(t){var n,r,e=document.querySelector('style[data-vue-ssr-id~="'+t.id+'"]');if(e){if(c)return s;e.parentNode.removeChild(e)}if(f){var i=a++;e=o=o||m(),n=_.bind(null,e,i,!1),r=_.bind(null,e,i,!0)}else e=m(),n=function(e,t){var n=t.css,r=t.media,i=t.sourceMap;if(r&&e.setAttribute("media",r),d.ssrId&&e.setAttribute("data-vue-ssr-id",t.id),i&&(n+="\n/*# sourceURL="+i.sources[0]+" */",n+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(i))))+" */"),e.styleSheet)e.styleSheet.cssText=n;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(n))}}.bind(null,e),r=function(){e.parentNode.removeChild(e)};return n(t),function(e){if(e){if(e.css===t.css&&e.media===t.media&&e.sourceMap===t.sourceMap)return;n(t=e)}else r()}}var g,y=(g=[],function(e,t){return g[e]=t,g.filter(Boolean).join("\n")});function _(e,t,n,r){var i=n?"":r.css;if(e.styleSheet)e.styleSheet.cssText=y(t,i);else{var o=document.createTextNode(i),a=e.childNodes;a[t]&&e.removeChild(a[t]),a.length?e.insertBefore(o,a[t]):e.appendChild(o)}}}]);