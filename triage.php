<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>SWT Bug Triage</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css" type="text/css">
    <link rel="stylesheet" href="swt.css" type="text/css">
    <link rel="shortcut icon" href="http://www.eclipse.org/images/eclipse.ico" type="image/x-icon">
</head>
<body bgcolor="#ffffff" text="#000000">
<table width="875px" class="swtpage">
<colgroup><col width="125px"><col width="750px"></colgroup>
<tr><?php include "sidebar.php"; ?>
<td valign="top" style="padding: 10px"><h1 style="padding: 0; margin: 0; border-bottom: 1px solid #000000;">SWT Bug Triage</h1>
<h2>SWT Bug Triage Procedure</h2>
<p>Early in the 3.6 planning cycle, we have decided to revamp the SWT bug triage system. Up until now, our triage
consisted of directly assigning bugs to the component owners. Over time this led to each committer owning a huge number
of bugs which not only gives the mistaken impression that they are actively working on solving all of those bugs but also makes it
difficult for members of the community to identify which bugs are available for contribution. The Platform UI team has changed their 
triage process earlier in the year and we have decided to adopt their process.</p>
<p>The new SWT triage process is as follows:
<ul>
<li>Bugs come in to platform-swt-inbox@eclipse.org</li>
<li>If the bug has sufficient information in it to proceed, the persone performing the triage:
<ul>
<li>Prepends the component area of the bug in the Summary field.</li>
<li>Adds the primary component owner as the main QA contact.</li>
<li>Adds the secondary owner to the CC field.</li>
<li>Reassigns the bug to the swt-triaged@eclipse.org box.</li>
</ul>
</li>
<li>Committers assign the bugs that they are actively working on to themselves.</li>
</ul>
</p> 
<h2>SWT Component Areas</h2>
<table id="swtComponents" border="1">
	<tbody>
		<tr>
			<th>
				<h3>Component</h3>
			</th>
			<th>
				<h3>Description</h3>
			</th>
			<th>
				<h3>Owner</h3>
			</th>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[PI]')">Platform Interface (PI)</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>GTK - SSQ, FH</li>
						<li>Carbon - SSQ, FH</li>
						<li>Cocoa - SSQ, FH</li>
						<li>Motif - SSQ, FH</li>
						<li>Photon - RD, SSQ, FH</li>
						<li>Win32 - SSQ, FH</li>
						<li>WPF - SSQ, FH</li>
					</ul> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[Graphics]')">Graphics</a>
				]
				</div>
			</td>
			<td>
				All graphics issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>GTK - SSQ, BG, FH</li>
						<li>Carbon - SSQ, FH</li>
						<li>Cocoa - KB, SSQ, FH</li>
						<li>Motif - SSQ, FH</li>
						<li>Photon - RD, SSQ</li>
						<li>Win32 - SSQ, FH</li>
						<li>WPF - FH, SSQ, KB</li>
					</ul> 
				</div>
			</td>
		</tr>	
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[Theme]')">Theme</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>GTK - SSQ, BG</li>
						<li>Carbon - SSQ, KB</li>
						<li>Cocoa - SSQ, KB</li>
						<li>Motif - SSQ, BG</li>
						<li>Photon - RD, SSQ</li>
						<li>Win32 - SSQ, FH</li>
						<li>WPF - SSQ, KB</li>
					</ul> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[Accessibility]')">Accessibility</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>GTK - CM, GG</li>
						<li>Carbon - CM, SSQ</li>
						<li>Cocoa - SK, CM</li>
						<li>Motif - CM, SSQ</li>
						<li>Photon - RD, CM</li>
						<li>Win32 - CM, GG</li>
						<li>WPF - CM, KB</li>
					</ul> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('Printing')">Printing</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>GTK - CM, FH</li>
						<li>Carbon - CM, SSQ</li>
						<li>Cocoa - KB, SSQ</li>
						<li>Motif - CM, SSQ</li>
						<li>Photon - RD, CM</li>
						<li>Win32 - CM, SSQ</li>
						<li>WPF - CM, KB, FH</li>
					</ul> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[DND]')">Drag and Drop</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>GTK - KB, BG</li>
						<li>Carbon - KB, SSQ</li>
						<li>Cocoa - SK, KB</li>
						<li>Motif - KB, SSQ</li>
						<li>Photon - RD, SSQ</li>
						<li>Win32 - KB, FH</li>
						<li>WPF - KB, FH</li>
					</ul> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[Widgets]')">Widgets</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>GTK - BG, SSQ</li>
						<li>Carbon - SSQ, FH</li>
						<li>Cocoa - GG, KB, SSQ</li>
						<li>Motif - BG, SSQ, FH</li>
						<li>Photon - RD, SSQ</li>
						<li>Win32 - FH, SSQ</li>
						<li>WPF - KB, FH, SSQ</li>
					</ul> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[Custom]')">Custom Widgets</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>All - CM, SSQ</li>
					</ul> 
				</div>
			</td>
		</tr>		
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[WinCE]')">WinCE</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>Win32 - FH, SSQ</li>
					</ul> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[OpenGL]')">OpenGL</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>GTK - BG, SSQ</li>
						<li>Carbon - SSQ, KB</li>
						<li>Cocoa - KB, SSQ</li>
						<li>Motif - BG, SSQ</li>
						<li>Photon - RD, SSQ</li>
						<li>Win32 - FH, SSQ</li>
						<li>WPF - KB, SSQ</li>
					</ul> 
				</div>
			</td>
		</tr>	
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[Program]')">Program</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>GTK - BG, SSQ</li>
						<li>Carbon - SSQ, KB</li>
						<li>Cocoa - GG, KB</li>
						<li>Motif - BG, SSQ</li>
						<li>Photon - RD, SSQ</li>
						<li>Win32 - FH, SSQ</li>
						<li>WPF - KB, SSQ</li>
					</ul> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[OLE]')">OLE/Active X</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>Win32 - FH, SSQ</li>
					</ul> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[Browser]')">Browser</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>GTK - GG, SSQ</li>
						<li>Carbon - GG, SSQ</li>
						<li>Cocoa - GG, SSQ</li>
						<li>Motif - GG, SSQ</li>
						<li>Photon - RD, GG, SSQ</li>
						<li>Win32 - GG, SSQ</li>
						<li>WPF - GG, FH</li>
					</ul> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[AWT/Swing')">SWT/AWT - Swing</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>GTK - SSQ, FH</li>
						<li>Carbon - SK, SSQ</li>
						<li>Cocoa - SK, KB, SSQ</li>
						<li>Motif - SSQ, FH</li>
						<li>Photon - RD, SSQ</li>
						<li>Win32 - SSQ, FH</li>
						<li>WPF - KB, SSQ, FH</li>
					</ul> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[I18N]')">Internationalization</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>GTK - FH, SSQ</li>
						<li>Carbon - FH, SSQ</li>
						<li>Cocoa - FH, KB</li>
						<li>Motif - FH, SSQ</li>
						<li>Photon - RD, SSQ</li>
						<li>Win32 - FH, SSQ</li>
						<li>WPF - FH, KB</li>
					</ul> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[StyledText]')">Styled Text</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>All - FH, SSQ</li>
					</ul> 
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[Image]')">Image Loading</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>All - CM, SSQ</li>
					</ul> 
				</div>
			</td>
		</tr>	
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[Layout]')">Layout</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>All - CM, SSQ</li>
					</ul> 
				</div>
			</td>
		</tr>	
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[Examples]')">Examples</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>All - CM, FH</li>
					</ul> 
				</div>
			</td>
		</tr>	
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[Snippets]')">Snippets</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>All - CM, FH</li>
					</ul> 
				</div>
			</td>
		</tr>	
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[JUnit]')">JUnit</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>All - CM, GG</li>
					</ul> 
				</div>
			</td>
		</tr>	
		<tr>
			<td>
				<div id="component">
				[
				<a href="javascript:viewBugsWithSummary('[64]')">64 bit</a>
				]
				</div>
			</td>
			<td>
				All bugs that concern native library issues.
			</td>
			<td>
				<div class="owner">
					<ul>
						<li>GTK - GG, SSQ, BG</li>
						<li>Carbon - GG, SSQ, KB</li>
						<li>Cocoa - GG, SSQ, KB</li>
						<li>Win32 - GG, FH, SSQ</li>
						<li>WPF - GG, KB, SSQ</li>
					</ul> 
				</div>
			</td>
		</tr>	
			
	</tbody>
</table>
</table>
</body>
</html>