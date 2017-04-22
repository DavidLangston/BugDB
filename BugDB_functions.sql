
-- employee add
insert into employee values (employee_id_seq.nextval, 'Benjamin', 'Leach', 'leachbr@vcu.edu', 'Bug Spawner', 'Broem');
insert into employee values (employee_id_seq.nextval, 'David','Langston','dlangston@vcu.edu','Bug Squasher','davidlangston');
insert into employee values (employee_id_seq.nextval, 'Elron','Hubbard','ehubbard@work.com','Bug Enthusiast','hubbard');
insert into employee values (employee_id_seq.nextval, 'Edsger','Dijkstra','edijk@work.com','Employee','pathFinder');
insert into employee values (employee_id_seq.nextval, 'Frank','Fort','ffort@work.com','Engineer','frankdog');
insert into employee values (employee_id_seq.nextval, 'Marie','Curie','mcurie@work.com','Employee','radioactive');
insert into employee values (employee_id_seq.nextval, 'Wilhelm','Rontgen','wrot@work.com','Engineer','elemental');
insert into employee values (employee_id_seq.nextval, 'Johanne','Bach','bachness@work.com','Bug Whisperer','mozartsucks');
insert into employee values (employee_id_seq.nextval, 'Kermit','Rana','ktrana@work.com','Employee','froglife');
insert into employee values (employee_id_seq.nextval, 'Satoru','Iwata','inspiration@work.com','Engineer','plumbingfun');
insert into employee values (employee_id_seq.nextval, 'Allen','Poe','apoe@work.com','Bug Whisperer','quothis');

-- projects
insert into project values (project_id_seq.nextval, 'Order_66');
insert into project values (project_id_seq.nextval, 'SETI');
insert into project values (project_id_seq.nextval, 'VCU_DB');
insert into project values (project_id_seq.nextval, 'BF3_Money');
insert into project values (project_id_seq.nextval, 'VCU_NDB');
insert into project values (project_id_seq.nextval, 'Boromere');

-- some stories thisi s irrelevant now
--insert into story values (story_id_seq.nextval, 35, 900);
--insert into story values (story_id_seq.nextval, 55, 90);
--insert into story values (story_id_seq.nextval, 1, 1024);
--insert into story values (story_id_seq.nextval, 9, 30);
--insert into story values (story_id_seq.nextval, 77, 245);
--insert into story values (story_id_seq.nextval, 83, 900);
--insert into story values (story_id_seq.nextval, 40, 46);
--insert into story values (story_id_seq.nextval, 41, 80);
--delete from story;
--insert into story values ();

--insert into bug values (bug_id_seq.nextval, sysdate, null, 8, 3, null, story_id_seq.nextval); 
--
--insert into bug values (bug_id_seq.nextval, sysdate, null, 3, 5, null, story_id_seq.nextval);
--
--delete from bug where bug_id > 1;
--delete from bug_spawn;
--delete from bug where bug_id = 1;
--(1: Butterfly, 2: Ant, 3: Cricket, 4: Blister Beetle, 5: Black Widow)
-- parent must be found BEFORE child.
insert into bug values (bug_id_seq.nextval, '31-MAR-16', null, story_id_seq.nextval, 8, 3);
insert into bug values (bug_id_seq.nextval, '6-JUNE-16', '8-JULY-16', story_id_seq.nextval, 4, 5);
insert into bug values (bug_id_seq.nextval, '8-AUG-16', null, story_id_seq.nextval, 3, 4);
insert into bug values (bug_id_seq.nextval, '6-MAY-16', '8-MAY-16', story_id_seq.nextval, 1, 4);
insert into bug values (bug_id_seq.nextval, '1-JAN-17', null, story_id_seq.nextval, 7, 2);
insert into bug values (bug_id_seq.nextval, '1-JAN-17', '5-JAN-17', story_id_seq.nextval, 9, 4);
insert into bug values (bug_id_seq.nextval, '3-JAN-17', null, story_id_seq.nextval, 3, 3);
insert into bug values (bug_id_seq.nextval, '7-FEB-17', '8-FEB-17', story_id_seq.nextval, 4, 1);
insert into bug values (bug_id_seq.nextval, '19-MAR-17', null, story_id_seq.nextval, 8, 5);
insert into bug values (bug_id_seq.nextval, '21-MAR-17', null, story_id_seq.nextval, 6, 4);
insert into bug values (bug_id_seq.nextval, '26-MAR-17', null, story_id_seq.nextval, 5, 2);

