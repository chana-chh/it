<?php

Route::get('/', 'PocetnaKontroler@pocetna')->name('pocetna');
Route::post('greska/brisanje', 'PocetnaKontroler@postBrisanje')->name('greska.brisanje');

Route::get('imenik', 'PretragaKontroler@getPretraga')->name('imenik');
Route::get('kvar', 'PretragaKontroler@getPrijavaKvara')->name('kvar');
Route::post('kvar', 'PretragaKontroler@postPrijavaKvara')->name('kvar.post');
Route::get('status/{id}', 'PretragaKontroler@getStatus')->name('status');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Korisnici
Route::get('sifarnici/korisnici', 'KorisniciKontroler@getLista')->name('korisnici');
Route::post('sifarnici/korisnici/dodavanje', 'KorisniciKontroler@postDodavanje')->name('korisnici.dodavanje');
Route::post('sifarnici/korisnici/brisanje', 'KorisniciKontroler@postBrisanje')->name('korisnici.brisanje');
Route::post('sifarnici/korisnici/izmena/{id}', 'KorisniciKontroler@postIzmena')->name('korisnici.izmena');
Route::get('sifarnici/korisnici/pregled/{id}', 'KorisniciKontroler@getPregled')->name('korisnici.pregled');

// STATISTIKA
Route::get('statistika', 'StatistikaKontroler@getLista')->name('statistika');


// SERVIS
//Servis
Route::get('servis', 'Servis\ServisKontroler@getLista')->name('servis');
Route::get('servis/detalj/{id}', 'Servis\ServisKontroler@getDetalj')->name('servis.detalj');
Route::get('servis/redirekt/{id}/{vrsta}', 'Servis\ServisKontroler@redirectDetalj')->name('servis.redirekt');
Route::get('servis/izmena/{id}', 'Servis\ServisKontroler@getIzmena')->name('servis.izmena.get');
Route::post('servis/izmena/{id}', 'Servis\ServisKontroler@postIzmena')->name('servis.izmena.post');

// Ugovori
Route::get('ugovori', 'Servis\UgovoriOdrzavanjaKontroler@getLista')->name('ugovori');
Route::get('ugovori/dodavanje', 'Servis\UgovoriOdrzavanjaKontroler@getDodavanje')->name('ugovori.dodavanje.get');
Route::post('ugovori/dodavanje', 'Servis\UgovoriOdrzavanjaKontroler@postDodavanje')->name('ugovori.dodavanje.post');
Route::get('ugovori/izmena/{id}', 'Servis\UgovoriOdrzavanjaKontroler@getIzmena')->name('ugovori.izmena.get');
Route::post('ugovori/izmena/{id}', 'Servis\UgovoriOdrzavanjaKontroler@postIzmena')->name('ugovori.izmena.post');
Route::get('ugovori/detalj/{id}', 'Servis\UgovoriOdrzavanjaKontroler@getDetalj')->name('ugovori.detalj');
Route::post('ugovori/brisanje', 'Servis\UgovoriOdrzavanjaKontroler@postBrisanje')->name('ugovori.brisanje');

// Racuni
Route::get('racuni', 'Servis\RacuniKontroler@getLista')->name('racuni');
Route::get('racuni/dodavanje/{id_ugovora?}', 'Servis\RacuniKontroler@getDodavanje')->name('racuni.dodavanje.get');
Route::post('racuni/dodavanje', 'Servis\RacuniKontroler@postDodavanje')->name('racuni.dodavanje.post');
Route::get('racuni/izmena/{id}', 'Servis\RacuniKontroler@getIzmena')->name('racuni.izmena.get');
Route::post('racuni/izmena/{id}', 'Servis\RacuniKontroler@postIzmena')->name('racuni.izmena.post');
Route::get('racuni/detalj/{id}', 'Servis\RacuniKontroler@getDetalj')->name('racuni.detalj');
Route::post('racuni/brisanje', 'Servis\RacuniKontroler@postBrisanje')->name('racuni.brisanje');
// Racuni slike
Route::post('racuni/dodavanje/slike/{id}', 'Servis\RacuniKontroler@postDodavanjeSlike')->name('racuni.dodavanje.slike');
Route::post('racuni/brisanje/slike', 'Servis\RacuniKontroler@postBrisanjeSlike')->name('racuni.brisanje.slike');

// Otpremnice
Route::get('otpremnice', 'Servis\OtpremniceKontroler@getLista')->name('otpremnice');
Route::get('otpremnice/pretraga', 'Servis\OtpremniceKontroler@getListaPretraga')->name('otpremnice.pretraga');
Route::post('otpremnice/pretraga', 'Servis\OtpremniceKontroler@postListaPretraga')->name('otpremnice.pretraga.post');
Route::get('otpremnice/dodavanje/{id_racuna?}', 'Servis\OtpremniceKontroler@getDodavanje')->name('otpremnice.dodavanje.get');
Route::post('otpremnice/dodavanje', 'Servis\OtpremniceKontroler@postDodavanje')->name('otpremnice.dodavanje.post');
Route::get('otpremnice/izmena/{id}', 'Servis\OtpremniceKontroler@getIzmena')->name('otpremnice.izmena.get');
Route::post('otpremnice/izmena/{id}', 'Servis\OtpremniceKontroler@postIzmena')->name('otpremnice.izmena.post');
Route::get('otpremnice/detalj/{id}', 'Servis\OtpremniceKontroler@getDetalj')->name('otpremnice.detalj');
Route::post('otpremnice/brisanje', 'Servis\OtpremniceKontroler@postBrisanje')->name('otpremnice.brisanje');
// Otpremnice slike
Route::post('otpremnice/dodavanje/slike/{id}', 'Servis\otpremniceKontroler@postDodavanjeSlike')->name('otpremnice.dodavanje.slike');
Route::post('otpremnice/brisanje/slike', 'Servis\otpremniceKontroler@postBrisanjeSlike')->name('otpremnice.brisanje.slike');
// Otpremnice stavke
Route::post('otpremnice/stavke/dodavanje', 'Servis\OtpremniceStavkeKontroler@postDodavanje')->name('otpremnice.stavke.dodavanje.post');
Route::get('otpremnice/stavke/izmena/{id}', 'Servis\OtpremniceStavkeKontroler@getIzmena')->name('otpremnice.stavke.izmena.get');
Route::post('otpremnice/stavke/izmena/{id}', 'Servis\OtpremniceStavkeKontroler@postIzmena')->name('otpremnice.stavke.izmena.post');
Route::get('otpremnice/stavke/detalj/{id}', 'Servis\OtpremniceStavkeKontroler@getDetalj')->name('otpremnice.stavke.detalj');
Route::post('otpremnice/stavke/brisanje', 'Servis\OtpremniceStavkeKontroler@postBrisanje')->name('otpremnice.stavke.brisanje');

// Nabavke
Route::get('nabavke', 'Servis\NabavkeKontroler@getLista')->name('nabavke');
Route::get('nabavke/pretraga', 'Servis\NabavkeKontroler@getListaPretraga')->name('nabavke.pretraga');
Route::post('nabavke/pretraga', 'Servis\NabavkeKontroler@postListaPretraga')->name('nabavke.pretraga.post');
Route::get('nabavke/dodavanje', 'Servis\NabavkeKontroler@getDodavanje')->name('nabavke.dodavanje.get');
Route::post('nabavke/dodavanje', 'Servis\NabavkeKontroler@postDodavanje')->name('nabavke.dodavanje.post');
Route::get('nabavke/izmena/{id}', 'Servis\NabavkeKontroler@getIzmena')->name('nabavke.izmena.get');
Route::post('nabavke/izmena/{id}', 'Servis\NabavkeKontroler@postIzmena')->name('nabavke.izmena.post');
Route::get('nabavke/detalj/{id}', 'Servis\NabavkeKontroler@getDetalj')->name('nabavke.detalj');
Route::post('nabavke/brisanje', 'Servis\NabavkeKontroler@postBrisanje')->name('nabavke.brisanje');
// Nabavke stavke
Route::post('nabavke/stavke/dodavanje', 'Servis\NabavkeStavkeKontroler@postDodavanje')->name('nabavke.stavke.dodavanje.post');
Route::get('nabavke/stavke/izmena/{id}', 'Servis\NabavkeStavkeKontroler@getIzmena')->name('nabavke.stavke.izmena.get');
Route::post('nabavke/stavke/izmena/{id}', 'Servis\NabavkeStavkeKontroler@postIzmena')->name('nabavke.stavke.izmena.post');
Route::get('nabavke/stavke/detalj/{id}', 'Servis\NabavkeStavkeKontroler@getDetalj')->name('nabavke.stavke.detalj');
Route::post('nabavke/stavke/brisanje', 'Servis\NabavkeStavkeKontroler@postBrisanje')->name('nabavke.stavke.brisanje');

