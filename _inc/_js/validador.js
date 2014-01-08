// JavaScript Document
String.prototype.trim = function()
{
return this.replace(/^\s*/, "").replace(/\s*$/, "");
}

 function editaForm(label,id, tipo){
	label.style.display = "none";
	document.getElementById(id).style.display = "inline";
	document.getElementById(id).disabled = false;
	var valor = document.getElementById(id).value;
	
	document.getElementById('atualizar').style.display = "inline";
	document.getElementById('atualizar').disabled = false;
	
}
function enviaForm(acao,form,modulo){
	
	/*
	for(i=1; i<=index; i++){
			if(i!=indx) v.disableForm('formCliente'+i,true);
			else v.disableForm('formCliente'+i,false);
	}*/
	//if(indx==0) indx = "";
	if(v.validaForm(form,false)) {
		
		xajax_salvar(xajax.getFormValues(form),acao,modulo); 
		
	}
}


function calendar(field){
Calendar.setup({
		inputField     :    field,     // id of the input field
		ifFormat       :    "%d/%m/%Y",     // format of the input field (even if hidden, this format will be honored)
		displayArea    :    null,       // ID of the span where the date is to be shown
		daFormat       :    "%A, %B %d, %Y",// format of the displayed date
		button         :    "trigger_"+field,  // trigger button (well, IMG in our case)
		align          :    "Tl",           // alignment (defaults to "Bl")
		singleClick    :    true
	});
}

