<div>


        <!-- USERS LIST -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Derniers Membres</h3>

            <div class="card-tools">
                <span class="badge badge-danger">8 New Members</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <ul class="users-list clearfix">
                @foreach($utilisateur as $utilisateurs)
                <li>
                    @if(!is_null($utilisateurs->photo) && $utilisateurs->photo != "default.jpg")
                    <img src="../Backend/images/User/{{$utilisateurs->photo}}" alt="User Image">
                    @else
                    <img src="../Backend/dist/img/default-150x150.png" alt="User Image">
                    @endif
                    <a class="users-list-name" href="#">{{$utilisateurs->prenom}} {{$utilisateurs->nom}}</a>
                    <span class="users-list-date">{{date('j M, Y', strtotime($utilisateurs->created_at))}}</span>
                </li>
                @endforeach
            </ul>
            <!-- /.users-list -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
            <a href="/dashboard/Utilisateurs">Voir tous les utilisateurs</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!--/.card -->


</div>