// Nabavke-otpremnice stavke dodavanje uredjaja
Route::post('stavke/racunari/dodavanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postRacunariDodavanje')->name('stavke.racunari.dodavanje');
Route::post('stavke/monitori/dodavanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postMonitoriDodavanje')->name('stavke.monitori.dodavanje');
Route::post('stavke/stampaci/dodavanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postStampaciDodavanje')->name('stavke.stampaci.dodavanje');
Route::post('stavke/skeneri/dodavanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postSkeneriDodavanje')->name('stavke.skeneri.dodavanje');
Route::post('stavke/upsevi/dodavanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postUpseviDodavanje')->name('stavke.upsevi.dodavanje');
Route::post('stavke/projektori/dodavanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postProjektoriDodavanje')->name('stavke.projektori.dodavanje');
Route::post('stavke/mrezni/dodavanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postMrezniDodavanje')->name('stavke.mrezni.dodavanje');
// Nabavke-otpremnice stavke pregled uredjaja
Route::get('stavke/uredjaji/pregled/{vrsta}/{id}', 'Servis\NabavkeOtpremniceStavkeKontroler@getPregledUredjaja')->name('stavke.uredjaji.pregled');
// Nabavke-otpremnice stavke brisanje uredjaja
Route::post('stavke/uredjaji/brisanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postBrisanjeUredjaja')->name('stavke.uredjaji.brisanje');

// SIFARNICI
// Proizvodjaci
Route::get('sifarnici/proizvodjaci', 'Sifarnici\ProizvodjaciKontroler@getLista')->name('proizvodjaci');
Route::post('sifarnici/proizvodjaci/dodavanje', 'Sifarnici\ProizvodjaciKontroler@postDodavanje')->name('proizvodjaci.dodavanje');
Route::post('sifarnici/proizvodjaci/brisanje', 'Sifarnici\ProizvodjaciKontroler@postBrisanje')->name('proizvodjaci.brisanje');
Route::post('sifarnici/proizvodjaci/izmena', 'Sifarnici\ProizvodjaciKontroler@postIzmena')->name('proizvodjaci.izmena');
Route::post('sifarnici/proizvodjaci/detalj', 'Sifarnici\ProizvodjaciKontroler@postDetalj')->name('proizvodjaci.detalj');

// Dobavljaci
Route::get('sifarnici/dobavljaci', 'Sifarnici\DobavljaciKontroler@getLista')->name('dobavljaci');
Route::get('sifarnici/dobavljaci/dodavanje', 'Sifarnici\DobavljaciKontroler@getDodavanje')->name('dobavljaci.dodavanje.get');
Route::post('sifarnici/dobavljaci/dodavanje', 'Sifarnici\DobavljaciKontroler@postDodavanje')->name('dobavljaci.dodavanje.post');
Route::get('sifarnici/dobavljaci/izmena/{id}', 'Sifarnici\DobavljaciKontroler@getIzmena')->name('dobavljaci.izmena.get');
Route::post('sifarnici/dobavljaci/izmena/{id}', 'Sifarnici\DobavljaciKontroler@postIzmena')->name('dobavljaci.izmena.post');
Route::get('sifarnici/dobavljaci/detalj/{id}', 'Sifarnici\DobavljaciKontroler@getDetalj')->name('dobavljaci.detalj');
Route::post('sifarnici/dobavljaci/brisanje', 'Sifarnici\DobavljaciKontroler@postBrisanje')->name('dobavljaci.brisanje');

// Lokacije
Route::get('sifarnici/lokacije', 'Sifarnici\LokacijeKontroler@getLista')->name('lokacije');
Route::post('sifarnici/lokacije/dodavanje', 'Sifarnici\LokacijeKontroler@postDodavanje')->name('lokacije.dodavanje');
Route::post('sifarnici/lokacije/dodavanje/ajax', 'Sifarnici\LokacijeKontroler@postAjax')->name('lokacije.dodavanje.ajax');
Route::post('sifarnici/lokacije/brisanje', 'Sifarnici\LokacijeKontroler@postBrisanje')->name('lokacije.brisanje');
Route::post('sifarnici/lokacije/izmena', 'Sifarnici\LokacijeKontroler@postIzmena')->name('lokacije.izmena');
Route::post('sifarnici/lokacije/detalj', 'Sifarnici\LokacijeKontroler@postDetalj')->name('lokacije.detalj');

// Spratovi
Route::get('sifarnici/spratovi', 'Sifarnici\SpratoviKontroler@getLista')->name('spratovi');
Route::post('sifarnici/spratovi/dodavanje', 'Sifarnici\SpratoviKontroler@postDodavanje')->name('spratovi.dodavanje');
Route::post('sifarnici/spratovi/brisanje', 'Sifarnici\SpratoviKontroler@postBrisanje')->name('spratovi.brisanje');
Route::post('sifarnici/spratovi/izmena', 'Sifarnici\SpratoviKontroler@postIzmena')->name('spratovi.izmena');
Route::post('sifarnici/spratovi/detalj', 'Sifarnici\SpratoviKontroler@postDetalj')->name('spratovi.detalj');

// Reciklaza
Route::get('sifarnici/reciklaze', 'Sifarnici\ReciklazeKontroler@getLista')->name('reciklaze');
Route::get('sifarnici/reciklaze/uredjaji/{datum}', 'Sifarnici\ReciklazeKontroler@getRecikliraniUredjaji')->name('reciklaze.uredjaji');
Route::post('sifarnici/reciklaze/dodavanje', 'Sifarnici\ReciklazeKontroler@postDodavanje')->name('reciklaze.dodavanje');
Route::post('sifarnici/reciklaze/brisanje', 'Sifarnici\ReciklazeKontroler@postBrisanje')->name('reciklaze.brisanje');
Route::post('sifarnici/reciklaze/izmena', 'Sifarnici\ReciklazeKontroler@postIzmena')->name('reciklaze.izmena');
Route::post('sifarnici/reciklaze/detalj', 'Sifarnici\ReciklazeKontroler@postDetalj')->name('reciklaze.detalj');

// Kancelarije
Route::get('sifarnici/kancelarije', 'Sifarnici\KancelarijeKontroler@getLista')->name('kancelarije');
Route::get('sifarnici/kancelarije/detaljno/{id}', 'Sifarnici\KancelarijeKontroler@getDetalj')->name('kancelarije.detalj.get');
Route::post('sifarnici/kancelarije/dodavanje', 'Sifarnici\KancelarijeKontroler@postDodavanje')->name('kancelarije.dodavanje');
Route::post('sifarnici/kancelarije/brisanje', 'Sifarnici\KancelarijeKontroler@postBrisanje')->name('kancelarije.brisanje');
Route::post('sifarnici/kancelarije/izmena', 'Sifarnici\KancelarijeKontroler@postIzmena')->name('kancelarije.izmena');
Route::post('sifarnici/kancelarije/detalj', 'Sifarnici\KancelarijeKontroler@postDetalj')->name('kancelarije.detalj');
Route::post('sifarnici/kancelarije/telefon', 'Sifarnici\KancelarijeKontroler@postDodavanjeTelefon')->name('kancelarija.telefon.dodavanje.post');

// Uprave
Route::get('sifarnici/uprave', 'Sifarnici\UpraveKontroler@getLista')->name('uprave');
Route::post('sifarnici/uprave/dodavanje', 'Sifarnici\UpraveKontroler@postDodavanje')->name('uprave.dodavanje');
Route::post('sifarnici/uprave/brisanje', 'Sifarnici\UpraveKontroler@postBrisanje')->name('uprave.brisanje');
Route::post('sifarnici/uprave/izmena', 'Sifarnici\UpraveKontroler@postIzmena')->name('uprave.izmena');
Route::post('sifarnici/uprave/detalj', 'Sifarnici\UpraveKontroler@postDetalj')->name('uprave.detalj');

// Zaposleni
Route::get('sifarnici/zaposleni/', 'Sifarnici\ZaposleniKontroler@getLista')->name('zaposleni');
Route::get('sifarnici/zaposleni/dodavanje', 'Sifarnici\ZaposleniKontroler@getDodavanje')->name('zaposleni.dodavanje.get');
Route::post('sifarnici/zaposleni/dodavanje', 'Sifarnici\ZaposleniKontroler@postDodavanje')->name('zaposleni.dodavanje.post');
Route::get('sifarnici/zaposleni/izmena/{id}', 'Sifarnici\ZaposleniKontroler@getIzmena')->name('zaposleni.izmena.get');
Route::post('sifarnici/zaposleni/izmena/{id}', 'Sifarnici\ZaposleniKontroler@postIzmena')->name('zaposleni.izmena.post');
Route::get('sifarnici/zaposleni/detalj/{id}', 'Sifarnici\ZaposleniKontroler@getDetalj')->name('zaposleni.detalj');
Route::post('sifarnici/zaposleni/brisanje', 'Sifarnici\ZaposleniKontroler@postBrisanje')->name('zaposleni.brisanje');
Route::get('sifarnici/zaposleni/ajax', 'Sifarnici\ZaposleniKontroler@getAjax')->name('zaposleni.ajax');

