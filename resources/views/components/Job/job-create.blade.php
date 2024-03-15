<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Job</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Job title *</label>
                                <input type="text" class="form-control" id="jobTitle">
                            </div>

                            <label class="form-label">Job Category *</label>
                            <select type="text" class="form-control form-select" id="jobCategory">
                                <option value="">Select Job Category</option>
                            </select>



                            <div class="col-12 p-1">
                                <label class="form-label">Skill *</label>
                                <input type="text" class="form-control" id="jobSkill">
                            </div>

                            <label class="form-label">Job Company *</label>
                            <select type="text" class="form-control form-select" id="jobCompany">
                                <option value="">Select Job Company</option>
                            </select>


                            <div class="col-12 p-1">
                                <label class="form-label">Salary *</label>
                                <input type="text" class="form-control" id="jobSalary">
                            </div>


                            <div class="col-12 p-1">
                                <label for="companyStatus" class="form-label">Remark</label>
                                <input class="form-control" list="datalistOptions" id="remark" placeholder="Type to search...">
                                <datalist id="datalistOptions">
                                <option value="developer">
                                <option value="accounting">
                                <option value="training">
                                <option value="garments">
                                <option value="designer">
                                <option value="marketing">

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



    FillCategoryDropDown1();

    async function FillCategoryDropDown1(){
        let res = await axios.get("/list-category1")
        res.data.forEach(function (item,i) {
            let option=`<option value="${item['id']}">${item['name']}</option>`
            $("#jobCategory").append(option);
        })
    }

    FillCategoryDropDown2();

async function FillCategoryDropDown2(){
    let res = await axios.get("/list-company")
    res.data.forEach(function (item,i) {
        let option=`<option value="${item['id']}">${item['name']}</option>`
        $("#jobCompany").append(option);
    })
}


    async function Save() {

        let jobTitle = document.getElementById('jobTitle').value;
        let jobCategory = document.getElementById('jobCategory').value;
        let jobSkill = document.getElementById('jobSkill').value;
        let jobCompany = document.getElementById('jobCompany').value;
        let jobSalary = document.getElementById('jobSalary').value;
        let remark = document.getElementById('remark').value;



        if (jobTitle.length === 0) {
            errorToast("Title Required !")
        }
        else if (jobCategory.length === 0) {
            errorToast("Job Category Required !")
        }
        else if (jobSkill.length === 0) {
            errorToast("Skill Required !")
        }
        else if (jobCompany.length === 0) {
            errorToast("Company Required !")
        }
        if (jobSalary.length === 0) {
            errorToast("Salary Required !")
        }
        if (remark.length === 0) {
            errorToast("Remark Required !")
        }

        else {

            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post("/create-job",{title:jobTitle, category_id:jobCategory, skill:jobSkill, company_id:jobCompany, salary:jobSalary, remark:remark})
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


{{-- <script>
    async function Save() {
        let jobTitle = document.getElementById('jobTitle').value;
        let jobCategory = document.getElementById('jobCategory').value;
        let jobSkill = document.getElementById('jobSkill').value;
        let jobCompany = document.getElementById('jobCompany').value;
        let jobSalary = document.getElementById('jobSalary').value;

        if (jobTitle.length === 0) {
            errorToast("Title Required !")
        }
        else if (jobCategory.length === 0) {
            errorToast("Job Category Required !")
        }
        else if (jobSkill.length === 0) {
            errorToast("Skill Required !")
        }
        else if (jobCompany.length === 0) {
            errorToast("Company Required !")
        }
        if (jobSalary.length === 0) {
            errorToast("Salary Required !")
        }
        else {
            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post("/create-job",{title:jobTitle, category_id:jobCategory, skill:jobSkill, company_id:jobCompany, salary:jobSalary})
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
</script> --}}
