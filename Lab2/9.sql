SELECT DELIVERERID
FROM COMPANYDEL
WHERE DELIVERERID <> 57
MINUS
SELECT DELIVERERID
FROM COMPANYDEL 
WHERE COMPANYID NOT IN (SELECT COMPANYID FROM COMPANYDEL WHERE DELIVERERID = 57);