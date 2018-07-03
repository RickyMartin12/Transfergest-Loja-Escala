<div class="modal fade" id="myMapModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div id="map-canvas"></div>
                <div style="position:absolute;top:5px;left:5px;width:300px;">
                    <div class="form-group">
                        <label for="moradaPontoDeRecolha">
                            Ponto de Recolha
                        </label>
                        <div class='input-group'>
                            <input class="form-control" id="moradaPontoDeRecolha" placeholder="Morada de Recolha" type="text" readonly="true">
                            <input class="form-control" id="gpsPontoDeRecolha" placeholder="Coordenadas GPS" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="moradaPontoDeEntrega">
                            Ponto de Entrega
                        </label>
                        <div class='input-group'>
                            <input class="form-control" id="moradaPontoDeEntrega" placeholder="Morada de Entrega" type="text" readonly="true">
                            <input class="form-control" id="gpsPontoDeEntrega" placeholder="Coordenadas GPS" type="text">
                        </div>
                    </div>
                    <button type="button" class="btn btn-default" id="searchPonto" style="width:100%;">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>

                <button type="button" class="btn btn-success" id="confirmarGps" style="position: absolute;bottom:35px; right:20px;">Confirmar</button>
            </div>
        </div>
    </div>
</div>