// Zaposleni Mobilni
Route::post('sifarnici/zaposleni/mobilni/dodavanje', 'Sifarnici\ZaposleniMobilniKontroler@postDodavanje')->name('zaposleni.mobilni.dodavanje.post');
Route::post('sifarnici/zaposleni/mobilni/brisanje', 'Sifarnici\ZaposleniMobilniKontroler@postBrisanje')->name('mobilni.zaposleni.brisanje');
Route::post('sifarnici/zaposleni/mobilni/detalj', 'Sifarnici\ZaposleniMobilniKontroler@postDetalj')->name('mobilni.zaposleni.detalj');
Route::post('sifarnici/zaposleni/mobilni/izmena', 'Sifarnici\ZaposleniMobilniKontroler@postIzmena')->name('mobilni.zaposleni.izmena');

// Zaposleni Email
Route::post('sifarnici/zaposleni/email/dodavanje', 'Sifarnici\ZaposleniEmailoviKontroler@postDodavanje')->name('zaposleni.email.dodavanje.post');
Route::post('sifarnici/zaposleni/email/brisanje', 'Sifarnici\ZaposleniEmailoviKontroler@postBrisanje')->name('email.zaposleni.brisanje');
Route::post('sifarnici/zaposleni/email/detalj', 'Sifarnici\ZaposleniEmailoviKontroler@postDetalj')->name('email.zaposleni.detalj');
Route::post('sifarnici/zaposleni/email/izmena', 'Sifarnici\ZaposleniEmailoviKontroler@postIzmena')->name('email.zaposleni.izmena');

// Telefoni
Route::get('sifarnici/telefoni', 'Sifarnici\TelefoniKontroler@getLista')->name('telefoni');
Route::post('sifarnici/telefoni/dodavanje', 'Sifarnici\TelefoniKontroler@postDodavanje')->name('telefoni.dodavanje');
Route::post('sifarnici/telefoni/brisanje', 'Sifarnici\TelefoniKontroler@postBrisanje')->name('telefoni.brisanje');
Route::post('sifarnici/telefoni/izmena', 'Sifarnici\TelefoniKontroler@postIzmena')->name('telefoni.izmena');
Route::post('sifarnici/telefoni/detalj', 'Sifarnici\TelefoniKontroler@postDetalj')->name('telefoni.detalj');

// Mobilni telefoni
Route::get('sifarnici/mobilni', 'Sifarnici\MobilniKontroler@getLista')->name('mobilni');
Route::post('sifarnici/mobilni/dodavanje', 'Sifarnici\MobilniKontroler@postDodavanje')->name('mobilni.dodavanje');
Route::post('sifarnici/mobilni/brisanje', 'Sifarnici\MobilniKontroler@postBrisanje')->name('mobilni.brisanje');
Route::post('sifarnici/mobilni/izmena', 'Sifarnici\MobilniKontroler@postIzmena')->name('mobilni.izmena');
Route::post('sifarnici/mobilni/detalj', 'Sifarnici\MobilniKontroler@postDetalj')->name('mobilni.detalj');

// Email
Route::get('sifarnici/email', 'Sifarnici\EmailKontroler@getLista')->name('email');
Route::post('sifarnici/email/dodavanje', 'Sifarnici\EmailKontroler@postDodavanje')->name('email.dodavanje');
Route::post('sifarnici/email/brisanje', 'Sifarnici\EmailKontroler@postBrisanje')->name('email.brisanje');
Route::post('sifarnici/email/izmena', 'Sifarnici\EmailKontroler@postIzmena')->name('email.izmena');
Route::post('sifarnici/email/detalj', 'Sifarnici\EmailKontroler@postDetalj')->name('email.detalj');

// Dijagonale
Route::get('sifarnici/dijagonale', 'Sifarnici\DijagonaleKontroler@getLista')->name('dijagonale');
Route::post('sifarnici/dijagonale/dodavanje', 'Sifarnici\DijagonaleKontroler@postDodavanje')->name('dijagonale.dodavanje');
Route::post('sifarnici/dijagonale/brisanje', 'Sifarnici\DijagonaleKontroler@postBrisanje')->name('dijagonale.brisanje');
Route::post('sifarnici/dijagonale/izmena', 'Sifarnici\DijagonaleKontroler@postIzmena')->name('dijagonale.izmena');
Route::post('sifarnici/dijagonale/detalj', 'Sifarnici\DijagonaleKontroler@postDetalj')->name('dijagonale.detalj');

// Licence
Route::get('sifarnici/licence', 'Sifarnici\LicenceKontroler@getLista')->name('licence');
Route::get('sifarnici/licence/dodavanje', 'Sifarnici\LicenceKontroler@getDodavanje')->name('licence.dodavanje.get');
Route::post('sifarnici/licence/dodavanje', 'Sifarnici\LicenceKontroler@postDodavanje')->name('licence.dodavanje.post');
Route::get('sifarnici/licence/izmena/{id}', 'Sifarnici\LicenceKontroler@getIzmena')->name('licence.izmena.get');
Route::post('sifarnici/licence/izmena/{id}', 'Sifarnici\LicenceKontroler@postIzmena')->name('licence.izmena.post');
Route::get('sifarnici/licence/detalj/{id}', 'Sifarnici\LicenceKontroler@getDetalj')->name('licence.detalj');
Route::post('sifarnici/licence/brisanje', 'Sifarnici\LicenceKontroler@postBrisanje')->name('licence.brisanje');

// Baterije
Route::get('sifarnici/baterije', 'Sifarnici\BaterijeKontroler@getLista')->name('baterije');
Route::post('sifarnici/baterije/dodavanje', 'Sifarnici\BaterijeKontroler@postDodavanje')->name('baterije.dodavanje');
Route::post('sifarnici/baterije/brisanje', 'Sifarnici\BaterijeKontroler@postBrisanje')->name('baterije.brisanje');
Route::post('sifarnici/baterije/izmena', 'Sifarnici\BaterijeKontroler@postIzmena')->name('baterije.izmena');
Route::post('sifarnici/baterije/detalj', 'Sifarnici\BaterijeKontroler@postDetalj')->name('baterije.detalj');

// Povezivanje vga
Route::get('sifarnici/povezivanje_vga', 'Sifarnici\PovezivanjeVgaKontroler@getLista')->name('povezivanje_vga');
Route::post('sifarnici/povezivanje_vga/dodavanje', 'Sifarnici\PovezivanjeVgaKontroler@postDodavanje')->name('povezivanje_vga.dodavanje');
Route::post('sifarnici/povezivanje_vga/brisanje', 'Sifarnici\PovezivanjeVgaKontroler@postBrisanje')->name('povezivanje_vga.brisanje');
Route::post('sifarnici/povezivanje_vga/izmena', 'Sifarnici\PovezivanjeVgaKontroler@postIzmena')->name('povezivanje_vga.izmena');
Route::post('sifarnici/povezivanje_vga/detalj', 'Sifarnici\PovezivanjeVgaKontroler@postDetalj')->name('povezivanje_vga.detalj');

// Povezivanje hdd
Route::get('sifarnici/povezivanje_hdd', 'Sifarnici\PovezivanjeHddKontroler@getLista')->name('povezivanje_hdd');
Route::post('sifarnici/povezivanje_hdd/dodavanje', 'Sifarnici\PovezivanjeHddKontroler@postDodavanje')->name('povezivanje_hdd.dodavanje');
Route::post('sifarnici/povezivanje_hdd/brisanje', 'Sifarnici\PovezivanjeHddKontroler@postBrisanje')->name('povezivanje_hdd.brisanje');
Route::post('sifarnici/povezivanje_hdd/izmena', 'Sifarnici\PovezivanjeHddKontroler@postIzmena')->name('povezivanje_hdd.izmena');
Route::post('sifarnici/povezivanje_hdd/detalj', 'Sifarnici\PovezivanjeHddKontroler@postDetalj')->name('povezivanje_hdd.detalj');

// Soketi
Route::get('sifarnici/soketi', 'Sifarnici\SoketiKontroler@getLista')->name('soketi');
Route::post('sifarnici/soketi/dodavanje', 'Sifarnici\SoketiKontroler@postDodavanje')->name('soketi.dodavanje');
Route::post('sifarnici/soketi/brisanje', 'Sifarnici\SoketiKontroler@postBrisanje')->name('soketi.brisanje');
Route::post('sifarnici/soketi/izmena', 'Sifarnici\SoketiKontroler@postIzmena')->name('soketi.izmena');
Route::post('sifarnici/soketi/detalj', 'Sifarnici\SoketiKontroler@postDetalj')->name('soketi.detalj');

