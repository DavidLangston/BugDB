-- triggers

-- delete employee should remove works


--create or replace trigger bug_add

-- add hours for an employee for a given project
create or replace procedure AddHours (
   emp in employee.e_id%type, proj in project.p_id%type, work_hours in works.hours%type)
  is 
  begin
    update works set hours = hours + work_hours
    where e_id = emp and pro_id = proj;
  end AddHours;
  /

create or replace procedure set_bug_to_project (
  bug in bug.bug_id%type, proj in project.p_id%type)
  is
  begin
    insert into handles (bug, project_id) values (bug, proj);
end;
/

create or replace procedure AddNoteToStory (
  story in story.story_id%type, note in varchar2)
  is
  begin
  insert into notes (story_id, note) values (story, note);
end;
/

create or replace procedure AddGitToStory (
  story in story.story_id%type, comm_id in varchar2)
  is
  begin
  insert into commit_log (story_id, bug_commit) values (story, comm_id);
end;
/

create or replace procedure AddCommunToStory (
  story in story.story_id%type, talk in varchar2)
  is
  begin
  insert into communications (story_id, comm_log) values (story, talk);
end;
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

-- when adding employee add them to writes for each bug in project
create or replace trigger emp_writes_to_story
after insert on works
for each row
declare
begin
insert into writes (e_id, story_id) 
  select :new.e_id, b.story_id
    from bug b join handles h
    on b.bug_id = h.bug
    where h.project_id = :new.pro_id;
end;
/


create or replace procedure add_writes_to (
  emp in employee.e_id%type, wrto in story.story_id%type)
  is
  begin
    insert into writes (e_id, story_id) values (emp, wrto);
end;
/


--drop trigger bug_handle_add;
-- can find all children without parents.
-- deleting bugs in bug spawn
ALTER SESSION SET PLSCOPE_SETTINGS = 'IDENTIFIERS:NONE';
create or replace trigger bug_handle_delete
before delete on Bug
for each row begin
delete from bug_spawn where child_id = :old.bug_id;
end;
/
ALTER SESSION SET PLSCOPE_SETTINGS = 'IDENTIFIERS:ALL';

create or replace trigger emp_delete_works
before delete on Employee
for each row begin
delete from works where e_id = :old.e_id;
end;
/


drop trigger bug_handle_delete;

create or replace trigger bug_make_story
before insert on Bug
for each row begin
if inserting 
then
--insert into Bug_Spawn values (1, :new.bug_id);
insert into Story values (1, 1, :new.story_id);
--insert into Notes values (:new.story_id, 'initial note');
--insert into Commit_Log values (:new.story_id, 'init commit');
--insert into Communications values (:new.story_id, 'communications opened');
end if;
end;
/
drop trigger bug_make_story;

-- get total project hours





