# Proftaak van Tycho
Beste Tycho,

Wat leuk om deze proftaak na te kijken! Het idee van classes is erg geland en je
begint dit nu overal te gebruiken. Ook heb je een keurige scheiding van de bestanden,
wat het project erg overzichtelijk maakt.

Let erop dat ik nu vooral beoordeel op de coding-style. 
Eisen voor de beoordeling zijn:
- Je volgt PSR-1 en PSR-12
- Je maakt gebruik van een namespace.
- Je maakt gebruik van functions.
- Je code is strictly typed en je gebruikt type hinting.
- Je zorgt voor een algemene errorhandler om errors op te vangen.
- Je zorgt ervoor dat in functies exceptions worden gemaakt wanneer nodig.
- Je werkt van scratch, dus ook geen tutorial of kopie van een ander project als start.
- Je gebruikt mysqli op een object georiënteerde manier.
- Je controleert input uit een formulier (i.v.m. security).
- Je maakt gebruik van $_SESSIONS.

Wat betreft het gebruik van de classes, zorg ervoor dat elke 'entiteit' een duidelijk
los object is. Bij een cijferregistratie systeem, zou ik dan denken aan de afzonderlijke objecten:
- Docent, Vak, Toets (cijfer), Student

Moeilijk dan dit hoef je het niet te maken. Nu is de code zo generiek, dat je elk vak
en elk cijfer op kunt vangen. Of er nu meer vakken of cijfers bijkomen, maakt niet uit,
dat zit namelijk in de inhoud van de database of de inhoud van de class.

Als je een aparte class voor elke type vak aan moet maken, dan ben je telkens bezig om
de code en database aan te passen. Dat is niet erg flexibel en handig, dus kun je abstracte
classes op een goede manier.

De indeling van de code en mappen ziet er goed uit, dit lijkt al een beetje op MVC
(model-view-controller). Goed bezig hoor, weinig leerlingen die de code op deze manier
in periode 1 al zo hebben. Chapeau!