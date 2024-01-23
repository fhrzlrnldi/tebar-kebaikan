<div>
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                @php 
                if(!auth()->user()->path_image)
                    $src = 'https://cdn.onlinewebfonts.com/svg/img_218090.png';
                else
                    $src = 'assets/fotoprofil/'.auth()->user()->path_image;
                @endphp
                <img class="profile-user-img img-fluid img-circle" src="{{ $src }}"
                    alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <br>
    <div class="list-group">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fa fa-envelope"></i> Email Saya</strong>
                <p class="text-muted">{{ auth()->user()->email }}</p>
                <hr>

                <strong><i class="fa fa-phone"></i> Telephone</strong>
                <p class="text-muted">{{ auth()->user()->phone }}</p>
                <hr>

                <strong><i class=" fa fa-venus-mars"></i>Jenis Kelamin</strong>
                <p class="text-muted">{{ auth()->user()->gender }}</p>
                <hr>

                <strong><i class="fa fa-calendar mr-1"></i> Tanggal Lahir</strong>
                <p class="text-muted">{{ date('d M Y', strtotime(auth()->user()->birth_date)) }}</p>
                <hr>

                <strong><i class="fa fa-user mr-1"></i> Pekerjaan</strong>
                <p class="text-muted">{{ auth()->user()->job }}</p>
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                <p class="text-muted">{{ auth()->user()->address }}</p>
                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Tentang saya</strong>
                <p class="text-muted">{{ auth()->user()->about }}</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.card-body -->
    </div>
</div>
