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
  
