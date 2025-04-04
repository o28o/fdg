/* Добавление на странице просмотра сутты скрывать палийский текст сутты, а также переключать алфавит языка пали между латиницей и кириллицей
	Д.А. Ивахненко, Кузин-Алексинский А.С., 2013
	
	Для работы сценариев из данного файла необходимо, чтобы страница с переводом сутты отвечала следующим требованиям:
	html-страница с переводом должна в заголовке содержать ссылку на данный файл, например:
		<script src="scripts/ModifyTransDisplay.js"></script>
	
	Таблица с текстом перевода и текстом оригинала должна иметь класс "tPaliSourceClass":
		<table class="tPaliSourceClass" ... > ... </table>	
*/
//alert("21323");
var bPaliTextDisplay;
var curScript;
window.onload = document_onLoad;

var dictButtonBackColors = {
	"active": "#F0E68C",
	"inactive": "#FFFFE0",
	"pending": "#E6E6FA"
};

var dictButtonBorderColors = {
	"active": "#CD853F",
	"inactive": "#FFFFE0",
	"pending": "#CD853F"
};

var dictToggleScriptButtonText={
	true: "Скрыть текст на па̄л̣и",
	false: "Показать текст на па̄л̣и"
};

/* Словарь преобразования латиницы в кириллицу */
var dictTranscript = {
	"ṃ":"м̣", "a":"а", "ā":"а̄", "i":"и", "ī":"ӣ", "u":"у", "ū":"ӯ", "e":"е", "o":"о", "k":"к", "g":"г", "ṅ":"н̇", "c":"ч", "j":"дж", "ñ":"н̃", "ṭ":"т̣", "ḍ":"д̣", "ṇ":"н̣", "t":"т", "d":"д", "n":"н", "p":"п", "b":"б", "m":"м", "y":"й", "r":"р", "l":"л", "v":"в", "s":"с", "h":"х", "ḷ":"л̣",
	
	"A":"А", "Ā":"А̄", "I":"И", "Ī":"Ӣ", "U":"У", "Ū":"Ӯ", "E":"Е", "O":"О", "K":"К", "G":"Г", "Ṅ":"Н̇", "C":"Ч", "J":"Дж", "Ñ":"Н̃", "Ṭ":"Т̣", "Ḍ":"Д̣", "Ṇ":"Н̣", "T":"Т", "D":"Д", "N":"Н", "P":"П", "B":"Б", "M":"М", "Y":"Й", "R":"Р", "L":"Л", "V":"В", "S":"С", "H":"Х", "Ḷ":"Л̣"	
};


function document_onLoad(){
	bPaliTextDisplay = true;
	curScript="Latin";
	
	/* Дорисовываем меню выбора алфавита пали и переключения режима отображения палийского текста */
	var t = document.getElementsByClassName("tPaliSourceClass");
	var d = document.createElement("div");
	
	/* рисуем таблицу с кнопками для слоя */
	var nt = document.createElement("table");
	nt.style.width="50%";
	//nt.style.border="solid";
	var tr = document.createElement("tr");
	tr.style.padding = "3px";
	var td = document.createElement("td");
	var p = document.createElement("p");
	p.id = "pToggleScript";
	p.style.textAlign="center";
	p.style.textIndent="0";
	var txt = document.createTextNode(dictToggleScriptButtonText[bPaliTextDisplay]);
	p.appendChild(txt);
	td.style.cursor="pointer";
	td.style.backgroundColor="#F5FFFA";
	td.style.border="solid"
	td.style.borderColor="#CD853F";
	td.style.width = "44%";	
	td.id="tdToggleScript";
	td.onmouseover=tdToggleScript_onMouseOver;
	td.onmouseout=tdToggleScript_onMouseOut;
	td.onclick=togglePaliScript;	
	td.appendChild(p);
	tr.appendChild(td);
	
	/* Кнопка выбора латиницы */
	td = document.createElement("td");
	p = document.createElement("p");
	p.id = "pSwitchScriptLatin";
	p.style.textAlign="center";
	p.style.textIndent="0";
	txt = document.createTextNode("Латиница");
	p.appendChild(txt);	
	td.style.cursor="pointer";
	td.style.backgroundColor="#FFFFE0";
	td.style.border="solid"
	td.style.borderColor="#CD853F";
	td.style.width="28%";
	td.id="tdSwitchScriptLatin";
	td.onmouseover=tdSwitchScriptLatin_onMouseOver;
	td.onmouseout=tdSwitchScriptLatin_onMouseOut;
	td.onclick=tdSwitchScriptLatin_onClick;
	td.appendChild(p);
	tr.appendChild(td);

	/* Кнопка выбора кириллицы */
	td = document.createElement("td");
	p = document.createElement("p");
	p.id = "pSwitchScriptCyrillic";
	p.style.textAlign="center";
	p.style.textIndent="0";
	txt = document.createTextNode("Кириллица");
	p.appendChild(txt);	
	td.style.cursor="pointer";
	td.style.backgroundColor="#FFFFE0";
	td.style.border="solid"
	td.style.borderColor="#CD853F";
	td.style.width="28%";
	td.id="tdSwitchScriptCyrillic";
	td.onmouseover=tdSwitchScriptCyrillic_onMouseOver;
	td.onmouseout=tdSwitchScriptCyrillic_onMouseOut;
	td.onclick=tdSwitchScriptCyrillic_onClick;
	td.appendChild(p);
	tr.appendChild(td);
	
	nt.appendChild(tr);
	d.appendChild(nt);
	
	document.body.insertBefore(d, t[0]);
	switchScript();
}

