/* Encodage des caractères en UTF-8 */

function preload() {
if (document.images) {
tabImages=new Array;
for (var i=0; i<preload.arguments.length; i++){
tabImages[i]=new Image();
tabImages[i].src=preload.arguments[i];
}
}
}
var tabImages=new Array;
preload("im/z/navacc-hov.gif","im/z/navrec-hov.gif","im/z/navaid-hov.gif","im/z/navbas-hov.gif","im/z/navire-hov.png","im/z/navtop-hov.gif","im/z/navpre-hov.gif","im/z/navsui-hov.gif");
