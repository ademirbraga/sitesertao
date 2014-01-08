/* $Id: */

/**
 * Shows popup dialog 
 */ 

/*

Syntax:

	showDialog( sHMTL [,sFeatures] );
	
Parameters:

	sHTML		Mandatory. String that specifies the HTML content to display. 								
	sFeatures	Optional. This String parameter is a list of items separated by commas.
			Each item consists of an option and a value, separated by an equals sign
			(for example, "position=relative, modal=yes"). The following features are supported.
	
		 	position = { absmiddle | absolute | relative }	Specifies how the dialog should be positioned.
									The "absmiddle" type displays the dialog exactly
									at the center of the page. The "absolute" type
									displays the dialog based on the "top" and "left"
									(mentioned below) parameters provided. The "relative"
									type displays it exactly below the element from
									where the dialog is opened or from the element id
									specified in "srcElement" parameter. [absmiddle]

									Note:- "relative" type also accepts "top" and 
									"left" parameters where the top and left values are
									relative to the element from where the dialog is
									opened or from the element id specified in
									"srcElement" parameter.

			srcElement = id					Specifies the HTML element from where the Dialog
									should be positioned relatively. The value given is
									the HTML element's id.
							
			top = number					Specifies the top position of the dialog, in pixels.
									This value is relative to the upper-left corner of
									the screen.

			left = number					Specifies the left position of the dialog, in pixels.
									This value is relative to the upper-left corner of
									the screen.					
			
			height = number					Specifies the height of the dialog, in pixels.
									If not specified, the default value is the content's
									height.					

			width = number					Specifies the width of the dialog, in pixels.
									If not specified, the default value is the content's
									width.

			modal = { yes | no }				Specifies whether the dialog should be opened as a
									modal dialog or not. [no]
			
			title = text					Specifies the title text to be displayed.
									Note: If title is not specified and also if 
									closeButton is set as "no", then the dialog box
									displays only the HTML content passed and the
									surrounding box won't be displayed.

			closeButton = { yes | no }			Specifies whether the close button should be 
									displayed or not. If the value is "no" the button
									won't be displayed, vice versa. [yes]

			closeOnEscKey = { yes | no }			Specifies whether the dialog should be closed or not
									when "ESC" key is pressed. [yes]

			draggable = { yes | no }			Specifies whether dragging/moving the Dialog Box is
									allowed or not. [yes]

			transitionType = { boxIn }			Specifies the type of transition effect to be used
									when the dialog is displayed. [boxIn]

			transitionInterval = number			Specifies the transition interval, in milliseconds.
									[10]


Example:

	Following are the different ways the showDialog method can be used:

	1. showDialog( html );
	2. showDialog( html, "position=relative" );
	3. showDialog( html, "position=absolute, top=50, left=400, height=200, width=400" );
	4. showDialog( html, "position=relative, top=10, left=-30" );
	5. showDialog( html, "position=relative, modal=yes, closeOnEscKey=no" );
	6. showDialog( html, "position=relative, transitionType=boxIn, transitionInterval=20" );

Road Map:

	Following are the features that will be provided in future:
	
	1. Restrict Dragging
	2. Resizeable Dialogs
	3. Close Button hiding
	4. Different types of transition effects will be provided

*/

var oDialog, doc, closeOnEscKey = false;
var dialogProperties = new Array("position", "top", "left", "height", "width", "srcElement", "modal", "draggable",
								 "title", "closeButton", "closeOnEscKey", "transitionType", "transitionInterval");

