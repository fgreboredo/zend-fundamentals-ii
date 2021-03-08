DROP PROCEDURE IF EXISTS phpcourse.createCustomer;
DELIMITER $
CREATE PROCEDURE phpcourse.createCustomer(
    p_firstname varchar(32),
    p_lastname varchar(32)
)
BEGIN
INSERT INTO customers(firstname, lastname) VALUES (p_firstname, p_lastname);
END
$
DELIMITER ;