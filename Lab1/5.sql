SELECT DISTINCT NAME, TOWN
FROM DELIVERERS D, PENALTIES P
WHERE D.DELIVERERID = P.DELIVERERID;