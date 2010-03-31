// JavaScript Document
// ==UserScript==
// @name           SWT Triage
// @namespace      http://diveintogreasemonkey.org/download/
// @description    SWT Triage script
// @include         https://bugs.eclipse.org/bugs/show_bug.cgi?id=*
// ==/UserScript==
// Copyright (c) 2000, 2009 IBM Corporation and others.
// All rights reserved. This program and the accompanying materials
// are made available under the terms of the Eclipse Public License v1.0
// which accompanies this distribution, and is available at
// http://www.eclipse.org/legal/epl-v10.html
//
// Contributors:
//     IBM Corporation - initial API and implementation
var refreshInterval = 5; //1000*60*60*24;
var els = document.forms[1].elements;
var component;
var product;
var qa_contact;
var comment;
var assigned_to;
var short_desc;
var keywords;
var op_sys;
var newcc;
var myDiv = document.createElement('div');
var header = document.getElementById('header');

window.addEventListener("load", function() {
 for (var i = 0; i < els.length; i++) {
  if (els[i].name == "component") component = i;
  if (els[i].name == "product") product = i;
  if (els[i].name == "qa_contact") qa_contact = i;
  if (els[i].name == "keywords") keywords = i;
  if (els[i].name == "comment") comment = i;
  if (els[i].name == "assigned_to") assigned_to = i;
  if (els[i].name == "short_desc") short_desc = i;
  if (els[i].name == "op_sys") op_sys = i;
  if (els[i].name == "newcc") newcc = i;
 }
 
 var tdEls = document.getElementsByTagName("td");
 var isClosed="";
 for (var j = 0; j < tdEls.length; j++) {
  if (tdEls[j].innerHTML == "RESOLVED" || tdEls[j].innerHTML == "VERIFIED" || tdEls[j].innerHTML == "CLOSED" ) {
   isClosed = "true";
   break;
  }
 }
 if (isClosed == "true") return;
 var isSWT = document.forms[1].elements[component].value;
 if (isSWT != "SWT") return;

 var addToCC = document.getElementById('addselfcc');
 if (addToCC != null) addToCC.checked = false;
 document.forms[1].elements[component].addEventListener('change', function() {
  var b = document.getElementById('knob-reassign-cmp');
  b.checked = true;
  b.scrollIntoView(true);
 }
 , false);
 document.forms[1].elements[product].addEventListener('change', function() {
  var b = document.getElementById('knob-reassign-cmp');
  b.checked = true;
  b.scrollIntoView(true);
 }
 , false);

 var assigned_to = document.forms[1].elements[assigned_to];
 var qacontact = document.forms[1].elements[qa_contact].value;
 //All names listed below will show up with all of the component buttons, otherwise just a "move to triage" 
 //button will show if assigned to someone or a "post triage" button will show if assigned to the triage box
 if(assigned_to != null 
   && assigned_to.value != "platform-swt-inbox@eclipse.org" 
   && assigned_to.value != "steve_northover@hotmail.com"
   && assigned_to.value != "billy.biggs@eclipse.org"
   && assigned_to.value != "duongn@ca.ibm.com"
   && assigned_to.value != "veronika_irvine@yahoo.com"
   && assigned_to.value != "gheorghe@ca.ibm.com"
   && assigned_to.value != "Silenio_Quarti@ca.ibm.com"
   && assigned_to.value != "Carolyn_MacLeod@ca.ibm.com"
   && assigned_to.value != "grant_gayed@ca.ibm.com"
   && assigned_to.value != "cocoakevin@gmail.com"
   && assigned_to.value != "felipe_heidrich@ca.ibm.com"
   && assigned_to.value != "skovatch.swt@gmail.com"
   && assigned_to.value != "rdowdall@qnx.com"
   && assigned_to.value != "lshanmug@in.ibm.com"
   && assigned_to.value != "pinnamur@in.ibm.com"
    ) {
  var header = document.getElementById('header');
  var myDiv = document.createElement('div');
  var buttons = "";
  if (assigned_to.value != "swt-triaged@eclipse.org") {
   buttons += buttonForMoveToTriaged(assigned_to.value);
  } else {
   //buttons += postTriageButton("P5 triaged", "P5", "---", "", "platform-ui-triaged@eclipse.org");
   //buttons += postTriageButton("P3 triaged", "P3", "---", "", "platform-ui-triaged@eclipse.org");
   //buttons += postTriageButton("3.5 P3", "P3", "3.5", "", qacontact);
   //buttons += postTriageButton("M6 P2", "P2", "3.5 M6", "", qacontact);
   //buttons += postTriageButton("M7 P2", "P2", "3.5 M7", "", qacontact);
   //buttons += postTriageButton("RC1 P2", "P2", "3.5 RC1", "", qacontact);
   //buttons += postTriageButton("RC2 P2", "P2", "3.5 RC2", "", qacontact);
   //buttons += postTriageButton("3.6", "", "3.6", "", qacontact);
   //buttons += postTriageButton("4.0", "", "4.0", "", qacontact);
  }
  myDiv.innerHTML = '<div style="position:absolute; left: 150px; top:10px;">' + buttons + '</div>';
  header.parentNode.insertBefore(myDiv, header);
  return;
 }

 var timecomp = new Date();
 var newTime = timecomp.getTime() + '';
 var oldTime = GM_getValue('JSONDate');
 var diff = (+newTime) - (+oldTime);
 
 
 if (!GM_getValue('JSONCache') || (diff > refreshInterval)){
  GM_log("loading data into cache");
  loadData();
 }else{
  buildButtons(GM_getValue('JSONCache'));
  GM_log("Data cache is being used");
  //setTimeout(function() {loadData(); }, refreshInterval);
  }
}
, false);


