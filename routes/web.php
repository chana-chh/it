<?php

Route::get('/', 'PocetnaKontroler@pocetna')->name('pocetna');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Korisnici
Route::get('sifarnici/korisnici', 'KorisniciKontroler@getLista')->name('korisnici');
Route::post('sifarnici/korisnici/dodavanje', 'KorisniciKontroler@postDodavanje')->name('korisnici.dodavanje');
Route::post('sifarnici/korisnici/brisanje', 'KorisniciKontroler@postBrisanje')->name('korisnici.brisanje');
Route::post('sifarnici/korisnici/izmena/{id}', 'KorisniciKontroler@postIzmena')->name('korisnici.izmena');
Route::get('sifarnici/korisnici/pregled/{id}', 'KorisniciKontroler@getPregled')->name('korisnici.pregled');


// SERVIS
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
Route::get('otpremnice/stavke/{id_otpremnice}', 'Servis\OtpremniceStavkeKontroler@getLista')->name('otpremnice.stavke');
Route::get('otpremnice/stavke/dodavanje/{id_otpremnice}', 'Servis\OtpremniceStavkeKontroler@getDodavanje')->name('otpremnice.stavke.dodavanje.get');
Route::post('otpremnice/stavke/dodavanje', 'Servis\OtpremniceStavkeKontroler@postDodavanje')->name('otpremnice.stavke.dodavanje.post');
Route::get('otpremnice/stavke/izmena/{id}', 'Servis\OtpremniceStavkeKontroler@getIzmena')->name('otpremnice.stavke.izmena.get');
Route::post('otpremnice/stavke/izmena/{id}', 'Servis\OtpremniceStavkeKontroler@postIzmena')->name('otpremnice.stavke.izmena.post');
Route::get('otpremnice/stavke/detalj/{id}', 'Servis\OtpremniceStavkeKontroler@getDetalj')->name('otpremnice.stavke.detalj');
Route::post('otpremnice/stavke/brisanje', 'Servis\OtpremniceStavkeKontroler@postBrisanje')->name('otpremnice.stavke.brisanje');

// Nabavke
Route::get('nabavke', 'Servis\NabavkeKontroler@getLista')->name('nabavke');
Route::get('nabavke/dodavanje', 'Servis\NabavkeKontroler@getDodavanje')->name('nabavke.dodavanje.get');
Route::post('nabavke/dodavanje', 'Servis\NabavkeKontroler@postDodavanje')->name('nabavke.dodavanje.post');
Route::get('nabavke/izmena/{id}', 'Servis\NabavkeKontroler@getIzmena')->name('nabavke.izmena.get');
Route::post('nabavke/izmena/{id}', 'Servis\NabavkeKontroler@postIzmena')->name('nabavke.izmena.post');
Route::get('nabavke/detalj/{id}', 'Servis\NabavkeKontroler@getDetalj')->name('nabavke.detalj');
Route::post('nabavke/brisanje', 'Servis\NabavkeKontroler@postBrisanje')->name('nabavke.brisanje');

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
Route::post('sifarnici/lokacije/brisanje', 'Sifarnici\LokacijeKontroler@postBrisanje')->name('lokacije.brisanje');
Route::post('sifarnici/lokacije/izmena', 'Sifarnici\LokacijeKontroler@postIzmena')->name('lokacije.izmena');
Route::post('sifarnici/lokacije/detalj', 'Sifarnici\LokacijeKontroler@postDetalj')->name('lokacije.detalj');

// Spratovi
Route::get('sifarnici/spratovi', 'Sifarnici\SpratoviKontroler@getLista')->name('spratovi');
Route::post('sifarnici/spratovi/dodavanje', 'Sifarnici\SpratoviKontroler@postDodavanje')->name('spratovi.dodavanje');
Route::post('sifarnici/spratovi/brisanje', 'Sifarnici\SpratoviKontroler@postBrisanje')->name('spratovi.brisanje');
Route::post('sifarnici/spratovi/izmena', 'Sifarnici\SpratoviKontroler@postIzmena')->name('spratovi.izmena');
Route::post('sifarnici/spratovi/detalj', 'Sifarnici\SpratoviKontroler@postDetalj')->name('spratovi.detalj');

// Kancelarije
Route::get('sifarnici/kancelarije', 'Sifarnici\KancelarijeKontroler@getLista')->name('kancelarije');
Route::get('sifarnici/kancelarije/detaljno/{id}', 'Sifarnici\KancelarijeKontroler@getDetalj')->name('kancelarije.detalj.get');
Route::post('sifarnici/kancelarije/dodavanje', 'Sifarnici\KancelarijeKontroler@postDodavanje')->name('kancelarije.dodavanje');
Route::post('sifarnici/kancelarije/brisanje', 'Sifarnici\KancelarijeKontroler@postBrisanje')->name('kancelarije.brisanje');
Route::post('sifarnici/kancelarije/izmena', 'Sifarnici\KancelarijeKontroler@postIzmena')->name('kancelarije.izmena');
Route::post('sifarnici/kancelarije/detalj', 'Sifarnici\KancelarijeKontroler@postDetalj')->name('kancelarije.detalj');

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
Route::get('modeli/upsevi/baterije/{id}', 'Modeli\UpseviKontroler@getBaterije')->name('upsevi.modeli.baterije');


//OPREMA
//Procesori
Route::get('oprema/procesori/', 'Oprema\ProcesoriKontroler@getLista')->name('procesori.oprema');
Route::get('oprema/procesori/detalj/{id}', 'Oprema\ProcesoriKontroler@getDetalj')->name('procesori.oprema.detalj');
Route::get('oprema/procesori/dodavanje', 'Oprema\ProcesoriKontroler@getDodavanje')->name('procesori.oprema.dodavanje.get');
Route::post('oprema/procesori/dodavanje', 'Oprema\ProcesoriKontroler@postDodavanje')->name('procesori.oprema.dodavanje.post');

//Racunari
Route::get('oprema/racunari/', 'Oprema\RacunariKontroler@getLista')->name('racunari.oprema');
Route::get('oprema/racunari/ajax', 'Oprema\RacunariKontroler@getAjax')->name('racunari.ajax');
Route::get('oprema/racunari/detalj/{id}', 'Oprema\RacunariKontroler@getDetalj')->name('racunari.oprema.detalj');
Route::get('oprema/racunari/dodavanje', 'Oprema\RacunariKontroler@getDodavanje')->name('racunari.oprema.dodavanje.get');
Route::post('oprema/racunari/dodavanje', 'Oprema\RacunariKontroler@postDodavanje')->name('racunari.oprema.dodavanje.post');
Route::get('oprema/racunari/aplikacije/{id}', 'Oprema\RacunariKontroler@getAplikacije')->name('racunari.oprema.aplikacije');
Route::get('oprema/racunari/ploce/{id}', 'Oprema\RacunariKontroler@getPloce')->name('racunari.oprema.ploce');
Route::get('oprema/racunari/ploce/izvadi/{id}', 'Oprema\RacunariKontroler@getIzvadiPlocu')->name('racunari.oprema.ploce.izvadi');
Route::post('oprema/racunari/ploce/dodaj/novu/{id}', 'Oprema\RacunariKontroler@postDodajPlocuNovu')->name('racunari.oprema.ploce.dodaj.novu');
Route::post('oprema/racunari/ploce/dodaj/postojecu/{id}', 'Oprema\RacunariKontroler@postDodajPlocuPostojecu')->name('racunari.oprema.ploce.dodaj.postojecu');


