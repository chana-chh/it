<?php

Route::get('/', 'PocetnaKontroler@pocetna')->name('pocetna');
Route::post('greska/brisanje', 'PocetnaKontroler@postBrisanje')->name('greska.brisanje');

Route::get('imenik', 'PretragaKontroler@getPretraga')->name('imenik');
Route::get('napredna', 'PretragaKontroler@getNaprednaPretraga')->name('napredna.get');
Route::post('napredna', 'PretragaKontroler@postNaprednaPretraga')->name('napredna.post');
Route::get('kvar', 'PretragaKontroler@getPrijavaKvara')->name('kvar');
Route::post('kvar', 'PretragaKontroler@postPrijavaKvara')->name('kvar.post');
Route::get('status/{id}', 'PretragaKontroler@getStatus')->name('status');
Route::get('plan/{id}', 'PretragaKontroler@getPlan')->name('plan');
Route::get('forma', 'PretragaKontroler@getForma')->name('forma');
Route::post('forma', 'PretragaKontroler@postForma')->name('forma.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('/password/reset', 'Auth\ForgotPasswordController@reset');
//Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('/register', 'Auth\RegisterController@register');
// STATISTIKA
Route::get('statistika', 'StatistikaKontroler@getLista')->name('statistika');
Route::get('statistika/os', 'StatistikaKontroler@getOs')->name('statistika.os');
Route::get('statistika/cpu', 'StatistikaKontroler@getCpu')->name('statistika.cpu');
Route::get('statistika/ocene', 'StatistikaKontroler@getOcene')->name('statistika.ocene');
Route::get('statistika/upraveotpis', 'StatistikaKontroler@getUpraveOtpis')->name('statistika.upraveotpis');


// SERVIS
//Servis
Route::get('servis', 'Servis\ServisKontroler@getLista')->name('servis');
Route::get('servis/detalj/{id}', 'Servis\ServisKontroler@getDetalj')->name('servis.detalj');
Route::get('servis/redirekt/{id}/{vrsta}', 'Servis\ServisKontroler@redirectDetalj')->name('servis.redirekt');
Route::get('servis/izmena/{id}', 'Servis\ServisKontroler@getIzmena')->name('servis.izmena.get');
Route::post('servis/izmena/{id}', 'Servis\ServisKontroler@postIzmena')->name('servis.izmena.post');
Route::post('servis/ajax', 'Servis\ServisKontroler@postAjax')->name('servis.ajax.post');
Route::post('servis/dodaj/pokvaren/{id}', 'Servis\ServisKontroler@postDodajPokvaren')->name('servis.pokvaren.post');
Route::post('servis/brisanje/pokvaren/{id}', 'Servis\ServisKontroler@postBrisanjeKvara')->name('servis.brisanje.pokvaren');

// Ugovori
Route::get('ugovori', 'Servis\UgovoriOdrzavanjaKontroler@getLista')->name('ugovori');
Route::get('ugovori/dodavanje', 'Servis\UgovoriOdrzavanjaKontroler@getDodavanje')->name('ugovori.dodavanje.get');
Route::post('ugovori/dodavanje', 'Servis\UgovoriOdrzavanjaKontroler@postDodavanje')->name('ugovori.dodavanje.post');
Route::get('ugovori/izmena/{id}', 'Servis\UgovoriOdrzavanjaKontroler@getIzmena')->name('ugovori.izmena.get');
Route::post('ugovori/izmena/{id}', 'Servis\UgovoriOdrzavanjaKontroler@postIzmena')->name('ugovori.izmena.post');
Route::get('ugovori/detalj/{id}', 'Servis\UgovoriOdrzavanjaKontroler@getDetalj')->name('ugovori.detalj');
Route::post('ugovori/brisanje', 'Servis\UgovoriOdrzavanjaKontroler@postBrisanje')->name('ugovori.brisanje');
Route::get('ugovori/aktivni', 'Servis\UgovoriOdrzavanjaKontroler@getAktivni')->name('ugovori.aktivni');

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
Route::post('otpremnice/dodavanje/slike/{id}', 'Servis\OtpremniceKontroler@postDodavanjeSlike')->name('otpremnice.dodavanje.slike');
Route::post('otpremnice/brisanje/slike', 'Servis\OtpremniceKontroler@postBrisanjeSlike')->name('otpremnice.brisanje.slike');
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
Route::post('stavke/cpu/dodavanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postCpuDodavanje')->name('stavke.cpu.dodavanje');
Route::post('stavke/hdd/dodavanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postHddDodavanje')->name('stavke.hdd.dodavanje');
Route::post('stavke/mbd/dodavanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postMbdDodavanje')->name('stavke.mbd.dodavanje');
Route::post('stavke/psu/dodavanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postPsuDodavanje')->name('stavke.psu.dodavanje');
Route::post('stavke/ram/dodavanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postRamDodavanje')->name('stavke.ram.dodavanje');
Route::post('stavke/vga/dodavanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postVgaDodavanje')->name('stavke.vga.dodavanje');
// Nabavke-otpremnice stavke pregled uredjaja
Route::get('stavke/uredjaji/pregled/{vrsta}/{id}', 'Servis\NabavkeOtpremniceStavkeKontroler@getPregledUredjaja')->name('stavke.uredjaji.pregled');
// Nabavke-otpremnice stavke brisanje uredjaja
Route::post('stavke/uredjaji/brisanje', 'Servis\NabavkeOtpremniceStavkeKontroler@postBrisanjeUredjaja')->name('stavke.uredjaji.brisanje');

// SIFARNICI
// Proizvodjaci
Route::get('proizvodjaci', 'Sifarnici\ProizvodjaciKontroler@getLista')->name('proizvodjaci');
Route::post('proizvodjaci/dodavanje', 'Sifarnici\ProizvodjaciKontroler@postDodavanje')->name('proizvodjaci.dodavanje');
Route::post('proizvodjaci/brisanje', 'Sifarnici\ProizvodjaciKontroler@postBrisanje')->name('proizvodjaci.brisanje');
Route::post('proizvodjaci/izmena', 'Sifarnici\ProizvodjaciKontroler@postIzmena')->name('proizvodjaci.izmena');
Route::post('proizvodjaci/detalj', 'Sifarnici\ProizvodjaciKontroler@postDetalj')->name('proizvodjaci.detalj');

// Korisnici
Route::get('korisnici', 'KorisniciKontroler@getLista')->name('korisnici');
Route::post('korisnici/dodavanje', 'KorisniciKontroler@postDodavanje')->name('korisnici.dodavanje');
Route::post('korisnici/brisanje', 'KorisniciKontroler@postBrisanje')->name('korisnici.brisanje');
Route::post('korisnici/izmena/{id}', 'KorisniciKontroler@postIzmena')->name('korisnici.izmena');
Route::get('korisnici/pregled/{id}', 'KorisniciKontroler@getPregled')->name('korisnici.pregled');

// Dobavljaci
Route::get('dobavljaci', 'Sifarnici\DobavljaciKontroler@getLista')->name('dobavljaci');
Route::get('dobavljaci/dodavanje', 'Sifarnici\DobavljaciKontroler@getDodavanje')->name('dobavljaci.dodavanje.get');
Route::post('dobavljaci/dodavanje', 'Sifarnici\DobavljaciKontroler@postDodavanje')->name('dobavljaci.dodavanje.post');
Route::get('dobavljaci/izmena/{id}', 'Sifarnici\DobavljaciKontroler@getIzmena')->name('dobavljaci.izmena.get');
Route::post('dobavljaci/izmena/{id}', 'Sifarnici\DobavljaciKontroler@postIzmena')->name('dobavljaci.izmena.post');
Route::get('dobavljaci/detalj/{id}', 'Sifarnici\DobavljaciKontroler@getDetalj')->name('dobavljaci.detalj');
Route::post('dobavljaci/brisanje', 'Sifarnici\DobavljaciKontroler@postBrisanje')->name('dobavljaci.brisanje');

// Lokacije
Route::get('lokacije', 'Sifarnici\LokacijeKontroler@getLista')->name('lokacije');
Route::post('lokacije/dodavanje', 'Sifarnici\LokacijeKontroler@postDodavanje')->name('lokacije.dodavanje');
Route::post('lokacije/dodavanje/ajax', 'Sifarnici\LokacijeKontroler@postAjax')->name('lokacije.dodavanje.ajax');
Route::post('lokacije/brisanje', 'Sifarnici\LokacijeKontroler@postBrisanje')->name('lokacije.brisanje');
Route::post('lokacije/izmena', 'Sifarnici\LokacijeKontroler@postIzmena')->name('lokacije.izmena');
Route::post('lokacije/detalj', 'Sifarnici\LokacijeKontroler@postDetalj')->name('lokacije.detalj');

// Spratovi
Route::get('spratovi', 'Sifarnici\SpratoviKontroler@getLista')->name('spratovi');
Route::post('spratovi/dodavanje', 'Sifarnici\SpratoviKontroler@postDodavanje')->name('spratovi.dodavanje');
Route::post('spratovi/brisanje', 'Sifarnici\SpratoviKontroler@postBrisanje')->name('spratovi.brisanje');
Route::post('spratovi/izmena', 'Sifarnici\SpratoviKontroler@postIzmena')->name('spratovi.izmena');
Route::post('spratovi/detalj', 'Sifarnici\SpratoviKontroler@postDetalj')->name('spratovi.detalj');

// Reciklaza
Route::get('reciklaze', 'Sifarnici\ReciklazeKontroler@getLista')->name('reciklaze');
Route::get('reciklaze/uredjaji/{datum}', 'Sifarnici\ReciklazeKontroler@getRecikliraniUredjaji')->name('reciklaze.uredjaji');
Route::post('reciklaze/dodavanje', 'Sifarnici\ReciklazeKontroler@postDodavanje')->name('reciklaze.dodavanje');
Route::post('reciklaze/brisanje', 'Sifarnici\ReciklazeKontroler@postBrisanje')->name('reciklaze.brisanje');
Route::post('reciklaze/izmena', 'Sifarnici\ReciklazeKontroler@postIzmena')->name('reciklaze.izmena');
Route::post('reciklaze/detalj', 'Sifarnici\ReciklazeKontroler@postDetalj')->name('reciklaze.detalj');

// Kancelarije
Route::get('kancelarije', 'Sifarnici\KancelarijeKontroler@getLista')->name('kancelarije');
Route::post('kancelarije/koordinate', 'Sifarnici\KancelarijeKontroler@postKoordinate')->name('kancelarije.koordinate');
Route::get('kancelarije/detaljno/{id}', 'Sifarnici\KancelarijeKontroler@getDetalj')->name('kancelarije.detalj.get');
Route::get('kancelarije/tlocrt/{id}', 'Sifarnici\KancelarijeKontroler@getTlocrt')->name('kancelarije.tlocrt.get');
Route::post('kancelarije/dodavanje', 'Sifarnici\KancelarijeKontroler@postDodavanje')->name('kancelarije.dodavanje');
Route::post('kancelarije/brisanje', 'Sifarnici\KancelarijeKontroler@postBrisanje')->name('kancelarije.brisanje');
Route::post('kancelarije/uklanjanje', 'Sifarnici\KancelarijeKontroler@postUklanjanje')->name('kancelarije.uklanjanje');
Route::post('kancelarije/izmena', 'Sifarnici\KancelarijeKontroler@postIzmena')->name('kancelarije.izmena');
Route::post('kancelarije/detalj', 'Sifarnici\KancelarijeKontroler@postDetalj')->name('kancelarije.detalj');
Route::post('kancelarije/telefon', 'Sifarnici\KancelarijeKontroler@postDodavanjeTelefon')->name('kancelarija.telefon.dodavanje.post');
Route::post('kancelarije/zaposleni', 'Sifarnici\KancelarijeKontroler@postDodavanjeZaposleni')->name('kancelarija.zaposleni.dodavanje.post');

// Povezivanje lokacija
Route::get('povezivanje', 'Sifarnici\PovezivanjeKontroler@getLista')->name('povezivanje');
Route::post('povezivanje/dodavanje', 'Sifarnici\PovezivanjeKontroler@postDodavanje')->name('povezivanje.dodavanje');
Route::post('povezivanje/brisanje', 'Sifarnici\PovezivanjeKontroler@postBrisanje')->name('povezivanje.brisanje');
Route::post('povezivanje/izmena', 'Sifarnici\PovezivanjeKontroler@postIzmena')->name('povezivanje.izmena');
Route::post('povezivanje/detalj', 'Sifarnici\PovezivanjeKontroler@postDetalj')->name('povezivanje.detalj');

// Uprave
Route::get('uprave', 'Sifarnici\UpraveKontroler@getLista')->name('uprave');
Route::post('uprave/dodavanje', 'Sifarnici\UpraveKontroler@postDodavanje')->name('uprave.dodavanje');
Route::post('uprave/brisanje', 'Sifarnici\UpraveKontroler@postBrisanje')->name('uprave.brisanje');
Route::post('uprave/izmena', 'Sifarnici\UpraveKontroler@postIzmena')->name('uprave.izmena');
Route::post('uprave/detalj', 'Sifarnici\UpraveKontroler@postDetalj')->name('uprave.detalj');

// Zaposleni
Route::get('zaposleni/', 'Sifarnici\ZaposleniKontroler@getLista')->name('zaposleni');
Route::get('zaposleni/dodavanje', 'Sifarnici\ZaposleniKontroler@getDodavanje')->name('zaposleni.dodavanje.get');
Route::post('zaposleni/dodavanje', 'Sifarnici\ZaposleniKontroler@postDodavanje')->name('zaposleni.dodavanje.post');
Route::get('zaposleni/izmena/{id}', 'Sifarnici\ZaposleniKontroler@getIzmena')->name('zaposleni.izmena.get');
Route::post('zaposleni/izmena/{id}', 'Sifarnici\ZaposleniKontroler@postIzmena')->name('zaposleni.izmena.post');
Route::get('zaposleni/detalj/{id}', 'Sifarnici\ZaposleniKontroler@getDetalj')->name('zaposleni.detalj');
Route::post('zaposleni/brisanje', 'Sifarnici\ZaposleniKontroler@postBrisanje')->name('zaposleni.brisanje');
Route::get('zaposleni/ajax', 'Sifarnici\ZaposleniKontroler@getAjax')->name('zaposleni.ajax');

// Zaposleni Mobilni
Route::post('zaposleni/mobilni/dodavanje', 'Sifarnici\ZaposleniMobilniKontroler@postDodavanje')->name('zaposleni.mobilni.dodavanje.post');
Route::post('zaposleni/mobilni/brisanje', 'Sifarnici\ZaposleniMobilniKontroler@postBrisanje')->name('mobilni.zaposleni.brisanje');
Route::post('zaposleni/mobilni/detalj', 'Sifarnici\ZaposleniMobilniKontroler@postDetalj')->name('mobilni.zaposleni.detalj');
Route::post('zaposleni/mobilni/izmena', 'Sifarnici\ZaposleniMobilniKontroler@postIzmena')->name('mobilni.zaposleni.izmena');

// Zaposleni Email
Route::post('zaposleni/email/dodavanje', 'Sifarnici\ZaposleniEmailoviKontroler@postDodavanje')->name('zaposleni.email.dodavanje.post');
Route::post('zaposleni/email/brisanje', 'Sifarnici\ZaposleniEmailoviKontroler@postBrisanje')->name('email.zaposleni.brisanje');
Route::post('zaposleni/email/detalj', 'Sifarnici\ZaposleniEmailoviKontroler@postDetalj')->name('email.zaposleni.detalj');
Route::post('zaposleni/email/izmena', 'Sifarnici\ZaposleniEmailoviKontroler@postIzmena')->name('email.zaposleni.izmena');

// Telefoni
Route::get('telefoni', 'Sifarnici\TelefoniKontroler@getLista')->name('telefoni');
Route::get('telefoni/uvecani', 'Sifarnici\TelefoniKontroler@getListaUvecana')->name('telefoni.uvecani');
Route::get('telefoni/dodavanje', 'Sifarnici\TelefoniKontroler@getDodavanje')->name('telefoni.dodavanje.get');
Route::post('telefoni/dodavanje', 'Sifarnici\TelefoniKontroler@postDodavanje')->name('telefoni.dodavanje');
Route::post('telefoni/brisanje', 'Sifarnici\TelefoniKontroler@postBrisanje')->name('telefoni.brisanje');
Route::post('telefoni/izmena', 'Sifarnici\TelefoniKontroler@postIzmena')->name('telefoni.izmena');
Route::post('telefoni/detalj', 'Sifarnici\TelefoniKontroler@postDetalj')->name('telefoni.detalj');

// Mobilni telefoni
Route::get('mobilni', 'Sifarnici\MobilniKontroler@getLista')->name('mobilni');
Route::post('mobilni/dodavanje', 'Sifarnici\MobilniKontroler@postDodavanje')->name('mobilni.dodavanje');
Route::post('mobilni/brisanje', 'Sifarnici\MobilniKontroler@postBrisanje')->name('mobilni.brisanje');
Route::post('mobilni/izmena', 'Sifarnici\MobilniKontroler@postIzmena')->name('mobilni.izmena');
Route::post('mobilni/detalj', 'Sifarnici\MobilniKontroler@postDetalj')->name('mobilni.detalj');

// Email
Route::get('email', 'Sifarnici\EmailKontroler@getLista')->name('email');
Route::post('email/dodavanje', 'Sifarnici\EmailKontroler@postDodavanje')->name('email.dodavanje');
Route::post('email/brisanje', 'Sifarnici\EmailKontroler@postBrisanje')->name('email.brisanje');
Route::post('email/izmena', 'Sifarnici\EmailKontroler@postIzmena')->name('email.izmena');
Route::post('email/detalj', 'Sifarnici\EmailKontroler@postDetalj')->name('email.detalj');

// Dijagonale
Route::get('dijagonale', 'Sifarnici\DijagonaleKontroler@getLista')->name('dijagonale');
Route::post('dijagonale/dodavanje', 'Sifarnici\DijagonaleKontroler@postDodavanje')->name('dijagonale.dodavanje');
Route::post('dijagonale/brisanje', 'Sifarnici\DijagonaleKontroler@postBrisanje')->name('dijagonale.brisanje');
Route::post('dijagonale/izmena', 'Sifarnici\DijagonaleKontroler@postIzmena')->name('dijagonale.izmena');
Route::post('dijagonale/detalj', 'Sifarnici\DijagonaleKontroler@postDetalj')->name('dijagonale.detalj');

// Licence
Route::get('licence', 'Sifarnici\LicenceKontroler@getLista')->name('licence');
Route::get('licence/dodavanje', 'Sifarnici\LicenceKontroler@getDodavanje')->name('licence.dodavanje.get');
Route::post('licence/dodavanje', 'Sifarnici\LicenceKontroler@postDodavanje')->name('licence.dodavanje.post');
Route::get('licence/izmena/{id}', 'Sifarnici\LicenceKontroler@getIzmena')->name('licence.izmena.get');
Route::post('licence/izmena/{id}', 'Sifarnici\LicenceKontroler@postIzmena')->name('licence.izmena.post');
Route::get('licence/detalj/{id}', 'Sifarnici\LicenceKontroler@getDetalj')->name('licence.detalj');
Route::post('licence/brisanje', 'Sifarnici\LicenceKontroler@postBrisanje')->name('licence.brisanje');

// Baterije
Route::get('baterije', 'Sifarnici\BaterijeKontroler@getLista')->name('baterije');
Route::post('baterije/dodavanje', 'Sifarnici\BaterijeKontroler@postDodavanje')->name('baterije.dodavanje');
Route::post('baterije/brisanje', 'Sifarnici\BaterijeKontroler@postBrisanje')->name('baterije.brisanje');
Route::post('baterije/izmena', 'Sifarnici\BaterijeKontroler@postIzmena')->name('baterije.izmena');
Route::post('baterije/detalj', 'Sifarnici\BaterijeKontroler@postDetalj')->name('baterije.detalj');

// Povezivanje vga
Route::get('povezivanje_vga', 'Sifarnici\PovezivanjeVgaKontroler@getLista')->name('povezivanje_vga');
Route::post('povezivanje_vga/dodavanje', 'Sifarnici\PovezivanjeVgaKontroler@postDodavanje')->name('povezivanje_vga.dodavanje');
Route::post('povezivanje_vga/brisanje', 'Sifarnici\PovezivanjeVgaKontroler@postBrisanje')->name('povezivanje_vga.brisanje');
Route::post('povezivanje_vga/izmena', 'Sifarnici\PovezivanjeVgaKontroler@postIzmena')->name('povezivanje_vga.izmena');
Route::post('povezivanje_vga/detalj', 'Sifarnici\PovezivanjeVgaKontroler@postDetalj')->name('povezivanje_vga.detalj');

// Povezivanje hdd
Route::get('povezivanje_hdd', 'Sifarnici\PovezivanjeHddKontroler@getLista')->name('povezivanje_hdd');
Route::post('povezivanje_hdd/dodavanje', 'Sifarnici\PovezivanjeHddKontroler@postDodavanje')->name('povezivanje_hdd.dodavanje');
Route::post('povezivanje_hdd/brisanje', 'Sifarnici\PovezivanjeHddKontroler@postBrisanje')->name('povezivanje_hdd.brisanje');
Route::post('povezivanje_hdd/izmena', 'Sifarnici\PovezivanjeHddKontroler@postIzmena')->name('povezivanje_hdd.izmena');
Route::post('povezivanje_hdd/detalj', 'Sifarnici\PovezivanjeHddKontroler@postDetalj')->name('povezivanje_hdd.detalj');

// Soketi
Route::get('soketi', 'Sifarnici\SoketiKontroler@getLista')->name('soketi');
Route::post('soketi/dodavanje', 'Sifarnici\SoketiKontroler@postDodavanje')->name('soketi.dodavanje');
Route::post('soketi/brisanje', 'Sifarnici\SoketiKontroler@postBrisanje')->name('soketi.brisanje');
Route::post('soketi/izmena', 'Sifarnici\SoketiKontroler@postIzmena')->name('soketi.izmena');
Route::post('soketi/detalj', 'Sifarnici\SoketiKontroler@postDetalj')->name('soketi.detalj');

// Tipovi memorije
Route::get('tipovi_memorije', 'Sifarnici\TipoviMemorijeKontroler@getLista')->name('tipovi_memorije');
Route::post('tipovi_memorije/dodavanje', 'Sifarnici\TipoviMemorijeKontroler@postDodavanje')->name('tipovi_memorije.dodavanje');
Route::post('tipovi_memorije/brisanje', 'Sifarnici\TipoviMemorijeKontroler@postBrisanje')->name('tipovi_memorije.brisanje');
Route::post('tipovi_memorije/izmena', 'Sifarnici\TipoviMemorijeKontroler@postIzmena')->name('tipovi_memorije.izmena');
Route::post('tipovi_memorije/detalj', 'Sifarnici\TipoviMemorijeKontroler@postDetalj')->name('tipovi_memorije.detalj');

// VGA slotovi
Route::get('vga_slotovi', 'Sifarnici\VgaSlotoviKontroler@getLista')->name('vga_slotovi');
Route::post('vga_slotovi/dodavanje', 'Sifarnici\VgaSlotoviKontroler@postDodavanje')->name('vga_slotovi.dodavanje');
Route::post('vga_slotovi/brisanje', 'Sifarnici\VgaSlotoviKontroler@postBrisanje')->name('vga_slotovi.brisanje');
Route::post('vga_slotovi/izmena', 'Sifarnici\VgaSlotoviKontroler@postIzmena')->name('vga_slotovi.izmena');
Route::post('vga_slotovi/detalj', 'Sifarnici\VgaSlotoviKontroler@postDetalj')->name('vga_slotovi.detalj');

// Tipovi stampaca
Route::get('tipovi_stampaca', 'Sifarnici\TipoviStampacaKontroler@getLista')->name('tipovi_stampaca');
Route::post('tipovi_stampaca/dodavanje', 'Sifarnici\TipoviStampacaKontroler@postDodavanje')->name('tipovi_stampaca.dodavanje');
Route::post('tipovi_stampaca/brisanje', 'Sifarnici\TipoviStampacaKontroler@postBrisanje')->name('tipovi_stampaca.brisanje');
Route::post('tipovi_stampaca/izmena', 'Sifarnici\TipoviStampacaKontroler@postIzmena')->name('tipovi_stampaca.izmena');
Route::post('tipovi_stampaca/detalj', 'Sifarnici\TipoviStampacaKontroler@postDetalj')->name('tipovi_stampaca.detalj');

// Toneri
Route::get('toneri', 'Sifarnici\ToneriKontroler@getLista')->name('toneri');
Route::post('toneri/dodavanje', 'Sifarnici\ToneriKontroler@postDodavanje')->name('toneri.dodavanje');
Route::post('toneri/brisanje', 'Sifarnici\ToneriKontroler@postBrisanje')->name('toneri.brisanje');
Route::post('toneri/izmena', 'Sifarnici\ToneriKontroler@postIzmena')->name('toneri.izmena');
Route::post('toneri/detalj', 'Sifarnici\ToneriKontroler@postDetalj')->name('toneri.detalj');

// Operativni sistemi
Route::get('operativni_sistemi', 'Sifarnici\OperativniSistemiKontroler@getLista')->name('operativni_sistemi');
Route::post('operativni_sistemi/dodavanje', 'Sifarnici\OperativniSistemiKontroler@postDodavanje')->name('operativni_sistemi.dodavanje');
Route::post('operativni_sistemi/brisanje', 'Sifarnici\OperativniSistemiKontroler@postBrisanje')->name('operativni_sistemi.brisanje');
Route::post('operativni_sistemi/izmena', 'Sifarnici\OperativniSistemiKontroler@postIzmena')->name('operativni_sistemi.izmena');
Route::post('operativni_sistemi/detalj', 'Sifarnici\OperativniSistemiKontroler@postDetalj')->name('operativni_sistemi.detalj');

//Aplikacije
Route::get('aplikacije', 'Sifarnici\AplikacijeKontroler@getLista')->name('aplikacije');
Route::post('aplikacije/dodavanje', 'Sifarnici\AplikacijeKontroler@postDodavanje')->name('aplikacije.dodavanje');
Route::post('aplikacije/brisanje', 'Sifarnici\AplikacijeKontroler@postBrisanje')->name('aplikacije.brisanje');
Route::post('aplikacije/izmena', 'Sifarnici\AplikacijeKontroler@postIzmena')->name('aplikacije.izmena');
Route::post('aplikacije/detalj', 'Sifarnici\AplikacijeKontroler@postDetalj')->name('aplikacije.detalj');
Route::get('aplikacije/racunari/{id}', 'Sifarnici\AplikacijeKontroler@getListaRacunari')->name('aplikacije.racunari');

// MODELI UREDJAJA



Route::prefix('modeli')->group(function () {
// Procesori
    Route::get('procesori', 'Modeli\ProcesoriKontroler@getLista')->name('procesori.modeli');
    Route::get('procesori/dodavanje', 'Modeli\ProcesoriKontroler@getDodavanje')->name('procesori.modeli.dodavanje.get');
    Route::post('procesori/dodavanje', 'Modeli\ProcesoriKontroler@postDodavanje')->name('procesori.modeli.dodavanje.post');
    Route::get('procesori/izmena/{id}', 'Modeli\ProcesoriKontroler@getIzmena')->name('procesori.modeli.izmena.get');
    Route::post('procesori/izmena/{id}', 'Modeli\ProcesoriKontroler@postIzmena')->name('procesori.modeli.izmena.post');
    Route::get('procesori/detalj/{id}', 'Modeli\ProcesoriKontroler@getDetalj')->name('procesori.modeli.detalj');
    Route::post('procesori/brisanje', 'Modeli\ProcesoriKontroler@postBrisanje')->name('procesori.modeli.brisanje');
    Route::get('procesori/uredjaji/{id}', 'Modeli\ProcesoriKontroler@getUredjaji')->name('procesori.modeli.uredjaji');
    Route::get('procesori/racunari/{id}', 'Modeli\ProcesoriKontroler@getRacunari')->name('procesori.modeli.racunari');

// Memorije
    Route::get('memorije', 'Modeli\MemorijeKontroler@getLista')->name('memorije.modeli');
    Route::get('memorije/dodavanje', 'Modeli\MemorijeKontroler@getDodavanje')->name('memorije.modeli.dodavanje.get');
    Route::post('memorije/dodavanje', 'Modeli\MemorijeKontroler@postDodavanje')->name('memorije.modeli.dodavanje.post');
    Route::get('memorije/izmena/{id}', 'Modeli\MemorijeKontroler@getIzmena')->name('memorije.modeli.izmena.get');
    Route::post('memorije/izmena/{id}', 'Modeli\MemorijeKontroler@postIzmena')->name('memorije.modeli.izmena.post');
    Route::get('memorije/detalj/{id}', 'Modeli\MemorijeKontroler@getDetalj')->name('memorije.modeli.detalj');
    Route::post('memorije/brisanje', 'Modeli\MemorijeKontroler@postBrisanje')->name('memorije.modeli.brisanje');
    Route::get('memorije/uredjaji/{id}', 'Modeli\MemorijeKontroler@getUredjaji')->name('memorije.modeli.uredjaji');
    Route::get('memorije/racunari/{id}', 'Modeli\MemorijeKontroler@getRacunari')->name('memorije.modeli.racunari');

// Maticne Ploce
    Route::get('osnovne_ploce', 'Modeli\OsnovnePloceKontroler@getLista')->name('osnovne_ploce.modeli');
    Route::get('osnovne_ploce/dodavanje', 'Modeli\OsnovnePloceKontroler@getDodavanje')->name('osnovne_ploce.modeli.dodavanje.get');
    Route::post('osnovne_ploce/dodavanje', 'Modeli\OsnovnePloceKontroler@postDodavanje')->name('osnovne_ploce.modeli.dodavanje.post');
    Route::get('osnovne_ploce/izmena/{id}', 'Modeli\OsnovnePloceKontroler@getIzmena')->name('osnovne_ploce.modeli.izmena.get');
    Route::post('osnovne_ploce/izmena/{id}', 'Modeli\OsnovnePloceKontroler@postIzmena')->name('osnovne_ploce.modeli.izmena.post');
    Route::get('osnovne_ploce/detalj/{id}', 'Modeli\OsnovnePloceKontroler@getDetalj')->name('osnovne_ploce.modeli.detalj');
    Route::post('osnovne_ploce/brisanje', 'Modeli\OsnovnePloceKontroler@postBrisanje')->name('osnovne_ploce.modeli.brisanje');
    Route::get('osnovne_ploce/uredjaji/{id}', 'Modeli\OsnovnePloceKontroler@getUredjaji')->name('osnovne_ploce.modeli.uredjaji');
    Route::get('osnovne_ploce/racunari/{id}', 'Modeli\OsnovnePloceKontroler@getRacunari')->name('osnovne_ploce.modeli.racunari');

// HDDovi
    Route::get('hddovi', 'Modeli\HddKontroler@getLista')->name('hddovi.modeli');
    Route::get('hddovi/dodavanje', 'Modeli\HddKontroler@getDodavanje')->name('hddovi.modeli.dodavanje.get');
    Route::post('hddovi/dodavanje', 'Modeli\HddKontroler@postDodavanje')->name('hddovi.modeli.dodavanje.post');
    Route::get('hddovi/izmena/{id}', 'Modeli\HddKontroler@getIzmena')->name('hddovi.modeli.izmena.get');
    Route::post('hddovi/izmena/{id}', 'Modeli\HddKontroler@postIzmena')->name('hddovi.modeli.izmena.post');
    Route::get('hddovi/detalj/{id}', 'Modeli\HddKontroler@getDetalj')->name('hddovi.modeli.detalj');
    Route::post('hddovi/brisanje', 'Modeli\HddKontroler@postBrisanje')->name('hddovi.modeli.brisanje');
    Route::get('hddovi/uredjaji/{id}', 'Modeli\HddKontroler@getUredjaji')->name('hddovi.modeli.uredjaji');
    Route::get('hddovi/racunari/{id}', 'Modeli\HddKontroler@getRacunari')->name('hddovi.modeli.racunari');

// VGA
    Route::get('vga', 'Modeli\GrafickiAdapteriKontroler@getLista')->name('vga.modeli');
    Route::get('vga/dodavanje', 'Modeli\GrafickiAdapteriKontroler@getDodavanje')->name('vga.modeli.dodavanje.get');
    Route::post('vga/dodavanje', 'Modeli\GrafickiAdapteriKontroler@postDodavanje')->name('vga.modeli.dodavanje.post');
    Route::get('vga/izmena/{id}', 'Modeli\GrafickiAdapteriKontroler@getIzmena')->name('vga.modeli.izmena.get');
    Route::post('vga/izmena/{id}', 'Modeli\GrafickiAdapteriKontroler@postIzmena')->name('vga.modeli.izmena.post');
    Route::get('vga/detalj/{id}', 'Modeli\GrafickiAdapteriKontroler@getDetalj')->name('vga.modeli.detalj');
    Route::post('vga/brisanje', 'Modeli\GrafickiAdapteriKontroler@postBrisanje')->name('vga.modeli.brisanje');
    Route::get('vga/uredjaji/{id}', 'Modeli\GrafickiAdapteriKontroler@getUredjaji')->name('vga.modeli.uredjaji');
    Route::get('vga/racunari/{id}', 'Modeli\GrafickiAdapteriKontroler@getRacunari')->name('vga.modeli.racunari');

// Napajanja
    Route::get('napajanja', 'Modeli\NapajanjaKontroler@getLista')->name('napajanja.modeli');
    Route::get('napajanja/dodavanje', 'Modeli\NapajanjaKontroler@getDodavanje')->name('napajanja.modeli.dodavanje.get');
    Route::post('napajanja/dodavanje', 'Modeli\NapajanjaKontroler@postDodavanje')->name('napajanja.modeli.dodavanje.post');
    Route::get('napajanja/izmena/{id}', 'Modeli\NapajanjaKontroler@getIzmena')->name('napajanja.modeli.izmena.get');
    Route::post('napajanja/izmena/{id}', 'Modeli\NapajanjaKontroler@postIzmena')->name('napajanja.modeli.izmena.post');
    Route::get('napajanja/detalj/{id}', 'Modeli\NapajanjaKontroler@getDetalj')->name('napajanja.modeli.detalj');
    Route::post('napajanja/brisanje', 'Modeli\NapajanjaKontroler@postBrisanje')->name('napajanja.modeli.brisanje');
    Route::get('napajanja/uredjaji/{id}', 'Modeli\NapajanjaKontroler@getUredjaji')->name('napajanja.modeli.uredjaji');
    Route::get('napajanja/racunari/{id}', 'Modeli\NapajanjaKontroler@getRacunari')->name('napajanja.modeli.racunari');

//Monitori
    Route::get('monitori', 'Modeli\MonitoriKontroler@getLista')->name('monitori.modeli');
    Route::get('monitori/dodavanje', 'Modeli\MonitoriKontroler@getDodavanje')->name('monitori.modeli.dodavanje.get');
    Route::post('monitori/dodavanje', 'Modeli\MonitoriKontroler@postDodavanje')->name('monitori.modeli.dodavanje.post');
    Route::get('monitori/izmena/{id}', 'Modeli\MonitoriKontroler@getIzmena')->name('monitori.modeli.izmena.get');
    Route::post('monitori/izmena/{id}', 'Modeli\MonitoriKontroler@postIzmena')->name('monitori.modeli.izmena.post');
    Route::get('monitori/detalj/{id}', 'Modeli\MonitoriKontroler@getDetalj')->name('monitori.modeli.detalj');
    Route::post('monitori/brisanje', 'Modeli\MonitoriKontroler@postBrisanje')->name('monitori.modeli.brisanje');
    Route::get('monitori/uredjaji/{id}', 'Modeli\MonitoriKontroler@getUredjaji')->name('monitori.modeli.uredjaji');
    Route::get('monitori/racunari/{id}', 'Modeli\MonitoriKontroler@getRacunari')->name('monitori.modeli.racunari');

//Stampaci
    Route::get('stampaci', 'Modeli\StampaciKontroler@getLista')->name('stampaci.modeli');
    Route::get('stampaci/dodavanje', 'Modeli\StampaciKontroler@getDodavanje')->name('stampaci.modeli.dodavanje.get');
    Route::post('stampaci/dodavanje', 'Modeli\StampaciKontroler@postDodavanje')->name('stampaci.modeli.dodavanje.post');
    Route::get('stampaci/izmena/{id}', 'Modeli\StampaciKontroler@getIzmena')->name('stampaci.modeli.izmena.get');
    Route::post('stampaci/izmena/{id}', 'Modeli\StampaciKontroler@postIzmena')->name('stampaci.modeli.izmena.post');
    Route::get('stampaci/detalj/{id}', 'Modeli\StampaciKontroler@getDetalj')->name('stampaci.modeli.detalj');
    Route::post('stampaci/brisanje', 'Modeli\StampaciKontroler@postBrisanje')->name('stampaci.modeli.brisanje');
    Route::get('stampaci/uredjaji/{id}', 'Modeli\StampaciKontroler@getUredjaji')->name('stampaci.modeli.uredjaji');
    Route::get('stampaci/racunari/{id}', 'Modeli\StampaciKontroler@getRacunari')->name('stampaci.modeli.racunari');

//Skeneri
    Route::get('skeneri', 'Modeli\SkeneriKontroler@getLista')->name('skeneri.modeli');
    Route::get('skeneri/dodavanje', 'Modeli\SkeneriKontroler@getDodavanje')->name('skeneri.modeli.dodavanje.get');
    Route::post('skeneri/dodavanje', 'Modeli\SkeneriKontroler@postDodavanje')->name('skeneri.modeli.dodavanje.post');
    Route::get('skeneri/izmena/{id}', 'Modeli\SkeneriKontroler@getIzmena')->name('skeneri.modeli.izmena.get');
    Route::post('skeneri/izmena/{id}', 'Modeli\SkeneriKontroler@postIzmena')->name('skeneri.modeli.izmena.post');
    Route::get('skeneri/detalj/{id}', 'Modeli\SkeneriKontroler@getDetalj')->name('skeneri.modeli.detalj');
    Route::post('skeneri/brisanje', 'Modeli\SkeneriKontroler@postBrisanje')->name('skeneri.modeli.brisanje');
    Route::get('skeneri/uredjaji/{id}', 'Modeli\SkeneriKontroler@getUredjaji')->name('skeneri.modeli.uredjaji');
    Route::get('skeneri/racunari/{id}', 'Modeli\SkeneriKontroler@getRacunari')->name('skeneri.modeli.racunari');

//Upsevi
    Route::get('upsevi', 'Modeli\UpseviKontroler@getLista')->name('upsevi.modeli');
    Route::get('upsevi/dodavanje', 'Modeli\UpseviKontroler@getDodavanje')->name('upsevi.modeli.dodavanje.get');
    Route::post('upsevi/dodavanje', 'Modeli\UpseviKontroler@postDodavanje')->name('upsevi.modeli.dodavanje.post');
    Route::get('upsevi/izmena/{id}', 'Modeli\UpseviKontroler@getIzmena')->name('upsevi.modeli.izmena.get');
    Route::post('upsevi/izmena/{id}', 'Modeli\UpseviKontroler@postIzmena')->name('upsevi.modeli.izmena.post');
    Route::get('upsevi/detalj/{id}', 'Modeli\UpseviKontroler@getDetalj')->name('upsevi.modeli.detalj');
    Route::post('upsevi/brisanje', 'Modeli\UpseviKontroler@postBrisanje')->name('upsevi.modeli.brisanje');
    Route::get('upsevi/uredjaji/{id}', 'Modeli\UpseviKontroler@getUredjaji')->name('upsevi.modeli.uredjaji');
});

//OPREMA
//Procesori
Route::get('procesori', 'Oprema\ProcesoriKontroler@getLista')->name('procesori.oprema');
Route::get('procesori/otpisani', 'Oprema\ProcesoriKontroler@getListaOtpisani')->name('procesori.oprema.otpisani');
Route::get('procesori/detalj/{id}', 'Oprema\ProcesoriKontroler@getDetalj')->name('procesori.oprema.detalj');
Route::get('procesori/izmena/{id}', 'Oprema\ProcesoriKontroler@getIzmena')->name('procesori.oprema.izmena.get');
Route::post('procesori/izmena/{id}', 'Oprema\ProcesoriKontroler@postIzmena')->name('procesori.oprema.izmena.post');
Route::post('procesori/otpis', 'Oprema\ProcesoriKontroler@postOtpis')->name('procesori.oprema.otpis');
Route::post('procesori/vracanje_otpis', 'Oprema\ProcesoriKontroler@postOtpisVracanje')->name('procesori.oprema.vracanje_otpis');
Route::post('procesori/recikliranje/lista', 'Oprema\ProcesoriKontroler@postReciklirajLista')->name('procesori.oprema.recikliranje.lista');
Route::post('procesori/recikliranje/{id_reciklaze}', 'Oprema\ProcesoriKontroler@postRecikliraj')->name('procesori.oprema.recikliranje');

//Osnovne ploce
Route::get('osnovne_ploce', 'Oprema\OsnovnePloceKontroler@getLista')->name('osnovne_ploce.oprema');
Route::get('osnovne_ploce/otpisani', 'Oprema\OsnovnePloceKontroler@getListaOtpisani')->name('osnovne_ploce.oprema.otpisani');
Route::get('osnovne_ploce/detalj/{id}', 'Oprema\OsnovnePloceKontroler@getDetalj')->name('osnovne_ploce.oprema.detalj');
Route::get('osnovne_ploce/izmena/{id}', 'Oprema\OsnovnePloceKontroler@getIzmena')->name('osnovne_ploce.oprema.izmena.get');
Route::post('osnovne_ploce/izmena/{id}', 'Oprema\OsnovnePloceKontroler@postIzmena')->name('osnovne_ploce.oprema.izmena.post');
Route::post('osnovne_ploce/otpis', 'Oprema\OsnovnePloceKontroler@postOtpis')->name('osnovne_ploce.oprema.otpis');
Route::post('osnovne_ploce/vracanje_otpis', 'Oprema\OsnovnePloceKontroler@postOtpisVracanje')->name('osnovne_ploce.oprema.vracanje_otpis');
Route::post('osnovne_ploce/recikliranje/lista', 'Oprema\OsnovnePloceKontroler@postReciklirajLista')->name('osnovne_ploce.oprema.recikliranje.lista');
Route::post('osnovne_ploce/recikliranje/{id_reciklaze}', 'Oprema\OsnovnePloceKontroler@postRecikliraj')->name('osnovne_ploce.oprema.recikliranje');

//Memorije
Route::get('memorije', 'Oprema\MemorijeKontroler@getLista')->name('memorije.oprema');
Route::get('memorije/otpisani', 'Oprema\MemorijeKontroler@getListaOtpisani')->name('memorije.oprema.otpisani');
Route::get('memorije/detalj/{id}', 'Oprema\MemorijeKontroler@getDetalj')->name('memorije.oprema.detalj');
Route::get('memorije/izmena/{id}', 'Oprema\MemorijeKontroler@getIzmena')->name('memorije.oprema.izmena.get');
Route::post('memorije/izmena/{id}', 'Oprema\MemorijeKontroler@postIzmena')->name('memorije.oprema.izmena.post');
Route::post('memorije/otpis', 'Oprema\MemorijeKontroler@postOtpis')->name('memorije.oprema.otpis');
Route::post('memorije/vracanje_otpis', 'Oprema\MemorijeKontroler@postOtpisVracanje')->name('memorije.oprema.vracanje_otpis');
Route::post('memorije/recikliranje/lista', 'Oprema\MemorijeKontroler@postReciklirajLista')->name('memorije.oprema.recikliranje.lista');
Route::post('memorije/recikliranje/{id_reciklaze}', 'Oprema\MemorijeKontroler@postRecikliraj')->name('memorije.oprema.recikliranje');

//HDDovi
Route::get('hddovi', 'Oprema\HddKontroler@getLista')->name('hddovi.oprema');
Route::get('hddovi/otpisani', 'Oprema\HddKontroler@getListaOtpisani')->name('hddovi.oprema.otpisani');
Route::get('hddovi/detalj/{id}', 'Oprema\HddKontroler@getDetalj')->name('hddovi.oprema.detalj');
Route::get('hddovi/izmena/{id}', 'Oprema\HddKontroler@getIzmena')->name('hddovi.oprema.izmena.get');
Route::post('hddovi/izmena/{id}', 'Oprema\HddKontroler@postIzmena')->name('hddovi.oprema.izmena.post');
Route::post('hddovi/otpis', 'Oprema\HddKontroler@postOtpis')->name('hddovi.oprema.otpis');
Route::post('hddovi/vracanje_otpis', 'Oprema\HddKontroler@postOtpisVracanje')->name('hddovi.oprema.vracanje_otpis');
Route::post('hddovi/recikliranje/lista', 'Oprema\HddKontroler@postReciklirajLista')->name('hddovi.oprema.recikliranje.lista');
Route::post('hddovi/recikliranje/{id_reciklaze}', 'Oprema\HddKontroler@postRecikliraj')->name('hddovi.oprema.recikliranje');

//VGA
Route::get('vga', 'Oprema\GrafickiAdapteriKontroler@getLista')->name('vga.oprema');
Route::get('vga/otpisani', 'Oprema\GrafickiAdapteriKontroler@getListaOtpisani')->name('vga.oprema.otpisani');
Route::get('vga/detalj/{id}', 'Oprema\GrafickiAdapteriKontroler@getDetalj')->name('vga.oprema.detalj');
Route::get('vga/izmena/{id}', 'Oprema\GrafickiAdapteriKontroler@getIzmena')->name('vga.oprema.izmena.get');
Route::post('vga/izmena/{id}', 'Oprema\GrafickiAdapteriKontroler@postIzmena')->name('vga.oprema.izmena.post');
Route::post('vga/otpis', 'Oprema\GrafickiAdapteriKontroler@postOtpis')->name('vga.oprema.otpis');
Route::post('vga/vracanje_otpis', 'Oprema\GrafickiAdapteriKontroler@postOtpisVracanje')->name('vga.oprema.vracanje_otpis');
Route::post('vga/recikliranje/lista', 'Oprema\GrafickiAdapteriKontroler@postReciklirajLista')->name('vga.oprema.recikliranje.lista');
Route::post('vga/recikliranje/{id_reciklaze}', 'Oprema\GrafickiAdapteriKontroler@postRecikliraj')->name('vga.oprema.recikliranje');

//Napajanja
Route::get('napajanja', 'Oprema\NapajanjaKontroler@getLista')->name('napajanja.oprema');
Route::get('napajanja/otpisani', 'Oprema\NapajanjaKontroler@getListaOtpisani')->name('napajanja.oprema.otpisani');
Route::get('napajanja/detalj/{id}', 'Oprema\NapajanjaKontroler@getDetalj')->name('napajanja.oprema.detalj');
Route::get('napajanja/izmena/{id}', 'Oprema\NapajanjaKontroler@getIzmena')->name('napajanja.oprema.izmena.get');
Route::post('napajanja/izmena/{id}', 'Oprema\NapajanjaKontroler@postIzmena')->name('napajanja.oprema.izmena.post');
Route::post('napajanja/otpis', 'Oprema\NapajanjaKontroler@postOtpis')->name('napajanja.oprema.otpis');
Route::post('napajanja/vracanje_otpis', 'Oprema\NapajanjaKontroler@postOtpisVracanje')->name('napajanja.oprema.vracanje_otpis');
Route::post('napajanja/recikliranje/lista', 'Oprema\NapajanjaKontroler@postReciklirajLista')->name('napajanja.oprema.recikliranje.lista');
Route::post('napajanja/recikliranje/{id_reciklaze}', 'Oprema\NapajanjaKontroler@postRecikliraj')->name('napajanja.oprema.recikliranje');

//Monitori
Route::get('monitori', 'Oprema\MonitoriKontroler@getLista')->name('monitori.oprema');
Route::get('monitori/serijski', 'Oprema\MonitoriKontroler@getListaSerijski')->name('monitori.oprema.serijski');
Route::get('monitori/inventarski', 'Oprema\MonitoriKontroler@getListaInventarski')->name('monitori.oprema.inventarski');
Route::post('monitori/dupli', 'Oprema\MonitoriKontroler@postDupli')->name('monitori.oprema.dupli');
Route::get('monitori/otpisani', 'Oprema\MonitoriKontroler@getListaOtpisani')->name('monitori.oprema.otpisani');
Route::get('monitori/detalj/{id}', 'Oprema\MonitoriKontroler@getDetalj')->name('monitori.oprema.detalj');
Route::get('monitori/izmena/{id}', 'Oprema\MonitoriKontroler@getIzmena')->name('monitori.oprema.izmena.get');
Route::post('monitori/izmena/{id}', 'Oprema\MonitoriKontroler@postIzmena')->name('monitori.oprema.izmena.post');
Route::post('monitori/otpis', 'Oprema\MonitoriKontroler@postOtpis')->name('monitori.oprema.otpis');
Route::post('monitori/vracanje_otpis', 'Oprema\MonitoriKontroler@postOtpisVracanje')->name('monitori.oprema.vracanje_otpis');
Route::post('monitori/recikliranje/lista', 'Oprema\MonitoriKontroler@postReciklirajLista')->name('monitori.oprema.recikliranje.lista');
Route::post('monitori/recikliranje/{id_reciklaze}', 'Oprema\MonitoriKontroler@postRecikliraj')->name('monitori.oprema.recikliranje');

//Stampaci
Route::get('stampaci', 'Oprema\StampaciKontroler@getLista')->name('stampaci.oprema');
Route::get('stampaci/otpisani', 'Oprema\StampaciKontroler@getListaOtpisani')->name('stampaci.oprema.otpisani');
Route::get('stampaci/detalj/{id}', 'Oprema\StampaciKontroler@getDetalj')->name('stampaci.oprema.detalj');
Route::get('stampaci/izmena/{id}', 'Oprema\StampaciKontroler@getIzmena')->name('stampaci.oprema.izmena.get');
Route::post('stampaci/izmena/{id}', 'Oprema\StampaciKontroler@postIzmena')->name('stampaci.oprema.izmena.post');
Route::post('stampaci/otpis', 'Oprema\StampaciKontroler@postOtpis')->name('stampaci.oprema.otpis');
Route::post('stampaci/vracanje_otpis', 'Oprema\StampaciKontroler@postOtpisVracanje')->name('stampaci.oprema.vracanje_otpis');
Route::post('stampaci/recikliranje/lista', 'Oprema\StampaciKontroler@postReciklirajLista')->name('stampaci.oprema.recikliranje.lista');
Route::post('stampaci/recikliranje/{id_reciklaze}', 'Oprema\StampaciKontroler@postRecikliraj')->name('stampaci.oprema.recikliranje');

//Skeneri
Route::get('skeneri', 'Oprema\SkeneriKontroler@getLista')->name('skeneri.oprema');
Route::get('skeneri/otpisani', 'Oprema\SkeneriKontroler@getListaOtpisani')->name('skeneri.oprema.otpisani');
Route::get('skeneri/detalj/{id}', 'Oprema\SkeneriKontroler@getDetalj')->name('skeneri.oprema.detalj');
Route::get('skeneri/izmena/{id}', 'Oprema\SkeneriKontroler@getIzmena')->name('skeneri.oprema.izmena.get');
Route::post('skeneri/izmena/{id}', 'Oprema\SkeneriKontroler@postIzmena')->name('skeneri.oprema.izmena.post');
Route::post('skeneri/otpis', 'Oprema\SkeneriKontroler@postOtpis')->name('skeneri.oprema.otpis');
Route::post('skeneri/vracanje_otpis', 'Oprema\SkeneriKontroler@postOtpisVracanje')->name('skeneri.oprema.vracanje_otpis');
Route::post('skeneri/recikliranje/lista', 'Oprema\SkeneriKontroler@postReciklirajLista')->name('skeneri.oprema.recikliranje.lista');
Route::post('skeneri/recikliranje/{id_reciklaze}', 'Oprema\SkeneriKontroler@postRecikliraj')->name('skeneri.oprema.recikliranje');

//Upsevi
Route::get('upsevi', 'Oprema\UpseviKontroler@getLista')->name('upsevi.oprema');
Route::get('upsevi/otpisani', 'Oprema\UpseviKontroler@getListaOtpisani')->name('upsevi.oprema.otpisani');
Route::get('upsevi/detalj/{id}', 'Oprema\UpseviKontroler@getDetalj')->name('upsevi.oprema.detalj');
Route::get('upsevi/izmena/{id}', 'Oprema\UpseviKontroler@getIzmena')->name('upsevi.oprema.izmena.get');
Route::post('upsevi/izmena/{id}', 'Oprema\UpseviKontroler@postIzmena')->name('upsevi.oprema.izmena.post');
Route::post('upsevi/otpis', 'Oprema\UpseviKontroler@postOtpis')->name('upsevi.oprema.otpis');
Route::post('upsevi/vracanje_otpis', 'Oprema\UpseviKontroler@postOtpisVracanje')->name('upsevi.oprema.vracanje_otpis');
Route::post('upsevi/recikliranje/lista', 'Oprema\UpseviKontroler@postReciklirajLista')->name('upsevi.oprema.recikliranje.lista');
Route::post('upsevi/recikliranje/{id_reciklaze}', 'Oprema\UpseviKontroler@postRecikliraj')->name('upsevi.oprema.recikliranje');

//Projektori
Route::get('projektori', 'Oprema\ProjektoriKontroler@getLista')->name('projektori.oprema');
Route::get('projektori/otpisani', 'Oprema\ProjektoriKontroler@getListaOtpisani')->name('projektori.oprema.otpisani');
Route::get('projektori/detalj/{id}', 'Oprema\ProjektoriKontroler@getDetalj')->name('projektori.oprema.detalj');
Route::get('projektori/izmena/{id}', 'Oprema\ProjektoriKontroler@getIzmena')->name('projektori.oprema.izmena.get');
Route::post('projektori/izmena/{id}', 'Oprema\ProjektoriKontroler@postIzmena')->name('projektori.oprema.izmena.post');
Route::post('projektori/otpis', 'Oprema\ProjektoriKontroler@postOtpis')->name('projektori.oprema.otpis');
Route::post('projektori/vracanje_otpis', 'Oprema\ProjektoriKontroler@postOtpisVracanje')->name('projektori.oprema.vracanje_otpis');
Route::post('projektori/recikliranje/lista', 'Oprema\ProjektoriKontroler@postReciklirajLista')->name('projektori.oprema.recikliranje.lista');
Route::post('projektori/recikliranje/{id_reciklaze}', 'Oprema\ProjektoriKontroler@postRecikliraj')->name('projektori.oprema.recikliranje');

//Mrezni uredjaji
Route::get('mrezni', 'Oprema\MrezniUredjajiKontroler@getLista')->name('mrezni.oprema');
Route::get('mrezni/otpisani', 'Oprema\MrezniUredjajiKontroler@getListaOtpisani')->name('mrezni.oprema.otpisani');
Route::get('mrezni/detalj/{id}', 'Oprema\MrezniUredjajiKontroler@getDetalj')->name('mrezni.oprema.detalj');
Route::get('mrezni/izmena/{id}', 'Oprema\MrezniUredjajiKontroler@getIzmena')->name('mrezni.oprema.izmena.get');
Route::post('mrezni/izmena/{id}', 'Oprema\MrezniUredjajiKontroler@postIzmena')->name('mrezni.oprema.izmena.post');
Route::post('mrezni/otpis', 'Oprema\MrezniUredjajiKontroler@postOtpis')->name('mrezni.oprema.otpis');
Route::post('mrezni/vracanje_otpis', 'Oprema\MrezniUredjajiKontroler@postOtpisVracanje')->name('mrezni.oprema.vracanje_otpis');
Route::post('mrezni/recikliranje/lista', 'Oprema\MrezniUredjajiKontroler@postReciklirajLista')->name('mrezni.oprema.recikliranje.lista');
Route::post('mrezni/recikliranje/{id_reciklaze}', 'Oprema\MrezniUredjajiKontroler@postRecikliraj')->name('mrezni.oprema.recikliranje');

//Racunari
Route::get('racunari/pretraga', 'Oprema\RacunariKontroler@getListaPretraga')->name('racunari.pretraga');
Route::get('racunari/osveziocene', 'Oprema\RacunariKontroler@getOsveziOcene')->name('racunari.osveziocene');
Route::post('racunari/pretraga', 'Oprema\RacunariKontroler@postListaPretraga')->name('racunari.pretraga.post');
Route::get('racunari/ikt', 'Oprema\RacunariKontroler@getListaIkt')->name('racunari.oprema.ikt');
Route::get('racunari/inventarski', 'Oprema\RacunariKontroler@getListaInventarski')->name('racunari.oprema.inventarski');
Route::get('racunari/otpisani', 'Oprema\RacunariKontroler@getListaOtpisani')->name('racunari.oprema.otpisani');
Route::get('racunari/ajax', 'Oprema\RacunariKontroler@getAjax')->name('racunari.ajax');
Route::get('racunari/detalj/{id}', 'Oprema\RacunariKontroler@getDetalj')->name('racunari.oprema.detalj');
Route::get('racunari/dodavanje', 'Oprema\RacunariKontroler@getDodavanje')->name('racunari.oprema.dodavanje.get');
Route::post('racunari/dodavanje', 'Oprema\RacunariKontroler@postDodavanje')->name('racunari.oprema.dodavanje.post');
Route::get('racunari/otpis/{id}', 'Oprema\RacunariKontroler@getOtpis')->name('racunari.oprema.otpis');
Route::post('racunari/otpis', 'Oprema\RacunariKontroler@postOtpis')->name('racunari.oprema.otpis.post');
Route::get('racunari/izmena/{id}', 'Oprema\RacunariKontroler@getIzmena')->name('racunari.oprema.izmena.get');
Route::post('racunari/izmena/{id}', 'Oprema\RacunariKontroler@postIzmena')->name('racunari.oprema.izmena.post');
Route::get('racunari/lista/{paginacija?}/{sortiraj_nacin?}/{sortiraj_kolona?}', 'Oprema\RacunariKontroler@getLista')->name('racunari.oprema');
//Racunari - aplikacije
Route::get('racunari/aplikacije/{id}', 'Oprema\RacunariKontroler@getAplikacije')->name('racunari.oprema.aplikacije');
Route::post('racunari/aplikacije/{id}', 'Oprema\RacunariKontroler@postAplikacije')->name('racunari.oprema.aplikacije.post');
Route::post('aplikacije/brisanje/{id}', 'Oprema\RacunariKontroler@postBrisanjeAplikacije')->name('racunari.oprema.aplikacije.bisanje');
//Racunari - skeneriploce
Route::get('racunari/ploce/{id}', 'Oprema\RacunariKontroler@getPloce')->name('racunari.oprema.ploce');
Route::get('racunari/ploce/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiPlocu')->name('racunari.oprema.ploce.izvadi');
Route::get('racunari/ploce/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiPlocu')->name('racunari.oprema.ploce.izvadi.obrisi');
Route::post('racunari/ploce/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajPlocuNovu')->name('racunari.oprema.ploce.dodaj.novu');
Route::post('racunari/ploce/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajPlocuPostojecu')->name('racunari.oprema.ploce.dodaj.postojecu');
//Racunari - procesori
Route::get('racunari/procesori/{id}', 'Oprema\RacunariKontroler@getProcesore')->name('racunari.oprema.procesori');
Route::get('racunari/procesori/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiProcesor')->name('racunari.oprema.procesori.izvadi');
Route::get('racunari/procesori/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiProcesor')->name('racunari.oprema.procesori.izvadi.obrisi');
Route::post('racunari/procesori/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajProcesorNovi')->name('racunari.oprema.procesori.dodaj.novu');
Route::post('racunari/procesori/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajProcesorPostojeci')->name('racunari.oprema.procesori.dodaj.postojecu');
//Racunari - memorija
Route::get('racunari/memorije/{id}', 'Oprema\RacunariKontroler@getMemorije')->name('racunari.oprema.memorije');
Route::get('racunari/memorije/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiMemoriju')->name('racunari.oprema.memorije.izvadi');
Route::get('racunari/memorije/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiMemoriju')->name('racunari.oprema.memorije.izvadi.obrisi');
Route::post('racunari/memorije/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajMemorijuNovu')->name('racunari.oprema.memorije.dodaj.novu');
Route::post('racunari/memorije/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajMemorijuPostojecu')->name('racunari.oprema.memorije.dodaj.postojecu');
//Racunari - hdd
Route::get('racunari/hddovi/{id}', 'Oprema\RacunariKontroler@getHddove')->name('racunari.oprema.hddovi');
Route::get('racunari/hddovi/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiHdd')->name('racunari.oprema.hddovi.izvadi');
Route::get('racunari/hddovi/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiHdd')->name('racunari.oprema.hddovi.izvadi.obrisi');
Route::post('racunari/hddovi/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajHddNovi')->name('racunari.oprema.hddovi.dodaj.novu');
Route::post('racunari/hddovi/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajHddPostojeci')->name('racunari.oprema.hddovi.dodaj.postojecu');
//Racunari - napajanja
Route::get('racunari/napajanja/{id}', 'Oprema\RacunariKontroler@getNapajanja')->name('racunari.oprema.napajanja');
Route::get('racunari/napajanja/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiNapajanje')->name('racunari.oprema.napajanja.izvadi');
Route::get('racunari/napajanja/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiNapajanje')->name('racunari.oprema.napajanja.izvadi.obrisi');
Route::post('racunari/napajanja/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajNapajanjeNovo')->name('racunari.oprema.napajanja.dodaj.novu');
Route::post('racunari/napajanja/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajNapajanjePostojece')->name('racunari.oprema.napajanja.dodaj.postojecu');
//Racunari - vga
Route::get('racunari/vga/{id}', 'Oprema\RacunariKontroler@getVga')->name('racunari.oprema.vga');
Route::get('racunari/vga/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiVga')->name('racunari.oprema.vga.izvadi');
Route::get('racunari/vga/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiVga')->name('racunari.oprema.vga.izvadi.obrisi');
Route::post('racunari/vga/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajVgaNovi')->name('racunari.oprema.vga.dodaj.novu');
Route::post('racunari/vga/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajVgaPostojeci')->name('racunari.oprema.vga.dodaj.postojecu');
//Racunari - monitori
Route::get('racunari/monitori/{id}', 'Oprema\RacunariKontroler@getMonitor')->name('racunari.oprema.monitori');
Route::get('racunari/monitori/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiMonitor')->name('racunari.oprema.monitori.izvadi');
Route::get('racunari/monitori/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiMonitor')->name('racunari.oprema.monitori.izvadi.obrisi');
Route::post('racunari/monitori/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajMonitorNovi')->name('racunari.oprema.monitori.dodaj.novu');
Route::post('racunari/monitori/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajMonitorPostojeci')->name('racunari.oprema.monitori.dodaj.postojecu');
//Racunari - stampaci
Route::get('racunari/stampaci/{id}', 'Oprema\RacunariKontroler@getStampac')->name('racunari.oprema.stampaci');
Route::get('racunari/stampaci/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiStampac')->name('racunari.oprema.stampaci.izvadi');
Route::get('racunari/stampaci/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiStampac')->name('racunari.oprema.stampaci.izvadi.obrisi');
Route::post('racunari/stampaci/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajStampacNovi')->name('racunari.oprema.stampaci.dodaj.novu');
Route::post('racunari/stampaci/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajStampacPostojeci')->name('racunari.oprema.stampaci.dodaj.postojecu');
//Racunari - skeneri
Route::get('racunari/skeneri/{id}', 'Oprema\RacunariKontroler@getSkener')->name('racunari.oprema.skeneri');
Route::get('racunari/skeneri/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiSkener')->name('racunari.oprema.skeneri.izvadi');
Route::get('racunari/skeneri/izvadi/obrisi/{id}', 'Oprema\RacunariKontroler@getIzvadiObrisiSkener')->name('racunari.oprema.skeneri.izvadi.obrisi');
Route::post('racunari/skeneri/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajSkenerNovi')->name('racunari.oprema.skeneri.dodaj.novu');
Route::post('racunari/skeneri/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajSkenerPostojeci')->name('racunari.oprema.skeneri.dodaj.postojecu');



