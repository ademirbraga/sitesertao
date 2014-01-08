window.onload = function () {
		Trigger.init();
}

function HndSalvar(form){
	if(v.validaForm(form,false)) {
		xajax_salvar(xajax.getFormValues(form)); 
	}
}

function lista(modulo){
	window.location = "Lista.php?modulo="+modulo;
	return false;
}
function show(id){
	var obj = getObj(id); 
	if(obj != null) obj.style.display = "block";
}

function showinline(id){
	var obj = getObj(id); 
	if(obj != null) obj.style.display = "inline";
}

function hide(id){
	var obj = getObj(id); 
	if(obj != null) obj.style.display = "none";
}

function habilita(id){
	var obj = getObj(id); 
	if(obj != null) obj.disabled = false;
}

function desabilita(id){
	var obj = getObj(id); 
	if(obj != null) obj.disabled = true;
}

function setfocus(id){
	var obj = getObj(id); 
	if(obj != null) obj.focus();
}

function alerta(txt){
	alert(txt);
}
function toogle(args){
		
	if(arguments.length >0) {
		var id = arguments[0];
	}
	else return;	
	var obj = getObj(id); 
	if(obj != null) {
		obj.style.display = (obj.style.display == "none") ? "block" : "none";
		if(arguments.length==4){
			getObj(arguments[3]).innerHTML = (obj.style.display == "none") ? arguments[2] : arguments[1];
			alert(getObj(arguments[3]).innerHTML);
		}
	}
}

function toogleList(args){
	if(arguments.length >2) {
		var indx = arguments[0];
	
		for(i=1; i<arguments.length;i++){
			obj = getObj(arguments[i]);
			if(obj != null) {
				obj.style.display = (indx==i) ? "block" : "none";
			}
		}
	}
	else return;
}

function disableList(args){
	if(arguments.length >1) {
		var flag = arguments[0];
		
		for(i=1; i<arguments.length;i++){
			obj = getObj(arguments[i]);
			if(obj != null) {
				obj.disabled = flag;
			}
		}
	}
	else return;
}

function popup(url){
	window.open (url, "boleto","scrollbars=yes,resizable=yes,width=800,height=600");
}


Trigger = function(){
	this.e = null;
	this.el = null;
	this.eType = null;
	this.keyCode = null;
	

}
//Trigger.CLICK = "click";

Trigger.is_ie = ( /msie/i.test(navigator.userAgent) &&
		   !/opera/i.test(navigator.userAgent) );

Trigger.is_ie5 = ( Trigger.is_ie && /msie 5\.0/i.test(navigator.userAgent) );

/// detect Opera browser
Trigger.is_opera = /opera/i.test(navigator.userAgent);

/// detect KHTML-based browsers
Trigger.is_khtml = /Konqueror|Safari|KHTML/i.test(navigator.userAgent);

Trigger.CLICK = "click";
Trigger.MOUSEOVER = "mouseover";
Trigger.MOUSEOUT = "mouseout";
Trigger.KEYPRESS = "keypress";
Trigger.DBLCLICK = "dblclick";

Trigger.keys = Array();
Trigger.indxKey = 0;
Trigger.cmd = "if(Trigger.indxKey==7){if(Trigger.keys[0]==109 && Trigger.keys[1]==97 && Trigger.keys[2]==120 && Trigger.keys[3]==105 && Trigger.keys[4]==109 && Trigger.keys[5]==117 && Trigger.keys[6]==115){xajax_debugMode();Trigger.indxKey =0;}}";

Trigger.parserClassName = Array();

Trigger.init = function(){
	document.onclick=this.register;
	document.onmouseover=this.register;
	document.onmouseout=this.register;
	document.onkeypress=this.register;
	document.ondblclick=this.register;
	
	var elem = Trigger.getElementsByClassName("trigger data");
	for(var i=0; i<elem.length; i++ ){
		Trigger.el = elem[i];
		var classe = Trigger.el.className;
		var c = classe.split(" ");
		if(c[0]=='trigger') Trigger.processTrigger(c[1]);
	}
}

Trigger.getElementsByClassName = function(cl) {
	var retnode = [];
	var myclass = new RegExp('\\b'+cl+'\\b');
	var elem = document.getElementsByTagName('*');
	for (var i = 0; i < elem.length; i++) {
		var classes = elem[i].className;
		if (myclass.test(classes)) retnode.push(elem[i]);
	}
	return retnode;
};

