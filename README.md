<p align="center"><img src="https://user-images.githubusercontent.com/34022590/110831083-928da000-82a2-11eb-801e-bcf827570d18.png" width="300px"></p>

<h1 align="center">
    <strong>Eesti reisijuht / Estonian Travel Guide</strong>
</h1>
<h3 align="center">
    <p>Põnevaid paiku mida Eestis avastada</p>
    <p>Interesting places to visit in Estonia</p>
</h3>

|<h2>Lehelt võib leida</h2>|<h2>Page contents</h2>|
|-|-|
|* *Kaarti, mille huvipunktidele hiirega liikudes kuvatakse punkit nimi*
* *Maakonnanupud millel klikkides kuvatakse vastava maakonna huvipunktid infokaartidena nuppude alla*
* *Pealehel kuvatakse kolm juhuslikku huvipunkti andmebaasist*
* *Infokaartid sisaldavad ühde pilti, punkti nime, maakonna nime, lühitutvustust, ja google maps linki*
* *Võimalus kuvada ka google kaart iga infotahvli alla - hetkel välja kommenteeritud*|
* *Button for each county in Estonia*
* *Main page will display 3 random place of interest*
* *Info cards with photo, name and short description*
* *Opitionally can display map on every info card*|

|* *Maakonnanupud millel klikkides kuvatakse vastava maakonna huvipunktid infokaartidena nuppude alla*|* *Button for each county in Estonia*|
|* *Pealehel kuvatakse kolm juhuslikku huvipunkti andmebaasist*|* *Main page will display 3 random place of interest*|
|* *Infokaartid sisaldavad ühde pilti, punkti nime, maakonna nime, lühitutvustust, ja google maps linki*|* *Info cards with photo, name and short description*|
|* *Võimalus kuvada ka google kaart iga infotahvli alla - hetkel välja kommenteeritud*|* *Opitionally can display map on every info card*|

```
/* echo$row['iframe']; */			// google kaart - google map
```
* *Välislingid põnevatele Eestimaad tutvustavatele lehtedele/Links to other Estonian travel guides*
* *Kontaktivorm/Contact form*


## Kasutatud vahendid/Techniques used
* *HTML*
* *CSS*
* *Bootstrap*
* *JavaScript*
* *PHP*
* *SQL*

### Port 3306 konflikti korral/On port 3306 conflict 
1. Vahetada port 3307 vastu 'my.ini' failis:\
Change port to 3307 in 'my.ini' file:\
XAMPP > MySQL > Config > my.ini port 3306 -> 3307

2. 'config.inc' failis:\
in 'config.inc' file:\
xampp\phpMyAdmin\config.inc:
$cfg['Servers'][$i]['port'] = '3307';

3. Lisada sql ühendusstringile pordi number(3307)\
Add port number(3307) to connection string
```
$conn = mysqli_connect($servername, $username, $password, $dbname, 3307);
```

### Eesti tähestiku konflikt/On conflict with estonian alphabet
Juhul kui andmebaasi päringul tekib eesti tähtedega konflikt./If there is a conflict on database query.\
Seada ühendusele 'UTF-8' formaat./Set 'UTF-8' format to connection.
```
$conn -> set_charset("utf8");
```

### Kui mõnel juhul kuvab 'index.php' lehel vaid 2 huvipunkti/If sometimes only 2 points of interests are displayed on main page
Võib seada järgnevad muutujad näiteks nii:/Fastest way to correct it would set:
```
$first = rand(1, 44);       ->      $first = rand(1, 20);
$second = rand(1, 44);      ->      $second = rand(21, 40);
$third = rand(1, 44);       ->      $third = rand(41, 56);
```
