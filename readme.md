# Validation POO

## Lancement de la validation

### Que vous faut-il?
Il vous faudra un environnement avec :
- PHP
- MYSQL

### Récupérer ce repo
Pour récupérer ce repo, rien de plus simple :
```bash
git clone https://github.com/Jon-Akademy/validation-D6.git
```

### Récupérer la base de donnée
Commande pour récupérer la base de donnée :
```bash
mysql -u[word] -p[password] -e "create database [nom_bdd]"
mysql -u[word] -p[password] [nom_bdd] < baston.sql
```

Bien entendu, les valeurs entre [] sont remplacer par les votres.

### Configurer la BDD
Dans le fichier __/models/Database__, vous trouverez 4 constantes à remplir suivant votre configuration de mysql.


## Sujet
Une application en PHP à été commandé par un client. Malheureusement, suite à la situation actuelle, seul le stagiaire, qui s'occupe habituellement du café, était disponible.  
Après quelques tests, il s'avère que son café est meilleur que ses compétences en PHP et le code contient de nombreuses erreurs. La mise en prod étant pour savoir (oui oui, un vendredi soir), vous avez la journée pour corriger le tire.  
En plus de ça, le client vient de commander une nouvelle fonctionnalité !

Vous allez donc devoir ajouter un nouveau type de personnage : le Druide (aka "Druid").

>Le druide est un personnage vivant loin du tumulte des grandes villes, en harmonie avec la nature.
>Ainsi, le druide à 3 actions possible :  
>- Une faible chance (1/10) de soigner tous ses points de vie.
>- Une moyenne chance (3/10) d'invoquer la force de la forêt (dégt*1.5 pour 3 tour). Il ne répètera pas cette action tant qu'il est sous sont effet.
>- Une grande chance (6/10) de donner un coup de bâton.

A vous de jouer!

Bon chance!