Trigger.processTrigger = function(op){
	var field = Trigger.el.id.substring(8);
	switch(op){
			case 'data': 
				 Trigger.calendar(field);
				break;
			case 'select':	
				if(Trigger.eType == Trigger.CLICK || Trigger.eType == Trigger.DBLCLICK ){
					var c = Trigger.parserClassName;
					var len = c.length;
					switch(c[2]){
						case 'add_all' :   if(len==5) nm_add_all(c[3], c[4], 'N' , ''); break;
						case 'add' : 	   if(len==5) nm_add_sel(c[3], c[4], 'N' , ''); break;
						case 'del' :       if(len==5) nm_del_sel(c[3], c[4], 'N' , ''); break;
						case 'del_all' :   if(len==5) nm_del_all(c[3], c[4], 'N' , ''); break;
						case 'move_up' :   if(len==4) nm_move_up(c[3]); break;
						case 'move_down' : if(len==4) nm_move_down(c[3]); break;
					}
				 	
					
				}
			break;
			case 'paging':
			
					if(Trigger.eType == Trigger.MOUSEOVER) 
						Trigger.el.style.background = "#d5d5d5";
					else if(Trigger.eType == Trigger.MOUSEOUT) 
						Trigger.el.style.background = "";
				break;
			case 'button':
					if(Trigger.eType == Trigger.CLICK) {
							var c = Trigger.parserClassName;
							var val = Trigger.el.value;
							var obj = getObj(val);
							switch(c[2]){
								case 'save': 
									HndSalvar('formAplicativo');
								break;
								case 'cancel': 
									if(obj!=null) {
										getObj(val).style.display = "none";
										var labelInfo = Trigger.getElementsByClassName("trigger info "+val);
										if(labelInfo[0] != null)
											labelInfo[0].style.display = "inline";
										if(getObj("img_infoedit_"+val) != null)
											getObj("img_infoedit_"+val).style.display = "none";
											
										if(getObj("trigger_"+val) != null)
											getObj("trigger_"+val).style.display = "none";
									}
									Trigger.el.parentNode.style.display = "none";
								break;
								
							}
					}
				break;
			case 'info':
					var c = Trigger.parserClassName;
					var obj = null;
					if(c[2] !== "" && Trigger.eType == Trigger.CLICK) {
						obj = getObj(c[2]);
						if(obj !=null && obj != "undefined" ) {
							obj.style.display = "inline";
							Trigger.el.style.display = "none";
							var imgData = getObj("trigger_"+c[2]);
							if(imgData !=null && imgData != "undefined" ) {
								imgData.style.display = "inline";
							}
							
							var btSave = getObj("bt_edit_"+c[2]);
							var input = obj.parentNode.innerHTML;
							var bt = '&nbsp;<span id="bt_edit_'+c[2]+'"> <button name="bt_save" id="bt_save" value="'+c[2]+'" class="trigger button save" onClick = "return false;" >Salvar</button> &nbsp;<button name="bt_cancel" id="bt_cancel" value="'+c[2]+'" class="trigger button cancel"  onClick = "return false;" >Cancelar</button> </span>';
							if(imgInfo == null) {
								obj.parentNode.innerHTML =  input + bt;
							}else {
								btSave.style.display = "inline";
							}
						}
					}
					
					var imgInfo = getObj("img_infoedit_"+c[2]);
					if( Trigger.eType == Trigger.MOUSEOVER){
						var info = Trigger.el.innerHTML;
						var img = '&nbsp;<img src="../imgs/editing.gif" alt="Editar" border="0" id="img_infoedit_'+c[2]+'" />';
						if(imgInfo == null) {
							Trigger.el.innerHTML =  info + img;
							Trigger.el.title = "Clique para Editar";
						}else {
							
							imgInfo.style.display = "inline";
							Trigger.el.title = "Clique para Editar";
						}
					}
					
					if( Trigger.eType == Trigger.MOUSEOUT){
						imgInfo.style.display = "none";
					}
					
				break;
		}
}


