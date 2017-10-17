<?php

Route::get('/', 'PocetnaKontroler@pocetna')->name('pocetna');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Korisnici
Route::get('sifarnici/korisnici', 'KorisniciKontroler@getLista')->name('korisnici');
Route::post('sifarnici/korisnici/dodavanje', 'KorisniciKontroler@postDodavanje')->name('korisnici.dodavanje');
Route::post('sifarnici/korisnici/brisanje', 'KorisniciKontroler@postBrisanje')->name('korisnici.brisanje');
Route::post('sifarnici/korisnici/izmena/{id}', 'KorisniciKontroler@postIzmena')->name('korisnici.izmena');
Route::get('sifarnici/korisnici/pregled/{id}', 'KorisniciKontroler@getPregled')->name('korisnici.pregled');

//Proizvodjaci
Route::get('sifarnici/proizvodjaci', 'Sifarnici\ProizvodjaciKontroler@getLista')->name('proizvodjaci');
Route::post('sifarnici/proizvodjaci/dodavanje', 'Sifarnici\ProizvodjaciKontroler@postDodavanje')->name('proizvodjaci.dodavanje');
Route::post('sifarnici/proizvodjaci/brisanje', 'Sifarnici\ProizvodjaciKontroler@postBrisanje')->name('proizvodjaci.brisanje');
Route::post('sifarnici/proizvodjaci/izmena', 'Sifarnici\ProizvodjaciKontroler@postIzmena')->name('proizvodjaci.izmena');
Route::post('sifarnici/proizvodjaci/detalj', 'Sifarnici\ProizvodjaciKontroler@postDetalj')->name('proizvodjaci.detalj');

//Lokacije
Route::get('sifarnici/lokacije', 'Sifarnici\LokacijeKontroler@getLista')->name('lokacije');
Route::post('sifarnici/lokacije/dodavanje', 'Sifarnici\LokacijeKontroler@postDodavanje')->name('lokacije.dodavanje');
Route::post('sifarnici/lokacije/brisanje', 'Sifarnici\LokacijeKontroler@postBrisanje')->name('lokacije.brisanje');
Route::post('sifarnici/lokacije/izmena', 'Sifarnici\LokacijeKontroler@postIzmena')->name('lokacije.izmena');
Route::post('sifarnici/lokacije/detalj', 'Sifarnici\LokacijeKontroler@postDetalj')->name('lokacije.detalj');

//Spratovi
Route::get('sifarnici/spratovi', 'Sifarnici\SpratoviKontroler@getLista')->name('spratovi');
Route::post('sifarnici/spratovi/dodavanje', 'Sifarnici\SpratoviKontroler@postDodavanje')->name('spratovi.dodavanje');
Route::post('sifarnici/spratovi/brisanje', 'Sifarnici\SpratoviKontroler@postBrisanje')->name('spratovi.brisanje');
Route::post('sifarnici/spratovi/izmena', 'Sifarnici\SpratoviKontroler@postIzmena')->name('spratovi.izmena');
Route::post('sifarnici/spratovi/detalj', 'Sifarnici\SpratoviKontroler@postDetalj')->name('spratovi.detalj');

//Kancelarije
Route::get('sifarnici/kancelarije', 'Sifarnici\KancelarijeKontroler@getLista')->name('kancelarije');
Route::post('sifarnici/kancelarije/dodavanje', 'Sifarnici\KancelarijeKontroler@postDodavanje')->name('kancelarije.dodavanje');
Route::post('sifarnici/kancelarije/brisanje', 'Sifarnici\KancelarijeKontroler@postBrisanje')->name('kancelarije.brisanje');
Route::post('sifarnici/kancelarije/izmena', 'Sifarnici\KancelarijeKontroler@postIzmena')->name('kancelarije.izmena');
Route::post('sifarnici/kancelarije/detalj', 'Sifarnici\KancelarijeKontroler@postDetalj')->name('kancelarije.detalj');

//Uprave
Route::get('sifarnici/uprave', 'Sifarnici\UpraveKontroler@getLista')->name('uprave');
Route::post('sifarnici/uprave/dodavanje', 'Sifarnici\UpraveKontroler@postDodavanje')->name('uprave.dodavanje');
Route::post('sifarnici/uprave/brisanje', 'Sifarnici\UpraveKontroler@postBrisanje')->name('uprave.brisanje');
Route::post('sifarnici/uprave/izmena', 'Sifarnici\UpraveKontroler@postIzmena')->name('uprave.izmena');
Route::post('sifarnici/uprave/detalj', 'Sifarnici\UpraveKontroler@postDetalj')->name('uprave.detalj');

