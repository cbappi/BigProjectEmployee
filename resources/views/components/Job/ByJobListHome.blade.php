
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


        let res=await axios.get(`/ListJobByCategoryHome/${id}`);
        $("#byCategoryList").empty();
        res.data['data'].forEach((item,i)=>{
            let EachItem=`<div class="card border  text-center text-white p-2 col-3">
                <p class = "badge bg-info text-white">${item['title']}</p>
                <p class = "badge bg-info text-white">${item['skill']}</p>
                <p class = "badge bg-info text-white">${item['salary']}</p>
                <p class = "badge bg-info text-white">Job Category : ${item['remark']}</p>

                            </div>`
            $("#byCategoryList").append(EachItem);

            $("#CatName").text( res.data['data'][0]['category']['name']);
        })
    }

</script>
