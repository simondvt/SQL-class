SELECT DELIVERERID, NAME, INITIALS
FROM DELIVERERS
WHERE DELIVERERID NOT IN
(SELECT DELIVERERID FROM PENALTIES);