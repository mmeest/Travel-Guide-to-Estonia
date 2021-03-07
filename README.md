<p align="center"><img src="Screenshot.png" width="300px"></p>

<h1 align="center">
    <strong>Eesti reisijuht</strong>
</h1>
<h3 align="center">
    Põnevaid paiku mida Eestis avastada
</h3>


## Lehelt võib leida
* *Kaarti, mille huvipunktidele hiirega liikudes kuvatakse punkit nimi*
* *Maakonnanupud millel klikkides kuvatakse vastava maakonna huvipunktid infokaartidena nuppude alla*
* *Pealehel kuvatakse kolm juhuslikku huvipunkti andmebaasist*
* *Infokaartid sisaldavad ühde pilti, punkti nime, maakonna nime, lühitutvustust, ja google maps linki*
* *Võimalus kuvada ka google kaart iga infotahvli alla - hetkel välja kommenteeritud*
```
/* echo$row['iframe']; */			// google kaart
```
* *Välislingid põnevatele Eestimaad tutvustavatele lehtedele*
* *Kontaktivorm*


## Kasutatud vahendid
* *HTML*
* *CSS*
* *Bootstrap*
* *JavaScript*
* *PHP*
* *SQL*

### Port 3306 konflikti korral
1. Vahetada port 3307 vastu 'my.ini' failis:\
XAMPP > MySQL > Config > my.ini port 3306 -> 3307

2. 'config.inc' failis:\
xampp\phpMyAdmin\config.inc:
$cfg['Servers'][$i]['port'] = '3307';

3. Lisada sql ühendusstringile pordi number(3307)\
```
$conn = mysqli_connect($servername, $username, $password, $dbname, 3307);
```

### Eesti tähestiku konflikt
Seada ühendusele 'UTF-8' formaat
```
$conn -> set_charset("utf8");
```

### Kui mõnel juhul kuvab 'index.php' lehel vaid 2 huvipunkti
Võib seada järgnevad muutujad näiteks nii:
```
$first = rand(1, 44);       ->      $first = rand(1, 20);
$second = rand(1, 44);      ->      $second = rand(21, 40);
$third = rand(1, 44);       ->      $third = rand(41, 56);
```
