<!-- The types Modal -->
<div class="modal" id="typeList">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">MODELS LIST: <i class="far fa-question-circle" style="padding-left: 10px; font-size: 25px; color: blue;" onclick="info();"></i></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <p>SELECT BRAND:</p>
        <?php $selectBrands = $crud->selectAll('brand', '', ''); ?>
        <div class="form-group">
          <select id="selectBrand" class="form-control" onclick="select_type_by_brand();">
            <option></option>
            <?php foreach($selectBrands as $selectBrand) { ?>
            <option value="<?php echo $selectBrand->id; ?>"><?php echo $selectBrand->brand; ?></option>
            <?php } ?>
          </select>          
        </div>
        <!-- list types -->
        <div class="row justify-content-center mt-1 mb-1">
          <div class="col-md-2 text-center"><b>ID</b></div>
          <div class="col-md-6 text-center"><b>MODEL</b></div>
          <div class="col-md-4 text-center"><b>DELETE</b></div>
        </div>
        <div class="row justify-content-center mt-1 mt-1" id="list_model_table">

        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
  /* show and select type by brand */
  function select_type_by_brand(){

    $("#list_model_table > #models").remove(); /* empty table */
    let select_brand = $("#selectBrand").val();

    $.get(ADDRESS + "core/ajax/model_list.php", {brand: select_brand}, function(data){
      if(data != "error"){
        const { models, error } = data;
        let list = "";
        models.forEach(function (list_model) {
          list = `
            <div class='col-md-12' id='models'>
              <div class='row justify-content-center'>
                <div class='col-md-2'>
                  <p class='text-center'>${list_model['id']}</p>
                </div>
                <div class='col-md-6'>
                  <p class='text-center' id='model_title' data-id='${list_model['id']}' data-title='${list_model['model']}'>
                    ${list_model['model']}
                  </p>
                </div>
                <div class='col-md-4'>
                  <button class='btn btn-danger w-100' onclick='deleteModel(${list_model['id']})'>DELETE</button>
                </div>
              </div>
            </div>
          `;
          $("#list_model_table").append(list);
        });
      }
    });

  }

  /* show edit form */
  $(document).on("click", "#model_title", function(){
    let model_id    = $(this).data('id');
    let model_title = $(this).data('title');
   
    let edit_div   = "";
    edit_div = `
      <div class="input-group" id="edit" style="margin-left: -45px;">
        <div class="input-group-prepend">
          <span class="input-group-text btn btn-info">EDIT</span>
          <input type="text" name="model" id="model" data-id="${model_id}" class="form-control" value="${model_title}" required>
        </div>
      </div>
    `;
    $(this).replaceWith(edit_div); 

    $('#edit').on('dblclick', function() {
        let model_id    = $(this).find("#model").data("id");
        let model_title = $(this).find("#model").val();
        editModel(model_id, model_title);
    }).on('click', '#type', function(e) {
        e.stopPropagation();
    });

  });

  /* info div */
  function info()
  {
    alert("In order to edit model click on selected model title!");
  }

  /* edit model */
  function editModel(id, model)
  {
    $.post(ADDRESS + "core/ajax/model_edit.php", {model_id: id, model: model}, function(data){
      if(data.success != ''){
        alert("Model updated successfully!");
        location.reload();
      }else {
        alert("Error. Please try again!");
      }
    });
  }

  /* delete model */
  function deleteModel(id)
  {
    $.post(ADDRESS + "core/ajax/model_delete.php", {model_id: id}, function(data){
      if(data.success != ''){
        alert("Model deleted successfully!");
        location.reload();
      }else {
        alert("Error. Please try again!");
      }
    });   
  }

</script>


