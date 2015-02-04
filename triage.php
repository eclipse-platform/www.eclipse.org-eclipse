<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());

$pageTitle = "SWT Bug Triage";

ob_start();
?>
<div id="midcolumn">
<h1>SWT Bug Triage</h1>
<script type="text/javascript">
window.onload = function() {
	if (window.XMLHttpRequest)
  	{
 		 //IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else if (window.ActiveXObject)
  	{
  		// IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	else
  	{
  		alert("Your browser does not support XMLHTTP!");
  	}
   xmlhttp.onreadystatechange=function() {
		if(xmlhttp.readyState==4){
			//if (xmlhttp.status == 200) {
				buildTable(xmlhttp.responseText);
			//}else{
			//	alert(xmlhttp.status);
			//}
		}
	}
	xmlhttp.open("GET","swt_triage.json",true);
	xmlhttp.send(null);
}

function buildTable(loadedJSON){
 var container = eval('(' + loadedJSON + ')');
 var components = container.components;
 var users = container.users;

 table = document.getElementById('swtComponents');
 var row = table.insertRow(0);
 var component = row.insertCell(0);
 var description = row.insertCell(1);
 var owner = row.insertCell(2);
 component.innerHTML = '<div style="text-align: center;"><h3>Component</h3></div>';
 description.innerHTML = '<div style="text-align: center;"><h3>Description</h3></div>';
 owner.innerHTML = '<div style="text-align: center;"><h3>Owner</h3></div>';

 for (i = 0; i < components.length; i++){
	 row = table.insertRow(i+1);
	 component = row.insertCell(0);
	 description = row.insertCell(1);
	 owner = row.insertCell(2);
	 component.innerHTML = '<div style="text-align: center;" id="component">[<a href="javascript:viewBugsWithSummary(\'[' + components[i].component + ']\')">' + components[i].component + '</a>]</div>';
	 description.innerHTML = components[i].description;
	 var osList = "";
	 for (j = 0; j < components[i].OS.length; j++) {
	 	osList += '<li>' + components[i].OS[j].name + ' - ' + components[i].OS[j].owner + ','+ components[i].OS[j].second + '</li>'; 
	 }
	 owner.innerHTML = '<div id="owner"><ul>' + osList + '</ul></div>';
 }
}

function viewBugsWithSummary(desc) {
 //window.location = "https://bugs.eclipse.org/bugs/buglist.cgi?short_desc_type=anywordssubstr&short_desc=" + encodeURI(desc) + "&product=Platform&component=IDE&component=UI&long_desc_type=allwordssubstr&long_desc=&bug_file_loc_type=allwordssubstr&bug_file_loc=&keywords_type=allwords&keywords=&bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&emailtype1=substring&email1=&emailtype2=substring&email2=&bugidtype=include&bug_id=&votes=&changedin=&chfieldfrom=&chfieldto=Now&chfieldvalue=&cmdtype=doit&newqueryname=&order=Reuse+same+sort+as+last+time&field0-0-0=noop&type0-0-0=noop&value0-0-0=";
 window.location = "https://bugs.eclipse.org/bugs/buglist.cgi?query_format=advanced&short_desc_type=allwordssubstr&short_desc=" + encodeURI(desc) + "&product=Platform&component=SWT&long_desc_type=allwordssubstr&long_desc=&bug_file_loc_type=allwordssubstr&bug_file_loc=&status_whiteboard_type=allwordssubstr&status_whiteboard=&keywords_type=allwords&keywords=&bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&emailtype1=substring&email1=&emailtype2=substring&email2=&bugidtype=include&bug_id=&votes=&chfieldfrom=&chfieldto=Now&chfieldvalue=&cmdtype=doit&order=Reuse+same+sort+as+last+time&field0-0-0=noop&type0-0-0=noop&value0-0-0=";
}
</script>
<h2>Background</h2>
<p>Early in the 3.6 planning cycle, we have decided to revamp the SWT bug triage system. Up until now, our triage
consisted of directly assigning bugs to the component owners. Over time this led to each committer owning a huge number
of bugs which not only gives the mistaken impression that they are actively working on solving all of those bugs but also makes it
difficult for members of the community to identify which bugs are available for contribution. The Platform UI team has changed their 
triage process earlier in the year and we have decided to adopt their process.</p>
<h2>Triage</h2>
<p>The new SWT triage process is as follows:
<ul>
<li>Bugs come in to platform-swt-inbox@eclipse.org</li>
<li>If the bug has sufficient information in it to proceed, the person performing the triage:
<ul>
<li>Prepends the component area of the bug in the Summary field.</li>
<li>Prepends [GTK], [GTK3], [Win32], [Cocoa] or [Common] into the Summary field, depending on which architectures are affected by the bug.</li>
<li>Ensures that the severity level is appropriate - enhancement requests should be marked appropriately as should blocker/critical bugs.</li>
<li>Adds the primary component owner as the main QA contact.</li>
<li>Adds the secondary owner to the CC field.</li>
<li>Reassigns the bug to the swt-triaged@eclipse.org box.</li>
</ul>
</li>
<li>Committers assign the bugs that they are actively working on to themselves.</li>
<li>All other bugs in the triaged inbox are considered active but are not currently being worked on. These bugs are available for anyone in the community to work on.</li>
</ul>
<h2>Bug owners</h2>
If you are the main QA contact on a bug:
<ul>
<li>Verify that there is enough information to proceed on the bug and that the severity is accurate.</li>
<li>Blocker/critical bugs need to be fixed ASAP.</li>
<li>Regressions need to be addressed during the current development cycle (on both main and maintenance branches).</li>
</ul>
When a comment is made on a bug you are watching:
<ul>
<li>Respond on the bug if necessary.</li>
<li>Adjust bug priority if necessary.</li>
</ul>
</p> 

<h2>SWT Component Areas</h2>
<table id="swtComponents" border="1">
	
</table>
</div>
<?php 
$html = ob_get_clean();

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>