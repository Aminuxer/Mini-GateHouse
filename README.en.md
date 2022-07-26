# Mini-GateHouse
Minimalistic web-system for logging visitors and cars by em-marine / mifare pre-configured number's tickets.

<img src="https://img.icons8.com/emoji/24/000000/russia-emoji.png"/> [описание на русском](https://github.com/Aminuxer/Mini-GateHouse/blob/main/README.md)

![Mini-GateHouse-en](https://user-images.githubusercontent.com/13812192/177328156-1e1c21c3-816e-4ff8-8279-5a6919ddb59f.png)

For guest / single / excursuion access to company area often em-marine / mifare numbered card used, but existing system don't
firt for input data in free form.
This software replacing paper visitors journal in gatehouse and made simple and minimalistic for usage by security guards without
long time learning.
This prevent journal loss and usage so complex programs like Excel / Libreoffice Calc.

## Setup and system requrement

0). Prepare minimal Web-server with PHP and MySQL support
This manual for example:

https://profitserver.net/knowledge-base/web-server-setup-linux

Any hardwre requrements - where mini-web-server can start. From software recommended Linux / BSD actual version, nginx, php8, mysql
At PHP5 and PHP7 also must work. Windows also possibe, but not tested.

1). Copy content of  www from archive to web-host directory.

2). Restore from `gatehouse.sql` database gatehouse dump.
If your need example records, execute script
`gatehouse-example_data.sql`

For restore english-language default values of parameters execute script
`gatehouse_english_options.sql`

3). Create mysq-user and assign access rights:

`CREATE USER 'gatehouse'@'localhost' IDENTIFIED BY 'gatehousepassword';`

`GRANT SELECT,UPDATE,INSERT,DELETE ON gatehouse.* TO 'gatehouse'@'localhost';`

Your can also revoke DELETE, this permission need only for delete operators.
Recommnded generate strong random password.

4). Edit config `www/options.php`
on server and check data from step 3 for corrct connect to database.

Set variable `$db_add_rnd_key` in config to long random string.

Set interface language with `localization` variable from list.

Pull requests with new localizations files are welcome.

5). Open web-server page in browser and try login with empty passwords
under this logins:
root
admin
user
readonly

At first login password will be forcible changing.

## Usage
Setting password to all users, create new users if need.
At to guards computers start page / bookmark, notify staff about his passwords.

Key idea - data writes once, and after close recors security guards can't corrupt any data.

## Why this written ??!
Paper journal can be loss or damaged. Excel file with read-write file sharing access (ex NFS or Samba) so vulnerable
for viruses or inaccurate manipulation in table file.

This system sove this issue.

##  FAQ
* Why is Excel / paper / txt-file ?
  - This strage can be damaged by bad hands.
  - Excel don't need, no bad dependencies on client PC..

* Can by used on mobile device ?
  - Yes

* How long used ?
  - 15 years =)

* What roles of default users ?
  - 4 differenr roles user created. root - main admin, manage logins and options, admin - view archibe and edit options, user - edit data for N last days, readonly - only view for last day.
    Integrated mini-help present.

* Will be future develop ?
  - Small chance. But your can create issue about bug / vulnerability.

* Why WEB ?
  - Web is really cross-platform. Guards can work
    from any devices and cannot damage existeng archive records.

* Can be user on many gatehouses ?
  - Yes, create different logins for each gatehouse or host new instance.

* Does need database service ?
  - Not requred. Your can delete old records by `Adminer` from two tables.

* I want new version.
  - Button [Fork].
