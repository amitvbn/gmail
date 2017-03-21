<?php
Table Schema

1. Users : user_id, name, email, password,

CREATE TABLE `users` (
    `id`    int(10)     unsigned NOT NULL AUTO_INCREMENT,
    `name`  varchar(70)          NOT NULL,
    `email` varchar(70)          NOT NULL,
    `password` varchar(70)          NOT NULL,    
    PRIMARY KEY (`id`)
);

2. mails: mail_id, from, subject, mail_body, conversation_id(parent id), timestamp, attachment_ids, draft, sent_trash.

CREATE TABLE `mails` (
    `id`    int(10)     unsigned NOT NULL AUTO_INCREMENT,
    `from`  varchar(70)          NOT NULL,
    `subject` varchar(70)     ,
    `body` text          ,  
    `conversation_id`  int(10)          NOT NULL,
    `timestamp` varchar(70)     ,
    `attachment_ids`  varchar(70)         ,
    `draft`  int(10)          NOT NULL,
    `sent_trash` varchar(70),
    PRIMARY KEY (`id`)
);

3. receivers:  mail_id, to, read, trash.

CREATE TABLE `receivers` (
    `id`    int(10)     unsigned NOT NULL AUTO_INCREMENT,
    `mail_id`  int(10)          NOT NULL,
    `to` varchar(70)     ,
    `trash` varchar(70),
    `read` varchar(70),
	`timestamp` varchar(70)     ,    
    PRIMARY KEY (`id`)
);

4. attachement: attachment_id, name, path, size. 

CREATE TABLE `attachements` (
    `id`    int(10)     unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(70)     ,
    `path` varchar(70),
    `size` int(70),
	`timestamp` varchar(70)     ,    
    PRIMARY KEY (`id`)
);

controller:

Login: POST
Logout: POST/GET

Inbox: GET
Sent: GET
Trash: GET
Draft: GET
Compose: POST (Send or Draft)
Delete: Get
Read: Get

To do

send item delets later

similar

mails draft,sent

receivers, Inbox, Trash

Compose
Inbox
Sent Mail
Draft
Trash