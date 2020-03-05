<?php
	session_start();
        include_once('../core/protect.php');
?>
<ul id="source-list"><!-- Main navigation to select different parts of the application -->
	<!-- <li id="_helpGraphs"<?php if($active == 'graphs-and-charts') { echo ' class="active"'; } ?>><a href="../graphs-and-charts">Graphs and Charts</a></li> -->
	<li id="_helpStaff"<?php if($active == 'staff-members') { echo ' class="active"'; } ?>><a href="../staff-members">Staff Members</a></li>
	<li id="_helpModules"<?php if($active == 'current-modules') { echo ' class="active"'; } ?>><a href="../current-modules">Current Modules</a></li>
	<li id="_helpAdmin"<?php if($active == 'admin-tasks') { echo ' class="active"'; } ?>><a href="../admin-tasks">Admin Tasks</a></li>
	<li id="_helpResearch"<?php if($active == 'research-duties') { echo ' class="active"'; } ?>><a href="../research-duties">Research Duties</a></li>
</ul>

<p>
	&nbsp;&nbsp;&nbsp;
	<input type="checkbox" id="helpSwitch" onclick="javascript:ajaxShow('../../core/helpSys.php','helping_system','');"/>
	Enable Help Tool-tips
</p>
<p>
	&nbsp;&nbsp;&nbsp;
	<input type="checkbox" id="mailSwitch" onclick="javascript:ajaxShow('../../core/mailSys.php','mail_system','');"/>
	Send E-mail Notifications
</p>

<p>
	&nbsp;&nbsp;&nbsp;
	<a href="../../core/changePwd.php" id="_helpChangePwd">Change Password</a>
</p>

<div id="helping_system">
</div>

<div id="mail_system">
</div>