//Zaposleni
Route::get('sifarnici/zaposleni/', 'Sifarnici\ZaposleniKontroler@getLista')->name('zaposleni');
Route::get('sifarnici/zaposleni/dodavanje', 'Sifarnici\ZaposleniKontroler@getDodavanje')->name('zaposleni.dodavanje.get');
Route::post('sifarnici/zaposleni/dodavanje', 'Sifarnici\ZaposleniKontroler@postDodavanje')->name('zaposleni.dodavanje.post');
Route::get('sifarnici/zaposleni/izmena/{id}', 'Sifarnici\ZaposleniKontroler@getIzmena')->name('zaposleni.izmena.get');
Route::post('sifarnici/zaposleni/izmena/{id}', 'Sifarnici\ZaposleniKontroler@postIzmena')->name('zaposleni.izmena.post');
Route::get('sifarnici/zaposleni/detalj/{id}', 'Sifarnici\ZaposleniKontroler@getDetalj')->name('zaposleni.detalj');
Route::post('sifarnici/zaposleni/brisanje', 'Sifarnici\ZaposleniKontroler@postBrisanje')->name('zaposleni.brisanje');

//Zaposleni Mobilni
Route::post('sifarnici/zaposleni/mobilni/dodavanje', 'Sifarnici\ZaposleniMobilniKontroler@postDodavanje')->name('zaposleni.mobilni.dodavanje.post');
Route::post('sifarnici/zaposleni/mobilni/brisanje', 'Sifarnici\ZaposleniMobilniKontroler@postBrisanje')->name('mobilni.zaposleni.brisanje');
Route::post('sifarnici/zaposleni/mobilni/detalj', 'Sifarnici\ZaposleniMobilniKontroler@postDetalj')->name('mobilni.zaposleni.detalj');
Route::post('sifarnici/zaposleni/mobilni/izmena', 'Sifarnici\ZaposleniMobilniKontroler@postIzmena')->name('mobilni.zaposleni.izmena');
//Zaposleni Email
Route::post('sifarnici/zaposleni/email/dodavanje', 'Sifarnici\ZaposleniEmailoviKontroler@postDodavanje')->name('zaposleni.email.dodavanje.post');
Route::post('sifarnici/zaposleni/email/brisanje', 'Sifarnici\ZaposleniEmailoviKontroler@postBrisanje')->name('email.zaposleni.brisanje');
Route::post('sifarnici/zaposleni/email/detalj', 'Sifarnici\ZaposleniEmailoviKontroler@postDetalj')->name('email.zaposleni.detalj');
Route::post('sifarnici/zaposleni/email/izmena', 'Sifarnici\ZaposleniEmailoviKontroler@postIzmena')->name('email.zaposleni.izmena');

//Telefoni
Route::get('sifarnici/telefoni', 'Sifarnici\TelefoniKontroler@getLista')->name('telefoni');
Route::post('sifarnici/telefoni/dodavanje', 'Sifarnici\TelefoniKontroler@postDodavanje')->name('telefoni.dodavanje');
Route::post('sifarnici/telefoni/brisanje', 'Sifarnici\TelefoniKontroler@postBrisanje')->name('telefoni.brisanje');
Route::post('sifarnici/telefoni/izmena', 'Sifarnici\TelefoniKontroler@postIzmena')->name('telefoni.izmena');
Route::post('sifarnici/telefoni/detalj', 'Sifarnici\TelefoniKontroler@postDetalj')->name('telefoni.detalj');

//Mobilni telefoni
Route::get('sifarnici/mobilni', 'Sifarnici\MobilniKontroler@getLista')->name('mobilni');
Route::post('sifarnici/mobilni/dodavanje', 'Sifarnici\MobilniKontroler@postDodavanje')->name('mobilni.dodavanje');
Route::post('sifarnici/mobilni/brisanje', 'Sifarnici\MobilniKontroler@postBrisanje')->name('mobilni.brisanje');
Route::post('sifarnici/mobilni/izmena', 'Sifarnici\MobilniKontroler@postIzmena')->name('mobilni.izmena');
Route::post('sifarnici/mobilni/detalj', 'Sifarnici\MobilniKontroler@postDetalj')->name('mobilni.detalj');

//Email
Route::get('sifarnici/email', 'Sifarnici\EmailKontroler@getLista')->name('email');
Route::post('sifarnici/email/dodavanje', 'Sifarnici\EmailKontroler@postDodavanje')->name('email.dodavanje');
Route::post('sifarnici/email/brisanje', 'Sifarnici\EmailKontroler@postBrisanje')->name('email.brisanje');
Route::post('sifarnici/email/izmena', 'Sifarnici\EmailKontroler@postIzmena')->name('email.izmena');
Route::post('sifarnici/email/detalj', 'Sifarnici\EmailKontroler@postDetalj')->name('email.detalj');

