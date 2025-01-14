create user iitb with password 'koba3455$';
alter role iitb with createdb;
create database iitb owner=iitb ENCODING = 'UTF8' LC_COLLATE = 'ja_JP.utf8' LC_CTYPE = 'ja_JP.utf8' TEMPLATE = template0;