SELECT DISTINCT DELIVERERID
FROM PENALTIES
WHERE AMOUNT = 25 AND DELIVERERID IN
(SELECT DELIVERERID FROM PENALTIES WHERE AMOUNT = 30);