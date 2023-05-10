Perintah trigger
```sh
DELIMITER $$
CREATE TRIGGER validasi_hapus
BEFORE DELETE ON login
FOR EACH ROW
BEGIN
	DECLARE row_mhs INT;
    DECLARE row_kampus INT;
    DECLARE row_industri INT;
    SELECT COUNT(*) INTO row_mhs FROM mahasiswa WHERE nim = old.username;
    SELECT COUNT(*) INTO row_kampus FROM pembimbing_kampus WHERE nip = old.username;
    SELECT COUNT(*) INTO row_industri FROM pembimbing_industri WHERE email = old.username;
    IF row_mhs > 0 OR row_kampus > 0 OR row_industri > 0 THEN
    	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cannot delete login record because there are associated mahasiswa, pembimbing_kampus, or pembimbing_industri';
    END IF;
END$$
DELIMITER ;
```