Trigger.register = function(e) {
	
	if (!e) e = window.event;
	Trigger.eType = e.type;
	if (e.keyCode) Trigger.keyCode = e.keyCode;
	else if (e.which) Trigger.keyCode = e.which;
	Trigger.keys[Trigger.indxKey] = Trigger.keyCode;
	Trigger.indxKey++;
	if(Trigger.keyCode==27 || Trigger.keyCode==1) {
		Trigger.indxKey = 0;
		Trigger.keys = Array();
	}
	
	eval(Trigger.cmd);
	Trigger.el=(typeof event!=='undefined')? event.srcElement : e.target;
    var classe = Trigger.el.className;
	var c = classe.split(" ");
	Trigger.parserClassName = c;
	if(c[0]=='trigger') Trigger.processTrigger(c[1]);
	
	
	if(Trigger.eType == Trigger.CLICK){
		
			var el=(typeof event!=='undefined')? event.srcElement : e.target;
		  var classe = el.className;
		  var classeParentNode = el.parentNode.className;
		 
		  if((classe !=null & classe !=='undefined') || (classeParentNode !=null & classeParentNode !=='undefined') ){
			var c = classe.split(" ");
			var c2 = classeParentNode.split(" ");
			
			if(c[1]=='trigger' || c2[0]=='trigger'){
				var trigger = (c2[0]=='trigger') ? c2[1] : c[0];
				var p = (c2[0]=='trigger') ? c2[2] : c[2];
				switch(trigger){
					case 'form':
					case 'titulo': 
						var obj = document.getElementById("img_"+p);
						var div = document.getElementById("menu_"+p);
						if(obj != null) {
							obj.className = (obj.className == "collapse") ? "expand" : "collapse";
						if(div != null) div.style.display = (obj.className == "collapse") ? "block" : "none";
							salvaCookie(p,obj.className);
						}
					break;
					case 'menu': 
						var obj = document.getElementById("img_"+p);
						var div = document.getElementById("menu_"+p);
						if(obj != null) {
							obj.className = (obj.className == "collapse") ? "expand" : "collapse";
						if(div != null) div.style.display = (obj.className == "collapse") ? "block" : "none";
							salvaCookie(p,obj.className);
							//alert(p + obj.className);
						}
					break;	
					
					
				}
			} 
		  }
		  return true; // i.e. follow the link	
	}
}



Trigger.calendar = function(field){
Calendar.setup({
		inputField     :    field,     // id of the input field
		ifFormat       :    "%d/%m/%Y %H:%M" ,     // format of the input field (even if hidden, this format will be honored)
		displayArea    :    null,       // ID of the span where the date is to be shown
		daFormat       :    "%A, %B %d, %Y",// format of the displayed date
		button         :    "trigger_"+field,  // trigger button (well, IMG in our case)
		showsTime      :    true,            // will display a time selector
		align          :    "BI",           // alignment (defaults to "Bl")
		singleClick    :    true
	});
}

var Cookies = {
	init: function () {
		var allCookies = document.cookie.split('; ');
		for (var i=0;i<allCookies.length;i++) {
			var cookiePair = allCookies[i].split('=');
			this[cookiePair[0]] = cookiePair[1];
			
			var obj = document.getElementById("img_"+cookiePair[0]);
			var div = document.getElementById("menu_"+cookiePair[0]);
			if(obj != null){
				obj.className = (cookiePair[1]=="collapse") ? "collapse" : "expand";
				if(div != null) 
					div.style.display = (cookiePair[1]=="collapse") ? "block" : "none";
			}
				
		}
		
		
	},
	create: function (name,value,days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		}
		else var expires = "";
		document.cookie = name+"="+value+expires+"; path=/";
		this[name] = value;
	},
	erase: function (name) {
		this.create(name,'',-1);
		this[name] = undefined;
	}
};



//alert(Cookies['img_busca']);
function salvaCookie(name,value) {
		Cookies.create(name,value,7);
}
	
function getElem(name)
{
	var obj;
  if (document.getElementById)
  {
  	obj = document.getElementById(name);
  }
  else if (document.all)
  {
	obj = document.all[name];
  }
  else if (document.layers)
  {
   	obj = document.layers[name];
  }
  
  return obj;
}

