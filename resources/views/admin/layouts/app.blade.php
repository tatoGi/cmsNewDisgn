<!DOCTYPE html>
<html lang="en">

@include('admin.layouts.head')

<body>

    <!-- Begin page -->
    <div class="wrapper">
        @include('admin.layouts.sidebar')
        <div class="main-panel ps ps--active-y" id="main-panel">
            @include('admin.layouts.header')



            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->


            <div class="content">
                
                    @yield('content')
              


            </div> <!-- content -->


        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    @include('admin.layouts.scripts')
</body>

</html>
