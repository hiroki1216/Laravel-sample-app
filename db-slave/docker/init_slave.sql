GRANT REPLICATION SLAVE ON *.* TO 'ro_mysql_user'@'%';
GRANT REPLICATION CLIENT ON *.* TO 'ro_mysql_user'@'%';
GRANT SELECT ON *.* TO 'ro_mysql_user'@'%';
GRANT REPLICATION_SLAVE_ADMIN, GROUP_REPLICATION_ADMIN, BINLOG_ADMIN ON *.* TO 'ro_mysql_user'@'%';
FLUSH PRIVILEGES;