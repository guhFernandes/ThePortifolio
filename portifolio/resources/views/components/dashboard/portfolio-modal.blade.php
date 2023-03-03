<!-- Modal About -->
<div class="modal fade" id="modalPortfolio" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalPortfolioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPortfolioLabel" style="color: rgb(33,36,41);">Portfolio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/add/portfolio" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title</label>
                        <input type="text" class="form-control" id="recipient-name" name="title">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Url</label>
                        <input type="text" class="form-control" id="recipient-name" name="url">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="type">
                            <option value="front end">Front end</option>
                            <option value="back end">Back end</option>
                            <option value="banco de dados">Banco de dados</option>
                            <option value="harking">harking</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="imagem" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Minimizar</button>
                <button type="submit" class="btn btn-primary">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</div>
