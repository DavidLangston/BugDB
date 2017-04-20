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
  
-- when remove bug remove from handles
--create or replace trigger bug_handle_remove (
  
--)

create or replace trigger bug_handle_add
after insert or update of parent on Bug
for each row begin
if inserting
then
insert into bug_spawn (parent_id, child_id) values (:new.parent, :new.bug_id);
end if;
if updating
then
insert into bug_spawn (parent_id, child_id) values (:new.parent, :new.bug_id);
end if;
end;
/
-- can find all children without parents.
-- deleting bugs in bug spawn
create or replace trigger bug_handle_delete
after delete on Bug
for each row begin
delete from bug_spawn where parent_id = :new.parent or child_id = :new.bug_id;
end;
/



drop trigger bug_handle_delete;

create or replace trigger bug_parent_remove_children
before delete on Bug
begin
  for someRow in (select parent
                  from Bug
                  where parent = bug_id)
  loop
    update Bug 
    set parent = null
    where parent = someRow.parent;
  end loop;
end;
/
drop trigger bug_parent_remove_children;

create or replace trigger bug_make_story
after insert on Bug
for each row begin
if inserting 
then
insert into Story values (:new.story_id, 1, null);
insert into Notes values (:new.story_id, null);
insert into Commit_Log values (:new.story_id, null);
insert into Communications values (:new.story_id, null);
end if;
end;
/





