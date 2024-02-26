<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Employee</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        
                        <div class="row">

                            <div class="col-12 p-1">
                                <label class="form-label">Employee name*</label>
                                <input type="text" class="form-control" id="employeeName">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Employee role*</label>
                                <input type="text" class="form-control" id="employeeRole">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>
    async function Save() {
        let employeeName = document.getElementById('employeeName').value;
        let employeeRole = document.getElementById('employeeRole').value;
        if (employeeName.length === 0) {
            errorToast("Employee Required !")
        }
        else if(employeeRole.length===0){
            errorToast("Employee Role Required !")
        }
        else {
            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post("/create-employee",{name:employeeName, role:employeeRole})
            hideLoader();
            if(res.status===201){
                successToast('Request completed');
                document.getElementById("save-form").reset();
                await getList();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }
</script>
