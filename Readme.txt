
Name : Dilanga Galapita Mudiyanselage
NUID : 02592558



__________________________________________________________________________________________________________________________________


Phase 3 – PHP script and triggers

PHP implementation description

-	home page is index.php (Starting page)

-	Database connection is in DBAccess.php (USER name : "user"    Password : "passwd" )

-	Sign up link is for add new user in to database. 
	>	userRegister.php page contain html form
	>	userRegisterContraller.php contains php script with INSERT UPDATE queries. (Trigger "insert_user" executes when insert a new user) 
	
-	FAQ List link is to display all the questions asked by patients
	>	All the question in question table display with question time, title, question and patient who asked the question
	>	To view the answers related to that question, use (View Question) link

-	Question display page, shows question and related answers
	>	users can add comments (insert new answer), like (Update like count), delete question (Delete), delete answers (Delete) ect.	

- 	Search link for search several statistics and searchs.
	>	Drop down boxes are populated using db queries
	>	Each query results pop up with button press

-	Ask new Question link is for ask new question. This will insert new record into question table

-	Upload article link, forward to complete form for new article upload.

-	New triggers and procedures added to "Dilanga Galapita.txt" file. Trigger descriptions are as follows.
	> When new user added, after inserting user details, all the child tables also updates using these triggers and procedures.
	
	
TRIGGER 1

Description

- When user delete from USER table, this trigger deletes the child table's (doctor or patient) related records as well (To ensure integrity constraint). 
(Same functionality of cascade delete, using a trigger) 

- After delete the user table record, trigger executes and call for the procedure called "delete_user_proc". This procedure removes related records either in patient table or doctor table.



************ TRIGGER FOR REMOVE USER DATA ***********************
DROP TRIGGER IF EXISTS delete_user;

DELIMITER $$
CREATE TRIGGER delete_user AFTER DELETE ON user
FOR EACH ROW
BEGIN
   CALL delete_user_proc(OLD.u_id,OLD.type);
END;
$$

DELIMITER ;



************ PROCEDURE FOR REMOVE USER DATA ***********************
DROP PROCEDURE IF EXISTS delete_user_proc;

DELIMITER //

create PROCEDURE delete_user_proc(in uid CHAR(4), in type enum('patient','doctor'))
BEGIN 
IF type = 'patient' THEN
	DELETE FROM patient WHERE patient.patient_id = uid;
ELSE 
	DELETE FROM doctor WHERE doctor.doctor_id = uid;
END IF;
END//

DELIMITER ;





--------------------------------------------------------------------------------------------


TRIGGER 2

Description

- When insert a new user in to USER table, this trigger will insert new record in to doctor or patient table accordingly (To ensure integrity constraint). 

- After insert the new user in to user table, trigger executes and call for the procedure called "insert_user_proc". This procedure insert related records into either in patient table or doctor table.


************ TRIGGER FOR INSERT USER DATA ***********************

DROP TRIGGER IF EXISTS insert_user;

DELIMITER $$
CREATE TRIGGER insert_user AFTER INSERT ON user
FOR EACH ROW
BEGIN
   CALL insert_user_proc(NEW.u_id,NEW.type);
END;
$$

DELIMITER ;

************ PROCEDURE FOR INSERT USER DATA ***********************

DROP PROCEDURE IF EXISTS insert_user_proc;

DELIMITER //

create PROCEDURE insert_user_proc(in uid CHAR(4), in type enum('patient','doctor'))
BEGIN 
IF type = 'patient' THEN
	INSERT INTO patient (patient_id,type) VALUES (uid,type);
ELSE 
	INSERT INTO doctor (doctor_id,type) VALUES (uid,type);
END IF;
END//

DELIMITER ;