// Tipovi memorije
Route::get('sifarnici/tipovi_memorije', 'Sifarnici\TipoviMemorijeKontroler@getLista')->name('tipovi_memorije');
Route::post('sifarnici/tipovi_memorije/dodavanje', 'Sifarnici\TipoviMemorijeKontroler@postDodavanje')->name('tipovi_memorije.dodavanje');
Route::post('sifarnici/tipovi_memorije/brisanje', 'Sifarnici\TipoviMemorijeKontroler@postBrisanje')->name('tipovi_memorije.brisanje');
Route::post('sifarnici/tipovi_memorije/izmena', 'Sifarnici\TipoviMemorijeKontroler@postIzmena')->name('tipovi_memorije.izmena');
Route::post('sifarnici/tipovi_memorije/detalj', 'Sifarnici\TipoviMemorijeKontroler@postDetalj')->name('tipovi_memorije.detalj');

// VGA slotovi
Route::get('sifarnici/vga_slotovi', 'Sifarnici\VgaSlotoviKontroler@getLista')->name('vga_slotovi');
Route::post('sifarnici/vga_slotovi/dodavanje', 'Sifarnici\VgaSlotoviKontroler@postDodavanje')->name('vga_slotovi.dodavanje');
Route::post('sifarnici/vga_slotovi/brisanje', 'Sifarnici\VgaSlotoviKontroler@postBrisanje')->name('vga_slotovi.brisanje');
Route::post('sifarnici/vga_slotovi/izmena', 'Sifarnici\VgaSlotoviKontroler@postIzmena')->name('vga_slotovi.izmena');
Route::post('sifarnici/vga_slotovi/detalj', 'Sifarnici\VgaSlotoviKontroler@postDetalj')->name('vga_slotovi.detalj');

// Tipovi stampaca
Route::get('sifarnici/tipovi_stampaca', 'Sifarnici\TipoviStampacaKontroler@getLista')->name('tipovi_stampaca');
Route::post('sifarnici/tipovi_stampaca/dodavanje', 'Sifarnici\TipoviStampacaKontroler@postDodavanje')->name('tipovi_stampaca.dodavanje');
Route::post('sifarnici/tipovi_stampaca/brisanje', 'Sifarnici\TipoviStampacaKontroler@postBrisanje')->name('tipovi_stampaca.brisanje');
Route::post('sifarnici/tipovi_stampaca/izmena', 'Sifarnici\TipoviStampacaKontroler@postIzmena')->name('tipovi_stampaca.izmena');
Route::post('sifarnici/tipovi_stampaca/detalj', 'Sifarnici\TipoviStampacaKontroler@postDetalj')->name('tipovi_stampaca.detalj');

// Toneri
Route::get('sifarnici/toneri', 'Sifarnici\ToneriKontroler@getLista')->name('toneri');
Route::post('sifarnici/toneri/dodavanje', 'Sifarnici\ToneriKontroler@postDodavanje')->name('toneri.dodavanje');
Route::post('sifarnici/toneri/brisanje', 'Sifarnici\ToneriKontroler@postBrisanje')->name('toneri.brisanje');
Route::post('sifarnici/toneri/izmena', 'Sifarnici\ToneriKontroler@postIzmena')->name('toneri.izmena');
Route::post('sifarnici/toneri/detalj', 'Sifarnici\ToneriKontroler@postDetalj')->name('toneri.detalj');

// Operativni sistemi
Route::get('sifarnici/operativni_sistemi', 'Sifarnici\OperativniSistemiKontroler@getLista')->name('operativni_sistemi');
Route::post('sifarnici/operativni_sistemi/dodavanje', 'Sifarnici\OperativniSistemiKontroler@postDodavanje')->name('operativni_sistemi.dodavanje');
Route::post('sifarnici/operativni_sistemi/brisanje', 'Sifarnici\OperativniSistemiKontroler@postBrisanje')->name('operativni_sistemi.brisanje');
Route::post('sifarnici/operativni_sistemi/izmena', 'Sifarnici\OperativniSistemiKontroler@postIzmena')->name('operativni_sistemi.izmena');
Route::post('sifarnici/operativni_sistemi/detalj', 'Sifarnici\OperativniSistemiKontroler@postDetalj')->name('operativni_sistemi.detalj');

//Aplikacije
Route::get('sifarnici/aplikacije', 'Sifarnici\AplikacijeKontroler@getLista')->name('aplikacije');
Route::post('sifarnici/aplikacije/dodavanje', 'Sifarnici\AplikacijeKontroler@postDodavanje')->name('aplikacije.dodavanje');
Route::post('sifarnici/aplikacije/brisanje', 'Sifarnici\AplikacijeKontroler@postBrisanje')->name('aplikacije.brisanje');
Route::post('sifarnici/aplikacije/izmena', 'Sifarnici\AplikacijeKontroler@postIzmena')->name('aplikacije.izmena');
Route::post('sifarnici/aplikacije/detalj', 'Sifarnici\AplikacijeKontroler@postDetalj')->name('aplikacije.detalj');
Route::get('sifarnici/aplikacije/racunari/{id}', 'Sifarnici\AplikacijeKontroler@getListaRacunari')->name('aplikacije.racunari');


// MODELI UREDJAJA
// Procesori
Route::get('modeli/procesori/', 'Modeli\ProcesoriKontroler@getLista')->name('procesori.modeli');
Route::get('modeli/procesori/dodavanje', 'Modeli\ProcesoriKontroler@getDodavanje')->name('procesori.modeli.dodavanje.get');
Route::post('modeli/procesori/dodavanje', 'Modeli\ProcesoriKontroler@postDodavanje')->name('procesori.modeli.dodavanje.post');
Route::get('modeli/procesori/izmena/{id}', 'Modeli\ProcesoriKontroler@getIzmena')->name('procesori.modeli.izmena.get');
Route::post('modeli/procesori/izmena/{id}', 'Modeli\ProcesoriKontroler@postIzmena')->name('procesori.modeli.izmena.post');
Route::get('modeli/procesori/detalj/{id}', 'Modeli\ProcesoriKontroler@getDetalj')->name('procesori.modeli.detalj');
Route::post('modeli/procesori/brisanje', 'Modeli\ProcesoriKontroler@postBrisanje')->name('procesori.modeli.brisanje');
Route::get('modeli/procesori/uredjaji/{id}', 'Modeli\ProcesoriKontroler@getUredjaji')->name('procesori.modeli.uredjaji');
Route::get('modeli/procesori/racunari/{id}', 'Modeli\ProcesoriKontroler@getRacunari')->name('procesori.modeli.racunari');

// Memorije
Route::get('modeli/memorije/', 'Modeli\MemorijeKontroler@getLista')->name('memorije.modeli');
Route::get('modeli/memorije/dodavanje', 'Modeli\MemorijeKontroler@getDodavanje')->name('memorije.modeli.dodavanje.get');
Route::post('modeli/memorije/dodavanje', 'Modeli\MemorijeKontroler@postDodavanje')->name('memorije.modeli.dodavanje.post');
Route::get('modeli/memorije/izmena/{id}', 'Modeli\MemorijeKontroler@getIzmena')->name('memorije.modeli.izmena.get');
Route::post('modeli/memorije/izmena/{id}', 'Modeli\MemorijeKontroler@postIzmena')->name('memorije.modeli.izmena.post');
Route::get('modeli/memorije/detalj/{id}', 'Modeli\MemorijeKontroler@getDetalj')->name('memorije.modeli.detalj');
Route::post('modeli/memorije/brisanje', 'Modeli\MemorijeKontroler@postBrisanje')->name('memorije.modeli.brisanje');
Route::get('modeli/memorije/uredjaji/{id}', 'Modeli\MemorijeKontroler@getUredjaji')->name('memorije.modeli.uredjaji');
Route::get('modeli/memorije/racunari/{id}', 'Modeli\MemorijeKontroler@getRacunari')->name('memorije.modeli.racunari');

// Maticne Ploce
Route::get('modeli/osnovne_ploce/', 'Modeli\OsnovnePloceKontroler@getLista')->name('osnovne_ploce.modeli');
Route::get('modeli/osnovne_ploce/dodavanje', 'Modeli\OsnovnePloceKontroler@getDodavanje')->name('osnovne_ploce.modeli.dodavanje.get');
Route::post('modeli/osnovne_ploce/dodavanje', 'Modeli\OsnovnePloceKontroler@postDodavanje')->name('osnovne_ploce.modeli.dodavanje.post');
Route::get('modeli/osnovne_ploce/izmena/{id}', 'Modeli\OsnovnePloceKontroler@getIzmena')->name('osnovne_ploce.modeli.izmena.get');
Route::post('modeli/osnovne_ploce/izmena/{id}', 'Modeli\OsnovnePloceKontroler@postIzmena')->name('osnovne_ploce.modeli.izmena.post');
Route::get('modeli/osnovne_ploce/detalj/{id}', 'Modeli\OsnovnePloceKontroler@getDetalj')->name('osnovne_ploce.modeli.detalj');
Route::post('modeli/osnovne_ploce/brisanje', 'Modeli\OsnovnePloceKontroler@postBrisanje')->name('osnovne_ploce.modeli.brisanje');
Route::get('modeli/osnovne_ploce/uredjaji/{id}', 'Modeli\OsnovnePloceKontroler@getUredjaji')->name('osnovne_ploce.modeli.uredjaji');
Route::get('modeli/osnovne_ploce/racunari/{id}', 'Modeli\OsnovnePloceKontroler@getRacunari')->name('osnovne_ploce.modeli.racunari');

