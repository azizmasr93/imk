<hr>
        <!-- Footer -->
        <footer>
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p> 
                        <center>Copyright &copy; 2015 Sistem Komputer 2015</center>
                        
                    </p>
                </div>
            </div>
            </div>
    <!-- /.container -->
        </footer>
    

   



    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/member/js/jquery.js"></script>

    <script src="<?php echo base_url(); ?>/assets/member/js/bootstrap-datepicker.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/member/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
        $(document).ready(function(){
            var link_base = "<?php echo base_url();?>";

            $('.carousel').carousel({
                interval: 5000 //changes the speed
            });

            $('.datepick').each(function(){
            $(this).datepicker({
              format:"yyyy-mm-dd",
              autoclose: true,
              todayHighlight: true
            });
        });

        $('[data-lilili="tooltip"]').tooltip();

         $('#edit').on('hidden.bs.modal', function(){
          $('#edit').removeData('bs.modal');
        });

        $('#hapus').on('show.bs.modal', function(event){
          var button = $(event.relatedTarget);
          var id = button.data('id');
          var jenis = button.data('jenis');
          if (jenis == 'anggota') {
            var link = link_base+"anggota/delete/"+id;
          }else if(jenis == 'dosen'){
            var link = link_base+"dosen/delete/"+id;
          }else if(jenis == 'mata_kuliah'){
            var link = link_base+"mata_kuliah/delete/"+id;
          }
             $('#delete').attr('href', link);
        });

        $('#hapus').on('hidden.bs.modal', function(){
          $('#hapus').removeData('bs.modal');
        });

        });
    </script>



</body>

</html>
