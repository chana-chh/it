<?php

use Illuminate\Database\Seeder;

class Zaposleni extends Seeder
{

    public function run()
    {
        DB::beginTransaction();

        DB::table('zaposleni')->insert([
            'prezime' => trim('STANIŠIĆ'),
            'ime' => trim('SONJA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Koordinator za poslove organizovanja i izvršavanja plaćanja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SAVIĆ'),
            'ime' => trim('JASMINA '),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za finansijsko - računovodstvene poslove --- Računovodstveni poslovi-analitičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOJEVIĆ '),
            'ime' => trim('JASNA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Načelnik Gradske uprave'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TOMAŠEVIĆ '),
            'ime' => trim('JASNA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje trezora --- Računovodstveni poslovi-likvidator '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KOMATOVIĆ-ANDONOVIĆ'),
            'ime' => trim('ANA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za budžet --- Poslovi pripreme i praćenja izvršenja budžeta'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽIVANOVIĆ '),
            'ime' => trim('MARIJA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za budžet --- Poslovi upravljanja javnim dugom '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JANIĆIJEVIĆ'),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za budžet --- Poslovi bilansiranja javnih prihoda i javnih rashoda'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SIMOVIĆ'),
            'ime' => trim('TINA '),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za budžet --- Poslovi bilansiranja javnih prihoda i javnih rashoda'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LEKOVIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za budžet --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MATIĆ-PAVLOVIĆ'),
            'ime' => trim('ALEKSANDRA '),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za finansijsko - računovodstvene poslove --- Računovodstveni poslovi-knjigovodja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KNEŽEVIĆ'),
            'ime' => trim('NEBOJŠA '),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za finansijsko - računovodstvene poslove --- Poslovi obračuna zarada i naknada'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ANTONIJEVIĆ'),
            'ime' => trim('JELENA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za budžet --- Poslovi budžetskog izveštavanja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LEKOVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje trezora --- Poslovi evidencije prihoda'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JEVTIĆ '),
            'ime' => trim('NIKOSAVA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za finansijsko - računovodstvene poslove --- Računovodstveni poslovi-materijalni knjigivodja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VESELINOVIĆ'),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje trezora --- Poslovi evidencije prihoda'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAUNOVIĆ'),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za finansijsko - računovodstvene poslove --- Računovodstveni poslovi-analitičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SVIČEVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za finansijsko - računovodstvene poslove --- Finansijsko-računovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DRAGOJLOVIĆ'),
            'ime' => trim('KATARINA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje trezora --- Poslovi budžetskog računovodstva-likvidator '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILIĆEVIĆ '),
            'ime' => trim('ZORICA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje trezora --- Poslovi kontrole prihoda i rashoda i izrade konsolidovanih finansijskih izveštaja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RAKIĆ'),
            'ime' => trim('ĐORĐE'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za finansijsko - računovodstvene poslove --- Finansijsko-računovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('TAMARA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za finansijsko - računovodstvene poslove --- Poslovi likvidature '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JANKOVIĆ'),
            'ime' => trim('ANA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje trezora --- Poslovi planiranja i upravljanja finansijskim tokovima'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ČALIJA '),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje trezora --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SOTIROV-STEFANOVIĆ '),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 1,
            'radno_mesto' => trim('Odeljenje za finansijsko - računovodstvene poslove --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GRUJIĆ '),
            'ime' => trim('KATARINA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Inspektor kancelarijske kontrole'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐEKIĆ'),
            'ime' => trim('BOŠKO'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Analitički poslovi terenske kontrole '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SAVIĆ'),
            'ime' => trim('ANA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Inspektor naplate'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐOŠIĆ'),
            'ime' => trim('MILANKA '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Poslovi unosa prijava '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STANKOVIĆ '),
            'ime' => trim('ZORICA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Poslovi unosa prijava '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Inspektor terenske kontrole '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GLIŠIĆ '),
            'ime' => trim('MILOŠ'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Poslovi izdavanja uverenja I'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUJNOVIĆ'),
            'ime' => trim('SVETLANA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Načelnik Odeljenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('MILOŠ'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za poresko-pravne poslove --- Administrativno operativni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MIJATOVIĆ '),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Inspektor terenske kontrole '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOJEVIĆ '),
            'ime' => trim('IRENA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Kancelarijski poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('OBRADOVIĆ '),
            'ime' => trim('ZORAN'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za poresko-pravne poslove --- Administrativno operativni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('HADŽIĆ '),
            'ime' => trim('BILJANA '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Poslovi izdavanja uverenja I'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŠAPIĆ'),
            'ime' => trim('VERICA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Šef službe za kancelarijsku kontrolu '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('CVIJETIĆ'),
            'ime' => trim('MIRO '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Inspektor terenske kontrole '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VASOJEVIĆ '),
            'ime' => trim('OLIVERA '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Poreski računovodja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NEŠIĆ-ŠARIĆ'),
            'ime' => trim('SANJA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Inspektor kancelarijske kontrole I'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NIKOLIĆ'),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Inspektor naplate II'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILIĆEVIĆ '),
            'ime' => trim('ĐORĐE'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Analitički poslovi terenske kontrole '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KIMPANOV'),
            'ime' => trim('ANA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Poreski računovodja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ČOMAGIĆ-POPOVIĆ '),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za poresko-pravne poslove --- Poslovi prekršajnog postupka '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐINĐIĆ '),
            'ime' => trim('SLAVICA '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Načelnik Gradske uprave'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('OBROVIĆ'),
            'ime' => trim('MILAN'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Inspektor terenske kontrole '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('NEBOJŠA '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za poresko-pravne poslove --- Administrativni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BOGDANOVSKI'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Inspektor terenske kontrole '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARINKOVIĆ'),
            'ime' => trim('MILICA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Šef službe za naplatu '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GOBELJIĆ'),
            'ime' => trim('IVANA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Načelnik Odeljenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOSAVČEVIĆ '),
            'ime' => trim('OLGA '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za poresko-pravne poslove --- Poresko - pravni poslovi I'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STANISAVLJEVIĆ'),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Inspektor kancelarijske kontrole'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JEVTIĆ '),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Poslovi izdavanja uverenja I'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SREJIĆ '),
            'ime' => trim('MILANKA '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Inspektor terenske kontrole '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STANOJEVIĆ'),
            'ime' => trim('SANJA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za poresko-pravne poslove --- Poresko pravni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KALAJDŽIĆ '),
            'ime' => trim('SLAĐANA '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Inspektor naplate'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TRAJKOVSKI'),
            'ime' => trim('DUBRAVKA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Inspektor naplate'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BUĆAN'),
            'ime' => trim('KATARINA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Poslovi izdavanja uverenja I'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETRIĆ '),
            'ime' => trim('DALIBOR '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Inspektor kancelarijske kontrole II'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEVIĆ '),
            'ime' => trim('MILOVAN '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za poresko-pravne poslove --- Poreski izvršitelj'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MATIĆ'),
            'ime' => trim('NEBOJŠA '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Poslovi izdavanja uverenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVANOVIĆ '),
            'ime' => trim('GORDANA '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za poresko-pravne poslove --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐEKIĆ'),
            'ime' => trim('VLADIMIR'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za naplatu i poresko-računovodstvene poslove --- Inspektor naplate I'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JEVTIĆ '),
            'ime' => trim('LJILJANA'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Koordinator za pravne poslove iz nadležnosti Uprave '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAUNOVIĆ'),
            'ime' => trim('ĐORĐE'),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za kontrolu --- Inspektor kancelarijske kontrole'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SIMOVIĆ'),
            'ime' => trim('MILORAD '),
            'uprava_id' => 2,
            'radno_mesto' => trim('Odeljenje za poresko-pravne poslove --- Administrativno operativni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RAFAILOVIĆ'),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za planiranje i pripremu investicija --- Pravni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VULOVIĆ'),
            'ime' => trim('RADOSAV '),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za realizaciju investcija --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MLADIĆEVIĆ'),
            'ime' => trim('VOJISLAV'),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za planiranje i pripremu investicija --- Poslovi pripreme projektne dokumentacije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('FILIPOVIĆ '),
            'ime' => trim('RADMILA '),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za planiranje i pripremu investicija --- Finansijsko-računovodstveni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za planiranje i pripremu investicija --- Finansijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŠEĆIĆ'),
            'ime' => trim('EDI'),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za planiranje i pripremu investicija --- Poslovi geodetsko-katastarske pripreme '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MIĆIĆ'),
            'ime' => trim('NEVENA'),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za planiranje i pripremu investicija --- Poslovi pripreme projektne dokumentacije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĆURIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za planiranje i pripremu investicija --- Poslovi pripreme urbanističke dokumentacije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEVANOVIĆ'),
            'ime' => trim('TATJANA '),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za planiranje i pripremu investicija --- Poslovi pripreme projektne dokumentacije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PANTIĆ '),
            'ime' => trim('PREDRAG '),
            'uprava_id' => 3,
            'radno_mesto' => trim('Načelnik Gradske uprave'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐOKOVIĆ'),
            'ime' => trim('ZORICA'),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za planiranje i pripremu investicija --- Pravni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILJKOVIĆ '),
            'ime' => trim('KATARINA'),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za planiranje i pripremu investicija --- Administrativno tehnički poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JELESIJEVIĆ'),
            'ime' => trim('NENAD'),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za realizaciju investcija --- Poslovi izgradnje i održavanja - oblast hidrogradnje '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILIĆEVIĆ '),
            'ime' => trim('SAŠA '),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za planiranje i pripremu investicija --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŠĆEPANOVIĆ'),
            'ime' => trim('NEŠO '),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za realizaciju investcija --- Poslovi u oblasti gradnje, rekonstrukcije,sanacije,adaptacije i održavanja objekata visokogradnje i niskogradnje '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADISAVLJEVIĆ'),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za realizaciju investcija --- Poslovi izgradnje i održavanja puteva - oblast niskogradnje'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('GORAN'),
            'uprava_id' => 3,
            'radno_mesto' => trim('Koordinator za imovinsko pravne poslove '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADIVOJEVIĆ'),
            'ime' => trim('PREDRAG '),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za realizaciju investcija --- Poslovi izgradnje, održavanja puteva i hidrogradnje'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKIĆEVIĆ '),
            'ime' => trim('MARKO'),
            'uprava_id' => 3,
            'radno_mesto' => trim('Odeljenje za planiranje i pripremu investicija --- Poslovi pripreme projektne dokumentacije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('VELJKO'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Služba za poslovni prostor grada Kragujevca --- Administrativno-tehnički poslovi u oblasti poslovnog prostora grada Kragujevca'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVIĆ'),
            'ime' => trim('VERICA'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za imovinu i imovinsko – pravne poslove --- Imovinsko-pravni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĆUPIĆ'),
            'ime' => trim('DUŠICA'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Načelnik Gradske uprave'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RISTOVIĆ'),
            'ime' => trim('SLAVICA '),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za imovinu i imovinsko – pravne poslove --- Stručni i operativni poslovi u oblasti imovine'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BUNDALO'),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za stambene poslove --- Normativno-pravni, nadzorni i upravni poslovi u stambenoj oblasti'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LEKOVIĆ'),
            'ime' => trim('VELJKO'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za stambene poslove --- Normativno-pravni, nadzorni i upravni poslovi u stambenoj oblasti'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILENKOVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 4,
            'radno_mesto' => trim('Služba za ekonomsko - finansijske poslove --- Ekonomsko-finansijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAUNOVIĆ'),
            'ime' => trim('SRĐAN'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za imovinu i imovinsko – pravne poslove --- Stručni i operativni poslovi u oblasti imovine'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVANOVIĆ '),
            'ime' => trim('JELENA'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Služba za ekonomsko - finansijske poslove --- Stručni i operativni poslovi u oblasti finansija'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SIMEUNOVIĆ-ĐORĐEVIĆ'),
            'ime' => trim('SVETLANA'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za imovinu i imovinsko – pravne poslove --- Imovinsko-pravni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ISKRENOVIĆ'),
            'ime' => trim('DEJAN'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Služba za poslovni prostor grada Kragujevca --- Šef Službe'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JEKIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za imovinu i imovinsko – pravne poslove --- Imovinsko-pravni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADIVOJEVIĆ'),
            'ime' => trim('MILOŠ'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Služba za poslovni prostor grada Kragujevca --- Normativno-pravni i upravni poslovi u oblasti poslovnog prostora grada Kragujevca'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za imovinu i imovinsko – pravne poslove --- Stručno-operativni i administrativni poslovi u oblasti evidencije imovine'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('SRĐAN'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za imovinu i imovinsko – pravne poslove --- Poslovi imovine i evidencije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽIVKOVIĆ'),
            'ime' => trim('DANICA'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Služba za ekonomsko - finansijske poslove --- Šef Službe '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NEDELJKOVIĆ'),
            'ime' => trim('RADOJICA'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za imovinu i imovinsko – pravne poslove --- Poslovi imovine i evidencije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILJKOVIĆ '),
            'ime' => trim('ANA'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za imovinu i imovinsko – pravne poslove --- Stručno-operativni i administrativni poslovi u oblasti evidencije imovine'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TASIĆ'),
            'ime' => trim('NIKOLA'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za stambene poslove --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUJIĆ'),
            'ime' => trim('SLAĐANA '),
            'uprava_id' => 4,
            'radno_mesto' => trim('Služba za ekonomsko - finansijske poslove --- Administrativno-tehnički poslovi u ekonomsko-finansijskoj oblasti'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKOMANOVIĆ'),
            'ime' => trim('RATKO'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za stambene poslove --- Normativno-pravni, nadzorni i upravni poslovi u stambenoj oblasti'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SAVIĆ'),
            'ime' => trim('MIODRAG '),
            'uprava_id' => 4,
            'radno_mesto' => trim('Služba za ekonomsko - finansijske poslove --- Ekonomsko-finansijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOVANOVIĆ'),
            'ime' => trim('SUZANA'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za imovinu i imovinsko – pravne poslove --- Imovinsko-pravni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUJIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za stambene poslove --- Poslovi za stambena pitanja i prinudno izvršenje'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JAKOVLJEVIĆ'),
            'ime' => trim('SVETLANA'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za imovinu i imovinsko – pravne poslove --- Imovinsko-pravni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAVLOVIĆ'),
            'ime' => trim('SLAVICA '),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za imovinu i imovinsko – pravne poslove --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETRIĆ '),
            'ime' => trim('ANA'),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za imovinu i imovinsko – pravne poslove --- Imovinsko-pravni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARINKOVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 4,
            'radno_mesto' => trim('Odeljenje za stambene poslove --- Stručno-operativni i administrativno-tehnički poslovi u stambenoj oblasti '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOŠEVIĆ '),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Tehnički poslovi u oblasti ozakonjenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VASILJEVIĆ'),
            'ime' => trim('ANA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Administrativno-tehnički poslovi u oblasti ozakonjenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ANASTASIJEVIĆ'),
            'ime' => trim('IVAN '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za objedinjenu proceduru --- Tehnički poslovi u oblasti objedinjene procedure'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MRKALJ '),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za prostorno planiranje i zaštitu životne sredine --- Poslovi zaštitite životne sredine'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KRSTIĆ '),
            'ime' => trim('MILICA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za objedinjenu proceduru --- Pravni poslovi u oblasti objedinjene procedure'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('UROŠEVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ekonomsko-finansijske poslove i poslove obračuna doprinosa za uredjivanje gradjevinskog zemljišta --- Ekonomsko-finansijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BLAGOJEVIĆ'),
            'ime' => trim('BILJANA '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Pravni poslovi u oblasti ozakonjenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVANOVIĆ '),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Registrator registra objedinjenih procedura'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADAKOVIĆ '),
            'ime' => trim('SLAĐANA '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Administrativno-tehnički poslovi u oblasti ozakonjenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STOJANOVIĆ'),
            'ime' => trim('SMILJANA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za prostorno planiranje i zaštitu životne sredine --- Pravni poslovi u oblasti prostornog planiranja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARINKOVIĆ-GABARIĆ '),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Načelnik odeljenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARINKOVIĆ'),
            'ime' => trim('DRAGAN'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za prostorno planiranje i zaštitu životne sredine --- Šef službe '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOSAVLJEVIĆ'),
            'ime' => trim('ANA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za objedinjenu proceduru --- Tehnički poslovi u oblasti objedinjene procedure'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐURIĆ'),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za objedinjenu proceduru --- Pravni poslovi u oblasti objedinjene procedure'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SIMONOVIĆ '),
            'ime' => trim('ANA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za prostorno planiranje i zaštitu životne sredine --- Pravni poslovi u oblasti zaštite životne sredine'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUJOVIĆ'),
            'ime' => trim('MILOŠ'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Stručni poslovi u oblasti ozakonjenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DAVIDOVIĆ '),
            'ime' => trim('ZORAN'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za objedinjenu proceduru --- Tehnički poslovi u oblasti objedinjene procedure'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILETIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za objedinjenu proceduru --- Pravni poslovi u oblasti objedinjene procedure'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DIVAC'),
            'ime' => trim('BOJANA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za prostorno planiranje i zaštitu životne sredine --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JONTULOVIĆ'),
            'ime' => trim('IRENA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Administrativno-tehnički poslovi u oblasti ozakonjenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STOJANOVIĆ'),
            'ime' => trim('HADŽI-MILAN'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ekonomsko-finansijske poslove i poslove obračuna doprinosa za uredjivanje gradjevinskog zemljišta --- Ekonomsko-finansijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARIĆ'),
            'ime' => trim('PREDRAG '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ekonomsko-finansijske poslove i poslove obračuna doprinosa za uredjivanje gradjevinskog zemljišta --- Administrativno-tehnički poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOVANOVIĆ'),
            'ime' => trim('MILENA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za objedinjenu proceduru --- Daktilograf '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TODOROVIĆ '),
            'ime' => trim('DRAGAN'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Administrativno-tehnički poslovi u oblasti ozakonjenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('POPADIĆ'),
            'ime' => trim('MILENA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za prostorno planiranje i zaštitu životne sredine --- Poslovi prikupljanja, obrade i evidencije podataka u oblasti planiranja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SAVIĆ'),
            'ime' => trim('ALEKSANDAR '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Upravno-pravni poslovi u oblasti ozakonjenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NIKOLIĆ'),
            'ime' => trim('MILIJANA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za objedinjenu proceduru --- Pravni poslovi u oblasti objedinjene procedure'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ANTIĆ'),
            'ime' => trim('SRĐAN'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Stručni poslovi u oblasti ozakonjenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOŠEVIĆ '),
            'ime' => trim('MILJANA '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Upravno-pravni poslovi u oblasti ozakonjenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RAKOČEVIĆ '),
            'ime' => trim('BAŠIĆ'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Tehnički poslovi u oblasti ozakonjenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KOSOVAC'),
            'ime' => trim('ZORICA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Stručni poslovi u oblasti ozakonjenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILIĆ'),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Upravno-pravni poslovi u oblasti ozakonjenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOŠEVIĆ '),
            'ime' => trim('ANA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Stručni poslovi u oblasti ozakonjenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KAŠIKOVIĆ '),
            'ime' => trim('VLADANA '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za prostorno planiranje i zaštitu životne sredine --- Urbanista'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NOVAKOVIĆ '),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za prostorno planiranje i zaštitu životne sredine --- Poslovi zaštitite životne sredine'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KALTAK '),
            'ime' => trim('CVETANKA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za objedinjenu proceduru --- Pravni poslovi u oblasti objedinjene procedure'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVANOVIĆ '),
            'ime' => trim('TATJANA '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za prostorno planiranje i zaštitu životne sredine --- Urbanista'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LEKIĆ'),
            'ime' => trim('ŽARKO'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za objedinjenu proceduru --- Tehnički poslovi u oblasti objedinjene procedure'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ALEMPIJEVIĆ'),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za objedinjenu proceduru --- Šef službe'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEPOVIĆ'),
            'ime' => trim('SLAVICA '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ekonomsko-finansijske poslove i poslove obračuna doprinosa za uredjivanje gradjevinskog zemljišta --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ČIMBUROVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ekonomsko-finansijske poslove i poslove obračuna doprinosa za uredjivanje gradjevinskog zemljišta --- Administrativno-tehnički poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('AKSENTIJEVIĆ '),
            'ime' => trim('DRAGAN'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za objedinjenu proceduru --- Tehnički poslovi u oblasti objedinjene procedure'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SPASENIĆ'),
            'ime' => trim('TOMISLAV'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Načelnik Gradske uprave'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐORĐEVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Administrativno-tehnički poslovi u oblasti ozakonjenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MRDAK'),
            'ime' => trim('DALIBORKA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za ozakonjenje --- Stručni poslovi u oblasti ozakonjenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DUMBELOVIĆ'),
            'ime' => trim('JELENA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za prostorno planiranje i zaštitu životne sredine --- Urbanista'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SEKULIĆ'),
            'ime' => trim('LJILJANA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za objedinjenu proceduru --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ANTONIJEVIĆ'),
            'ime' => trim('IVANA'),
            'uprava_id' => 5,
            'radno_mesto' => trim('Odeljenje za prostorno planiranje i zaštitu životne sredine --- Poslovi zaštitite životne sredine'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ČAUŠEVIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za lokalno-ekonomski razvoj --- Poslovi ekonomskog razvoja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TODOROVIĆ '),
            'ime' => trim('BOJAN'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za lokalno-ekonomski razvoj --- Poslovi planiranja i kontrole '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TOMIĆ'),
            'ime' => trim('BILJANA '),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za upravljanje projektima --- Poslovi upravljanja projektima'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOJEVIĆ '),
            'ime' => trim('ANA'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za energetsku efikasnost --- Mirovanje radnog odnosa '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEPOVIĆ'),
            'ime' => trim('NADA '),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za energetsku efikasnost --- Poslovi energetskog manadžmenta'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DOMANOVIĆ '),
            'ime' => trim('ALEKSANDAR '),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za lokalno-ekonomski razvoj --- Rukovodilac Grupe '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILETIĆ'),
            'ime' => trim('NIKOLA'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za upravljanje projektima --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MATIJAŠEVIĆ'),
            'ime' => trim('DEJAN'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za upravljanje projektima --- Poslovi u oblasti pripreme projekata'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PANTOVIĆ'),
            'ime' => trim('IVICA'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za energetsku efikasnost --- Poslovi energetskog manadžmenta'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEVIĆ '),
            'ime' => trim('SLAĐANA '),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za energetsku efikasnost --- Poslovi energetskog manadžmenta'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('MIŠEL'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za energetsku efikasnost --- Poslovi energetskog manadžmenta'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STOJANOVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za energetsku efikasnost --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NIKOLIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za lokalno-ekonomski razvoj --- Finansijsko - računovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PEŠIĆ-RADOSAVLJEVIĆ'),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Načelnik Gradske uprave'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILJOJKOVIĆ'),
            'ime' => trim('ANĐELA'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za upravljanje projektima --- Poslovi u oblasti tehničke pripreme projekata'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NESTOROVIĆ'),
            'ime' => trim('SVETLANA'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za lokalno-ekonomski razvoj --- Finansijsko - računovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JEVĐIĆ-STANARČIĆ'),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za lokalno-ekonomski razvoj --- Poslovi planiranja i kontrole '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEVANOVIĆ'),
            'ime' => trim('MLADEN'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za energetsku efikasnost --- Poslovi energetskog manadžmenta'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SOKOVIĆ'),
            'ime' => trim('SAŠA '),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za lokalno-ekonomski razvoj --- Poslovi evropskih integracija '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SAVKOVIĆ'),
            'ime' => trim('ZORICA'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za lokalno-ekonomski razvoj --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STOJANOVIĆ'),
            'ime' => trim('SANJA'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za upravljanje projektima --- Poslovi u oblasti pripreme projekata'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LAZOVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za upravljanje projektima --- Poslovi upravljanja projektima'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('VLADIMIR'),
            'uprava_id' => 6,
            'radno_mesto' => trim('Odeljenje za upravljanje projektima --- Poslovi upravljanja projektima'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RISTIĆ '),
            'ime' => trim('JELENA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za finansije --- Finansijsko-računovodstveni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MIRKOVIĆ'),
            'ime' => trim('SLOBODAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija-matičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MIHAJLOVIĆ'),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Koordinator poslova ažuriranja biračkog spiska '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐEROVSKI'),
            'ime' => trim('VLADAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za informaciono komunikacione tehnologije --- NačelnikOdeljenjaza informaciono komunikacione tehnologije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DUGALIĆ'),
            'ime' => trim('DANICA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za informaciono komunikacione tehnologije --- Telefonista'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MIRČETIĆ'),
            'ime' => trim('BRATISLAV'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JANKOVIĆ-ŠKRBIĆ '),
            'ime' => trim('GORDANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Administrativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JANKOVIĆ'),
            'ime' => trim('RADIŠA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija-matičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOJKOVIĆ'),
            'ime' => trim('SANJA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐORIĆ'),
            'ime' => trim('ZORICA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Načelnik Odeljenjaza nabavke, bezvednost, zaštitu i internu podršku'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOŠEVIĆ '),
            'ime' => trim('MILOŠ'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Vozač '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILENTIJEVIĆ '),
            'ime' => trim('SAŠA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Operativno - tehnički poslovi bezbednosti i zaštite'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐOKOVIĆ'),
            'ime' => trim('DRAGAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Portir'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RANĐELOVIĆ'),
            'ime' => trim('VERICA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi pravne pomoći'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MIJAILOVIĆ'),
            'ime' => trim('SAŠA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Portir'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LAZAREVIĆ '),
            'ime' => trim('IVAN '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Vozač '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NIDŽOVIĆ'),
            'ime' => trim('ALEKSANDAR '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za finansije --- Računovodstveni-knjigovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ZDRAVKOVIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi održavanja uredjaja i instalacija - domar'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('IVANOVIĆ'),
            'ime' => trim('KATARINA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RIZNIĆ '),
            'ime' => trim('DEJAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Prijem podnesaka i ekspedicija pošte'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('SVETLANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručno-operativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐUKIĆ'),
            'ime' => trim('SLAĐANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Administrativno-tehnički poslovi iz oblasti rada i radnih odnosa'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KALIČANIN '),
            'ime' => trim('ALEKSANDAR '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Rukovodilac Grupe za poslove matičnih područja na teritoriji opštine Peć, Istok i Klina'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KOČOVIĆ'),
            'ime' => trim('NADICA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Matičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SIMOVIĆ'),
            'ime' => trim('NEVENA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Stručni poslovi pisarnice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĆUPIĆ'),
            'ime' => trim('IVANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Načelnik Sektora za zajedničke poslove '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAVLOVIĆ'),
            'ime' => trim('SLAĐANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija-zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STOJANOVIĆ'),
            'ime' => trim('VLADAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za informaciono komunikacione tehnologije --- Inženjer sistema i baza podataka'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILUTINOVIĆ'),
            'ime' => trim('MILORAD '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Portir'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KALUŠEVIĆ '),
            'ime' => trim('MILA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Prijem podnesaka i ekspedicija pošte'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOSAVLJEVIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za finansije --- Računovodstveno-knjigovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RISTIĆ '),
            'ime' => trim('JOVAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručno-operativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MIHAILOVA '),
            'ime' => trim('SLAVICA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Administrativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JAKOVLJEVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi gradjanskih stanja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STOJANOVIĆ'),
            'ime' => trim('RADOSLAV'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručno-operativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('OBRADOVIĆ '),
            'ime' => trim('SLAVICA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOJEVIĆ '),
            'ime' => trim('ZORAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Konobar'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĆURČIĆ '),
            'ime' => trim('ZORA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručno-operativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RIHTEROVIĆ'),
            'ime' => trim('JASMINA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi pravne pomoći'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KATUŠIĆ'),
            'ime' => trim('BILJANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Načelnik Odeljenja pravne pomoći i gradskih kancelarija '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BRKIĆ'),
            'ime' => trim('DRAGAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručno-operativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ALEKSIĆ'),
            'ime' => trim('GORAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Načelnik Sektora za opšte poslove'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŠAMANOVIĆ '),
            'ime' => trim('SLAVICA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija - zamenik matičara'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEVANOVIĆ'),
            'ime' => trim('MILIJA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija - zamenik matičara'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BOGDANOVIĆ'),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Pravni poslovi u oblasti rada i radnih odnosa i upravljanja ljudskim resursima'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILENTIJEVIĆ '),
            'ime' => trim('BOJAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('SAŠA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija-matičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽIVADINOVIĆ'),
            'ime' => trim('MILAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija-matičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOSIĆ'),
            'ime' => trim('RADOJE'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Matičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADEVIĆ'),
            'ime' => trim('STANKO'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi održavanja uredjaja i instalacija - domar'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ČANIĆ'),
            'ime' => trim('NENAD'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Ažuriranje i informatička obrada podataka'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVOVIĆ'),
            'ime' => trim('MILA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Administrativno - tehnički poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STOILJKOVIĆ'),
            'ime' => trim('IVICA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PEJOVIĆ'),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ANDRIĆ '),
            'ime' => trim('DRAGICA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Načelnik Gradske uprave'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('FURTULA'),
            'ime' => trim('SVETLANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Prijem podnesaka i ekspedicija pošte'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŠAROVIĆ'),
            'ime' => trim('MITAR'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Administrativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NENADOVIĆ '),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija - zamenik matičara'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NIKITOVIĆ '),
            'ime' => trim('SLAVICA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Načelnik Odeljenja za lični status gradjana '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILJOJČIĆ '),
            'ime' => trim('ŽANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručno-operativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('OBRADOVIĆ '),
            'ime' => trim('MILAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RAJOVIĆ'),
            'ime' => trim('PREDRAG '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Finansijsko - administrativni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RAKOČEVIĆ '),
            'ime' => trim('RADENKO '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Rukovodilac grupe za poslove voznog parka '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PREDOJEVIĆ'),
            'ime' => trim('MILOVAN '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOJEVIĆ '),
            'ime' => trim('MOMČILO '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručno-operativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARIĆ'),
            'ime' => trim('MOMIR'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručni poslovi mesne zajednice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VESIĆ'),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RIZNIĆ '),
            'ime' => trim('MILEVA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('EFTOVIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za finansije --- Računovodstveno-knjigovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUJOVIĆ'),
            'ime' => trim('ZDRAVKA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija-matičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽIVANOVIĆ '),
            'ime' => trim('RADOVANKA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za finansije --- Računovodstveni-knjigovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija-matičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADENKOVIĆ'),
            'ime' => trim('JELENA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Administrativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽIVKOVIĆ'),
            'ime' => trim('PREDRAG '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija-matičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('AKSENTIJEVIĆ '),
            'ime' => trim('SRETINA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija - zamenik matičara'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ALEMPIJEVIĆ'),
            'ime' => trim('RATKO'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija-matičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DAVINIĆ'),
            'ime' => trim('DELINKA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽIVKOVIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GAJIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOSAVLJEVIĆ'),
            'ime' => trim('MILIVOJE'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVANOVIĆ '),
            'ime' => trim('MILENA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija-matičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JANKOVIĆ'),
            'ime' => trim('SAŠA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Administrativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MATIĆ'),
            'ime' => trim('LJILJANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Načelnik Odeljenja za upravljanje ljudskim resursima'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RVOVIĆ '),
            'ime' => trim('SVETLANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za finansije --- Načelnik odeljenja za finansije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VELIČKOVIĆ'),
            'ime' => trim('RADMILA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručno-operativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADIVOJEVIĆ'),
            'ime' => trim('MILAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Vozač '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VELJANOVIĆ'),
            'ime' => trim('IVANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi pravne pomoći'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JAKOVLJEVIĆ'),
            'ime' => trim('STANISLAV'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za informaciono komunikacione tehnologije --- Tehničar sistema i mreže '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BABOVIĆ'),
            'ime' => trim('DRAGAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za informaciono komunikacione tehnologije --- Poslovi održavanja TK uredjajai instalacija '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐOKOVIĆ-PEJČIĆ'),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Matičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILANOVIĆ '),
            'ime' => trim('MIONA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi pravne pomoći'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KIĆANOVIĆ '),
            'ime' => trim('JELENA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DEDIĆ'),
            'ime' => trim('JELICA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Kordinator za poslove nabavki, bezbednosti i zaštite'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KRSTIĆ '),
            'ime' => trim('DEJAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KUHINKOVIĆ'),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DROBNJAKOVIĆ '),
            'ime' => trim('SOFIJA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručni i administrativno-tehnički poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOVIĆ'),
            'ime' => trim('RAJKO'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DROBNJAK'),
            'ime' => trim('DARKO'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Načelnik Odeljenja za mesnu samoupravu'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILJKOVIĆ '),
            'ime' => trim('ZLATKO'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Vozač '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('MILICA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Konobar'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĆALIĆ'),
            'ime' => trim('BOGDAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Rukovodilac grupe za poslove internog bifea'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STIKIĆ '),
            'ime' => trim('ALEKSANDAR '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Dostavljač'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐURĐEVIĆ'),
            'ime' => trim('SLAVICA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za finansije --- Finansijsko-računovodstveni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ČOLIĆ'),
            'ime' => trim('ŽIVOMIR '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za finansije --- Računovodstveni-knjigovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('NOVICA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručno-operativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RANĐELOVIĆ'),
            'ime' => trim('DRAGICA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOSAVLJEVIĆ'),
            'ime' => trim('JELENA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Rukovodilac grupe za poslove prijemne kancelarije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KRSTOVIĆ'),
            'ime' => trim('ALEKSANDAR '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi arhiviranja predmeta akata'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STOJISAVLJEVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Administrativno - tehnički poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TAŠOVIĆ'),
            'ime' => trim('GORAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručni poslovi mesne zajednice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MLADENOVIĆ'),
            'ime' => trim('MILOSAV '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija-zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MOJSILOVIĆ'),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za informaciono komunikacione tehnologije --- Telefonista'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STANOJEVIĆ'),
            'ime' => trim('LJILJANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAJOVIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Kurir za poslove mesnih zajednica'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MOMČILOVIĆ'),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Rukovodilac grupe za evidencione poslove'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILUTINOVIĆ'),
            'ime' => trim('MIROLJUB'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Portir'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐOKOVIĆ'),
            'ime' => trim('JASMINA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Prijem podnesaka i ekspedicija pošte'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SEKULIĆ-MILOJEVIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LAZOVIĆ'),
            'ime' => trim('SVETLANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Čistačica internog bifea'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOSIĆ'),
            'ime' => trim('KATARINA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JELENKOVIĆ'),
            'ime' => trim('JELENA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Administrativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JELESIJEVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za informaciono komunikacione tehnologije --- Mirovanje radnog odnosa'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JANKOVIĆ'),
            'ime' => trim('IVANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi pravne pomoći'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JANKOVIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za finansije --- Finansijsko-računovodstveni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVOVIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Matičar '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SAVIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SLAVUJAC'),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi pravne pomoći'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽIVKOVIĆ'),
            'ime' => trim('GORAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi ažuriranja biračkog spiska '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('RODOLJUB'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Dostavljač'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BRKIĆ'),
            'ime' => trim('LJILJANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručno-operativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('OLIVERA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MAKSIMOVIĆ'),
            'ime' => trim('BOJAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GAJOVIĆ'),
            'ime' => trim('MIROSLAV'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Gradjanska stanja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽUNIĆ'),
            'ime' => trim('DUŠANKA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručno-operativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŠOŠKIĆ '),
            'ime' => trim('IVANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SAVIĆ-JOVANOVIĆ '),
            'ime' => trim('ALEKSANDRA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RANKOVIĆ'),
            'ime' => trim('PREDRAG '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Portir'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ZDRAVKOVIĆ'),
            'ime' => trim('MILOŠ'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Stručni poslovi bezbednosti i zdravlja na radu'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('OBRADOVIĆ '),
            'ime' => trim('PREDRAG '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi arhiviranja predmeta akata'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STOJANOVIĆ'),
            'ime' => trim('DEJAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za informaciono komunikacione tehnologije --- Programer '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARJANOVIĆ'),
            'ime' => trim('ZORICA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Administrativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('FILIPOVIĆ '),
            'ime' => trim('GORDANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Normativno-pravni poslovi u oblasti rada i radnih odnosa i upravljanja ljudskim resursima '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('SRĐAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Vozač '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽIVANOVIĆ '),
            'ime' => trim('ZVONKO'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Vozač '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ERIĆ'),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi iz oblasti rada i radnih odnosa i upravljanja ljudskim resursima'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOV-MRDAKOVIĆ'),
            'ime' => trim('BRANKICA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za informaciono komunikacione tehnologije --- Programer '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SIMOVIĆ'),
            'ime' => trim('SLOBODANKA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ILIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi iz oblasti rada i radnih odnosa i upravljanja ljudskim resursima'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAVLOVIĆ'),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za finansije --- Šef Službe'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILIĆEVIĆ '),
            'ime' => trim('LJILJANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VELEČKOVIĆ'),
            'ime' => trim('ALEKSANDRA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KRSMANOVIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija - zamenik matičara'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RAŠKOVIĆ'),
            'ime' => trim('MARKO'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Konobar'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('MARIO'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za finansije --- Računovodstveni-knjigovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GREBOVIĆ'),
            'ime' => trim('DARKO'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Administrativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOJIČIĆ '),
            'ime' => trim('JELENA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručno-operativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOSIFOVIĆ '),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Stručni poslovi pisarnice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KUZMANOVIĆ'),
            'ime' => trim('VANJA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TODOROVIĆ '),
            'ime' => trim('VLADIMIR'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za informaciono komunikacione tehnologije --- Projektant baze podataka '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SIMOVIĆ'),
            'ime' => trim('BILJANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('AKSIĆ'),
            'ime' => trim('JELENA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za finansije --- Računovodstveno-knjigovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐORĐEVIĆ'),
            'ime' => trim('TOMISLAV'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Fizički radnik za poslove mesnih zajednica'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADENKOVIĆ'),
            'ime' => trim('NENAD'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Konobar'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('KATARINA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Normativno-pravni poslovi u oblasti rada i radnih odnosa i upravljanja ljudskim resursima '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GREBOVIĆ'),
            'ime' => trim('DRAGAN'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOJEVIĆ '),
            'ime' => trim('SUZANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Administrativno-tehnički poslovi iz oblasti rada i radnih odnosa'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NIKOLIĆ'),
            'ime' => trim('MIRELA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Čistačica internog bifea'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GUDŽULIĆ'),
            'ime' => trim('ANTIĆ'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za finansije --- Finansijsko-računovodstveni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('FAJHT'),
            'ime' => trim('VANJA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Administrativno-tehnički poslovi iz oblasti rada i radnih odnosa'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILANOVIĆ '),
            'ime' => trim('MARIJANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BRKIĆ'),
            'ime' => trim('MARIJANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi ažuriranja biračkog spiska '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐUROVIĆ'),
            'ime' => trim('MILOSTIVA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Administrativno-tehnički poslovi iz oblasti rada i radnih odnosa'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAVLOVIĆ-KOCUVAN'),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SAMAILOVIĆ'),
            'ime' => trim('SUZANA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Prijem podnesaka i ekspedicija pošte'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKOVIĆ-ŽIVANOVIĆ'),
            'ime' => trim('TANJA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ANTIĆ'),
            'ime' => trim('TAMARA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Prijem podnesaka i ekspedicija pošte'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOSAVLJEVIĆ'),
            'ime' => trim('ĐORĐE'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RISTOVIĆ'),
            'ime' => trim('VERA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUJIČIĆ'),
            'ime' => trim('SLAĐANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesnih kancelarija-zamenik matičara '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ILIĆ'),
            'ime' => trim('ALEKSANDAR '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Poslovi pisarnice '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐORĐEVIĆ'),
            'ime' => trim('NENAD'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za informaciono komunikacione tehnologije --- Telefonista'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKSANOVIĆ'),
            'ime' => trim('DRAGOSLAV'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Odeljenje za informaciono komunikacione tehnologije --- Projektant baze podataka '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAVLOVIĆ'),
            'ime' => trim('MILOŠ'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Dostavljač'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STOJANOVIĆ'),
            'ime' => trim('PREDRAG '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TANASKOVIĆ'),
            'ime' => trim('IRENA'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Stručno-operativni poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILJKOVIĆ '),
            'ime' => trim('MILJKO'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Prijem podnesaka i ekspedicija pošte'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILANOVIĆ '),
            'ime' => trim('VOJISLAV'),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za zajedničke poslove --- Informatički poslovi u oblasti radnih odnosa '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEVANOVIĆ'),
            'ime' => trim('BILJANA '),
            'uprava_id' => 7,
            'radno_mesto' => trim('Sektor za opšte poslove --- Poslovi mesne zajednice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KOKERIĆ'),
            'ime' => trim('SAŠA '),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za podršku privredi --- Stručni i upravni poslovi u oblasti turizma, trgovine, ugostiteljstva i zanatstva'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARIĆ'),
            'ime' => trim('VLADIMIR'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za poljoprivredu --- Rukovodilac Grupe'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARINKOVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za poljoprivredu --- Poslovi računovodstva u robnim rezervama - materijalni knjigovodja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILIĆ'),
            'ime' => trim('MARINA'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za podršku privredi --- Poslovi u oblasti taksi - prevoza'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAUNOVIĆ'),
            'ime' => trim('MIROSLAV'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Načelnik Gradske uprave'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KOČOVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za poljoprivredu --- Kancelarijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADENKOVIĆ'),
            'ime' => trim('SAŠA '),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za podršku privredi --- Stručni i upravni poslovi u oblasti preduzetništva'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JANIĆ'),
            'ime' => trim('MILINA'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Služba za pravno - finansijske poslove --- Rukovodilac grupe'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOŠEVIĆ '),
            'ime' => trim('MATOVIĆ '),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za poljoprivredu --- Poslovi praćenja stanja, analize i unapredjenja stočnog fonda '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKOSAVLJEVIĆ'),
            'ime' => trim('SLAVICA '),
            'uprava_id' => 8,
            'radno_mesto' => trim('Služba za pravno - finansijske poslove --- Stručni i upravni poslovi u oblasti poljoprivrede i vodoprivrede '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽIVIĆ'),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Služba za pravno - finansijske poslove --- Poslovi finansijskog planiranja, analize, finansijskog izveštavanja i računovodstva'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ZORIĆ'),
            'ime' => trim('SLAVICA '),
            'uprava_id' => 8,
            'radno_mesto' => trim('Služba za pravno - finansijske poslove --- Poslovi knjigovodje robnih rezervi i osnovnih sredstava '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOJEVIĆ '),
            'ime' => trim('KATARINA'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Služba za pravno - finansijske poslove --- Stručni i upravni poslovi u oblasti poljoprivrede i vodoprivrede '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETRIĆEVIĆ'),
            'ime' => trim('LJILJANA'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za poljoprivredu --- Poslovi u oblasti poljoprivrede i ruralnog razvoja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BLAŽIĆ '),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 8,
            'radno_mesto' => trim('Služba za pravno - finansijske poslove --- Kancelarijsko-tehnički poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TIMOTIJEVIĆ'),
            'ime' => trim('JELENA'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Služba za pravno - finansijske poslove --- Šef Službe '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOJKOVIĆ'),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za podršku privredi --- Kancelarijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAUNOVIĆ'),
            'ime' => trim('NIKOLA'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za poljoprivredu --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILORADOVIĆ'),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za podršku privredi --- Poslovi ekonomskog razvoja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOVANOVIĆ'),
            'ime' => trim('SLAĐANA '),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za poljoprivredu --- Kancelarijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KOSTADINOVIĆ '),
            'ime' => trim('ZORAN'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za podršku privredi --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LOMOVIĆ'),
            'ime' => trim('SLOBODAN'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za poljoprivredu --- Poslovi u oblasti poljoprivrede i ruralnog razvoja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RISTIĆ '),
            'ime' => trim('VLADAN'),
            'uprava_id' => 8,
            'radno_mesto' => trim('Odeljenje za podršku privredi --- Poslovi u oblasti taksi - prevoza'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TOĐERAŠ'),
            'ime' => trim('JASMINA '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za obrazovanje --- Stručno - analitički poslovi u oblasti obrazovanja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JANIĆIJEVIĆ'),
            'ime' => trim('RADMILA '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za kulturu, informisanje, ljudska i manjinska prava --- Normativno - pravni i upravno - pravni poslovi u oblasti kulture, informisanja, ljudskih i manjinskih prava '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GAJOVIĆ-MARKOVIĆ'),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za obrazovanje --- Stručni i administrativno - tehnički poslovi u oblasti obrazovanja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐURĐEVIĆ'),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za finansije --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOVANOVIĆ'),
            'ime' => trim('ZORICA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za obrazovanje --- Normativno - pravni i upravno - pravni poslovi u oblasti obrazovanja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RAJAČIĆ'),
            'ime' => trim('ZVEZDANA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za sport i omladinu --- Ekonomsko - pravni poslovi u oblasti sporta '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐOKOVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za sport i omladinu --- Stručni poslovi u oblasti omladinske politike'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SPASIĆ '),
            'ime' => trim('JASMINA '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za finansije --- Računovodstveni i knjigovodstveni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAVLOVIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za kulturu, informisanje, ljudska i manjinska prava --- Koordinator za romska pitanja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GLIŠOVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za prosvetnu inspekciju --- Prosvetni inspektor'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('OBRADOVIĆ-STANIĆ'),
            'ime' => trim('IVANA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za kulturu, informisanje, ljudska i manjinska prava --- Normativno - pravni i upravno - pravni poslovi u oblasti kulture, informisanja, ljudskih i manjinskih prava '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BANKOVIĆ'),
            'ime' => trim('SANDRA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za finansije --- Finansijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽIVADINOVIĆ'),
            'ime' => trim('ZORICA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za finansije --- Računovodstveni i knjigovodstveni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Načelnik Gradske uprave'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SMILJANIĆ '),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za kulturu, informisanje, ljudska i manjinska prava --- Poslovi zaštite i ostvarivanje ljudskih i manjinskih prava'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ANIČIĆ '),
            'ime' => trim('DUŠAN'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za sport i omladinu --- Sportski inspektor'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TRIFUNOVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za finansije --- Finansijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('BILJANA '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za finansije --- Finansijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VELJKOVIĆ '),
            'ime' => trim('DAMNJANA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za finansije --- Finansijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MLADENOVIĆ'),
            'ime' => trim('ALEKSANDRA '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za sport i omladinu --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOŠEVIĆ '),
            'ime' => trim('KATARINA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za kulturu, informisanje, ljudska i manjinska prava --- Administrativno - tehnički poslovi u oblasti kulture, informisanja, ljudskih i manjinskih prava '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LAZAREVIĆ-SARIĆ '),
            'ime' => trim('LJILJANA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za kulturu, informisanje, ljudska i manjinska prava --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SRETENOVIĆ'),
            'ime' => trim('DRAGAN'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za sport i omladinu --- Poslovi unapredjenja školskog i amaterskog sporta '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KANDIĆ '),
            'ime' => trim('ANA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za sport i omladinu --- Ekonomsko - pravni poslovi u oblasti sporta '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PRŠIĆ'),
            'ime' => trim('NENAD'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za kulturu, informisanje, ljudska i manjinska prava --- Poslovi zaštite i ostvarivanje ljudskih i manjinskih prava'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ANDREJEVIĆ'),
            'ime' => trim('NEBOJŠA '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za obrazovanje --- Administrativno - tehnički poslovi u oblasti obrazovanja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽIVKOVIĆ'),
            'ime' => trim('MILICA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za sport i omladinu --- Stručni poslovi u oblasti omladinske politike'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKOVIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za finansije --- Računovodstveni i knjigovodstveni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PANTOVIĆ'),
            'ime' => trim('STANISLAV'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za sport i omladinu --- Stručni poslovi u oblasti omladinske politike'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('DEJAN'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za kulturu, informisanje, ljudska i manjinska prava --- Stručno - analitički poslovi u oblasti kulture, informisanja, ljudskih i manjinskih prava '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARINKOVIĆ'),
            'ime' => trim('LJILJANA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za obrazovanje --- Načelnik Odeljenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILUTINOVIĆ'),
            'ime' => trim('JELENA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za kulturu, informisanje, ljudska i manjinska prava --- Stručno - analitički poslovi u oblasti kulture, informisanja, ljudskih i manjinskih prava '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVANOVIĆ '),
            'ime' => trim('NADEŽDA '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za finansije --- Finansijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TODOROVIĆ '),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za finansije --- Računovodstveni i knjigovodstveni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NENADOVIĆ '),
            'ime' => trim('RADICA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za finansije --- Finansijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za prosvetnu inspekciju --- Prijem podnesaka i pružanje informacija strankama'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RAKIĆ-JEVTIĆ '),
            'ime' => trim('MARIJA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za kulturu, informisanje, ljudska i manjinska prava --- Stručno - analitički poslovi u oblasti kulture, informisanja, ljudskih i manjinskih prava '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILIĆ'),
            'ime' => trim('LJILJANA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za obrazovanje --- Normativno - pravni i upravno - pravni poslovi u oblasti obrazovanja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ILIĆ'),
            'ime' => trim('MIODRAG '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za prosvetnu inspekciju --- Prosvetni inspektor'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAJOVIĆ'),
            'ime' => trim('ŽIKICA'),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za prosvetnu inspekciju --- Načelnik Odeljenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BRATKOVIĆ '),
            'ime' => trim('PREDRAG '),
            'uprava_id' => 9,
            'radno_mesto' => trim('Odeljenje za obrazovanje --- Administrativno - tehnički i poslovi kontrole '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOVANOVIĆ'),
            'ime' => trim('JASMINA '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za finansijsko računovodstvene poslove --- Šef Službe'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('LELA '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Načelnik odeljenja za socijalnu zaštitu '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LAZAREVIĆ '),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za finansijsko računovodstvene poslove --- Računovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PEŠIĆ'),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Poslovi zaštite izbeglih, prognanih i raseljenih lica - Poverenik'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JANIĆ'),
            'ime' => trim('SUZANA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za društvenu brigu o deci --- Poslovi iz upravno-pravne oblasti društvene brige o deci'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LEKOVIĆ'),
            'ime' => trim('MILOMIRKA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za društvenu brigu o deci --- Poslovi iz upravno-pravne oblasti društvene brige o deci'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RIBARIĆ'),
            'ime' => trim('NIKOLA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Načelnik Gradske uprave'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKAŠINOVIĆ'),
            'ime' => trim('ELIZABETA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za zdravstvenu zaštitu --- Administrativno-tehnički poslovi u oblasti zdravstvene zaštite'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ARSENIJEVIĆ'),
            'ime' => trim('KATARINA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za zdravstvenu zaštitu --- Stručno-operativni poslovi u oblasti zdravstvene zaštie '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILORADOVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za finansijsko računovodstvene poslove --- Finansijsko-računovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JEVTOVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za zdravstvenu zaštitu --- Rukovodilac grupe'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('IVANOVIĆ-POPADIĆ'),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za finansijsko računovodstvene poslove --- Računovodstveni i knjigovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TANASKOVIĆ'),
            'ime' => trim('TATJANA '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za finansijsko računovodstvene poslove --- Računovodstveni poslovi u oblasti porodiljskih prava'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TOMAŠEVIĆ '),
            'ime' => trim('PREDRAG '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Administrativno-tehnički poslovi u oblasti socijalne zaštite '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐURĐEVIĆ'),
            'ime' => trim('JASMINA '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za finansijsko računovodstvene poslove --- Računovodstveni i knjigovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐORĐEVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za zdravstvenu zaštitu --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MATIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za finansijsko računovodstvene poslove --- Računovodstveni poslovi u oblasti zaštite izbeglih, prognanih i raseljenih lica'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MURATI '),
            'ime' => trim('TIJANA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za zdravstvenu zaštitu --- Operativno organizacioni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽIVKOVIĆ'),
            'ime' => trim('MARINA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Administrativno-tehnički poslovi u oblasti boračkoinvalidske zaštite'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEVANOVIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za zdravstvenu zaštitu --- Savetnik za zaštitu prava pacijenata i pravne poslove'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ILIĆ'),
            'ime' => trim('KATARINA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za društvenu brigu o deci --- Poslovi prijema zahteva za ostvarivanje prava iz oblasti društvene brige o deci '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RISTIĆ '),
            'ime' => trim('VESNA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za zdravstvenu zaštitu --- Administrativno-tehnički poslovi u oblasti zdravstvene zaštite'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DIMITRIJEVIĆ '),
            'ime' => trim('VESNA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za društvenu brigu o deci --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SIMIĆ'),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Poslovi iz upravno-pravne oblasti socijalne zaštite '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TUCAKOVIĆ '),
            'ime' => trim('MILUTIN '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za finansijsko računovodstvene poslove --- Računovodstveni poslovi u oblasti porodiljskih prava'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ZORIĆ'),
            'ime' => trim('ANDRIJANA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za društvenu brigu o deci --- Poslovi prijema zahteva za ostvarivanje prava iz oblasti društvene brige o deci '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STAMATOVIĆ'),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za finansijsko računovodstvene poslove --- Finansijsko-računovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('HEM-BOŽILOVIĆ'),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za društvenu brigu o deci --- Poslovi iz upravno-pravne oblasti društvene brige o deci'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GAJIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za društvenu brigu o deci --- Poslovi iz upravno-pravne oblasti društvene brige o deci'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAREZANOVIĆ'),
            'ime' => trim('SVETLANA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za društvenu brigu o deci --- Poslovi prijema zahteva za ostvarivanje prava iz oblasti društvene brige o deci '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LUČIĆ'),
            'ime' => trim('LJILJANA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za finansijsko računovodstvene poslove --- Finansijsko-računovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOSAVLJEVIĆ'),
            'ime' => trim('SANDRA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za zdravstvenu zaštitu --- Poslovi iz upravno-pravne oblasti zdravstvene zaštite'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VELIČKOVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Rukovodilac grupe'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PEROVIĆ'),
            'ime' => trim('SANJA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Poslovi iz upravno-pravne oblasti socijalne zaštite '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BUGARČIĆ'),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Posloi iz stručne oblasti socijalne zaštite'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('AĆIMOVIĆ'),
            'ime' => trim('JAGODA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za zdravstvenu zaštitu --- Stručno-operativne poslove u oblasti zaštite prava pacijenata '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVANOVIĆ '),
            'ime' => trim('TAMARA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za finansijsko računovodstvene poslove --- Načelnik Odeljenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TUCAKOVIĆ '),
            'ime' => trim('VESNA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Poslovi iz upravno-pravne oblasti socijalne zaštite '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('OTAŠEVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Administrativno-tehnički poslovi u oblasti boračkoinvalidske zaštite'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STOJILOVIĆ'),
            'ime' => trim('JOVAN'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Pravni poslovi u oblasti boračko-invalidske zaštite '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILINKOVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Administrativno-tehnički poslovi u oblasti socijalne zaštite '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOKIĆ'),
            'ime' => trim('MIROSLAV'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Pravni poslovi u oblasti boračko-invalidske zaštite '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DUMIĆ'),
            'ime' => trim('NIKOLA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za zdravstvenu zaštitu --- Administrativno tehnički poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOSAVLJEVIĆ'),
            'ime' => trim('LJILJANA'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Administrativno-tehnički poslovi u oblasti socijalne zaštite '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BORIĆ'),
            'ime' => trim('MILOŠ'),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za zdravstvenu zaštitu --- Poslovi iz upravno-pravne oblasti zdravstvene zaštite'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILIĆEVIĆ '),
            'ime' => trim('PREDRAG '),
            'uprava_id' => 10,
            'radno_mesto' => trim('Odeljenje za socijalnu zaštitu --- Pravni poslovi u oblasti socijalne zaštite '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VIDANOVIĆ '),
            'ime' => trim('BOBAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni inspektor III'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MOJSOVIĆ'),
            'ime' => trim('MILAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Inspektor za zaštitu životne sredine '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STOJANOVIĆ'),
            'ime' => trim('OLIVERA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Poslovi izdavanja energetskihdozvola,licenci i praćenje tarifnog sistema'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BOŠKOVIĆ-SIMIĆ'),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Upravni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PEJOVIĆ'),
            'ime' => trim('IVANA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KITONJIĆ'),
            'ime' => trim('MARKO'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RANKOVIĆ'),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Normativno - pravni poslovi u oblasti inspekcijskog nadzora i komunalne policije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐUKIĆ'),
            'ime' => trim('MILIJA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARJANOVIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEFANOVIĆ'),
            'ime' => trim('SLOBODAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Poslovi u oblasti održavanja javnih površina za stacionarni saobraćaj '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NIKOLIĆ'),
            'ime' => trim('DUŠAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BOSIĆ'),
            'ime' => trim('VLADISAV'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Poslovi praćenja i unapredjenja dostupnosti,efikasnosti i kvaliteta u oblasti komunalnih delatnosti '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GICIĆ-MILOJEVIĆ '),
            'ime' => trim('MARIJANA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac II'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('CVETKOVIĆ '),
            'ime' => trim('BOJAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUJSIĆ '),
            'ime' => trim('SRĐAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAVLOVIĆ-ĐAPA'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Načelnik Odeljenja za finansije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILJKOVIĆ '),
            'ime' => trim('ALEKSANDAR '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Poslovi u oblasti održavanja javnih površina za stacionarni saobraćaj '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('MIROSLAVA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Načelnik sektora'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ERIĆ'),
            'ime' => trim('KAROLINA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Načelnik Odeljenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BOŠKOVIĆ'),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac II'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LAZIĆ'),
            'ime' => trim('BILJANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BOJOVIĆ'),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Inspektor za zaštitu životne sredine '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARINKOVIĆ'),
            'ime' => trim('ANA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUČKOVIĆ'),
            'ime' => trim('NIKOLA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILENKOVIĆ'),
            'ime' => trim('SVETLANA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Upravni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ARSENIJEVIĆ'),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Knjigovodstveni i finansijsko-računovodstveni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVANOVIĆ '),
            'ime' => trim('ZORICA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni inspektor I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SOKOLOVIĆ '),
            'ime' => trim('ANA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Načelnik komunalne policije '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐOKIĆ'),
            'ime' => trim('BORIS'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JAKŠIĆ '),
            'ime' => trim('VESELIN '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni inspektor II'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('FILIPOVIĆ '),
            'ime' => trim('SANJA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARJANOVIĆ-KONČAR'),
            'ime' => trim('MILENA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac - vodja patrola'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐOKIĆ'),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽUPLJANIĆ '),
            'ime' => trim('DUŠAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Upravni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MIRKOV '),
            'ime' => trim('NENAD'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOJKOVIĆ'),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni polocajac II'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOLIĆ'),
            'ime' => trim('RADA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Operatino - stručni i nadzorno - kontrolni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEFANOVIĆ'),
            'ime' => trim('BOŽANA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Gradjevinski inspektor'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JANKOVIĆ'),
            'ime' => trim('BOJAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni polocajac II'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('IVANIĆ '),
            'ime' => trim('GORAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Gradski turistički inspektor'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŽIVKOVIĆ'),
            'ime' => trim('ACA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Poslovi tehničkog regulisanja i bezbednosti saobraćaja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĆIROVIĆ-HOLENDER'),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Poslovi na praćenju održavanja objekata i instalacija javnog osvetljenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RANKOVIĆ'),
            'ime' => trim('MAJA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Glavni inspektor za zaštito životne sredine'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOVUK'),
            'ime' => trim('NENAD'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni inspektor II'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILIVOJEVIĆ'),
            'ime' => trim('MIROSLAV'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni inspektor III'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILENKOVIĆ'),
            'ime' => trim('DUŠAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Izvršilac za operativno-tehničke poslove'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ILIĆ'),
            'ime' => trim('ANDREJA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Načelnik Gradske uprave'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BUJAKOVIĆ '),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Gradjevinski inspektor'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐOKANOVIĆ '),
            'ime' => trim('BOJAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Glavni komunalni inspektor'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VRAČAR '),
            'ime' => trim('MILETIĆ '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Poslovi praćenja i unapredjenja dostupnosti,efikasnosti i kvaliteta u oblasti komunalnih delatnosti '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('ZORICA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Inspektor za saobraćaj i puteve'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Inspektor za saobraćaj i puteve'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKOTIĆ'),
            'ime' => trim('BOJANA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Stručni poslovi u komunalnoj oblasti '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SAMARDŽIĆ '),
            'ime' => trim('ALEKSANDRA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni inspektor I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LUKIĆ'),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Inspektor za saobraćaj i puteve'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VRANIĆ '),
            'ime' => trim('VOJIN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Načelnik Odeljenja za inspekcijske poslove '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOVANOVIĆ'),
            'ime' => trim('BRATISLAV'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Poslovi praćenja održavanjajavne higijene i održavanja komunalne infrastrukture '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MATIJAŠEVIĆ'),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Stručno-analitičkii finansijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ROSIĆ'),
            'ime' => trim('KATARINA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Kancelarijski poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVANOVIĆ '),
            'ime' => trim('MILICA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Načelnik Sektora'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOSAVLJEVIĆ'),
            'ime' => trim('PREDRAG '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Poslovi u oblasti održavanja javnih zelenih površina'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PROKOVIĆ'),
            'ime' => trim('JADRANKA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Stručni poslovi u komunalnoj oblasti '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TOMIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni inspektor I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TODOROVIĆ '),
            'ime' => trim('RADICA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Finansijsko-evidencioni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TOMIĆ'),
            'ime' => trim('DEJAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Poslovi tehničkog regulisanja i bezbednosti saobraćaja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PROKIĆ '),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Glavni inspektor za saobraćaj i puteve'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKOVIĆ'),
            'ime' => trim('NIKOLA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Inspektor za zaštitu životne sredine '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILJOJKOVIĆ'),
            'ime' => trim('RADOMIR '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Glavni gradjevinski inspektor'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GAJIĆ'),
            'ime' => trim('JELENA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĆIRKOVIĆ'),
            'ime' => trim('SLAĐANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Poslovi u oblasti održavanja puteva'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKOVIĆ'),
            'ime' => trim('VALENTINA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ALEKSIĆ'),
            'ime' => trim('KATARINA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni polocajac II'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STANIĆ '),
            'ime' => trim('BOJANA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Upravni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PEJOVIĆ'),
            'ime' => trim('VLADIMIR'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac II'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOSAVLJEVIĆ'),
            'ime' => trim('ĐORĐE'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac II'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐAKOVIĆ'),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Poslovi praćenja rada javnihkomunalnih preduzeća'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ILIĆ'),
            'ime' => trim('BILJANA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILAŠINOVIĆ'),
            'ime' => trim('SVETLANA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za komunalne poslove i finansije --- Tehničko -dokumentacioni poslovi podrške finansijskim poslovima '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ISKRENOV-ALEKSIĆ'),
            'ime' => trim('RUŽICA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Inspektor za saobraćaj i puteve'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GOBELJIĆ'),
            'ime' => trim('ZVONKO'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐURIĆ'),
            'ime' => trim('SLOBODAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILENKOVIĆ'),
            'ime' => trim('SAŠA '),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Gradski turistički inspektor'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAVLOVIĆ'),
            'ime' => trim('MILAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RISTIĆ '),
            'ime' => trim('VERONIKA'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KIJANOVIĆ '),
            'ime' => trim('BOJAN'),
            'uprava_id' => 11,
            'radno_mesto' => trim('Sektor za inspekcijske poslove i komunalnu policiju --- Komunalni policajac I '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BOJOVIĆ'),
            'ime' => trim('JELENA'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Načelnik Gradske uprave'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KUZMANOVIĆ'),
            'ime' => trim('JOVAN'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Poslovi vanrednih situacija-civilna zaštita'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STERĐEVIĆ '),
            'ime' => trim('NIKOLA'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za opšte poslove --- Normativno-pravni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ILIĆ'),
            'ime' => trim('JULKA'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Administrativno trhnički poslovi distribucije materijala sednice Skupštine'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('POPOVIĆ'),
            'ime' => trim('IVAN '),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Administrativni poslovi u oblasti vanrednih situacija '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SREĆKOVIĆ '),
            'ime' => trim('BOJANA'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za poslove unutrašnje i medjunarodne saradnje i poslove protokola --- Poslovi unutrašnje i medjunarodne saradnje '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐULČIĆ '),
            'ime' => trim('ZORA '),
            'uprava_id' => 12,
            'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Kancelarijski poslovi pripreme i realizacije sednica Skupštine grada'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KESIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za poslove Gradskog veća --- Administrativno-tehnički poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVIČIĆ'),
            'ime' => trim('JELENA'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Kabinet Gradonačelnika --- Normativno-pravni i stručno-administrativni poslovi za potrebe Gradonačelnika, zamenika Gradonačelnika i pomoćnika Gradonačelnika'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BABIĆ'),
            'ime' => trim('TAMARA'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za poslove unutrašnje i medjunarodne saradnje i poslove protokola --- Poslovi unutrašnje i medjunarodne saradnje '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JANKOVIĆ'),
            'ime' => trim('VLADAN'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Poslovi vanrednih situacija i zaštita od elementarnih nepogoda - Operater u sistemu Situacionog centra'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐURĐEVIĆ'),
            'ime' => trim('DRAGICA '),
            'uprava_id' => 12,
            'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Administrativno trhnički poslovi distribucije materijala sednice Skupštine'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOVANOVIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za opšte poslove --- Finansijsko-administrativni analitičar'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILANOVIĆ '),
            'ime' => trim('PREDRAG '),
            'uprava_id' => 12,
            'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Administrativno tehnički poslovi za potrebe sednica Skupštine i radnih tela Skupštine '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NEKTARIJEVIĆ '),
            'ime' => trim('SANDRA'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za poslove informisanja --- Poslovi informisanja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('IVANOVIĆ'),
            'ime' => trim('MOMČILO '),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Poslovi vanrednih situacija i zaštite od elementarnih nepogoda '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOJKOVIĆ'),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za opšte poslove --- Normativno-pravni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BEĆAREVIĆ '),
            'ime' => trim('JASMINA '),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za opšte poslove --- Normativno-pravni poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DIMITRIJEVIĆ '),
            'ime' => trim('JASNA'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za poslove informisanja --- Poslovi informisanja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TIJANIĆ'),
            'ime' => trim('ALEKSANDRA '),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za poslove informisanja --- Načelnik Odeljenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOVANOVIĆ'),
            'ime' => trim('DRAGOŠ'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VEINOVIĆ'),
            'ime' => trim('JELENA'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za poslove Gradskog veća --- Administrativno-tehnički poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NEŠIĆ'),
            'ime' => trim('RADAŠIN '),
            'uprava_id' => 12,
            'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Administrativno tehnički poslovi za potrebe sednica Skupštine i radnih tela Skupštine '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVANOVIĆ '),
            'ime' => trim('DANICA'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Poslovi planiranja odbrane '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KOČOVIĆ'),
            'ime' => trim('RISTO'),
            'uprava_id' => 12,
            'radno_mesto' => trim('Odeljenje za opšte poslove --- Kancelarijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DMITROVIĆ '),
            'ime' => trim('ILIJANA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Poslovi sekretara odbora'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SRETENOVIĆ'),
            'ime' => trim('ANA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove informisanja --- Poslovi postupanja po zahtevu za slobodan pristup informacijama od javnog značaja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LAZAREVIĆ '),
            'ime' => trim('SVETOMIR'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Poslovi vanrednih situacija i zaštita od elementarnih nepogoda - Operater u sistemu Situacionog centra'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ANTONIJEVIĆ'),
            'ime' => trim('SLAVENKA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Kancelarijski poslovi izrade i distribucija pismena za potrebe sekretara i zamenika sekretara Skupštine grada i sekretarijata'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KUZMANOVIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za opšte poslove --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADIVOJEVIĆ'),
            'ime' => trim('SLAĐANA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove Gradskog veća --- Kancelarijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VIĆENTIJEVIĆ '),
            'ime' => trim('ANA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Poslovi sekretara odbora'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RAJOVIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 12, 'radno_mesto' => trim('Kabinet Gradonačelnika --- pomoćnik Gradonačelnika za nadzor nad investicijama u vanprivrednim delatnostima '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NIKEZIĆ'),
            'ime' => trim('STEFAN'),
            'uprava_id' => 12, 'radno_mesto' => trim('Kabinet Gradonačelnika --- Pomoćnik Gradonačelnika za unapredjenje položaja mladih u lokalnoj samoupravi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOVANOVIĆ'),
            'ime' => trim('ZVEZDANA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove Gradskog veća --- Administrativno-tehnički poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STANKOVIĆ '),
            'ime' => trim('MILICA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVANOVIĆ '),
            'ime' => trim('OLGA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove unutrašnje i medjunarodne saradnje i poslove protokola --- Poslovi protokola i organizacije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('FILIPOVIĆ '),
            'ime' => trim('BOJAN'),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Poslovi sekretara odbora'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('CARIĆ'),
            'ime' => trim('NEBOJŠA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Kabinet Gradonačelnika --- Koordinator za razvoj organizacije i ljudskih resursa '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKIĆEVIĆ '),
            'ime' => trim('JELENA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za opšte poslove --- Finansijsko-računovodstveni analitičar'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOVANOVIĆ'),
            'ime' => trim('RADE '),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Birotehnički poslovi umnožavanja materijala '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LAZAREVIĆ '),
            'ime' => trim('ZORAN'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove informisanja --- Poslovi foto i audio-vizuelnog snimanja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ŠTAJN'),
            'ime' => trim('ALEKSANDAR '),
            'uprava_id' => 12, 'radno_mesto' => trim('Kabinet Gradonačelnika --- Pomoćnik Gradonačelnika za unutrašnju i medjunarodnu saradnju'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ROSIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Kancelarijski poslovi pripreme i realizacije sednica Skupštine grada'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PREDOJEVIĆ-SIMOVIĆ '),
            'ime' => trim('JASMINA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Kabinet Gradonačelnika --- Pomoćnik Gradonačelnika za održivi i ravnomerni razvoj Grada i saradnju sa udruženjima '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('CVETKOVIĆ '),
            'ime' => trim('EVICA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za opšte poslove --- Finansijsko-računovodstveni analitičar'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SIMONOVIĆ '),
            'ime' => trim('RADOJE'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove informisanja --- Internet operater'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEFANOVIĆ'),
            'ime' => trim('TATJANA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Poslovi vanrednih situacija i zaštite od elementarnih nepogoda '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ARSENIJEVIĆ'),
            'ime' => trim('MILOŠ'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Administrativni poslovi u oblasti planiranja odbrane'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKAŠINOVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za opšte poslove --- Finansijsko-administrativni analitičar'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('OBRADOVIĆ '),
            'ime' => trim('ISIDORA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Poslovi vanrednih situacija i zaštite od elementarnih nepogoda '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKIĆ'),
            'ime' => trim('NIKOLA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove unutrašnje i medjunarodne saradnje i poslove protokola --- Poslovi protokola i organizacije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KOSTIĆ '),
            'ime' => trim('ANICA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove Gradskog veća --- Kancelarijski poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LAZIĆ'),
            'ime' => trim('IVAN '),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove unutrašnje i medjunarodne saradnje i poslove protokola --- Poslovi unutrašnje i medjunarodne saradnje '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RADOJEVIĆ '),
            'ime' => trim('TAMARA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Administrativni poslovi u oblasti planiranja odbrane'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('DEJAN'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove unutrašnje i medjunarodne saradnje i poslove protokola --- Poslovi protokola i organizacije'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEVANOVIĆ'),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove informisanja --- Administrativno-tehnički i operativni poslovi u oblasti informisanja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAVLOVIĆ'),
            'ime' => trim('BOJAN'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove unutrašnje i medjunarodne saradnje i poslove protokola --- Načelnik Odeljenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JAKŠIĆ '),
            'ime' => trim('JAGOŠ'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Poslovi vanrednih situacija i zaštite od elementarnih nepogoda '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KONATAR'),
            'ime' => trim('NEBOJŠA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Poslovi vanrednih situacija i zaštita od elementarnih nepogoda - Operater u sistemu Situacionog centra'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STANKOVIĆ '),
            'ime' => trim('NIKOLA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Poslovi informatičke podrške pripreme i realizacijesednice Skupštine grada '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DAMNJANOVIĆ'),
            'ime' => trim('MARIJA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za opšte poslove --- Šef Službe '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĆOSIĆ'),
            'ime' => trim('DOBRILA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove Gradskog veća --- Administrativno-tehnički poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('ALEKSANDAR '),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Poslovi vanrednih situacija i zaštita od elementarnih nepogoda - Operater u sistemu Situacionog centra'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TODOROVIĆ '),
            'ime' => trim('SVEŠANA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Kancelarijski poslovi prijema pošte i rasporedjivanje akata'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOŠEVIĆ '),
            'ime' => trim('MILAN'),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MIHAJLOVIĆ'),
            'ime' => trim('SNEŽANA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove Gradskog veća --- Normativno-pravni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NOVOSEL'),
            'ime' => trim('BILJANA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Sekretar Sekretarijata '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOJEVIĆ '),
            'ime' => trim('ZORAN'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove unutrašnje i medjunarodne saradnje i poslove protokola --- Administrativno-tehnički poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JOVANOVIĆ '),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Kancelarijski poslovi prijema pošte i rasporedjivanje akata'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SAVIĆ'),
            'ime' => trim('VERKO'),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Redar'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KOKOVIĆ'),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove Gradskog veća --- Normativno-pravni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ANDRIĆ '),
            'ime' => trim('MIRJANA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove Gradskog veća --- Administrativno-tehnički poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOŠEVIĆ '),
            'ime' => trim('ALEKSANDAR '),
            'uprava_id' => 12, 'radno_mesto' => trim('Kabinet Gradonačelnika --- Šef Kabineta'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JANKOVIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za opšte poslove --- Finansijsko-računovodstveni saradnik'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('NEŠKOVIĆ'),
            'ime' => trim('SLAVICA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove Gradskog veća --- Načelnik Odeljenja'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VELJKOVIĆ '),
            'ime' => trim('ANDRA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za vanredne situacije i planiranje odbrane --- Poslovi vanrednih situacija-civilna zaštita'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STANIŠIĆ'),
            'ime' => trim('VESNA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Koordinator za uspostavljenje saradnje izmedju gradskih uprava i posebnih službi organa Grada '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('UROŠEVIĆ'),
            'ime' => trim('NIKOLA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Kabinet Gradonačelnika --- Pomoćnik Gradonačelnika za unapredjenje i razvoj sporta'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MIHAJLOVIĆ'),
            'ime' => trim('IVANA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove Gradskog veća --- Normativno-pravni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐOKOVIĆ'),
            'ime' => trim('KATARINA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove informisanja --- Poslovi postupanja po zahtevu za slobodan pristup informacijama od javnog značaja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('BOJOVIĆ'),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove Gradskog veća --- Administrativno-tehnički poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETRONIJEVIĆ '),
            'ime' => trim('SVETLANA'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove Gradskog veća --- Normativno-pravni poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MITROVIĆ'),
            'ime' => trim('DRAGAN'),
            'uprava_id' => 12, 'radno_mesto' => trim('Odeljenje za poslove informisanja --- Poslovi grafičke i audio-vizuelne prezentacije Grada'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILIĆ'),
            'ime' => trim('NEBOJŠA '),
            'uprava_id' => 12, 'radno_mesto' => trim('Sekretarijat za skupštinske poslove --- Poslovi sekretara odbora'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STEFANOVIĆ'),
            'ime' => trim('VANJA'),
            'uprava_id' => 13, 'radno_mesto' => trim('Odeljenje za ekonomsko - finansijske poslove, poslove planiranja i kontrole javnih nabavki --- Stručno-tehnički poslovi u oblasti javnih nabavki'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MARKOVIĆ'),
            'ime' => trim('SAŠA '),
            'uprava_id' => 13, 'radno_mesto' => trim('Odeljenje za ekonomsko - finansijske poslove, poslove planiranja i kontrole javnih nabavki --- Načelnik Odeljenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STANKOVIĆ '),
            'ime' => trim('GORAN'),
            'uprava_id' => 13, 'radno_mesto' => trim('Odeljenje za normativno – pravne i upravno - pravne poslove u oblasti javnih nabavki --- Administrativno-tehnički poslovi'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DURUTOVIĆ '),
            'ime' => trim('JADRANKA'),
            'uprava_id' => 13, 'radno_mesto' => trim('Odeljenje za ekonomsko - finansijske poslove, poslove planiranja i kontrole javnih nabavki --- Finansijski poslovi u vezi izrade i praćenja realizacije planova i programa iz nadležnosti Gradske uprave '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KRLJAR-RANČIĆ'),
            'ime' => trim('ANA'),
            'uprava_id' => 13, 'radno_mesto' => trim('Odeljenje za ekonomsko - finansijske poslove, poslove planiranja i kontrole javnih nabavki --- Ekonomsko-finansijski poslovi u postupcima javnih nabavki korisnika'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DUDIĆ'),
            'ime' => trim('VLADO'),
            'uprava_id' => 13, 'radno_mesto' => trim('Odeljenje za ekonomsko - finansijske poslove, poslove planiranja i kontrole javnih nabavki --- Magacinski poslovi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MIHAJLOVIĆ'),
            'ime' => trim('ZORAN'),
            'uprava_id' => 13, 'radno_mesto' => trim('Odeljenje za normativno – pravne i upravno - pravne poslove u oblasti javnih nabavki --- Poslovi kontrole postupaka javnih nabavki budžetskih korisnika'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DROBNJAK'),
            'ime' => trim('DANIJELA'),
            'uprava_id' => 13, 'radno_mesto' => trim('Načelnik Gradske uprave'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JAKOVLJEVIĆ'),
            'ime' => trim('ANDREA'),
            'uprava_id' => 13, 'radno_mesto' => trim('Odeljenje za ekonomsko - finansijske poslove, poslove planiranja i kontrole javnih nabavki --- Ekonomsko-finansijski poslovi u postupcima javnih nabavki korisnika'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TOMIĆ'),
            'ime' => trim('DANKA'),
            'uprava_id' => 13, 'radno_mesto' => trim('Odeljenje za normativno – pravne i upravno - pravne poslove u oblasti javnih nabavki --- Poslovi izrade normativnog dela nacrta i predloga akata u postupcima centralizovanih javnih nabavki '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RISTIĆ '),
            'ime' => trim('KATARINA'),
            'uprava_id' => 13, 'radno_mesto' => trim('Odeljenje za normativno – pravne i upravno - pravne poslove u oblasti javnih nabavki --- Poslovi izrade normativnog dela nacrta i predloga akata iz oblasti javnih nabavki direktnih budžetskih korisnika'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('OBRADOVIĆ '),
            'ime' => trim('NEBOJŠA '),
            'uprava_id' => 13, 'radno_mesto' => trim('Odeljenje za normativno – pravne i upravno - pravne poslove u oblasti javnih nabavki --- Načelnik odeljenja '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETROVIĆ'),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 14, 'radno_mesto' => trim('Zamenik sekretara Skupštine grada Kragujevca'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PAVLOVIĆ'),
            'ime' => trim('SUZANA'),
            'uprava_id' => 14, 'radno_mesto' => trim('sekretar Skupštine grada Kragujevca'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GORGIEVSKI'),
            'ime' => trim('ZLATKO'),
            'uprava_id' => 15, 'radno_mesto' => trim('Pravobranilački pomoćnik '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DIMITRIJEVIĆ '),
            'ime' => trim('BOJAN'),
            'uprava_id' => 15, 'radno_mesto' => trim('Pravobranilački pomoćnik '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOJEVIĆ '),
            'ime' => trim('DUŠAN'),
            'uprava_id' => 15, 'radno_mesto' => trim('Pripravnik u visokoj stručnoj spremi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SIMIĆ'),
            'ime' => trim('MILENA'),
            'uprava_id' => 15, 'radno_mesto' => trim('Pripravnik u visokoj stručnoj spremi '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('ĐURĐEVIĆ'),
            'ime' => trim('ANĐELKA '),
            'uprava_id' => 15, 'radno_mesto' => trim('Zamenik Gradskog pravobranioca '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PETRONIJEVIĆ '),
            'ime' => trim('BRANKO'),
            'uprava_id' => 15, 'radno_mesto' => trim('Gradski pravobranilac '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DUKIĆ'),
            'ime' => trim('BRANKO'),
            'uprava_id' => 15, 'radno_mesto' => trim('Administrativni, operativno-tehnički, informacioni i poslovi pisarnice i arhive'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('GRBOVIĆ'),
            'ime' => trim('SVETLANA'),
            'uprava_id' => 15, 'radno_mesto' => trim('Administrativni, operativno-tehnički, informacioni i poslovi pisarnice i arhive'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STAMENKOVIĆ'),
            'ime' => trim('ŽELJKO'),
            'uprava_id' => 15, 'radno_mesto' => trim('Poslovi pisarnice i arhive Gradskog pravobranilaštva'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('JEREMIĆ-ILIĆ '),
            'ime' => trim('NELA '),
            'uprava_id' => 15, 'radno_mesto' => trim('Sekretar Gradskog pravobranilaštva'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('DELEVIĆ'),
            'ime' => trim('DRAGANA '),
            'uprava_id' => 15, 'radno_mesto' => trim('Poslovi pisarnice i arhive Gradskog pravobranilaštva'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TASIĆ'),
            'ime' => trim('GORDANA '),
            'uprava_id' => 16, 'radno_mesto' => trim('Poslovi pisarnice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('IGNJATOVIĆ'),
            'ime' => trim('MIHAILO '),
            'uprava_id' => 16, 'radno_mesto' => trim('Zaštitnik gradjana Grada '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KOVAČEVIĆ '),
            'ime' => trim('IVAN '),
            'uprava_id' => 16, 'radno_mesto' => trim('Zmenik zaštitnika gradjana'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VASILJEVIĆ'),
            'ime' => trim('SANJA'),
            'uprava_id' => 16, 'radno_mesto' => trim('Poslovi pisarnice'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PREKOVIĆ'),
            'ime' => trim('DRAGAN'),
            'uprava_id' => 16, 'radno_mesto' => trim('Poslovni sekretar'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('STOJADINOVIĆ '),
            'ime' => trim('VESNA'),
            'uprava_id' => 16, 'radno_mesto' => trim('Zmenik zaštitnika gradjana'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PALČIĆ '),
            'ime' => trim('SLAĐANA '),
            'uprava_id' => 16, 'radno_mesto' => trim('Poslovni sekretar'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('RATKOVIĆ'),
            'ime' => trim('MILIJANA'),
            'uprava_id' => 17, 'radno_mesto' => trim('Gradski revizor '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PREKOVIĆ'),
            'ime' => trim('LJUBICA '),
            'uprava_id' => 17, 'radno_mesto' => trim('Viši interni revizor'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('LUKOVIĆ'),
            'ime' => trim('ANA'),
            'uprava_id' => 17, 'radno_mesto' => trim('Interni revizor '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MILOJEVIĆ '),
            'ime' => trim('MARIJA'),
            'uprava_id' => 17, 'radno_mesto' => trim('Interni revizor '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('VUKOVIĆ'),
            'ime' => trim('VELJKO'),
            'uprava_id' => 17, 'radno_mesto' => trim('Interni revizor '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('MATKOVIĆ'),
            'ime' => trim('NATAŠA'),
            'uprava_id' => 18, 'radno_mesto' => trim('Budžetski inspektor'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('KONATAR'),
            'ime' => trim('JASMINA '),
            'uprava_id' => 18, 'radno_mesto' => trim('Budžetski inspektor'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('PRŠIĆ'),
            'ime' => trim('LJILJANA'),
            'uprava_id' => 18, 'radno_mesto' => trim('Glavni budžetski inspektor'),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('TODOROVIĆ '),
            'ime' => trim('IVANA'),
            'uprava_id' => 18, 'radno_mesto' => trim('Viši budžetski inspektor '),
        ]);
        DB::table('zaposleni')->insert([
            'prezime' => trim('SAVIĆ'),
            'ime' => trim('MAJA '),
            'uprava_id' => 18, 'radno_mesto' => trim('Viši budžetski inspektor '),
        ]);

        DB::commit();
    }

}
