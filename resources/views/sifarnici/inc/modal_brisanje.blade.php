<div id = "brisanjeModal" class = "modal fade">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button class = "close" data-dismiss = "modal">&times;</button>
                <h1 class = "modal-title text-danger">Upozorenje!</h1>
            </div>
            <div class = "modal-body">
                <h3>Da li želite trajno da obrišete stavku? *</h3>
                <p class = "text-danger">* Ova akcija je nepovratna!</p>
                <form id="brisanje-forma" action="" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" id="idBrisanje" name="idBrisanje">
                    <input type="hidden" id="idVrstaUredjaja" name="idVrstaUredjaja">
                    <hr style="margin-top: 30px;">

                    <div class="row dugmici" style="margin-top: 30px;">
                        <div class="col-md-12" >
                            <div class="form-group">
                                <div class="col-md-6 snimi">
                                    <button id = "btn-brisanje-obrisi" type="submit" class="btn btn-danger btn-block ono">
                                        <i class="fa fa-recycle"></i>&emsp;Obriši
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-block ono" data-dismiss="modal">
                                        <i class="fa fa-ban"></i>&emsp;Otkaži
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
