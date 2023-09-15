 <!-- core:js -->
 <script src="{{ asset('/') }}admin/assets/vendors/core/core.js"></script>
 <!-- endinject -->

 <!-- Plugin js for this page -->
 <script src="{{ asset('/') }}admin/assets/vendors/flatpickr/flatpickr.min.js"></script>
 <script src="{{ asset('/') }}admin/assets/vendors/apexcharts/apexcharts.min.js"></script>
 <!-- End plugin js for this page -->

{{-- DataTable js start --}}
<script src="{{ asset('/') }}admin/assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{ asset('/') }}admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
<script src="{{ asset('/') }}admin/assets/js/data-table.js"></script>
{{-- DataTable js end --}}

 <!-- inject:js -->
 <script src="{{ asset('/') }}admin/assets/vendors/feather-icons/feather.min.js"></script>
 <script src="{{ asset('/') }}admin/assets/js/template.js"></script>
 <!-- endinject -->

 <!-- Custom js for this page -->
 <script src="{{ asset('/') }}admin/assets/js/dashboard-dark.js"></script>
 <!-- End custom js for this page -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
 <script src="{{ asset('/') }}admin/assets/js/custom-sweet-alert.js"></script>

 <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;
   
       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;
   
       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;
   
       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break; 
    }
    @endif 
   </script>