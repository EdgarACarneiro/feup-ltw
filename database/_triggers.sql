DROP TRIGGER if exists CheckTaskDate;

BEGIN TRANSACTION;

CREATE TRIGGER CheckTaskDate
BEFORE INSERT ON Task
FOR EACH ROW
WHEN New.duedate < (SELECT date('now'))
BEGIN
    SELECT raise(rollback, "Task's duedate must be in the future");
END;

COMMIT TRANSACTION;