# Progetto-LTW-2023
Progetto LTW 2023 prof Rosati

Colore scelto : verde scuro rgb(7, 70, 33)
Colore Sfondo : Bianco Panna #FEFFE1 


Form composto da :
Nome
Cognome
Data di Nascita
Sesso
Email
Password 
Conferma Password

TODO :

Select Bar Border

Select bar with flags :
https://mojoaxel.github.io/bootstrap-select-country/index.html

Captcha :
https://www.makeuseof.com/captcha-validation-html-css-javascript/

Modificare i bottoni con una tabella composta da una riga ?????

Cambiare il Colore del Bottone quando mi trovo nella pagina 

Bottone Reading list

Bottone Social :
    ogni utente può postare una pseudo recensione di un libro o un sondaggio
    
Modificare Allineamento del bottone e del remember me

Dark Mode & Light Mode

Una volta che un utente ha effettuato il login il pulsante "login" diventa il pulsante "Profile" dove può accedere e modificare il proprio profilo.
Quando viene effettuato il Logout il pulsante ritorna alla modalità "Login"

#6d2d8d

git add .
git commit -m
git pull
merge 
git push

DataBase:

-host : localhost
-dbname : ReadersListDB
-password : postgres
-user : postgres
-port : 5432

create table Utente(
	nome varchar(40) not null,
	cognome  varchar(40) not null,
	birth Date not null,
	sex char(1) not null,
	nazionalita varchar(40) not null,
	username varchar(40),
	email varchar(40),
	passw varchar(40),
	primary key(username,email,passw)
)







da completare jquery , formattazione tabella reading list