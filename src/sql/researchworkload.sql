select   S.name as staff_name, weighting as weight, R.name as duty, researchtype as type, 
SUBSTRING(description, LOCATE(' ', description) ) as description
from csm.staff_short S, csm.research_duties R, csm.research_duties_xref as D
WHERE S.staffid = D.staffid and D.researchid = R.researchid
order by S.name;