function rawButton(label, action, description) {
 return '<input type="button" value="' + label + '" onClick="' + action + '" title="' + description + '" />';
}
function buttonFor(comp, owner, second, description) {
 var onClick = "var a=document.getElementById('summary_alias_container');";
 onClick += "if (a!=null) {"
 onClick += "a.setAttribute('class', 'bz_default_hidden');";
 onClick += "var c=document.getElementById('summary_alias_input');";
 onClick += "c.setAttribute('class', '');";
 onClick += "}";
 onClick += "var e=document.getElementById('bz_assignee_edit_container');";
 onClick += "if (e!=null) {"
 onClick += "e.setAttribute('class', 'bz_default_hidden');";
 onClick += "var f=document.getElementById('bz_assignee_input');";
 onClick += "f.setAttribute('class', '');";
 onClick += "}";
 onClick += "var s=document.getElementById('short_desc').value;";
 onClick += "var b=document.getElementById('assigned_to');";
 onClick += "if (b!=null) {";
 onClick += "b.value='swt-triaged@eclipse.org';";
 onClick += "var q = document.forms[1].elements[" + qa_contact + "];";
 onClick += "q.value='" + owner + "';";
 onClick += "var q = document.forms[1].elements[" + newcc + "];";
 onClick += "q.value='" + second + "';";
 onClick += "}";
 onClick += "var d = document.forms[1].elements[" + short_desc + "];";
 onClick += "if (d!=null) {";
 onClick += "if (s.indexOf('[" + comp + "]') == -1 ){";
 onClick += "d.value = '[" + comp + "] ' + d.value;";
 onClick += "}";
 onClick += "d.scrollIntoView(true);";
 onClick += "d.focus();";
 onClick += "}";
 GM_log(onClick);
 return rawButton(comp, onClick, owner + ": " + description);
}
function buttonForMoveToTriaged(owner) {
    var onClick = "var e=document.getElementById('bz_assignee_edit_container');";
 onClick += "if (e!=null) {"
 onClick += "e.setAttribute('class', 'bz_default_hidden');";
 onClick += "var f=document.getElementById('bz_assignee_input');";
 onClick += "f.setAttribute('class', '');";
 onClick += "}";
 onClick += "var b=document.getElementById('assigned_to');";
 onClick += "var s = document.getElementById('short_desc').value;";
 onClick += "if (b!=null) {";
 onClick += "b.value='swt-triaged@eclipse.org';";
 onClick += "var q = document.forms[1].elements[" + qa_contact + "];";
 onClick += "q.value='" + owner + "';";
 onClick += "}";
 onClick += "var co = document.forms[1].elements[" + comment + "];";
 onClick += "if (co!=null) {";
 onClick += "co.value = 'As per http://eclipse.org/swt/triage.php'+ co.value;";
 onClick += "}";
 onClick += "var d = document.forms[1].elements[" + short_desc + "];";
 onClick += "if (d!=null) {";
 onClick += "d.scrollIntoView(true);";
 onClick += "d.focus();";
 onClick += "}";
 return rawButton("Move to Triaged", onClick, owner);
}
function postTriageButton(label, priority, target, keyword, assignee) {
 var onClick = "";
 if (priority != "") {
  onClick += "var p=document.getElementById('priority');";
  onClick += "p.value='" + priority + "';";
 }
 onClick += "var d = document.forms[1].elements[" + keywords + "];";
 onClick += "if (d!=null) {";
 if (keyword != "") {
  onClick += "if(d.value.indexOf('" + keyword + "')==-1){";
  onClick += "if(d.value!=''){";
  onClick += "d.value = d.value + ', ';";
  onClick += "}";
  onClick += "d.value = d.value + '" + keyword + "';";
  onClick += "}";
 }
 onClick += "d.scrollIntoView(true);";
 onClick += "d.focus();";
 onClick += "}";
 if (assignee != null && assignee != "") {
  onClick += "var b=document.getElementById('knob-reassign');";
  onClick += "if (b!=null) {";
  onClick += "b.checked=true;";
  onClick += "b.nextSibling.nextSibling.nextSibling.value='"+assignee+"';";
  onClick += "}";
  onClick += "var c=document.getElementById('target_milestone');";
  onClick += "if (c!=null) {";
  onClick += "c.value='" + target + "';";
  onClick += "}";
 }
 return rawButton(label, onClick, "");
}

