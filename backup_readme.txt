
# Backup
sudo docker exec CONTAINER /usr/bin/mysqldump --no-data -u root --password=123456 test > backup.sql

# Restore
sudo su
cat backup.sql | docker exec -i CONTAINER /usr/bin/mysql -u root --password=123456 test