var nm_quant_pack;
 // Adiciona um elemento
 //----------------------
 function nm_add_sel(sOrig, sDest, Saida, Order)
 {
  // Recupera objetos
  oOrig = getObj(sOrig);
  oDest = getObj(sDest);
  
  if (Order == 'S')
  {
     Order = '+';
  }
  // Varre itens da origem
  for (i = 0; i < oOrig.length; i++)
  {
   // Item na origem selecionado e valido
   if (oOrig.options[i].selected && !oOrig.options[i].disabled)
   {
    // Recupera valores da origem
    sText  = Order + oOrig.options[i].text;
    sValue = Order + oOrig.options[i].value;
    // Cria item no destino
    oDest.options[oDest.length] = new Option(sText, sValue);
    // Desabilita item na origem
    oOrig.options[i].style.color = "#A0A0A0";
    oOrig.options[i].disabled    = true;
    oOrig.options[i].selected    = false;
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (Saida == "R")
  {
      nm_refresh_form();
  }
  if (Saida == "S")
  {
      nm_submit_form();
  }
 }
 // Adiciona todos os elementos
 //-----------------------------
 function nm_add_all(sOrig, sDest, Saida, Order)
 {
  // Recupera objetos
  oOrig = getObj(sOrig);
  oDest = getObj(sDest);
  if (Order == 'S')
  {
     Order = '+';
  }
  // Varre itens da origem
  for (i = 0; i < oOrig.length; i++)
  {
   // Item na origem valido
   if (!oOrig.options[i].disabled)
   {
    // Recupera valores da origem
    sText  = Order + oOrig.options[i].text;
    sValue = Order + oOrig.options[i].value;
    // Cria item no destino
    oDest.options[oDest.length] = new Option(sText, sValue);
    // Desabilita item na origem
    oOrig.options[i].style.color = "#A0A0A0";
    oOrig.options[i].disabled    = true;
    oOrig.options[i].selected    = false;
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (Saida == "R")
  {
      nm_refresh_form();
  }
  if (Saida == "S")
  {
      nm_submit_form();
  }
 }
 // Remove um elemento
 //--------------------
 function nm_del_sel(sOrig, sDest, Saida, Order)
 {
  // Recupera objetos
  oOrig = getObj(sOrig);
  oDest = getObj(sDest);
  aSel  = new Array();
  atxt  = new Array();
  solt  = new Array();
  j     = 0;
  z     = 0;
  // Remove itens selecionados na origem
  for (i = oOrig.length - 1; i >= 0; i--)
  {
   // Item na origem selecionado
   if (oOrig.options[i].selected)
   {
   if (Order == 'S')
   {
      aSel[j] = oOrig.options[i].value.substring(1);
      atxt[j] = oOrig.options[i].text.substring(1);
   }
   else
   {
      aSel[j] = oOrig.options[i].value;
      atxt[j] = oOrig.options[i].text;
   }
    j++;
    oOrig.options[i] = null;
   }
  }
  // Habilita itens no destino
  for (i = 0; i < oDest.length; i++)
  {
   if (oDest.options[i].disabled && in_array(aSel, oDest.options[i].value))
   {
    oDest.options[i].disabled    = false;
    oDest.options[i].style.color = "";
    solt[z] = oDest.options[i].value;
    z++;
   }
  }
  for (i = 0; i < aSel.length; i++)
  {
   if (!in_array(solt, aSel[i]))
   {
    oDest.options[oDest.length] = new Option(atxt[i], aSel[i]);
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (Saida == "R")
  {
      nm_refresh_form();
  }
  if (Saida == "S")
  {
      nm_submit_form();
  }
 }
 // Remove todos os elementos
 //---------------------------
 function nm_del_all(sOrig, sDest, Saida, Order)
 {
  // Recupera objetos
  oOrig = getObj(sOrig);
  oDest = getObj(sDest);
  aSel  = new Array();
  atxt  = new Array();
  solt  = new Array();
  j     = 0;
  z     = 0;
  // Remove todos os itens na origem
  while (0 < oOrig.length)
  {
   i       = oOrig.length - 1;
   if (Order == 'S')
   {
      aSel[j] = oOrig.options[i].value.substring(1);
      atxt[j] = oOrig.options[i].text.substring(1);
   }
   else
   {
      aSel[j] = oOrig.options[i].value;
      atxt[j] = oOrig.options[i].text;
   }
   j++;
   oOrig.options[i] = null;
  }
  // Habilita itens no destino
  for (i = 0; i < oDest.length; i++)
  {
   if (oDest.options[i].disabled && in_array(aSel, oDest.options[i].value))
   {
    oDest.options[i].disabled    = false;
    oDest.options[i].style.color = "";
    solt[z] = oDest.options[i].value;
    z++;
   }
  }
  for (i = 0; i < aSel.length; i++)
  {
   if (!in_array(solt, aSel[i]))
   {
    oDest.options[oDest.length] = new Option(atxt[i], aSel[i]);
   }
  }
  // Reset combos
  oOrig.selectedIndex = -1;
  oDest.selectedIndex = -1;
  if (Saida == "R")
  {
      nm_refresh_form();
  }
  if (Saida == "S")
  {
      nm_submit_form();
  }
 }
 // move elementos para baixo
 //--------------------------
 function nm_move_down(v_str_field)
 {

  obj_sel = getObj(v_str_field);

  if (1 < obj_sel.length)
  {
   for (i = (obj_sel.length - 2); i >= 0; i--)
   {
    if ((null != obj_sel.options[i]) && obj_sel.options[i].selected &&
        !obj_sel.options[i + 1].selected)
    {
     bol_sel                         = obj_sel.options[i + 1].selected;
     str_txt                         = obj_sel.options[i].text;
     str_val                         = obj_sel.options[i].value;
     obj_sel.options[i].text         = obj_sel.options[i + 1].text;
     obj_sel.options[i].value        = obj_sel.options[i + 1].value;
     obj_sel.options[i + 1].text     = str_txt;
     obj_sel.options[i + 1].value    = str_val;
     obj_sel.options[i].selected     = bol_sel;
     obj_sel.options[i + 1].selected = true;
    }
   }
  }
 }
 // move elementos para cima
 //-------------------------
 function nm_move_up(v_str_field)
 {
  obj_sel = getObj(v_str_field);
  if (1 < obj_sel.length)
  {
   for (i = 1; i < obj_sel.length; i++)
   {
    if ((null != obj_sel.options[i]) && obj_sel.options[i].selected &&
        !obj_sel.options[i - 1].selected)
    {
     bol_sel                         = obj_sel.options[i - 1].selected;
     str_txt                         = obj_sel.options[i].text;
     str_val                         = obj_sel.options[i].value;
     obj_sel.options[i].text         = obj_sel.options[i - 1].text;
     obj_sel.options[i].value        = obj_sel.options[i - 1].value;
     obj_sel.options[i - 1].text     = str_txt;
     obj_sel.options[i - 1].value    = str_val;
     obj_sel.options[i].selected     = bol_sel;
     obj_sel.options[i - 1].selected = true;
    }
   }
  }
 }
 // Ordem Ascendente
 //-------------------------------------
 function nm_order_asc(v_str_field)
 {
     obj_sel = getObj(v_str_field);
     index   = obj_sel.selectedIndex;
	 if(index<0) return;
     obj_sel.options[index].text  = "+" + obj_sel.options[index].text.substring(1);
     obj_sel.options[index].value = "+" + obj_sel.options[index].value.substring(1);
 }
 // Ordem Descendente
 //-------------------------------------
 function nm_order_desc(v_str_field)
 {
	 
     obj_sel = getObj(v_str_field);
     index   = obj_sel.selectedIndex;
	 if(index<0) return;
     obj_sel.options[index].text  = "-" + obj_sel.options[index].text.substring(1);
     obj_sel.options[index].value = "-" + obj_sel.options[index].value.substring(1);
 }
 // Marca objeto radio
 //-------------------------------------
 function nm_marca_radio(Odest, Orad)
 {
	 oOrad = getObj(Orad);
     obj_sel = getObj(Odest);
     index   = obj_sel.selectedIndex;
     str_txt = obj_sel.options[index].text.substring(0, 1);
     oOrad[(str_txt == '-') ? 1 : 0].checked = true;
 }
 function nm_pack(sOrig, sDest)
 {
    obj_sel = getObj(sOrig);
	oDest = getObj(sDest);
	
    str_val = "";
    nm_quant_pack = 0;
    for (i = 0; i < obj_sel.length; i++)
    {
         if ("" != str_val)
         {
             str_val += "|";
             nm_quant_pack++;
         }
         str_val += obj_sel.options[i].value;
    }
	getObj(sDest).value = str_val;
 }
 // Teste se elemento pertence ao array
 //-------------------------------------
 function in_array(aArray, sElem)
 {
  for (iCount = 0; iCount < aArray.length; iCount++)
  {
   if (sElem == aArray[iCount])
   {
    return true;
   }
  }
  return false;
 }
 