// HDDovi
Route::get('modeli/hddovi/', 'Modeli\HddKontroler@getLista')->name('hddovi.modeli');
Route::get('modeli/hddovi/dodavanje', 'Modeli\HddKontroler@getDodavanje')->name('hddovi.modeli.dodavanje.get');
Route::post('modeli/hddovi/dodavanje', 'Modeli\HddKontroler@postDodavanje')->name('hddovi.modeli.dodavanje.post');
Route::get('modeli/hddovi/izmena/{id}', 'Modeli\HddKontroler@getIzmena')->name('hddovi.modeli.izmena.get');
Route::post('modeli/hddovi/izmena/{id}', 'Modeli\HddKontroler@postIzmena')->name('hddovi.modeli.izmena.post');
Route::get('modeli/hddovi/detalj/{id}', 'Modeli\HddKontroler@getDetalj')->name('hddovi.modeli.detalj');
Route::post('modeli/hddovi/brisanje', 'Modeli\HddKontroler@postBrisanje')->name('hddovi.modeli.brisanje');
Route::get('modeli/hddovi/uredjaji/{id}', 'Modeli\HddKontroler@getUredjaji')->name('hddovi.modeli.uredjaji');
Route::get('modeli/hddovi/racunari/{id}', 'Modeli\HddKontroler@getRacunari')->name('hddovi.modeli.racunari');

// VGA
Route::get('modeli/vga/', 'Modeli\GrafickiAdapteriKontroler@getLista')->name('vga.modeli');
Route::get('modeli/vga/dodavanje', 'Modeli\GrafickiAdapteriKontroler@getDodavanje')->name('vga.modeli.dodavanje.get');
Route::post('modeli/vga/dodavanje', 'Modeli\GrafickiAdapteriKontroler@postDodavanje')->name('vga.modeli.dodavanje.post');
Route::get('modeli/vga/izmena/{id}', 'Modeli\GrafickiAdapteriKontroler@getIzmena')->name('vga.modeli.izmena.get');
Route::post('modeli/vga/izmena/{id}', 'Modeli\GrafickiAdapteriKontroler@postIzmena')->name('vga.modeli.izmena.post');
Route::get('modeli/vga/detalj/{id}', 'Modeli\GrafickiAdapteriKontroler@getDetalj')->name('vga.modeli.detalj');
Route::post('modeli/vga/brisanje', 'Modeli\GrafickiAdapteriKontroler@postBrisanje')->name('vga.modeli.brisanje');
Route::get('modeli/vga/uredjaji/{id}', 'Modeli\GrafickiAdapteriKontroler@getUredjaji')->name('vga.modeli.uredjaji');
Route::get('modeli/vga/racunari/{id}', 'Modeli\GrafickiAdapteriKontroler@getRacunari')->name('vga.modeli.racunari');

// Napajanja
Route::get('modeli/napajanja/', 'Modeli\NapajanjaKontroler@getLista')->name('napajanja.modeli');
Route::get('modeli/napajanja/dodavanje', 'Modeli\NapajanjaKontroler@getDodavanje')->name('napajanja.modeli.dodavanje.get');
Route::post('modeli/napajanja/dodavanje', 'Modeli\NapajanjaKontroler@postDodavanje')->name('napajanja.modeli.dodavanje.post');
Route::get('modeli/napajanja/izmena/{id}', 'Modeli\NapajanjaKontroler@getIzmena')->name('napajanja.modeli.izmena.get');
Route::post('modeli/napajanja/izmena/{id}', 'Modeli\NapajanjaKontroler@postIzmena')->name('napajanja.modeli.izmena.post');
Route::get('modeli/napajanja/detalj/{id}', 'Modeli\NapajanjaKontroler@getDetalj')->name('napajanja.modeli.detalj');
Route::post('modeli/napajanja/brisanje', 'Modeli\NapajanjaKontroler@postBrisanje')->name('napajanja.modeli.brisanje');
Route::get('modeli/napajanja/uredjaji/{id}', 'Modeli\NapajanjaKontroler@getUredjaji')->name('napajanja.modeli.uredjaji');
Route::get('modeli/napajanja/racunari/{id}', 'Modeli\NapajanjaKontroler@getRacunari')->name('napajanja.modeli.racunari');

//Monitori
Route::get('modeli/monitori/', 'Modeli\MonitoriKontroler@getLista')->name('monitori.modeli');
Route::get('modeli/monitori/dodavanje', 'Modeli\MonitoriKontroler@getDodavanje')->name('monitori.modeli.dodavanje.get');
Route::post('modeli/monitori/dodavanje', 'Modeli\MonitoriKontroler@postDodavanje')->name('monitori.modeli.dodavanje.post');
Route::get('modeli/monitori/izmena/{id}', 'Modeli\MonitoriKontroler@getIzmena')->name('monitori.modeli.izmena.get');
Route::post('modeli/monitori/izmena/{id}', 'Modeli\MonitoriKontroler@postIzmena')->name('monitori.modeli.izmena.post');
Route::get('modeli/monitori/detalj/{id}', 'Modeli\MonitoriKontroler@getDetalj')->name('monitori.modeli.detalj');
Route::post('modeli/monitori/brisanje', 'Modeli\MonitoriKontroler@postBrisanje')->name('monitori.modeli.brisanje');
Route::get('modeli/monitori/uredjaji/{id}', 'Modeli\MonitoriKontroler@getUredjaji')->name('monitori.modeli.uredjaji');
Route::get('modeli/monitori/racunari/{id}', 'Modeli\MonitoriKontroler@getRacunari')->name('monitori.modeli.racunari');

//Stampaci
Route::get('modeli/stampaci/', 'Modeli\StampaciKontroler@getLista')->name('stampaci.modeli');
Route::get('modeli/stampaci/dodavanje', 'Modeli\StampaciKontroler@getDodavanje')->name('stampaci.modeli.dodavanje.get');
Route::post('modeli/stampaci/dodavanje', 'Modeli\StampaciKontroler@postDodavanje')->name('stampaci.modeli.dodavanje.post');
Route::get('modeli/stampaci/izmena/{id}', 'Modeli\StampaciKontroler@getIzmena')->name('stampaci.modeli.izmena.get');
Route::post('modeli/stampaci/izmena/{id}', 'Modeli\StampaciKontroler@postIzmena')->name('stampaci.modeli.izmena.post');
Route::get('modeli/stampaci/detalj/{id}', 'Modeli\StampaciKontroler@getDetalj')->name('stampaci.modeli.detalj');
Route::post('modeli/stampaci/brisanje', 'Modeli\StampaciKontroler@postBrisanje')->name('stampaci.modeli.brisanje');
Route::get('modeli/stampaci/uredjaji/{id}', 'Modeli\StampaciKontroler@getUredjaji')->name('stampaci.modeli.uredjaji');
Route::get('modeli/stampaci/racunari/{id}', 'Modeli\StampaciKontroler@getRacunari')->name('stampaci.modeli.racunari');

//Skeneri
Route::get('modeli/skeneri/', 'Modeli\SkeneriKontroler@getLista')->name('skeneri.modeli');
Route::get('modeli/skeneri/dodavanje', 'Modeli\SkeneriKontroler@getDodavanje')->name('skeneri.modeli.dodavanje.get');
Route::post('modeli/skeneri/dodavanje', 'Modeli\SkeneriKontroler@postDodavanje')->name('skeneri.modeli.dodavanje.post');
Route::get('modeli/skeneri/izmena/{id}', 'Modeli\SkeneriKontroler@getIzmena')->name('skeneri.modeli.izmena.get');
Route::post('modeli/skeneri/izmena/{id}', 'Modeli\SkeneriKontroler@postIzmena')->name('skeneri.modeli.izmena.post');
Route::get('modeli/skeneri/detalj/{id}', 'Modeli\SkeneriKontroler@getDetalj')->name('skeneri.modeli.detalj');
Route::post('modeli/skeneri/brisanje', 'Modeli\SkeneriKontroler@postBrisanje')->name('skeneri.modeli.brisanje');
Route::get('modeli/skeneri/uredjaji/{id}', 'Modeli\SkeneriKontroler@getUredjaji')->name('skeneri.modeli.uredjaji');
Route::get('modeli/skeneri/racunari/{id}', 'Modeli\SkeneriKontroler@getRacunari')->name('skeneri.modeli.racunari');

