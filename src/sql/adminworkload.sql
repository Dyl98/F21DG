select   S.name as staff_name, A.name as task,  weighting as weight
from csm.staff_short S, csm.admin_tasks A, csm.admin_tasks_xref T
WHERE S.staffid = T.staffid and T.adminid = A.adminid
order by S.name;
