
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

-- some stories
insert into story values (story_id_seq.nextval, 35, 900);
insert into story values (story_id_seq.nextval, 55, 90);
insert into story values (story_id_seq.nextval, 1, 1024);
insert into story values (story_id_seq.nextval, 9, 30);
insert into story values (story_id_seq.nextval, 77, 245);
insert into story values (story_id_seq.nextval, 83, 900);
insert into story values (story_id_seq.nextval, 40, 46);
insert into story values (story_id_seq.nextval, 41, 80);
delete from story;
--insert into story values ();

insert into bug values (bug_id_seq.nextval, sysdate, null, 8, 3, null, story_id_seq.nextval); 

insert into bug values (bug_id_seq.nextval, sysdate, null, 3, 5, null, story_id_seq.nextval);

delete from bug where bug_id = 1;
delete from bug_spawn;
--delete from bug where bug_id = 1;



-- create project, then bug, then story


-- find everyone working on a project

-- find all employees

-- list all bugs for a given PID

-- list all project names

-- updates comments