function showDialog(content, features) {
	if (typeof(features) == "undefined") var features = "position=absmiddle";
	features = features.split(",");
	
	if (browser_ie)	{
						var selTags=document.getElementsByTagName("SELECT")
					for (i=0;i<selTags.length;i++)
					{	
						selTags[i].style.visibility="hidden"
					}
	}
				
	var featurePresent;
	for (var i = 0; i < dialogProperties.length; i++) {
		featurePresent = false;
		for (var j = 0; j < features.length; j++) {
			if (features[j].indexOf(dialogProperties[i]) >= 0) {
				featurePresent = true;
				break;
			}
 		}
		
		self["dialog_" + dialogProperties[i]] = (featurePresent) ? features[j].substr(features[j].indexOf("=") + 1, features[j].length).trim() : "undefined";
	}
	
	if (document.getElementById("_DIALOG_LAYER") == null) {
		oDialog = document.createElement("DIV");
		oDialog.id = "_DIALOG_LAYER";

		document.body.appendChild(oDialog);
	} else {
		oDialog = document.getElementById("_DIALOG_LAYER");
	}

	var content = '<div id="_DIALOG_CONTENT">' + content + '</div>';
	
	var box = '<table class="DialogBox" border="0" cellspacing="0" cellpadding="0"><tr><td class="boxTL">&nbsp;</td>';

	if (dialog_draggable != "undefined" && dialog_draggable == "no") box += '<td class="boxHeader">';
	else box += '<td class="boxHeader drag" onMouseDown="captureDialog(event)">';

	if (dialog_title != "undefined") {
		if (dialog_title.charAt(0) == "'" && dialog_title.charAt(dialog_title.length - 1) == "'") 
			dialog_title = dialog_title.substr(1, dialog_title.length - 2);
		if (dialog_title.trim().length == 0) 
			dialog_title = "&nbsp;";
	} else dialog_title = "&nbsp;";

	box += dialog_title + '</td><td class="boxCtrlButtonPane">';
	
	if (dialog_closeButton != "undefined" && dialog_closeButton == "no") box += '&nbsp;</td>';
	else box += '<input type="button" class="closeButton" onClick="closeDialog()"></td>';
	
	box += '<td class="boxTR">&nbsp;</td></tr><tr><td colspan="4" class="boxContent">' + content + '</td></tr>';
	box += '<tr><td class="boxBL">&nbsp;</td><td colspan="2" class="boxBC"></td><td class="boxBR">&nbsp;</td></tr></table>';
	
	oDialog.style.display = "";
	
	var showInBox = true;
	if (dialog_closeButton != "undefined")
		if (dialog_title == "&nbsp;" && dialog_closeButton == "no") showInBox = false;

	if (showInBox) 
		oDialog.innerHTML = "<table cellpadding='0' cellspacing='0'><tr><td height='100%' style='display:block'>" + box + "</td></tr></table>";	
	else
		oDialog.innerHTML = "<table cellpadding='0' cellspacing='0'><tr><td height='100%' style='display:block'>" + content + "</td></tr></table>";	

	oDialog.style.position = "absolute";
	oDialog.style.left = "-1000px";
	oDialog.style.top = "-1000px";
	
	var scriptTags = oDialog.getElementsByTagName("SCRIPT");
	for (var i = 0; i < scriptTags.length; i++) {
		var scriptTag = document.createElement("SCRIPT");
		scriptTag.type = "text/javascript";
		scriptTag.language = "javascript";
		if (scriptTags[i].src != "") { scriptTag.src = scriptTags[i].src;}
		scriptTag.text = scriptTags[i].text;
		
		if (typeof document.getElementsByTagName("HEAD")[0] == "undefined") {
			document.createElement("HEAD").appendChild(scriptTag)
		} else {
			document.getElementsByTagName("HEAD")[0].appendChild(scriptTag);
		}			
	}
	
	if (browser_opera) {
		var temp = content;
		var styleTags = oDialog.getElementsByTagName("STYLE");
		for (var i = 0; i < styleTags.length; i++) {
			styleTags[i].innerHTML = temp.substring(temp.indexOf("<style>") + 7, temp.indexOf("</style>") - 1);
			temp = temp.substring(temp.indexOf("</style>") + 8, temp.length);
		}
	}
	
	if (dialog_width != "undefined") {
		if (browser_ie)	oDialog.childNodes[0].style.width = parseInt(dialog_width) + "px";
		else if (browser_nn4 || browser_nn6) oDialog.childNodes.item(0).style.width = parseInt(dialog_width) + "px";
	}
	
	if (dialog_height != "undefined") {
		if (browser_ie) oDialog.childNodes[0].style.height = parseInt(dialog_height) + "px";
		else if (browser_nn4 || browser_nn6) oDialog.childNodes.item(0).style.height = parseInt(dialog_height) + "px";
	}

	oDialogContent = getObj("_DIALOG_CONTENT");
	
	var left = 0, top = 0;
	
	if (browser_opera) {
		if (dialog_width != "undefined") {
			oDialogContent.style.width = parseInt(dialog_width) + "px";
		} else {
			oDialogContent.style.width = oDialogContent.offsetWidth + "px";
			oDialog.style.width = oDialogContent.offsetWidth + "px";
		}
	}
	
	if (browser_nn4 || browser_nn6) {
		if (dialog_width != "undefined") oDialogContent.style.width = parseInt(dialog_width) + "px";
		else oDialogContent.style.width = (oDialogContent.offsetWidth + 20) + "px";
	}
	
	if (dialog_height != "undefined") {
		if (browser_ie && (parseInt(dialog_height) < oDialogContent.offsetHeight)) left = -15;
		oDialogContent.style.height = parseInt(dialog_height) + "px";
	}
	
	oDialogContent.style.overflow = "auto";
	
	var width = oDialog.offsetWidth;
	var height = oDialog.offsetHeight;
	
	doc = findDocDim();
	
	if (dialog_closeOnEscKey != "undefined" && dialog_closeOnEscKey == "no") closeOnEscKey = false;
	else closeOnEscKey = true;
	
	if (!browser_opera) {
		if (dialog_modal != "undefined" && dialog_modal == "yes") freezeBackground();
		else if (document.getElementById("FreezeLayer") != null) document.body.removeChild(document.getElementById("FreezeLayer"));
	}

	if (dialog_srcElement != "undefined") srcElement = getObj(dialog_srcElement);
	else if (srcElement == "undefined") srcElement = document.body;

	if (dialog_left != "undefined")	left += parseInt(dialog_left);
	if (dialog_top != "undefined") top += parseInt(dialog_top);
	
	if (dialog_position != "undefined" && dialog_position == "relative") {
		left += findPosX(srcElement) + srcElement.offsetWidth - width;
		top += findPosY(srcElement) + srcElement.offsetHeight + 2;
	} else if (dialog_position != "undefined" && dialog_position == "absolute") {
		left += document.body.scrollLeft;
		top += document.body.scrollTop;		
	} else {
		left = (doc.width / 2 ) - (width / 2) + document.body.scrollLeft;
		top = (doc.height / 2) - (height / 2) + document.body.scrollTop;
	}
	
	if (dialog_transitionType != "undefined") {
		if (dialog_transitionInterval == "undefined") dialog_transitionInterval = 10;		

		JKEffect.init( 
			{ 
				type : dialog_transitionType, speed : dialog_transitionInterval ,
				layerId : "_DIALOG_LAYER", layerTop : top, layerLeft : left
			 } 
		);
		
		JKEffect.display();
	} else {
		oDialog.style.left = left + "px";
		oDialog.style.top = top + "px";
	}

	scrollEnd = (height - (doc.height - (top - document.body.scrollTop))) + scrollConst;
	/*if (scrollEnd > 0) {
		cnt = 0;
		scrollInterval = setInterval("scrollPage()", 7);
	}*/
}