//Upsevi
Route::get('modeli/upsevi/', 'Modeli\UpseviKontroler@getLista')->name('upsevi.modeli');
Route::get('modeli/upsevi/dodavanje', 'Modeli\UpseviKontroler@getDodavanje')->name('upsevi.modeli.dodavanje.get');
Route::post('modeli/upsevi/dodavanje', 'Modeli\UpseviKontroler@postDodavanje')->name('upsevi.modeli.dodavanje.post');
Route::get('modeli/upsevi/izmena/{id}', 'Modeli\UpseviKontroler@getIzmena')->name('upsevi.modeli.izmena.get');
Route::post('modeli/upsevi/izmena/{id}', 'Modeli\UpseviKontroler@postIzmena')->name('upsevi.modeli.izmena.post');
Route::get('modeli/upsevi/detalj/{id}', 'Modeli\UpseviKontroler@getDetalj')->name('upsevi.modeli.detalj');
Route::post('modeli/upsevi/brisanje', 'Modeli\UpseviKontroler@postBrisanje')->name('upsevi.modeli.brisanje');
Route::get('modeli/upsevi/uredjaji/{id}', 'Modeli\UpseviKontroler@getUredjaji')->name('upsevi.modeli.uredjaji');


//OPREMA
//Procesori
Route::get('oprema/procesori/', 'Oprema\ProcesoriKontroler@getLista')->name('procesori.oprema');
Route::get('oprema/procesori/otpisani/', 'Oprema\ProcesoriKontroler@getListaOtpisani')->name('procesori.oprema.otpisani');
Route::get('oprema/procesori/detalj/{id}', 'Oprema\ProcesoriKontroler@getDetalj')->name('procesori.oprema.detalj');
Route::get('oprema/procesori/izmena/{id}', 'Oprema\ProcesoriKontroler@getIzmena')->name('procesori.oprema.izmena.get');
Route::post('oprema/procesori/izmena/{id}', 'Oprema\ProcesoriKontroler@postIzmena')->name('procesori.oprema.izmena.post');
Route::post('oprema/procesori/otpis/', 'Oprema\ProcesoriKontroler@postOtpis')->name('procesori.oprema.otpis');
Route::post('oprema/procesori/vracanje_otpis/', 'Oprema\ProcesoriKontroler@postOtpisVracanje')->name('procesori.oprema.vracanje_otpis');
Route::post('oprema/procesori/recikliranje/lista/', 'Oprema\ProcesoriKontroler@postReciklirajLista')->name('procesori.oprema.recikliranje.lista');
Route::post('oprema/procesori/recikliranje/{id_reciklaze}', 'Oprema\ProcesoriKontroler@postRecikliraj')->name('procesori.oprema.recikliranje');

//Osnovne ploce
Route::get('oprema/osnovne_ploce/', 'Oprema\OsnovnePloceKontroler@getLista')->name('osnovne_ploce.oprema');
Route::get('oprema/osnovne_ploce/otpisani/', 'Oprema\OsnovnePloceKontroler@getListaOtpisani')->name('osnovne_ploce.oprema.otpisani');
Route::get('oprema/osnovne_ploce/detalj/{id}', 'Oprema\OsnovnePloceKontroler@getDetalj')->name('osnovne_ploce.oprema.detalj');
Route::get('oprema/osnovne_ploce/izmena/{id}', 'Oprema\OsnovnePloceKontroler@getIzmena')->name('osnovne_ploce.oprema.izmena.get');
Route::post('oprema/osnovne_ploce/izmena/{id}', 'Oprema\OsnovnePloceKontroler@postIzmena')->name('osnovne_ploce.oprema.izmena.post');
Route::post('oprema/osnovne_ploce/otpis/', 'Oprema\OsnovnePloceKontroler@postOtpis')->name('osnovne_ploce.oprema.otpis');
Route::post('oprema/osnovne_ploce/vracanje_otpis/', 'Oprema\OsnovnePloceKontroler@postOtpisVracanje')->name('osnovne_ploce.oprema.vracanje_otpis');
Route::post('oprema/osnovne_ploce/recikliranje/lista/', 'Oprema\OsnovnePloceKontroler@postReciklirajLista')->name('osnovne_ploce.oprema.recikliranje.lista');
Route::post('oprema/osnovne_ploce/recikliranje/{id_reciklaze}', 'Oprema\OsnovnePloceKontroler@postRecikliraj')->name('osnovne_ploce.oprema.recikliranje');

//Memorije
Route::get('oprema/memorije/', 'Oprema\MemorijeKontroler@getLista')->name('memorije.oprema');
Route::get('oprema/memorije/otpisani/', 'Oprema\MemorijeKontroler@getListaOtpisani')->name('memorije.oprema.otpisani');
Route::get('oprema/memorije/detalj/{id}', 'Oprema\MemorijeKontroler@getDetalj')->name('memorije.oprema.detalj');
Route::get('oprema/memorije/izmena/{id}', 'Oprema\MemorijeKontroler@getIzmena')->name('memorije.oprema.izmena.get');
Route::post('oprema/memorije/izmena/{id}', 'Oprema\MemorijeKontroler@postIzmena')->name('memorije.oprema.izmena.post');
Route::post('oprema/memorije/otpis/', 'Oprema\MemorijeKontroler@postOtpis')->name('memorije.oprema.otpis');
Route::post('oprema/memorije/vracanje_otpis/', 'Oprema\MemorijeKontroler@postOtpisVracanje')->name('memorije.oprema.vracanje_otpis');
Route::post('oprema/memorije/recikliranje/lista/', 'Oprema\MemorijeKontroler@postReciklirajLista')->name('memorije.oprema.recikliranje.lista');
Route::post('oprema/memorije/recikliranje/{id_reciklaze}', 'Oprema\MemorijeKontroler@postRecikliraj')->name('memorije.oprema.recikliranje');

//HDDovi
Route::get('oprema/hddovi/', 'Oprema\HddKontroler@getLista')->name('hddovi.oprema');
Route::get('oprema/hddovi/otpisani/', 'Oprema\HddKontroler@getListaOtpisani')->name('hddovi.oprema.otpisani');
Route::get('oprema/hddovi/detalj/{id}', 'Oprema\HddKontroler@getDetalj')->name('hddovi.oprema.detalj');
Route::get('oprema/hddovi/izmena/{id}', 'Oprema\HddKontroler@getIzmena')->name('hddovi.oprema.izmena.get');
Route::post('oprema/hddovi/izmena/{id}', 'Oprema\HddKontroler@postIzmena')->name('hddovi.oprema.izmena.post');
Route::post('oprema/hddovi/otpis/', 'Oprema\HddKontroler@postOtpis')->name('hddovi.oprema.otpis');
Route::post('oprema/hddovi/vracanje_otpis/', 'Oprema\HddKontroler@postOtpisVracanje')->name('hddovi.oprema.vracanje_otpis');
Route::post('oprema/hddovi/recikliranje/lista/', 'Oprema\HddKontroler@postReciklirajLista')->name('hddovi.oprema.recikliranje.lista');
Route::post('oprema/hddovi/recikliranje/{id_reciklaze}', 'Oprema\HddKontroler@postRecikliraj')->name('hddovi.oprema.recikliranje');

//VGA
Route::get('oprema/vga/', 'Oprema\GrafickiAdapteriKontroler@getLista')->name('vga.oprema');
Route::get('oprema/vga/otpisani/', 'Oprema\GrafickiAdapteriKontroler@getListaOtpisani')->name('vga.oprema.otpisani');
Route::get('oprema/vga/detalj/{id}', 'Oprema\GrafickiAdapteriKontroler@getDetalj')->name('vga.oprema.detalj');
Route::get('oprema/vga/izmena/{id}', 'Oprema\GrafickiAdapteriKontroler@getIzmena')->name('vga.oprema.izmena.get');
Route::post('oprema/vga/izmena/{id}', 'Oprema\GrafickiAdapteriKontroler@postIzmena')->name('vga.oprema.izmena.post');
Route::post('oprema/vga/otpis/', 'Oprema\GrafickiAdapteriKontroler@postOtpis')->name('vga.oprema.otpis');
Route::post('oprema/vga/vracanje_otpis/', 'Oprema\GrafickiAdapteriKontroler@postOtpisVracanje')->name('vga.oprema.vracanje_otpis');
Route::post('oprema/vga/recikliranje/lista/', 'Oprema\GrafickiAdapteriKontroler@postReciklirajLista')->name('vga.oprema.recikliranje.lista');
Route::post('oprema/vga/recikliranje/{id_reciklaze}', 'Oprema\GrafickiAdapteriKontroler@postRecikliraj')->name('vga.oprema.recikliranje');

