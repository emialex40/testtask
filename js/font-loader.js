function loadFont(t,e,n,o){function a(){if(!window.FontFace)return!1;var t=new FontFace("t",'url("data:application/font-woff2,") format("woff2")',{}),e=t.load();try{e.then(null,function(){})}catch(n){}return"loading"===t.status}var r=navigator.userAgent,s=!window.addEventListener||r.match(/(Android (2|3|4.0|4.1|4.2|4.3))|(Opera (Mini|Mobi))/)&&!r.match(/Chrome/);if(!s){var i={};try{i=localStorage||{}}catch(c){}var d="x-font-"+t,l=d+"url",u=d+"css",f=i[l],h=i[u],p=document.createElement("style");if(p.rel="stylesheet",document.head.appendChild(p),!h||f!==e&&f!==n){var w=n&&a()?n:e,m=new XMLHttpRequest;m.open("GET",w),m.onload=function(){m.status>=200&&m.status<400&&(i[l]=w,i[u]=m.responseText,o||(p.textContent=m.responseText))},m.send()}else p.textContent=h}}