//Dijagonale
Route::get('sifarnici/dijagonale', 'Sifarnici\DijagonaleKontroler@getLista')->name('dijagonale');
Route::post('sifarnici/dijagonale/dodavanje', 'Sifarnici\DijagonaleKontroler@postDodavanje')->name('dijagonale.dodavanje');
Route::post('sifarnici/dijagonale/brisanje', 'Sifarnici\DijagonaleKontroler@postBrisanje')->name('dijagonale.brisanje');
Route::post('sifarnici/dijagonale/izmena', 'Sifarnici\DijagonaleKontroler@postIzmena')->name('dijagonale.izmena');
Route::post('sifarnici/dijagonale/detalj', 'Sifarnici\DijagonaleKontroler@postDetalj')->name('dijagonale.detalj');

//Povezivanje vga
Route::get('sifarnici/povezivanje_vga', 'Sifarnici\PovezivanjeVgaKontroler@getLista')->name('povezivanje_vga');
Route::post('sifarnici/povezivanje_vga/dodavanje', 'Sifarnici\PovezivanjeVgaKontroler@postDodavanje')->name('povezivanje_vga.dodavanje');
Route::post('sifarnici/povezivanje_vga/brisanje', 'Sifarnici\PovezivanjeVgaKontroler@postBrisanje')->name('povezivanje_vga.brisanje');
Route::post('sifarnici/povezivanje_vga/izmena', 'Sifarnici\PovezivanjeVgaKontroler@postIzmena')->name('povezivanje_vga.izmena');
Route::post('sifarnici/povezivanje_vga/detalj', 'Sifarnici\PovezivanjeVgaKontroler@postDetalj')->name('povezivanje_vga.detalj');

//Povezivanje hdd
Route::get('sifarnici/povezivanje_hdd', 'Sifarnici\PovezivanjeHddKontroler@getLista')->name('povezivanje_hdd');
Route::post('sifarnici/povezivanje_hdd/dodavanje', 'Sifarnici\PovezivanjeHddKontroler@postDodavanje')->name('povezivanje_hdd.dodavanje');
Route::post('sifarnici/povezivanje_hdd/brisanje', 'Sifarnici\PovezivanjeHddKontroler@postBrisanje')->name('povezivanje_hdd.brisanje');
Route::post('sifarnici/povezivanje_hdd/izmena', 'Sifarnici\PovezivanjeHddKontroler@postIzmena')->name('povezivanje_hdd.izmena');
Route::post('sifarnici/povezivanje_hdd/detalj', 'Sifarnici\PovezivanjeHddKontroler@postDetalj')->name('povezivanje_hdd.detalj');

//Soketi
Route::get('sifarnici/soketi', 'Sifarnici\SoketiKontroler@getLista')->name('soketi');
Route::post('sifarnici/soketi/dodavanje', 'Sifarnici\SoketiKontroler@postDodavanje')->name('soketi.dodavanje');
Route::post('sifarnici/soketi/brisanje', 'Sifarnici\SoketiKontroler@postBrisanje')->name('soketi.brisanje');
Route::post('sifarnici/soketi/izmena', 'Sifarnici\SoketiKontroler@postIzmena')->name('soketi.izmena');
Route::post('sifarnici/soketi/detalj', 'Sifarnici\SoketiKontroler@postDetalj')->name('soketi.detalj');

// MODELI UREDJAJA

//Procesori
Route::get('modeli/procesori/', 'Modeli\ProcesoriKontroler@getLista')->name('procesori.modeli');
Route::get('modeli/procesori/dodavanje', 'Modeli\ProcesoriKontroler@getDodavanje')->name('procesori.modeli.dodavanje.get');
Route::post('modeli/procesori/dodavanje', 'Modeli\ProcesoriKontroler@postDodavanje')->name('procesori.modeli.dodavanje.post');
Route::get('modeli/procesori/izmena/{id}', 'Modeli\ProcesoriKontroler@getIzmena')->name('procesori.modeli.izmena.get');
Route::post('modeli/procesori/izmena/{id}', 'Modeli\ProcesoriKontroler@postIzmena')->name('procesori.modeli.izmena.post');
Route::get('modeli/procesori/detalj/{id}', 'Modeli\ProcesoriKontroler@getDetalj')->name('procesori.modeli.detalj');
Route::post('modeli/procesori/brisanje', 'Modeli\ProcesoriKontroler@postBrisanje')->name('procesori.modeli.brisanje');

