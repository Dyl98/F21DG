<?php
	session_start();
        include_once('../../core/protect.php');
?>
<div id="dynamic-column">
	<div id="backbar">
		
	</div>
	<div id="toolbar">
		<ul class="toolbar-buttons"><!-- Typed in reverse display order for window resizing fix -->
			<li id="_helpLogout" class="red-button"><a href="../../core/logout.php">Logout</a></li>
			<li id="_helpAdd"><a href="add.php">Add New Staff Member</a></li>
			<li><a href="http://www.macs.hw.ac.uk/cs/CS_Management_System/cgi-bin/getWorkload.pl?topic=admin">Admin Text List</a></li>
			<li><a href="http://www.macs.hw.ac.uk/cs/CS_Management_System/cgi-bin/getWorkload.pl?topic=course">Courses Text List</a></li>
			<li><a href="http://www.macs.hw.ac.uk/cs/CS_Management_System/cgi-bin/getWorkload.pl?topic=research">ResearchText List</a></li>

		</ul>
	</div>
	<div id="timebar">
		<ul class="timebar-buttons"><!-- Time based filter buttons to show specific parts of the academic year -->
			<li class="label">Show:</li>
			<li id="_help-show-all" class="active"><a href="#">Full Academic Year</a></li>
			<li class="label">|</li>
			<li id="_help-show-1"><a href="#">1st Semester</a></li>
			<li id="_help-show-2"><a href="#">Christmas Break</a></li>
			<li id="_help-show-3"><a href="#">2nd Semester</a></li>
			<li id="_help-show-4"><a href="#">Easter Break</a></li>
			<li id="_help-show-5"><a href="#">3rd Semester</a></li>
		</ul>
	</div>
	<div id="content"><!-- Main content area where all information is displayed -->
		<div class="column-headers"><!-- Column headers -->
			<span class="staff-row-name">Name</span>
			<span class="staff-row-email">E-Mail</span>
			<span class="staff-row-workload">Workload</span>
		</div>
		<!-- Call function from controller.php -->
		<?php show_staff_members(); ?>
	</div>
</div>