function _write(arg){
	var d = document.getElementById('divLog');
	if(d)
		d.innerHTML += (arg==null? 'null': arg.toString())+'; ';
}
function _writeln(arg){
	var d = document.getElementById('divLog');
	if(d)
		d.innerHTML += (arg==null? 'null': arg.toString())+'<br>';
}

function togglePaliScript(){

	bPaliTextDisplay = !bPaliTextDisplay;
	var et = document.getElementsByClassName("tPaliSourceClass");
	
	for(var i=0; i<et.length; i++){
	
		//var ec = et[i].cols;
		//alert(ec);
		
		for(var r=0; r<et[i].rows.length; r++){
			var c = et[i].rows[r].cells[1];
			var c1 = et[i].rows[r].cells[0];
			if(!bPaliTextDisplay){
				c.oldDisplayStyle = c.style.display;
				c.style.display = "none";
				c.styleWidthOld=c.style.width;
				c.style.width="0%";

				c1.styleWidthOld=c1.style.width;
				c1.style.width="100%";
			}
			else{
				c.style.display = c.oldDisplayStyle;
				c.style.width = c.styleWidthOld;

				c1.style.width = c1.styleWidthOld;
				}
		}
		
		if(!bPaliTextDisplay){;
			//ec.styleOldWidth = ec.style.width;
			//ec.style.width="0";
		}
		else{;
			//ec.style.width = ec.styleOldWidth;
		};		
	};
	
	/* меняем надпись на переключателе */	
	var p = document.getElementById("pToggleScript");
	p.firstChild.nodeValue=dictToggleScriptButtonText[bPaliTextDisplay];
	
}

function switchScript(){
	switch(curScript){
		case "Latin":
			var e = document.getElementById("tdSwitchScriptLatin");
			e.style.backgroundColor=dictButtonBackColors["active"];

			e = document.getElementById("tdSwitchScriptCyrillic");
			e.style.backgroundColor=dictButtonBackColors["inactive"];
		break;
		case "Cyrillic":
			var e = document.getElementById("tdSwitchScriptCyrillic");
			e.style.backgroundColor=dictButtonBackColors["active"];

			e = document.getElementById("tdSwitchScriptLatin");
			e.style.backgroundColor=dictButtonBackColors["inactive"];
		break;		
	};
	
	/* кодируем ячейки таблицы */
	var et = document.getElementsByClassName("tPaliSourceClass");
	for(var i=0; i<et.length; i++){
		for(var r=0; r<et[i].rows.length; r++){
			findEncodingNodes(et[i].rows[r].cells[1]);
		};
	};
}

function findEncodingNodes(node){
	if(!node) return;
	if(node.childNodes.length==0){
		if(node.type=="#text");
			node.nodeValue = transcriptText(node.nodeValue);
		return;
	}
	else{
		for(var i=0; i<node.childNodes.length; i++){
			findEncodingNodes(node.childNodes[i]);			
		}
	}
}

function transcriptText(str){
	if(str){
		var newstr = str;
		if(curScript=="Cyrillic"){
			for (var i in dictTranscript){
				newstr=newstr.replace(new RegExp(i, 'g'), dictTranscript[i]);
			}
		}
		else{
			for (var i in dictTranscript){
				newstr=newstr.replace(new RegExp(dictTranscript[i], 'g'), i);
			}
		}
	}
	return newstr;
}

/* Обработчики событий */
function tdToggleScript_onMouseOver(e){
	var e = document.getElementById("tdToggleScript");
	e.oldBackGroundColor = e.style.backgroundColor;
	e.oldBorderColor = e.style.borderColor;
	
	e.style.backgroundColor=dictButtonBackColors["pending"];
	e.style.borderColor = dictButtonBorderColors["pending"];
}
function tdToggleScript_onMouseOut(e){
	var e = document.getElementById("tdToggleScript");
	e.style.backgroundColor=e.oldBackGroundColor;
	e.style.borderColor=e.oldBorderColor;	
}

function tdSwitchScriptLatin_onMouseOver(e){
	var e = document.getElementById("tdSwitchScriptLatin");
	e.oldBackGroundColor = e.style.backgroundColor;
	e.oldBorderColor = e.style.borderColor;
	
	e.style.backgroundColor=dictButtonBackColors["active"];
	e.style.borderColor = dictButtonBorderColors["active"];	
}
function tdSwitchScriptLatin_onMouseOut(e){
	if(curScript=="Latin") return;

	var e = document.getElementById("tdSwitchScriptLatin");
	e.style.backgroundColor=e.oldBackGroundColor;
	e.style.borderColor=e.oldBorderColor;	
}
function tdSwitchScriptCyrillic_onMouseOver(e){
	var e = document.getElementById("tdSwitchScriptCyrillic");
	e.oldBackGroundColor = e.style.backgroundColor;
	e.oldBorderColor = e.style.borderColor;
	
	e.style.backgroundColor=dictButtonBackColors["active"];
	e.style.borderColor = dictButtonBorderColors["active"];	
}
function tdSwitchScriptCyrillic_onMouseOut(e){
	if(curScript=="Cyrillic") return;

	var e = document.getElementById("tdSwitchScriptCyrillic");
	e.style.backgroundColor=e.oldBackGroundColor;
	e.style.borderColor=e.oldBorderColor;
}

function tdSwitchScriptLatin_onClick(e){
	if (curScript=="Latin") return
	else{
		curScript="Latin";
		switchScript();
	}
}

function tdSwitchScriptCyrillic_onClick(e){
	if (curScript=="Cyrillic") return
	else{
		curScript="Cyrillic";
		switchScript();
	}
}