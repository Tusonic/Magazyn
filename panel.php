<?php


if ($_SESSION["uprawnienia"] == "Administrator")
{
echo"


<table id='tabelamenu'>
<tr>
<td>TAŚMA</td> <td>KLIENT</td> <td>SPRZEDAŻ</td> <td>KONTA</td>
</tr>
<tr>
<td><form action='tasma_wyswietl.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='WYŚWIETL'></form></td> 
<td><form action='klient_wyswietl.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='WYŚWIETL'></form></td> 
<td><form action='sprzedaz_wyswietl.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='RAPORT'></form></td> 
<td><form action='konto_wyswietl.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='WYŚWIETL'></form></td> 
</tr>
<tr>
<td><form action='tasma_dodaj.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='DODAJ'></form></td> 
<td><form action='klient_dodaj.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='DODAJ'></form></td> 
<td><form action='sprzedaz_dodaj.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='SPRZEDAJ'></form></td> 
<td><form action='konto_dodaj.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='DODAJ'></form></td> 
</tr>
<tr>
<td><form action='tasma_edytuj.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='EDYTUJ'></form></td> 
<td><form action='klient_edytuj.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='EDYTUJ'></form></td> 
<td><form action='sprzedaz_usun.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='USUŃ'></form></td>
<td><form action='konto_edytuj.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='EDYTUJ'></form></td> 
</tr>
<tr>
<td><form action='tasma_warsztat.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='WARSZTAT'></form></td> 
<td></td> 
<td></td> 
<td></td> 
</tr>
</table>

";
}

if ($_SESSION["uprawnienia"] == "Użytkownik")
{

echo"


<table id='tabelamenu'>
<tr>
<td>TAŚMA</td> <td>KLIENT</td> <td>SPRZEDAŻ</td> <td>KONTA</td>
</tr>
<tr>
<td><form action='tasma_wyswietl.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='WYŚWIETL'></form></td> 
<td><form action='klient_wyswietl.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='WYŚWIETL'></form></td> 
<td><form action='sprzedaz_wyswietl.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='RAPORT'></form></td> 
<td><form action='konto_wyswietl.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='WYŚWIETL' disabled='disabled'></form></td> 
</tr>
<tr>
<td><form action='tasma_dodaj.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='DODAJ'></form></td> 
<td><form action='klient_dodaj.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='DODAJ'></form></td> 
<td><form action='sprzedaz_dodaj.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='SPRZEDAJ'></form></td> 
<td><form action='konto_dodaj.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='DODAJ' disabled='disabled'></form></td> 
</tr>
<tr>
<td><form action='tasma_edytuj.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='EDYTUJ'></form></td> 
<td><form action='klient_edytuj.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='EDYTUJ' disabled='disabled'></form></td> 
<td><form action='sprzedaz_usun.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='USUŃ' disabled='disabled'></form></td>
<td><form action='konto_edytuj.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='EDYTUJ' disabled='disabled'></form></td> 
</tr>
<tr>
<td><form action='tasma_warsztat.php' method='post'><input type='submit' class='submit' id='przycisk_tak' name='potwierdz' value='WARSZTAT'></form></td> 
<td></td> 
<td></td> 
<td></td> 
</tr>
</table>

";


}

else

if ($_SESSION["uprawnienia"] != "Administrator" or $_SESSION["uprawnienia"] != "Użytkownik" )
{
echo"


<table id='tabelamenu'>
<tr>
<td>TAŚMA</td> <td>KLIENT</td> <td>SPRZEDAŻ</td> <td>KONTA</td>
</tr>
<tr>
<td><form action='tasma_wyswietl.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='WYŚWIETL' disabled='disabled'></form></td> 
<td><form action='klient_wyswietl.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='WYŚWIETL' disabled='disabled'></form></td> 
<td><form action='sprzedaz_wyswietl.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='RAPORT' disabled='disabled'></form></td> 
<td><form action='konto_wyswietl.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='WYŚWIETL' disabled='disabled'></form></td> 
</tr>
<tr>
<td><form action='tasma_dodaj.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='DODAJ' disabled='disabled'></form></td> 
<td><form action='klient_dodaj.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='DODAJ' disabled='disabled'></form></td> 
<td><form action='sprzedaz_dodaj.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='SPRZEDAJ' disabled='disabled'></form></td> 
<td><form action='konto_dodaj.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='DODAJ' disabled='disabled'></form></td> 
</tr>
<tr>
<td><form action='tasma_edytuj.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='EDYTUJ' disabled='disabled'></form></td> 
<td><form action='klient_edytuj.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='EDYTUJ' disabled='disabled'></form></td> 
<td><form action='sprzedaz_usun.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='USUŃ' disabled='disabled'></form></td>
<td><form action='konto_edytuj.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='EDYTUJ' disabled='disabled'></form></td> 
</tr>
<tr>
<td><form action='tasma_warsztat.php' method='post'><input type='submit' class='submit' id='przycisk_nie' name='potwierdz' value='WARSZTAT' disabled='disabled'></form></td> 
<td></td> 
<td></td> 
<td></td> 
</tr>
</table>

";
}


?>