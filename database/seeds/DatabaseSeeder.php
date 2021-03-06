<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(Role::class);
        $this->call(Korisnici::class);
        // $this->call(Reciklaze::class);
        $this->call(Dobavljaci::class);
        $this->call(VrsteUredjaja::class);
        $this->call(Nabavka::class);
        $this->call(NabavkaStavka::class);
        $this->call(Ugovori::class);
        $this->call(Racuni::class);
        // $this->call(RacuniSlike::class);
        $this->call(Otpremnica::class);
        // $this->call(OtpremnicaSlika::class);
        $this->call(OtpremnicaStavke::class);
        $this->call(Proizvodjaci::class);
        $this->call(Lokacija::class);
        $this->call(Spratovi::class);
        $this->call(Kancelarija::class);
        $this->call(Uprave::class);
        $this->call(Zaposleni::class);
        $this->call(Telefoni::class);
        // $this->call(Mobilni::class);
        // $this->call(Email::class);
        $this->call(MonitorDijagonala::class);
        $this->call(Status::class);
        // $this->call(Baterije::class);
        $this->call(MonitorPovezivanje::class);
        $this->call(Soketi::class);
        $this->call(TipoviMemorije::class);
        $this->call(HddPovezivanje::class);
        $this->call(TipoviStampaca::class);
        // $this->call(Toneri::class);
        $this->call(VgaSlotovi::class);
        // $this->call(MonitorModel::class);
        // $this->call(MonitoriPovezivanje::class);
        // $this->call(HddModel::class);
        // $this->call(StampaciModeli::class);
        // $this->call(SkeneriModeli::class);
        // $this->call(UpsModeli::class);
        // $this->call(MemorijaModel::class);
        // $this->call(OsnovnaPlocaModel::class);
        // $this->call(ProcesoriModeli::class);
        // $this->call(GrafickiAdapterModel::class);
        // $this->call(GrafickiAdapteriPovezivanje::class);
        // $this->call(NapajanjaModeli::class);
        $this->call(OperativniSistemi::class);
        // $this->call(OsnovnaPloca::class);
        // $this->call(Racunari::class);
        // $this->call(Monitor::class);
        // $this->call(Procesor::class);
        // $this->call(GrafickiAdapter::class);
        // $this->call(Stampaci::class);
        // $this->call(Skeneri::class);
        // $this->call(Memorija::class);
        // $this->call(Hdd::class);
        // $this->call(Ups::class);
        // $this->call(Napajanje::class);
        // $this->call(Servis::class);
        // $this->call(Projektori::class);
        // $this->call(ProjektoriPovezivanje::class);
        // $this->call(MrezniUredjaj::class);
        // $this->call(Aplikacije::class);
        // $this->call(AplikacijeRacunari::class);
        // $this->call(Podesavanja::class);
        // $this->call(Licence::class);
        // $this->call(Greske::class);
    }

}
