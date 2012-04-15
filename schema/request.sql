CREATE TABLE /*_*/requestaccount_request (
  rar_id int NOT NULL AUTO_INCREMENT ,
  rar_name varbinary(255) NOT NULL ,
  rar_email tinyblob NOT NULL ,
  rar_email_authenticated binary(14) NOT NULL ,
  rar_email_token binary(32) NOT NULL ,
  rar_expires binary(14) NOT NULL ,
  rar_ip varchar(255) NULL ,
  rar_comment mediumblob NULL ,
  rar_status varchar(45) NOT NULL DEFAULT 'New' ,
  rar_date binary(14) NOT NULL DEFAULT '19700101000000' ,
  rar_reserved int NOT NULL DEFAULT 0 ,
  rar_useragent varchar(255) NULL ,
  rar_xff varchar(255) NULL ,
  PRIMARY KEY (`rar_id`)
) /*$wgDBTableOptions*/;
