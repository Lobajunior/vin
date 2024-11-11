    <div class="row">
        <div class="col-md-3">
          <a href="/dashboard/ajout_blog" class="btn btn-primary btn-block mb-3">Nouveau blog</a>
          <a href="compose.html" data-toggle="modal" data-target="#listBlogCategorie" class="btn btn-success btn-block mb-3">Categorie de blog</a>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Categorie de blog</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <ul class="nav nav-pills flex-column">
                <li  class="nav-item active">
                <a wire:click="resetFilter" href="#" class="nav-link">
                    <i class="fas fa-inbox"></i> Tous
                  </a>
                </li>
                @foreach($categorie_of_blog as $itemcategorie_of_blog)
                <li class="nav-item ">
                  <a wire:click="GetBlog_selon_categorie({{$itemcategorie_of_blog->id}})" href="#" class="nav-link">
                    <i class="fas fa-inbox"></i> {{$itemcategorie_of_blog->libelle}}
                    @if($itemcategorie_of_blog->blog()->count() > 0)
                    <span class="badge bg-primary float-right">{{$itemcategorie_of_blog->blog()->count()}}</span>
                    @endif
                  </a>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
         
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Liste des blogs</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Recheche un Blog">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
               
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                @if(!is_null($List_of_blog) && $List_of_blog->count() > 0)
                @foreach($List_of_blog as $itemList_of_blog)
                  <tr>
                    <td>
                      <div class="icheck-primary">
                        <input type="checkbox" value="" id="check15">
                        <label for="check15"></label>
                      </div>
                    </td>
                    <td class="mailbox-star"><a href="#"><i class="fas fa-star "></i></a></td>
                    <td class="mailbox-subject"><b>{{\Illuminate\Support\Str::words($itemList_of_blog->titre, 3,'...') }}</b>
                    </td>
                    <td class="mailbox-date"> {{date('j M, Y', strtotime($itemList_of_blog->created_at))}}</td>
                    <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="{{ route('edit_blogs',$itemList_of_blog->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm"  wire:click="deleteBlog({{$itemList_of_blog->id}})">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                @endforeach
                @else
                    <tr>
                        <td>
                            <p class="text-warning text-center">La Table est vide !</p>
                        </td>
                    </tr>
                @endif
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                  <i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>