function loadData() {
 GM_log("Getting data");
 var rText = "";
 GM_xmlhttpRequest( {
  method : "GET", url : "http://www.eclipse.org/swt/swt_triage.json", headers : {
  "User-Agent" : "SWT Triage", "Accept" : "text/plain", }
 , onreadystatechange : function(details) {
  if(details.readyState == 4) {
   if (details.status == 200) {
    buildButtons(details.responseText);
    GM_log('JSON data received');
    //setTimeout(function() {loadData(); }, refreshInterval); 
   } else {
    GM_log("Error reading JSON"); 
    }
   }
  }
 });
}
function buildButtons(loadedJSON) {
 var cacheDate = new Date();
 var mil = cacheDate.getTime();
 mil = mil +'';
 GM_setValue('JSONDate', mil);
 GM_setValue('JSONCache', loadedJSON);
 var container = eval('(' + loadedJSON + ')');
 var components = container.components;
 var users = container.commiters;
 var platforms = container.platforms;
 var buttons = "";
 var os_name=document.forms[1].elements[op_sys].value;
 GM_log('Op sys: ' + document.forms[1].elements[op_sys].value);
 GM_log(users[0].name);
 
 //find out the OS name for this bug
 var os_alias_name = "";
 for (i=0; i<platforms.length; i++) {
  for (j=0; j<platforms[i].alias.length; j++) {
   if (os_name == platforms[i].alias[j].name) {
    os_alias_name = platforms[i].name;
    break;
   }
  }
  if (os_alias_name != "") {
   break;
  } 
 }

 for (i = 0; i < components.length; i++) {
  var ownerEmail, secondEmail;
  for (j = 0; j < components[i].OS.length; j++) {
      if (components[i].OS[j].name == "All" || components[i].OS[j].name == os_alias_name) {
    for (k=0; k<users.length; k++) {
     if (users[k].id == components[i].OS[j].owner) {
      ownerEmail = users[k].email; 
     } else if (users[k].id == components[i].OS[j].second) {
      secondEmail = users[k].email; 
     }
    }
    break;
   }
  }
  buttons += buttonFor(components[i].component, ownerEmail, secondEmail, components[i].description);
 }
 
 var refresh = '<input type="button" value="Refresh" id="refresher" />';
 myDiv.innerHTML = '<div style="border: solid black 2px">' + buttons + refresh + '</div>';
 header.parentNode.insertBefore(myDiv, header);
 
 var refreshButton = document.getElementById('refresher');
 refreshButton.addEventListener("click", loadData, false);
}



