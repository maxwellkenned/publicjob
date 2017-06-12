@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 30px;">
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary table-responsive">
                    <div class="panel-heading panel-title">
                        <input id="buscarvaga" type="text" class="form-control" placeholder="Buscar vaga...">
                    </div>
                    <div class="panel-body ">
                        <div id="vagas"></div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
</div>
@endsection
@section('script')
 <script type="text/javascript" src="/js/vagasAdmin.js"></script>
@endsection