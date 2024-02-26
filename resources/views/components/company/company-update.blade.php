<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Company</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Company Name *</label>
                                <input type="text" class="form-control" id="companyNameUpdate">

                                {{-- <label class="form-label mt-2">Company Status *</label>
                                <input type="text" class="form-control" id="companyStatusUpdate"> --}}


                                <div class="col-12 p-1">
                                    <label for="companyStatusUpdate" class="form-label">Company status</label>
                                    <input class="form-control" list="datalistOptions" id="companyStatusUpdate" placeholder="Type to search...">
                                    <datalist id="datalistOptions">
                                    <option value="Active">
                                    <option value="Pending">
                                    </datalist>
                                </div>

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
         let res=await axios.post("/company-by-id",{id:id})
         hideLoader();
         document.getElementById('companyNameUpdate').value=res.data['name'];
         document.getElementById('companyStatusUpdate').value=res.data['status'];
     }

     async function Update() {

         let companyName = document.getElementById('companyNameUpdate').value;
         let companyStatus = document.getElementById('companyStatusUpdate').value;
         let updateID = document.getElementById('updateID').value;

         if (companyName.length === 0) {
             errorToast("Company name Required !")
         }
         else if (companyStatus.length === 0) {
             errorToast("Company status Required !")
         }

         else{
             document.getElementById('update-modal-close').click();
             showLoader();
             let res = await axios.post("/update-company",{name:companyName,status:companyStatus,id:updateID})
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
