# TODO

Optpremnica 0 Stara oprema
Stavke:

1. HDD
2. Memorija
3. Ploca
4. Grafika
5. Monitor
6. Napajanje
7. Stampac
8. Ups
9. Projektor
10. CPU
11. Skener
12. Mrezni uredjaj
13. Racunar

Ocene od 1 do 4 za modele Cpu, Mem, Hdd, Ploca, a za racunar zbir. Ako je ocena < 7 OTPIS

DODATI PIVOT ZA GRAFICKI_ADAPTER_MODEL I POVEZIVANJE !!!!

dodati lozinke za emailove
dodati pivot za stampaci_toneri
ticketing system: s_kvarovi, s_statusi, prijave(broj_prijave, zaposleni, kancelarija, datum_prijave, status)

servis posebna tabela za svaku vrstu uredjaja


https://github.com/yajra/laravel-datatables
https://yajrabox.com/docs/laravel-datatables/master/releases
https://datatables.yajrabox.com/starter

Razmotriti skidanje unique index-a na poljima nziva u tabelema gde je softDelete (racuna brisane kao vec zauzete).


Videti Model Hdd u vezi pomocnih polja

U tabeli UPS dodati racunar_id

DB

NABAVKE nisu odradjene (dodati u meni). Stara oprema komplet ide u nabavku [jedna stavka stara oprema]
(rac, mon, stamp, sken, ups, proj, mrezna)

UGOVORI_ODRZAVANJA skinuti unique na broj (iznos default ne radi proveriti). Dodati dobavljac_id

RACUNI skinuti unique na broj (iznos default ne radi proveriti)

OTPREMNICE skinuti unique na broj

OTPREMNICE_STAVKE kolicina default ???

SPRATOVI Dodati kombinovan kljuc za spratove ('naziv' => 'unique_with:sprat_id,lokacija_id')
