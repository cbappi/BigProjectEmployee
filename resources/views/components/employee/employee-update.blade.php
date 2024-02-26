<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Employee Name *</label>
                                <input type="text" class="form-control" id="employeeNameUpdate">

                                <label class="form-label mt-2">Employee Role *</label>
                                <input type="text" class="form-control" id="employeeRoleUpdate">

                                <input class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>


<script>


    async function FillUpUpdateForm(id){
         document.getElementById('updateID').value=id;
         showLoader();
         let res=await axios.post("/employee-by-id",{id:id})
         hideLoader();
         document.getElementById('employeeNameUpdate').value=res.data['name'];
         document.getElementById('employeeRoleUpdate').value=res.data['role'];
     }

     async function Update() {

         let categoryName = document.getElementById('employeeNameUpdate').value;
         let employeeRole = document.getElementById('employeeRoleUpdate').value;
         let updateID = document.getElementById('updateID').value;

         if (employeeName.length === 0) {
             errorToast("Emplyee name Required !")
         }
         else if (employeeRole.length === 0) {
             errorToast("Emplyee name Required !")
         }

         else{
             document.getElementById('update-modal-close').click();
             showLoader();
             let res = await axios.post("/update-employee",{name:categoryName,role:employeeRole,id:updateID})
             hideLoader();

             if(res.status===200 && res.data===1){
                 document.getElementById("update-form").reset();
                 successToast("Request success !")
                 await getList();
             }
             else{
                 errorToast("Request fail !")
             }


         }



     }



 </script>
