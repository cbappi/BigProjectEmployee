<h1 class = "text-center">All Jobs</h1>

<div class="mt-5">
    <div class="container my-5">
        <div id="byAllJobList" class="row">

        </div>
    </div>
</div>
<script>

   AllJobListFront();
    async function AllJobListFront(){

        let res=await axios.get(`/job-list-front`);
        $("#byAllJobList").empty();
        res.data['data'].forEach((item,i)=>{
            let EachItem=`
            <div class="card border  text-start p-2 col-3 m-1">
                <p class = "text-success fs-5">${item['title']}</p>
                <p class="text-info " ><i class="fas fa-bars me-2"></i>${item['skill']}</p>
                <p class = "fs-5">Salary : ${item['salary']}</p>

                <p >Job Category : ${item['remark']}</p>

    <button type="button" class="btn btn-outline-secondary">Apply now</button>
                </div>
            `
            $("#byAllJobList").append(EachItem);


        })
    }

</script>




