<div class="card">
    <div class="card-header border-0">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Nombre de Produits commandés</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex">
            <p class="d-flex flex-column">
                <span class="text-bold text-lg">{{number_format(App\Models\ProduitCommander::sum('prix'),0,',','.')}} FCFA</span>
                <span>nombre de produits</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
                <span class="text-success">
                    <i class="fas fa-arrow-up"></i> Hausse
                </span>
                <span class="text-muted">Mois</span>
            </p>
        </div>
        <!-- /.d-flex -->

        <div class="position-relative mb-4">
            <canvas id="sales-chart" height="200"></canvas>
            <input type="hidden" id="juin_id" value="{{$juin}}">
            <input type="hidden" id="juillet_id" value="{{$juillet}}">
            <input type="hidden" id="aout_id" value="{{$aout}}">
            <input type="hidden" id="septembre_id" value="{{$septembre}}">
            <input type="hidden" id="octobre_id" value="{{$octobre}}">
            <input type="hidden" id="novembre_id" value="{{$novembre}}">
            <input type="hidden" id="decembre_id" value="{{$decembre}}">
            
            <input type="hidden" id="juin_precendent_id" value="{{$juin_precendent}}">
            <input type="hidden" id="juillet_precendent_id" value="{{$juillet_precendent}}">
            <input type="hidden" id="aout_precendent_id" value="{{$aout_precendent}}">
            <input type="hidden" id="septembre_precendent_id" value="{{$septembre_precendent}}">
            <input type="hidden" id="octobre_precendent_id" value="{{$octobre_precendent}}">
            <input type="hidden" id="novembre_precendent_id" value="{{$novembre_precendent}}">
            <input type="hidden" id="decembre_precendent_id" value="{{$decembre_precendent}}">
        </div>
        <div class="d-flex flex-row justify-content-end">
            <span class="mr-2">
                <i class="fas fa-square text-primary"></i>Année en cour
            </span>

            <span>
                <i class="fas fa-square text-gray"></i> Année précédente
            </span>
        </div>
    </div>
</div>
<!-- /.card -->