function Validador(){
	var validador = {
		form : "form",
		formFields:null,
		prefix:"",
		
		
		
		validaData:function (variavel){
		
			var currentDate = new Date();
			var currentYearString = currentDate.getFullYear().toString();
			var caracteresIniciasAno = currentYearString.substring(0, 2);
			if(document.getElementById(variavel).value.length == 2)	
				document.getElementById(variavel).value = document.getElementById(variavel).value + "/";
			if(document.getElementById(variavel).value.length == 5)	
				document.getElementById(variavel).value = document.getElementById(variavel).value + "/" + caracteresIniciasAno;
			if(document.getElementById(variavel).value.length > 10)
				document.getElementById(variavel).value = document.getElementById(variavel).value.substring(0, 10);
			if(document.getElementById(variavel).value.length == 10)
				if(!(isInteger(document.getElementById(variavel).value.substring(0, 2)) &&
						(isInteger(document.getElementById(variavel).value.substring(3, 5))) &&
						(isInteger(document.getElementById(variavel).value.substring(6, 10)))))	
					document.getElementById(variavel).value = "10/01/1970";
			if(document.getElementById(variavel).value.length == 10) 
				if(!((eval(document.getElementById(variavel).value.substring(0, 2)) >= 1) &&
						(eval(document.getElementById(variavel).value.substring(0, 2)) <= 31) &&
						(eval(document.getElementById(variavel).value.substring(3, 5)) >= 1) &&
						(eval(document.getElementById(variavel).value.substring(3, 5)) <= 12) &&
						(eval(document.getElementById(variavel).value.substring(6, 10)) >= 1970) &&
						(eval(document.getElementById(variavel).value.substring(6, 10)) <= 9999)))
					document.getElementById(variavel).value = "10/01/1970";
			if(document.getElementById(variavel).value.length == 10)
				document.getElementById(variavel).value = document.getElementById(variavel).value + " " + currentDate.getHours() + ":" + currentDate.getMinutes() + ":" + currentDate.getSeconds();
		},
		
		
		DateValid:function (variavel)
		{
			var ret = 1;
			if(variavel.value == "") return false;
			
			else
			{
				var arrData = variavel.value.split('/');
				var dia = arrData[0];
				var mes = arrData[1];
				var ano = arrData[2];
				
				//se for ano bissexto
				if(ano % 4 == 0 && mes == '02' && dia > '29')
					ret = 0;
				//se nao for ano bissexto
				else if(ano % 4 !=0 && mes == '02' && dia > '28')
					ret = 0;
				else if(ano < 1900 || ano > 5099)
					ret = 0;
				else if(dia < 1 || dia > 31)
					ret = 0;
				else if(mes < '01' || mes > '12')
					ret = 0;	
				if(ret == 0)
				{
					alert("Data inválida!");
					variavel.value = "";
					return false;
				}
			}
		},
		
		MascaraMoeda : function (objTextBox, SeparadorMilesimo, SeparadorDecimal, e)
	 {
	    var sep = 0;
	    var key = '';
	    var i = j = 0;
	    var len = len2 = 0;
	    var strCheck = '0123456789';
	    var aux = aux2 = '';
	    var whichCode = (window.Event) ? e.which : e.keyCode;
	    //BACKSPACE = 8
	    if ((whichCode == 13) || (whichCode == 0) || (whichCode == 8))
			return true;//ENTER//BACKSPACE
	    key = String.fromCharCode(whichCode); // Valor para o código da Chave
	   
	    if (strCheck.indexOf(key) == -1 && whichCode != 8) 
	    {
	    	return false; // Chave inválida
	    }
	    
	    len = objTextBox.value.length;
	    for(i = 0; i < len; i++)
	        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) 
	        	break;
	    aux = '';
	    for(; i < len; i++)
	        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
	    aux += key;
	    len = aux.length;
	    
	    if (len == 0) objTextBox.value = '';
	    if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
	    if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
	    if (len > 2) 
	    {
	        aux2 = '';
	        for (j = 0, i = len - 3; i >= 0; i--) 
	        {
	            if (j == 3) 
	            {
	                aux2 += SeparadorMilesimo;
	                j = 0;
	            }
	            aux2 += aux.charAt(i);
	            j++;
	        }
	        objTextBox.value = '';
	        len2 = aux2.length;
	        for (i = len2 - 1; i >= 0; i--)
	        	objTextBox.value += aux2.charAt(i);
	        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
	    }
	    return false;
	},
		
		mostra:function (id1,id2){
			document.getElementById(id1).style.display = "block";
			document.getElementById(id2).style.display = "none";
		},
		view:function (id){
			document.getElementById(id).style.display = (document.getElementById(id).style.display == "block") ? "none" : "block";
		},
		filtro:function (valor, mascara){
					mascara = this.replace(mascara,'#','');
					for (i = 0; i < mascara.length++; i++)
						{
							valor = this.replace(valor,mascara.substring(i,i+1),'');
						}
						return valor;
				},
		maximo:function (mascara)
				{
						max_ = mascara;
						for (i = 0; i < (mascara.length+1); i++)
						{
								if (mascara.charAt(i)!='#')
								{
								max_ = this.replace(max_,mascara.charAt(i),'');
								}
						}
						return max_.length;
				},
		replace:function (fullString,text,by) {
				// Replaces text with by in string
					var strLength = fullString.length, txtLength = text.length;
					if ((strLength == 0) || (txtLength == 0)) return fullString;
				
					var i = fullString.indexOf(text);
					if ((!i) && (text != fullString.substring(0,txtLength))) return fullString;
					if (i == -1) return fullString;
				
					var newstr = fullString.substring(0,i) + by;
				
					if (i+txtLength < strLength)
						newstr += this.replace(fullString.substring(i+txtLength,strLength),text,by);
				
					return newstr;
				},
		mascara:function (e, textbox, mascara)
				{
						var tecla = (e.which) ? e.which : e.keyCode;
						
						
						valor = this.filtro(textbox.value, mascara);
						//m = this.replace(mascara,'#','_');
						
						if(tecla==46){
							textbox.value ='';
							return false;
						}
						if (tecla==9)
						{
							return true;
						}
						else if (tecla==8 && valor.length!=0)
						{
								valor = valor.substring(0,valor.length-1);
						}
						else if ( ((tecla>47&&tecla<58)) && valor.length < this.maximo(mascara) ) //(tecla>47&&tecla<58)||(tecla>95&&tecla<106)
						{
							valor=valor+String.fromCharCode(tecla);
						}
				
						var resultado='';
						
						for (i = 0; i < mascara.length; i++)
						{
								if (mascara.charAt(i)=='#')
								{
									  if (valor.length!=0)
									  {
									   	  resultado = resultado + valor.charAt(0);
										  valor = valor.substring(1,valor.length);
										  
									  }
									else
									{
										resultado = resultado + "";
									}
								}
								else if (mascara.charAt(i)!='#')
								{
									resultado = resultado + mascara.charAt(i); 			
								}
								//alert(valor+" NUM "+resultado+" cont "+i);
				//		    dFilterTemp = replace(dFilterTemp,dFilterMask.substring(i,i+1),'');
						}
				
				
						textbox.value = resultado;
					return false;
				},
			soNumero: function(e){
				var tecla = (e.which) ? e.which : e.keyCode;
				//alert(tecla);
				if ((tecla < 47 && tecla !=8 && tecla !=9 ) || (tecla > 58 && tecla!=116) || tecla == 46 || tecla == 45 || tecla == 47) 
					return false;
			},
			soNumeroFloat: function(e){
				var tecla = (e.which) ? e.which : e.keyCode;
				//alert(tecla);
				if ((tecla < 47 && tecla !=8 && tecla !=9 && tecla != 46) || (tecla > 58 && tecla!=116) || tecla == 45  || tecla == 47) 
					return false;
			},
			verificaData:function(idMes,idAno)
						{
							var mes= document.getElementById(idMes).value;
							var ano= document.getElementById(idAno).value;
							
							var data = new Date();
							var mesAtual = data.getMonth();
							var anoAtual = data.getFullYear();
							
							//alert(ano +"=="+ anoAtual + "=>" +  mes +"=="+ mesAtual);
							if (ano == anoAtual)  
							{				
								if   (mes < mesAtual)			
								{
									alert("Mes Inferior ao mes Atual");
									document.getElementById(idMes).value = 0;
								}							
							}
							
						},
			isDataValida:function(campo)
				{
					dataAtual = this.replace(dataAtual,'/','');
					var diaAtual = dataAtual.substring(0,2);
					var mesAtual = dataAtual.substring(2,4);
					var anoAtual = dataAtual.substring(4,8);
					
					var data = campo.value;
					data = this.replace(data,'/','');
					var dia = data.substring(0,2);
					var mes = data.substring(2,4);
					var ano = data.substring(4,8);
					
					//alert(diaAtual + " " + mesAtual + " " + anoAtual + " "+ dia + " " + mes + " " + ano + " Data:" + data);
					if((data.length!=8) || (ano>anoAtual || (ano==anoAtual && (mes>mesAtual || (mes==mesAtual && (dia>diaAtual)))))) return false;
					
					return true;
				},
			
			isEmpty:function (campo){	return (campo.value.length == 0);	},

			isNotChecked:function(campo){	return (!(campo.checked));	},
			
			isMac:function(campo){
				str = campo.value;
				var result;
				var mac = /^[0-9a-fA-F]{12}$/;
				//var mac = /^[0-3]?\d\[01]?\d\(\d{2}|\d{4})$/;
				//alert(str.search(mac));
				if (str.search(mac)==-1) result=false;
				else result = true;
				return result;
			},
			
			

			isNotSelected:function(campo){	return (campo.selectedIndex == 0 || campo.selectedIndex == null || campo.selectedIndex == "" ) },

			isEmail: function (campo){
						str = campo.value;
						var result;
						//return (str.indexOf('.') > 2) && (str.indexOf('@') > 0);
						if (str.search(/^[\w!#$%&'*+\/=?^`{|}~-]+(\.[\w!#$%&'*+\/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/)==-1) result='erro';
						if (result=='erro')  
						{
							alert('O email está na forma incorreta, verifique-o!\nDeve ser da forma: mail@dominio');
							campo.value='';
							return false;
						}else
						{
							return true;
						}
					},
					id:function(sId){
						if(!sId){
							return null;
						}
						var returnObj=document.getElementById(sId);
						if(!returnObj&&document.all){
							returnObj=document.all[sId];
						}
						
						return returnObj;
					},
					getFormValues:function(frm){
						var objForm;
						var submitDisabledElements=false;
						if(arguments.length > 1&&arguments[1]==true)
						submitDisabledElements=true;
						
						var prefix="";
						
						if(arguments.length > 2)
							prefix=arguments[2];
						if(typeof(frm)=="string")
							objForm=this.id(frm);
						else
							objForm=frm;
						var sXml="";
						if(objForm&&objForm.tagName=='FORM'){
							var formElements=objForm.elements;
							var formValues = new Array(2);
							formValues[0] = new Array(formElements.length);
							formValues[1] = new Array(formElements.length);
							//alert(formElements.length);
							for(var i=0;i < formElements.length;i++){
								
								if(!formElements[i].name)
									continue;
								if(formElements[i].name.substring(0,prefix.length)!=prefix)
									continue;
								if(formElements[i].type&&(formElements[i].type=='radio'||formElements[i].type=='checkbox')&&formElements[i].checked==false)
									continue;
								if(formElements[i].disabled&&formElements[i].disabled==true&&submitDisabledElements==false)
									continue;
								var name=formElements[i].name;
									if(name){
										if(sXml!="")
											sXml+='\n';
											if(formElements[i].type=='select-multiple'){
												for(var j=0;j < formElements[i].length;j++){
													if(formElements[i].options[j].selected==true){
														sXml+=name+"="+encodeURIComponent(formElements[i].options[j].value)+"&";
														formValues[i][0] = name;
														formValues[i][1] = formElements[i].options[j].value;
													}
												}
									}else{
										sXml+=name+"="+encodeURIComponent(formElements[i].value);
										
										formValues[0][i] = name;
										formValues[1][i] = formElements[i].value;
										//alert(i);
									}
							}
						}
					}
					//alert(formValues); return;
					//sXml+="</q></xjxquery>";
					return formValues;
			},
			message:function(campo){
				return "Campo "+campo+" Obrigatório \n";
			},
			disableForm:function (form,flg){
				if(document.forms[form]==undefined) return;
				len=document.forms[form].length;
				
				for(x=0;x<len;x++) {
					document.forms[form].elements[x].disabled=flg;
					if(document.forms[form].elements[x].className == "requiredForm") document.forms[form].elements[x].className="required";
				}
			},
			validaForm:function (idForm){
							
							var submitDisabledElements=false;
							if(arguments.length > 1&&arguments[1]==true)
								submitDisabledElements=true;
							
							var prefix="";
							
							if(arguments.length > 2)
								prefix=arguments[2];
							var frm = this.getFormValues(idForm,submitDisabledElements,prefix);
							if(frm==null){
									alert("Nenhum Parâmetro encontrado no fomulário "+idForm);
									return false;
							}
							
							var campos = '';
							var Erro = '';
							var args = frm[0]; 
							var ok = 0;
							//if('required'=='required') alert('teste');
							var data;
							args=document.forms[idForm];
				
								
							for (i=0; i<args.length;i++){
								//obj = document.getElementById(args[i]);
								obj = args.elements[i];
								if(!obj.name)
									continue;
								if(obj.name.substring(0,prefix.length)!=prefix)
									continue;
								if(obj.type&&(obj.type=='radio'||obj.type=='checkbox')&&obj.checked==false)
									continue;
								
								if(obj.disabled&&obj.disabled==true&&submitDisabledElements==false)
									continue;
									
								if(obj==null) continue;
								//alert(obj.name);
								if(obj.className.substring(0,8)!='required') continue;
								obj.className = "required";
								switch (obj.type) {
									case "text" :
										
										if (this.isEmpty (obj)) {
												obj.className = "requiredForm";
												
												//obj.style="background-color:#FFFFCC";
												ok = 1;
												campos += this.message(args[i]);
										}else {
											if (obj.alt=="email"){
												if (!(this.isEmail(obj))){
													obj.className = "requiredForm";
													ok = 1;
													
												}
											}
											if (obj.alt=="data"){
												if (!(this.isDataValida(obj))){
													obj.className = "requiredForm";
													ok = 1;
													Erro += "Data inválida.";
												}
											}
											
											if (obj.alt=="mac"){
												//alert();
												if (!(this.isMac(obj))){
													obj.className = "requiredForm";
													ok = 1;
													Erro += "Endereço Mac Incorreto";
												}
											}
											//alert(obj.alt);
											if (obj.alt=="cnpj"){
												if (!(this.isCNPJ(obj))){													
													obj.className = "requiredForm";
													ok = 1;
												}
											}
											
										}
										break;
									case "password" :
										if (this.isEmpty (obj)) {
												obj.className = "requiredForm";
												ok = 1;
												campos += this.message(obj.name);
										}
										break;
									case "textarea" :
										if (this.isEmpty (obj)) {
												obj.className = "requiredForm";
												ok = 1;
												campos += this.message(obj.name);
										}
										break;
									case "radio" :
										if (this.isNotChecked(obj)){
											obj.className = "requiredForm";
											ok = 1;
											campos += this.message(obj.name);
										}
										break;
									case "select-one" :
										if (this.isNotSelected(obj)){
											obj.className = "requiredForm";
											ok = 1;
											campos += this.message(obj.name);
										}
										break;
									
									case "checkbox" :
										if (this.isNotChecked(obj)){
											obj.className = "requiredForm";
											ok = 1;
											campos += this.message(obj.name);
										}
										break;
									
									//default :
								}
							
							}
							//alert('Valor de OK: '+ok);
							if (ok) {
								//alert("Por Favor, Verifique os Campos. \n"+campos);
								alert("Por Favor, Verifique os Campos.\n" + Erro);
								return false;
							} else return true;
							
							
							
						}
	}
	return validador;
}
function Permissao() {

	var permissao = {
		indxPermissao : 0,
						getCampos: function(modulo,op){
							
							switch(op){
							
								default:
									var campo = Array(2);
									campo[0] = '<input type="hidden" name="cod_permissao['+this.indxPermissao+']" id="cod_permissao['+this.indxPermissao+']" value="" >' + '<input type="text" name="dsc_permissao['+this.indxPermissao+']" id="dsc_permissao['+this.indxPermissao+']" value=""  readonly="true" size="20" onFocus="javascript:verificarPermissao('+this.indxPermissao+');" />';
									campo[1] = '<input type="checkbox" name="check[visualizar]['+this.indxPermissao+']" id="check_visualizar_'+this.indxPermissao+'" value="1">';
									campo[2] = '<input type="checkbox" name="check[cadastrar]['+this.indxPermissao+']" id="check_cadastrar_'+this.indxPermissao+'" value="2">';
									campo[3] = '<input type="checkbox" name="check[editar]['+this.indxPermissao+']" id="check_editar_'+this.indxPermissao+'" value="4">';
									campo[4] = '<input type="checkbox" name="check[excluir]['+this.indxPermissao+']" id="check_excluir_'+this.indxPermissao+'" value="8">';
									campo[5] = '<input type="checkbox" name="check[cancelar]['+this.indxPermissao+']" id="check_cancelar_'+this.indxPermissao+'" value="16">';
									campo[6] = '<input type="checkbox" name="todos_'+this.indxPermissao+'" id="todos_'+this.indxPermissao+'" onclick="selTodas('+this.indxPermissao+')";>';
									campo[7] = '<a href="javascript:permissao.remove('+modulo+','+this.indxPermissao+');" id="removerPermissao'+this.indxPermissao+'" >Excluir</a>';
									return campo;
									break;
									
							}
						},
						add : function (modulo,op){
							this.indxPermissao++;
							
							var campo = Array();
							campo = this.getCampos(modulo,op);
							
							var lista = document.getElementById('listaPermissao');
							var tr = document.createElement('tr');
							tr.setAttribute('id','permissao'+this.indxPermissao);
							tr.className = "row" + (this.indxPermissao%2);
							lista.appendChild(tr);
							
							var td;

							for(var i=0; i<campo.length; i++){
								td = document.createElement('td');
								td.innerHTML = campo[i];
								td.align = "center";
								tr.appendChild(td);
							}
						},
						remove : function(modulo,indx){
						  
							var lista = document.getElementById('listaPermissao');
							var remTr = document.getElementById('permissao'+indx);
						    lista.removeChild(remTr);
							if(indx==this.indxPermissao)this.indxPermissao--;
							if(this.indxPermissao<0) this.indxPermissao = 0;
						}
	}
	return permissao;
}

function Tecla(e)
{
	if(document.all) // Internet Explorer
		var tecla = event.keyCode;
	
	else if(document.layers) // Nestcape
		var tecla = e.which;
	
	if(tecla > 65 && tecla < 90) // LETRAS MAIUSCULAS
		return true;
	else
		if(tecla > 97 && tecla < 122) // LETRAS MINUSCULAS
			return true;
	else
		if(tecla > 47 && tecla < 58) // numeros de 0 a 9
			return true;
	else
	{
		if (tecla != 8) // backspace
			return false;
		else
			return true;
	}
}
