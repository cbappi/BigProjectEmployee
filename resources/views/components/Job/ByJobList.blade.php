
<div class="mt-5">
    <div class="container my-5">
        <div id="byCategoryList" class="row">

        </div>

    </div>
</div>
<script>

    ByCategory();

    async function ByCategory(){
        let searchParams=new URLSearchParams(window.location.search);
        let id=searchParams.get('id');
        let res=await axios.get(`/ListJobByCategory/${id}`);
        let Details=await res.data['data'];
        $("#byCategoryList").empty();
        res.data['data'].forEach((item,i)=>{
            let skills = item['skill'].split(',');
            let skillBadges = skills.map(skill => `<span class="badge bg-primary">${skill.trim()}</span>`).join('');
            let EachItem = `<div class="card border text-start p-3 col-3">
                <p class="text-success fs-5">${item['title']}</p>
                <p class="text-info">Skills: ${skillBadges}</p>
                <p class="fs-5">Salary : ${item['salary']}</p>
                <p>Job Category : ${item['remark']}</p>
                <button type="button" class="btn btn-outline-secondary">Apply now</button>
                <a type="button" class = "btn btn-info" href="/job-details?id=${item['id']}" >Read details</a>
            </div>`;
            $("#byCategoryList").append(EachItem);

            $("#CatName").text(res.data['data'][0]['category']['name']);
        });
    }
</script>



{{-- async function ByCategory(){
    let searchParams=new URLSearchParams(window.location.search);
    let id=searchParams.get('id');


    let res=await axios.get(`/ListJobByCategory/${id}`);
    let Details=await res.data['data'];
    $("#byCategoryList").empty();
    res.data['data'].forEach((item,i)=>{
        let EachItem=`<div class="card border  text-start p-3 col-3">
            <p class = "text-success fs-5">${item['title']}</p>
            <p class="text-info " ><i class="fas fa-bars me-2"></i>${item['skill']}</p>

            <p class = "fs-5">Salary : ${item['salary']}</p>

            <p >Job Category : ${item['remark']}</p>

            <button type="button" class="btn btn-outline-secondary">Apply now</button>
                        </div>`
        $("#byCategoryList").append(EachItem);

        $("#CatName").text( res.data['data'][0]['category']['name']);
    })
}

 --}}
