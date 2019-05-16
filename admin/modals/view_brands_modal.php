<!-- view brands -->
<?php $select_brands = $crud->selectAll('brand', '', ''); ?>

<!-- The brand Modal -->
<div class="modal" id="brandList">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">CAR BRANDS LIST: 
          <i class="far fa-question-circle" style="padding-left: 10px; font-size: 25px; color: blue;" onclick="brand_info();"></i>
        </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row justify-content-center mt-1 mb-1">
          <div class="col-md-2 text-center"><b>ID</b></div>
          <div class="col-md-4 text-center"><b>TITLE</b></div>
          <div class="col-md-4 text-center"><b>DELETE</b></div>
        </div>
        <hr>
        <?php foreach($select_brands as $select_brand) { ?>
        <div class="row justify-content-center mt-1 mb-1"> 
            <div class="col-md-2" id="brand_id"><?php echo $select_brand->id; ?></div>
            <div class="col-md-4">
              <p id="brand_title" class="text-center" data-id="<?php echo $select_brand->id; ?>" data-title="<?php echo $select_brand->brand; ?>">
                <?php echo $select_brand->brand; ?>
              </p>
            </div>
            <div class="col-md-4">
              <button class="btn btn-danger" onclick="deleteBrand(<?php echo $select_brand->id; ?>)" style="width: 100%;">DELETE</button>
            </div>
        </div>
        <?php } ?>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer"></div>
    </div>
  </div>
</div>

<script type="text/javascript">

  /* show edit form */
   $(document).on("click", "#brand_title", function(){

     $(document).on('dblclick', $(this), function(){
        $(this).prev();
     });

      let id    = $(this).data('id');
      let title = $(this).data('title');

      let edit_brand = "";
      edit_brand  = '<div class="input-group" id="edit" style="margin-left: -50px;">';
      edit_brand += '<div class="input-group-prepend">';
      edit_brand += '<span class="input-group-text btn btn-info">EDIT</span>';
      edit_brand += '<input type="text" name="brand" id="brand" data-id="'+ id +'" class="form-control" value="'+ title +'" required>';
      edit_brand += '</div>';
      edit_brand += '</div>';

      $(this).replaceWith(edit_brand); 

      $('#edit').on('click', function() {
          let id    = $(this).find("#brand").data("id");
          let brand = $(this).find("#brand").val();
          editBrand(id, brand);
      }).on('click', '#brand', function(e) {
          e.stopPropagation();
      });

    });

  /* info div */
  function brand_info() { 
    alert("In order to edit brand click on selected brand title!"); 
  }

  /* edit brand */
  function editBrand(id, brand)
  {
    $.post(ADDRESS + "core/ajax/brand_edit.php", {brand_id: id, brand: brand}, function(data){
      if(data.success != ''){
        alert("Brand updated successfully!");
        location.reload();
      }else {
        alert("Error. Please try again!");
      }
    });
  }

  /* delete brand */
  function deleteBrand(id)
  {
    $.post(ADDRESS + "core/ajax/brand_delete.php", {brand_id: id}, function(data){
      if(data.success != ''){
        alert("Brand deleted successfully!");
        location.reload();
      }else {
        alert("Error. Please try again!");
      }
    });   
  }
</script>