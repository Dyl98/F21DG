select   S.name, code, C.name, percentage , C.weighting, if (availability1 , "S1", " ") as S1, if (availability3 , "S2", " ") as S2
from csm.staff_short S, csm.current_modules_xref M, csm.current_modules C
WHERE S.staffid = M.staffid and M.moduleid = C.moduleid
order by S.name;
