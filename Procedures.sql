-- triggers

-- delete employee should remove works


--create or replace trigger bug_add

-- add hours for an employee for a given project
create or replace procedure AddHours (
  work_hours in works.hours%type, emp in employee.e_id%type, proj in project.p_id%type)
  is 
  begin
    update works set hours = hours + work_hours
    where e_id = emp and pro_id = proj;
  end AddHours;
  /


create or replace procedure AddEmpToProject (
  emp in employee.e_id%type, proj in project.p_id%type)
  is
  begin
    insert into works (e_id, pro_id) values (emp, proj);
end;
/
-- when remove bug remove from handles
--create or replace trigger bug_handle_remove (
  
--)

ALTER SESSION SET PLSCOPE_SETTINGS = 'IDENTIFIERS:NONE';
create or replace trigger bug_handle_add
after insert on Bug
for each row
declare
begin
insert into bug_spawn values (null, :new.bug_id);
end;
/
ALTER SESSION SET PLSCOPE_SETTINGS = 'IDENTIFIERS:ALL'; 


--drop trigger bug_handle_add;
-- can find all children without parents.
-- deleting bugs in bug spawn
ALTER SESSION SET PLSCOPE_SETTINGS = 'IDENTIFIERS:NONE';
create or replace trigger bug_handle_delete
after delete on Bug
for each row begin
delete from bug_spawn where child_id = :new.bug_id;
end;
/
ALTER SESSION SET PLSCOPE_SETTINGS = 'IDENTIFIERS:ALL';


drop trigger bug_handle_delete;

create or replace trigger bug_make_story
before insert on Bug
for each row begin
if inserting 
then
--insert into Bug_Spawn values (1, :new.bug_id);
insert into Story values (1, null, :new.story_id);
insert into Notes values (:new.story_id, null);
insert into Commit_Log values (:new.story_id, null);
insert into Communications values (:new.story_id, null);
end if;
end;
/
drop trigger bug_make_story;


