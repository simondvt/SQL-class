create user ori0n identified by ori0nPC
default tablespace USERS QUOTA UNLIMITED ON USERS;
grant create session, create sequence, create table, create view,
create materialized view, create trigger,plustrace,
query rewrite to ori0n;
commit;