truncate table bug;
--insert into handles values ()
--insert into bug_spawn values (null, 40);
drop table bug_spawn;
exec AddEmpToProject(1040, 1000);
exec addhours(1040, 1000, 3);
exec AddEmpToProject(1040, 1010);
exec addhours(1040, 1010, 6);
exec AddEmpToProject(1040, 1020);
exec addhours(1040, 1020, 7);
exec AddEmpToProject(1040, 1030);
exec addhours(1040, 1030, 4);
exec AddEmpToProject(1040, 1040);
exec AddEmpToProject(1040, 1050);
exec addhours(1040, 1050, 18);
--delete from works;
exec AddEmpToProject(1001, 1000);
exec addhours(1001, 1000, 8);
exec AddEmpToProject(1002, 1010);
exec addhours(1002, 1010, 32);
exec AddEmpToProject(1003, 1020);
exec addhours(1003, 1020, 16);
exec AddEmpToProject(1004, 1030);
exec addhours(1004, 1030, 14);
exec AddEmpToProject(1005, 1040);
exec addhours(1005, 1040, 25);
exec AddEmpToProject(1006, 1050);
exec addhours(1006, 1050, 12);
exec AddEmpToProject(1007, 1000);
exec addhours(1007, 1000, 5);
exec AddEmpToProject(1008, 1010);
exec addhours(1008, 1010, 16);
exec AddEmpToProject(1009, 1020);
exec addhours(1009, 1020, 44);
exec AddEmpToProject(1010, 1030);
exec addhours(1010, 1030, 14);
exec AddEmpToProject(1010, 1040);
exec addhours(1010, 1040, 12);
exec AddEmpToProject(1006, 1040);
exec addhours(1006, 1040, 13);
exec AddEmpToProject(1001, 1040);
exec AddEmpToProject(1001, 1010);
exec AddEmpToProject(1001, 1020);
exec AddEmpToProject(1001, 1030);
--truncate table works;
--truncate table writes;

exec set_bug_to_project(73, 1000);
exec set_bug_to_project(74, 1010);
exec set_bug_to_project(75, 1020);
exec set_bug_to_project(76, 1030);
exec set_bug_to_project(77, 1040);
exec set_bug_to_project(78, 1050);
exec set_bug_to_project(79, 1040);
exec set_bug_to_project(80, 1040);
exec set_bug_to_project(81, 1040);
exec set_bug_to_project(82, 1020);
exec set_bug_to_project(83, 1010);


exec addnotetostory(770, 'found this little sucker, looks like hes gonna be trouble');
exec addnotetostory(770, 'tried to fix with constraint check, no go!');
truncate table notes;
truncate table commit_log;
truncate table communications;

delete from employee where E_ID = 1020;
--delete from works;
-- create bug then add to HANDLES for a given project_id


-- create project, then bug, then story


-- find everyone working on a project
 

-- find everyone writing to a story


-- find all employees
select first_name as "First Name", last_name as "Last Name" 
from employee;

-- list all bugs for a given PID

-- find all bugs without parent, join to display project
select child_id as "Parent-less", bug.difficulty as "Level" 
from bug_spawn join bug 
on bug_spawn.parent_id = bug.parent
where bug_spawn.parent_id is null;
-- list all project names

-- updates comments



