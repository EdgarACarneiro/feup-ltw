DROP TRIGGER if exists CheckTaskDate;
CREATE TRIGGER CheckTaskDate
BEFORE INSERT ON Task
FOR EACH ROW
WHEN NEW.duedate < (SELECT date('now'))
BEGIN
    SELECT raise(rollback, "Task's duedate must be in the future");
END;
