-- DROP TRIGGER if exists CheckTaskDate;
-- CREATE TRIGGER CheckTaskDate
-- BEFORE INSERT ON Task
-- FOR EACH ROW
-- WHEN NEW.duedate < (SELECT date('now'))
-- BEGIN
--     SELECT raise(rollback, "Task's duedate must be in the future");
-- END;

DROP TRIGGER if exists DeleteUserTask;
CREATE TRIGGER DeleteUserTask
BEFORE DELETE ON Task
FOR EACH ROW
BEGIN
    DELETE FROM UserTask WHERE UserTask.task_id = OLD.task_id;
END;

DROP TRIGGER if exists DeleteItem;
CREATE TRIGGER DeleteItem
BEFORE DELETE ON Task
FOR EACH ROW
BEGIN
    DELETE FROM Item WHERE Item.task_id = OLD.task_id;
END;
