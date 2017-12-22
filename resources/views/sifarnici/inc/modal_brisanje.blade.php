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

            </div>
            <div class = "modal-footer">
                <form id="brisanje-forma" action="" method="POST" style="display: inline-block;">
                    {{ csrf_field() }}
                    <input type="hidden" id="idBrisanje" name="idBrisanje">
                    <button id = "btn-brisanje-obrisi" class = "btn btn-danger">
                        <i class = "fa fa-trash"></i> Obriši
                    </button>
                </form>
                <button class = "btn btn-primary" data-dismiss="modal">
                    <i class = "fa fa-ban"></i> Otkaži
                </button>
            </div>
        </div>
    </div>
</div>