//Napajanja
Route::get('oprema/napajanja/', 'Oprema\NapajanjaKontroler@getLista')->name('napajanja.oprema');
Route::get('oprema/napajanja/otpisani/', 'Oprema\NapajanjaKontroler@getListaOtpisani')->name('napajanja.oprema.otpisani');
Route::get('oprema/napajanja/detalj/{id}', 'Oprema\NapajanjaKontroler@getDetalj')->name('napajanja.oprema.detalj');
Route::get('oprema/napajanja/izmena/{id}', 'Oprema\NapajanjaKontroler@getIzmena')->name('napajanja.oprema.izmena.get');
Route::post('oprema/napajanja/izmena/{id}', 'Oprema\NapajanjaKontroler@postIzmena')->name('napajanja.oprema.izmena.post');
Route::post('oprema/napajanja/otpis/', 'Oprema\NapajanjaKontroler@postOtpis')->name('napajanja.oprema.otpis');
Route::post('oprema/napajanja/vracanje_otpis/', 'Oprema\NapajanjaKontroler@postOtpisVracanje')->name('napajanja.oprema.vracanje_otpis');
Route::post('oprema/napajanja/recikliranje/lista/', 'Oprema\NapajanjaKontroler@postReciklirajLista')->name('napajanja.oprema.recikliranje.lista');
Route::post('oprema/napajanja/recikliranje/{id_reciklaze}', 'Oprema\NapajanjaKontroler@postRecikliraj')->name('napajanja.oprema.recikliranje');

//Monitori
Route::get('oprema/monitori/', 'Oprema\MonitoriKontroler@getLista')->name('monitori.oprema');
Route::get('oprema/monitori/otpisani/', 'Oprema\MonitoriKontroler@getListaOtpisani')->name('monitori.oprema.otpisani');
Route::get('oprema/monitori/detalj/{id}', 'Oprema\MonitoriKontroler@getDetalj')->name('monitori.oprema.detalj');
Route::get('oprema/monitori/izmena/{id}', 'Oprema\MonitoriKontroler@getIzmena')->name('monitori.oprema.izmena.get');
Route::post('oprema/monitori/izmena/{id}', 'Oprema\MonitoriKontroler@postIzmena')->name('monitori.oprema.izmena.post');
Route::post('oprema/monitori/otpis/', 'Oprema\MonitoriKontroler@postOtpis')->name('monitori.oprema.otpis');
Route::post('oprema/monitori/vracanje_otpis/', 'Oprema\MonitoriKontroler@postOtpisVracanje')->name('monitori.oprema.vracanje_otpis');
Route::post('oprema/monitori/recikliranje/lista/', 'Oprema\MonitoriKontroler@postReciklirajLista')->name('monitori.oprema.recikliranje.lista');
Route::post('oprema/monitori/recikliranje/{id_reciklaze}', 'Oprema\MonitoriKontroler@postRecikliraj')->name('monitori.oprema.recikliranje');

//Stampaci
Route::get('oprema/stampaci/', 'Oprema\StampaciKontroler@getLista')->name('stampaci.oprema');
Route::get('oprema/stampaci/otpisani/', 'Oprema\StampaciKontroler@getListaOtpisani')->name('stampaci.oprema.otpisani');
Route::get('oprema/stampaci/detalj/{id}', 'Oprema\StampaciKontroler@getDetalj')->name('stampaci.oprema.detalj');
Route::get('oprema/stampaci/izmena/{id}', 'Oprema\StampaciKontroler@getIzmena')->name('stampaci.oprema.izmena.get');
Route::post('oprema/stampaci/izmena/{id}', 'Oprema\StampaciKontroler@postIzmena')->name('stampaci.oprema.izmena.post');
Route::post('oprema/stampaci/otpis/', 'Oprema\StampaciKontroler@postOtpis')->name('stampaci.oprema.otpis');
Route::post('oprema/stampaci/vracanje_otpis/', 'Oprema\StampaciKontroler@postOtpisVracanje')->name('stampaci.oprema.vracanje_otpis');
Route::post('oprema/stampaci/recikliranje/lista/', 'Oprema\StampaciKontroler@postReciklirajLista')->name('stampaci.oprema.recikliranje.lista');
Route::post('oprema/stampaci/recikliranje/{id_reciklaze}', 'Oprema\StampaciKontroler@postRecikliraj')->name('stampaci.oprema.recikliranje');

//Skeneri
Route::get('oprema/skeneri/', 'Oprema\SkeneriKontroler@getLista')->name('skeneri.oprema');
Route::get('oprema/skeneri/otpisani/', 'Oprema\SkeneriKontroler@getListaOtpisani')->name('skeneri.oprema.otpisani');
Route::get('oprema/skeneri/detalj/{id}', 'Oprema\SkeneriKontroler@getDetalj')->name('skeneri.oprema.detalj');
Route::get('oprema/skeneri/izmena/{id}', 'Oprema\SkeneriKontroler@getIzmena')->name('skeneri.oprema.izmena.get');
Route::post('oprema/skeneri/izmena/{id}', 'Oprema\SkeneriKontroler@postIzmena')->name('skeneri.oprema.izmena.post');
Route::post('oprema/skeneri/otpis/', 'Oprema\SkeneriKontroler@postOtpis')->name('skeneri.oprema.otpis');
Route::post('oprema/skeneri/vracanje_otpis/', 'Oprema\SkeneriKontroler@postOtpisVracanje')->name('skeneri.oprema.vracanje_otpis');
Route::post('oprema/skeneri/recikliranje/lista/', 'Oprema\SkeneriKontroler@postReciklirajLista')->name('skeneri.oprema.recikliranje.lista');
Route::post('oprema/skeneri/recikliranje/{id_reciklaze}', 'Oprema\SkeneriKontroler@postRecikliraj')->name('skeneri.oprema.recikliranje');

//Upsevi
Route::get('oprema/upsevi/', 'Oprema\UpseviKontroler@getLista')->name('upsevi.oprema');
Route::get('oprema/upsevi/otpisani/', 'Oprema\UpseviKontroler@getListaOtpisani')->name('upsevi.oprema.otpisani');
Route::get('oprema/upsevi/detalj/{id}', 'Oprema\UpseviKontroler@getDetalj')->name('upsevi.oprema.detalj');
Route::get('oprema/upsevi/izmena/{id}', 'Oprema\UpseviKontroler@getIzmena')->name('upsevi.oprema.izmena.get');
Route::post('oprema/upsevi/izmena/{id}', 'Oprema\UpseviKontroler@postIzmena')->name('upsevi.oprema.izmena.post');
Route::post('oprema/upsevi/otpis/', 'Oprema\UpseviKontroler@postOtpis')->name('upsevi.oprema.otpis');
Route::post('oprema/upsevi/vracanje_otpis/', 'Oprema\UpseviKontroler@postOtpisVracanje')->name('upsevi.oprema.vracanje_otpis');
Route::post('oprema/upsevi/recikliranje/lista/', 'Oprema\UpseviKontroler@postReciklirajLista')->name('upsevi.oprema.recikliranje.lista');
Route::post('oprema/upsevi/recikliranje/{id_reciklaze}', 'Oprema\UpseviKontroler@postRecikliraj')->name('upsevi.oprema.recikliranje');

//Projektori
Route::get('oprema/projektori/', 'Oprema\ProjektoriKontroler@getLista')->name('projektori.oprema');
Route::get('oprema/projektori/otpisani/', 'Oprema\ProjektoriKontroler@getListaOtpisani')->name('projektori.oprema.otpisani');
Route::get('oprema/projektori/detalj/{id}', 'Oprema\ProjektoriKontroler@getDetalj')->name('projektori.oprema.detalj');
Route::get('oprema/projektori/izmena/{id}', 'Oprema\ProjektoriKontroler@getIzmena')->name('projektori.oprema.izmena.get');
Route::post('oprema/projektori/izmena/{id}', 'Oprema\ProjektoriKontroler@postIzmena')->name('projektori.oprema.izmena.post');
Route::post('oprema/projektori/otpis/', 'Oprema\ProjektoriKontroler@postOtpis')->name('projektori.oprema.otpis');
Route::post('oprema/projektori/vracanje_otpis/', 'Oprema\ProjektoriKontroler@postOtpisVracanje')->name('projektori.oprema.vracanje_otpis');
Route::post('oprema/projektori/recikliranje/lista/', 'Oprema\ProjektoriKontroler@postReciklirajLista')->name('projektori.oprema.recikliranje.lista');
Route::post('oprema/projektori/recikliranje/{id_reciklaze}', 'Oprema\ProjektoriKontroler@postRecikliraj')->name('projektori.oprema.recikliranje');

