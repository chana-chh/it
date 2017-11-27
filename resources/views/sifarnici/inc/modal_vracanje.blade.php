<div id = "vracanjeModal" class = "modal fade">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button class = "close" data-dismiss = "modal">&times;</button>
                <h2 class = "modal-title text-danger">Upozorenje!</h2>
            </div>
            <div class = "modal-body">
                <h3>Da li želite da uređaj vratite u ponovnu upotrebu?</h3>
                <form id="vracanje-forma" action="" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" id="idVracanje" name="idVracanje">
                    <button id = "btn-vracanje" class = "btn btn-warning">
                        <i class = "fa fa-retweet"></i> Vrati u ponovnu upotrebu
                    </button>
                </form>
            </div>
            <div class = "modal-footer">
                <button class = "btn btn-primary" data-dismiss="modal">
                    <i class = "fa fa-ban"></i> Otkaži
                </button>
            </div>
        </div>
    </div>
</div>
