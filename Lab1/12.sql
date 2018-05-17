SELECT SUM(NUMDELIVERIES), SUM(NUMCOLLECTIONS)
FROM COMPANYDEL
WHERE DELIVERERID IN (SELECT DELIVERERID
                          FROM DELIVERERS
                          WHERE TOWN <> 'Stratford' AND NAME LIKE 'B%')