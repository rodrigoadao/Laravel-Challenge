<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Erro ao cadastrar funcionário.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="alert alert-danger">
                    <p>
                    @foreach ( $errors->all() as $error)
                        {{ $error }} <br><br>
                    @endforeach
                    </p>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sucess" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>