//Mrezni uredjaji
Route::get('oprema/mrezni/', 'Oprema\MrezniUredjajiKontroler@getLista')->name('mrezni.oprema');
Route::get('oprema/mrezni/otpisani/', 'Oprema\MrezniUredjajiKontroler@getListaOtpisani')->name('mrezni.oprema.otpisani');
Route::get('oprema/mrezni/detalj/{id}', 'Oprema\MrezniUredjajiKontroler@getDetalj')->name('mrezni.oprema.detalj');
Route::get('oprema/mrezni/izmena/{id}', 'Oprema\MrezniUredjajiKontroler@getIzmena')->name('mrezni.oprema.izmena.get');
Route::post('oprema/mrezni/izmena/{id}', 'Oprema\MrezniUredjajiKontroler@postIzmena')->name('mrezni.oprema.izmena.post');
Route::post('oprema/mrezni/otpis/', 'Oprema\MrezniUredjajiKontroler@postOtpis')->name('mrezni.oprema.otpis');
Route::post('oprema/mrezni/vracanje_otpis/', 'Oprema\MrezniUredjajiKontroler@postOtpisVracanje')->name('mrezni.oprema.vracanje_otpis');
Route::post('oprema/mrezni/recikliranje/lista/', 'Oprema\MrezniUredjajiKontroler@postReciklirajLista')->name('mrezni.oprema.recikliranje.lista');
Route::post('oprema/mrezni/recikliranje/{id_reciklaze}', 'Oprema\MrezniUredjajiKontroler@postRecikliraj')->name('mrezni.oprema.recikliranje');

//Racunari
Route::get('oprema/racunari/', 'Oprema\RacunariKontroler@getLista')->name('racunari.oprema');
Route::get('oprema/racunari/ajax', 'Oprema\RacunariKontroler@getAjax')->name('racunari.ajax');
Route::get('oprema/racunari/detalj/{id}', 'Oprema\RacunariKontroler@getDetalj')->name('racunari.oprema.detalj');
Route::get('oprema/racunari/dodavanje', 'Oprema\RacunariKontroler@getDodavanje')->name('racunari.oprema.dodavanje.get');
Route::post('oprema/racunari/dodavanje', 'Oprema\RacunariKontroler@postDodavanje')->name('racunari.oprema.dodavanje.post');
Route::get('oprema/racunari/otpis/{id}', 'Oprema\RacunariKontroler@getOtpis')->name('racunari.oprema.otpis');
Route::post('oprema/racunari/otpis', 'Oprema\RacunariKontroler@postOtpis')->name('racunari.oprema.otpis.post');
//Racunari - aplikacije
Route::get('oprema/racunari/aplikacije/{id}', 'Oprema\RacunariKontroler@getAplikacije')->name('racunari.oprema.aplikacije');
Route::post('oprema/racunari/aplikacije/{id}', 'Oprema\RacunariKontroler@postAplikacije')->name('racunari.oprema.aplikacije.post');
Route::post('oprema/aplikacije/brisanje/{id}', 'Oprema\RacunariKontroler@postBrisanjeAplikacije')->name('racunari.oprema.aplikacije.bisanje');
//Racunari - skeneriploce
Route::get('oprema/racunari/ploce/{id}', 'Oprema\RacunariKontroler@getPloce')->name('racunari.oprema.ploce');
Route::get('oprema/racunari/ploce/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiPlocu')->name('racunari.oprema.ploce.izvadi');
Route::get('oprema/racunari/ploce/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiPlocu')->name('racunari.oprema.ploce.izvadi.obrisi');
Route::post('oprema/racunari/ploce/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajPlocuNovu')->name('racunari.oprema.ploce.dodaj.novu');
Route::post('oprema/racunari/ploce/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajPlocuPostojecu')->name('racunari.oprema.ploce.dodaj.postojecu');
//Racunari - procesori
Route::get('oprema/racunari/procesori/{id}', 'Oprema\RacunariKontroler@getProcesore')->name('racunari.oprema.procesori');
Route::get('oprema/racunari/procesori/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiProcesor')->name('racunari.oprema.procesori.izvadi');
Route::get('oprema/racunari/procesori/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiProcesor')->name('racunari.oprema.procesori.izvadi.obrisi');
Route::post('oprema/racunari/procesori/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajProcesorNovi')->name('racunari.oprema.procesori.dodaj.novu');
Route::post('oprema/racunari/procesori/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajProcesorPostojeci')->name('racunari.oprema.procesori.dodaj.postojecu');
//Racunari - memorija
Route::get('oprema/racunari/memorije/{id}', 'Oprema\RacunariKontroler@getMemorije')->name('racunari.oprema.memorije');
Route::get('oprema/racunari/memorije/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiMemoriju')->name('racunari.oprema.memorije.izvadi');
Route::get('oprema/racunari/memorije/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiMemoriju')->name('racunari.oprema.memorije.izvadi.obrisi');
Route::post('oprema/racunari/memorije/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajMemorijuNovu')->name('racunari.oprema.memorije.dodaj.novu');
Route::post('oprema/racunari/memorije/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajMemorijuPostojecu')->name('racunari.oprema.memorije.dodaj.postojecu');
//Racunari - hdd
Route::get('oprema/racunari/hddovi/{id}', 'Oprema\RacunariKontroler@getHddove')->name('racunari.oprema.hddovi');
Route::get('oprema/racunari/hddovi/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiHdd')->name('racunari.oprema.hddovi.izvadi');
Route::get('oprema/racunari/hddovi/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiHdd')->name('racunari.oprema.hddovi.izvadi.obrisi');
Route::post('oprema/racunari/hddovi/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajHddNovi')->name('racunari.oprema.hddovi.dodaj.novu');
Route::post('oprema/racunari/hddovi/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajHddPostojeci')->name('racunari.oprema.hddovi.dodaj.postojecu');
//Racunari - napajanja
Route::get('oprema/racunari/napajanja/{id}', 'Oprema\RacunariKontroler@getNapajanja')->name('racunari.oprema.napajanja');
Route::get('oprema/racunari/napajanja/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiNapajanje')->name('racunari.oprema.napajanja.izvadi');
Route::get('oprema/racunari/napajanja/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiNapajanje')->name('racunari.oprema.napajanja.izvadi.obrisi');
Route::post('oprema/racunari/napajanja/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajNapajanjeNovo')->name('racunari.oprema.napajanja.dodaj.novu');
Route::post('oprema/racunari/napajanja/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajNapajanjePostojece')->name('racunari.oprema.napajanja.dodaj.postojecu');
//Racunari - vga
Route::get('oprema/racunari/vga/{id}', 'Oprema\RacunariKontroler@getVga')->name('racunari.oprema.vga');
Route::get('oprema/racunari/vga/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiVga')->name('racunari.oprema.vga.izvadi');
Route::get('oprema/racunari/vga/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiVga')->name('racunari.oprema.vga.izvadi.obrisi');
Route::post('oprema/racunari/vga/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajVgaNovi')->name('racunari.oprema.vga.dodaj.novu');
Route::post('oprema/racunari/vga/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajVgaPostojeci')->name('racunari.oprema.vga.dodaj.postojecu');
//Racunari - monitori
Route::get('oprema/racunari/monitori/{id}', 'Oprema\RacunariKontroler@getMonitor')->name('racunari.oprema.monitori');
Route::get('oprema/racunari/monitori/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiMonitor')->name('racunari.oprema.monitori.izvadi');
Route::get('oprema/racunari/monitori/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiMonitor')->name('racunari.oprema.monitori.izvadi.obrisi');
Route::post('oprema/racunari/monitori/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajMonitorNovi')->name('racunari.oprema.monitori.dodaj.novu');
Route::post('oprema/racunari/monitori/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajMonitorPostojeci')->name('racunari.oprema.monitori.dodaj.postojecu');
//Racunari - stampaci
Route::get('oprema/racunari/stampaci/{id}', 'Oprema\RacunariKontroler@getStampac')->name('racunari.oprema.stampaci');
Route::get('oprema/racunari/stampaci/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiStampac')->name('racunari.oprema.stampaci.izvadi');
Route::get('oprema/racunari/stampaci/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiStampac')->name('racunari.oprema.stampaci.izvadi.obrisi');
Route::post('oprema/racunari/stampaci/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajStampacNovi')->name('racunari.oprema.stampaci.dodaj.novu');
Route::post('oprema/racunari/stampaci/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajStampacPostojeci')->name('racunari.oprema.stampaci.dodaj.postojecu');
//Racunari - skeneri
Route::get('oprema/racunari/skeneri/{id}', 'Oprema\RacunariKontroler@getSkener')->name('racunari.oprema.skeneri');
Route::get('oprema/racunari/skeneri/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiSkener')->name('racunari.oprema.skeneri.izvadi');
Route::get('oprema/racunari/skeneri/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiSkener')->name('racunari.oprema.skeneri.izvadi.obrisi');
Route::post('oprema/racunari/skeneri/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajSkenerNovi')->name('racunari.oprema.skeneri.dodaj.novu');
Route::post('oprema/racunari/skeneri/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajSkenerPostojeci')->name('racunari.oprema.skeneri.dodaj.postojecu');



