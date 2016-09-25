var langue = navigator.language;
if (!langue) {
    langue = navigator.browserLanguage;
}
langue = langue.substr(0, 2);

function positionMolette(X, Y) {}

function activerMolette(OUI, HAUT) {}

function recupLangue() {
    return langue;
}

function pleinEcran(OUI) {
    if (OUI) {
        document.getElementById("transformice").style.position = "fixed";
        document.getElementById("transformice").style.left = "0";
        document.getElementById("transformice").style.top = "0";
        document.getElementById("transformice").style.width = "100%";
        document.getElementById("transformice").style.height = "100%";


        document.getElementById("pub1").style.display = "none";
        document.getElementById("pub2").style.display = "none";
        document.getElementById("pub3").style.display = "none";
        document.getElementById("fb-comments").style.display = "none";
    } else {
        document.getElementById("transformice").style.position = "static";
        document.getElementById("transformice").style.width = "800px";
        document.getElementById("transformice").style.height = "600px";


        document.getElementById("pub1").style.display = "block";
        document.getElementById("pub2").style.display = "block";
        document.getElementById("pub2").style.display = "block";
        document.getElementById("fb-comments").style.display = "inline";
    }
}

function cancelEvent(e) {
    if (navigator.userAgent.indexOf("hrome") != -1) {
        document.getElementById("swf2").x_moletteTransformice(e.wheelDelta);
    }
    e = e ? e : window.event;
    if (e.stopPropagation)
        e.stopPropagation();
    if (e.preventDefault)
        e.preventDefault();
    e.cancelBubble = true;
    e.cancel = true;
    e.returnValue = false;
    return false;
}

function hookEvent(element, eventName, callback) {
    if (element.addEventListener) {
        if (eventName == 'mousewheel') {
            element.addEventListener('DOMMouseScroll', callback, false);
        }
        element.addEventListener(eventName, callback, false);
    } else if (element.attachEvent) {
        element.attachEvent("on" + eventName, callback);
    }
}