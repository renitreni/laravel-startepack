<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('vendor/portal-theme/assets/css/portal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- JS Compiled -->
    <script src="{{ asset('js/app.js') }}"></script>


</head>

<body class="app">

    <header class="app-header fixed-top">
        @include('layouts.partials.header')
        @include('layouts.partials.sidepanel')
    </header>
    <!--//app-header-->

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1 class="app-page-title">
                    @yield('title')
                </h1>
                @yield('content')
            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->

        <footer class="app-footer">
            <div class="container text-center py-3">
                <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                <small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a
                        class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for
                    developers</small>

            </div>
        </footer>
        <!--//app-footer-->

    </div>
    <!--//app-wrapper-->

    <!-- Modal -->
    <div id="modal-change-pass" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        @click="myModal.hide()"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert" v-if="errors">
                                <span v-for="item, key in errors">
                                    <strong>@{{ key }}</strong>
                                    <p v-for="message in item">
                                        @{{ message }}
                                    </p>
                                </span>
                            </div>
                        </div>
                        @{{ overview }}
                        <div class="col-12 mt-2">
                            <label>Current Password</label>
                            <input type="password" class="form-control" v-model="overview.password">
                        </div>
                        <div class="col-12 mt-2">
                            <label>New Password</label>
                            <input type="password" class="form-control" v-model="overview.new_password">
                        </div>
                        <div class="col-12 mt-2">
                            <label>Confirm New Password</label>
                            <input type="password" class="form-control" v-model="overview.password_confirmation">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        @click="myModal.hide()">Close</button>
                    <button type="button" class="btn btn-primary text-white" @click="save">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor Theme -->
    <script src="{{ asset('vendor/portal-theme/assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/portal-theme/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/portal-theme/assets/js/app.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    @yield('scripts')

    <script>
        const ex = new Vue({
            el: '#modal-change-pass',
            data() {
                return {
                    overview: {
                        new_password: '',
                        password: '',
                        password_confirmation: '',
                    },
                    errors: null,
                    myModal: null
                }
            },
            methods: {
                save() {
                    var $this = this;
                    axios.post('{{ route('users.change.pass') }}', $this.overview)
                        .then(function(response) {
                            $this.errors = null;
                            $this.overview = {
                                new_password: '',
                                password: '',
                                password_confirmation: '',
                            };
                            $this.myModal.hide();
                            Swal.fire(
                                'Success!',
                                'Operation saved.',
                                'success'
                            );
                        }).catch(function(reponse) {
                            $this.errors = reponse.response.data.errors
                        });
                }
            },
            mounted() {
                this.myModal = new bootstrap.Modal(document.getElementById('modal-change-pass'), {
                    keyboard: false
                });
            }
        });

    </script>
</body>

</html>
