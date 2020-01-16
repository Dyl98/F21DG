#!/usr/bin/perl --

use CGI qw/:standard/;
use File::Copy;
use POSIX;

$subject = param("topic");
$filename = $subject."workload.txt";

#OUTPUT HTML HEADER
#print header();
#print "Content-type:text/html\r\n\r\n";
print "Content-Dtype:application/octet-stream;name = \"$filename\"\r\n";
print "Content-Disposition: attachment; filename = \"$filename\"\r\n\n";


# SET UP TIME AND DATE INFO
@times = localtime;
$epochtime = time;

$datime = POSIX::strftime("%T on %a %b %e", @times);
$datime .= " [$epochtime]";
#print "Workload " . $datime . "\n";


$dir  = '/var/www/html/macs/cs/CS_Management_System/';
$infile= $dir.$filename;
$systemname = "/var/www/html/macs/cs/CS_Management_System/scripts/getworkloadscript.sh $subject";
$result = system $systemname;
open (FILE, "< $infile") or die "file opening problem";
  	while (<FILE>) {
	print "$_\n";
		#print "$_<br/>\n";

	}

close  FILE;
 
exit;