function freezeBackground() {
	var oFreezeLayer = document.createElement("DIV");
	oFreezeLayer.id = "FreezeLayer";
	oFreezeLayer.className = "freezeLayer";

	if (browser_ie)	oFreezeLayer.style.height = (document.body.offsetHeight + (document.body.scrollHeight - document.body.offsetHeight)) + "px";
	else if (browser_nn4 || browser_nn6) oFreezeLayer.style.height = document.body.offsetHeight + "px";

	document.body.appendChild(oFreezeLayer);
	oDialog.style.zIndex = "30";
}

var oMoveLayer, diffLeft=0, diffTop=0;
function captureDialog(ev) {
	oMoveLayer = document.getElementById("_DIALOG_LAYER");
	oMoveLayer.style.cursor = "move";

	if (browser_ie) {
		diffLeft = window.event.clientX + document.body.scrollLeft - parseInt(findPosX(oMoveLayer));
		diffTop = window.event.clientY + document.body.scrollTop - parseInt(findPosY(oMoveLayer));
	} else if (browser_nn6) {
		diffLeft = ev.pageX - parseInt(findPosX(oMoveLayer));
		diffTop = ev.pageY - parseInt(findPosY(oMoveLayer));
	}
	
	document.onmousemove = moveDialog;
	document.onmouseup = releaseDialog;
}

