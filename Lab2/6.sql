SELECT DELIVERERID, NAME
FROM DELIVERERS D
WHERE
(SELECT COUNT(*) FROM PENALTIES P WHERE P.DELIVERERID = D.DELIVERERID AND P.DATA >= TO_DATE('1/1/1980', 'DD/MM/YYYY') AND P.DATA <= TO_DATE('31/12/1980', 'DD/MM/YYYY'))
>
(SELECT COUNT(*) FROM PENALTIES P WHERE P.DELIVERERID = D.DELIVERERID AND P.DATA >= TO_DATE('1/1/1981', 'DD/MM/YYYY') AND P.DATA <= TO_DATE('31/12/1981', 'DD/MM/YYYY'));