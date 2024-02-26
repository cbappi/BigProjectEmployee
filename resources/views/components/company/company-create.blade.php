<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Company</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">

                        <div class="row">

                            <div class="col-12 p-1">
                                <label class="form-label">Company name*</label>
                                <input type="text" class="form-control" id="companyName">
                            </div>


                            <div class="col-12 p-1">
                                <label for="companyStatus" class="form-label">Company status</label>
                                <input class="form-control" list="datalistOptions" id="companyStatus" placeholder="Type to search...">
                                <datalist id="datalistOptions">
                                <option value="Active">
                                <option value="Pending">
                                </datalist>
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
        let companyName = document.getElementById('companyName').value;
        let companyStatus = document.getElementById('companyStatus').value;
        if (companyName.length === 0) {
            errorToast("Company Required !")
        }
        else if(companyStatus.length===0){
            errorToast("Company Status Required !")
        }
        else {
            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post("/create-company",{name:companyName, status:companyStatus})
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
