@extends('bootstrap_views.layout.main_mail')

@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-lg-10 col-sm-12 display-data mt-5">
                @include('bootstrap_views.partials.system_message')
                <div class="row mt-5">
                    <div class="col-md-4 offset-md-4 col-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="text-danger text-center">Настана грешка. Обидете се повторно подоцна.</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