function moveDialog(ev) {
	clearTextSelection();
	if (browser_ie) {
		oMoveLayer.style.left = (window.event.clientX + document.body.scrollLeft - diffLeft) + "px";
		oMoveLayer.style.top = (window.event.clientY + document.body.scrollTop - diffTop) + "px";
	} else if (browser_nn6) {
		oMoveLayer.style.left = (ev.pageX - diffLeft) + "px";
		oMoveLayer.style.top = (ev.pageY - diffTop) + "px";
	}
}

function releaseDialog() {
	oMoveLayer.style.cursor = "default";
	document.onmousemove = null;
	document.onmouseup = null;
}

function closeDialog() {
	oDialog.style.display = "none";
	
	if (browser_ie)	{
		var selTags=document.getElementsByTagName("SELECT")
		for (i=0;i<selTags.length;i++)
		{
			selTags[i].style.visibility="visible"
		}
	}
	if(getObj("dashboardContent"))
	{
		getObj("dashboardContent").style.display = "block";
	}
		
	if (document.getElementById("FreezeLayer") != null) document.body.removeChild(document.getElementById("FreezeLayer"));
}

function closeDialogEditar(modulo,chave) {
	oDialog.style.display = "none";
	
	if (browser_ie)	{
		var selTags=document.getElementsByTagName("SELECT")
		for (i=0;i<selTags.length;i++)
		{
			selTags[i].style.visibility="visible"
		}
	}
	if(getObj("dashboardContent"))
	{
		getObj("dashboardContent").style.display = "block";
	}
		
	if (document.getElementById("FreezeLayer") != null) document.body.removeChild(document.getElementById("FreezeLayer"));
	xajax_procura('',modulo,chave);
}

document.onkeydown = function(ev) {
	if (browser_ie) var keyCode = window.event.keyCode;
	else if (browser_nn4 || browser_nn6) var keyCode = ev.which;
	
	if (keyCode == 27 && closeOnEscKey == true) closeDialog();
}

var scrollEnd = 0, cnt = 0;
function scrollPage() {
	if (cnt <= scrollEnd) {
		document.body.scrollTop += 10;
		cnt += 10;
	} else {
		scrollEnd = cnt = 0;
		clearInterval(scrollInterval);
	}
}


/*
 * Shows popup dialog 
 */ 

/*

Syntax:

	showURLInDialog( sURL [,sFeatures] );
	
Parameters:

	sURL		Mandatory. String that specifies the URL to display. 								
	sFeatures	Optional. Sames as mentioned in showDialog() function
	
Example:

	showURLInDialog( "InstantFeedback.cc", "position=relative" );
	
*/

function showURLInDialog(url, features) {
	var xmlhttp = getXMLHttpRequest();
	xmlhttp.open("GET", url, true);
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) {
			showDialog(xmlhttp.responseText, features);
		}
	}	
	xmlhttp.send(null);
}

