CREATE TRIGGER  tr_ins_char
BEFORE INSERT ON customer1
FOR EACH ROW
SET NEW.c_username = UPPER(NEW.c_username);